<?php
namespace frontend\widgets;

use common\models\AffiliateCompany;
use common\models\Category;
use common\models\InfoPublic;
use common\models\News;
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
        $cate = Category::find()
            ->andWhere(['status'=>Category::STATUS_ACTIVE])
            ->limit(6)
            ->all();
        $header = InfoPublic::findOne(['id'=>1]);
        return $this->render('//header/header', [
            'listUnitLink' => self::$listUnitLink,
            'header'=>$header,
            'cate'=>$cate,
        ]);
    }

    public static function getMenuHeader(){
        $gioithieu = News::find()->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_GIOITHIEU])
            ->orderBy(['updated_at' => SORT_DESC])->one();

        $doiNNV = News::find()->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_TIENDO])
            ->orderBy(['updated_at' => SORT_DESC])->one();
        $st = new Header();
        return $st->render('//header/header', [
            'doiNNV'=>$doiNNV,
            'gioithieu'=>$gioithieu,
        ]);
    }
}