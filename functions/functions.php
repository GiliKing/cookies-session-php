<?php

function registerNewUser($name, $email, $password, $token) {

    require "database/base.php";

    $response = checkUser($email, $password);

    if($response == true) {

        echo "<div class='alert alert-info'>User Already Exit</div>";

    } else {

        $users_register = "INSERT INTO users (`name`, `email`, `password`, `token`) VALUES('$name', '$email', '$password', '$token')";

        $users_result = mysqli_query($conn, $users_register);

        if($users_result) {

            echo "<div class='alert alert-success'>User Registered Successfully</div>";

            session_start();

            $_SESSION['NewEmail'] = $email;
            $_SESSION['NewToken'] = $token;

            header("location: verify.php");
        } else  {
            mysqli_error($conn);
        }

    }




};


function checkUser($email, $password) {

    require "database/base.php";

    $user_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
        
            return true;

        } else {

            return false;
            
        }
    }else {
        echo mysqli_error($conn);
    }
}


function loginUser($email, $password) {

    require "database/base.php";

    $user_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {

            session_start();

            $_SESSION = mysqli_fetch_array($users_result, MYSQLI_ASSOC);

            $verified = $_SESSION['verified'];

            if($verified != 1) {

                $_SESSION['NewEmail'] = $_SESSION['email'];
                $_SESSION['NewToken'] = $_SESSION['token'];

                header("location: verify.php");
                
            }

            if($verified == 1) {

                header("location: user.php");

            }

            
        } else {

            echo "<div class='alert alert-danger'>Invalid Email/Password</div>";
        }
    }

}

?>