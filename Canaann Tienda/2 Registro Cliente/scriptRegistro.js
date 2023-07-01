function scriptRegistro() {
  var formulario = `
  <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
  .btn {
    background-color: #ff0000;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #0069d9;
  }
  </style>
</head>
<body>
  <div class="container">
    <h2>Formulario de Registro</h2>
    <form id="registroForm">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Tipo_Documento">Tipo de Documento:</label>
            <select name="Tipo_Documento" id="Tipo_Documento" class="form-control" required>
              <option value="">Seleccionar</option>
              <option value="CC">Cédula de Ciudadanía</option>
              <option value="CC_Extra">Cédula de Extranjería</option>
              <option value="Pasaporte">Pasaporte</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="ID_Persona">Número de Documento:</label>
            <input type="text" name="ID_Persona" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 12345678" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Usuario">Confirmar Número de Documento:</label>
            <input type="text" name="Usuario" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 12345678" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Password">Contraseña:</label>
            <div class="input-group">
            <input type="password" id="passwordInput" name="Password" class="form-control" placeholder="Ejemplo: A1234*" required>
            <button type="button" id="togglePasswordButton" class="btn btn-danger red-button" onclick="togglePasswordVisibility()">Mostrar/Ocultar</button>
          </div>
          </div>
          <div id="passwordStrength" class="mt-2"></div>
        </div>
  
        <div class="col-md-6">
          <div class="form-group">
            <label for="Nombre_Persona">Nombres:</label>
            <input type="text" name="Nombre_Persona" class="form-control" placeholder="Ejemplo: Juan Pablo" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Apellido_Paterno">Primer Apellido:</label>
            <input type="text" name="Apellido_Paterno" class="form-control" placeholder="Ejemplo: Pérez" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Apellido_Materno">Segundo Apellido:</label>
            <input type="text" name="Apellido_Materno" class="form-control" placeholder="Ejemplo: Gómez">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Edad">Edad Actual:</label>
            <input type="text" name="Edad" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 20" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Direccion">Dirección Residencial:</label>
            <input type="text" name="Direccion" class="form-control" placeholder="Ejemplo: Dg 45 Este #35-78" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Email">Email 1:</label>
            <div class="input-group">
            <input type="text" id="emailInput" name="Email" class="form-control" placeholder="Ejemplo: juanpablo1@" required>
            <button type="button" id="togglePasswordButton" class="btn btn-danger red-button" onclick="validateEmail()">Validar</button>
          </div>
        </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Email_2">Email 2:</label>
            <div class="input-group">
            <input type="text" id="emailInput2" name="Email_2" class="form-control" placeholder="Ejemplo: pablojuan21@">
            <button type="button" id="togglePasswordButton" class="btn btn-danger red-button" onclick="validateEmail2()">Validar</button>            
          </div>
        </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="Telefono_celular">Número de Celular:</label>
            <input type="text" name="Telefono_celular" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 3137777777" required>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group">
            <label for="Telefono_celular_2">Número Fijo:</label>
            <input type="text" name="Telefono_celular_2" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ejemplo: 6017777777">
          </div>
        </div>

      <div id="successMessage"></div>
  
      <div class="col-md-6">
        <div class="form-group">
          <button type="submit" class="btn btn-danger red-button" class="btn btn-block btn-danger">Registrarse</button>
        </div>
      </div>      

  <!-- Inicio estructura de control para los datos de registro PHP -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Inicio estructura de control para los datos de registro PHP -->
  <script>
    document.getElementById("registroForm").addEventListener("submit", function(event) {
      event.preventDefault();
      var emailInput = document.getElementById('emailInput');
      var email = emailInput.value;
      var emailInput2 = document.getElementById('emailInput2');
      var email2 = emailInput2.value;

      if (email.includes('@') && email2.includes('@')) {    
        var formData = $(this).serialize();
        $.ajax({
          url: "http://localhost/Canaann%20Tienda/2%20Registro%20Cliente/registrar.php",
          type: "POST",
          data: formData,
          success: function(response) {
        alert('¡Registro exitoso!');
          },
          error: function(xhr, status, error) {
            // Manejar el error en caso de fallo en la solicitud
          }
        });
      } else {
        alert('Por favor, ingresa un email válido que contenga el carácter "@".');
      }
    });
  </script>
  <!-- Fin estructura de control para los datos de registro PHP -->

  <!-- Inicio para validar correos -->
  <script>
    function validateEmail() {
      var emailInput = document.getElementById('emailInput');
      var email = emailInput.value;

      if (email.includes('@')) {
        alert('El email es válido.');
      } else {
        alert('Por favor, ingresa un email válido que contenga el carácter "@".');
      }
    }

    function validateEmail2() {
      var emailInput2 = document.getElementById('emailInput2');
      var email = emailInput2.value;

      if (email.includes('@')) {
        alert('El email es válido.');
      } else {
        alert('Por favor, ingresa un email válido que contenga el carácter "@".');
      }
    }    
  </script>
  <!-- Fin para validar correos -->  
 
  <!-- Inicio de nivel de seguridad y mostrar contraseña -->
  <script>
    function checkPasswordStrength() {
      var passwordInput = document.getElementById('passwordInput');
      var passwordStrength = document.getElementById('passwordStrength');

      var password = passwordInput.value;
      var strength = '';

      if (password.length >= 8) {
        strength = 'Fuerte';
      } else if (password.length >= 6) {
        strength = 'Moderada';
      } else {
        strength = 'Débil';
      }

      passwordStrength.textContent = 'Nivel de seguridad: ' + strength;
    }

    var passwordInput = document.getElementById('passwordInput');
    passwordInput.addEventListener('input', checkPasswordStrength);

    function togglePasswordVisibility() {
      var passwordInput = document.getElementById('passwordInput');
      var toggleButton = document.getElementById('togglePasswordButton');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Ocultar';
      } else {
        passwordInput.type = 'password';
        toggleButton.textContent = 'Mostrar';
      }
    }
  </script>
  <!-- Fin de nivel de seguridad y mostrar contraseña -->
</body>
</html> 
  `;
  
  var ventanaWidth = 800;
    var ventanaHeight = 500;
    var ventanaLeft = (window.innerWidth - ventanaWidth) / 2;
    var ventanaTop = (window.innerHeight - ventanaHeight) / 2;
  
    var ventanaEmergente = window.open("", "registrar", "width=" + ventanaWidth + ",height=" + ventanaHeight + ",left=" + ventanaLeft + ",top=" + ventanaTop);
    ventanaEmergente.document.write(formulario);
    ventanaEmergente.document.documentElement.style.zoom = "75%";
}

// Llamar a la función para abrir la ventana emergente
abrirVentanaEmergente();
