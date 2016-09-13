<?php

namespace App;

use App\Price;
use App\Product;

class Shelf
{
	public $products;

    public function setProductPrice(Product $product, Price $price)
    {
    	$product->price = $price;
        $this->products[] = $product;
    }

    public function getProductPrice($product)
    {
        
    }


}
