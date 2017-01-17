<?php

use common\models\TableAgency;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TableAgencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhà phân phối';
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
                    <?= Html::a(Yii::t('app','Thêm'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        'phone_number',
                        [
                            'class' => '\kartik\grid\DataColumn',
                            'attribute' => 'status',
                            'label' => 'Trạng thái',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var $model \common\models\TableAgency
                                 */
                                if ($model->status == TableAgency::STATUS_ACTIVE) {
                                    return '<span class="label label-success">' . $model->getStatusName() . '</span>';
                                } else {
                                    return '<span class="label label-danger">' . $model->getStatusName() . '</span>';
                                }

                            },
                            'filter' => TableAgency::getListStatus(),
                            'filterType' => GridView::FILTER_SELECT2,
                            'filterWidgetOptions' => [
                                'pluginOptions' => ['allowClear' => true],
                            ],
                            'filterInputOptions' => ['placeholder' => "Tất cả"],
                        ],
//                        [
//                            'format' => 'raw',
//                            'class' => '\kartik\grid\DataColumn',
//                            'width' => '15%',
//                            'label' => 'Ngày sinh',
//                            'filterType' => GridView::FILTER_DATE,
//                            'attribute' => 'created_at',
//                            'value' => function ($model) {
//                                return date('d-m-Y', $model->created_at);
//                            }
//                        ],
//                        [
//                            'format' => 'raw',
//                            'class' => '\kartik\grid\DataColumn',
//                            'width' => '15%',
//                            'label' => 'Ngày sinh',
//                            'filterType' => GridView::FILTER_DATE,
//                            'attribute' => 'updated_at',
//                            'value' => function ($model) {
//                                return date('d-m-Y', $model->updated_at);
//                            }
//                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
