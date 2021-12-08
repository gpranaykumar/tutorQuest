-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 03:13 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BukTiTkr9E`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `mobile_req` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `classLink` longtext,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_req`
--

INSERT INTO `mobile_req` (`id`, `student_id`, `teacher_id`, `status`, `classLink`, `rating`) VALUES
(19, 5123462, 18, 'Approved', NULL, 3),
(20, 5123466, 18, 'Approved', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_data`
--

CREATE TABLE `organisation_data` (
  `id` int(11) NOT NULL,
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
  `reason` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_data`
--

INSERT INTO `organisation_data` (`id`, `name`, `email`, `uname`, `password`, `state`, `city`, `address`, `number`, `role`, `status`, `reason`) VALUES
(2, 'CMR College of Engineering and Technology', 'cmrcet@gmail.com', 'cmrcet', '1234', 'TS', 'HYD', 'Kandlakoya(v), Medchal Road Hyderabad, Telangana, India - 501401', '+919059265235', 'organisation', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_req`
--

CREATE TABLE `organisation_req` (
  `id` int(30) NOT NULL,
  `organisation_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(10) NOT NULL,
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
  `reason` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `name`, `uname`, `email`, `gender`, `password`, `board`, `grade`, `number`, `pnumber`, `state`, `city`, `aadhar_no`, `role`, `status`, `reason`) VALUES
(5, 'pranay', 'pranay', 'pranay@gmail.com', 1, '1234', 'ssc', '10', '+919059265235', '+919959680425', 'TS', 'HYD', '123412341234', 'student', 1, ''),
(5123466, 'student5', 'student5', 'student5@gmail.com', 0, '1234', 'ssc', '10', '+916281889644', '+919573660425', 'ap', 'west godavari', '880844257796', 'student', 1, NULL),
(5123464, 'student3', 'student3', 'student3@gmail.com', 0, '1234', 'ssc', '7', '+918790715911', '+919573660424', 'ts', 'hyd', '957481664023', 'student', 2, NULL),
(5123465, 'student4', 'student4', 'student4@gmail.com', 1, '1234', 'ssc', '9', '+919542801973', ' 918164245600', 'ts', 'hyd', '807851692484', 'student', 4, NULL),
(5123463, 'student2', 'student2', 'student2@gmail.com', 1, '1234', 'ssc', '9', ' +919542801973', '8124600781', 'ap', 'vizag', '807851692484', 'student', 4, NULL),
(5123462, 'student1', 'student1', 'student1@gmail.com', 1, '4321', 'ssc', '8', '+916281889644', '+918106250041', 'ts', 'khammam', '982880685883', 'student', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_data`
--

CREATE TABLE `teacher_data` (
  `id` int(11) NOT NULL,
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
  `reason` text,
  `rating` int(11) NOT NULL DEFAULT '0',
  `norating` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_data`
--

INSERT INTO `teacher_data` (`id`, `name`, `uname`, `email`, `gender`, `password`, `subject`, `experience`, `skills`, `price`, `priceOrg`, `number`, `aadhar_no`, `role`, `status`, `reason`, `rating`, `norating`) VALUES
(22, 'teacher5', 'teacher_5', 'teacher5@gmail.com', 1, '12345', 'Political Science', '5 years', 'Political Science, History', '150', '12000', '+917075096338', '123456123412', 'teacher', 2, NULL, 0, 0),
(21, 'teacher4', 'teacher_4', 'teacher4@gmail.com', 0, '12345', 'Geography', '1 year', 'Geography, History', '200', '15000', '+917032589425', '123456789123', 'teacher', 4, NULL, 0, 0),
(20, 'teacher3', 'teacher_3', 'teacher@gmail.com', 0, '12345', 'Operating Systems', '10 years', 'OS, CN', '50', '20000', '+911234567890', '101213145544', 'teacher', 4, NULL, 0, 0),
(19, 'teacher2', 'teacher_2', 'teacher2@gmail.com', 1, '12345', 'English', '5 years', 'English, Maths', '70', '7000', '+917032589426', '987654321076', 'teacher', 1, NULL, 0, 0),
(18, 'teacher1', 'teacher_1', 'teacher1@gmail.com', 1, '12345', 'Computer Networks', '3 years', 'Computer Science, Data Analysis', '50', '10000', '+917032589426', '123456789102', 'teacher', 1, NULL, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_req`
--
ALTER TABLE `mobile_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation_data`
--
ALTER TABLE `organisation_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation_req`
--
ALTER TABLE `organisation_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher_data`
--
ALTER TABLE `teacher_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobile_req`
--
ALTER TABLE `mobile_req`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `organisation_data`
--
ALTER TABLE `organisation_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organisation_req`
--
ALTER TABLE `organisation_req`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5123467;

--
-- AUTO_INCREMENT for table `teacher_data`
--
ALTER TABLE `teacher_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
