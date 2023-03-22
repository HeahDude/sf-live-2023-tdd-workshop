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

    /**
     * @dataProvider provideHonorifics
     */
    public function test_GivenFullNameWithHonorifics_ReturnsInvertedWithoutHonorifics(string $honorific): void
    {
        $this->assertNameIsInverted(name: $honorific . ' Diego Aguiar', expectedInversion: 'Aguiar, Diego');
    }

    public function provideHonorifics(): iterable
    {
        yield 'Mr.' => ['Mr.'];
        yield 'Mr' => ['Mr'];
        yield 'Mrs' => ['Mrs'];
        yield 'Miss' => ['Miss'];
        yield 'Dr' => ['Dr'];
    }

    /**
     * @dataProvider providePostNominals
     */
    public function test_GivenFullNameWithPostNominals_ReturnsInvertedWithPostNominals(string $postNominals): void
    {
        $this->assertNameIsInverted(name: 'Diego Aguiar ' . $postNominals, expectedInversion: 'Aguiar, Diego ' . $postNominals);
    }

    public function providePostNominals(): iterable
    {
        yield 'III' => ['III'];
        yield 'Bs.' => ['Bs.'];
        yield 'PhD' => ['PhD'];
        yield 'multiple post nominals' => ['III PhD BS.'];
    }

    public function testIntegration(): void
    {
        $this->assertNameIsInverted(name: 'MR. Diego Aguiar III BS.', expectedInversion: 'Aguiar, Diego III BS.');
    }

    private function assertNameIsInverted(?string $name, string $expectedInversion): void
    {
        self::assertSame($expectedInversion, $this->nameInverter->invert($name));
    }
}
