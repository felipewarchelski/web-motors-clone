<?php

require('vendor/autoload.php');

use Google\Client as GoogleClient;
use App\Session\UserGoogle as SessionUserGoogle;

if (!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
    header('location: public/index.php');
    exit;
}

$cookie = $_COOKIE['g_csrf_token'] ?? '';

if ($_POST['g_csrf_token'] != $cookie) {
    header('location: public/index.php');
    exit;
}

$client = new GoogleClient(['client_id' => '267853270306-ov6nhrnjltbpfcns91piokm37aenvu4a.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($_POST['credential']);

if (isset($payload['email'])) {

    echo "<pre>";
    print_r($payload);
    echo "</pre>";

    SessionUserGoogle::login_google($payload['given_name'], $payload['name'], $payload['email'], $payload['picture']);

    echo "<pre>";
    print_r(SessionUserGoogle::getInfo());
    echo "</pre>";

    header('location: public/index.php');
    exit;
}
