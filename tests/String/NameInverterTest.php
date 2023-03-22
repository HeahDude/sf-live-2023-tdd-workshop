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

    public function test_GivenSimpleName_ReturnsSimpleNameAsIs(): void
    {
        $nameInverter = new NameInverter();

        self::assertSame('Toto', $nameInverter->invert('Toto'));
    }

    // todo test full name
    // todo test full name with honorifics
    // todo test full name with post nominals
    // todo test integration
}
