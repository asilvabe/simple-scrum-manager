<?php

namespace App\Helpers;

class NumberFormatter
{
    public const HUMAN_FORMATTERS = [
        ['min' => 1000, 'max' => 1000000, 'floor' => 1000, 'suffix' => 'K'],
        ['min' => 1000000, 'max' => 1000000000, 'floor' => 1000000, 'suffix' => 'M'],
        ['min' => 1000000000, 'max' => 1000000000000, 'floor' => 1000000000, 'suffix' => 'B'],
        ['min' => 1000000000000, 'max' => 1000000000000000, 'floor' => 1000000000000, 'suffix' => 'T'],
    ];

    public static function human(int $number, bool $showDecimal = true, int $decimals = 0): string
    {
        $decimals = $showDecimal && $decimals == 0 ? 1 : $decimals;
        $floorNumber = 0;
        $getFloor = 0;
        $suffix = '';
        $number = abs($number);

        if ($number < 1000) {
            return $number;
        }

        foreach (self::HUMAN_FORMATTERS as $formatter) {
            if ($number >= $formatter['min'] && $number < $formatter['max']) {
                $getFloor = floor($number / $formatter['min']);
                $floorNumber = $formatter['floor'];
                $suffix = $formatter['suffix'];
            }
        }

        if ($showDecimal && $floorNumber > 0) {
            $number -= ($getFloor * $floorNumber);
            if ($number > 0) {
                $number /= $floorNumber;
                $getFloor += $number;
            }
        }

        return !empty($getFloor . $suffix) ? number_format($getFloor, $decimals) . $suffix : 0;
    }
}
