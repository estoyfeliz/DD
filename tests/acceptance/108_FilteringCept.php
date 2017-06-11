<?php

/**
 * Test #108 Filtering
 * =========================
 * Test scenario:
 * go to Category page by direct link
 * select some of filters (attribute) from layer navigation
 * check - filter is selected
 * check - amount of product has been reduced (if it is possible)
 */

use Page\Pop as PopPage;

// @group done
// @group catalog

$I = new AcceptanceTester($scenario);

$I->wantTo('Check filtering functionality on POP');

$I->amOnPage(PopPage::$URLPantry);

$I->acceptThePopup($I);

$I->waitForElement("div.toolbar-menu-item a.menu-trigger");

$I->click("div.toolbar-menu-item a.menu-trigger");

$I->wait(1);

$I->click("ul.filters-list.clearfix li:nth-child(2) ul.filter-options li:nth-child(2)"); //click on price filter

//check

$I->see("$100.00 - $199.99");

$I->seeNumberOfElements(PopPage::$productsInPOP, [1,70]);

$I->seeInCurrentUrl('price=100-200');

$I->seeElement('a.btn-remove');

// remove preselected filter

$I->seeFooter();
$I->seeThatNot404();
$I->click('a.btn-remove');
$I->wait(2);

$I->seeNumberOfElements(PopPage::$productsInPOP, [1,120]);

