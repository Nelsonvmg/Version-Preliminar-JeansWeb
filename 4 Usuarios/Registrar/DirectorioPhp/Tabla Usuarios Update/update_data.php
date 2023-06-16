<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "directorio"; // Nombre de la base de datos

// Obtener los datos enviados por la solicitud POST
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$genero = $_POST['genero'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
// $numero_usuario = $_POST['numero_usuario'];
$contraseña = $_POST['contraseña'];
$estado = $_POST['estado'];


// Crear conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL para actualizar los datos
$sql = "UPDATE persona SET 
nombrePer = '$nombre', 
apellidoPer = '$apellido', 
direccPer = '$direccion', 
correoPer = '$correo', 
celularPer = '$celular', 
genero = '$genero', 
fecha_nacimiento = '$fecha_nacimiento', 
contraseña = '$contraseña', 
estado = '$estado' 
WHERE idPer = $id";


// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han actualizado correctamente";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
