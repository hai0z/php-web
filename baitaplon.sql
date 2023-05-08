-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:06 PM
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
-- Database: `baitaplon`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(500) NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `description`, `img`, `size`) VALUES
(24, 'Hải Nguyễn', 111, 1111, '1111', '16588220961a03fa6a68e1daac63e4702ab40527d7_thumbnail_900x.webp', 'M'),
(25, 'Hải Nguyễn', 111, 1111, '1111', 'a7af66ca-fb1f-6100-3585-0018ddfa3019.jpg', 'M'),
(26, 'Quần Dài Denim', 499000, 100, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'S'),
(27, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(28, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(29, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(30, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(31, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(32, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(33, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(34, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(35, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(36, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(37, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(38, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(39, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(40, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(41, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M'),
(42, 'Quần Dài Denim', 499000, 50, 'A modern take on classic workwear pants', 'vngoods_01_455498 (1).webp', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` int(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('1', 1, 0),
('admin', 1111, 1),
('user1', 11115, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
