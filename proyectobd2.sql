/*
Navicat MySQL Data Transfer

Source Server         : MyServer
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : proyectobd2

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2018-06-30 15:50:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id_usuario` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_administrador_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for carta
-- ----------------------------
DROP TABLE IF EXISTS `carta`;
CREATE TABLE `carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imgUrl` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for clase_carta
-- ----------------------------
DROP TABLE IF EXISTS `clase_carta`;
CREATE TABLE `clase_carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `precio_c` int(11) NOT NULL,
  `precio_v` int(11) DEFAULT NULL,
  `probabilidad` double NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for clase_carta_carta
-- ----------------------------
DROP TABLE IF EXISTS `clase_carta_carta`;
CREATE TABLE `clase_carta_carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_carta` bigint(20) unsigned NOT NULL,
  `id_clase` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clase_carta_carta` (`id_carta`,`id_clase`),
  KEY `fk_clase_clase` (`id_clase`),
  CONSTRAINT `fk_clase_carta` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_clase_clase` FOREIGN KEY (`id_clase`) REFERENCES `clase_carta` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detalles_intercambio
-- ----------------------------
DROP TABLE IF EXISTS `detalles_intercambio`;
CREATE TABLE `detalles_intercambio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jugador` bigint(20) unsigned NOT NULL,
  `id_carta` bigint(20) unsigned NOT NULL,
  `id_intercambio` bigint(20) unsigned NOT NULL,
  `dinero` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jugador_carta_intercambio` (`id_jugador`,`id_carta`,`id_intercambio`),
  KEY `fk_oferta_carta` (`id_carta`),
  KEY `fk_oferta_intercambio` (`id_intercambio`),
  CONSTRAINT `fk_oferta_carta` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_oferta_intercambio` FOREIGN KEY (`id_intercambio`) REFERENCES `intercambio` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for intercambio
-- ----------------------------
DROP TABLE IF EXISTS `intercambio`;
CREATE TABLE `intercambio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_jugador1` bigint(20) unsigned NOT NULL,
  `id_jugador2` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jugador1_intercambio` (`id_jugador1`),
  KEY `fk_jugador2_intercambio` (`id_jugador2`),
  CONSTRAINT `fk_jugador1_intercambio` FOREIGN KEY (`id_jugador1`) REFERENCES `jugador` (`id_usuario`) ON UPDATE CASCADE,
  CONSTRAINT `fk_jugador2_intercambio` FOREIGN KEY (`id_jugador2`) REFERENCES `jugador` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jugador
-- ----------------------------
DROP TABLE IF EXISTS `jugador`;
CREATE TABLE `jugador` (
  `id_usuario` bigint(20) unsigned NOT NULL,
  `dinero` int(11) NOT NULL DEFAULT '2000',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_jugador_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jugador_compra_sobre
-- ----------------------------
DROP TABLE IF EXISTS `jugador_compra_sobre`;
CREATE TABLE `jugador_compra_sobre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jugador` bigint(20) unsigned NOT NULL,
  `id_sobre` bigint(20) unsigned NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_jugador_sobre` (`id_jugador`,`id_sobre`,`fecha`),
  KEY `fk_compra_sobre` (`id_sobre`),
  CONSTRAINT `fk_compra_sobre` FOREIGN KEY (`id_sobre`) REFERENCES `sobre` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_jugador_compra` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jugador_posee_carta
-- ----------------------------
DROP TABLE IF EXISTS `jugador_posee_carta`;
CREATE TABLE `jugador_posee_carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jugador` bigint(20) unsigned NOT NULL,
  `id_carta` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jugador_carta` (`id_jugador`,`id_carta`),
  KEY `fk_posee_carta` (`id_carta`),
  CONSTRAINT `fk_jugador_posee` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id_usuario`) ON UPDATE CASCADE,
  CONSTRAINT `fk_posee_carta` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sobre
-- ----------------------------
DROP TABLE IF EXISTS `sobre`;
CREATE TABLE `sobre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL DEFAULT '100',
  `cant_cartas` int(11) NOT NULL DEFAULT '3',
  `imgUrl` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_clase` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `fk_sobre_clase_carta` (`id_clase`),
  CONSTRAINT `fk_sobre_clase_carta` FOREIGN KEY (`id_clase`) REFERENCES `clase_carta` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- View structure for usuarios_jugadores
-- ----------------------------
DROP VIEW IF EXISTS `usuarios_jugadores`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `usuarios_jugadores` AS SELECT
	usuario.*, jugador.dinero
FROM
	usuario
INNER JOIN jugador ON jugador.id_usuario = usuario.id ;

-- ----------------------------
-- Procedure structure for respaldar_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `respaldar_usuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `respaldar_usuario`(out days int)
begin 
	-- RESPALDO DE LA TABLA DE USUARIOS
	insert into respaldobd2.usuario(id_usuario, email, password,role) select id,email,password,role from proyectobd2.usuario where proyectobd2.usuario.updated_at BETWEEN now() and DATE_SUB(now(),INTERVAL days day);
	-- RESPALDO DE LA TABLA DE JUGADORES
	 insert into respaldobd2.jugador(id_jugador, dinero) select id_usuario, dinero  from proyectobd2.jugador where proyectobd2.jugador.updated_at BETWEEN now() and DATE_SUB(now(),INTERVAL days day);
	
end
;;
DELIMITER ;

-- ----------------------------
-- Event structure for respaldar_usuario
-- ----------------------------
DROP EVENT IF EXISTS `respaldar_usuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `respaldar_usuario` ON SCHEDULE EVERY 3 DAY STARTS '2018-05-29 12:31:02' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'respaldar los usuarios' DO CALL respaldar_usuario(3)
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `respaldo_insert_carta`;
DELIMITER ;;
CREATE TRIGGER `respaldo_insert_carta` AFTER INSERT ON `carta` FOR EACH ROW insert into respaldobd2.carta(id_carta,imgUrl,imgFd,nombre) values (new.id, new.imgUrl,new.imgFd,new.nombre)
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `respaldo_update_carta`;
DELIMITER ;;
CREATE TRIGGER `respaldo_update_carta` AFTER UPDATE ON `carta` FOR EACH ROW insert into respaldobd2.carta(id_carta,imgUrl,imgFd,nombre) values (new.id, new.imgUrl,new.imgFd,new.nombre)
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `respaldo_delete_carta`;
DELIMITER ;;
CREATE TRIGGER `respaldo_delete_carta` AFTER DELETE ON `carta` FOR EACH ROW insert into respaldobd2.carta(id_carta,imgUrl,imgFd,nombre,deleted_at) values (old.id, old.imgUrl,old.imgFd,old.nombre, now())
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `establecer_precio_clase_carta`;
DELIMITER ;;
CREATE TRIGGER `establecer_precio_clase_carta` BEFORE INSERT ON `clase_carta` FOR EACH ROW set new.precio_v = new.precio_c/4
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `validar_usuario_intercambio`;
DELIMITER ;;
CREATE TRIGGER `validar_usuario_intercambio` BEFORE INSERT ON `detalles_intercambio` FOR EACH ROW BEGIN

IF new.id_jugador NOT IN (
	SELECT
		usuario.id
	FROM
		usuario
	INNER JOIN intercambio ON intercambio.id_jugador1 = usuario.id
	OR intercambio.id_jugador2 = usuario.id
	WHERE
		intercambio.id = new.id_intercambio
) THEN

SET new.id = 'este usuario no participa en el intercambio';
END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `respaldo_insert_sobre`;
DELIMITER ;;
CREATE TRIGGER `respaldo_insert_sobre` AFTER INSERT ON `sobre` FOR EACH ROW insert into respaldobd2.sobre(id_sobre,precio,cant_cartas,imgUrl,imgFd,nombre,id_clase) values (new.id,new.precio,new.cant_cartas,new.imgUrl,new.imgFd,new.nombre,new.id_clase)
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `respaldo_update_sobre`;
DELIMITER ;;
CREATE TRIGGER `respaldo_update_sobre` AFTER UPDATE ON `sobre` FOR EACH ROW insert into respaldobd2.sobre(id_sobre,precio,cant_cartas,imgUrl,imgFd,nombre,id_clase) values (new.id,new.precio,new.cant_cartas,new.imgUrl,new.imgFd,new.nombre,new.id_clase)
;;
DELIMITER ;
