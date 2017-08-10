<?php
/** @var $footer \common\models\InfoPublic */
?>
<!-- Footer -->
<footer id="contact_us">
    <div class="container">
        <div class="row">
            <div id="pad_tp" class="col-md-4 col-xs-12">
                <div class="fb-page" data-href="https://www.facebook.com/monalisaclinicspa" data-tabs="timeline"
                     data-height="180"  data-small-header="false" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/monalisaclinicspa" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/monalisaclinicspa">Monalisa Clinic &amp; Spa</a>
                    </blockquote>
                </div>
            </div>
            <div id="pad_tp" class="col-md-4 col-xs-12">
                <h3><i class="fa fa-map-marker"></i> Liên Hệ:</h3>
                <p class="footer-contact">
                    <address>Địa chỉ: <?= $footer?$footer->address:'' ?></address><br>
                    Hotline1: <?=$footer?$footer->phone:''?><br>
                    Hotline2: <?=$footer?$footer->url:''?><br>
                    Email: <?=$footer?$footer->email:''?><br>
                </p>
            </div>
            <div id="pad_tp" class="col-md-4 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.4508497471265!2d105.8482051144167!3d21.014638993637288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8c922697ff%3A0xb837b0a8e125f922!2zNSBUcmnhu4d1IFZp4buHdCBWxrDGoW5nLCBCw7lpIFRo4buLIFh1w6JuLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1502088482803"
                        width="100%" height="180" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <hr>
    <div class="copyright text center">
        <p>&copy; Copyright 2017 <a href="http::/monalisaspa.vn">Monalisa Spa</a>.</p>
    </div>
</footer>