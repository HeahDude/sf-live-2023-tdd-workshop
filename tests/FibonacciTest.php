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
        ];

        foreach ($cases as $index => $case) {
            self::assertSame($case, fibonacci($index));
        }
    }
}

function fibonacci(int $index): int
{
    // todo implement me
    if (0 === $index) {
        return 0;
    }

    return $index;
}
