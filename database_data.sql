-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour oniro
CREATE DATABASE IF NOT EXISTS `oniro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `oniro`;

-- Listage de la structure de la table oniro. membres
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rangs_id` int(11) NOT NULL DEFAULT '0',
  `pass` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `pseudo` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `date_inscription` date DEFAULT NULL,
  `prive` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `email` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table oniro. methodes
CREATE TABLE IF NOT EXISTS `methodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abreviation` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table oniro. news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `titre` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table oniro. reves
CREATE TABLE IF NOT EXISTS `reves` (
  `id_user` int(11) DEFAULT NULL,
  `nom` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lucide` int(11) DEFAULT NULL,
  `methode` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `reve` text COLLATE utf8_bin,
  `color` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
