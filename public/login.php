<?php
require '../vendor/autoload.php';
include '../app/includes/config.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['botao_entrar'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['senha'];

            if ($hashedPassword == $password) {
                SessionUserWebMotors::login_webmotors($email, $row['nome_completo']);
                if (SessionUserWebMotors::isLogged()) {
                    header('Location: index.php');
                    exit(); 
                } else {
                    echo '<script>alert("Erro ao fazer login. Por favor, tente novamente!")</script>';
                }
            } else {
                echo '<script>alert("Senha ou email incorretos. Por favor, tente novamente!")</script>';
            }  
        } else {
            echo '<script>alert("Senha ou email incorretos. Por favor, tente novamente!")</script>';
        }
    }
}  
?>
 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="login.php"><img src="../imgs/webmotors-logo-8.png" alt=""></a>
        </div>
        <div class="buttons-header"></div>
        <div class="login-header">
            <a href="" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
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
                    <h2>Faça login com suas redes sociais</h2>
                    <button class="facebook"><img src="../../imgs/facebook.svg" alt="">Continuar com Facebook</button>
                    <!-- BOTÂO GOOGLE-->
                    <script src="https://accounts.google.com/gsi/client" async></script>
                    <div id="g_id_onload"
                        data-client_id="267853270306-ov6nhrnjltbpfcns91piokm37aenvu4a.apps.googleusercontent.com"
                        data-login_uri="http://localhost/web-motors-clone/app/includes/login_google.php"
                        data-auto_prompt="false">
                    </div>
                    <div class="d-flex justify-content-center"> 
                        <div class="g_id_signin"
                            data-type="standard"
                            data-size="large"
                            data-theme="outline"
                            data-text="sign_in_with"
                            data-shape="rectangular"
                            data-logo_alignment="left">
                        </div>
                    </div>
                    <!-- BOTÂO GOOGLE-->
                    <button class="apple"><img src="../../imgs/apple.svg" alt="">Continuar com Apple</button>
                </div>
                <div class="mid-line-login"></div>
                <div class="right-box-info">
                    <h2>Acesse sua conta com seu e-mail e senha</h2>
                    <form  method="post" class="form-login">
                        <input type="email" name="email" id="" placeholder="Email" required>
                        <input type="password" name="password" id="" placeholder="Senha" required><br>
                        <p>Eu declaro ter ciência de que este cadastro é somente para maiores de 18 anos.</p>
                        <input type="submit" name ="botao_entrar"value="Entrar">
                    </form>
                </div>
            </div>
            <div class="redirect-sign-up">
                <h3>Não possui uma conta? <a href="cadastro.php">Crie uma</a></h3>
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

