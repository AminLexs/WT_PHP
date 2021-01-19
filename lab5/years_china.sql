-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:34678
-- Время создания: Май 11 2020 г., 12:16
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `years_china`
--

CREATE TABLE `years_china` (
  `ID` int(11) NOT NULL,
  `NameYear` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `years_china`
--

INSERT INTO `years_china` (`ID`, `NameYear`) VALUES
(0, 'Rat/Крыса'),
(1, 'Ox/Бык'),
(2, 'Tiger/Тигр'),
(3, 'Rabbit/Кролик'),
(4, 'Dragon/Дракон'),
(5, 'Snake/Змея'),
(6, 'Horse/Лошадь'),
(7, 'Ram/Коза'),
(8, 'Monkey/Обезьяна'),
(9, 'Rooster/Петух'),
(10, 'Dog/Собака'),
(11, 'Pig/Свинья');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `years_china`
--
ALTER TABLE `years_china`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `years_china`
--
ALTER TABLE `years_china`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
