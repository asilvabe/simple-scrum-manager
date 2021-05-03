<?php

namespace Tests\Unit\Helpers;

use App\Helpers\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @param int $number
     * @param string $formatted
     * @dataProvider numbersProvider
     */
    public function testItFormatNumber(int $number, string $formatted, bool $showDecimal): void
    {
        $result = NumberFormatter::human($number, $showDecimal);

        $this->assertEquals($formatted, $result);
    }

    public function numbersProvider(): array
    {
        return [
            'test thousands with decimal' => [
                'number' => 1200,
                'formatted' => '1.2K',
                'showDecimal' => true
            ],
            'test thousands without decimal' => [
                'number' => 9800,
                'formatted' => '9K',
                'showDecimal' => false
            ],
            'test millions with decimal' => [
                'number' => 1039000,
                'formatted' => '1.0M',
                'showDecimal' => true
            ],
            'test millions without decimal' => [
                'number' => 1500000,
                'formatted' => '1M',
                'showDecimal' => false
            ],
            'test billions with decimal' => [
                'number' => 1000000000,
                'formatted' => '1.0B',
                'showDecimal' => true
            ],
            'test billions without decimal' => [
                'number' => 1000000000,
                'formatted' => '1B',
                'showDecimal' => false
            ],
            'test trillions with decimal' => [
                'number' => 1000000000000,
                'formatted' => '1.0T',
                'showDecimal' => true
            ],
            'test trillions without decimal' => [
                'number' => 1000000000000,
                'formatted' => '1T',
                'showDecimal' => false
            ],
        ];
    }
}
