<?php

namespace Kata;

/**
 * Class StringCalculator
 */
class StringCalculator
{

    /**
     * @var array
     */
    private $separators = [",", "\n"];

    /**
     * @param $string
     *
     * @return number
     */
    public function add($string)
    {
        $numbers = $this->getNumbers($string);

        // should be instructions passed to the add method
        $this->validate($numbers);
        $numbers = $this->filter($numbers);

        return array_sum($numbers);
    }

    /**
     * @param $string
     *
     * @return array
     */
    private function getNumbers($string)
    {
        $string = $this->sanitize($string);

        return explode("|", $string);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    private function sanitize($string)
    {
        $separators = $this->getSeparators($string);

        return str_replace($separators, "|", $string);
    }

    /**
     * @param $string
     *
     * @return array
     */
    private function getSeparators($string)
    {
        if($this->hasSeparatorInstructions($string))
        {
            $instructions = $this->getSeparatorInstructions($string);

            $dirtySeparators = explode(']', $instructions);

            $instructionFlags = ['//', '[', ']'];

            $separators = str_replace($instructionFlags, "", $dirtySeparators);

            $this->addSeparators($separators);
        }

        return $this->separators;
    }

    /**
     * @param array $separators
     *
     * @internal param $separator
     */
    private function addSeparators(array $separators)
    {
        $this->separators = array_merge($this->separators, $separators);
    }

    /**
     * @param array $numbers
     *
     * @return array
     */
    private function validate(array $numbers)
    {
        $invalidNumbers = $this->getNegativeNumbers($numbers);

        if(count($invalidNumbers))
        {
            throw new \InvalidArgumentException(implode(",", $invalidNumbers));
        }
    }

    /**
     * @param array $numbers
     *
     * @return array
     */
    private function filter(array $numbers)
    {
        return $this->getNumbersSmallerThan($numbers, 1001);
    }

    /**
     * @param array $numbers
     *
     * @return array
     */
    private function getNegativeNumbers(array $numbers)
    {
        return array_filter($numbers, function($number)
        {
            return $number < 0;
        });
    }

    /**
     * @param array $numbers
     * @param int   $max
     *
     * @return array
     */
    private function getNumbersSmallerThan(array $numbers, $max = 1001)
    {
        return array_filter($numbers, function($number) use ($max)
        {
            return $number < $max;
        });
    }

    /**
     * @param $string
     *
     * @return bool
     */
    private function hasSeparatorInstructions($string)
    {
        return substr($string, 0, 2) == "//";
    }

    /**
     * @param $string
     *
     * @return string
     */
    private function getSeparatorInstructions($string)
    {
        return strstr($string, "\n", true);
    }
}