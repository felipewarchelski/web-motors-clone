<?php

if(isset($_POST['submit'])) {
    $servername = $_POST['servername'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $database = "web_motors_project";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $database";

    if ($conn->query($sql) === TRUE) {
        echo "Banco de dados criado com sucesso<br>";
    } else {
        echo "Erro ao criar banco de dados: " . $conn->error . "<br>";
    }

    $conn->select_db($database);

    $sql = "CREATE TABLE IF NOT EXISTS usuario (
        id INT(9) AUTO_INCREMENT PRIMARY KEY,
        cpf VARCHAR(14) UNIQUE KEY,
        nome_completo VARCHAR(50),
        email VARCHAR(30),
        senha VARCHAR(100),
        genero VARCHAR(25),
        data_nascimento VARCHAR(10),
        telefone VARCHAR(15),
        cep VARCHAR(9),
        cidade VARCHAR(20),
        uf VARCHAR(2),
        nivel VARCHAR(3),
        imagem_perfil VARCHAR(100)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela usuario criada com sucesso<br>";
    } else {
        echo "Erro ao criar tabela usuario: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS anuncio (
        id INT(9) AUTO_INCREMENT PRIMARY KEY,
        marca VARCHAR(20),
        modelo VARCHAR(20),
        ano_lancamento INT(4),
        ano_fabricacao INT(4),
        versao VARCHAR(50),
        cor VARCHAR(20),
        blindado VARCHAR(1),
        km INT(6),
        descricao_inicial VARCHAR(50),
        descricao_completa VARCHAR(500),
        preco VARCHAR(15),
        anuncio_liberado VARCHAR(1),
        imagem_anuncio VARCHAR(100),
        id_usuario INT(9),
        FOREING KEY (id_usuario) REFERENCES usuario(id)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela anuncio criada com sucesso<br>";
    } else {
        echo "Erro ao criar tabela anuncio: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS modelo_veiculo (
        id INT(9) AUTO_INCREMENT PRIMARY KEY,
        marca VARCHAR(30),
        modelo VARCHAR(30),
        ano_modelo INT(4),
        ano_fabricacao INT(4),
        versao VARCHAR(50),
        chassi VARCHAR(10),
        combustivel VARCHAR(10),
        tipo_veiculo VARCHAR(10)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela modelo_veiculo criada com sucesso<br>";
    } else {
        echo "Erro ao criar tabela modelo_veiculo: " . $conn->error . "<br>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Criar Banco de Dados</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

.error {
    color: red;
    margin-top: 10px;
}
</style>
</head>
<body>

<div class="container">
    <h2>Criar Banco de Dados</h2>
    <form method="post" action="create_database.php">
        <div class="form-group">
            <label for="servername">Servidor e porta MySQL:</label>
            <input type="text" id="servername" name="servername" required>
        </div>
        <div class="form-group">
            <label for="username">Usuário MySQL:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha MySQL:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Criar Banco de Dados</button>
        </div>
    </form>
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
</div>

</body>
</html>

