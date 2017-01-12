<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="home blog">
<?php $this->beginBody() ?>

<div id="vingroup_logos_container" style="opacity: 0;">
    <div id="vingroup_logos">
        <div id="vingroup_logo">
            <a class="item" href="" target="_blank">
                <img src="images/icons/vingroup.png" alt="">
            </a>
        </div>
        <div id="PnL_logos_1_container" class="slide-container">
            <div id="PnL_logos_1" class="slide">
                <a class="item" href="" target="_blank" data-id="vinhomes">
                    <img src="images/icons/vinhomes.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinpearl">
                    <img src="images/icons/vinpearl.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinpearlland">
                    <img src="images/icons/vinpearlland.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinmec">
                    <img src="images/icons/vinmec.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinschool">
                    <img src="images/icons/vinschool.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vincom">
                    <img src="images/icons/vincom.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vincommerce">
                    <img src="images/icons/vincommerce.png" alt=""/>
                </a>
                <a class="item" href="" target="_blank" data-id="adayroi">
                    <img src="images/icons/adayroi.png" alt=""/>
                </a>
                <a class="item" href="" target="_blank" data-id="vinmart">
                    <img src="images/icons/vinmart.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinds">
                    <img src="images/icons/vinds.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinpro">
                    <img src="images/icons/vinpro.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vineco">
                    <img src="images/icons/vineco.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="almaz">
                    <img src="images/icons/almaz.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="vinlinks">
                    <img src="images/icons/vinlinks.png" alt="">
                </a>
                <a class="item" href="" target="_blank" data-id="quythientam">
                    <img src="images/icons/quythientam.png" alt=""/>
                </a>
                <a class="item" href="" target="_blank" data-id="vingroupcard">
                    <img src="images/icons/vingroupcard.png" alt="">
                </a>

            </div>
        </div>
        <div id="PnL_logos_2_container" class="slide-container">
            <div id="PnL_logos_2" class="slide"></div>
        </div>
        <div class="vingroup_logos_container-clearfix"></div>
    </div>
    <div id="vingroup_line_container">
        <div id="vingroup_line">
            <div id="vingroup_line__left">
                Trang thông tin điện tử của Vinpearl Condotel
            </div>
            <div id="vingroup_line__right">
                <div id="vingroup_line__right__dropdown">
                    <div id="vingroup_line__right__dropdown__text">
                        <a href="" target="_blank" id="vingroup_line__right__dropdown__text__link">&nbsp;</a>
                        Ngôn ngữ
                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></div>
                    <div id="vingroup_line__right__dropdown__menu">
                        <a class="item" target="_blank" href="" id="vingroup_line__right__dropdown__menu__link">&nbsp;</a>
                        <a class="item" target="_blank" href="">Tiếng việt</a>
                        <a class="item" target="_blank" href="">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var widgetVingroupLogosSettings = {
            width: 1200,
            canSticky: true,
            stickyTriggerValue: 0,
            zIndex: 9999999,
            responsive: [
                {
                    breakpoint: 1270,
                    settings: {
                        width: 1240,
                        itemsToShow: 8
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        width: 1170,
                        itemsToShow: 6
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        width: 984,
                        itemsToShow: 6
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        width: 970
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        width: 750,
                        itemsToShow: 4
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        width: 640
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        width: 360,
                        itemsToShow: 2
                    }
                }
            ]
        }

        setInterval(function(){ 
            jQuery('#PnL_logos_2 .slick-next').click();
        }, 10000);
    </script>
</div>
<?= $content ?>
<div class="footer">
        <div class="container ovfh">
            <div class="grid4 footer-logo">
                <a href=""><img src="images/icons/logo-footer.png" alt="Vinpearl Condotel"></a>
            </div>
            <div class="grid4 footer--text">
                <p class="utm-trajan">Văn phòng</p>
                <div class="footer-text-contact">
                    <p><i class="fa fa-flag"></i>
                        <b>Đia chỉ:</b> Số 7, Đường Bằng Lăng 1, Khu Đô thị Sinh thái
                        Vinhomes Riverside, Phường Việt Hưng,
                        Quận Long Biên, Hà Nội
                    </p>
                    <p><i class="fa fa-phone"></i>
                        <b>Phone:</b> <a href="tel:+84934246886">+84 93 424 6886</a>
                    </p>
                    <p>
                        <i class="fa fa-envelope-o"></i>
                        <b>Email:</b> <a href=""><span><i>salesvillas@vingroup.net</i></span></a>
                    </p>
                    <!-- <p>
                        <i class="fa fa-globe"></i>
                        <b>Call center:</b><span> <a href="tel:0901152666">0901152666</a>  & <a href="tel:18006636">1800 6636</a></span>
                    </p> -->
                </div>
                <ul class="network-social">
                    <li><a href=""><img src="images/icons/sc1.png" alt="#"></a></li>
                    <li>
                        <a href="">
                            <img src="images/icons/sc2.png" alt="#">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/icons/sc3.png" alt="#">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="grid4 footer--text footer-register">
                <p class="utm-trajan">Đăng ký nhận bản tin</p>
                <p class="footer--text-register">Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức quan trọng của Vinpearl Condotel tới Quý khách!</p>
                <form action="#" id="subscribe_form" mothed="POST">
                    <input type="hidden" name="action" value="frontend__subscribe_email">
                    <input type="hidden" name="nonce" value="4d2518e4af">
                    <input type="text" name="subscribe_name" placeholder="Họ tên">
                    <input type="text" name="subscribe_email" placeholder="Email *" required="required">
                    <button id="subscribe_submit" class="curp view-more-page" type="submit" ><p>Đăng Ký<span></span></p></button>
                </form>
            </div>
        </div>
        <div class="footer-last tac ttu segoeui ovfh">
            COPYRIGHT 2016 VINPEARL CONDOTEL. ALL RIGHTS RESERVED.          <p style="margin:10px 0 0;font-size:11px;">Hình ảnh chỉ mang tính minh hoạ cho sản phẩm. Chúng tôi có quyền thay đổi thông tin mà không cần báo trước.</p>
        </div>
    </div>

    <div class="page-tool posf">
        <ul>
                        <li>
                <p class="tool_hotline">
                    <span class="ttu">hotline</span>
                    <span>+84934246886</span>
                </p>
                <a href="tel:+84934246886"><img src="images/icons/to2.png" alt="#"></a>
            </li>
            <li>
                <span></span>
                <a href=""><img src="images/icons/to3.png" alt="#"></a>
            </li>
        </ul>
        <a class="back-to-top posf" href="javascript:;"><i class="fa fa-angle-up"></i></a>
    </div>
    <script type='text/javascript' src='js/wp-embed.min.js'></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#subscribe_form').submit(function(event){
                event.preventDefault();
                var contactForm = $(this);
                var data = $(this).serialize();
                $.ajax({
                    url: 'http://vinpearl-condotel.vn/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        contactForm.find('p.message').remove();
                        $('#subscribe_submit').before(response);
                        contactForm.find('input[type="text"]').val('');

                        ga('create', 'UA-64285630-20');
                        ga('set', 'nonInteraction', true);
                        ga('send', 'event', 'Form', 'Submit', 'subscribe_form');
                    }
                });
            })
        });
    </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
