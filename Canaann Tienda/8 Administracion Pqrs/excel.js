function exportToExcel() {
  // Obtener la tabla
  var table = document.getElementById('tablaContactenos');

  // Crear un objeto de Excel
  var excel = new Excel();

  // Agregar filas y celdas a Excel desde la tabla HTML
  for (var i = 0, row; row = table.rows[i]; i++) {
    var excelRow = excel.addRow();
    
    for (var j = 0, cell; cell = row.cells[j]; j++) {
      excelRow.addCell(cell.textContent);
    }
  }

  // Descargar el archivo Excel
  excel.download('contactenos.xls');
}

function Excel() {
  var sheetData = [];

  this.addRow = function() {
    var rowData = [];
    sheetData.push(rowData);

    return {
      addCell: function(value) {
        rowData.push(value);
      }
    };
  };

  this.download = function(filename) {
    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.aoa_to_sheet(sheetData);
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet 1');
    XLSX.writeFile(wb, filename);
  };
}
