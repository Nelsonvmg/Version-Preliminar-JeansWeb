<?php
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "sena";

// Obtener los datos desde la consola
echo "Ingrese el tipo de documento: ";
$tipoDocumento = trim(fgets(STDIN));

echo "Ingrese el número de documento: ";
$numeroDocumento = trim(fgets(STDIN));

echo "Ingrese el nombre: ";
$nombres = trim(fgets(STDIN));

echo "Ingrese el apellido paterno: ";
$apellidoPaterno = trim(fgets(STDIN));

echo "Ingrese el apellido materno: ";
$apellidoMaterno = trim(fgets(STDIN));

echo "Ingrese la edad: ";
$edad = trim(fgets(STDIN));

echo "Ingrese la dirección: ";
$direccion = trim(fgets(STDIN));

echo "Ingrese el usuario: ";
$usuario = trim(fgets(STDIN));

echo "Ingrese la contraseña: ";
$password = trim(fgets(STDIN));

// Crear conexión
$conn = mysqli_connect($servername, $username, $contraseña, $dbname);
// Revisar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "INSERT INTO persona (
    ID_Persona,
    Nombre_Persona,
    Apellido_Paterno,
    Apellido_Materno,
    Tipo_Documento,
    Edad,
    Direccion,
    Usuario,
    Password
) VALUES (
    '$numeroDocumento',
    '$nombres',
    '$apellidoPaterno',
    '$apellidoMaterno',
    '$tipoDocumento',
    '$edad',
    '$direccion',
    '$usuario',
    '$password'
)";

if (mysqli_query($conn, $sql)) {
    // Datos guardados correctamente
    echo "Datos guardados correctamente.\n";
} else {
    // Error al guardar los datos
    echo "Error de registro: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>
