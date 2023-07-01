<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener los datos actualizados del formulario
$tipoDocumento = $_POST['Tipo_Documento'];
$numeroDocumento = $_POST['Numero_Documento'];
$nombres = $_POST['Nombre_Persona'];
$apellidoPaterno = $_POST['Apellido_Paterno'];
$apellidoMaterno = $_POST['Apellido_Materno'];
$edad = $_POST['Edad'];
$direccion = $_POST['Direccion'];
$email1 = $_POST['Email_1'];
$email2 = $_POST['Email_2'];
$telefonoCelular1 = $_POST['Telefono_celular_1'];
$telefonoCelular2 = $_POST['Telefono_celular_2'];
$tipoRol = $_POST['Tipo_Rol'];
$usuario = $_POST['Usuario'];
$password = $_POST['Password'];
$estado = $_POST['Estado']; 

// Preparar la consulta SQL para la actualización
$sql = "UPDATE RegistroUsuarios SET
        Tipo_Documento = '$tipoDocumento',
        Nombres = '$nombres',
        Apellido_Paterno = '$apellidoPaterno',
        Apellido_Materno = '$apellidoMaterno',
        Edad = $edad,
        Direccion = '$direccion',
        Email_1 = '$email1',
        Email_2 = '$email2',
        Telefono_Celular_1 = '$telefonoCelular1',
        Telefono_Celular_2 = '$telefonoCelular2',
        Tipo_Rol = '$tipoRol',
        Usuario = '$usuario',
        Contraseña = '$password',
        Estado = '$estado'
        WHERE Numero_Documento = '$numeroDocumento'";

// Ejecutar la consulta SQL de actualización
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Actualización exitosa.');</script>";
        echo "<script>window.close();</script>";
} else {
    echo '<script>alert("Error al actualizar el registro: ' . $conn->error . '"); window.close();</script>';
}

// Cerrar la conexión
$conn->close();
?>
