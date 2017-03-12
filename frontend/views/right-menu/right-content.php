<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 3/9/2017
 * Time: 2:23 PM
 */
?>
<div class="grid4 main-news-sidebar-left">
    <p class="segoeui">Danh mục tin tức</p>
    <ul>
        <?php if(isset($listArray) && !empty($listArray)){ foreach($listArray as $item){ /** @var \common\models\AffiliateCompany $item */?>
        <li>
            <div class="main-news-thumb">
            <a href="<?= \yii\helpers\Url::to(['site/detail-news','id'=>$item->id]) ?>">Tin tức <?= strtolower($item->name) ?></a>
            </div>
        </li>
        <?php }}else{?>
        <li>Đang cập nhật</li>
        <?php } ?>
    </ul>
    <p class="segoeui">Bài viết nổi bật</p>
    <ul>
        <?php if(isset($listNewsMoi) && !empty($listNewsMoi)){ foreach($listNewsMoi as $item){ /** @var \common\models\News $item */?>
        <li>
            <a href="<?= \yii\helpers\Url::to(['site/detail-news','id'=>$item->id]) ?>">
                <img width="150" height="150" src="<?= $item->getImage() ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="<?= $item->title ?>" />
            </a>
            <div class="main-news-thumb">
                <a href="<?= \yii\helpers\Url::to(['site/detail-news','id'=>$item->id]) ?>"><?= $item->title ?></a>
                <time><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/news-icon-time.gif" alt="#"><span><?= date('d-m-Y',$item->created_at) ?></span></time>
            </div>
        </li>
        <?php }}else{?>
        <li>Đang cập nhật</li>
        <?php } ?>
    </ul>
</div>
