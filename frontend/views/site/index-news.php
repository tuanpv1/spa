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
    <?= \frontend\widgets\Header::getMenuHeader() ?>
    <div class="news-main main-section">
        <div class="main-title tac ttu">
            <span class="segoeui">Thám Tử VIP</span>
            <h2 class="utm-trajan">
                <?php
                if($type == News::TYPE_NEWS){
                    if(isset($cat) && $cat != null){
                        echo "Tin tức ". strtolower($cat->title);
                    }else{echo " Tin tức thám tử";}}
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
                                    <img style="height: 210px"
                                         src="<?= $item->getImage() ?>"
                                         class="attachment-medium size-medium wp-post-image"
                                         alt="<?= $item->title ?>"
                                         title="<?= $item->title ?>"
                                         srcset="<?= $item->getImage() ?> 70w"
                                         sizes="(max-width: 300px) 100vw, 300px"/> </a>
                                <div class="main-news-thumb">
                                    <a href="<?= Url::toRoute(['detail-news','id'=>$item->id]) ?>"><?= $item->title ?></a>
                                    <time><img
                                            src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/images/icons/news-icon-time.gif"
                                            alt="#"><span><?= date('d-m-Y', $item->created_at) ?></span></time>
                                    <p><?= $item->short_description ?></p>
                                </div>
                            </li>
                       <?php  }
                    } ?>
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
            <?= \frontend\widgets\RightContent::getRightContent(null) ?>
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