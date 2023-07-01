<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener el ID del registro a consultar
$idProducto = $_POST['id_producto'];

// Consultar el registro
$sql = "SELECT * FROM stock WHERE id_producto = '$idProducto'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Extraer los valores de la fila en variables individuales
    $idProducto = $fila['id_producto'];
    $nombreProducto = $fila['nombre_producto'];
    $descripcionProducto = $fila['descripcion_producto'];
    $tallaProducto = $fila['talla_producto'];
    $colorProducto = $fila['color_producto'];
    $lineaProducto = $fila['linea_producto'];
    $cantidadProducto = $fila['cantidad_producto'];
    $fechaCompra = $fila['fecha_compra'];
    $precioCompra = $fila['precio_compra'];
    $precioVenta = $fila['precio_venta'];
    $proveedor = $fila['proveedor'];
    $telefono = $fila['telefono'];
    $direccion = $fila['direccion'];
    $Estado = $fila['Estado'];

    // Mostrar los datos en un formulario editable
    echo '
    <h2>Formulario de Actualización</h2>
    <form action="RegistroActualizarProducto.php" method="post">
        <label>ID Producto:</label>
        <input type="text" name="id_producto" value="'.$idProducto.'" readonly><br>

        <label for="nombre_producto">Nombre Producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" value="'.$nombreProducto.'" required><br>

        <label for="descripcion_producto">Descripción Producto:</label>
        <textarea id="descripcion_producto" name="descripcion_producto">'.$descripcionProducto.'</textarea><br>

        <label for="talla_producto">Talla Producto:</label>
        <select id="talla_producto" name="talla_producto" required>
            <option value="">Selecciona una opción</option>
            <option value="XS" '.($tallaProducto == 'XS' ? 'selected' : '').'>XS</option>
            <option value="S" '.($tallaProducto == 'S' ? 'selected' : '').'>S</option>
            <option value="M" '.($tallaProducto == 'M' ? 'selected' : '').'>M</option>
            <option value="L" '.($tallaProducto == 'L' ? 'selected' : '').'>L</option>
            <option value="XL" '.($tallaProducto == 'XL' ? 'selected' : '').'>XL</option>
            <option value="custom" '.($tallaProducto == 'custom' ? 'selected' : '').'>Otra Talla</option>
        </select><br>

        <label for="color_producto">Color Producto:</label>
        <input type="text" id="color_producto" name="color_producto" value="'.$colorProducto.'" required><br>

        <label for="linea_producto">Línea Producto:</label>
        <select id="linea_producto" name="linea_producto" required>
            <option value="">Selecciona una opción</option>
            <option value="linea_infantil" '.($lineaProducto == 'linea_infantil' ? 'selected' : '').'>Línea Infantil</option>
            <option value="linea_niñas" '.($lineaProducto == 'linea_niñas' ? 'selected' : '').'>Línea Niñas</option>
            <option value="linea_niños" '.($lineaProducto == 'linea_niños' ? 'selected' : '').'>Línea Niños</option>
            <option value="linea_masculino" '.($lineaProducto == 'linea_masculino' ? 'selected' : '').'>Línea Masculino</option>
            <option value="linea_femenina" '.($lineaProducto == 'linea_femenina' ? 'selected' : '').'>Línea Femenina</option>
            <option value="linea_juvenil" '.($lineaProducto == 'linea_juvenil' ? 'selected' : '').'>Línea Juvenil</option>
        </select><br>

        <label for="cantidad_producto">Cantidad Producto:</label>
        <input type="number" id="cantidad_producto" name="cantidad_producto" value="'.$cantidadProducto.'" required><br>

        <label for="fecha_compra">Fecha Compra:</label>
        <input type="date" id="fecha_compra" name="fecha_compra" value="'.$fechaCompra.'" required><br>

        <label for="precio_compra">Precio de Compra:</label>
        <input type="text" id="precio_compra" name="precio_compra" value="'.$precioCompra.'" placeholder="Ejemplo: $0000" required><br>

        <label for="precio_venta">Precio de Venta:</label>
        <input type="text" id="precio_venta" name="precio_venta" value="'.$precioVenta.'" placeholder="Ejemplo: $0000" required><br>

        <label for="proveedor">Proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" value="'.$proveedor.'" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="'.$telefono.'" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="'.$direccion.'" required><br>

        <label>Estado:</label>
        <select name="Estado" required>
            <option value="Activo"' . ($Estado == 'Activo' ? ' selected' : '') . '>Activo</option>
            <option value="Inactivo"' . ($Estado == 'Inactivo' ? ' selected' : '') . '>Inactivo</option>
        </select><br>

        <input type="submit" value="Actualizar">
    </form>
    ';
} else {    
    echo '<script>alert("No se encontró ningún producto con el ID proporcionado."); window.close();</script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
