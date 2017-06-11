<?php

/**
  * Test scenario:
 * clean the cart before testing
 */
// @group checkout

use Page\Login as UserLoginPage;

$I = new AcceptanceTester($scenario);

$I->wantTo('clean the shopping cart');
$I->maximizeWindow();
$I->amOnPage(UserLoginPage::$URL);

UserLoginPage::login($I);
$I->amOnPage('/checkout/cart/');
$I->Click('.btn-remove.btn-remove2');
$I->wait(2);
$I->Click('.btn-remove.btn-remove2');

