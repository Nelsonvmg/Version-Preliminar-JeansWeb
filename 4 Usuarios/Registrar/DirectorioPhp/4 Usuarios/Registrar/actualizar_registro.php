<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

// Obtener los datos del formulario de edición, incluyendo los nuevos campos
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$genero = $_POST['genero'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$contrasena = $_POST['contrasena'];

// Validar que todos los campos del formulario estén completos
if (empty($id) || empty($nombre) || empty($apellido) || empty($direccion) || empty($correo) 
|| empty($celular) || empty($genero) || empty($fechaNacimiento) || empty($contrasena)) {
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
$sql = "UPDATE persona SET nombrePer='$nombre', apellidoPer='$apellido', direccPer='$direccion', 
correoPer='$correo', celularPer='$celular', genero='$genero', fecha_nacimiento='$fechaNacimiento', 
contraseña='$contrasena' WHERE idPer='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Registro actualizado correctamente.";
} else {
    echo "Error al actualizar el registro: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
