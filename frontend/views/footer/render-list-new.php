<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 3/12/2017
 * Time: 4:06 PM
 */
use yii\helpers\Url;
/** @var \common\models\AffiliateCompany $model */
?>
<div class="main-benef main-section">
    <div id="main_lidt"  class="main-title tac ttu">
        <span class="segoeui">Thám Tử VIP</span>
        <h2 class="utm-trajan">Tin tức <?= $model?$model->name:'' ?></h2>
    </div>
    <div class="container">
        <div id="owl-example" class="owl-carousel">
            <?php if (isset($listNews) && !empty($listNews)) {
                foreach ($listNews as $item) {
                    /** @var $item \common\models\News */
                    ?>
                    <div class="item">
                        <div class="main-benef--box">
                            <div class="benef--box-img">
                                <a href="javascript:;" rel="nofollow">
                                    <img width="96" height="96" src="<?= $item->getImage() ?>"
                                         class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                         alt="<?= $item->title ?>" srcset="" sizes="(max-width: 96px) 100vw, 96px"/>
                                </a>
                            </div>
                            <div class="benef--box-title">
                                <a href="<?= Url::to(['site/detail-news','id'=>$item->id])?>"><?= $item->title ?></a>
                            </div>
                            <div class="benef-box-content">
                                <?= \common\helpers\CUtils::subString(trim($item->short_description), 300) ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <div class="tac view-more-page">
        <a href="<?= Url::toRoute(['site/investment']) ?>" class="view-more HelveticaiDesignVnlt ttu">Xem thêm<span></span></a>
    </div>
</div>
