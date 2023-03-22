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
            if ($this->isStrike($rollIndex)) {
                $score += 10 + $this->getStrikeBonus($rollIndex);

                ++$rollIndex;

                continue;
            }

            if ($this->isSpare($rollIndex)) {
                $score += 10 + $this->getSpareBonus($rollIndex);
            } else {
                $score += $this->getFrameScore($rollIndex);
            }

            $rollIndex += 2;
        }

        return $score;
    }

    private function getFrameScore(int $rollIndex): int
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
    }

    private function getSpareBonus(int $rollIndex): int
    {
        return $this->rolls[$rollIndex + 2];
    }

    private function getStrikeBonus(int $rollIndex): int
    {
        return $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
    }

    private function isStrike(int $rollIndex): bool
    {
        return 10 === $this->rolls[$rollIndex];
    }

    private function isSpare(int $rollIndex): bool
    {
        return 10 === $this->getFrameScore($rollIndex);
    }
}
