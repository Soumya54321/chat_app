<div class="container">
    <div class="heading">
        <h1>Signup</h1>
    </div>
    <form action="/login/reg_submit" method="post">
        <div class="form-group form-element">
            <label>Email</label>
            <div class="input">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder= "Type your Email">
            </div>
        </div>
        <div class="form-group form-element">
            <label>Username</label>
            <div class="input">
                <i class="far fa-user"></i>
                <input type="text" name="username" placeholder= "Set your Username">
            </div>
        </div>
        <div class="form-group form-element">
            <label>Password</label>
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder= "Set your Password">
            </div>
        </div>
        <div class="form-group form-element">
            <label>Confirm Password</label>
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" name="conf_password" placeholder= "Retype your Password">
            </div>
        </div>
        <div class="submit">
            <input type="submit" value="SIGNUP">
        </div>
    </form>
</div>
