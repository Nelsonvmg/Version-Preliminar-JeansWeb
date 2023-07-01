CREATE TABLE Compra (
    ID_Producto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nombre_Producto VARCHAR (100) NOT NULL,
    Descripcion_Producto VARCHAR (200) NOT NULL,
    Talla_Producto_ID_Talla VARCHAR(20) NOT NULL,
    Color_Producto_ID_Color VARCHAR(200) NOT NULL,
    Linea_Producto_ID_Linea_Producto VARCHAR(200) NOT NULL,
    Cantidad_Producto_Compra VARCHAR(20) NOT NULL,
    Forma_Pago_Compra VARCHAR(200) NOT NULL,
    Observacion_Compra VARCHAR(200) NOT NULL,
    Precio_Producto_Compra VARCHAR(200)NOT NULL,
    Total_Compra VARCHAR(200) NOT NULL,
    Fecha_Producto_Compra DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Compra (Nombre_Producto, Descripcion_Producto, Talla_Producto_ID_Talla, Color_Producto_ID_Color,Linea_Producto_ID_Linea_Producto,Cantidad_Producto_Compra,Forma_Pago_Compra,Observacion_Compra,Precio_Producto_Compra,Total_Compra)
VALUES
('Bill Gates', 'camuflado', 'M', 'Azul','Hombre','10','tarjeta','Nada','10','10'),
('Bill Gates', 'camuflado', 'M', 'Azul','Hombre','10','tarjeta','Nada','10','10'),
('Bill Gates', 'camuflado', 'M', 'Azul','Hombre','10','tarjeta','Nada','10','10'),
('Bill Gates', 'camuflado', 'M', 'Verde','Hombre','10','tarjeta','Nada','10','10');