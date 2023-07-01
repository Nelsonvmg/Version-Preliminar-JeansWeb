<!DOCTYPE html>
<html>

<head>
    <title>Registro de venta</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-------------------inicio consultar cliente--------------------------------------------------------->
    <script>

        function buscarCliente() {
            var numeroDocumento = $("input[name='Numero_Documento']").val();

            $.ajax({
                url: "Venta_consulta_cliente.php",
                type: "POST",
                data: { Numero_Documento: numeroDocumento },
                dataType: "json",
                success: function (response) {
                    // Autocompletar los campos del formulario con los datos obtenidos
                    $("input[name='Nombres']").val(response.Nombres);
                    $("input[name='Apellido_Paterno']").val(response.Apellido_Paterno);
                    $("input[name='Telefono_Celular_1']").val(response.Telefono_Celular_1);
                    $("input[name='Direccion']").val(response.Direccion);
                    $("input[name='Email_1']").val(response.Email_1);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

    </script>
    <!-------------------fin consultar cliente--------------------------------------------------------->

    <!-------------------inicio consultar stock--------------------------------------------------------->
    <script>

        function buscarStock() {
            var idProducto = $("input[name='id_producto']").val();
            $.ajax({
                url: "Venta_consulta_stock.php",
                type: "POST",
                data: { id_producto: idProducto },
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        $("input[name='nombre_producto']").val(response.nombre_producto);
                        $("input[name='talla_producto']").val(response.talla_producto);
                        $("input[name='color_producto']").val(response.color_producto);
                        $("input[name='cantidad_producto']").val(response.cantidad_producto);
                        $("input[name='precio_venta']").val(response.precio_venta);
                        $("input[name='valor_total']").val(response.cantidad_producto * response.precio_venta);

                        // Calcular el valor total o realizar otras acciones necesarias
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

    </script>
    <!-------------------fin consultar stock--------------------------------------------------------->

    <!-------------------inicio formulario --------------------------------------------------------->
    <div class="container">
        <h1>Registro de venta</h1>
        <form id="formulario-venta" method="post" action="Venta_guardar.php">
            <!-------------------inicio formulario cliente--------------------------------------------------------->
            <h2>Información Cliente</h2>
            <table>
                <tr>
                    <td><label>Número Documento:</label></td>
                    <td>
                        <input type="text" name="Numero_Documento">
                        <button type="button" onclick="buscarCliente()">Buscar</button>
                    </td>
                </tr>
                <tr>
                    <td><label>Nombre:</label></td>
                    <td><input type="text" name="Nombres"></td>
                </tr>
                <tr>
                    <td><label>Apellido:</label></td>
                    <td><input type="text" name="Apellido_Paterno"></td>
                </tr>
                <tr>
                    <td><label>Teléfono:</label></td>
                    <td><input type="text" name="Telefono_Celular_1"></td>
                </tr>
                <tr>
                    <td><label>Dirección:</label></td>
                    <td><input type="text" name="Direccion"></td>
                </tr>
                <tr>
                    <td><label>Correo:</label></td>
                    <td><input type="text" name="Email_1"></td>
                </tr>
            </table>
            <!-------------------fin formulario cliente--------------------------------------------------------->

            <!-------------------inicio formulario producto--------------------------------------------------------->
            <h2>Información Producto</h2>
            <table>
                <tr>
                    <td><label>Referencia:</label></td>
                    <td>
                        <input type="text" name="id_producto">
                        <button type="button" onclick="buscarStock()">Buscar</button>
                    </td>
                </tr>
                <tr>
                    <td><label>Nombre:</label></td>
                    <td><input type="text" name="nombre_producto" id="nombre_producto"></td>
                </tr>
                <tr>
                    <td><label>Talla:</label></td>
                    <td><input type="text" name="talla_producto" id="talla_producto"></td>
                </tr>
                <tr>
                    <td><label>Color:</label></td>
                    <td><input type="text" name="color_producto" id="color_producto"></td>
                </tr>
                <tr>
                    <td><label>Cantidad:</label></td>
                    <td><input type="number" name="cantidad_producto" id="cantidad_producto"></td>
                </tr>
                <tr>
                    <td><label>Valor Unidad:</label></td>
                    <td><input type="number" name="precio_venta" id="precio_venta"></td>
                </tr>
                <tr>
                    <td><label>Valor Total:</label></td>
                    <td><input type="number" name="valor_total" id="valor_total"></td>
                </tr>
                <tr>
                    <td colspan="2" class="carrito-actions">
                        <input type="button" value="Agregar al Carrito" onclick="agregarAlCarrito()">
                    </td>
                </tr>
            </table>
            <!-------------------fin formulario producto--------------------------------------------------------->
            <input type="submit" value="Registrar venta">
        </form>
        <!-------------------fin formulario --------------------------------------------------------->
        
        <!-------------------inicio carrito de compra --------------------------------------------------------->
        <h2>Carrito de Compra</h2>
        <table id="carrito-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="carrito-body">
                <!-- Aquí se agregarán las filas del carrito dinámicamente -->
            </tbody>
        </table>
        <!-------------------fin carrito de compra --------------------------------------------------------->
    </div>

    <script>
        var carrito = [];

        function agregarAlCarrito() {
            // Obtener los valores del formulario de producto
            var nombre = $("input[name='nombre_producto']").val();
            var talla = $("input[name='talla_producto']").val();
            var color = $("input[name='color_producto']").val();
            var cantidad = $("input[name='cantidad_producto']").val();
            var precio = $("input[name='precio_venta']").val();
            var subtotal = cantidad * precio;

            // Crear el objeto producto
            var producto = {
                nombre: nombre,
                talla: talla,
                color: color,
                cantidad: cantidad,
                precio: precio,
                subtotal: subtotal
            };

            // Agregar el producto al carrito
            carrito.push(producto);

            // Actualizar la tabla del carrito
            mostrarCarrito();
        }

        function mostrarCarrito() {
            var carritoBody = $("#carrito-body");
            carritoBody.empty();

            for (var i = 0; i < carrito.length; i++) {
                var producto = carrito[i];

                // Crear la fila del producto en el carrito
                var fila = $("<tr></tr>");
                fila.append("<td>" + producto.nombre + "</td>");
                fila.append("<td>" + producto.talla + "</td>");
                fila.append("<td>" + producto.color + "</td>");
                fila.append("<td>" + producto.cantidad + "</td>");
                fila.append("<td>" + producto.precio + "</td>");
                fila.append("<td>" + producto.subtotal + "</td>");

                // Agregar los botones de eliminar y editar
                fila.append("<td><button type='button' onclick='editarProducto(" + i + ")'>Editar</button></td>");
                fila.append("<td><button type='button' onclick='eliminarProducto(" + i + ")'>Eliminar</button></td>");

                // Agregar la fila al cuerpo del carrito
                carritoBody.append(fila);
            }
        }

        function editarProducto(index) {
            // Obtener el producto del carrito en el índice dado
            var producto = carrito[index];

            // Llenar el formulario de producto con los valores del producto seleccionado
            $("input[name='nombre_producto']").val(producto.nombre);
            $("input[name='talla_producto']").val(producto.talla);
            $("input[name='color_producto']").val(producto.color);
            $("input[name='cantidad_producto']").val(producto.cantidad);
            $("input[name='precio_venta']").val(producto.precio);
            $("input[name='valor_total']").val(producto.subtotal);

            // Eliminar el producto del carrito
            carrito.splice(index, 1);

            // Actualizar la tabla del carrito
            mostrarCarrito();
        }

        function eliminarProducto(index) {
            // Eliminar el producto del carrito en el índice dado
            carrito.splice(index, 1);

            // Actualizar la tabla del carrito
            mostrarCarrito();
        }
    </script>
</body>

</html>
