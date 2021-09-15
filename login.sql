-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 08:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(1, 'Pizza'),
(2, 'Burger'),
(3, 'Fries'),
(4, 'Shakes');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `username`, `people`, `date`, `message`) VALUES
(1, 'wqwdqdw', 5, '2020-12-29 14:03:00', 'noewefwuefhnwjbfehfb'),
(2, 'sx', 4, '2020-11-16 20:00:00', '343'),
(3, 'aDsdzasz', 4, '2020-11-16 20:00:00', 'dxwqsa'),
(4, 'Annie_10', 4, '2020-11-16 20:00:00', '43dggfghfhf'),
(5, 'anniie', 4, '2020-11-16 20:00:00', 'aadajshjsedf');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `cardholder` varchar(255) NOT NULL,
  `month` varchar(11) NOT NULL,
  `year` varchar(11) NOT NULL,
  `cvv` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `cardnumber`, `cardholder`, `month`, `year`, `cvv`) VALUES
(1, '7867 8678 7787 8575', 'annn', '190', '757', '747-5'),
(2, '2143 2443 4776 8778', 'nin', '10', '111', '123-2'),
(3, '2143 2443 4776 8778', 'nin', '10', '111', '123-2'),
(4, '3454 6753 4454 5456', 'chiku', '10', '222', '132-4'),
(5, '7897 8978 7878 7878', 'chiku', '87878798789', '786', '776-5'),
(6, '8777 7777 7777 7757', 'chiku', '87878798789', '878', '777-7'),
(7, '7489 3783 7487 8374', 'chiku', '87878798789', '343', '333-4'),
(8, '3534 4454 4665 4444', 'chiku', '87878798789', '444', '444-4'),
(9, '5555 5555 5555 5555', 'chiku', '55', '555', '555-5'),
(10, '7777 7777 7777 7777', 'hg', '777777', '777', '777-7'),
(11, '7765 6454 4444 5445', 'ann', '111', '111', '111-1'),
(12, '8778 6876 8', 'ann', '111', '66', '767-7'),
(13, '8748 3789 4789 4857', 'Annie', '1111', '111', '111-1'),
(14, '9874 8937 9387 4984', 'Annie', '111111', '111', '111-1'),
(15, '3874 8347 8978 9789', 'Annie', '111', '111', '111-1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`) VALUES
(1, 1, 'Margherita', 129),
(2, 1, 'Formaggio', 230),
(3, 1, 'Chicken\r\n', 350),
(4, 1, 'Pineapple\'o\'clock', 350),
(5, 1, 'Meat Town ', 230),
(6, 1, 'Parma', 350),
(7, 2, 'Chicken Paradise', 119),
(8, 2, 'Vegan Burger', 129),
(9, 2, 'Creamy Mashroom', 139),
(10, 2, 'Spicy Tandoori', 139),
(11, 3, 'Classic Fries', 70),
(12, 3, 'Naughty Fries', 80),
(13, 3, 'Creamy Temptation', 129),
(14, 3, 'Peri Peri', 129),
(15, 4, 'Black Current', 149),
(16, 4, 'Afgani Dry Fruit', 159),
(17, 4, 'Strawberry Delight', 149),
(18, 4, 'Choco Love', 159);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(5, 'Ann', 350, '2021-05-08 23:43:06'),
(6, 'Ann', 350, '2021-05-08 23:57:34'),
(7, 'ann', 2100, '2021-05-09 02:36:55'),
(8, 'mnm', 2450, '2021-05-09 02:37:11'),
(9, 'mjjjj', 0, '2021-05-09 02:37:25'),
(10, 'mjjjj', 2800, '2021-05-09 02:38:14'),
(11, 'nv', 2100, '2021-05-09 02:41:18'),
(12, 'nv', 2100, '2021-05-09 02:45:56'),
(13, 'cd', 700, '2021-05-09 02:51:14'),
(14, 'chikuuu', 3260, '2021-05-09 13:27:10'),
(15, 'hg', 700, '2021-05-09 14:59:04'),
(16, 'Ann', 3482, '2021-05-09 15:19:46'),
(17, 'Annie', 906, '2021-05-11 14:15:01'),
(18, 'Annie', 1887, '2021-05-11 14:31:14'),
(19, 'Annie', 1887, '2021-05-11 14:31:21'),
(20, 'Angel', 556, '2021-05-11 14:55:19'),
(21, 'Annie', 1565, '2021-05-13 15:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) UNSIGNED NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(1, 1, 3, 1),
(2, 1, 2, 2),
(3, 2, 3, 1),
(4, 2, 2, 2),
(5, 2, 14, 1),
(6, 2, 16, 2),
(7, 2, 15, 3),
(8, 2, 18, 4),
(9, 2, 17, 5),
(10, 3, 3, 1),
(11, 4, 3, 1),
(12, 5, 3, 1),
(13, 6, 3, 1),
(14, 7, 3, 6),
(15, 8, 3, 7),
(16, 9, 3, 0),
(17, 9, 2, 0),
(18, 10, 3, 8),
(19, 11, 3, 6),
(20, 12, 3, 6),
(21, 13, 3, 2),
(22, 14, 3, 8),
(23, 14, 2, 2),
(24, 15, 6, 2),
(25, 16, 6, 7),
(26, 16, 13, 8),
(27, 17, 3, 1),
(28, 17, 9, 4),
(29, 18, 14, 6),
(30, 18, 16, 7),
(31, 19, 14, 6),
(32, 19, 16, 7),
(33, 20, 10, 4),
(34, 21, 1, 5),
(35, 21, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `visitor_phone` varchar(255) NOT NULL,
  `guests` int(10) NOT NULL,
  `book_date` date NOT NULL,
  `book_time` time NOT NULL,
  `setlocation` varchar(255) NOT NULL,
  `visitor_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `visitor_name`, `visitor_email`, `visitor_phone`, `guests`, `book_date`, `book_time`, `setlocation`, `visitor_message`) VALUES
(1, 'mnvnhv', 'enmn@gmail.com', '1234567892', 4, '2021-05-04', '19:09:00', 'connecting', 'zxcacxzsx'),
(2, 'ann', 'ann@gmail.com', '1234567999', 5, '2021-06-03', '19:37:00', 'adjoining', 'dsdsgsg'),
(3, 'annn', 'annn@gmail.com', '1234575744', 4, '2021-05-20', '19:51:00', 'adjoining', 'mhvhjnv'),
(6, 'dehrtbbh', 'enmmnbnmn@gmail.com', '1234568788', 2, '2021-02-18', '19:12:00', 'connecting', 'jbhjmb'),
(8, 'Ann', 'enmn@gmail.com', '1234567892', 5, '2021-05-26', '20:26:00', 'adjoining', 'JIJ'),
(9, 'annie', 'aj7891@srmist.edu.in', '1234567898', 4, '2021-06-04', '19:19:00', 'adjoining', 'fcbcfbcbvbg'),
(10, 'annie', 'anniejain@gmail.com', '1234567898', 3, '2021-05-26', '20:29:00', 'adjoining', 'jsgfbsdfvbhdbf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(9, 'ann', 'enmn@gmail.com', '594f803b380a41396ed63dca39503542'),
(10, 'annie', 'aj7891@srmist.edu.in', '594f803b380a41396ed63dca39503542'),
(11, 'angel', 'chiku@gmail.com', '594f803b380a41396ed63dca39503542'),
(12, 'annie', 'anniejain608@gmail.com', '594f803b380a41396ed63dca39503542');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
