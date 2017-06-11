<?php

/**
 * Test # 005 My Account
 * ==============================
 * Test scenario:
 * Login on site in most short way As login functionality were checked in other test
 *      go to /customer/account/login/
 *      enter valid email and password
 *      login on site
 * check all my account page element
 * go to difference tab and check elements on this tab
 */

// @group done
// @group customer

use Page\Login as LoginPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);

$I->wantTo('Check My Account page elements');

LoginPage::login($I);

$I->click("ul.menu li.parent a");

$I->Wait(2);

$I->see('ACCOUNT DASHBOARD');

$I->Wait(1);
$I->seeNumberOfElements("ul.menu li","8");

$I->see("Account Information");
$I->see("SHIPPING ADDRESS");
$I->see("BILLING ADDRESS");
$I->see("NEWSLETTERS");


$I->click(MyAccountPage::$accountInformationMenuItem);
$I->Wait(2);

$I->seeInCurrentUrl(MyAccountPage::$URLAccountInformation);
//$I->seeFooter();

$I->click("ul.menu li.parent a");
$I->Wait(2);
$I->click(MyAccountPage::$addressBookMenuItem);
$I->waitForElementVisible('.address-column');
$I->seeInCurrentUrl(MyAccountPage::$URLAddressBook);
//$I->seeFooter();

$I->click("ul.menu li.parent a");
$I->Wait(2);
$I->click(MyAccountPage::$myOrdersMenuItem);
$I->waitForElementVisible('.orders-table');
$I->seeInCurrentUrl(MyAccountPage::$URLMyOrders);
//$I->seeFooter();

$I->click("ul.menu li.parent a");
$I->Wait(2);
$I->click(MyAccountPage::$myWishlistMenuItem);
$I->waitForElementVisible('.my-wishlist');
$I->seeInCurrentUrl(MyAccountPage::$URLMyWishlist);
//$I->seeFooter();

$I->click("ul.menu li.parent a");
$I->Wait(2);
$I->click(MyAccountPage::$newsletterSubscriptionsMenuItem);
$I->waitForElementVisible('.newsletter-form');
$I->seeInCurrentUrl(MyAccountPage::$URLNewsletterSubscriptions);
//$I->seeFooter();

$I->click("ul.menu li.parent a");
$I->Wait(2);
$I->click(MyAccountPage::$myGiftCardsMenuItem);
$I->waitForElementVisible('.giftcardaccount');
$I->seeInCurrentUrl(MyAccountPage::$URLMyGiftCards);
//$I->seeFooter();