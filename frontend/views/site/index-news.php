<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/6/2017
 * Time: 3:29 PM
 */
use common\models\News;
use yii\helpers\Url;

$this->title = 'Tin tức làm đẹp';
?>
<div class="row container-kamn">
    <img src="img/slider/slide5.jpg" class="blog-post" alt="Feature-img" align="right" width="100%">
</div>
<!-- Main Container -->
<div id="banners"></div>
<div class="container">
    <h1 class="blog-title text-center">
        Cùng làm đẹp với Monalisa Spa
    </h1>
    <div class="row">
        <div class="col-md-9">
            <?php if ($listNews) {
                foreach ($listNews as $item) {
                    /** @var News $item */
                    ?>
                    <div class="blog-post">
                        <h2 class="blog-title">
                            <i class="fa fa-file-text"></i>
                            <?= $item->title ?>
                        </h2><br>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="<?= News::getFirstImageLinkTP($item->images) ?>" alt="<?= $item->title ?>"
                                     title="<?= $item->title ?>"
                                     align="right" width="80%" class="blog-image">
                            </div>
                            <div class="col-md-7">
                                <p><?= $item->short_description ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            } else {
                echo "Đang cập nhật";
            } ?>

            <div id="last-comment">
            </div>
            <input type="hidden" name="page" id="page"
                   value="<?= sizeof($listNews) - 1 ?>">
            <input type="hidden" name="numberCount" id="numberCount" value="<?= sizeof($listNews) ?>">
            <input type="hidden" name="total" id="total" value="<?= $pages->totalCount ?>">
            <?php if (count($listNews) >= 6) { ?>
                <div class="view-more-page tac">
                    <a class="next page-numbers" id="more" onclick="loadMore();">Xem
                        thêm<span></span></a>
                </div>
            <?php } ?>
        </div>

        <div class="col-md-3">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php if ($listDv) {
                        $i = 0;
                        foreach ($listDv as $item) { ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>"
                                class="<?= $i == 0 ? 'active' : '' ?>"></li>
                            <?php $i++;
                        }
                    } ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php if ($listDv) {
                        $i = 0;
                        foreach ($listDv as $item) {
                            /** @var News $item */ ?>
                            <div class="text-center item <?= $i == 0 ? 'active' : '' ?>">
                                <img src="<?= News::getFirstImageLinkTP($item->images) ?>" alt="<?= $item->title ?>"
                                     class="img-responsive"/>
                            </div>
                            <?php $i++;
                        }
                    } ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <h4>Công nghệ làm đẹp</h4>
            <div class="carousel slide">
            <?php if ($listQt) {
                foreach ($listQt as $item) {
                    /** @var News $item */
                    ?>
                    <div class="row" style="padding-top: 20px">
                        <div class="col-md-4">
                            <img style="width: 80px" src="<?= News::getFirstImageLinkTP($item->images) ?>" alt="<?= $item->title ?>">
                        </div>
                        <div class="col-md-8">
                            <a href=""><?= $item->title ?></a>
                        </div>
                    </div>
                    <?php
                }
            } ?>
            </div>
        </div>
    </div>
</div>

<!--End Main Container -->

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
                'type': type
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
