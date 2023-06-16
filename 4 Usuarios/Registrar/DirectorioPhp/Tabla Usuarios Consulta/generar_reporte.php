<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta los datos de la tabla persona
$sql = "SELECT * FROM persona";
$result = $conn->query($sql);

// Genera un array con los datos obtenidos
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cierra la conexión a la base de datos
$conn->close();

// Genera la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
