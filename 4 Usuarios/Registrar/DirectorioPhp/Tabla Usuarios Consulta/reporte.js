function generarPDF(data) {
  // Convertir los datos JSON en un array
  var personas = JSON.parse(data);

  // Crear una cadena de texto con los datos de las personas
  var texto = '';
  personas.forEach(function(persona) {
    texto += 'ID: ' + persona.idPer + '\n';
    texto += 'Nombres: ' + persona.nombrePer + '\n';
    texto += 'Apellidos: ' + persona.apellidoPer + '\n';
    texto += 'Dirección: ' + persona.direccPer + '\n';
    texto += 'Correo: ' + persona.correoPer + '\n';
    texto += 'Teléfono: ' + persona.celularPer + '\n';
    texto += 'Género: ' + persona.genero + '\n';
    texto += 'Fecha de Nacimiento: ' + persona.fecha_nacimiento + '\n';
    texto += 'Número de Usuario: ' + persona.numero_usuario + '\n';
    texto += 'Contraseña: ' + persona.contraseña + '\n';
    texto += 'Fecha de Registro: ' + persona.reg_date + '\n';
    texto += 'Estado: ' + persona.estado + '\n\n';
  });

  // Crear un elemento <a> y establecer los atributos para descargar el archivo
  var a = document.createElement('a');
  a.href = 'data:application/octet-stream,' + encodeURIComponent(texto);
  a.download = 'reporte.txt';

  // Simular el clic en el enlace para iniciar la descarga del archivo
  a.click();
}

function generarReporte() {
  // Realizar una petición AJAX para obtener los datos de la tabla
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Llamar a la función "generarPDF()" y pasar los datos obtenidos
      generarPDF(this.responseText);
    }
  };
  xmlhttp.open('GET', 'generar_reporte.php', true);
  xmlhttp.send();
}