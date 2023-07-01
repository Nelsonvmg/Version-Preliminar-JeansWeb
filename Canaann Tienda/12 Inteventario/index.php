<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
<header class="main-header">
      <div class="container container--flex">
        <div class="main-header__container">
          <h1 class="main-header__title">CANAANN</h1>
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <nav class="main-nav" id="main-nav">
            <ul class="menu">
              <li class="menu__item"><a href="..//Canaann Tienda/1 Interfaz Inicio/index.html" class="menu__link">Inventario</a></li>
              <li class="menu__item"><a href="#" class="menu__link">NOSOTROS</a></li>             
              <li class="menu__item"><a href="#" class="menu__link">CONTACTENOS</a></li>
              <li class="menu__item"><a href="#" class="menu__link">REGÍSTRATE</a></li>          
              <!-- <button class="registro-btn" onclick="registrar()">Registrar</button> -->
            </ul>
          </nav>
        </div>
      </div>
    
      <!-- Enlace de WhatsApp con icono -->
<a href="https://api.whatsapp.com/send?phone=573133966943" target="_blank">
  <i class="fab fa-whatsapp whatsapp-icon"></i>
</a>
    </header>
    <main>
        <div class="container" id="container">
            <h2>Lista de Productos</h2>
            <a class="btn btn-primary" href="crear.php" role="button">Nuevo Producto</a>
            <a class="btn btn-success" href="descargar_excel.php" role="button">Descargar como Excel</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID_Producto</th>
                        <th>Nombre_Producto</th>
                        <th>Descripcion_Producto</th>
                        <th>Talla_Producto</th>
                        <th>Color_Producto</th>
                        <th>Linea_Producto</th>
                        <th>Cantidad_Producto</th>
                        <th>Forma_Pago</th>
                        <th>Observacion</th>
                        <th>Precio_Producto</th>
                        <th>Total</th>
                        <th>Fecha de Producto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "inventario";
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
        </div>
    </main>
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
        <a href="" class="footer__link">INICIO</a>
        <a href="" class="footer__link">NOSOTROS</a>
        <a href="" class="footer__link">CONTACTENOS</a>
        <a href="https://api.whatsapp.com/send?phone=573114696088" target="_blank" class="footer__link">REGÍSTRATE</a>
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Suscribete Para Recibir Nuestras Ofertas</h2>
        <p class="footer__txt">Al suscribirse a nuestra lista de correo, siempre recibirá nuestras últimas noticias y actualizaciones.</p>        
      </div>
      <p class="copy">© 2023 CANAANN. Todos los derechos reservados| Design by Nelsonvmg</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-bD4GYMD/Gs5W0e0A43vL9MbDKU0H7n2gDWElZ/i2jOQDfRo1UZ3fWwaB2+arxfnz" crossorigin="anonymous"></script>
</body>
</html>
