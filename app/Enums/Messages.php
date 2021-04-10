<?php

namespace App\Enums;

class Messages
{
    public const INFO = 'info';
    public const SUCCESS = 'success';
    public const ERROR = 'error';
    public const WARNING = 'warning';

    public static function supported(): array
    {
        return [
            self::INFO,
            self::SUCCESS,
            self::WARNING,
            self::ERROR,
        ];
    }
}
