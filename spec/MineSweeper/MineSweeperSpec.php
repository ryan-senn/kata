<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MineSweeperSpec extends ObjectBehavior
{

    function it_should_replace_dots_with_x_if_it_touches_a_star_1()
    {
        $this->beConstructedWith("*.*....**");
        $this->shouldHaveType('Kata\MineSweeper\Character');
        $this->render()->shouldReturn("*x*x..x**");
    }

    function it_should_replace_dots_with_x_if_it_touches_a_star_2()
    {
        $this->beConstructedWith("..**..*.*");
        $this->shouldHaveType('Kata\MineSweeper\Character');
        $this->render()->shouldReturn(".x**xx*x*");
    }

    function it_should_replace_dots_with_x_if_it_touches_a_star_3()
    {
        $this->beConstructedWith("*...*.**.");
        $this->shouldHaveType('Kata\MineSweeper\Character');
        $this->render()->shouldReturn("*x.x*x**x");
    }

    function it_should_replace_dots_with_the_amount_of_touched_stars_1()
    {
        $this->beConstructedWith("*.*....**");
        $this->shouldHaveType('Kata\MineSweeper\Number');
        $this->render()->shouldReturn("*2*1001**");
    }

    function it_should_replace_dots_with_the_amount_of_touched_stars_2()
    {
        $this->beConstructedWith("..**..*.*");
        $this->shouldHaveType('Kata\MineSweeper\Number');
        $this->render()->shouldReturn("01**11*2*");
    }

    function it_should_replace_dots_with_the_amount_of_touched_stars_3()
    {
        $this->beConstructedWith("**..*.**.");
        $this->shouldHaveType('Kata\MineSweeper\Number');
        $this->render()->shouldReturn("**11*2**1");
    }

    function it_should_allow_user_to_specify_its_own_replacement_character_when_it_touches_a_star()
    {
        $this->beConstructedWith("*...*.**.", "-");
        $this->shouldHaveType('Kata\MineSweeper\Character');
        $this->render()->shouldReturn("*-.-*-**-");
    }
}