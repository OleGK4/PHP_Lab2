-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2023 г., 18:23
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
-- Структура таблицы `Cars`
--

CREATE TABLE `Cars` (
  `id` int NOT NULL COMMENT 'ID тачки',
  `brand` varchar(200) DEFAULT NULL COMMENT 'Бренд тачки',
  `model` varchar(200) DEFAULT NULL COMMENT 'Модель тачки',
  `color` varchar(200) DEFAULT NULL COMMENT 'Цвет тачки',
  `client_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Таблица с тачками';

--
-- Дамп данных таблицы `Cars`
--

INSERT INTO `Cars` (`id`, `brand`, `model`, `color`, `client_id`) VALUES
(1, 'Toyota', 'Carolla', 'Black', 9),
(2, 'Mitsubishi', 'Pajero IO', 'Black', 3),
(3, 'Chevrolet', 'Suburban', 'Dark-blue', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `Client`
--

CREATE TABLE `Client` (
  `id` int NOT NULL,
  `client_name` char(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time_arrive` time NOT NULL,
  `date_arrive` date DEFAULT NULL,
  `sale` int DEFAULT NULL,
  `debt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Client`
--

INSERT INTO `Client` (`id`, `client_name`, `time_arrive`, `date_arrive`, `sale`, `debt`) VALUES
(3, 'Danilin Danila Danilovich', '20:35:00', '2023-10-15', 0, 1200),
(8, 'Maksimov Maksim Maksimovich', '14:20:30', '2010-05-23', 0, 1200),
(9, 'Evgeniev Evgeny Evgenievich', '08:10:21', '2015-02-13', 200, 600),
(10, 'Vasiliev Vasily Vasilievich', '20:40:30', '2007-12-01', 0, 3000);

-- --------------------------------------------------------

--
-- Структура таблицы `ParkingPlaces`
--

CREATE TABLE `ParkingPlaces` (
  `id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `price` int NOT NULL DEFAULT '2000',
  `availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `ParkingPlaces`
--

INSERT INTO `ParkingPlaces` (`id`, `client_id`, `price`, `availability`) VALUES
(1, 9, 2000, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cars`
--
ALTER TABLE `Cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Client`
--
ALTER TABLE `Client`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `ParkingPlaces`
--
ALTER TABLE `ParkingPlaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cars`
--
ALTER TABLE `Cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID тачки', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `ParkingPlaces`
--
ALTER TABLE `ParkingPlaces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
