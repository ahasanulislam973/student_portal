-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 07:35 AM
-- Server version: 10.4.17-MariaDB-log
-- PHP Version: 7.4.14

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `mobile`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Leon', '01774382608', 'ahasanulislam973gmail.com', 'Rangpur', 'Active', 0, 0, NULL, NULL),
(2, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(3, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(4, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(5, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(7, 'Md. Ahasanul Islam', '01774382608', 'mdahasanulislam.leon', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(8, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(9, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(10, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(11, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(12, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(16, 'Md. Ahasanul Islam', '01774382608', 'mdahasanulislam.leon', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(18, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(19, 'Md. Ahasanul Islam', '01774382608', 'mdahasanulislam.leon', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(20, 'Md. Ahasanul Islam', '01774382608', 'eiman@gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(27, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(28, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(29, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973gmail.com', 'Dhaka', 'Active', 0, 0, NULL, NULL),
(32, 'Md. Ahasanul Islam', '01774382608', 'ahasanul@gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(35, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam973@gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(36, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam97@gmail.com', 'FARIDPUR', 'Active', 0, 0, NULL, NULL),
(40, 'Md. Ahasanul Islam', '01774382608', 'ahasanulislam97@gmail.com', 'sylhet', 'Active', 0, 0, '2023-01-11 11:17:41', '2023-01-11 11:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `status` enum('Active','EnActive') DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `user_name`, `password`, `mobile`, `email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Leon', 'leon', '12345', '01774382608', 'leon@gmail.com', 'Active', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
