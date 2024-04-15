<?php
require '../vendor/autoload.php';
use \App\Session\UserGoogle as SessionUserGoogle;
use \App\Session\UserWebMotors as SessionUserWebMotors;
use \App\Includes\PesquisarVeiculos as PesquisarVeiculos;


if(isset($_REQUEST['search_button'])) {   
    if($_REQUEST['searchbar'] != '' ){
        $searchbar = $_REQUEST['searchbar'];

        include '../app/includes/pesquisar_veiculos.php';

        PesquisarVeiculos::getSearch($searchbar);
   } else {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit(); 
   }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Web Motors</title>
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href=""><img src="../imgs/webmotors-logo-8.png" alt=""></a>
        </div>
        <div class="buttons-header">
            <a href="">Comprar</a>
            <a href="">Vender</a>
            <a href="">Serviços</a>
            <a href="">Notícias</a>
            <a href="">Ajuda</a>
        </div>
        <div class="login-header">
            <a href="perfil.php" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <?php

                $info_user_google = SessionUserGoogle::getInfo();
                $info_user_webmotors = SessionUserWebMotors::getInfo();
                
                if (SessionUserGoogle::isLogged() || SessionUserWebMotors::isLogged()) {
                    
                    if (SessionUserGoogle::getInfo() != null) {
                        if (SessionUserGoogle::isLogged()) {
                            echo  $info_user_google['given_name'] ;
                        }
                    } 
                    if (SessionUserWebMotors::getInfo() != null) {
                        if (SessionUserWebMotors::isLogged()) {
                            echo  $info_user_webmotors['nome_completo'] ;
                        } 
                    }
                } else {
                    echo "Entrar";
                }
                ?>
            </a>
            <a href="">
                <img src="../imgs/coracao.png" alt="" width="20px">
            </a>
            <a href="">
                <img src="../imgs/chatting.png" alt="" width="20px">
            </a>
        </div>
    </section>
    <section class="main">
        <div class="navbar-left">
            <div class="navbar-content">
                <div class="title-nav">
                    <a href="" class="carros-title">Carros</a>
                    <a href="" class="motos-title">Motos</a>
                </div>
            </div>
            <div class="navbar-container">

            </div>
        </div>
        <div class="content">
            <div class="div-header-advertisement">
                <div class="filter-box">
                    <a href=""><img src="../imgs/filter.png" alt="" width="20px"></a>
                    <a href="" class="local">Brasil</a>
                </div>
                <div class="search-bar">
                    <form method="POST">
                        <input type="text" name="searchbar" id="" placeholder="Digite marca ou modelo do carro">
                        <button name="search_button"><img src="../imgs/search.png" alt="" width="20px" class="search-icon"/></button>
                    </form>
                </div>
            </div>
            <div class="advertisement"></div>
        </div>

        
    </section>
    <a href="../app/includes/cadastro_veiculo.php" class="btn btn-primary">Cadastro Veículo</a>
</body>
</html>