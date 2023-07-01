<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";
$conn = new mysqli($servername, $username, $password, $dbname);

$ID_Producto = "";
$Nombre_Producto = "";
$Descripcion_Producto = "";
$Talla_Producto_ID_Talla = "";
$Color_Producto_ID_Color = "";
$Linea_Producto_ID_Linea_Producto = "";
$Cantidad_Producto_Compra = "";
$Forma_Pago_Compra = "";
$Observacion_Compra = "";
$Precio_Producto_Compra = "";
$Total_Compra = "";
$Fecha_Producto_Compra = "";

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if (isset($_GET['ID_Producto'])) {
    $ID_Producto = $_GET['ID_Producto'];
    $sql = "SELECT * FROM compra WHERE ID_Producto = $ID_Producto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nombre_Producto = $row['Nombre_Producto'];
        $Descripcion_Producto = $row['Descripcion_Producto'];
        $Talla_Producto_ID_Talla = $row['Talla_Producto_ID_Talla'];
        $Color_Producto_ID_Color = $row['Color_Producto_ID_Color'];
        $Linea_Producto_ID_Linea_Producto = $row['Linea_Producto_ID_Linea_Producto'];
        $Cantidad_Producto_Compra = $row['Cantidad_Producto_Compra'];
        $Forma_Pago_Compra = $row['Forma_Pago_Compra'];
        $Observacion_Compra = $row['Observacion_Compra'];
        $Precio_Producto_Compra = $row['Precio_Producto_Compra'];
        $Total_Compra = $row['Total_Compra'];
        $Fecha_registro = $row['Fecha_Producto_Compra'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre_Producto = $_POST['Nombre_Producto'];
    $Descripcion_Producto = $_POST['Descripcion_Producto'];
    $Talla_Producto_ID_Talla = $_POST['Talla_Producto_ID_Talla'];
    $Color_Producto_ID_Color = $_POST['Color_Producto_ID_Color'];
    $Linea_Producto_ID_Linea_Producto = $_POST['Linea_Producto_ID_Linea_Producto'];
    $Cantidad_Producto_Compra = $_POST['Cantidad_Producto_Compra'];
    $Forma_Pago_Compra = $_POST['Forma_Pago_Compra'];
    $Observacion_Compra = $_POST['Observacion_Compra'];
    $Precio_Producto_Compra = $_POST['Precio_Producto_Compra'];
    $Total_Compra = $_POST['Total_Compra'];

    $sql = "UPDATE compra SET Nombre_Producto = '$Nombre_Producto', Descripcion_Producto = '$Descripcion_Producto', Talla_Producto_ID_Talla = '$Talla_Producto_ID_Talla', Color_Producto_ID_Color = '$Color_Producto_ID_Color', Linea_Producto_ID_Linea_Producto = '$Linea_Producto_ID_Linea_Producto', Cantidad_Producto_Compra = '$Cantidad_Producto_Compra', Forma_Pago_Compra = '$Forma_Pago_Compra', Observacion_Compra = '$Observacion_Compra', Precio_Producto_Compra = '$Precio_Producto_Compra', Total_Compra = '$Total_Compra' WHERE ID_Producto = $ID_Producto";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inventario</title>
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
              <li class="menu__item"><a href="../1 Interfaz Inicio/index.html" class="menu__link">INICIO</a></li>
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
        <div class="container">
            <h2>Editar Inventario</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="Nombre_Producto" class="form-label">Nombre_Producto</label>
                    <input type="text" class="form-control" id="Nombre_Producto" name="Nombre_Producto" value="<?php echo $Nombre_Producto; ?>">
                </div>
                <div class="mb-3">
                    <label for="Descripcion_Producto" class="form-label">Descripcion_Producto</label>
                    <input type="text" class="form-control" id="Descripcion_Producto" name="Descripcion_Producto" value="<?php echo $Descripcion_Producto; ?>">
                </div>
                <div class="mb-3">
                    <label for="Talla_Producto_ID_Talla" class="form-label">Talla_Producto_ID_Talla</label>
                    <input type="text" class="form-control" id="Talla_Producto_ID_Talla" name="Talla_Producto_ID_Talla" value="<?php echo $Talla_Producto_ID_Talla; ?>">
                </div>
                <div class="mb-3">
                    <label for="Color_Producto_ID_Color" class="form-label">Color_Producto_ID_Color</label>
                    <input type="text" class="form-control" id="Color_Producto_ID_Color" name="Color_Producto_ID_Color" value="<?php echo $Color_Producto_ID_Color; ?>">
                </div>
                <div class="mb-3">
                    <label for="Linea_Producto_ID_Linea_Producto" class="form-label">Linea_Producto_ID_Linea_Producto</label>
                    <input type="text" class="form-control" id="Linea_Producto_ID_Linea_Producto" name="Linea_Producto_ID_Linea_Producto" value="<?php echo $Linea_Producto_ID_Linea_Producto; ?>">
                </div>
                <div class="mb-3">
                    <label for="Cantidad_Producto_Compra" class="form-label">Cantidad_Producto_Compra</label>
                    <input type="text" class="form-control" id="Cantidad_Producto_Compra" name="Cantidad_Producto_Compra" value="<?php echo $Cantidad_Producto_Compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="Forma_Pago_Compra" class="form-label">Forma_Pago_Compra</label>
                    <input type="text" class="form-control" id="Forma_Pago_Compra" name="Forma_Pago_Compra" value="<?php echo $Forma_Pago_Compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="Observacion_Compra" class="form-label">Observacion_Compra</label>
                    <input type="text" class="form-control" id="Observacion_Compra" name="Observacion_Compra" value="<?php echo $Observacion_Compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="Precio_Producto_Compra" class="form-label">Precio_Producto_Compra</label>
                    <input type="text" class="form-control" id="Precio_Producto_Compra" name="Precio_Producto_Compra" value="<?php echo $Precio_Producto_Compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="Total_Compra" class="form-label">Total_Compra</label>
                    <input type="text" class="form-control" id="Total_Compra" name="Total_Compra" value="<?php echo $Total_Compra; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-secondary" href="index.php">Cancelar</a>
            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>