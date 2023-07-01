<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Acualizar Pqrs</title>
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
          <h1 class="main-header__title2">ACTUALIZAR PQRS</h1>
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <nav class="main-nav" id="main-nav">
            <ul class="menu">
            <li class="menu__item"><a href="../8 Administracion Pqrs/index.html" class="menu__link">ADMINISTRACION PQRS</a></li>
            <li class="menu__item"><a href="../8 Administracion Pqrs/consultar.php" class="menu__link">CONSULTAR</a></li>
            <li class="menu__item"><a href="../8 Administracion Pqrs/responder.php" class="menu__link">RESPONDER</a></li>
            <li class="menu__item"><a href="../8 Administracion Pqrs/archivar.php"  class="menu__link">ARCHIVAR</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- Enlace de WhatsApp con icono -->
<a href="https://api.whatsapp.com/send?phone=573114696088" target="_blank">
  <i class="fab fa-whatsapp whatsapp-icon"></i>
</a>
 
 <script>
    function actualizar(id) {
      // Obtener el valor seleccionado del campo "Estado"
      var estadoSelect = document.getElementById("estado-"+id);
      var nuevoEstado = estadoSelect.value;

      // Realizar una solicitud AJAX para enviar el ID y el nuevo estado al archivo PHP y actualizar la información
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // No es necesario realizar ninguna acción adicional, ya que el cliente JavaScript actualizará la tabla en el navegador
        }
      };
      xhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id + "&estado=" + nuevoEstado);
    }
  </script>

<!-- Contenido -->
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

      // Verificar si se recibió el ID y el estado del formulario
      if (isset($_POST["id"]) && isset($_POST["estado"])) {
        $id = $_POST["id"];
        $estado = $_POST["estado"];

        // Actualizar el estado del registro con el ID proporcionado
        $sql = "UPDATE contactenos SET estado = '$estado' WHERE id = $id";
        $conn->query($sql);
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
          echo "<td>";
          echo "<select id='estado-".$row["id"]."'>";
          echo "<option value='radicado' ".($row["estado"] == "radicado" ? "selected" : "").">Radicado</option>";
          echo "<option value='respondida' ".($row["estado"] == "respondida" ? "selected" : "").">Respondida</option>";
          echo "<option value='aceptada' ".($row["estado"] == "aceptada" ? "selected" : "").">Aceptada</option>";
          echo "<option value='archivado' ".($row["estado"] == "archivado" ? "selected" : "").">Archivado</option>";
          echo "</select>";
          echo "</td>";
          echo "<td><button id='actualizar-".$row["id"]."' class='update-button' onclick=\"actualizar(".$row["id"].")\">Actualizar</button></td>";
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
