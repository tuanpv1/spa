<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/5/2017
 * Time: 1:20 PM
 */
namespace frontend\widgets;


use common\models\AffiliateCompany;
use common\models\InfoPublic;
use common\models\News;
use yii\base\Widget;

class Customers extends  Widget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $cus_right = [];
        $cus_left = [];
        $cus = News::find()
            ->andWhere(['status'=>News::STATUS_ACTIVE])
            ->andWhere(['type'=>News::TYPE_KH])
            ->limit(4)
            ->all();
        $i = 0;
        foreach ($cus as $item){
            if($i%2 == 0){
                $cus_left[] = $item;
            }else{
                $cus_right[] = $item;
            }
        $i++;
        }
        return $this->render('customers',[
            'cus_right'=>$cus_right,
            'cus_left'=>$cus_left,
        ]);
    }
}