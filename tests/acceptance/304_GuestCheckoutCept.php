<?php

/**
 * Test #304 Guest checkout (CC)
 * =========================
 * Test scenario:
 * spend checkout as a Guest
 * check popup about wrong Visa card at Production
 */

// @group done
// @group checkout

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;
use Page\Checkout as CheckoutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Spend checkout as a guest');

PdpPage::addProductToCart($I);
$I->amOnPage(ShoppingCartPage::$URL);
$I->waitForText("ESTIMATED TAX & SHIPPING");
$I->click(ShoppingCartPage::$buttonCheckout);
CheckoutPage::spendCheckoutAs($I, "Guest");
CheckoutPage::spendBillingStep($I);
CheckoutPage::spendShippingMethodStep($I);
CheckoutPage::spendPaymentMethodStep($I);

