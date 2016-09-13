<?php

namespace App;

use Countable;

use App\Basket;
use App\Product;

class Basket implements Countable
{

	public $products;

	public $basketPrice = 0.0;

	public $shelf;

	public function __construct(Shelf $shelf)
	{
		$this->shelf = $shelf;
	}

    public function addProduct(Product $product)
    {
    	$this->products[] = $product;
    }

    public function count()
    {
        return count($this->products);
    }

    public function getTotalPrice()
    {
    	
    }
}
