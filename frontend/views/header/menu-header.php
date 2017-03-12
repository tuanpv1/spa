<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 3/12/2017
 * Time: 8:26 PM
 */
use yii\helpers\Url;

?>
<ul class="main-nav tac">
    <li>
        <a href="<?= $gioithieu?Url::to(['site/detail-news','id'=>$gioithieu->id]):'' ?>">
            <svg width="80" height="80" style="display: block;">
                <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                        fill="transparent"></circle>
            </svg>
            <img class="posa" src="images/icons/t1.png" alt="#">
            <img class="posa" src="images/icons/nav-hover-1.png" alt="#">
        </a>
        <a href="<?= $gioithieu?Url::to(['site/detail-news','id'=>$gioithieu->id]):'' ?>"><?= Yii::t('app','Giới thiệu') ?></a>
    </li>
    <li>
        <a href="<?= $doiNNV?Url::to(['site/detail-news','id'=>$doiNNV->id]):'' ?>">
            <svg width="80" height="80" style="display: block;">
                <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                        fill="transparent"></circle>
            </svg>
            <img class="posa" src="images/icons/t2.png" alt="#">
            <img class="posa" src="images/icons/nav-hover-2.png" alt="#">
        </a>
        <a href="<?= $doiNNV?Url::to(['site/detail-news','id'=>$doiNNV->id]):'' ?>"><?= Yii::t('app','Đội ngũ nhân viên') ?></a>
    </li>
    <li>
        <a href="<?= Url::to(['site/investment']) ?>">
            <svg width="80" height="80" style="display: block;">
                <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                        fill="transparent"></circle>
            </svg>
            <img class="posa" src="images/icons/t3.png" alt="#">
            <img class="posa" src="images/icons/nav-hover-3.png" alt="#">
        </a>
        <a href="<?= Url::to(['site/investment']) ?>"><?= Yii::t('app','Dịch vụ cung cấp') ?></a>
    </li>
    <li>
        <a href="<?= Url::to(['site/news','type'=> \common\models\News::TYPE_NEWS]) ?>">
            <svg width="80" height="80" style="display: block;">
                <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                        fill="transparent"></circle>
            </svg>
            <img class="posa" src="images/icons/t4.png" alt="#">
            <img class="posa" src="images/icons/nav-hover-4.png" alt="#">
        </a>
        <a href="<?= Url::to(['site/news','type'=> \common\models\News::TYPE_NEWS]) ?>"><?= Yii::t('app','Tin tức') ?></a>
    </li>
    <li>
        <a href="<?= Url::to(['site/news','type'=>\common\models\News::TYPE_PROJECT]) ?>">
            <svg width="80" height="80" style="display: block;">
                <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                        fill="transparent"></circle>
            </svg>
            <img class="posa" src="images/icons/t5.png" alt="#">
            <img class="posa" src="images/icons/nav-hover-5.png" alt="#">
        </a>
        <a href="#">Thông tin Tuyển dụng</a>
    </li>
</ul>
