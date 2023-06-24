document.getElementById('show-registration-form').addEventListener('click', function() {
    var registrationForm = document.getElementById('registration-form');
    registrationForm.classList.toggle('show');
  });
  
  document.getElementById('registration-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que se envíe el formulario y se recargue la página
  
    // Obtiene los valores ingresados por el usuario
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
  
    // Crea un objeto con los datos del registro
    var registrationData = {
      name: name,
      email: email,
      password: password
    };
  
    // Muestra los datos en el área designada dentro del formulario
    var registrationDataElement = document.getElementById('registration-data');
    registrationDataElement.innerHTML = `
      <h3>Datos de Registro:</h3>
      <p><strong>Nombre:</strong> ${registrationData.name}</p>
      <p><strong>Correo Electrónico:</strong> ${registrationData.email}</p>
      <p><strong>Contraseña:</strong> ${registrationData.password}</p>
    `;
  });
  