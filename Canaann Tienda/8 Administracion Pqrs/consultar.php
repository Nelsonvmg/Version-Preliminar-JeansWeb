<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consultar Pqrs</title>
  <!-- Enlace al descarga excel -->
  <script src="xlsx.full.min.js"></script>
  <!-- Enlace al archivo CSS personalizado -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="filtro.css">
</head>
<body>
  <!-- Encabezado -->
<header class="main-header">
      <div class="container container--flex">
        <div class="main-header__container">
          <h1 class="main-header__title">CANAANN</h1>
          <h1 class="main-header__title2">CONSULTA PQRS</h1>
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <nav class="main-nav" id="main-nav">
            <ul class="menu">
              <li class="menu__item"><a href="../8 Administracion Pqrs/index.html" class="menu__link">ADMINISTRACION PQRS</a></li>
              <li class="menu__item"><a href="../8 Administracion Pqrs/responder.php" class="menu__link">RESPONDER</a></li>
              <li class="menu__item"><a href="../8 Administracion Pqrs/actualizar.php" class="menu__link">ACTUALIZAR</a></li>
              <li class="menu__item"><a href="../8 Administracion Pqrs/archivar.php"  class="menu__link">ARCHIVAR</a></li>
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
        <option value="archivado">archivado</option>
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

        // Construir la consulta SQL base
        $sql = "SELECT * FROM contactenos";

        // Obtener los valores de los filtros si existen
        $pqrFilter = isset($_GET['pqrFilter']) ? $_GET['pqrFilter'] : '';
        $estadoFilter = isset($_GET['estadoFilter']) ? $_GET['estadoFilter'] : '';

        // Agregar los filtros a la consulta SQL si se han proporcionado
        if (!empty($pqrFilter)) {
          $sql .= " WHERE tipo_comunicacion = '$pqrFilter'";
        }
        if (!empty($estadoFilter)) {
          $sql .= " WHERE estado = '$estadoFilter'";
        }

        // Ejecutar la consulta SQL
        $result = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
          // Recorrer cada fila de resultados y mostrar los datos en la tabla
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["tipo_comunicacion"]."</td>";
            echo "<td>".$row["numero_documento"]."</td>";
            echo "<td>".$row["nombres"]."</td>";
            echo "<td>".$row["apellidos"]."</td>";
            echo "<td>".$row["mensaje"]."</td>";
            echo "<td>".date("d M Y", strtotime($row["fecha_radicacion"]))."</td>";
            echo "<td>".$row["estado"]."</td>";
            echo "<td>".$row["respuesta"]."</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='9'>No se encontraron resultados.</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
      ?>
    </table>
    <br><br>
    <button type="button" onclick="exportToExcel()">Exportar a Excel</button>
    <script src="excel.js"></script>
  </div>
</body>
<br><br>
<body>
<!-- Pie -->
<footer class="main-footer">
      <div class="footer__section">
        <h2 class="footer__title">Acerca de Nosotros</h2>
        <p class="footer__txt">Somos una tienda de ropa en línea comprometida en ofrecer productos de alta calidad y las últimas tendencias de moda a nuestros clientes. 
        Nuestro objetivo es brindar una experiencia de compra excepcional y satisfacer las necesidades de estilo de la mujer.</p>
        <h2 class="footer__title">Contactenos</h2>
        <p class="footer__txt">Telefono: +57 311 469 6088</p>
        <p class="footer__txt">Email : lauralizethriveraaguilar04@gmail.com</p>       
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Ubicación</h2>
        <p class="footer__txt">Calle 10 #12-04 Centro Comercial La Gran Esquina Local 121 Primer Piso Entrada 7, Bogotá, Colombia</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9648895518794!2d-74.08289639125533!3d4.600311742504131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9909092c9281%3A0x19227c786b2afafe!2sCentro%20Comercial%20La%20Gran%20Esquina!5e0!3m2!1ses-419!2sco!4v1684434263998!5m2!1ses-419!2sco" 
        width="275" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Enlaces de Interes</h2>
        <a href="" class="footer__link">Home</a>
        <a href="" class="footer__link">Acerca de nosotros</a>
        <a href="" class="footer__link">Tienda</a>
        <a href="https://api.whatsapp.com/send?phone=573114696088" target="_blank" class="footer__link">Contactenos</a>
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Suscribete Para Recibir Nuestras Ofertas</h2>
        <p class="footer__txt">Al suscribirse a nuestra lista de correo, siempre recibirá nuestras últimas noticias y actualizaciones.</p>
        <h2 class="footer__title">Click Aquí</h2>
        <div class="call-to-action-container">
          <a class="call-to-action">Regístrate</a>
        </div>
      </div>
      <p class="copy">© 2023 CANAANN. Todos los derechos reservados| Design by Nelsonvmg</p>
    </footer>
</body>
<!-- partial -->
<script  src="../2 Registro Cliente/scriptRegistro.js"></script>
<script  src="script.js"></script>
</html>

