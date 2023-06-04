-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 02:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE `recepies` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ingredients`)),
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `name`, `description`, `img_url`, `ingredients`, `category`) VALUES
(1, 'Salad', 'Salad is a versatile and refreshing dish that typically consists of a mixture of raw or cooked vegetables, fruits, herbs, and often includes a dressing or vinaigrette. It is a popular and healthy choi', './assets/images/salad.jpg', '[\"lettuce\", \"tomatoes\", \"cucumbers\", \"carrots\", \"bell peppers\", \"onions\", \"berries\"]\r\n', 'Appetizer Salad'),
(2, 'Pizza', 'Pizza is a beloved and iconic dish that has gained worldwide popularity. It typically consists of a round, flat bread base topped with a variety of ingredients, including tomato sauce, cheese, and var', './assets/images/pizza.jpg', '[\"dough\", \"tomato sauce\", \"cheese\", \"pepperoni\", \"mushrooms\", \"onions\"]', 'Fast Food'),
(3, 'Cake', 'Cake is a beloved dessert that is enjoyed worldwide for its delightful taste, texture, and celebratory nature. It is a baked sweet treat that comes in various shapes, sizes, and flavors. ', './assets/images/cake.jpg', '[\"flour\", \"sugar\", \"eggs\", \"butter\", \"milk\", \"vanilla extract\"]', 'Sweet'),
(4, 'Kebab', 'Cake is a beloved dessert that is enjoyed worldwide for its delightful taste, texture, and celebratory nature. It is a baked sweet treat that comes in various shapes, sizes, and flavors. ', './assets/images/kebab.jpg', '[\"pita bread\", \"grilled meat\", \"vegetables\", \"tzatziki sauce\"]', 'Street Food'),
(5, 'Burger', 'A burger is a popular sandwich made with a grilled or fried patty of ground meat (usually beef) served between two buns, often accompanied by cheese, lettuce, tomato, onions, and various condiments, o', './assets/images/Burger.jpg', '[\"chicken\", \"bun\", \"ketchup\", \"salad\", \"mayonnaise\"]', 'Fast Food'),
(6, 'Boiled Eggs', 'Boiled eggs are a simple and versatile food made by cooking eggs in boiling water until the whites are set and the yolks reach the desired consistency. ', './assets/images/BoiledEggs.jpg', '[\"eggs\", \"salad\"]', 'Breakfast'),
(7, 'Starter Fruits', 'Fruits are the naturally occurring edible products of plants, characterized by their vibrant colors, various flavors, and nutritional benefits. ', './assets/images/Fruits.jpg', '[\"carrots\", \"apple\", \"berry\"]', 'Fruits');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recepies`
--
ALTER TABLE `recepies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recepies`
--
ALTER TABLE `recepies`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
