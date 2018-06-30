/*
Navicat MySQL Data Transfer

Source Server         : MyServer
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : respaldobd2

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2018-06-30 15:51:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for carta
-- ----------------------------
DROP TABLE IF EXISTS `carta`;
CREATE TABLE `carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_carta` bigint(20) unsigned DEFAULT NULL,
  `imgUrl` varchar(20) DEFAULT NULL,
  `imgFd` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for clase_carta
-- ----------------------------
DROP TABLE IF EXISTS `clase_carta`;
CREATE TABLE `clase_carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_clase` bigint(20) unsigned DEFAULT NULL,
  `precio_c` int(11) DEFAULT NULL,
  `precio_v` int(11) DEFAULT NULL,
  `probabilidad` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for clase_carta_carta
-- ----------------------------
DROP TABLE IF EXISTS `clase_carta_carta`;
CREATE TABLE `clase_carta_carta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_carta` bigint(20) unsigned DEFAULT NULL,
  `id_clase` bigint(20) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for jugador
-- ----------------------------
DROP TABLE IF EXISTS `jugador`;
CREATE TABLE `jugador` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jugador` bigint(20) unsigned DEFAULT NULL,
  `dinero` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sobre
-- ----------------------------
DROP TABLE IF EXISTS `sobre`;
CREATE TABLE `sobre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sobre` bigint(20) unsigned DEFAULT NULL,
  `precio` int(11) NOT NULL DEFAULT '100',
  `cant_cartas` int(11) NOT NULL DEFAULT '3',
  `imgUrl` varchar(20) DEFAULT NULL,
  `imgFd` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_clase` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  UNIQUE KEY `id_sobre` (`id_sobre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) unsigned DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
