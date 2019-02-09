// var friend_id= $.session.get("friend_id");
// //var friend=document.getElementById(friend_id);
// var user_id=1;
  
$('.friend').click(function(){
      var user_id=1;
      var friend_id=$(this).attr('id');
      //console.log(friend_id);
        $.ajax({
            url : "/home/chat",
            data: {sender_id:user_id,receiver_id:friend_id},
            success: fetch_success,
            
            type: "POST"
        });
        return false;
    });

var fetch_success=function(data){
          var jsonData = JSON.parse(data);
          console.log(jsonData);
          // var jsonLength = jsonData.results.length;
          // var html = "";
          // for (var i = 0; i < jsonLength; i++) {
          //   var result = jsonData.results[i];
          //   html += '<div class="friend">'+ '<p>'+result.chat+'</p>' + '</div>';
          // }
          // $('#view_ajax').append(html);
}