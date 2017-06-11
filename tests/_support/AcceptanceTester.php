<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @property  acceptPopup
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor


{
    use _generated\AcceptanceTesterActions;
    public function seeFooter()
    {
        $I = $this;
        $I->seeElement(".footer-container");
    }

    public function seeThatNot404()
    {
        $I = $this;
        $I->dontSeeInTitle('404 Not Found 1');
        $I->dontSee("We're sorry, but we cannot find the page you were looking for.");
    }

    public function getFullUrl()
    {
        $I = $this;
        $url = $I->executeJS("return location.href");
        return $url;
    }

    public function getEnvironmentUrl($env)
    {
        $I = $this;
        if ($env == "stage"){
            return \Page\Base::$urlStage;
        } else {
            return \Page\Base::$urlProduction;
        }

    }

    public function acceptThePopup()
    {
        $I = $this;
        try {

        $I->waitForElementVisible('.popup-dialog .popup-content',30);

        $I->click('.popup-content [data-popup-image-type="circle_fill"]');

        } catch (\Exception $e){
        $I->click('.popup-content [data-popup-image-type="circle_new"]');
        }
        $I->wait(1);
    }

   /**
    * Define custom actions here
    */
}
