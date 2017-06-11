<?php
namespace Page;

use Page\Base as BasePage;

class Checkout
{
    // include url of current page
    public static $URL = '/checkout/onepage/';

    /* C H E C K O U T   M E T H O D */
    static $email = '#login-email';
    static $pass = '#login-password';
    static $buttonLogin = 'li.buttons-set button.button';
    static $buttonContinue = 'button#onepage-guest-register-button';

    /* S T E P   B I L L I N G */
    static $fieldFirstName = ".//*[@id='billing:firstname']";
    static $fieldLastName = ".//*[@id='billing:lastname']";
    static $fieldCompany = ".//*[@id='billing:company']";
    static $fieldEmail = ".//*[@id='billing:email']";
    static $fieldAddress = ".//*[@id='billing:street1']";
    static $fieldAddressAdditional = ".//*[@id='billing:street2']";
    static $fieldCity = ".//*[@id='billing:city']";
    static $fieldProvince = ".//*[@id='billing:region_id']";
    static $fieldZip = ".//*[@id='billing:postcode']";
    static $fieldCountry = ".//*[@id='billing:country_id']";
    static $fieldTelephone = ".//*[@id='billing:telephone']";
    static $fieldFax = '#billing:fax';
    static $fieldPassword = ".//*[@id='billing:customer_password']";
    static $fieldConfirmPassword = ".//*[@id='billing:confirm_password']";
    static $buttonOnBilling = "div #billing-buttons-container span";

    /* S T E P   S H I P P I N G */


    static $fieldShippingFirstName = ".//*[@id='shipping:firstname']";
    static $fieldShippingLastName = ".//*[@id='shipping:lastname']";
    static $fieldShippingCompany = ".//*[@id='shipping:company']";
   // static $fieldShippingEmail = ".//*[@id='shipping:email']";
    static $fieldShippingAddress = ".//*[@id='shipping:street1']";
    static $fieldShippingAddressAdditional = ".//*[@id='shipping:street2']";
    static $fieldShippingCity = ".//*[@id='shipping:city']";
    static $fieldShippingProvince = ".//*[@id='shipping:region_id']";
    static $fieldShippingZip = ".//*[@id='shipping:postcode']";
    static $fieldShippingCountry = ".//*[@id='shipping:country_id']";
    static $fieldShippingTelephone = ".//*[@id='shipping:telephone']";
   // static $fieldShippingFax = ".//*[@id='shipping:fax']";
    static $buttonOnShippingVariant = ".//*[@id='shipping-buttons-container']/button";

    /* S T E P   S H I P P I N G   M E T H O D */
    static $calenderDateSelector = ".DynarchCalendar-bodyTable>tbody>tr:nth-child(6)>td:nth-child(5)";
    static $assertActiveShippingMethodStep   = 'dd .custom-styled-radio:nth-child(1) input';
    static $buttonOnShipMethod = ".//*[@id='shipping-method-buttons-container']/button";

    /* S T E P   P A Y M E N T   M E T H O D */
    static $assertActivePaymentMethodStep = './/div[@class="custom-styled-radio"]/input[@id="p_method_assist"]';
    static $buttonOnPaymentMethodAssist = ".//*[@id='p_method_assist']";
    static $buttonOnPaymentMethod = 'div.col-xs-offset-3 #paymentForm>input';

    /* RETURN AN ERROR */


    public static function route($param)
    {
        return static::$URL.$param;
    }

    static $likeWho;

    public static function spendCheckoutAs(\AcceptanceTester $I, $likeWho)
    {
        self::$likeWho = $likeWho;

        if ($likeWho == "LoginInCheckout") {
            $I->fillField(self::$email, BasePage::$email);
            $I->fillField(self::$pass, BasePage::$password);
            $I->click(self::$buttonLogin);
        } elseif ($likeWho == "Guest") {
            //$I->waitForElementVisible("#login:guest");
            $I->click("#login:guest");
            $I->click(self::$buttonContinue);
        } elseif ($likeWho == "Register") {
            $I->waitForElementVisible('label[for^="login:register"]');
            $I->click('label[for^="login:register"]');
            $I->click(self::$buttonContinue);
        }

    }

    /**
     * @var $I \AcceptanceTester
     * When need change something at address send difference $address variable
     */
    public static function spendBillingStep(\AcceptanceTester $I)
    {
        if (self::$likeWho == 'Register' || self::$likeWho == 'Guest' ) {
            $I->fillField(self::$fieldFirstName, BasePage::$firstName);
            $I->fillField(self::$fieldLastName, BasePage::$lastName);
            $I->fillField(self::$fieldCompany, 'GorillaGroup');
            $I->fillField(self::$fieldEmail, BasePage::getRandomEmail());
            $I->fillField(self::$fieldAddress, BasePage::$street);
            $I->fillField(self::$fieldCity, BasePage::$city);
            $I->selectOption(self::$fieldProvince,'23');

            $I->fillField(self::$fieldZip, BasePage::$postcode);
            $I->fillField(self::$fieldTelephone, BasePage::$telephone);


            if (self::$likeWho == 'Register') {
                $I->fillField(self::$fieldPassword, BasePage::$password);
                $I->fillField(self::$fieldConfirmPassword, BasePage::$password);
            }
        }
        $I->click("#billing:use_for_shipping_yes");
        $I->click(self::$buttonOnBilling);

           }

    public static function spendShippingMethodStep (\AcceptanceTester $I)
    {

        $I->waitForElement(self::$calenderDateSelector,20);
        $I->wait(3);
        $I->click(self::$calenderDateSelector);
        $I->wait(3);
		$I->waitForElement(self::$assertActiveShippingMethodStep,20);
        $I->waitForElement('.custom-styled-radio [name="shipping_method"]',20);
        $I->wait(3);
        $I->waitForElement(self::$assertActiveShippingMethodStep,20);
        $I->click(self::$assertActiveShippingMethodStep);
        $I->waitForElement('.input-box .checked');
        $I->click(self::$buttonOnShipMethod);
        //$I->waitForText('PAYMENT METHOD','H2');
    }

    /**
     * @param \AcceptanceTester $I
     * @param string $byDefault
     */
    public static function spendPaymentMethodStep(\AcceptanceTester $I, $byDefault = "CC")
    {

        $I->click(self::$buttonOnPaymentMethodAssist);

        $I->wait(3);

        //switch to iframe


       $I->switchToIFrame('assist_iframe');

        $I->fillField(".//*[@id='cardHolderName']", "imalikova");
        $I->fillField("//input[@id='cardNumber']", "4111111111111111");
        $I->fillField("//input[@id='cardExpirationDate']", '0620');
        $I->fillField("//input[@id='code']", '737');

        //switch to parent page


        $I->click(self::$buttonOnPaymentMethod);

        $I->see('There was an issue with validating payment information');
        $I->switchToIFrame();

    }

   }
