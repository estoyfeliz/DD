<?php
namespace Page;

use Page\Base as BasePage;

class MyAccount
{
    // include url of current page
    public static $URL = '/customer/account/'; //Account Dashboard
    public static $URLReg = '/customer/account/index/'; //Account Dashboard after register
    //My account menu item and links
    public static $URLAccountInformation = '/customer/account/edit/';
    public static $URLAddressBook = '/customer/address/';
    public static $URLAddressBook1 = '/customer/address/index/';
    public static $URLMyOrders = '/sales/order/history/';
    public static $URLMyWishlist = '/wishlist/';
    public static $URLNewsletterSubscriptions = '/newsletter/manage/';
    public static $URLMyGiftCards = '/giftcard/customer/';

    public static $accountDashboardMenuItem = '.block-content>ul>li:nth-child(1>a)';
    public static $accountInformationMenuItem = 'ul.menu ul li:nth-child(2)>a';
    public static $addressBookMenuItem = 'ul.menu ul li:nth-child(3)>a';
    public static $myOrdersMenuItem = 'ul.menu ul li:nth-child(4)>a';
    public static $myWishlistMenuItem = 'ul.menu ul li:nth-child(5)>a';
    public static $newsletterSubscriptionsMenuItem = 'ul.menu ul li:nth-child(6)>a';
    public static $myGiftCardsMenuItem = 'ul.menu ul li:nth-child(7)>a';
    public static $productNameInWishlist = 'h3.product-name a';
    public static $removeFromWishListLink = 'p .btn-remove.btn-remove2';
    public static $newsletterSubscriptions = ".edit-link:nth-child(2)";

    //Account Information
    public static $accountInfoFirstNameField = '//input[@id="firstname"]';
    public static $accountInfoLastNameField = '#lastname';
    public static $accountInfoSaveButton = 'div.buttons-set>button.button';




    public static function amIOnMyAccountPage(\AcceptanceTester $I)
    {
        $I->waitForElementVisible('.hello');
        $I->seeInCurrentUrl(self::$URL);
        $I->see(BasePage::$firstName);
        $I->see(BasePage::$lastName);
        $I->comment('Confirmed that you are on my account page');
    }


    public static function amIOnMyAccountPageIfRegistered(\AcceptanceTester $I)
    {
        $I->waitForElementVisible('.hello');
        $I->seeInCurrentUrl(self::$URLReg);
        $I->see(BasePage::$firstName);
        $I->see(BasePage::$lastName);
        $I->comment('Confirmed that you are on my account page');
    }

    public static function changeNameAndLastName (\AcceptanceTester $I)
    {


        $I->waitForElementVisible(self::$accountInfoFirstNameField);
        $I->seeElement(self::$accountInfoFirstNameField);
        $I->fillField(self::$accountInfoLastNameField, BasePage::$lastName."1");
        $I->fillField(self::$accountInfoFirstNameField, BasePage::$firstName."1");
        $I->click(self::$accountInfoSaveButton);

    }

    public static function revertMyAccountChanges (\AcceptanceTester $I)
    {
        $I->fillField(self::$accountInfoFirstNameField, BasePage::$firstName);
        $I->fillField(self::$accountInfoLastNameField, BasePage::$lastName);
        $I->click(self::$accountInfoSaveButton);
    }

    public static function changeBillingShippingAddress(\AcceptanceTester $I)
    {
        $I->waitForElementVisible('#shipping:firstname');
        $I->seeElement('#shipping:firstname');
        $I->fillField('#shipping:firstname', BasePage::$firstName."1");
        $I->fillField('#shipping:lastname', BasePage::$lastName."1");
        $I->fillField('#street_1', "112 W Jackson blvd");
        $I->click('#form-validate .button');

    }

    public static function revertBillingShippingAddress(\AcceptanceTester $I)
    {
        $I->fillField('#shipping:firstname', BasePage::$firstName);
        $I->fillField('#shipping:lastname', BasePage::$lastName);
        $I->fillField('#street_1', "111 W Jackson blvd");
        $I->click('#form-validate .button');

    }
    public static function addNewAddress(\AcceptanceTester $I)
    {
        $I->fillField(".//*[@id='shipping:firstname']","new Name");
        $I->fillField(".//*[@id='shipping:lastname']","new Lastname");
        $I->fillField("input#company","new company");
        $I->fillField("input#telephone","55566669999");
        $I->fillField("input#fax","test data");
        $I->fillField("input#street_1","New test street");
        $I->fillField("input#street_2","www1");
        $I->fillField("input#city","test data");
        $I->selectOption("select#region_id","23");
        $I->fillField("input#zip","60604");

        $I->click('div.buttons-set>button.button');
        $I->seeInCurrentUrl(self::$URLAddressBook1);

        $I->see("new Name");
        $I->see("new Lastname");
        $I->see("new company");
        $I->see("55566669999");
        $I->see("New test street");
        $I->see("www1");
        $I->see("test data");

    }

}
