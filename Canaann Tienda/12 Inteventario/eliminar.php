<?php 
if (isset($_GET["ID_Producto"])) {
    $ID_Producto = $_GET["ID_Producto"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_jeansweb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $sql = "DELETE FROM compra WHERE ID_Producto=$ID_Producto";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>