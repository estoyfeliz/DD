<?php

/**
 * Test scenario
 * # NAME
 *
 *
 */


// @group cmspages
// @group done

use Page\Base as BasePage;
use Page\Home as HomePage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check Store Locations');
$I->amOnPage(HomePage::$URL);

$I->acceptThePopup($I);


$I->seeElement(BasePage::$CmsLocations);


$I->click(BasePage::$CmsLocations);
$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});

$I->wait(5);
$I->seeInCurrentUrl("/store-locations");
$I->dontSeeInTitle ('404');

$I->seeElement(".profile-image>a>img");
$I->seeElement(".locations");

$I->click(".section:nth-child(1) .locations>li:nth-child(1) address a");

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});

$I->seeInCurrentUrl("/maps/place/Dean");
