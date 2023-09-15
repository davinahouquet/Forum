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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.category : ~11 rows (environ)
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'Sport'),
	(2, 'Nature'),
	(3, 'Animals'),
	(4, 'Cooking'),
	(5, 'Cinema'),
	(6, 'Literature'),
	(12, 'Music'),
	(16, 'Shopping'),
	(18, 'Retest');

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.post : ~36 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'The red ones !!!', '2023-09-06 00:00:00', 1, 2),
	(2, 'Because they are little', '2023-07-06 00:00:00', 2, 4),
	(3, 'They always end up well', '2023-09-06 00:00:00', 2, 5),
	(4, 'Maybe use mint', '2023-09-06 00:00:00', 3, 7),
	(5, 'stephen king s', '2023-09-06 00:00:00', 1, 1),
	(6, 'Some exercices ', '2023-09-06 00:00:00', 4, 6),
	(7, 'You could use it for tea', '2023-09-06 00:00:00', 5, 3),
	(9, 'Not very nice', '2023-09-08 14:44:34', 3, 19),
	(10, '1.Tom Holland !!!', '2023-09-08 14:45:19', 5, 18),
	(11, 'Think about Titanic', '2023-09-08 15:01:32', 1, 5),
	(12, 'They are demons', '2023-09-08 15:03:44', 1, 4),
	(13, 'Mushrooms are great', '2023-09-08 15:04:48', 1, 7),
	(14, 'Use balloons', '2023-09-08 15:06:48', 4, 20),
	(16, 'No', '2023-09-11 14:32:27', 1, 27),
	(17, 'No', '2023-09-11 15:49:59', 1, 27),
	(18, 'Test', '2023-09-12 09:11:19', 1, 1),
	(19, 'ff', '2023-09-12 09:11:46', 1, 1),
	(20, 'test', '2023-09-12 09:11:52', 1, 1),
	(21, 'Test sans user', '2023-09-12 09:45:56', 1, 7),
	(22, 'test', '2023-09-12 09:46:00', 1, 7),
	(24, 'test', '2023-09-12 13:52:20', 11, 27),
	(25, 'test', '2023-09-12 13:52:22', 11, 27),
	(30, 'test', '2023-09-12 14:09:08', 11, 5),
	(31, 'test', '2023-09-12 14:09:12', 11, 5),
	(32, 'test', '2023-09-12 14:09:14', 11, 5),
	(33, 'Test', '2023-09-12 15:05:15', 11, 3),
	(34, 'wdfg', '2023-09-12 15:15:49', 11, 3),
	(35, 'Indeed', '2023-09-12 16:07:38', 11, 19),
	(36, 'eeeeeeeeeeh', '2023-09-12 16:07:42', 11, 19),
	(37, 'Coucou ssss', '2023-09-13 08:32:08', 11, 19),
	(45, 'hello', '2023-09-13 15:56:13', 11, 4),
	(53, 'test', '2023-09-15 14:04:50', 16, 2),
	(54, 'test', '2023-09-15 14:04:52', 16, 2),
	(55, 'test', '2023-09-15 14:04:57', 16, 2),
	(64, 'yes but one time only', '2023-09-15 14:23:43', 16, 78),
	(65, 'trest', '2023-09-15 14:24:28', 16, 81),
	(69, 'test', '2023-09-15 14:25:44', 16, 82),
	(71, 'test', '2023-09-15 14:28:26', 16, 82),
	(72, 'test', '2023-09-15 14:28:30', 16, 82),
	(73, 'test', '2023-09-15 14:28:36', 16, 82),
	(74, 'test', '2023-09-15 14:28:41', 16, 82),
	(75, 'test', '2023-09-15 14:29:20', 16, 81);

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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.topic : ~13 rows (environ)
INSERT INTO `topic` (`id_topic`, `closed`, `name`, `question`, `creationDate`, `category_id`, `user_id`) VALUES
	(1, 0, 'Horror', 'Which horror book is the best?', '2023-09-06 00:00:00', 6, 1),
	(2, 0, 'Mushrooms test', 'blabla', '2023-09-06 00:00:00', 2, 5),
	(3, 0, 'Mint', 'Mint for medical use', '2023-09-06 00:00:00', 2, 4),
	(4, 0, 'Dogs', 'Why Chihuahuas are angry?', '2023-09-06 00:00:00', 3, 1),
	(5, 0, 'Films', 'Romantic movies appreciations', '2023-09-06 00:00:00', 5, 2),
	(6, 0, 'Health', 'Sport and healthy lifestyle', '2023-09-06 00:00:00', 1, 3),
	(7, 0, 'Pizza', 'Vegan pizzas trick', '2023-09-06 00:00:00', 4, 4),
	(18, 0, 'Actors', 'Top 3 best spiderman&#039;s actors', '2023-09-08 14:40:21', 5, 1),
	(19, 0, 'SPOILER ALERT', 'He dies at the end', '2023-09-08 14:40:46', 5, 1),
	(20, 0, 'Kirby Cake', 'I would like to make a cake shaped like Kirby', '2023-09-08 15:06:12', 4, 1),
	(24, 0, 'Cat', 'What does a cat drink ?', '2023-09-08 15:58:19', 3, 1),
	(27, 0, 'Series', 'Are series part of cinema ?', '2023-09-11 14:32:19', 5, 1),
	(77, 0, 'Humans', 'Are humans animals ?', '2023-09-15 14:22:20', 3, 16),
	(78, 0, 'Birds', 'Could humans fly like birds ?', '2023-09-15 14:22:57', 3, 16),
	(79, 0, 'test', 'test', '2023-09-15 14:24:18', 18, 16),
	(80, 0, 'trst', 'trest', '2023-09-15 14:24:21', 18, 16),
	(81, 0, 'sr g', 'ngh', '2023-09-15 14:24:23', 18, 16),
	(82, 0, 'test', 'test', '2023-09-15 14:25:37', 3, 16);

-- Listage de la structure de table forum_dh. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'ROLE_USER',
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ban` tinyint DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dh.user : ~15 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `role`, `email`, `password`, `registerDate`, `ban`) VALUES
	(1, 'Samuel', 'ROLE_USER', 'samuel@hotmail.fr', '123', '2023-09-06 00:00:00', 1),
	(2, 'Jenna', 'ROLE_USER', 'jenna@hotmail.fr', '123', '2023-09-06 00:00:00', 0),
	(3, 'Chloe', 'ROLE_USER', 'chloe@hotmail.fr', '123', '2023-09-06 00:00:00', 1),
	(4, 'Mike', 'ROLE_USER', 'mike@hotmail.fr', '123', '2023-09-06 00:00:00', 0),
	(5, 'Heloise', 'ROLE_USER', 'heloise@hotmail.fr', '123', '2023-09-06 00:00:00', 0),
	(7, 'test', 'ROLE_USER', 'test@test.fr', '$2y$10$BTCypk.LByn6uHMctWibv.NeFjcfO067ji7Mlz4Cm.Ee2e6AEbacq', '2023-09-09 21:40:04', 0),
	(8, 'test1', 'ROLE_USER', 'test1@hotmail.fr', '$2y$10$XSphaozhPwWOrdysSLETBew2LH6gS2Cq8oVjZ6OSSotlre0hJpzWu', '2023-09-10 11:09:14', 0),
	(9, 'test2', 'ROLE_USER', 'test2@hotmail.fr', '$2y$10$JiZyIQdb6DGp03HOPa/rhO1raUbmn9.ulsTro9d4NGDXtKDZiZkvi', '2023-09-10 11:51:40', 0),
	(10, 'test3', 'ROLE_USER', 'test3@hotmail.fr', '$2y$10$2xg6a5X4wzdVwZi.k.sPf.FJePPFAY/xS9AwebkQSWbOD6lOH8za6', '2023-09-11 08:46:07', 0),
	(11, 'Morty', 'ROLE_USER', 'test4@hotmail.fr', '$2y$10$WwEGt3QaNVPoqhAKb0CCsepdiED07PyjnvmzTcLeqmAH/Ys2xY9eS', '2023-09-11 08:48:25', 1),
	(12, 'test7', 'ROLE_USER', 'test7@live.fr', '$2y$10$Q9BrZRG0Sryk9Fe3yjdLXuN.wkU0Dc4SiqtMfD4rq1K4c.AjMoGeu', '2023-09-11 09:50:11', 0),
	(13, 'test8', 'ROLE_USER', 'test8@live.fr', '$2y$10$bRDHSW1EfIItBYfEnGhx3etQrf6F2oB9O.Fqd6x.DzxOAd6sEcJOu', '2023-09-11 10:55:23', 0),
	(14, 'test9', 'ROLE_USER', 'test9@live.fr', '$2y$10$oO/r1ksS.tiDJwh1xC1mLOls5LMPWtu5iD4M.2YdagqU10hFcQoQO', '2023-09-11 10:58:42', 0),
	(15, 'admin', 'ROLE_ADMIN', 'admin@admin.fr', 'admin', '2023-09-11 15:01:20', 0),
	(16, 'ADMIN', 'ROLE_ADMIN', 'test10@hotmail.fr', '$2y$10$gcTFiru9WJAigH3qW9PVm.7PSOCNM9K9vNZednsm/8/96r38aQkUK', '2023-09-11 15:42:21', 0),
	(17, 'Test11', 'ROLE_USER', 'test11@test11.fr', '$2y$10$ZY8Pxt1ySp/ixaZFx7PZAOQldMcE2wHwOAbEHdFyZ8ohxqi362Gy2', '2023-09-15 14:31:50', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
