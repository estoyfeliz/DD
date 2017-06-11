<?php

/**
 * Test # 303 Code coupon
 * =========================
 * Test scenario:
 * Go to shopping cart in the shortest way
 * click coupon code functionality
 * apply code and check that subtotal was changed
 *
 */


// @group checkout
// @group done

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check promo code elements in Shopping Cart');

$I = new AcceptanceTester($scenario);
PdpPage::addProductToCart($I);

$I->amOnPage("/checkout/cart/");

$I->see("Shopping Basket", "h1");
//verify discount code items are available on shopping cart page
$I->seeElement("#discount-coupon-form");
$I->seeElement(ShoppingCartPage::$promoCodeBlock);

$I->fillField('#coupon_code','gorilla007');

$I->click(ShoppingCartPage::$promoCodeBlock);

$I->wait(3);

$I->see('Coupon code "gorilla007" is not valid.');


