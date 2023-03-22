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

        return sprintf('%s, %s', $nameParts[1], $nameParts[0]);
    }
}
