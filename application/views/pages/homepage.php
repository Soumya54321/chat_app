<?php 
    if (!isset($_SESSION['id'])){
         header('location: /login/view');
    } else{
?>

<ul>
  <li class="left_element"><a class="active" href="#home">Home</a></li>
  <li class="left_element"><a href="#friend_requests">Friend Requests</a></li>
  <li class="left_element"><a href="#contact">Contact</a></li>
  <li class="left_element"><a href="#about">About</a></li>
  <li class="right_element"><a href="/login/logout">Log Out</a></li>
</ul>

<div class="body">
    <div  class="upper">
        <div class="left_heading"><p class="heading_friend"> Friends</p></div>
        <div class="right_heading"><p class="heading_chat"> Chats</p></div>
    </div>
    <div  class="lower">
        <div class="left_down" >
            <?php
            if(!$friend){
                ?>
                <p class="none"><?php echo "No friend is found</br>Add new friend to start a conversation"?></p>
                <?php
            } else{
                foreach($friend as $row) {
                ?>
                <div class="friend" id="<?php echo $row['id'] ?>">
                    <p> <?php echo $row['username']; ?> </p>
                </div>    	
                <?php
                }
            }
            ?>
        </div>
        <div class="right">
            <p class="none_chat" id="none"><?php echo "Select a friend and</br>start a new conversation"?></p>
            <div class="right-mid" id="view_ajax">
            </div>
            <div class="right-bottom">
                <form method="post" id="sendchat" class="form" >
                    <textarea  rows="5" cols="50" name="chat" class="textarea" id="textarea"></textarea>
                    <input  class="send" type="submit" name="submit" value="submit" id="send">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>