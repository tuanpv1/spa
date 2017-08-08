<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/5/2017
 * Time: 1:20 PM
 */
use common\models\News;

?>

<!--quang cao -->
<section class="services-section section-global-wrapper">
    <div class="col-xs-12">
        <img width="100%" src="img/slider/call.jpg" alt="hihi">
    </div>
</section>
<!--end quang cao-->
<section class="section-global-wrapper">
    <div class="container">
        <div class="row">
            <div class="services-header">
                <h4 class="services-header-title text-center">KHÁCH HÀNG NÓI SAO VỀ MONALISA</h4>
            </div>
        </div>
        <div class="row" style="padding-top: 20px">
            <div class="col-md-6">
                <?php if ($cus_left) {
                    foreach ($cus_left as $item_left) {
                        /** @var  News $item_left */
                        ?>
                        <div class="blockquote-box blockquote-success animated wow fadeInLeft clearfix">
                            <div class="square pull-left">
                                <img src="<?= News::getFirstImageLinkTP($item_left->images) ?>"
                                     alt="<?= $item_left->title ?>" height="100" width="100">
                            </div>
                            <h4>
                                <?= $item_left->title ?>
                            </h4>
                            <p>
                                <?= $item_left->short_description ?>
                            </p>
                        </div>
                        <?php
                    }
                } ?>

            </div>
            <div class="col-md-6">
                <?php if ($cus_right) {
                    foreach ($cus_right as $item_right) {
                        /** @var  News $item_right */
                        ?>
                        <div class="blockquote-box blockquote-success animated wow fadeInRight clearfix">
                            <div class="square pull-left">
                                <img src="<?= News::getFirstImageLinkTP($item_right->images) ?>"
                                     alt="<?= $item_right->title ?>" height="100" width="100">
                            </div>
                            <h4>
                                <?= $item_right->title ?>
                            </h4>
                            <p>
                                <?= $item_right->short_description ?>
                            </p>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</section>
<!--End Main Container -->
