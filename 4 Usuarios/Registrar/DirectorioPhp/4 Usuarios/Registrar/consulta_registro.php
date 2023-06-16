<?php
   // Datos de conexión a la base de datos
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "directorio";
   
   // Obtener el ID del registro a consultar
   $id = $_GET['id'];
   
   // Crear conexión a la base de datos
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
   // Verificar la conexión
   if (!$conn) {
       die("Error de conexión: " . mysqli_connect_error());
   }
   
   // Consultar el registro con el ID especificado
   $sql = "SELECT * FROM persona WHERE idPer = '$id'";
   $result = mysqli_query($conn, $sql);
   
   // Verificar si se encontró el registro
   if (mysqli_num_rows($result) > 0) {
       // Obtener los datos del registro
       $registro = mysqli_fetch_assoc($result);
   
   // Devolver los datos del registro en formato JSON
       echo json_encode($registro);
   } else {
   // No se encontró ningún registro con el ID especificado
       echo json_encode(null);
   }
   
   // Cerrar la conexión a la base de datos
   mysqli_close($conn);
   ?>