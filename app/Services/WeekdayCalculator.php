<?php

namespace App\Services;

use Carbon\Carbon;

class WeekdayCalculator
{
    /**
     * Get all weekdays (Monday-Friday) within a date range
     */
    public static function getWeekdaysInRange($startDate, $endDate)
    {
        $weekdays = [];
        $current = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        
        while ($current->lte($end)) {
            // Only Monday (1) to Friday (5)
            if ($current->isWeekday()) {
                $weekdays[] = $current->format('Y-m-d');
            }
            $current->addDay();
        }
        
        return $weekdays;
    }

    /**
     * Count weekdays in a date range
     */
    public static function countWeekdaysInRange($startDate, $endDate)
    {
        return count(self::getWeekdaysInRange($startDate, $endDate));
    }

    /**
     * Get weekdays grouped by week
     */
    public static function getWeekdaysGroupedByWeek($startDate, $endDate)
    {
        $weekdays = self::getWeekdaysInRange($startDate, $endDate);
        $grouped = [];
        
        foreach ($weekdays as $date) {
            $carbon = Carbon::parse($date);
            $weekNumber = $carbon->weekOfYear;
            $year = $carbon->year;
            $key = $year . '-W' . $weekNumber;
            
            if (!isset($grouped[$key])) {
                $grouped[$key] = [];
            }
            
            $grouped[$key][] = $date;
        }
        
        return $grouped;
    }

    /**
     * Validate if all dates in array are weekdays
     */
    public static function areAllWeekdays($dates)
    {
        foreach ($dates as $date) {
            $carbon = Carbon::parse($date);
            if (!$carbon->isWeekday()) {
                return false;
            }
        }
        return true;
    }
}