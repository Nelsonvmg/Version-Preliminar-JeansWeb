<?php
// Obtener el número de cédula enviado desde el cliente
$idPer = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hubo un error en la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Escapar el número de cédula para prevenir inyección de SQL
$idPer = $conn->real_escape_string($idPer);

// Construir la consulta SQL para eliminar el registro con la cédula proporcionada
$sql = "DELETE FROM persona WHERE idPer = '$idPer'";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
