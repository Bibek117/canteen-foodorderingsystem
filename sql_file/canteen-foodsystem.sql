-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 08:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen-foodsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `food_id` int(50) NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `food_desc` text NOT NULL,
  `food_image` varchar(200) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 0,
  `food_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`food_id`, `food_name`, `food_desc`, `food_image`, `availability`, `food_price`) VALUES
(3, 'Chowmin', '50 per plateserved with tomato sauce updated to 60 perplate', 'bali_image.jpg', 1, 60),
(4, 'Chowmin chowmin', '60 per plateserved with tomato sauce', 'bali_image.jpg', 1, 60),
(5, 'Tea', '25 Per cup', 'samosa.jpg', 1, 25),
(6, 'Thuppa', '60 per plate\r\nsnacks with vegetables soup', 'samosa.jpg', 1, 60),
(7, 'Gisela Emerson', 'Enim veritatis enim ', '20191015_181359.png', 0, 650),
(8, 'Haviva Benson', 'Perspiciatis sequi ', '20191015_181359.png', 0, 336),
(9, 'Haviva Benson', 'Perspiciatis sequi ', '20191015_181359.png', 0, 336),
(10, 'Haviva Benson', 'Perspiciatis sequi ', '20191015_181359.png', 0, 336),
(12, 'Roanna Walker', 'Esse quia natus fac', '20190926_203522.png', 0, 502),
(26, 'Chop', '20 per piece made of potato', 'bali_image.jpg', 0, 20),
(27, 'Brielle Trujillo', 'Quia temporibus fugi', '20191030_073529.png', 0, 570);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `ordered_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `quantity`, `food_id`, `payment_status`, `order_status`, `ordered_time`) VALUES
(1, 2, 1, 4, 1, 1, '2023-01-30 18:49:03'),
(2, 2, 4, 5, 1, 1, '2023-01-30 18:53:20'),
(3, 2, 1, 6, 1, 1, '2023-01-30 18:55:26'),
(4, 3, 1, 4, 1, 1, '2023-01-30 18:09:17'),
(5, 3, 1, 5, 0, 0, '2023-01-20 21:51:26'),
(6, 3, 1, 6, 0, 0, '2023-01-20 21:51:30'),
(7, 2, 3, 4, 1, 1, '2023-01-30 18:47:02'),
(8, 2, 2, 4, 0, 1, '2023-01-30 18:53:45'),
(9, 2, 1, 26, 0, 0, '2023-01-29 00:46:28'),
(10, 2, 2, 9, 0, 1, '2023-01-30 18:53:50'),
(11, 3, 56, 4, 0, 0, '2023-01-29 22:14:58'),
(12, 3, 1, 3, 0, 0, '2023-01-29 22:16:27'),
(13, 3, 33, 3, 0, 0, '2023-01-29 22:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `faculty` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `photo` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `user_type`, `faculty`, `semester`, `photo`) VALUES
(1, 'Manik Tamang', 'Admin@gmail.com', 'e3afed0047b08059d0fada10f400c1e5', 'admin', '', '', '20190803_185642.jpg'),
(2, 'Bibek', 'testing@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'BSCCSIT', 'fifth', '20190926_203522.png'),
(3, 'Bikrsm', 'bikram@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'BCA', 'first', '20191015_181359.png'),
(4, 'test', 'test@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'BCA', 'seventh', '20191015_181359.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `orders_ibfk_2` (`food_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `food_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_items` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
