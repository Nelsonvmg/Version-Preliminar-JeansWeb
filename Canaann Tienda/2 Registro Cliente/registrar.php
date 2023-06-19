<?php
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

// Obtener los datos del formulario
$tipoDocumento = $_POST["Tipo_Documento"];
$numeroDocumento = $_POST["ID_Persona"];
$nombres = $_POST["Nombre_Persona"];
$apellidoPaterno = $_POST["Apellido_Paterno"];
$apellidoMaterno = $_POST["Apellido_Materno"];
$edad = $_POST["Edad"];
$direccion = $_POST["Direccion"];
$email1 = $_POST["Email"];
$email2 = $_POST["Email_2"];
$celular = $_POST["Telefono_celular"];
$telefonoFijo = $_POST["Telefono_celular_2"];
$usuario = $_POST["Usuario"];
$password = $_POST["Password"];

// Validar que todos los campos del formulario estén completos
if (empty($numeroDocumento) || empty($nombres) || empty($apellidoPaterno) || empty($direccion)
    || empty($email1) || empty($celular) || empty($usuario) || empty($password)) {
    echo "Por favor, complete todos los campos del formulario.";
    exit;
}

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
    echo "<script>
             alert('Datos guardados correctamente.');
             window.location.href = '###';
         </script>";
} else {
    // Error al guardar los datos
    echo "<script>
             alert('Error de registro.');
             window.location.href = '###';
         </script>";
}

mysqli_close($conn);
?>
