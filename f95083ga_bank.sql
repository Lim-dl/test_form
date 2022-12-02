-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2022 г., 20:15
-- Версия сервера: 5.6.51
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f95083ga_bank`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bank_services`
--

CREATE TABLE `bank_services` (
  `№ услуги` int(11) NOT NULL,
  `Имя услуги` varchar(50) DEFAULT NULL,
  `Ставка (%)` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bank_services`
--

INSERT INTO `bank_services` (`№ услуги`, `Имя услуги`, `Ставка (%)`) VALUES
(1, 'Кредит', 15),
(2, 'Вклад', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `№ клиента` int(10) NOT NULL,
  `Фамилия` varchar(30) NOT NULL,
  `Имя` varchar(30) NOT NULL,
  `Отчество` varchar(30) NOT NULL DEFAULT '-',
  `ИНН персональный` varchar(12) NOT NULL,
  `Дата рождения` date NOT NULL,
  `Серия и номер паспорта` varchar(10) NOT NULL DEFAULT '-',
  `Дата выдачи паспорта` date NOT NULL,
  `Имя организации` text,
  `Адрес организации` text,
  `ОГРН` varchar(13) NOT NULL DEFAULT '-',
  `ИНН организации` varchar(10) NOT NULL DEFAULT '-',
  `КПП организации` varchar(9) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `request_services`
--

CREATE TABLE `request_services` (
  `№ договора` int(11) NOT NULL,
  `№ клиента` int(11) NOT NULL,
  `№ услуги` int(11) NOT NULL,
  `Дата открытия` date NOT NULL,
  `Дата закрытия` date NOT NULL,
  `Срок (месяц)` int(11) DEFAULT NULL,
  `Сумма` int(10) DEFAULT NULL,
  `График платежей` text,
  `Периодичность капитализации` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bank_services`
--
ALTER TABLE `bank_services`
  ADD PRIMARY KEY (`№ услуги`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`№ клиента`);

--
-- Индексы таблицы `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`№ договора`),
  ADD KEY `№ клиента` (`№ клиента`),
  ADD KEY `№ услуги` (`№ услуги`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bank_services`
--
ALTER TABLE `bank_services`
  MODIFY `№ услуги` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `№ клиента` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `request_services`
--
ALTER TABLE `request_services`
  MODIFY `№ договора` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `request_services`
--
ALTER TABLE `request_services`
  ADD CONSTRAINT `request_services_ibfk_3` FOREIGN KEY (`№ услуги`) REFERENCES `bank_services` (`№ услуги`),
  ADD CONSTRAINT `request_services_ibfk_4` FOREIGN KEY (`№ клиента`) REFERENCES `clients` (`№ клиента`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
