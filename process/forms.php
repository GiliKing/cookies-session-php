
<?php 

if(isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $token = bin2hex(random_bytes(50));  // generate unique token

    $errors = [];


	if(empty($name)){

		$errors[] = "<div class='alert alert-info'>Please enter your name</div>";

	}

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = registerNewUser($name, $email, $password, $token);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}



if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = loginUser($email, $password);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}
?>