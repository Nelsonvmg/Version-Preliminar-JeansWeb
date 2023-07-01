<?php
// Obtener los datos del formulario de venta
$numeroDocumento = $_POST['Numero_Documento'];
$nombres = $_POST['Nombres'];
$apellidoPaterno = $_POST['Apellido_Paterno'];
$telefonoCelular = $_POST['Telefono_Celular_1'];
$direccion = $_POST['Direccion'];
$email = $_POST['Email_1'];

// Validar y procesar los datos del cliente si es necesario
// ...

// Obtener los datos del producto seleccionado
$idProducto = $_POST['id_producto'];
$nombreProducto = $_POST['nombre_producto'];
$tallaProducto = $_POST['talla_producto'];
$colorProducto = $_POST['color_producto'];
$cantidadProducto = $_POST['cantidad_producto'];
$precioVenta = $_POST['precio_venta'];
$valorTotal = $_POST['valor_total'];

// Validar y procesar los datos del producto si es necesario
// ...

// Guardar la venta en la base de datos (ejemplo con MySQL)

include '../0 Conexión Global BD/conexion.php';

// Preparar la consulta para insertar la venta en la tabla correspondiente
$sql = "INSERT INTO ventas (numero_documento, nombres, apellido_paterno, telefono_celular, direccion, email, id_producto, nombre_producto, talla_producto, color_producto, cantidad_producto, precio_venta, valor_total)
        VALUES ('$numeroDocumento', '$nombres', '$apellidoPaterno', '$telefonoCelular', '$direccion', '$email', '$idProducto', '$nombreProducto', '$tallaProducto', '$colorProducto', '$cantidadProducto', '$precioVenta', '$valorTotal')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {   ;
    echo "<script>alert('Venta registrada correctamente');</script>";
    echo "<script>window.close();</script>";
} else {
    echo '<script>alert("Error al registrar la venta: "); window.close();</script>'. $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
