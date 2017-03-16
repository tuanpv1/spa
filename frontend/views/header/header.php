<?php
use yii\helpers\Url;
?>
<div id="vingroup_logos_container" style="opacity: 0;">
    <div id="vingroup_logos">
        <div id="vingroup_logo">
            <a class="item" href="http://congtythamtuvip.com/">
                <?php if (isset($header)) { /** @var $header \common\models\InfoPublic */ ?>
                    <img style="width: 100px"
                        src="<?= $header->image_header ? \common\models\InfoPublic::getImage($header->image_header) : '' ?>"
                        alt="">
                <?php } ?>
            </a>
        </div>
        <div id="PnL_logos_1_container" class="slide-container">
            <div id="PnL_logos_1" class="slide">
                <?php if (isset($listUnitLink) && !empty($listUnitLink)) {
                    foreach ($listUnitLink as $item) {
                        /** @var $item \common\models\AffiliateCompany */
                        ?>
                        <a class="item" href="<?= $item->url ?>" target="_blank" data-id="vinhomes">
                            <img src="<?= $item->getImage() ?>" alt="">
                        </a>
                    <?php }
                } ?>
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
                Trang thông tin điện tử Thám Tử VIP
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

        setInterval(function () {
            jQuery('#PnL_logos_2 .slick-next').click();
        }, 10000);
    </script>
</div>
<div class="header posf">
    <div class="tac posr">
        <div class="menu-rps-992"></div>
    </div>
</div>