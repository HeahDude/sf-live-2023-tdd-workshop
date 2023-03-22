<?php

namespace App\Tests\Bowling;

use App\Bowling\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    public function testAllGutter()
    {
        $bowlingGame = new BowlingGame();

        for ($i = 0; $i < 20; ++$i) {
            $bowlingGame->roll(0);
        }

        self::assertSame(0, $bowlingGame->score());
    }

    public function testAllOnes()
    {
        $bowlingGame = new BowlingGame();

        for ($i = 0; $i < 20; ++$i) {
            $bowlingGame->roll(1);
        }

        self::assertSame(20, $bowlingGame->score());
    }
}
