<?php

use common\models\Campaign;
use common\models\Category;
use common\models\LeadDonor;
use common\models\News;
use common\models\Village;
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

    <?php
    if ($model->type == News::TYPE_CAMPAIGN) {
        echo $form->field($model, 'campaign_id')->dropDownList(
            ArrayHelper::map(Campaign::getCampaignByUser(), 'id', 'name'),
            ['id' => 'campaign_id', ['prompt' => 'Chọn chiến dịch ...']])->label('Chiến dịch (*)');
    }
    ?>

    <?php
    if ($model->type == News::TYPE_IDEA || $model->type == News::TYPE_TRADE) {
        echo $form->field($model, 'village_array')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Village::getVillageByUser(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Chọn xã ...',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Xã (*)');
        if ($model->type == News::TYPE_TRADE) {
            echo $form->field($model, 'price')->textInput(['maxlength' => true])->label('Giá (*)');
        }
    }
    ?>
    <?php
    if ($model->type == News::TYPE_DONOR) {
        echo $form->field($model, 'lead_donor_id')->dropDownList(
            ArrayHelper::map(LeadDonor::getLeadDonorByUser(), 'id', 'name'),
            [['prompt' => 'Chọn doanh nghiệp đỡ đầu ...']])->label('Doanh nghiệp đỡ đầu (*)');
    }
    ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\News::listStatus()) ?>

    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'thumbnail')->label('Ảnh đại diện')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => true,
                'overwriteInitial' => false,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]); ?>
    <?php } else { ?>
        <?= $form->field($model, 'thumbnail')->label('Ảnh đại diện')->widget(FileInput::classname(), [
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

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()
        ->andWhere(['status' => Category::STATUS_ACTIVE])->all(), 'id', 'display_name')) ?>

    <?= $form->field($model, 'content')->widget(\common\widgets\CKEditor::className(), [
        'options' => [
            'rows' => 6,
        ],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'select')->dropDownList(News::getTypeTP())->label(Yii::t('app','Chọn hình thức tải video')) ?>

    <div id="id_video">

    <?= $form->field($model, 'video')->widget(\kartik\file\FileInput::classname(), [
        'pluginOptions' => [

//            'showPreview' => false,
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Chọn video giới thiệu',
            'initialPreview' => $videoPreview ? [
                "<video width='213px' height='160px' controls>
                    <source src='".Yii::getAlias('@web') . '/' . Yii::getAlias('@uploads') . "/" . $model->video."' type='video/mp4'>
                    <div class='file-preview-other'>
                        <span class='file-icon-4x'><i class='glyphicon glyphicon-file'></i></span>
                    </div>
                </video>"
            ] : [],
        ],
        'options' => [
            'accept' => 'video/*',
        ],
    ]);
    ?>

    <?php
    if($model->video){
        echo Player::widget(['video_url' => $model->getVideoUrl()]);
    }
    ?>

    </div>

    <div id="id_url">
        <?= $form->field($model, 'url_video_new')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
