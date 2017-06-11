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
$I->wantTo('Check CMS links');
$I->amOnPage(HomePage::$URL);

$I->acceptThePopup($I);

//check CMS

$I->seeElement(BasePage::$CmsCompany);
$I->seeElement(BasePage::$CmsCustomer);
$I->seeElement(BasePage::$CmsInternational);
$I->seeElement(BasePage::$CmsCatering);
$I->seeElement(BasePage::$CmsLocations);
$I->seeElement(BasePage::$CmsCareers);



$I->click(BasePage::$CmsCompany);
$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});

$I->wait(4);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/company/dean-deluca-story");
//$I->switchToWindow('Gourmet Food & Fine Food Gifts | Gourmet Gift Baskets | Dean & DeLuca');
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$CmsCustomer);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(4);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/customer-service/customer-care");
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$CmsInternational);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(4);
$I->seeInCurrentUrl("/international");

$I->amOnPage(HomePage::$URL);

$I->click(BasePage::$CmsCatering);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(4);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/catering");
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$CmsLocations);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(4);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/store-locations");
$I->amOnPage(HomePage::$URL);


$I->click(BasePage::$CmsCareers);

$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $handles=$webdriver->getWindowHandles();
    $last_window = end($handles);
    $webdriver->switchTo()->window($last_window);
});
$I->wait(4);
$I->dontSeeInTitle ('404');
$I->seeInCurrentUrl("/careers");
