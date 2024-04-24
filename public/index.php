<?php
include '../app/Session/UserWebMotors.php';
include '../app/includes/gera_anuncio.php';

use \App\Session\UserWebMotors as SessionUserWebMotors;

$valor_pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

$valor_pesquisa_formatado = ucwords(strtolower($valor_pesquisa));

$params = array(
    'pesquisa' => $valor_pesquisa,
);
$query_string = http_build_query($params);
$url = 'index.php?' . $query_string;

if ($url != 'index.php?pesquisa=') {
    include '../app/includes/pesquisar_veiculos.php';
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $cor = $_POST['cor'];
    $blindado = $_POST['blindado'];


    include '../app/includes/filtrar_veiculos.php';
}
$data = $tableData;

$rows = 0;
foreach ($data as $datas) {
    if ($datas['anuncio_liberado'] == "S") {
        $rows++;
    }
}

$num_rows = count($tableData);

$repetir = range(1, $num_rows);

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
            <a href="index.php"><img src="../imgs/webmotors-logo-8.png" alt=""></a>
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
                    if ($info_user_webmotors != null) {
                        $nome_completo = $info_user_webmotors['nome_completo'];
                        $nome_formatado = ucwords(strtolower($nome_completo)); // Converte para primeira letra maiúscula
                        echo $nome_formatado;
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
            <form action="" method="post">
                <div class="nav-content">
                    <div class="marca">
                        <h2>Marca</h6>
                            <select name="marca">
                                <option value="" selected>Escolha uma marca</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Ford">Ford</option>
                                <option value="Honda">Honda</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Volvo">Volvo</option>
                            </select>
                    </div>
                    <div class="modelo" id="espacamentoFiltros">
                        <h2>Modelo</h6>
                            <select name="modelo">
                                <option value="" selected>Escolha um modelo</option>
                                <option value="Uno">Uno</option>
                                <option value="Onix">Onix</option>
                                <option value="Silverado Edição LE">Silverado Edição LE</option>
                                <option value="Fusion">Fusion</option>
                                <option value="Civic">Civic</option>
                                <option value="Corolla XRS">Corolla XRS</option>
                                <option value="Frontier">Frontier</option>
                                <option value="x60">x60</option>
                            </select>
                    </div>
                    <div class="ano_lancamento" id="espacamentoFiltros">
                        <h2>Ano de lançamento</h6>
                            <select name="ano_lancamento">
                                <option value="" selected>Escolha um ano</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                    </div>
                    <div class="ano_fabricacao" id="espacamentoFiltros">
                        <h2>Ano de Fabricação</h2>
                        <select name="ano_fabricacao" id="fabricacaoSelect">
                            <option value="" selected>Escolha um ano</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="cor" id="espacamentoFiltros">
                        <h2>Cor</h2>
                        <select name="cor">
                            <option value="" selected>Escolha uma cor</option>
                            <option value="Verde">Verde</option>
                            <option value="Azul">Azul</option>
                            <option value="Vermelho">Vermelho</option>
                            <option value="Preto">Preto</option>
                            <option value="Cinza Escuro">Cinza Escuro</option>
                            <option value="Prata">Prata</option>
                        </select>
                    </div>
                    <div class="blindado" id="espacamentoFiltros">
                        <h2>Blindagem</h2>
                        <div class="blindado-content">
                            <div class="blindado-s">
                                <input type="radio" name="blindado" id="blindadoCheckbox" value="S">
                                <p>Sim</p>
                            </div>
                            <div class="blindado-n">
                                <input type="radio" name="blindado" id="blindadoCheckbox" value="N" checked>
                                <p>Não</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-button-nav">
                    <input type="submit" value="Buscar" name="buscar">
                </div>
            </form>
        </div>
        <div class="main-content">
            <div class="div-header-content">
                <div class="left-header">
                    <img src="imgs/filter.png" alt="" width="20px">
                    <a href="">Brasil</a>
                </div>
                <div class="right-header">
                    <form action="index.php" method="GET">
                        <input type="text" name="pesquisa" id="pesquisa" placeholder="Digite marca ou modelo do carro">
                        <? if (isset($_GET['pesquisa'])) {
                            $pesquisa = $_GET['pesquisa'];
                        } ?>
                    </form>
                    <a href=""><img src="../imgs/search.png" alt="" width="18px" class="search-icon"></a>
                    <img src="../imgs/view-list.png" alt="" width="20px" class="view-list">
                    <img src="../imgs/up-and-down-arrow.png" alt="" width="22px">
                    <p>MAIS RELEVANTES</p>
                </div>
            </div>
            <div class="content">
                <h3>Home > <n>Carros</n>
                </h3>
                <h4>Carros usados e seminovos em todo o Brasil | Webmotors</h4>
                <?php
                if ($rows > 0) {
                    echo '<h6>' . $rows  . ' veiculos encontrados</h6>';
                } else {
                    echo '<h6>Nenhum veiculo encontrado</h6>';
                }
                ?>
                <div class="main-cards">
                    <!-- INÍCIO DO PHP PARA IMPRIMIR O ANÚNCIO NA TELA -->

                    <?php

                    if (is_array($tableData) && !empty($tableData)) {
                        foreach ($tableData as $dados) {
                            if ($dados['anuncio_liberado'] == "S") {
                                echo '<div class="card" style="width: 14.8rem;">
                                    <img src="' . $dados['imagem_anuncio'] . '" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $dados['marca'] . ' / ' . $dados['modelo'] . '</h5>
                                        <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;">' . $dados['descricao_inicial'] . '</p>
                                        <h2>R$' . $dados['preco'] . '</h2>
                                        <h3>' . $dados['ano_fabricacao'] . '/' . $dados['ano_lancamento'] . '</h3>
                                        <a href="#" class="btn btn-primary">Ver anúncio</a>
                                    </div>
                                </div>';
                            }
                        }
                    } else {
                        echo "Sem resultados para essa consulta!";
                    }
                    ?>
                    <!-- FIM DO PHP PARA IMPRIMIR O ANÚNCIO NA TELA -->
                </div>
            </div>
        </div>
    </section>
</body>

</html>