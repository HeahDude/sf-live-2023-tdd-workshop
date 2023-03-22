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

        if (1 === count($nameParts)) { // handle simple name
            return $name;
        }

        // handle honorifics
        if ('Mr.' === $nameParts[0]) { // starts with honorifics
            array_shift($nameParts); // remove honorifics
        }

        return sprintf('%s, %s', $nameParts[1], $nameParts[0]);
    }
}
