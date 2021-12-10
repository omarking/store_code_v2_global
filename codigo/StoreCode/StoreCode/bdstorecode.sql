/*
Navicat MySQL Data Transfer

Source Server         : maic
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bdstorecodewayv1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-15 10:46:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `carrito`
-- ----------------------------
DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `FolioVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `precioUnitario` float(8,2) NOT NULL,
  `cantidadProducto` float(8,2) NOT NULL,
  `statusCarrito` varchar(1) NOT NULL,
  PRIMARY KEY (`idCarrito`),
  KEY `cp` (`idProducto`),
  KEY `cfv` (`FolioVenta`),
  CONSTRAINT `cfv` FOREIGN KEY (`FolioVenta`) REFERENCES `venta` (`FolioVenta`),
  CONSTRAINT `cp` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `desCategoria` varchar(245) NOT NULL,
  `statusCategoria` varchar(1) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `desCategoria` (`desCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'MUEBLES', '1');
INSERT INTO `categoria` VALUES ('2', 'ELECTRÓNICOS', '1');
INSERT INTO `categoria` VALUES ('3', 'ALIMENTOS Y BEBIDAS', '1');
INSERT INTO `categoria` VALUES ('4', 'ROPA', '1');
INSERT INTO `categoria` VALUES ('5', 'ZAPATOS', '1');
INSERT INTO `categoria` VALUES ('6', 'JUGUETES Y JUEGOS', '1');
INSERT INTO `categoria` VALUES ('7', 'LIBROS', '1');
INSERT INTO `categoria` VALUES ('8', 'DEPORTES', '1');

-- ----------------------------
-- Table structure for `detaproductocomen`
-- ----------------------------
DROP TABLE IF EXISTS `detaproductocomen`;
CREATE TABLE `detaproductocomen` (
  `idDetalleProComen` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estatus` varchar(1) DEFAULT '1',
  PRIMARY KEY (`idDetalleProComen`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `detaproductocomen_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `detaproductocomen_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `imgproducto`
-- ----------------------------
DROP TABLE IF EXISTS `imgproducto`;
CREATE TABLE `imgproducto` (
  `idImgProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idImgProducto`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `marca`
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `desMarca` varchar(245) NOT NULL,
  `statusMarca` varchar(1) NOT NULL,
  PRIMARY KEY (`idMarca`),
  UNIQUE KEY `desMarca` (`desMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES ('6', 'Coca - cOLA', '1');
INSERT INTO `marca` VALUES ('7', 'SALANDENS', '0');
INSERT INTO `marca` VALUES ('8', 'WRANGLER', '1');
INSERT INTO `marca` VALUES ('9', 'FLEXI', '1');
INSERT INTO `marca` VALUES ('10', 'ADIDAS', '1');

-- ----------------------------
-- Table structure for `permiso`
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `desPermiso` varchar(150) NOT NULL,
  `statusPermiso` varchar(1) NOT NULL,
  PRIMARY KEY (`idPermiso`),
  UNIQUE KEY `desPermiso` (`desPermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES ('1', 'SUPERUSUARIO', '1');

-- ----------------------------
-- Table structure for `producto`
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(150) NOT NULL,
  `desProducto` varchar(255) NOT NULL DEFAULT '',
  `precioUnitarioProducto` float(8,2) NOT NULL DEFAULT 0.00,
  `imagenProducto` varchar(255) NOT NULL DEFAULT '',
  `fechaAlojadoProducto` date NOT NULL,
  `stockRealProducto` float(8,2) NOT NULL,
  `statusProducto` varchar(1) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `pm` (`idMarca`),
  KEY `pc` (`idCategoria`),
  KEY `pu` (`idUsuario`),
  CONSTRAINT `pc` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  CONSTRAINT `pm` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`),
  CONSTRAINT `pu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `rol`
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `desRole` varchar(150) NOT NULL,
  `statusRole` varchar(1) NOT NULL,
  PRIMARY KEY (`idRole`),
  UNIQUE KEY `desRole` (`desRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES ('1', 'Admin', '1');

-- ----------------------------
-- Table structure for `rolpermiso`
-- ----------------------------
DROP TABLE IF EXISTS `rolpermiso`;
CREATE TABLE `rolpermiso` (
  `idRolPermisoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL,
  PRIMARY KEY (`idRolPermisoUsuario`),
  KEY `rpu` (`idUsuario`),
  KEY `rpp` (`idPermiso`),
  KEY `rpr` (`idRol`),
  CONSTRAINT `rpp` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`idPermiso`),
  CONSTRAINT `rpr` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRole`),
  CONSTRAINT `rpu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rolpermiso
-- ----------------------------
INSERT INTO `rolpermiso` VALUES ('1', '41', '1', '1');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(200) NOT NULL,
  `apellido1Usuario` varchar(150) NOT NULL,
  `emailUsuario` varchar(245) NOT NULL,
  `contraUsuario` varchar(16) NOT NULL,
  `confirmaContraUsuario` varchar(16) NOT NULL,
  `apellido2Usuario` varchar(150) DEFAULT NULL,
  `imagenUsuario` varchar(245) DEFAULT NULL,
  `direccionUsuario` varchar(255) DEFAULT NULL,
  `codigoPostalUsuario` varchar(10) DEFAULT NULL,
  `telefonoUsuario` varchar(15) DEFAULT NULL,
  `fechaRegistroUsuario` datetime NOT NULL,
  `statusUsuario` varchar(1) NOT NULL,
  `rfeUsuario` varchar(13) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `codeActive` varchar(21) NOT NULL,
  `clienidpaypal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------

INSERT INTO `usuario` VALUES ('41', 'Administrador', 'Administrador', 'admin@gmail.com ', 'adminstore2021', 'adminstore2021', 'Administrador', 'img', null, null, null, '0000-00-00 00:00:00', '1', null, null, '', null);

-- ----------------------------
-- Table structure for `venta`
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `FolioVenta` int(11) NOT NULL AUTO_INCREMENT,
  `claveTransaccion` varchar(250) NOT NULL,
  `paypalDatos` text NOT NULL,
  `fechaVenta` datetime NOT NULL,
  `correo` varchar(255) NOT NULL,
  `totalVendido` float(8,2) NOT NULL,
  `statusVenta` varchar(1) NOT NULL,
  PRIMARY KEY (`FolioVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- ----------------------------
-- Procedure structure for `psActDatFalUsu`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psActDatFalUsu`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psActDatFalUsu`(PidUAct INT)
BEGIN
	SELECT
	usuario.idUsuario,
	usuario.nombreUsuario,
	usuario.apellido1Usuario,
	usuario.apellido2Usuario,	
	usuario.contraUsuario,
	usuario.confirmaContraUsuario,	
	usuario.direccionUsuario,
	usuario.codigoPostalUsuario,
	usuario.telefonoUsuario,
	usuario.rfeUsuario,
	usuario.fechaNacimiento
	FROM
	usuario
	WHERE usuario.idUsuario = PidUAct;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psActualizarProdcuto`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psActualizarProdcuto`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psActualizarProdcuto`(PnombreActP varchar(150),
PdescripActP varchar(255),
PprecioUActP float(8,2),
PimagenActP varchar(255),
PstockActP float(8,2),
PmarcaActP INT,
PcategoriaActP INT ,
PidProductoActP INT 
)
BEGIN 	
	UPDATE producto SET producto.nombreProducto = PnombreActP,
	 producto.desProducto = PdescripActP,
	 producto.precioUnitarioProducto = PprecioUActP,
	 producto.imagenProducto = PimagenActP,
	 producto.stockRealProducto = PstockActP,
	 producto.idMarca = PmarcaActP,	 
	 producto.idCategoria = PcategoriaActP 
	WHERE  producto.idProducto = PidProductoActP AND producto.statusProducto = '1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psActuImgs`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psActuImgs`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psActuImgs`(PidUsuarioActProImg INT)
BEGIN
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.imagenProducto,
	imgproducto.img1,
	imgproducto.img2,
	imgproducto.img3,
	imgproducto.img4
	FROM producto
	INNER JOIN imgproducto ON producto.idProducto = imgproducto.idProducto
	WHERE  producto.idUsuario = PidUsuarioActProImg AND statusProducto= '1' AND producto.stockRealProducto >0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psBusIdProduCU`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psBusIdProduCU`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psBusIdProduCU`(PidProUmC INT)
BEGIN 
	SELECT producto.idUsuario FROM producto
	WHERE producto.idProducto = PidProUmC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psCateAct`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psCateAct`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psCateAct`()
BEGIN		
	SELECT categoria.idCategoria,categoria.desCategoria FROM categoria WHERE categoria.statusCategoria = '1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psConsultaUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psConsultaUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psConsultaUsuario`(
PdesContra VARCHAR(16),
PdesEmail VARCHAR(245)
)
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "A OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;
								
IF EXISTS(SELECT usuario.emailUsuario, usuario.contraUsuario  FROM usuario WHERE usuario.contraUsuario = PdesContra AND usuario.emailUsuario = PdesEmail) THEN 
		SELECT "Datos Correcto"  AS "Mensaje";		
ELSE			
			SELECT "Datos incorrectos" AS "Aviso";
			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psDateActual`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psDateActual`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psDateActual`()
BEGIN 
SELECT CURDATE();
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psDatFalUsu`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psDatFalUsu`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psDatFalUsu`(Pape2U varchar(200),
PdirecU varchar(150),
PcpU varchar(5),
Ptelefono varchar(55),
PRFC varchar(13),
PfeNa date,
PidU INT
)
BEGIN
	UPDATE usuario SET 
	usuario.apellido2Usuario = Pape2U, 
	usuario.direccionUsuario = PdirecU,
	usuario.codigoPostalUsuario = PcpU,
	usuario.telefonoUsuario = Ptelefono,
	usuario.rfeUsuario = PRFC,
	usuario.fechaNacimiento = PfeNa
	WHERE usuario.idUsuario = PidU;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psEdUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psEdUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psEdUsuario`(PidUsAE INT)
BEGIN 
	UPDATE usuario SET usuario.statusUsuario = '0' WHERE usuario.idUsuario = PidUsAE;	
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psEliProduct`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psEliProduct`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psEliProduct`(Pidrod INT)
BEGIN 
	UPDATE producto SET stockRealProducto = '0', producto.statusProducto ='0' WHERE producto.idProducto=Pidrod;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psEmailConfirm`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psEmailConfirm`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psEmailConfirm`(Pcodi VARCHAR(20),Pemail VARCHAR(245))
BEGIN 
UPDATE usuario SET usuario.statusUsuario = '1' WHERE usuario.codeActive = Pcodi AND usuario.emailUsuario = Pemail;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psFeActD`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psFeActD`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psFeActD`()
BEGIN
select CURDATE();
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psFiltroCorreo`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psFiltroCorreo`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psFiltroCorreo`(Pemail VARCHAR(245))
SELECT COUNT(usuario.emailUsuario) FROM usuario WHERE usuario.emailUsuario = Pemail
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psFiltroEmail`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psFiltroEmail`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psFiltroEmail`(IN `Pemail` VARCHAR(245))
    NO SQL
SELECT * FROM usuario
WHERE usuario.emailUsuario = Pemail
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psImagenUsuarioPerfil`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psImagenUsuarioPerfil`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psImagenUsuarioPerfil`(PdiUser INT)
BEGIN 
SELECT usuario.imagenUsuario FROM usuario WHERE usuario.idUsuario = PdiUser AND usuario.statusUsuario='1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsCarrito`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsCarrito`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsCarrito`(
PFolioVenta INT,
PidProducto INT,
PprecioUnitario FLOAT,
PcantidadProducto FLOAT
)
BEGIN 
		INSERT INTO carrito
		VALUES (
		null,
		PFolioVenta,
		PidProducto,
		PprecioUnitario,
		PcantidadProducto,
		'1');
		UPDATE producto SET stockRealProducto = stockRealProducto - PcantidadProducto WHERE producto.idProducto=PidProducto;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsClienIdU`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsClienIdU`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsClienIdU`(PidUsuaCpay INT, PclienId VARCHAR(255))
BEGIN
	UPDATE usuario SET usuario.clienidpaypal = PclienId WHERE usuario.idUsuario = PidUsuaCpay;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInserImgs`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInserImgs`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInserImgs`(
PidPro INT,
Pimg1 VARCHAR(255),
Pimg2 VARCHAR(255),
Pimg3 VARCHAR(255),
Pimg4 VARCHAR(255)
)
BEGIN
	INSERT imgproducto VALUES(NULL,PidPro,Pimg1,Pimg2,Pimg3,Pimg4);
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertCategoria`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertCategoria`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertCategoria`(PdesCategoria VARCHAR(150))
BEGIN							
IF EXISTS(SELECT categoria.desCategoria FROM categoria WHERE categoria.desCategoria = PdesCategoria) THEN 
		SELECT CONCAT('Categoría  Ya Existente: ', PdesCategoria)  AS "Mensaje";		
ROLLBACK;
ELSE

			INSERT categoria VALUES(
												NULL,
												UPPER(PdesCategoria),
												'1');
			COMMIT;
			SELECT CONCAT('Categoría insertada con éxito!!!: ',  PdesCategoria)  AS "Aviso";
			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertComenUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertComenUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertComenUsuario`(PComentario TEXT,
PidUsuario INT,
PidProducto INT
)
BEGIN
	INSERT detaproductocomen (comentario, idUsuario, idProducto, fecha)
					VALUES (PComentario, PidUsuario, PidProducto, NOW());
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertFormaPago`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertFormaPago`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertFormaPago`(PdesFormaPago VARCHAR(150))
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 	
		SELECT "HA OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;			
	SET AUTOCOMMIT=0;
					
IF EXISTS(SELECT formapago.desFormaPago FROM formapago WHERE formapago.desFormaPago = PdesFormaPago) THEN 
		SELECT CONCAT('Forma de Pago ya existente : ',  PdesFormaPago)  AS "Mensaje";
ROLLBACK;
ELSE

			INSERT formapago VALUES(
												NULL,
												UPPER(PdesFormaPago),
												'1');	
			COMMIT;
			SELECT CONCAT('Forma de Pago insertada con éxito!!!: ',  PdesFormaPago)  AS "Aviso";
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertMarca`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertMarca`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertMarca`(PdesMarca VARCHAR(150))
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "HA OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;
										
IF EXISTS(SELECT marca.desMarca FROM marca WHERE marca.desMarca = PdesMarca) THEN 
		SELECT CONCAT('Marca ya existente : ',  PdesMarca)  AS "Mensaje";
		ROLLBACK;
ELSE

			INSERT marca VALUES(
												NULL,
												UPPER(PdesMarca),
												'1');			
			COMMIT;
			SELECT CONCAT('Marca insertada con éxito!!!: ',  PdesMarca)  AS "Aviso";
			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertPermisos`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertPermisos`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertPermisos`(PdesPermiso VARCHAR(150))
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "A OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;
					
IF EXISTS(SELECT permiso.desPermiso FROM permiso  WHERE permiso.desPermiso = PdesPermiso) THEN 
		SELECT CONCAT('Permiso Ya Existente: ',PdesPermiso) AS "Mensaje";
	ROLLBACK;		
ELSE

			INSERT permiso VALUES(
												NULL,
												UPPER(PdesPermiso),
												'1');
			COMMIT;
			SELECT CONCAT('Permiso insertado con exito!!!',PdesPermiso) AS "Aviso";
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertProducto`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertProducto`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertProducto`(
PnombrePro VARCHAR(200),
PdesPro VARCHAR(200),
PpreuniPro DOUBLE,
PcanPro DOUBLE,
PimagePro VARCHAR(240),
PidMarcaPro INT,
PidCategoriaPro INT,
PidUsuarioPro INT
)
BEGIN
	INSERT producto (
	producto.idProducto,
	producto.nombreProducto,
	producto.desProducto,
	producto.precioUnitarioProducto,
	producto.stockRealProducto,
	producto.imagenProducto,
	producto.idMarca,
	producto.idCategoria,
	producto.idUsuario,
	producto.fechaAlojadoProducto,
	producto.statusProducto)
	VALUES(
	NULL,
	PnombrePro,
	PdesPro,
	PpreuniPro,
	PcanPro,
	PimagePro,
	PidMarcaPro,
	PidCategoriaPro,
	PidUsuarioPro,
	NOW(),
	'1'
	);
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertRoles`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertRoles`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertRoles`(PdesRol VARCHAR(150))
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "A OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;
	
IF EXISTS(SELECT rol.desRole FROM rol WHERE  rol.desRole = PdesRol) THEN 
		SELECT CONCAT('Rol Ya Existente: ', PdesRol) AS "Mensaje";
	ROLLBACK;
ELSE

			INSERT rol VALUES(
												NULL,
												UPPER(PdesRol),
												'1');
			COMMIT;
			SELECT CONCAT('Rol insertado con exito!!! ', PdesRol) AS "Aviso";			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertUsuario`(
PnombreUsu VARCHAR(200),
Pape1Usu VARCHAR(150),
Pape2Usu VARCHAR(150),
PemailUsu VARCHAR(245),
PfotoUsu VARCHAR(245),
PdireccionUsu VARCHAR(255),
PcodigoPostalUsu VARCHAR(5),
PtelefonoUsu VARCHAR(15),
PcontraUsu VARCHAR(16),
PConfircontraUsu VARCHAR(16),
PrfcUsu VARCHAR(13)
)
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "A OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;							
					
IF EXISTS(SELECT usuario.emailUsuario FROM usuario WHERE usuario.emailUsuario = PemailUsu) THEN 
		SELECT CONCAT('Usuario ya registrado con ese Email: ', PemailUsu)  AS "Mensaje";		
	ROLLBACK;
ELSE			
			INSERT usuario VALUES(
														NULL,
														PnombreUsu,
														Pape1Usu,
														Pape2Usu,
														PemailUsu,
														PfotoUsu,
														PdireccionUsu,
														PcodigoPostalUsu,
														PtelefonoUsu,
														PcontraUsu,
														PConfircontraUsu,
														NOW(),
														'1',
														PrfcUsu);
			COMMIT;
			SELECT CONCAT('Se a realizo con éxito tu registro!!!: ', PemailUsu)  AS "Aviso";
			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsertUsuariov1`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsertUsuariov1`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsertUsuariov1`(
PnombreUsu VARCHAR(200),
Pape1Usu VARCHAR(150),
PemailUsu VARCHAR(245),
PcontraUsu VARCHAR(16),
PConfircontraUsu VARCHAR(16),
PcodeEmail VARCHAR(21)
)
BEGIN
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN 			
		SELECT "A OCURRIDO UN ERROR" AS "AVISO";
	ROLLBACK;
	END;
	SET AUTOCOMMIT=0;							
					
IF EXISTS(SELECT usuario.emailUsuario FROM usuario WHERE usuario.emailUsuario = PemailUsu) THEN 
		SELECT CONCAT('Usuario ya registrado con ese Email: ', PemailUsu)  AS "Mensaje";		
	ROLLBACK;
ELSE				
			INSERT usuario (idUsuario,
								nombreUsuario,
								apellido1Usuario,
								emailUsuario,
								contraUsuario,
								confirmaContraUsuario,
								fechaRegistroUsuario,
								statusUsuario,
								codeActive)VALUES(
								NULL,
								PnombreUsu,
								Pape1Usu,
								PemailUsu,
								PcontraUsu,
								PConfircontraUsu,
								NOW(),
								'0',
								PcodeEmail	
								);
			COMMIT;
			SELECT CONCAT('Se a realizo con éxito tu registro!!!: ', PemailUsu)  AS "Aviso";
			
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psInsVenta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psInsVenta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psInsVenta`(
PclaveTran VARCHAR(250),
PpayDatos TEXT,
Pemail VARCHAR(250),
PtotalV FLOAT
)
BEGIN 

INSERT INTO venta (
	claveTransaccion, 
	paypalDatos, 
	fechaVenta, 
	correo, 
	totalVendido, 	
	statusVenta) 
VALUES (
PclaveTran,
PpayDatos,
NOW(),
Pemail,
PtotalV,
'1');
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psLoginUser`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psLoginUser`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psLoginUser`(IN Pcontra VARCHAR(16),IN PemailUsu VARCHAR(245))
BEGIN 
	SELECT CONCAT(usuario.nombreUsuario," ",usuario.apellido1Usuario) AS 'Nombre' ,
				usuario.emailUsuario AS 'Email',
				usuario.contraUsuario AS 'Contra'
FROM usuario WHERE usuario.contraUsuario = Pcontra AND usuario.emailUsuario = PemailUsu; 
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMarcaAct`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMarcaAct`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMarcaAct`()
BEGIN	
	SELECT marca.idMarca,marca.desMarca FROM marca WHERE marca.statusMarca = '1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosActProducto`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosActProducto`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosActProducto`(PidPro INT,PidUsu INT)
BEGIN 
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.desProducto,
	producto.precioUnitarioProducto,
	producto.imagenProducto,
	producto.stockRealProducto,
	marca.idMarca,
	marca.desMarca,
	categoria.idCategoria,
	categoria.desCategoria,
	producto.idUsuario
	FROM
	producto
	INNER JOIN marca ON marca.idMarca = producto.idMarca
	INNER JOIN categoria ON categoria.idCategoria = producto.idCategoria
	WHERE  producto.idProducto = PidPro  AND producto.idUsuario = PidUsu ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosActProImg`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosActProImg`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosActProImg`(PidUsuarioActProImg INT)
BEGIN
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.imagenProducto,
	imgproducto.img1,
	imgproducto.img2,
	imgproducto.img3,
	imgproducto.img4,
	imgproducto.idImgProducto,
	producto.idUsuario,
	producto.statusProducto,
	producto.stockRealProducto
	FROM producto
	INNER JOIN imgproducto ON producto.idProducto = imgproducto.idProducto
	WHERE  producto.idUsuario = PidUsuarioActProImg AND statusProducto= '1' AND producto.stockRealProducto >0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosActProImg4`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosActProImg4`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosActProImg4`(PidUsuarioActProImg INT)
BEGIN
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.imagenProducto,
	imgproducto.img1,
	imgproducto.img2,
	imgproducto.img3,
	imgproducto.img4	
	FROM producto
	INNER JOIN imgproducto ON producto.idProducto = imgproducto.idProducto
	WHERE  producto.idUsuario = PidUsuarioActProImg AND statusProducto= '1' AND producto.stockRealProducto >0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosActuImgsc`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosActuImgsc`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosActuImgsc`(PidProImg INT)
BEGIN

		SELECT
		imgproducto.idProducto,
		imgproducto.img1,
		imgproducto.img2,
		imgproducto.img3,
		imgproducto.img4,
		producto.nombreProducto,		
		producto.imagenProducto
		FROM
		producto
		INNER JOIN imgproducto ON imgproducto.idProducto = producto.idProducto
		WHERE  producto.idProducto = PidProImg;	
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosCliidU`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosCliidU`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosCliidU`(PidMosUsuaConpay INT)
BEGIN
	SELECT usuario.clienidpaypal  FROM usuario WHERE usuario.idUsuario= PidMosUsuaConpay;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosComenProdu`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosComenProdu`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosComenProdu`(PidProducto INT)
BEGIN
	SELECT
	CONCAT(usuario.nombreUsuario,' ',
			usuario.apellido1Usuario) AS Nombre,
	detaproductocomen.comentario,
	usuario.imagenUsuario,
	detaproductocomen.fecha
	FROM
	detaproductocomen
	INNER JOIN usuario ON usuario.idUsuario = detaproductocomen.idUsuario WHERE  detaproductocomen.idProducto = PidProducto;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosComentarioImagen`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosComentarioImagen`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosComentarioImagen`(PidProducto INT)
BEGIN
	SELECT	
	usuario.imagenUsuario	
	FROM
	detaproductocomen
	INNER JOIN usuario ON usuario.idUsuario = detaproductocomen.idUsuario WHERE  detaproductocomen.idProducto = PidProducto;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosComentarios`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosComentarios`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosComentarios`(PidProducto INT)
BEGIN
	SELECT
	usuario.emailUsuario AS usuario	
	FROM
	detaproductocomen
	INNER JOIN usuario ON usuario.idUsuario = detaproductocomen.idUsuario WHERE  detaproductocomen.idProducto = PidProducto;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosIDpCPAl`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosIDpCPAl`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosIDpCPAl`(idProMPaL INT)
BEGIN 
	SELECT
	usuario.clienidpaypal
	FROM
	usuario
	INNER JOIN producto ON usuario.idUsuario = producto.idUsuario
	WHERE producto.idProducto = idProMPaL;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosNomCliente`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosNomCliente`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosNomCliente`(PidVenta INT)
SELECT venta.correo AS 'Cliente' FROM Venta WHERE venta.FolioVenta = PidVenta
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProdaUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProdaUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProdaUsuario`(PidUsuario INT)
BEGIN 
			SELECT
			producto.idProducto,
			producto.nombreProducto AS 'Nombrw',
			producto.desProducto AS 'Descripcion',
			producto.precioUnitarioProducto AS '$ Unitario',
			producto.imagenProducto AS 'Imagen',
			producto.fechaAlojadoProducto AS 'Fecha',
			IF(producto.stockRealProducto = '0', 'Agotado',producto.stockRealProducto) AS 'Stock',						
			IF(producto.statusProducto = '1', 'Activo','Inactivo') AS 'Estatus',
			marca.desMarca AS 'Marca',
			categoria.desCategoria AS 'Categoria'
			FROM producto
			INNER JOIN categoria ON categoria.idCategoria = producto.idCategoria 
			INNER JOIN marca ON marca.idMarca = producto.idMarca
			WHERE producto.idUsuario = PidUsuario AND producto.statusProducto = 1 AND producto.stockRealProducto > 0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProdImgAgregar`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProdImgAgregar`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProdImgAgregar`(PidUsuarioAI INT)
BEGIN 
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.imagenProducto,
	producto.idUsuario
	FROM
	producto	
	WHERE producto.idUsuario = PidUsuarioAI AND producto.statusProducto = '1' AND producto.stockRealProducto >0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProducto`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProducto`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProducto`()
BEGIN 
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.desProducto,
	producto.precioUnitarioProducto,
	producto.imagenProducto,
	producto.stockRealProducto,
	producto.idUsuario
	FROM
	producto 
	WHERE producto.statusProducto = '1' AND producto.stockRealProducto >= 1;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProductoComple`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProductoComple`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProductoComple`(PidPro INT)
BEGIN 
		SELECT
		producto.idProducto,
		producto.nombreProducto,
		producto.desProducto,
		producto.precioUnitarioProducto,
		producto.imagenProducto,
		producto.fechaAlojadoProducto,
		producto.stockRealProducto,
		producto.statusProducto,
		marca.desMarca,
		categoria.desCategoria,
		CONCAT(usuario.nombreUsuario,' ', 
						usuario.apellido1Usuario) AS Vendedor,
						usuario.emailUsuario as 'Email Vendedor'
		FROM 
		producto
		INNER JOIN categoria ON categoria.idCategoria = producto.idCategoria
		INNER JOIN marca ON marca.idMarca = producto.idMarca
		INNER JOIN usuario ON usuario.idUsuario = producto.idUsuario
		WHERE producto.idProducto=PidPro;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProductoCompleImg`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProductoCompleImg`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProductoCompleImg`(PidProimg INT)
BEGIN 
		SELECT * FROM imgproducto WHERE idProducto = PidProimg;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProductoConUsu`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProductoConUsu`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProductoConUsu`(PidUsuMosNo INT)
BEGIN 
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.desProducto,
	producto.precioUnitarioProducto,
	producto.imagenProducto,
	producto.stockRealProducto,
	producto.idUsuario
	FROM
	producto 
	WHERE producto.statusProducto = '1' AND producto.stockRealProducto >= 1 AND producto.idUsuario <> PidUsuMosNo; 
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProductoConUsuFCPSU`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProductoConUsuFCPSU`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProductoConUsuFCPSU`(PidUM INT, PidMP INT)
BEGIN 
	SELECT
	producto.idProducto,
	producto.nombreProducto,
	producto.desProducto,
	producto.precioUnitarioProducto,
	producto.imagenProducto,
	producto.stockRealProducto,
	producto.idUsuario
	FROM
	producto 
	WHERE producto.statusProducto = '1' 
	AND producto.stockRealProducto >= 1 	
	AND producto.idUsuario = PidUM
	AND producto.idProducto <> PidMP; 
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosProIns`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosProIns`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosProIns`(PidPro INT,PidUsu INT)
BEGIN 
		SELECT
		producto.idProducto,
		producto.nombreProducto,
		producto.desProducto,
		producto.idUsuario
		FROM
		producto
		WHERE producto.idProducto = PidPro AND producto.idUsuario = PidUsu;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosTicket`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosTicket`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosTicket`(PidVenta INT)
SELECT
venta.correo AS 'Cliente',
producto.nombreProducto AS 'Producto',
carrito.precioUnitario AS 'Precio Unitario',
carrito.cantidadProducto AS 'Cantidad de Productos',
venta.totalVendido AS 'Total'
FROM carrito
INNER JOIN venta ON venta.FolioVenta = carrito.FolioVenta
INNER JOIN producto ON producto.idProducto = carrito.idProducto
WHERE venta.FolioVenta = PidVenta
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosTicketFechav`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosTicketFechav`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosTicketFechav`(PidVF INT)
BEGIN 
SELECT fechaVenta FROM venta WHERE FolioVenta = PidVF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosTicketProductos`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosTicketProductos`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosTicketProductos`(PidVenta INT)
SELECT
	producto.nombreProducto AS 'Producto',
	carrito.precioUnitario AS 'Precio Unitario',
	carrito.cantidadProducto AS 'Cantidad de Productos'
	FROM carrito
	INNER JOIN producto ON producto.idProducto = carrito.idProducto
	WHERE carrito.FolioVenta = PidVenta
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosTicketUsuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosTicketUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosTicketUsuario`(PidUsuNom INT)
BEGIN 
			SELECT CONCAT(nombreUsuario," ",
apellido1Usuario) AS nombre
FROM usuario WHERE usuario.idUsuario = PidUsuNom;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psMosTotalVenta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psMosTotalVenta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psMosTotalVenta`(PidVenta INT)
SELECT venta.totalVendido AS 'Total' FROM Venta WHERE venta.FolioVenta = PidVenta
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psSelectClientes`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psSelectClientes`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psSelectClientes`()
BEGIN
	SELECT
	usuario.idUsuario AS "No.",
	CONCAT(usuario.nombreUsuario," ",
					usuario.apellido1Usuario) AS 'Nombre',
	usuario.emailUsuario AS 'Correo',
	usuario.fechaRegistroUsuario AS 'Fecha de Registro',
	IF(usuario.statusUsuario = '1', 'Activo','Inactivo') AS 'Estado del Cliente'
	FROM usuario;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psSelectConCiplU`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psSelectConCiplU`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psSelectConCiplU`(PidUsuaConpay INT)
BEGIN
	SELECT COUNT(usuario.clienidpaypal)AS contador FROM usuario WHERE usuario.idUsuario= PidUsuaConpay;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psUpdateDaFa`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psUpdateDaFa`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psUpdateDaFa`(PidUsuario INT)
BEGIN 
SELECT usuario.idUsuario,
usuario.apellido2Usuario,
usuario.direccionUsuario,
usuario.codigoPostalUsuario,
usuario.telefonoUsuario,
usuario.rfeUsuario,
usuario.fechaNacimiento 
FROM usuario WHERE usuario.idUsuario = PidUsuario AND usuario.statusUsuario ='1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psUpdateImagenP`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psUpdateImagenP`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psUpdateImagenP`(
PidUser INT,
PimagenPro VARCHAR(245))
BEGIN 
UPDATE usuario SET usuario.imagenusuario = PimagenPro
WHERE usuario.idUsuario= PidUser AND usuario.statusUsuario = '1';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psUpdateUsuarioT`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psUpdateUsuarioT`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psUpdateUsuarioT`(
PnombreUAct varchar(200),
Papellido1UAct varchar(150),
Papellido2UAct varchar(150),
PcontraUAct varchar(16),
PconfirmcontraUAct varchar(16),
PtelUAct varchar(15),
PrfcUAct varchar(13),
PdireccionUAct varchar(245),
PcpUAct varchar(10),
PfechaUAct date,
PidUAct INT)
BEGIN
	UPDATE usuario SET 
	usuario.nombreUsuario = PnombreUAct,
	usuario.apellido1Usuario = Papellido1UAct,
	usuario.apellido2Usuario = Papellido2UAct,
	usuario.contraUsuario = PcontraUAct,
	usuario.confirmaContraUsuario = PconfirmcontraUAct,
	usuario.telefonoUsuario = PtelUAct,
	usuario.rfeUsuario = PrfcUAct,
	usuario.direccionUsuario = PdireccionUAct,
	usuario.codigoPostalUsuario = PcpUAct,
	usuario.fechaNacimiento = PfechaUAct
	WHERE usuario.idUsuario = PidUAct;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `psValidacionActivoE`
-- ----------------------------
DROP PROCEDURE IF EXISTS `psValidacionActivoE`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psValidacionActivoE`(Pcorreo VARCHAR(245), Pstatus VARCHAR (1))
BEGIN 
SELECT COUNT(usuario.emailUsuario) FROM usuario WHERE usuario.emailUsuario = Pcorreo AND usuario.statusUsuario = Pstatus;
END
;;
DELIMITER ;
