<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 12/14/2016
 * Time: 1:25 PM
 */
use common\models\LeadDonor;
use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LeadDonor */
if(empty($model->is_active)){
    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'QL doanh nghiệp đồng hành'), 'url' => ['index']];
}else{
    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'QL đăng kí doanh nghiệp đồng hành'), 'url' => ['get-index']];
}
$this->params['breadcrumbs'][] = $this->title;
$id = $_GET['id'];
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
                <div class="tabbable-custom ">
                    <p>
                        <?php
                        if($model->is_active == LeadDonor::STATUS_PENDING){
                            ?>
                            <?= Html::a(Yii::t('app', 'Phê duyệt'), ['accept', 'id' => $model->id], ['class' => 'btn btn-success','data' => ['method' => 'post']]) ?>
                            <?= Html::a(Yii::t('app', 'Từ chối'), ['reject', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['method' => 'post']]) ?>
                            <?php
                        }elseif($model->is_active == LeadDonor::STATUS_ACCEPT){
                            ?>
                            <?= Html::a(Yii::t('app', 'Từ chối'), ['reject', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['method' => 'post']]) ?>
                            <?php
                        }
                        elseif($model->is_active == LeadDonor::STATUS_REJECT){
                            ?>
                            <?= Html::a(Yii::t('app', 'Phê duyệt'), ['accept', 'id' => $model->id], ['class' => 'btn btn-success','data' => ['method' => 'post']]) ?>
                            <?php
                        }
                        ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
                        'attributes' =>[
                            [
                                'attribute' => 'image',
                                'format' => 'html',
                                'value' => Html::img(Yii::getAlias('@web') . "/" . Yii::getAlias('@lead_donor_image') . "/" .$model->image, ['width' => '300px']),
                            ],
                            [
                                'attribute' => 'name',
                                'value' => $model->name,
                            ],
                            [
                                'attribute' => 'address',
                                'value' => $model->address,
                            ],
                            [
                                'attribute' => 'website',
                                'value' => $model->website,
                            ],
                            [
                                'attribute' => 'phone',
                                'value' => $model->phone,
                            ],
                            [
                                'attribute' => 'require',
                                'value' => $model->require?$model->require.' năm':'',
                            ],
                            'email:email',
                            [
                                'attribute' => 'status',
                                'label' => 'Trạng thái',
                                'format' => 'raw',
                                'value' => LeadDonor::getStatusTP($model->id),
                            ],
                            'description:ntext',
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
</div>