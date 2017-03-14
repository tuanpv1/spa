<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 3/12/2017
 * Time: 4:06 PM
 */
use yii\helpers\Url;
/** @var \common\models\News $model */
?>
<div>
    <div class="main-title tac ttu">
        <span class="segoeui">Thám Tử VIP</span>
        <h2 class="utm-trajan">Tin tức <?= $model?$model->title:'' ?></h2>
    </div>
    <div class="container ovfh">
        <ul class="main-project-list fluid">
            <?php if(isset($listNews) && !empty($listNews)){
                foreach($listNews as $item){
                    /** @var $item \common\models\News */
                    ?>
                    <li class="grid3 wow fadeInUp" data-wow-delay=".5s">
                        <img style="height: 200px" src="<?= $item->getImage() ?>" alt="#">
                        <a href="<?= Url::to(['site/detail-news','id'=>$item->id]) ?>">
                            <?= $item->title ?>
                        </a>
                        <p>
                            <?= \common\helpers\CUtils::subString(trim($item->short_description), 300) ?>
                        </p>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</div>