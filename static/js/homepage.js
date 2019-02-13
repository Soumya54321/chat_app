var friend=0;
var last_chat="";
var last_date=0;
var flag=0;
var count=1;

$('.friend').click(function(){
    friend=0;
    $('#view_ajax').empty();
    var user_id=1;
    var friend_id=$(this).attr('id');
    if(friend!=friend_id){
        friend=friend_id;
        $.ajax({
            url : "/home/chat",
            data: {sender_id:user_id,receiver_id:friend_id},
            success: fetch_success,
            type: "POST"
        });
        return false;
    }  
    });



var fetch_success=function(data){
    //location.reload();
    var jsonData = JSON.parse(data);
    //console.log(jsonData);
    var jsonLength = jsonData.length;
    //console.log(jsonLength);
    for (var i = 0; i < jsonLength; i++) {
    var result = jsonData[i];
    if(result.sender_id==friend){
        var html = '<div class="chatbox_friend">'+ '<p class="chats">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
        $('#view_ajax').append(html);
    }else{
        var html = '<div class="chatbox_me">'+ '<p class="chats">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
        $('#view_ajax').append(html);
    }

    if(i==(jsonLength-1)){
        last_chat=result.chat;
        last_date=result.date_time;
    }
    }
}

$('#sendchat').submit(function() {
    var chat_context=document.getElementById('textarea').value;
    //console.log(chat_context);
    $('#textarea').val('').empty();
    var url = "/home/chat_send";
     $.ajax(url, {
        data: {receiver_id:friend,chat:chat_context},
        success: chat_show,
        //error: on_error,
        type: "POST"
    });
    return false;
});

var chat_show=function(data){
    var user_id=1;
    var friend_id=friend;
        $.ajax({
            url : "/home/fetch_chat",
            data: {sender_id:user_id,receiver_id:friend_id},
            success: fetch_chat,
            type: "POST"
        });
        return false;
}  

var fetch_chat=function(data){
    var jsonData = JSON.parse(data);
    var jsonLength = jsonData.length;

    for (var i = 0; i < jsonLength; i++) {
        var result1 = jsonData[i];
        //flag=1;
        if(last_chat!=result1.chat && last_date!=result1.date_time){
            flag=1;
        }        
        if(flag==1){
            if(result1.sender_id==friend){
                var html = '<div class="chatbox_friend">'+ '<p class="chats">'+result1.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result1.date_time+'</p>' + '</div>';
                $('#view_ajax').append(html);
            }else{
                var html = '<div class="chatbox_me">'+ '<p class="chats">'+result1.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result1.date_time+'</p>' + '</div>';
                $('#view_ajax').append(html);
            }
            last_chat=result1.chat;
            last_date=result1.date_time;
            flag=0;
        }
        
    }
}

setInterval(function(){
    if(count==1){
        $('#view_ajax').empty();  
    }
    count=count+1;
    var user_id=1;
    if(friend!=0){
        var friend_id=friend;
    }
    $.ajax({
        url : "/home/fetch_chat",
        data: {sender_id:user_id,receiver_id:friend_id},
        success: fetch_chat,
        type: "POST"
    });
    return false;

}, 500);

