-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 04:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhvsu_hgdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` int(145) NOT NULL,
  `adminFirst_Name` varchar(145) DEFAULT NULL,
  `adminMiddle_Name` varchar(145) DEFAULT NULL,
  `adminLast_Name` varchar(145) DEFAULT NULL,
  `adminEmail` varchar(145) DEFAULT NULL,
  `adminPassword` varchar(145) DEFAULT NULL,
  `adminStatus` enum('Y','N') DEFAULT 'N',
  `tokencode` varchar(145) DEFAULT NULL,
  `adminProfile` varchar(1145) NOT NULL DEFAULT 'profile-red.png',
  `account_status` enum('active','disabled') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `adminFirst_Name`, `adminMiddle_Name`, `adminLast_Name`, `adminEmail`, `adminPassword`, `adminStatus`, `tokencode`, `adminProfile`, `account_status`, `created_at`, `updated_at`) VALUES
(1, 'JOSE', 'MARIE', 'CHAN', 'gadmonitoring4b@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'Y', '1f65c75a94784a4dfec7509654bfbd79', 'profile-red.png', 'active', '2022-07-07 05:19:44', '2022-10-19 23:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `Id` int(145) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`Id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'gadmonitoring4b@gmail.com', 'btvvxjxtuvfzpsup', '2022-07-08 04:41:51', '2022-10-19 12:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `google_recaptcha_api`
--

CREATE TABLE `google_recaptcha_api` (
  `Id` int(11) NOT NULL,
  `site_key` varchar(145) DEFAULT NULL,
  `site_secret_key` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_recaptcha_api`
--

INSERT INTO `google_recaptcha_api` (`Id`, `site_key`, `site_secret_key`, `created_at`, `updated_at`) VALUES
(1, '6LdiQZQhAAAAABpaNFtJpgzGpmQv2FwhaqNj2azh', '6LdiQZQhAAAAAByS6pnNjOs9xdYXMrrW2OeTFlrm', '2022-07-08 04:29:37', '2022-08-21 00:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `Id` int(145) NOT NULL,
  `guidelines_name` varchar(145) DEFAULT NULL,
  `guidelines_Id` varchar(145) DEFAULT NULL,
  `files` varchar(145) DEFAULT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`Id`, `guidelines_name`, `guidelines_Id`, `files`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pullout-16-Funding-Facilities', '87434096', 'Pullout-16-Funding-Facilities.pdf', 'active', '2022-10-20 12:20:58', NULL),
(3, 'Pullout-13-Labor-and-Employment', '39165366', 'Pullout-13-Labor-and-Employment.pdf', 'active', '2022-10-20 13:16:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_39165366`
--

CREATE TABLE `guidelines_39165366` (
  `Id` int(145) NOT NULL,
  `userId` varchar(125) DEFAULT NULL,
  `files` varchar(125) DEFAULT NULL,
  `guidelines_Id` varchar(145) DEFAULT NULL,
  `status` enum('active','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_87434096`
--

CREATE TABLE `guidelines_87434096` (
  `Id` int(145) NOT NULL,
  `userId` varchar(125) DEFAULT NULL,
  `files` varchar(125) DEFAULT NULL,
  `guidelines_Id` varchar(145) DEFAULT NULL,
  `status` enum('active','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidelines_87434096`
--

INSERT INTO `guidelines_87434096` (`Id`, `userId`, `files`, `guidelines_Id`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', 'DATA FLOW DIAGRAM and FLOWCHART.docx', '35800773', 'delete', '2022-10-25 13:37:38', '2022-10-25 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadminId` int(145) NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `tokencode` varchar(145) DEFAULT NULL,
  `profile` varchar(1145) NOT NULL DEFAULT 'profile-red.png',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadminId`, `name`, `email`, `password`, `tokencode`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'DABU, JASMINE', 'gadmonitoring4b@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'cf3d41ef87dbd96fe6b963af1eb9c0f6', 'profile-red.png', '2022-07-03 00:09:13', '2022-10-19 13:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `Id` int(14) NOT NULL,
  `system_name` varchar(145) DEFAULT NULL,
  `system_number` varchar(145) DEFAULT NULL,
  `system_email` varchar(145) DEFAULT NULL,
  `copy_right` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`Id`, `system_name`, `system_number`, `system_email`, `copy_right`, `created_at`, `updated_at`) VALUES
(1, 'DHVSU HGDG', '9776621929', 'gadmonitoring4b@gmail.com', 'Copyright 2022 DHVSU HGDG. All right reserved', '2022-07-08 12:38:28', '2022-10-19 12:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `system_logo`
--

CREATE TABLE `system_logo` (
  `Id` int(145) NOT NULL,
  `logo` varchar(1145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_logo`
--

INSERT INTO `system_logo` (`Id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'DHVSU_logo.png', '2022-07-08 08:11:27', '2022-08-22 06:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `activityId` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(145) NOT NULL,
  `activity` varchar(145) NOT NULL,
  `date` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_logs`
--

INSERT INTO `tb_logs` (`activityId`, `user`, `email`, `activity`, `date`) VALUES
(1, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-07 09:50:50 AM'),
(2, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-07 09:51:14 AM'),
(3, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-08 11:27:55 AM'),
(4, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-08 11:28:13 AM'),
(5, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-09 09:18:46 AM'),
(6, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-09 09:19:06 AM'),
(7, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-10 09:15:22 AM'),
(8, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-10 09:16:11 AM'),
(9, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-10 10:30:17 PM'),
(10, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-10 10:39:00 PM'),
(11, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-11 08:01:18 AM'),
(12, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-11 08:01:50 AM'),
(13, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-12 08:48:43 AM'),
(14, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-12 08:48:59 AM'),
(15, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-13 09:00:06 AM'),
(16, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-13 09:00:19 AM'),
(17, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-13 08:41:54 PM'),
(18, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-13 08:42:08 PM'),
(19, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-16 09:48:42 AM'),
(20, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-16 09:49:03 AM'),
(21, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-18 11:01:27 AM'),
(22, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-21 08:38:19 AM'),
(23, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-21 09:10:57 AM'),
(24, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-21 10:45:53 AM'),
(25, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-21 08:08:06 PM'),
(26, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-21 08:09:14 PM'),
(27, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-21 08:12:20 PM'),
(28, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-21 08:12:50 PM'),
(29, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-21 08:13:02 PM'),
(30, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-22 07:38:35 AM'),
(31, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-22 07:38:45 AM'),
(32, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-22 07:38:54 AM'),
(33, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-22 09:37:14 AM'),
(34, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-22 09:45:02 AM'),
(35, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-23 07:17:08 AM'),
(36, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-23 02:33:51 PM'),
(37, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-23 04:16:00 PM'),
(38, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-23 04:16:16 PM'),
(39, 'Customer andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-24 06:09:27 PM'),
(40, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-25 10:36:04 AM'),
(41, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-25 10:37:23 AM'),
(42, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-26 05:53:33 PM'),
(43, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-26 06:08:39 PM'),
(44, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-26 08:32:32 PM'),
(45, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-26 08:35:04 PM'),
(46, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-28 04:18:25 PM'),
(47, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-28 04:19:43 PM'),
(48, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-29 06:21:34 PM'),
(49, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-30 06:17:33 AM'),
(50, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-30 06:18:09 AM'),
(51, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-30 06:18:18 AM'),
(52, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-30 06:52:40 AM'),
(53, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-30 02:48:44 PM'),
(54, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-30 02:49:16 PM'),
(55, 'Superadmin andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2022-08-31 05:10:17 PM'),
(56, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-31 05:10:39 PM'),
(57, 'Customer jasmine.j.dabu@gmail.com', 'jasmine.j.dabu@gmail.com', 'Has successfully signed in', '2022-10-19 07:58:08 PM'),
(58, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-19 07:58:36 PM'),
(59, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-19 07:59:47 PM'),
(60, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-19 08:00:02 PM'),
(61, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-19 08:05:43 PM'),
(62, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 06:49:35 AM'),
(63, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 06:49:43 AM'),
(64, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 07:04:51 AM'),
(65, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 07:05:14 AM'),
(66, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 04:56:22 PM'),
(67, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 04:56:27 PM'),
(68, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-20 04:56:34 PM'),
(69, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-25 05:15:35 PM'),
(70, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-25 05:15:58 PM'),
(71, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-25 05:24:06 PM'),
(72, 'Customer gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-25 09:13:58 PM'),
(73, 'Superadmin gadmonitoring4b@gmail.com', 'gadmonitoring4b@gmail.com', 'Has successfully signed in', '2022-10-25 09:14:05 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `employeeId` varchar(145) DEFAULT NULL,
  `userPosition` varchar(145) DEFAULT NULL,
  `userFirst_Name` varchar(145) DEFAULT NULL,
  `userMiddle_Name` varchar(145) DEFAULT NULL,
  `userLast_Name` varchar(145) DEFAULT NULL,
  `userPhone_Number` varchar(145) DEFAULT NULL,
  `userEmail` varchar(145) DEFAULT NULL,
  `userPassword` varchar(145) DEFAULT NULL,
  `userStatus` enum('Y','N') DEFAULT 'N',
  `tokencode` varchar(145) DEFAULT NULL,
  `userProfile` varchar(1145) NOT NULL DEFAULT 'profile-red.png',
  `uniqueID` varchar(145) DEFAULT NULL,
  `account_status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `employeeId`, `userPosition`, `userFirst_Name`, `userMiddle_Name`, `userLast_Name`, `userPhone_Number`, `userEmail`, `userPassword`, `userStatus`, `tokencode`, `userProfile`, `uniqueID`, `account_status`, `created_at`, `updated_at`) VALUES
(197, '20183473', 'WEB DEVS', 'JASMINE', 'JIMENEZ', 'DABU', '9776621929', 'gadmonitoring4b@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'Y', 'b3c2dc375edf8a69d45bcbeac8f805a5', 'avatar-3.jpg', '68414511', 'active', '2022-07-05 11:39:33', '2022-10-19 11:58:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `guidelines_39165366`
--
ALTER TABLE `guidelines_39165366`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `guidelines_87434096`
--
ALTER TABLE `guidelines_87434096`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadminId`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `system_logo`
--
ALTER TABLE `system_logo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userId` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guidelines_39165366`
--
ALTER TABLE `guidelines_39165366`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guidelines_87434096`
--
ALTER TABLE `guidelines_87434096`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadminId` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `system_config`
--
ALTER TABLE `system_config`
  MODIFY `Id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_logo`
--
ALTER TABLE `system_logo`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `activityId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
