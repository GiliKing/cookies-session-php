<?php 

    include "displayCooks.php";

?>

<?php 

if($_SESSION['verified'] == 0) {
    header("location: verify.php");
}

if(isset($_SESSION)) {


    $storeCooks = new stdClass();

    $storeCooks->name = $name;
    $storeCooks->email = $email;
    $storeCooks->count = 0;

    //echo $storeCooks->email;


    if(!isset($_COOKIE['ok'])) {

        echo "
        <div class='container'>
        <h1>Welcome</h1> 
        <p>Your name is $name<br>
        and Your email is $email.</p>
        </div>";

        echo "ok";

        $nameArray = [];

        array_push($nameArray, $storeCooks);

        setcookie('ok', json_encode($nameArray), time() + 3600);
    } else {

        $success_tracker = [];

        $check = $_COOKIE['ok'];

        $check = json_decode($check);

        for($i = 0; $i < count($check); $i++){

            if($check[$i]->name == $name && $check[$i]->email == $email && $check[$i]->count == 1){
        
                    echo "
                    <div class='container'>
                    <h1>Welcome<em>Back</em></h1> 
                    <p>Your name is $storeCooks->name<br>
                    and Your email is $storeCooks->email.</p>
                    </div>";

                    array_push($success_tracker, $check[$i]->name);
        
                break;
            }
        }

        if(count($success_tracker) > 0) {

            // nothing to show
        } else {

            $progress_tracker = [];

            for($i = 0; $i < count($check); $i++){

                if($check[$i]->name == $name && $check[$i]->email == $email){
    
                        array_push($progress_tracker, $check[$i]->name);
            
                    break;
                }
            }

            if(count($progress_tracker) > 0) {

                echo "
                <div class='container'>
                <h1>Welcome</h1> 
                <p>Your name is $name<br>
                and Your email is $email.</p>
                </div>
                ";
                
            } else {

                echo "
                <div class='container'>
                <h1>Welcome</h1> 
                <p>Your name is $name<br>
                and Your email is $email.</p>
                </div>
                ";

                array_push($check, $storeCooks);

                setcookie('ok', json_encode($check), time() + 3600);

            }


        }
        


    }


    
    
}

?>


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

<button><a href="updateProfile.php"></a><button>

<button><a href="logout.php">Logout</a></button>
    
</body>
</html>