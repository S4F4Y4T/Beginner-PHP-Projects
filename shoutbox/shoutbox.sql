-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2022 at 04:16 AM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoutbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shout`
--

CREATE TABLE `tbl_shout` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `shout` text NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_shout`
--

INSERT INTO `tbl_shout` (`id`, `name`, `shout`, `time`) VALUES
(1, 'Safayat Mahmud', 'Hi', '10:14:16'),
(2, 'Parvez', 'Wassup Man', '10:14:28'),
(3, '', '', '10:14:30'),
(4, 'Safayat', 'Doing Good, wbu?', '10:14:46'),
(5, 'Parvez', 'I\'m good too', '10:15:00'),
(6, 'Safayat Mahmud', 'Sounds Great', '10:15:08'),
(7, 'Parvez', 'Yep', '10:15:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_shout`
--
ALTER TABLE `tbl_shout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_shout`
--
ALTER TABLE `tbl_shout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
