function deshabilitarRegistro() {
    var id = prompt("Ingrese el número ID del registro a actualizar:");
  
    if (id) {
      // Realizar una solicitud AJAX al servidor para obtener la información del registro a actualizar
      // Reemplaza 'URL_DEL_SERVIDOR' con la URL de tu script PHP que consulta el registro
      var url = 'http://localhost/DirectorioPhp/4%20Usuarios/Registrar/consulta_registro.php?id=' + encodeURIComponent(id);
      var xhr = new XMLHttpRequest();
  
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var registro = JSON.parse(xhr.responseText);
  
            if (registro) {
              var formulario = `
  <style>
    .F1 {
      background-color: #a09b9b;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-family: Arial, sans-serif;
    }
    
    .F1 label {
      display: block;
      margin-bottom: 5px;
    }
    
    .F1 input[type="text"],
    .F1 input[type="email"],
    .F1 input[type="password"],
    .F1 select {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    .F1 button[type="submit"] {
      display: inline-block;
      padding: 12px 24px;
      background-color: #ff0000;
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      font-weight: bold;
      border-radius: 100px;
      margin-top: 30px;
      transition: background-color 0.3s ease;
    }
    
    .F1 button[type="submit"]:hover {
      background-color: #0B5ED7;
      color: #fff;
    }
  </style>
  <div class="F1"> 
    <form id="formulario-actualizacion">                
      <label for="nombre">Nombres:</label>
      <input type="text" id="nombre" name="nombre" value="${registro.nombrePer}">
      <br>
      <label for="apellido">Apellidos:</label>
      <input type="text" id="apellido" name="apellido" value="${registro.apellidoPer}">
      <br>      
<select id="estado" name="estado">
  <option value="Activo" ${registro.estado === 'Activo' ? 'selected' : ''}>Activo</option>
  <option value="Inactivo" ${registro.estado === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
</select>
<br>
<button type="submit">Actualizar</button>
</form>
</div>
`;
  
              // Mostrar la ventana emergente con el formulario
              var ventanaEmergente = window.open("", "Actualizar Registro", "width=300,height=300");
              ventanaEmergente.document.write(formulario);
  
              // Manejar el evento de envío del formulario
ventanaEmergente.document.getElementById("formulario-actualizacion").addEventListener("submit", function(event) {
  event.preventDefault();

  // Obtener los nuevos valores del formulario
  var nuevoNombre = ventanaEmergente.document.getElementById("nombre").value;
  var nuevoApellido = ventanaEmergente.document.getElementById("apellido").value; 
  var nuevoEstado = ventanaEmergente.document.getElementById("estado").value;

  // Realizar una solicitud AJAX al servidor para actualizar el registro
  // Reemplaza 'URL_DEL_SERVIDOR' con la URL de tu script PHP que actualiza el registro
  var actualizarURL = 'http://localhost/DirectorioPhp/4%20Usuarios/Registrar/deshabilitar_registro.php';
  var actualizarXHR = new XMLHttpRequest();
  actualizarXHR.open("POST", actualizarURL, true);
  actualizarXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  actualizarXHR.onreadystatechange = function() {
    if (actualizarXHR.readyState === XMLHttpRequest.DONE) {
      if (actualizarXHR.status === 200) {
        alert(actualizarXHR.responseText);
        ventanaEmergente.close();
      } else {
        alert("Error al actualizar el registro.");
      }
    }
  };
  actualizarXHR.send("id=" + encodeURIComponent(id) +
    "&nombre=" + encodeURIComponent(nuevoNombre) +
    "&apellido=" + encodeURIComponent(nuevoApellido) +    
    "&estado=" + encodeURIComponent(nuevoEstado));
});
            } else {
              alert("No se encontró ningún registro con el ID proporcionado.");
            }
          } else {
            alert("Error al obtener la información del registro.");
          }
        }
      };
      xhr.open("GET", url, true);
      xhr.send();
    }
  }
    