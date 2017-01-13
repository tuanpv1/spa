/**
 * Created by TuanPham on 1/13/2017.
 */
var baseurl = window.location.origin+'/news/frontend/web/index.php?r=';
$(window).load (function(){
    $('#error_email').hide();
    $('#error_null').hide();
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
    $('#subscribe_submit').click(function(){
        var email = $('#email_re').val();
        if((email.trim() == null || email.trim() == "")) {
            $('#error_email').hide();
            $('#error_null').show();
        }else{
            $('#error_null').hide();
            if(IsEmail(email.trim())==false){
                $('#error_email').show();
            }else{
                $('#error_email').hide();
                $('#error_null').hide();
                $.ajax({
                    type: "POST",
                    url: baseurl+'site/register-email',
                    data: {
                        email:email
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