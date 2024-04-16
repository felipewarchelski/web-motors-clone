<?php

require '../vendor/autoload.php';

include 'config.php';

$pesquisa = $searchbar;

$colunas = ['id','marca', 'modelo', 'ano_modelo','ano_fabricacao','versao','chassi','combustivel','tipo_veiculo']; 

$condicoes = '';

echo $condicoes;

foreach ($colunas as $coluna) {
    $condicoes .= "$coluna LIKE '$pesquisa' OR ";
}
$condicoes = rtrim($condicoes, ' OR ');

$query = "SELECT * FROM modelo_veiculo WHERE $condicoes;";

    $result = mysqli_query($con, $query);

    if ($result) {

        $tableData = array();
    
        while ($row = mysqli_fetch_assoc($result)) {

            $tableData[] = $row;

        }
        echo "<table>";
        foreach ($tableData as $rowData) {
            echo "<tr>";

            foreach ($rowData as $value) {
                echo "    <td>  " . $value . "  </td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {

        echo "Sem resultados para essa consulta! ";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Web Motors</title>
    <link rel="icon" type="image/x-icon" href="../../imgs/favicon.ico">
</head>
<body></body>
</html>