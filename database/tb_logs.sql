-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 05:01 AM
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
-- Database: `rms`
--

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
(20, 'Customer andreishania07012000@gmail.com', 'andreishania07012000@gmail.com', 'Has successfully signed in', '2022-08-16 09:49:03 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`activityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `activityId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
