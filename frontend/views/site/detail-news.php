<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 5:24 PM
 */
use common\models\News;

?>
<style>
    .fb_iframe_widget,.fb_iframe_widget span, .fb_iframe_widget span iframe[style] { min-width: 100% !important; width: 100% !important;
    }
</style>
<div class="main ovfh">
    <?= \frontend\widgets\Header::getMenuHeader() ?>
    <?php if (isset($model) && !empty($model)) {
        /** @var $model News */
        ?>
        <div class="news-main main-section">
            <div class="main-title tac ttu">
                <span class="segoeui">Thám Tử VIP </span>
                <h2 class="utm-trajan">
                    <?php
                    if($model->type == News::TYPE_NEWS){echo "Tin tức thám tử";}
                    if($model->type == News::TYPE_PROJECT){echo "Thông tin tuyển dụng";}
                    if($model->type == News::TYPE_COMMON){echo "Dịch vụ cung cấp";}
                    ?>
                </h2>
            </div>
            <div class="container main-news-details">
                <div class="grid8">
                    <h3><?= $model->title ?></h3>
                    <div class="time-share fluid">
                        <time class="fl"><img style="width: 18px"
                                src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/news-icon-time.gif"
                                alt="#">
                            <span><?= date('d-m-Y',$model->created_at) ?></span>
                        </time>
                        <ul class="post-share fri">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li>
                                <a href="https://twitter.com/home?status=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li>
                                <a href="https://plus.google.com/share?url=<?= $_SERVER['REQUEST_URI'] ?>"><i
                                        class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="the-content">
                        <?= $model->content ?>
                    </div>
                    <div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
                    <div class="fb-comments" xid="<?php echo $model->id; ?> data-numposts="20" data-colorscheme="light" data-version="v2.3"></div>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Web thám tử -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:970px;height:90px"
                     data-ad-client="ca-pub-1810353436941461"
                     data-ad-slot="8907981031"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                </div>
                <?= \frontend\widgets\RightContent::getRightContent($model->id) ?>
            </div>
        </div>
    <?php } else {
        ?>
        <p style="font-size: 20px;color: red;">Không có dữ liệu</p>
    <?php } ?>
</div>
