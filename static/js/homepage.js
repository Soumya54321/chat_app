var friend=0;


  $('.friend').click(function(){
      $('#view_ajax').empty();
      var user_id=1;
      var friend_id=$(this).attr('id');
      friend=friend_id;
        $.ajax({
            url : "/home/chat",
            data: {sender_id:user_id,receiver_id:friend_id},
            success: fetch_success,
            type: "POST"
        });
        return false;
    });

   // $('.friend').click()

var fetch_success=function(data){
          //location.reload();
          var jsonData = JSON.parse(data);
          console.log(jsonData);
          var jsonLength = jsonData.length;
          console.log(jsonLength);
          for (var i = 0; i < jsonLength; i++) {
            var result = jsonData[i];
            if(result.sender_id==friend){
                var html = '<div class="chatbox_friend">'+ '<p class="chats">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
                $('#view_ajax').append(html);
            }else{
                var html = '<div class="chatbox_me">'+ '<p class="chats">'+result.chat+'</p>'+'<br/>'+'<p class="date_time">'+ result.date_time+'</p>' + '</div>';
                $('#view_ajax').append(html);
            }
          }
}

setInterval(function(){
}, 5000);



