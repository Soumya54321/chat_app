$(document).ready(function(){
    $('#submit-form').submit(function(){
        if($('.username').val()==''&& $('.password').val()==''){
            $('.error-username').css('display','inline');
            $('.error-password').css('display','inline');
            return false;
        }else if($('.password').val()==''){
            $('.error-password').css('display','inline');
            return false;
        }else if($('.username').val()==''){
            $('.error-username').css('display','inline');
            return false;
        }else{
            $('.error-username').css('display','none');
            $('.error-password').css('display','none');
            var url="/login/login_submit";
            var data=$('#submit-form').serialize();
            $.ajax(url,{
                data:data,
                type:"POST",
                success: validate,
                error: on_error
            });
            return false;
        }
    });
});

$('.error-username .error-img').mouseover(function(){
    $('.error-txt-username').css('display','inline');
});

$('.error-username .error-img').mouseout(function(){
    $('.error-txt-username').css('display','none');
});

$('.error-password .error-img').mouseover(function(){
    $('.error-txt-password').css('display','inline');
});

$('.error-password .error-img').mouseout(function(){
    $('.error-txt-password').css('display','none');
});

validate= function(data){
    data= JSON.parse(data);
    if(data.success){
        window.location.replace("/home/homepage");
    }else{
        $('.error-login').css('display','block');
        setTimeout(function(){
            $('.error-login').css('display','none');
        },3000);
    }
}

on_error=function(){
    alert("Something Went Wrong");
}
