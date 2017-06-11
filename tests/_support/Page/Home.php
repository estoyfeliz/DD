<?php
namespace Page;

class Home
{
    // include url of current page
    public static $URL = '/';
    public static $menuAccount = '.icon-avatar';
    public static $menuItemLogIn = '.actions>a:nth-child(1)';
    public static $menuItemLogOut = 'nav.account-nav .links>li:nth-child(5) a';

    /* M A I N   C A T E G O R Y   L O C A T O R S */

    public static $MainMenu = 'div#menu-trigger';
    public static $Submenu  = 'li.nav-2 .accordion-trigger';
    public static $Submenu1  = 'li.nav-1 .accordion-trigger';
    public static $Submenu2  = 'li.nav-3 .accordion-trigger';
    public static $Submenu3  = 'li.nav-4 .accordion-trigger';
    public static $Submenu4  = 'li.nav-5 a';
    public static $Submenu5  = 'li.nav-6 .accordion-trigger';
    public static $Submenu6  = 'li.nav-7 a';
    public static $Submenu7  = 'li.nav-8 a';

    public static $Category  = '.accordion-content>.nav-2-2>a';
    public static $Category1  = '.accordion-content>.nav-1-5>a';
    public static $Category2  = '.accordion-content>.nav-3-3>a';
    public static $Category3  = '.accordion-content>.nav-4-4>a';
    public static $Category5  = '.accordion-content>.nav-6-2>a';


    //public static $Category  = 'nav#nav ul:nth-child(1) li.nav-1-3 a';
//li.nav-1-2 a
    //public static $GiftsAndGiftBaskets  = 'li.level0 nav-1 first parent:nth-child(2)>li:nth-child(1)>a';
    public static $GiftsAndGiftBaskets  = "(//a[@class='level1'])[1]";


   // public static $searchIcon          = '.quick-access div.form-search a';

    public static $searchIcon="//span[@class='icon-search']";
   // public static $searchIcon="div#mini-search button.icon-search";
    public static $searchField          = '.quick-access #search';
}

