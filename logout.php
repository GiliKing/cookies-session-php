
<?php

session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];

$check = $_COOKIE['ok'];

$check = json_decode($check);

echo "<pre>";
print_r($check);
echo "</pre>";

for($i = 0; $i < count($check); $i++){

    if($check[$i]->name == $name && $check[$i]->email == $email && $check[$i]->count == 0){

        array_splice($check, $i);


        $storeCooks = new stdClass();

        $storeCooks->name = $name;
        $storeCooks->email = $email;
        $storeCooks->count = 1;

        

        array_push($check, $storeCooks);

        echo "<pre>";
        print_r($check);
        echo "</pre>";

        setcookie('ok', json_encode($check), time() + 3600);

        break;
    }
}

$_SESSION = [];

session_destroy();

header("location: login.php");

?> 