<?php

namespace App;

use Countable;

use App\Basket;
use App\Product;

class Basket implements Countable
{

    private $amountInBasket = [];

    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    public function getTotalPrice()
    {
        $productPrices = [];

        foreach ($this->products as $product) {



            $productPrices[] = $product->price;
            
        }

        return $this->calculateShipping(array_sum($productPrices) * 1.20);
    }

    public function count()
    {
        return count($this->products);
    }

    private function calculateShipping($productPrices)
    {
        if($productPrices >= 100)
        {
            return $productPrices;
        }

        if($productPrices < 10)
        {
            return $productPrices + 3;
        }

        return $productPrices + 2;

    }

}
