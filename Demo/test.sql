# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: test
# Generation Time: 2015-10-23 04:27:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Books`;

CREATE TABLE `Books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  `picture` varchar(200) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Books` WRITE;
/*!40000 ALTER TABLE `Books` DISABLE KEYS */;

INSERT INTO `Books` (`id`, `title`, `author`, `description`, `price`, `rating`, `picture`, `category`)
VALUES
	(1,'Jungle Book','R. Kipling','ancient monastery (Raymond Khoury, The Sign), ?hidden esoteric wisdom, Masonic secrets? (Dan Brown, The Lost Symbol), ?the secret behind Noah?s Ark? (Boyd Morrison, The Ark), ?Druidic pagan cross? (James Rollins, The Doomsday Key); ?A buried Egyptian temple. A secret kept for 6000 years. A race for life worth killing for.? (Andy McDermott, The Pyramid of Doom)',80,3,'image/book1.png','fiction'),
	(2,'Moonwalker','J. Walker','stunning controversy thats spinning out of control? (Raymond Khoury, The Sign); ?..never before seen revelations seem to be leading him to a single impossible and inconceivable truth? (Dan Brown, The Lost Symbol); ?The mission is incredible. The consequences of failure are unimaginable. The ending is unthinkable.? (Matthew Reilly. Six Sacred Stones)',65.5,2,'image/book2.png','fiction'),
	(3,'PHP for Dummies','Some Smart Guy','This isn?t done often for the blockbuster novels, but James Rollins does it well with a rugged photo and a description that includes ?An avid spelunker and certified scuba enthusiast, he can often be found underground or underwater.? Now that?s a thriller writer!',35,5,'image/book3.png','programming');

/*!40000 ALTER TABLE `Books` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Book`;

CREATE TABLE `Book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Book` WRITE;
/*!40000 ALTER TABLE `Book` DISABLE KEYS */;

INSERT INTO `Book` (`id`, `title`, `author`, `description`)
VALUES
	(1,'Jungle Book','R. Kipling','ancient monastery (Raymond Khoury, The Sign), ?hidden esoteric wisdom, Masonic secrets? (Dan Brown, The Lost Symbol), '),
	(2,'Moonwalker','J. Walker','stunning controversy thats spinning out of control? (Raymond Khoury, The Sign); ?.'),
	(3,'PHP for Dummies','Some Smart Guy','This isn?t done often for the blockbuster novels, but James Rollins does it well with a rugged photo and a description that includes '),
	(7,'adadadsad','dwqeqwqwe','3121321');

/*!40000 ALTER TABLE `Book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `Orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT '0',
  `order_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;

INSERT INTO `Orders` (`id`, `user_id`, `book_id`, `qty`, `order_time`)
VALUES
	(1,1,1,2,NULL);

/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `status`)
VALUES
	(1,'user1','pass1','fff1','lll1','example@gmail.com',1439886936),
	(2,'user2','dadas','dwdaq','dwqdqwd','email@gmail.com',0),
	(3,'user3','pss','fdf','fadsfas','email',0),
	(4,'user4','pass4','ffff3','llll4','emaildadad',0),
	(5,'admin','pass','manager','','',0);

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users2`;

CREATE TABLE `Users2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
