<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

// Obtener los datos del formulario de edición, incluyendo los nuevos campos
// Obtener los datos del formulario de edición, incluyendo los nuevos campos
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$estado = $_POST['estado'];

// Validar que todos los campos del formulario estén completos
if (empty($id) || empty($nombre) || empty($apellido) || empty($estado)) {
    echo "Por favor, complete todos los campos del formulario.";
    exit;
}

// Crear conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Actualizar el registro en la base de datos
$sql = "UPDATE persona SET nombrePer='$nombre', apellidoPer='$apellido', estado='$estado' WHERE idPer='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Registro actualizado correctamente.";
} else {
    echo "Error al actualizar el registro: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
