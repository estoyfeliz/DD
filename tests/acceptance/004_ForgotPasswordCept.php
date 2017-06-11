<?php

/***
 * Test # 004 Forgot password form
 * ==============================
 * Test scenario:
 * go to /customer/account/login/
 * click at link “Forgot Your Password?”
 * check customer at “/customer/account/forgotpassword/” page
 * enter email address and press button “Submit”
 * check - customer should be redirected to “/customer/account/login/” page
 * check - message “If there is an account associated with test@test.com you will receive an email with a link to reset your password.” present at page
 */

// @group done
// @group customer

use Page\Base as BasePage;
use Page\Login as LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check Forgot Password Form');

$I->amGoingTo('Reach the login page and press button forgot password');
$I->amOnPage(LoginPage::$URL);
$I->acceptThePopup($I);
$I->wait(1);
$I->click(".note>a");
//$I->wait(2);
$I->waitForElementVisible('.forgot-password-form');
$I->seeInCurrentUrl("/customer/account/forgotpassword/");
$I->seeElement(LoginPage::$forgotPasswordEmailField);
$I->amGoingTo('Check alert presentation on this page');
$I->click(LoginPage::$forgotPasswordSubmitButton);
$I->wait(0.5);
$I->expect('the form is not submitted, it is just for check validation');
$I->seeElement('#advice-required-entry-email_address');
$I->amGoingTo('Enter real email and press button submit');
$I->fillField(LoginPage::$forgotPasswordEmailField, BasePage::$email);
$I->click(LoginPage::$forgotPasswordSubmitButton);
$I->waitForElementVisible('.account-login');
$I->seeInCurrentUrl(LoginPage::$URL);
$I->expect('to see the success message');
$I->see("If there is an account associated with auto-test@test.com you will receive an email with a link to reset your password.");