<?php

/* @var $this yii\web\View */

$this->title = 'Vinpearl Condotel';
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
            <a href="">
                <svg width="80" height="80" style="display: block;">
                    <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                            fill="transparent"></circle>
                </svg>
                <img class="posa" src="images/icons/t1.png" alt="#">
                <img class="posa" src="images/icons/nav-hover-1.png" alt="#">
            </a>
            <a href="">Tiện ích</a>
        </li>
        <li>
            <a href="">
                <svg width="80" height="80" style="display: block;">
                    <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                            fill="transparent"></circle>
                </svg>
                <img class="posa" src="images/icons/t2.png" alt="#">
                <img class="posa" src="images/icons/nav-hover-2.png" alt="#">
            </a>
            <a href="">Hệ thống phân phối</a>
        </li>
        <li>
            <a href="">
                <svg width="80" height="80" style="display: block;">
                    <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                            fill="transparent"></circle>
                </svg>
                <img class="posa" src="images/icons/t3.png" alt="#">
                <img class="posa" src="images/icons/nav-hover-3.png" alt="#">
            </a>
            <a href="">Lợi ích đầu tư</a>
        </li>
        <li>
            <a href="">
                <svg width="80" height="80" style="display: block;">
                    <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                            fill="transparent"></circle>
                </svg>
                <img class="posa" src="images/icons/t4.png" alt="#">
                <img class="posa" src="images/icons/nav-hover-4.png" alt="#">
            </a>
            <a href="">Tin tức</a>
        </li>
        <li>
            <a href="#">
                <svg width="80" height="80" style="display: block;">
                    <circle class="circle" cy="40" cx="39" r="38" stroke="#fff" stroke-width="1"
                            fill="transparent"></circle>
                </svg>
                <img class="posa" src="images/icons/t5.png" alt="#">
                <img class="posa" src="images/icons/nav-hover-5.png" alt="#">
            </a>
            <a href="#">Tài liệu dự án</a>
        </li>
    </ul>

    <div class="main-invest ovfh">
        <div class="container">
            <div class="grid4">
                <div class="posr">
                    <img class="animation-flower" src="images/icons/flower.png" alt="#">
                    <img class="posa" src="images/icons/home-logo-color-2.png" alt="#">
                </div>
            </div>
            <div class="grid8">
                <p class="UTMYenTu">
                    <span class="wow fadeInLeft" data-wow-duration="2s">Kết hợp hoàn hảo giữa căn hộ cao cấp</span>
                    <span class="tar wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".3s">và tiện nghi khách sạn 5 sao</span>
                </p>
                <p class="segoeuil wow fadeIn segoeui taj" data-wow-duratioon="1s" data-wow-delay="1s">Là chuỗi căn hộ,
                    khách sạn được đầu tư xây dựng và quản lý bởi Tập đoàn Vingroup – Tập đoàn Bất động sản hàng đầu tại
                    Việt Nam. Các căn hộ thuộc Vinpearl Condotel được thiết kế bởi các đối tác quốc tế hàng đầu sẽ tạo
                    thành điểm nhấn nổi bật tại các địa điểm nghỉ dưỡng hàng đầu Việt Nam như Nha Trang, Đà Nẵng, Phú
                    Quốc, Hạ Long,… và mang tới cho các nhà đầu tư cơ hội sở hữu những căn hộ khách sạn đẳng cấp cũng
                    như cơ hội tận hưởng những kỳ nghỉ riêng tư, thư giãn tuyệt vời.</p>
            </div>
        </div>
    </div>
    <div class="main-project main-section">
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Các dự án Condotel</h2>
        </div>
        <div class="main-project-first container posr ovfh wow fadeIn" data-wow-duration="2s">
            <div class="project-first-box-left posa">
                <h3 class="ttu utm-trajan"><a href="">Vinpearl<br>Beachfront Condotel</a></h3>
                <p class="segoeui">Vinpearl Beachfront Condotel thuộc hệ thống căn hộ-khách sạn được phát triển bởi Tập
                    đoàn Vingroup với kỳ vọng mang đến những trải nghiệm nghỉ dưỡng hoàn toàn mới tại các thiên đường du
                    lịch nổi tiếng của Việt Nam. Dự án sở hữu vị trí vàng toạ lạc tại số 78 – 80 đường Trần Phú, thành
                    phố Nha Trang.</p>
                <img src="images/icons/project-box-bg.png" alt="#" class="posa">
            </div>
            <img src="images/project--second-bg.jpg" alt="#" class="posr wow fadeIn" data-wow-duration="1s">
        </div>
        <div class="container ovfh">
            <ul class="main-project-list fluid">
                <li class="grid4 wow fadeInUp" data-wow-delay=".5s">
                    <img src="images/p2.jpg" alt="#"><a href="">Vinpearl<br> Empire Condotel</a>
                </li>
                <li class="grid4 wow fadeInUp" data-wow-delay=".6s">
                    <img src="images/p1.jpg" alt="#"><a href="">Vinpearl<br> Riverfront Condotel</a>
                </li>
                <li class="grid4 wow fadeInUp" data-wow-delay=".7s">
                    <img src="images/p3.jpg" alt="#"><!-- <a href="#">vinpearl<br> condotel --></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-benef main-section">
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Các lợi ích đầu tư</h2>
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
                                    <?= $item->title ?>
                                </div>
                                <div class="benef-box-content">
                                    <?= \common\helpers\CUtils::subString(trim($item->short_description),300) ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                }else{?>
                    <?= $this->render('news') ?>
                <?php } ?>
            </div>
        </div>
        <div class="tac view-more-page">
            <a href="" class="view-more HelveticaiDesignVnlt ttu">Xem thêm<span></span></a>
        </div>
    </div>


    <div class="main-partner main-section ovfh">
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Các đối tác hàng đầu</h2>
        </div>
        <div class="container">
            <div id="owl-demo-2" class="owl-carousel owl-theme">
                <?php if(isset($listDoiTac) && !empty($listDoiTac)) {
                    foreach($listDoiTac as $item){
                        /** @var $item \common\models\AffiliateCompany */
                        ?>
                        <div class="item"><a href="<?= $item->url ?>" target="blank" rel="nofollow">
                                <img src="<?= $item->getImage() ?>" alt="#"></a>
                        </div>
                    <?php }
                } else{ ?>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p3.png" alt="#"></a>
                    </div>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p6.png" alt="#"></a>
                    </div>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p5.png" alt="#"></a>
                    </div>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p1.png" alt="#"></a>
                    </div>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p4.png" alt="#"></a>
                    </div>
                    <div class="item"><a href="" target="blank" rel="nofollow"><img src="images/icons/p2.png" alt="#"></a>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>
</div>