-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 30 2023 г., 10:44
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

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
(8, 'Mitsubishi', 'Pajero IO', 'Brown', 9),
(9, 'Rhino', 'Logan', 'Black', 3),
(12, 'BMW', 'Velo', 'PINK', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `Client`
--

CREATE TABLE `Client` (
  `id` int NOT NULL COMMENT 'ID пользователя',
  `client_name` char(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'имя клиента',
  `sale` int DEFAULT NULL COMMENT 'скидка на покупки',
  `debt` int DEFAULT NULL COMMENT 'долг по оплате',
  `login` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'логин для авторизации',
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'пароль для авторизации',
  `access_level` tinyint(1) DEFAULT NULL COMMENT 'уровень доступа (0, 1)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Client`
--

INSERT INTO `Client` (`id`, `client_name`, `sale`, `debt`, `login`, `password`, `access_level`) VALUES
(3, 'Sergin Sergey Sergeevich', 0, 34433, 'serega', '', 1),
(8, 'Maksimov Maksim Maksimovich', 0, 1200, NULL, NULL, NULL),
(9, 'Evgin Evgeny Evgeevich', 200, 234, 'evgexa', '', 0),
(10, 'Vasiliev Vasily Vasilievich', 0, 3000, NULL, NULL, NULL),
(13, 'Vovan Vovkin Vovovich', NULL, NULL, 'vovan', '3443', 0),
(22, 'gsdf sdfg gfds', NULL, NULL, 'asd', '`12', 1),
(23, 'jhgf fghj jhgf', NULL, NULL, 'gfds', '123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ParkingPlaces`
--

CREATE TABLE `ParkingPlaces` (
  `id` int NOT NULL COMMENT 'id конкретного места',
  `time_arrive` time DEFAULT NULL COMMENT 'Время прибытия на место',
  `date_arrive` date DEFAULT NULL COMMENT 'Дата прибытия на место',
  `client_id` int DEFAULT NULL COMMENT 'id клиента стоянки',
  `car_id` int NOT NULL COMMENT 'id тачки, которую добавили',
  `price` int NOT NULL DEFAULT '2000' COMMENT 'цена конкретного места',
  `availability` tinyint(1) DEFAULT NULL COMMENT 'доступность конкретного места'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `ParkingPlaces`
--

INSERT INTO `ParkingPlaces` (`id`, `time_arrive`, `date_arrive`, `client_id`, `car_id`, `price`, `availability`) VALUES
(1, '20:20:00', '2001-12-20', 9, 8, 2000, 0),
(2, NULL, NULL, NULL, 0, 2000, NULL),
(3, NULL, NULL, NULL, 0, 2000, NULL),
(4, NULL, NULL, NULL, 0, 2000, NULL),
(5, NULL, NULL, NULL, 0, 2000, NULL),
(6, NULL, NULL, NULL, 0, 2000, NULL),
(7, NULL, NULL, NULL, 0, 2000, NULL);

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID тачки', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `ParkingPlaces`
--
ALTER TABLE `ParkingPlaces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id конкретного места', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
