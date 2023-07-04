<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "bd_jeansweb";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoComunicacion = isset($_POST['tipoComunicacion']) ? $_POST['tipoComunicacion'] : '';
    $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : '';
    $numeroDocumento = isset($_POST['documento']) ? $_POST['documento'] : '';
    $razonSocial = isset($_POST['empresa']) ? $_POST['empresa'] : '';
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $telefono = isset($_POST['teléfono']) ? $_POST['teléfono'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

    $sql = "INSERT INTO contactenos (tipo_comunicacion, tipo_documento, numero_documento, razon_social, nombres, apellidos, telefono, email, mensaje, fecha_radicacion, estado)
        VALUES ('$tipoComunicacion', '$tipoDocumento', '$numeroDocumento', '$razonSocial', '$nombres', '$apellidos', '$telefono', '$email', '$mensaje', NOW(), 'radicado')";

    if ($conn->query($sql) === TRUE) {
        $lastInsertId = $conn->insert_id;
        echo "<script>alert('El formulario ha sido enviado correctamente. Gracias por contactarnos. El ID del registro insertado es: $lastInsertId') ;</script>";
        echo "<script>window.location.href = 'Pqr.html';</script>";
        exit();
    } else {
        echo '<script>alert("Error al enviar el formulario: '.$conn->error.'"); window.location.href = "nombre_del_formulario.php";</script>';
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
