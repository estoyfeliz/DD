<?php

/**
 * Test # 202 Zoom
 * =========================
 * Test scenario:
 * go to PDP
 * click on main image
 * check that zoom has appear
 */


// @group product
// @group done

use Page\Pdp as PdpPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('Check Zoom on PDP');
$I->AmOnPage(PdpPage::$URL);

$I->acceptThePopup($I);


$I->WaitForElement('[style="display: none;"]');
$I->seeElementInDOM('[style="display: none;"]');

$I->click(PdpPage::$zoomButton);

$I->WaitForElement('div[style="display: block;"]>a.close');
$I->seeElement('#media-gallery-carousel .owl-lazy.loaded');
$I->seeElementinDOM('div[style="display: block;"]>a.close');
//$I->pauseExecution();
//$I->DontSee('Add to Basket');

$I->click(PdpPage::$CloseZoomButton);

$I->WaitForElement('[style="display: none;"]');
$I->seeElementInDOM('[style="display: none;"]');
$I->SeeElement(PdpPage::$addToCartButton);

//$I->DontSeeElement('div [style="display: none;"]');
//$I->SeeElementInDOM('div [style="display: block;"]');
/*$I->waitForElement("a.btn-zoom-gallery+div#moby-shade");
$I->seeElementInDOM(".zooming");
$I->seeElement("#zoom-thumbs");

$I->click(\Page\Pdp::$closeZoomButton);
$I->dontSeeElementInDOM(".zooming");

$I->seeElement("//h1[@itemprop='name']"); //product name
$I->seeElement(".product-shop.col-lg-5 .price"); //product price
$I->seeElement(".gallery-image"); // image
$I->seeElement(".bx-viewport"); // alternate images
$I->seeElement(".icon.large-image-magnify.icon-search-plus"); //zoom button
$I->seeElement("//div[@class='actions-container']//span[@data-pin-log='button_pinit']"); //pinterest button
$I->seeElement(".input-text.qty");// Qty field
$I->seeElement(".button.alternate.btn-cart");// Add to cart button*/