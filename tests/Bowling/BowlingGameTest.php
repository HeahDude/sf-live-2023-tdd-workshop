<?php

namespace App\Tests\Bowling;

use App\Bowling\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    private BowlingGame $bowlingGame;

    protected function setUp(): void
    {
        $this->bowlingGame = new BowlingGame();
    }

    public function testAllGutter()
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->bowlingGame->roll(0);
        }

        self::assertSame(0, $this->bowlingGame->score());
    }

    public function testAllOnes()
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->bowlingGame->roll(1);
        }

        self::assertSame(20, $this->bowlingGame->score());
    }
}
