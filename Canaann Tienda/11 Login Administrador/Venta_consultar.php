<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener el ID del registro a consultar
$idVenta = $_POST['id_venta'];

// Consultar el registro
$sql = "SELECT * FROM ventas WHERE id = '$idVenta'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Extraer los valores de la fila en variables individuales
    $idVenta = $fila['id'];
    $numeroDocumento = $fila['numero_documento'];
    $nombres = $fila['nombres'];
    $apellidoPaterno = $fila['apellido_paterno'];
    $telefonoCelular = $fila['telefono_celular'];
    $direccion = $fila['direccion'];
    $email = $fila['email'];
    $idProducto = $fila['id_producto'];
    $nombreProducto = $fila['nombre_producto'];
    $tallaProducto = $fila['talla_producto'];
    $colorProducto = $fila['color_producto'];
    $cantidadProducto = $fila['cantidad_producto'];
    $precioVenta = $fila['precio_venta'];
    $valorTotal = $fila['valor_total'];
    $estado = $fila['estado'];

    // Mostrar los datos en un formulario editable
    echo '
    <h2>Formulario de Actualización</h2>
    <form action="Venta_actualizar.php" method="post">
        <label>ID Venta:</label>
        <input type="text" name="id_venta" value="'.$idVenta.'" readonly><br>

        <label for="numero_documento">Número de Documento:</label>
        <input type="text" id="numero_documento" name="numero_documento" value="'.$numeroDocumento.'" required><br>

        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" value="'.$nombres.'" required><br>

        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="'.$apellidoPaterno.'" required><br>

        <label for="telefono_celular">Teléfono Celular:</label>
        <input type="text" id="telefono_celular" name="telefono_celular" value="'.$telefonoCelular.'" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="'.$direccion.'" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="'.$email.'" required><br>

        <label for="id_producto">ID Producto:</label>
        <input type="text" id="id_producto" name="id_producto" value="'.$idProducto.'" required><br>

        <label for="nombre_producto">Nombre Producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" value="'.$nombreProducto.'" required><br>

        <label for="talla_producto">Talla Producto:</label>
        <input type="text" id="talla_producto" name="talla_producto" value="'.$tallaProducto.'" required><br>

        <label for="color_producto">Color Producto:</label>
        <input type="text" id="color_producto" name="color_producto" value="'.$colorProducto.'" required><br>

        <label for="cantidad_producto">Cantidad Producto:</label>
        <input type="number" id="cantidad_producto" name="cantidad_producto" value="'.$cantidadProducto.'" required><br>

        <label for="precio_venta">Precio de Venta:</label>
        <input type="text" id="precio_venta" name="precio_venta" value="'.$precioVenta.'" required><br>

        <label for="valor_total">Valor Total:</label>
        <input type="text" id="valor_total" name="valor_total" value="'.$valorTotal.'" required><br>

        <label>Estado:</label>
        <select name="estado" required>
            <option value="Activo"' . ($estado == 'Activo' ? ' selected' : '') . '>Activo</option>
            <option value="Inactivo"' . ($estado == 'Inactivo' ? ' selected' : '') . '>Inactivo</option>
        </select><br>

        <input type="submit" value="Actualizar">
    </form>
    ';
} else {    
    echo '<script>alert("No se encontró ninguna venta con el ID proporcionado."); window.close();</script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
