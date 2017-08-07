<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/7/2017
 * Time: 2:25 PM
 */
use common\models\News;
use frontend\widgets\Header;

if ($new) {
    $this->title = $new->title;
    /** @var News $new */
    ?>
    <div class="row container-kamn">
        <img src="img/slider/slide5.jpg" class="blog-post" alt="Feature-img" align="right" width="100%">
    </div>
    <div id="banners"></div>
    <div class="container">
        <div class="col-md-9">
            <h1 class="text-center">
                <?= News::getTypeName($new->type) . " Monalisa Spa" ?>
            </h1>
            <div class="blog-post">
                <div class="row">
                    <div class="services-header">
                        <h2 class="services-header-title"><a href=""><?= $new->title ?></a></h2>
                    </div>
                </div>

                <!-- Begin Services Row 1 -->
                <div class="row services-row services-row-head services-row-1">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <img height="200px" src="<?= News::getFirstImageLinkTP($new->images) ?>"
                             alt="<?= $new->title ?>" title="<?= $new->title ?>">
                    </div>
                    <div style="padding-top: 15px" class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <i class="glyphicon glyphicon-eye-open"></i> Xem: <?= $new->view_count ?> &nbsp;
                        <i class="glyphicon glyphicon-time"></i> Ngày đăng: <?= date('d-m-Y', $new->created_at) ?><br>
                        <p style="padding-top: 15px"><?= $new->short_description ?></p>
                    </div>

                    <div class="col-xs-12">
                        <?= $new->content ?>
                    </div>
                </div>
                <!-- End Serivces Row 1 -->
            </div>
        </div>
        <?= Header::actiongMenuRight($new->type) ?>
    </div>
    <hr>
    <?php
} else {
    ?>
    <h1>Không tìm thấy nội dung </h1>
    <?php
}
?>