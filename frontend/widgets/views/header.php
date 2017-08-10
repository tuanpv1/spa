<?php
use common\models\News;
use yii\helpers\Url;
?>
<nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand wow fadeInDownBig" href="<?= Url::to(['site/index']) ?>"><img class="office-logo" src="<?= $link_image_logo?$link_image_logo:'' ?>" alt="Monalisa Spa"></a>
        </div>

        <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="active">
                    <a href="<?= Url::to(['site/index']) ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/news','type' => News::TYPE_DV]) ?>">Dịch vụ</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/news','type' => News::TYPE_CN]) ?>">Thiết bị công nghệ</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/news']) ?>">Tin làm đẹp</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/index']) ?>#contact_us">Liên hệ</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal"><button id="tuanpv" class="btn btn-primary">Đặt lịch hẹn</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->
<?= \frontend\widgets\ModalShow::widget() ?>