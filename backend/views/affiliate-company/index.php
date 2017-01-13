<?php

use common\models\AffiliateCompany;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AffiliateCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Quản lý Công ty liên kết');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase"><?= $this->title ?></span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <p>
                    <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'image',
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->image ? Html::img(Yii::getAlias('@web') . "/" . Yii::getAlias('@image_affiliate_company') . "/" . $model->image, ['width' => '100px']) : '';
                            }
                        ],
                        [
                            'class' => '\kartik\grid\DataColumn',
                            'attribute'=>'name',
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $widget) {
                                return Html::a($model->name, ['view', 'id' => $model->id], ['class' => 'label label-primary']);
                            }
                        ],
                        [
                            'class' => '\kartik\grid\DataColumn',
                            'attribute' => 'status',
                            'label' => 'Trạng thái',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var $model AffiliateCompany
                                 */
                                if ($model->status == AffiliateCompany::STATUS_ACTIVE) {
                                    return '<span class="label label-success">' . $model->getStatusName() . '</span>';
                                } else {
                                    return '<span class="label label-danger">' . $model->getStatusName() . '</span>';
                                }

                            },
                            'filter' => AffiliateCompany::listStatus(),
                            'filterType' => GridView::FILTER_SELECT2,
                            'filterWidgetOptions' => [
                                'pluginOptions' => ['allowClear' => true],
                            ],
                            'filterInputOptions' => ['placeholder' => "Tất cả"],
                        ],
                         'url:url',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

