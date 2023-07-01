<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener el ID del registro de venta
$idVenta = $_GET['id']; // Puedes obtener este valor desde la URL o desde un formulario, según tu caso

// Consultar el registro de venta en la base de datos y obtener los datos necesarios para la tirilla
$sql = "SELECT * FROM ventas WHERE id_venta = $idVenta";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $venta = mysqli_fetch_assoc($resultado);

    // Obtener los datos necesarios para la tirilla
    $nombreCliente = $venta['nombre_cliente'];
    $fechaVenta = $venta['fecha_venta'];
    $numeroDocumento = $venta['numero_documento'];
    $telefonoCelular = $venta['telefono_celular'];

    // Consultar los datos del producto
    $idProducto = $venta['id_producto'];
    $sqlProducto = "SELECT * FROM productos WHERE id_producto = $idProducto";
    $resultadoProducto = mysqli_query($conexion, $sqlProducto);
    if ($resultadoProducto && mysqli_num_rows($resultadoProducto) > 0) {
        $producto = mysqli_fetch_assoc($resultadoProducto);
        $nombreProducto = $producto['nombre_producto'];
        $tallaProducto = $producto['talla_producto'];
        $colorProducto = $producto['color_producto'];
        // ... Otros datos relevantes del producto
    } else {
        $nombreProducto = "No disponible";
        $tallaProducto = "No disponible";
        $colorProducto = "No disponible";
        // ... Otros datos relevantes del producto cuando no se encuentra en la base de datos
    }

    // Consultar los datos de la empresa
    $sqlEmpresa = "SELECT * FROM empresa LIMIT 1";
    $resultadoEmpresa = mysqli_query($conexion, $sqlEmpresa);
    if ($resultadoEmpresa && mysqli_num_rows($resultadoEmpresa) > 0) {
        $empresa = mysqli_fetch_assoc($resultadoEmpresa);
        $nombreEmpresa = $empresa['nombre_empresa'];
        $direccionEmpresa = $empresa['direccion_empresa'];
        $telefonoEmpresa = $empresa['telefono_empresa'];
        // ... Otros datos relevantes de la empresa
    } else {
        $nombreEmpresa = "No disponible";
        $direccionEmpresa = "No disponible";
        $telefonoEmpresa = "No disponible";
        // ... Otros datos relevantes de la empresa cuando no se encuentra en la base de datos
    }

    // Generar el código de barras
    $barcodeValue = $idVenta; // Puedes utilizar el ID de venta como valor del código de barras, o cualquier otro valor necesario

    // Renderizar la tirilla con los datos obtenidos
    echo '
        <h2>Tirilla de Venta</h2>
        <p>ID de Venta: ' . $idVenta . '</p>
        <p>Cliente: ' . $nombreCliente . '</p>
        <p>Fecha de Venta: ' . $fechaVenta . '</p>
        <p>Número de Documento: ' . $numeroDocumento . '</p>
        <p>Teléfono Celular: ' . $telefonoCelular . '</p>
        <p>Producto: ' . $nombreProducto . '</p>
        <p>Talla: ' . $tallaProducto . '</p>
        <p>Color: ' . $colorProducto . '</p>
        <p>Empresa: ' . $nombreEmpresa . '</p>
        <p>Dirección de la Empresa: ' . $direccionEmpresa . '</p>
        <p>Teléfono de la Empresa: ' . $telefonoEmpresa . '</p>
        <div>
            <img src="Venta_barcode_generator.php?value=' . $barcodeValue . '" alt="Código de barras">
        </div>
        <p>Otros datos de la tirilla:</p>
        <p>...</p>
    ';
} else {
    echo 'No se encontró el registro de venta.';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
