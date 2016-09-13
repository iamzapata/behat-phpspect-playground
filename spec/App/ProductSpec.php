<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use App\Product;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Product');
    }

   	function let($name, $price)
   	{
   		$this->beConstructedWith($name, $price);
   	}

    function it_should_store_name()
    {


    }
}
