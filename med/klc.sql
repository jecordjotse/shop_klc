-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2017 at 10:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `PID` int(5) NOT NULL,
  `cusID` int(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`PID`, `cusID`, `qty`, `availability`, `time_created`) VALUES
(2, 1, 3, 0, '2016-10-27 20:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `description`, `availability`, `time_created`) VALUES
(1, 'Classic Man', 'Men classic look during the long breaks', 1, '2016-11-11 08:42:20'),
(2, 'Passion', 'Passion For Authenticity', 1, '2016-11-11 08:42:40'),
(3, 'Authenticated', 'Men''s wear ', 1, '2016-11-11 08:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `col_Img`
--

CREATE TABLE `col_Img` (
  `id` int(5) NOT NULL,
  `col_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `col_Img`
--

INSERT INTO `col_Img` (`id`, `col_id`, `name`) VALUES
(11, 1, '1.jpg'),
(12, 2, '2.jpg'),
(13, 3, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `col_Items`
--

CREATE TABLE `col_Items` (
  `col_id` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `col_Items`
--

INSERT INTO `col_Items` (`col_id`, `PID`, `availability`, `time_created`) VALUES
(1, 1, 1, '2016-11-11 08:44:51'),
(1, 2, 0, '2016-11-11 08:45:24'),
(2, 1, 0, '2016-11-11 08:45:24'),
(3, 1, 0, '2016-11-11 08:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shoe_size` varchar(10) NOT NULL,
  `pant_size` varchar(10) NOT NULL,
  `shirt_size` varchar(10) NOT NULL,
  `suit_size` varchar(10) NOT NULL,
  `availabity` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `date_of_birth`, `address`, `number`, `username`, `password`, `email`, `shoe_size`, `pant_size`, `shirt_size`, `suit_size`, `availabity`, `time_created`) VALUES
(1, 'Jerome', 'Cordjotse', '1996-06-02', 'p.o.box 283', '+233540757034', 'jay', 'June021996', 'jeromecordjotse@gmail.com', '44', '31', '15', '9', 1, '2016-10-27 10:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `loc`, `availability`, `time_created`) VALUES
(1, 'img', '/img/', 1, '2016-10-27 11:38:13'),
(2, 'img', '/img/', 1, '2016-10-27 11:38:44'),
(3, 'img', '/img/', 1, '2016-10-27 11:38:55'),
(4, 'img', '/img/', 1, '2016-10-27 11:38:55'),
(5, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(6, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(7, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(8, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(9, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(10, 'img', '/img/', 1, '2016-10-27 11:39:06'),
(11, 'img', '/img/collections/', 1, '2016-11-11 08:49:45'),
(12, 'img', '/img/collections/', 1, '2016-11-11 08:49:45'),
(13, 'img', '/img/collections', 1, '2016-11-11 08:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `productImg`
--

CREATE TABLE `productImg` (
  `id` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productImg`
--

INSERT INTO `productImg` (`id`, `PID`, `name`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 1, '4'),
(5, 1, 'main'),
(6, 2, '1'),
(7, 2, '2'),
(8, 2, '3'),
(9, 2, '4'),
(10, 2, 'main');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `color_desc` varchar(20) NOT NULL,
  `coll_flag` tinyint(1) NOT NULL,
  `availabity` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `color_desc`, `coll_flag`, `availabity`, `time_created`) VALUES
(1, 'Agyeman', 'Shoes for males', 23.00, 'blue', 0, 1, '2016-10-27 11:43:47'),
(2, 'Boafoa', 'Male shoe', 69.99, 'brown', 0, 1, '2016-10-27 11:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`PID`,`cusID`),
  ADD KEY `cus_buys` (`cusID`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `col_Img`
--
ALTER TABLE `col_Img`
  ADD PRIMARY KEY (`id`,`col_id`),
  ADD KEY `col_id` (`col_id`);

--
-- Indexes for table `col_Items`
--
ALTER TABLE `col_Items`
  ADD PRIMARY KEY (`col_id`,`PID`),
  ADD KEY `item` (`PID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productImg`
--
ALTER TABLE `productImg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_prod` FOREIGN KEY (`PID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cus_buys` FOREIGN KEY (`cusID`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `col_Img`
--
ALTER TABLE `col_Img`
  ADD CONSTRAINT `col_Img_ibfk_1` FOREIGN KEY (`col_id`) REFERENCES `collections` (`id`),
  ADD CONSTRAINT `image` FOREIGN KEY (`id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `col_Items`
--
ALTER TABLE `col_Items`
  ADD CONSTRAINT `collection` FOREIGN KEY (`col_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item` FOREIGN KEY (`PID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productImg`
--
ALTER TABLE `productImg`
  ADD CONSTRAINT `image_of_prod` FOREIGN KEY (`PID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `is_a_med` FOREIGN KEY (`id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
