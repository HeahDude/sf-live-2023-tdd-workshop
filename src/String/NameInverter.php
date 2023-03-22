<?php

namespace App\String;

class NameInverter
{
    public function invert(?string $name): string
    {
        if (empty($name)) {
            return '';
        }

        $nameParts = explode(' ', $name);

        if ($this->isSimpleName($nameParts)) {
            return $name;
        }

        if ($this->hasHonorifics($nameParts)) {
            $nameParts = $this->removeHonorifics($nameParts);
        }

        return sprintf('%s, %s', $nameParts[1], $nameParts[0]);
    }

    private function isSimpleName(array $nameParts): bool
    {
        return 1 === count($nameParts);
    }

    private function hasHonorifics(array $nameParts): bool
    {
        return 'Mr.' === $nameParts[0];
    }

    private function removeHonorifics(array $nameParts): array
    {
        array_shift($nameParts);

        return $nameParts;
    }
}
