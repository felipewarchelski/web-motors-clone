<?php
require '../../vendor/autoload.php';
include 'config.php';
    if(isset($_REQUEST['cadastrar'])){

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano_lancamento = $_POST['ano_lancamento'];
        $ano_fabricacao = $_POST['ano_fabricacao'];
        $versao = $_POST['versao'];
        $chassi = $_POST['chassi'];
        $combustivel = $_POST['combustivel'];
        $tipo_veiculo = $_POST['tipo_veiculo'];

        $query = "INSERT INTO  modelo_veiculo VALUES (null, '$marca', '$modelo', '$ano_lancamento', '$ano_fabricacao', '$versao',
                 '$chassi', '$combustivel', '$tipo_veiculo');";
        $result = mysqli_query($con, $query);

        if($result){
            echo "Cadastrado com sucesso!";
        } else{
            echo "Falha ao cadastrar" ;
        }
        
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Veículo</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="cadastro_veiculo.php" method="POST">
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" id="marca" name="marca" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" id="modelo" name="modelo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ano_lancamento">Ano de Lançamento:</label>
                        <input type="number" id="ano_lancamento" name="ano_lancamento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ano_fabricacao">Ano de Fabricação:</label>
                        <input type="number" id="ano_fabricacao" name="ano_fabricacao" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="versao">Versão:</label>
                        <input type="text" id="versao" name="versao" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="chassi">Chassi:</label>
                        <input type="text" id="chassi" name="chassi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="combustivel">Combustível:</label>
                        <input type="text" id="combustivel" name="combustivel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_veiculo">Tipo de Veículo:</label>
                        <select id="tipo_veiculo" name="tipo_veiculo" class="form-control" required>
                            <option value="carro">Carro</option>
                            <option value="moto">Moto</option>
                        </select>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>