<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proveedores";
$conn = new mysqli($servername, $username, $password, $dbname);

$Nombre = "";
$Email = "";
$Telefono = "";
$Direccion = "";
$Producto = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = $_POST["Nombre"];
    $Email = $_POST["Email"];
    $Telefono = $_POST["Telefono"];
    $Direccion = $_POST["Direccion"];
    $Producto = $_POST["Producto"];

    if (empty($Nombre) || empty($Email) || empty($Telefono) || empty($Direccion) || empty($Producto)) {
        $errorMessage = "Todos los campos son requeridos";
    } else {
        $sql = "INSERT INTO proveedores (Nombre, Email, Telefono, Direccion, Producto) VALUES ('$Nombre', '$Email', '$Telefono', '$Direccion', '$Producto')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "Proveedor actualizado exitosamente";
            $Nombre = "";
            $Email = "";
            $Telefono = "";
            $Direccion = "";
            $Producto = "";
            header("Location: index.php");
            exit;
        } else {
            $errorMessage = "Error al actualizar el proveedor: " . $conn->error;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedor</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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

        <div class="container_my-5" id="container">
            <h2>Nuevo Proveedor</h2>
            <?php
            if (!empty($errorMessage)) {
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
            ?>
            <form action="" method="post" id="container">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Nombre" value="<?php echo $Nombre ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Email" value="<?php echo $Email ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Telefono</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Telefono" value="<?php echo $Telefono ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Direccion</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Direccion" value="<?php echo $Direccion ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Producto</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Producto" value="<?php echo $Producto ?>">
                    </div>
                </div>

                <?php
                if (!empty($successMessage)) {
                    echo "
                            <div class='row md-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>
                        ";
                }
                ?>

                <div class="row_md-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/proveedores/index.php" role="button">Cancelar</a>
                    </div>
                </div>
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
</body>

</html>
