$(document).ready(function(){
    $('.submit-form').submit(function(){
        var url="/login/login_submit";
        var data=$('.submit-form').serialize();
        $.ajax(url,{
            data:data,
            type:"POST",
            success: validate,
            error: on_error
        });
        return false;
    });
});

validate= function(data){
    data= JSON.parse(data);
    if(data.success){
        window.location.replace("/home/homepage");
    }else{
        $('.error').css('display','block');
        setTimeout(function(){
            $('.error').css('display','none');
        },5000);
    }
}

on_error=function(){
    alert("Something Went Wrong");
}