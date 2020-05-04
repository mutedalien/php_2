-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 30 2020 г., 09:38
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`brand_id`, `name`) VALUES
(1, 'LADA (ВАЗ)'),
(2, 'Renault'),
(3, 'BMW'),
(4, 'Hyundai'),
(5, 'Geely'),
(6, 'Mazda'),
(7, 'Kia'),
(8, 'Lifan'),
(9, 'Peugeot'),
(10, 'Honda'),
(11, 'Subaru'),
(12, 'Mitsubishi');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `brand_id`) VALUES
(1, 'Granta', 654000, 1),
(2, 'Vesta', 876000, 1),
(3, 'Kalina', 567000, 1),
(4, 'XRAY', 789000, 1),
(5, 'Largus', 891000, 1),
(6, 'Priora', 567000, 1),
(7, '2121 (4x4)', 456000, 1),
(8, '2110', 321000, 1),
(9, 'Duster', 1234000, 2),
(10, 'Koleos', 1345000, 2),
(11, 'Sandero', 891000, 2),
(12, 'Fluence', 1345000, 2),
(13, 'Laguna', 1567000, 2),
(14, 'Scenic', 1456000, 2),
(15, 'Logan', 987000, 2),
(16, 'Kaptur', 1567000, 2),
(17, 'X5', 2345000, 3),
(18, 'X6', 2456000, 3),
(19, 'Accent', 987000, 4),
(20, 'Grand Starex', 876000, 4),
(21, 'Solaris', 1234000, 4),
(22, 'Creta', 1000000, 4),
(23, 'i40', 1654000, 4),
(24, 'Sonata', 1543000, 4),
(25, 'Elantra', 1987000, 4),
(26, 'Tucson', 1876000, 4),
(27, 'Getz', 951000, 4),
(28, 'Santa Fe', 1753000, 4),
(32, 'Atlas', 1852000, 5),
(33, 'Emgrand EC7', 1258000, 5),
(34, 'GS', 1456000, 5),
(35, 'CK (Otaka)', 1741000, 5),
(36, 'Emgrand X7', 987456, 5),
(37, 'MK', 877900, 5),
(38, 'Coolray', 169650, 5),
(39, 'Emgrand 7', 547200, 5),
(40, 'FC (Vision)', 924000, 5),
(41, 'MK Cross', 241330, 5),
(42, '626', 175640, 6),
(43, 'CX-9', 205280, 6),
(44, 'BT-50', 227150, 6),
(45, 'MPV', 668900, 6),
(46, '323', 253470, 6),
(47, 'CX-5', 285630, 6),
(48, 'Tribute', 230570, 6),
(49, 'CX-7', 851400, 6),
(52, 'Carens', 280380, 7),
(53, 'Optima', 289270, 7),
(54, 'Soul', 264090, 7),
(55, 'Ceed', 173620, 7),
(56, 'Picanto', 212550, 7),
(57, 'Spectra', 149760, 7),
(58, 'Cerato', 815400, 7),
(59, 'Rio', 124480, 7),
(60, 'Sportage', 170130, 7),
(61, 'Magentis', 540700, 7),
(62, 'Sorento', 370000, 7),
(63, 'Breez (520)', 582900, 8),
(64, 'Smily', 203560, 8),
(65, 'X70', 160670, 8),
(66, 'Cebrium (720)', 234860, 8),
(67, 'Solano', 178180, 8),
(68, 'Celliya (530)', 248020, 8),
(69, 'X50', 915700, 8),
(70, 'Myway', 199110, 8),
(71, '307', 139040, 9),
(72, '407', 238290, 9),
(73, '308', 291670, 9),
(74, '408', 122780, 9),
(75, 'Partner', 870800, 9),
(76, '3008', 152060, 9),
(77, '406', 959900, 9),
(78, '207', 215010, 9),
(79, '107', 118250, 9),
(81, 'Accord', 612800, 10),
(82, 'CR-V', 1878000, 10),
(83, 'Capa', 811200, 10),
(84, 'Civic', 215280, 10),
(85, 'Civic Ferio', 227390, 10),
(86, 'Concerto', 514000, 10),
(87, 'Crosstour', 2509300, 10),
(88, 'Element', 447900, 10),
(89, 'Fit', 495300, 10),
(90, 'Freed', 504800, 10),
(91, 'HR-V', 214510, 10),
(92, 'Insight', 696700, 10),
(93, 'Inspire', 293970, 10),
(94, 'Alcyone', 194940, 11),
(95, 'Forester', 522000, 11),
(96, 'Impreza', 217520, 11),
(97, 'Impreza WRX', 1463300, 11),
(98, 'Impreza WRX STi', 286290, 11),
(99, 'Justy', 130370, 11),
(100, 'Legacy', 819500, 11),
(101, 'Legacy Lancaster', 273670, 11),
(102, 'Outback', 1501200, 11),
(103, 'Space Wagon', 2522900, 12),
(104, 'Pajero Sport', 533800, 12),
(105, 'Pajero', 300700, 12),
(106, 'Outlander', 2270900, 12),
(107, 'Montero', 268720, 12),
(108, 'Montero Sport', 198980, 12),
(109, 'Legnum', 188330, 12),
(110, 'Lancer', 982200, 12),
(111, 'Lancer Evolution', 2446700, 12),
(112, 'Galant', 161980, 12),
(113, 'Eclipse', 598200, 12),
(114, 'Delica', 202950, 12);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
