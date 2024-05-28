-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 03:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ords_new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_decription` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_decription`, `date_created`) VALUES
(1, 'Bachelor of Agricultural Technology', 'Bachelor of Agricultural Technology', '2021-11-16 01:59:38'),
(2, 'Bachelor of Science in Agriculture', 'Bachelor of Science in Agriculture', '2021-11-16 01:59:38'),
(11, 'Bachelor of Secondary Education', 'Bachelor of Secondary Education', '2021-11-16 16:14:55'),
(12, 'Bachelor of Science in Computer Science', 'Bachelor of Science in Computer Science', '2021-11-19 02:30:51'),
(13, 'Bachelor of Elementary Education', 'Bachelor of Elementary Education', '2021-11-19 02:35:43'),
(14, 'Bachelor of Science in Hospitality Management', 'Bachelor of Science in Hospitality Management', '2022-06-09 10:25:57'),
(15, 'Bachelor of Science in Information Technology', 'Bachelor of Science in Information Technology', '2024-05-01 13:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_decription` varchar(255) NOT NULL,
  `image_size` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documentrequest`
--

CREATE TABLE `tbl_documentrequest` (
  `request_id` int(11) NOT NULL,
  `control_no` varchar(255) NOT NULL,
  `studentID_no` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `no_ofcopies` varchar(255) NOT NULL,
  `date_request` varchar(255) NOT NULL,
  `date_releasing` varchar(255) NOT NULL,
  `processing_officer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `notif` int(11) NOT NULL,
  `mode_request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_documentrequest`
--

INSERT INTO `tbl_documentrequest` (`request_id`, `control_no`, `studentID_no`, `document_name`, `no_ofcopies`, `date_request`, `date_releasing`, `processing_officer`, `status`, `remarks`, `student_id`, `notif`, `mode_request`) VALUES
(36, 'CTRL-333014', '10', 'Transcript of Records', '1', '2024-05-23', '2014-05-27', 'Admin admin', 'Releasing', '', 14, 1, 'Pick Up');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `control_no` text NOT NULL,
  `studentID_no` text NOT NULL,
  `document_name` text NOT NULL,
  `date_releasing` text NOT NULL,
  `ref_number` text NOT NULL,
  `total_amount` text NOT NULL,
  `amount_paid` text NOT NULL,
  `date_ofpayment` text NOT NULL,
  `proof_ofpayment` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `control_no`, `studentID_no`, `document_name`, `date_releasing`, `ref_number`, `total_amount`, `amount_paid`, `date_ofpayment`, `proof_ofpayment`, `student_id`, `status`) VALUES
(2, 'CTRL-0335', 'STDNT-23983', 'TOR', 'Nov 26, 2021', 'hbq0KQ8DlB', '3000', '5000', '2021-11-23', 'GCASH', 2, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `studentID_no` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `date_ofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `studentID_no`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `date_ofbirth`, `gender`, `complete_address`, `email_address`, `mobile_number`, `username`, `password`, `account_status`, `date_created`) VALUES
(7, '18-00182', 'Nikki', 'N/a', 'Fababier', 'Bachelor of Science in Computer Science', '4th Year', '2000-01-13', 'Male', 'SMZ', 'asdf@gmail.com', '09111111111', 'user', 'user', 'Active', '2022-06-09'),
(9, '18-11123', 'Altheaaa', 'Wala', 'Fabrigas', 'Bachelor of Elementary Education', '3rd Year', '1111-11-11', 'Female', 'SMZ', 'althea@gmail.com', '09123546789', 'user1', 'user1', 'Active', '2022-06-09'),
(12, '18-00102', 'Mc Vincent', 'Riberal', 'Almandares', 'Bachelor of Science in Computer Science', '4th Year', '1222-12-22', 'Male', 'asdfas', 'mcmc@gmail.com', '09123546789', 'user3', 'user3', 'Active', '2022-06-09'),
(14, '10', 'shane', 'caldeo', 'yape', 'Bachelor of Science in Computer Science', '2nd Year', '2002-12-05', 'Male', 'lumbia district pagadian city', 'shaneeduard5@gmail.com', '09494484475', 'shane', 'eduard', 'Active', '2024-05-01'),
(15, '1922421', 'christian', 'salud', 'gallentes', 'Bachelor of Science in Information Technology', '4th Year', '2002-05-06', 'Male', 'taga bulatok', 'dsasa@s', '0992292992', 'mongo', 'loid', 'Active', '2024-05-02'),
(19, '1922421', 'test', 'wala', 'hahha', 'Bachelor of Science in Information Technology', '3rd Year', '2002-12-05', 'Male', 'fsasdad', 'shaneeduard5@gmail.com', '0992292992', 'test', '123', 'Active', '2024-05-14'),
(20, '194549', 'shsda', 'dad', 'dadas', 'Bachelor of Agricultural Technology', '1st Year', '5555-05-05', 'Female', 'dsadada', 'dasdasdad', '2324242', 'eduard', 'shane', 'Active', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL,
  `studentID_no` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `studentID_no`, `first_name`, `middle_name`, `last_name`, `complete_address`, `email_address`, `mobile_number`, `username`, `password`, `account_status`, `date_created`) VALUES
(4, '194549', 'shane', 'caldeo', 'yape', 'Lumbia District Pagadian City', 'shaneeduard5@gmail.com', '0992292992', 'eduard', 'eduard', 'Active', '2024-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usermanagement`
--

CREATE TABLE `tbl_usermanagement` (
  `user_id` int(11) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `desgination` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_usermanagement`
--

INSERT INTO `tbl_usermanagement` (`user_id`, `complete_name`, `desgination`, `email_address`, `phone_number`, `username`, `password`, `status`, `role`) VALUES
(1, 'admin admin', 'programmer', 'admin@gmail.com', '09978978999', 'admin', 'admin', 'Active', 'Administrator'),
(2, 'junil toledo', 'programmer', 'nel@gmail.com', '09686787888', 'nel', 'nel123', 'Active', 'Administrator'),
(4, 'mc vincent almandares', 'admin', 'mc@gmail.com', '0987653224', 'admin', 'admin', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verification`
--

CREATE TABLE `tbl_verification` (
  `student_id` int(11) NOT NULL,
  `studentID_no` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `id_upload` varchar(255) NOT NULL,
  `account_status` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_verification`
--

INSERT INTO `tbl_verification` (`student_id`, `studentID_no`, `first_name`, `middle_name`, `last_name`, `complete_address`, `email_address`, `mobile_number`, `id_upload`, `account_status`, `date_created`) VALUES
(7, '194549', 'shane', 'caldeo', 'yape', 'Lumbia District Pagadian City', 'shaneeduard5@gmail.com', '0992292992', 'student_uploads/shaneme1.0.jpeg', 'Active', '2024-05-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `tbl_documentrequest`
--
ALTER TABLE `tbl_documentrequest`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_usermanagement`
--
ALTER TABLE `tbl_usermanagement`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_verification`
--
ALTER TABLE `tbl_verification`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_documentrequest`
--
ALTER TABLE `tbl_documentrequest`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_usermanagement`
--
ALTER TABLE `tbl_usermanagement`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_verification`
--
ALTER TABLE `tbl_verification`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
