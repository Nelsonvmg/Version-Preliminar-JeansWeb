document.addEventListener('DOMContentLoaded', () => {
// Realizar una petición GET al archivo fetch_data.php
fetch('./fetch_data.php') 
  .then(response => response.json()) // Convertir la respuesta a JSON
  .then(data => {  
    
    // Aquí puedes procesar los datos obtenidos y agregar las filas a la tabla en index.html
    const tableBody = document.querySelector('tbody'); // Obtener la referencia al cuerpo de la tabla

    // Iterar sobre los datos obtenidos y crear las filas de la tabla dinámicamente
    data.forEach(row => {
      const newRow = document.createElement('tr');      
      
    // Crear las celdas y asignar los valores correspondientes
const idCell = document.createElement('td');
idCell.textContent = row.idPer;
newRow.appendChild(idCell);

const nombreCell = document.createElement('td');
nombreCell.textContent = row.nombrePer;
nombreCell.setAttribute('contenteditable', 'true');
newRow.appendChild(nombreCell);

const apellidoCell = document.createElement('td');
apellidoCell.textContent = row.apellidoPer;
apellidoCell.setAttribute('contenteditable', 'true');
newRow.appendChild(apellidoCell);

const direccionCell = document.createElement('td');
direccionCell.textContent = row.direccPer;
direccionCell.setAttribute('contenteditable', 'true');
newRow.appendChild(direccionCell);

const correoCell = document.createElement('td');
correoCell.textContent = row.correoPer;
correoCell.setAttribute('contenteditable', 'true');
newRow.appendChild(correoCell);

const celularll = document.createElement('td');
celularll.textContent = row.celularPer;
celularll.setAttribute('contenteditable', 'true');
newRow.appendChild(celularll);

const generoll = document.createElement('td');
generoll.textContent = row.genero;
generoll.setAttribute('contenteditable', 'true');
newRow.appendChild(generoll);

const fechaNacimientoCell = document.createElement('td');
fechaNacimientoCell.textContent = row.fecha_nacimiento;
fechaNacimientoCell.setAttribute('contenteditable', 'true');
newRow.appendChild(fechaNacimientoCell);

const numeroUsuarioCell = document.createElement('td');
numeroUsuarioCell.textContent = row.numero_usuario;
newRow.appendChild(numeroUsuarioCell);

const contraseñaCell = document.createElement('td');
contraseñaCell.textContent = row.contraseña;
contraseñaCell.setAttribute('contenteditable', 'true');
newRow.appendChild(contraseñaCell);

const regDateCell = document.createElement('td');
regDateCell.textContent = row.reg_date;
newRow.appendChild(regDateCell);

const estadoCell = document.createElement('td');
estadoCell.textContent = row.estado;
estadoCell.setAttribute('contenteditable', 'true');
newRow.appendChild(estadoCell);

      // Repetir el proceso para las demás columnas

      // Agregar la fila a la tabla
      tableBody.appendChild(newRow);
    });
  })
  .catch(error => {
    // Manejar cualquier error que ocurra durante la petición
    console.error('Error:', error);
  });

});
