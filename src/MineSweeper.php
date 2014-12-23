<?php

namespace Kata;

class MineSweeper
{

    public function render($string)
    {
        $fields = $this->getArray($string);

        $return = '';

        foreach($fields as $index => $field)
        {
            $return .= $this->getCharacter($index, $fields);
        }

        return $return;
    }

    private function getArray($string)
    {
        return str_split($string);
    }

    private function getCharacter($index, $fields)
    {
        $field = $fields[$index];

        if($this->isStar($field))
        {
            return "*";
        }

        return $this->touchedStars($index, $fields);
    }

    private function getPrevious($index, $fields)
    {
        if(isset($fields[$index - 1]))
        {
            return $fields[$index - 1];
        }

        return null;
    }

    private function getNext($index, $fields)
    {
        if(isset($fields[$index + 1]))
        {
            return $fields[$index + 1];
        }

        return null;
    }

    private function isStar($field)
    {
        return $field === "*";
    }

    private function touchesStar($index, $fields)
    {
        return $this->isStar($this->getPrevious($index, $fields)) || $this->isStar($this->getNext($index, $fields));
    }

    private function touchedStars($index, $fields)
    {
        return $this->isStar($this->getPrevious($index, $fields)) + $this->isStar($this->getNext($index, $fields));
    }
}