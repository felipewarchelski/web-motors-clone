<?php
include '../app/includes/set_dados_usuario.php';
$query = "SELECT * FROM usuario WHERE id = '$id'";
$result = mysqli_query($con, $query);

    if ($result) {
        $tableData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $tableData = $row;
        }
    } else {
        echo "Sem resultados para essa consulta! ";
    }

?>
