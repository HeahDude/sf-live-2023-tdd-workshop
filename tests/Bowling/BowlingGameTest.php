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
        $this->rollMany(times: 20, pins: 0);

        self::assertSame(0, $this->bowlingGame->score());
    }

    public function testAllOnes()
    {
        $this->rollMany(times: 20, pins: 1);

        self::assertSame(20, $this->bowlingGame->score());
    }

    private function rollMany(int $times, int $pins): void
    {
        for ($i = 0; $i < $times; ++$i) {
            $this->bowlingGame->roll($pins);
        }
    }
}
