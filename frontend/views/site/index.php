<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Thám tử VIP';
?>
<div class="main ovfh">
    <div class="main-banner posr ovfh">
        <div class="flexslider">
            <ul class="slides">
                <?php if (isset($listBanner) && !empty($listBanner)) {
                    foreach ($listBanner as $item) {
                        /** @var $item \common\models\Banner */
                        ?>
                        <li>
                            <img class="img-large" src="<?= $item->getImageLink() ?>" alt="<?= $item->name ?>">
                            <img class="img-medium" src="<?= $item->getImageLink() ?>" alt="<?= $item->name ?>">
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </div>
    <?= \frontend\widgets\Header::getMenuHeader() ?>
    <div id="main_about" class="main-invest ovfh">
        <div class="container">
            <?php if (isset($gioithieu) && !empty($gioithieu)) {
                /** @var $gioithieu \common\models\News */
                ?>
                <div class="grid4">
                    <div class="posr">
                        <img src="<?= $gioithieu->getImage() ?>" alt="#">
                    </div>
                </div>
                <div class="grid8">
                    <p><span style="font-size: 30px" class="wow fadeInLeft" data-wow-duration="2s"><?= $gioithieu->title ?><span></p>
                    <p class="segoeuil wow fadeIn segoeui taj" data-wow-duratioon="1s"
                       data-wow-delay="1s"><?= $gioithieu->short_description ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="main-benef main-section">
        <div id="main_lidt"  class="main-title tac ttu">
            <span class="segoeui">Thám Tử VIP</span>
            <h2 class="utm-trajan">Dịch vụ cung cấp</h2>
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
    <?php
    if(isset($listArray)){
        foreach($listArray as $item){
            echo \frontend\widgets\RenderListNew::getNewsByIdCat($item->id);
        }
    }
    ?>
</div>
