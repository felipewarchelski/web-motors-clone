<?php
require '../../vendor/autoload.php';

use \App\Session\User as SessionUser;

SessionUser::logout();

header ('Location: ../../public/index.php');
exit;


?>