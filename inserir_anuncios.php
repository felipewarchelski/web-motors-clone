<?php
include 'app/includes/config.php';
include 'veiculos.php';



foreach ($veiculos as $veiculo) {
    echo "<pre>";
    echo print_r($veiculo['modelo']) . " -> ";
echo print_r($veiculo['cor']);
echo "</pre>";
}


foreach ($veiculos as $veiculo) {
    $query = "INSERT INTO anuncio 
        (marca, modelo, ano_lancamento, ano_fabricacao, versao, cor, blindado, km, descricao_inicial, descricao_completa, preco, anuncio_liberado, imagem_anuncio, id_usuario)
        VALUES 
        ('{$veiculo['marca']}', '{$veiculo['modelo']}', {$veiculo['ano_lancamento']}, {$veiculo['ano_fabricacao']}, '{$veiculo['versao']}', '{$veiculo['cor']}', '{$veiculo['blindado']}', {$veiculo['km']}, '{$veiculo['descricao_inicial']}', '{$veiculo['descricao_completa']}', {$veiculo['preco']}, '{$veiculo['anuncio_liberado']}', '{$veiculo['imagem_anuncio']}', {$veiculo['id_usuario']});";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Veículo '{$veiculo['modelo']}' inserido com sucesso.<br>";
    } else {
        echo "Erro ao inserir veículo '{$veiculo['modelo']}': " . mysqli_error($con) . "<br>";
    }
}
?>
