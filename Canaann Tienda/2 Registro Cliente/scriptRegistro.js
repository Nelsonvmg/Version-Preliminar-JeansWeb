function registrar() {
  // Obtiene las dimensiones de la ventana del navegador
  var anchoVentana = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  var altoVentana = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

  // Calcula las dimensiones de la ventana emergente
  var anchoEmergente = 400; // Ancho deseado de la ventana emergente
  var altoEmergente = 400; // Alto deseado de la ventana emergente

  var left = (anchoVentana - anchoEmergente) / 2;
  var top = (altoVentana - altoEmergente) / 2;

  // Abre la ventana emergente en el centro de la pantalla
  // Abre la ventana emergente en el centro de la pantalla con la barra de navegación
var ventanaEmergente = window.open('registrar.php', "Registro", "width=" + anchoEmergente + ", height=" + altoEmergente + ", left=" + left + ", top=" + top + ", location=1");


  // Ajusta el zoom de la ventana emergente al 60%
  ventanaEmergente.document.documentElement.style.zoom = "60%";

  // Crea el contenido del formulario dentro de la ventana emergente
  var contenidoFormulario = `
    <html>
      <head>
        <meta charset="UTF-8">
        <style>
          /* Estilos CSS para el formulario en la ventana emergente */
          h2 {
            color: #333;
            text-align: center;
          }

          form {
            margin: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
          }

          label {
            display: block;
            margin-bottom: 5px;
            color: #333;
          }

          input[type="text"],
          input[type="email"],
          input[type="submit"] {
            width: 50%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
          }

          input[type="submit"] {
            background-color: #ff0000;
            border-radius: 100px;
            border: none;
            color: white;
            cursor: pointer;
          }

          input[type="submit"]:hover {
            background-color: #0B5ED7;
            color: #fff;
          }
        </style>
      </head>
      <body>
      <h2>Formulario de Registro</h2>
      <form onsubmit="return validarFormulario()">
        <div>
          <label for="Tipo_Documento">Tipo de Documento:</label>
          <select id="Tipo_Documento" name="Tipo_Documento" required>
            <option value="">Seleccionar</option>
            <option value="CC">C.C.</option>
            <option value="CC_Extra">C.C. de extranjería</option>
            <option value="Pasaporte">Pasaporte</option>
          </select>
        </div>

        <div>
          <label for="ID_Persona">Número de Documento:</label>
          <input type="text" id="ID_Persona" name="ID_Persona" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 12345678" required>
        </div>

        <div>
          <label for="Nombre_Persona">Nombres:</label>
          <input type="text" id="Nombre_Persona" name="Nombre_Persona" placeholder="Ejemplo: Juan Pablo" required>
        </div>

        <div>
          <label for="Apellido_Paterno">Primer Apellido:</label>
          <input type="text" id="Apellido_Paterno" name="Apellido_Paterno" placeholder="Ejemplo: Pérez" required>
        </div>

        <div>
          <label for="Apellido_Materno">Segundo Apellido:</label>
          <input type="text" id="Apellido_Materno" name="Apellido_Materno" placeholder="Ejemplo: Gómez">
        </div>

        <div>
          <label for="Edad">Edad Actual:</label>
          <input type="text" id="Edad" name="Edad" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 20" required>
        </div>

        <div>
          <label for="Direccion">Dirección Residencial:</label>
          <input type="text" id="Direccion" name="Direccion" placeholder="Ejemplo: Dg 45 Este #35-78*" required>
        </div>

        <div>
          <label for="Email">Email 1:</label>
          <input type="text" id="Email" name="Email" placeholder="Ejemplo: juanpablo1@" required>
        </div>

        <div>
          <label for="Email_2">Email 2:</label>
          <input type="text" id="Email_2" name="Email_2" placeholder="Ejemplo: pablojuan21@">
        </div>

        <div>
          <label for=Telefono_celular">Número de Celular:</label>
          <input type="text" id="Telefono_celular" name="Telefono_celular" placeholder="Ejemplo: 3137777777" required>
        </div>

        <div>
          <label for=Telefono_celular_2">Número Fijo:</label>
          <input type="text" id="Telefono_celular_2" name="Telefono_celular_2" placeholder="Ejemplo: 6017777777">
        </div>

        <div>
          <label for="Usuario">Número de Usuario:</label>
          <input type="text" id="Usuario" name="Usuario" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 12345678" required>
        </div>
        
        <div>
          <label for="Password">Password:</label>
          <input type="password" id="Password" name="Password"  placeholder="Ejemplo: A1234*" required>
        </div>

        <div>
          <input type="checkbox" id="mostrarContraseña">
          <label for="mostrarContraseña">Mostrar contraseña</label>
        </div>

        <div>
          <input type="submit" value="Registrarse">
        </div>
      </form>

      <script>
        var mostrarContraseñaCheckbox = document.getElementById("mostrarContraseña");
        var passwordInput = document.getElementById("Password");

        mostrarContraseñaCheckbox.addEventListener("change", function() {
          if (mostrarContraseñaCheckbox.checked) {
            passwordInput.setAttribute("type", "text");
          } else {
            passwordInput.setAttribute("type", "password");
          }
        });

        function validarFormulario() {
          var idPersona = document.getElementById("ID_Persona").value;
          var usuario = document.getElementById("Usuario").value;

          if (idPersona !== usuario) {
            alert("El número de documento y el número de usuario deben ser iguales. Por favor, verifícalos.");
            return false;
          }

          var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,8}$/;
          if (!passwordRegex.test(password)) {
            alert("La contraseña debe tener entre 6 y 8 caracteres y contener al menos una letra, un número y un carácter especial.");
            return false;
          }
          return true;
        }
      </script>
      </body>
    </html>
  `;

  // Inserta el contenido del formulario en la ventana emergente
  ventanaEmergente.document.write(contenidoFormulario);
}
