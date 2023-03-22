<?php

namespace App\String;

class NameInverter
{
    public function invert(?string $input): string
    {
        if (empty($input)) {
            return '';
        }

        return $input;
    }
}
