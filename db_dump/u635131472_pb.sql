
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 09:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u635131472_pb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('username', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `id_group`, `name`) VALUES
(1, 1, 'Despre Briceni'),
(2, 1, 'Istoria oraşului'),
(3, 1, 'Educaţie'),
(4, 1, 'Cultură'),
(6, 1, 'Întreprinderi de stat'),
(7, 1, 'Întreprinderi private'),
(8, 1, 'ONG−uri'),
(9, 2, 'Primarul'),
(19, 4, 'Anunţuri de achiziţii publice'),
(11, 2, 'Viceprimarul'),
(12, 2, 'Aparatul primariei'),
(13, 3, 'Componenţa Consiliului'),
(14, 3, 'Comisii de specialitate'),
(15, 3, 'Comisia bugetară'),
(16, 3, 'Comisia pentru gospodărie comunal−locativă'),
(17, 4, 'Legislaţia în domeniul transparenţei'),
(18, 4, 'Declaraţii anuale de venituri'),
(20, 5, 'Decizii adoptate'),
(21, 5, 'Strategia de dezvoltare social – economică a oraşului'),
(22, 5, 'Planul urbanistic general'),
(23, 5, 'Buget'),
(52, 12, 'Примар'),
(25, 6, 'Proiecte curente'),
(26, 6, 'Proiecte finalizate'),
(27, 21, 'About Briceni'),
(28, 21, 'History of city'),
(29, 21, 'Education'),
(30, 21, 'Culture'),
(31, 21, 'Enterprises '),
(32, 21, 'State enterprises'),
(33, 21, 'Private enterprises'),
(34, 21, 'NGO'),
(35, 22, 'Mayor'),
(36, 22, 'Vice Mayor'),
(37, 22, 'Collaborators of City Hall'),
(38, 23, 'Components of Council'),
(39, 11, 'О Бричень'),
(40, 23, 'Specialized commissions '),
(41, 11, 'История города'),
(42, 11, 'Образование'),
(43, 23, 'Commission on budget'),
(44, 23, 'Living communal  commission'),
(45, 11, 'Культура'),
(46, 11, 'Предприятия государственные'),
(47, 24, 'Legislation in transparency'),
(48, 11, 'Предприятия частные'),
(49, 11, 'НГO'),
(50, 24, 'Annual declarations on incomes '),
(51, 24, 'Announcements on public acquisitions '),
(53, 12, 'Вице примар'),
(54, 4, 'Decizii proiecte'),
(55, 12, 'Аппарат примарии'),
(56, 24, 'Projects of decisions'),
(57, 25, 'Approved decisions '),
(58, 25, 'Strategy on social – economic development of city'),
(59, 25, 'General architectural  plan'),
(60, 25, 'Budget'),
(61, 13, 'Состав Cовета'),
(62, 26, 'Current projects'),
(63, 13, 'Специализированные комиссии'),
(64, 26, 'Finished projects'),
(65, 13, 'Бюджетная комиссия'),
(66, 13, 'Жилищно-коммунальная комиссия '),
(67, 14, 'Законодательство в области транспарентности'),
(68, 14, 'Ежегодные декларации о доходах'),
(69, 14, 'Объявления о публичных закупках'),
(70, 15, 'Принятые решения'),
(71, 15, 'Стратегия социально – экономического развития города'),
(72, 15, 'Генеральный архитектурный план'),
(73, 15, 'Бюджет'),
(74, 14, 'Проекты решений'),
(75, 16, 'Текущие проекты'),
(76, 16, 'Завершенные проекты'),
(77, 19, 'Фото'),
(78, 9, 'Foto'),
(79, 9, 'Video'),
(80, 29, 'Photo'),
(81, 19, 'Видео'),
(82, 29, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `language`) VALUES
(1, 'Oraşul Briceni', 'ro'),
(2, 'Primaria Briceni', 'ro'),
(3, 'Consiliul orăşenesc', 'ro'),
(4, 'Transparenţa', 'ro'),
(5, 'Decizii', 'ro'),
(6, 'Proiecte', 'ro'),
(7, 'Noutăţile primariei', 'ro'),
(8, 'Link−uri utile', 'ro'),
(9, 'Galerie', 'ro'),
(10, 'Funcţii vacante', 'ro'),
(11, 'Город Бричень', 'ru'),
(12, 'Примария Бричень', 'ru'),
(13, 'Городской Cовет', 'ru'),
(14, 'Транспарентность', 'ru'),
(15, 'Решения', 'ru'),
(16, 'Проекты', 'ru'),
(17, 'Новости примарии', 'ru'),
(18, 'Полезные линки', 'ru'),
(19, 'Галерея ', 'ru'),
(20, 'Вакантные функции', 'ru'),
(21, 'City Briceni', 'en'),
(22, 'City Hall  of Briceni', 'en'),
(23, 'Council of City', 'en'),
(24, 'Transparency ', 'en'),
(25, 'Decisions', 'en'),
(26, 'Projects', 'en'),
(27, 'News of City Hall ', 'en'),
(28, 'Useful links', 'en'),
(29, 'Gallery', 'en'),
(30, 'Vacancies ', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `prefix`, `is_default`) VALUES
(2, 'Rusa', 'ru', 0),
(3, 'Engleza', 'en', 0),
(4, 'Romana', 'ro', 1),
(5, 'Franceza', 'fra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`fname`, `lname`, `email`, `message`, `id`) VALUES
('Nicolae ', 'Bulbuca', 'Bulcoca@22Nic.com', 'Am avut o problema legata de mkafadm oamf oao oan foane fod  .... adf a si nu am putut sa gasesc jndgji sndjign jin   .De aceeea am aodfm oiadf iom! \r\nCu multa stima kdjs gfsdi ufjdisu jfsdj  Bulboaca Nicolae', 1),
('Zinaida ', 'Julia ', 'Zinulia.Julia.mumusica.@outloo', 'Am fost bucuroasa sa vizitez orashu ksdjgn ijdsngfi ndinf idsf ij  si de aceea sunt multumita ca sdjgu jsigu osjg isjdui gjs ! Multumesc mult Domnul primar pentru invitatie.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `file_attach_url` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `teg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_translation_set` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `id_translation_set`, `id_post`, `language`) VALUES
(1, 1, 2, 'en'),
(2, 1, 3, 'ro'),
(3, 1, 4, 'ru'),
(4, 2, 5, 'en'),
(5, 2, 7, 'ro'),
(6, 2, 36, 'ru'),
(10, 4, 47, 'en'),
(11, 5, 48, 'ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
