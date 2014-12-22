<?php

namespace Kata;

class MineSweeper
{

    public function render($string)
    {
        $return = '';

        $fields = str_split($string);

        foreach($fields as $index => $field)
        {
            if($field === "*")
            {
                $return .= "*";
            }
            elseif
            (
                (isset($fields[$index-1]) && $fields[$index-1] === "*") ||
                (isset($fields[$index+1]) && $fields[$index+1] === "*")
            )
            {
                $return .= "x";
            }
            else
            {
                $return .= ".";
            }
        }

        return $return;
    }
}