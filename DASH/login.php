<?php include("includes/header.php") ?>

<?php 
	if(logged_in()) {
		redirect("Dash.html");
	}
 ?>
	<div>
		<div>			
			<?php display_message(); ?>

			<?php validate_user_login(); ?>								
		</div>
	</div>

	<?php include("includes/footer.php") ?>
	 <div class="limiter">
        <div class="container-login">
            <div class="wrap-login">


            <div class="flat-form">
            <ul class="tabs">
                <li>
					<a href="login.php" class="active" id="login-form-link">Login</a>
                </li>
                <li>
					<a href="register.php" id="">Register</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <div class=signin_signup_text>
                    <h1>Sign in.</h1>
                    <div class="hr-line"></div>
                </div>
                <form id="login-form"  method="post" role="form" style="display: block;">
                    <ul>
                        <li>
                            <div class="text_over_inputfields_signup_signin">
                                <h3>Enter your e-mail:</h3>
                            </div>
                            	<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required>	
                        </li>
                        <li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your password:</h3>
                            </div>
                            <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" required>
                        </li>
                        <div class="button_right">
                        <li>
							<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control-btn" value="Log In">
						</li>
                        </div>
                    </ul>
                </form>
            </div>           
        </div>

        <div class="wrap-picturefront" style="background-image: url('pictures/bg-01.jpg');">
            <div class="frontquotebox">
                <div class="textquote">
                <img src="pictures/logo2.png" class="logo_website">
                <h2 class="front">Because Life’s Complicated Enough.</h2>
            </div>
        </div>
    </div>
</div>
</div>
</div>