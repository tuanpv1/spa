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
        <h2 class="utm-trajan"><a href="<?= Url::toRoute(['site/index','id'=>$model->id]) ?>">Tin tức <?= $model?$model->title:'' ?></a></h2>
    </div>
    <div class="container ovfh">
        <ul class="main-project-list fluid">
            <?php if(isset($listNews) && !empty($listNews)){
                foreach($listNews as $item){
                    /** @var $item \common\models\News */
                    ?>
                    <li class="grid3 wow fadeInUp" data-wow-delay=".5s">
                        <?= \common\helpers\CUtils::subString(trim($item->short_description), 200) ?><br>
                        <img style="height: 200px" src="<?= $item->getImage() ?>" alt="<?= $item->title ?>">
                        <a href="<?= Url::to(['site/detail-news','id'=>$item->id]) ?>">
                            <?= $item->title ?>
                        </a>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
    <div class="tac view-more-page">
        <a href="<?= Url::toRoute(['site/news','id'=>$model->id]) ?>" class="view-more HelveticaiDesignVnlt ttu">Xem thêm<span></span></a>
    </div>
</div>