<?php
namespace Page;

class Base
{
    // include url of current page
    public static $URL = '/';
    public static $urlStage = 'http://deandeluca-aws-stage.gemshelp.com/';
    public static $urlProduction = 'http://deandeluca-aws-stage.gemshelp.com/';
    public static $firstName = 'FirstName';
    public static $lastName = 'test LastName';
    public static $telephone = "13122438777";
    public static $postcode = "60604";
    public static $city = "Chicago";
    public static $street = "111 W Jackson Blvd";
    public static $email = 'auto-test@test.com';
    public static $password = 'abcABC123';

    // page elements
    public static $footer = '.footer-container.section';

    // cookies


    /* F O O T E R */
    static $socialFB = "a.icon-facebook";
    static $socialTwitter = "a.icon-twitter";
    static $socialInstagram = "a.icon-instagram";
    static $socialPinterest = "a.icon-pinterest-p";

    static $CmsCompany = '.links.footer-links>li:nth-child(1)';
    static $CmsCustomer = '.links.footer-links>li:nth-child(2)';
    static $CmsInternational = '.links.footer-links>li:nth-child(3)';
    static $CmsCatering = '.links.footer-links>li:nth-child(4)';
    static $CmsLocations = '.links.footer-links>li:nth-child(5)';
    static $CmsCareers = '.links.footer-links>li:nth-child(6)';

    public static function getRandomEmail ()
    {
        $randomEmail = "autotest_".rand(1000, 9999)."@testfake.com";
        return $randomEmail;
    }


}
