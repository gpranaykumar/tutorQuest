-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 02:29 PM
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
-- Database: `mini_project_f`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `password`) VALUES
(1, 'gpk', '1234'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_req`
--

DROP TABLE IF EXISTS `mobile_req`;
CREATE TABLE IF NOT EXISTS `mobile_req` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `student_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `classLink` longtext DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_req`
--

INSERT INTO `mobile_req` (`id`, `student_id`, `teacher_id`, `status`, `classLink`, `rating`) VALUES
(13, 7, 3, 'Requested', '', 0),
(10, 5, 4, 'Approved', '', 0),
(4, 5, 5, 'Rejected', '', 0),
(12, 5, 3, 'Rejected', '', 0),
(14, 8, 3, 'Approved', '', 0),
(15, 5123459, 10, 'Approved', 'http://joinchat.ml/', 0),
(16, 5, 10, 'Rejected', '', 0),
(17, 5123459, 15, 'Approved', 'https://us04web.zoom.us/j/76644936082?pwd=Y1pWNEl0a3pTOTcxUk42UmNrQW5UZz09', 0),
(18, 5, 17, 'Approved', 'https://us04web.zoom.us/j/76644936082?pwd=Y1pWNEl0a3pTOTcxUk42UmNrQW5UZz09', 5);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_data`
--

DROP TABLE IF EXISTS `organisation_data`;
CREATE TABLE IF NOT EXISTS `organisation_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `number` varchar(20) NOT NULL,
  `role` text NOT NULL,
  `status` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_data`
--

INSERT INTO `organisation_data` (`id`, `name`, `email`, `uname`, `password`, `state`, `city`, `address`, `number`, `role`, `status`, `reason`) VALUES
(2, 'CMR College of Engineering and Technology', 'cmrcet@gmail.com', 'cmrcet', '1234', 'TS', 'HYD', 'Kandlakoya(v), Medchal Road Hyderabad, Telangana, India - 501401', '+919059265235', 'organisation', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_req`
--

DROP TABLE IF EXISTS `organisation_req`;
CREATE TABLE IF NOT EXISTS `organisation_req` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_req`
--

INSERT INTO `organisation_req` (`id`, `organisation_id`, `teacher_id`, `status`) VALUES
(1, 2, 5, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

DROP TABLE IF EXISTS `student_data`;
CREATE TABLE IF NOT EXISTS `student_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(30) NOT NULL,
  `board` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `pnumber` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `aadhar_no` varchar(12) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5123462 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `name`, `uname`, `email`, `gender`, `password`, `board`, `grade`, `number`, `pnumber`, `state`, `city`, `aadhar_no`, `role`, `status`, `reason`) VALUES
(5, 'pranay', 'pranay', 'pranay@gmail.com', 1, '1234', 'ssc', '10', '+919059265235', '+919959680425', 'TS', 'HYD', '123412341234', 'student', 1, ''),
(7, 'xyz', 'xyz123', 'xyz@gmail.com', 1, '1234', 'cbsc', '10', '+919059265235', '+919900900990', 'AP', '', '0', 'student', 0, ''),
(8, 'ghk', 'ghk', 'ghk@gmail.com', 1, '1234', 'ssc', '9', '+91905926525', '+919876543211', 'TS', 'HYD', '0', 'student', 2, ''),
(5123457, 'pranay1', 'pranay1', 'pranay1@gmail.com', 1, '1234', 'ssc', '10', ' 91919059265235', ' 919293110778', 'ts', 'hyd', '123456789123', 'student', 1, NULL),
(5123459, 'pranay2', 'pranay2', 'pranay2@gmail.com', 1, '1234', 'ssc', '10', '+919059265235', '+919059235235', 'ts', 'hyd', '123412341234', 'student', 0, NULL),
(5123460, 'student1', 'student1', 'student1@gmail.co', 1, '1234', 'ssc', '10', '+911234512345', '+911234512345', 'TS', 'HYD', '123412341234', 'student', 2, NULL),
(5123461, 'student2', 'student2', 'student2@gmail.com', 1, '1234', 'ssc', '10', '+919059265235', '+919293110778', 'ts', 'hyd', '123412341234', 'student', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_data`
--

DROP TABLE IF EXISTS `teacher_data`;
CREATE TABLE IF NOT EXISTS `teacher_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(30) NOT NULL,
  `subject` text NOT NULL,
  `experience` text NOT NULL,
  `skills` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `priceOrg` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `aadhar_no` varchar(12) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `norating` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_data`
--

INSERT INTO `teacher_data` (`id`, `name`, `uname`, `email`, `gender`, `password`, `subject`, `experience`, `skills`, `price`, `priceOrg`, `number`, `aadhar_no`, `role`, `status`, `reason`, `rating`, `norating`) VALUES
(17, 'teacher3', 'teacher3', 'teacher3@gmail.com', 1, '1234', 'OS', '1year', 'OS', '100', '20000', '+919959680425', '123412341234', 'teacher', 1, NULL, 5, 1),
(5, 'teacher2', 'teacher2', 'Teacher2@gmail.com', 1, '1234', 'Software Engineering', '1 year', '', '1000rs', '', '+919959680425', '0', 'teacher', 0, '', 0, 0),
(10, 'teacher1', 'teacher1', 'teacher1@gmail.com', 1, '1234', 'DBMS', '1 Year', '', '1200rs', '23000', '+911234567890', '0', 'teacher', 1, '', 0, 0),
(11, 'teacher0', 'teacher0', 'teacher0@gmail.com', 0, '1234', 'DS', '1YEar', 'C,CPP', '1000', '', ' 919876543210', '123412341234', 'teacher', 2, ' ', 0, 0),
(15, 'teacher5', 'teacher5', 'teacher5@gmail.com', 1, '1234', 'SD', '1 year', 'SD', '1000', '', '+911234567890', '123412341234', 'teacher', 1, ' ', 0, 0),
(16, 'teacher4', 'teacher4', 'teacher4@gmail.com', 1, '1234', 'OS', '1year', 'OS', '100', '20000', '+919959680425', '123412341234', 'teacher', 4, NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
