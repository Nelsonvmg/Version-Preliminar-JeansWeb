
<?php
require('fpdf.php');

class ReportePDF extends FPDF {
    // Cabecera del reporte
    function Header() {
        // Logo o título del reporte
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Reporte de Personas', 0, 1, 'C');
        $this->Ln(10);
        
        // Encabezados de las columnas
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(20, 10, 'ID', 1, 0, 'C');
        $this->Cell(40, 10, 'Nombres', 1, 0, 'C');
        $this->Cell(40, 10, 'Apellidos', 1, 0, 'C');
        $this->Cell(50, 10, 'Dirección', 1, 0, 'C');
        // Agrega más celdas para las columnas restantes
        $this->Ln();
    }
    
    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
    
    // Generar el contenido del reporte
    function generarReporte($datos) {
        $this->SetFont('Arial', '', 12);
        
        // Recorrer los datos y agregar las filas al reporte
        foreach ($datos as $fila) {
            $this->Cell(20, 10, $fila['idPer'], 1, 0, 'C');
            $this->Cell(40, 10, $fila['nombrePer'], 1, 0, 'C');
            $this->Cell(40, 10, $fila['apellidoPer'], 1, 0, 'C');
            $this->Cell(50, 10, $fila['direccPer'], 1, 0, 'C');
            // Agrega más celdas para las columnas restantes
            $this->Ln();
        }
    }
}

// Crear una instancia de la clase ReportePDF
$pdf = new ReportePDF();
$pdf->AliasNbPages();

// Obtener los datos de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM persona";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Crear un arreglo con los datos obtenidos
    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
    
    // Generar el reporte con los datos obtenidos
    $pdf->AddPage();
    $pdf->generarReporte($datos);
    
    // Salida del PDF
    $pdf->Output('reporte_personas.pdf', 'D');
} else {
    echo "No se encontraron registros.";
}

$conn->close();

?>
