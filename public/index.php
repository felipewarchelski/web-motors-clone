<?php
require '../vendor/autoload.php';

use \App\Session\User as SessionUser;

include '../app/includes/header.php';

include SessionUser::isLogged() ? 
    '../app/includes/logado.php' :
    '../app/includes/pagina_login.php' ;

include '../app/includes/footer.php';
?>