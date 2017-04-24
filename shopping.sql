-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2017 at 06:23 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_desc` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_desc`, `category_name`) VALUES
(1, 'For Drinks', 'Drinks'),
(2, 'Used in Fast Foods', 'Fast Food'),
(3, 'Mouse', 'Mouse-computer'),
(4, 'enhancement', 'Beauty'),
(5, 'hrhf', 'vbcgh');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `feedback_id` int(11) NOT NULL,
  `feedback_product_id` varchar(50) NOT NULL,
  `feedback_ratings` int(20) NOT NULL,
  `feedback_user_contact` int(20) NOT NULL,
  `feedback_user_id` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`feedback_id`, `feedback_product_id`, `feedback_ratings`, `feedback_user_contact`, `feedback_user_id`) VALUES
(1, '34545435', 0, 2147483647, 'user'),
(2, '09ii23', 2, 2312, 'user'),
(3, '3434', 5, 323232, 'user'),
(4, '34545435', 0, 2147483647, '34'),
(5, '24343', 0, 788382832, '34'),
(6, '34545435', 0, 2323232, '34'),
(7, '24343', 2, 232331312, '34'),
(8, '24343', 2, 232331312, '34'),
(9, '24343', 2, 232331312, '34'),
(10, '09ii23', 4, 1214334343, '34'),
(11, '34545435', 5, 23131231, '34'),
(12, '34545435', 3, 334343, '34'),
(13, '4343', 3, 32223344, '34');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `login_username` varchar(20) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `login_rank` int(20) NOT NULL,
  `login_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `login_id`, `login_username`, `login_password`, `login_rank`, `login_name`) VALUES
(1, 8978787, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'samsy'),
(3, 12345678, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Samson Mwangi'),
(4, 34, 'user', 'fca84d592e2e7655a9dc7afd28d4fbae', 2, 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_category_id` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`product_id`, `product_code`, `product_name`, `product_price`, `product_quantity`, `product_image`, `product_desc`, `product_category_id`) VALUES
(28, '011286867', '8uyututyt', '900', 0, '../upload/!Door2.png', 'yuiyiuoiyoi', 'Mouse-computer'),
(22, '09ii23', 'Laptop', '1000', 0, '../upload/Captain.png', 'Well Maintained', 'Mouse-computer'),
(27, '2344', 'beads', '4500', 0, '../upload/!Door3.png', 'neck attire', 'Beauty'),
(26, '24343', 'qrerewrwerre', '24343', 0, '../upload/Angel.png', 'fasdfdsafdsafcdfvsfvcfcsfcyydsfctdsufcsuycbsuydf', 'Fast Food'),
(21, '3434', 'dfsdf', '4324', 4324, '../upload/background.png', 'ewrareraraeaf', 'Fast Food'),
(20, '34343', 'ddvcerer', '4343', 4343, '../upload/final questold.PNG', 'fsdfsdf', 'Fast Food'),
(25, '34545435', 'dfgdfg', '3453435', 0, '../upload/Bat.png', 'rttedgfgjkgjfpcanuxywcvastdx`uyadrytxrd', 'Mouse-computer'),
(19, '4343', 'ffdf', '434', 34, '../upload/Keyboard.png', 'dfdfdf', 'Fast Food'),
(24, '43545', 'gfdgdfg', '45345', 0, '../upload/cactus_03.png', 'ertstgdfgfdg', 'Fast Food'),
(23, '4434', 'seeds', '434', 0, '../upload/Asura.png', 'wfsdfxdggd', 'Drinks'),
(18, '84597', 'Comp', '20000', 20, '../upload/TitleLogo.JPG', 'With windows 10', 'Mouse-computer'),
(17, '978989', 'Mouse', '120', 12, '../upload/!Other1.png', 'Nice optical mouse', 'Mouse-computer');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `supplier_product_id` int(11) NOT NULL,
  `supplier_product_supplier_id` varchar(20) NOT NULL,
  `supplier_product_product_id` varchar(20) NOT NULL,
  `supplier_product_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_table`
--

CREATE TABLE `supplier_table` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `supplier_address` varchar(20) NOT NULL,
  `supplier_contact` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_table`
--

INSERT INTO `supplier_table` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(1, 'Samson Mwangi', '123-10104 NYERI', '0724090774');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_username` (`login_username`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`supplier_product_id`);

--
-- Indexes for table `supplier_table`
--
ALTER TABLE `supplier_table`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `supplier_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_table`
--
ALTER TABLE `supplier_table`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
