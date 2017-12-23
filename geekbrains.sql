-- --------------------------------------------------------
-- Хост:                         sql.alliance.red
-- Версия сервера:               5.7.19 - MySQL Community Server (GPL)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных geekbrains
DROP DATABASE IF EXISTS `geekbrains`;
CREATE DATABASE IF NOT EXISTS `geekbrains` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `geekbrains`;

-- Дамп структуры для таблица geekbrains.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) unsigned NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_idea` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `FK_comments_ideas` (`id_idea`),
  KEY `FK_comments_tasks` (`id_task`),
  KEY `FK_comments_projects` (`id_project`),
  CONSTRAINT `FK_comments_ideas` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id`),
  CONSTRAINT `FK_comments_projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK_comments_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_comments_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.comments: ~25 rows (приблизительно)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `id_user`, `text`, `date`, `id_idea`, `id_task`, `id_project`, `is_deleted`, `updated_at`) VALUES
	(1, 2, 'Всем привет! Как процесс?', '2017-10-16 11:15:47', NULL, 1, NULL, b'0', '2017-10-20 23:55:23'),
	(2, 3, 'Только начали', '2017-10-16 11:20:17', NULL, 1, NULL, b'0', '2017-10-20 23:55:23'),
	(3, 2, 'ert', '2017-10-18 20:37:34', 5, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(4, 2, 'Всем привет!', '2017-10-18 20:38:03', 5, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(5, 2, 'попытка', '2017-10-18 20:38:54', 5, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(6, 2, 'тест', '2017-10-18 20:40:20', 5, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(7, 2, 'Привет', '2017-10-20 21:43:37', 7, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(8, 2, '5', '2017-10-20 22:00:42', 7, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(9, 2, '5', '2017-10-20 22:01:00', 7, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(10, 2, '5', '2017-10-20 22:01:02', 7, NULL, NULL, b'1', '2017-10-21 00:00:22'),
	(11, 2, '6', '2017-10-20 22:04:43', 7, NULL, NULL, b'1', '2017-10-21 00:04:35'),
	(12, 2, '7', '2017-10-20 22:06:38', 7, NULL, NULL, b'1', '2017-10-21 00:00:26'),
	(13, 2, '8', '2017-10-20 22:11:54', 7, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(14, 2, '9', '2017-10-20 22:13:51', 7, NULL, NULL, b'1', '2017-10-20 23:58:46'),
	(15, 2, '10', '2017-10-20 22:24:37', 7, NULL, NULL, b'1', '2017-10-20 23:58:41'),
	(16, 2, '11', '2017-10-20 22:33:13', 7, NULL, NULL, b'1', '2017-10-20 23:56:07'),
	(17, 2, '12', '2017-10-20 22:38:46', 7, NULL, NULL, b'1', '2017-10-20 23:55:41'),
	(18, 2, '1', '2017-10-20 22:48:43', NULL, 1, NULL, b'0', '2017-10-20 23:55:23'),
	(19, 2, 'Тест с новой\nстрокой', '2017-10-20 22:49:24', NULL, 1, NULL, b'0', '2017-10-20 23:55:23'),
	(20, 2, '222', '2017-10-20 22:49:37', NULL, 1, NULL, b'1', '2017-10-21 00:04:03'),
	(21, 2, 'тест', '2017-10-20 22:50:43', NULL, 1, NULL, b'0', '2017-10-20 23:55:23'),
	(22, 2, '2', '2017-10-20 22:54:14', NULL, 1, NULL, b'1', '2017-10-21 00:04:24'),
	(23, 2, '1', '2017-10-20 22:54:22', 1, NULL, NULL, b'0', '2017-10-20 23:55:23'),
	(24, 4, 'Тест', '2017-10-21 08:22:18', NULL, 18, NULL, b'0', '2017-10-21 08:22:18'),
	(25, 4, 'Local', '2017-12-17 12:49:32', NULL, 100, NULL, b'0', '2017-12-17 12:49:32');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.history
DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) DEFAULT '0',
  `id_task` int(11) DEFAULT '0',
  `field` varchar(50) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  `id_author` int(11) unsigned NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK__projects` (`id_project`),
  KEY `FK__tasks` (`id_task`),
  KEY `FK__users` (`id_author`),
  CONSTRAINT `FK__projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK__tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы geekbrains.history: ~0 rows (приблизительно)
DELETE FROM `history`;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.ideas
DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS `ideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_author` int(11) unsigned NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_task` int(11) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `technologies` mediumtext COLLATE utf8_unicode_ci,
  `competitors` mediumtext COLLATE utf8_unicode_ci,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_ideas_users` (`id_author`),
  KEY `FK_ideas_tasks` (`id_task`),
  CONSTRAINT `FK_ideas_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_ideas_users` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.ideas: ~138 rows (приблизительно)
DELETE FROM `ideas`;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` (`id`, `name`, `description`, `id_author`, `date_create`, `id_task`, `is_deleted`, `technologies`, `competitors`, `updated_at`) VALUES
	(1, '', '', 2, '2017-10-15 22:35:46', 1, b'0', '', '', '2017-10-31 06:56:51'),
	(2, 'А это вторая идея', 'Продолжаем думать', 2, '2017-10-15 22:36:11', 1, b'0', NULL, NULL, '2017-10-18 20:11:58'),
	(3, 'И еще одна третья идея', 'Думаем, думаем', 4, '2017-10-15 22:36:38', 1, b'0', NULL, NULL, '2017-10-18 20:11:58'),
	(4, 'Супер идейка', '', 2, '2017-10-18 20:06:25', 1, b'0', '', '', '2017-10-18 20:11:58'),
	(5, 'Гениальная идея 2', 'Потом расскажу, но это стоит услышать-f-dsf-sff', 2, '2017-10-18 20:07:32', 1, b'0', 'Готовьте блокноты, будет, что записать', 'Их еще нет даже', '2017-10-18 20:13:07'),
	(6, 'sdf', '', 1, '2017-10-20 05:15:05', 1, b'1', '', '', '2017-10-21 00:10:14'),
	(7, 'Ночная идея', 'Функционал 1\nФункционал 3', 2, '2017-10-20 21:32:53', 1, b'0', '', '', '2017-10-20 21:33:30'),
	(8, '', '', 2, '2017-10-21 00:10:55', 1, b'0', '', '', '2017-10-21 00:10:55'),
	(9, 'asd', 'sad', 4, '2017-10-21 07:45:49', 17, b'0', 'sad', 'asd', '2017-10-21 07:45:49'),
	(10, 'Написать тест', '<html><head><title>test</title>\n<body>\n<h1>test</h1>\n<p>ddd</p>\n</body>', 4, '2017-10-21 08:21:42', 18, b'0', 'современные', 'много их1', '2017-10-21 08:23:31'),
	(11, 'sad', '', 4, '2017-10-31 06:52:33', 21, b'0', '', '', '2017-10-31 06:52:38'),
	(12, '', '', 4, '2017-10-31 06:56:34', 21, b'0', '', '', '2017-10-31 06:56:34'),
	(13, '', '', 4, '2017-10-31 06:56:34', 21, b'0', '', '', '2017-10-31 06:56:34'),
	(14, '', '', 4, '2017-10-31 06:56:35', 21, b'0', '', 'baseline -- f', '2017-10-31 06:56:35'),
	(15, '', '', 4, '2017-10-31 06:56:35', 21, b'0', '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '2017-10-31 06:56:35'),
	(16, '', '', 4, '2017-10-31 06:56:35', 21, b'0', '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '2017-10-31 06:56:35'),
	(17, '', '', 4, '2017-10-31 06:56:35', 21, b'0', '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '2017-10-31 06:56:35'),
	(18, '', '', 4, '2017-10-31 06:56:36', 21, b'0', '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '2017-10-31 06:56:36'),
	(19, '', '', 4, '2017-10-31 06:56:36', 21, b'0', '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '2017-10-31 06:56:36'),
	(20, '', '', 4, '2017-10-31 06:56:36', 21, b'0', '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '2017-10-31 06:56:36'),
	(21, '', '', 4, '2017-10-31 06:56:36', 21, b'0', '', '1;waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:36'),
	(22, '', '', 4, '2017-10-31 06:56:37', 21, b'0', '', '1\';waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:37'),
	(23, '', '', 4, '2017-10-31 06:56:37', 21, b'0', '', '1);waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:37'),
	(24, '', '', 4, '2017-10-31 06:56:37', 21, b'0', '', '1\');waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:37'),
	(25, '', '', 4, '2017-10-31 06:56:38', 21, b'0', '', '1));waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:38'),
	(26, '', '', 4, '2017-10-31 06:56:38', 21, b'0', '', '1\'));waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:38'),
	(27, '', '', 4, '2017-10-31 06:56:38', 21, b'0', '', '1)));waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:38'),
	(28, '', '', 4, '2017-10-31 06:56:38', 21, b'0', '', '1\')));waitfor/*b*/delay \'0:0:04\' -- f', '2017-10-31 06:56:38'),
	(29, '', '', 4, '2017-10-31 06:56:39', 21, b'0', '', '/etc/hosts', '2017-10-31 06:56:39'),
	(30, '', '', 4, '2017-10-31 06:56:39', 21, b'0', '', '../etc/hosts', '2017-10-31 06:56:39'),
	(31, '', '', 4, '2017-10-31 06:56:39', 21, b'0', '', '../../etc/hosts', '2017-10-31 06:56:39'),
	(32, '', '', 4, '2017-10-31 06:56:39', 21, b'0', '', '../../../etc/hosts', '2017-10-31 06:56:39'),
	(33, '', '', 4, '2017-10-31 06:56:40', 21, b'0', '', '../../../../etc/hosts', '2017-10-31 06:56:40'),
	(34, '', '', 4, '2017-10-31 06:56:40', 21, b'0', '', '../../../../../etc/hosts', '2017-10-31 06:56:40'),
	(35, '', '', 4, '2017-10-31 06:56:40', 21, b'0', '', '../../../../../../etc/hosts', '2017-10-31 06:56:40'),
	(36, '', '', 4, '2017-10-31 06:56:41', 21, b'0', '', '../../../../../../../etc/hosts', '2017-10-31 06:56:41'),
	(37, '', '', 4, '2017-10-31 06:56:41', 21, b'0', '', '../../../../../../../../etc/hosts', '2017-10-31 06:56:41'),
	(38, '', '', 4, '2017-10-31 06:56:41', 21, b'0', '', 'hTeXz"\'<>= &quot;&lt;&gt;iN9gZ', '2017-10-31 06:56:41'),
	(39, '', '', 4, '2017-10-31 06:56:42', 21, b'0', '', '', '2017-10-31 06:56:42'),
	(40, '', '', 4, '2017-10-31 06:56:42', 21, b'0', '', '', '2017-10-31 06:56:42'),
	(41, '', 'baseline -- f', 4, '2017-10-31 06:56:42', 21, b'0', '', '', '2017-10-31 06:56:42'),
	(42, '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', 4, '2017-10-31 06:56:42', 21, b'0', '', '', '2017-10-31 06:56:42'),
	(43, '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', 4, '2017-10-31 06:56:43', 21, b'0', '', '', '2017-10-31 06:56:43'),
	(44, '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', 4, '2017-10-31 06:56:43', 21, b'0', '', '', '2017-10-31 06:56:43'),
	(45, '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', 4, '2017-10-31 06:56:43', 21, b'0', '', '', '2017-10-31 06:56:43'),
	(46, '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', 4, '2017-10-31 06:56:43', 21, b'0', '', '', '2017-10-31 06:56:43'),
	(47, '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', 4, '2017-10-31 06:56:44', 21, b'0', '', '', '2017-10-31 06:56:44'),
	(48, '', '1;waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:44', 21, b'0', '', '', '2017-10-31 06:56:44'),
	(49, '', '1\';waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:44', 21, b'0', '', '', '2017-10-31 06:56:44'),
	(50, '', '1);waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:44', 21, b'0', '', '', '2017-10-31 06:56:44'),
	(51, '', '1\');waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:44', 21, b'0', '', '', '2017-10-31 06:56:44'),
	(52, '', '1));waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:45', 21, b'0', '', '', '2017-10-31 06:56:45'),
	(53, '', '1\'));waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:45', 21, b'0', '', '', '2017-10-31 06:56:45'),
	(54, '', '1)));waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:45', 21, b'0', '', '', '2017-10-31 06:56:45'),
	(55, '', '1\')));waitfor/*b*/delay \'0:0:04\' -- f', 4, '2017-10-31 06:56:45', 21, b'0', '', '', '2017-10-31 06:56:45'),
	(56, '', '/etc/hosts', 4, '2017-10-31 06:56:45', 21, b'0', '', '', '2017-10-31 06:56:45'),
	(57, '', '../etc/hosts', 4, '2017-10-31 06:56:46', 21, b'0', '', '', '2017-10-31 06:56:46'),
	(58, '', '../../etc/hosts', 4, '2017-10-31 06:56:46', 21, b'0', '', '', '2017-10-31 06:56:46'),
	(59, '', '../../../etc/hosts', 4, '2017-10-31 06:56:46', 21, b'0', '', '', '2017-10-31 06:56:46'),
	(60, '', '../../../../etc/hosts', 4, '2017-10-31 06:56:46', 21, b'0', '', '', '2017-10-31 06:56:46'),
	(61, '', '../../../../../etc/hosts', 4, '2017-10-31 06:56:47', 21, b'0', '', '', '2017-10-31 06:56:47'),
	(62, '', '../../../../../../etc/hosts', 4, '2017-10-31 06:56:47', 21, b'0', '', '', '2017-10-31 06:56:47'),
	(63, '', '../../../../../../../etc/hosts', 4, '2017-10-31 06:56:47', 21, b'0', '', '', '2017-10-31 06:56:47'),
	(64, '', '../../../../../../../../etc/hosts', 4, '2017-10-31 06:56:47', 21, b'0', '', '', '2017-10-31 06:56:47'),
	(65, '', 'hTeXz"\'<>= &quot;&lt;&gt;RFMKZ', 4, '2017-10-31 06:56:47', 21, b'0', '', '', '2017-10-31 06:56:47'),
	(66, '', '', 4, '2017-10-31 06:56:48', 21, b'0', '', '', '2017-10-31 06:56:48'),
	(67, '', '', 4, '2017-10-31 06:56:48', 21, b'0', '', '', '2017-10-31 06:56:48'),
	(68, '', '', 4, '2017-10-31 06:56:48', 21, b'0', '', '', '2017-10-31 06:56:48'),
	(69, '', '', 4, '2017-10-31 06:56:48', 21, b'0', '', '', '2017-10-31 06:56:48'),
	(70, '', '', 4, '2017-10-31 06:56:49', 21, b'0', '', '', '2017-10-31 06:56:49'),
	(71, '', '', 4, '2017-10-31 06:56:52', 21, b'0', '', '', '2017-10-31 06:56:52'),
	(72, '', '', 4, '2017-10-31 06:56:52', 21, b'0', '', '', '2017-10-31 06:56:52'),
	(73, '', '', 4, '2017-10-31 06:56:52', 21, b'0', '', '', '2017-10-31 06:56:52'),
	(74, '', '', 4, '2017-10-31 06:56:53', 21, b'0', '', '', '2017-10-31 06:56:53'),
	(75, '', '', 4, '2017-10-31 06:56:53', 21, b'0', '', '', '2017-10-31 06:56:53'),
	(76, '', '', 4, '2017-10-31 06:56:53', 21, b'0', '', '', '2017-10-31 06:56:53'),
	(77, '', '', 4, '2017-10-31 06:56:53', 21, b'0', '', '', '2017-10-31 06:56:53'),
	(78, '', '', 4, '2017-10-31 06:56:53', 21, b'0', '', '', '2017-10-31 06:56:53'),
	(79, '', '', 4, '2017-10-31 06:56:54', 21, b'0', '', '', '2017-10-31 06:56:54'),
	(80, '', '', 4, '2017-10-31 06:56:54', 21, b'0', '', '', '2017-10-31 06:56:54'),
	(81, '', '', 4, '2017-10-31 06:56:54', 21, b'0', '', '', '2017-10-31 06:56:54'),
	(82, '', '', 4, '2017-10-31 06:56:54', 21, b'0', '', '', '2017-10-31 06:56:54'),
	(83, '', '', 4, '2017-10-31 06:57:11', 21, b'0', '', '', '2017-10-31 06:57:11'),
	(84, '', '', 4, '2017-10-31 06:57:11', 21, b'0', '', '', '2017-10-31 06:57:11'),
	(85, 'baseline -- f', '', 4, '2017-10-31 06:57:11', 21, b'0', '', '', '2017-10-31 06:57:11'),
	(86, 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', 4, '2017-10-31 06:57:12', 21, b'0', '', '', '2017-10-31 06:57:12'),
	(87, '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', 4, '2017-10-31 06:57:12', 21, b'0', '', '', '2017-10-31 06:57:12'),
	(88, '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', 4, '2017-10-31 06:57:12', 21, b'0', '', '', '2017-10-31 06:57:12'),
	(89, 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', 4, '2017-10-31 06:57:13', 21, b'0', '', '', '2017-10-31 06:57:13'),
	(90, '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', 4, '2017-10-31 06:57:13', 21, b'0', '', '', '2017-10-31 06:57:13'),
	(91, '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', 4, '2017-10-31 06:57:13', 21, b'0', '', '', '2017-10-31 06:57:13'),
	(92, '1;waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:13', 21, b'0', '', '', '2017-10-31 06:57:13'),
	(93, '1\';waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:14', 21, b'0', '', '', '2017-10-31 06:57:14'),
	(94, '1);waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:14', 21, b'0', '', '', '2017-10-31 06:57:14'),
	(95, '1\');waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:14', 21, b'0', '', '', '2017-10-31 06:57:14'),
	(96, '1));waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:14', 21, b'0', '', '', '2017-10-31 06:57:14'),
	(97, '1\'));waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:15', 21, b'0', '', '', '2017-10-31 06:57:15'),
	(98, '1)));waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:15', 21, b'0', '', '', '2017-10-31 06:57:15'),
	(99, '1\')));waitfor/*b*/delay \'0:0:04\' -- f', '', 4, '2017-10-31 06:57:15', 21, b'0', '', '', '2017-10-31 06:57:15'),
	(100, '/etc/hosts', '', 4, '2017-10-31 06:57:15', 21, b'0', '', '', '2017-10-31 06:57:15'),
	(101, '../etc/hosts', '', 4, '2017-10-31 06:57:15', 21, b'0', '', '', '2017-10-31 06:57:15'),
	(102, '../../etc/hosts', '', 4, '2017-10-31 06:57:16', 21, b'0', '', '', '2017-10-31 06:57:16'),
	(103, '../../../etc/hosts', '', 4, '2017-10-31 06:57:16', 21, b'0', '', '', '2017-10-31 06:57:16'),
	(104, '../../../../etc/hosts', '', 4, '2017-10-31 06:57:16', 21, b'0', '', '', '2017-10-31 06:57:16'),
	(105, '../../../../../etc/hosts', '', 4, '2017-10-31 06:57:16', 21, b'0', '', '', '2017-10-31 06:57:16'),
	(106, '../../../../../../etc/hosts', '', 4, '2017-10-31 06:57:17', 21, b'0', '', '', '2017-10-31 06:57:17'),
	(107, '../../../../../../../etc/hosts', '', 4, '2017-10-31 06:57:17', 21, b'0', '', '', '2017-10-31 06:57:17'),
	(108, '../../../../../../../../etc/hosts', '', 4, '2017-10-31 06:57:17', 21, b'0', '', '', '2017-10-31 06:57:17'),
	(109, 'hTeXz"\'<>= &quot;&lt;&gt;lvk9Z', '', 4, '2017-10-31 06:57:17', 21, b'0', '', '', '2017-10-31 06:57:17'),
	(110, '', '', 4, '2017-10-31 06:57:18', 21, b'0', '', '', '2017-10-31 06:57:18'),
	(111, '', '', 4, '2017-10-31 06:57:18', 21, b'0', '', '', '2017-10-31 06:57:18'),
	(112, '', '', 4, '2017-10-31 06:57:18', 21, b'0', 'baseline -- f', '', '2017-10-31 06:57:18'),
	(113, '', '', 4, '2017-10-31 06:57:18', 21, b'0', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', '2017-10-31 06:57:18'),
	(114, '', '', 4, '2017-10-31 06:57:19', 21, b'0', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', '2017-10-31 06:57:19'),
	(115, '', '', 4, '2017-10-31 06:57:19', 21, b'0', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', '2017-10-31 06:57:19'),
	(116, '', '', 4, '2017-10-31 06:57:19', 21, b'0', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', '2017-10-31 06:57:19'),
	(117, '', '', 4, '2017-10-31 06:57:20', 21, b'0', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', '2017-10-31 06:57:20'),
	(118, '', '', 4, '2017-10-31 06:57:20', 21, b'0', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', '2017-10-31 06:57:20'),
	(119, '', '', 4, '2017-10-31 06:57:20', 21, b'0', '1;waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:20'),
	(120, '', '', 4, '2017-10-31 06:57:20', 21, b'0', '1\';waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:20'),
	(121, '', '', 4, '2017-10-31 06:57:21', 21, b'0', '1);waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:21'),
	(122, '', '', 4, '2017-10-31 06:57:21', 21, b'0', '1\');waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:21'),
	(123, '', '', 4, '2017-10-31 06:57:21', 21, b'0', '1));waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:21'),
	(124, '', '', 4, '2017-10-31 06:57:21', 21, b'0', '1\'));waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:21'),
	(125, '', '', 4, '2017-10-31 06:57:21', 21, b'0', '1)));waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:21'),
	(126, '', '', 4, '2017-10-31 06:57:22', 21, b'0', '1\')));waitfor/*b*/delay \'0:0:04\' -- f', '', '2017-10-31 06:57:22'),
	(127, '', '', 4, '2017-10-31 06:57:22', 21, b'0', '/etc/hosts', '', '2017-10-31 06:57:22'),
	(128, '', '', 4, '2017-10-31 06:57:22', 21, b'0', '../etc/hosts', '', '2017-10-31 06:57:22'),
	(129, '', '', 4, '2017-10-31 06:57:22', 21, b'0', '../../etc/hosts', '', '2017-10-31 06:57:22'),
	(130, '', '', 4, '2017-10-31 06:57:23', 21, b'0', '../../../etc/hosts', '', '2017-10-31 06:57:23'),
	(131, '', '', 4, '2017-10-31 06:57:23', 21, b'0', '../../../../etc/hosts', '', '2017-10-31 06:57:23'),
	(132, '', '', 4, '2017-10-31 06:57:23', 21, b'0', '../../../../../etc/hosts', '', '2017-10-31 06:57:23'),
	(133, '', '', 4, '2017-10-31 06:57:23', 21, b'0', '../../../../../../etc/hosts', '', '2017-10-31 06:57:23'),
	(134, '', '', 4, '2017-10-31 06:57:23', 21, b'0', '../../../../../../../etc/hosts', '', '2017-10-31 06:57:23'),
	(135, '', '', 4, '2017-10-31 06:57:24', 21, b'0', '../../../../../../../../etc/hosts', '', '2017-10-31 06:57:24'),
	(136, '', '', 4, '2017-10-31 06:57:24', 21, b'0', 'hTeXz"\'<>= &quot;&lt;&gt;wfJ6Z', '', '2017-10-31 06:57:24'),
	(137, '', '', 4, '2017-10-31 06:57:24', 21, b'0', '', '', '2017-10-31 06:57:24'),
	(138, '', '', 4, '2017-10-31 06:57:24', 21, b'0', '', '', '2017-10-31 06:57:24');
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы geekbrains.migrations: ~2 rows (приблизительно)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.new_table1
DROP TABLE IF EXISTS `new_table1`;
CREATE TABLE IF NOT EXISTS `new_table1` (
  `column1` varchar(255) NOT NULL,
  PRIMARY KEY (`column1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы geekbrains.new_table1: ~0 rows (приблизительно)
DELETE FROM `new_table1`;
/*!40000 ALTER TABLE `new_table1` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table1` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.notifications
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `id_task` int(11) DEFAULT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `FK_notifications_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_notifications_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.notifications: ~0 rows (приблизительно)
DELETE FROM `notifications`;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы geekbrains.password_resets: ~0 rows (приблизительно)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci,
  `id_status` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_author` int(11) unsigned NOT NULL,
  `id_current_task` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`id_status`),
  KEY `author` (`id_author`),
  KEY `FK_projects_tasks` (`id_current_task`),
  CONSTRAINT `FK_projects_statuses` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`),
  CONSTRAINT `FK_projects_tasks` FOREIGN KEY (`id_current_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_projects_users` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.projects: ~51 rows (приблизительно)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `description`, `id_status`, `date_create`, `id_author`, `id_current_task`, `updated_at`, `created_at`) VALUES
	(2, 'Dead', 'dad', NULL, '2017-10-15 10:20:56', 4, NULL, NULL, NULL),
	(6, '223', '23', NULL, '2017-10-19 17:52:19', 4, NULL, '2017-10-19 17:52:20', '2017-10-19 17:52:20'),
	(11, 'Захват мира', NULL, NULL, '2017-10-21 07:50:31', 2, NULL, '2017-10-21 07:50:31', '2017-10-21 07:50:31'),
	(12, 'ввфы', 'ывф', NULL, '2017-10-21 07:52:26', 4, NULL, '2017-10-21 07:52:26', '2017-10-21 07:52:26'),
	(13, 'Попрбуем', NULL, NULL, '2017-10-21 08:18:17', 4, NULL, '2017-10-21 08:18:17', '2017-10-21 08:18:17'),
	(14, 'Взлом пентагона', NULL, NULL, '2017-10-27 08:31:08', 11, NULL, '2017-10-27 08:31:08', '2017-10-27 08:31:08'),
	(15, 'asd', 'asd', NULL, '2017-10-27 08:38:13', 4, NULL, '2017-10-27 08:38:13', '2017-10-27 08:38:13'),
	(16, 'dsaweew', 'asd', NULL, '2017-10-31 06:52:05', 4, NULL, '2017-10-31 06:52:05', '2017-10-31 06:52:05'),
	(17, 'dsaweew', 'baseline -- f', NULL, '2017-10-31 06:53:38', 4, NULL, '2017-10-31 06:53:38', '2017-10-31 06:53:38'),
	(18, 'dsaweew', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, '2017-10-31 06:53:38', 4, NULL, '2017-10-31 06:53:38', '2017-10-31 06:53:38'),
	(19, 'dsaweew', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, '2017-10-31 06:53:39', 4, NULL, '2017-10-31 06:53:39', '2017-10-31 06:53:39'),
	(20, 'dsaweew', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, '2017-10-31 06:53:40', 4, NULL, '2017-10-31 06:53:40', '2017-10-31 06:53:40'),
	(21, 'dsaweew', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, '2017-10-31 06:53:40', 4, NULL, '2017-10-31 06:53:40', '2017-10-31 06:53:40'),
	(22, 'dsaweew', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, '2017-10-31 06:53:41', 4, NULL, '2017-10-31 06:53:41', '2017-10-31 06:53:41'),
	(23, 'dsaweew', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, '2017-10-31 06:53:41', 4, NULL, '2017-10-31 06:53:41', '2017-10-31 06:53:41'),
	(24, 'dsaweew', '1;waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:42', 4, NULL, '2017-10-31 06:53:42', '2017-10-31 06:53:42'),
	(25, 'dsaweew', '1\';waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:43', 4, NULL, '2017-10-31 06:53:43', '2017-10-31 06:53:43'),
	(26, 'dsaweew', '1);waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:43', 4, NULL, '2017-10-31 06:53:43', '2017-10-31 06:53:43'),
	(27, 'dsaweew', '1\');waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:44', 4, NULL, '2017-10-31 06:53:44', '2017-10-31 06:53:44'),
	(28, 'dsaweew', '1));waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:44', 4, NULL, '2017-10-31 06:53:44', '2017-10-31 06:53:44'),
	(29, 'dsaweew', '1\'));waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:45', 4, NULL, '2017-10-31 06:53:45', '2017-10-31 06:53:45'),
	(30, 'dsaweew', '1)));waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:45', 4, NULL, '2017-10-31 06:53:45', '2017-10-31 06:53:45'),
	(31, 'dsaweew', '1\')));waitfor/*b*/delay \'0:0:04\' -- f', NULL, '2017-10-31 06:53:46', 4, NULL, '2017-10-31 06:53:46', '2017-10-31 06:53:46'),
	(32, 'dsaweew', '/etc/hosts', NULL, '2017-10-31 06:53:46', 4, NULL, '2017-10-31 06:53:46', '2017-10-31 06:53:46'),
	(33, 'dsaweew', '../etc/hosts', NULL, '2017-10-31 06:53:47', 4, NULL, '2017-10-31 06:53:47', '2017-10-31 06:53:47'),
	(34, 'dsaweew', '../../etc/hosts', NULL, '2017-10-31 06:53:47', 4, NULL, '2017-10-31 06:53:47', '2017-10-31 06:53:47'),
	(35, 'dsaweew', '../../../etc/hosts', NULL, '2017-10-31 06:53:48', 4, NULL, '2017-10-31 06:53:48', '2017-10-31 06:53:48'),
	(36, 'dsaweew', '../../../../etc/hosts', NULL, '2017-10-31 06:53:48', 4, NULL, '2017-10-31 06:53:48', '2017-10-31 06:53:48'),
	(37, 'dsaweew', '../../../../../etc/hosts', NULL, '2017-10-31 06:53:49', 4, NULL, '2017-10-31 06:53:49', '2017-10-31 06:53:49'),
	(38, 'dsaweew', '../../../../../../etc/hosts', NULL, '2017-10-31 06:53:49', 4, NULL, '2017-10-31 06:53:49', '2017-10-31 06:53:49'),
	(39, 'dsaweew', '../../../../../../../etc/hosts', NULL, '2017-10-31 06:53:50', 4, NULL, '2017-10-31 06:53:50', '2017-10-31 06:53:50'),
	(40, 'dsaweew', '../../../../../../../../etc/hosts', NULL, '2017-10-31 06:53:50', 4, NULL, '2017-10-31 06:53:50', '2017-10-31 06:53:50'),
	(41, 'dsaweew', 'hTeXz"\'<>= &quot;&lt;&gt;lr5EZ', NULL, '2017-10-31 06:53:51', 4, NULL, '2017-10-31 06:53:51', '2017-10-31 06:53:51'),
	(42, 'dsaweew', 'asd', NULL, '2017-10-31 06:53:52', 4, NULL, '2017-10-31 06:53:52', '2017-10-31 06:53:52'),
	(43, 'dsaweew', 'asd', NULL, '2017-10-31 06:53:52', 4, NULL, '2017-10-31 06:53:52', '2017-10-31 06:53:52'),
	(44, 'baseline -- f', 'asd', NULL, '2017-10-31 06:53:53', 4, NULL, '2017-10-31 06:53:53', '2017-10-31 06:53:53'),
	(45, '/etc/hosts', 'asd', NULL, '2017-10-31 06:54:03', 4, NULL, '2017-10-31 06:54:03', '2017-10-31 06:54:03'),
	(46, '../etc/hosts', 'asd', NULL, '2017-10-31 06:54:04', 4, NULL, '2017-10-31 06:54:04', '2017-10-31 06:54:04'),
	(47, '../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:04', 4, NULL, '2017-10-31 06:54:04', '2017-10-31 06:54:04'),
	(48, '../../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:06', 4, NULL, '2017-10-31 06:54:06', '2017-10-31 06:54:06'),
	(49, '../../../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:07', 4, NULL, '2017-10-31 06:54:07', '2017-10-31 06:54:07'),
	(50, '../../../../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:08', 4, NULL, '2017-10-31 06:54:08', '2017-10-31 06:54:08'),
	(51, '../../../../../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:10', 4, NULL, '2017-10-31 06:54:10', '2017-10-31 06:54:10'),
	(52, '../../../../../../../etc/hosts', 'asd', NULL, '2017-10-31 06:54:10', 4, NULL, '2017-10-31 06:54:10', '2017-10-31 06:54:10'),
	(53, 'hTeXz"\'<>= &quot;&lt;&gt;3MOtZ', 'asd', NULL, '2017-10-31 06:54:12', 4, NULL, '2017-10-31 06:54:12', '2017-10-31 06:54:12'),
	(54, 'dsaweew', 'asd', NULL, '2017-10-31 06:54:12', 4, NULL, '2017-10-31 06:54:12', '2017-10-31 06:54:12'),
	(55, 'dsaweew', 'asd', NULL, '2017-10-31 06:54:13', 4, NULL, '2017-10-31 06:54:13', '2017-10-31 06:54:13'),
	(56, 'dsaweew', 'asd', NULL, '2017-10-31 06:54:19', 4, NULL, '2017-10-31 06:54:19', '2017-10-31 06:54:19'),
	(57, 'dsaweew', 'asd', NULL, '2017-10-31 06:54:20', 4, NULL, '2017-10-31 06:54:20', '2017-10-31 06:54:20'),
	(58, 'cvgf', NULL, NULL, '2017-10-31 16:28:07', 4, NULL, '2017-10-31 16:28:00', '2017-10-31 16:28:00'),
	(59, 'Local', 'LocalLocal', NULL, '2017-12-17 12:48:35', 4, NULL, '2017-12-17 12:48:34', '2017-12-17 12:48:34');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.project_users
DROP TABLE IF EXISTS `project_users`;
CREATE TABLE IF NOT EXISTS `project_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) DEFAULT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `is_kurator` bit(1) DEFAULT NULL,
  `invite` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project` (`id_project`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK2_id_project` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK_project_users_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.project_users: ~68 rows (приблизительно)
DELETE FROM `project_users`;
/*!40000 ALTER TABLE `project_users` DISABLE KEYS */;
INSERT INTO `project_users` (`id`, `id_project`, `id_user`, `is_kurator`, `invite`, `updated_at`) VALUES
	(1, 6, 4, b'1', 'in', '2017-11-01 18:24:51'),
	(2, 2, 3, b'0', 'in', NULL),
	(5, 2, 4, b'1', 'in', NULL),
	(7, 11, 2, b'1', 'in', NULL),
	(8, 12, 4, b'1', 'in', NULL),
	(9, 11, 4, b'0', 'in', '2017-10-21 08:27:14'),
	(10, 11, 2, b'0', 'soon', NULL),
	(11, 11, 3, b'0', 'soon', NULL),
	(12, 11, 6, b'0', 'soon', NULL),
	(13, 11, 7, b'0', 'soon', NULL),
	(14, 11, 8, b'0', 'soon', NULL),
	(15, 13, 4, b'1', 'in', NULL),
	(16, 13, 2, b'0', 'soon', NULL),
	(17, 13, 10, b'0', 'in', '2017-10-21 08:29:19'),
	(18, 14, 11, b'1', 'in', NULL),
	(19, 14, 4, b'0', 'in', '2017-10-27 08:38:01'),
	(20, 14, 4, b'0', 'in', '2017-10-27 08:38:01'),
	(21, 15, 4, b'1', 'in', NULL),
	(22, 16, 4, b'1', 'in', NULL),
	(23, 16, 2, b'0', 'soon', NULL),
	(24, 17, 4, b'1', 'in', NULL),
	(25, 18, 4, b'1', 'in', NULL),
	(26, 19, 4, b'1', 'in', NULL),
	(27, 20, 4, b'1', 'in', NULL),
	(28, 21, 4, b'1', 'in', NULL),
	(29, 22, 4, b'1', 'in', NULL),
	(30, 23, 4, b'1', 'in', NULL),
	(31, 24, 4, b'1', 'in', NULL),
	(32, 25, 4, b'1', 'in', NULL),
	(33, 26, 4, b'1', 'in', NULL),
	(34, 27, 4, b'1', 'in', NULL),
	(35, 28, 4, b'1', 'in', NULL),
	(36, 29, 4, b'1', 'in', NULL),
	(37, 30, 4, b'1', 'in', NULL),
	(38, 31, 4, b'1', 'in', NULL),
	(39, 32, 4, b'1', 'in', NULL),
	(40, 33, 4, b'1', 'in', NULL),
	(41, 34, 4, b'1', 'in', NULL),
	(42, 35, 4, b'1', 'in', NULL),
	(43, 36, 4, b'1', 'in', NULL),
	(44, 37, 4, b'1', 'in', NULL),
	(45, 38, 4, b'1', 'in', NULL),
	(46, 39, 4, b'1', 'in', NULL),
	(47, 40, 4, b'1', 'in', NULL),
	(48, 41, 4, b'1', 'in', NULL),
	(49, 42, 4, b'1', 'in', NULL),
	(50, 43, 4, b'1', 'in', NULL),
	(51, 44, 4, b'1', 'in', NULL),
	(52, 45, 4, b'1', 'in', NULL),
	(53, 46, 4, b'1', 'in', NULL),
	(54, 47, 4, b'1', 'in', NULL),
	(55, 48, 4, b'1', 'in', NULL),
	(56, 49, 4, b'1', 'in', NULL),
	(57, 50, 4, b'1', 'in', NULL),
	(58, 51, 4, b'1', 'in', NULL),
	(59, 52, 4, b'1', 'in', NULL),
	(60, 53, 4, b'1', 'in', NULL),
	(61, 54, 4, b'1', 'in', NULL),
	(62, 55, 4, b'1', 'in', NULL),
	(63, 56, 4, b'1', 'in', NULL),
	(64, 57, 4, b'1', 'in', NULL),
	(65, 16, 2, b'0', 'soon', NULL),
	(66, 16, 2, b'0', 'soon', NULL),
	(67, 16, 2, b'0', 'soon', NULL),
	(68, 16, 2, b'0', 'soon', NULL),
	(69, 58, 4, b'1', 'in', NULL),
	(70, 6, 4, b'0', 'in', '2017-11-01 18:24:51'),
	(71, 59, 4, b'1', 'in', NULL);
/*!40000 ALTER TABLE `project_users` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.statuses
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` int(1) unsigned DEFAULT NULL COMMENT '1 - for project, 2 - for task',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.statuses: ~6 rows (приблизительно)
DELETE FROM `statuses`;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `name`, `type`) VALUES
	(1, 'В работе', 2),
	(2, 'Выполнено', 2),
	(3, 'Отклонено', 2),
	(4, 'Приостановлено', 2),
	(5, 'Актуален', 1),
	(6, 'В архиве', 1);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.tasks
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `result` mediumtext COLLATE utf8_unicode_ci,
  `id_status` int(11) DEFAULT '0',
  `deadline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_author` int(11) unsigned DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_type` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`id_status`),
  KEY `author` (`id_author`),
  KEY `type` (`id_type`),
  KEY `FK_tasks_projects` (`id_project`),
  CONSTRAINT `FK_tasks_projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK_tasks_statuses` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`),
  CONSTRAINT `FK_tasks_types` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.tasks: ~99 rows (приблизительно)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `name`, `description`, `result`, `id_status`, `deadline`, `id_author`, `date_create`, `id_type`, `id_project`, `updated_at`) VALUES
	(1, 'Это первая задача AJAX', 'Описание 1 new test 1\nsedfsdgs', 'Результат 1', 3, '2017-10-20 00:00:00', 2, '2017-10-15 19:06:33', 1, 2, '2017-10-20 07:40:40'),
	(2, 'Это вторая задача', 'Большое описание', '-', 2, '2018-01-15 20:51:24', 2, '2017-10-15 20:51:35', 2, 2, '2017-10-16 17:39:24'),
	(4, 'пример', 'пример', NULL, 1, '2017-10-16 16:13:47', NULL, '2017-10-16 16:13:47', NULL, NULL, '2017-10-16 17:39:24'),
	(5, '111', '111', NULL, 1, '2017-10-16 16:19:40', NULL, '2017-10-16 16:19:40', NULL, NULL, '2017-10-16 17:39:24'),
	(6, '12', '12', NULL, 1, '2017-10-16 16:57:22', NULL, '2017-10-16 16:57:22', NULL, NULL, '2017-10-16 17:39:24'),
	(7, '333', '333', NULL, 1, '2017-10-16 17:05:07', NULL, '2017-10-16 17:05:07', NULL, NULL, '2017-10-16 17:39:24'),
	(8, 'тест', 'тест', NULL, 2, '2017-10-18 00:00:00', 2, '2017-10-16 17:15:04', 2, 2, '2017-10-16 17:39:24'),
	(9, 'новый пример', 'описание примера 5', '444', 1, '2017-10-20 00:00:00', 2, '2017-10-16 17:28:08', 3, 2, '2017-10-16 17:44:03'),
	(10, '123', '123', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:29:02', 1, 2, '2017-10-20 20:29:02'),
	(11, '123', '123', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:32:17', 1, 2, '2017-10-20 20:32:17'),
	(12, '1111', '1111', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:33:01', 1, 2, '2017-10-20 20:33:01'),
	(13, '1111', '1111', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:35:24', 1, 2, '2017-10-20 20:35:24'),
	(14, 'это тест', 'это тест', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:36:07', 1, 2, '2017-10-20 20:36:07'),
	(15, 'qqq', 'qqq', NULL, 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:39:21', 1, 2, '2017-10-20 20:39:21'),
	(16, 'www3', 'www', '', 1, '2017-10-21 00:00:00', 2, '2017-10-20 20:46:34', 1, 2, '2017-10-20 20:46:53'),
	(17, 'd', 'd', NULL, 1, '2017-10-22 00:00:00', 4, '2017-10-21 07:45:27', 1, 2, '2017-10-21 07:45:27'),
	(18, 'Обмозговать все', 'Как слдует', NULL, 1, '2017-10-22 00:00:00', 4, '2017-10-21 08:19:38', 1, 13, '2017-10-21 08:19:38'),
	(19, 'ngn', 'nfnnf', NULL, 1, '2017-10-27 00:00:00', 4, '2017-10-26 21:10:15', 1, 13, '2017-10-26 21:10:15'),
	(20, 'mfdsmf', 'dsffsd', NULL, 1, '2017-10-27 00:00:00', 4, '2017-10-26 21:12:14', 1, 13, '2017-10-26 21:12:14'),
	(21, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:52:25', 1, 16, '2017-10-31 06:52:25'),
	(22, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:54:57', 1, 16, '2017-10-31 06:54:57'),
	(23, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:54:57', 1, 16, '2017-10-31 06:54:57'),
	(24, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:08', 1, 16, '2017-10-31 06:55:08'),
	(25, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:09', 1, 16, '2017-10-31 06:55:09'),
	(26, '', 'baseline -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:09', 1, 16, '2017-10-31 06:55:09'),
	(27, '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:09', 1, 16, '2017-10-31 06:55:09'),
	(28, '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:09', 1, 16, '2017-10-31 06:55:09'),
	(29, '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:10', 1, 16, '2017-10-31 06:55:10'),
	(30, '', 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:10', 1, 16, '2017-10-31 06:55:10'),
	(31, '', '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:10', 1, 16, '2017-10-31 06:55:10'),
	(32, '', '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:10', 1, 16, '2017-10-31 06:55:10'),
	(33, '', '1;waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:11', 1, 16, '2017-10-31 06:55:11'),
	(34, '', '1\';waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:11', 1, 16, '2017-10-31 06:55:11'),
	(35, '', '1);waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:11', 1, 16, '2017-10-31 06:55:11'),
	(36, '', '1\');waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:11', 1, 16, '2017-10-31 06:55:11'),
	(37, '', '1));waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:12', 1, 16, '2017-10-31 06:55:12'),
	(38, '', '1\'));waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:12', 1, 16, '2017-10-31 06:55:12'),
	(39, '', '1)));waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:12', 1, 16, '2017-10-31 06:55:12'),
	(40, '', '1\')));waitfor/*b*/delay \'0:0:04\' -- f', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:12', 1, 16, '2017-10-31 06:55:12'),
	(41, '', '/etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:12', 1, 16, '2017-10-31 06:55:12'),
	(42, '', '../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:13', 1, 16, '2017-10-31 06:55:13'),
	(43, '', '../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:13', 1, 16, '2017-10-31 06:55:13'),
	(44, '', '../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:13', 1, 16, '2017-10-31 06:55:13'),
	(45, '', '../../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:13', 1, 16, '2017-10-31 06:55:13'),
	(46, '', '../../../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:13', 1, 16, '2017-10-31 06:55:13'),
	(47, '', '../../../../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:14', 1, 16, '2017-10-31 06:55:14'),
	(48, '', '../../../../../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:14', 1, 16, '2017-10-31 06:55:14'),
	(49, '', '../../../../../../../../etc/hosts', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:14', 1, 16, '2017-10-31 06:55:14'),
	(50, '', 'hTeXz"\'<>= &quot;&lt;&gt;rujMZ', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:14', 1, 16, '2017-10-31 06:55:14'),
	(51, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:15', 1, 16, '2017-10-31 06:55:15'),
	(52, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:15', 1, 16, '2017-10-31 06:55:15'),
	(53, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:15', 1, 16, '2017-10-31 06:55:15'),
	(54, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:15', 1, 16, '2017-10-31 06:55:15'),
	(55, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:24', 1, 16, '2017-10-31 06:55:24'),
	(56, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:25', 1, 16, '2017-10-31 06:55:25'),
	(57, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:25', 1, 16, '2017-10-31 06:55:25'),
	(58, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:25', 1, 16, '2017-10-31 06:55:25'),
	(59, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:25', 1, 16, '2017-10-31 06:55:25'),
	(60, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:26', 1, 16, '2017-10-31 06:55:26'),
	(61, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:26', 1, 16, '2017-10-31 06:55:26'),
	(62, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:26', 1, 16, '2017-10-31 06:55:26'),
	(63, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:26', 1, 16, '2017-10-31 06:55:26'),
	(64, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:26', 1, 16, '2017-10-31 06:55:26'),
	(65, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:27', 1, 16, '2017-10-31 06:55:27'),
	(66, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:27', 1, 16, '2017-10-31 06:55:27'),
	(67, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:42', 1, 16, '2017-10-31 06:55:42'),
	(68, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:43', 1, 16, '2017-10-31 06:55:43'),
	(69, 'baseline -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:43', 1, 16, '2017-10-31 06:55:43'),
	(70, 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:43', 1, 16, '2017-10-31 06:55:43'),
	(71, '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:43', 1, 16, '2017-10-31 06:55:43'),
	(72, '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141))', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:44', 1, 16, '2017-10-31 06:55:44'),
	(73, 'BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:44', 1, 16, '2017-10-31 06:55:44'),
	(74, '1234/*B*/or/*b*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:45', 1, 16, '2017-10-31 06:55:45'),
	(75, '1234\'/*A*/or/*a*/BENCHMARK/*bypass*/(20000000,sha1(0x41414141414141414141)) -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:45', 1, 16, '2017-10-31 06:55:45'),
	(76, '1;waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:45', 1, 16, '2017-10-31 06:55:45'),
	(77, '1\';waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:45', 1, 16, '2017-10-31 06:55:45'),
	(78, '1);waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:46', 1, 16, '2017-10-31 06:55:46'),
	(79, '1\');waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:46', 1, 16, '2017-10-31 06:55:46'),
	(80, '1));waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:46', 1, 16, '2017-10-31 06:55:46'),
	(81, '1\'));waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:46', 1, 16, '2017-10-31 06:55:46'),
	(82, '1)));waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:46', 1, 16, '2017-10-31 06:55:46'),
	(83, '1\')));waitfor/*b*/delay \'0:0:04\' -- f', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:47', 1, 16, '2017-10-31 06:55:47'),
	(84, '/etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:47', 1, 16, '2017-10-31 06:55:47'),
	(85, '../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:47', 1, 16, '2017-10-31 06:55:47'),
	(86, '../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:47', 1, 16, '2017-10-31 06:55:47'),
	(87, '../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:48', 1, 16, '2017-10-31 06:55:48'),
	(88, '../../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:48', 1, 16, '2017-10-31 06:55:48'),
	(89, '../../../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:48', 1, 16, '2017-10-31 06:55:48'),
	(90, '../../../../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:48', 1, 16, '2017-10-31 06:55:48'),
	(91, '../../../../../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:49', 1, 16, '2017-10-31 06:55:49'),
	(92, '../../../../../../../../etc/hosts', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:49', 1, 16, '2017-10-31 06:55:49'),
	(93, 'hTeXz"\'<>= &quot;&lt;&gt;S5kOZ', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:49', 1, 16, '2017-10-31 06:55:49'),
	(94, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:49', 1, 16, '2017-10-31 06:55:49'),
	(95, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:55:49', 1, 16, '2017-10-31 06:55:49'),
	(96, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:56:02', 1, 16, '2017-10-31 06:56:02'),
	(97, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:56:03', 1, 16, '2017-10-31 06:56:03'),
	(98, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:56:15', 1, 16, '2017-10-31 06:56:15'),
	(99, '', '', NULL, 1, '2017-11-01 00:00:00', 4, '2017-10-31 06:56:15', 1, 16, '2017-10-31 06:56:15'),
	(100, 'Local', 'Local', NULL, 2, '2017-12-18 00:00:00', 4, '2017-12-17 12:49:19', 2, 59, '2017-12-17 12:49:19');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.task_users
DROP TABLE IF EXISTS `task_users`;
CREATE TABLE IF NOT EXISTS `task_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) unsigned NOT NULL,
  `id_task` int(11) NOT NULL,
  `total_voices` int(11) DEFAULT '0' COMMENT 'назначено голосов на пользователя',
  `result_txt` mediumtext COLLATE utf8_unicode_ci COMMENT 'результат пользователя',
  `is_ready` bit(1) DEFAULT b'0' COMMENT 'флаг ознакомления/готовности/согласования',
  `is_kurator` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `FK_task_users_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_task_users_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.task_users: ~2 rows (приблизительно)
DELETE FROM `task_users`;
/*!40000 ALTER TABLE `task_users` DISABLE KEYS */;
INSERT INTO `task_users` (`id`, `id_user`, `id_task`, `total_voices`, `result_txt`, `is_ready`, `is_kurator`) VALUES
	(1, 2, 1, 5, NULL, b'0', b'1'),
	(2, 3, 1, 3, NULL, b'0', b'0');
/*!40000 ALTER TABLE `task_users` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.test
DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы geekbrains.test: ~0 rows (приблизительно)
DELETE FROM `test`;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.types
DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы geekbrains.types: ~4 rows (приблизительно)
DELETE FROM `types`;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`) VALUES
	(1, 'Генерация идей'),
	(2, 'Голосование'),
	(3, 'Согласование'),
	(4, 'Ознакомление');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Дамп структуры для таблица geekbrains.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы geekbrains.users: ~10 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `firstname`, `middlename`, `lastname`, `photo`, `gender`, `birthdate`) VALUES
	(1, 'Donner', 'nsdonner@gmail.com', '$2y$10$.6u8aST.K74p59Q1czfHqOgzj75WFodYDYBJmqNefEAu4SwMA8c2a', 'GRFsLxmYqJzGKUqOyBtSfgs51p3ORQW4OMCGVk2cYr4BNrzuFU3ae0PBl3je', '2017-09-19 14:17:15', '2017-09-19 14:17:15', NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'Стаc', 'paladin_cool@inbox.ru', '$2y$10$Tnj33olbd1Z.OKqQxIbA6en711WWWA4p/Ye9/kymjm3H7liCSLD82', NULL, '2017-09-20 19:45:31', '2017-09-24 21:30:36', 'Станислав', 'Игоревич', 'Черняков', '1.jpg', NULL, NULL),
	(3, 'enhakar', 'enhakar@mail.ru', '$2y$10$HsDe4z9RbghZaThm.wPGS.YX9e1fRgzDMnhQ.tvRxEvXvME5yAF2y', '8FyBHfmjREUuPwrrTztFLhB8OfEI7snN5yuPnwSN29kjwKJLPTveu4bh9O7h', '2017-09-20 19:46:49', '2017-09-25 14:53:35', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'Dmitry1', 'dead@dead.dead', '$2y$10$qXXPeItCqjLExQCu60WAyOPbJYgNu2tid7wxhqUBJbtM2fzTUxvma', 's5zxxA1ySFFLzk0VorDrl7NxjZbeX89C8BMFHnGseCgopl4aDrOUJpxmYjo4', '2017-09-22 11:04:57', '2017-10-12 07:52:32', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, '12', 'siblis@ya.ru', '$2y$10$5ypL3ESHhMWpd7M9td5fNuTa9fHxhxqEO7cAVXNr6FAn0PV3x5LSK', NULL, '2017-09-30 09:23:20', '2017-09-30 09:29:12', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '1234', 'qwertyqwerty_12@list.ru', '$2y$10$GIdu1XwtLsawg5cSQG9PLOiaOIG3X9t/XTRqgOAhRZwFGDG1q0XL.', 'CwX0KvamAEFRmmsa6PBr756kXjz28cKfB8r3aqPfZwmJCoNdZ7jIunpXh8RB', '2017-10-04 18:51:23', '2017-10-04 18:51:23', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, '1234', 'plutonio00@mail.ru', '$2y$10$YEKBmO/Z30POusxjOgpAfOq.qdeSobuFIW9/fq3aWnTp6e6YyNHnq', 'MyuyTJAf44QWKsQmYiIZc7gsUKaPMJxm7K4d4qnVvjESK6HKyjOoUTAgK9AX', '2017-10-06 11:28:18', '2017-10-06 11:28:18', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, '1234', '1234@mail.ru', '$2y$10$fFOWXcPmrLfJfFJa0luSG.1kxCdftM/cNvYFMgGPIcvs7.tlfLgrO', 'cMIELdLJpPvTruO1KAteTtnSWMAs3ublJBdaDaF6iWfhklgWdAmlLMEi9710', '2017-10-06 14:50:38', '2017-10-06 14:50:38', NULL, NULL, NULL, NULL, NULL, NULL),
	(10, '23', 'deasd@d.d', NULL, NULL, '2017-10-21 08:28:53', '2017-10-21 08:28:53', NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'Сумаил', 'vladislav.mezhnev@mail.ru', NULL, NULL, '2017-10-27 08:29:59', '2017-10-27 08:29:59', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
