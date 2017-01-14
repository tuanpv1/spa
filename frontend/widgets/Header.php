<?php
namespace frontend\widgets;

use common\models\AffiliateCompany;
use common\models\InfoPublic;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 13-Jan-17
 * Time: 7:51 PM
 */
class Header extends Widget
{
    public static $listUnitLink = null;

    public function init()
    {

        self::$listUnitLink = AffiliateCompany::findAll(['status' => AffiliateCompany::STATUS_ACTIVE,'type'=>AffiliateCompany::TYPE_UNITLINK ]);
    }

    public function run()
    {
        $header = InfoPublic::findOne(['id'=>1]);
        return $this->render('//header/header', ['listUnitLink' => self::$listUnitLink,'header'=>$header]);
    }
}