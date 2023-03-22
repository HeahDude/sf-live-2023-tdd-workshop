<?php

namespace App\Tests\String;

use App\String\NameInverter;
use PHPUnit\Framework\TestCase;

class NameInverterTest extends TestCase
{
    public function test_GivenEmpty_ReturnsEmptyString(): void
    {
        $nameInverter = new NameInverter();

        self::assertSame('', $nameInverter->invert(null));
    }
}
