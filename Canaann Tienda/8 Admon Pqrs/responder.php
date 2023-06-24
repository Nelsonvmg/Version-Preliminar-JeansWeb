<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admon Pqrs</title>
  <!-- Enlace al descarga excel -->
  <script src="xlsx.full.min.js"></script>
  <!-- Enlace al archivo CSS personalizado -->
  <link rel="stylesheet" href="filtro.css">
</head>
<body>
  <!-- Encabezado de la Página -->
  <header class="main-header">
    <div class="container container--flex">
      <div class="main-header__container">
        <h1 class="main-header__title">RESPONDER PQRs</h1>
        <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
        <nav class="main-nav" id="main-nav">
          <ul class="menu">
            <li class="menu__item"><a href="#" class="menu__link">HOME</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <div class="table-container">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="pqrFilter">Filtrar por PQR:</label>
      <select name="pqrFilter" id="pqrFilter">
        <option value="">Todos</option>
        <option value="Peticion">Petición</option>
        <option value="Queja">Queja</option>
        <option value="Reclamo">Reclamo</option>
        <option value="Felicitación">Felicitación</option>
        <option value="Sugerencia">Sugerencia</option>
      </select>
      <button type="submit">Filtrar</button>
      <label for="estadoFilter">Filtrar por Estado:</label>
      <select name="estadoFilter" id="estadoFilter">
        <option value="">Todos</option>
        <option value="radicado">radicado</option>
        <option value="respondida">respondida</option>
        <option value="consultada">consultada</option>
        <option value="cerrada">cerrada</option>
      </select>
      <button type="submit">Filtrar</button>
    </form>
  </div>
  <table id="tablaContactenos">
    <tr>
      <th>ID</th>
      <th>Pqr <span id="pqrSpinner" class="spinner"></span></th>
      <th>ID Cliente</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Mensaje</th>
      <th>Fecha</th>
      <th>Estado <span id="estadoSpinner" class="spinner"></span></th>
      <th>Respuesta</th>
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

    // Verificar si se ha enviado un formulario de respuesta
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Obtener el ID y la respuesta del formulario
      $id = $_POST["id"];
      $respuesta = $_POST["respuesta"];

      // Actualizar la columna de respuesta y el estado en la base de datos
      $updateSql = "UPDATE contactenos SET respuesta = '$respuesta', estado = 'respondida' WHERE id = '$id'";
      if ($conn->query($updateSql) === TRUE) {
        echo "La respuesta se ha guardado exitosamente.";
      } else {
        echo "Error al guardar la respuesta: " . $conn->error;
      }
    }

    // Construir la consulta SQL base
    $sql = "SELECT * FROM contactenos WHERE estado IN ('radicado', 'consultada')";

    // Obtener los valores de los filtros si existen
    $pqrFilter = isset($_GET['pqrFilter']) ? $_GET['pqrFilter'] : '';
    $estadoFilter = isset($_GET['estadoFilter']) ? $_GET['estadoFilter'] : '';

    // Agregar los filtros a la consulta SQL si se han proporcionado
    if (!empty($pqrFilter)) {
      $sql .= " AND tipo_comunicacion = '$pqrFilter'";
    }
    if (!empty($estadoFilter)) {
      $sql .= " AND estado = '$estadoFilter'";
    }

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
      // Recorrer cada fila de resultados y mostrar los datos en la tabla
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["tipo_comunicacion"] . "</td>";
        echo "<td>" . $row["numero_documento"] . "</td>";
        echo "<td>" . $row["nombres"] . "</td>";
        echo "<td>" . $row["apellidos"] . "</td>";
        echo "<td>" . $row["mensaje"] . "</td>";
        echo "<td>" . date("d M Y", strtotime($row["fecha_radicacion"])) . "</td>";
        echo "<td>" . $row["estado"] . "</td>";
        echo "<td><input type='text' id='respuesta-" . $row["id"] . "'></td>";
        echo "<td><button onclick=\"saveResponse('" . $row["id"] . "')\">Responder</button></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='10'>No se encontraron resultados.</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
  </table>
  <br><br>
  </div>

  <script>
    function saveResponse(id) {
      // Obtener el campo de respuesta correspondiente al ID
      var responseField = document.getElementById("respuesta-" + id);

      // Obtener el valor de respuesta
      var respuesta = responseField.value.trim();

      // Verificar si se ha ingresado una respuesta
      if (respuesta.length === 0) {
        alert("Debes ingresar una respuesta antes de guardar.");
        return;
      }

      // Enviar el formulario con la respuesta
      var form = document.createElement("form");
      form.method = "post";
      form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

      // Crear campos ocultos con los datos necesarios
      var idField = document.createElement("input");
      idField.type = "hidden";
      idField.name = "id";
      idField.value = id;

      var respuestaField = document.createElement("input");
      respuestaField.type = "hidden";
      respuestaField.name = "respuesta";
      respuestaField.value = respuesta;

      // Agregar los campos ocultos al formulario
      form.appendChild(idField);
      form.appendChild(respuestaField);

      // Agregar el formulario al documento y enviarlo
      document.body.appendChild(form);
      form.submit();
    }
  </script>

  <br><br>
  <body>
    <div class="containerp">
      <div class="footer">
        <p class="footer-text">&copy; 2023 CANAANN. Todos los derechos reservados | Design by Nelsonvmg</p>
      </div>
    </div>
  </html>
