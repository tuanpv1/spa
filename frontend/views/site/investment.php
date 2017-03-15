<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:21 AM
 */
use common\models\News;
use yii\helpers\Url;

?>
<!--<div class="main ovfh">-->
<div class="main ovfh">
    <?= \frontend\widgets\Header::getMenuHeader() ?>
    <div class="main-section container">
        <div class="main-title tac ttu">
            <span class="segoeui">Thám Tử 3s</span>
            <h2 class="utm-trajan">Các dịnh vụ hiện đang cung cấp</h2>
        </div>
        <ul class="benef-main-list">
            <?php
            if (isset($listNews) && !empty($listNews)) {
                foreach ($listNews as $item) {
                    /** @var  $item News */
                    ?>
                    <li>
                        <div class="benef--box">
                            <div>
                                <a href="<?=\yii\helpers\Url::to(['site/detail-news','id'=>$item->id])?>">
                                    <img width="96" height="96" src="<?= $item->getImage() ?>"
                                      class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                      alt="<?= $item->title ?>"/>
                                </a>
                            </div>
                            <div class="benef--box--text">
                                <h3>
                                    <a href="<?=\yii\helpers\Url::to(['site/detail-news','id'=>$item->id])?>">
                                        <?= $item->title ?>
                                    </a>
                                    <span></span>
                                </h3>
                                <div>
                                    <p><?= $item->content ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } ?>
            <div id="last-comment">
            </div>
        </ul>
        <input type="hidden" name="page" id="page"
               value="<?= sizeof($listNews) - 1 ?>">
        <input type="hidden" name="numberCount" id="numberCount" value="<?= sizeof($listNews) ?>">
        <input type="hidden" name="total" id="total" value="<?= $pages->totalCount ?>">
        <?php if (count($listNews) >= 6) { ?>
        <div class="view-more-page tac"><a id="more" class="tuu segoeui" onclick="loadMore();">Xem thêm<span></span></a></div>
        <?php } ?>
    </div>
    <script type="text/javascript">
        function loadMore() {
            var url = '<?= Url::toRoute(['site/get-investment'])?>';
            var page = parseInt($('#page').val()) + 1;
            var total = parseInt(($('#total').val()));
            var numberCount = parseInt($('#numberCount').val()) + 6;
            $.ajax({
                url: url,
                data: {
                    'page': page
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
