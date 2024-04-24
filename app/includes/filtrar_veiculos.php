<?php

include 'config.php';

$colunas = ['marca', 'modelo', 'ano_lancamento', 'ano_fabricacao', 'cor', 'blindado'];
$pesquisa = [$marca, $modelo, $ano_lancamento, $ano_fabricacao, $cor, $blindado];

$condicoes = '';

foreach ($colunas as $index => $coluna) {
    $valor = $pesquisa[$index];

    if ($valor !== null && $valor !== '') {
        $valor = addslashes($valor);
        $condicoes .= "$coluna LIKE '%$valor%' AND ";
    }
}

$condicoes = rtrim($condicoes, ' AND ');

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
