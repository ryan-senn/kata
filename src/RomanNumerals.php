<?php

namespace Kata;

class RomanNumerals
{

    private $numerals = [
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    public function numeral($number)
    {
        if(array_key_exists($number, $this->numerals))
        {
            return $this->numerals[$number];
        }

        return str_repeat('I', $number);
    }
}