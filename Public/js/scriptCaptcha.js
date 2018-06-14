function getNewCaptcha(){
    $.get('gestionCaptcha.php',function(data){
        $('#captcha_hidden').val(data);
        $('#captcha').html(data);
    });
}


function verifyCaptcha(){
    var captcha=$('#code').val();
    var captchaVerify=$('#captcha_hidden').val();
    if (captcha===captchaVerify){
        return true;
    }
    else{
        $.get('gestionCaptcha.php',function(data){
            $('#captcha_hidden').val(data);
            $('#captcha').html(data);
        });
        $("#error").html("Le code est incorrect");
        $("#txt").val("");
        $("#code").val("");
        return false;
    }
}

$(document).ready(function(){
    getNewCaptcha();
});