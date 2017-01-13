<div class="footer">
    <div class="container ovfh">
        <div class="grid4 footer-logo">
            <a href=""><img src="images/icons/logo-footer.png" alt="Vinpearl Condotel"></a>
        </div>
        <div class="grid4 footer--text">
            <p class="utm-trajan">Văn phòng</p>
            <div class="footer-text-contact">
                <p><i class="fa fa-flag"></i>
                    <b>Đia chỉ:</b> Số 7, Đường Bằng Lăng 1, Khu Đô thị Sinh thái
                    Vinhomes Riverside, Phường Việt Hưng,
                    Quận Long Biên, Hà Nội
                </p>
                <p><i class="fa fa-phone"></i>
                    <b>Phone:</b> <a href="tel:+84934246886">+84 93 424 6886</a>
                </p>
                <p>
                    <i class="fa fa-envelope-o"></i>
                    <b>Email:</b> <a href=""><span><i>salesvillas@vingroup.net</i></span></a>
                </p>
                <!-- <p>
                    <i class="fa fa-globe"></i>
                    <b>Call center:</b><span> <a href="tel:0901152666">0901152666</a>  & <a href="tel:18006636">1800 6636</a></span>
                </p> -->
            </div>
            <ul class="network-social">
                <li><a href=""><img src="images/icons/sc1.png" alt="#"></a></li>
                <li>
                    <a href="">
                        <img src="images/icons/sc2.png" alt="#">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="images/icons/sc3.png" alt="#">
                    </a>
                </li>
            </ul>
        </div>
        <div class="grid4 footer--text footer-register">
            <p class="utm-trajan">Đăng ký nhận bản tin</p>
            <p class="footer--text-register">Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức quan trọng của Vinpearl Condotel tới Quý khách!</p>
            <form action="#" id="subscribe_form" mothed="POST">
                <input type="hidden" name="action" value="frontend__subscribe_email">
                <input type="hidden" name="nonce" value="4d2518e4af">
                <input type="text" name="subscribe_name" placeholder="Họ tên">
                <input type="text" name="subscribe_email" placeholder="Email *" required="required">
                <button id="subscribe_submit" class="curp view-more-page" type="submit" ><p>Đăng Ký<span></span></p></button>
            </form>
        </div>
    </div>
    <div class="footer-last tac ttu segoeui ovfh">
        COPYRIGHT 2016 VINPEARL CONDOTEL. ALL RIGHTS RESERVED.          <p style="margin:10px 0 0;font-size:11px;">Hình ảnh chỉ mang tính minh hoạ cho sản phẩm. Chúng tôi có quyền thay đổi thông tin mà không cần báo trước.</p>
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
<script type='text/javascript' src='js/wp-embed.min.js'></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#subscribe_form').submit(function(event){
            event.preventDefault();
            var contactForm = $(this);
            var data = $(this).serialize();
            $.ajax({
                url: 'http://vinpearl-condotel.vn/wp-admin/admin-ajax.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    contactForm.find('p.message').remove();
                    $('#subscribe_submit').before(response);
                    contactForm.find('input[type="text"]').val('');

                    ga('create', 'UA-64285630-20');
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', 'Form', 'Submit', 'subscribe_form');
                }
            });
        })
    });
</script>