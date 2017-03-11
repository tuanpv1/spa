<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Thám tử VIP';
?>
<div class="main ovfh">
    <div class="main-banner posr ovfh">
        <div class="flexslider">
            <ul class="slides">
                <?php if (isset($listBanner) && !empty($listBanner)) {
                    foreach ($listBanner as $item) {
                        /** @var $item \common\models\Banner */
                        ?>
                        <li>
                            <img class="img-large" src="<?= $item->getImageLink() ?>" alt="<?= $item->name ?>">
                            <img class="img-medium" src="<?= $item->getImageLink() ?>" alt="<?= $item->name ?>">
                        </li>
                    <?php }
                } else { ?>
                    <li>
                        <img class="img-large" src="images/banners/bn3.jpg" alt="#">
                        <img class="img-medium" src="images/banners/bn3.jpg" alt="#">
                    </li>
                    <li>
                        <img class="img-large" src="images/banners/bn2.jpg" alt="#">
                        <img class="img-medium" src="images/banners/bn2.jpg" alt="#">
                    </li>
                    <li>
                        <img class="img-large" src="images/banners/Banner1.jpg" alt="#">
                        <img class="img-medium" src="images/banners/Banner1.jpg" alt="#">
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
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
            <a href="<?= Url::to(['site/detail-news','id'=>$doiNNV->id]) ?>"><?= Yii::t('app','Đội ngũ nhân viên') ?></a>
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
    <div id="main_about" class="main-invest ovfh">
        <div class="container">
            <?php if (isset($gioithieu) && !empty($gioithieu)) {
                /** @var $gioithieu \common\models\News */
                ?>
                <div class="grid4">
                    <div class="posr">
                        <img class="animation-flower" src="<?= $gioithieu->getImage() ?>" alt="#">
                    </div>
                </div>
                <div class="grid8">
                    <p class="UTMYenTu">
                        <span class="wow fadeInLeft"
                              data-wow-duration="2s"><?= \common\helpers\CUtils::subString1($gioithieu->title, 50) ?></span>
                        <span class="tar wow fadeInLeft" data-wow-duration="2s"
                              data-wow-delay=".3s"><?= substr($gioithieu->title, strlen(\common\helpers\CUtils::subString1($gioithieu->title, 50)) + 1) ?></span>
                    </p>
                    <p class="segoeuil wow fadeIn segoeui taj" data-wow-duratioon="1s"
                       data-wow-delay="1s"><?= $gioithieu->short_description ?></p>
                </div>

            <?php } else { ?>
                <div class="grid8">
                    <p class="UTMYenTu">
                        <span class="wow fadeInLeft" data-wow-duration="2s">Kết hợp hoàn hảo giữa căn hộ cao cấp</span>
                        <span class="tar wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".3s">và tiện nghi khách sạn 5 sao</span>
                    </p>
                    <p class="segoeuil wow fadeIn segoeui taj" data-wow-duratioon="1s" data-wow-delay="1s">Là chuỗi căn
                        hộ,
                        khách sạn được đầu tư xây dựng và quản lý bởi Tập đoàn Vingroup – Tập đoàn Bất động sản hàng đầu
                        tại
                        Việt Nam. Các căn hộ thuộc Vinpearl Condotel được thiết kế bởi các đối tác quốc tế hàng đầu sẽ
                        tạo
                        thành điểm nhấn nổi bật tại các địa điểm nghỉ dưỡng hàng đầu Việt Nam như Nha Trang, Đà Nẵng,
                        Phú
                        Quốc, Hạ Long,… và mang tới cho các nhà đầu tư cơ hội sở hữu những căn hộ khách sạn đẳng cấp
                        cũng
                        như cơ hội tận hưởng những kỳ nghỉ riêng tư, thư giãn tuyệt vời.</p>
                </div>
            <?php } ?>
        </div>
    </div>
    <div id="main_da"></div>
    <div  class="main-project main-section">
        <div class="main-title tac ttu">
            <span class="segoeui">Thám Tử VIP</span>
            <h2 class="utm-trajan">Tin tức thám tử</h2>
        </div>
        <?php if (isset($duantop) && !empty($duantop)) {
            /** @var $duantop \common\models\News */
            ?>

            <div class="main-project-first container posr ovfh wow fadeIn" data-wow-duration="2s">
                <div class="project-first-box-left posa">
                    <h3 class="ttu utm-trajan"><a href="<?= Url::to(['site/detail-news','id'=>$item->id]) ?>"><?= \common\helpers\CUtils::subString1($duantop->title,1) ?><br><?= \common\helpers\CUtils::subString1($duantop->title,strlen(\common\helpers\CUtils::subString1($duantop->title,1)) + 1) ?></a></h3>
                    <p class="segoeui"><?= $duantop->short_description ?></p>
                    <img src="images/icons/project-box-bg.png" alt="#" class="posa">
                </div>
                <img style="height: 430px" src="<?= $duantop->getImage() ?>" alt="#" class="posr wow fadeIn" data-wow-duration="1s">
            </div>

        <?php } else { ?>

            <div class="main-project-first container posr ovfh wow fadeIn" data-wow-duration="2s">
                <div class="project-first-box-left posa">
                    <h3 class="ttu utm-trajan"><a href="">Vinpearl<br>Beachfront Condotel</a></h3>
                    <p class="segoeui">Vinpearl Beachfront Condotel thuộc hệ thống căn hộ-khách sạn được phát triển bởi
                        Tập
                        đoàn Vingroup với kỳ vọng mang đến những trải nghiệm nghỉ dưỡng hoàn toàn mới tại các thiên
                        đường du
                        lịch nổi tiếng của Việt Nam. Dự án sở hữu vị trí vàng toạ lạc tại số 78 – 80 đường Trần Phú,
                        thành
                        phố Nha Trang.</p>
                    <img src="images/icons/project-box-bg.png" alt="#" class="posa">
                </div>
                <img src="images/project--second-bg.jpg" alt="#" class="posr wow fadeIn" data-wow-duration="1s">
            </div>
        <?php } ?>
        <div id="main_td"></div>
        <div class="container ovfh">
            <ul class="main-project-list fluid">
                <?php if(isset($duankhac) && !empty($duankhac)){
                    foreach($duankhac as $item){
                        /** @var $item \common\models\News */
                        ?>
                        <li class="grid4 wow fadeInUp" data-wow-delay=".5s">
                            <img style="height: 400px" src="<?= $item->getImage() ?>" alt="#">
                            <?php if(!empty($item->title)){ ?>
                                <a href="<?= Url::to(['site/detail-news','id'=>$item->id]) ?>"><?= $item->title ?></a>
                            <?php } ?>
                        </li>
                    <?php }
                }else{ ?>
                <li class="grid4 wow fadeInUp" data-wow-delay=".5s">
                    <img src="images/p2.jpg" alt="#"><a href="">Vinpearl<br> Empire Condotel</a>
                </li>
                <li class="grid4 wow fadeInUp" data-wow-delay=".6s">
                    <img src="images/p1.jpg" alt="#"><a href="">Vinpearl<br> Riverfront Condotel</a>
                </li>
                <li class="grid4 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/p3.jpg" alt="#"><!-- <a href="#">vinpearl<br> condotel --></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="container ovfh">
            <ul class="main-project-list fluid">
                <?php if(isset($duankhac) && !empty($duankhac)){
                    foreach($duankhac as $item){
                        /** @var $item \common\models\News */
                        ?>
                        <li class="grid4 wow fadeInUp" data-wow-delay=".5s">
                            <img style="height: 400px" src="<?= $item->getImage() ?>" alt="#">
                            <?php if(!empty($item->title)){ ?>
                                <a href="<?= Url::to(['site/detail-news','id'=>$item->id]) ?>"><?= $item->title ?></a>
                            <?php } ?>
                        </li>
                    <?php }
                }else{ ?>
                    <li class="grid4 wow fadeInUp" data-wow-delay=".5s">
                        <img src="images/p2.jpg" alt="#"><a href="">Vinpearl<br> Empire Condotel</a>
                    </li>
                    <li class="grid4 wow fadeInUp" data-wow-delay=".6s">
                        <img src="images/p1.jpg" alt="#"><a href="">Vinpearl<br> Riverfront Condotel</a>
                    </li>
                    <li class="grid4 wow fadeInUp" data-wow-delay=".7s">
                        <img src="images/p3.jpg" alt="#"><!-- <a href="#">vinpearl<br> condotel --></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="main-benef main-section">
        <div id="main_lidt"  class="main-title tac ttu">
            <span class="segoeui">Thám Tử VIP</span>
            <h2 class="utm-trajan">Dịch vụ cung cấp</h2>
        </div>
        <div class="container">
            <div id="owl-example" class="owl-carousel">
                <?php if (isset($listNews) && !empty($listNews)) {
                    foreach ($listNews as $item) {
                        /** @var $item \common\models\News */
                        ?>
                        <div class="item">
                            <div class="main-benef--box">
                                <div class="benef--box-img">
                                    <a href="javascript:;" rel="nofollow">
                                        <img width="96" height="96" src="<?= $item->getImage() ?>"
                                             class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                             alt="<?= $item->title ?>" srcset="" sizes="(max-width: 96px) 100vw, 96px"/>
                                    </a>
                                </div>
                                <div class="benef--box-title">
                                    <a href="<?= Url::to(['site/detail-news','id'=>$item->id])?>"><?= $item->title ?></a>
                                </div>
                                <div class="benef-box-content">
                                    <?= \common\helpers\CUtils::subString(trim($item->short_description), 300) ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <?= $this->render('news') ?>
                <?php } ?>
            </div>
        </div>
        <div class="tac view-more-page">
            <a href="<?= Url::toRoute(['site/investment']) ?>" class="view-more HelveticaiDesignVnlt ttu">Xem thêm<span></span></a>
        </div>
    </div>
