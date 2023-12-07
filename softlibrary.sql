-- Adminer 4.8.1 MySQL 8.0.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `softlibrary`;
CREATE DATABASE `softlibrary` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `softlibrary`;

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE `anuncios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_name` varchar(95) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `seo_message` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `anuncios` (`id`, `page_name`, `imagen`, `fecha_inicio`, `fecha_final`, `nombre`, `descripcion`, `seo_message`, `timestamp`) VALUES
(2,	'HOME',	'uploads/app_scaled_08_11_2023_06_59_07.jpg',	'2023-11-01',	'2023-11-09',	'BANNER_1',	'asd',	'asd',	'2023-11-08 18:59:07'),
(3,	'HOME',	'uploads/banner_autodesk_08_11_2023_06_59_18.webp',	'2023-11-08',	'2023-11-30',	'BANNER_2',	'asd',	'asd',	'2023-11-08 18:59:18'),
(4,	'HOME',	'uploads/office_banner_08_11_2023_06_59_27.webp',	'2023-11-08',	'2023-11-30',	'BANNER_3',	'asd',	'asd',	'2023-11-08 18:59:27'),
(5,	'HOME',	'uploads/fondo_library_08_11_2023_06_58_34_13_11_2023_06_25_07.jpg',	'2023-11-13',	'2023-11-16',	'ANUNCIO 4',	'asd',	'asd',	'2023-11-13 18:25:07');

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin',	1,	1698442047),
('Usuario',	2,	1698443403),
('Usuario',	3,	1698646409),
('Usuario',	4,	1698646396),
('Usuario',	5,	1698454098),
('Usuario',	6,	1699038589),
('Usuario',	7,	1699851850),
('Usuario',	8,	1699903591);

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`) VALUES
('/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/admin/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/admin/form-software',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/admin/index',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/db-explain',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/download-mail',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/index',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/toolbar',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/default/view',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/user/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/user/reset-identity',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/debug/user/set-identity',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/gii/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/action',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/diff',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/preview',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/gii/default/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/site/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/site/error',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/site/index',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/site/login',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/site/logout',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/site/register',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/software/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/software/index',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/user-management/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/bulk-activate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/bulk-deactivate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/bulk-delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/create',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/grid-page-size',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/grid-sort',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/toggle-attribute',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/update',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth-item-group/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/captcha',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/change-own-password',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/confirm-email',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/confirm-email-receive',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/confirm-registration-email',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/login',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/logout',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/password-recovery',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/password-recovery-receive',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/auth/registration',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/bulk-activate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/bulk-deactivate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/bulk-delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/create',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/grid-page-size',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/grid-sort',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/refresh-routes',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/set-child-permissions',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/set-child-routes',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/toggle-attribute',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/update',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/permission/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/bulk-activate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/bulk-deactivate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/bulk-delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/create',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/grid-page-size',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/grid-sort',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/set-child-permissions',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/set-child-roles',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/toggle-attribute',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/update',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/role/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-permission/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-permission/set',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-permission/set-roles',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/bulk-activate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/bulk-deactivate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/bulk-delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/create',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/grid-page-size',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/grid-sort',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/toggle-attribute',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/update',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user-visit-log/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/*',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/bulk-activate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/bulk-deactivate',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/bulk-delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/change-password',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/create',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/delete',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/grid-page-size',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/grid-sort',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/index',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/toggle-attribute',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/update',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/user-management/user/view',	3,	NULL,	NULL,	NULL,	1426062189,	1426062189,	NULL),
('/usuario/*',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('/usuario/index',	3,	NULL,	NULL,	NULL,	1698442989,	1698442989,	NULL),
('Admin',	1,	'Admin',	NULL,	NULL,	1426062189,	1426062189,	NULL),
('Admin_Permision',	2,	'Admin_Permision',	NULL,	NULL,	1698451719,	1698451719,	NULL),
('Usuario',	1,	'Usuario',	NULL,	NULL,	1698442925,	1698449706,	NULL),
('Usuario_permision',	2,	'Usuario_permision',	NULL,	NULL,	1698451588,	1698451588,	NULL);

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin_Permision',	'/admin/*'),
('Admin_Permision',	'/debug/*'),
('Admin_Permision',	'/gii/*'),
('Admin_Permision',	'/site/*'),
('Usuario_permision',	'/site/*'),
('Admin_Permision',	'/software/*'),
('Usuario_permision',	'/software/*'),
('Admin_Permision',	'/user-management/*'),
('Usuario_permision',	'/usuario/*'),
('Admin',	'Admin_Permision'),
('Usuario',	'Usuario_permision');

DROP TABLE IF EXISTS `auth_item_group`;
CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1,	'Software de Edición'),
(2,	'Software de Oficina'),
(3,	'Software de Desarrollo'),
(4,	'Software de Diseño y Multimedia'),
(5,	'Software de Productividad'),
(6,	'Software de Seguridad'),
(7,	'Software de Sistemas Operativos'),
(8,	'Software de Navegación y Comunicación'),
(9,	'Software de Entretenimiento'),
(10,	'Software de Educación');

DROP TABLE IF EXISTS `desarrollador`;
CREATE TABLE `desarrollador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `biografia` text NOT NULL,
  `sitio_web` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `desarrollador` (`id`, `nombre`, `biografia`, `sitio_web`) VALUES
(1,	'Microsoft',	'Microsoft Corporation es una corporación tecnológica multinacional estadounidense con sede en Redmond, Washington.',	'www.microsoft.com');

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE `favorito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `software_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favoritos_user1_idx` (`user_id`),
  KEY `fk_favoritos_software1_idx` (`software_id`),
  CONSTRAINT `fk_favoritos_software1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  CONSTRAINT `fk_favoritos_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `favorito` (`id`, `user_id`, `software_id`, `created_at`) VALUES
(9,	2,	10,	'2023-11-08 06:00:00'),
(10,	7,	7,	'2023-11-13 06:00:00'),
(12,	1,	1,	'2023-11-13 06:00:00');

DROP TABLE IF EXISTS `informacion`;
CREATE TABLE `informacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `version` decimal(10,2) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `requisitos` text NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `desarrollador_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_informacion_desarrollador1_idx` (`desarrollador_id`),
  CONSTRAINT `fk_informacion_desarrollador1` FOREIGN KEY (`desarrollador_id`) REFERENCES `desarrollador` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `informacion` (`id`, `descripcion`, `version`, `fecha_lanzamiento`, `requisitos`, `enlace`, `desarrollador_id`) VALUES
(1,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(2,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(3,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(4,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(5,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(6,	'Office l',	2019.00,	'2019-10-10',	'pruebas',	'office.com',	1),
(7,	'Nero-Platinum-365',	2019.00,	'2019-10-10',	'Nero-Platinum-365',	'office.com',	1),
(8,	'Wabelab',	2019.00,	'2019-10-10',	'Wabelab',	'office.com',	1),
(9,	'Wabelab',	2019.00,	'2019-10-10',	'Wabelab',	'office.com',	1),
(10,	'Wabelab',	2019.00,	'2019-10-10',	'Wabelab',	'office.com',	1),
(11,	'Wabelab',	2019.00,	'2019-10-10',	'Wabelab',	'office.com',	1),
(12,	'Wabelab',	2019.00,	'2019-10-10',	'Wabelab',	'office.com',	1),
(13,	'asd',	12.00,	'2023-11-08',	'sd',	'asd',	1),
(22,	'ASDASD',	12.00,	'2023-11-13',	'ASDASD',	'#',	1),
(23,	'ASDASD',	12.00,	'2023-11-13',	'ASDASD',	'#',	1),
(24,	'ASDASD',	12.00,	'2023-11-13',	'ASDASD',	'#',	1);

DROP TABLE IF EXISTS `licencia`;
CREATE TABLE `licencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `licencia` (`id`, `nombre`, `descripcion`) VALUES
(1,	'Gratuito',	'Libre'),
(2,	'Con lincencia',	'Lincenciado'),
(3,	'Pago unico',	'Unico costo');

DROP TABLE IF EXISTS `puntuaje`;
CREATE TABLE `puntuaje` (
  `id` int NOT NULL AUTO_INCREMENT,
  `puntuacion` varchar(5) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `software_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_puntuaje_sfotware1_idx` (`software_id`),
  CONSTRAINT `fk_puntuaje_sfotware1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fotografia` varchar(255) NOT NULL,
  `licencia_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `informacion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sfotware_licencia1_idx` (`licencia_id`),
  KEY `fk_sfotware_categoria1_idx` (`categoria_id`),
  KEY `fk_software_informacion1_idx` (`informacion_id`),
  CONSTRAINT `fk_sfotware_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_sfotware_licencia1` FOREIGN KEY (`licencia_id`) REFERENCES `licencia` (`id`),
  CONSTRAINT `fk_software_informacion1` FOREIGN KEY (`informacion_id`) REFERENCES `informacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `software` (`id`, `nombre`, `precio`, `fotografia`, `licencia_id`, `categoria_id`, `informacion_id`) VALUES
(1,	'Office2222',	1000.00,	'uploads/office_365_caratula_2_28_10_2023_02_06_39.jpg',	2,	2,	1),
(2,	'Office',	1000.00,	'uploads/office_365_caratula_2_28_10_2023_02_07_32.jpg',	2,	2,	2),
(3,	'Office 2',	1000.00,	'uploads/office_365_caratula_28_10_2023_02_07_45.webp',	2,	2,	3),
(4,	'Office 2',	1000.00,	'uploads/office_365_caratula_28_10_2023_02_07_55.webp',	2,	2,	4),
(5,	'Office 2',	1000.00,	'uploads/office_365_caratula_2_28_10_2023_02_07_59.jpg',	2,	2,	5),
(6,	'Office 2',	1000.00,	'uploads/office_365_caratula_28_10_2023_02_08_06.webp',	2,	2,	6),
(7,	'Nero-Platinum-365',	1000.00,	'uploads/Nero-Platinum-365_28_10_2023_02_09_46.webp',	1,	1,	7),
(8,	'Wabelab',	1000.00,	'uploads/1458126523Steinberg_WaveLab_Pro_9_28_10_2023_02_10_50.webp',	1,	1,	8),
(9,	'Wabelab',	1000.00,	'uploads/Software_Box_Mockup_3_BG_28_10_2023_02_14_02.jpg',	1,	1,	9),
(10,	'Wabelab3',	1000.00,	'uploads/Software-Product-Box-PSD-Mockup_28_10_2023_02_14_07.jpg',	1,	1,	10),
(11,	'Mockup',	1000.00,	'uploads/Software_Box_Mockup_4_28_10_2023_02_14_14.jpg',	1,	1,	11),
(12,	'Mockup',	1000.00,	'uploads/Software_Box_Mockup_2-2-uai-860x602_28_10_2023_02_14_26.jpg',	1,	1,	12),
(14,	'ASDASDASD',	12.00,	'uploads/Nero-Platinum-365_28_10_2023_02_09_46_13_11_2023_06_23_31.webp',	1,	3,	22),
(15,	'ASDASDASD',	12.00,	'uploads/Nero-Platinum-365_28_10_2023_02_09_46_13_11_2023_06_24_17.webp',	1,	3,	23),
(16,	'ASDASDASD',	121212.00,	'uploads/Software_Box_Mockup_3_BG_28_10_2023_02_14_02_13_11_2023_06_24_34.jpg',	1,	3,	24);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fotografia` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `superadmin` smallint DEFAULT '0',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `email_confirmed` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `user` (`id`, `username`, `fotografia`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`) VALUES
(1,	'superadmin',	NULL,	'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF',	'$2y$13$m2OjiYGHGWc6i7Alq.9iFOxY75mNtLvILMG.zAgABKQBR7JTG7rJ2',	NULL,	1,	1,	1426062188,	1698452723,	NULL,	'',	'superadmin@gmail.com',	0),
(2,	'usuario',	NULL,	'EaKSTHYUXV8HG8UitDfBwOZDeKDr-zEB',	'$2y$13$n8RZgXylC67PMUouAZ94qeVOKFe4cBs9xrZJADo2ILGXZfC8u0BK2',	NULL,	1,	0,	1698442871,	1698449754,	'127.0.0.1',	'',	'usuario@gmail.com',	0),
(3,	'usaurio',	NULL,	'oEGd-sOHie42uoXG9rK-RN7bTfDk_RhL',	'$2y$13$m0w6JWNxJbn9pC5FOfb4lu2h52R.xL0dVtnasd6ffj66NqT45Dl8K',	NULL,	1,	0,	1698453688,	1698453688,	'127.0.0.1',	'',	'usuario2@gmail.com',	0),
(4,	'usuario3',	NULL,	'AN3fyMuXsJdqV1_gni8_qb83sHFbROR9',	'$2y$13$lGB9GJYHApvUIJpa8u67sO718OsCckzU41J0SjaBg9ZzIqYAv2Rbe',	NULL,	1,	0,	1698453789,	1698453789,	'127.0.0.1',	'',	'usuario3@gmail.com',	0),
(5,	'usuario4',	NULL,	'c24PkK7GX2zHASSXbLM41vDd-9gFYY6i',	'$2y$13$KEupAWbM.tTNffc0ksCEq.xtfT0aEzhlWN0p3HR2e8DvuEgjvIFXa',	NULL,	1,	0,	1698454098,	1698454098,	'127.0.0.1',	'',	'usuario4@gmail.com',	0),
(6,	'usuario',	NULL,	'AqFsHaJvG1C1vzV9qae4_XNSoBSzFGLd',	'$2y$13$R1KM6xMTzoczpgxt/8r9e.aJPRtmZ6RtLXgrL2by2zlwtGyEuH4x6',	NULL,	1,	0,	1699038589,	1699038589,	'127.0.0.1',	'',	'pruebas3@gmail.com',	0),
(7,	'usuario5',	NULL,	'G4NuUznXCnlG7kJBX8eY4LOUz_bvFCNC',	'$2y$13$hf.k0D9CSXDO6Z6LdOKLNer/WMYoGfK61HWbHpgeFebCQ8vwio1TG',	NULL,	1,	0,	1699851850,	1699851850,	'127.0.0.1',	'',	'usuario5@gmail.com',	0),
(8,	'prueba',	'uploads/Software_Box_Mockup_3_BG_28_10_2023_02_14_02_13_11_2023_07_26_30.jpg',	'dDIIrpKJJ4rEbi37EYDbtOzhJDtxrmpy',	'$2y$13$hf.k0D9CSXDO6Z6LdOKLNer/WMYoGfK61HWbHpgeFebCQ8vwio1TG',	NULL,	1,	0,	1699903591,	1699903591,	'127.0.0.1',	'',	'prueba222@gmail.com',	0);

DROP TABLE IF EXISTS `user_visit_log`;
CREATE TABLE `user_visit_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `visit_time` int NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(1,	'653c289379284',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698441363,	'Chrome',	'Windows'),
(2,	'653c304e6f1b3',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	2,	1698443342,	'Chrome',	'Windows'),
(3,	'653c30ab68e5a',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	2,	1698443435,	'Chrome',	'Windows'),
(4,	'653c3d714259f',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698446705,	'Chrome',	'Windows'),
(5,	'653c4046b87de',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698447430,	'Chrome',	'Windows'),
(6,	'653c4118655e7',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698447640,	'Chrome',	'Windows'),
(7,	'653c416468875',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698447716,	'Chrome',	'Windows'),
(8,	'653c41cbd4b0c',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698447819,	'Chrome',	'Windows'),
(9,	'653c431574760',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698448149,	'Chrome',	'Windows'),
(10,	'653c449c6013d',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698448540,	'Chrome',	'Windows'),
(11,	'653c452a54539',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698448682,	'Chrome',	'Windows'),
(12,	'653c456629a82',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698448742,	'Chrome',	'Windows'),
(13,	'653c457e2dedf',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698448766,	'Chrome',	'Windows'),
(14,	'653c476c56014',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698449260,	'Chrome',	'Windows'),
(15,	'653c4af07178d',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	2,	1698450160,	'Chrome',	'Windows'),
(16,	'653c50b600541',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	2,	1698451638,	'Chrome',	'Windows'),
(17,	'653c5159aef21',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	1,	1698451801,	'Chrome',	'Windows'),
(18,	'653c53e7269e9',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	2,	1698452455,	'Chrome',	'Windows'),
(19,	'653c540b9a5b9',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	1,	1698452491,	'Chrome',	'Windows'),
(20,	'653c54d0c7e65',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	1,	1698452688,	'Chrome',	'Windows'),
(21,	'653c55d27f235',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698452946,	'Chrome',	'Windows'),
(22,	'653c560071798',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698452992,	'Chrome',	'Windows'),
(23,	'653c56f254c61',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69',	1,	1698453234,	'Chrome',	'Windows'),
(24,	'653c5936c05ca',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	4,	1698453814,	'Chrome',	'Windows'),
(25,	'653c5a6f0f79d',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	5,	1698454127,	'Chrome',	'Windows'),
(26,	'653c5ad78169d',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698454231,	'Chrome',	'Windows'),
(27,	'653c5b9f71362',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698454431,	'Chrome',	'Windows'),
(28,	'653c5be96d526',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698454505,	'Chrome',	'Windows'),
(29,	'653c764fd0340',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698461263,	'Chrome',	'Windows'),
(30,	'653c76aaa484a',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698461354,	'Chrome',	'Windows'),
(31,	'653c76c7dc97a',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698461383,	'Chrome',	'Windows'),
(32,	'653f48f6a2117',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	2,	1698646262,	'Chrome',	'Windows'),
(33,	'653f493680346',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',	1,	1698646326,	'Chrome',	'Windows'),
(34,	'6545383e761ba',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76',	2,	1699035198,	'Chrome',	'Windows'),
(35,	'65454592ee4bf',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76',	2,	1699038610,	'Chrome',	'Windows'),
(36,	'6549813d41674',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699316029,	'Chrome',	'Windows'),
(37,	'654b2abe69a25',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699424958,	'Chrome',	'Windows'),
(38,	'654b2b738cac4',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0',	2,	1699425139,	'Chrome',	'Windows'),
(39,	'654b2bb2a84bc',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0',	2,	1699425202,	'Chrome',	'Windows'),
(40,	'654bc90b3eb89',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699465483,	'Chrome',	'Windows'),
(41,	'654bc90ba40ee',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699465483,	'Chrome',	'Windows'),
(42,	'6551ae57b6ddb',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	7,	1699851863,	'Chrome',	'Windows'),
(43,	'6551ae764808e',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699851894,	'Chrome',	'Windows'),
(44,	'655258e2a55f3',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699895522,	'Chrome',	'Windows'),
(45,	'6552689537532',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	2,	1699899541,	'Chrome',	'Windows'),
(46,	'6552691c8304e',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	1,	1699899676,	'Chrome',	'Windows'),
(47,	'655278abf3013',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	8,	1699903659,	'Chrome',	'Windows'),
(48,	'6552a76dbf410',	'127.0.0.1',	'es',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',	8,	1699915629,	'Chrome',	'Windows');

DROP VIEW IF EXISTS `vw_detalle_software`;
CREATE TABLE `vw_detalle_software` (`id` int, `nombre` varchar(75), `precio` decimal(10,2), `fotografia` varchar(255), `informacion_id` int, `licencia_id` int, `categoria_id` int, `idInformacion` int, `descripcion` text, `version` decimal(10,2), `fecha_lanzamiento` date, `requisitos` text, `enlace` varchar(255), `desarrollador_id` int, `idDesarrollador` int, `desarrollador_nombre` varchar(75), `biografia` text, `sitio_web` varchar(255), `idCategoria` int, `categoria_nombre` varchar(155), `idLicencia` int, `licencia` varchar(85), `licencia_descripcion` varchar(150));


DROP TABLE IF EXISTS `vw_detalle_software`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_detalle_software` AS select `software`.`id` AS `id`,`software`.`nombre` AS `nombre`,`software`.`precio` AS `precio`,`software`.`fotografia` AS `fotografia`,`software`.`informacion_id` AS `informacion_id`,`software`.`licencia_id` AS `licencia_id`,`software`.`categoria_id` AS `categoria_id`,`inf`.`id` AS `idInformacion`,`inf`.`descripcion` AS `descripcion`,`inf`.`version` AS `version`,`inf`.`fecha_lanzamiento` AS `fecha_lanzamiento`,`inf`.`requisitos` AS `requisitos`,`inf`.`enlace` AS `enlace`,`inf`.`desarrollador_id` AS `desarrollador_id`,`des`.`id` AS `idDesarrollador`,`des`.`nombre` AS `desarrollador_nombre`,`des`.`biografia` AS `biografia`,`des`.`sitio_web` AS `sitio_web`,`categoria`.`id` AS `idCategoria`,`categoria`.`nombre` AS `categoria_nombre`,`lic`.`id` AS `idLicencia`,`lic`.`nombre` AS `licencia`,`lic`.`descripcion` AS `licencia_descripcion` from ((((`software` join `informacion` `inf` on((`inf`.`id` = `software`.`informacion_id`))) join `desarrollador` `des` on((`des`.`id` = `inf`.`desarrollador_id`))) join `categoria` on((`categoria`.`id` = `software`.`categoria_id`))) join `licencia` `lic` on((`lic`.`id` = `software`.`licencia_id`)));

-- 2023-12-07 07:33:12
