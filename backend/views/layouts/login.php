<?php
use backend\assets\AppAsset;
use common\assets\MetronicLoginAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
MetronicLoginAsset::register($this);
$this->registerJs("Metronic.init();");
$this->registerJs("Layout.init();");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login">
<?php $this->beginBody() ?>
<div class="logo">
    <a href="index.html">
        <img style="width: 200px " src="<?= Url::to("@web/img/logo_monalisa.png"); ?>" alt=""/>
    </a>
</div>
<div class="menu-toggler sidebar-toggler">
</div>

<!-- BEGIN CONTAINER -->
<div class="content">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="copyright">

</div>
<!-- END FOOTER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
