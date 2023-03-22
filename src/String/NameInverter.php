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

        if (1 === count($nameParts)) {
            return $name;
        }

        if ('Mr.' === $nameParts[0]) {
            array_shift($nameParts);
        }

        return sprintf('%s, %s', $nameParts[1], $nameParts[0]);
    }
}
