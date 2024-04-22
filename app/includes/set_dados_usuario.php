<?php
include 'config.php';
include_once '../app/Session/UserWebMotors.php';
use App\Session\UserWebMotors as SessionUserWebMotors;

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

    SessionUserWebMotors::setDados($tableData['id'], $tableData['cpf'],  $tableData['nome_completo'], $tableData['email'], 
                            $tableData['genero'],$tableData['data_nascimento'],  $tableData['telefone'], $tableData['cep'],    
                            $tableData['cidade'],$tableData['uf'], $tableData['nivel']);


?>
