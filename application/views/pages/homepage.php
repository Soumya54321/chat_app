<html>
    <head>
        <link rel="stylesheet" href="/static/css/homestyle.css">
    </head>
    <body>
        <div class="container">
            <div>
            </div>
            <div class="div1">
                <?php
                foreach($friend as $row) {
                ?>
                <div class="friend">
                    <p>
                        <?php echo $row['username']; ?>
                    </p>
                </div>    	
                <?php
                    }
                ?>
            </div>
            <div class="div2">
            </div>
        </div>
    </body>
</html>