<?php
   // Datos de conexión a la base de datos
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "directorio";
   
   // Obtener los datos del formulario
   $idPer = $_POST['id'];
   $nombrePer = $_POST['nombre'];
   $apellidoPer = $_POST['apellido'];
   $direccPer = $_POST['direccion'];
   $correoPer = $_POST['correo'];
   $celularPer = $_POST['celular'];
   $genero = $_POST['genero'];
   $fecha_nacimiento = $_POST['fecha_nacimiento'];
   $numero_usuario = $_POST['numero_usuario'];
   $contraseña = $_POST['contraseña'];
   
   // Validar que todos los campos del formulario estén completos
   if (empty($idPer) || empty($nombrePer) || empty($apellidoPer) || empty($direccPer) || empty($correoPer)
    || empty($celularPer) || empty($genero) || empty($fecha_nacimiento) || empty($numero_usuario) || empty($contraseña))
   
    {
       echo "Por favor, complete todos los campos del formulario.";
       exit;
   }
   
   // Crear conexión
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   // Revisar conexión
   if (!$conn) {
       die("Error de conexión: " . mysqli_connect_error());
   }   
   
   // Insertar los datos en la tabla
   $sql = "INSERT INTO persona (idPer, nombrePer, apellidoPer, direccPer, correoPer, celularPer, genero, fecha_nacimiento, numero_usuario, contraseña)
           VALUES ('$idPer', '$nombrePer', '$apellidoPer', '$direccPer', '$correoPer', '$celularPer',
           '$genero', '$fecha_nacimiento', '$numero_usuario', '$contraseña')";
   
   
   if (mysqli_query($conn, $sql)) {
   // Datos guardados correctamente
       echo "<script>
             alert('Datos guardados correctamente.');
             window.location.href = './Registro.html';
             </script>";
   } else {
   // Error al guardar los datos
       echo "<script>
            alert('Erro de registro.');
            window.location.href = './Registro.html';
            </script>";
   }    
   mysqli_close($conn);
   ?>