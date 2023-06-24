function registrar() {
  // Obtiene las dimensiones de la ventana del navegador
  var anchoVentana = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  var altoVentana = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

  // Calcula las dimensiones de la ventana emergente
  var anchoEmergente = 400; // Ancho deseado de la ventana emergente
  var altoEmergente = 300; // Alto deseado de la ventana emergente

  var left = (anchoVentana - anchoEmergente) / 2;
  var top = (altoVentana - altoEmergente) / 2;

  // Abre la ventana emergente en el centro de la pantalla
  var ventanaEmergente = window.open("", "Registro", "width=" + anchoEmergente + ", height=" + altoEmergente + ", left=" + left + ", top=" + top);

  // Crea el contenido del formulario dentro de la ventana emergente
  var contenidoFormulario = `
    <h2>Formulario de Registro</h2>
    <form>
      <!-- Aquí puedes agregar los campos del formulario -->
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <input type="submit" value="Registrarse">
    </form>
  `;

  // Inserta el contenido del formulario en la ventana emergente
  ventanaEmergente.document.write(contenidoFormulario);
}
