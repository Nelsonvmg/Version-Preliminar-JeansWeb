<?php

$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $contraseña, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

