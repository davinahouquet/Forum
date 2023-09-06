-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_dh
CREATE DATABASE IF NOT EXISTS `forum_dh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_dh`;

-- Listage de la structure de table forum_dh. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.category : ~6 rows (environ)
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'Sport'),
	(2, 'Nature'),
	(3, 'Animals'),
	(4, 'Cooking'),
	(5, 'Cinema'),
	(6, 'Literature');

-- Listage de la structure de table forum_dh. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_bin NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL DEFAULT '0',
  `topic_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`),
  KEY `FK__user_post` (`user_id`),
  KEY `FK__topic_post` (`topic_id`),
  CONSTRAINT `FK__topic_post` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK__user_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.post : ~8 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'The red ones !!!', '2023-09-06 00:00:00', 1, 2),
	(2, 'Because they are little', '2023-07-06 00:00:00', 2, 4),
	(3, 'They always end up well', '2023-09-06 00:00:00', 2, 5),
	(4, 'Maybe use mint', '2023-09-06 00:00:00', 3, 7),
	(5, 'stephen king s', '2023-09-06 00:00:00', 1, 1),
	(6, 'Some exercices ', '2023-09-06 00:00:00', 4, 6),
	(7, 'You could use it for tea', '2023-09-06 00:00:00', 5, 3),
	(8, 'test', '2023-09-06 00:00:00', 3, 2);

-- Listage de la structure de table forum_dh. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `closed` tinyint DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `creationDate` datetime NOT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_topic`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.topic : ~7 rows (environ)
INSERT INTO `topic` (`id_topic`, `closed`, `name`, `title`, `creationDate`, `category_id`, `user_id`) VALUES
	(1, 0, 'Horror', 'Which horror book is the best?', '2023-09-06 00:00:00', 6, 1),
	(2, 0, 'Mushrooms', 'Which mushrooms are the best?', '2023-09-06 00:00:00', 2, 5),
	(3, 0, 'Mint', 'Mint for medical use', '2023-09-06 00:00:00', 2, 4),
	(4, 0, 'Dogs', 'Why Chihuahuas are angry?', '2023-09-06 00:00:00', 3, 1),
	(5, 0, 'Films', 'Romantic movies appreciations', '2023-09-06 00:00:00', 5, 2),
	(6, 0, 'Health', 'Sport and healthy lifestyle', '2023-09-06 00:00:00', 1, 3),
	(7, 0, 'Pizza', 'Vegan pizzas trick', '2023-09-06 00:00:00', 4, 4);

-- Listage de la structure de table forum_dh. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `email` varchar(25) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `registerDate` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.user : ~5 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `role`, `email`, `password`, `registerDate`) VALUES
	(1, 'Samuel', 'user', 'samuel@hotmail.fr', '123', '2023-09-06'),
	(2, 'Jenna', 'user', 'jenna@hotmail.fr', '123', '2023-09-06'),
	(3, 'Chloe', 'user', 'chloe@hotmail.fr', '123', '2023-09-06'),
	(4, 'Mike', 'user', 'mike@hotmail.fr', '123', '2023-09-06'),
	(5, 'Heloise', 'user', 'heloise@hotmail.fr', '123', '2023-09-06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
