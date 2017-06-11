<?php

/**
 * Test #301 Shopping cart functionality
 * =========================
 * Test scenario:
 * Go to shopping cart in the shortest way
 * check Shopping page elements
 * change qty of products in cart
 * remove product from shopping cart
 */


// @group checkout
// @group done

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;

$I = new AcceptanceTester($scenario);

$I->wantTo('Check Shopping cart page elements');

PdpPage::addProductToCart($I);

$I->amOnPage("/checkout/cart/");

$I->wait(3);

$I->see("Shopping Basket", "h1");

$charactersToRemove = array("$", ",");
$subtotal = str_replace($charactersToRemove, "", $I->grabTextFrom(ShoppingCartPage::$productSubtotalPrice));
$name = $I->grabTextFrom(ShoppingCartPage::$productName);
$quantity = 2;

$I->fillField(ShoppingCartPage::$qtyField, $quantity);
$I->pressKey(ShoppingCartPage::$qtyField, WebDriverKeys::ENTER);

//verify that subtotal is correct if qty is 2

$I->seeInField(ShoppingCartPage::$qtyField,'2');

$I->click(\Page\ShoppingCart::$removeProduct);

$I->see("Shopping Cart is Empty", "h1");