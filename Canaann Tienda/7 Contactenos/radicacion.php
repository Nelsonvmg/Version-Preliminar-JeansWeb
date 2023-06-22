<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$database = "bd_jeansweb"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoComunicacion = $_POST["tipo"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $numeroDocumento = $_POST["documento"];
    $razonSocial = $_POST["empresa"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Validar los datos recibidos (puedes agregar tus propias validaciones aquí)

    // Insertar los datos en la tabla "contactenos"
    $sql = "INSERT INTO contactenos (tipo_comunicacion, tipo_documento, numero_documento, razon_social, nombres, apellidos, telefono, email, mensaje, fecha_radicacion, estado)
            VALUES ('$tipoComunicacion', '$tipoDocumento', '$numeroDocumento', '$razonSocial', '$nombres', '$apellidos', '$telefono', '$email', '$mensaje', NOW(), 'radicado')";

    if ($conn->query($sql) === TRUE) {
        $lastInsertId = $conn->insert_id;
        echo "El formulario ha sido enviado correctamente. Gracias por contactarnos. El ID del registro insertado es: " . $lastInsertId;
    } else {
        echo "Error al enviar el formulario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
