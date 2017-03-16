<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:21 AM
 */
use common\models\News;
use yii\helpers\Url;

?>
<!--<div class="main ovfh">-->
<ul>
    <?php if (isset($listNews) && !empty($listNews)) {
        foreach ($listNews as $item) {
            /** @var  $item News */
            ?>
            <li>
                <a href="<?= Url::toRoute(['detail-news', 'id' => $item->id]) ?>">
                    <img width="300" height="210"
                         src="<?= $item->getImage() ?>"
                         class="attachment-medium size-medium wp-post-image"
                         alt="cac-du-bds-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do"
                         title="Các dự án bất động sản nghỉ dưỡng của Vingroup đang thi công theo đúng  tiến độ"
                         srcset="<?= $item->getImage() ?> 70w"
                         sizes="(max-width: 300px) 100vw, 300px"/> </a>
                <div class="main-news-thumb">
                    <a href="<?= Url::toRoute(['detail-news', 'id' => $item->id]) ?>"><?= $item->title ?></a>
                    <time><img
                            src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/news-icon-time.gif"
                            alt="#"><span><?= date('d/m/Y', $item->created_at) ?></span></time>
                    <p><?= $item->short_description?$item->short_description:'Đang cập nhật ...' ?></p>
                </div>
            </li>
            <?php
        }
    } ?>
</ul>
