-- Adminer 4.2.2fx MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `vpp`;
CREATE DATABASE `vpp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `vpp`;

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `url` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `eshop` tinyint(4) NOT NULL,
  `rental` tinyint(4) NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `category` (`id`, `name`, `url`, `eshop`, `rental`, `category_id`) VALUES
(1,	'Dekorace',	'dekorace',	1,	0,	NULL),
(2,	'Kostýmy',	'kostymy',	1,	0,	NULL),
(3,	'Ostatní',	'ostatni',	1,	0,	NULL),
(4,	'Balónky',	'balonky',	1,	0,	1),
(5,	'Girlandy',	'girlandy',	1,	0,	1),
(6,	'Svíčky',	'svicky',	1,	0,	1),
(7,	'Klaun',	'klaun',	1,	0,	2),
(8,	'Pirátské',	'piratske',	1,	0,	2),
(9,	'Talířky',	'talirky',	1,	0,	3),
(10,	'Ubrousky',	'ubrousky',	1,	0,	3);

DROP TABLE IF EXISTS `eshop_product`;
CREATE TABLE `eshop_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `desc` text COLLATE utf8_czech_ci,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `eshop_product` (`id`, `name`, `desc`, `price`, `stock`, `category_id`) VALUES
(1,	'Balónek',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolorem earum esse hic neque! Alias deserunt doloribus itaque laboriosam nihil numquam officia perspiciatis qui quos repudiandae, sit soluta tempora voluptates.Consequatur cum deleniti dolore ducimus, eligendi, ex harum illo, neque officiis porro quam repellat saepe utvoluptates voluptatibus? Amet ducimus hic id maxime odit praesentium quos repellat unde, ut vero.',	299,	100,	4);

DROP TABLE IF EXISTS `gallery_items`;
CREATE TABLE `gallery_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(10) unsigned NOT NULL,
  `in_carousel` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `gallery_items` (`id`, `image_id`, `in_carousel`) VALUES
(1,	1,	1),
(2,	2,	1),
(3,	3,	1),
(4,	4,	1),
(5,	1,	0),
(6,	3,	0),
(7,	4,	0),
(8,	2,	0),
(9,	1,	0),
(10,	4,	0),
(11,	2,	0),
(12,	3,	0);

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dir` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `image` (`id`, `dir`, `name`) VALUES
(1,	'images',	'obr1.jpg'),
(2,	'images',	'obr2.jpg'),
(3,	'images',	'obr3.jpg'),
(4,	'images',	'obr4.jpg'),
(5,	'images/eshop_product',	'1_balonek.svg');

DROP TABLE IF EXISTS `image_eshop_product`;
CREATE TABLE `image_eshop_product` (
  `image_id` int(10) unsigned NOT NULL,
  `eshop_product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`image_id`,`eshop_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `image_eshop_product` (`image_id`, `eshop_product_id`) VALUES
(5,	1);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('user','admin','supervisor') COLLATE utf8_czech_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


-- 2015-12-01 00:25:25
