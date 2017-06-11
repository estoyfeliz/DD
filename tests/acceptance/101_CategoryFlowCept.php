<?php


/**
 * Test scenario:
 * Test # 101 Category flow
 * =========================
 * Open all categories by click on Top navigation Menu Items
 * check elements present such as product or subcategory blocks
 * check category pages for 404 page
 */


// @group category
// @group done

use Page\Home as HomePage;
use Page\Pop as PopPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check main categories are reachable ');
$I->amOnPage(HomePage::$URL);
$I->acceptThePopup($I);


$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu);
$I->click(HomePage::$Submenu);
$I->wait(1);
$I->waitForElement(HomePage::$Category);
$I->click(HomePage::$Category);
$I->seeThatNot404();
$I->seeInCurrentUrl('/food/condiments');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu1);
$I->click(HomePage::$Submenu1);
$I->wait(1);
$I->waitForElement(HomePage::$Category1);
$I->click(HomePage::$Category1);
$I->seeThatNot404();
$I->seeInCurrentUrl('/gifting/corporate-gifting');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu2);
$I->click(HomePage::$Submenu2);
$I->wait(1);
$I->waitForElement(HomePage::$Category2);
$I->click(HomePage::$Category2);
$I->seeThatNot404();
$I->seeInCurrentUrl('/beverage/cocoa');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu3);
$I->click(HomePage::$Submenu3);
$I->wait(1);
$I->waitForElement(HomePage::$Category3);
$I->click(HomePage::$Category3);
$I->seeThatNot404();
$I->seeInCurrentUrl('/home/totes-baskets');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu4);
$I->click(HomePage::$Submenu4);
$I->wait(1);
$I->seeThatNot404();
$I->seeInCurrentUrl('/favorites-finds');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu5);
$I->click(HomePage::$Submenu5);
$I->wait(1);
$I->waitForElement(HomePage::$Category5);
$I->click(HomePage::$Category5);
$I->seeThatNot404();
$I->seeInCurrentUrl('/holiday-occasions/hanukkah-gifts');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu6);
$I->click(HomePage::$Submenu6);
$I->wait(1);
$I->seeThatNot404();
$I->seeInCurrentUrl('/sale');
$I->seeFooter();

$I->click(HomePage::$MainMenu);
$I->wait(1);
$I->waitForElement(HomePage::$Submenu7);
$I->click(HomePage::$Submenu7);
$I->wait(1);
$I->seeThatNot404();
$I->seeInCurrentUrl('/recipes');
$I->seeFooter();

