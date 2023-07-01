<?php
include '../0 Conexión Global BD/conexion.php';
require_once 'tcpdf/tcpdf.php';

// Obtener el ID del registro de venta
$idVenta = $_GET['id_venta']; // Puedes obtener este valor desde la URL o desde un formulario, según tu caso

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

    // Crear un objeto TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Agregar una página
    $pdf->AddPage();

    // Generar el código de barras y agregarlo al PDF
    $pdf->write1DBarcode($barcodeValue, 'C128', '', '', '', 18, 0.4, '', 'N');

    // Agregar los datos de la tirilla al PDF
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Tirilla de Venta', 0, 1, 'C');
    $pdf->Cell(0, 10, 'ID de Venta: ' . $idVenta, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Cliente: ' . $nombreCliente, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Fecha de Venta: ' . $fechaVenta, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Número de Documento: ' . $numeroDocumento, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Teléfono Celular: ' . $telefonoCelular, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Producto: ' . $nombreProducto, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Talla del Producto: ' . $tallaProducto, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Color del Producto: ' . $colorProducto, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Empresa: ' . $nombreEmpresa, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Dirección de la Empresa: ' . $direccionEmpresa, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Teléfono de la Empresa: ' . $telefonoEmpresa, 0, 1, 'L');

    // Generar el PDF y enviarlo al navegador
    $pdf->Output('tirilla_venta.pdf', 'I');
} else {
    echo 'No se encontró el registro de venta.';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
