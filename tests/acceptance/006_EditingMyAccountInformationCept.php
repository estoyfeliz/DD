<?php

/**
 * Test scenario:
 * Test # 006 Editing my account information
 * =========================
 * go to my account page
 * change customer name
 * change customer lastname
 * check - changes
 * revert changes back!
 */

// @group done
// @group customer

use Page\Base as BasePage;
use Page\Login as LoginPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check possibility to edit my account information');
LoginPage::login($I);

$I->amOnPage(MyAccountPage::$URLAccountInformation);
$I->seeInField(MyAccountPage::$accountInfoFirstNameField, BasePage::$firstName);
$I->seeInField(MyAccountPage::$accountInfoLastNameField, BasePage::$lastName);
MyAccountPage::changeNameAndLastName($I);
$I->seeInCurrentUrl(MyAccountPage::$URL);
$I->expect("See new name and lastname updated - with 1 at the and");
$I->see(BasePage::$firstName."1");
$I->see(BasePage::$lastName."1");

/* R E V E R T   C H A N G E S */
$I->amGoingTo("Revert changes");
$I->amOnPage(MyAccountPage::$URLAccountInformation);
MyAccountPage::revertMyAccountChanges($I);
$I->seeInCurrentUrl(MyAccountPage::$URL);
$I->see(BasePage::$firstName);
$I->see(BasePage::$firstName);
