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

    function it_should_return_a_single_string_number_as_int()
    {
        $this->add("3")->shouldReturn(3);
    }

    function it_should_return_the_sum_of_two_number_strings_separated_by_a_comma()
    {
        $this->add("3,5")->shouldReturn(8);
    }

    function it_should_allow_for_any_amount_of_numbers()
    {
        $this->add("5,5,5,5,5")->shouldReturn(25);
    }

    function it_should_allow_new_lines_as_separators()
    {
        $this->add("1\n2,3")->shouldReturn(6);
    }

    function it_should_allow_to_define_the_separator_on_the_first_line_if_prefixed_with_two_slahes()
    {
        $this->add("//;\n1;2")->shouldReturn(3);
    }

    function it_should_throw_an_exception_and_print_the_invalid_numbers_if_negative_numbers_are_passed()
    {
        $this->shouldThrow(new \InvalidArgumentException("-4"))->duringAdd("1,3,-4");
        $this->shouldThrow(new \InvalidArgumentException("-1,-4"))->duringAdd("-1,3,-4");
    }

    function it_should_ignore_numbers_bigger_than_1000()
    {
        $this->add("2,1001")->shouldReturn(2);
        $this->add("3,25000,4")->shouldReturn(7);
    }

    function it_should_allow_to_set_a_multi_character_separator()
    {
        $this->add("//[***]\n1***2***3")->shouldReturn(6);
    }

    function it_should_allow_for_multiple_separators()
    {
        $this->add("//[*][%]\n1*2%3")->shouldReturn(6);
    }
}