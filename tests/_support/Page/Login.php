<?php
namespace Page;

use Page\Base as BasePage;

class Login
{
    // include url of current page
    public static $URL = 'customer/account/login';
    public static $fieldEmail = '#email';
    public static $fieldPassword = '#pass';
    public static $buttonLogin = '#send2';

    //forgotPasswordPage
    public static $forgotPasswordSubmitButton = '#form-validate .button';
    public static $forgotPasswordEmailField = '#email_address';

    public static function login(\AcceptanceTester $I)
    {
        $I->amOnPage(self::$URL);
        $I->acceptThePopup($I);
        $I->fillField(self::$fieldEmail, BasePage::$email);
        $I->fillField(self::$fieldPassword, BasePage::$password);
        $I->click(self::$buttonLogin);

    }


}
