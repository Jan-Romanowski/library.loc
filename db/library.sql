-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 23 2021 г., 08:52
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf32_polish_ci DEFAULT NULL,
  `ac_password` varchar(51) COLLATE utf32_polish_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf32_polish_ci DEFAULT NULL,
  `surname` varchar(20) COLLATE utf32_polish_ci DEFAULT NULL,
  `ac_type` varchar(20) COLLATE utf32_polish_ci DEFAULT NULL,
  `regist_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id_account`, `email`, `ac_password`, `name`, `surname`, `ac_type`, `regist_date`) VALUES
(8, 'leonovstarget@gmail.com', 'Jason2907', 'Yan', 'Ramanouski', 'admin', '2021-10-05 00:20:03'),
(10, 'Volha@g.com', 'Kek12345', 'Volha', 'Zinkevich', 'user', '2021-10-18 15:58:48'),
(11, 'pashka@gmail.com', 'kek12345', 'Pashka', 'Khamula', 'moder', '2021-10-20 19:19:01');

-- --------------------------------------------------------

--
-- Структура таблицы `folder`
--

CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL,
  `name_folder` varchar(10) COLLATE utf32_polish_ci DEFAULT NULL,
  `note` varchar(70) COLLATE utf32_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Дамп данных таблицы `folder`
--

INSERT INTO `folder` (`id_folder`, `name_folder`, `note`) VALUES
(1, 'K4', NULL),
(2, 'K5', NULL),
(3, 'WP9', NULL),
(4, 'K6', NULL),
(5, 'WP8', NULL),
(6, 'WP10', NULL),
(7, 'Eu6', NULL),
(8, 'bez nazwy', NULL),
(9, 'Wi4', NULL),
(10, 'K10', NULL),
(11, 'O8', NULL),
(12, 'Al3', NULL),
(13, 'U3', NULL),
(14, 'Wi7', NULL),
(15, 'Al2', NULL),
(16, 'M6', NULL),
(17, 'O9', NULL),
(18, 'Ps1', NULL),
(19, 'Ps2', NULL),
(20, 'U1', NULL),
(21, 'U2', NULL),
(22, 'U4', NULL),
(23, 'U5', NULL),
(24, 'U6', NULL),
(25, 'Wi1', NULL),
(26, 'Wi2', NULL),
(27, 'Wi3', NULL),
(28, 'Wi5', NULL),
(29, 'Wi6', NULL),
(30, 'Wi8', NULL),
(31, 'Wi9', NULL),
(32, 'WP1', NULL),
(33, 'WP2', NULL),
(34, 'WP3', NULL),
(35, 'WP4', NULL),
(36, 'WP6', NULL),
(37, 'WP5', NULL),
(38, 'WP7', NULL),
(39, 'U7', NULL),
(40, 'U8', NULL),
(41, 'U9', NULL),
(42, 'U10', NULL),
(43, 'Al1', NULL),
(44, 'Ad1', NULL),
(45, 'Ch1', NULL),
(46, 'Eu1', NULL),
(47, 'Eu2', NULL),
(48, 'Eu3', NULL),
(49, 'Eu4', NULL),
(50, 'Eu5', NULL),
(51, 'Gr1', NULL),
(52, 'Gr2', NULL),
(53, 'H1', NULL),
(54, 'K1', NULL),
(55, 'K2', NULL),
(56, 'K3', NULL),
(57, 'K7', NULL),
(58, 'K8', NULL),
(59, 'K9', NULL),
(60, 'M1', NULL),
(61, 'M2', NULL),
(62, 'M3', NULL),
(63, 'M4', NULL),
(64, 'M5', NULL),
(65, 'O1', NULL),
(66, 'O2', NULL),
(67, 'O3', NULL),
(68, 'O4', NULL),
(69, 'O5', NULL),
(70, 'O6', NULL),
(71, 'O7', NULL),
(72, 'O10', ''),
(73, 'Kc4', ''),
(74, 'Kc2', ''),
(75, 'Kc3', ''),
(76, 'Kc5', ''),
(77, 'Kc6', ''),
(78, 'Kc7', ''),
(79, 'Kc8', ''),
(80, 'Kc9', ''),
(81, 'Kc10', '');

-- --------------------------------------------------------

--
-- Структура таблицы `queries`
--

CREATE TABLE `queries` (
  `id_query` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf32_polish_ci DEFAULT NULL,
  `ac_password` varchar(51) COLLATE utf32_polish_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf32_polish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf32_polish_ci NOT NULL,
  `regist_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `song`
--

CREATE TABLE `song` (
  `id_song` int(11) NOT NULL,
  `name_song` varchar(100) COLLATE utf32_polish_ci NOT NULL,
  `count_p` int(11) DEFAULT NULL,
  `author` varchar(70) COLLATE utf32_polish_ci DEFAULT NULL,
  `id_folder` int(11) NOT NULL,
  `one_voice` int(11) NOT NULL,
  `note` varchar(100) COLLATE utf32_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Дамп данных таблицы `song`
--

INSERT INTO `song` (`id_song`, `name_song`, `count_p`, `author`, `id_folder`, `one_voice`, `note`) VALUES
(1, 'BÃ³g siÄ™ rodzi', 87, 'Szulik M.R. ', 1, 0, ''),
(2, 'Jasna Panna', 98, 'Maklakiewicz J.', 1, 0, NULL),
(3, 'Pan z nieba', 86, 'Stuligrosz S.', 2, 0, NULL),
(4, 'Popule Meus', 48, 'de Victoria T.L.', 3, 0, ''),
(6, 'Vexilla Regis', 57, 'Bruckner A.', 5, 0, ''),
(7, 'Pasja wg Å›w. Jana', 38, 'Szulik M.R.', 6, 0, ''),
(8, 'Pasja wg Å›w. Jana', 3, 'Szulik M.R.', 6, 0, ''),
(9, 'SÅ‚aw jÄ™zyku TajemnicÄ™', 39, 'Szulik M.R.', 33, 0, ''),
(10, 'Hoc Corpus', 50, 'Szulik M.R.', 6, 0, ''),
(13, 'Gdy Pan wstaÅ‚ od wieczerzy', 58, 'Szulik M.R.', 33, 0, ''),
(14, 'Regina coeli', 75, 'Szulik M.R.', 9, 0, ''),
(15, 'Hosanna Filio David', 70, 'Szulik M.R.', 6, 0, ''),
(16, 'Chrystus Pan zmartwychstaÅ‚', 52, 'Nikodemowicz A.', 29, 0, ''),
(17, 'Alleluia, o filii et filie', 50, 'Stanford C.V./Szulik M.R.', 29, 0, ''),
(18, 'Alleluia z oratorium Mesjasz', 34, 'Haendel G.F.', 28, 0, ''),
(19, 'Alleluia z oratorium Mesjasz', 33, 'Haendel G.F.', 28, 0, ''),
(20, 'Pasja wg Å›w. Åukasza', 25, 'Szulik M.R.', 3, 0, ''),
(21, 'Pasja wg Å›w. Åukasza', 23, 'Szulik M.R.', 3, 0, ''),
(22, 'PozwÃ³l mi Twe mÄ™ki Å›piewaÄ‡', 67, 'Nikodemowicz A.', 33, 0, ''),
(23, 'BoÅ¼e w dobroci', 50, 'Szulik M.R.', 72, 0, ''),
(25, 'Tryumfy KrÃ³la Niebieskiego', 84, 'Stuligrosz S.', 10, 0, ''),
(26, 'ChwaÅ‚Ä… naszÄ… jest KrzyÅ¼', 48, 'Szulik M.R.', 3, 0, ''),
(27, 'Chrisus factus est', 52, 'Anerio F.', 6, 0, ''),
(28, 'Przyjmij, o NajÅ›wiÄ™tszy Panie', 32, 'Szulik M.R.', 66, 0, ''),
(29, 'Jesu miÅ‚oÅ›ci Twej', 36, 'Szulik M.R.', 66, 0, ''),
(30, 'Bogu z Jego darÃ³w', 26, 'Szulik M.R.', 72, 0, ''),
(31, 'ByÄ‡ bliÅ¼ej Ciebie chcÄ™', 32, 'Szulik M.R.', 72, 0, ''),
(32, 'NowÄ… pieÅ›Å„ zaÅ›piewajcie', 59, 'Wesley S./Szulik M.R.', 20, 0, ''),
(33, 'Ciebie na wieki', 40, 'GÃ³recki H.M. ', 61, 0, ''),
(34, 'Zawitaj UkrzyÅ¼owany', 37, 'Nikodemowicz A.', 33, 0, ''),
(35, 'ChwaÅ‚a Tobie (DajÄ™ wam...)', 44, 'Szulik M.R.', 33, 0, ''),
(36, 'ChwaÅ‚a Tobie (Dla nas...)', 42, 'Szulik M.R.', 33, 0, ''),
(37, 'Chrysus, Chrystus to nadzieja', 50, 'Szulik M.R.', 45, 0, ''),
(40, 'Åšpiewaj, Å›piewaj sercem caÅ‚ym', 78, 'Stecka M.', 13, 0, ''),
(41, 'Dobranoc GÅ‚owo Å›wiÄ™ta', 45, 'Nikodemowicz A.', 33, 0, ''),
(42, 'Kto jest sÅ‚ugÄ… Matki Å›wiÄ™tej', 50, 'Wiechowicz S. ', 3, 0, ''),
(43, 'PÅ‚aczcie anieli', 48, 'Nikodemowicz A.', 33, 0, ''),
(44, 'OdszedÅ‚ Pasterz od nas', 81, 'ZoÅ‚a A.', 3, 0, ''),
(45, 'Ty, ktÃ³ryÅ› gorzko', 65, 'Wiechowicz S.', 33, 0, ''),
(46, 'Surrexit a mortuis', 64, 'Widor Ch.M.', 14, 0, ''),
(47, 'Tobie czeÅ›Ä‡, Tobie chwaÅ‚a', 45, 'Szulik M.R.', 6, 0, ''),
(49, 'Chrystus wodzem', 79, 'Szulik M.R.', 45, 0, ''),
(50, 'Canticorum iubilo', 37, 'Haendel G.F.', 24, 0, ''),
(51, 'Alleluja (Nie wyÅ›cie..)', 30, 'Mawby C./Szulik M.R.', 43, 0, ''),
(52, 'Misericordias domini', 70, 'Botor J.', 20, 0, ''),
(53, 'O przyjdzcie, radoÅ›nie Å›piewamy', 37, 'Mawby C./Szulik M.R.', 66, 0, ''),
(54, 'Teraz uwalniasz', 39, 'Stanford Ch.V/Szulik M.R.', 66, 0, ''),
(55, 'Tak BÃ³g umiÅ‚owaÅ‚ Å›wiat', 41, 'Stainer J./Szulik M.R.', 66, 0, ''),
(56, 'Psalm 84', 20, 'Szulik M.R.', 74, 0, ''),
(57, 'Psalm 84', 16, 'Szulik M.R.', 74, 0, ''),
(58, 'Ave Maria II', 36, 'Liszt F.', 64, 0, ''),
(59, 'O sacrum convivium', 77, 'Perosi L.', 50, 0, ''),
(60, 'Ku Tobie Panie wznosim Å›piew', 23, 'Williams R.V./Szulik M.R.', 71, 0, ''),
(61, 'Z gÅ‚Ä™bokoÅ›ci grzechÃ³w', 37, 'Bazylik C.', 33, 0, ''),
(62, 'Niech CiÄ™ Pan bÅ‚ogosÅ‚awi', 23, 'Rutter J./SzczepaÅ„ski A.', 66, 0, ''),
(63, 'KÅ‚aniam siÄ™ Tobie', 61, 'Szulik M.R.', 50, 0, ''),
(65, 'Alleluja mszalne I', 65, 'Kwiatkowski S.', 43, 0, ''),
(67, 'Ave verum corpus', 29, 'Szulik M.R.', 50, 0, ''),
(68, 'Veni Sancte Spiritus', 40, 'Revert J./Szulik M.R.', 29, 0, ''),
(69, 'Veni Sancte Spiritus', 30, 'Hurford P./Szulik M.R.', 29, 0, ''),
(70, 'Exsultate iusti', 34, 'de Viadana L.', 66, 0, ''),
(71, 'Ave Maria', 27, 'Hoffman A.', 61, 0, ''),
(72, 'O Chryste', 33, 'Mawby C./Szulik M.R ', 66, 0, ''),
(74, 'Quae est ista', 12, 'Franck C.', 75, 0, ''),
(75, 'Quae est ista', 16, 'Franck C.', 75, 0, ''),
(76, 'Quae est ista', 11, 'Franck C.', 75, 0, ''),
(77, 'Victime Paschali laudes', 95, 'Revert J. ', 29, 0, ''),
(78, 'Dextera Domini', 19, 'Franck C.', 73, 0, ''),
(79, 'Haec dies', 45, 'Szulik M.R.', 29, 0, ''),
(80, 'Dextera Domini', 20, 'Franck C.', 73, 0, ''),
(81, 'Jubilate Deo', 43, 'Mawby C.', 24, 0, ''),
(82, 'Iesum Christum praedicare', 7, 'Szulik M.R.', 45, 0, ''),
(83, 'O sacrum convivium', 26, 'Mawby C./Szulik M.R.', 50, 0, ''),
(84, 'Laudate Dominum', 44, 'Zelioli G.', 20, 0, ''),
(85, 'Ubi caritas', 27, 'Palmer N./SzulikM.R.', 66, 0, ''),
(86, 'Pater meus', 31, 'Tucapsky A.', 3, 0, ''),
(87, 'In monte Oliveti', 16, 'Martini G.B.', 6, 0, ''),
(88, 'Com przyrzekÅ‚ Bogu', 53, 'Pearson M./Szulik M.R. ', 72, 0, ''),
(89, 'WierzÄ™ w jednego Boga', 48, 'Lewkowicz W.', 8, 0, ''),
(90, 'PamiÄ…tkÄ™ dnia Å›wiÄ…tecznego', 39, 'ChlondowskiA./Szulik M.R.', 29, 0, ''),
(91, 'NajdroÅ¼szy Jesu', 24, 'Heermann J.', 8, 0, ''),
(92, 'Ave maris stella', 31, 'Szulik M.R.', 16, 0, ''),
(93, 'Niech w Å›wiÄ™to radosne', 2, 'Pawlak I.', 8, 0, ''),
(94, 'Jezu, zmiÅ‚uj siÄ™', 33, ' SurzyÅ„ski J.', 3, 0, ''),
(96, 'Kto siÄ™ w opiekÄ™', 19, 'Szulik M.R.', 66, 0, ''),
(98, 'BÃ³g nad swym ludem', 44, 'Szulik M.R.', 45, 0, ''),
(99, 'Ciebie BoÅ¼e chwalimy', 25, 'Schmid C.N./Szulik M.R.', 24, 0, ''),
(100, 'Messe Basse I.Kyrie eleison', 28, 'Faure G.', 75, 0, ''),
(101, 'Messe Basse II.Sanctus', 22, 'Faure G.', 75, 0, ''),
(102, 'Messe Basse III.Benedictus', 21, 'Faure G.', 75, 0, ''),
(103, 'Messe Basse IV.Agnus Dei', 22, 'Faure G.', 75, 0, ''),
(104, 'Psalm 150', 19, 'Franck C.', 73, 0, ''),
(105, 'Psalm 150', 15, 'Franck C.', 73, 0, ''),
(106, 'WskaÅ¼ mi Panie', 41, 'Wood Ch./Szulik M.R.', 17, 0, ''),
(107, 'BÄ…dÅº przy mnie blisko (3 zwr.)', 59, 'Archer M./Szulik M.R.', 17, 0, ''),
(108, 'Tu es Petrus', 50, 'Szulik M.R.', 17, 0, ''),
(109, 'BÄ…dÅº przy mnie blisko (4 zwr.)', 49, 'Archer M./Szulik M.R.', 17, 0, ''),
(110, 'Iesu, in Te confido', 50, 'Szulik M.R.', 17, 0, ''),
(111, 'Kryste, dniu naszej Å›wiatÅ‚oÅ›ci', 65, 'Szamotulczyk W. ', 18, 0, ''),
(112, 'Modlitwa, gdy dziatki spaÄ‡ idÄ…', 34, 'Szamotulczyk W. ', 18, 0, ''),
(113, 'BÅ‚agosÅ‚awiony czÅ‚owiek', 47, 'Szamotulczyk W. ', 18, 0, ''),
(114, 'Alleluja. Chwalcie Pana', 68, 'Szamotulczyk W.', 18, 0, ''),
(115, 'Ach, mÃ³j Niebieski Panie', 25, 'Szamotulczyk W.', 18, 0, ''),
(116, 'Kleszczmy rÄ™koma', 38, 'GomÃ³Å‚ka M.', 19, 0, ''),
(117, 'KrÃ³lowie sÄ…dzÄ… poddane', 58, 'GomÃ³Å‚ka M.', 19, 0, ''),
(118, 'MÃ³j wiekuisty pasterz ', 44, 'GomÃ³Å‚ka M.', 19, 0, ''),
(119, 'Jako rzecz piÄ™kna', 32, 'GomÃ³Å‚ka M.', 19, 0, ''),
(120, 'NieÅ›cie chwaÅ‚Ä™ mocarze', 37, 'GomÃ³Å‚ka M.', 19, 0, ''),
(121, 'Chwalcie Pana', 53, 'Clarke J.', 20, 0, NULL),
(122, 'Chrystus ÅºrÃ³dÅ‚em', 85, 'Bach J.S.', 20, 0, ''),
(123, 'Jubilate Deo universa terra', 32, 'Halmos L.', 20, 0, NULL),
(124, 'GÅ‚oÅ› ImiÄ™ Pana', 54, 'Hobby R.A./Szulik M.R.', 20, 0, ''),
(125, 'ZwyciÄ™zca Å›mierci', 54, 'Hobby R.A./Szulik M.R.', 20, 0, ''),
(126, 'Laudate nomen Domini', 55, 'Tye C.', 21, 0, ''),
(127, 'Benedictus', 64, 'Maklakiewicz J.', 21, 0, ''),
(128, 'Laudate Dominum', 45, 'Gounod Ch.', 21, 0, ''),
(129, 'Cantate Domino', 47, 'Pitoni G.O. ', 21, 0, ''),
(130, 'Laudate Dominum', 43, 'Gounod Ch.', 21, 0, ''),
(131, 'Exultate Deo', 59, 'Scarlatti A.', 13, 0, ''),
(132, 'Chwalcie Pana wszyscy', 60, 'Orszulik J./Szulik M.R.', 13, 0, ''),
(133, 'ÅšwiÄ™ty, Å›wiÄ™ty, Å›wiÄ™ty', 36, 'GÃ³recki H.M. ', 13, 0, ''),
(134, 'Laudate Dominum', 43, 'Mozart W.A. ', 22, 0, ''),
(136, 'CÃ³rko SyjoÅ„ska ', 91, 'Haendel G.F. ', 22, 0, ''),
(137, 'Ciebie Boga wysÅ‚awiamy', 110, 'Stuligrosz S.', 23, 0, ''),
(138, 'Jubilate Deo', 35, 'Witt F.X.', 23, 0, ''),
(139, 'Omnis terra Deo jubilate', 45, 'Halmos L.', 23, 0, ''),
(141, 'Laudate Dominum', 83, 'Szulik M.R.', 23, 0, ''),
(142, 'Ciebie Boga wysÅ‚awiamy', 41, 'Szulik M.R.', 23, 0, ''),
(143, 'Adorate Deum', 43, 'Szulik M.R.', 23, 0, ''),
(144, 'Psalm 150', 27, 'Szulik M.R.', 24, 0, ''),
(145, 'Alleluja, Å¼yje Pan', 50, 'Chlondowski A./Szulik M.R.', 25, 0, ''),
(148, 'Regina coeli', 105, 'Aichinger G. ', 26, 0, ''),
(149, 'ZwyciÄ™zca Å›mierci (4 zwr.)', 66, 'Chlondowski A./Szulik M.R.', 27, 0, ''),
(150, 'Oto sÄ… baranki mÅ‚ode', 58, 'GaÅ‚uszka J.', 27, 0, ''),
(151, 'Haec dies', 35, 'ZieleÅ„ski M.', 27, 0, ''),
(153, 'ZwyciÄ™zca Å›mierci (2 zwr.)', 49, 'Chlondowski A./Szulik M.R.', 27, 0, ''),
(154, 'Oto sÄ… baranki mÅ‚ode', 41, 'SzczepaÅ„ski A.', 9, 0, ''),
(155, 'Uczcijmy Zmartwychwsta?ego', 49, 'ks. M.R.Szulik', 9, 0, NULL),
(156, 'Oto sÄ… Baranki', 62, 'Szulik M.R.', 9, 0, ''),
(157, 'Regina coeli', 52, 'Lotti A.', 9, 0, ''),
(161, 'Surrexit a mortius', 59, 'Widor Ch.M.', 14, 0, ''),
(162, 'Zeszyty Wielkanoc', 43, ' - ', 30, 0, NULL),
(163, 'Zeszyty Wielkanoc', 31, ' - ', 31, 0, NULL),
(164, 'PieÅ›ni wielkopostne', 2, ' - ', 32, 0, ''),
(166, 'Improperia', 22, 'Szulik M.R.', 34, 0, ''),
(167, 'Improperia', 30, 'Szulik M.R.', 34, 0, ''),
(168, 'Pasja wg Å›w. Mateusza', 36, 'Hoffman A.', 35, 0, ''),
(169, 'Lament Matki Boskiej', 67, 'Hoffman A.', 36, 0, ''),
(170, 'KrzyÅ¼u Å›wiÄ™ty', 18, 'Hoffman A.', 36, 0, ''),
(171, 'Dzieci Hebrajskie', 55, 'Hoffman A.', 36, 0, ''),
(172, 'HoÅ‚d Tobie', 50, 'Hoffman A.', 36, 0, ''),
(173, 'ChwaÅ‚a Tobie KrÃ³lu wiekÃ³w', 94, 'Hoffman A.', 36, 0, ''),
(174, 'Na skrzyÅ¼owaniu Å›wiata drÃ³g', 65, 'Hoffman A.', 36, 0, ''),
(175, 'Antyfona na ?rod? popielcow?', 51, 'ks. M.R.Szulik', 36, 0, NULL),
(177, 'Mi?o?? czy?cie i pokut?', 24, 'ks. M.R.Szulik', 36, 0, NULL),
(178, 'Pasja wg Å›w. Mateusza', 31, 'Hoffman A.', 37, 0, ''),
(179, 'Stabat Mater', 59, 'Kodaly Z.', 38, 0, ''),
(180, 'Parce domine', 43, 'Feliks Nowowiejski', 38, 0, NULL),
(181, 'O wy wszyscy', 63, 'G. Croce', 38, 0, 'mid w O vos omnes'),
(182, 'O vos omnes', 66, 'Croce G.', 38, 0, ''),
(183, 'O GÅ‚owo uwieÅ„czona', 73, 'Bach J.S.', 38, 0, 'CzterogÅ‚osowe'),
(184, 'Miserere', 45, 'Lotti A.', 38, 0, ''),
(185, 'Locus iste', 41, 'Bruckner A.', 11, 0, ''),
(186, 'PÅ‚aczcie anieli', 30, 'Hoffman A.', 5, 0, ''),
(187, 'In monte Oliveti', 67, 'Bruckner A.', 5, 0, ''),
(188, 'Ubi caritas - wersety', 55, 'Szulik M.R.', 5, 0, ''),
(189, 'Crucem Tuam', 59, 'Szulik M.R.', 3, 0, ''),
(190, 'Stabat Mater', 13, ' - ', 3, 0, NULL),
(193, 'Immutemur habitu', 44, 'Garcia J.', 6, 0, ''),
(194, 'Domine, Tu mihi', 24, 'Szulik M.R.', 6, 0, ''),
(195, 'Ecce quomodo moritur', 57, 'de Victoria T.L.', 6, 0, ''),
(197, 'Te Deum', 17, 'Gounod Ch.', 76, 0, ''),
(198, 'Te Deum', 19, 'Gounod Ch.', 77, 0, ''),
(199, 'Te Deum', 18, 'Gounod Ch.', 78, 0, ''),
(200, 'Te Deum', 11, 'Gounod Ch.', 79, 0, ''),
(201, 'Te Deum', 20, 'Szulik M.R.', 80, 0, ''),
(202, 'Te Deum', 29, 'Szulik M.R.', 81, 0, ''),
(203, 'Dextera Domini', 32, 'Franck C.', 73, 0, ''),
(204, 'Cicha noc', 25, 'Hopson H./Szulik M.R.', 55, 0, ''),
(205, 'B?ogos?awieni mi?osierni', 67, 'ks. M.R.Szulik', 8, 0, NULL),
(206, 'PieÅ›ni wielkopostne', 27, ' - ', 32, 0, ''),
(207, 'Alleluja mszalne II', 39, 'Z. Nowacki', 43, 0, ''),
(208, 'Alleluja Wielkanocne', 58, 'N.N.', 43, 0, ''),
(212, 'Alleluja', 35, 'Hoffman A.', 43, 0, ''),
(214, 'Alleluja', 71, 'Boyce W.', 43, 0, ''),
(216, 'Alleluja. Dic nobis', 139, 'Szulik M.R.', 43, 0, ''),
(217, 'Alleluja. Ciebie Panie', 43, 'Szulik M.R.', 43, 0, ''),
(218, 'Ad te levavi', 41, 'Witt F.X.', 44, 0, ''),
(219, 'WesoÅ‚y nam ten to dzieÅ„', 16, 'Szulik M.R.', 27, 0, ''),
(220, 'Przygotujcie drogi dla Pana', 43, ' - ', 44, 0, NULL),
(221, 'Radujcie siÄ™, bo Pan przybywa', 26, 'Szulik M.R.', 44, 0, ''),
(222, 'Veni, veni Emmanuel', 41, 'KodaÅ‚y Z.', 44, 0, ''),
(223, 'Veni, veni Emmanuel', 41, 'Willcocks D. ', 44, 0, ''),
(224, 'Chrystus Wodzem', 53, 'N.N.', 45, 0, NULL),
(227, 'Ciebie Chryste wyznajemy', 43, 'Szulik M.R.', 45, 0, ''),
(228, 'BÃ³g nad swym ludem', 50, 'Szulik M.R.', 45, 0, ''),
(229, 'Christus Rex', 185, 'Nowowiejski F', 45, 0, ''),
(230, 'Immolabit hoedum', 66, 'Gruberski E. ', 46, 0, ''),
(231, 'Krynico najdroÅ¼szych Å‚ask', 57, 'Szulik M.R.', 46, 0, ''),
(232, 'Pange lingua', 50, 'Bruckner A.', 46, 0, ''),
(233, 'Misit me vivens Pater', 54, 'Gruberski E.', 46, 0, ''),
(234, 'Ave verum corpus', 42, 'Mozart W.A.', 47, 0, ''),
(235, 'Oculi omnium', 49, 'Wood Ch.', 47, 0, ''),
(236, 'Veni Jesu', 45, 'Cherubini L. ', 47, 0, ''),
(237, 'JuÅ¼ goÅ›ciÅ¼, Jesu', 76, 'ZoÅ‚a A.', 47, 0, ''),
(238, 'O memoriale mortis', 62, ' Palestrina G.P.', 47, 0, ''),
(239, 'CÃ³Å¼ Ci Jezu damy', 50, 'Hoffman A.', 48, 0, ''),
(240, 'Panis angelicus', 41, 'Franck C.', 48, 0, ''),
(241, 'O salutaris Hostia', 54, ' Grabowski J.', 48, 0, ''),
(242, 'Panie dobry jak chleb', 60, 'Hoffman A.', 48, 0, ''),
(243, 'Panis angelicus', 72, 'Casciolini C.', 49, 0, ''),
(244, 'Tantum ergo', 78, 'de Severac D.', 49, 0, ''),
(245, 'Pokarmie naszej drogi', 52, 'Haydn M.', 49, 0, ''),
(246, 'O salutaris hostia', 55, 'Anerio F.', 49, 0, ''),
(247, 'Sacramentum caritas', 55, 'Joncas M./Szulik M.R.', 49, 0, ''),
(248, 'Alleluja', 25, 'Mancini H.', 43, 0, ''),
(249, 'Panis Angelicus', 42, 'Saint-Saens C.', 50, 0, ''),
(250, 'AllelujaAlleluja. Cognoverunt discipuli', 50, 'Bardos L.', 50, 0, ''),
(251, 'Docti sacris institutis', 18, 'Mendelssohn-Bartholdy F. ', 7, 0, ''),
(252, 'Anima Christi', 50, 'Frisina M.', 7, 0, ''),
(253, 'Panem de caelo', 39, 'ks. M.R.Szulik', 7, 0, NULL),
(254, 'Gloria VIII (De angelis)', 55, 'Szulik M.R.', 7, 0, ''),
(255, 'Panem de caelo', 56, 'Szulik M.R.', 7, 0, ''),
(256, 'Missa VIII ', 94, 'De Angelis', 51, 0, NULL),
(257, 'Gloria', 59, 'De Angelis', 51, 0, NULL),
(258, 'Cz??ci sta?e Mszy', 48, ' - ', 51, 0, NULL),
(259, 'Sanctus', 94, 'De Angelis', 51, 0, NULL),
(260, 'Totus Embolismi', 72, 'De Angelis', 52, 0, NULL),
(261, 'Alleluja o filii et filiae (gregoria?skie)', 47, 'De Angelis', 52, 0, NULL),
(262, 'Veni creator spiritus', 62, 'De Angelis', 52, 0, NULL),
(263, 'Gaude Mater Polonia', 62, ' - ', 53, 0, ''),
(265, 'Polski hymn narodowy', 40, 'Raczkowski W. opr.', 53, 0, ''),
(266, 'Gaudeamus igitur', 24, ' - ', 53, 0, NULL),
(267, 'Rota', 36, 'Nowowiejski F. ', 53, 0, ''),
(268, 'Ej, byliÅ›my bracia', 52, 'Hoffman A.', 54, 0, ''),
(269, 'Na BoÅ¼e Narodzenie', 61, 'Hoffman A.', 54, 0, ''),
(270, 'A spis, Bartek', 65, 'Ks. A. Hoffman', 54, 0, ''),
(271, 'ZaÅ›nij Dziecino', 59, 'Hoffman A.', 54, 0, ''),
(272, 'Serca ludzkie siÄ™ radujÄ…', 47, 'Maklakiewicz J. ', 54, 0, ''),
(274, 'Dalej chÅ‚opy', 63, 'Maklakiewicz J.', 55, 0, ''),
(275, 'Gdy Å›liczna Panna', 62, 'Maklakiewicz J. ', 55, 0, ''),
(276, 'LulajÅ¼e Jezuniu', 52, 'Maklakiewicz J. ', 55, 0, ''),
(277, 'W dzieÅ„ BoÅ¼ego Narodzenia', 70, 'Niewiadomski S. ', 56, 0, ''),
(278, 'PokÅ‚on Jezusowi', 65, 'Maklakiewicz J.', 56, 0, ''),
(279, 'Nova radist stala', 83, 'Giraud M.', 56, 0, ''),
(280, 'Hodie Christus', 28, 'Britten B.', 1, 0, ''),
(281, 'PoÅ‚noc juÅ¼ byÅ‚a', 68, 'Nowowiejski F. ', 1, 0, ''),
(282, 'WsrÃ³d nocnej ciszy (4 zwr.)', 56, 'Maklakiewicz J. ', 2, 0, ''),
(283, 'WsrÃ³d nocnej ciszy (3 zwr.)', 37, 'Maklakiewicz J. ', 2, 0, ''),
(284, 'Tolite hostias', 49, 'Saint-Saens C.', 2, 0, ''),
(285, 'Oratorio de Noel', 42, 'Saint-Saens C.', 2, 0, ''),
(286, 'DzieciÄ™ siÄ™ nam narodziÅ‚o', 81, 'Hoffman A.', 4, 0, ''),
(288, 'ZagraÅ‚y fulorki', 6, 'Pasierb-Orland J.', 4, 0, ''),
(290, 'Jezusek czuwa', 68, 'Nowowiejski F. ', 4, 0, ''),
(291, 'NuÅ¼ my dziÅ› krzeÅ›cijani', 52, 'Wilkowska-ChomiÅ„ska K.', 4, 0, ''),
(292, 'WesoÅ‚y nam ten to dzieÅ„', 45, 'Wilkowska-ChomiÅ„ska K.', 4, 0, ''),
(294, 'Adeste Fideles', 16, 'Willcocks D./Szulik M.R.', 4, 0, ''),
(297, 'My teÅ¼ pastuszkowie', 64, 'Hoffman A.', 57, 0, ''),
(298, 'Wieczornica kolÄ™dowa', 33, 'Hoffman A.', 58, 0, ''),
(299, 'Wieczornica kolÄ™dowa', 22, 'Hoffman A.', 59, 0, ''),
(300, 'Gdy siÄ™ Chrystus rodzi', 80, 'Nowowiejski F. ', 10, 0, ''),
(301, 'Z narodzenia Pana', 47, 'Maklakiewicz J.', 10, 0, NULL),
(302, 'Mizerna, cicha', 42, 'Szulik M.R.', 10, 0, ''),
(303, 'Jezus MalusieÅ„ki', 43, 'Szulik M.R.', 10, 0, ''),
(304, 'W Å¼Å‚obie leÅ¼y', 66, 'Maklakiewicz J. ', 10, 0, ''),
(305, 'Pod TwojÄ… obronÄ™', 18, 'Hoffman A.', 60, 0, ''),
(306, 'BÅ‚Ä™kitne rozwiÅ„my sztandary', 25, 'Hoffman A.', 60, 0, ''),
(307, 'Maria, Mater gratiae', 29, 'Faure G.', 60, 0, NULL),
(308, 'Bogarodzica', 18, 'Hoffman A.', 60, 0, ''),
(310, 'Ave vera virginitas', 65, 'des Prez J.', 61, 0, ''),
(311, 'Ave Maria', 52, 'Arcadelt J.', 61, 0, ''),
(312, 'Ave Maris Stella', 51, 'Anerio F.', 61, 0, NULL),
(313, 'Ave Mundi Spes', 51, 'Gorczycki G.G.', 61, 0, NULL),
(314, 'AnioÅ‚ PaÅ„ski', 56, 'Maklakiewicz J.', 62, 0, ''),
(315, 'Omni Die', 74, 'Gorczycki G.G.', 62, 0, NULL),
(316, 'Wszystkie Trony', 59, 'SurzyÅ„ski J.', 62, 0, ''),
(317, 'Bogarodzica', 66, 'Å»ukowski J.', 62, 0, ''),
(318, 'O gloriosa Domina', 41, 'ZielieÅ„ski M.', 62, 0, ''),
(321, 'Nitida Stella', 67, 'Gemmani M.', 63, 0, ''),
(322, 'O Matko miÅ‚oÅ›ciwa', 42, 'Sykulski J.', 63, 0, ''),
(323, 'Magnificat in G', 42, 'Szulik M.R.', 63, 0, ''),
(324, 'Hymn na Zwiastowanie', 55, 'SurzyÅ„ski J.', 63, 0, ''),
(325, 'ZdrowaÅ› bÄ…dÅ¼ Maryja', 45, 'GÃ³recki H.M. ', 64, 0, ''),
(326, 'Ave maris stella', 67, 'Bardos L.', 64, 0, NULL),
(327, 'Tota pulchra es', 23, 'Bruckner A.', 64, 0, ''),
(328, 'Ave Maria', 34, 'Liszt F.', 16, 0, ''),
(329, 'Salve Mater misericordiae', 49, 'Szulik M.R.', 16, 0, ''),
(330, 'Jam non dicam', 14, 'Hoffman A.', 65, 0, ''),
(331, 'BoÅ¼e ze mnÄ… bÄ…dÅ¼', 52, 'Rutter J./Szulik M.R.', 65, 0, ''),
(332, 'Modlitwa o pokÃ³j', 60, 'Blacha N.', 65, 0, ''),
(333, 'Precamini felicitatem', 56, 'Wood Ch.', 65, 0, ''),
(334, 'Sacerdos et Pontifex', 52, 'Hoffman A.', 65, 0, '2 strony'),
(335, 'Sacerdos et Pontifex', 62, 'Wildor Ch. M.', 65, 0, '6 stron'),
(336, 'Signore delle cime', 40, 'Marzi G.', 66, 0, ''),
(337, 'Evangelio obedientia a capp.', 39, 'Szulik M.R.', 66, 0, 'KrÃ³tkie'),
(340, 'Evangelio obedientia org.', 45, 'Szulik M.R.', 74, 0, 'DÅ‚ugie'),
(342, 'Obdarz pokojem', 60, 'Mendelssohn-Bartholdy F. /Szulik M.R.', 67, 0, ''),
(343, 'Cantique de Jean Racine, op. 11', 29, 'Faure G./Szulik M.R.', 67, 0, ''),
(344, 'BÃ³g wszechmocny panuje', 79, 'Wood Ch./Szulik M.R.', 67, 0, ''),
(345, 'Christus vincit', 65, 'Peeters F.', 67, 0, ''),
(348, 'Veni Domine', 69, 'Mendelssohn-Bartholdy F. ', 68, 0, ''),
(349, 'Emitte Spiritum', 33, 'Habert J.', 69, 0, ''),
(350, 'Cecylio, panno Å›piewna', 43, 'SzczepaÅ„ski A.', 69, 0, ''),
(351, 'Non nobis Domine', 85, 'Doyle P.', 69, 0, NULL),
(352, 'Ascendit Deus', 28, 'Witt F.X.', 69, 0, ''),
(353, 'Ku Tobie Panie wznosim spiew', 49, 'Wood Ch./Szulik M.R.', 69, 0, ''),
(354, 'Aeterne Rex', 40, 'Horak W.', 70, 0, ''),
(355, 'Tu Trinitatis unitas', 42, 'Dvorak A.', 70, 0, ''),
(356, 'Spiritus sancti gratia', 40, 'Vulpius M.', 70, 0, ''),
(357, 'Aeterne Rex', 45, 'SurzyÅ„ski J.', 70, 0, ''),
(358, 'O lux beata Trinitas', 25, 'Archer M./Szulik M.R.', 70, 0, ''),
(359, 'BoÅ¼e obdarz KoÅ›ciÃ³Å‚ TwÃ³j', 31, 'Szulik M.R.', 71, 0, ''),
(360, 'Introibo ad altare', 41, 'Szulik M.R.', 71, 0, ''),
(363, 'Te gloriosus', 39, 'Szulik M.R.', 71, 0, ''),
(364, 'Quam dilecta tabernacula', 26, 'Szulik M.R.', 71, 0, ''),
(365, 'S?ugo s?ug Bo?ych', 62, 'Szulik M.R.', 71, 0, NULL),
(366, 'BoÅ¼e obdarz-wersety', 75, 'Szulik M.R.', 71, 0, ''),
(368, 'Å»yjÄ…c mocÄ… chrztu', 61, 'Szulik M.R.', 71, 0, ''),
(369, 'Exsurge Domine', 47, 'Harmat A.', 11, 0, ''),
(370, 'Deus, Tu convertens', 38, 'Halmos L.', 11, 0, ''),
(371, 'Jesu dulcis memoria', 22, 'Bardos L.', 11, 0, NULL),
(372, 'Invocabit me', 107, 'Szulik M.R.', 11, 0, ''),
(373, 'Sperent in te', 77, 'Bardos L.', 11, 0, ''),
(374, 'Respice Domine', 51, 'Szulik M.R.', 11, 0, ''),
(375, 'Meditabor', 53, 'Witt F.X.', 11, 0, ''),
(376, 'Congregavit nos', 27, 'Szulik M.R.', 8, 0, NULL),
(377, 'Totus Tuus', 27, 'GÃ³recki  H.M.', 74, 0, ''),
(378, 'Alleluja', 29, 'Mawby C.', 8, 0, NULL),
(379, 'Wsród nocnej ciszy', 34, 'Maklakiewicz J.', 2, 0, NULL),
(380, 'Ave Verum', 60, 'Elgar E.', 48, 0, NULL),
(381, 'Duchu ÅšwiÄ™ty & O, Stworzycielu Duchu', 16, ' - ', 8, 0, ''),
(382, 'In feriis per annum', 24, ' - ', 8, 0, NULL),
(383, 'Przyst?pie do o?tarza Bo?ego', 18, 'Gileneau J.', 8, 0, NULL),
(384, 'Ja jestem bramÄ…', 45, 'Szulik M.R.', 68, 0, ''),
(385, 'Chrystus Zmartwychwstan jest', 24, ' - ', 8, 0, NULL),
(386, 'Niech w ?wi?to radosne', 35, 'Pawlak I.', 8, 0, NULL),
(387, 'NawrÃ³Ä‡ siÄ™ ludu', 30, 'Szulik M.R.', 34, 0, ''),
(388, 'Weso?y nam dzie?', 31, ' - ', 8, 0, NULL),
(389, 'Przykazanie nowe daj? wam', 27, ' - ', 8, 0, NULL),
(390, 'Matko niebieskiego Pana', 30, 'Szulik M.R.', 63, 0, ''),
(391, 'Panie pragnienia ludzkich serc', 36, 'Kreutz R.E.', 8, 0, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`);

--
-- Индексы таблицы `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id_folder`),
  ADD UNIQUE KEY `name_folder` (`name_folder`);

--
-- Индексы таблицы `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id_query`);

--
-- Индексы таблицы `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id_song`),
  ADD KEY `id_folder` (`id_folder`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `folder`
--
ALTER TABLE `folder`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `queries`
--
ALTER TABLE `queries`
  MODIFY `id_query` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `song`
--
ALTER TABLE `song`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folder` (`id_folder`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
