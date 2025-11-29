<?php

namespace App\Services;

use Carbon\Carbon;

class PeriodCalculator
{
    /**
     * Calculate periods based on program weeks
     * 1 week = 1 period
     */
    public static function calculatePeriods($weeks)
    {
        return (int) $weeks;
    }

    /**
     * Calculate weeks from start and end date
     */
    public static function calculateWeeks($startDate, $endDate)
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        
        return $start->diffInWeeks($end) + 1; // +1 to include the start week
    }

    /**
     * Get program duration info
     */
    public static function getProgramDuration($startDate, $endDate)
    {
        $weeks = self::calculateWeeks($startDate, $endDate);
        $periods = self::calculatePeriods($weeks);
        
        return [
            'weeks' => $weeks,
            'periods' => $periods,
            'start_date' => Carbon::parse($startDate)->format('Y-m-d'),
            'end_date' => Carbon::parse($endDate)->format('Y-m-d')
        ];
    }
}