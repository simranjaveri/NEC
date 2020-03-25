-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 11:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `fld_id` int(10) NOT NULL,
  `fld_username` varchar(30) NOT NULL,
  `fld_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`fld_id`, `fld_username`, `fld_password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbfood`
--

CREATE TABLE `tbfood` (
  `food_id` int(11) NOT NULL,
  `fldvendor_id` int(11) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `cost` bigint(15) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `fldimage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbfood`
--

INSERT INTO `tbfood` (`food_id`, `fldvendor_id`, `foodname`, `cost`, `paymentmode`, `fldimage`) VALUES
(3, 22, 'Rice Stubble', 2500, 'COD', 'ricestub.jpg'),
(4, 23, 'Wheat Stubble', 2500, 'COD', 'wheat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `fld_cart_id` int(11) NOT NULL,
  `fld_product_id` bigint(11) NOT NULL,
  `fld_customer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`fld_cust_id`, `fld_name`, `fld_email`, `fld_mobile`, `password`) VALUES
(1, 'gajender', 'customer1@gmail.com', 7503515382, 'customer1'),
(2, 'sanjay', 'customer2@gmail.com', 7503515386, 'customer2'),
(3, 'saana', 'customer3@gmail.com', 7503515383, 'customer3'),
(7, 'Riddhima', 'riddhimajaveri@gmail.com', 9876543210, 'rid'),
(8, 'Simran Javeri', 'simranjaveri10@gmail.com', 9768293284, 'sim'),
(9, 'payal', 'payal@gmail.com', 9876543218, 'payal'),
(10, 'sourish', 'sourish99@gmail.com', 9876543218, 'sourish'),
(11, 'pearl', 'pearl@gmail.com', 9777777789, 'pearl');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `fld_msg_id` int(10) NOT NULL,
  `fld_name` varchar(50) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_phone` bigint(10) DEFAULT NULL,
  `fld_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`fld_msg_id`, `fld_name`, `fld_email`, `fld_phone`, `fld_msg`) VALUES
(1, 'Simran', 'simranjaveri10@gmail.com', 9768493284, 'Hi'),
(2, 'Simran', 'simranjaveri10@gmail.com', 9768493284, 'hello'),
(3, 'Simran', 'simranjaveri10@gmail.com', 9768493284, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `fld_order_id` int(10) NOT NULL,
  `fld_cart_id` bigint(10) NOT NULL,
  `fldvendor_id` bigint(10) DEFAULT NULL,
  `fld_food_id` bigint(10) DEFAULT NULL,
  `fld_email_id` varchar(50) DEFAULT NULL,
  `fld_payment` varchar(20) DEFAULT NULL,
  `fldstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`fld_order_id`, `fld_cart_id`, `fldvendor_id`, `fld_food_id`, `fld_email_id`, `fld_payment`, `fldstatus`) VALUES
(1, 1, 21, 1, 'customer3@gmail.com', '50', 'Delivered'),
(2, 2, 22, 3, 'customer3@gmail.com', '20', 'Delivered'),
(3, 3, 23, 4, 'simranjaveri10@gmail.com', '1000', 'cancelled'),
(4, 4, 22, 2, 'simranjaveri10@gmail.com', '1200', 'Delivered'),
(5, 5, 23, 5, 'simranjaveri10@gmail.com', '1000', 'cancelled'),
(6, 6, 23, 5, 'simranjaveri10@gmail.com', '1000', 'cancelled'),
(7, 7, 22, 3, 'simranjaveri10@gmail.com', '1200', 'Out of Stock'),
(8, 8, 22, 2, 'simranjaveri10@gmail.com', '1200', 'Delivered'),
(9, 12, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(10, 13, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(11, 14, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(12, 15, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(13, 16, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(14, 17, 23, 5, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(15, 18, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(16, 19, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(17, 21, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(18, 22, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(19, 23, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(20, 25, 23, 5, 'riddhimajaveri@gmail.com', '2500', 'In Process'),
(21, 26, 22, 2, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(22, 27, 22, 3, 'simranjaveri10@gmail.com', '2500', 'Delivered'),
(23, 28, 23, 5, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(24, 29, 23, 5, 'simranjaveri10@gmail.com', '2500', 'cancelled'),
(25, 30, 22, 3, 'payal@gmail.com', '2500', 'Delivered'),
(26, 32, 23, 5, 'payal@gmail.com', '2500', 'In Process'),
(27, 33, 22, 3, 'payal@gmail.com', '2500', 'Out of Stock'),
(28, 34, 22, 2, 'payal@gmail.com', '2500', 'In Process'),
(29, 35, 23, 4, 'sourish99@gmail.com', '2500', 'In Process'),
(30, 36, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(31, 37, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(32, 38, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(33, 39, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(34, 41, 22, 3, 'simranjaveri10@gmail.com', '2500', 'Delivered'),
(35, 40, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(36, 42, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(37, 43, 22, 3, 'pearl@gmail.com', '2500', 'In Process'),
(38, 44, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(39, 46, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(40, 47, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(41, 48, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(42, 49, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(43, 50, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(44, 51, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(45, 52, 23, 4, 'simranjaveri10@gmail.com', '2500', 'In Process'),
(46, 53, 22, 3, 'simranjaveri10@gmail.com', '2500', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `tblvendor`
--

CREATE TABLE `tblvendor` (
  `fldvendor_id` int(10) NOT NULL,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_mob` bigint(10) NOT NULL,
  `fld_phone` bigint(10) NOT NULL,
  `fld_address` varchar(50) NOT NULL,
  `fld_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvendor`
--

INSERT INTO `tblvendor` (`fldvendor_id`, `fld_name`, `fld_email`, `fld_password`, `fld_mob`, `fld_phone`, `fld_address`, `fld_logo`) VALUES
(22, 'Stubble Pickup', 'vendor1@gmail.com', 'vendor1', 7503515386, 114565457, 'noida', 'delivery.jpg'),
(23, 'Stubble Pickup', 'vendor2@gmail.com', 'vendor2', 7503515385, 114565457, 'C-33, SWARN PARK, MUNDKA', 'delivery.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `otp`) VALUES
(4, 'riddhimajaveri@gmail.com', ''),
(5, 'simranjaveri10@gmail.com', ''),
(6, 'payal@gmail.com', '38978'),
(7, 'sourish99@gmail.com', ''),
(8, 'simranjaveri10@gmail.com', ''),
(9, 'pearl@gmail.com', ''),
(10, 'simranjaveri10@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbfood`
--
ALTER TABLE `tbfood`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `fldvendor_id` (`fldvendor_id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`fld_cart_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`fld_cust_id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`fld_msg_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`fld_order_id`);

--
-- Indexes for table `tblvendor`
--
ALTER TABLE `tblvendor`
  ADD PRIMARY KEY (`fldvendor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `fld_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbfood`
--
ALTER TABLE `tbfood`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `fld_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `fld_msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `fld_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tblvendor`
--
ALTER TABLE `tblvendor`
  MODIFY `fldvendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfood`
--
ALTER TABLE `tbfood`
  ADD CONSTRAINT `tbfood_ibfk_1` FOREIGN KEY (`fldvendor_id`) REFERENCES `tblvendor` (`fldvendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
