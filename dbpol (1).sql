-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 03:15 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpol`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_tbl`
--

CREATE TABLE `doctor_tbl` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_tbl`
--

INSERT INTO `doctor_tbl` (`doctor_id`, `doctor_name`, `specialization`, `contact`, `status`) VALUES
(1, 'Paul Perez', 'Cardiology', '0916788963', 0),
(2, 'Lyndan Pol', 'OB Gyne', '09173213211', 1);

-- --------------------------------------------------------

--
-- Table structure for table `save_table`
--

CREATE TABLE `save_table` (
  `tran_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `sched_date` date NOT NULL,
  `doctor` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_table`
--

INSERT INTO `save_table` (`tran_id`, `full_name`, `age`, `address`, `sched_date`, `doctor`, `contact`) VALUES
(7, 'Billy Joe Santos', 18, 'QC', '2018-03-18', 2, '0931'),
(9, 'Paul Perez Perez', 23, 'Pasay', '2018-03-18', 2, '0943204290');

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`service_id`, `service_name`, `status`) VALUES
(1, 'X-ray', 1),
(2, 'CBC', 1),
(3, 'ECG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_service_tbl`
--

CREATE TABLE `trans_service_tbl` (
  `trans_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_service_tbl`
--

INSERT INTO `trans_service_tbl` (`trans_id`, `service_id`) VALUES
(7, 1),
(7, 1),
(7, 2),
(9, 1),
(9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_tbl`
--
ALTER TABLE `doctor_tbl`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `save_table`
--
ALTER TABLE `save_table`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `doctor` (`doctor`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `trans_service_tbl`
--
ALTER TABLE `trans_service_tbl`
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_tbl`
--
ALTER TABLE `doctor_tbl`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `save_table`
--
ALTER TABLE `save_table`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `save_table`
--
ALTER TABLE `save_table`
  ADD CONSTRAINT `save_table_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `doctor_tbl` (`doctor_id`);

--
-- Constraints for table `trans_service_tbl`
--
ALTER TABLE `trans_service_tbl`
  ADD CONSTRAINT `trans_service_tbl_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service_tbl` (`service_id`),
  ADD CONSTRAINT `trans_service_tbl_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `save_table` (`tran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
