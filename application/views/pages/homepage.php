<?php 
    $flag=0;
?>

<html>
    <head>
        <link rel="stylesheet" href="/static/css/homestyle.css">
    </head>
    <body>
        <div class="container">
            <div>
            </div>
            <div class="div1">
                <div class="div11"> <p> Friends</p></div>
                <div class="div12">
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
            </div>
            <div class="div2" id="div2">
                <div class="div21"><p> Chats</p></div>
                <p id="none"><?php echo "Select a friend and</br>start a new conversation"?></p>
                <div class="div22" id="view_ajax">
                </div>
                <div class="div23">
                    <form method="post" id="sendchat" class="textarea" >
                        <textarea  rows="5" cols="50" name="chat" class="chat" id="textarea"></textarea>
                        <input  class="send" type="submit" name="submit" value="submit" id="send">
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/static/js/homepage.js"></script>
    </body>
</html>