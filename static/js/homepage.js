var friend=0;
var last_chat="";
var last_date=0;
var flag=0;
var count=1;
var flag2=0;

$('.friend').click(function(){
    friend=0;
    $('#view_ajax').empty();
    flag2=1;
    var friend_id=$(this).attr('id');
    if(friend!=friend_id){
        friend=friend_id;
        $.ajax({
            url : "/home/chat",
            data: {receiver_id:friend_id},
            success: fetch_success,
            type: "POST"
        });
    }
    document.getElementById('none').style.display="none";
    document.querySelector('.right-mid').style.display="block";
    document.querySelector('.right-bottom').style.display="block";
    return false;  
});

var fetch_success=function(data){
    var jsonData = JSON.parse(data);
    var jsonLength = jsonData.length;
    for (var i = 0; i < jsonLength; i++) {
    var result = jsonData[i];
    if(result.sender_id==friend){
        var html = '<div class="chatbox_friend" id="chat_box">'+ '<p class="chats" id="x">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
        $('#chat_box').height($('.chats').val()*$('.date_time').val());
        $('#view_ajax').append(html);
    }else{
        var html = '<div class="chatbox_me" id="chat_box">'+ '<p class="chats" id="x">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
        $('#chat_box').height($('.chats').val()*$('.date_time').val());
        $('#view_ajax').append(html);
    }
    var elem = document.getElementById('view_ajax');
    elem.scrollTop = elem.scrollHeight;
    $('#textarea').val('').empty();
    if(i==(jsonLength-1)){
        last_chat=result.chat;
        last_date=result.date_time;
    }
    }
}

$('#sendchat').submit(function() {
    if(friend!=0){
        var chat_context=document.getElementById('textarea').value;
        $('#textarea').val('').empty();
        var url = "/home/chat_send";
        $.ajax(url, {
            data: {receiver_id:friend,chat:chat_context},
            success: chat_show,
            //error: on_error,
            type: "POST"
        });
    }
    return false;
});

var chat_show=function(data){
    var friend_id=friend;
    $.ajax({
        url : "/home/fetch_chat",
        data: {receiver_id:friend_id},
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
        if(last_chat!=result1.chat && last_date!=result1.date_time){
            flag=1;
        }        
        if(flag==1){
            if(result1.sender_id==friend){
                var html = '<div class="chatbox_friend" id="chat_box">'+ '<p class="chats">'+result1.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result1.date_time+'</p>' + '</div>';
                $('#chat_box').height($('.chats').val()*$('.date_time').val());
                $('#view_ajax').append(html);
            }else{
                var html = '<div class="chatbox_me" id="chat_box">'+ '<p class="chats">'+result1.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result1.date_time+'</p>' + '</div>';
                $('#chat_box').height($('.chats').val()*$('.date_time').val());
                $('#view_ajax').append(html);
            }
            var elem = document.getElementById('view_ajax');
            elem.scrollTop = elem.scrollHeight;
            last_chat=result1.chat;
            last_date=result1.date_time;
            flag=0;
        }
        
    }
}

setInterval(function(){
    if(flag2!=0){
        if(count==0 && friend != 0){
            $('#view_ajax').empty();  
        }
        count=count+1;
        if(friend!=0){
            var friend_id=friend;
        }
        $.ajax({
            url : "/home/fetch_chat",
            data: {receiver_id:friend_id},
            success: fetch_chat,
            type: "POST"
        });
    
    return false;
    }
}, 1000);

