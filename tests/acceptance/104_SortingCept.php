<?php

/**
 * Test #104  Sorting
 * =========================
 * Test scenario:
 * go to Category page by direct link
 * Remember first product
 * sort product by Name or other available options
 * check sorting is changed  (first product is difference now)
 */

// @group done
// @group catalog
// @group debugging

use Page\Pop as PopPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check sorting functionality on POP');

$I->amOnPage(PopPage::$URLPantry);

$I->wait(0,5);

$I->acceptThePopup($I);

// before changes
$productNameOfFirstProduct = $I->grabTextFrom(PopPage::$nameOfFirstProductLocator);

// changes
$I->click(".menu-trigger.accordion-trigger");
$I->wait(1);
$I->click(".sort-accordion-content li:nth-child(3) div");
$I->wait(2);

// check after changes

$I->seeInCurrentUrl('?dir=asc&order=price');

$I->dontSee($productNameOfFirstProduct, PopPage::$nameOfFirstProductLocator);
