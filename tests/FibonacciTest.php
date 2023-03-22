<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function test_ItWorks(): void
    {
        self::assertSame(0, fibonacci(0));
    }
}
