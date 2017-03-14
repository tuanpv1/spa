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
<div class="main-benef main-section">
    <div id="main_lidt_<?= $model->id ?>"  class="main-title tac ttu">
        <span class="segoeui">Thám Tử VIP</span>
        <h2 class="utm-trajan">Tin tức <?= $model?$model->title:'' ?></h2>
    </div>
    <div class="container">
        <?php if (isset($listNews) && !empty($listNews)) {
            foreach ($listNews as $item) {
                /** @var $item \common\models\News */
                ?>
                <div class="grid3">
                    <a class="text-center" href="javascript:;" rel="nofollow">
                        <img style="width: 90%;height: 100px" src="<?= $item->getImage() ?>"
                             alt="<?= $item->title ?>"/>
                    </a>
                    <div class="benef--box-title">
                        <a href="<?= Url::to(['site/detail-news','id'=>$item->id])?>"><?= $item->title ?></a>
                    </div>
                    <div class="benef-box-content">
                        <?= \common\helpers\CUtils::subString(trim($item->short_description), 300) ?>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <div class="tac view-more-page">
        <a href="<?= Url::toRoute(['site/news','id'=>$model->id]) ?>" class="view-more HelveticaiDesignVnlt ttu">Xem thêm<span></span></a>
    </div>
</div>