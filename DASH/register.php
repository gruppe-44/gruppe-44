<?php include("includes/header.php") ?>

	<div>
		<div>
			
			<?php validate_user_registration(); ?>
								
		</div>


	</div>

	

<?php include("includes/footer.php") ?>



<div class="limiter">
    <div class="container-login">   
        <div class="wrap-login">

            <div class="flat-form">
		<form id="register-form" method="post" role="form" >
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
                    <h1>Sign up.</h1>
                    <div class="hr-line"></div>
                </div>
                <form id="login-form"  method="post" role="form" style="display: block;">
                    <ul>
                        <li>
                            <div class="text_over_inputfields_signup_signin">
                                <h3>Enter your Name:</h3>
                            </div>
								<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required >	
                        </li>
                        <li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your last name:</h3>
                            </div>
                            	<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="" required >
						</li>
						<li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your username:</h3>
                            </div>
                            	<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required >
						</li>
						<li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your email</h3>
                            </div>
                            	<input type="email" name="email" id="register_email" tabindex="1" class="form-control" placeholder="Email Address" value="" required >
						</li>
						<li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your password:</h3>
                            </div>
                            	<input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" required>
						</li>
						<li>
                             <div class="text_over_inputfields_signup_signin">
                                 <h3>Enter your password again:</h3>
                            </div>
								<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                        </li>
                        <div class="button_right">
                        <li>
							<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control-btn" value="Register Now">
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