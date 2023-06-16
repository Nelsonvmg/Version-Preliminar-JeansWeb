function consultarRegistro() {
  var id = prompt("Ingrese el número ID a consultar:");
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
  alert(mensaje);
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