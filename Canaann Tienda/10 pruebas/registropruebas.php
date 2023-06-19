<?php
// Obtener los datos del formulario de persona
$idPersona = $_POST['idPersona'];
$nombrePersona = $_POST['nombrePersona'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$tipoDocumento = $_POST['tipoDocumento'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Obtener los datos del formulario de correo
$email = $_POST['email'];
$email2 = $_POST['email2'];

// Obtener los datos del formulario de teléfono
$telefono = $_POST['telefono'];
$telefono2 = $_POST['telefono2'];

// Realizar la inserción en la tabla persona
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $contraseña, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL utilizando una consulta preparada
$stmt = $conn->prepare("INSERT INTO persona (
    ID_Persona,
    Nombre_Persona,
    Apellido_Paterno,
    Apellido_Materno,
    Tipo_Documento,
    Edad,
    Direccion,
    Usuario,
    Password
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Enlazar los parámetros de la consulta
$stmt->bind_param("issssssss",
    $idPersona,
    $nombrePersona,
    $apellidoPaterno,
    $apellidoMaterno,
    $tipoDocumento,
    $edad,
    $direccion,
    $usuario,
    $password);

// Ejecutar la consulta
$stmt->execute();

// Verificar si se insertó correctamente en la tabla persona
if ($stmt->affected_rows > 0) {
    // Obtener el ID de persona insertado
    $personaID = $stmt->insert_id;

    // Realizar la inserción en la tabla correo
    $stmtCorreo = $conn->prepare("INSERT INTO correo (
        Email,
        Email_2,
        Persona_ID_Persona
    ) VALUES (?, ?, ?)");

    // Enlazar los parámetros de la consulta de correo
    $stmtCorreo->bind_param("ssi", $email, $email2, $personaID);

    // Ejecutar la consulta de correo
    $stmtCorreo->execute();

    // Verificar si se insertó correctamente en la tabla correo
    if ($stmtCorreo->affected_rows > 0) {
        // Realizar la inserción en la tabla teléfono
        $stmtTelefono = $conn->prepare("INSERT INTO telefono (
            Telefono_celular,
            Telefono_celular_2,
            Persona_ID_Persona
        ) VALUES (?, ?, ?)");

        // Enlazar los parámetros de la consulta de teléfono
        $stmtTelefono->bind_param("ssi", $telefono, $telefono2, $personaID);

        // Ejecutar la consulta de teléfono
        $stmtTelefono->execute();

        // Verificar si se insertó correctamente en la tabla teléfono
        if ($stmtTelefono->affected_rows > 0) {
            echo "Registro exitoso";
        } else {
            echo "Error al insertar en la tabla teléfono: " . $stmtTelefono->error;
        }

        // Cerrar la consulta de teléfono
        $stmtTelefono->close();
    } else {
        echo "Error al insertar en la tabla correo: " . $stmtCorreo->error;
    }

    // Cerrar la consulta de correo
    $stmtCorreo->close();
} else {
    echo "Error al insertar en la tabla persona: " . $stmt->error;
}



  // Ejecutar la consulta preparada
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

  // Cerrar la consulta preparada
  $stmt->close();

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
