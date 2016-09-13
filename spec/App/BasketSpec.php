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

    function let(Shelf $shelf)
    {
        $this->beConstructedWith($shelf);
    }

    function it_should_let_add_products(Product $product)
    {
    	$this->addProduct($product);
    	$this->products->shouldContain($product);
    }

    function it_should_show_product_count()
    {
    	$this->addProduct(new Product);
    	$this->addProduct(new Product);
    	$this->addProduct(new Product);
    	$this->count()->shouldEqual(3);
    }

    function it_should_return_total_basket_price(Shelf $shelf, Basket $basket)
    {
    	$iphone7Price = new Price(450);
    	$iphone7 = new Product("iPhone 7", $iphone7Price);   
    	$shelf->setProductPrice($iphone7, $iphone7Price);

		$iMacPrice = new Price(1300);
    	$iMac = new Product("iMac");   
    	$shelf->setProductPrice($iMac, $iMacPrice);

    	$iPad = new Product("iPad Mini 2");
    	$ipadPrice = new Price(200);
    	$shelf->setProductPrice($iPad, $ipadPrice);

		$this->addProduct($iphone7);
    	$this->addProduct($iMac);
    	$this->addProduct($iPad);

    	$this->getTotalPrice()->shouldEqual(1950);
    }

}
