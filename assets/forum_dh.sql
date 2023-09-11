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
CREATE DATABASE IF NOT EXISTS `forum_dh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_dh`;

-- Listage de la structure de table forum_dh. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
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
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL DEFAULT '0',
  `topic_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`),
  KEY `FK__user_post` (`user_id`),
  KEY `FK__topic_post` (`topic_id`),
  CONSTRAINT `FK__topic_post` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK__user_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.post : ~14 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'The red ones !!!', '2023-09-06 00:00:00', 1, 2),
	(2, 'Because they are little', '2023-07-06 00:00:00', 2, 4),
	(3, 'They always end up well', '2023-09-06 00:00:00', 2, 5),
	(4, 'Maybe use mint', '2023-09-06 00:00:00', 3, 7),
	(5, 'stephen king s', '2023-09-06 00:00:00', 1, 1),
	(6, 'Some exercices ', '2023-09-06 00:00:00', 4, 6),
	(7, 'You could use it for tea', '2023-09-06 00:00:00', 5, 3),
	(8, 'test', '2023-09-06 00:00:00', 3, 2),
	(9, 'Not very nice', '2023-09-08 14:44:34', 3, 19),
	(10, '1.Tom Holland !!!', '2023-09-08 14:45:19', 5, 18),
	(11, 'Think about Titanic', '2023-09-08 15:01:32', 1, 5),
	(12, 'They are demons', '2023-09-08 15:03:44', 1, 4),
	(13, 'Mushrooms are great', '2023-09-08 15:04:48', 1, 7),
	(14, 'Use balloons', '2023-09-08 15:06:48', 4, 20),
	(15, 'Content\r\n', '2023-09-09 19:09:36', 1, 23);

-- Listage de la structure de table forum_dh. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `closed` tinyint DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `question` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_topic`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.topic : ~15 rows (environ)
INSERT INTO `topic` (`id_topic`, `closed`, `name`, `question`, `creationDate`, `category_id`, `user_id`) VALUES
	(1, 0, 'Horror', 'Which horror book is the best?', '2023-09-06 00:00:00', 6, 1),
	(2, 0, 'Mushrooms', 'Which mushrooms are the best?', '2023-09-06 00:00:00', 2, 5),
	(3, 0, 'Mint', 'Mint for medical use', '2023-09-06 00:00:00', 2, 4),
	(4, 0, 'Dogs', 'Why Chihuahuas are angry?', '2023-09-06 00:00:00', 3, 1),
	(5, 0, 'Films', 'Romantic movies appreciations', '2023-09-06 00:00:00', 5, 2),
	(6, 0, 'Health', 'Sport and healthy lifestyle', '2023-09-06 00:00:00', 1, 3),
	(7, 0, 'Pizza', 'Vegan pizzas trick', '2023-09-06 00:00:00', 4, 4),
	(18, 0, 'Actors', 'Top 3 best spiderman&#039;s actors', '2023-09-08 14:40:21', 5, 1),
	(19, 0, 'SPOILER ALERT', 'He dies at the end', '2023-09-08 14:40:46', 5, 1),
	(20, 0, 'Kirby Cake', 'I would like to make a cake shaped like Kirby', '2023-09-08 15:06:12', 4, 1),
	(21, 0, '55', '55', '2023-09-08 15:47:02', 2, 1),
	(22, 0, '55', '55', '2023-09-08 15:47:42', 2, 1),
	(23, 0, 'AA', 'AA', '2023-09-08 15:56:23', 2, 1),
	(24, 0, 'Cat', 'What does a cat drink ?', '2023-09-08 15:58:19', 3, 1),
	(25, 0, 'Test', 'Test', '2023-09-08 16:18:13', 6, 1),
	(26, 0, 'Hello', 'How r u ', '2023-09-09 18:46:34', 2, 1);

-- Listage de la structure de table forum_dh. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.user : ~9 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `role`, `email`, `password`, `registerDate`) VALUES
	(1, 'Samuel', 'user', 'samuel@hotmail.fr', '123', '2023-09-06 00:00:00'),
	(2, 'Jenna', 'user', 'jenna@hotmail.fr', '123', '2023-09-06 00:00:00'),
	(3, 'Chloe', 'user', 'chloe@hotmail.fr', '123', '2023-09-06 00:00:00'),
	(4, 'Mike', 'user', 'mike@hotmail.fr', '123', '2023-09-06 00:00:00'),
	(5, 'Heloise', 'user', 'heloise@hotmail.fr', '123', '2023-09-06 00:00:00'),
	(6, 'douvipop', '0', 'davinadorable@outlook.fr', '$2y$10$HtJaZKkUL7/AJUFW0Igx/ehT7QrfR5FW2ZduQK00HEyHq9dIcLnBK', '2023-09-09 21:37:09'),
	(7, 'test', '0', 'test@test.fr', '$2y$10$BTCypk.LByn6uHMctWibv.NeFjcfO067ji7Mlz4Cm.Ee2e6AEbacq', '2023-09-09 21:40:04'),
	(8, 'test1', '0', 'test1@hotmail.fr', '$2y$10$XSphaozhPwWOrdysSLETBew2LH6gS2Cq8oVjZ6OSSotlre0hJpzWu', '2023-09-10 11:09:14'),
	(9, 'test2', '0', 'test2@hotmail.fr', '$2y$10$JiZyIQdb6DGp03HOPa/rhO1raUbmn9.ulsTro9d4NGDXtKDZiZkvi', '2023-09-10 11:51:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
