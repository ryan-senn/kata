<?php

namespace Kata;

/**
 * Class StringCalculator
 * @package Kata
 */
class StringCalculator
{

    /**
     * @var array
     */
    private $separators = [',', "\n"];

    /**
     * @param $string
     *
     * @return int|number
     */
    public function add($string)
    {
        $numbers = $this->getNumbers($string);

        $invalid = $this->getNegativeNumbers($numbers);

        if(count($invalid))
        {
            $message = implode(',', $invalid);
            throw new \InvalidArgumentException($message);
        }

        if(count($numbers) < 2)
        {
            return (int)$string;
        }

        return array_sum($numbers);
    }

    /**
     * @param $string
     *
     * @return array
     */
    private function getNumbers($string)
    {
        $string = $this->getFormattedString($string);

        $numbers = explode('|', $string);

        return array_filter($numbers, function($number)
        {
            return $number <= 1000;
        });
    }

    /**
     * @param $string
     *
     * @return null|string
     */
    private function getCustomSeparators($string)
    {
        $separatorDirectives = $this->getCustomSeparatorsDirectives($string);

        if($separatorDirectives !== null)
        {
            preg_match('/\[([^\)]*)\]/', $separatorDirectives, $matches);

            if(count($matches))
            {
                return explode("][", $matches[1]);
            }

            return [substr($separatorDirectives, 2, 1)];
        }

        return null;
    }

    private function getCustomSeparatorsDirectives($string)
    {
        if(substr($string, 0, 2) === "//")
        {
            return strstr($string, "\n", true);
        }

        return null;
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    private function getFormattedString($string)
    {
        if($this->getCustomSeparators($string) !== null)
        {
            $this->separators = array_merge($this->separators, $this->getCustomSeparators($string));

            $string = substr($string, strlen($this->getCustomSeparatorsDirectives($string)) + 1);
        }

        return str_replace($this->separators, '|', $string);
    }

    /**
     * @param array $numbers
     *
     * @return array
     */
    private function getNegativeNumbers($numbers)
    {
        return array_filter($numbers, function($number)
        {
            return $number < 0;
        });
    }
}