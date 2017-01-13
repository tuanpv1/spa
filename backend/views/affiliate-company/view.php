<?php

use common\models\AffiliateCompany;
use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AffiliateCompany */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Quản lý Công ty liên kết'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span
                        class="caption-subject font-green-sharp bold uppercase"><?php echo $this->title ?></span>
                </div>
            </div>
            <div class="portlet-body">

                <p>
                    <?= Html::a(Yii::t('app','Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app','Xóa'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app','Bạn chắc chắn muốn xóa'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute'=>'image',
                            'format' => 'raw',
                            'value'=>$model->image ? Html::img(Yii::getAlias('@web') . "/" . Yii::getAlias('@image_affiliate_company') . "/" . $model->image, ['width' => '100px']) : '',
                        ],
                        'name',
                        [
                            'attribute'=>'about',
                            'format' => 'raw',
                            'value'=>$model->about,
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => ($model->status == AffiliateCompany::STATUS_ACTIVE) ?
                                '<span class="label label-success">' . $model->getStatusName() . '</span>' :
                                '<span class="label label-danger">' . $model->getStatusName() . '</span>',
                            'type' => DetailView::INPUT_SWITCH,
                            'widgetOptions' => [
                                'pluginOptions' => [
                                    'onText' => 'Active',
                                    'offText' => 'Delete',
                                ]
                            ]
                        ],
                        'url:url',
                        [
                            'attribute' => 'created_at',
                            'value' => date('d/m/Y H:i:s', $model->created_at),
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value' => date('d/m/Y H:i:s', $model->updated_at),
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
