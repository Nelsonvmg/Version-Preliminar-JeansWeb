<?php

include '../0 Conexión Global BD/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoDocumento = $_POST["Tipo_Documento"];
    $numeroDocumento = $_POST["ID_Persona"];
    $nombres = $_POST["Nombre_Persona"];
    $apellidoPaterno = $_POST["Apellido_Paterno"];
    $apellidoMaterno = $_POST["Apellido_Materno"];
    $edad = $_POST["Edad"];
    $direccion = $_POST["Direccion"];
    $email1 = $_POST["Email"];
    $email2 = $_POST["Email_2"];
    $celular = $_POST["Telefono_celular"];
    $telefonoFijo = $_POST["Telefono_celular_2"];
    $usuario = $_POST["Usuario"];
    $password = $_POST["Password"];

    // Verificar si el número de usuario ya está registrado
    $queryVerificarUsuario = "SELECT ID_Persona FROM persona WHERE Usuario = '$usuario'";
    $resultVerificarUsuario = $conn->query($queryVerificarUsuario);

    if ($resultVerificarUsuario && $resultVerificarUsuario->num_rows > 0) {
        // El número de usuario ya está registrado, muestra un mensaje de error
        echo "<script>
            alert('El número de usuario ya está registrado. Por favor, elige otro número de usuario.');
            window.location.href = '###';
        </script>";
    } else {
        // Insertar en la tabla "persona"
        $queryPersona = "INSERT INTO persona (
            ID_Persona,
            Nombre_Persona,
            Apellido_Paterno,
            Apellido_Materno,
            Tipo_Documento,
            Edad,
            Direccion,
            Usuario,
            Password
        ) VALUES (
            '$numeroDocumento', 
            '$nombres', 
            '$apellidoPaterno', 
            '$apellidoMaterno', 
            '$tipoDocumento', 
            '$edad', 
            '$direccion', 
            '$usuario', 
            '$password'
        )";

        $personaInserted = $conn->query($queryPersona);

        // Verificar si se insertó el registro en la tabla "persona" correctamente
        if ($personaInserted) {
            // Insertar en la tabla "correo"
            $queryCorreo = "INSERT INTO correo (
                Persona_ID_Persona, 
                Email, 
                Email_2
            ) VALUES (
                '$numeroDocumento', 
                '$email1', 
                '$email2'
            )";
            $correoInserted = $conn->query($queryCorreo);

            // Verificar si se insertó el registro en la tabla "correo" correctamente
            if ($correoInserted) {
                // Insertar en la tabla "telefono"
                $queryTelefono = "INSERT INTO telefono (
                    Persona_ID_Persona, 
                    Telefono_Celular, 
                    Telefono_Celular_2
                ) VALUES (
                    '$numeroDocumento', 
                    '$celular', 
                    '$telefonoFijo'
                )";
                $telefonoInserted = $conn->query($queryTelefono);

                if ($telefonoInserted) {
                    // Insertar en la tabla "cliente"
                    $queryCliente = "INSERT INTO cliente (
                        Persona_ID_Persona
                    ) VALUES (
                        '$numeroDocumento'
                    )";
                    $clienteInserted = $conn->query($queryCliente);

                    if ($clienteInserted) {
                        // Obtener el ID_Cliente generado por la inserción en la tabla "cliente"
                        $idCliente = $conn->insert_id;

                        // Insertar en la tabla "id_persona_has_cliente"
                        $queryIdPersonaHasCliente = "INSERT INTO id_persona_has_cliente (
                            ID_Persona_ID_Persona,
                            Cliente_ID_Cliente
                        ) VALUES (
                            '$numeroDocumento',
                            '$idCliente'
                        )";
                        $idPersonaHasClienteInserted = $conn->query($queryIdPersonaHasCliente);

                        if ($idPersonaHasClienteInserted) {
                            // Verificar si la persona es cliente y asignar el ID_Tipo_Rol correspondiente
                            $queryTipoRol = "SELECT ID_Tipo_Rol FROM tipo_rol WHERE Tipo_Rol = 'Cliente'";
                            $resultTipoRol = $conn->query($queryTipoRol);

                            if ($resultTipoRol && $resultTipoRol->num_rows > 0) {
                                $rowTipoRol = $resultTipoRol->fetch_assoc();
                                $idTipoRol = $rowTipoRol["ID_Tipo_Rol"];

                                // Insertar en la tabla "persona_has_tipo_rol"
                                $queryPersonaHasTipoRol = "INSERT INTO persona_has_tipo_rol (
                                    Persona_ID_Persona,
                                    Tipo_Rol_ID_Tipo_Rol
                                ) VALUES (
                                    '$numeroDocumento',
                                    '$idTipoRol'
                                )";
                                $personaHasTipoRolInserted = $conn->query($queryPersonaHasTipoRol);

                                if ($personaHasTipoRolInserted) {
                                    // Todos los datos se insertaron correctamente
                                    echo "<script>
                                        alert('Datos guardados correctamente.');
                                        window.location.href = '###';
                                    </script>";
                                } else {
                                    // Error al insertar en la tabla "persona_has_tipo_rol"
                                    echo "<script>
                                        alert('Error al guardar los datos.');
                                        window.location.href = '###';
                                    </script>";
                                }
                            } else {
                                // No se encontró el ID_Tipo_Rol para el rol "Cliente"
                                echo "<script>
                                    alert('Error al guardar los datos.');
                                    window.location.href = '###';
                                </script>";
                            }
                        } else {
                            // Error al insertar en la tabla "id_persona_has_cliente"
                            echo "<script>
                                alert('Error al guardar los datos.');
                                window.location.href = '###';
                            </script>";
                        }
                    } else {
                        // Error al insertar en la tabla "cliente"
                        echo "<script>
                            alert('Error al guardar los datos.');
                            window.location.href = '###';
                        </script>";
                    }
                } else {
                    // Error al insertar en la tabla "telefono"
                    echo "<script>
                        alert('Error al guardar los datos.');
                        window.location.href = '###';
                    </script>";
                }
            } else {
                // Error al insertar en la tabla "correo"
                echo "<script>
                    alert('Error al guardar los datos.');
                    window.location.href = '###';
                </script>";
            }
        } else {
            // Error al insertar en la tabla "persona"
            echo "<script>
                alert('Error al guardar los datos.');
                window.location.href = '###';
            </script>";
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
