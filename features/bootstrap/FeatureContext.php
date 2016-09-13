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
     * @Given there is a Product :product, which costs Price £:price
     */
    public function thereIsAProductWhichCostsPricePs($product, $price)
    {
        $product = new Product($product, $price);
        $this->shelf->setProduct($product);

    }

    /**
     * @When I add the Product :product to the basket
     */
    public function iAddTheProductToTheBasket($product)
    {
        $product = $this->shelf->getProduct($product);

        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit_Framework_Assert::assertCount(
            intval($count),
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
