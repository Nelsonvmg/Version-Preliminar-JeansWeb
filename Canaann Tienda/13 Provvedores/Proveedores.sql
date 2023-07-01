CREATE TABLE proveedores (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR (100) NOT NULL,
    Email VARCHAR (200) NOT NULL UNIQUE,
    Telefono VARCHAR(20) NULL,
    Direccion VARCHAR(200) NULL,
    Producto VARCHAR(200) NULL,
    Fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO proveedores (Nombre, Email, Telefono, Direccion,Producto)
VALUES
('Bill Gates', 'bill.gates@microsoft.com', '+123456789', 'New York, USA','Jeans'),
('Elon Musk', 'elon.musk@spacex.com', '+111222333', 'Florida, USA','Chaqueta'),
('Will Smith', 'will.smith@gmail.com', '+111333555', 'California, USA','Short'),
('Bob Marley', 'bob@gmail.com', '+111555999', 'Texas, USA','Jeans'),
('Cristiano Ronaldo', 'cristiano.ronaldo@gmail.com', '+32447788993', 'Manchester, England','Chaqueta'),
('Boris Johnson', 'boris.johnson@gmail.com', '+4499778855', 'London, England','Short');