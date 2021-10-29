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

<div class="container">
		<div class="row">
			<div class="col-md-6 m-auto">

            <form method="POST">
                <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="text" id="inputName" class="form-control" name='name' autofocus>
                        <label for="inputName">Enter Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name='email' autofocus>
                        <label for="inputEmail">Enter Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password">
                        <label for="inputPassword">Password</label>
                    </div>
                    <button name='register' class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                    <span><small>Registered already? <a href='login.php'>Sign in instead</a></small></span>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
            </form>

        </div>
    </div>
</div>


	
</body>
</html>