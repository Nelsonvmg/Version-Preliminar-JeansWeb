<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplazar con el nombre de usuario de la base de datos
$password = ""; // Reemplazar con la contraseña de la base de datos
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombreUsuario = mysqli_real_escape_string($conn, $_POST['nombre_usuario']);
$contrasena = mysqli_real_escape_string($conn, $_POST['contraseña']);
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

// Validar si el usuario ya está registrado
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Error al guardar los datos
echo "<script>
alert('Este usuario se encuentra registrado.');
window.location.href = 'Registro Login.html';
</script>";
} else {
    // Preparar la consulta SQL con una consulta preparada
    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, email, tipo)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la declaración y vincular los parámetros
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombreUsuario, $contrasena, $nombre, $apellido, $email, $tipo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
    // Datos guardados correctamente
    echo "<script>
    alert('Datos guardados correctamente.');
    window.location.href = 'Registro Login.html';
    </script>";
} else {
// Error al guardar los datos
echo "<script>
   alert('Erro de registro.');
   window.location.href = Registro Login.html';
   </script>";
} 
}

// Cerrar la conexión
$conn->close();
?>
