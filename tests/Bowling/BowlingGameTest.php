<?php

namespace App\Tests\Bowling;

use App\Bowling\BowlingGame;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
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

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->bowlingGame->roll(3); // following roll is counted as bonus

        $this->rollMany(times: 17, pins: 0);

        self::assertSame(16, $this->bowlingGame->score());
    }

    public function testOneStrike()
    {
        $this->rollStrike();
        $this->bowlingGame->roll(3); // following two rolls are counted as bonus
        $this->bowlingGame->roll(4);

        $this->rollMany(times: 16, pins: 0);

        self::assertSame(24, $this->bowlingGame->score());
    }

    public function testPerfectGame()
    {
        $this->rollMany(times: 12, pins: 10);

        self::assertSame(300, $this->bowlingGame->score());
    }

    private function rollMany(int $times, int $pins): void
    {
        for ($i = 0; $i < $times; ++$i) {
            $this->bowlingGame->roll($pins);
        }
    }

    private function rollSpare(): void
    {
        $this->bowlingGame->roll(5);
        $this->bowlingGame->roll(5);
    }

    private function rollStrike(): void
    {
        $this->bowlingGame->roll(10);
    }
}
