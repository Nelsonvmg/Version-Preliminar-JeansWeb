<?php
// Iniciar sesión y obtener los valores del formulario
session_start();
$Usuario = $_POST['Usuario'];
$Password = $_POST['Password'];

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "bd_jeansweb";

$conn = new mysqli($servername, $username, $contraseña, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consulta para validar las credenciales del usuario
$sql = "SELECT * FROM persona WHERE Usuario = '$Usuario' AND Password = '$Password'";
$result = $conn->query($sql);

if ($result) {
    // Verificar si se encontraron registros
    if ($result->num_rows == 1) {
        // Credenciales válidas
        $row = $result->fetch_assoc();
        // Aquí puedes realizar acciones adicionales con la variable $row
        
        if (isset($row['Nombre_Persona'])) {
            $nombreCompleto = $row['Nombre_Persona'] . ' ' . $row['Apellido_Paterno'];
            
            // Obtener el tipo de rol del usuario desde la tabla persona_has_tipo_rol
            $personaID = $row['ID_Persona'];
            $rolQuery = "SELECT tipo_rol.Tipo_Rol FROM persona_has_tipo_rol 
                         INNER JOIN tipo_rol ON persona_has_tipo_rol.Tipo_Rol_ID_Tipo_Rol = tipo_rol.ID_Tipo_Rol 
                         WHERE persona_has_tipo_rol.Persona_ID_Persona = $personaID";
            $rolResult = $conn->query($rolQuery);
            
            if ($rolResult && $rolResult->num_rows == 1) {
                $rolRow = $rolResult->fetch_assoc();
                $rol = $rolRow['Tipo_Rol'];
                
                // Almacenar los datos del usuario en las variables de sesión
                $_SESSION['nombreCompleto'] = $nombreCompleto;
                $_SESSION['rol'] = $rol;
                
                echo "<script>
                        var rol = '" . $rol . "';
                        var mensaje = 'Inicio de sesión exitoso. ¡Bienvenido, " . $nombreCompleto . "! Tu rol es: ' + rol;
                        
                        switch (rol) {
                            case 'Cliente':
                                mensaje += '. Serás redirigido a la página de cliente.';
                                window.location.href = '../10 Tienda/Tienda.html';
                                break;
                            case 'Administrador':
                                mensaje += '. Serás redirigido a la página de administrador.';
                                window.location.href = '../8 Administracion Pqrs/index.html';
                                break;
                            case 'Gerente':
                                mensaje += '. Serás redirigido a la página de gerente.';
                                window.location.href = '../11 Login Administrador/Registro Ventas.html';
                                break;
                            case 'Publicista':
                                mensaje += '. Serás redirigido a la página de publicista.';
                                window.location.href = 'interfaz_publicista.php';
                                break;
                            case 'Vendedor':
                                mensaje += '. Serás redirigido a la página de vendedor.';
                                window.location.href = '../11 Login Administrador/Registro Ventas.html';
                                break;
                            case 'Proveedor':
                                mensaje += '. Serás redirigido a la página de proveedor.';
                                window.location.href = 'interfaz_proveedor.php';
                                break;
                            case 'Almacenista':
                                    mensaje += '. Serás redirigido a la página de Provedores.';
                                    window.location.href = '../11 Login Administrador/Registro Ventas.html';
                                    break;
                            default:
                                mensaje += '. No se encontró un rol válido.';
                                break;
                        }
                        
                        alert(mensaje);
                      </script>";
            } else {
                echo "<script>
                        alert('Inicio de sesión exitoso. ¡Bienvenido, " . $nombreCompleto . "!'); 
                        window.location.href = 'Login.html';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Inicio de sesión exitoso. ¡Bienvenido!');
                    window.location.href = 'Login.html';
                  </script>";
        }
    } else {
        $mensaje = "Credenciales inválidas. Acceso denegado.";
        echo "<script>
                alert('$mensaje');
                window.location.href = 'Login.html';
              </script>";
    }
} else {
    echo "Error en la consulta: " . $conn->error; // Mensaje de error en la consulta
}

$conn->close();
?>
