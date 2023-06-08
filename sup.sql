 -- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 11:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medstore`
--
CREATE DATABASE IF NOT EXISTS `medstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `medstore`;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `supp` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `medicine_type` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `supp` (`supplier_id`, `supplier_name`, `contact_number`, `medicine_type`, `email`, `address`) VALUES
( 1, 'maluk', '20','painkiller',  'pos@gmail.com', 'makongeni'),
(2, 'fuluk', '40', 'anti-biotic','ou@gmail.com', 'kuluka'),
(3, 'donal', '30','painkiller',  'ail@gmail.com', 'guluni');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `suppliers`
--
ALTER TABLE `supp`
  ADD PRIMARY KEY (`supplier_id`);
  --
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `supp`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

