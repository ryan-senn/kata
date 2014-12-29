<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\RomanNumerals');
    }

    function it_should_return_I_for_1()
    {
        $this->numeral(1)->shouldReturn('I');
    }

    function it_should_return_II_for_2()
    {
        $this->numeral(2)->shouldReturn('II');
    }

    function it_should_return_V_for_5()
    {
        $this->numeral(5)->shouldReturn('V');
    }

    function it_should_return_X_for_10()
    {
        $this->numeral(10)->shouldReturn('X');
    }

    function it_should_return_IV_for_4()
    {
        $this->numeral(4)->shouldReturn('IV');
    }
}