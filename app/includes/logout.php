<?php
include '../Session/UserWebMotors.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

    if (!SessionUserWebMotors::isLogged()) {
        header('Location: ../../public/login.php');
    }
        SessionUserWebMotors::logout();        

?>
