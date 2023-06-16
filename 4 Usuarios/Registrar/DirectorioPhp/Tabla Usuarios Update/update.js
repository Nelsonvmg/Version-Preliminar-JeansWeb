// Obtener referencia al botón "Guardar"
const guardarBtn = document.getElementById('guardarBtn');

// Agregar evento de clic al botón "Guardar"
guardarBtn.addEventListener('click', guardarCambios);

// Función para guardar los cambios
function guardarCambios() {
  // Obtener todas las filas de la tabla
  const rows = document.querySelectorAll('#tablaUsuarios tbody tr');
  
  // Iterar sobre las filas y obtener los datos editados
  rows.forEach(row => {
    // Obtener los campos editables de la fila
    const nombreCell = row.querySelector('td:nth-child(2)');
    const apellidoCell = row.querySelector('td:nth-child(3)');
    const direccionCell = row.querySelector('td:nth-child(4)');
    const correoCell = row.querySelector('td:nth-child(5)');
    const celularCell = row.querySelector('td:nth-child(6)');
    const generoCell = row.querySelector('td:nth-child(7)');
    const fechaNacimientoCell = row.querySelector('td:nth-child(8)');
    const contraseñaCell = row.querySelector('td:nth-child(10)');
    const estadoCell = row.querySelector('td:nth-child(12)');
    
    // Obtener el ID de la fila
    const id = row.querySelector('td:first-child').textContent;
    
    // Obtener los valores editados
    const nombre = nombreCell.textContent;
    const apellido = apellidoCell.textContent;
    const direccion = direccionCell.textContent;
    const correo = correoCell.textContent;
    const celular = celularCell.textContent;
    const genero = generoCell.textContent;
    const fechaNacimiento = fechaNacimientoCell.textContent;
    const contraseña = contraseñaCell.textContent;
    const estado = estadoCell.textContent;
    
    // Enviar los datos al servidor para actualizarlos en la base de datos
    actualizarDatos(id, nombre, apellido, direccion, correo, celular, genero, fechaNacimiento, contraseña, estado);
  });
}

// Función para actualizar los datos en el servidor
function actualizarDatos(id, nombre, apellido, direccion, correo, celular, genero, fechaNacimiento, contraseña, estado) {
  const formData = new FormData();
  formData.append('id', id);
  formData.append('nombre', nombre);
  formData.append('apellido', apellido);
  formData.append('direccion', direccion);
  formData.append('correo', correo);
  formData.append('celular', celular);
  formData.append('genero', genero);
  formData.append('fecha_nacimiento', fechaNacimiento);
  formData.append('contraseña', contraseña);
  formData.append('estado', estado);

  fetch('./update_data.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(result => {
      console.log(result);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
