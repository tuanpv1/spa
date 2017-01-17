<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:21 AM
 */
use common\models\News;

?>
<!--<div class="main ovfh">-->
<div class="main ovfh">
    <div class="main-section container">
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Lợi ích đầu tư</h2>
        </div>
        <ul class="benef-main-list">
            <?php
            if (isset($listNews) && !empty($listNews)) {
                foreach ($listNews as $item) {
                    /** @var  $item News */
                    ?>
                    <li>
                        <div class="benef--box">
                            <div><img width="96" height="96" src="<?= $item->getImage() ?>"
                                      class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                      alt="<?= $item->title ?>"/></div>
                            <div class="benef--box--text">
                                <h3><?= $item->title ?> <span></span></h3>
                                <div><p><?= $item->description ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li>
                    <div class="benef--box">
                        <div><img width="96" height="96"
                                  src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65.png"
                                  class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                  alt="CHÍNH SÁCH VAY 65%"
                                  srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65.png 96w"
                                  sizes="(max-width: 96px) 100vw, 96px"/></div>
                        <div class="benef--box--text">
                            <h3>Chính sách vay 65%, chỉ 700 triệu đồng đã có thể đầu tư <span></span></h3>
                            <div><p>Hợp tác chiến lược với các ngân hàng – Vingroup đã đưa ra gói vay ưu đãi mà chưa
                                    từng có dự án BĐS nào khác có được. Khi mua condotel Vingroup, khách hàng được hỗ
                                    trợ vay lên tới 65% với lãi suất 0% trong 12 tháng đầu tiên, phí trả nợ trước hạn 0%
                                    trong 12 tháng đầu tiên, ân hạn nợ gốc trong 12 tháng. Cam kết chia sẻ lợi nhuận
                                    được thực hiện 6 tháng/lần kể từ khi thanh toán 100%.</p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!--        <div class="view-more-page tac"><a class="tuu segoeui" href="#">Xem thêm<span></span></a></div>-->
        <?php
        $pagination = new \yii\data\Pagination(['totalCount' => $pages->totalCount, 'pageSize' => 6]);
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </div>
