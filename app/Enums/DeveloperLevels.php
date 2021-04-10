<?php

namespace App\Enums;

class DeveloperLevels
{
    public const JUNIOR = 'junior';
    public const ONE = 'one';
    public const TWO = 'two';
    public const SENIOR = 'senior';
    public const LEADER = 'leader';

    public static function toArray(): array
    {
        return [
            self::JUNIOR,
            self::ONE,
            self::TWO,
            self::SENIOR,
            self::LEADER,
        ];
    }
}
