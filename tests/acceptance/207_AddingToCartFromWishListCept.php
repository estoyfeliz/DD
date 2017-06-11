<?php

/**
 * Test # 207 Adding to cart from wish list
 * =========================
 * Test scenario:
 * add product to wishlist
 * add to cart from wishlist
 * should be redirected to PDP page as option were not preselcted before
 * preselect option
 * click add to cart button
 * check product in shopping cart
 */


// @group product
// @group done

use Page\Login as LoginPage;
use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;

$I = new AcceptanceTester($scenario);
$PDP = new \Page\Pdp();
$I->wantTo('Add Product to cart from wishlist');

LoginPage::login($I);

$I->amOnPage(PdpPage::$URL);

$I->click('.button.btn-cart');
$I->click(PdpPage::$LinkWishlist);
$I->waitForElement('.my-wishlist');
$I->click('.button.btn-cart');
$I->waitForElement('.page-title.title-buttons');
$I->amOnPage("/checkout/cart/");
$I->waitForElementVisible(ShoppingCartPage::$productName);
$I->seeElement(ShoppingCartPage::$productName);

$I->click(ShoppingCartPage::$removeProduct);

$I->see('You have no items in your shopping basket.');

