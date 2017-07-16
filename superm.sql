-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2017 at 09:34 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category_products`
--

CREATE TABLE `Category_products` (
  `Cate_Pro_Id` int(20) NOT NULL DEFAULT '0',
  `Cat_Prod_Category_Id` int(20) DEFAULT NULL,
  `Cat_Prod_Product_Id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category_table`
--

CREATE TABLE `Category_table` (
  `Category_Id` int(20) NOT NULL,
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category_table`
--

INSERT INTO `Category_table` (`Category_Id`, `Category_Name`, `Category_Desc`) VALUES
(1, 'www', 'www');

-- --------------------------------------------------------

--
-- Table structure for table `Customer_profile`
--

CREATE TABLE `Customer_profile` (
  `Customer_Profile_Id` int(20) NOT NULL DEFAULT '0',
  `Customer_Firstname` varchar(50) DEFAULT NULL,
  `Customer_Lastname` varchar(50) DEFAULT NULL,
  `Customer_Email` varchar(50) DEFAULT NULL,
  `Customer_Contacts` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Login_table`
--

CREATE TABLE `Login_table` (
  `Login_Id` int(20) NOT NULL DEFAULT '0',
  `Login_Username` varchar(50) DEFAULT NULL,
  `Login_Password` varchar(50) DEFAULT NULL,
  `Login_Rank` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login_table`
--

INSERT INTO `Login_table` (`Login_Id`, `Login_Username`, `Login_Password`, `Login_Rank`) VALUES
(0, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(21212, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(43243, 'test', '098f6bcd4621d373cade4e832627b4f6', 2),
(23232323, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Products_table`
--

CREATE TABLE `Products_table` (
  `Product_Id` int(20) NOT NULL DEFAULT '0',
  `Product_Code` varchar(50) DEFAULT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `Product_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products_table`
--

INSERT INTO `Products_table` (`Product_Id`, `Product_Code`, `Product_Name`, `Product_Image`) VALUES
(24234, '234wqe', 'erwer55', '../upload/product-thumbnail.png'),
(4234234, '435342', 'UNGA', '../upload/PACK-Jogoo-Fortified-e1429516590474.png'),
(46547646, '9886876', 'BLUEBAND', '../upload/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_table`
--

CREATE TABLE `Purchase_table` (
  `Purchase_Product_Id` int(20) NOT NULL,
  `Purchase_Payment_Method` varchar(20) DEFAULT NULL,
  `Purchase_Date` varchar(20) DEFAULT NULL,
  `Purchase_Customer_Id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_products`
--

CREATE TABLE `Supplier_products` (
  `Sup_Prod_Id` int(20) NOT NULL,
  `Sup_Prod_Supplier_Id` int(20) DEFAULT NULL,
  `Sup_Prod_Product_Id` int(20) DEFAULT NULL,
  `Sup_Prod_Product_Price` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Supplier_products`
--

INSERT INTO `Supplier_products` (`Sup_Prod_Id`, `Sup_Prod_Supplier_Id`, `Sup_Prod_Product_Id`, `Sup_Prod_Product_Price`) VALUES
(1, 564356, 24234, 3243),
(3, 11, 4234234, 600),
(4, 11, 435342, 300),
(5, 11, 234, 700);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_table`
--

CREATE TABLE `Supplier_table` (
  `Supplier_Id` int(20) NOT NULL DEFAULT '0',
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Supplier_Address` varchar(50) DEFAULT NULL,
  `Supplier_Contact` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Supplier_table`
--

INSERT INTO `Supplier_table` (`Supplier_Id`, `Supplier_Name`, `Supplier_Address`, `Supplier_Contact`) VALUES
(6456, 'user', '11', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category_products`
--
ALTER TABLE `Category_products`
  ADD PRIMARY KEY (`Cate_Pro_Id`);

--
-- Indexes for table `Category_table`
--
ALTER TABLE `Category_table`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `Customer_profile`
--
ALTER TABLE `Customer_profile`
  ADD PRIMARY KEY (`Customer_Profile_Id`);

--
-- Indexes for table `Login_table`
--
ALTER TABLE `Login_table`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `Products_table`
--
ALTER TABLE `Products_table`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `Purchase_table`
--
ALTER TABLE `Purchase_table`
  ADD PRIMARY KEY (`Purchase_Product_Id`);

--
-- Indexes for table `Supplier_products`
--
ALTER TABLE `Supplier_products`
  ADD PRIMARY KEY (`Sup_Prod_Id`);

--
-- Indexes for table `Supplier_table`
--
ALTER TABLE `Supplier_table`
  ADD PRIMARY KEY (`Supplier_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category_table`
--
ALTER TABLE `Category_table`
  MODIFY `Category_Id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Supplier_products`
--
ALTER TABLE `Supplier_products`
  MODIFY `Sup_Prod_Id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
