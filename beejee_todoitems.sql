-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2021 г., 09:21
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beejee_todoitems`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todoitems`
--

CREATE TABLE `todoitems` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `todoitem_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `edited_by_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `todoitems`
--

INSERT INTO `todoitems` (`id`, `username`, `email`, `todoitem_text`, `status`, `edited_by_admin`) VALUES
(1, 'user1', 'user1@mail.ru', 'Lorem ipsum dolor sit amet', 0, 1),
(2, 'user2', 'user2@mail.ru', 'Ut enim ad minim veniam', 1, 0),
(3, 'user3', 'user3@mail.ru', 'Duis aute irure dolor', 0, 0),
(4, 'user4', 'user4@mail.ru', 'Excepteur sint occaecat ', 0, 0),
(5, 'user5', 'user5@mail.ru', 'Lorem ipsum, or lipsum as it is sometimes known', 0, 0),
(6, 'user6', 'user6@mail.ru', 'The passage is attributed to an unknown typesetter in the 15th century who', 0, 0),
(7, 'user7', 'user7@mail.ru', 'alert(\'test\');', 0, 1),
(8, 'user8', 'user8@mail.ru', 'alert(\'hello world\');', 0, 1),
(9, 'user9', 'user9@mail.ru', 'The purpose of lorem ipsum is to create a natural looking block of', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$wj9WhYq0N92T5INowcYBAeUwy9oJGi58kovr9Kk5hYJ03tKnG8C7u');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todoitems`
--
ALTER TABLE `todoitems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todoitems`
--
ALTER TABLE `todoitems`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
