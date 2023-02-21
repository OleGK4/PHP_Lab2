-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 15:05
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Parking_DB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Client`
--

CREATE TABLE `Client` (
  `id` int NOT NULL,
  `client_name` char(150) CHARACTER SET utf8mb4  NOT NULL,
  `brand` char(150) CHARACTER SET utf8mb4 NOT NULL,
  `time_arrive` time NOT NULL,
  `date_arrive` date DEFAULT NULL,
  `price` int NOT NULL DEFAULT '2000',
  `sale` int DEFAULT NULL,
  `debt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Client`
--

INSERT INTO `Client` (`id`, `client_name`, `brand`, `time_arrive`, `date_arrive`, `price`, `sale`, `debt`) VALUES
(3, 'Danilin Danila Danilovich', 'Mazda', '20:35:00', '2023-10-15', 2000, 0, 1200),
(8, 'Maksimov Maksim Maksimovich', 'Mitsubishi', '14:20:30', '2010-05-23', 2000, NULL, 1200),
(9, 'Evgeniev Evgeny Evgenievich', 'Lada', '08:10:21', '2015-02-13', 2000, 200, 600),
(10, 'Vasiliev Vasily Vasilievich', 'Toyota', '20:40:30', '2007-12-01', 2000, NULL, 3000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Client`
--
ALTER TABLE `Client`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
