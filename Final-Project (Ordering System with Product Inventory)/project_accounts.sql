-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 08:40 AM
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
-- Database: `project_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(25) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_type` varchar(15) NOT NULL DEFAULT 'Admin',
  `prof_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_type`, `prof_pic`) VALUES
(1, 'Cryobyte', 'abc', 'daniel@gmailcom', 'Admin', '../Profiles//Screenshot 2023-06-06 171704.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `prod_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` double(150,2) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `user_item` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`prod_id`, `prod_name`, `prod_price`, `prod_category`, `user_item`) VALUES
(52, 'Razer Gaming Headset', 4500.00, 'Headset', 40),
(49, 'Gameboy Advance', 780.00, 'Nintendo', 40),
(54, 'Playstation 2', 13450.00, 'Playstation', 44),
(50, 'Nintendo Switch', 2500.00, 'Nintendo', 44),
(50, 'Nintendo Switch', 2500.00, 'Nintendo', 40),
(48, 'Gameboy', 500.00, 'Nintendo', 46),
(48, 'Gameboy', 500.00, 'Nintendo', 40),
(50, 'Nintendo Switch', 2500.00, 'Nintendo', 47),
(51, 'Nintendo DS', 900.00, 'Nintendo', 40),
(55, 'ASUS Gaming Laptop', 45500.00, 'Laptop', 1),
(60, 'PS 3', 43000.00, 'Playstation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(1024) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `product_owner` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `category`, `price`, `product_pic`, `product_owner`) VALUES
(49, 'Gameboy Pink', 'Dive into the world of portable gaming with the Game Boy Advance! This iconic handheld console takes your gaming experience to the next level with advanced graphics, a sleek design, and a vast library of captivating titles.', 'Nintendo', 1780.00, '../Assets/GbAdvance.png', 1),
(50, 'Nintendo Switch', 'Immerse yourself in the ultimate gaming versatility with the Nintendo Switch!                                  This innovative console seamlessly transitions between handheld and TV modes, offering a dynamic                                  gaming experience anytime, anywhere.', 'Nintendo', 2500.00, '../Assets/Switch.png', 1),
(52, 'Razer Gaming Headset', 'Unleash the power of precision with the Razer Gaming Headset. Designed for gamers by gamers, this headset combines cutting-edge technology                                   with sleek aesthetics.', 'Headset', 4500.00, '../Assets/Razerh.png', 1),
(55, 'ASUS Gaming Laptop', 'Step into the future of gaming with ASUS Gaming Laptops.                                  Engineered for excellence, these laptops combine powerful hardware with innovative                                  features, delivering an unmatched gaming performance.', 'Laptop', 45500.00, '../Assets/Asus.png', 40),
(60, 'PS 3', 'Unleash the power ', 'Playstation', 43000.00, '../Assets/Ps3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `user_prof_pic` varchar(255) NOT NULL,
  `user_type` varchar(25) NOT NULL DEFAULT 'Buyer',
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `fname`, `mname`, `lname`, `username`, `password`, `birthday`, `email`, `phone`, `user_prof_pic`, `user_type`, `user_status`, `user_creation`) VALUES
(38, 'a', '', 'a', 'DanielBuyer', 'e04e4c7e7427d180389055e700006161', '2023-12-01', 'daniel@gmailcom', '333', 'Profiles//Screenshot 2023-06-06 171704.png', 'Buyer', 1, '2023-12-02 17:42:29'),
(40, 'Daniel', 'Valdez', 'ajsjq', 'DanielSeller', '5d8fc9c07a8da4818128625541820509', '2023-12-28', 'asanonpriscilla@yahoo.com', '091234567', 'Profiles/Screenshot 2023-04-07 224914.png', 'Buyer', 1, '2023-12-02 17:43:54'),
(44, 'Daniel', '', 'Buyers', 'User', 'd7afde3e7059cd0a0fe09eec4b0008cd', '2023-12-15', 's@mm.com', '34556', 'Profiles/Dope Cat.png', 'Buyer', 1, '2023-12-13 12:44:24'),
(46, 'Daniel', '', 'Valdez', 'Demo Modified', 'b3b32aedee99e40bd175c465ebafc009', '2023-12-05', 'dan@gmail.com', '09123456', 'Profiles/Screenshot 2023-03-11 233434.png', 'Buyer', 1, '2023-12-13 14:37:01'),
(47, 'Daniel', '', 'Modified Last', 'Demo5', 'd7afde3e7059cd0a0fe09eec4b0008cd', '2023-12-20', 'dan@gmail.com', '3333353', 'Profiles/Milktea Icon.png', 'Buyer', 1, '2023-12-13 15:04:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
