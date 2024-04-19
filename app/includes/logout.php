<?php
include '../Session/UserWebMotors.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

echo"nem entrou";
    if (!SessionUserWebMotors::isLogged()) {
        header('Location: ../../public/login.php');
        echo"!isLogged" . '<br>';
    }
        SessionUserWebMotors::logout();        

?>
