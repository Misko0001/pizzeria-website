-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 06:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(10) UNSIGNED NOT NULL,
  `about_main_p` text NOT NULL,
  `about_second_p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_main_p`, `about_second_p`) VALUES
(1, 'Optio nulla vel quod est repellendus itaque fugit reprehenderit fugiat dignissimos quo alias beatae accusantium odit non, maiores perspiciatis reiciendis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci non ratione doloremque saepe delectus voluptatum iste esse eligendi? Odit voluptatibus aperiam tempore et odio iste consequatur placeat esse id neque dolorum consequuntur minima assumenda, obcaecati nam ex modi similique laborum. Cao', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, molestias qui sit tempora non, repudiandae impedit reprehenderit quos, voluptate voluptas reiciendis modi rem exercitationem nisi fuga facilis sint ipsa facere! Facilis earum mollitia, quod placeat asperiores animi, nobis perferendis itaque omnis dolorem, fugit soluta commodi quos beatae nostrum provident! Quam?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Veniam qui soluta dolorem totam atque. Suscipit veritatis laborum ut deleniti iusto dolorem similique at vero. Eos excepturi rem sequi culpa amet. LOL');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(32) NOT NULL,
  `admin_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Pasta'),
(1, 'Pica'),
(3, 'Salata');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(64) DEFAULT NULL,
  `contact_email` varchar(128) NOT NULL,
  `contact_phone` varchar(16) DEFAULT NULL,
  `contact_message` text NOT NULL,
  `contact_sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`, `contact_sent_at`) VALUES
(1, 'Milos', 'stankovicmilos100@yahoo.com', '0600754107', 'Prva poruka', '2022-04-18 14:28:58'),
(2, '', 'stankovicmilos100@yahoo.com', '', 'Poruka druga', '2022-04-18 14:29:38'),
(4, 'Milos', 'miskostankovic001@gmail.com', '0601234567', 'Poruka TEST TEST TEST', '2022-04-22 09:04:04'),
(5, '', 'stankovicmilos100@yahoo.com', '', 'Poruka', '2022-04-22 12:16:56'),
(6, '', 'stankovicmilos100@yahoo.com', '', 'Poruka', '2022-04-23 21:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(64) NOT NULL,
  `food_price` decimal(10,2) UNSIGNED NOT NULL,
  `food_img_path` varchar(256) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `food_img_path`, `category_id`) VALUES
(1, 'Napoletana', '800.00', './public/img/menu_img/pizza_napoletana.jpg', 1),
(2, 'Margarita', '720.00', './public/img/menu_img/pizza_margarita.jpg', 1),
(3, 'Capricciosa', '810.00', './public/img/menu_img/pizza_capricciosa.jpg', 1),
(4, 'Mexicana', '850.00', './public/img/menu_img/pizza_mexicana.jpg', 1),
(5, 'Grčka', '850.00', './public/img/menu_img/pizza_grcka.jpg', 1),
(6, 'Romana', '860.00', './public/img/menu_img/pizza_romana.jpg', 1),
(7, 'Cezar', '840.00', './public/img/menu_img/pizza_cezar.jpg', 1),
(8, 'Voćna', '750.00', './public/img/menu_img/pizza_vocna.jpg', 1),
(9, 'Hawai', '790.00', './public/img/menu_img/pizza_hawai.jpg', 1),
(10, 'Paragina', '850.00', './public/img/menu_img/pizza_paragina.jpg', 1),
(11, 'Vegetarijana', '590.00', './public/img/menu_img/pasta_vegetarijana.jpg', 2),
(12, 'Piletina sa spanaćem', '650.00', './public/img/menu_img/pasta_piletina_sa_spanacem.jpg', 2),
(13, 'Piletina sa karijem', '650.00', './public/img/menu_img/pasta_piletina_sa_karijem.jpg', 2),
(14, 'Milanese', '590.00', './public/img/menu_img/pasta_milanese.jpg', 2),
(15, 'Frutti di mare', '680.00', './public/img/menu_img/pasta_frutti_di_mare.jpg', 2),
(16, 'Pesto', '650.00', './public/img/menu_img/pasta_pesto.jpg', 2),
(17, 'Kupus salata', '150.00', './public/img/menu_img/salad_kupus_salata.jpg', 3),
(18, 'Krompir salata', '250.00', './public/img/menu_img/salad_krompir_salata.jpg', 3),
(20, 'Cezar salata', '550.00', './public/img/menu_img/salad_cezar_salata.jpg', 3),
(22, 'Grčka salata', '380.00', './public/img/menu_img/salad_grcka_salata.jpg', 3),
(26, 'Srpska salata', '230.00', './public/img/menu_img/salad_srpska_salata.jpg', 3),
(30, 'Lazanja', '660.00', './public/img/menu_img/pasta_lasanja.jpg', 2),
(31, 'Šopska salata', '330.00', './public/img/menu_img/salad_sopska_salata.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_user_order`
--

CREATE TABLE `food_user_order` (
  `food_user_order_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `user_order_id` int(10) UNSIGNED NOT NULL,
  `food_user_order_amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_user_order`
--

INSERT INTO `food_user_order` (`food_user_order_id`, `food_id`, `user_order_id`, `food_user_order_amount`) VALUES
(1, 1, 1, 2),
(2, 30, 1, 1),
(3, 26, 1, 3),
(4, 1, 2, 3),
(5, 3, 2, 1),
(6, 20, 2, 5),
(7, 1, 3, 3),
(8, 15, 3, 1),
(9, 30, 3, 2),
(10, 18, 3, 2),
(11, 20, 3, 2),
(12, 1, 4, 2),
(13, 11, 4, 1),
(14, 13, 4, 1),
(15, 15, 4, 1),
(16, 20, 5, 3),
(17, 22, 5, 2),
(18, 26, 5, 3),
(19, 31, 5, 3),
(20, 7, 6, 1),
(21, 11, 6, 2),
(22, 12, 6, 1),
(23, 13, 6, 2),
(24, 1, 7, 5),
(27, 18, 7, 8),
(28, 26, 7, 8),
(29, 31, 7, 8),
(30, 11, 8, 3),
(31, 17, 8, 2),
(32, 18, 8, 1),
(33, 10, 9, 1),
(34, 17, 9, 2),
(35, 20, 9, 2),
(36, 1, 10, 3),
(37, 9, 10, 1),
(38, 1, 11, 2),
(39, 3, 11, 1),
(40, 1, 12, 2),
(41, 3, 12, 1),
(42, 4, 12, 3),
(43, 1, 13, 2),
(44, 3, 13, 1),
(45, 1, 14, 1),
(46, 1, 15, 2),
(47, 3, 15, 1),
(48, 1, 16, 2),
(49, 3, 16, 1),
(50, 1, 17, 1),
(51, 1, 18, 3),
(52, 3, 18, 1),
(53, 1, 19, 3),
(54, 3, 19, 1),
(55, 1, 20, 2),
(56, 11, 20, 2),
(57, 13, 20, 1),
(58, 26, 21, 2),
(59, 31, 21, 2),
(60, 1, 22, 3),
(61, 3, 22, 2),
(62, 5, 22, 1),
(63, 1, 23, 3),
(64, 3, 23, 1),
(65, 1, 24, 2),
(66, 3, 24, 1),
(67, 10, 24, 1),
(68, 16, 25, 1),
(69, 30, 25, 2),
(70, 1, 26, 1),
(71, 3, 26, 1),
(72, 5, 26, 1),
(73, 1, 27, 2),
(74, 3, 27, 1),
(75, 30, 27, 1),
(76, 22, 27, 1),
(77, 20, 28, 1),
(78, 26, 28, 2),
(79, 3, 29, 1),
(80, 4, 29, 2),
(81, 30, 29, 1),
(89, 3, 30, 2),
(92, 3, 31, 1),
(93, 17, 32, 1),
(94, 1, 33, 2),
(95, 4, 33, 2),
(96, 7, 33, 1),
(97, 10, 33, 1),
(98, 30, 33, 2),
(99, 17, 34, 2),
(100, 6, 35, 1),
(101, 12, 36, 2),
(102, 13, 36, 1),
(103, 15, 36, 1),
(104, 26, 36, 2),
(105, 2, 37, 2),
(106, 5, 37, 2),
(107, 17, 38, 2),
(108, 18, 38, 2),
(109, 20, 38, 2),
(110, 22, 38, 2),
(111, 26, 38, 2),
(112, 31, 38, 2),
(113, 20, 39, 1),
(114, 14, 40, 3),
(115, 15, 40, 2),
(116, 16, 40, 3),
(117, 30, 40, 2),
(118, 18, 41, 1),
(119, 5, 42, 1),
(120, 8, 42, 1),
(121, 16, 43, 1),
(122, 17, 43, 1),
(123, 3, 44, 1),
(124, 7, 44, 1),
(125, 8, 44, 1),
(126, 9, 44, 1),
(127, 10, 44, 1),
(128, 12, 45, 1),
(129, 13, 45, 1),
(130, 14, 45, 1),
(131, 15, 45, 1),
(132, 16, 45, 1),
(133, 13, 46, 1),
(134, 18, 46, 1),
(135, 20, 46, 2),
(136, 20, 47, 1),
(137, 12, 48, 2),
(138, 14, 48, 2),
(139, 15, 48, 2),
(140, 16, 48, 2),
(141, 1, 49, 1),
(142, 2, 49, 1),
(143, 3, 49, 1),
(144, 4, 49, 1),
(145, 8, 49, 1),
(146, 10, 49, 1),
(147, 17, 50, 1),
(148, 18, 50, 1),
(149, 20, 50, 1),
(150, 22, 50, 1),
(151, 26, 50, 1),
(152, 31, 50, 1),
(153, 3, 51, 2),
(154, 17, 51, 1),
(155, 20, 51, 1),
(156, 26, 51, 1),
(157, 31, 51, 1),
(158, 2, 52, 1),
(159, 4, 52, 1),
(160, 6, 52, 1),
(161, 8, 52, 1),
(162, 10, 52, 1),
(163, 12, 52, 2),
(164, 14, 52, 2),
(165, 16, 52, 2),
(166, 1, 53, 2),
(167, 2, 53, 1),
(168, 3, 53, 1),
(169, 4, 53, 2),
(170, 6, 54, 2),
(171, 8, 54, 2),
(172, 10, 54, 2),
(173, 17, 55, 2),
(174, 18, 55, 3),
(175, 20, 55, 3),
(176, 22, 55, 1),
(177, 26, 55, 1),
(178, 31, 55, 1),
(179, 14, 56, 1),
(180, 15, 56, 2),
(181, 16, 56, 1),
(182, 30, 56, 2),
(183, 2, 57, 1),
(184, 4, 57, 1),
(185, 6, 57, 1),
(186, 8, 57, 1),
(187, 10, 57, 1),
(188, 6, 58, 2),
(189, 10, 58, 2),
(190, 11, 58, 2),
(191, 13, 58, 2),
(192, 7, 59, 2),
(193, 9, 59, 1),
(194, 4, 60, 1),
(195, 5, 60, 2),
(196, 6, 60, 1),
(197, 10, 60, 3),
(198, 17, 61, 2),
(199, 20, 61, 1),
(200, 26, 61, 3),
(201, 31, 61, 3),
(202, 12, 62, 1),
(203, 26, 62, 1),
(204, 1, 63, 1),
(205, 2, 63, 1),
(206, 3, 63, 1),
(207, 4, 63, 1),
(208, 5, 63, 1),
(209, 6, 63, 1),
(210, 7, 63, 1),
(211, 8, 63, 1),
(212, 9, 63, 1),
(213, 10, 63, 1),
(214, 17, 64, 2),
(215, 18, 64, 1),
(216, 20, 64, 1),
(217, 22, 64, 1),
(218, 26, 64, 1),
(219, 31, 64, 2),
(220, 1, 65, 1),
(221, 13, 65, 1),
(222, 16, 65, 1),
(223, 17, 65, 2),
(224, 1, 66, 1),
(225, 10, 66, 1),
(226, 15, 67, 2),
(227, 9, 68, 1),
(228, 17, 68, 1),
(229, 20, 68, 1),
(230, 26, 68, 1),
(231, 8, 69, 1),
(232, 7, 70, 1),
(233, 11, 70, 2),
(234, 12, 70, 1),
(235, 13, 70, 2),
(236, 14, 70, 1),
(237, 30, 70, 3),
(238, 31, 70, 2),
(239, 1, 71, 1),
(240, 2, 71, 1),
(241, 3, 71, 1),
(242, 4, 71, 1),
(243, 5, 71, 1),
(244, 6, 71, 1),
(245, 7, 71, 1),
(246, 8, 71, 1),
(247, 9, 71, 1),
(248, 10, 71, 1),
(249, 30, 72, 1),
(250, 17, 72, 2),
(251, 20, 72, 1),
(252, 31, 72, 3),
(253, 5, 73, 6),
(254, 6, 73, 6),
(255, 30, 74, 3),
(256, 18, 74, 1),
(257, 22, 74, 1),
(258, 31, 74, 1),
(259, 1, 75, 2),
(260, 3, 75, 1),
(261, 30, 75, 4),
(262, 17, 75, 3),
(263, 20, 75, 1),
(264, 22, 75, 1),
(265, 26, 75, 2),
(266, 31, 75, 1),
(267, 17, 76, 2),
(268, 18, 76, 2),
(269, 20, 76, 2),
(270, 22, 76, 2),
(271, 26, 76, 2),
(272, 31, 76, 2),
(273, 5, 77, 1),
(274, 7, 77, 1),
(275, 15, 77, 3),
(276, 30, 77, 3),
(277, 4, 78, 1),
(278, 6, 78, 1),
(279, 8, 78, 1),
(280, 10, 78, 1),
(281, 12, 78, 1),
(282, 14, 78, 1),
(283, 16, 78, 1),
(284, 18, 78, 1),
(285, 22, 78, 1),
(286, 31, 78, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_phone` varchar(16) NOT NULL,
  `user_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_address`) VALUES
(1, 'Milos', 'sifra', 'stankovicmilos100@yahoo.com', '0600754107', 'Adresa 100'),
(2, 'Gladan Lik', 'lozinka', 'gladanl234@gmail.com', '0609752341', 'Adresa 56'),
(3, 'Korisnik', 'korisnik', 'korisnik@gmail.com', '0601234567', 'Adresa 21'),
(4, 'user', 'user', 'user@mail.com', '123456789', 'Adresa001');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_order_id` int(10) UNSIGNED NOT NULL,
  `user_order_name` varchar(128) NOT NULL,
  `user_order_address` varchar(128) NOT NULL,
  `user_order_phone` varchar(16) NOT NULL,
  `user_order_price` decimal(10,2) UNSIGNED NOT NULL,
  `user_order_sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_order_is_delivered` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`user_order_id`, `user_order_name`, `user_order_address`, `user_order_phone`, `user_order_price`, `user_order_sent_at`, `user_order_is_delivered`) VALUES
(1, 'Milos Stankovic', 'Adresa 100', '0600754107', '2950.00', '2023-09-11 12:26:06', 1),
(2, 'Gladan Lik', 'Adresa 74', '0601234567', '5960.00', '2023-09-11 12:50:20', 1),
(3, 'Gladni ljudi', 'Adresa 12', '0602348912', '6000.00', '2023-09-12 07:10:31', 1),
(4, 'Ime Prezime', 'Adresa 56', '0607891245', '3520.00', '2023-09-12 07:24:11', 1),
(5, 'Milos Stankovic', 'Adresa 1', '0600754107', '4090.00', '2023-09-12 07:24:32', 1),
(6, 'Gladan Lik', 'Adresa 100', '0608763451', '3970.00', '2023-09-12 07:24:54', 1),
(7, 'Veoma Gladni Likovi', 'Adresa 87', '0602348912', '10480.00', '2023-10-13 07:36:08', 1),
(8, 'Pera Peric', 'Adresa 26', '0607891245', '2320.00', '2023-09-13 07:49:35', 1),
(9, 'Milojko Milojkovic', 'Adresa 61', '0601234567', '1700.00', '2023-09-17 12:47:16', 1),
(10, 'Ime', 'Adresa 0', '0608763451', '3190.00', '2023-09-24 12:41:14', 1),
(11, 'Test Testovic', 'Adresa 1', '0607891245', '2410.00', '2023-09-27 11:34:50', 1),
(12, 'Test', 'Adresa 45', '0600754107', '4960.00', '2023-09-27 12:22:04', 1),
(13, 'a', 'Adresa 12', '0600754107', '2410.00', '2023-10-27 12:40:07', 1),
(14, 'Misko', 'Adresa 21', '0601234567', '800.00', '2023-10-28 12:42:02', 1),
(15, 'Misko', 'Adresa 100', '0608763451', '2410.00', '2023-10-28 12:42:39', 1),
(16, 'Milos Stankovic', 'Adresa 74', '0600754107', '2410.00', '2023-10-28 12:45:15', 1),
(17, 'Milos Stankovic', 'Adresa 12', '0602348912', '800.00', '2023-10-28 12:46:30', 1),
(18, 'Milos Stankovic', 'Adresa 100', '0600754107', '3210.00', '2023-10-28 13:01:23', 1),
(19, 'A', 'Adresa 100', '0601234567', '3210.00', '2023-10-28 13:08:59', 1),
(20, 'Misko', 'Adresa 1', '0600754107', '3430.00', '2023-10-28 13:22:24', 1),
(21, 'Zdrav Lik', 'Adresa 21', '0608763451', '1120.00', '2023-10-28 13:35:17', 1),
(22, 'Milos', 'Adresa 100', '0600754107', '4870.00', '2023-10-29 10:33:14', 1),
(23, 'Milos', 'Adresa 100', '0600754107', '3210.00', '2023-10-29 11:30:49', 1),
(24, 'Milos', 'Adresa 100', '0600754107', '3260.00', '2023-10-29 14:37:39', 1),
(25, 'Ime Prezime', 'Adresa 56', '0608763451', '1970.00', '2023-10-29 14:38:20', 1),
(26, 'Milos', 'Adresa 100', '0600754107', '2460.00', '2023-10-31 12:39:07', 1),
(27, 'Milos', 'Adresa 100', '0600754107', '3450.00', '2023-11-06 13:05:53', 1),
(28, 'Gladan Korisnik', 'Adresa 34', '0601234567', '980.00', '2023-11-07 12:31:18', 1),
(29, 'Milos', 'Adresa 100', '0600754107', '3170.00', '2023-11-07 12:32:01', 1),
(30, 'Bogdan', 'Adresa 87', '0601234567', '1620.00', '2023-11-11 12:02:44', 1),
(31, 'Milojko Milojkovic', 'Adresa 21', '0600987654', '810.00', '2023-11-12 12:26:35', 1),
(32, 'Ivan Ivanovic', 'Adresa 133', '0603456781', '150.00', '2023-11-12 12:28:59', 1),
(33, 'Gladan Lik', 'Adresa 56', '0609752341', '6310.00', '2023-11-12 15:25:57', 1),
(34, 'Test Testovic', 'Adresa 100', '0601234567', '300.00', '2023-11-12 18:27:21', 1),
(35, 'Covek', 'Adresa 87', '060754312', '860.00', '2023-11-12 19:41:59', 1),
(36, 'Dragan', 'Adresa 145', '123456789', '3090.00', '2023-11-12 23:01:58', 1),
(37, 'Milos', 'Adresa 100', '0600754107', '3140.00', '2023-11-13 10:16:20', 1),
(38, 'Milos', 'Adresa 100', '0600754107', '3780.00', '2023-11-13 13:10:13', 1),
(39, 'Zdrav Lik', 'Adresa 74', '1230987345', '550.00', '2023-11-13 14:56:39', 1),
(40, 'Gladan Lik', 'Adresa 56', '0609752341', '6400.00', '2023-11-14 15:44:10', 1),
(41, 'Korisnik', 'Adresa 56', '0600987654', '250.00', '2023-11-14 15:50:21', 1),
(42, 'korisnik', 'Adresa 21', '0601234567', '1600.00', '2023-11-14 21:09:38', 1),
(43, 'Milos', 'Adresa 100', '0600754107', '800.00', '2023-11-14 21:10:52', 1),
(44, 'Korisnik', 'Adresa 21', '0601234567', '4040.00', '2023-11-15 11:03:49', 1),
(45, 'Milos', 'Adresa 100', '0600754107', '3220.00', '2023-11-15 11:04:19', 1),
(46, 'Gladan Lik', 'Adresa 56', '0609752341', '2000.00', '2023-11-15 11:12:59', 1),
(47, 'Ime Prezime', 'Adresa 34', '12345678', '550.00', '2023-11-15 11:22:37', 1),
(48, 'Milos', 'Adresa 100', '0600754107', '5140.00', '2023-11-16 09:51:17', 1),
(49, 'Milos', 'Adresa 100', '0600754107', '4780.00', '2023-11-16 16:52:00', 1),
(50, 'Korisnik', 'Adresa 21', '0601234567', '1890.00', '2023-12-16 16:52:40', 1),
(51, 'Milos', 'Adresa 100', '0600987654', '2880.00', '2023-12-17 10:05:03', 1),
(52, 'Milojko Milojkovic', 'Adresa 21', '0601234567', '7810.00', '2023-12-17 10:05:34', 1),
(53, 'Korisnik Korisnikovic', 'Adresa 145', '060754312', '4830.00', '2023-12-18 10:29:14', 1),
(54, 'Milos', 'Adresa 100', '0600754107', '4920.00', '2023-12-18 10:29:35', 1),
(55, 'Milos', 'Adresa 100', '0600754107', '3640.00', '2023-12-19 18:56:10', 1),
(56, 'Gladan Lik', 'Adresa 56', '0609752341', '3920.00', '2023-12-19 18:57:32', 1),
(57, 'Korisnik', 'Adresa 21', '0601234567', '4030.00', '2023-12-19 18:57:57', 1),
(58, 'Milos', 'Adresa 100', '0600754107', '5900.00', '2023-12-20 10:54:02', 1),
(59, 'Korisnik', 'Adresa 21', '0601234567', '2470.00', '2023-12-20 10:55:46', 1),
(60, 'Milos', 'Adresa 100', '0600754107', '5960.00', '2022-12-21 10:15:43', 1),
(61, 'Korisnikovic', 'Adresa 21', '0603456781', '2530.00', '2022-12-21 10:17:09', 1),
(62, 'Zdrav Lik', 'Adresa 87', '0609752341', '880.00', '2022-12-21 10:17:56', 1),
(63, 'Milos', 'Adresa 100', '0600754107', '8120.00', '2022-12-22 12:03:08', 1),
(64, 'Shomi', 'Adresa 100', '0609752341', '2370.00', '2022-12-22 12:03:36', 1),
(65, 'user', 'Adresa001', '123456789', '2400.00', '2022-12-22 11:39:26', 1),
(66, 'user', 'Adresa001', '123456789', '1650.00', '2024-01-01 11:59:47', 1),
(67, 'user', 'Adresa001', '123456789', '1360.00', '2024-01-01 11:59:53', 1),
(68, 'user', 'Adresa001', '123456789', '1720.00', '2024-01-01 12:00:02', 1),
(69, 'user', 'Adresa001', '123456789', '750.00', '2024-01-01 12:00:07', 1),
(70, 'user', 'Adresa001', '123456789', '7200.00', '2024-01-02 12:00:21', 1),
(71, 'user', 'Adresa001', '123456789', '8120.00', '2024-01-03 12:00:36', 1),
(72, 'user', 'Adresa001', '123456789', '2500.00', '2024-01-04 12:00:45', 1),
(73, 'user', 'Adresa001', '123456789', '10260.00', '2024-01-05 12:00:57', 1),
(74, 'user', 'Adresa001', '123456789', '2940.00', '2024-01-06 12:01:05', 1),
(75, 'user', 'Adresa001', '123456789', '7220.00', '2024-02-10 16:59:49', 1),
(76, 'user', 'Adresa001', '123456789', '3780.00', '2024-02-11 17:00:03', 1),
(77, 'user', 'Adresa001', '123456789', '5710.00', '2024-02-12 17:00:14', 1),
(78, 'user', 'Adresa001', '123456789', '6160.00', '2024-02-13 17:00:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `uq_admin_admin_name` (`admin_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `uq_category_category_name` (`category_name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD UNIQUE KEY `uq_food_food_name` (`food_name`),
  ADD KEY `fk_food_category_id` (`category_id`);

--
-- Indexes for table `food_user_order`
--
ALTER TABLE `food_user_order`
  ADD PRIMARY KEY (`food_user_order_id`),
  ADD UNIQUE KEY `uq_food_user_order_food_id_user_order_id` (`food_id`,`user_order_id`) USING BTREE,
  ADD KEY `fk_food_user_order_user_order_id` (`user_order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uq_user_user_name` (`user_name`),
  ADD UNIQUE KEY `uq_user_user_email` (`user_email`),
  ADD UNIQUE KEY `uq_user_user_phone` (`user_phone`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `food_user_order`
--
ALTER TABLE `food_user_order`
  MODIFY `food_user_order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_food_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `food_user_order`
--
ALTER TABLE `food_user_order`
  ADD CONSTRAINT `fk_food_user_order_food_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_food_user_order_user_order_id` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`user_order_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
