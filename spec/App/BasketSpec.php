<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use App\Price;	
use App\Shelf;
use App\Basket;
use App\Product;

class BasketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Basket');
    }

    function it_should_allow_products_to_be_added()
    {
    	$this->addProduct(new Product("Pizza", 20));
    	$this->addProduct(new Product("Hamburger", 15));
    	$this->addProduct(new Product("Hot Dog", 5));

    	$this->count()->shouldEqual(3);
    }

    function it_should_return_total_basket_amount_including_vat()
    {
    	$this->addProduct(new Product("iPhone 7", 500));
    	$this->addProduct(new Product("iPad Mini 2", 240));
    	$this->addProduct(new Product("iMac 27", 1350));

    	$subTotal = 2090;

    	$VAT = $subTotal * 0.20;

    	$total = $subTotal + $VAT;

    	$this->getTotalPrice()->shouldEqual($total);
    }

}
