<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admon Pqrs</title>
  <!-- Enlace al descarga excel -->
  <script src="xlsx.full.min.js"></script>
  <!-- Enlace al archivo CSS personalizado -->
  <link rel="stylesheet" href="filtro.css">
  <script>
    function archivar(id) {
      // Realizar una solicitud AJAX para enviar el ID al archivo PHP y actualizar el estado
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Actualizar el contenido de la fila en la tabla sin recargar la página
          document.getElementById("estado-"+id).textContent = "archivado";
          document.getElementById("archivar-"+id).disabled = true; // Desactivar el botón después de archivar
        }
      };
      xhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id);
    }
  </script>
</head>
<body>
  <!-- Encabezado de la Página -->
  <header class="main-header">
    <div class="container container--flex">
      <div class="main-header__container">
        <h1 class="main-header__title">ARCHIVAR PQRs</h1>
        <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
        <nav class="main-nav" id="main-nav">
          <ul class="menu">
            <li class="menu__item"><a href="#" class="menu__link">HOME</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <br><br>
  <table id="tablaContactenos">
    <tr>
      <th>ID</th>
      <th>Pqr</th>
      <th>ID Cliente</th>
      <th>Documento</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Mensaje</th>
      <th>Fecha</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
    <?php
      // Configuración de la conexión a la base de datos
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "bd_jeansweb";

      // Crear la conexión a la base de datos
      $conn = new mysqli($servername, $username, $password, $database);

      // Verificar si hay errores en la conexión
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Verificar si se recibió el ID del formulario
      if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Actualizar el estado del registro con el ID proporcionado
        $sql = "UPDATE contactenos SET estado = 'archivado' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
          // No es necesario imprimir ningún mensaje, el cliente JavaScript actualizará la tabla en el navegador
        } else {
          echo "Error al actualizar el estado: " . $conn->error;
        }
      }

      // Consultar todos los registros de la tabla "contactenos"
      $sql = "SELECT * FROM contactenos";
      $result = $conn->query($sql);

      // Verificar si se encontraron resultados
      if ($result->num_rows > 0) {
        // Recorrer cada fila de resultados y mostrar los datos en la tabla
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row["id"]."</td>";
          echo "<td>".$row["tipo_comunicacion"]."</td>";
          echo "<td>".$row["tipo_documento"]."</td>";
          echo "<td>".$row["numero_documento"]."</td>";
          echo "<td>".$row["nombres"]."</td>";
          echo "<td>".$row["apellidos"]."</td>";
          echo "<td>".$row["mensaje"]."</td>";
          echo "<td>" . date("d M Y", strtotime($row["fecha_radicacion"])) . "</td>";
          echo "<td id='estado-".$row["id"]."'>".$row["estado"]."</td>";
          echo "<td><button id='archivar-".$row["id"]."' class='update-button' onclick=\"archivar(".$row["id"].")\">Archivar</button></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='13'>No se encontraron resultados.</td></tr>";
      }

      // Cerrar la conexión a la base de datos
      $conn->close();
    ?>
  </table>
  <br><br>
  <div class="containerp">
    <div class="footer">
      <p class="footer-text">&copy; 2023 CANAANN. Todos los derechos reservados | Design by Nelsonvmg</p>
    </div>
  </div>
</body>
</html>
