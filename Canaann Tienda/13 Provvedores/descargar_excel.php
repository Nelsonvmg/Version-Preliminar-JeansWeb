<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte.xls");

require_once("index.php");
?>

<table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Producto</th>
                        <th>Fecha de registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error en la conexión: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM proveedores";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalido" . $conn->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['Nombre']}</td>
                                <td>{$row['Email']}</td>
                                <td>{$row['Telefono']}</td>
                                <td>{$row['Direccion']}</td>
                                <td>{$row['Producto']}</td>
                                <td>{$row['Fecha_registro']}</td>
                            </tr>                        
                        ";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>