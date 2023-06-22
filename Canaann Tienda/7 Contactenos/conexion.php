<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "contactenos"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si se estableció la conexión correctamente
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Si el formulario se envía y se realiza una consulta
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $tipoComunicacion = $_POST['tipo'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['documento'];
    $razonSocial = $_POST['empresa'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['teléfono'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    $fechaRadicacion = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO pqrs (tipo_comunicacion, tipo_documento, numero_documento, razon_social, nombres, apellidos, telefono, email, mensaje, estado, fecha_radicacion) 
            VALUES ('$tipoComunicacion', '$tipoDocumento', '$numeroDocumento', '$razonSocial', '$nombres', '$apellidos', '$telefono', '$email', '$mensaje', 'activo', '$fechaRadicacion')";

    if ($conn->query($sql) === TRUE) {
        $idPqrs = $conn->insert_id; // Obtener el ID autoincrementable generado
        echo "Consulta enviada correctamente. ID de PQRS: " . $idPqrs;
    } else {
        echo "Error al enviar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
