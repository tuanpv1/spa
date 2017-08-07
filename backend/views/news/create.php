<?php

use common\models\News;
use common\models\User;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $type */
/* @var $model common\models\User */

$this->title = News::getTypeName($type) ;
$this->params['breadcrumbs'][] = ['label' => News::getTypeName($type), 'url' => ['index', 'type' => $type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-gift"></i><?= $this->title ?></div>
            </div>
            <div class="portlet-body form">
                <?= $this->render('_form', [
                    'model' => $model,
                    'type' => $type,
                    'thumbnailInit' => $thumbnailInit,
                    'thumbnailPreview' => $thumbnailPreview,
                    'imageDesInit' => $imageDesInit,
                    'imageDesPreview' => $imageDesPreview,
                ]) ?>
            </div>
        </div>
    </div>
</div>
