<?php

namespace App\Services;

use App\Models\LearningProgram;
use App\Models\AddOn;
use App\Models\ProgramRegistration;

class PriceCalculatorService
{
    /**
     * Calculate total price for a program with selected add-ons
     */
    public static function calculateTotalPrice(
        LearningProgram $program,
        ?AddOn $transportationAddon = null,
        ?AddOn $laundryAddon = null,
        ?AddOn $cateringAddon = null
    ): array {
        $breakdown = [
            'program_base' => [
                'name' => $program->name,
                'price' => $program->base_price,
                'formatted_price' => $program->formatted_price,
            ],
        ];

        $total = $program->base_price;

        // Calculate transportation price
        if ($transportationAddon) {
            $transportationPrice = $transportationAddon->calculatePrice($program);
            $breakdown['transportation'] = [
                'name' => $transportationAddon->package_name,
                'price' => $transportationPrice,
                'formatted_price' => 'Rp ' . number_format($transportationPrice, 0, ',', '.'),
                'calculation' => self::getCalculationDescription($transportationAddon, $program),
            ];
            $total += $transportationPrice;
        }

        // Calculate laundry price
        if ($laundryAddon) {
            if ($laundryAddon->isAvailableForProgram($program)) {
                $laundryPrice = $laundryAddon->calculatePrice($program);
                $breakdown['laundry'] = [
                    'name' => $laundryAddon->package_name,
                    'price' => $laundryPrice,
                    'formatted_price' => 'Rp ' . number_format($laundryPrice, 0, ',', '.'),
                    'calculation' => self::getCalculationDescription($laundryAddon, $program),
                ];
                $total += $laundryPrice;
            } else {
                $breakdown['laundry_error'] = [
                    'message' => 'Selected laundry package is not available for this program duration.',
                ];
            }
        }

        // Calculate catering price
        if ($cateringAddon) {
            $cateringPrice = $cateringAddon->calculatePrice($program);
            $breakdown['catering'] = [
                'name' => $cateringAddon->package_name,
                'price' => $cateringPrice,
                'formatted_price' => 'Rp ' . number_format($cateringPrice, 0, ',', '.'),
                'calculation' => self::getCalculationDescription($cateringAddon, $program),
            ];
            $total += $cateringPrice;
        }

        $breakdown['total'] = [
            'name' => 'Total',
            'price' => $total,
            'formatted_price' => 'Rp ' . number_format($total, 0, ',', '.'),
        ];

        return $breakdown;
    }

    /**
     * Get calculation description for add-on pricing
     */
    private static function getCalculationDescription(AddOn $addOn, LearningProgram $program): string
    {
        switch ($addOn->price_unit) {
            case 'flat':
                return $addOn->formatted_price . ' (one-time payment)';
            case 'per_week':
                return $addOn->formatted_price . ' × ' . $program->week_count . ' weeks = Rp ' . 
                       number_format($addOn->calculatePrice($program), 0, ',', '.');
            case 'per_period':
                return $addOn->formatted_price . ' × ' . $program->period_count . ' periods = Rp ' . 
                       number_format($addOn->calculatePrice($program), 0, ',', '.');
            default:
                return $addOn->formatted_price;
        }
    }

    /**
     * Validate add-on selections for a program
     */
    public static function validateAddOnSelections(
        LearningProgram $program,
        array $addOnIds
    ): array {
        $errors = [];
        $validAddOns = [];

        foreach ($addOnIds as $type => $addOnId) {
            if (empty($addOnId)) {
                continue;
            }

            $addOn = AddOn::find($addOnId);
            
            if (!$addOn) {
                $errors[$type] = "Selected {$type} add-on not found.";
                continue;
            }

            if (!$addOn->is_active) {
                $errors[$type] = "Selected {$type} add-on is not currently available.";
                continue;
            }

            if ($addOn->type !== $type) {
                $errors[$type] = "Invalid {$type} add-on selection.";
                continue;
            }

            if (!$addOn->isAvailableForProgram($program)) {
                $errors[$type] = "Selected {$type} add-on is not available for this program duration.";
                continue;
            }

            $validAddOns[$type] = $addOn;
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'add_ons' => $validAddOns,
        ];
    }

    /**
     * Create price estimate for registration form
     */
    public static function createPriceEstimate(array $formData): array
    {
        if (empty($formData['learning_program_id'])) {
            return [
                'valid' => false,
                'error' => 'Please select a learning program.',
            ];
        }

        $program = LearningProgram::find($formData['learning_program_id']);
        if (!$program || !$program->is_active) {
            return [
                'valid' => false,
                'error' => 'Selected program is not available.',
            ];
        }

        // Get selected add-ons
        $transportationAddon = null;
        $laundryAddon = null;
        $cateringAddon = null;

        if (!empty($formData['transportation_addon_id'])) {
            $transportationAddon = AddOn::find($formData['transportation_addon_id']);
        }

        if (!empty($formData['laundry_addon_id'])) {
            $laundryAddon = AddOn::find($formData['laundry_addon_id']);
        }

        if (!empty($formData['catering_addon_id'])) {
            $cateringAddon = AddOn::find($formData['catering_addon_id']);
        }

        // Validate add-on selections
        $addOnValidation = self::validateAddOnSelections($program, [
            'transportation' => $formData['transportation_addon_id'] ?? null,
            'laundry' => $formData['laundry_addon_id'] ?? null,
            'catering' => $formData['catering_addon_id'] ?? null,
        ]);

        if (!$addOnValidation['valid']) {
            return [
                'valid' => false,
                'errors' => $addOnValidation['errors'],
            ];
        }

        // Calculate price breakdown
        $priceBreakdown = self::calculateTotalPrice(
            $program,
            $transportationAddon,
            $laundryAddon,
            $cateringAddon
        );

        return [
            'valid' => true,
            'program' => [
                'id' => $program->id,
                'name' => $program->name,
                'duration_type' => $program->duration_type,
                'formatted_duration' => $program->formatted_duration,
                'period_count' => $program->period_count,
                'week_count' => $program->week_count,
                'learning_days' => $program->learning_days,
            ],
            'price_breakdown' => $priceBreakdown,
            'add_ons' => [
                'transportation' => $transportationAddon,
                'laundry' => $laundryAddon,
                'catering' => $cateringAddon,
            ],
        ];
    }

    /**
     * Calculate savings or discounts (for future promotional features)
     */
    public static function calculateDiscounts(array $priceBreakdown, array $discountRules = []): array
    {
        // Placeholder for future discount/promotion features
        $discounts = [];
        $originalTotal = $priceBreakdown['total']['price'];
        $discountedTotal = $originalTotal;

        // Example: 10% discount for 3-month programs
        // This can be expanded based on business requirements

        return [
            'original_total' => $originalTotal,
            'discounted_total' => $discountedTotal,
            'total_savings' => $originalTotal - $discountedTotal,
            'discounts_applied' => $discounts,
        ];
    }

    /**
     * Format price for display
     */
    public static function formatPrice(float $price): string
    {
        return 'Rp ' . number_format($price, 0, ',', '.');
    }

    /**
     * Parse price from formatted string
     */
    public static function parsePrice(string $formattedPrice): float
    {
        // Remove currency symbol and formatting
        $cleaned = preg_replace('/[^\d,.]/', '', $formattedPrice);
        $cleaned = str_replace(',', '', $cleaned);
        
        return (float) $cleaned;
    }
}
