<?php

/**
 * Test #308
 * =========================
 * Test scenario:
 * first login
 * then proceed checkout
 * check popup about wrong Visa card at Production
 */

// @group done
// @group checkout

use Page\Pdp as PdpPage;
use Page\ShoppingCart as ShoppingCartPage;
use Page\Checkout as CheckoutPage;
use Page\Login as LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Spend checkout as an already loginned user');

LoginPage::login($I);
$I->amOnPage(PdpPage::$URL);//didn't use add to cart function not to double the popup closing
$I->click(PdpPage::$addToCartButton);
$I->amOnPage(ShoppingCartPage::$URL);
$I->waitForText("ESTIMATED TAX & SHIPPING");
$I->click(ShoppingCartPage::$buttonCheckout);
CheckoutPage::spendCheckoutAs($I, "Already logged in");
CheckoutPage::spendBillingStep($I);
CheckoutPage::spendShippingMethodStep($I);
CheckoutPage::spendPaymentMethodStep($I);



