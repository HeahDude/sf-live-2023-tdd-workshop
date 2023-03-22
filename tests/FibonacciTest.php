<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function test_ItWorks(): void
    {
        self::assertSame(0, fibonacci(0));
        self::assertSame(1, fibonacci(1));
    }
}

function fibonacci(): int
{
    // todo implement me
    return 0;
}
