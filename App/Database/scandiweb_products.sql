-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2023 at 02:37 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `product_type`, `product_description`) VALUES
(48, 'JVC200123', 'Acme DISC', 1, 'DVD', '700'),
(49, 'JVC200124', 'Acme DISC', 2, 'DVD', '700'),
(50, 'JVC200125', 'Acme DISC', 3, 'DVD', '700'),
(51, 'JVC200126', 'Acme DISC', 4, 'DVD', '700'),
(56, 'GGWP0007', 'War and Peace', 20, 'Book', '2'),
(57, 'GGWP0008', 'War and Peace', 30, 'Book', '3'),
(58, 'GGWP0009', 'War and Peace', 20, 'Book', '2'),
(59, 'GGWP0010', 'War and Peace', 50, 'Book', '1.5'),
(60, 'TR120555', 'Chair', 40, 'Furniture', '24x45x15'),
(61, 'TR120556', 'Chair', 40, 'Furniture', '24x45x15'),
(62, 'TR120557', 'Chair', 45, 'Furniture', '24x45x15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
