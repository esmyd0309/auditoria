-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.10-MariaDB-log - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para auditoria
CREATE DATABASE IF NOT EXISTS `auditoria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `auditoria`;

-- Volcando estructura para tabla auditoria.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordinador` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supervisora` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.evaluacions
CREATE TABLE IF NOT EXISTS `evaluacions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `gestions_id` int(10) unsigned NOT NULL,
  `plantillas_id` int(10) unsigned NOT NULL,
  `tarea_id` int(10) unsigned NOT NULL,
  `hora` time DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `completada` tinyint(1) DEFAULT NULL,
  `cantidad_evaluar` int(11) DEFAULT NULL,
  `calificacion` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `evaluado` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `agente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedula` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grabacion` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vicidial_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluacions_users_id_foreign` (`users_id`),
  KEY `evaluacions_tarea_id_foreign` (`tarea_id`),
  KEY `evaluacions_gestions_id_foreign` (`gestions_id`),
  KEY `evaluacions_plantillas_id_foreign` (`plantillas_id`),
  CONSTRAINT `evaluacions_plantillas_id_foreign` FOREIGN KEY (`plantillas_id`) REFERENCES `plantillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluacions_tarea_id_foreign` FOREIGN KEY (`tarea_id`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluacions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.gestions
CREATE TABLE IF NOT EXISTS `gestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estados` int(10) unsigned NOT NULL,
  `departamentos_id` int(10) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `agente` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supervisor` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producto` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedula` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres_cliente` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deuda` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultado_gestion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duracion_llamada` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gestions_estados_id_foreign` (`estados`),
  KEY `gestions_departamentos_id_foreign` (`departamentos_id`),
  CONSTRAINT `gestions_departamentos_id_foreign` FOREIGN KEY (`departamentos_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gestions_estados_id_foreign` FOREIGN KEY (`estados`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.plantillas
CREATE TABLE IF NOT EXISTS `plantillas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gestion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `ciudad` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxima_calificacion` decimal(8,2) DEFAULT NULL,
  `filenames` varchar(455) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantillas_users_id_foreign` (`users_id`),
  CONSTRAINT `plantillas_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plantillas_id` int(10) unsigned NOT NULL,
  `pregunta` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` decimal(8,2) DEFAULT NULL,
  `tipo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_plantillas_id_foreign` (`plantillas_id`),
  CONSTRAINT `preguntas_plantillas_id_foreign` FOREIGN KEY (`plantillas_id`) REFERENCES `plantillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.pregunts_respuests
CREATE TABLE IF NOT EXISTS `pregunts_respuests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tarea_id` int(11) NOT NULL,
  `evaluacions_id` int(10) unsigned NOT NULL,
  `preguntas_id` int(10) unsigned NOT NULL,
  `respuestas_id` int(10) unsigned DEFAULT NULL,
  `pregunta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `peso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calificacion` decimal(8,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `comentario` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `agente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seg` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedula` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grabacion` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pregunts_respuests_preguntas_id_foreign` (`preguntas_id`),
  KEY `pregunts_respuests_respuestas_id_foreign` (`respuestas_id`),
  KEY `pregunts_respuests_evaluacions_id_foreign` (`evaluacions_id`),
  CONSTRAINT `pregunts_respuests_evaluacions_id_foreign` FOREIGN KEY (`evaluacions_id`) REFERENCES `evaluacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pregunts_respuests_preguntas_id_foreign` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pregunts_respuests_respuestas_id_foreign` FOREIGN KEY (`respuestas_id`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.reportedetalle
CREATE TABLE IF NOT EXISTS `reportedetalle` (
  `gestions_id` int(10) unsigned NOT NULL,
  `plantillas_id` int(10) unsigned NOT NULL,
  `tarea_id` int(10) unsigned NOT NULL,
  `grabacion` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `calificaciontt` decimal(8,2) DEFAULT NULL,
  `preguntas_id` int(10) unsigned NOT NULL,
  `respuestas_id` int(10) unsigned DEFAULT NULL,
  `calificacion` decimal(8,2) DEFAULT NULL,
  `comentario` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntas` varchar(255) DEFAULT NULL,
  `respuestas` varchar(255) DEFAULT NULL,
  `plantilla` varchar(255) DEFAULT NULL,
  `tarea` varchar(255) DEFAULT NULL,
  `agente` varchar(255) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL,
  `seg` varchar(11) DEFAULT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.respuestas
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `preguntas_id` int(10) unsigned NOT NULL,
  `respuesta` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_1` decimal(45,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respuestas_preguntas_id_foreign` (`preguntas_id`),
  CONSTRAINT `respuestas_preguntas_id_foreign` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access','null') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.tareas
CREATE TABLE IF NOT EXISTS `tareas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `fechadesde` date NOT NULL,
  `fechahasta` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plantillas_id` int(10) unsigned NOT NULL,
  `departamentos_id` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estados` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_registros` int(11) DEFAULT NULL,
  `registros_agentes` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `status` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cerrada` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tareas_users_id_foreign` (`users_id`),
  KEY `tareas_plantillas_id_foreign` (`plantillas_id`),
  CONSTRAINT `tareas_plantillas_id_foreign` FOREIGN KEY (`plantillas_id`) REFERENCES `plantillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tareas_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.tempgestiones
CREATE TABLE IF NOT EXISTS `tempgestiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gestions_id` int(10) unsigned NOT NULL,
  `tareas_id` int(10) unsigned NOT NULL,
  `plantillas_id` int(10) unsigned NOT NULL,
  `departamentos_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tempgestiones_gestions_id_foreign` (`gestions_id`),
  KEY `tempgestiones_departamentos_id_foreign` (`departamentos_id`),
  KEY `tempgestiones_tareas_id_foreign` (`tareas_id`),
  KEY `tempgestiones_plantillas_id_foreign` (`plantillas_id`),
  CONSTRAINT `tempgestiones_departamentos_id_foreign` FOREIGN KEY (`departamentos_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tempgestiones_gestions_id_foreign` FOREIGN KEY (`gestions_id`) REFERENCES `gestions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tempgestiones_plantillas_id_foreign` FOREIGN KEY (`plantillas_id`) REFERENCES `plantillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tempgestiones_tareas_id_foreign` FOREIGN KEY (`tareas_id`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla auditoria.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
