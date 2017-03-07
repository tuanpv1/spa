<?php

use common\models\News;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Cập nhật: ' . ' ' . $model->title;
if($model->type == News::TYPE_COMMON || $model->type == News::TYPE_NEWS || $model->type == News::TYPE_PROJECT) {
    $this->params['breadcrumbs'][] = ['label' => News::getTypeName($model->type), 'url' => ['index', 'type' => $model->type]];
}
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
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
                    'type'=>$type
                ]) ?>
            </div>
        </div>
    </div>
</div>