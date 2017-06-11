<?php

/**
 * Test #305
 * =========================
 * Test scenario:
 * check popup about wrong Visa card at Production
 */

// @group done
// @group checkout
// @group test

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;
use Page\Checkout as CheckoutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Spend checkout and register while checkout');

PdpPage::addProductToCart($I);
$I->amOnPage(ShoppingCartPage::$URL);
$I->waitForText("ESTIMATED TAX & SHIPPING");
$I->click(ShoppingCartPage::$buttonCheckout);
CheckoutPage::spendCheckoutAs($I, "Register");
CheckoutPage::spendBillingStep($I);
CheckoutPage::spendShippingMethodStep($I);
CheckoutPage::spendPaymentMethodStep($I);



