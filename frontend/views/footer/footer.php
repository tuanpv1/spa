<?php
 /** @var $footer \common\models\InfoPublic*/
?>
<div id="main_contact" class="footer">
    <div class="container ovfh">
        <div class="grid4 footer-logo">
            <a href=""><img src="<?= \common\models\InfoPublic::getImage($footer->image_footer) ?>" alt=""></a>
        </div>
        <div class="grid4 footer--text">
            <p class="utm-trajan"><?= Yii::t('app','Văn phòng') ?></p>
            <div class="footer-text-contact">
                <p>
                    <i class="fa fa-flag"></i>
                    <b><?= Yii::t('app','Địa chỉ: ') ?></b><?= $footer->address?$footer->address:''  ?>
                </p>
                <p>
                    <i class="fa fa-phone"></i>
                    <b><?= Yii::t('app','Số điện thoại: ') ?></b> <a href="tel:+84934246886"><?= $footer->phone?$footer->phone:'' ?></a>
                </p>
                <p>
                    <i class="fa fa-envelope-o"></i>
                    <b><?= Yii::t('app','Email: ') ?></b> <a href=""><span><i><?= $footer->email?$footer->email:'' ?></i></span></a>
                </p>
            </div>
            <ul class="network-social">
                <li>
                    <a href="">
                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/sc1.png" alt="<?= Yii::t('app','twitter')?>">
                    </a>
                </li>
                <li>
                    <a href="">
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
        <div class="grid4 footer--text footer-register">
            <p class="utm-trajan"><?= Yii::t('app','Đăng ký nhận bản tin') ?></p>
            <p class="footer--text-register"><?= Yii::t('app','Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức quan trọng của Vinpearl Condotel tới Quý khách!') ?></p>
            <form id="subscribe_form">
                <input id="email_re" type="text" name="subscribe_email" placeholder="Email *" required="required">
                <span style="color: red" id="error_email"><?= Yii::t('app','Email không đúng định dạng') ?></span>
                <span style="color: red" id="error_null"><?= Yii::t('app','Email không được để trống')?></span>
            </form>
            <button id="subscribe_submit" class="curp view-more-page" type="submit" ><p><?= Yii::t('app','Đăng ký') ?><span></span></p></button>
        </div>
    </div>
    <div class="footer-last tac ttu segoeui ovfh">
        COPYRIGHT 2016 VINPEARL CONDOTEL. ALL RIGHTS RESERVED.          <p style="margin:10px 0 0;font-size:11px;"><?= Yii::t('app','Hình ảnh chỉ mang tính minh hoạ cho sản phẩm. Chúng tôi có quyền thay đổi thông tin mà không cần báo trước.') ?></p>
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