
<?php
require '../vendor/autoload.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

if(isset($_REQUEST['search_button'])) {   
    if($_REQUEST['searchbar'] != '' ){
        $searchbar = $_REQUEST['searchbar'];

        include '../app/includes/pesquisar_veiculos.php';

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
    <link rel="stylesheet" href="styles/index.css">
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
            <a href="anunciar.php">Vender</a>
            <a href="">Serviços</a>
            <a href="">Notícias</a>
            <a href="">Ajuda</a>
        </div>
        <div class="login-header">
            <a href="perfil.php" type="button">
                <img src="../imgs/user.png" alt="" width="24px">
                <?php

                $info_user_webmotors = SessionUserWebMotors::getInfo();
                
                if (SessionUserWebMotors::isLogged()) {
                     
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
            <div class="title-nav">
                <a href="" class="carros-title">Carros</a>
                <a href="" class="motos-title">Motos</a>
            </div>
            <div class="nav-content">
                <!-- COLOCAR AS DEPENDENCIAS DO BD EM DIVS E FORMS -->
            </div>
        </div>
        <div class="main-content">
            <div class="div-header-content">
                <div class="left-header">
                    <img src="imgs/filter.png" alt="" width="20px">
                    <a href="">Brasil</a>
                </div>
                <div class="right-header">
                    <input type="text" name="procura" id="" placeholder="Digite marca ou modelo do carro">
                    <img src="../imgs/search.png" alt="" width="18px" class="search-icon">
                    <img src="../imgs/view-list.png" alt="" width="20px" class="view-list">
                    <img src="../imgs/up-and-down-arrow.png" alt="" width="22px">
                    <p>MAIS RELEVANTES</p>
                </div>
            </div>
            <div class="content">
                <h3>Home > <n>Carros</n></h3>
                <h4>Carros usados e seminovos em todo o Brasil | Webmotors</h4>
                <h6>352.377 carros encontrados</h6>
                <div class="main-cards">
                    <?php
                    include '../app/includes/gera_anuncio.php';

                    $num_rows = count($tableData);

                    $repetir = range(1, $num_rows);

                    if (is_array($tableData) && !empty($tableData)) {
                        
                        foreach ($tableData as $dados) {
                            echo '<div class="card" style="width: 14.8rem;">
                                    <img src="' . $dados['imagem_anuncio'] . '" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $dados['marca'] . ' / ' . $dados['modelo'] . '</h5>
                                        <p class="card-text" style="max-height: 3.6em; overflow: hidden; text-overflow: ellipsis;">' . $dados['descricao_inicial'] . '</p>
                                        <h2>R$' . $dados['preco'] . '</h2>
                                        <h3>' . $dados['ano_fabricacao'] . '/' . $dados['ano_lancamento'] . '</h3>
                                        <a href="#" class="btn btn-primary">Ver anúncio</a>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "Nenhum dado encontrado.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>