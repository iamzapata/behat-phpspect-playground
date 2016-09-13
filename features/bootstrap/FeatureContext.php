<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use App\Price;
use App\Shelf;
use App\Basket;
use App\Product;


/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    
    public function __construct() 
    {
        $this->shelf = new Shelf;
        $this->basket = new Basket;
    }
    

    /**
     * @Given there is a Product :productName, which costs £:productPrice
     */
    public function thereIsAProductWhichCostsPs($productName, $productPrice)
    {
        $product = new Product($product);
        $price = new Price(floatval($price));
        $this->shelf->setProductPrice($product, $price);
    }

    /**
     * @When I add the Product :productName to the basket
     */
    public function iAddTheProductToTheBasket($productName)
    {
        $product = new Product($product);
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :productCount product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($productCount)
    {
        PHPUnit_Framework_Assert::assertCount(
            intval($productCount),
            $this->basket
        );    
    }

    /**
     * @Then the overall basket price should be Total £:price
     */
    public function theOverallBasketPriceShouldBeTotalPs($price)
    {
        PHPUnit_Framework_Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }
}
