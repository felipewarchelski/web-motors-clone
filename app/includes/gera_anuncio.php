<?php
include '../app/includes/config.php';

$query = "SELECT * FROM anuncio WHERE anuncio_liberado = 'S';";
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