<?php
include '../0 Conexión Global BD/conexion.php';


$sql = "SELECT * FROM ventas";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $ventas = array();

    while ($row = $result->fetch_assoc()) {
        $ventas[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($ventas);
} else {
    echo "<script>alert('No se encontraron registros.');</script>";
    echo "<script>window.close();</script>";
}

$conn->close();
?>
