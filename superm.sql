-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2017 at 02:41 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `Category_Id` int(20) NOT NULL DEFAULT '0',
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 'ws', 'eac93fc0e5bfbe34e7ec3ab68738f26e', 2),
(3434, '343er', '4fa40b3be9ec7c495528fca1347a74c9', 2),
(21212, 'user', '81dc9bdb52d04dc20036dbd8313ed055', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Products_table`
--

CREATE TABLE `Products_table` (
  `Product_Id` int(20) NOT NULL DEFAULT '0',
  `Product_Code` varchar(50) DEFAULT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `Product_Price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_Product_Id`
--

CREATE TABLE `Purchase_Product_Id` (
  `Purchase_Payment_Method` int(20) DEFAULT NULL,
  `Purchase_Date` varchar(50) DEFAULT NULL,
  `Purchase_Customer_Id` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_products`
--

CREATE TABLE `Supplier_products` (
  `Sup_Prod_Id` int(20) NOT NULL DEFAULT '0',
  `Sup_Prod_Supplier_Id` int(20) DEFAULT NULL,
  `Sup_Prod_Product_Id` int(20) DEFAULT NULL,
  `Sup_Prod_Product_Price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `Purchase_Product_Id`
--
ALTER TABLE `Purchase_Product_Id`
  ADD PRIMARY KEY (`Purchase_Customer_Id`);

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
