-- --------------------------------------------------------
-- Хост:                         192.168.1.105
-- Версия сервера:               5.7.18-15 - Percona Server (GPL), Release '15', Revision 'bff2cd9'
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных ChoiceOfIdea
CREATE DATABASE IF NOT EXISTS `ChoiceOfIdea` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `ChoiceOfIdea`;

-- Дамп структуры для таблица ChoiceOfIdea.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_comments_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.comments: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.comment_links
CREATE TABLE IF NOT EXISTS `comment_links` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_idea` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_comment` (`id_comment`),
  KEY `id_idea` (`id_idea`),
  KEY `id_task` (`id_task`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `FK_comment_links_comments` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`),
  CONSTRAINT `FK_comment_links_ideas` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id`),
  CONSTRAINT `FK_comment_links_projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK_comment_links_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.comment_links: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comment_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_links` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.ideas
CREATE TABLE IF NOT EXISTS `ideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.ideas: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `FK_notifications_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_notifications_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.notifications: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `author` (`author`),
  CONSTRAINT `FK_projects_statuses` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`),
  CONSTRAINT `FK_projects_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.projects: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.project_tasks
CREATE TABLE IF NOT EXISTS `project_tasks` (
  `id` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project` (`id_project`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `FK__projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK__tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.project_tasks: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `project_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_tasks` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.project_users
CREATE TABLE IF NOT EXISTS `project_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project` (`id_project`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_project_users_projects` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  CONSTRAINT `FK_project_users_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.project_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `project_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_users` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.statuses: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `result` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0',
  `deadline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `author` (`author`),
  KEY `type` (`type`),
  CONSTRAINT `FK_tasks_statuses` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`),
  CONSTRAINT `FK_tasks_types` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.tasks: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.task_ideas
CREATE TABLE IF NOT EXISTS `task_ideas` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_idea` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `choices` int(11) DEFAULT '0' COMMENT 'Количество отданных голосов',
  PRIMARY KEY (`id`),
  KEY `id_task` (`id_task`),
  KEY `id_idea` (`id_idea`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_task_ideas_ideas` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id`),
  CONSTRAINT `FK_task_ideas_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_task_ideas_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.task_ideas: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `task_ideas` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_ideas` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.task_users
CREATE TABLE IF NOT EXISTS `task_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `total_voices` int(11) DEFAULT '0' COMMENT 'назначено голосов на пользователя',
  `result_txt` mediumtext COLLATE utf8_unicode_ci COMMENT 'результат пользователя',
  `ready` bit(1) DEFAULT b'0' COMMENT 'флаг ознакомления/готовности/согласования',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `FK_task_users_tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `FK_task_users_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.task_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `task_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_users` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.types: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Дамп структуры для таблица ChoiceOfIdea.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salt` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `middlename` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `photo` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `birthdate` datetime DEFAULT NULL,
  `gender` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы ChoiceOfIdea.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
