-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2018 г., 15:10
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `healthy_food`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_surname` varchar(255) NOT NULL,
  `customer_phone` int(50) NOT NULL,
  `total_order_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_surname`, `customer_phone`, `total_order_price`) VALUES
(4, 'qwe', 'wre', 3241, 173),
(23, 'sveta', 'kas', 2, 65);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_price` decimal(50,0) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_price`, `item_name`, `quantity`) VALUES
(1, 0, '0', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders/products`
--

CREATE TABLE `orders/products` (
  `order_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders/products`
--

INSERT INTO `orders/products` (`order_product_id`, `product_id`, `order_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(20,0) NOT NULL,
  `products_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `products_in_stock`) VALUES
(3, 'mushroom', 'veg', '\\img\\mushr.png', '50', 5),
(4, 'tomato', 'veg', '\\img\\tomato.jpg', '45', 5),
(5, 'avocado', 'fruit', '\\img\\avocado.png', '32', 30),
(6, 'mango', 'fruit', '\\img\\mango.jpg', '76', 21),
(7, 'coconut', 'fruit', '\\img\\coconut.jpg', '43', 1),
(8, 'onion', 'veg', '\\img\\onion.png', '45', 3),
(9, 'cherry', 'berry', '\\img\\cherry.png', '12', 32),
(10, 'raspberry', 'berry', '\\img\\raspberry.png', '65', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Индексы таблицы `orders/products`
--
ALTER TABLE `orders/products`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders/products`
--
ALTER TABLE `orders/products`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
