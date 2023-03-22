<?php

namespace App\Tests\String;

use PHPUnit\Framework\TestCase;

class NameInverterTest extends TestCase
{
    public function test_GivenEmpty_ReturnsEmptyString(): void
    {
        $nameInverter = new NameInverter();

        self::assertSame('', $nameInverter->invert(null));
    }
}
