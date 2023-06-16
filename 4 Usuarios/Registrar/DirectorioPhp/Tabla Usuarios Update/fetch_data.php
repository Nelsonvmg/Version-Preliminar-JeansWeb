<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "directorio"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM persona";

// Ejecutar la consulta y obtener los resultados
$result = $conn->query($sql);

// Crear un arreglo para almacenar los datos
$data = array();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en el arreglo
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver los datos como respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
