-- Adminer 4.2.2fx MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `magnus`;
CREATE DATABASE `magnus` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `magnus`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
(6,	'janeczko',	'janeczko.jan@gmail.com',	'$2y$10$AirmHiEY25Gm8i8fBB86JOYAFdP3X/dYR8hX3mSMfe32jxco2k6CW',	'Jan',	'Janeczko'),
(7,	'obluda',	'obluda@opice.hu',	'$2y$10$M03K/ezxRLP8wJ4IObmnNO4wbOiLSdAIf5q0K.3HdcKtpD4DQ24Ki',	'Oluda',	'z Maďarska'),
(8,	'otrok',	'otrok.cigansky@nazi.de',	'$2y$10$cPk3U2vt4M4fzoTJxrh7FuDp/bNkOx.Qv7Nsm.u6HyfEefjCL7brC',	'Dežo',	'Žiga');

-- 2015-10-30 21:52:35
