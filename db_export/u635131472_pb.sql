
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2017 at 09:16 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`fname`, `lname`, `email`, `message`, `id`) VALUES
('Vasea', 'Vlaicu', 'vasea.vlaicu@sdkognmfs.ru', 'E un fapt bine stabilit că cititorul va fi sustras de conţinutul citibil al unei pagini atunci când se uită la aşezarea în pagină. Scopul utilizării a Lorem Ipsum, este acela că are o distribuţie a literelor mai mult sau mai puţin normale, faţă de utilizarea a ceva de genul "Conţinut aici, conţinut acolo", făcându-l să arate ca o engleză citibilă. ', 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_group`, `id_category`, `image_url`, `title`, `subtitle`, `content`, `video`, `file_attach_url`, `created`, `updated`, `teg`) VALUES
(1, 1, 1, '', 'Lorem i', '', '<p><strong><img alt="" src="images/slshow/sl/sl7.jpg" style="height:70px; width:70px" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Lorem Ipsum</strong>&nbsp;este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei &icirc;ncă din secolul al XVI-lea, c&acirc;nd un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul &icirc;n tipografia electronică practic neschimbată. A fost popularizată &icirc;n anii &#39;60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', 1495537850, 1496243535, 'lorem'),
(5, 2, 12, '', 'video', 'Reprezentat exemplu cu video', '<p>&nbsp;</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'https://www.youtube.com/embed/7ZQCq8ravSQ', '', 1496264179, 1496953442, 'Exemplu video'),
(2, 1, 1, '', 'Lorem i', '', '<h2 style="font-style:italic;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="images/slshow/sl/sl7.jpg" style="height:70px; width:70px" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp;</strong>Lorem Ipsum&nbsp;este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei &icirc;ncă din secolul al XVI-lea, c&acirc;nd un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul &icirc;n tipografia electronică practic neschimbată.</h2>\r\n\r\n<blockquote>\r\n<p>A fost popularizată &icirc;n anii &#39;60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>asdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>asdas</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>sadasd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', 1495537851, 1496953495, 'lorem'),
(6, 13, 65, '', 'Почему он используется?', '', '<p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск<s> по ключевым сл</s>овам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (наприме</p>\r\n\r\n<hr />\r\n<p>ческие варианты).</p>\r\n', '', '', 1496953634, 1496953634, ' пример'),
(4, 3, 15, '', 'Procura', '', '<p><em>PROCURA SPECIALA GENERALA</em></p>\r\n\r\n<p>PARTI - Procura speciala<br />\r\nSubsemnatul ______________________ , domiciliat in ___________________________ identificat cu ______ seria _______ nr.____________, eliberat de ___________________</p>\r\n\r\n<p>&icirc;mputernicesc prin prezenta</p>\r\n\r\n<p>pe ___________________ domiciliat in __________________ __________________, pentru ca in numele meu si pentru mine sa ma reprezinte cu depline puteri in fata ______________________in vederea _______________________________</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>MANDAT - Procura speciala</p>\r\n\r\n<p>In baza prezentului mandat, imputernicitul meu se va prezenta la __________________, __________________, in vederea indeplinirii tuturor formalitatilor de __________________, va putea face cereri si va putea da declaratii, semnand in numele meu si pentru mine oriunde va fi necesar, in limitele prezentului mandat, semnatura sa fiindu-mi opozabila.</p>\r\n\r\n<p>Redactat si procesat de _______________________azi_____________in _______exemplare<br />\r\nla __________________________</p>\r\n\r\n<p>MANDANT&nbsp;&nbsp; :________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; MANDATAR :____________________<br />\r\nLegitimat cu:________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Legitimat cu:____________________<br />\r\nSemnatura&nbsp;&nbsp; :________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Semnatura&nbsp;&nbsp; :____________________</p>\r\n', '', '', 1496243174, 1496243174, 'procura'),
(7, 12, 55, '', 'Контакные данные примарии', 'Прямой телефон', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ГРАФИК</strong></p>\r\n\r\n<p><strong>&laquo;прямого телефона&raquo;</strong>&nbsp;руководства примэрии&nbsp;с населением на&nbsp;<strong>ИЮНЬ</strong><strong>&nbsp;2017</strong>&nbsp;года.</p>\r\n\r\n<p><strong>Начало в 15.00</strong></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>06.06.2017</td>\r\n			<td>Шеремет И. И.</td>\r\n			<td>зам. примара мун. Бэлць</td>\r\n			<td>(0 231)2-52-51</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13.06.2017</td>\r\n			<td>Сердюк И.М..</td>\r\n			<td>Секретарь Совета и мун.Бэлць</td>\r\n			<td>(0 231)2-20-48</td>\r\n		</tr>\r\n		<tr>\r\n			<td>20.06.2017</td>\r\n			<td>Сава Л.Н.</td>\r\n			<td>зам. примара мун. Бэлць</td>\r\n			<td>(0 231)2-95-65</td>\r\n		</tr>\r\n		<tr>\r\n			<td>27.06.2017</td>\r\n			<td>Бабий Л.И.</td>\r\n			<td>зам. примара мун. Бэлць</td>\r\n			<td>(0 231)2-23-97</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Актуализировано: 31.05.2017</p>\r\n', '', '', 1496953737, 1496953737, 'телефон'),
(8, 23, 44, '', 'Why do we use it?', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '', '', 1496953886, 1496953886, 'english');

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
