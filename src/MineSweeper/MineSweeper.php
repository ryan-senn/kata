<?php

namespace Kata\Minesweeper;

/**
 * Class MineSweeper
 * @package Kata
 */
abstract class MineSweeper
{

    /**
     * @var array
     */
    protected $fields;

    /**
     * @param $string
     */
    public function __construct($string)
    {
        $this->fields = str_split($string);
    }

    /**
     * @return string
     */
    public function render()
    {
        $return = '';

        foreach($this->fields as $index => $field)
        {
            $return .= $this->getCharacter($index, $method);
        }

        return $return;
    }

    /**
     * @param $index
     *
     * @return null
     */
    protected function getPrevious($index)
    {
        if(isset($this->fields[$index - 1]))
        {
            return $this->fields[$index - 1];
        }

        return null;
    }

    /**
     * @param $index
     *
     * @return null
     */
    protected function getNext($index)
    {
        if(isset($this->fields[$index + 1]))
        {
            return $this->fields[$index + 1];
        }

        return null;
    }

    /**
     * @param $field
     *
     * @return bool
     */
    protected function isStar($field)
    {
        return $field === "*";
    }
}