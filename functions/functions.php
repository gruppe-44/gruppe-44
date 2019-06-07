<?php



/*Hjelpe funksjoner */


function clean($string) {
	return htmlentities($string);
}

function redirect($location){
	return header("Location: {$location}");
}


function set_message($message) {
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}



function display_message(){

	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function token_generator(){
	$token = $_SESSION['token'] =  md5(uniqid(mt_rand(), true));
	return $token;
}

function email_exists($email) {
	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = query($sql);
	if(row_count($result) == 1 ) {
		return true;
	} else {
		return false;
	}
}

function username_exists($username) {
	$sql = "SELECT id FROM users WHERE username = '$username'";
	$result = query($sql);
	if(row_count($result) == 1 ) {
		return true;
	} else {
		return false;
	}
}

/*Validerer funksjoner*/

function validate_user_registration(){
	$errors = [];
	$min = 3;
	$max = 20;



	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$first_name 		= clean($_POST['first_name']);
		$last_name 			= clean($_POST['last_name']);
		$username 		    = clean($_POST['username']);
		$email 				= clean($_POST['email']);
		$password			= clean($_POST['password']);
		$confirm_password	= clean($_POST['confirm_password']);

		if(strlen($first_name) < $min) {
			$errors[] = "Your first name cannot be less than {$min} characters";
		}

		if(strlen($first_name) > $max) {
			$errors[] = "Your first name cannot be more than {$max} characters";
		}
	
		if(strlen($last_name) < $min) {
			$errors[] = "Your Last name cannot be less than {$min} characters";
		}

		if(strlen($last_name) > $max) {
			$errors[] = "Your Last name cannot be more than {$max} characters";
		}

		if(strlen($username) < $min) {
			$errors[] = "Your Username cannot be less than {$min} characters";
		}

		if(strlen($username) > $max) {
			$errors[] = "Your Username cannot be more than {$max} characters";
		}

		if(username_exists($username)){
			$errors[] = "Sorry that username is already is taken";
		}



		if(email_exists($email)){
			$errors[] = "Sorry that email already is registered";
		}

		if(strlen($email) < $min) {
			$errors[] = "Your email cannot be more than {$max} characters";
		}

		if($password !== $confirm_password) {
			$errors[] = "Your password fields do not match";
		}

		if(!empty($errors)) {
			foreach ($errors as $error) {
			echo validation_errors($error);
			}
		} else{
			set_message("<p class='bg-success text-center'>You have been registered into the system</p>");
			redirect("login.php");
		}



	}



} // function 

/*Registrerer bruker funksjoner*/

function register_user($first_name, $last_name, $username, $email, $password) {


	$first_name = escape($first_name);
	$last_name  = escape($last_name);
	$username   = escape($username);
	$email      = $email;
	$password   = escape($password);



	if(email_exists($email)) {
		return false;
	} else if (username_exists($username)) {
		return false;
	} else {
		$password   = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
		$sql = "INSERT INTO users(first_name, last_name, username, email, password)";
		$sql.= " VALUES('$first_name','$last_name','$username','$email','$password')";
		query('SET NAMES utf8');
		$result = query($sql);
		confirm($result);
	} 
}



/*Validere brukerfunksjoner*/



function validate_user_login(){
	$errors = [];
	$min = 3;
	$max = 20;
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$email 		= clean($_POST['email']);
		$password	= clean($_POST['password']);
		$remember   = isset($_POST['remember']);
		if(empty($email)) {
			$errors[] = "Email field cannot be empty";
		}
		if(empty($password)) {
			$errors[] = "Password field cannot be empty";
		}
		if(!empty($errors)) {
				foreach ($errors as $error) {
				echo validation_errors($error);				
				}
		} else {
			if(login_user($email, $password, $remember)) {
				redirect("Side2.html");
				}
			}
	}
} 

/*Bruker login funksjoner*/


	function login_user($email, $password, $remember) {


		$sql = "SELECT password, id FROM users WHERE email = '".escape($email)."'";

		$result = query($sql);

		if(row_count($result) == 1) {

			$row = fetch_array($result);

			$db_password = $row['password'];


			if(password_verify($password, $db_password)){

				if($remember == "on") {

					setcookie('email', $email, time() + 86400);

				}

				$_SESSION['email'] = $email;

				return true;

			}else {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}



/*funksjon for inlogget */



function logged_in(){

	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){


		return true;

	} else {


		return false;
	}




}