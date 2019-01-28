<div class="container">
    <div class="heading">
        <h1>Login</h1>
    </div>
    <form action="/login/login_submit" method="post">
        <div class="form-group form-element">
            <label>Username</label>
            <div class="input">
                <i class="far fa-user"></i>
                <input type="text" name="username" placeholder= "Type your Username">
            </div>
        </div>
        <div class="form-group form-element">
            <label>Password</label>
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder= "Type your Password">
            </div>
        </div>
        <div class="forgot-password">
            <p>Forgot Password?</p>
        </div>
        <div class="submit">
            <input type="submit" value="LOGIN">
        </div>
    </form>
</div>
