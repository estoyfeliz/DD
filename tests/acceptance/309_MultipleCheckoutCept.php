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
$I->wantTo('Spend multiple address checkout');

LoginPage::login($I);
$I->amOnPage('/checkout/cart/');
$I->Click('.btn-remove.btn-remove2');
$I->Wait(2);
$I->amOnPage(PdpPage::$URL);//didn't use add to cart function not to double the popup closing
$I->click(PdpPage::$addToCartButton);
$I->amOnPage(PdpPage::$URL2);
$I->click(PdpPage::$addToCartButton);
$I->amOnPage(ShoppingCartPage::$URL);
//$I->waitForElementVisible('Shopping Basket');
$I->waitForText("ESTIMATED TAX & SHIPPING",10);
$I->click(ShoppingCartPage::$buttonMultipleCheckout);
$I->WaitforElement('tbody tr:nth-child(1) .styled-select');
$I->seeElementinDOM('tbody tr:nth-child(1) .styled-select');
$I->selectOption('tbody tr:nth-child(1) .styled-select', '182962');
$I->click("#checkout_multishipping_form .button[data-action='checkout-continue-shipping']>span");
//$I->waitForElementVisible('.custom-styled-radio [name="shipping_method"]',20);
$I->wait(3);
$I->waitForElement(".col2-set.clearfix .DynarchCalendar .DynarchCalendar-bodyTable>tbody>tr:nth-child(6)>td:nth-child(5)",20);
$I->click(".col2-set.clearfix .DynarchCalendar .DynarchCalendar-bodyTable>tbody>tr:nth-child(6)>td:nth-child(5)");
$I->wait(3);
$I->waitForElement(".col2-set.clearfix .sp-methods>dd>ul:nth-child(1)>li:nth-child(1) input");
$I->click(".col2-set.clearfix .sp-methods>dd>ul:nth-child(1)>li:nth-child(1) input");
$I->waitForElement(".col2-set.clearfix.last .DynarchCalendar .DynarchCalendar-bodyTable>tbody>tr:nth-child(6)>td:nth-child(5)",20);
$I->click(".col2-set.clearfix.last .DynarchCalendar .DynarchCalendar-bodyTable>tbody>tr:nth-child(6)>td:nth-child(5)");
$I->waitForElement(".col2-set.clearfix.last .sp-methods>dd>ul:nth-child(1)>li:nth-child(1) input",20);
$I->click(".col2-set.clearfix.last .sp-methods>dd>ul:nth-child(1)>li:nth-child(1) input");
$I->wait(3);
$I->click(".buttons-set .button.btn-large");

//$I->waitForText('Payment Method','h2');

$I->wait(3);

//switch to iframe


$I->switchToIFrame('assist_iframe');

$I->fillField(".//*[@id='cardHolderName']", "imalikova");
$I->fillField("//input[@id='cardNumber']", "4111111111111111");
$I->fillField("//input[@id='cardExpirationDate']", '0620');
$I->fillField("//input[@id='code']", '737');

//switch to parent page


$I->click(CheckoutPage::$buttonOnPaymentMethod);

$I->see('There was an issue with validating payment information');
$I->switchToIFrame();

