<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\LearningProgram;

class PeriodCalculatorService
{
    /**
     * Calculate learning periods based on duration type
     * 1 period = 5 days (Monday to Friday only)
     */
    public static function calculatePeriods(string $durationType): array
    {
        $periodMap = [
            '1_week' => 1,    // 1 period (5 learning days)
            '2_weeks' => 2,   // 2 periods (10 learning days)
            '1_month' => 4,   // ~4 periods (20 learning days)
            '2_months' => 8,  // ~8 periods (40 learning days)
            '3_months' => 12, // ~12 periods (60 learning days)
        ];

        $periods = $periodMap[$durationType] ?? 1;
        $learningDays = $periods * 5; // 5 days per period
        $weeks = ceil($learningDays / 5); // For laundry calculation

        return [
            'period_count' => $periods,
            'learning_days' => $learningDays,
            'week_count' => $weeks,
        ];
    }

    /**
     * Generate learning calendar excluding weekends
     */
    public static function generateLearningCalendar(Carbon $startDate, int $learningDays): array
    {
        $calendar = [];
        $currentDate = $startDate->copy();
        $daysAdded = 0;
        
        while ($daysAdded < $learningDays) {
            // Skip weekends (Saturday = 6, Sunday = 0)
            if ($currentDate->dayOfWeek !== Carbon::SATURDAY && $currentDate->dayOfWeek !== Carbon::SUNDAY) {
                $calendar[] = [
                    'date' => $currentDate->format('Y-m-d'),
                    'day_name' => $currentDate->format('l'),
                    'period' => ceil(($daysAdded + 1) / 5),
                    'day_in_period' => (($daysAdded) % 5) + 1,
                ];
                $daysAdded++;
            }
            $currentDate->addDay();
        }
        
        return $calendar;
    }

    /**
     * Calculate end date based on start date and learning days
     */
    public static function calculateEndDate(Carbon $startDate, int $learningDays): Carbon
    {
        $endDate = $startDate->copy();
        $daysAdded = 0;
        
        while ($daysAdded < $learningDays) {
            $endDate->addDay();
            
            // Skip weekends
            if ($endDate->dayOfWeek !== Carbon::SATURDAY && $endDate->dayOfWeek !== Carbon::SUNDAY) {
                $daysAdded++;
            }
        }
        
        return $endDate->subDay(); // Return the last learning day
    }

    /**
     * Get next available start date (Monday)
     */
    public static function getNextAvailableStartDate(): Carbon
    {
        $date = Carbon::now();
        
        // If today is not Monday, move to next Monday
        if ($date->dayOfWeek !== Carbon::MONDAY) {
            $date->next(Carbon::MONDAY);
        }
        
        return $date;
    }

    /**
     * Validate start date (must be Monday)
     */
    public static function validateStartDate(Carbon $startDate): bool
    {
        return $startDate->dayOfWeek === Carbon::MONDAY;
    }

    /**
     * Get learning calendar with periods grouped
     */
    public static function getGroupedLearningCalendar(Carbon $startDate, int $learningDays): array
    {
        $calendar = self::generateLearningCalendar($startDate, $learningDays);
        $grouped = [];
        
        foreach ($calendar as $day) {
            $period = $day['period'];
            if (!isset($grouped[$period])) {
                $grouped[$period] = [
                    'period_number' => $period,
                    'days' => [],
                ];
            }
            $grouped[$period]['days'][] = $day;
        }
        
        return array_values($grouped);
    }

    /**
     * Calculate weeks from periods for laundry pricing
     */
    public static function calculateWeeksFromPeriods(int $periods): int
    {
        // Each period is approximately 1 week (5 days)
        // But for laundry pricing, we round up to ensure coverage
        return max(1, ceil($periods));
    }

    /**
     * Get period statistics
     */
    public static function getPeriodStatistics(string $durationType): array
    {
        $calculations = self::calculatePeriods($durationType);
        
        return [
            'duration_type' => $durationType,
            'formatted_duration' => LearningProgram::DURATION_TYPES[$durationType] ?? $durationType,
            'period_count' => $calculations['period_count'],
            'learning_days' => $calculations['learning_days'],
            'week_count' => $calculations['week_count'],
            'total_calendar_days' => self::calculateTotalCalendarDays($calculations['learning_days']),
        ];
    }

    /**
     * Calculate total calendar days including weekends
     */
    private static function calculateTotalCalendarDays(int $learningDays): int
    {
        // Approximate total days including weekends
        $weeks = ceil($learningDays / 5);
        return ($weeks * 7) - (7 - ($learningDays % 5 === 0 ? 5 : $learningDays % 5));
    }
}
