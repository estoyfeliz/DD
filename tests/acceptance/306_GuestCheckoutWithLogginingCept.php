<?php

/**
 * Test #306
 * =========================
 * Test scenario:
 * spend checkout as a Guest and login while checkout
 * check popup about wrong Visa card at Production
 */

// @group done
// @group checkout
// @group test

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;
use Page\Checkout as CheckoutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Spend checkout and login while checkout');
PdpPage::addProductToCart($I);
$I->amOnPage(ShoppingCartPage::$URL);
$I->waitForText("ESTIMATED TAX & SHIPPING");
$I->click(ShoppingCartPage::$buttonCheckout);
$I->waitForElementVisible(CheckoutPage::$email);
CheckoutPage::spendCheckoutAs($I, "LoginInCheckout");
CheckoutPage::spendBillingStep($I);
CheckoutPage::spendShippingMethodStep($I);
CheckoutPage::spendPaymentMethodStep($I);


