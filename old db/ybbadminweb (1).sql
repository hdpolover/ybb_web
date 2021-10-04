-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 04:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ybbadminweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `image`, `is_active`) VALUES
(1, 'qoriahindah', 'dummy', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meal_attendance`
--

CREATE TABLE `meal_attendance` (
  `id_meal_attendance` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `summit_day` int(11) NOT NULL,
  `check_in_time` datetime NOT NULL,
  `meal_type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id_participant` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('registered','paid') NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `is_fully_funded` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participant_details`
--

CREATE TABLE `participant_details` (
  `id_participant_details` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `emergency_contact` varchar(15) NOT NULL,
  `contact_relation` varchar(20) NOT NULL,
  `wa_number` varchar(15) NOT NULL,
  `ig_account` varchar(100) NOT NULL,
  `tshirt_size` enum('s','m','l','xl','xxl') NOT NULL,
  `disease_history` text NOT NULL,
  `is_vegetarian` int(1) NOT NULL,
  `subtheme` varchar(20) NOT NULL,
  `essay` varchar(100) NOT NULL,
  `social_projects` varchar(100) NOT NULL,
  `talents` varchar(100) NOT NULL,
  `achievements` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `know_program_from` varchar(20) NOT NULL,
  `source_account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_payment_type` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_proof` varchar(100) NOT NULL,
  `check_status` int(1) NOT NULL,
  `payment_status` enum('valid','invalid') NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id_payment_type` int(11) NOT NULL,
  `description` enum('registrasi','program') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_content`
--

CREATE TABLE `status_content` (
  `id_status` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submit_contents`
--

CREATE TABLE `submit_contents` (
  `id_content` int(11) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `file` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summits`
--

CREATE TABLE `summits` (
  `id_summit` int(5) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `regist_fee` int(10) NOT NULL,
  `program_fee` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summit_timelines`
--

CREATE TABLE `summit_timelines` (
  `id_summit_timelines` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `timeline` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `meal_attendance`
--
ALTER TABLE `meal_attendance`
  ADD PRIMARY KEY (`id_meal_attendance`),
  ADD KEY `id_participant` (`id_participant`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `id_summit` (`id_summit`);

--
-- Indexes for table `participant_details`
--
ALTER TABLE `participant_details`
  ADD PRIMARY KEY (`id_participant_details`),
  ADD KEY `id_participant` (`id_participant`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_participant` (`id_participant`),
  ADD KEY `id_payment_type` (`id_payment_type`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id_payment_type`);

--
-- Indexes for table `status_content`
--
ALTER TABLE `status_content`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `submit_contents`
--
ALTER TABLE `submit_contents`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_summit` (`id_summit`);

--
-- Indexes for table `summits`
--
ALTER TABLE `summits`
  ADD PRIMARY KEY (`id_summit`);

--
-- Indexes for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  ADD PRIMARY KEY (`id_summit_timelines`),
  ADD KEY `id_summit` (`id_summit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meal_attendance`
--
ALTER TABLE `meal_attendance`
  MODIFY `id_meal_attendance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participant_details`
--
ALTER TABLE `participant_details`
  MODIFY `id_participant_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id_payment_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_content`
--
ALTER TABLE `status_content`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submit_contents`
--
ALTER TABLE `submit_contents`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summits`
--
ALTER TABLE `summits`
  MODIFY `id_summit` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  MODIFY `id_summit_timelines` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_attendance`
--
ALTER TABLE `meal_attendance`
  ADD CONSTRAINT `meal_attendance_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `participant_details`
--
ALTER TABLE `participant_details`
  ADD CONSTRAINT `participant_details_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`id_payment_type`) REFERENCES `payment_types` (`id_payment_type`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Constraints for table `submit_contents`
--
ALTER TABLE `submit_contents`
  ADD CONSTRAINT `submit_contents_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_content` (`id_status`),
  ADD CONSTRAINT `submit_contents_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`),
  ADD CONSTRAINT `submit_contents_ibfk_3` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  ADD CONSTRAINT `summit_timelines_ibfk_1` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
