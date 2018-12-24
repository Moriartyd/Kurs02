-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2018 г., 16:28
-- Версия сервера: 5.7.22-22-log
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a260286_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `inA`
--

CREATE TABLE `inA` (
  `id` int(8) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `inA`
--

INSERT INTO `inA` (`id`, `departure`, `destination`, `time`) VALUES
(6589, 'Купавна', 'Москва (Курский вокзал)', '14:18'),
(7175, 'Крутое', 'Москва (Курский вокзал)', '14:23'),
(6619, 'Электросталь', 'Москва (Курский вокзал)', '14:27'),
(6324, 'Дедовск', 'Щербинка', '14:23'),
(6078, 'Царицыно', 'Одинцово', '15:05'),
(6126, 'Серпухов', 'Москва-Каланчевская', '15:53'),
(6869, 'Крутое', 'Москва (Курский вокзал)', '15:47'),
(6543, 'Железнодорожная', 'Москва (Курский вокзал)', '16:40'),
(6717, 'Балашиха', 'Москва (Курский вокзал)', '16:58'),
(6964, 'Тула (Московский вокзал)', 'Москва-Каланчевская', '17:38');

-- --------------------------------------------------------

--
-- Структура таблицы `inB`
--

CREATE TABLE `inB` (
  `id` int(8) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `inB`
--

INSERT INTO `inB` (`id`, `departure`, `destination`, `time`) VALUES
(6531, 'Железнодорожная', 'Москва (Курский вокзал)', '14:06'),
(6619, 'Захарово', 'Москва (Курский вокзал)', '14:27'),
(6813, 'Электрогорск', 'Москва (Курский вокзал)', '14:41'),
(6963, 'Москва-Каланчевская', 'Тула (Московский вокзал)', '15:03'),
(6915, 'Петушки', 'Москва (Курский вокзал)', '15:24'),
(6080, 'Щербинка', 'Голицыно', '15:57'),
(6763, 'Фрязево', 'Москва (Курский вокзал)', '16:18'),
(6129, 'Москва-Каланчевская', 'Серпухов', '16:50'),
(6338, 'Новоиерусалимовская', 'Подольск', '17:10'),
(6164, 'Чехов', 'Москва (Курский вокзал)', '17:33');

-- --------------------------------------------------------

--
-- Структура таблицы `income`
--

CREATE TABLE `income` (
  `id` int(8) UNSIGNED NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `income`
--

INSERT INTO `income` (`id`, `departure`, `destination`, `time`) VALUES
(6480, 'Подольск', 'Нахабино', '14:58'),
(6535, 'Железнодорожная', 'Москва (Курский вокзал)', '15:18'),
(6531, 'Железнодорожная', 'Москва (Курский вокзал)', '14:06'),
(6074, 'Люблино', 'Голицыно', '14:13'),
(6324, 'Дедовск', 'Щербинка', '14:38'),
(6621, 'Электросталь', 'Москва (Курский вокзал)', '15:29'),
(6539, 'Железнодорожная', 'Москва (Курский вокзал)', '16:12'),
(7115, 'Железнодорожная', 'Москва (Курский вокзал)', '16:29'),
(6286, 'Люблино', 'Москва-Каланчевская', '16:35'),
(6430, 'Нахабино', 'Щербинка', '17:15');

-- --------------------------------------------------------

--
-- Структура таблицы `outA`
--

CREATE TABLE `outA` (
  `id` int(8) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `outA`
--

INSERT INTO `outA` (`id`, `departure`, `destination`, `time`) VALUES
(6616, 'Москва (Курский вокзал)', 'Захарово', '14:07'),
(6920, 'Москва (Курский вокзал)', 'Петушки', '14:07'),
(6123, 'Москва (Курский вокзал)', 'Серпухов', '14:50'),
(6480, 'Подольск', 'Нахабино', '15:01'),
(6482, 'Нахабино', 'Львовская', '15:17'),
(6162, 'Чехов', 'Москва-Каланчевская', '15:30'),
(6370, 'Подольск', 'Нахабино', '15:42'),
(6332, 'Нахабино', 'Львовская', '16:12'),
(6488, 'Подольск', 'Дедовск', '16:22'),
(7168, 'Новоиерусалимовская', 'Серпухов', '16:35');

-- --------------------------------------------------------

--
-- Структура таблицы `outB`
--

CREATE TABLE `outB` (
  `id` int(8) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `outB`
--

INSERT INTO `outB` (`id`, `departure`, `destination`, `time`) VALUES
(6616, 'Москва (Курский вокзал)', 'Владимир', '14:13'),
(6122, 'Серпухов', 'Москва-Каланчевская', '14:27'),
(7153, 'Москва-Каланчевская', 'Серпухов', '14:42'),
(6480, 'Подольск', 'Нахабино', '15:01'),
(6486, 'Серпухов', 'Тушино', '15:35'),
(6620, 'Москва (Курский вокзал)', 'Захарово', '15:48'),
(6588, 'Москва (Курский вокзал)', 'Купавна', '16:00'),
(6284, 'Люблино', 'Москва-Каланчевская', '16:13'),
(6962, 'Тула (Московский вокзал)', 'Москва-Каланчевская', '16:30'),
(6223, 'Москва-Каланчевская', 'Чехов', '17:04');

-- --------------------------------------------------------

--
-- Структура таблицы `outcome`
--

CREATE TABLE `outcome` (
  `id` int(8) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `outcome`
--

INSERT INTO `outcome` (`id`, `departure`, `destination`, `time`) VALUES
(6963, 'Москва-Каланчевская', 'Тула (Московский вокзал)', '15:05'),
(6618, 'Москва (Курский вокзал)', 'Захарово', '14:54'),
(6814, 'Москва (Курский вокзал)', 'Электрогорск', '14:36'),
(6616, 'Москва (Курский вокзал)', 'Владимир', '14:13'),
(6482, 'Львовская', 'Дедовск', '15:19'),
(6328, 'Новоиерусалимовская', 'Щербинка', '15:27'),
(6126, 'Серппухов', 'Москва-Каланчевская', '15:56'),
(6127, 'Москва-Каланчевская', 'Серпухов', '16:04'),
(6488, 'Подольск', 'Дедовск', '16:22'),
(7110, 'Москва (Курский вокзал)', 'Железнодорожная', '16:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT NULL,
  `bonus` bigint(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `email`, `phone_num`, `status`, `admin`, `bonus`) VALUES
('user1', 'c4ca4238a0b923820dcc509a6f75849b', '', '89354752343', 0, NULL, 1),
('super_user', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 1, NULL, 0),
('admin', 'deaad792606928825c0bf85cd46e9edf', 'twitter@kurs02.mcdir.ru', '89999999999', 1, 1, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `inA`
--
ALTER TABLE `inA`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `inB`
--
ALTER TABLE `inB`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `outA`
--
ALTER TABLE `outA`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `outB`
--
ALTER TABLE `outB`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `outcome`
--
ALTER TABLE `outcome`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `inA`
--
ALTER TABLE `inA`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7176;

--
-- AUTO_INCREMENT для таблицы `inB`
--
ALTER TABLE `inB`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6964;

--
-- AUTO_INCREMENT для таблицы `income`
--
ALTER TABLE `income`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143412353;

--
-- AUTO_INCREMENT для таблицы `outA`
--
ALTER TABLE `outA`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7169;

--
-- AUTO_INCREMENT для таблицы `outB`
--
ALTER TABLE `outB`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7154;

--
-- AUTO_INCREMENT для таблицы `outcome`
--
ALTER TABLE `outcome`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
