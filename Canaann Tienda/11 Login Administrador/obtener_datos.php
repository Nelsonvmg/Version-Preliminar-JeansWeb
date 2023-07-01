<?php
include '../0 Conexión Global BD/conexion.php';

$sql = "SELECT * FROM registrousuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} else {   
    echo "<script>alert('No se encontraron registros.');</script>";
        echo "<script>window.close();</script>";
    
}

$conn->close();
?>
