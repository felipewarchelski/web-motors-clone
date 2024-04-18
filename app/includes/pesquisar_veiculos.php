<?php

include 'config.php';

if($valor_pesquisa_formatado == 'Blindado') {
    $valor_pesquisa_formatado = 'S';
    $colunas = ['blindado'];
} else {
    $colunas = ['id','marca', 'modelo', 'ano_lancamento','ano_fabricacao','versao','cor','blindado','km', 'descricao_inicial',
                'descricao_completa', 'preco', 'anuncio_liberado', 'imagem_anuncio']; 
}

$pesquisa = $valor_pesquisa_formatado;

$condicoes = '';

foreach ($colunas as $coluna) {
    $condicoes .= "$coluna LIKE '$pesquisa' OR ";
}
$condicoes = rtrim($condicoes, ' OR ');

$query = "SELECT * FROM anuncio WHERE $condicoes;";

    $result = mysqli_query($con, $query);

    if ($result) {
        $tableData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $tableData[] = $row;
        }
    } else {
        echo "Sem resultados para essa consulta! ";
    }
?>
