<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LearningProgram;
use App\Models\AddOn;
use App\Services\PriceCalculatorService;
use Illuminate\Http\Request;

class PriceCalculatorController extends Controller
{
    /**
     * Calculate price estimate based on form data
     */
    public function calculateEstimate(Request $request)
    {
        $request->validate([
            'learning_program_id' => 'required|exists:learning_programs,id',
            'transportation_addon_id' => 'nullable|exists:add_ons,id',
            'laundry_addon_id' => 'nullable|exists:add_ons,id',
            'catering_addon_id' => 'nullable|exists:add_ons,id',
        ]);

        $estimate = PriceCalculatorService::createPriceEstimate($request->all());

        if (!$estimate['valid']) {
            return response()->json([
                'success' => false,
                'errors' => $estimate['errors'] ?? [$estimate['error'] ?? 'Invalid selection'],
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $estimate,
        ]);
    }

    /**
     * Get real-time price calculation
     */
    public function calculatePrice(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:learning_programs,id',
            'add_ons' => 'array',
            'add_ons.transportation' => 'nullable|exists:add_ons,id',
            'add_ons.laundry' => 'nullable|exists:add_ons,id',
            'add_ons.catering' => 'nullable|exists:add_ons,id',
        ]);

        $program = LearningProgram::findOrFail($request->program_id);

        if (!$program->is_active) {
            return response()->json([
                'success' => false,
                'error' => 'Selected program is not available',
            ], 400);
        }

        // Get selected add-ons
        $addOns = $request->add_ons ?? [];
        $transportationAddon = $addOns['transportation'] ? AddOn::find($addOns['transportation']) : null;
        $laundryAddon = $addOns['laundry'] ? AddOn::find($addOns['laundry']) : null;
        $cateringAddon = $addOns['catering'] ? AddOn::find($addOns['catering']) : null;

        // Validate add-on selections
        $validation = PriceCalculatorService::validateAddOnSelections($program, $addOns);

        if (!$validation['valid']) {
            return response()->json([
                'success' => false,
                'errors' => $validation['errors'],
            ], 400);
        }

        // Calculate price breakdown
        $priceBreakdown = PriceCalculatorService::calculateTotalPrice(
            $program,
            $transportationAddon,
            $laundryAddon,
            $cateringAddon
        );

        return response()->json([
            'success' => true,
            'data' => [
                'program' => [
                    'id' => $program->id,
                    'name' => $program->name,
                    'duration_type' => $program->duration_type,
                    'formatted_duration' => $program->formatted_duration,
                ],
                'price_breakdown' => $priceBreakdown,
                'add_ons_selected' => [
                    'transportation' => $transportationAddon ? [
                        'id' => $transportationAddon->id,
                        'name' => $transportationAddon->package_name,
                        'price' => $transportationAddon->calculatePrice($program),
                    ] : null,
                    'laundry' => $laundryAddon ? [
                        'id' => $laundryAddon->id,
                        'name' => $laundryAddon->package_name,
                        'price' => $laundryAddon->calculatePrice($program),
                    ] : null,
                    'catering' => $cateringAddon ? [
                        'id' => $cateringAddon->id,
                        'name' => $cateringAddon->package_name,
                        'price' => $cateringAddon->calculatePrice($program),
                    ] : null,
                ],
            ],
        ]);
    }

    /**
     * Validate add-on compatibility with program
     */
    public function validateAddOn(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:learning_programs,id',
            'addon_id' => 'required|exists:add_ons,id',
        ]);

        $program = LearningProgram::findOrFail($request->program_id);
        $addOn = AddOn::findOrFail($request->addon_id);

        $isAvailable = $addOn->isAvailableForProgram($program);
        $calculatedPrice = $isAvailable ? $addOn->calculatePrice($program) : 0;

        return response()->json([
            'success' => true,
            'data' => [
                'is_available' => $isAvailable,
                'calculated_price' => $calculatedPrice,
                'formatted_calculated_price' => $isAvailable ? PriceCalculatorService::formatPrice($calculatedPrice) : null,
                'reason' => $isAvailable ? 'Available' : 'Not available for this program duration',
            ],
        ]);
    }

    /**
     * Get price breakdown summary
     */
    public function getPriceBreakdown(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.type' => 'required|in:program,transportation,laundry,catering',
            'items.*.id' => 'required|integer',
        ]);

        $breakdown = [];
        $total = 0;
        $program = null;

        foreach ($request->items as $item) {
            if ($item['type'] === 'program') {
                $program = LearningProgram::find($item['id']);
                if ($program && $program->is_active) {
                    $breakdown[] = [
                        'type' => 'program',
                        'name' => $program->name,
                        'price' => $program->base_price,
                        'formatted_price' => $program->formatted_price,
                    ];
                    $total += $program->base_price;
                }
            } else {
                $addOn = AddOn::find($item['id']);
                if ($addOn && $addOn->is_active && $program) {
                    if ($addOn->isAvailableForProgram($program)) {
                        $calculatedPrice = $addOn->calculatePrice($program);
                        $breakdown[] = [
                            'type' => $addOn->type,
                            'name' => $addOn->package_name,
                            'price' => $calculatedPrice,
                            'formatted_price' => PriceCalculatorService::formatPrice($calculatedPrice),
                            'calculation_description' => $this->getCalculationDescription($addOn, $program),
                        ];
                        $total += $calculatedPrice;
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => [
                'breakdown' => $breakdown,
                'total' => $total,
                'formatted_total' => PriceCalculatorService::formatPrice($total),
                'item_count' => count($breakdown),
            ],
        ]);
    }

    /**
     * Get calculation description for frontend display
     */
    private function getCalculationDescription(AddOn $addOn, LearningProgram $program): string
    {
        switch ($addOn->price_unit) {
            case 'flat':
                return 'One-time payment';
            case 'per_week':
                return $addOn->formatted_price . ' × ' . $program->week_count . ' weeks';
            case 'per_period':
                return $addOn->formatted_price . ' × ' . $program->period_count . ' periods';
            default:
                return 'Custom pricing';
        }
    }
}
