<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function test_ItWorks(): void
    {
        $cases = [
            0 => 0,
            1 => 1,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 5,
            6 => 8,
            7 => 13,
        ];

        foreach ($cases as $index => $case) {
            self::assertSame($case, fibonacci($index));
        }
    }
}

function fibonacci(int $index): int
{
    return match ($index) {
        0, 1 => $index,
        default => fibonacci($index - 1) + fibonacci($index - 2),
    };
}
