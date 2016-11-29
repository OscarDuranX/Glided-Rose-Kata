<?php

namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GildedRoseSpec
 * @package spec\App
 */
class GildedRoseSpec extends ObjectBehavior
{
    /**
     * Check it is initializable
     */
    function it_is_initializable()
    {
        $this->beConstructedThrough('of',['normal',10,5]);
        $this->shouldHaveType(GildedRose::class);
    }

    /**
     * Check it is initializable
     */
    function it_updates_normal_items_before_sell_date()
    {
        $this->beConstructedThrough('of',['normal',10,5]);

        $this->tick();

        $this->quality->shouldBe(9);
        $this->sellIn->shouldBe(4);
    }
}
