<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MineSweeperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\MineSweeper');
    }

    function it_should_replace_dots_with_x_if_it_touches_a_star()
    {
        $this->render("*.*....**")->shouldReturn("*x*x..x**");
        $this->render("..**..*.*")->shouldReturn(".x**xx*x*");
        $this->render("*...*.**.")->shouldReturn("*x.x*x**x");
    }
}