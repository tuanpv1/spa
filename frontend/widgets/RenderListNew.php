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
class RenderListNew extends Widget
{

    public function init()
    {

    }

    public function run()
    {
    }
    public static function getNewsByIdCat($id){
        $listNews = News::find()
            ->andWhere(['status'=>News::STATUS_ACTIVE])
            ->andWhere(['type'=>News::TYPE_NEWS])
            ->andWhere(['id_cat'=>$id])
            ->limit(4)
            ->all();
        $model = News::findOne($id);
        $st = new RenderListNew();
        return $st->render('//footer/render-list-new',['listNews'=>$listNews,'model'=>$model]);
    }
}