/**
 * Created by TuanPham on 1/13/2017.
 */
var baseurl = window.location.origin+'/news/frontend/web/index.php?r=';
$(window).load (function(){
    $('#error_email').hide();
    $('#error_null').hide();
    $('#error_phone').hide();
    $('#error_p_null').hide();
});
$(document).ready(function(){
    $('#email_re').focusout(function(){
        if(($(this).val().trim() == null || $(this).val().trim() == "")){
            $('#error_null').show();
            $('#error_email').hide();
        }else{
            $('#error_null').hide();
            if(IsEmail($(this).val())==false){
                $('#error_email').show();
            }else{
                $('#error_email').hide();
            }
        }
    });
    $('#phone_re').focusout(function(){
        if(($(this).val().trim() == null || $(this).val().trim() == "")){
            $('#error_p_null').show();
            $('#error_phone').hide();
        }else{
            $('#error_p_null').hide();
            if(validatePhone($(this).val())==false){
                $('#error_phone').show();
            }else{
                $('#error_phone').hide();
            }
        }
    });
    $('#subscribe_submit').click(function(){
        var email = $('#email_re').val();
        var phone = $('#phone_re').val();
        if((email.trim() == null || email.trim() == "")) {
            $('#error_email').hide();
            $('#error_null').show();
            $('#error_phone').hide();
            $('#error_p_null').show();
        }else{
            $('#error_null').hide();
            $('#error_p_null').hide();
            if(IsEmail(email.trim())==false){
                $('#error_email').show();
            }else if(validatePhone(phone.trim())==false){
                $('#error_phone').show();
            }else{
                $('#error_email').hide();
                $('#error_null').hide();
                $('#error_phone').hide();
                $('#error_p_null').hide();
                $.ajax({
                    type: "POST",
                    url: baseurl+'site/register-email',
                    data: {
                        email:email,
                        phone:phone
                    },
                    success: function(data) {
                        var rs = JSON.parse(data);
                        if (rs['success']) {
                            alert(rs['message']);
                        }else {
                            alert(rs['message']);
                        }
                    }
                });
            }
        }
    });
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

function validatePhone(txtPhone) {
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (!filter.test(txtPhone)) {
        return false;
    }else {
        return true;
    }
}