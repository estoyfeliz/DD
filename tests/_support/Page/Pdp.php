<?php
namespace Page;

class Pdp
{
    // include url of current page


    public static $URL = '/catalog/product/view/id/2475';
    public static $URL2 = '/catalog/product/view/id/3302';
    public static $addToCartButton = '#product-addtocart-button';
    public static $LinkWishlist  = 'a.link-wishlist';
    public static $zoomButton = 'a.btn-zoom-gallery.icon-zoom';
    public static $CloseZoomButton = 'div[style="display: block;"]>a.close';



    public static function addProductToCart(\AcceptanceTester $I)
    {
        $I->amOnPage(self::$URL);
        $I->acceptThePopup($I);
        $productName = $I->grabTextFrom('h1');

        $I->click(self::$addToCartButton);
        $I->waitForElementVisible('a.cart-link');


    }


}
