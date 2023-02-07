-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 06:07 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxibookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `adminid` int(11) NOT NULL,
  `adminnames` varchar(80) NOT NULL,
  `adminphone` varchar(20) NOT NULL,
  `adminemail` varchar(80) NOT NULL,
  `adminpass` varchar(50) NOT NULL,
  `admincreatedon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`adminid`, `adminnames`, `adminphone`, `adminemail`, `adminpass`, `admincreatedon`) VALUES
(1, 'Manager Sammy', '0781110784', 'manager@gmail.com', '1234567', '2022-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtb`
--

CREATE TABLE `bookingtb` (
  `bookingid` int(11) NOT NULL,
  `bookingcode` varchar(255) NOT NULL,
  `customerid` int(11) NOT NULL,
  `taxiid` int(11) NOT NULL,
  `taxiplates` varchar(255) NOT NULL,
  `taxiprices` varchar(100) NOT NULL,
  `customername` varchar(80) NOT NULL,
  `customeremail` varchar(80) NOT NULL,
  `customerphone` varchar(20) NOT NULL,
  `customeraddress` varchar(100) NOT NULL,
  `customergender` varchar(20) NOT NULL,
  `customercountry` varchar(50) NOT NULL,
  `customerpickupaddress` varchar(100) NOT NULL,
  `customerdropaddress` varchar(100) NOT NULL,
  `customerstartdate` varchar(255) NOT NULL,
  `customerstarttime` varchar(255) NOT NULL,
  `status` varchar(80) NOT NULL,
  `paystatus` varchar(80) NOT NULL,
  `drivername` varchar(80) NOT NULL,
  `driverphone` varchar(20) NOT NULL,
  `doneon` varchar(255) NOT NULL,
  `usedtime` varchar(255) NOT NULL,
  `totalpaid` varchar(100) NOT NULL,
  `completedon` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `customerbookedon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtb`
--

INSERT INTO `bookingtb` (`bookingid`, `bookingcode`, `customerid`, `taxiid`, `taxiplates`, `taxiprices`, `customername`, `customeremail`, `customerphone`, `customeraddress`, `customergender`, `customercountry`, `customerpickupaddress`, `customerdropaddress`, `customerstartdate`, `customerstarttime`, `status`, `paystatus`, `drivername`, `driverphone`, `doneon`, `usedtime`, `totalpaid`, `completedon`, `customerbookedon`) VALUES
(1, '1373993954', 1, 1, 'RAC200F', '10000', 'Muhoza Emanuel', 'customer@gmail.com', '0781110784', 'Rubavu,Mbugangari', 'male', 'Rwanda', 'Buhuru,Claire Pub', 'Ndengera Hospital', '2022-09-17', '04:57', 'completed', 'Paid', 'driver@gmail.com', '250781110784', '09/15/2022', '4', '40000', '2022-09-16', '2022-09-15'),
(2, '1010494343', 1, 2, 'RAC200G', '20000', 'Muhoza Emanuel', 'customer@gmail.com', '0781110784', 'Rubavu,Mbugangari', 'male', 'Rwanda', 'Birere', 'Butembo', '2022-09-19', '01:10', 'completed', 'Paid', 'mukesah@gmail.com', '07899908777', '09/17/2022', '11', '220000', '2022-09-17', '2022-09-17'),
(3, '269431308', 1, 2, 'RAC200G', '20000', 'Muhoza Emanuel', 'customer@gmail.com', '0786195938', 'Rubavu,Mbugangari', 'male', 'Rwanda', 'mbuganagri,Pub', 'Hospital Gisenyi', '2022-11-23', '04:19', 'accepted', 'Not Paid', '', '', '11/08/2022', '', '', '2022-11-08 10:13:15', '2022-11-08'),
(4, '661956025', 2, 2, 'RAC200G', '20000', 'samuel', 'samuel@gmail.com', '0786195938', 'Rubavu,Mbugangari', 'male', 'Congo, the Democratic Republic of the', 'Birere', 'ndosho', '2022-11-09', '11:54', 'completed', 'Paid', 'driver@gmail.com', '0784440785', '11/09/2022', '0', '0', '2022-11-09', '2022-11-09'),
(5, '266137745', 2, 1, 'RAC200F', '10000', 'samuel', 'samuel@gmail.com', '0786195938', 'Rubavu,Mbugangari', 'male', 'Congo, the Democratic Republic of the', 'virunga', 'birere', '2022-11-09', '12:59', 'completed', 'Paid', 'mukesah@gmail.com', '0784440785', '11/09/2022', '0', '0', '2022-11-09', '2022-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `customertb`
--

CREATE TABLE `customertb` (
  `customerid` int(11) NOT NULL,
  `customernames` varchar(100) NOT NULL,
  `customeremail` varchar(80) NOT NULL,
  `customerphone` varchar(20) NOT NULL,
  `customeraddress` varchar(100) NOT NULL,
  `customergender` varchar(80) NOT NULL,
  `customercountry` varchar(80) NOT NULL,
  `customerpassword` varchar(80) NOT NULL,
  `customercreatedon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertb`
--

INSERT INTO `customertb` (`customerid`, `customernames`, `customeremail`, `customerphone`, `customeraddress`, `customergender`, `customercountry`, `customerpassword`, `customercreatedon`) VALUES
(1, 'Muhoza Emanuel', 'customer@gmail.com', '0781110784', 'Rubavu,Mbugangari', 'male', 'Rwanda', '1234567', '2022-09-15'),
(2, 'samuel', 'samuel@gmail.com', '0786195938', 'Rubavu,Mbugangari', 'male', 'Congo, the Democratic Republic of the', '12345', '2022-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `driverdb`
--

CREATE TABLE `driverdb` (
  `driverid` int(11) NOT NULL,
  `drivernames` varchar(80) NOT NULL,
  `driverphone` varchar(20) NOT NULL,
  `driveremail` varchar(80) NOT NULL,
  `drivercategory` varchar(50) NOT NULL,
  `driveridnumber` varchar(20) NOT NULL,
  `driverstatus` varchar(50) NOT NULL,
  `addedon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driverdb`
--

INSERT INTO `driverdb` (`driverid`, `drivernames`, `driverphone`, `driveremail`, `drivercategory`, `driveridnumber`, `driverstatus`, `addedon`) VALUES
(1, 'Musoni Frederic', '0784440785', 'driver@gmail.com', 'Category B,C', '1234567890123456', 'active', '2022-09-15'),
(2, 'Musoni Frederic', '0784440782', 'mukesah@gmail.com', 'Category B,C', '2345678906789076', 'active', '2022-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `taxitb`
--

CREATE TABLE `taxitb` (
  `taxiid` int(11) NOT NULL,
  `taxiname` varchar(80) NOT NULL,
  `taxiplate` varchar(50) NOT NULL,
  `taxiseats` varchar(60) NOT NULL,
  `taxiprice` varchar(50) NOT NULL,
  `taxidescription` varchar(255) NOT NULL,
  `taxistatus` varchar(80) NOT NULL,
  `taxiimage` varchar(255) NOT NULL,
  `taxiaddedon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxitb`
--

INSERT INTO `taxitb` (`taxiid`, `taxiname`, `taxiplate`, `taxiseats`, `taxiprice`, `taxidescription`, `taxistatus`, `taxiimage`, `taxiaddedon`) VALUES
(1, 'Royar', 'RAC200F', '7', '10000', 'it is good and have more seats', 'available', 'taxi_guarde.jpg', '2022-09-13'),
(2, 'Picnnics', 'RAC200G', '8', '20000', 'good for picnic and when you have big family ', 'available', 'imgsix.jpg', '2022-09-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintb`
--
ALTER TABLE `admintb`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bookingtb`
--
ALTER TABLE `bookingtb`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `customertb`
--
ALTER TABLE `customertb`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `driverdb`
--
ALTER TABLE `driverdb`
  ADD PRIMARY KEY (`driverid`);

--
-- Indexes for table `taxitb`
--
ALTER TABLE `taxitb`
  ADD PRIMARY KEY (`taxiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintb`
--
ALTER TABLE `admintb`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingtb`
--
ALTER TABLE `bookingtb`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customertb`
--
ALTER TABLE `customertb`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driverdb`
--
ALTER TABLE `driverdb`
  MODIFY `driverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxitb`
--
ALTER TABLE `taxitb`
  MODIFY `taxiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
