-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla estoesagencia.developer
CREATE TABLE IF NOT EXISTS `developer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla estoesagencia.developer: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `developer` DISABLE KEYS */;
REPLACE INTO `developer` (`id`, `name`, `surname`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Gaston', 'Ferreyra', 'https://i.pinimg.com/474x/83/a9/a1/83a9a144ab03763667b8d8aa381bb441.jpg', '2021-01-22 21:32:21', NULL, NULL),
	(2, 'Jose', 'Herrera', 'https://www.incubaweb.com/wp-content/uploads/2016/11/avatar-jorge.png', '2021-01-22 21:32:22', NULL, NULL);
/*!40000 ALTER TABLE `developer` ENABLE KEYS */;

-- Volcando estructura para tabla estoesagencia.projectmanager
CREATE TABLE IF NOT EXISTS `projectmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `surname` varchar(255) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla estoesagencia.projectmanager: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `projectmanager` DISABLE KEYS */;
REPLACE INTO `projectmanager` (`id`, `name`, `surname`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Hector', 'Fernandez', 'https://e00-marca.uecdn.es/assets/multimedia/imagenes/2020/06/04/15912219730543.jpg', '2021-01-22 21:32:48', NULL, NULL),
	(2, 'Rocio ', 'Carra', 'https://www.soycarmin.com/__export/1591241280785/sites/debate/img/2020/06/03/avatar_3_crop1591241236156.jpg_1902800913.jpg', '2021-01-22 21:32:58', NULL, NULL);
/*!40000 ALTER TABLE `projectmanager` ENABLE KEYS */;

-- Volcando estructura para tabla estoesagencia.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `projectManager` int(11) DEFAULT NULL,
  `assignedTo` int(11) DEFAULT NULL,
  `status` enum('Enabled','Disabled') DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_projects_projectmanager` (`projectManager`),
  KEY `FK_projects_developer` (`assignedTo`),
  CONSTRAINT `FK_projects_developer` FOREIGN KEY (`assignedTo`) REFERENCES `developer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_projects_projectmanager` FOREIGN KEY (`projectManager`) REFERENCES `projectmanager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla estoesagencia.projects: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
REPLACE INTO `projects` (`id`, `name`, `description`, `projectManager`, `assignedTo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ecommerce', 'Proyecto en codeigniter', 1, 1, 'Enabled', '2021-01-22 18:56:31', NULL, NULL),
	(17, 'Niña', 'Darle de comer a la gata', 2, 2, 'Enabled', '2021-01-22 19:41:55', '2021-01-22 19:41:55', NULL),
	(32, 'Nombre', 'lindo proyecto en php', 1, 1, 'Enabled', '2021-01-22 22:07:45', '2021-01-22 22:07:45', NULL),
	(33, 'Ninia', 'Darle de comer a la gata su alimento', 2, 2, 'Enabled', '2021-01-22 22:52:07', '2021-01-22 22:52:07', NULL),
	(34, 'dsafdsf', 'dsfasdf', 1, 1, 'Disabled', '2021-01-22 22:52:17', '2021-01-22 22:52:17', NULL),
	(35, 'Billetera Virtual', 'dsfasdf', 1, 1, 'Disabled', '2021-01-22 22:52:44', '2021-01-22 22:52:44', NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
