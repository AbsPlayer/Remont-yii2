-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2017 г., 14:07
-- Версия сервера: 5.5.48
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `remont`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `CategorySmallImage` varchar(200) DEFAULT NULL,
  `CategoryInfo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`CategoryID`, `CategoryName`, `CategorySmallImage`, `CategoryInfo`) VALUES
(1, 'Кровля', '../images/small/krovlya.jpg', 'Кровля'),
(2, 'Электротовары', '../images/small/electro.jpg', 'Электротовары'),
(3, 'Плитка', '../images/small/kerampl.jpg', 'Плитка'),
(4, 'ЛКМ', '../images/small/lkm.jpg', 'Лако-красочные материалы'),
(5, 'ССС', '../images/small/sss.jpg', 'Сухие строительные смеси'),
(7, 'Сантехника', '../images/small/santeh.jpg', 'Сантехника'),
(8, 'Напольные покрытия', '../images/small/pol.jpg', 'Напольные покрытия'),
(9, 'ПК', '../images/small/pc.jpg', 'ПК, Ноутбуки, комплектующие'),
(10, 'Мебель', '../images/small/mebel.jpg', 'Допинфо - мебель'),
(11, 'Канцтовары', '../images/small/kanc.jpg', 'Допинфо');

-- --------------------------------------------------------

--
-- Структура таблицы `Grups`
--

CREATE TABLE IF NOT EXISTS `Grups` (
  `GrupID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `GrupName` varchar(50) DEFAULT NULL,
  `GrupBigImage` varchar(200) DEFAULT NULL,
  `GrupSmallImage` varchar(200) DEFAULT NULL,
  `GrupInfo` varchar(200) DEFAULT NULL,
  `GrupMarga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Grups`
--

INSERT INTO `Grups` (`GrupID`, `CategoryID`, `GrupName`, `GrupBigImage`, `GrupSmallImage`, `GrupInfo`, `GrupMarga`) VALUES
(1, 1, 'Профнастил', '../images/big/profnastil.jpg', '../images/small/profnastil.jpg', 'Профнастил стеновой и кровельный, оцинкованный и крашенный, коньки', '0.23'),
(2, 1, 'Металлочерепица', '../images/big/metallocher.jpg', '../images/small/metallocher.jpg', 'Металлочерепица Monteray', '0.23'),
(3, 1, 'Еврокровля', '../images/big/eurokrovlya.jpg', '../images/small/eurokrovlya.jpg', 'Ондулин, битумная черепица, пластиковый шифер', '0.15'),
(4, 2, 'Лампы накаливания', NULL, NULL, 'Лампы ЛОН, галогенные', NULL),
(5, 2, 'Лампы LED', NULL, NULL, 'Лампы LED (светодиодные)', NULL),
(6, 2, 'Лампы люм', NULL, NULL, 'Лампы люминесцентные', NULL),
(7, 3, 'Грес', NULL, NULL, 'Плитка керамическая грес', NULL),
(8, 5, 'Цемент', NULL, NULL, 'Допинфо - Цемент', NULL),
(9, 4, 'Акриловая краска', NULL, NULL, 'Допинфо - Акриловая краска', NULL),
(10, 4, 'Алкидная краска', NULL, NULL, 'Допинфо - Алкидная краска', NULL),
(11, 9, 'Ноутбуки', NULL, NULL, 'Допинфо - ноутбуки, нетбуки', NULL),
(12, 10, 'Столы', NULL, NULL, 'Допинфо - столы', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `GrupsToCategories`
--

CREATE TABLE IF NOT EXISTS `GrupsToCategories` (
  `CategoryID` int(11) DEFAULT NULL,
  `GrupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `PermissionID` int(11) NOT NULL,
  `PermissionName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Permissions`
--

INSERT INTO `Permissions` (`PermissionID`, `PermissionName`) VALUES
(1, 'Admin'),
(2, 'Buyer'),
(3, 'Seller'),
(4, 'User');

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `ProductID` int(11) NOT NULL,
  `GrupID` int(11) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `ProductPrice` decimal(10,2) DEFAULT NULL,
  `ProductMarga` decimal(10,2) NOT NULL,
  `ProductInfo` varchar(255) DEFAULT NULL,
  `ProductBigImage` varchar(200) DEFAULT NULL,
  `ProductSmallImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`ProductID`, `GrupID`, `UnitID`, `ProductName`, `ProductPrice`, `ProductMarga`, `ProductInfo`, `ProductBigImage`, `ProductSmallImage`) VALUES
(1, 1, 2, 'ПС-8 Zn 0,45', '35.00', '0.10', 'Благодаря не большой высоте волны профнастила ПС-8 обеспечивается большая полезная ширина листа. Применяется при обшивке фасадов и внутренних поверхностей помещений.', '../images/big/ps_8.jpg', '../images/small/ps_8.jpg'),
(2, 1, 2, 'ПС-8 Zn 0,50', '39.00', '0.10', 'Благодаря не большой высоте волны профнастила ПС-8 обеспечивается большая полезная ширина листа. Применяется при обшивке фасадов и внутренних поверхностей помещений.', '../images/big/ps_8.jpg', '../images/small/ps_8.jpg'),
(3, 1, 2, 'ПС-8 Pe', '53.00', '0.12', 'Благодаря не большой высоте волны профнастила ПС-8 обеспечивается большая полезная ширина листа. Применяется при обшивке фасадов и внутренних поверхностей помещений.', '../images/big/ps_8.jpg', '../images/small/ps_8.jpg'),
(4, 1, 2, 'ПС-20 Zn 0,45', '36.00', '0.18', 'Профнастил ПП-20, ПС-20 - один из наиболее популярных универсальных фасадных профнастилов с высотой профиля 18 мм. Используется для ограждений и облицовки. Это наиболее экономичное покрытие для стен и потолков на объектах большой площади в промышленном и ', '../images/big/ps_20.jpg', '../images/small/ps_20.jpg'),
(5, 1, 2, 'ПС-20 Zn 0,50', '41.50', '0.20', 'Профнастил ПП-20, ПС-20 - один из наиболее популярных универсальных фасадных профнастилов с высотой профиля 18 мм. Используется для ограждений и облицовки. Это наиболее экономичное покрытие для стен и потолков на объектах большой площади в промышленном и ', '../images/big/ps_20.jpg', '../images/small/ps_20.jpg'),
(6, 1, 2, 'ПС-20 Pe', '56.00', '0.25', 'Профнастил ПП-20, ПС-20 - один из наиболее популярных универсальных фасадных профнастилов с высотой профиля 18 мм. Используется для ограждений и облицовки. Это наиболее экономичное покрытие для стен и потолков на объектах большой площади в промышленном и ', '../images/big/ps_20.jpg', '../images/small/ps_20.jpg'),
(7, 2, 2, 'Картина', '132.00', '0.21', 'Допинфо - Аисты', '../images/big/10373779_1541646792729619_3962746840786226768_n.jpg', '../images/small/10373779_1541646792729619_3962746840786226768_n.jpg'),
(8, 4, 3, 'Лампа ЛОН60', '2.00', '0.25', 'Лампа ЛОН 60Вт', '../images/big/IMG_20150224_201141.jpg', '../images/small/IMG_20150224_201141.jpg'),
(9, 7, 2, 'Грес Керама', '25.00', '0.22', 'Грес', '../images/big/pics-047.jpg', '../images/small/pics-047.jpg'),
(11, 1, 24, 'Шифер', '60.00', '0.16', 'Допинфо - шифер', '../images/big/IMG_20150823_102340.jpg', '../images/small/IMG_20150823_102340.jpg'),
(12, 1, 24, 'Шифер пром', '120.00', '0.20', 'Допинфо - шифер промышленнный', '../images/big/1240187178_radiolamp.jpg', '../images/small/1240187178_radiolamp.jpg'),
(13, 4, 3, 'Лампа ЛОН100', '2.00', '0.20', 'Лампа накаливания 100Вт', '../images/big/IMG_20150823_102148.jpg', '../images/small/IMG_20150823_102148.jpg'),
(14, 11, 3, 'Sony Vaio', '1234.00', '0.10', 'Sony Vaio 15&quot;', '../images/big/LG17.jpg', '../images/small/LG17.jpg'),
(15, 11, 3, 'Fujitsu-Siemens 11"', '2000.00', '0.10', 'Fujitsu-Siemens 11" 2Gb', '../images/big/Телевизор ВЛ-100 (3).jpg', '../images/small/Телевизор ВЛ-100 (3).jpg'),
(16, 7, 2, 'Грес Tozzi', '100.00', '0.18', 'Грес Tozzi', '../images/big/IMG_20150823_102133.jpg', '../images/small/IMG_20150823_102133.jpg'),
(17, 12, 3, 'Стол дубовый', '154.00', '0.15', 'Стол дубовый 1000х1000', '../images/big/IMG666.jpg', '../images/small/IMG666.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Units`
--

CREATE TABLE IF NOT EXISTS `Units` (
  `UnitID` int(11) NOT NULL,
  `UnitName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Units`
--

INSERT INTO `Units` (`UnitID`, `UnitName`) VALUES
(1, 'м'),
(2, 'кв.м'),
(3, 'шт.'),
(4, 'рул.'),
(5, 'уп.'),
(8, 'л'),
(20, 'кг'),
(21, 'мл'),
(22, 'мешок'),
(23, 'км'),
(24, 'лист'),
(25, 'банка'),
(26, '1000шт.'),
(27, '100шт.');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` int(11) NOT NULL,
  `PermissionID` int(11) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`UserID`, `PermissionID`, `UserName`, `UserPassword`, `auth_key`) VALUES
(1, 1, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL),
(2, 2, 'buyer', '950d7fa6b1a6f7dccdba2bf4dd53063f71de2df1', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Индексы таблицы `Grups`
--
ALTER TABLE `Grups`
  ADD PRIMARY KEY (`GrupID`);

--
-- Индексы таблицы `GrupsToCategories`
--
ALTER TABLE `GrupsToCategories`
  ADD KEY `CategoryID` (`CategoryID`,`GrupID`),
  ADD KEY `GrupID` (`GrupID`);

--
-- Индексы таблицы `Permissions`
--
ALTER TABLE `Permissions`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `GrupID` (`GrupID`),
  ADD KEY `UnitID` (`UnitID`);

--
-- Индексы таблицы `Units`
--
ALTER TABLE `Units`
  ADD PRIMARY KEY (`UnitID`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `PermissionID` (`PermissionID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `Grups`
--
ALTER TABLE `Grups`
  MODIFY `GrupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `Permissions`
--
ALTER TABLE `Permissions`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `Units`
--
ALTER TABLE `Units`
  MODIFY `UnitID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `GrupsToCategories`
--
ALTER TABLE `GrupsToCategories`
  ADD CONSTRAINT `grupstocategories_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`),
  ADD CONSTRAINT `grupstocategories_ibfk_2` FOREIGN KEY (`GrupID`) REFERENCES `Grups` (`GrupID`);

--
-- Ограничения внешнего ключа таблицы `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`GrupID`) REFERENCES `Grups` (`GrupID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`UnitID`) REFERENCES `Units` (`UnitID`);

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`PermissionID`) REFERENCES `Permissions` (`PermissionID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
