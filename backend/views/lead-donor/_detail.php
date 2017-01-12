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

?>
<p>
    <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-success','data' => ['method' => 'post']]) ?>
    <?php
    if($model->status == LeadDonor::STATUS_ACTIVE) {
        ?>
        <?= Html::a(Yii::t('app', 'Tạm dừng'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['method' => 'post']]) ?>
        <?php
    }
    if($model->status == LeadDonor::STATUS_BLOCK) {
        ?>
        <?= Html::a(Yii::t('app', 'Kích hoạt'), ['change_to_start', 'id' => $model->id], ['class' => 'btn btn-success','data' => ['method' => 'post']]) ?>
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
            'value' => LeadDonor::getStatusTP1($model->id),
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
