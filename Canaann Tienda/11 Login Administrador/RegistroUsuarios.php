<?php

include '../0 Conexión Global BD/conexion.php';

// Obtener los datos del formulario
$tipoDocumento = $_POST['Tipo_Documento'];
$numeroDocumento = $_POST['ID_Persona'];
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

// Preparar la consulta SQL para la inserción
$sql = "INSERT INTO RegistroUsuarios (
Tipo_Documento, 
Numero_Documento,
Nombres, 
Apellido_Paterno, 
Apellido_Materno, 
Edad, Direccion, 
Email_1, Email_2, 
Telefono_Celular_1, 
Telefono_Celular_2, 
Tipo_Rol, Usuario, 
Contraseña)
VALUES (    
'$tipoDocumento', 
'$numeroDocumento', 
'$nombres', 
'$apellidoPaterno', 
'$apellidoMaterno', 
'$edad', 
'$direccion', 
'$email1', 
'$email2', 
'$telefonoCelular1', 
'$telefonoCelular2', 
'$tipoRol', 
'$usuario', 
'$password')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro Exitoso.');</script>";
    echo "<script>window.close();</script>";
} else {
    echo '<script>alert("Actualmente este usuario ya se encuentra registrado."); window.close();</script>'. $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
