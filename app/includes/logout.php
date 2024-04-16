<?php

require '../vendor/autoload.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

    if (SessionUserWebMotors::isLogged()) {
        echo "logado";
    } else {
        header('Location: ../public/login.php');
    }

    if (isset($_POST['logout-button'])) {
        SessionUserWebMotors::logout();            
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout </title>
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        button {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="submit" name="logout-button">Logout</button>
        </form>
    </div>
</body>

</html>