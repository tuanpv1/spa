<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:07 AM
 */
use common\models\News;
use yii\helpers\Url;

?>
<div class="main ovfh">
    <div class="news-main main-section">
        <div class="main-title tac ttu">
            <span class="segoeui">Thám Tử VIP</span>
            <h2 class="utm-trajan">
                <?php
                if($type == News::TYPE_NEWS){echo "Tin tức thám tử";}
                if($type == News::TYPE_PROJECT){echo "Thông tin tuyển dụng";}
                if($type == News::TYPE_COMMON){echo "Dịch vụ cung cấp";}
                ?>
            </h2>
        </div>
        <div class="container">
            <div class="grid8">
                <ul>
                    <?php if(isset($listNews) && !empty($listNews)) {
                        foreach($listNews as $item){
                            /** @var $item \common\models\News */
                            ?>
                            <li>
                                <a href="<?= Url::toRoute(['detail-news','id'=>$item->id]) ?>">
                                    <img width="300" height="210"
                                         src="<?= $item->getImage() ?>"
                                         class="attachment-medium size-medium wp-post-image"
                                         alt="cac-du-bds-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do"
                                         title="Các dự án bất động sản nghỉ dưỡng của Vingroup đang thi công theo đúng  tiến độ"
                                         srcset="<?= $item->getImage() ?> 70w"
                                         sizes="(max-width: 300px) 100vw, 300px"/> </a>
                                <div class="main-news-thumb">
                                    <a href="<?= Url::toRoute(['detail-news','id'=>$item->id]) ?>"><?= $item->title ?></a>
                                    <time><img
                                            src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/news-icon-time.gif"
                                            alt="#"><span><?= date('d/m/Y', $item->created_at) ?></span></time>
                                    <p><?= $item->short_description ?></p>
                                </div>
                            </li>
                       <?php  }
                    }else{ ?>
                    <li>
                        <a href="http://vinpearl-condotel.vn/2016/06/16/cac-du-bds-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do/">
                            <img width="300" height="210"
                                 src="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/cac-du-an-bat-dong-san-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do-ava-condotel-300x210.jpg"
                                 class="attachment-medium size-medium wp-post-image"
                                 alt="cac-du-bds-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do"
                                 title="Các dự án bất động sản nghỉ dưỡng của Vingroup đang thi công theo đúng  tiến độ"
                                 srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/cac-du-an-bat-dong-san-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do-ava-condotel.jpg 300w, http://vinpearl-condotel.vn/wp-content/uploads/2016/06/cac-du-an-bat-dong-san-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do-ava-condotel-70x49.jpg 70w"
                                 sizes="(max-width: 300px) 100vw, 300px"/> </a>
                        <div class="main-news-thumb">
                            <a href="http://vinpearl-condotel.vn/2016/06/16/cac-du-bds-nghi-duong-cua-vingroup-dang-thi-cong-theo-dung-tien-do/">Các
                                dự án bất động sản nghỉ dưỡng của Vingroup đang thi công theo đúng tiến độ</a>
                            <time><img
                                    src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/news-icon-time.gif"
                                    alt="#"><span>16-06-2016</span></time>
                            <p>1. VINPEARL PHÚ QUỐC VILLAS (Phú Quốc 3) Dự án tọa lạc tại Khu Bãi Dài &#8211; xã Gành
                                Dầu &#8211; huyện Phú Quốc &#8211; tỉnh Kiên Giang, bao gồm 340 căn biệt thự
                                biển.&hellip;</p>
                        </div>
                    </li>
                    <?php }?>
                </ul>
                <div id="last-comment">
                </div>
                <input type="hidden" name="page" id="page"
                       value="<?= sizeof($listNews) - 1 ?>">
                <input type="hidden" name="numberCount" id="numberCount" value="<?= sizeof($listNews) ?>">
                <input type="hidden" name="total" id="total" value="<?= $pages->totalCount ?>">
                <?php if (count($listNews) >= 6) { ?>
                <div class="view-more-page tac">
                    <a class="next page-numbers" id="more" onclick="loadMore();" >Xem
                        thêm<span></span></a>
                </div>
                <?php } ?>
            </div>
            <!--            <div class="grid4 main-news-sidebar-left">-->
            <!--                <p class="segoeui">Bài viết nổi bật</p>-->
            <!--                <ul>				<li>-->
            <!--                        <a href="http://vinpearl-condotel.vn/2012/12/09/su-kien-gioi-thieu-va-tu-van-san-pham-biet-thu-bien/">-->
            <!--                            <img width="150" height="150" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/khanh-hoa-tren-15-trieu-luot-du-khach-den-tham-quan-nghi-duong-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="su-kien-gioi-thieu-va-tu-van-san-pham-biet-thu-bien" title="Khánh Hòa: Trên 1,5 triệu lượt du khách đến tham quan nghỉ dưỡng" />					</a>-->
            <!--                        <div class="main-news-thumb">-->
            <!--                            <a href="http://vinpearl-condotel.vn/2012/12/09/su-kien-gioi-thieu-va-tu-van-san-pham-biet-thu-bien/">Khánh Hòa: Trên 1,5 triệu lượt du khách đến tham quan nghỉ dưỡng</a>-->
            <!--                            <time><img src="http://vinpearl-condotel.vn/wp-content/themes/vinpearlcondotel/img/news-icon-time.gif" alt="#"><span>09-12-2012</span></time>-->
            <!--                        </div>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
        </div>
    </div>
</div>

<script type="text/javascript">
    function loadMore() {
        var url = '<?= Url::toRoute(['site/get-news'])?>';
        var type = '<?= $type ?>';
        var page = parseInt($('#page').val()) + 1;
        var total = parseInt(($('#total').val()));
        var numberCount = parseInt($('#numberCount').val()) + 6;
        $.ajax({
            url: url,
            data: {
                'page': page,
                'type':type
            },
            type: "GET",
            crossDomain: true,
            dataType: "text",
            success: function (result) {
                if (null != result && '' != result) {
                    $(result).insertBefore('#last-comment');
                    document.getElementById("page").value = page + 5;
                    document.getElementById("numberCount").value = numberCount;
                    if (numberCount > total) {
                        $('#more').css('display', 'none');
                    }

                    $('#last-comment').html('');
                } else {
                    $('#last-comment').html('');
                }

                return;
            },
            error: function (result) {
                alert('Không thành công. Quý khách vui lòng thử lại sau ít phút.');
                $('#last-comment').html('');
                return;
            }
        });//end jQuery.ajax
    }
</script>