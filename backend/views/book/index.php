<?php

use common\models\Book;
use common\models\News;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var \common\models\Book  $model */

$this->title = 'QL Lịch hẹn';
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
                    <?= Html::a('Thêm lịch hẹn', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'full_name',
                        'phone',
                        [
                            'attribute' => 'name_dv',
                            'label'=>'Tên dịch vụ',
                            'value' => function ($model, $key, $index, $widget) {
                                /* @var \common\models\Book  $model */
                                return News::findOne($model->id_dv)->title;
                            },
                        ],
                        [
                            'attribute'           => 's_start_time',
                            'label'=>'Thời gian hẹn đến spa',
                            'filterType'          => GridView::FILTER_DATE,
                            'filterWidgetOptions' => [
                                'pluginOptions' => [
                                    'format'            => 'dd-mm-yyyy',
                                    'disableMousewheel' => false,
                                    'saveFormat'        => 'php:U',
                                    'autoClose'         => true,
                                ],
                            ],
                            'options'             => [
                                'width' => '200',
                            ],
                            'value'               => function ($model) {
                                /* @var \common\models\Book  $model */
                                return date('d-m-Y  H:i:s', $model->time_start);
                            },
                        ],
                        [
                            'class' => 'kartik\grid\EditableColumn',
                            'attribute' => 'status',
                            'label' => \Yii::t('app', 'Trạng thái'),
                            'width' => '200px',
                            'refreshGrid' => true,
                            'editableOptions' => function ($model, $key, $index) {
                                return [
                                    'header' => Yii::t("app","Trạng thái"),
                                    'size' => 'md',
                                    'displayValueConfig' =>Book::listStatus(),
                                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                                    'data' => Book::listStatus(),
                                    'placement' => \kartik\popover\PopoverX::ALIGN_LEFT,
                                    'formOptions' => [
                                        'action' => ['book/update-status', 'id' => $model->id]
                                    ],
                                ];
                            },
                            'filterType' => GridView::FILTER_SELECT2,
                            'filter' => Book::listStatus(),
                            'filterWidgetOptions' => [
                                'pluginOptions' => ['allowClear' => true],
                            ],

                            'filterInputOptions' => ['placeholder' => Yii::t('app','Tất cả')],
                        ],
                        [
                            'attribute'           => 's_created_at',
                            'label'=>'Thời gian đặt lịch',
                            'filterType'          => GridView::FILTER_DATE,
                            'filterWidgetOptions' => [
                                'pluginOptions' => [
                                    'format'            => 'dd-mm-yyyy',
                                    'disableMousewheel' => false,
                                    'saveFormat'        => 'php:U',
                                    'autoClose'         => true,
                                ],
                            ],
                            'options'             => [
                                'width' => '200',
                            ],
                            'value'               => function ($model) {
                                /* @var \common\models\Book  $model */
                                return date('d-m-Y  H:i:s', $model->created_at);
                            },
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>