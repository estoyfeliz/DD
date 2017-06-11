<?php

/**
 * Test # 002 Log in / Log out
 * ==============================
 * Test scenario:
 * LOGIN
 * go to homepage
 * click at sign in link in header - to check possibility reach page from home page
 * check presentation of 2 fields (email and password)
 * click at sign in button
 * check presentation alert messages - it also show as information about JS works ok
 * Login with already existing account
 * check - customer should be redirected to my account page
 * ==============================
 * LOGOUT
 * click logout at header link
 * check message "You are now logged out"
 * after 5 sec customer should be redirected to home page
 */

// @group done
// @group customer


use Page\Base as BasePage;
use Page\Home as HomePage;
use Page\Login as LoginPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check login / logout functionality');

$I->amOnPage(LoginPage::$URL);
$I->acceptThePopup($I);

$I->waitForElementVisible(LoginPage::$fieldEmail);
$I->seeElement(LoginPage::$fieldEmail);
$I->seeElement(LoginPage::$fieldPassword);

$I->dontSee("This is a required field.");
$I->click(LoginPage::$buttonLogin);
$I->see("This is a required field.");

$I->amGoingTo("Login on the web site with already existing email and password");
$I->fillField(LoginPage::$fieldEmail, BasePage::$email);
$I->fillField(LoginPage::$fieldPassword, BasePage::$password);
$I->click(LoginPage::$buttonLogin);
$I->waitForElementVisible('.hello');
MyAccountPage::amIOnMyAccountPage($I);

/* L O G O U T */
$I->amGoingTo("Log out from site");
$I->click(HomePage::$menuAccount);
$I->wait(2);
$I->click(HomePage::$menuItemLogOut);
$I->waitForText('You have logged out');
$I->see("You have logged out");
$I->seeCurrentUrlEquals("/customer/account/logoutSuccess/");
$I->wait(6);
$I->seeCurrentUrlEquals("/");