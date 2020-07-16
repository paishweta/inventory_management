-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 07:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(14, 'Samsung', '1'),
(15, 'Lenovo', '1'),
(16, 'Micromax', '1'),
(17, 'HP', '1'),
(18, 'DELL', '1'),
(20, 'Realme', '1'),
(26, 'test2', '1'),
(29, 'ONEPLUS', '1'),
(30, 'APPLE', '1'),
(32, 'Test1', '1'),
(33, 'Access 125', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(7, 0, 'Fashion', '1'),
(9, 7, 'Clothes', '1'),
(22, 0, 'Software', '1'),
(25, 0, 'Anti-virus', '1'),
(26, 0, 'Electronics', '1'),
(27, 26, 'Mobiles', '1'),
(31, 0, 'test2', '1'),
(35, 0, 'Test', '1'),
(36, 0, 'Gadgets', '1'),
(38, 0, 'Vehicle2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(13, 'Customer', '2020-07-14', 175000, 31500, 0, 206500, 206500, 0, 'CASH'),
(14, 'Prabha', '2020-07-14', 400000, 72000, 0, 472000, 472000, 0, 'CASH'),
(15, 'Customer', '2020-07-14', 75000, 13500, 0, 88500, 88500, 0, 'CASH'),
(16, 'Customer', '2020-07-14', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(17, 'Customer', '2020-07-14', 50000, 9000, 0, 59000, 0, 59000, 'CASH'),
(18, 'Customer', '2020-07-14', 200000, 36000, 0, 236000, 236000, 0, 'CASH'),
(19, 'Amar', '2020-07-14', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(20, 'Customer', '2020-07-14', 400000, 72000, 0, 472000, 472000, 0, 'CASH'),
(21, 'Customer', '2020-07-14', 150000, 27000, 0, 177000, 177000, 0, 'CASH'),
(22, 'Aniket', '2020-07-14', 200000, 36000, 0, 236000, 236000, 0, 'CASH'),
(23, 'Aniket', '2020-07-14', 200000, 36000, 0, 236000, 236000, 0, 'CASH'),
(24, 'Aniket', '2020-07-14', 150000, 27000, 0, 177000, 177000, 0, 'CASH'),
(25, 'Shweta', '0000-00-00', 145000, 26100, 0, 171100, 171100, 0, 'CASH'),
(26, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(27, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(28, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(29, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(30, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(31, 'Shweta Pai', '0000-00-00', 65000, 11700, 0, 76700, 76700, 0, 'CASH'),
(32, 'Shweta Pai', '0000-00-00', 65000, 11700, 0, 76700, 76700, 0, 'CASH'),
(33, 'Shweta Pai', '0000-00-00', 65000, 11700, 0, 76700, 76700, 0, 'CASH'),
(34, 'Shweta Pai', '0000-00-00', 65000, 11700, 0, 76700, 76700, 0, 'CASH'),
(35, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(36, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(37, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(38, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(39, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(40, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(41, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(42, 'Shweta', '0000-00-00', 175000, 31500, 0, 206500, 206500, 0, 'CASH'),
(43, 'Shweta', '0000-00-00', 175000, 31500, 0, 206500, 206500, 0, 'CASH'),
(44, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(45, 'Shweta', '0000-00-00', 80000, 14400, 0, 94400, 94400, 0, 'CASH'),
(46, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(47, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(48, 'Shweta', '0000-00-00', 50000, 9000, 0, 59000, 59000, 0, 'CASH'),
(49, 'Customer', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(50, 'Customer', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(51, 'Customer', '0000-00-00', 125000, 22500, 0, 147500, 147500, 0, 'CASH'),
(52, 'Customer', '0000-00-00', 125000, 22500, 0, 147500, 147500, 0, 'CASH'),
(53, 'Customer', '0000-00-00', 125000, 22500, 0, 147500, 147500, 0, 'CASH'),
(54, 'Aniket', '0000-00-00', 850000, 153000, 3000, 1000000, 1000000, 0, 'CASH'),
(55, 'Shweta', '0000-00-00', 10000, 1800, 800, 11000, 11000, 0, 'CASH'),
(56, 'Aniket', '0000-00-00', 100000000, 18000000, 800000, 117200000, 117200000, 0, 'CASH'),
(57, 'Aniket', '0000-00-00', 100000000, 18000000, 800000, 117200000, 117200000, 0, 'CASH'),
(58, 'Aniket', '0000-00-00', 99990000, 17998200, 18200, 117970000, 117970000, 0, 'CASH'),
(59, 'Aniket', '0000-00-00', 99990000, 17998200, 18200, 117970000, 117970000, 0, 'CASH'),
(60, 'Aniket', '0000-00-00', 99990000, 17998200, 18200, 117970000, 117970000, 0, 'CASH'),
(61, 'Aniket', '0000-00-00', 90000, 16200, 0, 106200, 106200, 0, 'CASH'),
(62, 'Shweta', '0000-00-00', 2200000, 396000, 0, 2596000, 2596000, 0, 'CASH'),
(63, 'Shweta', '0000-00-00', 2200000, 396000, 0, 2596000, 2596000, 2596000, 'CASH'),
(64, 'Shweta', '0000-00-00', 2200000, 396000, 0, 2596000, 2596000, 2596000, 'CASH'),
(65, 'Shweta', '0000-00-00', 2900000, 522000, 0, 3422000, 3422000, 0, 'CASH'),
(66, 'Shweta', '0000-00-00', 2900000, 522000, 0, 3422000, 3422000, 0, 'CASH'),
(67, 'Shweta', '0000-00-00', 25000, 4500, 500, 29000, 29000, 0, 'CASH'),
(68, 'Shweta', '0000-00-00', 25000, 4500, 500, 29000, 29000, 0, 'CASH'),
(69, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(70, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(71, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(72, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(73, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(74, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(75, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(76, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(77, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(78, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH'),
(79, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(80, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(81, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(82, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(83, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(84, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(85, 'Shweta', '0000-00-00', 400000, 72000, 2000, 470000, 470000, 0, 'CASH'),
(86, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(87, 'Shweta', '0000-00-00', 25000, 4500, 0, 29500, 29500, 0, 'CASH'),
(88, 'Shweta', '0000-00-00', 40000, 7200, 0, 47200, 47200, 0, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(31, 44, 'Oneplus 7', 25000, 1),
(32, 45, 'Samsung galaxy s9', 40000, 2),
(41, 54, 'Access 125', 75000, 2),
(42, 54, 'iphone 7', 70000, 10),
(43, 55, 'Realme 9 pro', 10000, 1),
(66, 88, 'Samsung galaxy s9', 40000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(15, 27, 14, 'Samsung galaxy s9', 40000, 89, '2020-07-16', '1'),
(17, 27, 29, 'Oneplus 7', 25000, 98, '2020-07-16', '1'),
(18, 27, 30, 'iphone 7', 70000, 90, '2020-07-14', '1'),
(19, 27, 20, 'Realme 9 pro', 10000, 9991, '2020-07-14', '1'),
(20, 26, 26, 'Hair Dryer', 20000, 1500, '2020-07-14', '1'),
(21, 27, 32, 'Redmi Note 3', 15000, 2000, '2020-07-15', '1'),
(22, 38, 33, 'Access 125', 75000, 8, '2020-07-15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('1') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` date NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(5, 'shweta', 'pai9619@gmail.com', '$2y$08$FHxecpsq3Vog0V5Nj6CNfeLDQBMzRVMSTPEDXXzTEH35V9/OfB4fi', '1', '2020-07-09', '2020-07-14', ''),
(20, 'Shweta', 'pai96@gmail.com', '$2y$08$dp.aTAAtZTs/L/4hDzGPwORQabqOJPiOpERCvtSCszlkU2c1FOvUS', '', '2020-07-15', '2020-07-16', ''),
(21, 'Aniket', 'paianiket@gmail.com', '$2y$08$Hj4B1aqKbrIJjg3CINtYVOBVAlFrn9GkMMw.lS.IozMSEgTv/2qo.', '1', '2020-07-15', '2020-07-15', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `product_name` (`product_name`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
