-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2022 at 01:41 AM
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
-- Database: `ecommercemakeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userReference` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cartLine`
--

CREATE TABLE `cartLine` (
  `idCartLine` int(11) NOT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `idCart` int(11) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(10, 'Soin du cheveux'),
(11, 'soins de  la peau'),
(12, 'Rouge a lèvres'),
(13, 'soins du visage'),
(48, 'Fard a joues');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `stockQuantity` int(11) DEFAULT NULL,
  `expirationDate` date DEFAULT NULL,
  `categoryProduct` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img`, `productName`, `price`, `details`, `stockQuantity`, `expirationDate`, `categoryProduct`) VALUES
(5, 'Absolue Revitalizing Anti-Aging Eye Cream.jpg', 'Absolue Revitalizing Anti-Aging Eye Cream', 234, 'Absolue Revitalizing Anti-Aging Eye Cream', 32, '2023-02-22', 'Soin du cheveux'),
(6, 'Artistique Blush.png', 'Artistique Blush', 100, 'Artistique Blush', 32, '0001-02-13', 'soins du visage'),
(7, 'Daily Facial Cleanser.jpg', 'Daily Facial Cleanser', 234, 'Daily Facial Cleanser', 321, '2001-03-31', 'soins du visage'),
(8, 'Hydragloss High-Pigment Lip Gel.jpg', 'Hydragloss High-Pigment Lip Gel', 453, 'Hydragloss High-Pigment Lip Gel', 34, '2022-03-04', 'soins du visage');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'adminpass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartLine`
--
ALTER TABLE `cartLine`
  ADD PRIMARY KEY (`idCartLine`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idCart` (`idCart`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cartLine`
--
ALTER TABLE `cartLine`
  MODIFY `idCartLine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartLine`
--
ALTER TABLE `cartLine`
  ADD CONSTRAINT `cartLine_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cartLine_ibfk_2` FOREIGN KEY (`idCart`) REFERENCES `cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
