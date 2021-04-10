<?php


namespace App\Helpers;


class Math
{
    public static function percentage(int $portion, int $total): int
    {
        return $total ? (100 * $portion) / $total : 0;
    }
}
