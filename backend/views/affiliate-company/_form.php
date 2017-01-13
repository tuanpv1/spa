<?php

use common\models\AffiliateCompany;
use kartik\file\FileInput;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\AffiliateCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-body">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'fullSpan' => 10,
        'formConfig' => [
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'showLabels' => true,
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL,
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showPreview' => true,
            'overwriteInitial' => false,
            'showRemove' => false,
            'showUpload' => false
        ]
    ]); ?>

    <?= $form->field($model, 'about')->widget(\common\widgets\CKEditor::className(), [
        'options' => [
            'rows' => 6,
        ],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(AffiliateCompany::listStatus()) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group" style="padding-left: 50px">
        <?= Html::submitButton($model->isNewRecord ?  Yii::t('app','Tạo mới') : Yii::t('app','Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
