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

        for ($rollIndex = 0; $rollIndex < \count($this->rolls); ++$rollIndex) {
            $score += $this->rolls[$rollIndex];
        }

        return $score;
    }
}
