-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2019 г., 06:58
-- Версия сервера: 5.6.43
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
-- База данных: `zoo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `name`, `type_id`, `age`, `sex`) VALUES
(1, 'Антоша', 2, 3, 0),
(2, 'Вася', 2, 1, 0),
(3, 'Валентина', 3, 8, 1),
(4, 'Лев', 4, 5, 0),
(5, 'Витя', 3, 2, 0),
(6, 'Виктория', 6, 3, 1),
(8, 'Гоша', 3, 5, 0),
(9, 'Мария Ивановна', 3, 9, 1),
(10, 'Катенька', 4, 3, 1),
(11, 'Бульба', 2, 54, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `animals_type`
--

CREATE TABLE `animals_type` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals_type`
--

INSERT INTO `animals_type` (`id_type`, `name_type`) VALUES
(2, 'Мыши'),
(3, 'Обезьяны'),
(4, 'Кошки'),
(5, 'Птицы'),
(6, 'Слоны');

-- --------------------------------------------------------

--
-- Структура таблицы `bileti`
--

CREATE TABLE `bileti` (
  `id_bileti` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `sotrudnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bileti`
--

INSERT INTO `bileti` (`id_bileti`, `time`, `sotrudnik_id`) VALUES
(1, '2019-06-22 13:09:00', 1),
(2, '2019-06-21 00:00:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `korm`
--

CREATE TABLE `korm` (
  `id_korm` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `name_korm` varchar(255) NOT NULL,
  `size` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `korm`
--

INSERT INTO `korm` (`id_korm`, `animal_id`, `name_korm`, `size`) VALUES
(1, 1, 'Грязь', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudniki`
--

CREATE TABLE `sotrudniki` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_start` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrudniki`
--

INSERT INTO `sotrudniki` (`id`, `name`, `date_start`, `type`) VALUES
(1, 'Алена Каналькина', '2019-05-15', 1),
(2, 'Викуся Ефрекова', '2019-03-05', 1),
(3, 'Илюша Резипов', '2016-01-19', 2),
(4, 'Антон Караличкин', '2019-06-02', 3),
(5, 'Даниил Васкаков', '2019-06-01', 4),
(6, 'Валера Жмышенко', '2018-11-14', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudnik_type`
--

CREATE TABLE `sotrudnik_type` (
  `id_s` int(11) NOT NULL,
  `name_s` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrudnik_type`
--

INSERT INTO `sotrudnik_type` (`id_s`, `name_s`) VALUES
(1, 'Кассир'),
(2, 'Уборщик'),
(3, 'Кормитель'),
(4, 'Администратор'),
(5, 'Директор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `animals_type`
--
ALTER TABLE `animals_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `bileti`
--
ALTER TABLE `bileti`
  ADD PRIMARY KEY (`id_bileti`),
  ADD KEY `sotrudnik_id` (`sotrudnik_id`);

--
-- Индексы таблицы `korm`
--
ALTER TABLE `korm`
  ADD PRIMARY KEY (`id_korm`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Индексы таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `sotrudnik_type`
--
ALTER TABLE `sotrudnik_type`
  ADD PRIMARY KEY (`id_s`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `animals_type`
--
ALTER TABLE `animals_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `bileti`
--
ALTER TABLE `bileti`
  MODIFY `id_bileti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `korm`
--
ALTER TABLE `korm`
  MODIFY `id_korm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `sotrudnik_type`
--
ALTER TABLE `sotrudnik_type`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `animals_type` (`id_type`);

--
-- Ограничения внешнего ключа таблицы `bileti`
--
ALTER TABLE `bileti`
  ADD CONSTRAINT `bileti_ibfk_1` FOREIGN KEY (`sotrudnik_id`) REFERENCES `sotrudniki` (`id`);

--
-- Ограничения внешнего ключа таблицы `korm`
--
ALTER TABLE `korm`
  ADD CONSTRAINT `korm_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Ограничения внешнего ключа таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  ADD CONSTRAINT `sotrudniki_ibfk_1` FOREIGN KEY (`type`) REFERENCES `sotrudnik_type` (`id_s`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
