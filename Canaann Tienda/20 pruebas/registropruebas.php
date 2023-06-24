<?php

$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $contraseña, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Insertar en la tabla "persona"
    $queryPersona = "INSERT INTO persona (
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

    $personaInserted = $conn->query($queryPersona);

    // Verificar si se insertó el registro en la tabla "persona" correctamente
    if ($personaInserted) {
        // Insertar en la tabla "correo"
        $queryCorreo = "INSERT INTO correo (
            Persona_ID_Persona, 
            Email, 
            Email_2
            ) VALUES (
            '$numeroDocumento', 
            '$email1', 
            '$email2'
            )";
        $correoInserted = $conn->query($queryCorreo);

        // Verificar si se insertó el registro en la tabla "correo" correctamente
        if ($correoInserted) {
            // Insertar en la tabla "telefono"
            $queryTelefono = "INSERT INTO telefono (
            Persona_ID_Persona, 
            Telefono_Celular, 
            Telefono_Celular_2
            ) VALUES (
            '$numeroDocumento', 
            '$celular', 
            '$telefonoFijo'
            )";
            $telefonoInserted = $conn->query($queryTelefono);

            if ($telefonoInserted) {
                // Todos los datos se insertaron correctamente
                echo "<script>
                    alert('Datos guardados correctamente.');
                    window.location.href = '###';
                </script>";
            } else {
                // Error al insertar en la tabla "telefono"
                echo "<script>
                    alert('Error al guardar los datos.');
                    window.location.href = '###';
                </script>";
            }}}
    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
