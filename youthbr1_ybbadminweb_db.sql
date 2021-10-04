-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2021 at 05:53 PM
-- Server version: 5.7.32
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthbr1_ybbadminweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `status`, `id_summit`, `image`) VALUES
(1, 'qoriah', 'dummy', 1, 1, 'default.jpg'),
(2, 'hendra', 'hendra', 1, 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meal_attendances`
--

CREATE TABLE `meal_attendances` (
  `id_meal_attendance` int(11) NOT NULL,
  `id_participant` varchar(50) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `id_meal_type` int(11) NOT NULL,
  `check_in_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meal_types`
--

CREATE TABLE `meal_types` (
  `id_meal_type` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id_participant` varchar(50) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `is_fully_funded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id_participant`, `id_summit`, `email`, `status`, `qr_code`, `created_date`, `is_fully_funded`) VALUES
('0FkIptVWVifKb9sHqhvsWDDVinx2', 1, 'hendrapolover@gmail.com', 2, '0FkIptVWVifKb9sHqhvsWDDVinx2.png', '2021-07-26 07:26:17', 0),
('3Fvu6qHKvnhfkbx6tP4ybIWYTJz2', 1, 'hendracodes@gmail.com', 1, '3Fvu6qHKvnhfkbx6tP4ybIWYTJz2.png', '2021-07-26 15:07:45', 0),
('bVrAI8rKLFbsL8oGhJhZ79GXBkr2', 1, 'subaktialdi88@gmail.com', 1, 'bVrAI8rKLFbsL8oGhJhZ79GXBkr2.png', '2021-07-26 14:40:35', 0),
('h1uFHHAfzLTp6s3LI0EdpY5M6mn2', 1, 'subaktialdi688@gmail.com', 0, 'h1uFHHAfzLTp6s3LI0EdpY5M6mn2.png', '2021-07-26 15:37:02', 0),
('Icsd98LatKcS94gyrPx5NAyvFtz2', 1, 'ybbuserdemo@gmail.com', 1, 'Icsd98LatKcS94gyrPx5NAyvFtz2.png', '2021-07-26 09:18:07', 0),
('Ot5hSQXb0Gh1Z6xMpPhGsOpBKm63', 1, 'meldilatifah75@gmail.com', 2, 'Ot5hSQXb0Gh1Z6xMpPhGsOpBKm63.png', '2021-07-27 09:51:14', 0),
('ynD3p86rqVc2mOIO83YOpXdWGtX2', 1, 'ybb.admn@gmail.com', 1, 'ynD3p86rqVc2mOIO83YOpXdWGtX2.png', '2021-07-26 08:02:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant_details`
--

CREATE TABLE `participant_details` (
  `id_participant` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `field_of_study` varchar(50) NOT NULL,
  `institution` varchar(50) NOT NULL,
  `emergency_contact` varchar(50) NOT NULL,
  `wa_number` varchar(20) NOT NULL,
  `ig_account` varchar(20) NOT NULL,
  `tshirt_size` varchar(5) NOT NULL,
  `disease_history` varchar(100) NOT NULL,
  `contact_relation` varchar(20) NOT NULL,
  `is_vegetarian` int(11) NOT NULL,
  `subtheme` varchar(20) NOT NULL,
  `essay` varchar(1000) NOT NULL,
  `social_projects` varchar(100) NOT NULL,
  `talents` varchar(100) NOT NULL,
  `achievements` varchar(100) NOT NULL,
  `experiences` varchar(100) NOT NULL,
  `know_program_from` varchar(20) NOT NULL,
  `source_account_name` varchar(20) NOT NULL,
  `video_link` varchar(100) NOT NULL,
  `id_participant_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant_details`
--

INSERT INTO `participant_details` (`id_participant`, `photo`, `full_name`, `birthdate`, `gender`, `address`, `nationality`, `occupation`, `field_of_study`, `institution`, `emergency_contact`, `wa_number`, `ig_account`, `tshirt_size`, `disease_history`, `contact_relation`, `is_vegetarian`, `subtheme`, `essay`, `social_projects`, `talents`, `achievements`, `experiences`, `know_program_from`, `source_account_name`, `video_link`, `id_participant_detail`) VALUES
('0FkIptVWVifKb9sHqhvsWDDVinx2', 'image_picker212866874850243181.jpg', 'Suhendra', '2000-01-11', 'Femal', 'Jl. Example', 'Cape Verde (CV)', 'Example', 'Example', 'Example', '49464646', '048464649', 'Example', 'M', 'sksksk', 'sjskskks', 0, 'Public Policy', 'jsjsjs', 'sjksks', 'jsskks', 'ueuejeuıeje', 'shsjjwjıeııs', 'Facebook', 'snsnsksk', 'sksksk', 9),
('Icsd98LatKcS94gyrPx5NAyvFtz2', 'image_picker_BD6C5D5B-3CA7-4B8E-80D1-CB7FADCC9040-45259-000030DDFF5E4650.jpg', 'typical for', '2000-01-01', 'Femal', 'very fun', 'Brazil (BR)', 'cc’ing was', 'but the only', 'very fun', '88888', '85555555', 'ghost', 'XL', 'he was', 'for me I', 0, 'Mental Health', 'mytttty us the world is so special and I am ', 'but the only ', 'no I didn’t ', 'for me I ', ' the new version ', 'Facebook', 'good game to ', 'no I didn’t get ', 10),
('ynD3p86rqVc2mOIO83YOpXdWGtX2', 'image_picker3420012672820417674.jpg', 'he was so', '2000-01-01', 'Femal', 'know what you', 'Aruba (AW)', 'nnnn', 'my phone', 'just a', '9464646', '55464949', 'just a few', 'L', 'know', 'love you', 0, 'Public Policy', 'very much for', 'now I have', 'no I have', 'ki bu evy', 'şu hayatta', 'Friends', 'my phone', 'but I', 11),
('3Fvu6qHKvnhfkbx6tP4ybIWYTJz2', 'image_picker2802754539533312919.jpg', 'hgkhh', '2000-01-13', 'Femal', 'jgghh', 'Anguilla (AI)', 'jjhhh', 'jjhhh', 'hhhjj', '555585', '885588', 'khjkjjj', 'L', 'hjhb', 'jhghj', 0, 'Public Policy', 'sşks', 'skwkka', 'jhsjs', 'jskweş', 'jskwke', 'Facebook', 'kzkssl', 'skskks', 12),
('Ot5hSQXb0Gh1Z6xMpPhGsOpBKm63', 'image_picker2869731193851531515.jpg', 'sjsksn', '2000-01-16', 'Femal', 'bdsndn', 'Andorra (AD)', 'hddjdndn', 'bdndndmd', 'bdndndmd', '0852136497879', '082136880503', 'vsjsnssnsn', 'XXL', 'bdbdndnd', 'dbsnsn', 0, 'Education', 'hsbsnsns', 'sbsbdbbd', 'bssndnns', 'bsbsnssn', 'vssnsnsn', 'Instagram', 'hshsnsns', 'vsbsbdbdbn', 13),
('bVrAI8rKLFbsL8oGhJhZ79GXBkr2', 'image_picker2639370768576378175.jpg', 'yes', '1999-12-09', 'Male', 'yes', 'Albania (AL)', 'yes', 'yes', 'yee', '123', '123', 'yes', 'XXXL', 'yeso', 'yes', 0, 'Public Policy', 'yes', 'yee', 'yes', 'yes', 'yee', 'Friends', 'yes', 'yes', 14);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `id_participant` varchar(50) NOT NULL,
  `id_payment_type` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_proof` varchar(100) NOT NULL,
  `check_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT '2',
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_payment`, `id_participant`, `id_payment_type`, `bank_name`, `account_name`, `payment_date`, `payment_proof`, `check_status`, `payment_status`, `id_admin`, `amount`) VALUES
(16, '0FkIptVWVifKb9sHqhvsWDDVinx2', 1, 'BRI', 'Suhendra', '2021-07-14', 'image_picker453257986816052625.jpg', 0, 1, 2, 125000),
(17, 'Icsd98LatKcS94gyrPx5NAyvFtz2', 1, 'can’t believe', 'but the', '2021-07-26', 'image_picker_34CC9FFC-6353-41E8-B742-0C174F3EEE5E-45259-000031143C627F99.jpg', 0, 0, 2, 125000),
(18, 'Ot5hSQXb0Gh1Z6xMpPhGsOpBKm63', 1, 'bca', 'meldi', '2021-07-19', 'image_picker5173265194771113449.jpg', 0, 1, 2, 125000),
(19, 'bVrAI8rKLFbsL8oGhJhZ79GXBkr2', 1, 'yes', 'yed', '2021-07-27', 'image_picker1581598350890209490.jpg', 0, 0, 2, 125000),
(20, 'bVrAI8rKLFbsL8oGhJhZ79GXBkr2', 1, 'yes', 'yed', '2021-07-07', 'image_picker7308521593916863144.jpg', 0, 0, 2, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id_payment_type` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id_payment_type`, `id_summit`, `description`, `start_date`, `end_date`, `type`) VALUES
(1, 1, 'Registration Fee', '2021-07-15', '2021-08-31', 'regist_fee'),
(2, 1, 'Program Fee Batch 1', '2021-10-15', '2021-09-30', 'program_fee_1'),
(3, 1, 'Program Fee Batch 2', '2021-11-30', '2021-10-21', 'program_fee_2');

-- --------------------------------------------------------

--
-- Table structure for table `summits`
--

CREATE TABLE `summits` (
  `id_summit` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `regist_fee` int(11) NOT NULL,
  `program_fee` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `regist_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summits`
--

INSERT INTO `summits` (`id_summit`, `description`, `regist_fee`, `program_fee`, `status`, `regist_status`) VALUES
(1, 'The 5th Istanbul Youth Summit (IYS)', 125000, 5500000, 1, 1),
(2, 'Asia Youth Summit (AYS) 2021', 0, 0, 0, 0),
(3, 'Digital Youth Summit (DYS)', 0, 0, 0, 0),
(4, 'Global Youth Ambassador (GYA)', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `summit_contents`
--

CREATE TABLE `summit_contents` (
  `id_summit_content` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summit_contents`
--

INSERT INTO `summit_contents` (`id_summit_content`, `id_admin`, `id_summit`, `title`, `description`, `file_path`, `file_type`, `created_date`, `modified_date`, `status`) VALUES
(17, 2, 1, 'Registration Announcement', 'The 5th Istanbul Youth Summit is coming very very soon!  Are you ready to expand your network? Are you ready to gain insightful knowledge? Are you ready raise your idea? Are you ready to collaborate together with other young leaders?  This is your golden chance!', '2021-07-26_10.jpg', 'jpg', '2021-07-26 03:50:56', '2021-07-26 03:50:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `summit_days`
--

CREATE TABLE `summit_days` (
  `id_summit_day` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `day_date` date NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summit_timelines`
--

CREATE TABLE `summit_timelines` (
  `id_summit_timeline` int(11) NOT NULL,
  `id_summit` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `timeline` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `start_timeline` date NOT NULL,
  `end_timeline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summit_timelines`
--

INSERT INTO `summit_timelines` (`id_summit_timeline`, `id_summit`, `description`, `timeline`, `status`, `start_timeline`, `end_timeline`) VALUES
(1, 1, 'Registration', 'August 1- 31, 2021', 0, '2021-07-22', '2021-08-31'),
(2, 1, 'Letter of Agreement Distribution', 'September 15, 2021', 2, '2021-09-15', '2021-09-16'),
(3, 1, 'Program Fee Payment Batch 1', 'October 15, 2021', 0, '2021-10-15', '2021-10-16'),
(4, 1, 'Interview for Fully Funded Participants', 'October 23 - 24, 2021', 0, '2021-10-23', '2021-10-24'),
(5, 1, 'Program Fee Payment Batch 2', 'November 30, 2021', 0, '2021-11-30', '2021-12-01'),
(6, 1, 'Final Announcement for Fully Funded Participants', 'December 5, 2021', 0, '2021-12-05', '2021-12-06'),
(7, 1, 'The 5th Istanbul Youth Summit', 'February 14 - 17, 2022', 0, '2022-02-14', '2022-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_id_summit_admin` (`id_summit`);

--
-- Indexes for table `meal_attendances`
--
ALTER TABLE `meal_attendances`
  ADD PRIMARY KEY (`id_meal_attendance`),
  ADD KEY `id_participant` (`id_participant`),
  ADD KEY `id_summit` (`id_summit`),
  ADD KEY `id_meal_type` (`id_meal_type`);

--
-- Indexes for table `meal_types`
--
ALTER TABLE `meal_types`
  ADD PRIMARY KEY (`id_meal_type`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `fk_id_summit_participant` (`id_summit`);

--
-- Indexes for table `participant_details`
--
ALTER TABLE `participant_details`
  ADD PRIMARY KEY (`id_participant_detail`),
  ADD KEY `fk_participant_details_id` (`id_participant`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_participant_payment` (`id_participant`),
  ADD KEY `fk_type_payment` (`id_payment_type`),
  ADD KEY `fk_admin_payment` (`id_admin`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id_payment_type`),
  ADD KEY `id_summit` (`id_summit`);

--
-- Indexes for table `summits`
--
ALTER TABLE `summits`
  ADD PRIMARY KEY (`id_summit`);

--
-- Indexes for table `summit_contents`
--
ALTER TABLE `summit_contents`
  ADD PRIMARY KEY (`id_summit_content`),
  ADD KEY `fk_admin_summit_content` (`id_admin`),
  ADD KEY `fk_id_summit_content` (`id_summit`);

--
-- Indexes for table `summit_days`
--
ALTER TABLE `summit_days`
  ADD PRIMARY KEY (`id_summit_day`),
  ADD KEY `id_summit` (`id_summit`);

--
-- Indexes for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  ADD PRIMARY KEY (`id_summit_timeline`),
  ADD KEY `fk_id_summit_timeline` (`id_summit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meal_attendances`
--
ALTER TABLE `meal_attendances`
  MODIFY `id_meal_attendance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_types`
--
ALTER TABLE `meal_types`
  MODIFY `id_meal_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant_details`
--
ALTER TABLE `participant_details`
  MODIFY `id_participant_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id_payment_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `summits`
--
ALTER TABLE `summits`
  MODIFY `id_summit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `summit_contents`
--
ALTER TABLE `summit_contents`
  MODIFY `id_summit_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `summit_days`
--
ALTER TABLE `summit_days`
  MODIFY `id_summit_day` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  MODIFY `id_summit_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_id_summit_admin` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `meal_attendances`
--
ALTER TABLE `meal_attendances`
  ADD CONSTRAINT `meal_attendances_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`),
  ADD CONSTRAINT `meal_attendances_ibfk_2` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`),
  ADD CONSTRAINT `meal_attendances_ibfk_3` FOREIGN KEY (`id_meal_type`) REFERENCES `meal_types` (`id_meal_type`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `fk_id_summit_participant` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `participant_details`
--
ALTER TABLE `participant_details`
  ADD CONSTRAINT `fk_participant_details_id` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_admin_payment` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`),
  ADD CONSTRAINT `fk_participant_payment` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`),
  ADD CONSTRAINT `fk_type_payment` FOREIGN KEY (`id_payment_type`) REFERENCES `payment_types` (`id_payment_type`);

--
-- Constraints for table `summit_contents`
--
ALTER TABLE `summit_contents`
  ADD CONSTRAINT `fk_admin_summit_content` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`),
  ADD CONSTRAINT `fk_id_summit_content` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `summit_days`
--
ALTER TABLE `summit_days`
  ADD CONSTRAINT `summit_days_ibfk_1` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);

--
-- Constraints for table `summit_timelines`
--
ALTER TABLE `summit_timelines`
  ADD CONSTRAINT `fk_id_summit_timeline` FOREIGN KEY (`id_summit`) REFERENCES `summits` (`id_summit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
