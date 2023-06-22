<?php
// Obtén el ID de persona
$personaID = $_POST['personaID']; // Asegúrate de ajustar esto según cómo se envíe el ID desde el formulario

$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $contraseña, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener el tipo de rol de la persona
$query = "SELECT tr.Tipo_Rol FROM persona_has_tipo_rol pr
          INNER JOIN tipo_rol tr ON pr.Tipo_Rol_ID_Tipo_Rol = tr.ID_Tipo_Rol
          WHERE pr.Persona_ID_Persona = '$personaID'";

$result = $conn->query($query);

// Verificar si se encontró un resultado
if ($result->num_rows > 0) {
    // Se encontró el tipo de rol
    $row = $result->fetch_assoc();
    $tipoRol = $row["Tipo_Rol"];
    echo "El tipo de rol de la persona es: " . $tipoRol;
} else {
    // No se encontró el tipo de rol
    echo "No se encontró el tipo de rol para la persona con ID: " . $personaID;
}

// Cerrar la conexión
$conn->close();
?>
