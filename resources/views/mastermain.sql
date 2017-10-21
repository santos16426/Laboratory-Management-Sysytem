-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 06:09 AM
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
-- Database: `mastermain`
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
(10002, 100012, '1111', 'kevin salud', 'CIA@gmail.com', 'CIA', 1, '2017-10-14 03:48:46'),
(10003, 100013, '18181', 'dannica', 'dannicamoratalla@gmail.com', 'CIS', 1, '2017-10-14 03:49:11'),
(10004, 100014, '818182', 'Billy', 'billy@gmail.com', 'Elan Hotel', 1, '2017-10-14 03:50:49'),
(10005, 100015, '5333', 'micha', 'mcha@gmail.com', 'MCHA', 1, '2017-10-14 03:51:20'),
(10006, 100016, '55744', 'zander', 'dennislee@gmail.com', 'CLEARSIGHT', 1, '2017-10-14 03:51:59'),
(10007, 100017, '282882', 'samantha', 'sam@yahoo.com.ph', 'COMPMED', 1, '2017-10-14 03:52:30'),
(10008, 100018, '444222', 'markkk', 'mark@gmail.com', 'RRH VITAL FINDS', 1, '2017-10-14 03:53:21'),
(10009, 100019, '959595', 'joseph', 'joseph.gallardo@gmail.com', 'GLOBALTRONICS', 1, '2017-10-14 03:54:05'),
(10010, 100020, '54333', 'sean', 'seanu@yahoo.com', 'INKRITE', 1, '2017-10-14 03:54:45'),
(10011, 100021, '48484', 'patriz', 'patrizmalabanan@gmail.com', 'HYPRO CONSTRUCTION', 1, '2017-10-14 03:55:28'),
(10012, 100022, '02022882', 'gwen', 'gwenu@yahoo.com', 'GIORDANO PHILS', 1, '2017-10-14 03:56:03'),
(10013, 100023, '29292', 'camille', 'email@gmail.com', 'CDRI CREATIVE DISHES', 1, '2017-10-14 03:57:07'),
(10014, 100024, '19191', 'paula', 'paula@yahoo.com', 'FIRM FIRST INTEGRAL', 1, '2017-10-14 03:58:08'),
(10015, 100025, '2292', 'shiela', 'shiela@gmail.com', 'STRATEGIC ALTERNATIV', 1, '2017-10-14 03:58:58'),
(10016, 100026, '0918181', 'Alberto Guilllo', 'alberto@gmail.com', 'PUP', 1, '2017-10-18 13:31:55');

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
  `CorpStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_accounts_tbl`
--

INSERT INTO `corporate_accounts_tbl` (`corp_id`, `corp_name`, `corp_contact`, `corp_email`, `corp_contactperson`, `CorpStatus`) VALUES
(100012, 'CIA', '1111', 'CIA@gmail.com', 'kevin salud', 1),
(100013, 'CIS', '18181', 'dannicamoratalla@gmail.com', 'dannica', 1),
(100014, 'Elan Hotel', '818182', 'billy@gmail.com', 'Billy', 1),
(100015, 'MCHA', '5333', 'mcha@gmail.com', 'micha', 1),
(100016, 'CLEARSIGHT', '55744', 'dennislee@gmail.com', 'zander', 1),
(100017, 'COMPMED', '282882', 'sam@yahoo.com.ph', 'samantha', 1),
(100018, 'RRH VITAL FINDS', '444222', 'mark@gmail.com', 'markkk', 1),
(100019, 'GLOBALTRONICS', '959595', 'joseph.gallardo@gmail.com', 'joseph', 1),
(100020, 'INKRITE', '54333', 'seanu@yahoo.com', 'sean', 1),
(100021, 'HYPRO CONSTRUCTION', '48484', 'patrizmalabanan@gmail.com', 'patriz', 1),
(100022, 'GIORDANO PHILS', '02022882', 'gwenu@yahoo.com', 'gwen', 1),
(100023, 'CDRI CREATIVE DISHES', '29292', 'email@gmail.com', 'camille', 1),
(100024, 'FIRM FIRST INTEGRAL', '19191', 'paula@yahoo.com', 'paula', 1),
(100025, 'STRATEGIC ALTERNATIV', '2292', 'shiela@gmail.com', 'shiela', 1),
(100026, 'PUP', '0918181', 'alberto@gmail.com', 'Alberto Guilllo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `corp_package_log_tbl`
--

CREATE TABLE `corp_package_log_tbl` (
  `corpPackLog_id` int(11) NOT NULL,
  `corpPack_name` varchar(255) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` varchar(10) NOT NULL DEFAULT 'All',
  `gender` int(11) NOT NULL DEFAULT '3',
  `corpPack_id` int(11) NOT NULL,
  `physical_exam` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_package_log_tbl`
--

INSERT INTO `corp_package_log_tbl` (`corpPackLog_id`, `corpPack_name`, `corp_id`, `price`, `updated_at`, `age`, `gender`, `corpPack_id`, `physical_exam`) VALUES
(1, 'Package for PUP', 100026, 1800, '2017-10-18 13:35:32', 'All', 3, 100019, '1');

-- --------------------------------------------------------

--
-- Table structure for table `corp_package_tbl`
--

CREATE TABLE `corp_package_tbl` (
  `corpPack_id` int(11) NOT NULL,
  `corpPack_name` varchar(255) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `CorpPackStatus` int(11) NOT NULL DEFAULT '1',
  `age` varchar(10) NOT NULL DEFAULT 'All',
  `gender` int(11) NOT NULL DEFAULT '3',
  `physical_exam` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_package_tbl`
--

INSERT INTO `corp_package_tbl` (`corpPack_id`, `corpPack_name`, `corp_id`, `price`, `CorpPackStatus`, `age`, `gender`, `physical_exam`) VALUES
(100001, 'Package 1', 100023, 3000, 1, 'All', 3, '1'),
(100002, 'Package 1', 100012, 3000, 1, 'All', 3, '1'),
(100003, 'Package 1', 100013, 3000, 1, 'All', 3, '1'),
(100004, 'Package 1', 100016, 2000, 1, 'All', 3, '1'),
(100005, 'Package 1', 100017, 1000, 1, 'All', 3, '1'),
(100006, 'Package 1', 100014, 600, 1, 'All', 3, '1'),
(100007, 'Package 1', 100024, 550, 1, 'All', 3, '1'),
(100008, 'Package 1', 100022, 580, 1, 'All', 3, '1'),
(100009, 'Male Package', 100019, 650, 1, 'All', 1, '1'),
(100010, 'Female Package', 100019, 650, 1, 'All', 2, '1'),
(100011, 'Package 1', 100021, 495, 1, 'All', 3, '1'),
(100012, 'P1 Female', 100020, 350, 1, 'All', 2, '1'),
(100013, 'P2 Male', 100020, 350, 1, 'All', 1, '1'),
(100014, 'P3 Rider', 100020, 600, 1, 'All', 3, '1'),
(100015, 'Package 1', 100015, 510, 1, 'All', 3, '1'),
(100016, 'Male Package', 100018, 680, 1, 'All', 1, '1'),
(100017, 'Female Package', 100018, 550, 1, 'All', 2, '1'),
(100018, 'Package 1', 100025, 495, 1, 'All', 3, '1'),
(100019, 'Package for PUP', 100026, 1800, 1, 'All', 3, '1');

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
(1, 100019, 100159, '2017-10-18 13:35:32'),
(2, 100019, 100160, '2017-10-18 13:35:32'),
(3, 100019, 100161, '2017-10-18 13:35:32');

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
(100001, 100020),
(100001, 100043),
(100001, 100078),
(100001, 100085),
(100001, 100133),
(100001, 100020),
(100001, 100043),
(100001, 100078),
(100001, 100085),
(100001, 100133),
(100001, 100020),
(100001, 100044),
(100001, 100078),
(100001, 100133),
(100001, 100144),
(100002, 100020),
(100002, 100043),
(100002, 100078),
(100002, 100085),
(100002, 100133),
(100003, 100020),
(100003, 100043),
(100003, 100078),
(100003, 100085),
(100003, 100133),
(100004, 100020),
(100004, 100078),
(100004, 100133),
(100001, 100020),
(100001, 100044),
(100001, 100078),
(100001, 100133),
(100001, 100144),
(100001, 100162),
(100002, 100020),
(100002, 100043),
(100002, 100078),
(100002, 100085),
(100002, 100133),
(100002, 100162),
(100002, 100159),
(100003, 100020),
(100003, 100043),
(100003, 100078),
(100003, 100085),
(100003, 100133),
(100003, 100162),
(100003, 100159),
(100004, 100020),
(100004, 100078),
(100004, 100133),
(100004, 100162),
(100004, 100159),
(100005, 100020),
(100005, 100133),
(100005, 100162),
(100005, 100159),
(100006, 100043),
(100006, 100133),
(100006, 100159),
(100007, 100020),
(100007, 100078),
(100007, 100133),
(100007, 100162),
(100007, 100159),
(100008, 100020),
(100008, 100078),
(100008, 100133),
(100008, 100162),
(100008, 100159),
(100009, 100020),
(100009, 100078),
(100009, 100133),
(100009, 100162),
(100009, 100159),
(100010, 100020),
(100010, 100043),
(100010, 100133),
(100010, 100134),
(100010, 100162),
(100010, 100159),
(100011, 100020),
(100011, 100078),
(100011, 100133),
(100011, 100162),
(100011, 100159),
(100012, 100020),
(100012, 100133),
(100012, 100134),
(100012, 100162),
(100012, 100159),
(100013, 100020),
(100013, 100027),
(100013, 100133),
(100013, 100162),
(100013, 100159),
(100014, 100020),
(100014, 100078),
(100014, 100133),
(100014, 100162),
(100014, 100159),
(100015, 100044),
(100015, 100133),
(100015, 100159),
(100016, 100020),
(100016, 100078),
(100016, 100133),
(100016, 100159),
(100017, 100020),
(100017, 100043),
(100017, 100133),
(100017, 100134),
(100017, 100162),
(100017, 100159),
(100018, 100020),
(100018, 100078),
(100018, 100133),
(100018, 100162),
(100018, 100159),
(100019, 100159),
(100019, 100160),
(100019, 100161);

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
  `emp_medtech_rank_id` int(11) DEFAULT NULL,
  `emp_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log_tbl`
--

INSERT INTO `employee_log_tbl` (`empLog_id`, `emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_address`, `license_no`, `emp_contact`, `updated_at`, `status`, `emp_medtech_rank_id`, `emp_pic`) VALUES
(1, 100018, 'Jan', 'Jan', 'Jan', NULL, 'JA1234', NULL, '2017-10-17 16:15:31', 1, NULL, 'default.jpg'),
(2, 100019, 'Mark', 'Delos', 'REyes', NULL, 'MA1234', NULL, '2017-10-17 16:34:49', 1, NULL, 'default.jpg'),
(3, 100011, 'Samantha', '', 'Jarme', 'Pureza, Sta Mesa, Manila', 'NH7348', '92868366', '2017-10-18 11:58:20', 1, NULL, 'default.jpg'),
(4, 100020, 'Jhealourne', '', 'Mangaring', 'Cubao, Quezon City', 'NH675', NULL, '2017-10-18 13:17:19', 1, NULL, 'default.jpg'),
(5, 100021, 'Juan', 'Martinez', 'Delos Reyes', 'Las Pinas', 'NH6756', '09106005754', '2017-10-18 13:19:04', 1, NULL, 'default.jpg'),
(6, 100022, 'Salvador', '', 'Zander', 'Cubao, Quezon City', 'NH6750', '9191919', '2017-10-18 13:22:46', 1, NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_role_tbl`
--

CREATE TABLE `employee_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `RoleStatus` tinyint(4) DEFAULT '1',
  `lab_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_role_tbl`
--

INSERT INTO `employee_role_tbl` (`role_id`, `role_name`, `RoleStatus`, `lab_id`) VALUES
(100005, 'Medical Technologist', 1, 100018),
(100006, 'Doctor', 1, 100016),
(100007, 'Pathologist', 1, 100017),
(100008, 'Cardiac Physiologist', 1, 100014),
(100009, 'Sonologist', 1, 100015),
(100010, 'Radio Technologist', 1, 100013),
(100011, 'Physician', 1, 100017),
(100012, 'Receptionist', 1, 100019),
(100013, 'Radiologist', 1, 100013),
(100014, 'Drug Test Analyst', 1, 100017),
(100015, 'Pathologist 1', 1, 100017);

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
  `EmpStatus` tinyint(11) NOT NULL DEFAULT '1',
  `emp_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_type_id`, `emp_address`, `emp_medtech_rank_id`, `license_no`, `emp_contact`, `EmpStatus`, `emp_pic`) VALUES
(100006, 'Dannica', 'Moises', 'Moratalla', 100006, 'Blk. 23 Lot 11 Las Pinas City', NULL, 'NH734', '09106004045', 1, 'default.jpg'),
(100007, 'Joseph Jem', 'Princillo', 'Gallardo', 100005, 'Blk 44 Lot 8 Brgy Memije GMA Cavite', 1, 'NH7345', '09286803667', 1, 'default.jpg'),
(100008, 'Ana Karylle', 'Tatlonghari', 'Viceral', 100007, 'Quezon City', NULL, 'NH7349', '09177111999', 1, 'default.jpg'),
(100009, 'Billy Joe', 'Lucas', 'Santos', 100008, 'Cubao, Quezon City', NULL, 'NH7347', '2828112', 1, 'default.jpg'),
(100010, 'Gwyn Stephanie', '', 'Albania', 100009, 'Sta. Mesa Manila', NULL, 'NH8393', '19191010', 1, 'default.jpg'),
(100011, 'Samantha', '', 'Jarme', 100010, 'Pureza, Sta Mesa, Manila', NULL, 'NH7348', '92868366', 1, 'default.jpg'),
(100012, 'Patriz Danielle', 'Aranez', 'Malabanan', 100011, 'Paranaque City', NULL, 'NH7341', '178828', 1, 'default.jpg'),
(100013, 'Paula Marie', 'Salalila', 'Perlado', 100012, 'Mandaluyong City', NULL, NULL, '09111999', 1, 'default.jpg'),
(100014, 'Camille', '', 'Galang', 100006, 'Valenzuela City', NULL, 'NH7356', '19727', 1, 'default.jpg'),
(100015, 'Jose Marie', 'Borja', 'Viceral', 100006, 'Project 4, Quezon City', NULL, 'NH7342', '7584829', 1, 'default.jpg'),
(100016, 'Zander', '', 'Salvador', 100005, 'Quezon City', 2, 'NH7343', '183637', 1, 'default.jpg'),
(100017, 'Ferlaine', 'Ara', 'Montoya', 100005, 'GMA, Cavite', 3, 'NH7340', '55667', 1, 'default.jpg'),
(100018, 'Jan', 'Jan', 'Jan', 100013, NULL, NULL, 'JA1234', NULL, 1, 'default.jpg'),
(100019, 'Mark', 'Delos', 'REyes', 100014, NULL, NULL, 'MA1234', NULL, 1, 'default.jpg'),
(100020, 'Jhealourne', '', 'Mangaring', 100015, 'Cubao, Quezon City', NULL, 'NH675', NULL, 1, 'default.jpg'),
(100021, 'Juan', 'Martinez', 'Delos Reyes', 100008, 'Las Pinas', NULL, 'NH6756', '09106005754', 0, 'default.jpg'),
(100022, 'Salvador', '', 'Zander', 100006, 'Cubao, Quezon City', NULL, 'NH6750', '9191919', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_useraccess_tbl`
--

CREATE TABLE `employee_useraccess_tbl` (
  `addlab` int(11) NOT NULL DEFAULT '0',
  `uplab` int(11) NOT NULL DEFAULT '0',
  `dellab` int(11) NOT NULL DEFAULT '0',
  `addemp` int(11) NOT NULL DEFAULT '0',
  `upemp` int(11) NOT NULL DEFAULT '0',
  `delemp` int(11) NOT NULL DEFAULT '0',
  `addemptype` int(11) NOT NULL DEFAULT '0',
  `upemptype` int(11) NOT NULL DEFAULT '0',
  `delemptype` int(11) NOT NULL DEFAULT '0',
  `editpercent` int(11) NOT NULL DEFAULT '0',
  `addempreb` int(11) NOT NULL DEFAULT '0',
  `delempreb` int(11) NOT NULL DEFAULT '0',
  `addpack` int(11) NOT NULL DEFAULT '0',
  `uppack` int(11) NOT NULL DEFAULT '0',
  `delpack` int(11) NOT NULL DEFAULT '0',
  `addservgrp` int(11) NOT NULL DEFAULT '0',
  `upservgrp` int(11) NOT NULL DEFAULT '0',
  `delservgrp` int(11) NOT NULL DEFAULT '0',
  `addservtype` int(11) NOT NULL DEFAULT '0',
  `upservtype` int(11) NOT NULL DEFAULT '0',
  `delservtype` int(11) NOT NULL DEFAULT '0',
  `addserv` int(11) NOT NULL DEFAULT '0',
  `upserv` int(11) NOT NULL DEFAULT '0',
  `delserv` int(11) NOT NULL DEFAULT '0',
  `addcorp` int(11) NOT NULL DEFAULT '0',
  `upcorp` int(11) NOT NULL DEFAULT '0',
  `delcorp` int(11) NOT NULL DEFAULT '0',
  `addcorppack` int(11) NOT NULL DEFAULT '0',
  `upcorppack` int(11) NOT NULL DEFAULT '0',
  `delcorppack` int(11) NOT NULL DEFAULT '0',
  `addpatient` int(11) NOT NULL DEFAULT '0',
  `availserv` int(11) NOT NULL DEFAULT '0',
  `corpbill` int(11) NOT NULL DEFAULT '0',
  `rebatebill` int(11) NOT NULL DEFAULT '0',
  `addresult` int(11) NOT NULL DEFAULT '0',
  `upresult` int(11) NOT NULL DEFAULT '0',
  `arcresult` int(11) NOT NULL DEFAULT '0',
  `census` int(11) NOT NULL DEFAULT '0',
  `trans` int(11) NOT NULL DEFAULT '0',
  `corprep` int(11) NOT NULL DEFAULT '0',
  `rebaterep` int(11) NOT NULL DEFAULT '0',
  `emp_type_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `uppatient` int(11) NOT NULL DEFAULT '0',
  `delpatient` int(11) NOT NULL DEFAULT '0',
  `service` int(11) NOT NULL DEFAULT '0',
  `empcount` int(11) NOT NULL DEFAULT '0',
  `corpaccounts` int(11) NOT NULL DEFAULT '0',
  `totpatients` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  `result` int(11) NOT NULL DEFAULT '0',
  `resultlist` int(11) NOT NULL DEFAULT '0',
  `transaction` int(11) NOT NULL DEFAULT '0',
  `rebatepercentage` int(11) NOT NULL DEFAULT '0',
  `income` int(11) NOT NULL DEFAULT '0',
  `corppayment` int(11) NOT NULL DEFAULT '0',
  `rebatepayment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_useraccess_tbl`
--

INSERT INTO `employee_useraccess_tbl` (`addlab`, `uplab`, `dellab`, `addemp`, `upemp`, `delemp`, `addemptype`, `upemptype`, `delemptype`, `editpercent`, `addempreb`, `delempreb`, `addpack`, `uppack`, `delpack`, `addservgrp`, `upservgrp`, `delservgrp`, `addservtype`, `upservtype`, `delservtype`, `addserv`, `upserv`, `delserv`, `addcorp`, `upcorp`, `delcorp`, `addcorppack`, `upcorppack`, `delcorppack`, `addpatient`, `availserv`, `corpbill`, `rebatebill`, `addresult`, `upresult`, `arcresult`, `census`, `trans`, `corprep`, `rebaterep`, `emp_type_id`, `access_id`, `uppatient`, `delpatient`, `service`, `empcount`, `corpaccounts`, `totpatients`, `profit`, `result`, `resultlist`, `transaction`, `rebatepercentage`, `income`, `corppayment`, `rebatepayment`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100005, 100005, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100006, 100006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100007, 100007, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100008, 100008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100009, 100009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100010, 100010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100011, 100011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100012, 100012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100013, 100013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 100014, 100014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100015, 100015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 100022, 100006, '2017-10-18 13:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `emp_rebate_tbl`
--

CREATE TABLE `emp_rebate_tbl` (
  `empReb_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `rebate_id` int(11) NOT NULL,
  `EmpRebStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_rebate_tbl`
--

INSERT INTO `emp_rebate_tbl` (`empReb_id`, `emp_id`, `rebate_id`, `EmpRebStatus`) VALUES
(100006, 100006, 100003, 1),
(100007, 100014, 100003, 1),
(100008, 100015, 100003, 1),
(100009, 100022, 100006, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_tbl`
--

CREATE TABLE `laboratory_tbl` (
  `lab_id` int(10) NOT NULL,
  `lab_name` varchar(255) NOT NULL,
  `LabStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory_tbl`
--

INSERT INTO `laboratory_tbl` (`lab_id`, `lab_name`, `LabStatus`) VALUES
(100013, 'X-Ray Room', 1),
(100014, 'ECG Room', 1),
(100015, 'Ultrasound Room', 1),
(100016, 'Clinic', 1),
(100017, 'Laboratory', 1),
(100018, 'Medtech Office', 1),
(100019, 'Reception', 1),
(100020, 'X-RAY Department', 1);

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
(100004, 100101, '2017-10-16 12:53:34', 1),
(100004, 100107, '2017-10-16 12:53:34', 1),
(100004, 100108, '2017-10-16 12:53:35', 1),
(100004, 100109, '2017-10-16 12:53:35', 1),
(100004, 100110, '2017-10-16 12:53:35', 1);

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
(100001, 100020, 1),
(100001, 100027, 1),
(100001, 100034, 1),
(100001, 100133, 1),
(100002, 100020, 1),
(100002, 100133, 1),
(100002, 100144, 1),
(100003, 100048, 1),
(100003, 100049, 1),
(100003, 100050, 1),
(100003, 100064, 1),
(100003, 100066, 1),
(100003, 100156, 1),
(100003, 100101, 1),
(100003, 100106, 1),
(100005, 100110, 1),
(100005, 100111, 1),
(100005, 100112, 1),
(100005, 100113, 1),
(100006, 100115, 1),
(100006, 100157, 1),
(100006, 100158, 1),
(100006, 100151, 1),
(100006, 100152, 1),
(100007, 100020, 1),
(100007, 100133, 1),
(100007, 100144, 1),
(100007, 100159, 1),
(100008, 100101, 1),
(100008, 100107, 1),
(100008, 100108, 1),
(100008, 100109, 1),
(100008, 100110, 1),
(100008, 100111, 1),
(100008, 100112, 1),
(100008, 100113, 1),
(100004, 100101, 1),
(100004, 100107, 1),
(100004, 100108, 1),
(100004, 100109, 1),
(100004, 100110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_tbl`
--

CREATE TABLE `package_tbl` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_price` double NOT NULL,
  `PackStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_tbl`
--

INSERT INTO `package_tbl` (`pack_id`, `pack_name`, `pack_price`, `PackStatus`) VALUES
(100001, 'Pre-Natal Package', 500, 1),
(100002, 'Routine Exam', 900, 1),
(100003, 'Infertility Package', 2200, 1),
(100004, 'Chemistry 5', 300, 1),
(100005, 'Lipid Profile', 400, 1),
(100006, 'Liver Profile', 2500, 1),
(100007, 'Pre-Employment', 1200, 1),
(100008, 'Chemistry 8', 600, 1);

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
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `patient_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_log_tbl`
--

INSERT INTO `patient_log_tbl` (`patientLog_id`, `patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_address`, `patient_contact`, `patient_birthdate`, `age`, `patient_gender`, `patient_type_id`, `patient_corp_id`, `patient_civilstatus`, `updated_at`, `patient_email`) VALUES
(1, 100024, 'Mark', '', 'De los reyes', 'qc baesa', '092325', '1970-01-01', 47, 'Male', 2, 100015, 'Married', '2017-10-17 03:10:00', 'eq@gmail.com'),
(2, 100025, 'Ahtnam', 'Aromaz', 'Emraj', '322 C. De Dios St. Sta Mesa, Manila', '5516264', '1995-04-02', 22, 'Female', 1, NULL, 'Married', '2017-02-04 21:25:18', 'Athna@gmail.com'),
(3, 100026, 'Albert', 'Racoon', 'Wesker', '411 Mag. Mapa St. Bacood Sta Mesa, Manila', '091123456', '1970-01-01', 32, 'Male', 1, NULL, 'Single', '2017-04-10 21:32:16', 'AlbyyWest@gmail.com'),
(4, 100027, 'Liza', '', 'Zamora', '3435 Mag. Torres St. Bacood Sta Mesa, Manila', '091958923', '1970-01-01', 65, 'Female', 1, NULL, 'Widowed', '2017-04-28 21:35:53', 'LizzAm@yahoo.com'),
(5, 100028, 'Libertia', '', 'McDouglas', '1221 Illumina P. Sanchez St. V. Mapa corner Sta Mesa, Manila', '5160384', '1970-01-01', 31, 'Female', 1, NULL, 'Single', '2017-05-13 21:39:37', 'Libertad@gmail.com'),
(6, 100029, 'Danniel Tristan', 'Zamora', 'Sarmiento', 'Block 6 Lot 6 St. Cavite City', '090445332', '1970-01-01', 19, 'Male', 1, NULL, 'Single', '2017-05-24 21:43:10', 'DST@gmail.com'),
(7, 100030, 'Samantha', 'Jarme', 'Bukid', '1515 Dr. Sixto St. Pasig City', '09064558554', '1993-01-05', 24, 'Female', 1, NULL, 'Married', '2017-06-15 21:46:54', 'samkid@yahoo.com'),
(8, 100031, 'Jules Dexter', 'Sarmiento', 'Zamora', '432 Fegeras St. Legarda, Manila', '095543342', '1970-01-01', 18, 'Male', 1, NULL, 'Single', '2017-06-15 21:49:31', 'unclean@yahoo.com'),
(9, 100032, 'Gerald', 'Bukid', 'Jarme', '3432 Mag. Albert St. Bacood Sta Mesa, Manila', '099934567', '1970-01-01', 24, 'Male', 1, NULL, 'Married', '2017-08-15 11:34:13', 'vladkid@gmail.com'),
(10, 100033, 'Claire', '', 'Redfield', '421 Racoon St. Tereza Sta Mesa, Manila', '5532342', '1997-01-08', 20, 'Female', 1, NULL, 'Single', '2017-08-18 11:37:56', 'ClaireX@yahoo.com'),
(11, 100034, 'Leon', '', 'Kennedy', '435 Espana St. Quiapo, Manila', '512788', '1970-01-01', 26, 'Male', 1, NULL, 'Single', '2017-08-18 11:40:24', 'Leonell@yahoo.com'),
(12, 100035, 'Mikhaella', 'Tamayo', 'Pinca', 'Cavite City', '091817171', '1970-01-01', 18, 'Female', 2, 100017, 'Single', '2017-10-17 22:18:19', 'mikchespinca@gmail.com'),
(13, 100036, 'Billy', '', 'Navarro', 'Cubao, QC', '919191911', '1970-01-01', 20, 'Male', 2, 100026, 'Married', '2017-10-18 13:37:33', 'billy@yahoo.com.ph'),
(14, 100037, 'John Justin', '', 'Santos', 'Taguig City', '092727271821', '1970-01-01', 72, 'Male', 1, NULL, 'Married', '2017-10-18 13:44:13', 'santos@yahoo.com');

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
  `PatientStatus` int(11) NOT NULL DEFAULT '1',
  `claimCode` varchar(50) NOT NULL,
  `webPass` varchar(50) NOT NULL,
  `patient_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_tbl`
--

INSERT INTO `patient_tbl` (`patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_address`, `patient_contact`, `patient_birthdate`, `age`, `patient_gender`, `patient_type_id`, `patient_corp_id`, `patient_civilstatus`, `PatientStatus`, `claimCode`, `webPass`, `patient_email`) VALUES
(100001, 'Dannica', 'Moises', 'Moratalla', 'blk 23 lot 11 ctk sudb', '09105656', '2005-06-01', 20, 'Female', 1, NULL, 'Married', 1, '2017-ZCK1', '', 'withbawang@gmail.com'),
(100002, 'Jessa', 'Nazareth', 'Penilla', 'Manila', '881818', '1970-01-01', 19, 'Female', 1, NULL, 'Single', 1, '2017-Z6Y9', '', 'jessa@gmail.com'),
(100003, 'Joyce', 'Princillo', 'Gallardo', 'GMA Cavite', '171717', '1997-11-15', 19, 'Female', 1, 100012, 'Single', 1, '2017-VFU4', '', 'joyce@gmail.com'),
(100004, 'Ferlaine', 'Ara', 'Montoya', 'GMA Cavite', '099171', '1970-01-01', 20, 'Female', 1, NULL, 'Married', 1, '2017-ZM5H', '', 'ferlaine@yahoo.com'),
(100005, 'Sharon', '', 'Moises', 'las pinas', '09286646642', '1970-01-01', 16, 'Female', 1, NULL, 'Single', 1, '2017-H7OA', '', 'sharonmoises@gmail.com'),
(100006, 'Maolyn', '', 'Ramirez', 'Cavite City', '0916616161', '1970-01-01', 19, 'Female', 1, NULL, 'Single', 1, '2017-7MGK', '', 'mao@gmail.com'),
(100007, 'Marlou', 'Noreza', 'Medina', 'Cavite City', '091663661', '1997-05-11', 19, 'Female', 2, 100012, 'Single', 1, '2017-O6VB', '', 'marlou@yahoo.com'),
(100008, 'Tricia', 'Salvador', 'Napagao', 'Cavite City', '18818181', '1970-01-01', 19, 'Female', 2, 100013, 'Single', 1, '2017-H8DB', '', 'trina@gmail.com'),
(100009, 'Patriz', 'Aranez', 'Malabanan', 'Paranaque City', '11818181', '1970-01-01', 19, 'Female', 2, 100014, 'Married', 1, '2017-UIDW', '', 'patrizmalabanan@gmail.com'),
(100010, 'Kevin', 'Castillo', 'Salud', 'Antipolo City', '091818181199', '1990-12-03', 27, 'Female', 2, 100015, 'Married', 1, '2017-SQWK', '', 'kevincastillo@gmail.com'),
(100011, 'Paula Marie', 'Salalila', 'Perlado', 'Mandaluyong, City', '098726261628', '1970-01-01', 19, 'Female', 2, 100016, 'Single', 1, '2017-R4UM', '', 'paulamarie@yahoo.com'),
(100012, 'Gwyneth', '', 'Albania', 'Sta Mesa Manila', '01018272', '1969-01-10', 48, 'Female', 2, 100017, 'Single', 1, '2017-UR7I', 'ALBANIA', 'gweny@gmail.com'),
(100013, 'Zander', '', 'Salvador', 'Quezon City', '28282828', '1970-01-01', 19, 'Male', 2, 100017, 'Married', 1, '2017-CT6E', '', 'dennislee@gmail.com'),
(100014, 'Billy Joe', 'Lucas', 'Santos', 'Quezon City', '09363373737', '1998-10-02', 19, 'Male', 2, 100018, 'Single', 1, '2017-7KUO', '', 'billyjoe@gmail.com'),
(100015, 'Mark Kristan', '', 'Delos Reyes', 'Caloocan City', '01917171', '1986-12-08', 31, 'Male', 2, 100019, 'Single', 1, '2017-OG53', '', 'markmark@yahoo.com.ph'),
(100016, 'Sean Adryl', '', 'Gregorio', 'Sta Mesa Manila', '0937373737', '1970-01-01', 27, 'Male', 2, 100020, 'Married', 1, '2017-413M', '', 'seangregory@yahoo.com'),
(100017, 'Samantha', '', 'Jarme', 'Pureza, Sta Mesa Manila', '282882', '1970-01-01', 26, 'Female', 2, 100020, 'Single', 1, '2017-DFH5', '', 'samsamsam@yahoo.com'),
(100018, 'Alvirg', 'Dulay', 'Bendillo', 'Las Pinas City', '0119119', '1995-08-04', 22, 'Male', 2, 100021, 'Single', 1, '2017-1QU6', '', 'alvirgbendillo08@gmail.com'),
(100019, 'Justine Mae', '', 'De Leon', 'Bocaue, Bulacan', '09272727181', '1980-01-10', 37, 'Female', 2, 100022, 'Single', 1, '2017-IC06', '', 'justinemaeehh@gmail.com'),
(100020, 'Gezter', '', 'Garcia', 'Las Pinas City', '09837361717', '1970-01-01', 25, 'Male', 2, 100023, 'Single', 1, '2017-RID0', '', 'gezterman@gmail.com'),
(100021, 'Nicole Adrianne', '', 'Madrigalejo', 'Makati City', '0073336717', '1970-01-01', 22, 'Female', 2, 100024, 'Married', 1, '2017-5K3N', '', 'nicolekulot@yahoo.com'),
(100022, 'Apollo', 'Dionela', 'De Guzman', 'CAA, Las Pinas City', '0911772772', '1999-01-10', 18, 'Male', 2, 100025, 'Married', 1, '2017-SIE3', '', 'godofsunapollo@gmail.com'),
(100023, 'Rhodora', 'Santos', 'Guitap', 'Cavite City', '09172726262', '1970-01-01', 39, 'Female', 1, NULL, 'Single', 1, '2017-N5GF', '', 'rhoda@yahoo.com'),
(100024, 'Mark', '', 'De los reyes', 'qc baesa', '092325', '1970-01-01', 47, 'Male', 2, 100015, 'Married', 1, '2017-SC8I', 'DELOSREYES', 'eq@gmail.com'),
(100025, 'Ahtnam', 'Aromaz', 'Emraj', '322 C. De Dios St. Sta Mesa, Manila', '5516264', '1995-04-02', 22, 'Female', 1, NULL, 'Married', 1, '2017-42YZ', 'EMRAJ', 'Athna@gmail.com'),
(100026, 'Albert', 'Racoon', 'Wesker', '411 Mag. Mapa St. Bacood Sta Mesa, Manila', '091123456', '1970-01-01', 32, 'Male', 1, NULL, 'Single', 1, '2017-1J02', 'WESKER', 'AlbyyWest@gmail.com'),
(100027, 'Liza', '', 'Zamora', '3435 Mag. Torres St. Bacood Sta Mesa, Manila', '091958923', '1970-01-01', 65, 'Female', 1, NULL, 'Widowed', 1, '2017-RDOH', 'ZAMORA', 'LizzAm@yahoo.com'),
(100028, 'Libertia', '', 'McDouglas', '1221 Illumina P. Sanchez St. V. Mapa corner Sta Mesa, Manila', '5160384', '1970-01-01', 31, 'Female', 1, NULL, 'Single', 1, '2017-39MU', 'MCDOUGLAS', 'Libertad@gmail.com'),
(100029, 'Danniel Tristan', 'Zamora', 'Sarmiento', 'Block 6 Lot 6 St. Cavite City', '090445332', '1970-01-01', 19, 'Male', 1, NULL, 'Single', 1, '2017-GP4Z', 'SARMIENTO', 'DST@gmail.com'),
(100030, 'Samantha', 'Jarme', 'Bukid', '1515 Dr. Sixto St. Pasig City', '09064558554', '1993-01-05', 24, 'Female', 1, NULL, 'Married', 1, '2017-45DU', 'BUKID', 'samkid@yahoo.com'),
(100031, 'Jules Dexter', 'Sarmiento', 'Zamora', '432 Fegeras St. Legarda, Manila', '095543342', '1970-01-01', 18, 'Male', 1, NULL, 'Single', 1, '2017-78DV', 'ZAMORA', 'unclean@yahoo.com'),
(100032, 'Gerald', 'Bukid', 'Jarme', '3432 Mag. Albert St. Bacood Sta Mesa, Manila', '099934567', '1970-01-01', 24, 'Male', 1, NULL, 'Married', 1, '2017-1JVP', 'JARME', 'vladkid@gmail.com'),
(100033, 'Claire', '', 'Redfield', '421 Racoon St. Tereza Sta Mesa, Manila', '5532342', '1997-01-08', 20, 'Female', 1, NULL, 'Single', 1, '2017-OJBX', 'REDFIELD', 'ClaireX@yahoo.com'),
(100034, 'Leon', '', 'Kennedy', '435 Espana St. Quiapo, Manila', '512788', '1970-01-01', 26, 'Male', 1, NULL, 'Single', 1, '2017-EHD6', 'KENNEDY', 'Leonell@yahoo.com'),
(100035, 'Mikhaella', 'Tamayo', 'Pinca', 'Cavite City', '091817171', '1970-01-01', 18, 'Female', 2, 100017, 'Single', 1, '2017-I2T8', 'PINCA', 'mikchespinca@gmail.com'),
(100036, 'Billy', '', 'Navarro', 'Cubao, QC', '919191911', '1970-01-01', 20, 'Male', 2, 100026, 'Married', 1, '2017-51PL', 'NAVARRO', 'billy@yahoo.com.ph'),
(100037, 'John Justin', '', 'Santos', 'Taguig City', '092727271821', '1970-01-01', 72, 'Male', 1, NULL, 'Married', 1, '2017-W4G6', 'SANTOS', 'santos@yahoo.com');

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
  `percentage` double NOT NULL,
  `created_at` datetime NOT NULL,
  `RebateStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rebate_tbl`
--

INSERT INTO `rebate_tbl` (`rebate_id`, `percentage`, `created_at`, `RebateStatus`) VALUES
(100001, 10, '2017-10-10 19:12:17', 1),
(100002, 11, '2017-10-11 16:41:13', 1),
(100003, 15, '2017-10-14 02:25:00', 1),
(100004, 2.5, '2017-10-16 01:54:27', 1),
(100005, 15, '2017-10-16 01:54:48', 1),
(100006, 12, '2017-10-18 13:21:54', 1);

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
  `rebate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolefields_tbl`
--

INSERT INTO `rolefields_tbl` (`role_id`, `address`, `username`, `password`, `rank`, `license`, `contact`, `name`, `rebate`) VALUES
(100005, 1, 1, 1, 1, 1, 1, 1, 0),
(100006, 1, 0, 0, 0, 1, 1, 1, 1),
(100007, 1, 1, 1, 0, 1, 1, 1, 0),
(100008, 1, 1, 1, 0, 1, 1, 1, 0),
(100009, 1, 1, 1, 0, 1, 1, 1, 0),
(100010, 1, 1, 1, 0, 1, 1, 1, 0),
(100011, 1, 1, 1, 0, 1, 1, 1, 0),
(100012, 1, 1, 1, 0, 0, 1, 1, 0),
(100013, 0, 1, 1, 0, 1, 0, 1, 0),
(100014, 0, 1, 1, 0, 1, 0, 1, 0),
(100015, 1, 1, 1, 0, 1, 0, 1, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `service_group_tbl`
--

CREATE TABLE `service_group_tbl` (
  `servgroup_id` int(11) NOT NULL,
  `servgroup_name` varchar(255) NOT NULL,
  `ServGroupStatus` tinyint(4) NOT NULL DEFAULT '1',
  `lab_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_group_tbl`
--

INSERT INTO `service_group_tbl` (`servgroup_id`, `servgroup_name`, `ServGroupStatus`, `lab_id`) VALUES
(100013, 'Hematology', 1, 100017),
(100014, 'Microbiology', 1, 100017),
(100015, 'Hepatitis Profile', 1, 100017),
(100016, 'Immunology', 1, 100017),
(100017, 'Serology', 1, 100017),
(100018, 'Clinical Chemistry', 1, 100017),
(100019, 'Histopathology', 1, 100017),
(100020, 'Drug Assay', 1, 100017),
(100021, 'Microscopy', 1, 100017),
(100022, '24 Hr. Urine Test', 1, 100017),
(100023, 'Enzymes', 1, 100017),
(100024, 'X-Ray', 1, 100013),
(100025, 'Ultrasound', 1, 100015),
(100026, 'ECG', 1, 100014);

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
  `status` int(11) NOT NULL DEFAULT '1',
  `service_notes` varchar(255) DEFAULT NULL,
  `medical_request` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_log_tbl`
--

INSERT INTO `service_log_tbl` (`serviceLog_id`, `service_id`, `service_name`, `service_price`, `updated_at`, `status`, `service_notes`, `medical_request`) VALUES
(1, 100071, 'ACTH', 2700, '2017-10-16 12:47:14', 1, '', 'No'),
(2, 100159, 'X-Ray', 500, '2017-10-16 15:12:18', 1, '', 'No'),
(3, 100126, 'Methamphetamine HCL', 1000, '2017-10-16 23:36:10', 1, '', 'No'),
(4, 100159, 'X-Ray', 500, '2017-10-18 12:30:09', 1, '', 'No'),
(5, 100160, 'ElectroCardioGram', 1000, '2017-10-18 12:31:12', 1, '', 'No'),
(6, 100078, 'Drug Testing', 1000, '2017-10-18 12:31:25', 1, '', 'No'),
(7, 100163, 'Anti-HcB', 500, '2017-10-18 13:27:54', 1, 'Fasting for 8 hours', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_group_id` int(11) DEFAULT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `service_price` double NOT NULL,
  `ServiceStatus` int(11) NOT NULL DEFAULT '1',
  `medical_request` varchar(3) NOT NULL,
  `service_notes` varchar(255) DEFAULT NULL,
  `result_medserv1` int(11) DEFAULT '0',
  `result_medserv2` int(11) DEFAULT '0',
  `result_ecg` int(11) DEFAULT '0',
  `result_xray` int(11) DEFAULT '0',
  `result_ultra` int(11) DEFAULT '0',
  `result_drug` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`service_id`, `service_name`, `service_group_id`, `service_type_id`, `service_price`, `ServiceStatus`, `medical_request`, `service_notes`, `result_medserv1`, `result_medserv2`, `result_ecg`, `result_xray`, `result_ultra`, `result_drug`) VALUES
(100020, 'CBC', 100013, NULL, 90, 1, 'No', '\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.', 0, 1, 0, 0, 0, 0),
(100021, 'Platelet Count', 100013, NULL, 70, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100022, 'Peripheral Smear', 100013, NULL, 150, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100023, 'Reticulocyte Count', 100013, NULL, 80, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100024, 'ESR', 100013, NULL, 60, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100025, 'Prothrombin Time', 100013, NULL, 200, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100026, 'APTT', 100013, NULL, 210, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100027, 'Blood Typing(ABO-Rh)', 100013, NULL, 100, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100028, 'Malarial Smear', 100013, NULL, 100, 1, 'Yes', '', 0, 1, 0, 0, 0, 0),
(100029, 'KOH', 100014, NULL, 70, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100030, 'Gram Stain', 100014, NULL, 80, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100031, 'AFB/DSSM (2 collections)', 100014, NULL, 200, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100032, 'Culture and Sensitivity', 100014, NULL, 350, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100033, 'Blood and CSF C/S', 100014, NULL, 900, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100034, 'HBsAg', 100015, 100012, 70, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100035, 'Anti-HBs', 100015, 100012, 100, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100036, 'Anti-HAV igM', 100015, 100012, 180, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100037, 'HBeAg', 100015, 100013, 150, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100038, 'Antu-Hbe', 100015, 100013, 220, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100039, 'Anti-HBc IgG', 100015, 100013, 220, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100040, 'Anti-HBs IgM', 100015, 100013, 250, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100041, 'Anti-HAV IgG', 100015, 100013, 300, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100042, 'Anti-HCV', 100015, 100013, 500, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100043, 'Hepatitis B Profile (1-6)', 100015, NULL, 1200, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100044, 'Hepatitis A n B Profile (1-8)', 100015, NULL, 1600, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100045, 'Hepatitis ABC Profile (1-9)', 100015, NULL, 2100, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100046, 'T3', 100016, 100014, 200, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100047, 'T4', 100016, 100014, 200, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100048, 'TSH', 100016, 100014, 300, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100049, 'FT3', 100016, 100014, 260, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100050, 'FT4', 100016, 100014, 260, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100051, 'Thyroglobulin', 100016, 100014, 1500, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100052, 'TROPONIN-I', 100016, 100015, 1600, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100053, 'TROPONIN-T(Quanti)', 100016, 100015, 1000, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100054, 'CPK Total', 100016, 100015, 350, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100055, 'CPK-MB', 100016, 100015, 500, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100056, 'CPK-MM', 100016, 100015, 750, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100057, 'AFP', 100016, 100016, 600, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100058, 'CA 125(Ovaries)', 100016, 100016, 1300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100059, 'CA 15-3(Breast)', 100016, 100016, 1400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100060, 'CA 19-9(Pancreas)', 100016, 100016, 1850, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100061, 'CA 72-(G.I)', 100016, 100016, 2200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100062, 'CEA', 100016, 100016, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100063, 'PSA(total)', 100016, 100016, 900, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100064, 'LH', 100016, 100017, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100065, 'FSG', 100016, 100017, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100066, 'Prolactin', 100016, 100017, 550, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100067, 'Estradiol/Estrogen', 100016, 100017, 1100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100068, 'Progesterone', 100016, 100017, 1600, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100069, 'Cortisol', 100016, 100017, 550, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100070, 'Testosterone', 100016, 100017, 900, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100071, 'ACTH', 100016, 100017, 2700, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100072, 'Beta-HCG', 100016, 100017, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100073, 'Vitamin B12', 100016, NULL, 4800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100074, 'Vitamin D', 100016, NULL, 3400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100075, 'LDH', 100016, NULL, 190, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100076, 'Ferritin', 100016, NULL, 1200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100077, 'Transferrin', 100016, NULL, 7500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100078, 'Drug Testing', 100016, NULL, 1000, 1, 'No', '', 0, 0, 0, 0, 0, 1),
(100079, 'VDRL/RPR (Screening)', 100017, NULL, 80, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100080, 'C3/C4 (each)', 100017, NULL, 450, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100081, 'Typhidot', 100017, NULL, 850, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100082, 'RA/RF (screening)-(each)', 100017, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100083, 'TPHA (Quali)', 100017, NULL, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100084, 'Leptospira', 100017, NULL, 400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100085, 'HIV(AIDS Test)', 100017, NULL, 400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100086, 'Rubella IgG/IgM', 100017, NULL, 300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100087, 'Widal Test', 100017, NULL, 600, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100088, 'Well Felix Test', 100017, NULL, 600, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100089, 'ANA Screening', 100017, NULL, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100090, 'Dengue NS1', 100017, NULL, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100091, 'Dengue Blot (IgG/IgM)', 100017, NULL, 900, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100092, 'Aso (Quali)', 100017, NULL, 200, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100093, 'Aso (Quanti)', 100017, NULL, 250, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100094, 'CMV IgG/IgM (each)', 100017, NULL, 2000, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100095, 'HSV 1 n 2 IgG', 100017, NULL, 1300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100096, 'HSV 1 n 2 IgM', 100017, NULL, 1900, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100097, 'Pap Smear', 100019, NULL, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100098, 'FNAB', 100019, NULL, 799, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100099, 'Biopsy', 100019, NULL, 5000, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100100, 'Cell Block', 100019, NULL, 686, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100101, 'FBS', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100102, '2HR PPBS', 100018, NULL, 75, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100103, 'OGCT 50grams', 100018, NULL, 110, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100104, 'OGCT 75grams', 100018, NULL, 120, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100105, 'OGCT 100grams (3hrs)', 100018, NULL, 400, 1, 'No', '', 0, 0, 0, 0, 0, 0),
(100106, 'HbA1c(EDTA)', 100018, NULL, 300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100107, 'Creatinine', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100108, 'BUN', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100109, 'Uric Acid', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100110, 'Cholesterol', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100111, 'Triglyceride', 100018, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100112, 'LDL', 100018, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100113, 'HDL', 100018, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100114, 'HDL/Chole Ratio', 100013, NULL, 200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100115, 'Bilirubin (with B1 and B2)', 100018, NULL, 200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100116, 'Total Protein', 100018, NULL, 80, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100117, 'Albumin', 100018, NULL, 75, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100118, 'Sodium', 100018, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100119, 'Potassium', 100018, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100120, 'Chloride', 100018, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100121, 'Calcium', 100018, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100122, 'Phosphorous', 100018, NULL, 160, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100123, 'Magnesium', 100018, NULL, 200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100124, 'Total Iron', 100018, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100125, 'TIBC', 100018, NULL, 499, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100126, 'Methamphetamine HCL', 100020, NULL, 1000, 1, 'No', '', 1, 1, 0, 0, 0, 1),
(100127, 'Cannabinoids', 100020, NULL, 700, 1, 'No', '', 1, 0, 0, 0, 0, 1),
(100128, 'Digoxin', 100020, NULL, 600, 1, 'No', '', 1, 0, 0, 0, 0, 1),
(100129, 'Carbamazepine', 100020, NULL, 999, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100130, 'Valproic Acid', 100020, NULL, 700, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100131, 'Phenobarbital', 100020, NULL, 1600, 1, 'No', '', 1, 0, 0, 0, 0, 1),
(100132, 'Phenytoin', 100020, NULL, 900, 1, 'No', '', 1, 0, 0, 0, 0, 1),
(100133, 'Urinalysis', 100021, NULL, 300, 1, 'No', '', 0, 1, 0, 0, 0, 0),
(100134, 'Pregnancy Test(Urine)', 100021, NULL, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100135, 'Pregnancy Test(Serum)', 100021, NULL, 1000, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100136, 'Sugar/Proten', 100021, NULL, 300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100137, 'Ketone/Acetone', 100021, NULL, 140, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100138, 'Urobilinogen', 100021, NULL, 300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100139, 'Bile', 100021, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100140, 'Nitrates', 100021, NULL, 200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100141, 'Bilrubin', 100021, NULL, 250, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100142, 'Seminal Analysis', 100021, NULL, 400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100143, 'Stone Analysis', 100021, NULL, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100144, 'Stool Exam', 100021, NULL, 600, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100145, 'Occult Blood', 100021, NULL, 300, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100146, 'Creatinine Total', 100022, NULL, 500, 1, 'No', '', 1, 0, 0, 0, 0, 0),
(100147, 'Creatinine Clearance', 100022, NULL, 400, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100148, 'Glucose', 100022, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100149, 'Amylase', 100022, NULL, 350, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100150, 'VMA', 100022, NULL, 800, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100151, 'SGPT', 100023, NULL, 1300, 1, 'Yes', '', 1, 1, 0, 0, 0, 0),
(100152, 'SGOT', 100023, NULL, 1200, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100153, 'ABc Phosphatase', 100023, NULL, 3000, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100154, 'Acid Phosphatase', 100023, NULL, 900, 1, 'Yes', '', 1, 1, 0, 0, 0, 0),
(100155, 'Lipase', 100023, NULL, 300, 1, 'Yes', '', 1, 1, 0, 0, 0, 0),
(100156, 'FSH', 100016, 100017, 500, 1, 'Yes', '', 1, 1, 0, 0, 0, 0),
(100157, 'TPAG', 100018, NULL, 150, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100158, 'Alkaline Phosphatase', 100018, NULL, 100, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100159, 'X-Ray', 100024, NULL, 500, 1, 'No', '', 0, 0, 0, 1, 0, 0),
(100160, 'ElectroCardioGram', 100026, NULL, 1000, 1, 'No', '', 0, 0, 1, 0, 0, 0),
(100161, 'Ultrasound', 100025, NULL, 450, 1, 'No', '', 0, 0, 0, 0, 1, 0),
(100162, 'Fecalysis', 100021, NULL, 500, 1, 'No', '', 1, 1, 0, 0, 0, 0),
(100163, 'Anti-HcB', 100015, 100013, 500, 1, 'No', 'Fasting for 8 hours', 1, 0, 0, 0, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `service_type_tbl`
--

CREATE TABLE `service_type_tbl` (
  `service_type_id` int(11) NOT NULL,
  `ServTypeStatus` int(11) NOT NULL DEFAULT '1',
  `service_type_group_id` int(11) NOT NULL,
  `service_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type_tbl`
--

INSERT INTO `service_type_tbl` (`service_type_id`, `ServTypeStatus`, `service_type_group_id`, `service_type_name`) VALUES
(100012, 1, 100015, 'Screening'),
(100013, 1, 100015, 'Quantitative/Titers'),
(100014, 1, 100016, 'Thyroid Function'),
(100015, 1, 100016, 'Cardiac Biomarkers'),
(100016, 1, 100016, 'Tumor Markers'),
(100017, 1, 100016, 'Fertility/Hormones');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `trans_id` int(11) NOT NULL,
  `trans_total` double NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_patient_id` int(11) NOT NULL,
  `issuedBy_emp_id` int(11) NOT NULL,
  `trans_change` double NOT NULL,
  `trans_payment` double NOT NULL,
  `medical_certificate` text,
  `discount` double DEFAULT '0',
  `prescriptions` longtext NOT NULL,
  `home_service` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`trans_id`, `trans_total`, `trans_date`, `trans_patient_id`, `issuedBy_emp_id`, `trans_change`, `trans_payment`, `medical_certificate`, `discount`, `prescriptions`, `home_service`) VALUES
(1, 1700, '2017-02-04 21:27:36', 100025, 100013, 300, 2000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br>', 0),
(2, 4700, '2017-04-10 21:32:51', 100026, 100013, 300, 5000, 'default.jpg', 0, '<br><br><br><br>', 0),
(3, 2346, '2017-04-28 21:37:12', 100027, 100013, 154, 2500, 'default.jpg', 32, '<br><br><br><br><br>', 0),
(4, 2448, '2017-05-13 21:40:28', 100028, 100013, 52, 2500, 'default.jpg', 32, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br>', 0),
(5, 1200, '2017-05-24 21:43:36', 100029, 100013, 1300, 2500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(6, 3600, '2017-06-15 21:47:36', 100030, 100013, 400, 4000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br>', 0),
(7, 1370, '2017-06-15 21:50:17', 100031, 100013, 130, 1500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br>', 0),
(8, 4300, '2017-08-15 11:34:54', 100032, 100013, 700, 5000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(9, 1200, '2017-08-18 11:38:21', 100033, 100013, 800, 2000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(10, 3400, '2017-08-18 11:40:58', 100034, 100013, 0, 3400, 'default.jpg', 0, '<br><br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(11, 900, '2017-01-10 22:20:24', 100004, 100013, 0, 900, 'default.jpg', 0, '<br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(12, 340, '2017-01-19 22:22:25', 100012, 100013, 60, 400, 'default.jpg', 32, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(13, 0, '2017-02-07 22:23:49', 100022, 100013, 0, 0, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(14, 2200, '2017-02-10 22:25:07', 100018, 100013, 0, 2200, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br>', 0),
(15, 500, '2017-02-28 22:27:16', 100020, 100013, 0, 500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br>', 0),
(16, 1080, '2017-03-15 22:28:55', 100019, 100013, 420, 1500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 0),
(17, 2500, '2017-03-19 22:30:23', 100022, 100013, 0, 2500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br>', 0),
(18, 700, '2017-03-31 22:31:50', 100003, 100013, 300, 1000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 200),
(19, 500, '2017-04-03 22:33:30', 100015, 100013, 0, 500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br>', 0),
(20, 1300, '2017-04-12 22:34:38', 100009, 100013, 200, 1500, 'default.jpg', 0, '<br><br><br><br><br>', 0),
(21, 3500, '2017-04-27 22:36:08', 100021, 100013, 500, 4000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br>', 0),
(22, 600, '2017-05-24 22:38:05', 100017, 100013, 400, 1000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br>', 0),
(23, 1450, '2017-06-01 22:39:46', 100011, 100013, 50, 1500, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br>', 0),
(24, 2650, '2017-07-12 22:43:27', 100035, 100013, 350, 3000, 'default.jpg', 0, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br><br><br><br><br>', 0),
(25, 1890.4, '2017-08-31 22:45:02', 100014, 100013, 109.59999999999991, 2000, 'default.jpg', 32, '<br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br><br>', 0),
(26, 2470, '2017-09-15 22:47:08', 100002, 100013, 30, 2500, 'default.jpg', 0, '<br><br><br>', 200),
(27, 300, '2017-10-17 22:48:31', 100010, 100013, 0, 300, 'default.jpg', 0, '<br><br><br><br>', 0),
(28, 90, '2017-10-18 13:41:29', 100036, 100022, 10, 100, 'default.jpg', 0, '<br><br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.', 0),
(29, 941.2, '2017-10-18 13:46:41', 100037, 100022, 58.799999999999955, 1000, 'default.jpg', 32, '<br><br><br>\r\n\r\n\r\n\r\n\r\n\r\nThe blood test may be done before or after eating and at any time of the day.<br>', 200);

-- --------------------------------------------------------

--
-- Table structure for table `transcorp_payment_tbl`
--

CREATE TABLE `transcorp_payment_tbl` (
  `corpPayment_id` int(11) NOT NULL,
  `corpPayment_date` datetime NOT NULL,
  `corpPayment_bill` double NOT NULL,
  `corp_id` int(11) NOT NULL,
  `corpPayment_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcorp_payment_tbl`
--

INSERT INTO `transcorp_payment_tbl` (`corpPayment_id`, `corpPayment_date`, `corpPayment_bill`, `corp_id`, `corpPayment_img`) VALUES
(1, '2017-10-18 14:11:12', 1000, 100026, '59e6f080689fd1.82767376.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transcorp_tbl`
--

CREATE TABLE `transcorp_tbl` (
  `transCorp_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `charge` double NOT NULL,
  `corpPack_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcorp_tbl`
--

INSERT INTO `transcorp_tbl` (`transCorp_id`, `trans_id`, `corp_id`, `date`, `charge`, `corpPack_id`) VALUES
(1, 12, 100017, '2017-01-19 22:22:25', 1000, 100005),
(2, 13, 100025, '2017-02-07 22:23:49', 495, 100018),
(3, 14, 100021, '2017-02-10 22:25:07', 495, 100011),
(4, 15, 100023, '2017-02-28 22:27:16', 3000, 100001),
(5, 16, 100022, '2017-03-15 22:28:55', 0, 100008),
(6, 17, 100025, '2017-03-19 22:30:23', 495, 100018),
(7, 19, 100019, '2017-04-03 22:33:30', 650, 100009),
(8, 20, 100014, '2017-04-12 22:34:39', 600, 100006),
(9, 21, 100024, '2017-04-27 22:36:09', 0, 100007),
(10, 22, 100020, '2017-05-24 22:38:05', 350, 100012),
(11, 23, 100016, '2017-06-01 22:39:46', 2000, 100004),
(12, 24, 100017, '2017-07-12 22:43:28', 1000, 100005),
(13, 25, 100018, '2017-08-31 22:45:02', 0, 100016),
(14, 27, 100015, '2017-10-17 22:48:31', 510, 100015),
(15, 28, 100026, '2017-10-18 13:41:29', 1800, 100019);

-- --------------------------------------------------------

--
-- Table structure for table `transrebate_payment_tbl`
--

CREATE TABLE `transrebate_payment_tbl` (
  `transRebPay_id` int(11) NOT NULL,
  `transRebPay_amount` double NOT NULL,
  `transRebPay_date` datetime NOT NULL,
  `transRebPay_emp_id` int(11) NOT NULL,
  `transRebPay_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transrebate_payment_tbl`
--

INSERT INTO `transrebate_payment_tbl` (`transRebPay_id`, `transRebPay_amount`, `transRebPay_date`, `transRebPay_emp_id`, `transRebPay_img`) VALUES
(1, 1560, '2017-10-18 14:12:06', 100006, '59e6f0b6b46e96.63697484.jpg');

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
(1, 1, '2017-02-04 21:27:36', 'DONE'),
(2, 2, '2017-04-10 21:32:51', 'DONE'),
(3, 3, '2017-04-28 21:37:12', 'DONE'),
(4, 4, '2017-05-13 21:40:28', 'DONE'),
(5, 5, '2017-05-24 21:43:36', 'DONE'),
(6, 6, '2017-06-15 21:47:36', 'DONE'),
(7, 7, '2017-06-15 21:50:17', 'DONE'),
(8, 8, '2017-08-15 11:34:54', 'DONE'),
(9, 9, '2017-08-18 11:38:21', 'DONE'),
(10, 10, '2017-08-18 11:40:58', 'PENDING'),
(11, 11, '2017-01-10 22:20:24', 'DONE'),
(12, 12, '2017-01-19 22:22:25', 'DONE'),
(13, 13, '2017-02-07 22:23:49', 'DONE'),
(14, 14, '2017-02-10 22:25:07', 'DONE'),
(15, 15, '2017-02-28 22:27:16', 'DONE'),
(16, 16, '2017-03-15 22:28:55', 'DONE'),
(17, 17, '2017-03-19 22:30:23', 'DONE'),
(18, 18, '2017-03-31 22:31:50', 'DONE'),
(19, 19, '2017-04-03 22:33:30', 'DONE'),
(20, 20, '2017-04-12 22:34:38', 'DONE'),
(21, 21, '2017-04-27 22:36:09', 'DONE'),
(22, 22, '2017-05-24 22:38:05', 'DONE'),
(23, 23, '2017-06-01 22:39:46', 'DONE'),
(24, 24, '2017-07-12 22:43:28', 'DONE'),
(25, 25, '2017-08-31 22:45:02', 'DONE'),
(26, 26, '2017-09-15 22:47:08', 'PENDING'),
(27, 27, '2017-10-17 22:48:31', 'PENDING'),
(28, 28, '2017-10-18 13:41:29', 'PENDING'),
(29, 29, '2017-10-18 13:46:41', 'DONE');

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
(1, 100006, 1, 100005, '2017-02-04 21:27:36'),
(2, 100014, 3, 100005, '2017-04-28 21:37:12'),
(3, 100015, 6, 100005, '2017-06-15 21:47:36'),
(4, 100006, 8, 100005, '2017-08-15 11:34:54'),
(5, 100014, 10, 100005, '2017-08-18 11:40:58'),
(6, 100006, 11, 100005, '2017-01-10 22:20:24'),
(7, 100014, 12, 100005, '2017-01-19 22:22:25'),
(8, 100015, 18, 100005, '2017-03-31 22:31:50'),
(9, 100006, 21, 100005, '2017-04-27 22:36:08'),
(10, 100014, 28, 100006, '2017-10-18 13:41:29');

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
(1, 100007, 'Pre-Employment', 1200),
(2, 100003, 'Infertility Package', 2200),
(2, 100006, 'Liver Profile', 2500),
(3, 100003, 'Infertility Package', 2200),
(4, 100002, 'Routine Exam', 900),
(4, 100003, 'Infertility Package', 2200),
(5, 100007, 'Pre-Employment', 1200),
(6, 100002, 'Routine Exam', 900),
(6, 100003, 'Infertility Package', 2200),
(7, 100007, 'Pre-Employment', 1200),
(8, 100002, 'Routine Exam', 900),
(8, 100003, 'Infertility Package', 2200),
(8, 100007, 'Pre-Employment', 1200),
(9, 100007, 'Pre-Employment', 1200),
(10, 100003, 'Infertility Package', 2200),
(10, 100007, 'Pre-Employment', 1200),
(11, 100002, 'Routine Exam', 900),
(12, 100001, 'Pre-Natal Package', 500),
(14, 100003, 'Infertility Package', 2200),
(16, 100001, 'Pre-Natal Package', 500),
(17, 100006, 'Liver Profile', 2500),
(18, 100001, 'Pre-Natal Package', 500),
(20, 100004, 'Chemistry 5', 300),
(21, 100006, 'Liver Profile', 2500),
(22, 100008, 'Chemistry 8', 600),
(24, 100003, 'Infertility Package', 2200),
(26, 100003, 'Infertility Package', 2200),
(27, 100004, 'Chemistry 5', 300),
(29, 100005, 'Lipid Profile', 400);

-- --------------------------------------------------------

--
-- Table structure for table `trans_resultfiles_tbl`
--

CREATE TABLE `trans_resultfiles_tbl` (
  `file_id` int(11) NOT NULL,
  `result_type` varchar(20) DEFAULT NULL,
  `trans_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `file` text NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_resultfiles_tbl`
--

INSERT INTO `trans_resultfiles_tbl` (`file_id`, `result_type`, `trans_id`, `result_id`, `date`, `file`, `emp_id`, `status`) VALUES
(1, 'Medical Service 1', 1, 1, '2017-10-17 22:55:31', '59e619e3952ee1.83998019.pdf', 100008, 1),
(2, 'Medical Request', 19, 19, '2017-10-17 23:00:26', '59e61b0a46f533.63758430.pdf', 100008, 1),
(3, 'Medical Request', 12, 12, '2017-10-17 23:04:41', '59e61c09149954.80897885.pdf', 100008, 1),
(4, 'Medical Service 1', 2, 2, '2017-10-17 23:10:00', '59e61d4825bb22.10616530.pdf', 100008, 1),
(5, 'Medical Request', 15, 15, '2017-10-17 23:13:48', '59e61e2c386b55.73783949.pdf', 100008, 1),
(6, 'Medical Request', 14, 14, '2017-10-17 23:17:44', '59e61f18f034f0.15615977.pdf', 100008, 1),
(7, 'Medical Request', 17, 17, '2017-10-17 23:20:42', '59e61fca32dae5.08183823.pdf', 100008, 1),
(8, 'Medical Service 1', 17, 17, '2017-10-17 23:22:59', '59e62053731007.41197454.pdf', 100008, 1),
(9, 'Medical Service 1', 6, 6, '2017-10-17 23:24:59', '59e620cb107c92.84828878.pdf', 100008, 1),
(10, 'Medical Request', 20, 20, '2017-10-17 23:29:15', '59e621cb9b6f99.96096857.pdf', 100008, 1),
(11, 'Medical Request', 25, 25, '2017-10-17 23:32:15', '59e6227f47c931.55428642.pdf', 100008, 1),
(12, 'Medical Service 1', 3, 3, '2017-10-17 23:36:00', '59e6236045bbe5.30471568.pdf', 100008, 1),
(13, 'Medical Service 1', 5, 5, '2017-10-17 23:41:10', '59e62496d0a973.73485972.pdf', 100008, 1),
(14, 'Medical Request', 21, 21, '2017-10-17 23:43:30', '59e62522dbb386.80858365.pdf', 100008, 1),
(15, 'Medical Service 1', 10, 10, '2017-10-17 23:45:16', '59e6258c4da141.24483739.pdf', 100008, 1),
(16, 'Medical Service 1', 9, 9, '2017-10-17 23:47:19', '59e62607790fe8.98632364.pdf', 100008, 1),
(17, 'Medical Service 1', 26, 26, '2017-10-17 23:51:03', '59e626e78b4825.39266427.pdf', 100008, 1),
(18, 'Medical Service 1', 27, 27, '2017-10-17 23:53:44', '59e62788393e79.82413633.pdf', 100008, 1),
(19, 'Medical Service 1', 4, 4, '2017-10-17 23:56:35', '59e6283329ade0.91677651.pdf', 100008, 1),
(20, 'Medical Service 1', 24, 24, '2017-10-17 23:58:51', '59e628bbbefc09.56647684.pdf', 100008, 1),
(21, 'Medical Service 1', 7, 7, '2017-10-18 00:05:07', '59e62a33f05837.54693328.pdf', 100008, 1),
(22, 'Medical Service 1', 8, 8, '2017-10-18 00:12:18', '59e62be23ba102.42380367.pdf', 100008, 1),
(23, 'Medical Service 1', 11, 11, '2017-10-18 00:14:55', '59e62c7fd12b59.53142402.pdf', 100008, 1),
(24, 'Medical Service 2', 18, 18, '2017-10-18 00:16:58', '59e62cfa9e6a87.86877149.pdf', 100008, 1),
(25, 'Medical Service 1', 12, 12, '2017-10-18 00:19:52', '59e62da8d5e312.98247170.pdf', 100008, 1),
(26, 'Medical Service 2', 13, 13, '2017-10-18 00:33:52', '59e630f0925021.98402475.pdf', 100008, 1),
(27, 'Medical Service 1', 16, 16, '2017-10-18 00:36:48', '59e631a0070bc0.97362936.pdf', 100008, 1),
(28, 'Medical Service 2', 14, 14, '2017-10-18 00:40:52', '59e632946492a1.84263391.pdf', 100008, 1),
(29, 'Medical Service 2', 15, 15, '2017-10-18 00:44:13', '59e6335d5e6066.62737226.pdf', 100008, 1),
(30, 'Medical Service 2', 19, 19, '2017-10-18 00:46:26', '59e633e28c0642.81363393.pdf', 100008, 1),
(31, 'Medical Service 2', 21, 21, '2017-10-18 00:53:06', '59e635723b36a7.65665528.pdf', 100008, 1),
(32, 'Medical Service 2', 22, 22, '2017-10-18 00:55:57', '59e6361d3083a1.08604054.pdf', 100008, 1),
(33, 'Medical Service 2', 23, 23, '2017-10-18 00:58:43', '59e636c355e733.26820937.pdf', 100008, 1),
(34, 'Medical Service 2', 25, 25, '2017-10-18 01:01:02', '59e6374e7f1640.61069805.pdf', 100008, 0),
(35, 'Medical Service 2', 25, 25, '2017-10-18 01:01:03', '59e6374fd28b64.69823348.pdf', 100008, 0),
(36, 'Medical Service 2', 25, 25, '2017-10-18 01:01:04', '59e637507d6ba4.44676189.pdf', 100008, 0),
(37, 'Medical Service 2', 25, 25, '2017-10-18 01:01:05', '59e63751cf6122.54462683.pdf', 100008, 0),
(38, 'Medical Service 2', 25, 25, '2017-10-18 01:01:06', '59e637529ab212.03043106.pdf', 100008, 0),
(39, 'Medical Service 2', 25, 25, '2017-10-18 01:02:26', '59e637a2c3e363.24262776.pdf', 100008, 1),
(40, 'Medical Service 1', 20, 20, '2017-10-18 01:04:53', '59e63835dca672.93221905.pdf', 100008, 1),
(41, 'Xray', 1, 1, '2017-10-18 01:31:59', '59e63e8fa775f1.63197989.pdf', 100011, 1),
(42, 'Xray', 4, 4, '2017-10-18 01:36:58', '59e63fbab96f07.94049036.pdf', 100011, 1),
(43, 'Xray', 5, 5, '2017-10-18 01:39:47', '59e6406330be11.56811960.pdf', 100011, 1),
(44, 'Xray', 6, 6, '2017-10-18 01:43:04', '59e641282daa45.73246549.pdf', 100011, 1),
(45, 'Xray', 7, 7, '2017-10-18 01:48:40', '59e642788fd943.52445623.pdf', 100011, 1),
(46, 'Xray', 8, 8, '2017-10-18 01:51:37', '59e64329cf7d53.36480163.pdf', 100011, 0),
(47, 'Xray', 8, 8, '2017-10-18 01:54:30', '59e643d64a9cc8.93902678.pdf', 100011, 1),
(48, 'Xray', 9, 9, '2017-10-18 01:59:19', '59e644f78ea027.15592487.pdf', 100011, 1),
(49, 'Xray', 10, 10, '2017-10-18 02:01:25', '59e64575d5c285.09328708.pdf', 100011, 1),
(50, 'Xray', 12, 12, '2017-10-18 02:04:54', '59e6464641b121.29494437.pdf', 100011, 1),
(51, 'Xray', 13, 13, '2017-10-18 02:08:03', '59e64703c67da8.10713638.pdf', 100011, 1),
(52, 'Xray', 14, 14, '2017-10-18 02:12:34', '59e64812cb9c14.96645342.pdf', 100011, 1),
(53, 'Xray', 15, 15, '2017-10-18 02:14:39', '59e6488f5ab4e3.15684949.pdf', 100011, 1),
(54, 'Xray', 16, 16, '2017-10-18 02:17:13', '59e6492997c000.21415421.pdf', 100011, 1),
(55, 'Xray', 16, 16, '2017-10-18 02:17:14', '59e6492ad4cac4.59448897.pdf', 100011, 1),
(56, 'Xray', 17, 17, '2017-10-18 02:19:46', '59e649c24da778.74185739.pdf', 100011, 1),
(57, 'Xray', 19, 19, '2017-10-18 02:22:22', '59e64a5e3461f6.90110120.pdf', 100011, 1),
(58, 'Xray', 20, 20, '2017-10-18 02:24:36', '59e64ae4107db3.81549311.pdf', 100011, 1),
(59, 'Xray', 21, 21, '2017-10-18 02:26:47', '59e64b674a12e0.27576317.pdf', 100011, 1),
(60, 'Xray', 22, 22, '2017-10-18 02:29:23', '59e64c03014ea6.38045678.pdf', 100011, 1),
(61, 'Xray', 23, 23, '2017-10-18 02:34:11', '59e64d23762d86.70239616.pdf', 100011, 1),
(62, 'Xray', 24, 24, '2017-10-18 02:36:28', '59e64dac9b0fd3.67453854.pdf', 100011, 1),
(63, 'Xray', 25, 25, '2017-10-18 02:38:32', '59e64e28aaf852.79541967.pdf', 100011, 1),
(64, 'Xray', 27, 27, '2017-10-18 02:41:24', '59e64ed459c153.71096238.pdf', 100011, 1),
(65, 'Ultrasound', 21, 21, '2017-10-18 02:44:51', '59e64fa3c6a3c2.65935491.pdf', 100010, 1),
(66, 'Ultrasound', 23, 23, '2017-10-18 02:47:15', '59e650337134e0.24763830.pdf', 100010, 1),
(67, 'Ultrasound', 24, 24, '2017-10-18 02:50:51', '59e6510b72b6d0.72356502.pdf', 100010, 1),
(68, 'ECG', 11, 11, '2017-10-18 03:37:12', '59e65be87927f6.17076979.pdf', 100009, 1),
(69, 'ECG', 20, 20, '2017-10-18 03:41:01', '59e65ccd9f4aa4.11319029.pdf', 100009, 1),
(70, 'ECG', 23, 23, '2017-10-18 03:43:54', '59e65d7a73f2c2.03049351.pdf', 100009, 1),
(71, 'Medical Request', 13, 13, '2017-10-18 12:35:00', '59e6d9f48b3c06.72780582.pdf', 100008, 1),
(72, 'Medical Request', 16, 16, '2017-10-18 12:35:27', '59e6da0fbd91b9.97295325.pdf', 100008, 1),
(73, 'Medical Request', 22, 22, '2017-10-18 12:35:45', '59e6da215c0bc1.33790695.pdf', 100008, 1),
(74, 'Medical Request', 23, 23, '2017-10-18 12:36:02', '59e6da325be3b9.47625617.pdf', 100008, 1),
(75, 'Medical Request', 27, 27, '2017-10-18 12:36:20', '59e6da447c54f1.68541640.pdf', 100008, 1),
(76, 'Medical Request', 24, 24, '2017-10-18 12:36:39', '59e6da5748feb0.05412050.pdf', 100008, 1),
(77, 'Medical Service 2', 28, 28, '2017-10-18 13:56:42', '59e6ed1a056a67.14960850.pdf', 100008, 1),
(78, 'Medical Service 2', 29, 29, '2017-10-18 14:16:03', '59e6f1a31ddf26.53816356.pdf', 100008, 1),
(79, 'Medical Request', 28, 28, '2017-10-18 14:16:26', '59e6f1ba6a00f5.77392727.pdf', 100008, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_result_service_tbl`
--

CREATE TABLE `trans_result_service_tbl` (
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `result_id` int(11) NOT NULL,
  `service_group_id` int(11) DEFAULT NULL,
  `medreq_dateofexam` date DEFAULT NULL,
  `medreq_examphysician` int(11) DEFAULT NULL,
  `medreq_evaluated` int(11) DEFAULT NULL,
  `medreq_history` text,
  `medreq_datediag` date DEFAULT NULL,
  `medreq_illness` text,
  `medreq_medication` text,
  `medreq_remarks1` text,
  `medreq_famhisto1` text,
  `medreq_famhisto2` text,
  `medreq_smoker` varchar(3) DEFAULT NULL,
  `medreq_sticks` int(11) DEFAULT NULL,
  `medreq_remarks2` text,
  `medreq_packyears` int(11) DEFAULT NULL,
  `medreq_alcohol` varchar(3) DEFAULT NULL,
  `medreq_bottles` int(11) DEFAULT NULL,
  `medreq_remarks3` text,
  `medreq_shots` int(11) DEFAULT NULL,
  `medreq_obstetric1` text,
  `medreq_obstetric2` text,
  `medreq_visual` varchar(50) DEFAULT NULL,
  `medreq_temp` varchar(50) DEFAULT NULL,
  `medreq_height` varchar(50) DEFAULT NULL,
  `medreq_weight` varchar(50) DEFAULT NULL,
  `medreq_pulse` varchar(50) DEFAULT NULL,
  `medreq_bloodpressure` varchar(50) DEFAULT NULL,
  `medreq_genapp` varchar(50) DEFAULT NULL,
  `medreq_eyes` varchar(50) DEFAULT NULL,
  `medreq_ear` varchar(50) DEFAULT NULL,
  `medreq_neck` varchar(50) DEFAULT NULL,
  `medreq_breast` varchar(50) DEFAULT NULL,
  `medreq_chest` varchar(50) DEFAULT NULL,
  `medreq_heart` varchar(50) DEFAULT NULL,
  `medreq_abdomen` varchar(50) DEFAULT NULL,
  `medreq_exanal` varchar(50) DEFAULT NULL,
  `medreq_exgen` varchar(50) DEFAULT NULL,
  `medreq_extermities` varchar(50) DEFAULT NULL,
  `medreq_cbc` text,
  `medreq_fecalysis` varchar(50) DEFAULT NULL,
  `medreq_urinalysis` varchar(50) DEFAULT NULL,
  `medreq_xray` varchar(50) DEFAULT NULL,
  `medreq_drugtest` varchar(50) DEFAULT NULL,
  `medreq_assess` text,
  `ultra_title` varchar(50) DEFAULT NULL,
  `ultra_impression` text,
  `ultra_sonologist` int(11) DEFAULT NULL,
  `ultra_sonologist_img` text,
  `ultra_date` date DEFAULT NULL,
  `xray_date` date DEFAULT NULL,
  `xray_title` varchar(50) DEFAULT NULL,
  `xray_findings` text,
  `xray_radiologic` int(11) DEFAULT NULL,
  `xray_radiologic_img` text,
  `xray_radiologist` int(11) DEFAULT NULL,
  `xray_radiologist_img` text,
  `medserv1_printdate` date DEFAULT NULL,
  `medserv1_result` varchar(225) DEFAULT NULL,
  `medserv1_medtech` int(11) DEFAULT NULL,
  `medserv1_medtech_img` text,
  `medserv1_pathologist` int(11) DEFAULT NULL,
  `medserv1_pathologist_img` text,
  `Medserv2_printdate` date DEFAULT NULL,
  `Medserv2_intresult` varchar(50) DEFAULT NULL,
  `Medserv2_intunit` varchar(50) DEFAULT NULL,
  `Medserv2_intref` varchar(50) DEFAULT NULL,
  `Medserv2_conresult` varchar(50) DEFAULT NULL,
  `Medserv2_conunit` varchar(50) DEFAULT NULL,
  `Medserv2_conref` varchar(50) DEFAULT NULL,
  `Medserv2_medtech` int(11) DEFAULT NULL,
  `Medserv2_medtech_img` text,
  `Medserv2_pathologist` int(11) DEFAULT NULL,
  `Medserv2_pathologist_img` text,
  `Ecg_ecgno` varchar(50) DEFAULT NULL,
  `Ecg_rate` longtext,
  `Ecg_ppr` longtext,
  `Ecg_qrs` longtext,
  `Ecg_qtqtc` longtext,
  `Ecg_doctor` int(11) DEFAULT NULL,
  `Ecg_pqrs` longtext,
  `Ecg_minesota` varchar(50) DEFAULT NULL,
  `Ecg_diagnosis` longtext,
  `Ecg_ecg_image` text,
  `Drug_picture_img` text,
  `Drug_reportid` varchar(20) DEFAULT NULL,
  `Drug_ccf` varchar(20) DEFAULT NULL,
  `Drug_test` varchar(200) DEFAULT NULL,
  `Drug_purpose` text,
  `Drug_reqparties` varchar(20) DEFAULT NULL,
  `Drug_drugmet1` text,
  `Drug_drugmet2` text,
  `Drug_result1` text,
  `Drug_result2` text,
  `Drug_remarks1` text,
  `Drug_remarks2` text,
  `Drug_referred1` int(11) DEFAULT NULL,
  `Drug_referred2` int(11) DEFAULT NULL,
  `corppack_id` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_result_service_tbl`
--

INSERT INTO `trans_result_service_tbl` (`service_id`, `service_name`, `date`, `result_id`, `service_group_id`, `medreq_dateofexam`, `medreq_examphysician`, `medreq_evaluated`, `medreq_history`, `medreq_datediag`, `medreq_illness`, `medreq_medication`, `medreq_remarks1`, `medreq_famhisto1`, `medreq_famhisto2`, `medreq_smoker`, `medreq_sticks`, `medreq_remarks2`, `medreq_packyears`, `medreq_alcohol`, `medreq_bottles`, `medreq_remarks3`, `medreq_shots`, `medreq_obstetric1`, `medreq_obstetric2`, `medreq_visual`, `medreq_temp`, `medreq_height`, `medreq_weight`, `medreq_pulse`, `medreq_bloodpressure`, `medreq_genapp`, `medreq_eyes`, `medreq_ear`, `medreq_neck`, `medreq_breast`, `medreq_chest`, `medreq_heart`, `medreq_abdomen`, `medreq_exanal`, `medreq_exgen`, `medreq_extermities`, `medreq_cbc`, `medreq_fecalysis`, `medreq_urinalysis`, `medreq_xray`, `medreq_drugtest`, `medreq_assess`, `ultra_title`, `ultra_impression`, `ultra_sonologist`, `ultra_sonologist_img`, `ultra_date`, `xray_date`, `xray_title`, `xray_findings`, `xray_radiologic`, `xray_radiologic_img`, `xray_radiologist`, `xray_radiologist_img`, `medserv1_printdate`, `medserv1_result`, `medserv1_medtech`, `medserv1_medtech_img`, `medserv1_pathologist`, `medserv1_pathologist_img`, `Medserv2_printdate`, `Medserv2_intresult`, `Medserv2_intunit`, `Medserv2_intref`, `Medserv2_conresult`, `Medserv2_conunit`, `Medserv2_conref`, `Medserv2_medtech`, `Medserv2_medtech_img`, `Medserv2_pathologist`, `Medserv2_pathologist_img`, `Ecg_ecgno`, `Ecg_rate`, `Ecg_ppr`, `Ecg_qrs`, `Ecg_qtqtc`, `Ecg_doctor`, `Ecg_pqrs`, `Ecg_minesota`, `Ecg_diagnosis`, `Ecg_ecg_image`, `Drug_picture_img`, `Drug_reportid`, `Drug_ccf`, `Drug_test`, `Drug_purpose`, `Drug_reqparties`, `Drug_drugmet1`, `Drug_drugmet2`, `Drug_result1`, `Drug_result2`, `Drug_remarks1`, `Drug_remarks2`, `Drug_referred1`, `Drug_referred2`, `corppack_id`, `status`) VALUES
(100020, 'CBC', '2017-02-04 21:27:36', 1, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100017, '59e61962c01d12.30450263.png', 100008, '59e61962c188e3.31839766.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-02-04 21:27:36', 1, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-02-04 21:27:37', 1, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-02-04 21:27:37', 1, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Dextroscoliosis on the thoracic spine', 100011, '59e63bfc2636a1.03458974.png', 100018, '59e63bfc2705f4.11983856.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100134, 'Pregnancy Test(Urine)', '2017-02-04 21:27:37', 1, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-04-10 21:32:51', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-04-10 21:32:52', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-04-10 21:32:52', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-04-10 21:32:52', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100017, '59e61cf53d8075.01555439.png', 100008, '59e61cf53e58c9.76556867.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-04-10 21:32:52', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'AVERAGE', 100017, '59e61cf53d8075.01555439.png', 100008, '59e61cf53e58c9.76556867.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-04-10 21:32:52', 2, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-04-10 21:32:52', 2, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-04-10 21:32:52', 2, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100017, '59e61cf53d8075.01555439.png', 100008, '59e61cf53e58c9.76556867.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100115, 'Bilirubin (with B1 and B2)', '2017-04-10 21:32:52', 2, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100151, 'SGPT', '2017-04-10 21:32:52', 2, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100152, 'SGOT', '2017-04-10 21:32:52', 2, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100157, 'TPAG', '2017-04-10 21:32:52', 2, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100158, 'Alkaline Phosphatase', '2017-04-10 21:32:52', 2, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-04-28 21:37:12', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100016, '59e6231fd53b45.15028179.png', 100008, '59e6231fd5d480.46520939.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'AVERAGE', 100016, '59e6231fd53b45.15028179.png', 100008, '59e6231fd5d480.46520939.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-04-28 21:37:13', 3, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-04-28 21:37:13', 3, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100016, '59e6231fd53b45.15028179.png', 100008, '59e6231fd5d480.46520939.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-04-28 21:37:13', 3, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100016, '59e6231fd53b45.15028179.png', 100008, '59e6231fd5d480.46520939.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100119, 'Potassium', '2017-04-28 21:37:13', 3, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100121, 'Calcium', '2017-04-28 21:37:13', 3, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-05-13 21:40:29', 4, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-05-13 21:40:29', 4, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-05-13 21:40:29', 4, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100007, '59e627ef9ce310.64090158.png', 100008, '59e627ef9dd0d8.60552099.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'AVERAGE', 100007, '59e627ef9ce310.64090158.png', 100008, '59e627ef9dd0d8.60552099.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-05-13 21:40:29', 4, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-05-13 21:40:29', 4, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-05-13 21:40:29', 4, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100007, '59e627ef9ce310.64090158.png', 100008, '59e627ef9dd0d8.60552099.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-05-13 21:40:29', 4, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Trachea slightly deviated to the right', 100011, '59e63eed13cc03.44805583.png', 100018, '59e63eed1464e6.12308591.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-05-24 21:43:36', 5, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-05-24 21:43:36', 5, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-05-24 21:43:36', 5, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'No ova or parasites seen. Routine Ova  and Parasite Exam may not detect some parasites  that ocassionally causes diarrheal illness.', 100017, '59e624400142a3.20666088.png', 100008, '59e62440019e81.52995297.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-05-24 21:43:36', 5, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Cardiac shadow appears normal', 100011, '59e6400be5fb07.60721646.png', 100018, '59e6400be717b6.73913116.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-06-15 21:47:36', 6, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62092b43110.84878268.png', 100008, '59e62092b4aab8.14215019.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-06-15 21:47:36', 6, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-06-15 21:47:36', 6, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-06-15 21:47:36', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-06-15 21:47:36', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-06-15 21:47:37', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-06-15 21:47:37', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-06-15 21:47:37', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-06-15 21:47:37', 6, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-06-15 21:47:37', 6, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-06-15 21:47:37', 6, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-06-15 21:47:37', 6, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Right lung fields are clear.Left lung field shows a homogenous  opacity with spiculated margins in the upper zone.', 100011, '59e640d164feb5.66825328.png', 100018, '59e640d1666298.83820826.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-06-15 21:50:18', 7, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e629d52ec657.84567416.png', 100008, '59e629d52f7a66.02762967.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-06-15 21:50:18', 7, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-06-15 21:50:18', 7, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-06-15 21:50:18', 7, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Cardiac shadow appears normal`', 100011, '59e6423ec80b28.71893765.png', 100018, '59e6423ec91ba3.82341842.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100021, 'Platelet Count', '2017-06-15 21:50:18', 7, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '3.18', 'X10\'9', '150.00-450.00', '3.18', 'X10\'10', '150.00-450.00', 100007, '59e629d52ec657.84567416.png', 100008, '59e629d52f7a66.02762967.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100027, 'Blood Typing(ABO-Rh)', '2017-06-15 21:50:18', 7, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '+', '-', '-', '+', '-', '-', 100007, '59e629d52ec657.84567416.png', 100008, '59e629d52f7a66.02762967.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-08-15 11:34:55', 8, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62b21346135.07777523.png', 100008, '59e62b2134d416.04114176.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-08-15 11:34:55', 8, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-08-15 11:34:55', 8, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE');
INSERT INTO `trans_result_service_tbl` (`service_id`, `service_name`, `date`, `result_id`, `service_group_id`, `medreq_dateofexam`, `medreq_examphysician`, `medreq_evaluated`, `medreq_history`, `medreq_datediag`, `medreq_illness`, `medreq_medication`, `medreq_remarks1`, `medreq_famhisto1`, `medreq_famhisto2`, `medreq_smoker`, `medreq_sticks`, `medreq_remarks2`, `medreq_packyears`, `medreq_alcohol`, `medreq_bottles`, `medreq_remarks3`, `medreq_shots`, `medreq_obstetric1`, `medreq_obstetric2`, `medreq_visual`, `medreq_temp`, `medreq_height`, `medreq_weight`, `medreq_pulse`, `medreq_bloodpressure`, `medreq_genapp`, `medreq_eyes`, `medreq_ear`, `medreq_neck`, `medreq_breast`, `medreq_chest`, `medreq_heart`, `medreq_abdomen`, `medreq_exanal`, `medreq_exgen`, `medreq_extermities`, `medreq_cbc`, `medreq_fecalysis`, `medreq_urinalysis`, `medreq_xray`, `medreq_drugtest`, `medreq_assess`, `ultra_title`, `ultra_impression`, `ultra_sonologist`, `ultra_sonologist_img`, `ultra_date`, `xray_date`, `xray_title`, `xray_findings`, `xray_radiologic`, `xray_radiologic_img`, `xray_radiologist`, `xray_radiologist_img`, `medserv1_printdate`, `medserv1_result`, `medserv1_medtech`, `medserv1_medtech_img`, `medserv1_pathologist`, `medserv1_pathologist_img`, `Medserv2_printdate`, `Medserv2_intresult`, `Medserv2_intunit`, `Medserv2_intref`, `Medserv2_conresult`, `Medserv2_conunit`, `Medserv2_conref`, `Medserv2_medtech`, `Medserv2_medtech_img`, `Medserv2_pathologist`, `Medserv2_pathologist_img`, `Ecg_ecgno`, `Ecg_rate`, `Ecg_ppr`, `Ecg_qrs`, `Ecg_qtqtc`, `Ecg_doctor`, `Ecg_pqrs`, `Ecg_minesota`, `Ecg_diagnosis`, `Ecg_ecg_image`, `Drug_picture_img`, `Drug_reportid`, `Drug_ccf`, `Drug_test`, `Drug_purpose`, `Drug_reqparties`, `Drug_drugmet1`, `Drug_drugmet2`, `Drug_result1`, `Drug_result2`, `Drug_remarks1`, `Drug_remarks2`, `Drug_referred1`, `Drug_referred2`, `corppack_id`, `status`) VALUES
(100101, 'FBS', '2017-08-15 11:34:55', 8, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-08-15 11:34:55', 8, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-08-15 11:34:55', 8, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-08-15 11:34:55', 8, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62b21346135.07777523.png', 100008, '59e62b2134d416.04114176.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-08-15 11:34:55', 8, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-08-15 11:34:55', 8, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-08-15 11:34:56', 8, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Levoscoliosis on the thorocolumbar spine.', 100011, '59e64390c82f20.11794850.png', 100018, '59e64390c926b8.92992766.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-08-18 11:38:21', 9, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e625ce5c2d53.79347264.png', 100008, '59e625ce5cd1c2.99530544.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-08-18 11:38:21', 9, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-08-18 11:38:21', 9, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-08-18 11:38:22', 9, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e6449d3a80f7.14515529.png', 100018, '59e6449d3be063.35705864.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-08-18 11:40:58', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-08-18 11:40:58', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-08-18 11:40:58', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-08-18 11:40:59', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100017, '59e62557e405e3.31681941.png', 100008, '59e62557e4be89.83870847.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-08-18 11:40:59', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'AVERAGE', 100017, '59e62557e405e3.31681941.png', 100008, '59e62557e4be89.83870847.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-08-18 11:40:59', 10, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-08-18 11:40:59', 10, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-08-18 11:40:59', 10, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100017, '59e62557e405e3.31681941.png', 100008, '59e62557e4be89.83870847.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-08-18 11:40:59', 10, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-08-18 11:40:59', 10, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-08-18 11:40:59', 10, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-08-18 11:40:59', 10, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\nNo radiological evidence of enlarged hilar or mediastinal lymph nodes\r\n\r\n', 100011, '59e64533c3fa19.76283246.png', 100018, '59e64533c498d5.57580254.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-01-10 22:20:24', 11, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100017, '59e62c391d9d81.31905203.png', 100008, '59e62c391e3fb4.08100803.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-01-10 22:20:24', 11, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-01-10 22:20:24', 11, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100160, 'ElectroCardioGram', '2017-01-10 22:20:24', 11, 100026, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'upright in leads I, aVF and V3 - V6', 'Normally between 0.12 and 0.20 seconds.', 'Duration less than or equal to 0.12 seconds, amplitude greater than 0.5 mV in at least one standard lead, and greater than 1.0 mV in at least one precordial lead. Upper limit of normal amplitude is 2.5 - 3.0 mV.', 'Durations normally less than or equal to 0.40 seconds for males and 0.44 seconds for females.', 100006, 'shape is generally smooth, not notched or peaked', '123', 'the heart is beating in a regular sinus rhythm between 60 - 100 beats per minute (specifically 82 bpm)', '59e65af40a4db9.53060530.bmp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-01-19 22:22:25', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100005, 'DONE'),
(100020, 'CBC', '2017-01-19 22:22:25', 12, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62d386a84f0.40186095.png', 100008, '59e62d386b2a96.12408554.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-01-19 22:22:25', 12, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-01-19 22:22:25', 12, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '-Senile pulmonary changes with exaggerated hilar bronchovascular   \r\n     marking crowdening of the ribs.\r\n-Clear both lung fields and costophrenic angles \r\n  -Normal Cardiac size and shape\r\n', 100011, '59e6460ad2f674.77809795.png', 100018, '59e6460ad38011.74828436.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-01-19 22:22:25', 12, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-01-19 22:22:25', 12, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62d386a84f0.40186095.png', 100008, '59e62d386b2a96.12408554.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100027, 'Blood Typing(ABO-Rh)', '2017-01-19 22:22:25', 12, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '+', '-', '-', '+', '-', '-', 100007, '59e62d386a84f0.40186095.png', 100008, '59e62d386b2a96.12408554.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100034, 'HBsAg', '2017-01-19 22:22:25', 12, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '8', '.948', '10', '8', '.948', '10', 100016, '59e61bb3dd3d83.14072113.png', 100008, '59e61bb3ddeb27.06965461.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-01-19 22:22:25', 12, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-02-07 22:23:49', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100018, 'DONE'),
(100020, 'CBC', '2017-02-07 22:23:49', 13, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e6309d78e996.85851664.png', 100008, '59e6309d7996f4.79017162.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-02-07 22:23:49', 13, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-02-07 22:23:49', 13, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-02-07 22:23:49', 13, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	Hyperinflated lungs with exaggerated central bronchovascular markings and peripheral attenuation of the vascular shadows.\r\n•	Low flat diaphragm\r\n•	Exaggerated retrosternal and retrocardiac spaces with increased AP diameter of the chest (burrle chest).\r\n', 100011, '59e646a393dd08.01580574.png', 100018, '59e646a3965cc8.71958459.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-02-07 22:23:50', 13, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Mucoid within normal range.', 100007, '59e61f7a94a644.71630527.png', 100008, '59e61f7a95b5f9.90320533.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-02-10 22:25:07', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100011, 'DONE'),
(100020, 'CBC', '2017-02-10 22:25:07', 14, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100016, '59e6324224cde4.16704174.png', 100008, '59e63242257b75.60110806.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-02-10 22:25:07', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-02-10 22:25:07', 14, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-02-10 22:25:07', 14, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	No evidence of pulmonary parenchymal masses or infiltrations\r\n•	Clear both costophernic angles\r\n•	Normal Cardiac size and shape\r\n', 100011, '59e647a1c2d7f9.46653355.png', 100018, '59e647a1c38e00.62315982.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-02-10 22:25:07', 14, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-02-10 22:25:07', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-02-10 22:25:07', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-02-10 22:25:08', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-02-10 22:25:08', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-02-10 22:25:08', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-02-10 22:25:08', 14, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Normal', 100007, '59e61eda980201.02827804.png', 100008, '59e61eda985dd2.32289899.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-02-10 22:25:08', 14, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Fair', 100007, '59e61eda980201.02827804.png', 100008, '59e61eda985dd2.32289899.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-02-10 22:25:08', 14, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-02-28 22:27:16', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100001, 'DONE'),
(100020, 'CBC', '2017-02-28 22:27:16', 15, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100017, '59e632fef25f21.46343110.jpg', 100008, '59e632fef33871.11596313.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100043, 'Hepatitis B Profile (1-6)', '2017-02-28 22:27:16', 15, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100044, 'Hepatitis A n B Profile (1-8)', '2017-02-28 22:27:16', 15, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-02-28 22:27:16', 15, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100085, 'HIV(AIDS Test)', '2017-02-28 22:27:16', 15, 100017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Patient\'s specimen is negative for Human ImmunoDeficiency Virus Proviral DNA by the RT Polymerase Chain Reaction Amplification Method.', 100016, '59e61dea8b26d6.51372921.png', 100008, '59e61dea8b8591.53250614.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-02-28 22:27:16', 15, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-02-28 22:27:16', 15, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-02-28 22:27:16', 15, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-02-28 22:27:16', 15, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	No evidence of pulmonary parenchymal masses or infiltrations\r\n•	Clear both costophernic angles\r\n•	Normal Cardiac size and shape\r\n', 100011, '59e6484f519a76.96185261.png', 100018, '59e6484f52d1f7.29318523.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-03-15 22:28:55', 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100008, 'DONE'),
(100020, 'CBC', '2017-03-15 22:28:55', 16, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e6313985eee0.25741040.png', 100008, '59e63139873718.31238296.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-03-15 22:28:55', 16, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE');
INSERT INTO `trans_result_service_tbl` (`service_id`, `service_name`, `date`, `result_id`, `service_group_id`, `medreq_dateofexam`, `medreq_examphysician`, `medreq_evaluated`, `medreq_history`, `medreq_datediag`, `medreq_illness`, `medreq_medication`, `medreq_remarks1`, `medreq_famhisto1`, `medreq_famhisto2`, `medreq_smoker`, `medreq_sticks`, `medreq_remarks2`, `medreq_packyears`, `medreq_alcohol`, `medreq_bottles`, `medreq_remarks3`, `medreq_shots`, `medreq_obstetric1`, `medreq_obstetric2`, `medreq_visual`, `medreq_temp`, `medreq_height`, `medreq_weight`, `medreq_pulse`, `medreq_bloodpressure`, `medreq_genapp`, `medreq_eyes`, `medreq_ear`, `medreq_neck`, `medreq_breast`, `medreq_chest`, `medreq_heart`, `medreq_abdomen`, `medreq_exanal`, `medreq_exgen`, `medreq_extermities`, `medreq_cbc`, `medreq_fecalysis`, `medreq_urinalysis`, `medreq_xray`, `medreq_drugtest`, `medreq_assess`, `ultra_title`, `ultra_impression`, `ultra_sonologist`, `ultra_sonologist_img`, `ultra_date`, `xray_date`, `xray_title`, `xray_findings`, `xray_radiologic`, `xray_radiologic_img`, `xray_radiologist`, `xray_radiologist_img`, `medserv1_printdate`, `medserv1_result`, `medserv1_medtech`, `medserv1_medtech_img`, `medserv1_pathologist`, `medserv1_pathologist_img`, `Medserv2_printdate`, `Medserv2_intresult`, `Medserv2_intunit`, `Medserv2_intref`, `Medserv2_conresult`, `Medserv2_conunit`, `Medserv2_conref`, `Medserv2_medtech`, `Medserv2_medtech_img`, `Medserv2_pathologist`, `Medserv2_pathologist_img`, `Ecg_ecgno`, `Ecg_rate`, `Ecg_ppr`, `Ecg_qrs`, `Ecg_qtqtc`, `Ecg_doctor`, `Ecg_pqrs`, `Ecg_minesota`, `Ecg_diagnosis`, `Ecg_ecg_image`, `Drug_picture_img`, `Drug_reportid`, `Drug_ccf`, `Drug_test`, `Drug_purpose`, `Drug_reqparties`, `Drug_drugmet1`, `Drug_drugmet2`, `Drug_result1`, `Drug_result2`, `Drug_remarks1`, `Drug_remarks2`, `Drug_referred1`, `Drug_referred2`, `corppack_id`, `status`) VALUES
(100133, 'Urinalysis', '2017-03-15 22:28:55', 16, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-03-15 22:28:55', 16, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\n Normal Cardiac size and shape\r\n', 100011, '59e648cf638b59.73453382.png', 100018, '59e648cf651d83.17051610.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-03-15 22:28:55', 16, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-03-15 22:28:56', 16, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e6313985eee0.25741040.png', 100008, '59e63139873718.31238296.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100027, 'Blood Typing(ABO-Rh)', '2017-03-15 22:28:56', 16, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '+', '-', '-', '+', '-', '-', 100007, '59e6313985eee0.25741040.png', 100008, '59e63139873718.31238296.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100034, 'HBsAg', '2017-03-15 22:28:56', 16, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-03-15 22:28:56', 16, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-03-19 22:30:23', 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100018, 'DONE'),
(100020, 'CBC', '2017-03-19 22:30:23', 17, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-03-19 22:30:24', 17, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-03-19 22:30:24', 17, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-03-19 22:30:24', 17, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e6496a9504f0.45264497.png', 100018, '59e6496a968161.29054510.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-03-19 22:30:24', 17, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100115, 'Bilirubin (with B1 and B2)', '2017-03-19 22:30:24', 17, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100151, 'SGPT', '2017-03-19 22:30:24', 17, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '155-HIGH', 100007, '59e6202051ea15.84014060.png', 100008, '59e620205249a7.14004027.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100152, 'SGOT', '2017-03-19 22:30:24', 17, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '646-ALERT', 100007, '59e6202051ea15.84014060.png', 100008, '59e620205249a7.14004027.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100157, 'TPAG', '2017-03-19 22:30:24', 17, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100158, 'Alkaline Phosphatase', '2017-03-19 22:30:24', 17, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-03-31 22:31:50', 18, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e62cb92fde16.25449942.png', 100008, '59e62cb93062d1.97579400.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100027, 'Blood Typing(ABO-Rh)', '2017-03-31 22:31:50', 18, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '+', '-', '-', '+', '-', '-', 100007, '59e62cb92fde16.25449942.png', 100008, '59e62cb93062d1.97579400.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100034, 'HBsAg', '2017-03-31 22:31:50', 18, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-03-31 22:31:50', 18, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-04-03 22:33:30', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100009, 'DONE'),
(100020, 'CBC', '2017-04-03 22:33:31', 19, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e633992aa028.79115551.png', 100008, '59e633992b9f86.13747455.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-04-03 22:33:31', 19, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-04-03 22:33:31', 19, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-04-03 22:33:31', 19, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e64a02a1a4a4.86468304.png', 100018, '59e64a02a23c64.54001243.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-04-03 22:33:31', 19, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100030, 'Gram Stain', '2017-04-03 22:33:31', 19, 100014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'FEW WBC SEEN, NO ORGANISMS SEEN', 100007, '59e61a8f799620.19059218.png', 100008, '59e61a8f7a1ec6.17098725.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100032, 'Culture and Sensitivity', '2017-04-03 22:33:31', 19, 100014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'ABUNDANT STAPHYLOOCCUS SEEN', 100007, '59e61a8f799620.19059218.png', 100008, '59e61a8f7a1ec6.17098725.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100034, 'HBsAg', '2017-04-03 22:33:31', 19, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-04-12 22:34:39', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100006, 'DONE'),
(100043, 'Hepatitis B Profile (1-6)', '2017-04-12 22:34:39', 20, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'HBsAG- +, Anti-HB\'s--,Anti-HBC-+ ALT-NORMAL', 100007, '59e637d1b9a6f9.31514584.png', 100008, '59e637d1ba5743.40991649.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-04-12 22:34:39', 20, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-04-12 22:34:39', 20, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e64aa56c55e2.79889074.png', 100018, '59e64aa56d0524.85481671.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-04-12 22:34:39', 20, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100107, 'Creatinine', '2017-04-12 22:34:39', 20, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100108, 'BUN', '2017-04-12 22:34:39', 20, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100109, 'Uric Acid', '2017-04-12 22:34:39', 20, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100110, 'Cholesterol', '2017-04-12 22:34:39', 20, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100160, 'ElectroCardioGram', '2017-04-12 22:34:39', 20, 100026, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02', 'aVF and V3 - V6', 'Normally between 0.12 and 0.20 seconds.', 'Duration less than or equal to 0.12 seconds, ', 'Durations normally less than or equal to 0.40 seconds', 100006, 'shape is generally smooth, not notched or peaked', '1234', 'the heart is beating in a regular sinus rhythm between 60 - 100 beats per minute (specifically 82 bpm)', '59e65c744c8882.29857075.bmp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-04-27 22:36:09', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100007, 'DONE'),
(100020, 'CBC', '2017-04-27 22:36:09', 21, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e6352be96c90.51367506.png', 100008, '59e6352be9d802.95288012.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-04-27 22:36:09', 21, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-04-27 22:36:09', 21, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-04-27 22:36:09', 21, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e64b28c1af23.33733286.png', 100018, '59e64b28c2ed45.19696043.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-04-27 22:36:09', 21, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100115, 'Bilirubin (with B1 and B2)', '2017-04-27 22:36:09', 21, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100151, 'SGPT', '2017-04-27 22:36:09', 21, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '155-HIGH', 100016, '59e624d2776f44.39410543.png', 100008, '59e624d278fad0.89274346.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100152, 'SGOT', '2017-04-27 22:36:09', 21, 100023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', '646-ALERT', 100016, '59e624d2776f44.39410543.png', 100008, '59e624d278fad0.89274346.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100157, 'TPAG', '2017-04-27 22:36:09', 21, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100158, 'Alkaline Phosphatase', '2017-04-27 22:36:09', 21, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100161, 'Ultrasound', '2017-04-27 22:36:09', 21, 100025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ULTRASOUND', 'The visualized portions of abdominal aorta present no abnormalities.\r\nThe visualized portions of the pancreas are unremarkable. The spleen is of uniform echo texture and\r\ndoes not appear enlarged. The right kidney measures and the left kidney measures . Both kidneys\r\nare free of hydronephrosis. The right kidney contains a 12 cm cyst.\r\nIMPRESSION:\r\n1. Two hepatic cysts.\r\n2. A 12 cm right renal cyst.\r\n3. Cholelithiasis. Consider further evaluation with nuclear medicine hepatobiliary scan if clinically\r\nwarranted.', 100010, '59e64f7832b361.08111818.png', '2017-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-05-24 22:38:05', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100012, 'DONE'),
(100020, 'CBC', '2017-05-24 22:38:05', 22, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100016, '59e635c8bba984.82780071.png', 100008, '59e635c8bc5502.24871910.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-05-24 22:38:05', 22, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100134, 'Pregnancy Test(Urine)', '2017-05-24 22:38:05', 22, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-05-24 22:38:05', 22, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e64baf717234.81849004.png', 100018, '59e64baf7226a0.16095021.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-05-24 22:38:05', 22, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100107, 'Creatinine', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100108, 'BUN', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100109, 'Uric Acid', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100110, 'Cholesterol', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100111, 'Triglyceride', '2017-05-24 22:38:05', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100112, 'LDL', '2017-05-24 22:38:06', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100113, 'HDL', '2017-05-24 22:38:06', 22, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-06-01 22:39:47', 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100004, 'DONE'),
(100020, 'CBC', '2017-06-01 22:39:47', 23, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100007, '59e6367507b581.17802026.png', 100008, '59e63675086901.94215769.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE');
INSERT INTO `trans_result_service_tbl` (`service_id`, `service_name`, `date`, `result_id`, `service_group_id`, `medreq_dateofexam`, `medreq_examphysician`, `medreq_evaluated`, `medreq_history`, `medreq_datediag`, `medreq_illness`, `medreq_medication`, `medreq_remarks1`, `medreq_famhisto1`, `medreq_famhisto2`, `medreq_smoker`, `medreq_sticks`, `medreq_remarks2`, `medreq_packyears`, `medreq_alcohol`, `medreq_bottles`, `medreq_remarks3`, `medreq_shots`, `medreq_obstetric1`, `medreq_obstetric2`, `medreq_visual`, `medreq_temp`, `medreq_height`, `medreq_weight`, `medreq_pulse`, `medreq_bloodpressure`, `medreq_genapp`, `medreq_eyes`, `medreq_ear`, `medreq_neck`, `medreq_breast`, `medreq_chest`, `medreq_heart`, `medreq_abdomen`, `medreq_exanal`, `medreq_exgen`, `medreq_extermities`, `medreq_cbc`, `medreq_fecalysis`, `medreq_urinalysis`, `medreq_xray`, `medreq_drugtest`, `medreq_assess`, `ultra_title`, `ultra_impression`, `ultra_sonologist`, `ultra_sonologist_img`, `ultra_date`, `xray_date`, `xray_title`, `xray_findings`, `xray_radiologic`, `xray_radiologic_img`, `xray_radiologist`, `xray_radiologist_img`, `medserv1_printdate`, `medserv1_result`, `medserv1_medtech`, `medserv1_medtech_img`, `medserv1_pathologist`, `medserv1_pathologist_img`, `Medserv2_printdate`, `Medserv2_intresult`, `Medserv2_intunit`, `Medserv2_intref`, `Medserv2_conresult`, `Medserv2_conunit`, `Medserv2_conref`, `Medserv2_medtech`, `Medserv2_medtech_img`, `Medserv2_pathologist`, `Medserv2_pathologist_img`, `Ecg_ecgno`, `Ecg_rate`, `Ecg_ppr`, `Ecg_qrs`, `Ecg_qtqtc`, `Ecg_doctor`, `Ecg_pqrs`, `Ecg_minesota`, `Ecg_diagnosis`, `Ecg_ecg_image`, `Drug_picture_img`, `Drug_reportid`, `Drug_ccf`, `Drug_test`, `Drug_purpose`, `Drug_reqparties`, `Drug_drugmet1`, `Drug_drugmet2`, `Drug_result1`, `Drug_result2`, `Drug_remarks1`, `Drug_remarks2`, `Drug_referred1`, `Drug_referred2`, `corppack_id`, `status`) VALUES
(100078, 'Drug Testing', '2017-06-01 22:39:47', 23, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-06-01 22:39:47', 23, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-06-01 22:39:47', 23, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', 'Clear both lung fields and costophrenic angles \r\nNormal Cardiac size and shape\r\n', 100011, '59e64ce2181bb1.56174707.png', 100018, '59e64ce2192c45.41752628.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-06-01 22:39:47', 23, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100160, 'ElectroCardioGram', '2017-06-01 22:39:47', 23, 100026, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03', 'aVF and V3 - V6', 'Normally between 0.12 and 0.20 seconds.', 'Duration less than or equal to 0.12 seconds, ', 'Durations normally less than or equal to 0.40 seconds', 100006, 'shape is generally smooth, not notched or peaked', '12345', 'the heart is beating in a regular sinus rhythm between 60 - 100 beats per minute (specifically 82 bpm)', '59e65d129fca60.73055791.bmp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100161, 'Ultrasound', '2017-06-01 22:39:47', 23, 100025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ULTRASOUND', 'The visualized portions of abdominal aorta present no abnormalities.\r\nThe visualized portions of the pancreas are unremarkable. The spleen is of uniform echo texture and\r\ndoes not appear enlarged. The right kidney measures and the left kidney measures . Both kidneys\r\nare free of hydronephrosis. The right kidney contains a 12 cm cyst.\r\nIMPRESSION:\r\n1. Two hepatic cysts.\r\n2. A 12 cm right renal cyst.\r\n3. Cholelithiasis. Consider further evaluation with nuclear medicine hepatobiliary scan if clinically\r\nwarranted.', 100010, '59e64fe52a09b3.70119668.png', '2017-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-07-12 22:43:28', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100005, 'DONE'),
(100020, 'CBC', '2017-07-12 22:43:28', 24, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-07-12 22:43:28', 24, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-07-12 22:43:28', 24, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	Hyperinflated lungs with exaggerated central bronchovascular markings and peripheral attenuation of the vascular shadows.\r\n•	Low flat diaphragm\r\n•	Exaggerated retrosternal and retrocardiac spaces with increased AP diameter of the chest (burrle chest).\r\n', 100011, '59e64d6c2a4804.62109466.png', 100018, '59e64d6c2b6423.65972542.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100162, 'Fecalysis', '2017-07-12 22:43:28', 24, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-07-12 22:43:28', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-07-12 22:43:28', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-07-12 22:43:29', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-07-12 22:43:29', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-07-12 22:43:29', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-07-12 22:43:29', 24, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Normal', 100016, '59e62866f0e386.94228279.png', 100008, '59e62866f15fa4.19319753.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-07-12 22:43:29', 24, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Fair', 100016, '59e62866f0e386.94228279.png', 100008, '59e62866f15fa4.19319753.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-07-12 22:43:29', 24, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100161, 'Ultrasound', '2017-07-12 22:43:29', 24, 100025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ULTRASOUND', 'The visualized portions of abdominal aorta present no abnormalities.\r\nThe visualized portions of the pancreas are unremarkable. The spleen is of uniform echo texture and\r\ndoes not appear enlarged. The right kidney measures and the left kidney measures . Both kidneys\r\nare free of hydronephrosis. The right kidney contains a 12 cm cyst.\r\nIMPRESSION:\r\n1. Two hepatic cysts.\r\n2. A 12 cm right renal cyst.\r\n3. Cholelithiasis. Consider further evaluation with nuclear medicine hepatobiliary scan if clinically\r\nwarranted.', 100010, '59e6509f73ca61.26139586.png', '2017-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-08-31 22:45:02', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100016, 'DONE'),
(100020, 'CBC', '2017-08-31 22:45:02', 25, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '5.7', 'x10E3', '4.0-10.5', '5.7', 'X10E3', '4.0-10.5', 100016, '59e6370104eea7.93933316.png', 100008, '59e6370105ff56.91694690.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100078, 'Drug Testing', '2017-08-31 22:45:02', 25, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-08-31 22:45:02', 25, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-08-31 22:45:02', 25, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	Hyperinflated lungs with exaggerated central bronchovascular markings and peripheral attenuation of the vascular shadows.\r\n•	Low flat diaphragm\r\n•	Exaggerated retrosternal and retrocardiac spaces with increased AP diameter of the chest (burrle chest).\r\n', 100011, '59e64de8dc3b98.14622138.png', 100018, '59e64de8dcf519.77220795.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100045, 'Hepatitis ABC Profile (1-9)', '2017-08-31 22:45:02', 25, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'Negative', 100016, '59e622385e8f44.93287610.png', 100008, '59e62238600af1.60819419.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100048, 'TSH', '2017-09-15 22:47:08', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100049, 'FT3', '2017-09-15 22:47:08', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100050, 'FT4', '2017-09-15 22:47:09', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100064, 'LH', '2017-09-15 22:47:09', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100016, '59e6269f169118.41136296.png', 100008, '59e6269f1711c6.20192575.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100066, 'Prolactin', '2017-09-15 22:47:09', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'AVERAGE', 100016, '59e6269f169118.41136296.png', 100008, '59e6269f1711c6.20192575.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-09-15 22:47:09', 26, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100106, 'HbA1c(EDTA)', '2017-09-15 22:47:09', 26, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100156, 'FSH', '2017-09-15 22:47:09', 26, 100016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'NEGATIVE', 100016, '59e6269f169118.41136296.png', 100008, '59e6269f1711c6.20192575.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100021, 'Platelet Count', '2017-09-15 22:47:09', 26, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-10-17 22:48:31', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100015, 'DONE'),
(100044, 'Hepatitis A n B Profile (1-8)', '2017-10-17 22:48:31', 27, 100015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-17', 'SUSCEPTIBLE', 100017, '59e62733562a61.93531484.png', 100008, '59e6273356fb68.08734711.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100133, 'Urinalysis', '2017-10-17 22:48:31', 27, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100159, 'X-Ray', '2017-10-17 22:48:31', 27, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'CHEST XRAY', '•	Hyperinflated lungs with exaggerated central bronchovascular markings and peripheral attenuation of the vascular shadows.\r\n•	Low flat diaphragm\r\n•	Exaggerated retrosternal and retrocardiac spaces with increased AP diameter of the chest (burrle chest).\r\n', 100011, '59e64e6cad7133.14628333.png', 100018, '59e64e6cae4579.38150483.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100101, 'FBS', '2017-10-17 22:48:32', 27, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100107, 'Creatinine', '2017-10-17 22:48:32', 27, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100108, 'BUN', '2017-10-17 22:48:32', 27, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100109, 'Uric Acid', '2017-10-17 22:48:32', 27, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100110, 'Cholesterol', '2017-10-17 22:48:32', 27, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(NULL, NULL, '2017-10-18 13:41:29', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100019, 'DONE'),
(100159, 'X-Ray', '2017-10-18 13:41:29', 28, 100024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING'),
(100160, 'ElectroCardioGram', '2017-10-18 13:41:29', 28, 100026, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING'),
(100161, 'Ultrasound', '2017-10-18 13:41:29', 28, 100025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING'),
(100020, 'CBC', '2017-10-18 13:41:29', 28, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'Normal', 'x1', '123', 'Normal', 'x1', '123', 100016, '59e6ecc53f5be1.18388167.jpg', 100008, '59e6ecc53f9e02.30674924.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100110, 'Cholesterol', '2017-10-18 13:46:41', 29, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'Normal', 100007, '59e6edd54b74c6.67089969.jpg', 100008, '59e6edd54baed9.91117677.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100111, 'Triglyceride', '2017-10-18 13:46:41', 29, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'Normal', 100007, '59e6edd54b74c6.67089969.jpg', 100008, '59e6edd54baed9.91117677.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100112, 'LDL', '2017-10-18 13:46:41', 29, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'Average', 100007, '59e6edd54b74c6.67089969.jpg', 100008, '59e6edd54baed9.91117677.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100113, 'HDL', '2017-10-18 13:46:41', 29, 100018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', 'Average', 100007, '59e6edd54b74c6.67089969.jpg', 100008, '59e6edd54baed9.91117677.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100020, 'CBC', '2017-10-18 13:46:41', 29, 100013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-18', '1.5', 'x1', '8181', '1.5', 'x1', '9032', 100016, '59e6f17d9ac066.19596322.jpg', 100008, '59e6f17d9b0933.20459905.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE'),
(100144, 'Stool Exam', '2017-10-18 13:46:41', 29, 100021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `trans_serv_tbl`
--

CREATE TABLE `trans_serv_tbl` (
  `trans_id` int(11) NOT NULL,
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `service_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_serv_tbl`
--

INSERT INTO `trans_serv_tbl` (`trans_id`, `serv_id`, `serv_name`, `service_price`) VALUES
(1, 100134, 'Pregnancy Test(Urine)', 500),
(3, 100078, 'Drug Testing', 1000),
(3, 100119, 'Potassium', 100),
(3, 100121, 'Calcium', 150),
(4, 100159, 'X-Ray', 500),
(6, 100159, 'X-Ray', 500),
(7, 100021, 'Platelet Count', 70),
(7, 100027, 'Blood Typing(ABO-Rh)', 100),
(11, 100160, 'ElectroCardioGram', 1000),
(15, 100159, 'X-Ray', 500),
(19, 100030, 'Gram Stain', 80),
(19, 100032, 'Culture and Sensitivity', 350),
(19, 100034, 'HBsAg', 70),
(20, 100160, 'ElectroCardioGram', 1000),
(21, 100161, 'Ultrasound', 450),
(23, 100160, 'ElectroCardioGram', 1000),
(23, 100161, 'Ultrasound', 450),
(24, 100161, 'Ultrasound', 450),
(25, 100045, 'Hepatitis ABC Profile (1-9)', 2100),
(26, 100021, 'Platelet Count', 70),
(28, 100020, 'CBC', 90),
(29, 100020, 'CBC', 90),
(29, 100144, 'Stool Exam', 600);

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
(100008, 'admin', 'admin', 'Administrator', 0, '2017-10-08 01:16:25', '2017-10-08 01:16:25', 0, 0),
(100023, 'medtech', 'medtech', 'Joseph Jem', 100005, '2017-10-13 18:09:40', '2017-10-13 18:09:40', 0, 100007),
(100024, 'pathologist', 'pathologist', 'Ana Karylle', 100007, '2017-10-13 18:12:08', '2017-10-13 18:12:08', 0, 100008),
(100025, 'cardiac', 'cardiac', 'Billy Joe', 100008, '2017-10-13 18:13:37', '2017-10-13 18:13:37', 0, 100009),
(100026, 'sonologist', 'sonologist', 'Gwyn Stephanie', 100009, '2017-10-13 18:15:12', '2017-10-13 18:15:12', 0, 100010),
(100027, 'radtech', 'radtech', 'Samantha', 100010, '2017-10-13 18:16:33', '2017-10-13 18:16:33', 0, 100011),
(100028, 'physician', 'physician', 'Patriz Danielle', 10011, '2017-10-13 18:17:39', '2017-10-13 18:17:39', 0, 100012),
(100029, 'receptionist', 'receptionist', 'Paula Marie', 100012, '2017-10-13 18:19:07', '2017-10-13 18:19:07', 0, 100013),
(100030, 'medtechsenior', 'medtechsenior', 'Zander', 100005, '2017-10-13 18:23:13', '2017-10-13 18:23:13', 0, 100016),
(100031, 'medtechstaff', 'medtechstaff', 'Ferlaine', 100005, '2017-10-13 18:24:18', '2017-10-13 18:24:18', 0, 100017),
(100032, 'radiologist', 'radiologist', 'Jan', 100013, '2017-10-17 08:15:32', '2017-10-17 08:15:32', 0, 100018),
(100033, 'dtanalyst', 'dtanalyst', 'Mark', 100014, '2017-10-17 08:34:49', '2017-10-17 08:34:49', 0, 100019),
(100034, '', '', 'Jhealourne', 100015, '2017-10-18 05:17:19', '2017-10-18 05:17:19', 0, 100020),
(100035, 'cardiacphysio', 'cardiacphysio', 'Juan', 100008, '2017-10-18 05:19:04', '2017-10-18 05:19:04', 0, 100021);

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
  ADD KEY `corp_id` (`corp_id`),
  ADD KEY `corpPack_id` (`corpPack_id`);

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
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `lab_id` (`lab_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_department_id` (`emp_medtech_rank_id`),
  ADD KEY `emp_type_id` (`emp_type_id`);

--
-- Indexes for table `employee_useraccess_tbl`
--
ALTER TABLE `employee_useraccess_tbl`
  ADD PRIMARY KEY (`access_id`),
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
-- Indexes for table `laboratory_tbl`
--
ALTER TABLE `laboratory_tbl`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `medtech_rank`
--
ALTER TABLE `medtech_rank`
  ADD PRIMARY KEY (`rank_id`);

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
  ADD PRIMARY KEY (`servgroup_id`),
  ADD KEY `lab_id` (`lab_id`);

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
-- Indexes for table `transcorp_payment_tbl`
--
ALTER TABLE `transcorp_payment_tbl`
  ADD PRIMARY KEY (`corpPayment_id`),
  ADD KEY `corp_id` (`corp_id`);

--
-- Indexes for table `transcorp_tbl`
--
ALTER TABLE `transcorp_tbl`
  ADD PRIMARY KEY (`transCorp_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `corp_id` (`corp_id`),
  ADD KEY `corpPack_id` (`corpPack_id`);

--
-- Indexes for table `transrebate_payment_tbl`
--
ALTER TABLE `transrebate_payment_tbl`
  ADD PRIMARY KEY (`transRebPay_id`),
  ADD KEY `transRebPay_emp_id` (`transRebPay_emp_id`);

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
  ADD KEY `service_id` (`service_id`),
  ADD KEY `examphysician` (`medreq_examphysician`),
  ADD KEY `evaluated` (`medreq_evaluated`),
  ADD KEY `ultra_radiologist` (`ultra_sonologist`),
  ADD KEY `xray_radiologic` (`xray_radiologic`),
  ADD KEY `xray_radiologist` (`xray_radiologist`),
  ADD KEY `medserv1_medtech` (`medserv1_medtech`),
  ADD KEY `medserv1_pathologist` (`medserv1_pathologist`),
  ADD KEY `Medserv2_pathologist` (`Medserv2_pathologist`),
  ADD KEY `Medserv2_medtech` (`Medserv2_medtech`),
  ADD KEY `Ecg_doctor` (`Ecg_doctor`),
  ADD KEY `Drug_refferred1` (`Drug_referred1`),
  ADD KEY `Drug_refferred2` (`Drug_referred2`);

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
  MODIFY `corpLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10017;
--
-- AUTO_INCREMENT for table `corporate_accounts_tbl`
--
ALTER TABLE `corporate_accounts_tbl`
  MODIFY `corp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100027;
--
-- AUTO_INCREMENT for table `corp_package_log_tbl`
--
ALTER TABLE `corp_package_log_tbl`
  MODIFY `corpPackLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corp_package_tbl`
--
ALTER TABLE `corp_package_tbl`
  MODIFY `corpPack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100020;
--
-- AUTO_INCREMENT for table `corp_packserv_log_tbl`
--
ALTER TABLE `corp_packserv_log_tbl`
  MODIFY `corpPackLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_log_tbl`
--
ALTER TABLE `employee_log_tbl`
  MODIFY `empLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_role_tbl`
--
ALTER TABLE `employee_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100016;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100023;
--
-- AUTO_INCREMENT for table `employee_useraccess_tbl`
--
ALTER TABLE `employee_useraccess_tbl`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100016;
--
-- AUTO_INCREMENT for table `emprebate_log_tbl`
--
ALTER TABLE `emprebate_log_tbl`
  MODIFY `empRebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emp_rebate_tbl`
--
ALTER TABLE `emp_rebate_tbl`
  MODIFY `empReb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100010;
--
-- AUTO_INCREMENT for table `laboratory_tbl`
--
ALTER TABLE `laboratory_tbl`
  MODIFY `lab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100021;
--
-- AUTO_INCREMENT for table `medtech_rank`
--
ALTER TABLE `medtech_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `package_log_tbl`
--
ALTER TABLE `package_log_tbl`
  MODIFY `packageLog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_tbl`
--
ALTER TABLE `package_tbl`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100009;
--
-- AUTO_INCREMENT for table `patient_log_tbl`
--
ALTER TABLE `patient_log_tbl`
  MODIFY `patientLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100038;
--
-- AUTO_INCREMENT for table `patient_type_tbl`
--
ALTER TABLE `patient_type_tbl`
  MODIFY `ptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rebate_tbl`
--
ALTER TABLE `rebate_tbl`
  MODIFY `rebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100007;
--
-- AUTO_INCREMENT for table `servgroup_log_tbl`
--
ALTER TABLE `servgroup_log_tbl`
  MODIFY `servgroupLog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_group_tbl`
--
ALTER TABLE `service_group_tbl`
  MODIFY `servgroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100027;
--
-- AUTO_INCREMENT for table `service_log_tbl`
--
ALTER TABLE `service_log_tbl`
  MODIFY `serviceLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100164;
--
-- AUTO_INCREMENT for table `service_type_log_tbl`
--
ALTER TABLE `service_type_log_tbl`
  MODIFY `servicetypeLog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_type_tbl`
--
ALTER TABLE `service_type_tbl`
  MODIFY `service_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100018;
--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `transcorp_payment_tbl`
--
ALTER TABLE `transcorp_payment_tbl`
  MODIFY `corpPayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transcorp_tbl`
--
ALTER TABLE `transcorp_tbl`
  MODIFY `transCorp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transrebate_payment_tbl`
--
ALTER TABLE `transrebate_payment_tbl`
  MODIFY `transRebPay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transresult_tbl`
--
ALTER TABLE `transresult_tbl`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `trans_emprebate_tbl`
--
ALTER TABLE `trans_emprebate_tbl`
  MODIFY `trans_empRebate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trans_resultfiles_tbl`
--
ALTER TABLE `trans_resultfiles_tbl`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100036;
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
  ADD CONSTRAINT `corp_package_log_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`),
  ADD CONSTRAINT `corp_package_log_tbl_ibfk_2` FOREIGN KEY (`corpPack_id`) REFERENCES `corp_package_tbl` (`corpPack_id`);

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
-- Constraints for table `employee_log_tbl`
--
ALTER TABLE `employee_log_tbl`
  ADD CONSTRAINT `employee_log_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_tbl` (`emp_id`),
  ADD CONSTRAINT `employee_log_tbl_ibfk_2` FOREIGN KEY (`emp_medtech_rank_id`) REFERENCES `medtech_rank` (`rank_id`);

--
-- Constraints for table `employee_role_tbl`
--
ALTER TABLE `employee_role_tbl`
  ADD CONSTRAINT `employee_role_tbl_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `laboratory_tbl` (`lab_id`);

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
-- Constraints for table `rolefields_tbl`
--
ALTER TABLE `rolefields_tbl`
  ADD CONSTRAINT `rolefields_tbl_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `employee_role_tbl` (`role_id`);

--
-- Constraints for table `servgroup_log_tbl`
--
ALTER TABLE `servgroup_log_tbl`
  ADD CONSTRAINT `servgroup_log_tbl_ibfk_1` FOREIGN KEY (`servgroup_id`) REFERENCES `service_group_tbl` (`servgroup_id`);

--
-- Constraints for table `service_group_tbl`
--
ALTER TABLE `service_group_tbl`
  ADD CONSTRAINT `service_group_tbl_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `laboratory_tbl` (`lab_id`);

--
-- Constraints for table `service_log_tbl`
--
ALTER TABLE `service_log_tbl`
  ADD CONSTRAINT `service_log_tbl_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service_tbl` (`service_id`);

--
-- Constraints for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`service_group_id`) REFERENCES `service_group_tbl` (`servgroup_id`),
  ADD CONSTRAINT `service_tbl_ibfk_2` FOREIGN KEY (`service_type_id`) REFERENCES `service_type_tbl` (`service_type_id`);

--
-- Constraints for table `service_type_log_tbl`
--
ALTER TABLE `service_type_log_tbl`
  ADD CONSTRAINT `service_type_log_tbl_ibfk_1` FOREIGN KEY (`service_type_id`) REFERENCES `service_type_tbl` (`service_type_id`);

--
-- Constraints for table `service_type_tbl`
--
ALTER TABLE `service_type_tbl`
  ADD CONSTRAINT `service_type_tbl_ibfk_1` FOREIGN KEY (`service_type_group_id`) REFERENCES `service_group_tbl` (`servgroup_id`);

--
-- Constraints for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD CONSTRAINT `transaction_tbl_ibfk_1` FOREIGN KEY (`trans_patient_id`) REFERENCES `patient_tbl` (`patient_id`),
  ADD CONSTRAINT `transaction_tbl_ibfk_2` FOREIGN KEY (`issuedBy_emp_id`) REFERENCES `employee_tbl` (`emp_id`);

--
-- Constraints for table `transcorp_payment_tbl`
--
ALTER TABLE `transcorp_payment_tbl`
  ADD CONSTRAINT `transcorp_payment_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`);

--
-- Constraints for table `transcorp_tbl`
--
ALTER TABLE `transcorp_tbl`
  ADD CONSTRAINT `transcorp_tbl_ibfk_1` FOREIGN KEY (`corp_id`) REFERENCES `corporate_accounts_tbl` (`corp_id`),
  ADD CONSTRAINT `transcorp_tbl_ibfk_2` FOREIGN KEY (`corpPack_id`) REFERENCES `corp_package_tbl` (`corpPack_id`),
  ADD CONSTRAINT `transcorp_tbl_ibfk_3` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`);

--
-- Constraints for table `transrebate_payment_tbl`
--
ALTER TABLE `transrebate_payment_tbl`
  ADD CONSTRAINT `transrebate_payment_tbl_ibfk_1` FOREIGN KEY (`transRebPay_emp_id`) REFERENCES `employee_tbl` (`emp_id`);

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
  ADD CONSTRAINT `trans_emprebate_tbl_ibfk_2` FOREIGN KEY (`rebate_id`) REFERENCES `rebate_tbl` (`rebate_id`),
  ADD CONSTRAINT `trans_emprebate_tbl_ibfk_3` FOREIGN KEY (`trans_id`) REFERENCES `transaction_tbl` (`trans_id`);

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
