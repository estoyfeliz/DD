<?php
namespace Page;

class Pop
{
    // include url of current page
    public static $URLgifting           = '/gifting/gift-gift-baskets';
    public static $URLCreateAGift       = '/create-a-gift/configurator/index/l';
    public static $URLCorporateGifting  = '/gifting/corporate-gifting';


    public static $URLPantry            = '/food/pantry-provisions';
    public static $URLCondiments        = '/food/condiments';
    public static $URLSpicesSeasonings  = '/food/spices-seasonings';
    public static $URLpastaricegrains   = '/food/pasta-rice-grains';

    public static $URLcoffee   = '/beverage/coffee';

    //public static $mensCategoryFirstBlock = '/food/oils-vinegars';
   public static $firstProductInCategory = '.products-grid.first.odd:nth-child(1) li.item:nth-child(1) h2.product-name a';

    public static $productsInPOP        = 'li.item';
    //public static $blocksInPOP          = 'ul.clearfix>li';

    public static $sortingDropdown = 'div.sort-menu-label';
    public static $sortingDropdownName = ".//*[@id='sort-by-list']//input[@id='Name']";
    //public static $showingDropdown      = 'div.limiter .styled-select';

    public static $nameOfFirstProductLocator = ".products-grid.first.odd:nth-child(1) li.item:nth-child(1) h2.product-name a";

}
