<?php 
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proveedores";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $sql = "DELETE FROM proveedores WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el proveedor: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
