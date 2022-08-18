-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 04:21 AM
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
  `userProfile` varchar(1145) NOT NULL DEFAULT 'profile.png',
  `uniqueID` varchar(145) DEFAULT NULL,
  `account_status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `employeeId`, `userPosition`, `userFirst_Name`, `userMiddle_Name`, `userLast_Name`, `userPhone_Number`, `userEmail`, `userPassword`, `userStatus`, `tokencode`, `userProfile`, `uniqueID`, `account_status`, `created_at`, `updated_at`) VALUES
(197, '20183473', 'WEB DEVS', 'ANDREI', 'MANALANSAN', 'VISCAYNO', '9776621929', 'andreishania07012000@gmail.com', '8280cf6cf941dbabb5ebabf6a8016c0f', 'Y', 'b3c2dc375edf8a69d45bcbeac8f805a5', '277399615_569876624139676_2603790700276582101_n.jpg', '68414511', 'active', '2022-07-05 11:39:33', '2022-08-13 03:54:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
