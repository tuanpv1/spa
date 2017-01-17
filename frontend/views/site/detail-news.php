<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 5:24 PM
 */
?>
<div class="main ovfh">
    <?php if (isset($model) && !empty($model)) {
        /** @var $model \common\models\News */
        ?>
        <div class="news-main main-section">
            <div class="main-title tac ttu">
                <span class="segoeui">Vinpearl Condotel</span>
                <h2 class="utm-trajan">Tin tức sự kiện</h2>
            </div>
            <div class="container main-news-details">
                <div class="grid8">
                    <h3><?= $model->title ?></h3>
                    <div class="time-share fluid">
                        <time class="fl"><img
                                src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/news-icon-time.gif"
                                alt="#">
                            <span><?= date('d/m/Y',$model->created_at) ?></span>
                        </time>
                        <ul class="post-share fri">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li>
                                <a href="https://twitter.com/home?status=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li>
                                <a href="https://plus.google.com/share?url=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="the-content">
                        <?= preg_replace('/(\<img[^>]+)(style\=\"[^\"]+\")([^>]+)(>)/', '${1}${3}${4}', $model->content) ?>
                        <?php if($model->video){ ?>
                            <p class="tp_download">
                                <a href="<?= Yii::getAlias('@web') . DIRECTORY_SEPARATOR .Yii::getAlias('@image_new').DIRECTORY_SEPARATOR.$model->video ?>">
                                    Tải về hồ sơ dự án
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        ?>
        <p style="font-size: 20px;color: red;">Không có dữ liệu</p>
    <?php } ?>
</div>
