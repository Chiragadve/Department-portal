-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `aoa`
--

CREATE TABLE `aoa` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `attended` int(255) DEFAULT NULL,
  `total_conducted` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aoa`
--

INSERT INTO `aoa` (`id`, `roll_number`, `attended`, `total_conducted`) VALUES
(1, '10398', 3, 23),
(2, '10403', 4, 23),
(3, '10400', 10, 23),
(4, '10456', 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `aoa_mse_marks`
--

CREATE TABLE `aoa_mse_marks` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `total_marks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aoa_mse_marks`
--

INSERT INTO `aoa_mse_marks` (`id`, `roll_number`, `marks`, `total_marks`) VALUES
(1, '10398', 70, 80),
(2, '10403', 30, 40),
(3, '10400', 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
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
(6, '10398', 3, 23, 20, 23, 40, 40, 10, 10, 3, 3),
(8, '10403', 4, 23, 2, 13, NULL, NULL, NULL, NULL, 2, 3),
(9, '10400', 10, 23, 3, 13, NULL, NULL, NULL, NULL, 1, 3),
(10, '10456', 7, 10, 0, 3, NULL, NULL, NULL, NULL, 1, 3);

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
-- Table structure for table `dbms`
--

CREATE TABLE `dbms` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `attended` int(11) DEFAULT NULL,
  `total_conducted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbms`
--

INSERT INTO `dbms` (`id`, `roll_number`, `attended`, `total_conducted`) VALUES
(1, '10398', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dbms_mse_marks`
--

CREATE TABLE `dbms_mse_marks` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `total_marks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `em3`
--

CREATE TABLE `em3` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `attended` int(11) DEFAULT NULL,
  `total_conducted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `em3`
--

INSERT INTO `em3` (`id`, `roll_number`, `attended`, `total_conducted`) VALUES
(1, '10398', 20, 23),
(2, '10403', 2, 13),
(3, '10400', 3, 13),
(4, '10456', 0, 3),
(5, '10399', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `em3_mse_marks`
--

CREATE TABLE `em3_mse_marks` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `total_marks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `em3_mse_marks`
--

INSERT INTO `em3_mse_marks` (`id`, `roll_number`, `marks`, `total_marks`) VALUES
(1, '10398', 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `mse_marks_add`
--

CREATE TABLE `mse_marks_add` (
  `id` int(255) NOT NULL,
  `roll_number` varchar(50) NOT NULL,
  `aoa_marks` int(255) DEFAULT NULL,
  `aoa_total` int(255) DEFAULT NULL,
  `em3_marks` int(255) DEFAULT NULL,
  `em3_total` int(255) DEFAULT NULL,
  `pyp_marks` int(255) DEFAULT NULL,
  `pyp_total` int(255) DEFAULT NULL,
  `dbms_marks` int(255) DEFAULT NULL,
  `dbms_total` int(255) DEFAULT NULL,
  `os_marks` int(255) DEFAULT NULL,
  `os_total` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mse_marks_add`
--

INSERT INTO `mse_marks_add` (`id`, `roll_number`, `aoa_marks`, `aoa_total`, `em3_marks`, `em3_total`, `pyp_marks`, `pyp_total`, `dbms_marks`, `dbms_total`, `os_marks`, `os_total`) VALUES
(1, '10398', 70, 80, 80, 80, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `attended` int(11) DEFAULT NULL,
  `total_conducted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `roll_number`, `attended`, `total_conducted`) VALUES
(1, '10398', 3, 3),
(2, '10403', 2, 3),
(3, '10400', 1, 3),
(4, '10456', 1, 3),
(5, '10399', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `os_mse_marks`
--

CREATE TABLE `os_mse_marks` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `total_marks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pyp`
--

CREATE TABLE `pyp` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `attended` int(11) DEFAULT NULL,
  `total_conducted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pyp`
--

INSERT INTO `pyp` (`id`, `roll_number`, `attended`, `total_conducted`) VALUES
(1, '10398', 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pyp_mse_marks`
--

CREATE TABLE `pyp_mse_marks` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `total_marks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(31, 'Chirag', '10398', '2024-04-17', 'chirag', 'chirag', '8883838388', 'chirag@gmail.com', '123 main street', 'Computer Engineering', 'profilepicture.png', 'A', 4, 'ankita, prasad, prajakta, prachi, sujata'),
(33, 'saad', '10403', '2024-04-09', 'saad', 'saad', '8888888888', 'saad@gmail.com', '123 main street', 'Computer Engineering', '_AlAAaAKQdKE0XyEObbRYQ - Copy.png', 'A', 4, 'ankita, prasad, prajakta, prachi, sujata'),
(34, 'pratipal', '10400', '2024-04-03', 'pratipal', 'pratipal', '8888888888', 'pratipal@gmail.com', '123 main street', 'Computer Engineering', '0jqtsr59T9C2vSTDS5T5Uw.png', 'A', 4, 'ankita, prasad, prajakta, prachi, sujata'),
(35, 'sam', '10456', '2024-04-03', 'sam', 'sam', '8888888888', 'sam@gmail.com', '123 main street', 'Computer Engineering', '0jqtsr59T9C2vSTDS5T5Uw.png', 'A', 4, 'ankita, prasad, prajakta, prachi, sujata'),
(36, 'vatsal', '10399', '2024-04-24', 'vatsal', 'vatsal', '9999999999', 'vatsal@gmail.com', '123 main street', 'Computer Engineering', '0jqtsr59T9C2vSTDS5T5Uw.png', 'A', 4, 'ankita, prasad, prajakta, prachi, sujata');

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
(5, 'ankita', '3399', 'ankita', 'ankita', 'Computer Engineering', 'A', 4, 'AOA'),
(6, 'prasad', '982', 'prasad', 'prasad', 'Computer Engineering', 'A', 4, 'EM3'),
(7, 'prajakta', '223', 'prajakta', 'prajakta', 'Computer Engineering', 'A', 4, 'PYP'),
(8, 'prachi', '838', 'prachi', 'prachi', 'Computer Engineering', 'A', 4, 'OS'),
(9, 'sujata', '383', 'sujata', 'sujata', 'Computer Engineering', 'A', 4, 'DBMS');

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
-- Indexes for table `aoa`
--
ALTER TABLE `aoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aoa_mse_marks`
--
ALTER TABLE `aoa_mse_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_roll_number` (`roll_number`);

--
-- Indexes for table `compdivasem4teachers`
--
ALTER TABLE `compdivasem4teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbms`
--
ALTER TABLE `dbms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbms_mse_marks`
--
ALTER TABLE `dbms_mse_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em3`
--
ALTER TABLE `em3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em3_mse_marks`
--
ALTER TABLE `em3_mse_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mse_marks_add`
--
ALTER TABLE `mse_marks_add`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_roll_number` (`roll_number`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os_mse_marks`
--
ALTER TABLE `os_mse_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pyp`
--
ALTER TABLE `pyp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pyp_mse_marks`
--
ALTER TABLE `pyp_mse_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_roll_number` (`roll_number`);

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
-- AUTO_INCREMENT for table `aoa`
--
ALTER TABLE `aoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aoa_mse_marks`
--
ALTER TABLE `aoa_mse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `compdivasem4teachers`
--
ALTER TABLE `compdivasem4teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dbms`
--
ALTER TABLE `dbms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbms_mse_marks`
--
ALTER TABLE `dbms_mse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `em3`
--
ALTER TABLE `em3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `em3_mse_marks`
--
ALTER TABLE `em3_mse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mse_marks_add`
--
ALTER TABLE `mse_marks_add`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `os_mse_marks`
--
ALTER TABLE `os_mse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pyp`
--
ALTER TABLE `pyp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pyp_mse_marks`
--
ALTER TABLE `pyp_mse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utmarks`
--
ALTER TABLE `utmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_student` FOREIGN KEY (`roll_number`) REFERENCES `student` (`roll_number`);

--
-- Constraints for table `mse_marks_add`
--
ALTER TABLE `mse_marks_add`
  ADD CONSTRAINT `fk_roll_number` FOREIGN KEY (`roll_number`) REFERENCES `student` (`roll_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
