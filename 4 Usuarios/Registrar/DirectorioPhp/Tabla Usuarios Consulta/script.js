window.addEventListener('DOMContentLoaded', (event) => {
  // Obtiene la referencia de la tabla
  var table = document.getElementById('personasTable');

  // Realiza una petición AJAX para obtener los datos del archivo PHP
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      table.innerHTML += this.responseText;
    }
  };
  xmlhttp.open("GET", "script.php", true);
  xmlhttp.send();
});
