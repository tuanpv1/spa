/**
 * Created by TuanPV on 8/5/2017.
 */
var baseurl = window.location.origin+'/index.php?r=site%2F';
$(window).load (function() {
    $('#name_full').hide();
    $('#error_old').hide();
    $('#error_phone_empty').hide();
    $('#error_phone_incorect').hide();
    $('#error_time_empty').hide();
    $('#error_time_incorect').hide();
    $('#error_validate').hide();
});
$(document).ready(function(){
    slider3 = $('.bxslider3').bxSlider({
        slideWidth: 180,
        minSlides: 2,
        maxSlides: 5,
        auto:true,
        speed: 500,
        slideMargin: 10,
        onSlideAfter : function($slideElement, oldIndex, newIndex) {
            slider3.stopAuto();
            slider3.startAuto();
        }
    });
    $('#full_name').focusout(function(){
        if(($(this).val().trim() == null || $(this).val().trim() == "")){
            $('#name_full').show();
            $(this).focus();
        }else{
            $('#name_full').hide();
        }
    });
    $('#dtp_input1').focusout(function(){
        if(($(this).val().trim() == null || $(this).val().trim() == "")){
            $('#error_time_empty').show();
            $(this).focus();
        }else{
            $('#error_time_empty').hide();
        }
    });
    $('#phone').focusout(function(){
        if(($(this).val().trim() == null || $(this).val().trim() == "")){
            $('#error_phone_empty').show();
            $(this).focus();
        }else{
            $('#error_phone_empty').hide();
            if(validatePhone($(this).val())==false){
                $('#error_phone_incorect').show();
            }else{
                $('#error_phone_incorect').hide();
            }
        }
    });
    $('#btn').click(function(){
        if($('#full_name').val().trim() == "" || $('#phone').val().trim() == "" || $('#dtp_input1').val().trim() == "")
        {
            $('#error_validate').show();
        }else{
            var full_name = $('#full_name').val();
            var phone = $('#phone').val();
            var start_time = $('#dtp_input1').val();
            var id_dv = $('#id_dv').val();
            var old = $('#old').val();
            $.ajax({
                type: "POST",
                url: baseurl+'save-book',
                data: {
                    full_name:full_name,
                    phone:phone,
                    start_time:start_time,
                    id_dv:id_dv,
                    old:old
                },
                success: function(data) {
                    var rs = JSON.parse(data);
                    if (rs['success']) {
                        alert(rs['message']);
                        location.href= baseurl+'index';
                    }else {
                        alert(rs['message']);
                        exit();
                    }
                }
            });
        }
    });
});
$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});
$('.form_date').datetimepicker({
    language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
});
$('.form_time').datetimepicker({
    language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
});

function validatePhone(txtPhone) {
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (!filter.test(txtPhone)) {
        return false;
    }else {
        return true;
    }
}

