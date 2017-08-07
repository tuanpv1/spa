<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/6/2017
 * Time: 6:43 PM
 */

namespace frontend\widgets;

use common\models\AffiliateCompany;
use common\models\Book;
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
class ModalShow extends Widget
{
    public function run()
    {
        $model_book = new Book();
        $list_dv = News::find()
            ->andWhere(['status' => News::STATUS_ACTIVE])
            ->andWhere(['type' => News::TYPE_DV])
            ->all();
        $array_dv = [];
        if ($list_dv) {
            $i = 0;
            foreach ($list_dv as $item) {
                /** @var  News $item */
                $array_dv[$i]['id'] = $item->id;
                $array_dv[$i]['name'] = $item->title;
                $i++;
            }
        }
        return $this->render('modal-show', [
            'model' => $model_book,
            'array_dv' => $array_dv,
        ]);
    }
}

