<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte.xls");

require_once("index.php");
?>

<table class="table">
                <thead>
                    <tr>
                        <th>ID_Producto</th>
                        <th>Nombre_Producto</th>
                        <th>Descripcion_Producto</th>
                        <th>Talla_Producto_ID_Talla</th>
                        <th>Color_Producto_ID_Color</th>
                        <th>Linea_Producto_ID_Linea_Producto</th>
                        <th>Cantidad_Producto_Compra</th>
                        <th>Forma_Pago_Compra</th>
                        <th>Observacion_Compra</th>
                        <th>Precio_Producto_Compra</th>
                        <th>Total_Compra</th>
                        <th>Fecha de Producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "bd_jeansweb";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error en la conexión: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM compra";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Error en la consulta: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>{$row['ID_Producto']}</td>
                                <td>{$row['Nombre_Producto']}</td>
                                <td>{$row['Descripcion_Producto']}</td>
                                <td>{$row['Talla_Producto_ID_Talla']}</td>
                                <td>{$row['Color_Producto_ID_Color']}</td>
                                <td>{$row['Linea_Producto_ID_Linea_Producto']}</td>
                                <td>{$row['Cantidad_Producto_Compra']}</td>
                                <td>{$row['Forma_Pago_Compra']}</td>
                                <td>{$row['Observacion_Compra']}</td>
                                <td>{$row['Precio_Producto_Compra']}</td>
                                <td>{$row['Total_Compra']}</td>
                                <td>{$row['Fecha_Producto_Compra']}</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='./editar.php?ID_Producto={$row['ID_Producto']}'>Editar</a>
                                    <a class='btn btn-danger btn-sm' href='./eliminar.php?ID_Producto={$row['ID_Producto']}'>Eliminar</a>
                                </td>
                            </tr>
                        ";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>