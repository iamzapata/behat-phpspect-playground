<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use App\Price;
use App\Shelf;
use App\Product;

class ShelfSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Shelf');
    }  

    function it_sets_product(Product $product)
    {

    	$this->setProduct($product);
    	$this->products->shouldContain($product);
    }

    function it_should_return_given_product_by_name()
    {
    	$name = "Tamagotchi";
    	$product = new Product($name, 100);
    	$this->setProduct($product);
    	$this->getProduct($name)->shouldReturn($product);
    }

}
