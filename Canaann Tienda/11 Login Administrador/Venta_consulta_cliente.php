<?php

include '../0 Conexión Global BD/conexion.php';

// Obtener el número de documento enviado por el formulario
$numeroDocumento = $_POST["Numero_Documento"];

// Consulta para verificar si el cliente existe
$sql = "SELECT * FROM registrousuarios WHERE Numero_Documento = '$numeroDocumento'";
$result = $conn->query($sql);

// Comprobar si se encontró algún resultado
if ($result->num_rows > 0) {
    // Cliente encontrado, devolver los datos del cliente como respuesta en formato JSON
    $cliente = $result->fetch_assoc();
    echo json_encode($cliente);
} else {
    // Cliente no encontrado, devolver una respuesta indicando que no está registrado
    $response = array("error" => "Cliente no registrado");
    echo json_encode($response);
}

$conn->close();
?>