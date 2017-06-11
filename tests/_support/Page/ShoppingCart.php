<?php
namespace Page;

class ShoppingCart
{
    // include url of current page
    public static $URL = '/checkout/cart/';
    public static $qtyField = '#shopping-cart-table .input-text.qty';
    public static $updateLink = '.button.btn-update';
    public static $productSubtotalPrice = 'td.a-right>span.price';
    public static $productName = "h2.product-name a";
    public static $removeProduct = ".remove-col.a-center a";
    public static $promoCodeBlock = '#discount-coupon-form .button';
    public static $buttonCheckout = '.button.btn-proceed-checkout.btn-checkout';
    public static $buttonMultipleCheckout = '.multiple-addresses a';

    public static $estimateCountryField   = 'select#country';
    public static $estimateProvinceField  = 'select#region_id';
    public static $estimatePostCodeField  = 'input#postcode';

    public static $couponCodeField = 'input#coupon_code';

    // Mini shopping cart
    public static $miniShoppingCartGoToCheckoutButton = '.button.checkout-button.btn-invert';


}
