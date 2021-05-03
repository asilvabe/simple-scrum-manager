<?php

namespace Tests\Unit\Helpers;

use App\Helpers\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testItCalculatesPercentage(): void
    {
        $result = Math::percentage(60, 100);

        $this->assertEquals(60, $result);
    }
}
