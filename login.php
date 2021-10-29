


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- to make the page not to go back -->


<?php

session_start();

if(isset($_SESSION['name']) && isset($_SESSION['email']) && $_SESSION['verified'] == 1) {
    header("location: user.php");
}
    
?>

<div class="container">
		<div class="row">
			<div class="col-md-6 m-auto">

            <form method="POST">
                <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name='email' autofocus>
                        <label for="inputEmail">Enter Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password">
                        <label for="inputPassword">Password</label>
                    </div>
                    <button name='login' class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                    <span><small>Dont Have An Account <a href='app_register.php'>Register With Us.</a></small></span>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
            </form>

        </div>
    </div>
</div>


<script src="js/app.js"></script>	
</body>
</html>