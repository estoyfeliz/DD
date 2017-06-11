<?php

/**
 * Test # 206 Adding to wish list
 * =========================
 * Test scenario:
 * Login on site
 * go to pdp by direct link
 * add product to wishlist
 * check wishlist elements
 * remove from wishlist
 * check wishlist is empty
 */

// @group product
// @group done

use Page\Login as LoginPage;
use Page\Pdp as PdpPage;
use Page\MyAccount as MyAccountPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Add/Remove product from wishlist');

LoginPage::login($I);

$I->amOnPage(PdpPage::$URL);

$I->click(PdpPage::$LinkWishlist);

$I->waitForElement('.my-wishlist');

//verify product name in WL and URL

$I->seeElement(MyAccountPage::$productNameInWishlist);

$I->seeInCurrentUrl("/wishlist/index/index/wishlist_id/");

//clean up wish list

$I->click(MyAccountPage::$removeFromWishListLink);

$I->acceptPopup();

$I->see('You have no items in your wishlist.');

