-- MySQL Script generated by MySQL Workbench
-- Sun Jun 18 20:07:35 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BD_Jeansweb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BD_Jeansweb
-- -----------------------------------------------------

USE `BD_Jeansweb` ;

-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Persona` (
  `ID_Persona` INT NOT NULL,
  `Nombre_Persona` VARCHAR(45) NOT NULL,
  `Apellido_Paterno` VARCHAR(45) NOT NULL,
  `Apellido_Materno` VARCHAR(45) NULL,
  `Tipo_Documento` VARCHAR(45) NOT NULL,
  `Edad` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(100) NOT NULL,
  `Usuario` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_Persona`),
  UNIQUE INDEX `Usuario_UNIQUE` (`Usuario` ASC) ,
  UNIQUE INDEX `ID_Persona_UNIQUE` (`ID_Persona` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Proveedor` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Proveedor_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Proveedor_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Publicista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Publicista` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Publicista_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Publicista_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Administrador` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Administrador_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Administrador_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Vendedor` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Vendedor_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Vendedor_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Cliente` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Cliente_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Cliente_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Almacenista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Almacenista` (
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Almacenista_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Almacenista_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Color_Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Color_Producto` (
  `ID_Color` INT NOT NULL AUTO_INCREMENT,
  `Descripcion_Color` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_Color`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Talla_Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Talla_Producto` (
  `ID_Talla` INT NOT NULL AUTO_INCREMENT,
  `Descripcion_Talla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_Talla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Linea_Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Linea_Producto` (
  `ID_Linea_Producto` INT NOT NULL AUTO_INCREMENT,
  `Descripcion_Linea` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_Linea_Producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Compra` (
  `ID_Producto` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` VARCHAR(45) NOT NULL,
  `Descripcion_Producto` VARCHAR(200) NOT NULL,
  `Talla_Producto_ID_Talla` INT NOT NULL,
  `Color_Producto_ID_Color` INT NOT NULL,
  `Linea_Producto_ID_Linea_Producto` INT NOT NULL,
  `Cantidad_Producto_Compra` INT NOT NULL,
  `Fecha_Producto_Compra` DATETIME NOT NULL,
  `Forma_Pago_Compra` VARCHAR(45) NOT NULL,
  `Precio_Producto_Compra` DECIMAL(6,3) NOT NULL,
  `Observacion_Compra` VARCHAR(200) NULL,
  `Total_Compra` DECIMAL(6,3) NOT NULL,
  `Almacenista_Persona_ID_Persona` INT NOT NULL,
  `Proveedor_Persona_ID_Persona` INT NOT NULL,
  PRIMARY KEY (`ID_Producto`),
  INDEX `fk_Compras_Almacenista1_idx` (`Almacenista_Persona_ID_Persona` ASC) ,
  INDEX `fk_Compras_Proveedor1_idx` (`Proveedor_Persona_ID_Persona` ASC) ,
  INDEX `fk_Compra_Color_Producto1_idx` (`Color_Producto_ID_Color` ASC) ,
  INDEX `fk_Compra_Talla_Producto1_idx` (`Talla_Producto_ID_Talla` ASC) ,
  INDEX `fk_Compra_Linea_Producto1_idx` (`Linea_Producto_ID_Linea_Producto` ASC) ,
  CONSTRAINT `fk_Compras_Almacenista1`
    FOREIGN KEY (`Almacenista_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Almacenista` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compras_Proveedor1`
    FOREIGN KEY (`Proveedor_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Proveedor` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Color_Producto1`
    FOREIGN KEY (`Color_Producto_ID_Color`)
    REFERENCES `BD_Jeansweb`.`Color_Producto` (`ID_Color`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Talla_Producto1`
    FOREIGN KEY (`Talla_Producto_ID_Talla`)
    REFERENCES `BD_Jeansweb`.`Talla_Producto` (`ID_Talla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Linea_Producto1`
    FOREIGN KEY (`Linea_Producto_ID_Linea_Producto`)
    REFERENCES `BD_Jeansweb`.`Linea_Producto` (`ID_Linea_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Producto` (
  `Compra_ID_Producto` INT NOT NULL,
  `Cantidad_Existencia` INT NOT NULL,
  `Precio_Producto_Minorista` DECIMAL(6,3) NOT NULL,
  `Precio_Producto_Venta_Mayorista` DECIMAL(6,3) NOT NULL,
  INDEX `fk_Producto_Compra1_idx` (`Compra_ID_Producto` ASC) ,
  CONSTRAINT `fk_Producto_Compra1`
    FOREIGN KEY (`Compra_ID_Producto`)
    REFERENCES `BD_Jeansweb`.`Compra` (`ID_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Compra_Devolucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Compra_Devolucion` (
  `ID_Devolucion` INT NOT NULL AUTO_INCREMENT,
  `Estado_Devolucion` VARCHAR(45) NOT NULL,
  `Fecha_Ingreso_Devolucion` DATETIME NOT NULL,
  `Fecha_Salida_Devolucion` VARCHAR(45) NOT NULL,
  `Compra_ID_Producto` INT NOT NULL,
  PRIMARY KEY (`ID_Devolucion`),
  INDEX `fk_Compras_devoluciones_Compra1_idx` (`Compra_ID_Producto` ASC) ,
  CONSTRAINT `fk_Compras_devoluciones_Compra1`
    FOREIGN KEY (`Compra_ID_Producto`)
    REFERENCES `BD_Jeansweb`.`Compra` (`ID_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Orden_Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Orden_Venta` (
  `ID_Orden_Venta` INT NOT NULL AUTO_INCREMENT,
  `Cantidad_Producto_Venta` INT NOT NULL,
  `Fecha_Venta` DATETIME NOT NULL,
  `Forma_Pago_Venta` VARCHAR(45) NOT NULL,
  `Descuento_Venta` INT NULL,
  `Observacion_Venta` VARCHAR(100) NULL,
  `Total_Venta` DECIMAL(6,3) NOT NULL,
  `Vendedor_Persona_ID_Persona` INT NOT NULL,
  `Cliente_Persona_ID_Persona` INT NOT NULL,
  `Producto_Compra_ID_Producto` INT NOT NULL,
  PRIMARY KEY (`ID_Orden_Venta`),
  UNIQUE INDEX `ID_orden_de_venta_UNIQUE` (`ID_Orden_Venta` ASC) ,
  INDEX `fk_Orden_ventas_Vendedor1_idx` (`Vendedor_Persona_ID_Persona` ASC) ,
  INDEX `fk_Orden_ventas_Cliente1_idx` (`Cliente_Persona_ID_Persona` ASC) ,
  INDEX `fk_Orden_venta_Producto1_idx` (`Producto_Compra_ID_Producto` ASC) ,
  CONSTRAINT `fk_Orden_ventas_Vendedor1`
    FOREIGN KEY (`Vendedor_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Vendedor` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orden_ventas_Cliente1`
    FOREIGN KEY (`Cliente_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Cliente` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orden_venta_Producto1`
    FOREIGN KEY (`Producto_Compra_ID_Producto`)
    REFERENCES `BD_Jeansweb`.`Producto` (`Compra_ID_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Garantia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Garantia` (
  `ID_Garantia` INT NOT NULL AUTO_INCREMENT,
  `Novedad` VARCHAR(200) NULL,
  `Fecha_Ingreso_Garantia` DATETIME NOT NULL,
  `Fecha_Salida_Garantia` DATETIME NOT NULL,
  `Nota_Credito` DECIMAL(6,3) NOT NULL,
  `Orden_venta_ID_Orden_Venta` INT NOT NULL,
  UNIQUE INDEX `ID_garantia_UNIQUE` (`ID_Garantia` ASC) ,
  PRIMARY KEY (`ID_Garantia`),
  INDEX `fk_Garantia_Orden_venta1_idx` (`Orden_venta_ID_Orden_Venta` ASC) ,
  CONSTRAINT `fk_Garantia_Orden_venta1`
    FOREIGN KEY (`Orden_venta_ID_Orden_Venta`)
    REFERENCES `BD_Jeansweb`.`Orden_Venta` (`ID_Orden_Venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Catalogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Catalogo` (
  `ID_Catalogo` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Catalogo` VARCHAR(45) NOT NULL,
  `Fecha_Catalogo` DATETIME NOT NULL,
  `Publicista_Persona_ID_Persona` INT NOT NULL,
  PRIMARY KEY (`ID_Catalogo`),
  UNIQUE INDEX `ID_Catalogo_UNIQUE` (`ID_Catalogo` ASC) ,
  INDEX `fk_Catalogos_Publicista1_idx` (`Publicista_Persona_ID_Persona` ASC) ,
  CONSTRAINT `fk_Catalogos_Publicista1`
    FOREIGN KEY (`Publicista_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Publicista` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Promocion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Promocion` (
  `ID_Promocion` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Promocion` VARCHAR(45) NOT NULL,
  `Fecha_Promocion` DATE NOT NULL,
  `Catalogos_ID_Catalogo` INT NOT NULL,
  UNIQUE INDEX `ID_Promociones_UNIQUE` (`ID_Promocion` ASC) ,
  PRIMARY KEY (`ID_Promocion`),
  INDEX `fk_Promocion_Catalogos1_idx` (`Catalogos_ID_Catalogo` ASC) ,
  CONSTRAINT `fk_Promocion_Catalogos1`
    FOREIGN KEY (`Catalogos_ID_Catalogo`)
    REFERENCES `BD_Jeansweb`.`Catalogo` (`ID_Catalogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`PQRs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`PQRs` (
  `ID_PQRs` INT NOT NULL AUTO_INCREMENT,
  `Descripcion PQRs` VARCHAR(45) NOT NULL,
  `Fecha_PQRs` DATETIME NOT NULL,
  `Tipo_PQRs` VARCHAR(45) NOT NULL,
  `Cliente_Persona_ID_Persona` INT NOT NULL,
  `Administrador_Persona_ID_Persona` INT NOT NULL,
  PRIMARY KEY (`ID_PQRs`),
  UNIQUE INDEX `ID_PQRs_UNIQUE` (`ID_PQRs` ASC) ,
  INDEX `fk_PQRs_Cliente1_idx` (`Cliente_Persona_ID_Persona` ASC) ,
  INDEX `fk_PQRs_Administrador1_idx` (`Administrador_Persona_ID_Persona` ASC) ,
  CONSTRAINT `fk_PQRs_Cliente1`
    FOREIGN KEY (`Cliente_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Cliente` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PQRs_Administrador1`
    FOREIGN KEY (`Administrador_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Administrador` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`ID_Persona_has_Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`ID_Persona_has_Cliente` (
  `ID_Persona_ID_Persona` INT NOT NULL,
  `Cliente_ID_Cliente` INT NOT NULL,
  PRIMARY KEY (`ID_Persona_ID_Persona`, `Cliente_ID_Cliente`),
  INDEX `fk_ID_Persona_has_Cliente_ID_Persona_idx` (`ID_Persona_ID_Persona` ASC) ,
  CONSTRAINT `fk_ID_Persona_has_Cliente_ID_Persona`
    FOREIGN KEY (`ID_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Telefono` (
  `Telefono_celular` VARCHAR(15) NOT NULL,
  `Telefono_celular_2` VARCHAR(15) NULL,
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Telefono_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Telefono_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Correo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Correo` (
  `Email` VARCHAR(45) NOT NULL,
  `Email_2` VARCHAR(45) NULL,
  `Persona_ID_Persona` INT NOT NULL,
  INDEX `fk_Correo_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  PRIMARY KEY (`Persona_ID_Persona`),
  CONSTRAINT `fk_Correo_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Proveedor_has_Compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Proveedor_has_Compras` (
  `Proveedor_ID_Proveedor` INT NOT NULL,
  `Compras_ID_Producto_Compra` INT NOT NULL,
  PRIMARY KEY (`Proveedor_ID_Proveedor`, `Compras_ID_Producto_Compra`),
  INDEX `fk_Proveedor_has_Compras_Compras1_idx` (`Compras_ID_Producto_Compra` ASC) ,
  CONSTRAINT `fk_Proveedor_has_Compras_Compras1`
    FOREIGN KEY (`Compras_ID_Producto_Compra`)
    REFERENCES `BD_Jeansweb`.`Compra` (`ID_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Reporte_Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Reporte_Venta` (
  `ID_Reporte_Venta` INT NOT NULL AUTO_INCREMENT,
  `Orden_venta_ID_Orden_Venta` INT NOT NULL,
  PRIMARY KEY (`ID_Reporte_Venta`),
  INDEX `fk_Reporte_Ventas_Orden_venta1_idx` (`Orden_venta_ID_Orden_Venta` ASC) ,
  UNIQUE INDEX `ID_Reporte_Ventas_UNIQUE` (`ID_Reporte_Venta` ASC) ,
  CONSTRAINT `fk_Reporte_Ventas_Orden_venta1`
    FOREIGN KEY (`Orden_venta_ID_Orden_Venta`)
    REFERENCES `BD_Jeansweb`.`Orden_Venta` (`ID_Orden_Venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Reporte_Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Reporte_Compra` (
  `ID_Reporte_Compra` INT NOT NULL AUTO_INCREMENT,
  `Compra_ID_Producto` INT NOT NULL,
  PRIMARY KEY (`ID_Reporte_Compra`),
  INDEX `fk_Reporte_Compras_Compra1_idx` (`Compra_ID_Producto` ASC) ,
  CONSTRAINT `fk_Reporte_Compras_Compra1`
    FOREIGN KEY (`Compra_ID_Producto`)
    REFERENCES `BD_Jeansweb`.`Compra` (`ID_Producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Estado_PQRs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Estado_PQRs` (
  `Estado_PQRs` VARCHAR(45) NOT NULL,
  `PQRs_ID_PQRs` INT NOT NULL,
  UNIQUE INDEX `Estado_PQRs_UNIQUE` (`Estado_PQRs` ASC) ,
  PRIMARY KEY (`PQRs_ID_PQRs`),
  CONSTRAINT `fk_Estado PQRs_PQRs1`
    FOREIGN KEY (`PQRs_ID_PQRs`)
    REFERENCES `BD_Jeansweb`.`PQRs` (`ID_PQRs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Promocion_has_Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Promocion_has_Cliente` (
  `Promocion_ID_Promocion` INT NOT NULL,
  `Cliente_Persona_ID_Persona` INT NOT NULL,
  PRIMARY KEY (`Promocion_ID_Promocion`, `Cliente_Persona_ID_Persona`),
  INDEX `fk_Promocion_has_Cliente_Cliente1_idx` (`Cliente_Persona_ID_Persona` ASC) ,
  INDEX `fk_Promocion_has_Cliente_Promocion1_idx` (`Promocion_ID_Promocion` ASC) ,
  CONSTRAINT `fk_Promocion_has_Cliente_Promocion1`
    FOREIGN KEY (`Promocion_ID_Promocion`)
    REFERENCES `BD_Jeansweb`.`Promocion` (`ID_Promocion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Promocion_has_Cliente_Cliente1`
    FOREIGN KEY (`Cliente_Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Cliente` (`Persona_ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Tipo_Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Tipo_Rol` (
  `ID_Tipo_Rol` INT NOT NULL,
  `Tipo_Rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_Tipo_Rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_Jeansweb`.`Persona_has_Tipo_Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jeansweb`.`Persona_has_Tipo_Rol` (
  `Persona_ID_Persona` INT NOT NULL,
  `Tipo_Rol_ID_Tipo_Rol` INT NOT NULL,
  PRIMARY KEY (`Persona_ID_Persona`, `Tipo_Rol_ID_Tipo_Rol`),
  INDEX `fk_Persona_has_Tipo_Rol_Tipo_Rol1_idx` (`Tipo_Rol_ID_Tipo_Rol` ASC) ,
  INDEX `fk_Persona_has_Tipo_Rol_Persona1_idx` (`Persona_ID_Persona` ASC) ,
  CONSTRAINT `fk_Persona_has_Tipo_Rol_Persona1`
    FOREIGN KEY (`Persona_ID_Persona`)
    REFERENCES `BD_Jeansweb`.`Persona` (`ID_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_has_Tipo_Rol_Tipo_Rol1`
    FOREIGN KEY (`Tipo_Rol_ID_Tipo_Rol`)
    REFERENCES `BD_Jeansweb`.`Tipo_Rol` (`ID_Tipo_Rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
