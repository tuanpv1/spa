<?php
 /** @var $footer \common\models\InfoPublic*/
?>
<div class="main-partner main-section ovfh">

</div>
</div>
<div id="main_contact" class="footer">
    <div class="container ovfh">
        <?php if(isset($footer) && !empty($footer)){ ?>
            <div class="grid4 footer-logo">
                <a target="_blank" href="<?= $footer->url ?>"><img style="width: 180px" src="<?= \common\models\InfoPublic::getImage($footer->image_footer) ?>" alt=""></a>
            </div>
        <?php }else{ ?>
            <div class="grid4 footer-logo">
                <a href="#"><img src="images/icons/logo-footer.png" alt=""></a>
            </div>
        <?php } ?>

        <?php if(isset($footer) && !empty($footer)){ ?>

        <div class="grid4 footer--text">
            <p class="utm-trajan"><?= Yii::t('app','Văn phòng') ?></p>
            <div class="footer-text-contact">
                <p>
                    <i class="fa fa-flag"></i>
                    <b><?= Yii::t('app','Địa chỉ: ') ?></b><?= $footer->address?$footer->address:''  ?>
                </p>
                <p>
                    <i class="fa fa-phone"></i>
                    <b><?= Yii::t('app','Số điện thoại: ') ?></b> <a href="tel:<?= $footer->phone?$footer->phone:'' ?>"><?= $footer->phone?$footer->phone:'' ?></a>
                </p>
                <p>
                    <i class="fa fa-envelope-o"></i>
                    <b><?= Yii::t('app','Email: ') ?></b> <a href=""><span><i><?= $footer->email?$footer->email:'' ?></i></span></a>
                </p>
            </div>
            <ul class="network-social">
                <li>
                    <a href="<?= $footer->twitter?$footer->twitter:'' ?>">
                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/sc1.png" alt="<?= Yii::t('app','twitter')?>">
                    </a>
                </li>
                <li>
                    <a href="<?= $footer->youtube?$footer->youtube:'' ?>">
                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/sc2.png" alt="<?= Yii::t('app','Kênh youtube') ?>">
                    </a>
                </li>
                <li>
                    <a href="<?= $footer->link_face?$footer->link_face:'' ?>">
                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/sc3.png" alt="<?= Yii::t('app','facebook') ?>">
                    </a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <div class="grid4 footer--text footer-register">
            <p class="utm-trajan"><?= Yii::t('app','Đăng ký nhận bản tin') ?></p>
            <p class="footer--text-register"><?= Yii::t('app','Xin vui lòng để lại số điện thoại và địa chỉ email, Thám Tử VIP sẽ liên hệ tư vấn tới Quý khách!') ?></p>
            <form id="subscribe_form">
                <input id="email_re" type="text" name="subscribe_email" placeholder="Email *" required="required">
                <span style="color: red" id="error_email"><?= Yii::t('app','Email không đúng định dạng') ?></span>
                <span style="color: red" id="error_null"><?= Yii::t('app','Email không được để trống')?></span>
                <input id="phone_re" type="text" name="subscribe_email" placeholder="<?= Yii::t('app','Số điện thoại') ?> *" required="required">
                <span style="color: red" id="error_phone"><?= Yii::t('app','Số điện thoại không đúng định dạng') ?></span>
                <span style="color: red" id="error_p_null"><?= Yii::t('app','Số điện thoại không được để trống')?></span>
            </form>
            <button id="subscribe_submit" class="curp view-more-page" type="submit" ><p><?= Yii::t('app','Đăng ký') ?><span></span></p></button>
        </div>
    </div>
    <div class="footer-last tac ttu segoeui ovfh">
        COPYRIGHT 2016 CTY THÁM TỬ VIP.
        <p style="margin:10px 0 0;font-size:11px;"><?= Yii::t('app','Hình ảnh chỉ mang tính minh hoạ cho sản phẩm. Chúng tôi có quyền thay đổi thông tin mà không cần báo trước.') ?></p>
    </div>
</div>

<div class="page-tool posf">
    <?php if(isset($footer) && !empty($footer)){ ?>
    <ul>
        <li>
            <p class="tool_hotline">
                <span class="ttu">hotline</span>
                <span><?= $footer->phone?$footer->phone:'' ?></span>
            </p>
            <a href="tel:<?= $footer->phone?$footer->phone:'' ?>"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/to2.png" alt="#"></a>
        </li>
        <li>
            <span></span>
            <a href="<?= $footer->link_face?$footer->link_face:'' ?>"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/to3.png" alt="#"></a>
        </li>
    </ul>
    <?php } ?>
    <a class="back-to-top posf" href="javascript:;"><i class="fa fa-angle-up"></i></a>
</div>