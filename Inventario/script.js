$(document).ready(function() {
    var products = [];

    // Función para generar un ID único
    function generateID() {
      return Math.random().toString(36).substr(2, 9);
    }

    // Función para renderizar los productos en la tabla
    function renderProducts() {
      var productTable = $("#product-table tbody");
      productTable.empty();

      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        var row = `
          <tr>
            <td>${product.id}</td>
            <td>${product.nombre}</td>
            <td>${product.cantidad}</td>
            <td>${product.valorCompra}</td>
            <td>${product.valorVenta}</td>
            <td>${product.proveedor}</td>
            <td>
              <button class="edit-button btn btn-primary" data-id="${product.id}">Editar</button>
              <button class="delete-button btn btn-danger" data-id="${product.id}">Eliminar</button>
            </td>
          </tr>
        `;

        productTable.append(row);
      }

      // Agregar eventos a los botones de editar y eliminar
      $(".edit-button").click(function() {
        var id = $(this).data("id");
        editProduct(id);
      });

      $(".delete-button").click(function() {
        var id = $(this).data("id");
        deleteProduct(id);
      });
    }

    // Función para registrar un nuevo producto o editar un producto existente
    function registerProduct() {
      var productId = $("#product-id").val();
      var productName = $("#product-name").val();
      var productQuantity = $("#product-quantity").val();
      var productPurchasePrice = $("#product-purchase-price").val();
      var productSalePrice = $("#product-sale-price").val();
      var productSupplier = $("#product-supplier").val();

      // Verificar si es una edición o un registro nuevo
      var existingProduct = products.find(function(product) {
        return product.id === productId;
      });

      if (existingProduct) {
        // Edición de un producto existente
        existingProduct.nombre = productName;
        existingProduct.cantidad = productQuantity;
        existingProduct.valorCompra = productPurchasePrice;
        existingProduct.valorVenta = productSalePrice;
        existingProduct.proveedor = productSupplier;
      } else {
        // Registro de un nuevo producto
        var newProduct = {
          id: productId,
          nombre: productName,
          cantidad: productQuantity,
          valorCompra: productPurchasePrice,
          valorVenta: productSalePrice,
          proveedor: productSupplier
        };
        products.push(newProduct);
      }

      // Limpiar el formulario
      $("#product-id").val("");
      $("#product-name").val("");
      $("#product-quantity").val("");
      $("#product-purchase-price").val("");
      $("#product-sale-price").val("");
      $("#product-supplier").val("");

      // Actualizar la tabla
      renderProducts();
    }

    // Función para editar un producto existente
    function editProduct(id) {
      var product = products.find(function(product) {
        return product.id === id;
      });

      if (product) {
        // Rellenar el formulario con los datos del producto
        $("#product-id").val(product.id);
        $("#product-name").val(product.nombre);
        $("#product-quantity").val(product.cantidad);
        $("#product-purchase-price").val(product.valorCompra);
        $("#product-sale-price").val(product.valorVenta);
        $("#product-supplier").val(product.proveedor);
      }
    }

    // Función para eliminar un producto
    function deleteProduct(id) {
      var index = products.findIndex(function(product) {
        return product.id === id;
      });

      if (index !== -1) {
        products.splice(index, 1);
        alert("Producto eliminado exitosamente");
        renderProducts();
      }
    }

    // Agregar evento al formulario para el evento "submit"
    $("#product-form").submit(function(event) {
      event.preventDefault();
      registerProduct();
    });

    // Mostrar los productos inicialmente
    renderProducts();
  });

  