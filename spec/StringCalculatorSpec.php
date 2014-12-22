<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\StringCalculator');
    }

    function it_should_return_zero_for_an_empty_string()
    {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_an_int_for_a_one_number_string()
    {
        $this->add("3")->shouldReturn(3);
        $this->add("450")->shouldReturn(450);
    }

    function it_adds_two_numbers_separated_by_a_comma()
    {
        $this->add("4,5")->shouldReturn(9);
    }

    function it_adds_6_numbers_separated_by_commas()
    {
        $this->add("5,5,5,5,5,5")->shouldReturn(30);
    }

    function it_allows_commas_and_new_lines_as_separators()
    {
        $this->add("5\n5,5")->shouldReturn(15);
    }

    function it_allows_to_set_the_separator_on_the_first_line()
    {
        $this->add("//;\n1;2")->shouldReturn(3);
    }

    function it_doesnt_allow_negative_numbers()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringAdd("3,-1");
    }

    function it_prints_negative_numbers_in_the_exception()
    {
        $this->shouldThrow(new \InvalidArgumentException("-1,-2"))->duringAdd("3,-1,-2");
    }

    function it_should_ignore_numbers_bigger_than_1000()
    {
        $this->add("1,1000,33333")->shouldReturn(1001);
    }

    function it_should_allow_more_than_one_character_as_separator()
    {
        $this->add("//[***]\n1***2***3")->shouldReturn(6);
    }

    function it_should_allow_multiple_separators()
    {
        $this->add("//[***][%%]\n1***2%%3")->shouldReturn(6);
    }
}