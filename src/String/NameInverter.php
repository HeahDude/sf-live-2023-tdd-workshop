<?php

namespace App\String;

class NameInverter
{
    private const HONORIFICS_REGEX = '/^(' // starts with
        . 'mr' // mister
        . '|miss'
        . '|ms'
        . '|mrs'
        . '|dr)' // doctor
        . '\.?'
        . '$/i' // ends with, case-insensitive
    ;

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

        $postNominals = array_slice($nameParts, 2);

        return trim(sprintf('%s, %s %s', $nameParts[1], $nameParts[0], implode(' ', $postNominals)));
    }

    private function isSimpleName(array $nameParts): bool
    {
        return 1 === count($nameParts);
    }

    private function hasHonorifics(array $nameParts): bool
    {
        return preg_match(self::HONORIFICS_REGEX, $nameParts[0]);
    }

    private function removeHonorifics(array $nameParts): array
    {
        array_shift($nameParts);

        return $nameParts;
    }

    private function getPostNominals(array $nameParts): string
    {

    }
}
