<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    <form action="" method="post">
        <input type="submit" value="Log-out" name="logout-button">
    </form>

    <?php
    require 'vendor/autoload.php';

    use \App\Session\User as SessionUser;

    if (@$_REQUEST['logout-button']) {
        SessionUser::logout();
        header('Location: index.php');
        exit;
    }
    ?>
</body>

</html>