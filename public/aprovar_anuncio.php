<?php
include '../app/Session/UserWebMotors.php';
include '../app/includes/config.php';
include '../app/includes/gera_anuncio.php';

use App\Session\UserWebMotors as SessionUserWebMotors;

if (!SessionUserWebMotors::isLogged()) {
    header('Location: login.php');
}

$info = SessionUserWebMotors::getInfo();
$nome_formatado = ucfirst(strtolower($info['nome_completo']));
$primeiraLetra = substr($nome_formatado, 0, 1);
$id = $info['id'];

if (is_array($tableData) && !empty($tableData)) {
    foreach ($tableData as $dados) {
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aprovar'])) {
    $id_veiculo = $_POST['id_veiculo'];
    
    
    $query = "UPDATE anuncio SET anuncio_liberado = 'S' WHERE id = '$id_veiculo'";
    $result = mysqli_query($con, $query);

    header ('Location: aprovar_anuncio.php');
    
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recusar'])){
    $id_veiculo = $_POST['id_veiculo'];

    $query = "DELETE FROM anuncio WHERE id = '$id_veiculo'";
    $result = mysqli_query($con, $query);

    header ('Location: aprovar_anuncio.php');
    
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/aprovar_anuncio.css">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
    <title>Web Motors</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="index.php"><img src="../imgs/webmotors-logo-8.png" alt=""></a>
        </div>
        <div class="title">
            <h2>Minha Garagem</h2>
            <a href="#">
                <img src="../imgs/chatting.png" alt="Chat">
            </a>
        </div>
        <a class="user" href="#">
            <div class="circle"> <?php echo $primeiraLetra; ?> </div>
        </a>
    </section>
    <section class="main">

        <div class="navbar">
            <div class="navbar-header">
                <div class="user-icon"><?php echo $primeiraLetra; ?></div>
                <div class="user-data">
                    <?php
                    $userInfo = SessionUserWebMotors::getInfo();
                    echo '<h3>' . $userInfo['nome_completo'] . '</h3>
                            <h4>' . $userInfo['email'] . '</h3>';
                    ?>
                </div>
            </div>
            <div class="nav-content">
                <a href="#">
                    <svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.399 10.057A5.064 5.064 0 0110.457 5a5.064 5.064 0 015.057 5.057 5.063 5.063 0 01-5.057 5.057 5.063 5.063 0 01-5.058-5.057zm15.207 8.736l-4.51-4.51a7.013 7.013 0 001.418-4.226C17.514 6.166 14.348 3 10.457 3a7.066 7.066 0 00-7.058 7.057c0 3.891 3.166 7.057 7.058 7.057a7.013 7.013 0 004.225-1.418l4.51 4.51a.993.993 0 00.707.294.999.999 0 00.707-1.707z" fill="#2E2D37"></path>
                    </svg>Buscar veículo</a>
                <a href="#">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10H5.618l2-4h8.764l.723 1.447a1 1 0 101.79-.894l-1-2A1.001 1.001 0 0017 4H7c-.379 0-.725.214-.895.553l-3 6c-.005.012-.007.025-.013.037-.009.022-.014.044-.023.066a1.003 1.003 0 00-.061.305C3.007 10.975 3 10.986 3 11v6c0 .064.025.12.036.18-.022.104-.036.21-.036.32v1c0 .825.675 1.5 1.5 1.5h1c.825 0 1.5-.675 1.5-1.5V18h6a1 1 0 000-2H5v-1h2a1 1 0 000-2H5v-1h9a1 1 0 000-2zm7.158 5.223l-.012-.009c-.47-.34-1.07-.585-1.893-.769l-.17-.034c-.428-.102-.743-.23-.937-.38-.197-.152-.197-.239-.197-.315 0-.205.163-.36.232-.419.185-.15.457-.256.706-.272h.161c.434.017.8.263 1.312.64.222.15.502.2.77.131l.39-.132.177-.295c.262-.437.15-1.012-.245-1.28-.344-.259-.859-.647-1.519-.853v-.467c0-1.053-.909-1.07-.962-1.07l-.417.023-.249.252c-.278.283-.272.63-.269.795v.466c-1.184.361-1.982 1.35-1.993 2.481 0 .735.34 1.394.957 1.858.435.327 1.011.572 1.715.728l.184.037c.523.116.898.26 1.114.428.221.17.24.293.24.405 0 .234-.158.413-.29.523a1.44 1.44 0 01-.882.31l-.132.001c-.704-.05-1.345-.589-1.526-.754a.984.984 0 00-.695-.238l-.47.063-.233.325a.982.982 0 00.132 1.292c.325.3.995.83 1.88 1.094v.47c-.004.132-.012.482.274.771l.311.272h.354c.04 0 .957-.012.957-1.072v-.407c1.325-.346 2.215-1.402 2.225-2.65 0-.772-.355-1.464-1-1.949z" fill="#2E2D37"></path>
                    </svg>
                    Vender meu veículo</a>
                <a href="aprovar_anuncio.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16" color="#202020">
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                    </svg>Aprovar anúncios</a>
                    <a href="#">
                    <svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.399 19c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm8-3h-4.142c-.447-1.72-2-3-3.858-3s-3.411 1.28-3.858 3H4.399v-2h2a1 1 0 000-2h-2v-1.144l2.31-.361c1.907-.298 3.712-1.253 5.277-2.817C13.076 6.611 14.64 6 16.275 6h5.124a1 1 0 000-2h-5.124c-2.185 0-4.204.798-5.687 2.247l-.071.071C9.309 7.526 7.886 8.287 6.4 8.519l-3.156.493a1 1 0 00-.846.988v7a1 1 0 001 1H9.54c.447 1.72 2 3 3.858 3s3.41-1.28 3.858-3h4.142a1 1 0 000-2z" fill="#2E2D37"></path>
                    </svg>
                    Meus anúncios</a>
                <a href="#">
                    <svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.2 5c-.551 0-1 .449-1 1v8.586l1.293-1.293A.997.997 0 017.2 13h8.002c.552 0 1-.449 1-1V6c0-.551-.448-1-1-1H6.2zm-2 13a1.002 1.002 0 01-1-1V6c0-1.654 1.346-3 3-3h9.002c1.655 0 3 1.346 3 3v6c0 1.654-1.345 3-3 3H7.614l-2.707 2.707A1 1 0 014.2 18z" fill="#2E2D37"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2 21a1 1 0 01-.707-.293L16.786 18H9.202a1 1 0 010-2H17.2a1 1 0 01.707.293l1.293 1.293v-7.584a1 1 0 012 0V20a1.002 1.002 0 01-1 1z" fill="#2E2D37"></path>
                    </svg>
                    Chat</a>
                <a href="#">
                    <svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.427 6.005c-.163 0-.323.013-.479.037C6.716 6.236 5.4 7.216 5.4 9.385c0 4.025 5.272 7.737 7 8.845 1.728-1.108 7-4.82 7-8.845 0-2.17-1.318-3.15-2.55-3.343-1.276-.2-2.917.403-3.499 2.204a.999.999 0 01-1.903 0c-.51-1.582-1.839-2.241-3.02-2.241zm4.166 14.284h-.389c-.184 0-.365-.052-.523-.148C9.738 18.947 3.4 14.645 3.4 9.385c0-3.213 2.13-4.986 4.24-5.318 1.87-.294 3.634.413 4.76 1.797 1.126-1.383 2.89-2.094 4.76-1.797 2.111.332 4.24 2.105 4.24 5.318 0 5.26-6.34 9.562-8.283 10.756a1.004 1.004 0 01-.523.148z" fill="#2E2D37"></path>
                    </svg>
                    Favoritos</a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.869 17l.963-1.445A.997.997 0 008 15v-4c0-2.206 1.795-4 4-4 2.206 0 4 1.794 4 4v4c0 .197.059.391.168.555L17.132 17H6.869zm5.13 3c-.55 0-1-.449-1-1h2c0 .551-.447 1-1 1zm7.833-2.555L18 14.697V11a6 6 0 00-3.02-5.201A2.994 2.994 0 0012 3a2.993 2.993 0 00-2.98 2.799A6 6 0 006 11v3.697l-1.832 2.748A1.002 1.002 0 005 19h4c0 1.654 1.346 3 3 3 1.655 0 3-1.346 3-3h4a1 1 0 00.832-1.555z" fill="#2E2D37"></path>
                    </svg>
                    Alertas</a>
                <a href="#">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.284 15.263H8.33c-.503 0-.905-.302-1.005-.805L5.815 8.123 5.212 6.01H4.005C3.402 6.011 3 5.61 3 5.006 3 4.402 3.402 4 4.005 4h2.011c.503 0 .905.302 1.006.804l.503 2.112 12.469.1c.302 0 .603.101.804.403.202.201.202.603.202.905l-1.71 6.335c-.201.302-.603.604-1.006.604zm-9.15-2.012h8.346l1.207-4.324-10.66-.1 1.107 4.424zM9.234 21.095A2.596 2.596 0 016.62 18.48c0-1.508 1.106-2.614 2.614-2.614 1.508 0 2.615 1.106 2.615 2.614a2.596 2.596 0 01-2.615 2.615zm0-3.117c-.302 0-.603.2-.603.603 0 .302.2.603.603.603.302 0 .604-.2.604-.603 0-.402-.302-.603-.604-.603zM16.977 21.095c-1.408 0-2.614-1.106-2.614-2.615 0-1.508 1.106-2.614 2.614-2.614 1.508 0 2.615 1.106 2.615 2.614a2.596 2.596 0 01-2.615 2.615zm0-3.117c-.302 0-.603.2-.603.603 0 .302.2.603.603.603.302 0 .604-.2.604-.603-.101-.402-.302-.603-.604-.603z" fill="#2E2D37"></path>
                    </svg>
                    Produtos</a>
                <a href="#">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.098 11.803l-.01-.008c-.457-.33-1.042-.57-1.854-.752l-.175-.035c-.44-.105-.769-.239-.974-.398-.218-.168-.236-.283-.236-.394 0-.238.172-.416.27-.496a1.41 1.41 0 01.767-.295h.166c.463.018.846.276 1.364.657.2.135.45.177.682.12l.354-.12.16-.265c.238-.398.13-.91-.22-1.148-.372-.28-.888-.666-1.559-.859v-.54c0-.96-.822-.972-.857-.972l-.378.021-.22.225c-.25.254-.245.563-.242.725v.541c-1.164.325-1.982 1.27-1.993 2.406 0 .703.326 1.334.917 1.778.423.318.982.556 1.675.71l.186.037c.54.12.925.27 1.153.447.232.178.28.323.28.484 0 .272-.18.477-.328.6a1.528 1.528 0 01-.943.332l-.14.002c-.739-.054-1.396-.606-1.586-.779a.863.863 0 00-.616-.214l-.428.057-.207.29a.884.884 0 00.12 1.16c.294.271.992.838 1.91 1.093v.547c-.003.131-.009.44.241.694l.283.247h.316c.035 0 .857-.01.857-.972v-.485c1.284-.305 2.215-1.33 2.225-2.572 0-.739-.34-1.403-.96-1.869zM12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm0-18C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2z" fill="#2E2D37"></path>
                    </svg>
                    Financiamento</a>
                <a href="#">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.1 10c0-1.654 1.346-3 3-3s3 1.346 3 3-1.346 3-3 3-3-1.346-3-3zm10.704 7.905a8.51 8.51 0 00-4.37-4.206C16.449 12.783 17.1 11.471 17.1 10c0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.471.65 2.783 1.666 3.699a8.514 8.514 0 00-4.372 4.21 1.001 1.001 0 00.906 1.423.999.999 0 00.906-.578A6.53 6.53 0 0112.1 15a6.53 6.53 0 015.893 3.752 1 1 0 001.81-.847z" fill="#2E2D37"></path>
                    </svg>
                    Minha Conta</a>
                <a href="perfil.php">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.127 14.207c0 .578.473 1.05 1.05 1.05a1.04 1.04 0 001.052-1.05v-.662c.493-.41.956-.904 1.46-1.576l.137-.18c.83-1.05 1.072-2.405.64-3.54-.346-.893-1.008-1.598-1.86-1.955A3.516 3.516 0 0012.179 6 3.682 3.682 0 008.5 9.678c0 .578.473 1.05 1.05 1.05.579 0 1.052-.472 1.052-1.05a1.58 1.58 0 011.576-1.576c.21 0 .42.042.61.126.314.136.567.41.703.767.179.452.053 1.03-.336 1.523l-.147.2c-.4.546-.767.935-1.135 1.23-.2.158-.746.588-.746 1.355v.904zm2.038 2.805a.988.988 0 11-1.975 0 .988.988 0 011.976 0zM12.002 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm0-18c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10z" fill="#2E2D37"></path>
                    </svg>
                    Ajuda</a>
                <a href="../app/includes/logout.php">
                    <svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.253 12.38c.05-.12.08-.25.08-.38a.995.995 0 00-.3-.7l-2.72-2.72a.996.996 0 10-1.41 1.41l1.02 1.01h-4.59c-.55 0-1 .45-1 1s.45 1 1 1h4.59l-1.02 1.02a.996.996 0 00.71 1.7c.26 0 .51-.1.71-.29l2.72-2.72c.09-.09.16-.2.21-.33z" fill="#2E2D37"></path>
                        <path d="M18.333 16c-.55 0-1 .45-1 1v2c0 .55-.45 1-1 1h-9c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v1.99c0 .56.45 1.01 1.01 1.01.55 0 .99-.44.99-.99V5c0-1.66-1.34-3-3-3h-9c-1.66 0-3 1.34-3 3v14c0 1.66 1.34 3 3 3h9c1.66 0 3-1.34 3-3v-2c0-.55-.45-1-1-1z" fill="#2E2D37"></path>
                    </svg>
                    Sair</a>
            </div>
        </div>

        <div class="main-content">
            <div class="content">
                <h1>Anúncios Pendentes</h1>
            </div>
            <form action="" method="post">
                <div class="main-cards">
                    <?php
                    $num_rows = count($tableData);

                    $repetir = range(1, $num_rows);

                    if (is_array($tableData) && !empty($tableData)) {
                        foreach ($tableData as $dados) {
                            if ($dados['anuncio_liberado'] == "N"){
                                $id_veiculo = $dados['id'];
                                echo '<div class="card" style="width: 14.8rem;">
                                        <img src="' . $dados['imagem_anuncio'] . '" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $dados['marca'] . ' / ' . $dados['modelo'] . '</h5>
                                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;">' . $dados['descricao_inicial'] . '</p>
                                            <h2>R$' . $dados['preco'] . '</h2>
                                            <h3>' . $dados['ano_fabricacao'] . '/' . $dados['ano_lancamento'] . '</h3>
                                            <div class="card-buttons">
                                            <form action="" method="post">
                                            <input type="hidden" name="id_veiculo" value="' . $id_veiculo . '">
                                                <input type="submit" value="✔" name="aprovar" class="aprovar">
                                            </form><form action="" method="post">
                                            <input type="hidden" name="id_veiculo" value="' . $id_veiculo . '">
                                            <input type="submit" value="✖" name="recusar" class="recusar">
                                            </form>
                                            </div>
                                        </div>
                                    </div>';
                            } 
                        } 
                    } 
                    ?>
                </div>
            </form>
        </div>


    </section>
</body>

</html>