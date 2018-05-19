-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla banco.chequera
CREATE TABLE IF NOT EXISTS `chequera` (
  `nro_chequera` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio_talonario` double NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `nro_cuenta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`nro_chequera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.chequera: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `chequera` DISABLE KEYS */;
INSERT INTO `chequera` (`nro_chequera`, `cantidad`, `precio_talonario`, `estado`, `fecha_expiracion`, `nro_cuenta`) VALUES
	(1, 20, 100, 'Habilitado', '2020-05-08', 7),
	(2, 30, 170, 'Habilitado', '2021-03-08', 8);
/*!40000 ALTER TABLE `chequera` ENABLE KEYS */;

-- Volcando estructura para tabla banco.cliente_juridico
CREATE TABLE IF NOT EXISTS `cliente_juridico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` int(11) NOT NULL,
  `nombre_comercial` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo_empresa` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_constitucion` date NOT NULL,
  `vencimiento_poder` date NOT NULL,
  `id_rubro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cliente_juridico_rubro` (`id_rubro`),
  CONSTRAINT `FK_cliente_juridico_persona` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cliente_juridico_rubro` FOREIGN KEY (`id_rubro`) REFERENCES `rubro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.cliente_juridico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente_juridico` DISABLE KEYS */;
INSERT INTO `cliente_juridico` (`id`, `nit`, `nombre_comercial`, `tipo_empresa`, `fecha_constitucion`, `vencimiento_poder`, `id_rubro`) VALUES
	(3, 10253687, 'Terra Casa', 'S.A', '1952-05-08', '2023-05-08', 1);
/*!40000 ALTER TABLE `cliente_juridico` ENABLE KEYS */;

-- Volcando estructura para tabla banco.cliente_natural
CREATE TABLE IF NOT EXISTS `cliente_natural` (
  `id` int(11) NOT NULL,
  `nom_empleo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `dir_empleo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_ocupacion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cliente_natural_ocupacion` (`id_ocupacion`),
  CONSTRAINT `FK__persona` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cliente_natural_ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.cliente_natural: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente_natural` DISABLE KEYS */;
INSERT INTO `cliente_natural` (`id`, `nom_empleo`, `dir_empleo`, `id_ocupacion`) VALUES
	(2, 'Electronic-Ing', 'Av. Centenario', 1);
/*!40000 ALTER TABLE `cliente_natural` ENABLE KEYS */;

-- Volcando estructura para tabla banco.cre_garante
CREATE TABLE IF NOT EXISTS `cre_garante` (
  `id_garante` int(11) NOT NULL,
  `id_credito` int(11) NOT NULL,
  PRIMARY KEY (`id_garante`,`id_credito`),
  KEY `FK__d_credito` (`id_credito`),
  CONSTRAINT `FK__d_credito` FOREIGN KEY (`id_credito`) REFERENCES `d_credito` (`id`),
  CONSTRAINT `FK__garante` FOREIGN KEY (`id_garante`) REFERENCES `garante` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla banco.cre_garante: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cre_garante` DISABLE KEYS */;
INSERT INTO `cre_garante` (`id_garante`, `id_credito`) VALUES
	(10, 1),
	(13, 2),
	(15, 2),
	(16, 4),
	(9, 5),
	(11, 5),
	(12, 5);
/*!40000 ALTER TABLE `cre_garante` ENABLE KEYS */;

-- Volcando estructura para tabla banco.cuenta
CREATE TABLE IF NOT EXISTS `cuenta` (
  `nro_cuenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto_apertura` int(10) NOT NULL DEFAULT '0',
  `fecha_apertura` date NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  `id_user` int(11) unsigned NOT NULL,
  PRIMARY KEY (`nro_cuenta`),
  KEY `FK_cuenta_users` (`id_user`),
  CONSTRAINT `FK_cuenta_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.cuenta: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`nro_cuenta`, `monto_apertura`, `fecha_apertura`, `tipo`, `moneda`, `estado`, `id_user`) VALUES
	(4, 200, '2018-05-08', 'Eficaz', 'bolivianos', 'Inhabilitado', 1),
	(7, 100, '2018-05-08', 'Corriente', 'dolares', 'Inhabilitado', 1),
	(8, 700, '2018-05-08', 'Corriente', 'bolivianos', 'Inhabilitado', 1),
	(9, 70000, '2018-05-09', 'DepositoFijo', 'bolivianos', 'Inhabilitado', 1),
	(10, 2520, '2018-05-09', 'DepositoFijo', 'bolivianos', 'Inhabilitado', 1);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla banco.cuenta_ahorro
CREATE TABLE IF NOT EXISTS `cuenta_ahorro` (
  `nro_cuenta` int(10) unsigned NOT NULL,
  `tasa` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`nro_cuenta`),
  CONSTRAINT `FK__cuenta` FOREIGN KEY (`nro_cuenta`) REFERENCES `cuenta` (`nro_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.cuenta_ahorro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta_ahorro` DISABLE KEYS */;
INSERT INTO `cuenta_ahorro` (`nro_cuenta`, `tasa`) VALUES
	(4, '3.0%');
/*!40000 ALTER TABLE `cuenta_ahorro` ENABLE KEYS */;

-- Volcando estructura para tabla banco.deposito_fijo
CREATE TABLE IF NOT EXISTS `deposito_fijo` (
  `nro_cuenta` int(11) unsigned NOT NULL,
  `tasa` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `plazo` int(11) NOT NULL,
  PRIMARY KEY (`nro_cuenta`),
  CONSTRAINT `FK_deposito_fijo_cuenta` FOREIGN KEY (`nro_cuenta`) REFERENCES `cuenta` (`nro_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.deposito_fijo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `deposito_fijo` DISABLE KEYS */;
INSERT INTO `deposito_fijo` (`nro_cuenta`, `tasa`, `plazo`) VALUES
	(9, '0.18%', 30),
	(10, '4.10%', 2520);
/*!40000 ALTER TABLE `deposito_fijo` ENABLE KEYS */;

-- Volcando estructura para tabla banco.detalle_cuenta
CREATE TABLE IF NOT EXISTS `detalle_cuenta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nro_cuenta` int(10) unsigned NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id`,`nro_cuenta`),
  KEY `FK_detalle_cuenta_cuenta` (`nro_cuenta`),
  KEY `FK_detalle_cuenta_persona` (`id_persona`),
  CONSTRAINT `FK_detalle_cuenta_cuenta` FOREIGN KEY (`nro_cuenta`) REFERENCES `cuenta` (`nro_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detalle_cuenta_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.detalle_cuenta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_cuenta` DISABLE KEYS */;
INSERT INTO `detalle_cuenta` (`id`, `nro_cuenta`, `id_persona`) VALUES
	(1, 4, 2),
	(2, 7, 2),
	(3, 8, 2),
	(4, 9, 2),
	(5, 10, 2);
/*!40000 ALTER TABLE `detalle_cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla banco.d_credito
CREATE TABLE IF NOT EXISTS `d_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_t_cre` int(11) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `plazo` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__t_credito` (`id_t_cre`),
  KEY `FK_d_credito_persona` (`id_cliente`),
  CONSTRAINT `FK__t_credito` FOREIGN KEY (`id_t_cre`) REFERENCES `t_credito` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_d_credito_persona` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla banco.d_credito: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `d_credito` DISABLE KEYS */;
INSERT INTO `d_credito` (`id`, `id_t_cre`, `moneda`, `fecha`, `plazo`, `id_cliente`, `monto`) VALUES
	(1, 3, 'Bolivianos', '2018-05-16', '2018-05-24', 3, 5000),
	(2, 4, 'Bolivianos', '2018-05-08', '2018-05-31', 2, 4000),
	(3, 1, 'Dolar', '2018-05-08', '2018-05-08', 2, 500),
	(4, 1, 'Dolar', '2018-05-08', '2018-05-08', 2, 700),
	(5, 4, 'Dolar', '2018-05-02', '2018-05-26', 3, 5000);
/*!40000 ALTER TABLE `d_credito` ENABLE KEYS */;

-- Volcando estructura para tabla banco.garante
CREATE TABLE IF NOT EXISTS `garante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_nacimiento` date NOT NULL,
  `ci` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla banco.garante: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `garante` DISABLE KEYS */;
INSERT INTO `garante` (`id`, `f_nacimiento`, `ci`, `nombre`, `telefono`, `direccion`) VALUES
	(3, '2018-05-08', 1181591, 'pedro zarate', '3442658', 'los cusis'),
	(4, '2018-05-08', 2145832, 'pedro dominguez', '72186950', 'av rene moreno'),
	(5, '2018-05-08', 8123921, 'joaquin chumacero', '123841', 'los mangales'),
	(6, '2018-05-08', 32432, 'alex asdsa', '432432423', 'sdfdsfsdfsd'),
	(7, '2018-05-08', 244686, 'maria perez', '78945632', 'kior'),
	(8, '2018-05-08', 4589324, 'juan carlos mamani', '14523678', 'villa 1ro de mayo'),
	(9, '2018-05-16', 1235522, 'juan carlos', '11111111', 'el paraiso'),
	(10, '2018-05-09', 143141, 'joaquin chumacero', '132143', 'los mangales'),
	(11, '2018-05-09', 3432, 'juan jose', '1231244', 'plan 300'),
	(12, '2018-05-09', 12321, 'jose david cuellar', '1232555', 'el quior'),
	(13, '2018-05-09', 3444432, 'marco antonio', '8837481', 'guapuru'),
	(14, '2018-05-09', 3444432, 'marco antonio', '8837481', 'guapuru'),
	(15, '2018-05-16', 55512, 'saturnino mamani', '9344902', 'urubo'),
	(16, '1994-05-09', 97833613, 'jandira cortes', '65022467', 'av cristo redentor');
/*!40000 ALTER TABLE `garante` ENABLE KEYS */;

-- Volcando estructura para tabla banco.lista_negra
CREATE TABLE IF NOT EXISTS `lista_negra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.lista_negra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lista_negra` DISABLE KEYS */;
INSERT INTO `lista_negra` (`id`, `ci`, `nombre`, `apellido`) VALUES
	(1, 6523897, 'Bladimir', 'Pacheco Robles');
/*!40000 ALTER TABLE `lista_negra` ENABLE KEYS */;

-- Volcando estructura para tabla banco.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_04_17_145646_entrust_setup_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla banco.ocupacion
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.ocupacion: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` (`id`, `nombre`) VALUES
	(1, 'ing comercial'),
	(2, 'ing electronico'),
	(3, 'plomero'),
	(4, 'electricista'),
	(5, 'arquitecto');
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;

-- Volcando estructura para tabla banco.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla banco.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.permissions: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'crear_cliente', 'crear_cliente', 'crear_cliente', NULL, NULL),
	(2, 'editar_cliente', 'editar_cliente', 'editar_cliente', NULL, NULL),
	(3, 'verificacion_cliente', 'verificacion_cliente', 'verificacion_cliente', '2018-05-06 21:30:11', NULL),
	(4, 'crear-cuenta', 'crear-cuenta', 'crear-cuenta', '2018-05-06 21:30:57', NULL),
	(5, 'crear_usuario', 'crear_usuario', 'crear_usuario', '2018-05-09 11:35:23', NULL),
	(6, 'editar_usuario', 'editar_usuario', 'editar_usuario', '2018-05-09 11:35:49', NULL),
	(7, 'crear_rol', 'crear_rol', 'crear_rol', '2018-05-09 11:36:24', NULL),
	(8, 'editar_rol', 'editar_rol', 'editar_rol', '2018-05-09 11:36:42', NULL),
	(9, 'crear_credito', 'crear_credito', 'crear_credito', '2018-05-09 11:40:30', NULL),
	(10, 'crear_garante', 'crear_garante', 'crear_garante', '2018-05-09 11:41:34', NULL),
	(11, 'crear_tipo_cuenta', 'crear_tipo_cuenta', 'crear_tipo_cuenta', '2018-05-09 11:54:50', NULL),
	(12, 'modulo-servicios', 'modulo-servicios', 'modulo-servicios', '2018-05-09 11:58:51', NULL),
	(13, 'modulo-seguridad', 'modulo-seguridad', 'modulo-seguridad', '2018-05-09 11:59:21', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla banco.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.permission_role: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(13, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(4, 3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Volcando estructura para tabla banco.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `nombre`, `apellido`, `ci`, `sexo`, `fecha_nac`, `telefono`, `direccion`, `email`, `foto`, `firma`, `tipo`) VALUES
	(2, 'jesus', 'vargas moya', 3570744, 'M', '2018-05-07', 72185300, 'urb 24 de septiembre', 'varmoya@hotmail.com', '1525750278_foto1.jpg', '1525750278_f2.jpg', 'natural'),
	(3, 'mario', 'peredo gonzales', 9788381, 'M', '1967-05-08', 65164231, 'av. mutualista', 'mario_p@gmail.com', '1525750476_foto6.jpg', '1525750476_f1.jpg', 'juridico');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla banco.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'administrador', 'administrador', 'administrador', '2018-05-06 19:50:46', NULL),
	(2, 'plataforma', 'plataforma', 'plataforma', '2018-05-07 01:09:37', '2018-05-07 01:09:37'),
	(3, 'cajero', 'cajero', 'cajero', '2018-05-07 01:31:23', '2018-05-07 01:31:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla banco.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.role_user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(4, 1),
	(5, 1),
	(3, 2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Volcando estructura para tabla banco.rubro
CREATE TABLE IF NOT EXISTS `rubro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla banco.rubro: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `rubro` DISABLE KEYS */;
INSERT INTO `rubro` (`id`, `nombre`) VALUES
	(1, 'compra y venta de inmuebles'),
	(2, 'prestacion de servicios'),
	(3, 'comercio exterior'),
	(4, 'comercio interior');
/*!40000 ALTER TABLE `rubro` ENABLE KEYS */;

-- Volcando estructura para tabla banco.t_credito
CREATE TABLE IF NOT EXISTS `t_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `tasa_interes` float NOT NULL DEFAULT '0',
  `descripcion` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla banco.t_credito: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `t_credito` DISABLE KEYS */;
INSERT INTO `t_credito` (`id`, `nombre`, `tasa_interes`, `descripcion`) VALUES
	(1, 'Credito Vivienda', 0.02, 'Credito para viviendas'),
	(3, 'Credito Vehiculo', 0.03, 'Credito para vehiculos'),
	(4, 'Credito Empresarial', 0.01, 'Credito para empresarios');
/*!40000 ALTER TABLE `t_credito` ENABLE KEYS */;

-- Volcando estructura para tabla banco.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fondo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla banco.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `fondo`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'jandira', 'jan@gmail.com', '$2y$10$HfB8x6rJOPzdu5QFcL95I.wen3VFTiNzEq7jWp0zluXY2t5L9dt2K', '1526169252_perfilsinfotomujer.jpg', 'skin-yellow', 'sFhqjnWZrqRyKFEkoVk8SeDDfaOE90aIGFbO4VmY6kjeMcXuIZkOrC2Ycaxx', '2018-05-06 23:35:11', '2018-05-14 21:44:45'),
	(2, 'alex', 'alex@gmail.com', '$2y$10$oUBUpVHDZXR5wmC6S0jDmOLCHUKZJiUZrlwdZaN0uYB9fLwQmdp.m', 'default.jpg', 'skin-green', '7zRD1LLNL5m7hKRXUgK2Y0zG5avQ1ymdIXjCuS19zoyf1EF9ehiF9xonwURr', '2018-05-07 00:08:08', '2018-05-07 00:08:08'),
	(3, 'karla', 'karla@gmail.com', '$2y$10$F2l0CDI446FjhzUPjiD4YO.rC8kPtpWo3qwp8rkUYuFiIcieCzo5a', 'default.jpg', 'skin-green', 'Nat3TfsF1ewy18JGfSwRMk7G0lfcUlT2gB1Ux2htR6PVhxPRM4omZJ5Y01ST', '2018-05-07 00:12:24', '2018-05-12 17:33:15'),
	(4, 'vladimir vasquez', 'vladimir@gmail.com', '$2y$10$bxR/rj.gXRCjp1BUPDGWGuk9vjLEXEynAFROS9/cqBAlke.kCrq2e', 'default.jpg', 'skin-green', NULL, '2018-05-07 00:21:13', '2018-05-07 00:52:38'),
	(5, 'milton', 'milton@gmail.com', '$2y$10$qclX4Q4Guv04yCGEG6bFueXo/shcDPyIM/aUg9viYlfLVt5KlTNU6', 'default.jpg', 'skin-green', 'R002qiLnU9uXlyKPhLLJbSqhHgErZHDdK1gdn3IvwOgGugHHyarTz0TBSv8z', '2018-05-13 00:24:27', '2018-05-13 21:22:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
