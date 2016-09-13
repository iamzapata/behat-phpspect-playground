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

    function it_sets_product_price(Product $product, Price $price)
    {

    	$this->setProductPrice($product, $price);
    	$this->products->shouldContain($product);
    	$this->products[0]->price->shouldEqual($price);
    }

}
