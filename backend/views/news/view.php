<?php

use common\models\News;
use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => News::getTypeName($model->type), 'url' => ['index', 'type' => $model->type]];
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
                    <?= Html::a('Cập nhật', ['update', 'id' => $model->id,'type'=>$model->type], ['class' => 'btn btn-primary']) ?>
                    <?php if($model->type != News::TYPE_ABOUT){ ?>
                    <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Bạn chắc chắn muốn xóa '.$model->title.'?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?php } ?>
                </p>
                <div class="tabbable-custom nav-justified">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="<?php echo $active==1? 'active':'';?>">
                            <a href="#tab_info" data-toggle="tab">
                                Thông tin</a>
                        </li>

                        <li class="<?php echo $active==2? 'active':'';?>">
                            <a href="#tab_images" data-toggle="tab">
                                Ảnh </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane <?php echo $active==1? 'active':'';?>" id="tab_info">
                            <?= $this->render('_detail', [
                                'model' => $model
                            ]) ?>
                        </div>

                        <div class="tab-pane <?php echo $active==2? 'active':'';?>" id="tab_images">
                            <?= $this->render('_images', [
                                'model' => $model,
                                'image' => $imageModel,
                                'dataProvider' => $imageProvider

                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


