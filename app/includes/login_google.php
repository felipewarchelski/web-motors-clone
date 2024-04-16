<?php

require '../../vendor/autoload.php';
include 'config.php';

use Google\Client as GoogleClient;
use App\Session\UserGoogle as SessionUserGoogle;

if (!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
    header('location: ../../public/index.php');
    exit;
}

$cookie = $_COOKIE['g_csrf_token'] ?? '';

if ($_POST['g_csrf_token'] != $cookie) {
    header('location: ../../public/index.php');
    exit;
}

$client = new GoogleClient(['client_id' => '267853270306-ov6nhrnjltbpfcns91piokm37aenvu4a.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($_POST['credential']);

if (isset($payload['email'])) {
    SessionUserGoogle::login_google($payload['given_name'], $payload['name'], $payload['email'], $payload['picture']);

    $email =   $payload ['email']; 
    $nome_completo = $payload ['name'];
    $picture = $payload ['picture'];
    $password = '';
    
    for ($i = 0; $i < 20; $i++) {
        $password .= md5(random_int(0, 9)); 
    }

    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    
    
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO usuario (id, cpf, nome_completo, email, senha, genero, data_nascimento, telefone, cep, cidade, uf,
        nivel, imagem_perfil) VALUES (null, null, '$nome_completo', '$email', '$password', null, null, null, null, null, null, 'ADM', '$picture');";
    
        $result = mysqli_query($con, $query);
    }
    
    header('location: ../../public/index.php');
    exit;
}
