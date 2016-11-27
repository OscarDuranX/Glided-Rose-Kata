<?php

namespace spec\src;

use src\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GildedRoseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GildedRose::class);
    }
}
