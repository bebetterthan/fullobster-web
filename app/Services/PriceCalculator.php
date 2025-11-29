<?php

namespace App\Services;

use App\Models\CateringPackage;
use App\Models\LaundryPackage;
use App\Models\ProgramOffline;

class PriceCalculator
{
    /**
     * Calculate catering price based on package and periods
     */
    public static function calculateCateringPrice($packageId, $periods)
    {
        $package = CateringPackage::find($packageId);
        if (!$package) return 0;
        
        return $package->calculatePrice($periods);
    }

    /**
     * Calculate laundry price based on package and weeks
     */
    public static function calculateLaundryPrice($packageId, $weeks)
    {
        $package = LaundryPackage::find($packageId);
        if (!$package) return 0;
        
        return $package->calculatePrice($weeks);
    }

    /**
     * Calculate total price for registration including all services
     */
    public static function calculateTotalPrice($programId, $cateringPackageId = null, $laundryPackageId = null, $weeks = 1)
    {
        $breakdown = [
            'program_price' => 0,
            'catering_price' => 0,
            'laundry_price' => 0,
            'total' => 0
        ];

        // Get program base price
        $program = ProgramOffline::find($programId);
        if ($program) {
            $breakdown['program_price'] = $program->harga;
        }

        // Calculate periods for catering
        $periods = PeriodCalculator::calculatePeriods($weeks);

        // Add catering price
        if ($cateringPackageId) {
            $breakdown['catering_price'] = self::calculateCateringPrice($cateringPackageId, $periods);
        }

        // Add laundry price
        if ($laundryPackageId) {
            $breakdown['laundry_price'] = self::calculateLaundryPrice($laundryPackageId, $weeks);
        }

        // Calculate total
        $breakdown['total'] = $breakdown['program_price'] + $breakdown['catering_price'] + $breakdown['laundry_price'];

        return $breakdown;
    }

    /**
     * Format price for display (Indonesian format)
     */
    public static function formatPrice($price)
    {
        return 'Rp ' . number_format($price, 0, ',', '.');
    }

    /**
     * Get price breakdown with formatted strings
     */
    public static function getFormattedPriceBreakdown($programId, $cateringPackageId = null, $laundryPackageId = null, $weeks = 1)
    {
        $breakdown = self::calculateTotalPrice($programId, $cateringPackageId, $laundryPackageId, $weeks);
        
        return [
            'program_price' => self::formatPrice($breakdown['program_price']),
            'catering_price' => self::formatPrice($breakdown['catering_price']),
            'laundry_price' => self::formatPrice($breakdown['laundry_price']),
            'total' => self::formatPrice($breakdown['total']),
            'raw' => $breakdown
        ];
    }
}