-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 01:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `user_id`, `category_name`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 2, 'Starters', 1, '2024-06-19 12:44:59', '2024-06-19 12:55:14'),
(2, 2, 'PANINIS & SANDWICHES', 1, '2024-06-19 12:45:12', '0000-00-00 00:00:00'),
(3, 2, 'BURGERS', 1, '2024-06-19 12:45:22', '0000-00-00 00:00:00'),
(4, 2, 'CRISPY FRIED CHICKEN', 1, '2024-06-19 12:45:32', '0000-00-00 00:00:00'),
(5, 2, 'CRISPY FRIED CHICKEN MEAL', 1, '2024-06-19 12:45:47', '0000-00-00 00:00:00'),
(6, 2, 'SHAWARMA', 1, '2024-06-19 12:55:31', '0000-00-00 00:00:00'),
(7, 2, 'PIZZA', 1, '2024-06-19 12:55:43', '0000-00-00 00:00:00'),
(8, 2, 'DESSERTS', 1, '2024-06-19 12:55:55', '0000-00-00 00:00:00'),
(9, 2, 'ICE CREAM', 1, '2024-06-19 12:56:12', '0000-00-00 00:00:00'),
(10, 2, 'BREAD', 1, '2024-06-19 12:56:21', '0000-00-00 00:00:00'),
(11, 2, 'CAKE', 1, '2024-06-19 12:56:33', '0000-00-00 00:00:00'),
(12, 2, 'MOCKTAIL', 1, '2024-06-19 12:57:03', '0000-00-00 00:00:00'),
(13, 2, 'COFFEE', 1, '2024-06-19 12:57:15', '0000-00-00 00:00:00'),
(14, 2, 'TEA', 1, '2024-06-19 12:57:36', '0000-00-00 00:00:00'),
(15, 2, 'FRAPPE', 1, '2024-06-19 12:57:49', '0000-00-00 00:00:00'),
(16, 2, 'SMOOTHIE', 1, '2024-06-19 12:57:59', '0000-00-00 00:00:00'),
(17, 2, 'LOCAL FAVOURITES', 1, '2024-06-19 12:58:15', '0000-00-00 00:00:00'),
(18, 2, 'FRESH JUICE', 1, '2024-06-19 12:58:25', '0000-00-00 00:00:00'),
(19, 2, 'SOFT DRINKS', 1, '2024-06-19 12:58:36', '0000-00-00 00:00:00'),
(20, 2, 'MINERAL WATER', 1, '2024-06-19 12:58:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `user_id`, `item_name`, `item_price`, `short_desc`, `cat_id`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 2, 'Sliders duo', '265', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:23:23', '0000-00-00 00:00:00'),
(2, 2, 'Chicken Wings BBQ or Spicy', '280', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:23:54', '0000-00-00 00:00:00'),
(3, 2, 'Chilly Cheese Fries', '220', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:24:29', '0000-00-00 00:00:00'),
(4, 2, 'Poutine', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:24:53', '0000-00-00 00:00:00'),
(5, 2, 'Puff-Chicken/Beef', '85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:25:19', '0000-00-00 00:00:00'),
(6, 2, 'Hot Dog Chicken/Beef', '100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:25:37', '0000-00-00 00:00:00'),
(7, 2, 'Chicken Patties', '85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:26:04', '0000-00-00 00:00:00'),
(8, 2, 'French Fries Regular', '100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:26:39', '0000-00-00 00:00:00'),
(9, 2, 'French Fries Large', '150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:27:08', '0000-00-00 00:00:00'),
(10, 2, 'Potato Wedges', '150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-06-19 13:27:28', '0000-00-00 00:00:00'),
(11, 2, 'Egg. Tomato & Cheese Panini', '180', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 1, '2024-06-19 13:29:29', '0000-00-00 00:00:00'),
(12, 2, 'Roast Beef & Cheese Panini', '250', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 1, '2024-06-19 13:30:12', '0000-00-00 00:00:00'),
(13, 2, 'Chicken & Cheese Panini', '200', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 1, '2024-06-19 13:30:37', '0000-00-00 00:00:00'),
(14, 2, 'Club Sandwich', '155', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 1, '2024-06-19 13:30:51', '0000-00-00 00:00:00'),
(15, 2, 'Classic Beef Burger (R/C)', '210/265', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:32:03', '0000-00-00 00:00:00'),
(16, 2, 'Beef Bacon Burger (R/C)', '270/325', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:32:50', '0000-00-00 00:00:00'),
(17, 2, 'Crispy Chicken Burger (r/c)', '195/250', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:33:32', '0000-00-00 00:00:00'),
(18, 2, 'Juicy Chicken Burger (r/c)', '185/240', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:33:57', '0000-00-00 00:00:00'),
(19, 2, 'Chicken Burger (r/c)', '150/230', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:34:31', '0000-00-00 00:00:00'),
(20, 2, 'Extra Cheese', '35', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2024-06-19 13:34:53', '0000-00-00 00:00:00'),
(21, 2, 'Chicken (2p)', '190', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 1, '2024-06-19 13:36:40', '2024-06-19 13:39:26'),
(22, 2, 'Chicken Tender Strips (4p)', '200', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 1, '2024-06-19 13:37:45', '2024-06-19 13:38:12'),
(23, 2, 'Chicken Tender Strips (8p)', '390', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 1, '2024-06-19 13:38:31', '0000-00-00 00:00:00'),
(24, 2, 'Chicken (4p)', '390', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 1, '2024-06-19 13:39:46', '0000-00-00 00:00:00'),
(25, 2, 'Chicken (8p)', '760', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 1, '2024-06-19 13:40:07', '0000-00-00 00:00:00'),
(26, 2, 'Meal for One', '315', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 1, '2024-06-19 13:40:53', '0000-00-00 00:00:00'),
(27, 2, 'Meal for Two', '530', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 1, '2024-06-19 13:41:12', '0000-00-00 00:00:00'),
(28, 2, 'Meal for Family', '950', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 1, '2024-06-19 13:41:36', '0000-00-00 00:00:00'),
(29, 2, 'Extra Bun (Small)', '30', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 1, '2024-06-19 13:41:54', '0000-00-00 00:00:00'),
(30, 2, 'Chicken Shawarma', '130', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 6, 1, '2024-06-19 13:43:13', '0000-00-00 00:00:00'),
(31, 2, 'Chicken Shawarma with Drinks', '150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 6, 1, '2024-06-19 13:43:33', '0000-00-00 00:00:00'),
(32, 2, 'Beef Shawarma', '130', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 6, 1, '2024-06-19 13:43:52', '0000-00-00 00:00:00'),
(33, 2, 'Beef Shawarma with Drinks', '150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 6, 1, '2024-06-19 13:44:09', '0000-00-00 00:00:00'),
(34, 2, 'BBQ Chicken Pizza', '275/450/600', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:45:11', '2024-06-19 13:45:34'),
(35, 2, 'Tandoori Chicken Pizza', '300/470/630', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:47:09', '0000-00-00 00:00:00'),
(36, 2, 'Spicy Beef Pizza', '275/450/600', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:47:39', '0000-00-00 00:00:00'),
(37, 2, 'Castle Special Pizza', '325/425/600', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:49:11', '0000-00-00 00:00:00'),
(38, 2, 'Pepperoni Pizza', '450/650/850', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:49:33', '0000-00-00 00:00:00'),
(39, 2, 'Hawaiian pizza', '300/485/650', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:49:56', '2024-06-19 13:50:33'),
(40, 2, 'Sweet Chilli Prawn Pizza', '300/485/650', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:50:24', '0000-00-00 00:00:00'),
(41, 2, 'Extra Topping', '70/100/130', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 7, 1, '2024-06-19 13:51:16', '0000-00-00 00:00:00'),
(42, 2, 'Bistro\'s Special', '150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:52:05', '0000-00-00 00:00:00'),
(43, 2, 'Chocolate cake per slice', '80', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:52:21', '0000-00-00 00:00:00'),
(44, 2, 'Vanilla cake per slice', '65', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:52:37', '0000-00-00 00:00:00'),
(45, 2, 'Black Forest cake per slice', '85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:52:57', '0000-00-00 00:00:00'),
(46, 2, 'Chocolate Mocha cake per slice', '90', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:53:15', '0000-00-00 00:00:00'),
(47, 2, 'Chocolate Ball', '65', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:53:30', '0000-00-00 00:00:00'),
(48, 2, 'Chocolate/Strawberry Muffin', '65', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 8, 1, '2024-06-19 13:53:47', '0000-00-00 00:00:00'),
(49, 2, 'Single Scoop', '50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 9, 1, '2024-06-19 13:54:23', '0000-00-00 00:00:00'),
(50, 2, 'Double Scoop', '95', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 9, 1, '2024-06-19 13:54:40', '0000-00-00 00:00:00'),
(51, 2, 'Triple Scoop', '125', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 9, 1, '2024-06-19 13:54:58', '0000-00-00 00:00:00'),
(52, 2, '1 Pound', '80', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 10, 1, '2024-06-19 13:55:31', '0000-00-00 00:00:00'),
(53, 2, '2 Pound', '145', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 10, 1, '2024-06-19 13:55:49', '0000-00-00 00:00:00'),
(54, 2, 'Plain Cake (1 Pound)', '185', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 1, '2024-06-19 13:56:13', '0000-00-00 00:00:00'),
(55, 2, 'Chocolate Plain Cake (1 Pound)', '220', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 1, '2024-06-19 13:56:33', '0000-00-00 00:00:00'),
(56, 2, 'Fruit Cake (1 Pound)', '265', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 1, '2024-06-19 13:56:59', '0000-00-00 00:00:00'),
(57, 2, 'Virgin Mojito', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:58:08', '0000-00-00 00:00:00'),
(58, 2, 'Lychee Mojito', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:58:30', '0000-00-00 00:00:00'),
(59, 2, 'Green Apple Mojito', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:58:52', '0000-00-00 00:00:00'),
(60, 2, 'Passion Fruit Mojito', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:59:12', '0000-00-00 00:00:00'),
(61, 2, 'Pina Colada', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:59:30', '0000-00-00 00:00:00'),
(62, 2, 'Peach Iced Tea/Mango Iced Tea', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, 1, '2024-06-19 13:59:48', '0000-00-00 00:00:00'),
(63, 2, 'Flat White (R/L)', '110/140', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:00:52', '0000-00-00 00:00:00'),
(64, 2, 'Cappuccino (R/L)', '110/140', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:01:18', '0000-00-00 00:00:00'),
(65, 2, 'Mocha (R/L)', '120/150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:01:49', '0000-00-00 00:00:00'),
(66, 2, 'Latte (R/L)', '110/140', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:02:16', '0000-00-00 00:00:00'),
(67, 2, 'Hot Chocolate (R/L)', '120/150', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:02:50', '2024-06-19 14:03:40'),
(68, 2, 'Extra Coffee Flavour', '50/80', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, 1, '2024-06-19 14:03:15', '0000-00-00 00:00:00'),
(69, 2, 'Black Tea', '35', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 14, 1, '2024-06-19 14:04:44', '0000-00-00 00:00:00'),
(70, 2, 'Tea with Milk/Cream', '55', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 14, 1, '2024-06-19 14:05:03', '0000-00-00 00:00:00'),
(71, 2, 'Green Tea/Ginger/ Tulsi', '55', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 14, 1, '2024-06-19 14:05:21', '0000-00-00 00:00:00'),
(72, 2, 'Iced Chocolate', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 15, 1, '2024-06-19 14:06:42', '0000-00-00 00:00:00'),
(73, 2, 'Iced Mocha', '195', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 15, 1, '2024-06-19 14:06:57', '0000-00-00 00:00:00'),
(74, 2, 'Double Frost Mocha', '215', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 15, 1, '2024-06-19 14:07:22', '0000-00-00 00:00:00'),
(75, 2, 'Strawberry/Chocolate', '185', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 16, 1, '2024-06-19 14:08:00', '0000-00-00 00:00:00'),
(76, 2, 'Faluda', '125', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 17, 1, '2024-06-19 14:08:20', '0000-00-00 00:00:00'),
(77, 2, 'Lassi', '115', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 17, 1, '2024-06-19 14:08:36', '0000-00-00 00:00:00'),
(78, 2, '070 Mango/Orange/ Papaya/ Pineapple', '190', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 18, 1, '2024-06-19 14:08:59', '0000-00-00 00:00:00'),
(79, 2, 'Regular Soft Drinks', '30/50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 19, 1, '2024-06-19 14:09:36', '2024-06-19 14:10:49'),
(80, 2, 'Imported Soft Drinks', '165', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 19, 1, '2024-06-19 14:10:02', '0000-00-00 00:00:00'),
(81, 2, 'Energy Drinks (Red Bull)', '220', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 19, 1, '2024-06-19 14:10:18', '0000-00-00 00:00:00'),
(82, 2, '500ml', '25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 20, 1, '2024-06-19 14:11:15', '0000-00-00 00:00:00'),
(83, 2, '1 Ltr', '40', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 20, 1, '2024-06-19 14:11:32', '0000-00-00 00:00:00'),
(84, 2, '1.5 Ltr', '50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 20, 1, '2024-06-19 14:11:49', '0000-00-00 00:00:00'),
(85, 2, '2 Ltr', '65', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 20, 1, '2024-06-19 14:12:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Khulna', 1, '2025-05-05 15:04:56', '2025-05-05 15:22:05'),
(2, 'Dhaka', 1, '2025-05-05 15:22:50', '0000-00-00 00:00:00'),
(3, 'Chittagong', 1, '2025-05-05 15:23:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_contact`
--

CREATE TABLE `restaurant_contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `contact_number_one` varchar(255) NOT NULL,
  `contact_number_two` varchar(255) NOT NULL,
  `email_one` varchar(255) NOT NULL,
  `email_two` varchar(255) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `insta` varchar(500) NOT NULL,
  `youtube` varchar(500) NOT NULL,
  `website` varchar(500) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_contact`
--

INSERT INTO `restaurant_contact` (`contact_id`, `user_id`, `address`, `contact_number_one`, `contact_number_two`, `email_one`, `email_two`, `facebook`, `insta`, `youtube`, `website`, `inserted_at`, `updated_at`) VALUES
(1, 2, '16 KDA Avenue Moylapota Khulna 9100', '01729277765', '01729277768', 'contact@frogbid.com', 'support@frogbid.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://www.frogbid.com/', '2024-06-16 12:12:19', '2024-06-16 13:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `admin_name`, `restaurant_name`, `location`, `registration_date`, `admin_email`, `admin_password`, `contact_number`, `whatsapp`, `note`, `status`, `availability`, `type`, `inserted_at`, `updated_at`) VALUES
(1, 'Superadmin', 'N/A', 0, '2024-06-15', 'super_admin@foodmenu.com', '$2y$10$hzXI6/aUjDsAiReIzS2DIuD0Hm1FOMn1R4Iuj/SJ2J1b.hBj9tJ8i', '', '', '', 1, 1, 0, '2024-06-15 12:49:27', '0000-00-00 00:00:00'),
(2, 'Test Restaurant Owner', 'Test Restaurant', 1, '2024-06-15', 'owner1@foodmenu.com', '$2y$10$wgE4Ev.qmaDYYLh2MNk9p.NdgncNhunTnnR0CryKcw7VoXjmGScee', '01729277765', '01729277765', '(5% Service Charge for Room Service) ALL PRICE ARE IN BDT', 1, 1, 1, '2024-06-15 12:50:36', '2024-06-19 14:15:13'),
(3, 'Restaurant 2', 'Test Restaurant 2', 1, '2025-05-05', 'test2@restaurant.com', '$2y$10$x5MfLQFJ2.61sUOi7KJ2g.08.rjyxXZlLwwLcZ/IaMk015DbDGfzq', '01729277768', '', '', 1, 1, 1, '2025-05-05 15:37:19', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `restaurant_contact`
--
ALTER TABLE `restaurant_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant_contact`
--
ALTER TABLE `restaurant_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
