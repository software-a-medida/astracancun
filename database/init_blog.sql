-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.5.9-MariaDB-1:10.5.9+maria~buster - mariadb.org binary distribution
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla component.blog_categories
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `__session` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla component.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `id_category` bigint(20) DEFAULT NULL,
  `lang` tinytext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `sm_title` text DEFAULT NULL,
  `sm_description` text DEFAULT NULL,
  `sm_image` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `status` set('draft','published','unpublished','removed') NOT NULL DEFAULT 'published',
  `publication_date` datetime NOT NULL DEFAULT current_timestamp(),
  `author` bigint(20) DEFAULT NULL,
  `__session` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_blog_blog_categories` (`id_category`),
  KEY `FK_blog_users` (`author`),
  CONSTRAINT `FK_blog_blog_categories` FOREIGN KEY (`id_category`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_blog_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando datos para la tabla component.permissions
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `code`, `title`) VALUES
	(NULL, '{blog_read}', 'Ver el blog.'),
	(NULL, '{blog_create}', 'Crear artículos en el blog.'),
	(NULL, '{blog_update}', 'Editar artículos en el blog.'),
	(NULL, '{blog_delete}', 'Eliminar artículos en el blog.'),
	(NULL, '{categories_blog_read}', 'Ver las categorías del blog.'),
	(NULL, '{categories_blog_create}', 'Crear categorías en el blog.'),
	(NULL, '{categories_blog_delete}', 'Eliminar categorías del blog.');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;