-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2017 at 02:43 PM
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
-- Database: `masterghdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydetails_tbl`
--

CREATE TABLE `companydetails_tbl` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_contact` varchar(255) DEFAULT NULL,
  `company_res_add` varchar(255) DEFAULT NULL,
  `company_bill_add` varchar(255) DEFAULT NULL,
  `company__email` varchar(255) DEFAULT NULL,
  `company_description` varchar(255) DEFAULT NULL,
  `company_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1',
  `company_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_accounts_log_tbl`
--

CREATE TABLE `corporate_accounts_log_tbl` (
  `corpLog_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `corp_contact` varchar(255) NOT NULL,
  `corp_contactperson` varchar(255) NOT NULL,
  `corp_email` varchar(255) NOT NULL,
  `corp_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_accounts_log_tbl`
--

INSERT INTO `corporate_accounts_log_tbl` (`corpLog_id`, `corp_id`, `corp_contact`, `corp_contactperson`, `corp_email`, `corp_name`, `status`, `updated_at`) VALUES
(1, 1, '3325192', 'Zander Salvador', 'zingzangzander@yahoo.com', 'CIA', 1, '2017-08-30 15:35:18'),
(2, 2, '2591686', 'Susan Salvador', 'SPS_062869@YAHOO.COM', 'CIS', 1, '2017-08-30 15:35:54'),
(3, 3, '09561565476', 'Hyacinth Elan', 'dropdeadlowww@gmail.com', 'ELAN HOTEL', 1, '2017-08-30 15:38:10'),
(4, 1, '3325192', 'Zander Salvador', 'zingzangzander@yahoo.com', 'CIA', 1, '2017-08-31 05:13:57'),
(5, 1, '3325192', 'Zander Salvador', 'zingzangzander@yahoo.com', 'CIA', 1, '2017-09-08 12:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_accounts_tbl`
--

CREATE TABLE `corporate_accounts_tbl` (
  `corp_id` int(11) NOT NULL,
  `corp_name` varchar(255) NOT NULL,
  `corp_contact` varchar(255) DEFAULT NULL,
  `corp_email` varchar(255) DEFAULT NULL,
  `corp_contactperson` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_accounts_tbl`
--

INSERT INTO `corporate_accounts_tbl` (`corp_id`, `corp_name`, `corp_contact`, `corp_email`, `corp_contactperson`, `status`) VALUES
(1, 'CIA', '3325192', 'zingzangzander@yahoo.com', 'Zander Salvador', 1),
(2, 'CIS', '2591686', 'SPS_062869@YAHOO.COM', 'Susan Salvador', 1),
(3, 'ELAN HOTEL', '09561565476', 'dropdeadlowww@gmail.com', 'Hyacinth Elan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `corp_package_log_tbl`
--

CREATE TABLE `corp_package_log_tbl` (
  `corpPackLog_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_package_log_tbl`
--

INSERT INTO `corp_package_log_tbl` (`corpPackLog_id`, `corp_id`, `price`, `updated_at`) VALUES
(1, 1, 600, '2017-08-30 15:35:18'),
(2, 2, 900, '2017-08-30 15:35:55'),
(3, 3, 2000, '2017-08-30 15:38:10'),
(4, 1, 600, '2017-08-31 05:13:57'),
(5, 1, 600, '2017-09-08 12:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `corp_package_tbl`
--

CREATE TABLE `corp_package_tbl` (
  `corpPack_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_package_tbl`
--

INSERT INTO `corp_package_tbl` (`corpPack_id`, `corp_id`, `price`, `status`) VALUES
(1, 1, 600, 1),
(2, 2, 600, 1),
(3, 3, 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `corp_packserv_log_tbl`
--

CREATE TABLE `corp_packserv_log_tbl` (
  `corpPackLog_id` int(11) NOT NULL,
  `corpPack_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_packserv_log_tbl`
--

INSERT INTO `corp_packserv_log_tbl` (`corpPackLog_id`, `corpPack_id`, `service_id`, `updated_at`) VALUES
(1, 1, 1, '2017-08-30 15:35:18'),
(2, 1, 22, '2017-08-30 15:35:18'),
(3, 1, 24, '2017-08-30 15:35:19'),
(4, 2, 3, '2017-08-30 15:35:55'),
(5, 2, 50, '2017-08-30 15:35:55'),
(6, 2, 52, '2017-08-30 15:35:55'),
(7, 3, 28, '2017-08-30 15:38:10'),
(8, 3, 69, '2017-08-30 15:38:10'),
(9, 1, 1, '2017-08-31 05:13:57'),
(10, 1, 2, '2017-08-31 05:13:57'),
(11, 1, 3, '2017-08-31 05:13:57'),
(12, 1, 22, '2017-08-31 05:13:57'),
(13, 1, 24, '2017-08-31 05:13:58'),
(14, 1, 1, '2017-09-08 12:41:10'),
(15, 1, 2, '2017-09-08 12:41:11'),
(16, 1, 3, '2017-09-08 12:41:11'),
(17, 1, 22, '2017-09-08 12:41:11'),
(18, 1, 24, '2017-09-08 12:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `corp_packserv_tbl`
--

CREATE TABLE `corp_packserv_tbl` (
  `corpPack_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_packserv_tbl`
--

INSERT INTO `corp_packserv_tbl` (`corpPack_id`, `service_id`) VALUES
(2, 3),
(2, 50),
(2, 52),
(3, 28),
(3, 69),
(1, 1),
(1, 2),
(1, 3),
(1, 22),
(1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `employee_access_tbl`
--

CREATE TABLE `employee_access_tbl` (
  `access_id` int(11) NOT NULL,
  `access_module_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `access_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_log_tbl`
--

CREATE TABLE `employee_log_tbl` (
  `empLog_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_mname` varchar(255) DEFAULT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `license_no` varchar(255) DEFAULT NULL,
  `emp_contact` varchar(2555) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `emp_medtech_rank_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log_tbl`
--

INSERT INTO `employee_log_tbl` (`empLog_id`, `emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_address`, `license_no`, `emp_contact`, `updated_at`, `status`, `emp_medtech_rank_id`) VALUES
(1, 1, 'Juan', 'Martinez', 'Dela Cruz', '123 Pascual Street QC', NULL, '9267891', '2017-08-30 16:58:35', 1, NULL),
(2, 2, 'Dina', 'Relatino', 'Makinis', '21 Matatag Brgy Pinyahan QC', NULL, '9072561', '2017-08-30 16:59:43', 1, NULL),
(3, 3, 'Manny', 'Pacman', 'Pacquiao', '245 Times Street QC', NULL, '4561230', '2017-08-30 17:00:31', 1, NULL),
(4, 4, 'Celia', 'Lopez', 'Padua', '7 Kalayaan Avenue Quezon City', NULL, '3325163', '2017-08-30 17:01:16', 1, NULL),
(5, 5, 'Mageline', 'Caturay', 'Alwino', '71 Matapang QC', NULL, '4789546', '2017-08-30 17:02:10', 1, NULL),
(6, 6, 'Leanne', 'Janine', 'Padua', NULL, NULL, NULL, '2017-08-30 17:02:31', 1, NULL),
(7, 7, 'Pamela', 'Naret', ' Padua', NULL, NULL, NULL, '2017-08-30 17:02:49', 1, NULL),
(8, 8, 'Cyrus', 'Luis', 'Padua', NULL, NULL, NULL, '2017-08-30 17:03:01', 1, NULL),
(9, 9, 'Justine', 'Padua', 'Bermudez', NULL, NULL, NULL, '2017-08-30 17:03:17', 1, NULL),
(10, 10, 'Jan', 'Christian', 'Campano', NULL, NULL, NULL, '2017-08-30 17:03:35', 1, NULL),
(11, 11, 'Jan', 'Christian', 'Campano', NULL, NULL, NULL, '2017-08-30 17:03:35', 1, NULL),
(12, 12, 'Joseph', 'Angelo', 'Pasion', 'Quezon City', 'hh-hh-1234', '09054457584', '2017-08-30 17:04:15', 1, 1),
(13, 13, 'Leklek', 'Austin', 'Faustino', '81 Kalayaan Avenue QC', 'hh-hh-1234', '09052496163', '2017-08-30 17:04:55', 1, 2),
(14, 13, 'Leklek', 'Austin', 'Faustino', '81 Kalayaan Avenue QC', 'hh-hh-1233', '09052496163', '2017-08-30 17:06:26', 1, 2),
(15, 14, 'Agripino', 'Padua', 'Lopez', '72 Erod New Manila', 'hh-hh-1235', '09754896781', '2017-08-30 17:07:40', 1, 2),
(16, 15, 'John', 'Paulo', 'Campano', '1235 Cubao Corner Edsa QC', 'hh-hh-0123', '2591686', '2017-08-30 17:08:29', 1, 3),
(17, 16, 'John', 'Campano', 'Piolo', '416 Baker Street QC', 'hh-hh-0122', '4273931', '2017-08-30 17:09:07', 1, 3),
(18, 17, 'Alwyn', 'Negshi', 'Caturay', '201 Quezon Avenue QC', 'hh-hh-0124', '8894561', '2017-08-30 17:09:59', 1, 1),
(19, 18, 'Nicole', 'Ungco', 'Garcia', '12 Mahiyain street brgy central QC', 'hh-hh-1236', '4562178', '2017-08-30 17:10:47', 1, 2),
(20, 19, 'Rex', '', 'Luthor', 'Pasig City', 'hh-hh-1231', '6547891', '2017-08-30 17:12:11', 1, 2),
(21, 20, 'Rosalie', 'Anne', 'Unggos', '13b Maginhawa QC', 'hh-hh-0126', '5478965', '2017-08-30 17:12:46', 1, 3),
(22, 21, 'Lizette', 'Aira ', 'Bermudes', 'Mandaluyong City', 'hh-hh-0125', '6547821', '2017-08-30 17:13:29', 1, 3),
(23, 22, 'Lizette', 'Aira ', 'Bermudes', 'Mandaluyong City', 'hh-hh-0125', '6547821', '2017-08-30 17:13:29', 1, 3),
(24, 23, 'Mark', 'Kristan', 'Delos Reyez', '173 pascual street qc', 'hh-hh-1232', '09547891456', '2017-08-30 17:14:33', 1, 1),
(25, 24, 'Abner', 'Mercado', 'Ekis', 'Quezon City', 'hh-hh-0112', '2561478', '2017-08-30 17:15:08', 1, 2),
(26, 25, 'Abner', 'Gutierrez', 'Mano', '12 roces avenue quezon city', 'hh-hh-1212', '3256478', '2017-08-30 17:15:47', 1, 2),
(27, 26, 'Ella', 'Marquez', 'Lim', '17 New york Cubao QC', 'hh-hh-1213', '6547213', '2017-08-30 17:16:34', 1, 3),
(28, 27, 'Gabriel', 'Munich', 'Karton', 'Caloocan City', 'hh-hh-0113', '5479632', '2017-08-30 17:18:22', 1, 1),
(29, 28, 'Kyle', 'Charlene', 'Duya', '16 Anonas Quezon City', 'hh-hh-0116', '9632456', '2017-08-30 17:19:02', 1, 2),
(30, 29, 'Paolo', 'Gamir', 'Duya', '190 Durian Street Quezon City', 'hh-hh-1238', '6521463', '2017-08-30 17:19:45', 1, 2),
(31, 30, 'Paolo', 'Gamir', 'Duya', '190 Durian Street Quezon City', 'hh-hh-1238', '6521463', '2017-08-30 17:19:45', 1, 2),
(32, 31, 'Rita', 'Escabides', 'Iman', '127 Kanluran Makati City', 'hh-hh-0111', '2589631', '2017-08-30 17:20:35', 1, 3),
(33, 32, 'Rita', 'Escabides', 'Iman', '127 Kanluran Makati City', 'hh-hh-0111', '2589631', '2017-08-30 17:20:35', 1, 3),
(34, 33, 'justine', 'padua', 'bermudez', NULL, NULL, NULL, '2017-08-31 04:01:07', 1, NULL),
(35, 5, 'Mageline', 'Caturay', 'Alwino', '71 Matapang QC', NULL, '4789546', '2017-09-08 04:30:09', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_role_tbl`
--

CREATE TABLE `employee_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_role_tbl`
--

INSERT INTO `employee_role_tbl` (`role_id`, `role_name`, `status`) VALUES
(2, 'Receptionist', 1),
(3, 'Doctor', 1),
(4, 'Radio Technologist', 1),
(5, 'Sonologist', 1),
(6, 'Medical Technologist', 1),
(7, 'Pathologist', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_mname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_type_id` int(11) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_medtech_rank_id` int(11) DEFAULT NULL,
  `license_no` varchar(250) DEFAULT NULL,
  `emp_contact` varchar(255) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_type_id`, `emp_address`, `emp_medtech_rank_id`, `license_no`, `emp_contact`, `status`) VALUES
(1, 'Juan', 'Martinez', 'Dela Cruz', 2, '123 Pascual Street QC', NULL, NULL, '9267891', 1),
(2, 'Dina', 'Relatino', 'Makinis', 2, '21 Matatag Brgy Pinyahan QC', NULL, NULL, '9072561', 1),
(3, 'Manny', 'Pacman', 'Pacquiao', 2, '245 Times Street QC', NULL, NULL, '4561230', 1),
(4, 'Celia', 'Lopez', 'Padua', 2, '7 Kalayaan Avenue Quezon City', NULL, NULL, '3325163', 1),
(5, 'Mageline', 'Caturay', 'Alwino', 2, '71 Matapang QC', NULL, NULL, '4789546', 1),
(6, 'Leanne', 'Janine', 'Padua', 3, NULL, NULL, NULL, NULL, 1),
(7, 'Pamela', 'Naret', ' Padua', 3, NULL, NULL, NULL, NULL, 1),
(8, 'Cyrus', 'Luis', 'Padua', 3, NULL, NULL, NULL, NULL, 1),
(9, 'Justine', 'Padua', 'Bermudez', 3, NULL, NULL, NULL, NULL, 1),
(10, 'Jan', 'Christian', 'Campano', 3, NULL, NULL, NULL, NULL, 0),
(11, 'Jan', 'Christian', 'Campano', 3, NULL, NULL, NULL, NULL, 1),
(12, 'Joseph', 'Angelo', 'Pasion', 4, 'Quezon City', 1, 'hh-hh-1234', '09054457584', 1),
(13, 'Leklek', 'Austin', 'Faustino', 4, '81 Kalayaan Avenue QC', 2, 'hh-hh-1233', '09052496163', 1),
(14, 'Agripino', 'Padua', 'Lopez', 4, '72 Erod New Manila', 2, 'hh-hh-1235', '09754896781', 1),
(15, 'John', 'Paulo', 'Campano', 4, '1235 Cubao Corner Edsa QC', 3, 'hh-hh-0123', '2591686', 1),
(16, 'John', 'Campano', 'Piolo', 4, '416 Baker Street QC', 3, 'hh-hh-0122', '4273931', 1),
(17, 'Alwyn', 'Negshi', 'Caturay', 5, '201 Quezon Avenue QC', 1, 'hh-hh-0124', '8894561', 1),
(18, 'Nicole', 'Ungco', 'Garcia', 5, '12 Mahiyain street brgy central QC', 2, 'hh-hh-1236', '4562178', 1),
(19, 'Rex', '', 'Luthor', 5, 'Pasig City', 2, 'hh-hh-1231', '6547891', 1),
(20, 'Rosalie', 'Anne', 'Unggos', 5, '13b Maginhawa QC', 3, 'hh-hh-0126', '5478965', 1),
(21, 'Lizette', 'Aira ', 'Bermudes', 5, 'Mandaluyong City', 3, 'hh-hh-0125', '6547821', 1),
(22, 'Lizette', 'Aira ', 'Bermudes', 5, 'Mandaluyong City', 3, 'hh-hh-0125', '6547821', 0),
(23, 'Mark', 'Kristan', 'Delos Reyez', 6, '173 pascual street qc', 1, 'hh-hh-1232', '09547891456', 1),
(24, 'Abner', 'Mercado', 'Ekis', 6, 'Quezon City', 2, 'hh-hh-0112', '2561478', 1),
(25, 'Abner', 'Gutierrez', 'Mano', 6, '12 roces avenue quezon city', 2, 'hh-hh-1212', '3256478', 1),
(26, 'Ella', 'Marquez', 'Lim', 6, '17 New york Cubao QC', 3, 'hh-hh-1213', '6547213', 1),
(27, 'Gabriel', 'Munich', 'Karton', 7, 'Caloocan City', 1, 'hh-hh-0113', '5479632', 1),
(28, 'Kyle', 'Charlene', 'Duya', 7, '16 Anonas Quezon City', 2, 'hh-hh-0116', '9632456', 1),
(29, 'Paolo', 'Gamir', 'Duya', 7, '190 Durian Street Quezon City', 2, 'hh-hh-1238', '6521463', 1),
(30, 'Paolo', 'Gamir', 'Duya', 7, '190 Durian Street Quezon City', 2, 'hh-hh-1238', '6521463', 1),
(31, 'Rita', 'Escabides', 'Iman', 7, '127 Kanluran Makati City', 3, 'hh-hh-0111', '2589631', 0),
(32, 'Rita', 'Escabides', 'Iman', 7, '127 Kanluran Makati City', 3, 'hh-hh-0111', '2589631', 1),
(33, 'justine', 'padua', 'bermudez', 3, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emprebate_log_tbl`
--

CREATE TABLE `emprebate_log_tbl` (
  `empRebate_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `rebate_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprebate_log_tbl`
--

INSERT INTO `emprebate_log_tbl` (`empRebate_id`, `emp_id`, `rebate_id`, `updated_at`) VALUES
(1, 8, 1, '2017-08-30 17:23:21'),
(2, 7, 1, '2017-08-30 17:24:12'),
(3, 6, 2, '2017-09-08 05:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `emp_rebate_tbl`
--

CREATE TABLE `emp_rebate_tbl` (
  `empReb_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `rebate_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_rebate_tbl`
--

INSERT INTO `emp_rebate_tbl` (`empReb_id`, `emp_id`, `rebate_id`, `status`) VALUES
(1, 8, 1, 1),
(2, 7, 1, 0),
(3, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medtech_rank`
--

CREATE TABLE `medtech_rank` (
  `rank_id` int(11) NOT NULL,
  `rank_name` varchar(20) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medtech_rank`
--

INSERT INTO `medtech_rank` (`rank_id`, `rank_name`, `status`) VALUES
(1, 'Chief', 1),
(2, 'Senior', 1),
(3, 'Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_tbl`
--

CREATE TABLE `module_tbl` (
  `module_id` int(11) NOT NULL,
  `module_part` varchar(20) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_detail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_log_tbl`
--

CREATE TABLE `package_log_tbl` (
  `packageLog_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_log_tbl`
--

INSERT INTO `package_log_tbl` (`packageLog_id`, `pack_id`, `pack_name`, `pack_price`, `updated_at`, `status`) VALUES
(1, 1, 'CIA', 1000, '2017-08-30 15:25:36', 1),
(2, 2, 'CIS', 200, '2017-08-30 15:26:07', 1),
(3, 3, 'Normal Package', 2000, '2017-08-30 17:25:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_service_log_tbl`
--

CREATE TABLE `package_service_log_tbl` (
  `packserv_package_id` int(11) NOT NULL,
  `packserv_serv_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_service_log_tbl`
--

INSERT INTO `package_service_log_tbl` (`packserv_package_id`, `packserv_serv_id`, `updated_at`, `status`) VALUES
(1, 1, '2017-08-30 15:25:37', 1),
(1, 3, '2017-08-30 15:25:37', 1),
(1, 21, '2017-08-30 15:25:37', 1),
(2, 1, '2017-08-30 15:26:08', 1),
(2, 28, '2017-08-30 15:26:08', 1),
(2, 68, '2017-08-30 15:26:08', 1),
(2, 1, '2017-08-30 15:26:12', 1),
(2, 28, '2017-08-30 15:26:13', 1),
(2, 68, '2017-08-30 15:26:13', 1),
(3, 1, '2017-08-30 17:25:48', 1),
(3, 2, '2017-08-30 17:25:48', 1),
(3, 19, '2017-08-30 17:25:48', 1),
(3, 75, '2017-08-30 17:25:48', 1),
(3, 110, '2017-08-30 17:25:48', 1),
(3, 1, '2017-09-08 12:24:56', 1),
(3, 2, '2017-09-08 12:24:56', 1),
(3, 19, '2017-09-08 12:24:56', 1),
(3, 75, '2017-09-08 12:24:56', 1),
(3, 110, '2017-09-08 12:24:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_service_tbl`
--

CREATE TABLE `package_service_tbl` (
  `pack_serv_package_id` int(11) NOT NULL,
  `pack_serv_serv_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_service_tbl`
--

INSERT INTO `package_service_tbl` (`pack_serv_package_id`, `pack_serv_serv_id`, `status`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 21, 1),
(2, 1, 1),
(2, 28, 1),
(2, 68, 1),
(3, 1, 1),
(3, 2, 1),
(3, 19, 1),
(3, 75, 1),
(3, 110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_tbl`
--

CREATE TABLE `package_tbl` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_tbl`
--

INSERT INTO `package_tbl` (`pack_id`, `pack_name`, `pack_price`, `status`) VALUES
(1, 'CIA', 1000, 0),
(2, 'CIS', 2000, 0),
(3, 'Normal Package', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_log_tbl`
--

CREATE TABLE `patient_log_tbl` (
  `patientLog_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(255) DEFAULT NULL,
  `patient_mname` varchar(255) DEFAULT NULL,
  `patient_lname` varchar(255) DEFAULT NULL,
  `patient_address` varchar(255) DEFAULT NULL,
  `patient_contact` varchar(255) DEFAULT NULL,
  `patient_birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `patient_gender` varchar(255) DEFAULT NULL,
  `patient_type_id` int(11) DEFAULT NULL,
  `patient_corp_id` int(11) DEFAULT NULL,
  `patient_civilstatus` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_log_tbl`
--

INSERT INTO `patient_log_tbl` (`patientLog_id`, `patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_address`, `patient_contact`, `patient_birthdate`, `age`, `patient_gender`, `patient_type_id`, `patient_corp_id`, `patient_civilstatus`, `updated_at`) VALUES
(1, 1, 'Susan', 'Kenney', 'Pulliam', '4092 Wyatt Street Boca Raton, FL 33487', '561-443-2112', '1987-02-11', 30, 'Female', 1, NULL, 'Married', '2017-08-30 15:47:55'),
(2, 2, 'Stephanie', 'Aronson', 'Challinor', '1 Kalayaan Avenue Diliman QC', '09561565476', '1982-12-02', 34, 'Female', 1, NULL, 'Widowed', '2017-08-30 15:51:21'),
(3, 3, 'Mikayla ', 'Ivory', 'Peterson', '2 Kalayaan Avenue Diliman QC', '09561565470', '1994-02-04', 23, 'Male', 1, NULL, 'Single', '2017-08-30 15:52:23'),
(4, 4, 'Iris Gabrielle', 'Tiri', 'Padua', '87 Kalayaan Avenue Diliman Quezon City', '3325192', '2012-06-16', 5, 'Female', 1, NULL, 'Single', '2017-08-30 15:53:03'),
(5, 5, 'Jennifer', 'Lewers', 'Heathcote', '69 Greenholt Bypass, Silay City 4485 Davao del Norte', '633-690-660', '1978-07-18', 39, 'Male', 1, NULL, 'Divorced', '2017-08-30 15:55:27'),
(6, 6, 'Benton', 'Neng', 'Farrell', '88A Bradtke Crescent Apt. 172, Poblacion, Silay 8499 South Cotabato', '391-835-686', '2010-09-15', 6, 'Male', 1, NULL, 'Single', '2017-08-30 15:57:22'),
(7, 7, 'Annabel', 'Cruz', 'Sawayn', 'Antipolo Simbahan', '411-785-8', '1978-10-12', 38, 'Female', 1, NULL, 'Married', '2017-08-30 16:04:39'),
(8, 8, 'Wade', 'Sabado', 'Konopelski', '53A/20 Pagac Port, Poblacion, Quezon City', '890-665-7', '1951-09-08', 65, 'Male', 1, NULL, 'Married', '2017-08-30 16:05:38'),
(9, 9, 'Susana', 'Namor', 'Salvador', 'Sierra Madre Antplo', '6504882', '1956-10-15', 60, 'Female', 1, NULL, 'Widowed', '2017-08-30 16:07:03'),
(10, 10, 'Rodel', 'Garena', 'Salvador', ' Golden Acres Subd LP', '8006360', '1981-12-06', 35, 'Male', 1, NULL, 'Married', '2017-08-30 16:08:19'),
(11, 11, 'Anne Francia', 'Alegre', 'Torres', '54 Rd 3 QC', '9294460', '1949-12-04', 67, 'Female', 1, NULL, 'Widowed', '2017-08-30 16:09:47'),
(12, 12, 'John', 'De Guzman', 'Kuvalis', '4 Crest Line QC', '6476774', '1949-11-09', 67, 'Male', 1, NULL, 'Divorced', '2017-08-30 16:10:55'),
(13, 13, 'Naomi', 'San Diego', 'Cruz', 'Emapalico Homes LP', '8726383', '1978-04-10', 39, 'Female', 1, NULL, 'Married', '2017-08-30 16:11:51'),
(14, 14, 'Paul', 'Nayt', 'Santos', 'Villa Verde Hms QC', '9356050', '1979-10-15', 37, 'Male', 1, NULL, 'Single', '2017-08-30 16:12:47'),
(15, 15, 'Cecil ', 'Bernards', 'Emard', 'Camella Twnhms LP', '5669184', '1992-12-12', 24, 'Female', 1, NULL, 'Single', '2017-08-30 16:15:13'),
(16, 16, 'Aileen ', '', 'Wilderman', '18L Virata PC', '8537182', '1959-12-09', 57, 'Female', 1, NULL, 'Divorced', '2017-08-30 16:15:59'),
(17, 17, 'Jeffrey', 'Raul', 'Santos ', '29 Dr Sixto Antonio Av Psg', '6411446', '1985-12-31', 31, 'Male', 1, NULL, 'Single', '2017-08-30 16:16:43'),
(18, 18, 'Lessie', 'Nyeam', 'Jacobson Sr.', 'Marietta Romeo Subd Psg', '6565457', '1969-01-21', 48, 'Male', 1, NULL, 'Married', '2017-08-30 16:17:46'),
(19, 19, 'Alfredo', 'Corgy', 'Vargas Jr.', 'Aristocrat Vill LP', '5665486', '1973-12-14', 43, 'Male', 1, NULL, 'Married', '2017-08-30 16:19:10'),
(20, 20, 'Orrin ', 'Next', 'Zulauf', 'Pacita Cmplx 1 SPL', '8476472', '1997-12-09', 19, 'Male', 1, NULL, 'Single', '2017-08-30 16:20:40'),
(21, 21, 'Maria', 'Labuf', 'Carmin', 'Marcos Hwy Antplo', '6469613', '1992-12-19', 24, 'Female', 1, NULL, 'Single', '2017-08-30 16:21:49'),
(22, 22, 'Earlene', 'Luba', 'Conn', ' 20 K 7th St', '4156870', '1998-01-02', 19, 'Male', 1, NULL, 'Single', '2017-08-30 16:22:27'),
(23, 23, 'Arlene', 'Verano', 'Luettgen', '6158 Gabaldon Mkti', '8968212', '1967-02-02', 50, 'Male', 1, NULL, 'Married', '2017-08-30 16:23:34'),
(24, 24, 'Salvador', 'Luna', 'Manuel', ' 1628 J Luna Mla', '2531302', '1971-03-02', 46, 'Male', 1, NULL, 'Divorced', '2017-08-30 16:24:15'),
(25, 25, 'Noemi', 'Ybardolaza', 'Morato', 'Equity Homes Pque', '5457392', '1992-04-14', 25, 'Female', 1, NULL, 'Single', '2017-08-30 16:25:31'),
(26, 26, 'Arlene', '', 'Dela Cruz', ' 560 Corcuera Mla', '2562001', '1991-05-16', 26, 'Female', 2, 3, 'Single', '2017-08-30 16:31:21'),
(27, 27, 'Joselito', 'Lelis', 'Corcuera', 'Antipolo City', '5423949', '0169-06-07', 1848, 'Male', 2, 2, 'Married', '2017-08-30 16:32:08'),
(28, 28, 'Maricon', 'Banas', 'Consuelo', 'Greenpark Hms', '8293592', '1967-07-18', 50, 'Female', 1, NULL, 'Married', '2017-08-30 16:32:51'),
(29, 29, 'Maridel', 'Lelis', 'De Belen', 'Laguna st Proj 8', '9982471', '1998-06-12', 19, 'Female', 2, 2, 'Married', '2017-08-30 16:33:32'),
(30, 30, 'Lalaine ', 'Lelis', 'De Belem', '26 Laguna St Proj 8', '8534029', '1991-08-19', 26, 'Female', 2, 2, 'Divorced', '2017-08-30 16:34:31'),
(31, 31, 'Janis', 'De Belen', 'Lelis', ' 4979 Col E De Leon Pque', '6405406', '0176-08-12', 1841, 'Female', 1, NULL, 'Married', '2017-08-30 16:34:56'),
(32, 32, 'Abigail', 'Consuelo', 'Layug', ' 480 Boni Av Mand', '5323175', '1987-12-12', 29, 'Female', 1, NULL, 'Married', '2017-08-30 16:35:25'),
(33, 33, 'Reynald ', 'Chris', 'Layug', '3421 Maui Oasis Qc', '4511155', '1998-12-12', 18, 'Male', 2, 3, 'Single', '2017-08-30 16:36:21'),
(34, 34, 'Froilan', 'Chavez', 'Desuyo', '24 Ibayo Binangonan', '4511155', '1988-05-05', 29, 'Male', 2, 3, 'Single', '2017-08-30 16:37:07'),
(35, 35, 'Darlene', 'Samson', 'De Guia', ' 111 Pasolo Val', '2932916', '1982-05-02', 35, 'Female', 2, 2, 'Single', '2017-08-30 16:37:52'),
(36, 36, 'Manuel', 'Mana', 'Sablan', ' 30 Sampaguita KC', '3647761', '1991-05-02', 26, 'Male', 1, NULL, 'Married', '2017-08-30 16:38:25'),
(37, 37, 'Susan', 'Libunao', 'Vargas', ' Crismarcel Subd LP', '5667613', '1987-02-12', 30, 'Female', 2, 3, 'Single', '2017-08-30 16:39:24'),
(38, 38, 'Susana', 'Vargas', 'Regreto', ' Far East Asia Vill Antplo', '4578206', '1979-06-12', 38, 'Female', 2, 2, 'Married', '2017-08-30 16:40:14'),
(39, 39, 'Maricel', 'Campano', 'Waren', ' 1692 F Munoz PC', '5125128', '1988-04-11', 29, 'Female', 2, 1, 'Married', '2017-08-30 16:40:57'),
(40, 40, 'Mark', 'Daniel', 'Bolima', ' 122-B E Abada QC', '9244286', '1969-12-12', 47, 'Male', 2, 2, 'Married', '2017-08-30 16:41:44'),
(41, 41, 'Christopher', 'Santa Maria', 'Martinez', ' 2547-B Sto Nino Mla', '5629873', '1991-05-12', 26, 'Male', 1, NULL, 'Single', '2017-08-30 16:42:20'),
(42, 42, 'Chris', 'Manoy', 'Kaloy', ' 112-B E Abada QC', '6234156', '1979-12-22', 37, 'Male', 2, 3, 'Married', '2017-08-30 16:43:11'),
(43, 43, 'Roberto', 'Ligwak', 'Sto Domingo ', ' 1531C A Isip Mla', '5610198', '1981-06-06', 36, 'Male', 1, NULL, 'Single', '2017-08-30 16:44:38'),
(44, 44, 'Berts', 'Sto Domingo', 'Ligwak', 'Ermita Manila', '7631234', '1978-02-28', 39, 'Male', 2, 1, 'Single', '2017-08-30 16:45:51'),
(45, 45, 'Robert', 'Naval', 'Tito', ' 117-D Gomez', '4103792', '1979-05-25', 38, 'Male', 2, 2, 'Married', '2017-08-30 16:46:47'),
(46, 46, 'Joanna', 'Miclat', 'Sidayen', 'Antipolo Simbahan', '4343963', '1993-12-27', 23, 'Female', 2, 3, 'Single', '2017-08-30 16:47:36'),
(47, 47, 'Princess Rohaydah', 'Adiong', 'Sacar', '19 Matapang', '4343962', '1996-07-18', 21, 'Female', 2, 1, 'Single', '2017-08-30 16:48:26'),
(48, 48, 'Princess Rohaynah', 'Adiong', 'Sacar', '19 Matapang', '4343963', '1996-07-18', 21, 'Female', 2, 1, 'Single', '2017-08-30 16:49:38'),
(49, 49, 'Emmanuel', 'Ardiente', 'Lacson', ' 91 Gen Luna Mal', '2818249', '1991-05-18', 26, 'Male', 2, 2, 'Single', '2017-08-30 16:52:54'),
(50, 50, 'Ivy', 'Aguas', 'Ardiente', 'East Avenue QC', '6239876', '1970-08-10', 47, 'Female', 2, 3, 'Widowed', '2017-08-30 16:53:38'),
(51, 51, 'Zenia', 'La', 'Guevara', 'Pup', '094334', '1998-04-15', 19, 'Female', 2, 1, 'Single', '2017-08-31 05:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tbl`
--

CREATE TABLE `patient_tbl` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(255) NOT NULL,
  `patient_mname` varchar(255) DEFAULT NULL,
  `patient_lname` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_contact` varchar(255) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `patient_gender` varchar(6) NOT NULL,
  `patient_type_id` int(11) NOT NULL,
  `patient_corp_id` int(11) DEFAULT NULL,
  `patient_civilstatus` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `claimCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_tbl`
--

INSERT INTO `patient_tbl` (`patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_address`, `patient_contact`, `patient_birthdate`, `age`, `patient_gender`, `patient_type_id`, `patient_corp_id`, `patient_civilstatus`, `status`, `claimCode`) VALUES
(1, 'Susan', 'Kenney', 'Pulliam', '4092 Wyatt Street Boca Raton, FL 33487', '561-443-2112', '1987-02-11', 30, 'Female', 1, NULL, 'Married', 1, '2017-4H9C'),
(2, 'Stephanie', 'Aronson', 'Challinor', '1 Kalayaan Avenue Diliman QC', '09561565476', '1982-12-02', 34, 'Female', 1, NULL, 'Widowed', 1, '2017-O28A'),
(3, 'Mikayla ', 'Ivory', 'Peterson', '2 Kalayaan Avenue Diliman QC', '09561565470', '1994-02-04', 23, 'Male', 1, NULL, 'Single', 1, '2017-9KCF'),
(4, 'Iris Gabrielle', 'Tiri', 'Padua', '87 Kalayaan Avenue Diliman Quezon City', '3325192', '2012-06-16', 5, 'Female', 1, NULL, 'Single', 1, '2017-0DE5'),
(5, 'Jennifer', 'Lewers', 'Heathcote', '69 Greenholt Bypass, Silay City 4485 Davao del Norte', '633-690-660', '1978-07-18', 39, 'Male', 1, NULL, 'Divorced', 1, '2017-MLFK'),
(6, 'Benton', 'Neng', 'Farrell', '88A Bradtke Crescent Apt. 172, Poblacion, Silay 8499 South Cotabato', '391-835-686', '2010-09-15', 6, 'Male', 1, NULL, 'Single', 1, '2017-G80U'),
(7, 'Annabel', 'Cruz', 'Sawayn', 'Antipolo Simbahan', '411-785-8', '1978-10-12', 38, 'Female', 1, NULL, 'Married', 1, '2017-4I97'),
(8, 'Wade', 'Sabado', 'Konopelski', '53A/20 Pagac Port, Poblacion, Quezon City', '890-665-7', '1951-09-08', 65, 'Male', 1, NULL, 'Married', 1, '2017-KRAB'),
(9, 'Susana', 'Namor', 'Salvador', 'Sierra Madre Antplo', '6504882', '1956-10-15', 60, 'Female', 1, NULL, 'Widowed', 1, '2017-GVTQ'),
(10, 'Rodel', 'Garena', 'Salvador', ' Golden Acres Subd LP', '8006360', '1981-12-06', 35, 'Male', 1, NULL, 'Married', 1, '2017-CN8X'),
(11, 'Anne Francia', 'Alegre', 'Torres', '54 Rd 3 QC', '9294460', '1949-12-04', 67, 'Female', 1, NULL, 'Widowed', 1, '2017-7ZQV'),
(12, 'John', 'De Guzman', 'Kuvalis', '4 Crest Line QC', '6476774', '1949-11-09', 67, 'Male', 1, NULL, 'Divorced', 1, '2017-XTJH'),
(13, 'Naomi', 'San Diego', 'Cruz', 'Emapalico Homes LP', '8726383', '1978-04-10', 39, 'Female', 1, NULL, 'Married', 1, '2017-63MJ'),
(14, 'Paul', 'Nayt', 'Santos', 'Villa Verde Hms QC', '9356050', '1979-10-15', 37, 'Male', 1, NULL, 'Single', 1, '2017-802B'),
(15, 'Cecil ', 'Bernards', 'Emard', 'Camella Twnhms LP', '5669184', '1992-12-12', 24, 'Female', 1, NULL, 'Single', 1, '2017-H9RX'),
(16, 'Aileen ', '', 'Wilderman', '18L Virata PC', '8537182', '1959-12-09', 57, 'Female', 1, NULL, 'Divorced', 1, '2017-U24Y'),
(17, 'Jeffrey', 'Raul', 'Santos ', '29 Dr Sixto Antonio Av Psg', '6411446', '1985-12-31', 31, 'Male', 1, NULL, 'Single', 1, '2017-7DH0'),
(18, 'Lessie', 'Nyeam', 'Jacobson Sr.', 'Marietta Romeo Subd Psg', '6565457', '1969-01-21', 48, 'Male', 1, NULL, 'Married', 1, '2017-SRJU'),
(19, 'Alfredo', 'Corgy', 'Vargas Jr.', 'Aristocrat Vill LP', '5665486', '1973-12-14', 43, 'Male', 1, NULL, 'Married', 1, '2017-1EL6'),
(20, 'Orrin ', 'Next', 'Zulauf', 'Pacita Cmplx 1 SPL', '8476472', '1997-12-09', 19, 'Male', 1, NULL, 'Single', 1, '2017-QDC9'),
(21, 'Maria', 'Labuf', 'Carmin', 'Marcos Hwy Antplo', '6469613', '1992-12-19', 24, 'Female', 1, NULL, 'Single', 1, '2017-T5AR'),
(22, 'Earlene', 'Luba', 'Conn', ' 20 K 7th St', '4156870', '1998-01-02', 19, 'Male', 1, NULL, 'Single', 1, '2017-GY8L'),
(23, 'Arlene', 'Verano', 'Luettgen', '6158 Gabaldon Mkti', '8968212', '1967-02-02', 50, 'Male', 1, NULL, 'Married', 1, '2017-9XAP'),
(24, 'Salvador', 'Luna', 'Manuel', ' 1628 J Luna Mla', '2531302', '1971-03-02', 46, 'Male', 1, NULL, 'Divorced', 1, '2017-G67Z'),
(25, 'Noemi', 'Ybardolaza', 'Morato', 'Equity Homes Pque', '5457392', '1992-04-14', 25, 'Female', 1, NULL, 'Single', 1, '2017-6P4K'),
(26, 'Arlene', '', 'Dela Cruz', ' 560 Corcuera Mla', '2562001', '1991-05-16', 26, 'Female', 2, 3, 'Single', 1, '2017-PGUA'),
(27, 'Joselito', 'Lelis', 'Corcuera', 'Antipolo City', '5423949', '0169-06-07', 1848, 'Male', 2, 2, 'Married', 1, '2017-FOB4'),
(28, 'Maricon', 'Banas', 'Consuelo', 'Greenpark Hms', '8293592', '1967-07-18', 50, 'Female', 1, NULL, 'Married', 1, '2017-6VWF'),
(29, 'Maridel', 'Lelis', 'De Belen', 'Laguna st Proj 8', '9982471', '1998-06-12', 19, 'Female', 2, 2, 'Married', 1, '2017-FZES'),
(30, 'Lalaine ', 'Lelis', 'De Belem', '26 Laguna St Proj 8', '8534029', '1991-08-19', 26, 'Female', 2, 2, 'Divorced', 1, '2017-NH2P'),
(31, 'Janis', 'De Belen', 'Lelis', ' 4979 Col E De Leon Pque', '6405406', '0176-08-12', 1841, 'Female', 1, NULL, 'Married', 1, '2017-2W39'),
(32, 'Abigail', 'Consuelo', 'Layug', ' 480 Boni Av Mand', '5323175', '1987-12-12', 29, 'Female', 1, NULL, 'Married', 1, '2017-379Y'),
(33, 'Reynald ', 'Chris', 'Layug', '3421 Maui Oasis Qc', '4511155', '1998-12-12', 18, 'Male', 2, 3, 'Single', 1, '2017-QN1Y'),
(34, 'Froilan', 'Chavez', 'Desuyo', '24 Ibayo Binangonan', '4511155', '1988-05-05', 29, 'Male', 2, 3, 'Single', 1, '2017-45QZ'),
(35, 'Darlene', 'Samson', 'De Guia', ' 111 Pasolo Val', '2932916', '1982-05-02', 35, 'Female', 2, 2, 'Single', 1, '2017-VX08'),
(36, 'Manuel', 'Mana', 'Sablan', ' 30 Sampaguita KC', '3647761', '1991-05-02', 26, 'Male', 1, NULL, 'Married', 1, '2017-JTEM'),
(37, 'Susan', 'Libunao', 'Vargas', ' Crismarcel Subd LP', '5667613', '1987-02-12', 30, 'Female', 2, 3, 'Single', 1, '2017-XF4H'),
(38, 'Susana', 'Vargas', 'Regreto', ' Far East Asia Vill Antplo', '4578206', '1979-06-12', 38, 'Female', 2, 2, 'Married', 1, '2017-XIWQ'),
(39, 'Maricel', 'Campano', 'Waren', ' 1692 F Munoz PC', '5125128', '1988-04-11', 29, 'Female', 2, 1, 'Married', 1, '2017-DZI9'),
(40, 'Mark', 'Daniel', 'Bolima', ' 122-B E Abada QC', '9244286', '1969-12-12', 47, 'Male', 2, 2, 'Married', 1, '2017-76T8'),
(41, 'Christopher', 'Santa Maria', 'Martinez', ' 2547-B Sto Nino Mla', '5629873', '1991-05-12', 26, 'Male', 1, NULL, 'Single', 1, '2017-RZ9F'),
(42, 'Chris', 'Manoy', 'Kaloy', ' 112-B E Abada QC', '6234156', '1979-12-22', 37, 'Male', 2, 3, 'Married', 1, '2017-B6JR'),
(43, 'Roberto', 'Ligwak', 'Sto Domingo ', ' 1531C A Isip Mla', '5610198', '1981-06-06', 36, 'Male', 1, NULL, 'Single', 1, '2017-6B21'),
(44, 'Berts', 'Sto Domingo', 'Ligwak', 'Ermita Manila', '7631234', '1978-02-28', 39, 'Male', 2, 1, 'Single', 1, '2017-OI10'),
(45, 'Robert', 'Naval', 'Tito', ' 117-D Gomez', '4103792', '1979-05-25', 38, 'Male', 2, 2, 'Married', 1, '2017-SVX7'),
(46, 'Joanna', 'Miclat', 'Sidayen', 'Antipolo Simbahan', '4343963', '1993-12-27', 23, 'Female', 2, 3, 'Single', 1, '2017-O57P'),
(47, 'Princess Rohaydah', 'Adiong', 'Sacar', '19 Matapang', '4343962', '1996-07-18', 21, 'Female', 2, 1, 'Single', 1, '2017-43N7'),
(48, 'Princess Rohaynah', 'Adiong', 'Sacar', '19 Matapang', '4343963', '1996-07-18', 21, 'Female', 2, 1, 'Single', 1, '2017-0OSQ'),
(49, 'Emmanuel', 'Ardiente', 'Lacson', ' 91 Gen Luna Mal', '2818249', '1991-05-18', 26, 'Male', 2, 2, 'Single', 1, '2017-259B'),
(50, 'Ivy', 'Aguas', 'Ardiente', 'East Avenue QC', '6239876', '1970-08-10', 47, 'Female', 2, 3, 'Widowed', 1, '2017-DJW4'),
(51, 'Zenia', 'La', 'Guevara', 'Pup', '094334', '1998-04-15', 19, 'Female', 2, 1, 'Single', 1, '2017-0IJY');

-- --------------------------------------------------------

--
-- Table structure for table `patient_type_tbl`
--

CREATE TABLE `patient_type_tbl` (
  `ptype_id` int(11) NOT NULL,
  `ptype_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_type_tbl`
--

INSERT INTO `patient_type_tbl` (`ptype_id`, `ptype_name`, `status`) VALUES
(1, 'Individual', 1),
(2, 'Corporate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rebate_tbl`
--

CREATE TABLE `rebate_tbl` (
  `rebate_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rebate_tbl`
--

INSERT INTO `rebate_tbl` (`rebate_id`, `percentage`, `created_at`, `status`) VALUES
(1, 10, '2017-08-30 17:23:13', 1),
(2, 20, '2017-09-08 05:24:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rolefields_tbl`
--

CREATE TABLE `rolefields_tbl` (
  `role_id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `name` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL,
  `rebate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolefields_tbl`
--

INSERT INTO `rolefields_tbl` (`role_id`, `address`, `username`, `password`, `rank`, `license`, `contact`, `name`, `status`, `rebate`) VALUES
(1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(2, 1, 1, 1, 0, 0, 1, 1, 1, 0),
(3, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(4, 1, 0, 0, 1, 1, 1, 1, 1, 0),
(5, 1, 0, 0, 1, 1, 1, 1, 1, 0),
(6, 1, 0, 0, 1, 1, 1, 1, 1, 0),
(7, 1, 0, 0, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `servgroup_log_tbl`
--

CREATE TABLE `servgroup_log_tbl` (
  `servgroupLog_id` int(11) NOT NULL,
  `servgroup_id` int(11) NOT NULL,
  `servgroup_name` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servgroup_log_tbl`
--

INSERT INTO `servgroup_log_tbl` (`servgroupLog_id`, `servgroup_id`, `servgroup_name`, `updated_at`, `status`) VALUES
(1, 1, 'HEMATOLOGY', '2017-08-30 14:30:14', 1),
(2, 2, 'MICROBIOLOGY', '2017-08-30 14:33:39', 1),
(3, 3, 'HEPATITIS PROFILE', '2017-08-30 14:33:46', 1),
(4, 4, 'CLINICAL CHEMISTRY', '2017-08-30 14:33:57', 1),
(5, 5, 'SEROLOGY', '2017-08-30 14:34:06', 1),
(6, 6, 'IMMUNOLOGY', '2017-08-30 14:34:15', 1),
(7, 4, 'CLINICAL CHEMISTRY', '2017-09-08 06:01:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_group_tbl`
--

CREATE TABLE `service_group_tbl` (
  `servgroup_id` int(11) NOT NULL,
  `servgroup_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_group_tbl`
--

INSERT INTO `service_group_tbl` (`servgroup_id`, `servgroup_name`, `status`) VALUES
(1, 'HEMATOLOGY', 1),
(2, 'MICROBIOLOGY', 1),
(3, 'HEPATITIS PROFILE', 1),
(4, 'CLINICAL CHEMISTRY', 1),
(5, 'SEROLOGY', 1),
(6, 'IMMUNOLOGY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_log_tbl`
--

CREATE TABLE `service_log_tbl` (
  `serviceLog_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_log_tbl`
--

INSERT INTO `service_log_tbl` (`serviceLog_id`, `service_id`, `service_name`, `service_price`, `updated_at`, `status`) VALUES
(1, 1, 'CBC', 90, '2017-08-30 14:39:24', 1),
(2, 2, 'Platelet Count', 70, '2017-08-30 14:39:46', 1),
(3, 3, 'Peripheral Smear', 150, '2017-08-30 14:39:58', 1),
(4, 4, 'Reticulocyte Count', 80, '2017-08-30 14:41:16', 1),
(5, 5, 'ESR', 60, '2017-08-30 14:41:29', 1),
(6, 6, 'Prothrombin Time', 200, '2017-08-30 14:41:52', 1),
(7, 7, 'APTT', 210, '2017-08-30 14:42:03', 1),
(8, 8, 'Blood Typing(ABO-Rh)', 100, '2017-08-30 14:42:19', 1),
(9, 9, 'Malarial Smear', 100, '2017-08-30 14:42:33', 1),
(10, 10, 'KOH', 70, '2017-08-30 14:42:46', 1),
(11, 11, 'Gram stain', 80, '2017-08-30 14:42:58', 1),
(12, 12, 'AFB/DSSM', 200, '2017-08-30 14:43:20', 1),
(13, 13, 'Blood and CSF C/S', 900, '2017-08-30 14:45:16', 1),
(14, 14, 'HBsAg', 70, '2017-08-30 14:45:31', 1),
(15, 15, 'Anti-HBs', 100, '2017-08-30 14:45:45', 1),
(16, 16, 'Anti-HAV igM', 180, '2017-08-30 14:46:02', 1),
(17, 17, '1.	HBsAg', 150, '2017-08-30 14:46:14', 1),
(18, 18, 'Anti HBs', 160, '2017-08-30 14:46:39', 1),
(19, 18, 'Anti-HBs', 160, '2017-08-30 14:46:49', 1),
(20, 17, 'HBsAg', 150, '2017-08-30 14:48:33', 1),
(21, 19, 'HBeAg', 220, '2017-08-30 14:49:05', 1),
(22, 20, 'Antu-Hbe', 220, '2017-08-30 14:49:33', 1),
(23, 21, 'Anti-HBc IgG', 220, '2017-08-30 14:49:50', 1),
(24, 22, 'Anti-HBs IgM', 250, '2017-08-30 14:50:05', 1),
(25, 23, '7.	Anti-HAV igM', 300, '2017-08-30 14:52:17', 1),
(26, 23, 'Anti-HAV igM', 300, '2017-08-30 14:52:23', 1),
(27, 24, 'Anti-HAV IgG', 300, '2017-08-30 14:54:10', 1),
(28, 25, 'Anti-HCV', 500, '2017-08-30 14:55:33', 1),
(29, 26, 'Hepatitis B Prfl 1-6', 1200, '2017-08-30 14:56:03', 1),
(30, 27, 'Hepatitis A n B Prfl', 1600, '2017-08-30 14:56:30', 1),
(31, 28, 'Hepatitis B Profile', 1200, '2017-08-30 14:57:46', 1),
(32, 29, 'Hepatitis A n B P', 1600, '2017-08-30 14:58:15', 1),
(33, 29, 'Hepatitis A n B Prfl', 1600, '2017-08-30 14:58:48', 1),
(34, 30, 'Hepatitis ABC Prfl', 2100, '2017-08-30 15:01:12', 1),
(35, 31, 'FBS/RBS/2HR PPBS', 75, '2017-08-30 15:01:41', 1),
(36, 32, 'OGCT 50grams', 110, '2017-08-30 15:01:51', 1),
(37, 33, 'OGCT 75grams', 120, '2017-08-30 15:02:04', 1),
(38, 34, 'OGCT 75grams (2hrs)', 300, '2017-08-30 15:02:17', 1),
(39, 35, 'OGCT 100grams (3hrs)', 400, '2017-08-30 15:02:32', 1),
(40, 36, 'HbA1c(EDTA)', 300, '2017-08-30 15:02:43', 1),
(41, 37, 'Creatinine', 75, '2017-08-30 15:02:53', 1),
(42, 38, 'BUN', 75, '2017-08-30 15:03:05', 1),
(43, 39, 'Uric Acid', 75, '2017-08-30 15:03:17', 1),
(44, 40, 'Cholesterol', 75, '2017-08-30 15:03:28', 1),
(45, 41, 'Triglyceride', 100, '2017-08-30 15:03:40', 1),
(46, 42, 'HDL', 150, '2017-08-30 15:03:52', 1),
(47, 43, 'Total Protein', 60, '2017-08-30 15:04:03', 1),
(48, 43, 'Total Protein', 80, '2017-08-30 15:04:14', 1),
(49, 44, 'Albumin', 75, '2017-08-30 15:04:25', 1),
(50, 45, 'TPAG', 150, '2017-08-30 15:04:46', 1),
(51, 46, 'Sodium', 150, '2017-08-30 15:04:57', 1),
(52, 46, 'Sodium', 100, '2017-08-30 15:05:09', 1),
(53, 47, 'Potassium', 100, '2017-08-30 15:05:17', 1),
(54, 48, 'Chloride', 100, '2017-08-30 15:05:33', 1),
(55, 49, 'Calcium', 100, '2017-08-30 15:05:44', 1),
(56, 50, 'Ionized Ca', 500, '2017-08-30 15:06:03', 1),
(57, 49, 'Calcium', 150, '2017-08-30 15:06:14', 1),
(58, 51, 'Phosphorous', 160, '2017-08-30 15:06:24', 1),
(59, 52, 'Magnesium', 300, '2017-08-30 15:06:35', 1),
(60, 53, 'Total Bilirubin', 150, '2017-08-30 15:07:00', 1),
(61, 54, 'Bilirubin B1 n B2', 200, '2017-08-30 15:07:22', 1),
(62, 55, 'SGPT(ALT)', 75, '2017-08-30 15:07:47', 1),
(63, 56, 'SGOT(AST)', 75, '2017-08-30 15:07:57', 1),
(64, 57, 'Alkaline Phosphatase', 100, '2017-08-30 15:08:10', 1),
(65, 58, 'ACP', 200, '2017-08-30 15:08:32', 1),
(66, 59, 'Amylase', 200, '2017-08-30 15:08:41', 1),
(67, 60, 'Lipase', 300, '2017-08-30 15:08:54', 1),
(68, 61, 'VDRL/RPR (Screening)', 80, '2017-08-30 15:09:44', 1),
(69, 62, 'VDRL/RPR(Titer)', 200, '2017-08-30 15:09:56', 1),
(70, 63, 'C3/C4 (each)', 450, '2017-08-30 15:10:10', 1),
(71, 64, 'RA/RF (screening)', 150, '2017-08-30 15:10:23', 1),
(72, 65, 'RA/RF (Titer)', 250, '2017-08-30 15:10:40', 1),
(73, 66, 'Typhidot', 850, '2017-08-30 15:10:55', 1),
(74, 67, 'TPHA (Quali)', 800, '2017-08-30 15:11:05', 1),
(75, 68, 'HIV 1 and 2', 350, '2017-08-30 15:11:22', 1),
(76, 69, 'Rubella Titer IgG', 800, '2017-08-30 15:11:33', 1),
(77, 70, 'Rubella Titer IgM', 1500, '2017-08-30 15:11:42', 1),
(78, 71, 'ANA Screening', 500, '2017-08-30 15:11:53', 1),
(79, 72, 'Dengue NS1', 800, '2017-08-30 15:12:06', 1),
(80, 73, 'Dengue Blot', 900, '2017-08-30 15:12:19', 1),
(81, 74, 'Aso (Quali)', 200, '2017-08-30 15:12:29', 1),
(82, 75, 'ASO (Quanti)', 250, '2017-08-30 15:12:39', 1),
(83, 76, 'CRP Titer', 290, '2017-08-30 15:12:49', 1),
(84, 77, 'CMV IgG/IgM (each)', 2000, '2017-08-30 15:13:00', 1),
(85, 78, 'HSV 1 and 2 IgG', 130, '2017-08-30 15:13:13', 1),
(86, 78, 'HSV 1 and 2 IgG', 1300, '2017-08-30 15:13:33', 1),
(87, 79, 'HSV 1 and 2 IgM', 1900, '2017-08-30 15:13:49', 1),
(88, 80, 'T3', 200, '2017-08-30 15:14:14', 1),
(89, 81, 'T4', 200, '2017-08-30 15:14:31', 1),
(90, 82, 'TSH', 400, '2017-08-30 15:14:43', 1),
(91, 82, 'TSH', 300, '2017-08-30 15:14:54', 1),
(92, 83, 'FT3', 260, '2017-08-30 15:15:06', 1),
(93, 84, 'FT4', 260, '2017-08-30 15:15:18', 1),
(94, 85, 'Thyroglobulin', 1500, '2017-08-30 15:15:30', 1),
(95, 86, 'TROPONIN-I', 1600, '2017-08-30 15:15:47', 1),
(96, 87, 'TROPONIN-T(Quanti)', 1000, '2017-08-30 15:16:04', 1),
(97, 88, 'CPK Total', 350, '2017-08-30 15:16:16', 1),
(98, 89, 'CPK-MB', 500, '2017-08-30 15:16:28', 1),
(99, 90, 'CPK-MM', 750, '2017-08-30 15:16:51', 1),
(100, 91, 'AFP', 600, '2017-08-30 15:17:00', 1),
(101, 92, 'CA 125', 1300, '2017-08-30 15:17:12', 1),
(102, 93, 'CA 15-3', 1400, '2017-08-30 15:17:25', 1),
(103, 94, 'CA 19-9', 1850, '2017-08-30 15:17:36', 1),
(104, 95, 'CA 72-4', 2200, '2017-08-30 15:17:53', 1),
(105, 96, 'CEA', 800, '2017-08-30 15:18:05', 1),
(106, 97, 'PSA(total)', 900, '2017-08-30 15:18:18', 1),
(107, 98, 'LH', 500, '2017-08-30 15:18:56', 1),
(108, 99, 'FSG', 500, '2017-08-30 15:19:08', 1),
(109, 100, 'Prolactin', 550, '2017-08-30 15:19:20', 1),
(110, 101, 'Estradiol/Estrogen', 1100, '2017-08-30 15:19:31', 1),
(111, 102, 'Progesterone', 1600, '2017-08-30 15:19:43', 1),
(112, 103, 'Cortisol', 550, '2017-08-30 15:19:54', 1),
(113, 104, 'Testosterone', 900, '2017-08-30 15:20:06', 1),
(114, 105, 'Insulin', 1000, '2017-08-30 15:20:16', 1),
(115, 106, 'ACTH', 2700, '2017-08-30 15:20:28', 1),
(116, 107, 'Beta-HCG', 800, '2017-08-30 15:20:43', 1),
(117, 108, 'Vitamin B12', 4800, '2017-08-30 15:21:00', 1),
(118, 109, 'Vitamin D', 3400, '2017-08-30 15:21:11', 1),
(119, 110, 'LDH', 190, '2017-08-30 15:21:22', 1),
(120, 111, 'Ferritin', 120, '2017-08-30 15:21:31', 1),
(121, 111, 'Ferritin', 1200, '2017-08-30 15:21:44', 1),
(122, 112, 'Transferrin', 7500, '2017-08-30 15:21:57', 1),
(123, 58, 'ACP', 200, '2017-08-31 03:21:22', 1),
(124, 113, 'Urinalysis', 90, '2017-08-31 04:02:52', 1),
(125, 114, 'Fecalsys', 90, '2017-08-31 04:04:31', 1),
(126, 115, 'X-ray', 500, '2017-08-31 05:45:42', 1),
(127, 58, 'ACP', 200, '2017-09-08 11:24:12', 1),
(128, 58, 'ACP', 200, '2017-09-08 11:52:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_group_id` int(11) DEFAULT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `service_price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `medical_request` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`service_id`, `service_name`, `service_group_id`, `service_type_id`, `service_price`, `status`, `medical_request`) VALUES
(1, 'CBC', 1, NULL, 90, 1, 'No'),
(2, 'Platelet Count', 1, NULL, 70, 1, 'No'),
(3, 'Peripheral Smear', 1, NULL, 150, 1, 'No'),
(4, 'Reticulocyte Count', 1, NULL, 80, 1, 'No'),
(5, 'ESR', 1, NULL, 60, 1, 'No'),
(6, 'Prothrombin Time', 1, NULL, 200, 1, 'No'),
(7, 'APTT', 1, NULL, 210, 1, 'No'),
(8, 'Blood Typing(ABO-Rh)', 1, NULL, 100, 1, 'No'),
(9, 'Malarial Smear', 1, NULL, 100, 1, 'No'),
(10, 'KOH', 2, NULL, 70, 1, 'No'),
(11, 'Gram stain', 2, NULL, 80, 1, 'No'),
(12, 'AFB/DSSM', 2, NULL, 200, 1, 'No'),
(13, 'Blood and CSF C/S', 2, NULL, 900, 1, 'No'),
(14, 'HBsAg', 3, 1, 70, 1, 'No'),
(15, 'Anti-HBs', 3, 1, 100, 1, 'No'),
(16, 'Anti-HAV igM', 3, 1, 180, 1, 'No'),
(17, 'HBsAg', 3, 2, 150, 1, 'No'),
(18, 'Anti-HBs', 3, 2, 160, 1, 'No'),
(19, 'HBeAg', 3, 2, 220, 1, 'No'),
(20, 'Antu-Hbe', 3, 2, 220, 1, 'No'),
(21, 'Anti-HBc IgG', 3, 2, 220, 1, 'No'),
(22, 'Anti-HBs IgM', 3, 2, 250, 1, 'No'),
(23, 'Anti-HAV igM', 3, 2, 300, 1, 'No'),
(24, 'Anti-HAV IgG', 3, 2, 300, 1, 'No'),
(25, 'Anti-HCV', 3, 2, 500, 1, 'No'),
(26, 'Hepatitis B Prfl 1-6', NULL, NULL, 1200, 0, 'No'),
(27, 'Hepatitis A n B Prfl', NULL, NULL, 1600, 0, 'No'),
(28, 'Hepatitis B Profile', 3, NULL, 1200, 1, 'No'),
(29, 'Hepatitis A n B Prfl', 3, NULL, 1600, 1, 'No'),
(30, 'Hepatitis ABC Prfl', 3, NULL, 2100, 1, 'No'),
(31, 'FBS/RBS/2HR PPBS', 4, NULL, 75, 1, 'No'),
(32, 'OGCT 50grams', 4, NULL, 110, 1, 'No'),
(33, 'OGCT 75grams', 4, NULL, 120, 1, 'No'),
(34, 'OGCT 75grams (2hrs)', 4, NULL, 300, 1, 'No'),
(35, 'OGCT 100grams (3hrs)', 4, NULL, 400, 1, 'No'),
(36, 'HbA1c(EDTA)', 4, NULL, 300, 1, 'No'),
(37, 'Creatinine', 4, NULL, 75, 1, 'No'),
(38, 'BUN', 4, NULL, 75, 1, 'No'),
(39, 'Uric Acid', 4, NULL, 75, 1, 'No'),
(40, 'Cholesterol', 4, NULL, 75, 1, 'No'),
(41, 'Triglyceride', 4, NULL, 100, 1, 'No'),
(42, 'HDL', 4, NULL, 150, 1, 'No'),
(43, 'Total Protein', 4, NULL, 80, 1, 'No'),
(44, 'Albumin', 4, NULL, 75, 1, 'No'),
(45, 'TPAG', 4, NULL, 150, 1, 'No'),
(46, 'Sodium', 4, NULL, 100, 1, 'No'),
(47, 'Potassium', 4, NULL, 100, 1, 'No'),
(48, 'Chloride', 4, NULL, 100, 1, 'No'),
(49, 'Calcium', 4, NULL, 150, 1, 'No'),
(50, 'Ionized Ca', 4, NULL, 500, 1, 'No'),
(51, 'Phosphorous', 4, NULL, 160, 1, 'No'),
(52, 'Magnesium', 4, NULL, 300, 1, 'No'),
(53, 'Total Bilirubin', 4, NULL, 150, 1, 'No'),
(54, 'Bilirubin B1 n B2', 4, NULL, 200, 1, 'No'),
(55, 'SGPT(ALT)', 4, NULL, 75, 1, 'No'),
(56, 'SGOT(AST)', 4, NULL, 75, 1, 'No'),
(57, 'Alkaline Phosphatase', 4, NULL, 100, 1, 'No'),
(58, 'ACP', 4, NULL, 200, 1, 'No'),
(59, 'Amylase', 4, NULL, 200, 1, 'No'),
(60, 'Lipase', 4, NULL, 300, 1, 'No'),
(61, 'VDRL/RPR (Screening)', 5, NULL, 80, 1, 'No'),
(62, 'VDRL/RPR(Titer)', 5, NULL, 200, 1, 'No'),
(63, 'C3/C4 (each)', 5, NULL, 450, 1, 'No'),
(64, 'RA/RF (screening)', 5, NULL, 150, 1, 'No'),
(65, 'RA/RF (Titer)', 5, NULL, 250, 1, 'No'),
(66, 'Typhidot', 5, NULL, 850, 1, 'No'),
(67, 'TPHA (Quali)', 5, NULL, 800, 1, 'No'),
(68, 'HIV 1 and 2', 5, NULL, 350, 1, 'No'),
(69, 'Rubella Titer IgG', 5, NULL, 800, 1, 'No'),
(70, 'Rubella Titer IgM', 5, NULL, 1500, 1, 'No'),
(71, 'ANA Screening', 5, NULL, 500, 1, 'No'),
(72, 'Dengue NS1', 5, NULL, 800, 1, 'No'),
(73, 'Dengue Blot', 5, NULL, 900, 1, 'No'),
(74, 'Aso (Quali)', 5, NULL, 200, 1, 'No'),
(75, 'ASO (Quanti)', 5, NULL, 250, 1, 'No'),
(76, 'CRP Titer', 5, NULL, 290, 1, 'No'),
(77, 'CMV IgG/IgM (each)', 5, NULL, 2000, 1, 'No'),
(78, 'HSV 1 and 2 IgG', 5, NULL, 1300, 1, 'No'),
(79, 'HSV 1 and 2 IgM', 5, NULL, 1900, 1, 'No'),
(80, 'T3', 6, 3, 200, 1, 'No'),
(81, 'T4', 6, 3, 200, 1, 'No'),
(82, 'TSH', 6, 3, 300, 1, 'No'),
(83, 'FT3', 6, 3, 260, 1, 'No'),
(84, 'FT4', 6, 3, 260, 1, 'No'),
(85, 'Thyroglobulin', 6, 3, 1500, 1, 'No'),
(86, 'TROPONIN-I', 6, 4, 1600, 1, 'No'),
(87, 'TROPONIN-T(Quanti)', 6, 4, 1000, 1, 'No'),
(88, 'CPK Total', 6, 4, 350, 1, 'No'),
(89, 'CPK-MB', 6, 4, 500, 1, 'No'),
(90, 'CPK-MM', 6, 4, 750, 1, 'No'),
(91, 'AFP', 6, 5, 600, 1, 'No'),
(92, 'CA 125', 6, 5, 1300, 1, 'No'),
(93, 'CA 15-3', 6, 5, 1400, 1, 'No'),
(94, 'CA 19-9', 6, 5, 1850, 1, 'No'),
(95, 'CA 72-4', 6, 5, 2200, 1, 'No'),
(96, 'CEA', 6, 5, 800, 1, 'No'),
(97, 'PSA(total)', 6, 5, 900, 1, 'No'),
(98, 'LH', 6, 6, 500, 1, 'No'),
(99, 'FSG', 6, 6, 500, 1, 'No'),
(100, 'Prolactin', 6, 6, 550, 1, 'No'),
(101, 'Estradiol/Estrogen', 6, 6, 1100, 1, 'No'),
(102, 'Progesterone', 6, 6, 1600, 1, 'No'),
(103, 'Cortisol', 6, 6, 550, 1, 'No'),
(104, 'Testosterone', 6, 6, 900, 1, 'No'),
(105, 'Insulin', 6, 6, 1000, 1, 'No'),
(106, 'ACTH', 6, 6, 2700, 1, 'No'),
(107, 'Beta-HCG', 6, 6, 800, 1, 'No'),
(108, 'Vitamin B12', 6, NULL, 4800, 1, 'No'),
(109, 'Vitamin D', 6, NULL, 3400, 1, 'No'),
(110, 'LDH', 6, NULL, 190, 1, 'No'),
(111, 'Ferritin', 6, NULL, 1200, 1, 'No'),
(112, 'Transferrin', 6, NULL, 7500, 1, 'No'),
(113, 'Urinalysis', NULL, NULL, 90, 1, 'No'),
(114, 'Fecalsys', NULL, NULL, 90, 1, 'No'),
(115, 'X-ray', NULL, NULL, 500, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `service_type_log_tbl`
--

CREATE TABLE `service_type_log_tbl` (
  `servicetypeLog_id` int(11) NOT NULL,
  `service_type_name` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `service_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type_log_tbl`
--

INSERT INTO `service_type_log_tbl` (`servicetypeLog_id`, `service_type_name`, `updated_at`, `status`, `service_type_id`) VALUES
(8, 'Test Type', '2017-09-08 07:11:15', 1, 8),
(9, 'Cardiac Biomarkers', '2017-09-08 11:04:00', 1, 4),
(10, 'Cardiac Biomarkers', '2017-09-08 11:21:28', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service_type_tbl`
--

CREATE TABLE `service_type_tbl` (
  `service_type_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `service_type_group_id` int(11) NOT NULL,
  `service_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type_tbl`
--

INSERT INTO `service_type_tbl` (`service_type_id`, `status`, `service_type_group_id`, `service_type_name`) VALUES
(1, 1, 3, 'Screening'),
(2, 1, 3, 'Quantitative/Titers'),
(3, 1, 6, 'Thyroid Function'),
(4, 1, 6, 'Cardiac Biomarkers'),
(5, 1, 6, 'Tumor Markers'),
(6, 1, 6, 'Fertility/Hormones'),
(7, 0, 3, 'Test Type'),
(8, 0, 1, 'Test Type');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `trans_id` int(11) NOT NULL,
  `trans_total` int(11) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_patient_id` int(11) NOT NULL,
  `issuedBy_emp_id` int(11) NOT NULL,
  `trans_change` double NOT NULL,
  `trans_payment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`trans_id`, `trans_total`, `trans_date`, `trans_patient_id`, `issuedBy_emp_id`, `trans_change`, `trans_payment`) VALUES
(1, 2720, '2017-08-31 03:54:59', 3, 32, 280, 3000),
(2, 0, '2017-08-31 04:03:42', 40, 32, 0, 0),
(3, 90, '2017-08-31 04:05:26', 22, 32, 10, 100),
(4, 90, '2017-08-31 04:06:03', 22, 32, 10, 100),
(5, 90, '2017-08-31 04:06:38', 21, 32, 10, 100),
(6, 90, '2017-08-31 04:07:22', 21, 32, 10, 100),
(7, 990, '2017-08-31 04:08:04', 40, 32, 0, 990),
(8, 180, '2017-08-31 04:19:43', 21, 32, 20, 200),
(9, 90, '2017-08-31 04:20:22', 21, 32, 10, 100),
(10, 90, '2017-08-31 04:52:04', 1, 32, 10, 100),
(11, 900, '2017-08-31 04:56:52', 29, 32, 100, 1000),
(12, 190, '2017-08-31 05:30:41', 51, 32, 10, 200);

-- --------------------------------------------------------

--
-- Table structure for table `transcorp_tbl`
--

CREATE TABLE `transcorp_tbl` (
  `transCorp_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcorp_tbl`
--

INSERT INTO `transcorp_tbl` (`transCorp_id`, `trans_id`, `corp_id`, `date`, `charge`) VALUES
(1, 2, 2, '2017-08-31 04:03:43', 1),
(2, 7, 2, '2017-08-31 04:08:04', 0),
(3, 11, 2, '2017-08-31 04:56:52', 0),
(4, 12, 1, '2017-08-31 05:30:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transresult_tbl`
--

CREATE TABLE `transresult_tbl` (
  `result_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transresult_tbl`
--

INSERT INTO `transresult_tbl` (`result_id`, `trans_id`, `date`, `status`) VALUES
(1, 1, '2017-08-31 03:54:59', 'DONE'),
(2, 2, '2017-08-31 04:03:43', 'DONE'),
(3, 3, '2017-08-31 04:05:26', 'PENDING'),
(4, 4, '2017-08-31 04:06:03', 'PENDING'),
(5, 5, '2017-08-31 04:06:38', 'PENDING'),
(6, 6, '2017-08-31 04:07:23', 'PENDING'),
(7, 7, '2017-08-31 04:08:04', 'PENDING'),
(8, 8, '2017-08-31 04:19:43', 'PENDING'),
(9, 9, '2017-08-31 04:20:22', 'PENDING'),
(10, 10, '2017-08-31 04:52:04', 'PENDING'),
(11, 11, '2017-08-31 04:56:52', 'DONE'),
(12, 12, '2017-08-31 05:30:41', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `trans_emprebate_tbl`
--

CREATE TABLE `trans_emprebate_tbl` (
  `trans_empRebate_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `rebate_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_emprebate_tbl`
--

INSERT INTO `trans_emprebate_tbl` (`trans_empRebate_id`, `emp_id`, `trans_id`, `rebate_id`, `date`) VALUES
(1, 8, 1, 1, '2017-08-31 03:54:59'),
(2, 8, 10, 1, '2017-08-31 04:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `trans_pack_tbl`
--

CREATE TABLE `trans_pack_tbl` (
  `trans_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_pack_tbl`
--

INSERT INTO `trans_pack_tbl` (`trans_id`, `pack_id`, `pack_name`, `pack_price`) VALUES
(1, 3, 'Normal Package', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `trans_resultfiles_tbl`
--

CREATE TABLE `trans_resultfiles_tbl` (
  `file_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `file` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_resultfiles_tbl`
--

INSERT INTO `trans_resultfiles_tbl` (`file_id`, `trans_id`, `result_id`, `date`, `file`, `status`) VALUES
(1, 1, 1, '2017-08-31 03:56:39', '59a788f7c4c101.60734202.pdf', 1),
(2, 10, 10, '2017-08-31 04:54:21', '59a7967d2b0233.47330493.pdf', 1),
(3, 11, 11, '2017-08-31 04:58:00', '59a79758b107e3.54381238.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_result_service_tbl`
--

CREATE TABLE `trans_result_service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `result_id` int(11) NOT NULL,
  `service_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_result_service_tbl`
--

INSERT INTO `trans_result_service_tbl` (`service_id`, `service_name`, `date`, `result_id`, `service_group_id`) VALUES
(1, 'CBC', '2017-08-31 03:54:59', 1, 1),
(2, 'Platelet Count', '2017-08-31 03:55:00', 1, 1),
(19, 'HBeAg', '2017-08-31 03:55:00', 1, 3),
(75, 'ASO (Quanti)', '2017-08-31 03:55:00', 1, 5),
(110, 'LDH', '2017-08-31 03:55:00', 1, 6),
(1, 'CBC', '2017-08-31 03:55:00', 1, 1),
(2, 'Platelet Count', '2017-08-31 03:55:00', 1, 1),
(19, 'HBeAg', '2017-08-31 03:55:00', 1, 3),
(75, 'ASO (Quanti)', '2017-08-31 03:55:00', 1, 5),
(110, 'LDH', '2017-08-31 03:55:00', 1, 6),
(21, 'Anti-HBc IgG', '2017-08-31 03:55:00', 1, 3),
(50, 'Ionized Ca', '2017-08-31 03:55:00', 1, 4),
(3, 'Peripheral Smear', '2017-08-31 04:03:43', 2, 1),
(50, 'Ionized Ca', '2017-08-31 04:03:43', 2, 4),
(52, 'Magnesium', '2017-08-31 04:03:43', 2, 4),
(113, 'Urinalysis', '2017-08-31 04:07:23', 6, NULL),
(3, 'Peripheral Smear', '2017-08-31 04:08:05', 7, 1),
(50, 'Ionized Ca', '2017-08-31 04:08:05', 7, 4),
(52, 'Magnesium', '2017-08-31 04:08:05', 7, 4),
(1, 'CBC', '2017-08-31 04:08:05', 7, 1),
(113, 'Urinalysis', '2017-08-31 04:19:44', 8, NULL),
(114, 'Fecalsys', '2017-08-31 04:19:44', 8, NULL),
(113, 'Urinalysis', '2017-08-31 04:20:22', 9, NULL),
(1, 'CBC', '2017-08-31 04:52:04', 10, 1),
(3, 'Peripheral Smear', '2017-08-31 04:56:52', 11, 1),
(50, 'Ionized Ca', '2017-08-31 04:56:52', 11, 4),
(52, 'Magnesium', '2017-08-31 04:56:52', 11, 4),
(1, 'CBC', '2017-08-31 05:30:41', 12, 1),
(2, 'Platelet Count', '2017-08-31 05:30:41', 12, 1),
(3, 'Peripheral Smear', '2017-08-31 05:30:41', 12, 1),
(22, 'Anti-HBs IgM', '2017-08-31 05:30:41', 12, 3),
(24, 'Anti-HAV IgG', '2017-08-31 05:30:41', 12, 3),
(1, 'CBC', '2017-08-31 05:30:41', 12, 1),
(8, 'Blood Typing(ABO-Rh)', '2017-08-31 05:30:41', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_serv_tbl`
--

CREATE TABLE `trans_serv_tbl` (
  `trans_id` int(11) NOT NULL,
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `service_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_serv_tbl`
--

INSERT INTO `trans_serv_tbl` (`trans_id`, `serv_id`, `serv_name`, `service_price`) VALUES
(1, 21, 'Anti-HBc IgG', 220),
(1, 50, 'Ionized Ca', 500),
(6, 113, 'Urinalysis', 90),
(7, 1, 'CBC', 90),
(8, 113, 'Urinalysis', 90),
(8, 114, 'Fecalsys', 90),
(9, 113, 'Urinalysis', 90),
(10, 1, 'CBC', 90),
(12, 1, 'CBC', 90),
(12, 8, 'Blood Typing(ABO-Rh)', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `emp_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `display_name`, `role_id`, `created_at`, `updated_at`, `deleted`, `emp_id`) VALUES
(9, 'sam123', '$2y$10$mnmcyQ0yD12zFNWIizl8iu4QB18M.RW7pcOWHHUOxaITgHkk42..e', 'Samanta', 16, '2017-07-14 01:21:16', '2017-07-14 01:21:16', 0, 18),
(4, 'admin', '$2y$10$.LAemelZfqcQ8P69ycR8puphUlI/8TIU2wayBNMUFcw4G0fzOv4Qq', 'Billy Joe', 0, '2017-07-09 08:07:44', '2017-07-09 08:07:44', 0, 6),
(7, 'billy123', '$2y$10$7XNpW8AGP4mP7frnsqFPRO8Fy7y1ziRzKQhyZxq8MSN/A7feZC8gm', 'Billy Joe', 14, '2017-07-11 09:08:19', '2017-07-11 09:08:19', 0, 14),
(8, 'zander123', '$2y$10$yUkZ6gyyZoCz2dn/7KarQ.GNKb3sNACqD2H.tqxtsfpyyUY7E82ta', 'Zander', 15, '2017-07-12 08:55:05', '2017-07-12 08:55:05', 0, 15),
(10, 'There24', '$2y$10$emyiyGMTq8SFSajRL0wr0uREHQGdoj2xKUB7p22J3auDn8EUiAYl2', 'Theresita', 21, '2017-08-13 06:35:42', '2017-08-13 06:35:42', 0, 24),
(11, 'Kris1988', '$2y$10$1.s7HuaVUFxs1gf/G4DmjeFsgzJxp6JEQHO2XwfeKIqBg3gmU6ff2', 'Kristian', 21, '2017-08-13 06:36:56', '2017-08-13 06:36:56', 0, 25),
(12, 'Juan43', '$2y$10$G1dMxlVAph.2rx/DnXpxXOqyjnnXNl1mqa4/NKgt4i.9RZGEiAbFe', 'Juan', 24, '2017-08-13 06:39:50', '2017-08-13 06:39:50', 0, 29),
(13, 'Tashak44', '$2y$10$wz8Q5qgXECqG1eyp3RpbTegnuYHBH6eQMqb5Xh6xhqW05ufEIZWXi', 'Tasha kenn', 24, '2017-08-13 06:40:35', '2017-08-13 06:40:35', 0, 30),
(14, 'Nina23', '$2y$10$C8olBU2DR2RDdfNibT/axegv1jN6nWPAbzjxzheFHFn/S10/eHE02', 'Nina', 26, '2017-08-21 22:45:25', '2017-08-21 22:45:25', 0, 34),
(15, 'Lindsyyy', '$2y$10$aATFQKdjjkmPBRVRS8H74OVDx/1hNcTTttFyogpaSLFGXJEeQcAuy', 'Lindsy', 26, '2017-08-21 22:47:49', '2017-08-21 22:47:49', 0, 35),
(16, 'Lowen', '$2y$10$2tXTr3FsK.EotBKLD4/WeOTRw30alkWqtkWlzYAhsIWh7YatiJHKK', 'Lowen', 27, '2017-08-21 22:50:51', '2017-08-21 22:50:51', 0, 36),
(17, 'Jmartin', '$2y$10$cOYVjcNGslj/esYhZgTMu.Rr0tJ07gmFQoc6mVhmD/W7pFgNc7Niy', 'John Martin', 27, '2017-08-21 22:52:34', '2017-08-21 22:52:34', 0, 37),
(18, 'bern23', '$2y$10$S2h8B7plbyT01PfYpd0XrOlIy/QDogGB1CMF.8VLZFc.oYjON/c6e', 'Bernardo', 28, '2017-08-21 22:54:11', '2017-08-21 22:54:11', 0, 38),
(19, 'linalin', '$2y$10$bWKHDRi.C9mZlZYQ/VYs8esnAl636wL..mz.FhvjoExXZKTOs6oYm', 'Lina', 28, '2017-08-21 22:55:31', '2017-08-21 22:55:31', 0, 39),
(20, 'ryanlex', '$2y$10$bGihUbNSDAifB9oHOrJCLuSO6h/aPm4U0og9e5.Lz03Mrmg29G.32', 'Ryan', 29, '2017-08-21 22:56:17', '2017-08-21 22:56:17', 0, 40),
(21, 'kurt23', '$2y$10$b3zbF52jocCozC/bBENtQ.RsDhMH/kT86iyOsYTHI/fhMW7molFtu', 'Kurt Nathan', 29, '2017-08-21 22:58:05', '2017-08-21 22:58:05', 0, 41),
(22, 'mark123', '$2y$10$day9uQxECXJ5I4So5A2q1el0XV4ABw1FMRnIxp4JxT.IyNCQA0v/C', 'Mark Juan', 26, '2017-08-29 07:38:59', '2017-08-29 07:38:59', 0, 44),
(23, 'sasha', '$2y$10$VLNROEW1M8VoT6ObTGmTjunJB9VQPWJPwhgc3AFwS51maISfpyYlq', 'Sasha', 36, '2017-08-29 17:23:04', '2017-08-29 17:23:04', 0, 45),
(24, 'betlog', '$2y$10$qUi4tqe5INdB6gTEPa3Si.VmEx9XaO9dcfBj55EBgOgmsC5Y7/OYK', 'Sasha', 36, '2017-08-29 17:28:32', '2017-08-29 17:28:32', 0, 48),
(25, '', '$2y$10$gfE4kD8JbNav4x5oBtf9JeH4E.kINxqu6txRKdNy7wuYWh8PnEfTu', 'Sasha', 36, '2017-08-29 18:13:41', '2017-08-29 18:13:41', 0, 49),
(26, 'reception1', '$2y$10$VaoK7gA/1NNscj/cNhRrJefg5SjmueoPIUVG0liFn4gxLGyjm8.im', 'Juan', 2, '2017-08-30 08:58:35', '2017-08-30 08:58:35', 0, 1),
(27, 'reception2', '$2y$10$Oo9thsUOXFRNXjMQG4SGz.gfAr0kedpNjSRfqAyEhD2WLelMBF5da', 'Dina', 2, '2017-08-30 08:59:43', '2017-08-30 08:59:43', 0, 2),
(28, 'reception3', '$2y$10$i89ak8w1mnTs5ufCaQmBBOrL3PTkXdAEV1kowp3KQ7ORV5Xoxw0UC', 'Manny', 2, '2017-08-30 09:00:31', '2017-08-30 09:00:31', 0, 3),
(29, 'reception4', '$2y$10$uPaTFkOvTCwJxCj9LaypmuiPV/qRsL3/DmN8SDUA.Pn3TO.wPPjUG', 'Celia', 2, '2017-08-30 09:01:17', '2017-08-30 09:01:17', 0, 4),
(30, 'reception5', '$2y$10$QrxAFhzYjl3x9J3vzbxwQugkA/TIonhaNwgeRfDoM2BrBR8d4V3di', 'Mageline', 2, '2017-08-30 09:02:10', '2017-08-30 09:02:10', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydetails_tbl`
--
ALTER TABLE `companydetails_tbl`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `corporate_accounts_log_tbl`
--
ALTER TABLE `corporate_accounts_log_tbl`
  ADD PRIMARY KEY (`corpLog_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `corporate_accounts_tbl`
--
ALTER TABLE `corporate_accounts_tbl`
  ADD PRIMARY KEY (`corp_id`);

--
-- Indexes for table `corp_package_log_tbl`
--
ALTER TABLE `corp_package_log_tbl`
  ADD PRIMARY KEY (`corpPackLog_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `corp_package_tbl`
--
ALTER TABLE `corp_package_tbl`
  ADD PRIMARY KEY (`corpPack_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `corp_packserv_log_tbl`
--
ALTER TABLE `corp_packserv_log_tbl`
  ADD PRIMARY KEY (`corpPackLog_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `corp_id` (`corpPack_id`);

--
-- Indexes for table `corp_packserv_tbl`
--
ALTER TABLE `corp_packserv_tbl`
  ADD KEY `corpPack_id` (`corpPack_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `employee_access_tbl`
--
ALTER TABLE `employee_access_tbl`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `access_module_id` (`access_module_id`),
  ADD KEY `access_role_id` (`access_role_id`);

--
-- Indexes for table `employee_log_tbl`
--
ALTER TABLE `employee_log_tbl`
  ADD PRIMARY KEY (`empLog_id`),
  ADD KEY `emp_medtech_rank_id` (`emp_medtech_rank_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_role_tbl`
--
ALTER TABLE `employee_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_department_id` (`emp_medtech_rank_id`),
  ADD KEY `emp_type_id` (`emp_type_id`);

--
-- Indexes for table `emprebate_log_tbl`
--
ALTER TABLE `emprebate_log_tbl`
  ADD PRIMARY KEY (`empRebate_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `rebate_id` (`rebate_id`);

--
-- Indexes for table `emp_rebate_tbl`
--
ALTER TABLE `emp_rebate_tbl`
  ADD PRIMARY KEY (`empReb_id`),
  ADD KEY `rebate_id` (`rebate_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `medtech_rank`
--
ALTER TABLE `medtech_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `module_tbl`
--
ALTER TABLE `module_tbl`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `package_log_tbl`
--
ALTER TABLE `package_log_tbl`
  ADD PRIMARY KEY (`packageLog_id`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indexes for table `package_service_log_tbl`
--
ALTER TABLE `package_service_log_tbl`
  ADD KEY `packserv_serv_id` (`packserv_serv_id`),
  ADD KEY `packserv_package_id` (`packserv_package_id`);

--
-- Indexes for table `package_service_tbl`
--
ALTER TABLE `package_service_tbl`
  ADD KEY `pack_serv_package_id` (`pack_serv_package_id`,`pack_serv_serv_id`),
  ADD KEY `pack_serv_serv_id` (`pack_serv_serv_id`);

--
-- Indexes for table `package_tbl`
--
ALTER TABLE `package_tbl`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `patient_log_tbl`
--
ALTER TABLE `patient_log_tbl`
  ADD PRIMARY KEY (`patientLog_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `patient_type_id` (`patient_type_id`),
  ADD KEY `patient_corp_id` (`patient_corp_id`);

--
-- Indexes for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patient_type_id` (`patient_type_id`,`patient_corp_id`),
  ADD KEY `patient_corp_id` (`patient_corp_id`);

--
-- Indexes for table `patient_type_tbl`
--
ALTER TABLE `patient_type_tbl`
  ADD PRIMARY KEY (`ptype_id`);

--
-- Indexes for table `rebate_tbl`
--
ALTER TABLE `rebate_tbl`
  ADD PRIMARY KEY (`rebate_id`);

--
-- Indexes for table `rolefields_tbl`
--
ALTER TABLE `rolefields_tbl`
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `servgroup_log_tbl`
--
ALTER TABLE `servgroup_log_tbl`
  ADD PRIMARY KEY (`servgroupLog_id`),
  ADD KEY `servgroup_id` (`servgroup_id`);

--
-- Indexes for table `service_group_tbl`
--
ALTER TABLE `service_group_tbl`
  ADD PRIMARY KEY (`servgroup_id`);

--
-- Indexes for table `service_log_tbl`
--
ALTER TABLE `service_log_tbl`
  ADD PRIMARY KEY (`serviceLog_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_group_id` (`service_group_id`),
  ADD KEY `service_type_id` (`service_type_id`);

--
-- Indexes for table `service_type_log_tbl`
--
ALTER TABLE `service_type_log_tbl`
  ADD PRIMARY KEY (`servicetypeLog_id`),
  ADD KEY `service_type_id` (`service_type_id`);

--
-- Indexes for table `service_type_tbl`
--
ALTER TABLE `service_type_tbl`
  ADD PRIMARY KEY (`service_type_id`),
  ADD KEY `service_type_group_id` (`service_type_group_id`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `trans_patient_id` (`trans_patient_id`),
  ADD KEY `issuedBy_emp_id` (`issuedBy_emp_id`);

--
-- Indexes for table `transcorp_tbl`
--
ALTER TABLE `transcorp_tbl`
  ADD PRIMARY KEY (`transCorp_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `transresult_tbl`
--
ALTER TABLE `transresult_tbl`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `trans_emprebate_tbl`
--
ALTER TABLE `trans_emprebate_tbl`
  ADD PRIMARY KEY (`trans_empRebate_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `rebate_id` (`rebate_id`);

--
-- Indexes for table `trans_pack_tbl`
--
ALTER TABLE `trans_pack_tbl`
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indexes for table `trans_resultfiles_tbl`
--
ALTER TABLE `trans_resultfiles_tbl`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `result_id` (`result_id`);

--
-- Indexes for table `trans_result_service_tbl`
--
ALTER TABLE `trans_result_service_tbl`
  ADD KEY `result_id` (`result_id`),
  ADD KEY `service_group_id` (`service_group_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `trans_serv_tbl`
--
ALTER TABLE `trans_serv_tbl`
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `serv_id` (`serv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companydetails_tbl`
--
ALTER TABLE `companydetails_tbl`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `corporate_accounts_log_tbl`
--
ALTER TABLE `corporate_accounts_log_tbl`
  MODIFY `corpLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `corporate_accounts_tbl`
--
ALTER TABLE `corporate_accounts_tbl`
  MODIFY `corp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `corp_package_log_tbl`
--
ALTER TABLE `corp_package_log_tbl`
  MODIFY `corpPackLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `corp_package_tbl`
--
ALTER TABLE `corp_package_tbl`
  MODIFY `corpPack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `corp_packserv_log_tbl`
--
ALTER TABLE `corp_packserv_log_tbl`
  MODIFY `corpPackLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employee_access_tbl`
--
ALTER TABLE `employee_access_tbl`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_log_tbl`
--
ALTER TABLE `employee_log_tbl`
  MODIFY `empLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `employee_role_tbl`
--
ALTER TABLE `employee_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `emprebate_log_tbl`
--
ALTER TABLE `emprebate_log_tbl`
  MODIFY `empRebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_rebate_tbl`
--
ALTER TABLE `emp_rebate_tbl`
  MODIFY `empReb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `medtech_rank`
--
ALTER TABLE `medtech_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `module_tbl`
--
ALTER TABLE `module_tbl`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_log_tbl`
--
ALTER TABLE `package_log_tbl`
  MODIFY `packageLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `package_tbl`
--
ALTER TABLE `package_tbl`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patient_log_tbl`
--
ALTER TABLE `patient_log_tbl`
  MODIFY `patientLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `patient_type_tbl`
--
ALTER TABLE `patient_type_tbl`
  MODIFY `ptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rebate_tbl`
--
ALTER TABLE `rebate_tbl`
  MODIFY `rebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `servgroup_log_tbl`
--
ALTER TABLE `servgroup_log_tbl`
  MODIFY `servgroupLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `service_group_tbl`
--
ALTER TABLE `service_group_tbl`
  MODIFY `servgroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `service_log_tbl`
--
ALTER TABLE `service_log_tbl`
  MODIFY `serviceLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `service_type_log_tbl`
--
ALTER TABLE `service_type_log_tbl`
  MODIFY `servicetypeLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `service_type_tbl`
--
ALTER TABLE `service_type_tbl`
  MODIFY `service_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transcorp_tbl`
--
ALTER TABLE `transcorp_tbl`
  MODIFY `transCorp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transresult_tbl`
--
ALTER TABLE `transresult_tbl`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trans_emprebate_tbl`
--
ALTER TABLE `trans_emprebate_tbl`
  MODIFY `trans_empRebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans_resultfiles_tbl`
--
ALTER TABLE `trans_resultfiles_tbl`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `corporate_accounts_log_tbl`
--
ALTER TABLE `corporate_accounts_log_tbl`
  ADD CONSTRAINT `corporate_accounts_log_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`);

--
-- Constraints for table `corp_package_log_tbl`
--
ALTER TABLE `corp_package_log_tbl`
  ADD CONSTRAINT `corp_package_log_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`);

--
-- Constraints for table `corp_package_tbl`
--
ALTER TABLE `corp_package_tbl`
  ADD CONSTRAINT `corp_package_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`);

--
-- Constraints for table `corp_packserv_log_tbl`
--
ALTER TABLE `corp_packserv_log_tbl`
  ADD CONSTRAINT `corp_packserv_log_tbl_ibfk_1` FOREIGN KEY (`corpPack_id`) REFERENCES `corp_package_tbl` (`corpPack_id`),
  ADD CONSTRAINT `corp_packserv_log_tbl_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `corp_packserv_tbl`
--
ALTER TABLE `corp_packserv_tbl`
  ADD CONSTRAINT `corp_packserv_tbl_ibfk_1` FOREIGN KEY (`corpPack_id`) REFERENCES `corp_package_tbl` (`corpPack_id`),
  ADD CONSTRAINT `corp_packserv_tbl_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `employee_access_tbl`
--
ALTER TABLE `employee_access_tbl`
  ADD CONSTRAINT `employee_access_tbl_ibfk_2` FOREIGN KEY (`access_module_id`) REFERENCES `module_tbl` (`module_id`),
  ADD CONSTRAINT `employee_access_tbl_ibfk_3` FOREIGN KEY (`access_role_id`) REFERENCES `employee_role_tbl` (`role_id`);

--
-- Constraints for table `employee_log_tbl`
--
ALTER TABLE `employee_log_tbl`
  ADD CONSTRAINT `employee_log_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_tbl` (`emp_id`),
  ADD CONSTRAINT `employee_log_tbl_ibfk_2` FOREIGN KEY (`emp_medtech_rank_id`) REFERENCES `medtech_rank` (`rank_id`);

--
-- Constraints for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD CONSTRAINT `employee_tbl_ibfk_1` FOREIGN KEY (`emp_medtech_rank_id`) REFERENCES `medtech_rank` (`rank_id`),
  ADD CONSTRAINT `employee_tbl_ibfk_2` FOREIGN KEY (`emp_type_id`) REFERENCES `employee_role_tbl` (`role_id`);

--
-- Constraints for table `emprebate_log_tbl`
--
ALTER TABLE `emprebate_log_tbl`
  ADD CONSTRAINT `emprebate_log_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_tbl` (`emp_id`),
  ADD CONSTRAINT `emprebate_log_tbl_ibfk_2` FOREIGN KEY (`rebate_id`) REFERENCES `rebate_tbl` (`rebate_id`);

--
-- Constraints for table `emp_rebate_tbl`
--
ALTER TABLE `emp_rebate_tbl`
  ADD CONSTRAINT `emp_rebate_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_tbl` (`emp_id`),
  ADD CONSTRAINT `emp_rebate_tbl_ibfk_2` FOREIGN KEY (`rebate_id`) REFERENCES `rebate_tbl` (`rebate_id`);

--
-- Constraints for table `package_log_tbl`
--
ALTER TABLE `package_log_tbl`
  ADD CONSTRAINT `package_log_tbl_ibfk_1` FOREIGN KEY (`pack_id`) REFERENCES `package_tbl` (`pack_id`);

--
-- Constraints for table `package_service_log_tbl`
--
ALTER TABLE `package_service_log_tbl`
  ADD CONSTRAINT `package_service_log_tbl_ibfk_1` FOREIGN KEY (`packserv_package_id`) REFERENCES `package_tbl` (`pack_id`),
  ADD CONSTRAINT `package_service_log_tbl_ibfk_2` FOREIGN KEY (`packserv_serv_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `package_service_tbl`
--
ALTER TABLE `package_service_tbl`
  ADD CONSTRAINT `package_service_tbl_ibfk_1` FOREIGN KEY (`pack_serv_package_id`) REFERENCES `package_tbl` (`pack_id`),
  ADD CONSTRAINT `package_service_tbl_ibfk_2` FOREIGN KEY (`pack_serv_serv_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `patient_log_tbl`
--
ALTER TABLE `patient_log_tbl`
  ADD CONSTRAINT `patient_log_tbl_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_tbl` (`patient_id`),
  ADD CONSTRAINT `patient_log_tbl_ibfk_2` FOREIGN KEY (`patient_type_id`) REFERENCES `patient_type_tbl` (`ptype_id`),
  ADD CONSTRAINT `patient_log_tbl_ibfk_3` FOREIGN KEY (`patient_corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`);

--
-- Constraints for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  ADD CONSTRAINT `patient_tbl_ibfk_1` FOREIGN KEY (`patient_corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`),
  ADD CONSTRAINT `patient_tbl_ibfk_2` FOREIGN KEY (`patient_type_id`) REFERENCES `patient_type_tbl` (`ptype_id`);

--
-- Constraints for table `servgroup_log_tbl`
--
ALTER TABLE `servgroup_log_tbl`
  ADD CONSTRAINT `servgroup_log_tbl_ibfk_1` FOREIGN KEY (`servgroup_id`) REFERENCES `service_group_tbl` (`servgroup_id`);

--
-- Constraints for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`service_group_id`) REFERENCES `service_group_tbl` (`servgroup_id`),
  ADD CONSTRAINT `service_tbl_ibfk_2` FOREIGN KEY (`service_type_id`) REFERENCES `service_type_tbl` (`service_type_id`);

--
-- Constraints for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD CONSTRAINT `transaction_tbl_ibfk_1` FOREIGN KEY (`trans_patient_id`) REFERENCES `patient_tbl` (`patient_id`),
  ADD CONSTRAINT `transaction_tbl_ibfk_2` FOREIGN KEY (`issuedBy_emp_id`) REFERENCES `employee_tbl` (`emp_id`);

--
-- Constraints for table `transresult_tbl`
--
ALTER TABLE `transresult_tbl`
  ADD CONSTRAINT `transresult_tbl_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`);

--
-- Constraints for table `trans_emprebate_tbl`
--
ALTER TABLE `trans_emprebate_tbl`
  ADD CONSTRAINT `trans_emprebate_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_tbl` (`emp_id`),
  ADD CONSTRAINT `trans_emprebate_tbl_ibfk_2` FOREIGN KEY (`rebate_id`) REFERENCES `rebate_tbl` (`rebate_id`);

--
-- Constraints for table `trans_pack_tbl`
--
ALTER TABLE `trans_pack_tbl`
  ADD CONSTRAINT `trans_pack_tbl_ibfk_1` FOREIGN KEY (`pack_id`) REFERENCES `package_tbl` (`pack_id`),
  ADD CONSTRAINT `trans_pack_tbl_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`);

--
-- Constraints for table `trans_resultfiles_tbl`
--
ALTER TABLE `trans_resultfiles_tbl`
  ADD CONSTRAINT `trans_resultfiles_tbl_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `transresult_tbl` (`result_id`),
  ADD CONSTRAINT `trans_resultfiles_tbl_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`);

--
-- Constraints for table `trans_result_service_tbl`
--
ALTER TABLE `trans_result_service_tbl`
  ADD CONSTRAINT `trans_result_service_tbl_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `transresult_tbl` (`result_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trans_result_service_tbl_ibfk_2` FOREIGN KEY (`service_group_id`) REFERENCES `service_group_tbl` (`servgroup_id`),
  ADD CONSTRAINT `trans_result_service_tbl_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `trans_serv_tbl`
--
ALTER TABLE `trans_serv_tbl`
  ADD CONSTRAINT `trans_serv_tbl_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`),
  ADD CONSTRAINT `trans_serv_tbl_ibfk_2` FOREIGN KEY (`serv_id`) REFERENCES `service_tbl` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
