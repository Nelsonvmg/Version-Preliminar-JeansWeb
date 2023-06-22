<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    /* Estilos personalizados */
    .container {
      background-color: #f5f5f5;
      padding: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

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
  <script>
    function scriptLogin() {
      var formulario = `
        <div class="container">
          <form>
            <div class="form-group">
              <label for="username">Nombre de usuario:</label>
              <input type="text" id="username" name="username" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn">Iniciar sesión</button>
          </form>
        </div>
      `;

      var ventanaWidth = 200;
      var ventanaHeight = 300;
      var ventanaLeft = (window.innerWidth - ventanaWidth) / 2;
      var ventanaTop = (window.innerHeight - ventanaHeight) / 2;

      var ventanaEmergente = window.open("", "registrar", "width=" + ventanaWidth + ",height=" + ventanaHeight + ",left=" + ventanaLeft + ",top=" + ventanaTop);
      ventanaEmergente.document.write(formulario);
    }

    // Llamar a la función para abrir la ventana emergente
    scriptLogin();
  </script>
</body>
</html>
