
<?php 
    if (isset($_SESSION['id'])){
        header('location: /home/homepage');
    } else{
?>
<div class="main">
        <div class="container">
            <div class="wrapper">
                <form id="submit-form" action="/login/login_submit" method="post">
                    <span class="heading">Account Login</span>
                    <div class="other-login">
                            <div class="google-login">
                                <button>
                                    <i class="fab fa-google"></i>
                                    Google
                                </button>
                            </div>
                            <div class="fb-login">
                                    <button>
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </button>
                            </div>
                        </div>
                    <div class="or">
                        <hr class="hr-left">
                        OR
                        <hr class="hr-right">
                    </div>
                    <span class="text">Username</span>
                    <div class="input">
                        <input type="text" name="username" class="username">
                        <span class="focus-input"></span>
                        <span class="error error-username">
                            <span class="error-txt-username">Please Fill this Field</span>
                            <span class="error-img"><i class="fas fa-exclamation"></i></span>
                        </span>
                    </div>
                    <span class="text">Password</span>
                    <div class="input">
                        <input type="password" name="password" class="password">
                        <span class="focus-input"></span>
                        <span class="error error-password">
                            <span class="error-txt-password">Please Fill this Field</span>
                            <span class="error-img"><i class="fas fa-exclamation"></i></span>
                        </span>
                    </div>
                    <div class="error-login">
                        <p>Your Username or Password is Incorrect</p>
                    </div>
                    <div class="login-btn">
                        <button class="btn" type="submit" form="submit-form">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
