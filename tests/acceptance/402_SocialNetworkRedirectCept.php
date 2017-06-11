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
$I->wantTo('Check social network redirects');
$I->amOnPage(HomePage::$URL);

$I->acceptThePopup($I);

//check social icons
$I->seeElement(BasePage::$socialFB);
$I->seeElement(BasePage::$socialTwitter);
$I->seeElement(BasePage::$socialInstagram);
$I->seeElement(BasePage::$socialPinterest);

$I->click(BasePage::$socialFB);
$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});

$I->waitforelement(".loggedout_menubar_container");
$I->seeInCurrentUrl("/deandeluca");
$I->dontSeeInTitle ('404');
//$I->switchToWindow('Gourmet Food & Fine Food Gifts | Gourmet Gift Baskets | Dean & DeLuca');
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$socialTwitter);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});

$I->waitforelement(".ProfileCanopy-header.u-bgUserColor");
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/DeanAndDeluca");
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$socialInstagram);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(5);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/deandeluca");

$I->amOnPage(HomePage::$URL);

$I->click(BasePage::$socialPinterest);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(5);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/deananddeluca");
$I->amOnPage(HomePage::$URL);
