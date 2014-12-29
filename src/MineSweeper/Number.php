<?php

namespace Kata\Minesweeper;

class Number extends MineSweeper
{

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

        return $this->touchedStars($index);
    }

    /**
     * @param $index
     *
     * @return bool
     */
    private function touchedStars($index)
    {
        return $this->isStar($this->getPrevious($index)) + $this->isStar($this->getNext($index));
    }
}