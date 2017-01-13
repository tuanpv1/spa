<?php

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
Yii::$app->session->set('KCFINDER', $kcfOptions);

$type = Html::getInputId($model, 'select');

$type_video = News::TYPE_UPLOAD_VIDEO;
$type_url = News::TYPE_URL;

$js = <<<JS
    $("#$type").change(function () {
        var type = $('#$type').val();
        if(type == {$type_video}){
            $('#id_video').show();
            $('#id_url').hide();
        }
        else{
            $('#id_url').show();
            $('#id_video').hide();
        }
    });
JS;
$js_default = <<<JS
    var type = $('#$type').val();
    if(type == {$type_video}){
       $('#id_url').hide();
        $('#id_video').show();
    }
    else{
        $('#id_url').show();
        $('#id_video').hide();
    }
JS;

$this->registerJs($js_default, \yii\web\View::POS_READY);
$this->registerJs($js, \yii\web\View::POS_READY);
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

    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => true,
                'overwriteInitial' => false,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]); ?>
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
        ]); ?>
    <?php } ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'content')->widget(\common\widgets\CKEditor::className(), [
        'options' => [
            'rows' => 8,
        ],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Tạo mới') : Yii::t('app','Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
