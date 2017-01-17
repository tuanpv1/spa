<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:26 AM
 */
?>
<div class="main ovfh">
    <div class="distributive-main main-section">
        <!-- <img class="distributive-banner" src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/contact-banner.gif" alt="#"> -->
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Hệ thống phân phối</h2>
        </div>
        <div class="row">
            <div class="container">
                <div class="tabs-connect tabs-distribut tac">
                    <p name="#tab-1" class="tab-active curp">Danh sách đại lý</p>
                    <p name="#tab-2" class="curp">FAQs</p>
                </div>
                <div id="tab-1" class="tab-show tab-show-distributive">
                    <ul class="list-agency">
                        <?php if(isset($model) && !empty($model)){
                            $i = 0;
                            foreach($model as $item){
                                $i ++ ;
                                /** @var $item \common\models\TableAgency */
                                ?>
                                <li class="grid3">
                                    <div>
                                        <span class="posa order"><?= $i < 10 ? '0'.$i : $i ?></span>
                                        <a href="javascript:;"><?= $item->name ?><span></span></a>
                                        <a class="posa" href="tel:<?= $item->phone_number ?>">
                                            <i class="fa fa-phone"></i>
                                            <span><?= $item->phone_number ?></span>
                                        </a>
                                    </div>
                                </li>
                            <?php }
                        }else{ ?>
                        <li class="grid3">
                            <div>
                                <span class="posa order">01</span>
                                <a href="javascript:;">Liên minh VGP, với đại diện pháp lý là Công ty TNHH ĐẦU TƯ VÀ PHÂN PHỐI NOVAHOMES<span></span></a>
                                <a class="posa" href="tel:0901799666">
                                    <i class="fa fa-phone"></i>
                                    <span>0901 799 666</span>
                                </a>
                            </div>
                        </li>
                        <li class="grid3">
                            <div>
                                <span class="posa order">02</span>
                                <a href="javascript:;">Công ty TNHH Phát Triển Thương Mại BĐS Newstarland<span></span></a>
                                <a class="posa" href="tel:0917032888">
                                    <i class="fa fa-phone"></i>
                                    <span>0917 032 888</span>
                                </a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="tab-2" class="tab-show tab-show-distributive">
                    <ul class="list-faqs"><p style="margin: 80px 0 100px; text-align: center;">Dữ liệu đang cập nhật, vui lòng quay trở lại sau!</p>				</ul>
                </div>
            </div>
        </div>
    </div>
