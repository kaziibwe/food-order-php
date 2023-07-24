-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8080
-- Generation Time: Mar 21, 2023 at 08:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id`, `fullname`, `username`, `password`) VALUES
(63, 'KAZIIBWE', 'ALFRED', '202cb962ac59075b964b07152d234b70'),
(65, 'kamoga', 'ALBERT', '202cb962ac59075b964b07152d234b70'),
(66, 'Kaziibwe Alfred', 'ALFRED', '202cb962ac59075b964b07152d234b70'),
(72, 'kaziibwe', 'alfred', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(32, 'smart', 'food_category_43.jpg', 'Yes', 'Yes'),
(33, 'feeee', 'food_category_470.jpg', 'Yes', 'Yes'),
(35, 'OGS', 'food_category_937.jpg', 'Yes', 'Yes'),
(41, 'posho', 'food_category_805.png', 'Yes', 'Yes'),
(43, 'ggg', 'food_category_799.png', 'No', 'Yes'),
(47, 'roly', '', 'No', 'Yes'),
(51, '', 'food_category_299.jpeg', 'Yes', 'Yes'),
(53, 'local ', 'food_category_295.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `table_food`
--

CREATE TABLE `table_food` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_food`
--

INSERT INTO `table_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(15, 'egg', 'we are ages', '7.00', 'food-Name-2100.jpg', 41, 'Yes', 'Yes'),
(16, 'babanga', ' goood', '10.00', 'food-Name-1183.jpg', 33, 'Yes', 'Yes'),
(18, 'goat meat', 'hello every one this fantastic', '12.00', 'food-Name-7218.jpg', 32, 'Yes', 'Yes'),
(19, 'meat', 'this is good', '23.00', 'food-Name-386.jpg', 32, 'Yes', 'Yes'),
(20, 'posho', 'tis is enagetic', '34.00', 'food-Name-8548.jpg', 33, 'Yes', 'Yes'),
(24, 'kanmime', 'this is good', '12.00', 'food-Name-5350.png', 32, 'Yes', 'Yes'),
(25, 'kaziibwe', 'this is the sweetesst', '23.00', 'food-Name-578.png', 48, 'Yes', 'Yes'),
(27, 'feeeeeeeeeeeeee', 'fdgdgjhbcskjdn', '12.00', 'food-Name-4708.jpeg', 48, 'Yes', 'Yes'),
(29, 'matooke ', 'boiled', '67.00', 'food-Name-2168.png', 53, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'babanga', '10.00', 4, '40.00', '2023-01-25 02:35:32', 'deliverd', 'Kaziibwe were not', '0707948082', 'kaziibwe19@gmail.com', '  sugar katete mbarara'),
(2, 'goat meat', '12.00', 3, '36.00', '2023-01-25 02:37:46', 'cancelled', 'Kaziibwe Alfred', '0785557587', 'alfredkaziibwe19@gmail.com', '  Riverside katete mbarara'),
(3, 'meat', '23.00', 2, '46.00', '2023-01-25 02:50:15', 'deliverd', 'Kaziibwe ', '0785557587', 'alfredkaziibwe19@gmail.com', '       Riverside katete mbarara'),
(4, 'Kiko Mando', '19.00', 8, '152.00', '2023-01-25 02:52:36', 'ordered', 'Kaziibwe Alfred', '0707948082\'', 'alfredkaziibwe19@gmail.com', '                           Riverside mbarara\'\'\''),
(5, 'babanga', '10.00', 2, '20.00', '2023-01-26 02:00:38', 'ordered', 'ssendegeya albert', '0785557587', 'alfredkaziibwe19@gmail.com', '  Riverside mbarara'),
(6, 'posho', '34.00', 2, '68.00', '2023-01-26 09:08:00', 'deliverd', 'ssendegeya albert', '0785557587', 'alfredkaziibwe19@gmail.com', ' Riverside mbarara'),
(7, 'feeeeeeeeeeeeee', '12.00', 2, '24.00', '2023-02-03 11:25:04', 'ordered', 'jimmy', '0785555553', 'jimmy@gmail.com', 'kakoba'),
(8, 'egg', '7.00', 2, '14.00', '2023-02-05 07:43:38', 'ordered', 'Kaziibwe were\'', '0785557587', 'alfredkaziibwe19@gmail.com', 'Riverside mbarara\'\'\''),
(9, 'babanga', '10.00', 10, '100.00', '2023-02-05 08:19:37', 'deliverd', 'timo', '0758904114', 'wanambwatimothy@gmail.com', '  mbuya'),
(10, 'kanmime', '12.00', 3, '36.00', '2023-02-05 09:02:19', 'deliverd', 'god', '0758904114', 'wanambwatimothy@gmail.com', ' mbuya'),
(11, 'goat meat', '12.00', 3, '36.00', '2023-02-06 08:40:40', 'ordered', 'ssekayi frank', '0702940767', 'ssekayifrank23@gmail.com', 'kampala banda'),
(13, 'babanga', '10.00', 2, '20.00', '2023-02-08 11:01:37', 'ordered', 'kaziibwe', '0789916141', 'alfred@gmail.com', 'mbarara'),
(14, 'babanga', '10.00', 2, '20.00', '2023-02-08 11:02:42', 'ordered', 'ka', '0789916141', 'alfred@gmail.com', 'mbarara'),
(15, 'babanga', '10.00', 2, '20.00', '2023-02-08 11:05:57', 'ordered', 'ka', '0789916141', 'alfred@gmail.com', 'mbarara'),
(16, 'babanga', '10.00', 1, '10.00', '2023-02-08 11:07:41', 'ordered', 'kazibwe', '0785555553', 'alfred@gmail.com', 'mbarara'),
(17, 'egg', '7.00', 2, '14.00', '2023-02-09 12:06:34', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'uict nakawa'),
(18, 'posho', '34.00', 4, '136.00', '2023-02-09 03:48:50', 'ordered', 'henry ', '0704369205', 'senhen123@gmail.com', 'kampala'),
(19, 'posho', '34.00', 2, '68.00', '2023-02-09 07:30:14', 'ordered', 'ssekayi frank', '0702940767', 'ssekayifrank23@gmail.com', 'kampala banda'),
(20, 'egg', '7.00', 8, '56.00', '2023-02-11 08:12:47', 'ordered', 'kimera muhsin', '0771497217', 'kmuhki@gmail.com', 'nabisunsa'),
(21, 'meat', '23.00', 2, '46.00', '2023-02-11 08:22:23', 'ordered', 'bulolo emmanuel', '0783313166', 'emmanuelbulolo6@gmail.com', 'seguku'),
(22, 'posho', '34.00', 2, '68.00', '2023-02-11 08:37:03', 'ordered', 'Kaziibwe Alfred', '0785557587', 'alfredkaziibwe19@gmail.com', 'Riverside katete mbarara'),
(23, 'meat', '23.00', 2, '46.00', '2023-02-12 11:47:02', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(24, 'skorch', '12.00', 22, '264.00', '2023-02-16 09:55:32', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(25, 'skorch', '12.00', 12, '144.00', '2023-02-16 10:14:04', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(26, 'skorch', '12.00', 12, '144.00', '2023-02-16 10:21:04', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(27, 'skorch', '12.00', 12, '144.00', '2023-02-16 10:21:07', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(28, 'skorch', '12.00', 12, '144.00', '2023-02-16 10:23:46', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(29, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:27:56', 'ordered', '2', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(30, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:35:49', 'ordered', '2', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(31, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:37:55', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(32, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:43:30', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(33, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:44:08', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(34, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:44:39', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(35, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:45:01', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(36, 'babanga', '10.00', 5, '50.00', '2023-02-16 10:45:30', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(37, 'babanga', '10.00', 5, '50.00', '2023-02-16 10:45:49', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(38, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:46:06', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(39, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:47:16', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(40, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:49:57', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(41, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:50:43', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(42, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:52:43', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(43, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:53:46', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(44, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:54:05', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(45, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:55:21', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(46, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:56:29', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(47, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:56:53', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(48, 'babanga', '10.00', 2, '20.00', '2023-02-16 10:57:04', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(49, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:13:23', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(50, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:22:41', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(51, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:22:50', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(52, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:22:58', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(53, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:26:49', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(54, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:28:08', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(55, 'babanga', '10.00', 2, '20.00', '2023-02-16 11:28:26', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(56, 'babanga', '10.00', 10, '100.00', '2023-02-16 12:06:49', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(57, 'babanga', '10.00', 10, '100.00', '2023-02-16 12:17:42', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(58, 'babanga', '10.00', 10, '100.00', '2023-02-16 12:18:03', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(59, 'egg', '7.00', 2, '14.00', '2023-02-16 05:35:20', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(60, 'egg', '7.00', 2, '14.00', '2023-02-16 05:39:52', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(61, 'egg', '7.00', 2, '14.00', '2023-02-16 05:47:46', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(62, 'egg', '7.00', 2, '14.00', '2023-02-16 05:49:18', 'ordered', 'ssddfgh', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(63, 'babanga', '10.00', 2, '20.00', '2023-02-16 05:50:32', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(64, 'egg', '7.00', 2, '14.00', '2023-02-16 05:51:35', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(65, 'egg', '7.00', 2, '14.00', '2023-02-16 05:53:17', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(66, 'egg', '7.00', 2, '14.00', '2023-02-16 05:54:21', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(67, 'egg', '7.00', 2, '14.00', '2023-02-16 05:58:06', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(68, 'egg', '7.00', 2, '14.00', '2023-02-16 05:58:21', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(69, 'kanmime', '12.00', 2, '24.00', '2023-02-16 06:00:26', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(70, 'egg', '7.00', 2, '14.00', '2023-02-16 09:22:24', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(71, 'kanmime', '12.00', 2, '24.00', '2023-02-16 09:39:13', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(72, 'egg', '7.00', 2, '14.00', '2023-02-16 09:40:05', 'ordered', 'eron', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(73, 'babanga', '10.00', 2, '20.00', '2023-02-17 07:30:01', 'ordered', 'kaziibwe', '0707948082', 'alfred@mail.com', 'uict hub'),
(74, 'egg', '7.00', 2, '14.00', '2023-02-17 08:06:38', 'ordered', 'jollly', '0785557587', 'alfred@mail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(75, 'goat meat', '12.00', 2, '24.00', '2023-02-18 09:06:17', 'deliverd', 'kaziibwe', '0785557587', 'alfredkaziibwe19@gmail.com', ' Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(76, 'babanga', '10.00', 2, '20.00', '2023-02-20 01:12:32', 'ordered', 'Natasha Abbo', '0752811031', 'abbonatasha.ed@gmail.com', 'Nakawa '),
(77, 'goat meat', '12.00', 1, '12.00', '2023-02-27 09:16:49', 'deliverd', 'eric', '0753870072', 'tisasociation@gmail.com', ' Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(78, 'egg', '7.00', 2, '14.00', '2023-03-12 06:00:10', 'ordered', 'kaziibwe', '0785557587', 'alfredkaziibwe19@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda'),
(79, 'meat', '23.00', 3, '69.00', '2023-03-14 06:02:01', 'ordered', 'emilly', '0785500000', 'babo@gmail.com', 'Mbuya Rd\r\nP.O.BOX 20121, Kampala, Uganda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_food`
--
ALTER TABLE `table_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `table_food`
--
ALTER TABLE `table_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
