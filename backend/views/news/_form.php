<?php

use common\models\AffiliateCompany;
use common\models\News;
use common\widgets\Player;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
$videoPreview = !$model->isNewRecord && !empty($model->video);
// http://kcfinder.sunhater.com/install#dynamic
$kcfOptions = array_merge(\common\widgets\CKEditor::$kcfDefaultOptions, [
    'uploadURL' => Yii::getAlias('@web') . '/uploads/',
    'access' => [
        'files' => [
            'upload' => true,
            'delete' => true,
            'copy' => true,
            'move' => true,
            'rename' => true,
        ],
        'dirs' => [
            'create' => true,
            'delete' => true,
            'rename' => true,
        ],
    ],
]);

// Set kcfinder session options
?>

<div class="form-body">

    <?php $form = ActiveForm::begin(
        [
            'options' => ['enctype' => 'multipart/form-data'],
            'method' => 'post',
        ]
    ); ?>

    <?= $form->field($model, 'type')->hiddenInput(['id' => 'type'])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\News::listStatus()) ?>
    <?php
    if($model->type == \common\models\News::TYPE_NEWS){ ?>
        <?= $form->field($model,'position')->dropDownList(News::listPosition()) ?>
        <?= $form->field($model,'id_cat')->dropDownList( ArrayHelper::map(News::findAll(['status'=>News::STATUS_ACTIVE,'type'=>News::TYPE_COMMON]),'id','title')) ?>
    <?php }
    ?>
    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => true,
                'overwriteInitial' => false,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]) ?>
        <?php if($type == News::TYPE_PROJECT){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 370*400 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_COMMON){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 96*96 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_GIOITHIEU){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 422*426 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_NEWS || $type == News::TYPE_TIENDO){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 1180*430 đối với ảnh hiện ở vị trí top và 370*400 đối với bài viết thông thường để hiển thị tốt nhất') ?></p>
        <?php } ?>

    <?php } else { ?>
        <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'any',
                'initialPreview' => [
                    Html::img(Url::to($model->getThumbnailLink()), ['class' => 'file-preview-image', 'alt' => $model->thumbnail, 'title' => $model->thumbnail]),
                ],
                'showPreview' => true,
                'initialCaption' => $model->getThumbnailLink(),
                'overwriteInitial' => true,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]) ?>
        <?php if($type == News::TYPE_PROJECT){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 370*400 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_COMMON){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 96*96 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_GIOITHIEU){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 422*426 để hiển thị tốt nhất') ?></p>
        <?php }elseif($type == News::TYPE_NEWS || $type == News::TYPE_TIENDO){ ?>
            <p style="color:red;"><?= Yii::t('app','Vui lòng tải hình ảnh có kích thước 300*210 để hiển thị tốt nhất') ?></p>
        <?php } ?>
    <?php } ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 4]) ?>

    <?php if($type == News::TYPE_COMMON){ ?>
        <?= $form->field($model, 'description')->textarea(['rows'=>6]) ?>
    <?php }else{ ?>
        <?= $form->field($model, 'content')->widget(\common\widgets\CKEditor::className(), [
            'options' => [
                'rows' => 8,
            ],
            'preset' => 'basic'
        ]) ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Tạo mới') : Yii::t('app','Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
