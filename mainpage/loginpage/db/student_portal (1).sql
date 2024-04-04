-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 01:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `aoa_attended` int(11) DEFAULT NULL,
  `aoa_total` int(11) DEFAULT NULL,
  `em3_attended` int(11) DEFAULT NULL,
  `em3_total` int(11) DEFAULT NULL,
  `pyp_attended` int(11) DEFAULT NULL,
  `pyp_total` int(11) DEFAULT NULL,
  `dbms_attended` int(11) DEFAULT NULL,
  `dbms_total` int(11) DEFAULT NULL,
  `os_attended` int(11) DEFAULT NULL,
  `os_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `roll_number`, `aoa_attended`, `aoa_total`, `em3_attended`, `em3_total`, `pyp_attended`, `pyp_total`, `dbms_attended`, `dbms_total`, `os_attended`, `os_total`) VALUES
(5, 10403, 10, 20, 15, 25, 18, 30, 22, 28, 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `compdivasem4teachers`
--

CREATE TABLE `compdivasem4teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compdivasem4teachers`
--

INSERT INTO `compdivasem4teachers` (`id`, `name`) VALUES
(1, 'Ankita'),
(2, 'Prasad');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll_number`, `dob`, `username`, `password`, `contact`, `email`, `address`, `course`, `image`, `division`, `semester`, `teacher`) VALUES
(26, 'mark', '20', '2024-03-05', 'mark', 'mark', '9999999999', 'mark@gmail.com', '123 main steet', 'Computer Engineering', 'download.jpeg', 'A', 2, 'sam'),
(28, 'saad', '10403', '2024-03-12', 'saad', 'saad', '9878987898', 'saad@gmail.com', '1234 main street', 'Computer Engineering', 'download.jpeg', 'A', 4, 'Ankita, prasad'),
(29, 'shubham', '1029', '2024-03-07', 'shubham', 'shubham', '9878987678', 'shubham@gmail.com', '123 main street', 'Computer Engineering', '0jqtsr59T9C2vSTDS5T5Uw.png', 'A', 4, 'Ankita, prasad'),
(30, 'ritik', '129', '2024-02-29', 'ritik', 'ritik', '7777777777', 'ritik@gmail.com', '123 main street', 'Computer Engineering', '0jqtsr59T9C2vSTDS5T5Uw.png', 'A', 4, 'Ankita, prasad');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `division` varchar(1) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `Name`, `eid`, `username`, `password`, `department`, `division`, `semester`, `subject`) VALUES
(2, 'Ankita', '2999', 'ankita', 'ankita', 'Computer Engineering', 'A', 4, 'AOA'),
(3, 'prasad', '002', 'prasad', 'prasad', 'Computer Engineering', 'A', 4, 'EM4'),
(4, 'sam', '2092', 'sam', 'sam', 'Computer Engineering', 'A', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utmarks`
--

CREATE TABLE `utmarks` (
  `id` int(11) NOT NULL,
  `student_username` varchar(255) DEFAULT NULL,
  `ut1` varchar(255) DEFAULT NULL,
  `ut2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compdivasem4teachers`
--
ALTER TABLE `compdivasem4teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_teacher_name` (`Name`);

--
-- Indexes for table `utmarks`
--
ALTER TABLE `utmarks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compdivasem4teachers`
--
ALTER TABLE `compdivasem4teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utmarks`
--
ALTER TABLE `utmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
