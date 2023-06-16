// Función para agregar una fila a la tabla
function addTableRow(row, tableBody) {
  const newRow = document.createElement('tr');

  // Crear las celdas y asignar los valores correspondientes
  const idCell = document.createElement('td');
  idCell.textContent = row.idPer;
  newRow.appendChild(idCell);

  const nombreCell = document.createElement('td');
  nombreCell.textContent = row.nombrePer;
  nombreCell.setAttribute('contenteditable', 'true');
  newRow.appendChild(nombreCell);

  // Repetir el proceso para las demás columnas

  // Agregar la fila a la tabla
  tableBody.appendChild(newRow);
}

document.addEventListener('DOMContentLoaded', () => {
  // Obtener referencia al cuerpo de la tabla
  const tableBody = document.querySelector('tbody');

  // Realizar una petición GET al archivo fetch_data.php
  fetch('.fetch_data.php')
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
      // Iterar sobre los datos obtenidos y agregar las filas a la tabla
      data.forEach(row => {
        addTableRow(row, tableBody);
      });

      // Obtener referencia al campo de filtro
      const filtroInput = document.getElementById('filtroInput');

      // Agregar evento de entrada al campo de filtro
      filtroInput.addEventListener('input', () => {
        const filtroValue = filtroInput.value.toLowerCase();

        // Limpiar la tabla antes de agregar las filas filtradas
        tableBody.innerHTML = '';

        // Filtrar los datos basados en el valor del campo de filtro
        data.forEach(row => {
          if (row.nombrePer.toLowerCase().includes(filtroValue)) {
            addTableRow(row, tableBody);
          }
          // Agregar más condiciones si deseas filtrar por otras columnas
        });
      });
    })
    .catch(error => {
      // Manejar cualquier error que ocurra durante la petición
      console.error('Error:', error);
    });
});
