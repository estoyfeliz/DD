<?php

/**
 * Test #107 Search
 * =========================
 * Test scenario:
 * enter to home page
 * search for some query - like "1"
 * check qty of products
 * check other page elements
 */

// @group done
// @group catalog

use Page\Home as HomePage;
use Page\Pop as PopPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check search functionality');

$I->amOnPage(HomePage::$URL);

$I->acceptThePopup($I);
$I->amOnPage(HomePage::$URL);
$I->WaitforElementVisible(HomePage::$searchIcon);
$I->seeElement(HomePage::$searchIcon);
$I->Click(HomePage::$searchIcon);

$I->SeeElement(HomePage::$searchField);

$I->fillField(HomePage::$searchField,'1');
$I->click('.quick-access div.form-search button'); //search button

// check results
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles = $webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->seeInCurrentUrl('/search?w=1');
$I->see("Search Results for: '1'");
$I->seeElement('#sli_pagination_header');
$I->seeNumberOfElements(PopPage::$productsInPOP, 12);

$I->seeFooter();