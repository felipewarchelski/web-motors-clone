<?php
require '../../vendor/autoload.php';
include 'config.php';
use \App\Session\UserWebMotors as SessionUserWebMotors;

if (isset($_POST['botao_entrar'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['senha'];

            if ($hashedPassword == $password) {
                echo "Login bem-sucedido";
                
                SessionUserWebMotors::login_webmotors($email, $row['nome_completo']);
                echo $row['nome_completo'];
                
                if (SessionUserWebMotors::isLogged() ) {
                    header('Location: ../../public/index.php');
                } else {
                    header('Location: pagina_login.php');
                }
            } else {
                echo "Senha incorreta";
            }  
        } else {
            echo "Email não encontrado";
        }
    } else {
        echo "Campos de email e senha são obrigatórios";
    }
} elseif (isset($_POST['botao_cadastrar']))  {
        if (isset($_POST['email']) || isset($_POST['password'])) { 
            
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
        } else {
            echo "Aqui Cadastrar";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h1 class="card-title text-center">Login - WebMotors</h1>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nome_completo">Nome Completo:</label>
                                <input type="text" id="nome_completo" name="nome_completo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="botao_entrar" class="btn btn-primary btn-block">Entrar</button>
                            <button type="submit" name="botao_cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



    <div class="login_google text-center mt-5">
        
        <br>
        <p>Utilize sua conta Google para fazer login neste site</p>
        <br>
        <!-- BOTÃO DE LOGIN COM O GOOGLE -->
        <script src="https://accounts.google.com/gsi/client" async></script>
        <div id="g_id_onload"
            data-client_id="267853270306-ov6nhrnjltbpfcns91piokm37aenvu4a.apps.googleusercontent.com"
            data-login_uri="http://localhost/web-motors-clone/login_google.php"
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
        <!-- BOTÃO DE LOGIN COM O GOOGLE -->
    </div>
</body>
</html>
