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

    function it_updates_normal_items_on_the_sell_date()
    {

        $this->beConstructedThrough('of',['normal',10,0]);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    function it_updates_normal_items_after_the_sell_date()
    {

        $this->beConstructedThrough('of',['normal',10,-5]);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-6);
    }

    function it_updates_normal_items_with_a_quality_of_0()
    {

        $this->beConstructedThrough('of',['normal',0,5]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(4);
    }

    function it_updates_Brie_items_before_the_sell_date()
    {

        $this->beConstructedThrough('of',['Aged Brie',10,5]);

        $this->tick();

        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(4);
    }

    function it_updates_Brie_items_before_the_sell_date_with_maximum_quality()
    {

        $this->beConstructedThrough('of',['Aged Brie',50,5]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    function it_updates_Brie_items_on_the_sell_date()
    {

        $this->beConstructedThrough('of',['Aged Brie',10,0]);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-1);
    }

    function it_updates_Brie_items_on_the_sell_date_near_maximum_quality()
    {

        $this->beConstructedThrough('of',['Aged Brie',49,0]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    function it_updates_Brie_items_on_the_sell_date_with_maximum_quality()
    {

        $this->beConstructedThrough('of',['Aged Brie',50,0]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    function it_updates_Brie_items_after_the_sell_date()
    {

        $this->beConstructedThrough('of',['Aged Brie',10,-10]);

        $this->tick();

//        $this->quality->shouldBe(12);
//        $this->sellIn->shouldBe(-1);
    }

    function it_updates_Brie_items_after_the_sell_date_with_maximum_quality()
    {

        $this->beConstructedThrough('of',['Aged Brie',50,-10]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-11);
    }




}
