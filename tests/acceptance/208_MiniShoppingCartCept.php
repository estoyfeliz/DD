<?php

/**
 * Test # 208 Removing/Editing items from mini-shopping cart
 * =========================
 * Test scenario:
 * add product to shopping cart
 * press remove button from mini shopping cart
 * check that product was removed from shopping cart
 */

// @group done
// @group product


use Page\Pdp as PdpPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check  mini shopping cart functionality');
PdpPage::addProductToCart($I);
$I->amOnPage('/');
$I->waitForElementVisible('.quick-access .icon-cart');
$I->click('.quick-access .icon-cart');
$I->wait(2);
$I->waitForElementVisible('a.remove.btn-close');
$I->click('a.remove.btn-close'); //remove from mini shopping cart
$I->wait(1);
$I->acceptPopup();
$I->wait(1);
$I->amOnPage('/checkout/cart/?___SID=U');
$I->wait(1);
$I->see('You have no items in your shopping basket.');

