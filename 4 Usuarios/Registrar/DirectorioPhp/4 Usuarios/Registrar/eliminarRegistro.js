function eliminarRegistro() {
  var id = prompt("Ingrese el número de cédula a eliminar:");

  if (id) {
    // Realizar una solicitud AJAX al servidor para obtener la información del registro
    // Reemplaza 'URL_DEL_SERVIDOR' con la URL de tu script PHP que obtiene la información del registro
    var url = 'http://localhost/DirectorioPhp/4%20Usuarios/Registrar/consulta_registro.php?id=' + encodeURIComponent(id);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var registro = JSON.parse(xhr.responseText);
          if (registro) {
            // Mostrar una ventana emergente con la información del registro
            var mensaje = ("Información del registro:\n\n" +
              "ID: " + registro.idPer + "\n" +
              "Nombres: " + registro.nombrePer + "\n" +
              "Apellidos: " + registro.apellidoPer + "\n" +
              "Dirección: " + registro.direccPer + "\n" +
              "Correo electrónico: " + registro.correoPer + "\n" +
              "Número de celular: " + registro.celularPer + "\n" +
              "Genero: " + registro.genero + "\n" +
              "Fecha de nacimiento: " + registro.fecha_nacimiento + "\n" +
              "Número de usuario: " + registro.numero_usuario + "\n" +
              "Contraseña: " + registro.contraseña + "\n" +
              "Estado de registro: " + registro.estado + "\n" +
              "Fecha de registro: " + registro.reg_date + "\n\n");

            var confirmacion = confirm(mensaje + "¿Desea eliminar este registro?");

            if (confirmacion) {
              // Realizar una solicitud AJAX al servidor para eliminar el registro
              // Reemplaza 'URL_DEL_SERVIDOR' con la URL de tu script PHP que elimina el registro
              var eliminarUrl = 'http://localhost/DirectorioPhp/4%20Usuarios/Registrar/eliminar_registro.php?id=' + encodeURIComponent(id);
              var eliminarXhr = new XMLHttpRequest();
              eliminarXhr.onreadystatechange = function() {
                if (eliminarXhr.readyState === XMLHttpRequest.DONE) {
                  if (eliminarXhr.status === 200) {
                    alert("Registro eliminado correctamente.");
                    // Actualizar la página o realizar cualquier otra acción necesaria después de eliminar el registro
                    // Por ejemplo, puedes redirigir al usuario a una página de confirmación o recargar la página actual
                    location.reload();
                  } else {
                    alert("Error al eliminar el registro. Por favor, inténtelo nuevamente.");
                  }
                }
              };
              eliminarXhr.open('GET', eliminarUrl, true);
              eliminarXhr.send();
            } else {
              alert("Eliminación cancelada.");
            }
          } else {
            alert("No se encontró ningún registro con el ID especificado.");
          }
        } else {
          alert("Error al realizar la consulta. Por favor, inténtelo nuevamente.");
        }
      }
    };
    xhr.open('GET', url, true);
    xhr.send();
  }
}
