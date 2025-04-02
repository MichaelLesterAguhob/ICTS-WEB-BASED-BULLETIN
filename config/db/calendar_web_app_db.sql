-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 01:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar_web_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `activities` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `username`, `activities`, `date`) VALUES
(1, 'michael', 'Logged In', '2023/12/11 - 03:42:56pm'),
(2, 'Michael', 'Logged Out', '2023/12/11 - 04:53:26pm'),
(3, 'michael', 'Logged In', '2023/12/29 - 05:31:12pm'),
(4, 'michael', 'Logged Out', '2023/12/29 - 05:31:42pm'),
(5, 'michael', 'Logged In', '2023/12/29 - 05:32:32pm'),
(6, 'michael', 'Logged Out', '2023/12/29 - 05:33:26pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email_account` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`account_id`, `username`, `password`, `email_account`) VALUES
(1, 'admin123', '$2y$10$QfyO7ey6nkc2MWd1kO5Zce0qb0ZaBkxngTxt6jU3iEOawYRmHYIsa', 'amikell012@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `birthday_tbl`
--

CREATE TABLE `birthday_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `birth_date` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthday_tbl`
--

INSERT INTO `birthday_tbl` (`id`, `name`, `birth_date`, `image`) VALUES
(1, 'MICHAEL', 'December 06, 2023', 'b1.jpg'),
(2, 'JAMES', 'December 06, 2023', 'b3.jpg'),
(3, 'JOSHUA', 'December 13, 2023', 'b2.jpg'),
(4, 'RICA', 'December 06, 2023', 'g1.jpg'),
(5, 'EDNYL', 'December 07, 2023', 'g2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cmes`
--

CREATE TABLE `cmes` (
  `id` int(11) NOT NULL,
  `committee_office` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `host` varchar(500) NOT NULL,
  `fb_live` varchar(10) NOT NULL,
  `ppab_cam` varchar(10) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmes`
--

INSERT INTO `cmes` (`id`, `committee_office`, `date`, `time`, `host`, `fb_live`, `ppab_cam`, `remarks`) VALUES
(1, 'ways & means', '2023-08-22', '08:30 AM', 'Ludette(with zoom link)/Christian Cachola', 'YES', 'YES', 'FACE TO FACE - ANDAYA HALL'),
(2, 'Basic education and culture', '2023-08-22', '10:00 AM', 'edlee(with zoom link)', 'YES', 'NO', '*HYBRID - Spkrs Aquino/Makalintal Hall (2/F SWA) \r\n*To be crossposted on cong. Roman Romulo\'s FB Page'),
(53, 'Appropriations (FY 2024 Budget Briefing/Hearing)', '2023-08-23', '09:00 AM', 'Ice (please use Relan\'s zoom credentials)', 'YES', 'NO', 'FACE to FACE-Spkr Nograles Hall\r\nDepartment of Agriculture (DA)'),
(54, 'Minority Leader\'s Forum/Meeting', '2023-08-23', '11:00 AM', 'Mark/(TENTATIVE) ', 'NO', 'NO', 'To be crossposted on Cong. Roman Romulo\'s FB Page'),
(55, '19th Congress\' 2nd Regular Session', '2023-08-25', '03:00 PM', 'Atty Marmol\'s Team', 'YES', 'YES', 'SESSION HALL - Main Bldg'),
(56, 'Appropriations (FY 2024 Budget Briefing/Hearing)', '2023-08-23', '09:00 AM', 'Lorna (please use Relan\'s zoom credentials)', 'YES', 'YES', '•FACE to FACE - Spkr Nograles Hall\r\nDepartment of Justice (DOJ)'),
(57, 'Civil Service and Professional Regulation', '2023-08-26', '09:30 AM', 'Relan (please create zoom link)/CTSS IV ', 'YES', 'NO', 'FACE to FACE-RVM Conference Rooms 7&8 (1/F RVM Bldg)'),
(58, 'North Luzon Growth Quadrangle', '2023-08-24', '09:30 AM', 'Mark (please create zoom link)/Gel Pallingayan ', 'YES', 'NO', 'FACE to FACE-RVM Conference Rooms 1&2 (1/F RVM Bldg)'),
(59, 'Good Government and Public Accountabilityt it with Information & Communications Technology', '2023-08-24', '01:30 PM', 'Edcel (please create zoom link)/CTSSS V', 'YES', 'NO', 'FACE to FACE-RVM Conference Room 5 (1/F RVM Bldg)'),
(60, 'Disaster Resilience', '2023-08-25', '01:00 PM', 'Karen (please create zoom link)/CTSS IV', 'YES', 'NO', 'SWA) FACE to FACE - RVM Conference Rooms 3&4 (1/F RVM Bldg)\r\n'),
(61, 'Agriculture and Food', '2023-08-26', '09:30 AM', 'Fiel (please create zoom link)/Agri Scrt ', 'YES', '', 'FACE to FACE-Commission on Appointments Room (4/F SWA)');

-- --------------------------------------------------------

--
-- Table structure for table `hrep_activities`
--

CREATE TABLE `hrep_activities` (
  `id` int(11) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hrep_activities`
--

INSERT INTO `hrep_activities` (`id`, `img`) VALUES
(6, 'hrep_act3.jpg'),
(7, 'hrep_act2.jpg'),
(8, 'hrep_act1.jpg'),
(18, 'hrep_act2.jpg'),
(19, 'hrep_act3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hrep_ann`
--

CREATE TABLE `hrep_ann` (
  `id` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `date_release` varchar(50) NOT NULL,
  `office` varchar(50) NOT NULL,
  `qr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hrep_ann`
--

INSERT INTO `hrep_ann` (`id`, `subject`, `date_release`, `office`, `qr`) VALUES
(9, 'HREP MEMORANDUM CIRCULAR SCHEDULE SPECIAL (NON-WORKING) DAYS FOR YEAR 2023', '2023-11-16', 'MALACANANG', 'hrep_ann_qr.jpg'),
(10, 'REGULAR SESSION SCHEDULE', '2023-01-01', 'ASDSDS', 'hrep_ann_qr.jpg'),
(12, 'PHILIPPINE HOLIDAYS', '2022-11-09', 'MALACANANG', 'hrep_ann_qr.jpg'),
(13, 'GUIDELINES ON CONDUCTED OF PASSPORT ON WHEELS ACTIVITY IN THE HOUSE OF REPRESENTATIVE', '2023-03-29', 'HOUSE OF REPRESENTATIVE', 'hrep_ann_qr.jpg'),
(20, 'SAMPLE 1', '2023-12-03', 'SAMPLE OFFICE', 'leave_form.jpg'),
(22, 'SAMPLE 2', '2023-12-04', 'SAMPLE OFFICE 2', 'hrep_ann_qr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `icts_ann_cont`
--

CREATE TABLE `icts_ann_cont` (
  `id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `cont_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icts_ann_cont`
--

INSERT INTO `icts_ann_cont` (`id`, `cont_id`, `title`, `cont_type`) VALUES
(10, 1, 'EMERGENCY RESPONSE TEAM', 'Emergency Response Team'),
(13, 4, 'TRAINING', 'Training'),
(21, 6, 'LEAVE FORM', 'QR/Form'),
(30, 7, 'HOUSE PASS', 'QR/Form');

-- --------------------------------------------------------

--
-- Table structure for table `icts_ert_teams`
--

CREATE TABLE `icts_ert_teams` (
  `id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `team_name` varchar(256) NOT NULL,
  `name_list` varchar(528) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icts_ert_teams`
--

INSERT INTO `icts_ert_teams` (`id`, `cont_id`, `team_name`, `name_list`) VALUES
(22, 1, 'Evacuation Team', 'Relan C. Buyao\r\nJayson I. Albano\r\nMark Timothy O. De Paz'),
(23, 1, 'Fire Fighting Team', 'Alfonso Anthony D. Navarro\r\nEdcel Jay B. Dacara\r\nKevin Curretian M. Bibiolata'),
(24, 1, 'Security Team', 'Andres Benjamin M. Bajaro\r\nArnolfo T. Holgado\r\nKarlos V. Oliveros'),
(36, 1, 'Sample team 1', 'Name 1\r\nName 2\r\nName 3\r\nName 4'),
(37, 1, 'Sample team 2', 'Name 1\r\nName 2\r\nName 3\r\nName 4');

-- --------------------------------------------------------

--
-- Table structure for table `icts_img_date`
--

CREATE TABLE `icts_img_date` (
  `id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icts_img_date`
--

INSERT INTO `icts_img_date` (`id`, `cont_id`, `img`, `date`) VALUES
(10, 6, 'leave_form.jpg', '2023-12-13'),
(15, 7, 'house_pass.jpg', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `icts_training`
--

CREATE TABLE `icts_training` (
  `id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `desc` varchar(256) NOT NULL,
  `date` varchar(128) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icts_training`
--

INSERT INTO `icts_training` (`id`, `cont_id`, `desc`, `date`, `time`) VALUES
(6, 4, 'LIRMD - Digitization Meeting', '2023-08-22', '09:00 AM'),
(7, 4, 'Finance Department & CTTEE on Accounts', '2023-10-23', '11:00 AM'),
(8, 4, 'Records Management Service System', '2023-08-23', '03:00 PM'),
(18, 4, 'Microsoft Outlook User Training', '2023-08-24', '10:00 AM'),
(25, 4, 'sample 1', '2023-12-29', '08:27 AM'),
(26, 4, 'sample 2', '2023-12-12', '12:30 PM'),
(27, 4, 'Sample 3', '2023-12-20', '01:00 AM'),
(28, 4, 'sample 4', '2023-12-04', '04:31 PM'),
(29, 4, 'sample 5', '2023-12-05', '05:32 PM'),
(30, 4, 'sample 6', '2023-12-06', '06:32 PM'),
(31, 4, 'sample 7', '2023-12-07', '07:32 PM'),
(32, 4, 'sample 8', '2023-12-08', '08:32 PM');

-- --------------------------------------------------------

--
-- Table structure for table `quote_of_the_week`
--

CREATE TABLE `quote_of_the_week` (
  `id` int(11) NOT NULL,
  `quote` varchar(500) CHARACTER SET utf8 NOT NULL,
  `author` varchar(256) CHARACTER SET utf8 NOT NULL,
  `use_quote` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote_of_the_week`
--

INSERT INTO `quote_of_the_week` (`id`, `quote`, `author`, `use_quote`) VALUES
(1, '“Everyone wants to live on top of the mountain, but all the happiness and growth occurs while you\'re climbing it.”', 'Andy Rooney', 'Active'),
(2, '“Always remember, your focus determines your reality.”', 'George Lucas', 'Use');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email_account` varchar(256) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `icts_an` varchar(20) NOT NULL,
  `hrep_an` varchar(20) NOT NULL,
  `hrep_act` varchar(20) NOT NULL,
  `cmes` varchar(20) NOT NULL,
  `bday` varchar(20) NOT NULL,
  `quote` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `username`, `email_account`, `verification_code`, `password`, `icts_an`, `hrep_an`, `hrep_act`, `cmes`, `bday`, `quote`) VALUES
(5, 'Michael', 'aguhobmichael3@gmail.com', 7369, '$2y$10$e.Ry06f1gjIXGLCYOpvU/uxwZC4KOhyDSSpEFtf/tkoQlHBOhtPvS', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(6, 'Joshua', 'g6handog_joshua@yahoo.com', 1052, '$2y$10$.pWCdI6DJy1BU9gVqhQU0enbDJbYCIRsHkxjv8UEwJ3AR5pAC3Ohm', 'NO', 'NO', 'YES', 'YES', 'NO', 'NO'),
(7, 'rica', 'ricamaepumareb@gmail.com', 5739, '$2y$10$z5vLHxCSaXrNfV2saOX5OexGwBLZf2kWm6k8Op9wC8DWCz/MFQCLm', 'YES', 'YES', 'NO', 'NO', 'NO', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `birthday_tbl`
--
ALTER TABLE `birthday_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmes`
--
ALTER TABLE `cmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrep_activities`
--
ALTER TABLE `hrep_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrep_ann`
--
ALTER TABLE `hrep_ann`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icts_ann_cont`
--
ALTER TABLE `icts_ann_cont`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icts_ert_teams`
--
ALTER TABLE `icts_ert_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icts_img_date`
--
ALTER TABLE `icts_img_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icts_training`
--
ALTER TABLE `icts_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_of_the_week`
--
ALTER TABLE `quote_of_the_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birthday_tbl`
--
ALTER TABLE `birthday_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cmes`
--
ALTER TABLE `cmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `hrep_activities`
--
ALTER TABLE `hrep_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hrep_ann`
--
ALTER TABLE `hrep_ann`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `icts_ann_cont`
--
ALTER TABLE `icts_ann_cont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `icts_ert_teams`
--
ALTER TABLE `icts_ert_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `icts_img_date`
--
ALTER TABLE `icts_img_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `icts_training`
--
ALTER TABLE `icts_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `quote_of_the_week`
--
ALTER TABLE `quote_of_the_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
