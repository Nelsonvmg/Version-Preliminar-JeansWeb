<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener el ID del registro a consultar
$id = $_POST['Numero_Documento'];

// Consultar el registro
$sql = "SELECT * FROM RegistroUsuarios WHERE Numero_Documento = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    // Extraer los valores de la fila en variables individuales
    $tipoDocumento = $fila['Tipo_Documento'];
    $numeroDocumento = $fila['Numero_Documento'];
    $nombres = $fila['Nombres'];
    $apellidoPaterno = $fila['Apellido_Paterno'];
    $apellidoMaterno = $fila['Apellido_Materno'];
    $edad = $fila['Edad'];
    $direccion = $fila['Direccion'];
    $email1 = $fila['Email_1'];
    $email2 = $fila['Email_2'];
    $telefonoCelular1 = $fila['Telefono_Celular_1'];
    $telefonoCelular2 = $fila['Telefono_Celular_2'];
    $tipoRol = $fila['Tipo_Rol'];
    $usuario = $fila['Usuario'];
    $password = $fila['Contraseña'];
    $Estado= $fila['Estado'];

    // Mostrar los datos en un formulario editable
    echo ' 
    <h2>Formulario de Actualización</h2>
    <form action="RegistroActualizar.php" method="post">
        <label>Tipo de Documento:</label>
        <select name="Tipo_Documento" required>
            <option value="C.C."' . ($tipoDocumento == 'C.C.' ? ' selected' : '') . '>C.C.</option>
            <option value="C.C. Extranjera"' . ($tipoDocumento == 'C.C. Extranjera' ? ' selected' : '') . '>C.C. Extranjera</option>
            <option value="Pasaporte"' . ($tipoDocumento == 'Pasaporte' ? ' selected' : '') . '>Pasaporte</option>
            <option value="NIT"' . ($tipoDocumento == 'NIT' ? ' selected' : '') . '>NIT</option>
        </select><br>

        <label>Número de Documento:</label>
        <input type="text" name="Numero_Documento" value="'.$numeroDocumento.'" readonly><br>

        <label>Nombres:</label>
        <input type="text" name="Nombre_Persona" value="'.$nombres.'"><br>

        <label>Apellido Paterno:</label>
        <input type="text" name="Apellido_Paterno" value="'.$apellidoPaterno.'"><br>

        <label>Apellido Materno:</label>
        <input type="text" name="Apellido_Materno" value="'.$apellidoMaterno.'"><br>

        <label>Edad:</label>
        <input type="text" name="Edad" value="'.$edad.'"><br>

        <label>Dirección:</label>
        <input type="text" name="Direccion" value="'.$direccion.'"><br>

        <label>Email 1:</label>
        <input type="text" name="Email_1" value="'.$email1.'"><br>

        <label>Email 2:</label>
        <input type="text" name="Email_2" value="'.$email2.'"><br>

        <label>Teléfono Celular 1:</label>
        <input type="text" name="Telefono_celular_1" value="'.$telefonoCelular1.'"><br>

        <label>Teléfono Celular 2:</label>
        <input type="text" name="Telefono_celular_2" value="'.$telefonoCelular2.'"><br>

        <label>Tipo de Rol:</label>
        <select name="Tipo_Rol" required>
            <option value="Administrador"' . ($tipoRol == 'Administrador' ? ' selected' : '') . '>Administrador</option>
            <option value="Cliente"' . ($tipoRol == 'Cliente' ? ' selected' : '') . '>Cliente</option>
            <option value="Vendedor"' . ($tipoRol == 'Vendedor' ? ' selected' : '') . '>Vendedor</option>
            <option value="Almacenista"' . ($tipoRol == 'Almacenista' ? ' selected' : '') . '>Almacenista</option>
            <option value="Gerente"' . ($tipoRol == 'Gerente' ? ' selected' : '') . '>Gerente</option>
            <option value="Publicista"' . ($tipoRol == 'Publicista' ? ' selected' : '') . '>Publicista</option>
            <option value="Proveedor"' . ($tipoRol == 'Proveedor' ? ' selected' : '') . '>Proveedor</option>
        </select><br>

        <label>Usuario:</label>
        <input type="text" name="Usuario" value="'.$usuario.'"><br>

        <label>Contraseña:</label>
        <input type="text" name="Password" value="'.$password.'"><br>

        <label>Estado:</label>
        <select name="Estado" required>
            <option value="Activo"' . ($Estado == 'Activo' ? ' selected' : '') . '>Activo</option>
            <option value="Inactivo"' . ($Estado == 'Inactivo' ? ' selected' : '') . '>Inactivo</option>
        </select><br>

        <input type="submit" value="Actualizar">
    </form>
';
    
} else {    
    echo '<script>alert("No se encontraron resultados."); window.close();</script>';
}

// Cerrar la conexión
$conn->close();
?>
