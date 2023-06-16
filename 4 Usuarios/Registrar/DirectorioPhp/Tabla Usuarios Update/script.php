<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta los datos de la tabla persona
$sql = "SELECT * FROM persona";
$result = $conn->query($sql);

// Genera la tabla con los datos obtenidos
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idPer'] . "</td>";
        echo "<td>" . $row['nombrePer'] . "</td>";
        echo "<td>" . $row['apellidoPer'] . "</td>";
        echo "<td>" . $row['direccPer'] . "</td>";
        echo "<td>" . $row['correoPer'] . "</td>";
        echo "<td>" . $row['celularPer'] . "</td>";
        echo "<td>" . $row['genero'] . "</td>";
        echo "<td>" . $row['fecha_nacimiento'] . "</td>";
        echo "<td>" . $row['numero_usuario'] . "</td>";
        echo "<td>" . $row['contraseña'] . "</td>";
        echo "<td>" . $row['reg_date'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron registros.";
}
$conn->close();
?>
