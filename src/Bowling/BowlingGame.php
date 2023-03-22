<?php

namespace App\Bowling;

class BowlingGame
{
    /** @var array<int> */
    private array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $rollIndex = 0;

        for ($frame = 0; $frame < 10; ++$frame) {
            if (10 === $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1]) {
                $score += 10 + $this->rolls[$rollIndex + 2];
            } else {
                $score += $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
            }

            $rollIndex += 2;
        }

        return $score;
    }
}
