<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/7/2017
 * Time: 8:53 PM
 */
use common\models\News;
use yii\helpers\Url;

?>
<div class="col-md-3">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php if ($listDv) {
                $i = 0;
                foreach ($listDv as $item) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"
                        class="<?= $i == 0 ? 'active' : '' ?>"></li>
                    <?php $i++;
                }
            } ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php if ($listDv) {
                $i = 0;
                foreach ($listDv as $item) {
                    /** @var News $item */ ?>
                    <div class="text-center item <?= $i == 0 ? 'active' : '' ?>">
                        <img src="<?= News::getFirstImageLinkTP($item->images) ?>" title="<?= $item->title ?>" alt="<?= $item->title ?>"
                             class="img-responsive"/>
                    </div>
                    <?php $i++;
                }
            } ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <h4>Công nghệ làm đẹp</h4>
    <div class="carousel slide">
        <?php if ($listQt) {
            foreach ($listQt as $item) {
                /** @var News $item */
                ?>
                <div class="row" style="padding-top: 20px">
                    <div class="col-md-4">
                        <a href="<?= Url::to(['site/detail-news', 'id' => $item->id]) ?>">
                            <img style="width: 80px" src="<?= News::getFirstImageLinkTP($item->images) ?>"
                                 alt="<?= $item->title ?>" title="<?= $item->title ?>">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a href="<?= Url::to(['site/detail-news', 'id' => $item->id]) ?>"><?= $item->title ?></a>
                    </div>
                </div>
                <?php
            }
        } ?>
    </div>
</div>
