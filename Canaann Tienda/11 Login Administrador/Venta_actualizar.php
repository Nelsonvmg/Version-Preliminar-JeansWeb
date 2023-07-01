<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener los datos del formulario
$idVenta = $_POST['id_venta'];
$numeroDocumento = $_POST['numero_documento'];
$nombres = $_POST['nombres'];
$apellidoPaterno = $_POST['apellido_paterno'];
$telefonoCelular = $_POST['telefono_celular'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$idProducto = $_POST['id_producto'];
$nombreProducto = $_POST['nombre_producto'];
$tallaProducto = $_POST['talla_producto'];
$colorProducto = $_POST['color_producto'];
$cantidadProducto = $_POST['cantidad_producto'];
$precioVenta = $_POST['precio_venta'];
$valorTotal = $_POST['valor_total'];
$estado = $_POST['estado'];

// Actualizar el registro en la base de datos
$sql = "UPDATE ventas SET
    numero_documento = '$numeroDocumento',
    nombres = '$nombres',
    apellido_paterno = '$apellidoPaterno',
    telefono_celular = '$telefonoCelular',
    direccion = '$direccion',
    email = '$email',
    id_producto = '$idProducto',
    nombre_producto = '$nombreProducto',
    talla_producto = '$tallaProducto',
    color_producto = '$colorProducto',
    cantidad_producto = '$cantidadProducto',
    precio_venta = '$precioVenta',
    valor_total = '$valorTotal',
    estado = '$estado'
    WHERE id = '$idVenta'";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Actualización exitosa.');</script>";
    echo "<script>window.close();</script>";
} else {
   echo '<script>alert("Error al actualizar el registro: ' . $conn->error . '"); window.close();</script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
