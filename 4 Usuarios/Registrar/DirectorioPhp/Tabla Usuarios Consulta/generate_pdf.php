<?php
require('fpdf/fpdf.php'); // Ruta a la biblioteca FPDF

// ...

// Generar el reporte en PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar la fuente y el tamaño del texto
$pdf->SetFont('Arial', 'B', 12);

// Agregar encabezados de columna
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombres', 1);
$pdf->Cell(40, 10, 'Apellidos', 1);
// Agregar más celdas para los demás campos de la tabla

$pdf->Ln(); // Salto de línea

// Obtener los datos de la tabla
$sql = "SELECT * FROM persona";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Agregar los datos a las celdas
        $pdf->Cell(20, 10, $row['idPer'], 1);
        $pdf->Cell(40, 10, $row['nombrePer'], 1);
        $pdf->Cell(40, 10, $row['apellidoPer'], 1);
        // Agregar más celdas para los demás campos de la tabla

        $pdf->Ln(); // Salto de línea
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros.', 1);
}

// Guardar el archivo PDF en el servidor
$pdf->Output('reporte.pdf', 'F');

// ...
?>
