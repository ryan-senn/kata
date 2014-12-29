<?php

namespace Kata\Minesweeper;

/**
 * Class Character
 * @package Kata\Minesweeper
 */
class Character extends MineSweeper
{

    /**
     * @var string
     */
    private $character;

    /**
     * @param        $string
     * @param string $character
     */
    public function __construct($string, $character = "x")
    {
        $this->character = $character;

        parent::__construct($string);
    }

    /**
     * @param $index
     *
     * @return string
     */
    protected function getCharacter($index)
    {
        $field = $this->fields[$index];

        if($this->isStar($field))
        {
            return "*";
        }

        if($this->touchesStar($index))
        {
            return $this->character;
        }

        return ".";
    }

    /**
     * @param $index
     *
     * @return bool
     */
    private function touchesStar($index)
    {
        return $this->isStar($this->getPrevious($index)) || $this->isStar($this->getNext($index));
    }
}