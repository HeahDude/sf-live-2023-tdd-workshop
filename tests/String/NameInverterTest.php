<?php

namespace App\Tests\String;

use App\String\NameInverter;
use PHPUnit\Framework\TestCase;

class NameInverterTest extends TestCase
{
    private NameInverter $nameInverter;

    protected function setUp(): void
    {
        $this->nameInverter = new NameInverter();
    }

    public function test_GivenEmpty_ReturnsEmptyString(): void
    {
        self::assertSame('', $this->nameInverter->invert(null));
    }

    public function test_GivenSimpleName_ReturnsSimpleNameAsIs(): void
    {
        self::assertSame('Toto', $this->nameInverter->invert('Toto'));
    }

    // todo test full name
    // todo test full name with honorifics
    // todo test full name with post nominals
    // todo test integration
}
