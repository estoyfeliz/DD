<?php

/***
 * Test # 001 Create account
 * ==============================
 * Test scenario:
 * go to /customer/account/create/
 * check all fields are present
 * press button “Create account”
 * check all validation messages are present - it also show as information about JS works ok
 * fill all required information such as first name, last name, email password
 * check checkbox sign for newsletter
 * press button “Create account”
 * check that new customer was created
 * customer should be redirected to “my account page”
 * check elements at this page - such as name last name email
 */

// @group done
// @group customer
// @group testenv


use Page\Base as BasePage;
use Page\Registration as RegistrationPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Create new customer account');

$I->amOnPage(RegistrationPage::$URL);
$I->wait(2);
$I->acceptThePopup($I);

$I->comment('check that all fields are present on registration page ');
$I->seeElement(RegistrationPage::$fieldName);
$I->seeElement(RegistrationPage::$fieldLastName);
$I->seeElement(RegistrationPage::$fieldEmail);
$I->seeElement(RegistrationPage::$fieldPassword);
$I->seeElement(RegistrationPage::$fieldConfirmPassword);

$I->comment('check all validation messages are present - it also show as information about JS works ok');
$I->click(RegistrationPage::$buttonRegister);
$I->seeElement("//*[@id='advice-required-entry-firstname']");
$I->seeElement("//*[@id='advice-required-entry-lastname']");
$I->seeElement("//*[@id='advice-required-entry-email_address']");
$I->seeElement("//*[@id='advice-required-entry-password']");
$I->seeElement("//*[@id='advice-required-entry-confirmation']");

$I->amGoingTo('fill all fields with correct data ');
$I->fillField(RegistrationPage::$fieldName, BasePage::$firstName);
$I->fillField(RegistrationPage::$fieldLastName, BasePage::$lastName);
$email = BasePage::getRandomEmail();
$I->fillField(RegistrationPage::$fieldEmail, $email);
$I->fillField(RegistrationPage::$fieldPassword, BasePage::$password);
$I->fillField(RegistrationPage::$fieldConfirmPassword, BasePage::$password);
$I->checkOption("#is_subscribed");
$I->click(RegistrationPage::$buttonRegister);
$I->expectTo('new user has been created');
MyAccountPage::amIOnMyAccountPageIfRegistered($I);
$I->see($email);
$I->click(MyAccountPage::$newsletterSubscriptions);
$I->seeCheckboxIsChecked("#subscription");
$I->comment('In case of all elements are visible on MyAccount page we can assume that user has been successfully created and this test is passed');