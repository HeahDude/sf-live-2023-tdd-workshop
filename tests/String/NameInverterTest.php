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
        $this->assertNameIsInverted(name: null, expectedInversion: '');
    }

    public function test_GivenSimpleName_ReturnsSimpleNameAsIs(): void
    {
        $this->assertNameIsInverted(name: 'Toto', expectedInversion: 'Toto');
    }

    public function test_GivenFullName_ReturnsInverted(): void
    {
        $this->assertNameIsInverted(name: 'Diego Aguiar', expectedInversion: 'Aguiar, Diego');
    }

    public function test_GivenFullNameWithHonorifics_ReturnsInvertedWithoutHonorifics(): void
    {
        $this->assertNameIsInverted(name: 'Mr. Diego Aguiar', expectedInversion: 'Aguiar, Diego');
    }

    private function assertNameIsInverted(?string $name, string $expectedInversion): void
    {
        self::assertSame($expectedInversion, $this->nameInverter->invert($name));
    }

    // todo test full name with honorifics
    // todo test full name with post nominals
    // todo test integration
}
