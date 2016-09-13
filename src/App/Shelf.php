<?php

namespace App;

use App\Price;
use App\Product;

class Shelf
{
	public $products;

    public function setProduct(Product $product)
    {    
        $this->products[] = $product;
    }

    public function getProduct($name)
    {
        foreach ($this->products as $product) {
        	
        	if($product->name == $name)
        	{
        		return $product;
        	}

        }
    }

}
