<?php
include '../app/includes/config.php';

if (@$_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anunciar'])) {

    $imagens = $_FILES['imagens'];

    move_uploaded_file($imagens['tmp_name'], '../imgs/anuncio/' . $imagens['name']);

    $endereco_imagem = '../imgs/anuncio/' . $imagens['name'];

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $versao = $_POST['versao'];
    $cor = $_POST['cor'];
    $blindado = "N";
    $km = $_POST['km'];
    $descricao_inicial = $_POST['descricao_inicial'];
    $descricao_completa = $_POST['descricao_completa'];
    $preco = $_POST['preco'];
    $anuncio_liberado = "S";

    if (isset($_POST['blindado'])) {
        $blindado = "S";
    }

    $query = "INSERT INTO anuncio (marca, modelo, ano_lancamento, ano_fabricacao, versao, cor, blindado, km, descricao_inicial, descricao_completa,
                                  preco, anuncio_liberado,imagem_anuncio) VALUES ('$marca', '$modelo', '$ano_lancamento', 
                                  '$ano_fabricacao', '$versao', '$cor', '$blindado', '$km', '$descricao_inicial', '$descricao_completa', '$preco', 
                                  '$anuncio_liberado', '$endereco_imagem');";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Anunciado!";
    } else {
        echo "Erro ao anunciar: " . mysqli_error($con);
    }



}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunciar Veículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.ico">
</head>
<body>

<div class="container">
    <h1>Criar Anúncio</h1>
    <form action="anunciar.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="mb-3">
            <label for="ano_lancamento" class="form-label">Ano de Lançamento</label>
            <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" required>
        </div>
        <div class="mb-3">
            <label for="ano_fabricacao" class="form-label">Ano de Fabricação</label>
            <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" required>
        </div>
        <div class="mb-3">
            <label for="versao" class="form-label">Versão</label>
            <input type="text" class="form-control" id="versao" name="versao" required>
        </div>
        <div class="mb-3">
            <label for="cor" class="form-label">Cor</label>
            <input type="text" class="form-control" id="cor" name="cor" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="blindado" name="blindado">
            <label class="form-check-label" for="blindado">Blindado</label>
        </div>
        <div class="mb-3">
            <label for="km" class="form-label">Quilometragem (km)</label>
            <input type="number" class="form-control" id="km" name="km" required>
        </div>
        <div class="mb-3">
            <label for="descricao_inicial" class="form-label">Descrição inicial. (máx 30)</label>
            <textarea class="form-control" id="descricao_inicial" name="descricao_inicial" rows="1" required></textarea>
        </div>
        <div class="mb-3">
            <label for="descricao_completa" class="form-label">Descrição completa</label>
            <textarea class="form-control" id="descricao_completa" name="descricao_completa" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="preco" name="preco" oninput="formatarPreco(this)" required>
        </div>
        <script>
            function formatarPreco(input) {
                let valor = input.value.replace(/\D/g, '');
                valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                input.value = valor;
            }
        </script>
        <div class="form-group">
            <label for="imagens ">Imagens</label>
            <input type="file" class="form-control-file" id="imagens" name="imagens">
            <small class="form-text text-muted">Selecione uma imagem para o anúncio. Aceita formatos de imagem (jpg, png, gif, etc.) até 16MB.</small>
        </div>
        <button type="submit" name="anunciar"class="btn btn-primary">Criar Anúncio</button>
        <a href="index.php">Voltar a tela principal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5GJjpf1bsSH7URvG0U2s5fkoJ0BwXwOJwlwJd" crossorigin="anonymous"></script>
</body>
</html>
