<?php

/**
 * Test #201 Product detail page
 * =========================
 * Test scenario:
 * Check possibility reach PDP
 * check PDP elements
 */

// @group done
// @group product

use Page\Pop as PopPage;
use Page\Home as HomePage;
use Page\Pdp as PdpPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check PDP page');

$I->amOnPage(HomePage::$URL);
$I->acceptThePopup($I);

// reach PDP

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu);
$I->click(HomePage::$Submenu);
$I->wait(1);
$I->waitForElement(HomePage::$Category);
$I->seeElement(HomePage::$Category);
$I->click(HomePage::$Category);

$I->seeInCurrentUrl('condiments');
$I->click(PopPage::$firstProductInCategory);
//$I->wait(2);


// check Elements on PDP

$I->waitForElement('#qty');
$I->seeElement('#qty');
$I->seeElement(PdpPage::$LinkWishlist);
$I->seeElement('span.price');
$I->seeElement(PdpPage::$addToCartButton);
$I->see('REVIEW SNAPSHOT');
$I->see('CUSTOMERS ALSO VIEWED');
$I->see('DETAILS');
$I->see('SHIPPING');
$I->see('SHARING');
$I->seeElement('.owl-lazy.loaded');


$I->seeFooter();