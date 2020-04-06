-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2020 г., 07:27
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
-- База данных: `less_6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `basket_id` int(8) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count` int(16) NOT NULL,
  `option_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `is_ordered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `image_dir` varchar(64) NOT NULL,
  `image_min_dir` varchar(80) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`item_id`, `name`, `image_dir`, `image_min_dir`, `description`, `price`) VALUES
(1, 'Номер «Люкс»', './assets/img/1.jpg', './assets/img/min/1.jpg', 'Мини-бар, Мягкая мебель, Шкаф, 2-спальная кровать ', '3500 ₽/сутки'),
(2, 'Номер «Полулюкс» с 2 кроватями', './assets/img/2.jpg', './assets/img/min/2.jpg', 'Мини-бар, Мягкая мебель, Раздельные кровати, Комод ', '2500 ₽/сутки'),
(3, 'Номер «Полулюкс» с 1 кроватью', './assets/img/3.jpg', './assets/img/min/3.jpg', 'Шкаф, 2-спальная кровать, Комод, Диван ', '2500 ₽/сутки'),
(4, 'Номер «Семейный»', './assets/img/4.jpg', './assets/img/min/4.jpg', 'Мини-бар, Мягкая мебель, Раздельные кровати, Шкаф  ', ' 4000 ₽/сутки');

-- --------------------------------------------------------

--
-- Структура таблицы `item_options`
--

CREATE TABLE `item_options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item_options`
--

INSERT INTO `item_options` (`option_id`, `option_name`) VALUES
(0, 'С питанием'),
(1, 'Без питания');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `login` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `e_mail` varchar(32) DEFAULT NULL,
  `phone` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `login`, `password`, `is_admin`, `e_mail`, `phone`) VALUES
(9, 'Admin', 'admin', '3cf108a4e0a498347a5a75a792f23212202cb962ac59075b964b07152d234b70', 1, '', 0),
(14, 'Svyatoslav', 'root', '07b432d25170b469b57095ca269bc20254818458e946b69705089bb7ae0f9a36', 1, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basket_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basket_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
