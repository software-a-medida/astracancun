-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.5.12-MariaDB-1:10.5.12+maria~buster - mariadb.org binary distribution
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla component.myservices_categories
CREATE TABLE IF NOT EXISTS `myservices_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `__session` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando estructura para tabla component.myservices
CREATE TABLE IF NOT EXISTS `myservices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `id_category` bigint(20) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `sm_title` text DEFAULT NULL,
  `sm_description` text DEFAULT NULL,
  `sm_image` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `status` set('draft','published','unpublished','removed') NOT NULL DEFAULT 'published',
  `publication_date` datetime NOT NULL DEFAULT current_timestamp(),
  `author` bigint(20) DEFAULT NULL,
  `lang` tinytext DEFAULT NULL,
  `__session` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_myservices_myservices_categories` (`id_category`),
  KEY `FK_myservices_users` (`author`),
  CONSTRAINT `FK_myservices_myservices_categories` FOREIGN KEY (`id_category`) REFERENCES `myservices_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_myservices_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla component.permissions
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `code`, `title`) VALUES
	(NULL, '{services_read}', 'Ver los servicios.'),
	(NULL, '{services_create}', 'Crear servicios.'),
	(NULL, '{services_update}', 'Editar servicios.'),
	(NULL, '{services_delete}', 'Eliminar servicios.'),
	(NULL, '{categories_services_read}', 'Ver las categorías del los servicios.'),
	(NULL, '{categories_services_create}', 'Crear categorías en los servicios.'),
	(NULL, '{categories_services_delete}', 'Eliminar categorías del los servicios.');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
