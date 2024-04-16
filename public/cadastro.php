<?php
require '../vendor/autoload.php';
include '../app/includes/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar']))  {

        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "INSERT INTO usuario (id, cpf, nome_completo, email, senha, genero, data_nascimento, telefone, cep, cidade, uf,
        nivel, imagem_perfil) VALUES (null, null, '$nome_completo', '$email', '$password', null, null, null, null, null, null, null, 'ADM');";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Cadastro bem-sucedido";
        } else {
            echo "Erro ao cadastrar usuário: " . mysqli_error($con);
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/login.css">
    <title>Cadastro</title>
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href=""><img src="../imgs/webmotors-logo-8.png" alt=""></a>
        </div>
        <div class="buttons-header"></div>
        <div class="login-header">
            <a href="login.php" type="button">
                <img src="../imgs/user.png" alt="" width="24px">
            </a>
            <a href="">
                <img src="../imgs/coracao.png" alt="" width="20px">
            </a>
            <a href="">
                <img src="../imgs/chatting.png" alt="" width="20px">
            </a>
        </div>
    </section>
    <section class="imagebg">
        <img src="../imgs/background.svg" alt="" width="1366" height="227">
    </section>
    <section class="box-login">
        <div class="main-box-login">
            <div class="sub-box-login">
                <div class="left-box-socials">
                    <h2>Cadastre-se com suas redes sociais</h2>
                    <button class="facebook"><img src="../imgs/facebook.svg" alt="">Continuar com Facebook</button>
                    <button class="google"><img src="../imgs/google.svg" alt="">Continuar com Facebook</button>
                    <button class="apple"><img src="../imgs/apple.svg" alt="">Continuar com Apple</button>
                </div>
                <div class="mid-line-login"></div>
                <div class="right-box-info">
                    <h2>Crie uma conta com seu e-mail e senha</h2>
                    <form action="#" method="post" class="form-login">
                        <input type="text" name="nome_completo" id="" placeholder="Nome Completo">
                        <input type="email" name="email" id="" placeholder="Email">
                        <input type="password" name="password" id="" placeholder="Senha"><br>
                        <p>Ao me cadastrar, eu declaro ter ciência de que este cadastro é somente para maiores de 18 anos.</p>
                        <input type="submit" name="cadastrar" value="Criar conta">
                    </form>
                </div>
            </div>
            <div class="redirect-sign-up">
                <h3>Já tem uma conta? <a href="login.php">Entrar</a></h3>
                <p>Ao prosseguir você está ciente e concorda em receber comunicações da Webmotors.</p>
            </div>
        </div>
    </section>
    <section class="contact-us">
        <img src="../imgs/information.png" alt="" width="15px">
        <h2>Precisa de ajuda? <a href="">Fale com a gente</a></h2>
    </section>
    <section class="footer-login">
        <div class="header-footer">
            <h2>© 1995-2024 Webmotors S.A. Todos os direitos reservados</h2>
        </div>
    </section>
</body>

</html>