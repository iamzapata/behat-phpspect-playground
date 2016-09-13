Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under £10 is £3
  - Delivery for basket over £10 is £2
  - Shipping over £100 is free

  Scenario: Buying a single product under £10
    Given there is a Product "Sith Lord Lightsaber", which costs Price £5
    When I add the Product "Sith Lord Lightsaber" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be Total £9

  Scenario: Buying a single product over £10
    Given there is a Product "Sith Lord Lightsaber", which costs Price £15
    When I add the Product "Sith Lord Lightsaber" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be Total £20

  Scenario: Buying two products over £10
    Given there is a Product "Sith Lord Lightsaber", which costs Price £10
    And there is a Product "Jedi Lightsaber", which costs Price £5
    When I add the Product "Sith Lord Lightsaber" to the basket
    And I add the Product "Jedi Lightsaber" to the basket
    Then I should have 2 products in the basket
    And the overall basket price should be Total £20

  Scenario: Buying a single product over £100
    Given there is a Product "Jedi Lightsaber", which costs Price £120
    When I add the Product "Jedi Lightsaber" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be Total £144

  Scenario: Buying two products over £100
    Given there is a Product "Sith Lord Lightsaber", which costs Price £50
    And there is a Product "Jedi Master Lightsaber", which costs Price £60
    When I add the Product "Sith Lord Lightsaber" to the basket
    And I add the Product "Jedi Master Lightsaber" to the basket
    Then I should have 2 products in the basket
    And the overall basket price should be Total £132


    