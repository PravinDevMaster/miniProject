-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2023 at 03:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE  `attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `student_id` int NOT NULL,
  `sem_num` int NOT NULL,
  `p1` int NOT NULL,
  `p2` int NOT NULL,
  `p3` int NOT NULL,
  `p4` int NOT NULL,
  `p5` int NOT NULL,
  `p1_staff_id` int NOT NULL,
  `p2_staff_id` int NOT NULL,
  `p3_staff_id` int NOT NULL,
  `p4_staff_id` int NOT NULL,
  `p5_staff_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `class_id`, `student_id`, `sem_num`, `p1`, `p2`, `p3`, `p4`, `p5`, `p1_staff_id`, `p2_staff_id`, `p3_staff_id`, `p4_staff_id`, `p5_staff_id`, `date`) VALUES
(1, 4, 36, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(2, 4, 37, 6, 0, 0, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(3, 4, 38, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(4, 4, 39, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(5, 4, 40, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(6, 4, 41, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(7, 4, 42, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(8, 4, 43, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(9, 4, 44, 6, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(10, 4, 45, 6, 0, 1, 1, 1, 1, 2, 2, 2, 2, 2, '2023-04-17'),
(11, 1, 6, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(12, 1, 7, 1, 0, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(13, 1, 8, 1, 0, 0, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(14, 1, 9, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(15, 1, 10, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(16, 1, 11, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(17, 1, 12, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(18, 1, 13, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(19, 1, 14, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(20, 1, 15, 1, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(21, 2, 16, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(22, 2, 17, 4, 0, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(23, 2, 18, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(24, 2, 19, 4, 0, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(25, 2, 20, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(26, 2, 21, 4, 0, 0, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(27, 2, 22, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(28, 2, 23, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(29, 2, 24, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17'),
(30, 2, 25, 4, 1, 1, 1, 1, 1, 3, 3, 3, 3, 3, '2023-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE  `class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `hod_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `create_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_by` int DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `section`, `department`, `year`, `hod_id`, `staff_id`, `create_by`, `created_date`, `modify_by`, `modify_date`) VALUES
(1, 'BSC', 'A', 'Computer Science', '2023 to 2026', 5, 2, 1, '2023-04-17 19:09:40', NULL, NULL),
(2, 'BCA', 'A', 'Computer Science', '2023 to 2026', 6, 3, 1, '2023-04-17 19:10:42', NULL, NULL),
(3, 'B.COM', 'B', 'Computer Science', '2023 to 2026', 7, 4, 1, '2023-04-17 19:11:18', NULL, NULL),
(4, 'BSC', 'B', 'Computer Science', '2023 to 2026', 6, 2, 1, '2023-04-17 20:24:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE  `semester` (
  `semester_id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `sem1_start` varchar(30) NOT NULL,
  `sem1_end` varchar(30) NOT NULL,
  `sem2_start` varchar(30) NOT NULL,
  `sem2_end` varchar(30) NOT NULL,
  `sem3_start` varchar(30) NOT NULL,
  `sem3_end` varchar(30) NOT NULL,
  `sem4_start` varchar(30) NOT NULL,
  `sem4_end` varchar(30) NOT NULL,
  `sem5_start` varchar(30) NOT NULL,
  `sem5_end` varchar(30) NOT NULL,
  `sem6_start` varchar(30) NOT NULL,
  `sem6_end` varchar(30) NOT NULL,
  `sem_num` int NOT NULL,
  `active` int NOT NULL,
  `highest_sem` int NOT NULL,
  `sem_complete` int NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` int NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_by` int NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `class_id`, `sem1_start`, `sem1_end`, `sem2_start`, `sem2_end`, `sem3_start`, `sem3_end`, `sem4_start`, `sem4_end`, `sem5_start`, `sem5_end`, `sem6_start`, `sem6_end`, `sem_num`, `active`, `highest_sem`, `sem_complete`, `create_date`, `create_by`, `modify_date`, `modify_by`) VALUES
(1, 1, '2023-04-17 20:20:08', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 1, 1, 6, 0, '2023-04-17 19:09:40', 1, '2023-04-17 20:20:08', 1),
(2, 2, '2023-04-17 20:20:24', '2023-04-17 20:20:28', '2023-04-17 20:20:31', '2023-04-17 20:20:35', '2023-04-17 20:20:38', '2023-04-17 20:20:41', '2023-04-17 20:20:44', '-', '-', '-', '-', '-', 4, 1, 6, 0, '2023-04-17 19:10:42', 1, '2023-04-17 20:20:44', 1),
(3, 3, '2023-04-17 20:20:59', '2023-04-17 20:21:03', '2023-04-17 20:21:06', '2023-04-17 20:21:08', '2023-04-17 20:21:11', '2023-04-17 20:21:15', '2023-04-17 20:21:19', '2023-04-17 20:21:22', '2023-04-17 20:21:26', '-', '-', '-', 5, 1, 6, 0, '2023-04-17 19:11:18', 1, '2023-04-17 20:21:26', 1),
(4, 4, '2023-04-17 20:26:32', '2023-04-17 20:26:36', '2023-04-17 20:26:39', '2023-04-17 20:26:41', '2023-04-17 20:26:44', '2023-04-17 20:26:47', '2023-04-17 20:26:50', '2023-04-17 20:26:53', '2023-04-17 20:26:57', '2023-04-17 20:26:59', '2023-04-17 20:27:03', '2023-04-17 20:31:58', 6, 0, 6, 1, '2023-04-17 20:24:13', 1, '2023-04-17 20:31:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_old`
--

CREATE TABLE  `semester_old` (
  `semester_id` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(20) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `class_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modify_by` int NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `unique_staff_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `role_id` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_by` int NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`unique_staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`unique_staff_id`, `first_name`, `last_name`, `email`, `mobile`, `staff_id`, `role_id`, `password`, `create_by`, `created_date`, `modify_by`, `modify_date`) VALUES
(1, 'Admin', 'A', 'admin@gmail.com', '8965347805', 'ADID01', 1, 'MxzRekDLfcBLkjs2KmpZgA==', 0, '2023-04-17 13:20:01', 0, NULL),
(2, 'Ram', 'K', 'ram123@gmail.com', '9067843781', 'ST01', 3, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 18:57:47', 0, NULL),
(3, 'Ramesh', 'M', 'ramesh123@gmail.com', '9051308426', 'ST02', 3, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 18:59:04', 0, NULL),
(4, 'Vijay', 'J', 'vijay123@gmail.com', '9053479210', 'ST03', 3, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 19:01:29', 0, NULL),
(5, 'Mukesh', 'T', 'mukesh123@gmail.com', '8701379328', 'ST04', 2, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 19:02:51', 0, NULL),
(6, 'Akash', 'K', 'akash123@gmail.com', '8742071568', 'ST05', 2, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 19:04:04', 0, NULL),
(7, 'Rajesh', 'R', 'rajesh123@gmail.com', '9025781406', 'ST06', 2, '83JL3GkvFDz/+C/iHHNV2Q==', 1, '2023-04-17 19:05:27', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE  `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `initial` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `register_no` int NOT NULL,
  `mobile_no` int NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `guardian_mobile_no` int NOT NULL,
  `adhaar_card_no` int NOT NULL,
  `create_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_by` int NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `class_id`, `name`, `initial`, `gender`, `dob`, `register_no`, `mobile_no`, `father_name`, `mother_name`, `guardian_mobile_no`, `adhaar_card_no`, `create_by`, `created_date`, `modify_by`, `modify_date`) VALUES
(6, 1, 'KARTHI', 'S', 'Male', '2003-06-16', 222000470, 2147483647, 'SIVA', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(7, 1, 'LOKESH', 'V', 'Male', '2002-06-11', 222000444, 2147483647, 'VEL', 'SUBA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(8, 1, 'SURESH', 'K', 'Male', '2002-07-12', 222000468, 2147483647, 'KRISHNAN', 'LATHA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(9, 1, 'PRIYA', 'S', 'Female', '2003-11-21', 222000480, 2147483647, 'SAM', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(10, 1, 'PAVITHRA', 'K', 'Female', '2002-12-11', 222000451, 2147483647, 'KARTHI', 'PRIYANKA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(11, 1, 'CHARU', 'S', 'Female', '2002-06-07', 222000461, 2147483647, 'SHIVAN', 'PARVATHI', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 1, '2023-04-17 20:19:38'),
(12, 1, 'SAMANTHA', 'L', 'Female', '2002-08-19', 222000463, 2147483647, 'LOKESH', 'PRIYA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(13, 1, 'SHIVAN', 'K', 'Male', '2003-06-11', 222000476, 2147483647, 'KAMAL', 'TRISHA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(14, 1, 'SAM', 'S', 'Male', '2002-04-16', 222000460, 2147483647, 'SURESH', 'CHARU', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(15, 1, 'PARVATHI', 'K', 'Female', '2002-01-13', 222000449, 2147483647, 'KARTHI', 'PAVITHRA', 2147483647, 2147483647, 1, '2023-04-17 20:17:21', 0, NULL),
(16, 2, 'KARTHI', 'S', 'Male', '2003-06-16', 222000470, 2147483647, 'SIVA', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(17, 2, 'LOKESH', 'V', 'Male', '2002-06-11', 222000444, 2147483647, 'VEL', 'SUBA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(18, 2, 'SURESH', 'K', 'Male', '2002-07-12', 222000468, 2147483647, 'KRISHNAN', 'LATHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(19, 2, 'PRIYA', 'S', 'Female', '2003-11-21', 222000480, 2147483647, 'SAM', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(20, 2, 'PAVITHRA', 'K', 'Female', '2002-12-11', 222000451, 2147483647, 'KARTHI', 'PRIYANKA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(21, 2, 'CHARU', 'S', 'Female', '2002-06-07', 222000461, 2147483647, 'SHIVAN', 'PARVATHI', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(22, 2, 'SAMANTHA', 'L', 'Female', '2002-08-19', 222000463, 2147483647, 'LOKESH', 'PRIYA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(23, 2, 'SHIVAN', 'K', 'Male', '2003-06-11', 222000476, 2147483647, 'KAMAL', 'TRISHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(24, 2, 'SAM', 'S', 'Male', '2002-04-16', 222000460, 2147483647, 'SURESH', 'CHARU', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(25, 2, 'PARVATHI', 'K', 'Female', '2002-01-13', 222000449, 2147483647, 'KARTHI', 'PAVITHRA', 2147483647, 2147483647, 1, '2023-04-17 20:22:11', 0, NULL),
(26, 3, 'KARTHI', 'S', 'Male', '2003-06-16', 222000470, 2147483647, 'SIVA', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(27, 3, 'LOKESH', 'V', 'Male', '2002-06-11', 222000444, 2147483647, 'VEL', 'SUBA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(28, 3, 'SURESH', 'K', 'Male', '2002-07-12', 222000468, 2147483647, 'KRISHNAN', 'LATHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(29, 3, 'PRIYA', 'S', 'Female', '2003-11-21', 222000480, 2147483647, 'SAM', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(30, 3, 'PAVITHRA', 'K', 'Female', '2002-12-11', 222000451, 2147483647, 'KARTHI', 'PRIYANKA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(31, 3, 'CHARU', 'S', 'Female', '2002-06-07', 222000461, 2147483647, 'SHIVAN', 'PARVATHI', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(32, 3, 'SAMANTHA', 'L', 'Female', '2002-08-19', 222000463, 2147483647, 'LOKESH', 'PRIYA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(33, 3, 'SHIVAN', 'K', 'Male', '2003-06-11', 222000476, 2147483647, 'KAMAL', 'TRISHA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(34, 3, 'SAM', 'S', 'Male', '2002-04-16', 222000460, 2147483647, 'SURESH', 'CHARU', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(35, 3, 'PARVATHI', 'K', 'Female', '2002-01-13', 222000449, 2147483647, 'KARTHI', 'PAVITHRA', 2147483647, 2147483647, 1, '2023-04-17 20:22:34', 0, NULL),
(36, 4, 'KARTHI', 'S', 'Male', '2003-06-16', 222000470, 2147483647, 'SIVA', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(37, 4, 'LOKESH', 'V', 'Male', '2002-06-11', 222000444, 2147483647, 'VEL', 'SUBA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(38, 4, 'SURESH', 'K', 'Male', '2002-07-12', 222000468, 2147483647, 'KRISHNAN', 'LATHA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(39, 4, 'PRIYA', 'S', 'Female', '2003-11-21', 222000480, 2147483647, 'SAM', 'SAMANTHA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(40, 4, 'PAVITHRA', 'K', 'Female', '2002-12-11', 222000451, 2147483647, 'KARTHI', 'PRIYANKA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(41, 4, 'CHARU', 'S', 'Female', '2002-06-07', 222000461, 2147483647, 'SHIVAN', 'PARVATHI', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(42, 4, 'SAMANTHA', 'L', 'Female', '2002-08-19', 222000463, 2147483647, 'LOKESH', 'PRIYA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(43, 4, 'SHIVAN', 'K', 'Male', '2003-06-11', 222000476, 2147483647, 'KAMAL', 'TRISHA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(44, 4, 'SAM', 'S', 'Male', '2002-04-16', 222000460, 2147483647, 'SURESH', 'CHARU', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL),
(45, 4, 'PARVATHI', 'K', 'Female', '2002-01-13', 222000449, 2147483647, 'KARTHI', 'PAVITHRA', 2147483647, 2147483647, 1, '2023-04-17 20:24:46', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `user_role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `user_role_name`) VALUES
(1, 1, 'Admin'),
(2, 2, 'H.O.D'),
(3, 3, 'Staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
