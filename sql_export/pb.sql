-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 08 2017 г., 21:37
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('username', 'password');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `id_group`, `name`) VALUES
(4, 1, 'Audierea cetatenilor'),
(5, 1, 'Autorizatii si certificate'),
(6, 1, 'Beneficii sociale si ajutoare'),
(7, 1, 'Business si antreprenoriat'),
(8, 1, 'Educatie, cultura,  turism si sport'),
(9, 1, 'Implicarea cetatenilor'),
(10, 1, 'Impozite și taxe locale'),
(11, 1, 'Modele de acte / formulare'),
(13, 5, 'test category'),
(14, 1, 'ADaugarea categorier'),
(16, 2, 'PRIMARUL'),
(17, 2, 'VICEPRIMARUL'),
(18, 11, 'Aparatul primÄƒriei'),
(19, 3, 'Comisiile de specialitate'),
(20, 3, 'Consiliul local'),
(21, 3, 'Strategii, planuri È™i politici'),
(22, 4, 'Ce este transparenÈ›a?'),
(23, 4, 'Dialogul cu cetÄƒÈ›enii'),
(24, 4, 'InformaÈ›ii de interes public'),
(25, 4, 'FinanÈ›ele publice locale'),
(26, 4, 'ANUNTURI'),
(27, 6, 'Ð§Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ Lorem Ipsum?'),
(28, 1, 'ÐŸÐ¾Ñ‡ÐµÐ¼Ñƒ Ð¾Ð½ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÑ‚ÑÑ?'),
(29, 6, 'Ð“Ð´Ðµ ÐµÐ³Ð¾ Ð²Ð·ÑÑ‚ÑŒ?'),
(30, 6, 'ÐžÑ‚ÐºÑƒÐ´Ð° Ð¾Ð½ Ð¿Ð¾ÑÐ²Ð¸Ð»ÑÑ?'),
(31, 7, 'Ð§Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ Lorem Ipsum?'),
(32, 7, 'ÐŸÐ¾Ñ‡ÐµÐ¼Ñƒ Ð¾Ð½ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÑ‚ÑÑ?'),
(33, 7, 'Ð“Ð´Ðµ ÐµÐ³Ð¾ Ð²Ð·ÑÑ‚ÑŒ?'),
(34, 7, 'Ð“Ð´Ðµ ÐµÐ³Ð¾ Ð²Ð·ÑÑ‚ÑŒ?'),
(35, 7, 'ÐžÑ‚ÐºÑƒÐ´Ð° Ð¾Ð½ Ð¿Ð¾ÑÐ²Ð¸Ð»ÑÑ?'),
(36, 8, 'Ð§Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ Lorem Ipsum?'),
(37, 8, 'Ð“Ð´Ðµ ÐµÐ³Ð¾ Ð²Ð·ÑÑ‚ÑŒ?'),
(38, 9, 'ÐžÑ‚ÐºÑƒÐ´Ð° Ð¾Ð½ Ð¿Ð¾ÑÐ²Ð¸Ð»ÑÑ?'),
(39, 9, 'Ð§Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ Lorem Ipsum?'),
(40, 2, 'contacte'),
(41, 10, 'Despre Briceni'),
(42, 10, 'Istoria OraÈ™ului'),
(43, 10, 'EducaÈ›ie'),
(44, 10, 'CulturÄƒ'),
(45, 10, 'ÃŽinterprinderi'),
(46, 11, 'Primarul'),
(47, 11, 'Viceprimarul'),
(49, 12, 'ComponenÅ£a Consiliului'),
(50, 12, 'Comisii de specialitate'),
(52, 13, 'LegislaÈ›ia Ã®n domeniul transparenÈ›ei'),
(53, 13, 'DeclaraÈ›ii anuale de venituri È™i intÄƒrirea'),
(54, 13, 'AnunÈ›uri de achiziÈ›ii publice'),
(56, 11, 'Contacte'),
(57, 19, 'Ðž Ð‘Ñ€Ð¸Ñ‡ÐµÐ½ÑŒ'),
(58, 19, 'Ð˜ÑÑ‚Ð¾Ñ€Ð¸Ñ Ð³Ð¾Ñ€Ð¾Ð´Ð°'),
(59, 19, 'ÐžÐ±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ðµ'),
(60, 19, 'ÐšÑƒÐ»ÑŒÑ‚ÑƒÑ€Ð°'),
(61, 19, 'ÐŸÑ€ÐµÐ´Ð¿Ñ€Ð¸ÑÑ‚Ð¸Ñ'),
(62, 20, 'ÐŸÑ€Ð¸Ð¼Ð°Ñ€'),
(63, 20, 'Ð’Ð¸Ñ†Ðµ Ð¿Ñ€Ð¸Ð¼Ð°Ñ€'),
(64, 20, 'ÐÐ¿Ð¿Ð°Ñ€Ð°Ñ‚ Ð¿Ñ€Ð¸Ð¼Ð°Ñ€Ð¸Ð¸'),
(65, 21, 'Ð¡Ð¾ÑÑ‚Ð°Ð² CÐ¾Ð²ÐµÑ‚Ð°'),
(66, 21, 'Ð¡Ð¿ÐµÑ†Ð¸Ð°Ð»Ð¸Ð·Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ðµ ÐºÐ¾Ð¼Ð¸ÑÑÐ¸Ð¸'),
(67, 22, 'Ð—Ð°ÐºÐ¾Ð½Ð¾Ð´Ð°Ñ‚ÐµÐ»ÑŒÑÑ‚Ð²Ð¾ Ð² Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸ Ñ‚Ñ€Ð°Ð½ÑÐ¿Ð°Ñ€ÐµÐ½Ñ‚Ð½Ð¾ÑÑ‚Ð¸'),
(68, 22, 'Ð•Ð¶ÐµÐ³Ð¾Ð´Ð½Ñ‹Ðµ Ð´ÐµÐºÐ»Ð°Ñ€Ð°Ñ†Ð¸Ð¸ Ð¾ Ð´Ð¾Ñ…Ð¾Ð´Ð°Ñ…'),
(69, 22, 'ÐžÐ±ÑŠÑÐ²Ð»ÐµÐ½Ð¸Ñ Ð¾ Ð¿ÑƒÐ±Ð»Ð¸Ñ‡Ð½Ñ‹Ñ… Ð·Ð°ÐºÑƒÐ¿ÐºÐ°Ñ…'),
(71, 28, 'About Briceni'),
(72, 28, 'History of city'),
(73, 28, 'Education'),
(74, 28, 'Culture'),
(75, 28, 'Enterprises '),
(76, 10, 'ÃŽntreprinderi de stat'),
(77, 10, 'ÃŽntreprinderi private'),
(78, 10, 'ONGâˆ’uri'),
(79, 19, 'ÐŸÑ€ÐµÐ´Ð¿Ñ€Ð¸ÑÑ‚Ð¸Ñ Ð³Ð¾ÑÑƒÐ´Ð°Ñ€ÑÑ‚Ð²ÐµÐ½Ð½Ñ‹Ðµ'),
(80, 19, 'ÐŸÑ€ÐµÐ´Ð¿Ñ€Ð¸ÑÑ‚Ð¸Ñ Ñ‡Ð°ÑÑ‚Ð½Ñ‹Ðµ'),
(81, 19, 'ÐÐ“O'),
(82, 28, 'State enterprises'),
(83, 28, 'Private enterprises'),
(84, 28, 'NGO'),
(85, 29, 'Mayor'),
(86, 29, 'Vice Mayor'),
(87, 29, 'Collaborators of City Hall'),
(88, 12, 'Comisia bugetarÄƒ'),
(89, 12, 'Comisia pentru gospodÄƒrie comunalâˆ’locativÄƒ'),
(90, 21, 'Ð‘ÑŽÐ´Ð¶ÐµÑ‚Ð½Ð°Ñ ÐºÐ¾Ð¼Ð¸ÑÑÐ¸Ñ'),
(91, 21, 'Ð–Ð¸Ð»Ð¸Ñ‰Ð½Ð¾-ÐºÐ¾Ð¼Ð¼ÑƒÐ½Ð°Ð»ÑŒÐ½Ð°Ñ ÐºÐ¾Ð¼Ð¸ÑÑÐ¸Ñ '),
(92, 30, 'Components of Council'),
(93, 30, 'Specialized commissions '),
(94, 30, 'Commission on budget'),
(95, 30, 'Living communal  commission'),
(97, 31, 'Legislation in transparency'),
(98, 31, 'Annual declarations on incomes '),
(99, 31, 'Announcements on public acquisitions '),
(100, 18, 'Decizii adoptate'),
(101, 18, 'Strategia de dezvoltare social â€“ economicÄƒ a oraÅŸului'),
(102, 18, 'Planul urbanistic general'),
(103, 18, 'Buget'),
(104, 18, 'Decizii proiecte'),
(105, 18, 'Proiecte'),
(106, 18, 'Proiecte curente'),
(107, 18, 'Proiecte finalizate'),
(108, 27, 'ÐŸÑ€Ð¸Ð½ÑÑ‚Ñ‹Ðµ Ñ€ÐµÑˆÐµÐ½Ð¸Ñ'),
(109, 27, 'Ð¡Ñ‚Ñ€Ð°Ñ‚ÐµÐ³Ð¸Ñ ÑÐ¾Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ â€“ ÑÐºÐ¾Ð½Ð¾Ð¼Ð¸Ñ‡ÐµÑÐºÐ¾Ð³Ð¾ Ñ€Ð°Ð·Ð²Ð¸Ñ‚Ð¸Ñ Ð³Ð¾Ñ€Ð¾Ð´Ð°'),
(110, 27, 'Ð“ÐµÐ½ÐµÑ€Ð°Ð»ÑŒÐ½Ñ‹Ð¹ Ð°Ñ€Ñ…Ð¸Ñ‚ÐµÐºÑ‚ÑƒÑ€Ð½Ñ‹Ð¹ Ð¿Ð»Ð°Ð½'),
(111, 27, 'Ð‘ÑŽÐ´Ð¶ÐµÑ‚'),
(112, 27, 'ÐŸÑ€Ð¾ÐµÐºÑ‚Ñ‹ Ñ€ÐµÑˆÐµÐ½Ð¸Ð¹'),
(113, 27, 'ÐŸÑ€Ð¾ÐµÐºÑ‚Ñ‹'),
(114, 27, 'Ð¢ÐµÐºÑƒÑ‰Ð¸Ðµ Ð¿Ñ€Ð¾ÐµÐºÑ‚Ñ‹'),
(115, 27, 'Ð—Ð°Ð²ÐµÑ€ÑˆÐµÐ½Ð½Ñ‹Ðµ Ð¿Ñ€Ð¾ÐµÐºÑ‚Ñ‹'),
(116, 37, 'Approved decisions '),
(117, 37, 'Strategy on social â€“ economic development of city'),
(118, 37, 'General architectural  plan'),
(119, 37, 'Budget'),
(120, 37, 'Projects of decisions'),
(121, 37, 'Projects'),
(122, 37, 'Current projects'),
(123, 37, 'Finished projects');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `language`) VALUES
(10, 'OraÈ™ul Briceni', 'ro'),
(11, 'Primaria Briceni', 'ro'),
(12, 'Consiliul oraÈ™enesc', 'ro'),
(13, 'TransparenÈ›a', 'ro'),
(14, 'NoutaÈ›i PrimÄƒriei', 'ro'),
(15, 'Galerie foto', 'ro'),
(16, 'Link - uri utile', 'ro'),
(17, 'FuncÈ›ii vacante ', 'ro'),
(18, 'Decizii', 'ro'),
(19, 'Ð“Ð¾Ñ€Ð¾Ð´ Ð‘Ñ€Ð¸Ñ‡ÐµÐ½ÑŒ', 'ru'),
(20, 'ÐŸÑ€Ð¸Ð¼Ð°Ñ€Ð¸Ñ Ð‘Ñ€Ð¸Ñ‡ÐµÐ½ÑŒ', 'ru'),
(21, 'Ð“Ð¾Ñ€Ð¾Ð´ÑÐºÐ¾Ð¹ CÐ¾Ð²ÐµÑ‚', 'ru'),
(22, 'Ð¢Ñ€Ð°Ð½ÑÐ¿Ð°Ñ€ÐµÐ½Ñ‚Ð½Ð¾ÑÑ‚ÑŒ', 'ru'),
(23, 'ÐÐ¾Ð²Ð¾ÑÑ‚Ð¸ Ð¿Ñ€Ð¸Ð¼Ð°Ñ€Ð¸Ð¸', 'ru'),
(24, 'Ð¤Ð¾Ñ‚Ð¾ Ð³Ð°Ð»ÐµÑ€ÐµÑ ', 'ru'),
(25, 'ÐŸÐ¾Ð»ÐµÐ·Ð½Ñ‹Ðµ Ð»Ð¸Ð½ÐºÐ¸', 'ru'),
(26, 'Ð’Ð°ÐºÐ°Ð½Ñ‚Ð½Ñ‹Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸', 'ru'),
(27, 'Ð ÐµÑˆÐµÐ½Ð¸Ñ', 'ru'),
(28, 'City Briceni', 'en'),
(29, 'City Hall  of Briceni', 'en'),
(30, 'Council of City', 'en'),
(31, 'Transparency ', 'en'),
(32, 'News of City Hall ', 'en'),
(33, 'Photo gallery', 'en'),
(34, 'Useful links', 'en'),
(35, 'Vacancies ', 'en'),
(37, 'Decisions', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `prefix`, `is_default`) VALUES
(2, 'Rusa', 'ru', 0),
(3, 'Engleza', 'en', 0),
(4, 'Romana', 'ro', 1),
(5, 'Franceza', 'fra', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`fname`, `lname`, `email`, `message`, `id`) VALUES
('Nicolae ', 'Bulbuca', 'Bulcoca@22Nic.com', 'Am avut o problema legata de mkafadm oamf oao oan foane fod  .... adf a si nu am putut sa gasesc jndgji sndjign jin   .De aceeea am aodfm oiadf iom! \r\nCu multa stima kdjs gfsdi ufjdisu jfsdj  Bulboaca Nicolae', 1),
('Zinaida ', 'Julia ', 'Zinulia.Julia.mumusica.@outloo', 'Am fost bucuroasa sa vizitez orashu ksdjgn ijdsngfi ndinf idsf ij  si de aceea sunt multumita ca sdjgu jsigu osjg isjdui gjs ! Multumesc mult Domnul primar pentru invitatie.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
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
  `teg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_group`, `id_category`, `image_url`, `title`, `subtitle`, `content`, `video`, `file_attach_url`, `created`, `updated`, `teg`) VALUES
(65, 7, 32, 'http://localhost/pb/post_images/oferta-revelion-2014-salon-evenimente.jpg', 'hrum hrum', 'hrum', 'neam', 'https://www.youtube.com/embed/uNN6Pj06Cj8', '', 1485898338, 1485898338, 'mih'),
(66, 13, 52, 'http://localhost/pb/post_images/bdudcryslkm-neslihan-gunaydin.jpg', 'De unde pot sa-l iau ÅŸi eu?', 'ExistÄƒ o mulÅ£ime de variaÅ£ii disponibile ale pasajelor Lorem Ipsum, dar majoritatea lor au suferit alterÄƒri Ã®ntr-o oarecare mÄƒsurÄƒ prin infiltrare de elemente de umor, sau de cuvinte luate aleator, care nu sunt cÃ¢tuÅŸi de puÅ£in credibile.', 'ExistÄƒ o mulÅ£ime de variaÅ£ii disponibile ale pasajelor Lorem Ipsum, dar majoritatea lor au suferit alterÄƒri Ã®ntr-o oarecare mÄƒsurÄƒ prin infiltrare de elemente de umor, sau de cuvinte luate aleator, care nu sunt cÃ¢tuÅŸi de puÅ£in credibile. Daca vreÅ£i sÄƒ folosiÅ£i un pasaj de Lorem Ipsum, trebuie sÄƒ vÄƒ asiguraÅ£i cÄƒ nu conÅ£ine nimic stÃ¢njenitor ascuns printre randuri. Toate generatoarele de Lorem Ipsum de pe Internet tind sÄƒ repete bucÄƒÅ£i de text Ã®n funcÅ£ie de necesitate, astfel fÄƒcÃ¢ndu-l pe acesta primul generator adevarat de pe Internet. El utilizeazÄƒ un dicÅ£ionar de peste 200 cuvinte din latina, combinate cu o cantitate considerabilÄƒ de modele de structuri de propoziÅ£ii, pentru a genera Lorem Ipsum care aratÄƒ decent. Astfel, Lorem Ipsum-ul generat nu conÅ£ine repetiÅ£ii, infiltrÄƒri de elemente de umor sau de cuvinte non-caracteristice, etc.', 'https://www.youtube.com/embed/uNN6Pj06Cj8', '', 1485898442, 1485898912, 'unde pot'),
(67, 11, 46, 'http://localhost/pb/post_images/photo-1473704918560-2fca04cd725e.jpg', 'De ce Ã®l folosim?', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ.', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea a ceva de genul "ConÅ£inut aici, conÅ£inut acolo", fÄƒcÃ¢ndu-l sÄƒ arate ca o englezÄƒ citibilÄƒ. Multe pachete de publicare pentru calculator ÅŸi editoare de pagini web folosesc acum Lorem Ipsum ca model standard de text, iar o cautare de "lorem ipsum" va rezulta Ã®n o mulÅ£ime de site-uri web Ã®n dezvoltare. Pe parcursul anilor, diferite versiuni au evoluat, uneori din intÃ¢mplare, uneori intenÅ£ionat (infiltrÃ¢ndu-se elemente de umor sau altceva de acest gen).', 'https://www.youtube.com/embed/uNN6Pj06Cj8', '', 1485898699, 1485898699, 'hrum hrum'),
(68, 10, 41, 'http://localhost/pb/post_images/photo-1473775179836-516cedf1ce2d.jpg', 'De unde provine?', 'ÃŽn ciuda opiniei publice, Lorem Ipsum nu e un simplu text fÄƒrÄƒ sens. El Ã®ÅŸi are rÄƒdÄƒcinile Ã®ntr-o bucatÄƒ a literaturii clasice latine din anul 45 Ã®.e.n., fÄƒcÃ¢nd-o sÄƒ aibÄƒ mai bine de 2000 ani.', 'ÃŽn ciuda opiniei publice, Lorem Ipsum nu e un simplu text fÄƒrÄƒ sens. El Ã®ÅŸi are rÄƒdÄƒcinile Ã®ntr-o bucatÄƒ a literaturii clasice latine din anul 45 Ã®.e.n., fÄƒcÃ¢nd-o sÄƒ aibÄƒ mai bine de 2000 ani. Profesorul universitar de latinÄƒ de la colegiul Hampden-Sydney din Virginia, Richard McClintock, a cÄƒutat Ã®n bibliografie unul din cele mai rar folosite cuvinte latine "consectetur", Ã®ntÃ¢lnit Ã®n pasajul Lorem Ipsum, ÅŸi cÄƒutÃ¢nd citate ale cuvÃ¢ntului respectiv Ã®n literatura clasicÄƒ, a descoperit la modul cel mai sigur sursa provenienÅ£ei textului. Lorem Ipsum provine din secÅ£iunile 1.10.32 ÅŸi 1.10.33 din "de Finibus Bonorum et Malorum" (Extremele Binelui ÅŸi ale RÄƒului) de Cicerone, scrisÄƒ Ã®n anul 45 Ã®.e.n. AceastÄƒ carte este un tratat Ã®n teoria eticii care a fost foarte popular Ã®n perioada Renasterii. Primul rÃ¢nd din Lorem Ipsum, "Lorem ipsum dolor sit amet...", a fost luat dintr-un rÃ¢nd din secÅ£iunea 1.10.32.', 'https://www.youtube.com/embed/uNN6Pj06Cj8', '', 1485898969, 1485898969, 'provine'),
(69, 11, 46, 'http://localhost/pb/post_images/bdudcryslkm-neslihan-gunaydin.jpg', 'Lorem Ipsum este pur ÅŸi simplu ', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum,', 'Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu Lorem Ipsum este pur ÅŸi simplu ', 'https://www.youtube.com/embed/uNN6Pj06Cj8', '', 1485899188, 1485899332, 'ce este lorem'),
(70, 11, 56, '', 'Email', '', '                                                    Acesta este email a primÃ¢riei Briceni.\r\nMail : infobriceni@gmail.com', '', '', 1485907671, 1485907671, 'mail email posta poÈ™ta electronica'),
(71, 11, 56, '', 'Cartea de telefoane', '', 'PrimÄƒria : 093840293840923;<br>\r\nContabil : 34-923-4923-09423;<br>\r\nPaza : 3423423423;<br>\r\nAmbulanÈ›a : 32423423;<br>', '', '', 1485908162, 1485909435, 'contabil primaria ambulanta paza'),
(74, 11, 56, '', 'Adresa', '', '<div class="col m3">\r\n	<section>\r\n		<h2>Datele de Contact ale primÄƒriei</h2>\r\n		<ul class="default">\r\n			<li>\r\n				<h3>Email: </h3><br>\r\n				<p>infobriceni@gmail.com</p>\r\n			</li>\r\n			<li>\r\n				<h3>Fanticamera PrimÄƒriei </h3><br>\r\n				<p>(+373) 247 2 24 40</p>\r\n			</li>\r\n			<li>\r\n				<h3>Fax: </h3><br>\r\n				<p>(+373) 247 2 21 95</p>\r\n				</li>\r\n		</ul>\r\n	</section>\r\n</div>', '', '', 1485910190, 1485910216, 'adresa');

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `id_translation_set` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `translations`
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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
