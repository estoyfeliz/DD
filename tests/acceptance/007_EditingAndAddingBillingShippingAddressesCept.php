<?php

/**
 * Test scenario:
 * Test # 007 Editing and adding billing, shipping addresses
 * =========================
 * go to my account page
 * change billing and shipping address
 * check changes
 * add additional billing or shipping address
 * check - changes
 */

// @group done
// @group customer

use Page\Base as BasePage;
use Page\Login as LoginPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check possibility add new address and edit existing one');
LoginPage::login($I);
$I->click('.account-navigation .accordion-trigger');
$I->wait(1);
$I->click('.account-navigation li:nth-child(3) a');
$I->waitForText('Default Addresses');
$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook);

//* C H A N G E   B I L L I N G  */
$I->amGoingTo("CHANGE BILLING");
$I->click('.address-column.addresses-primary .item:nth-child(1) p a');
$I->wait(1);
$I->seeInCurrentUrl("/customer/address/edit/id/180317/");

MyAccountPage::changeBillingShippingAddress($I);

$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook1);
$I->expectTo("See changed fields at the page");
$I->see(BasePage::$firstName."1");
$I->see(BasePage::$firstName."1");
$I->see('112 W Jackson blvd');

$I->amGoingTo("Revert changes in billing");

$I->click('.address-column.addresses-primary .item:nth-child(1) p a');
$I->waitforElement('#shipping:firstname');
MyAccountPage::revertBillingShippingAddress($I);
$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook);
$I->expectTo("See changed fields at the page");
$I->see(BasePage::$firstName);
$I->see(BasePage::$firstName);
$I->see(BasePage::$street);

/* C H A N G E   S H I P P I N G  */

$I->amGoingTo("CHANGE Shipping");
$I->click('.address-column.addresses-primary .item:nth-child(2) p a'); //Edit Shipping Address
$I->seeInCurrentUrl('/customer/address/edit/id/180316/');
$I->waitForElementVisible('#shipping:firstname');
$I->seeElement('#shipping:firstname');

MyAccountPage::changeBillingShippingAddress($I);

$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook);
$I->expectTo('See changed fields at the page');
$I->see(BasePage::$firstName."1");
$I->see(BasePage::$firstName."1");
$I->see('112 W Jackson blvd');


$I->amGoingTo('Revert changes');
$I->click('.address-column.addresses-primary .item:nth-child(2) p a');
MyAccountPage::revertBillingShippingAddress($I);
$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook);
$I->expectTo('See changed fields at the page');
$I->see(BasePage::$firstName);
$I->see(BasePage::$firstName);
$I->see(BasePage::$street);

/* A D D   N E W   A D D R E S S  */
$I->amGoingTo('add additional address');
$I->click('.address-column button');//add new address button
$I->seeInCurrentUrl('/customer/address/new/');
MyAccountPage::addNewAddress($I);
//$I->amGoingTo("Delete already created address");
//$I->click("Delete Address");
//$I->acceptPopup();
//$I->expect("address should be deleted");
//$I->see("The address has been deleted.");