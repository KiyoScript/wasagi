-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2023 at 04:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wasagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` datetime NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `image`, `password`, `gender`, `birthdate`, `age`, `address`, `mobile_number`) VALUES
(1, 'Johns', 'sLloyd', 'de Sape', 'johnlloyddesape@gmail.com', '../upload/657097759423d_download.png', '$2y$10$mIeduRigoFEtCLZoQpqbeO/LU0K4cX6/oqRursbyeSLuqYKsRP36e', 'male', '1920-01-01 00:00:00', 17, 'Blk. 6, Brgy. Tambulilid', '09502512438'),
(3, 'Indira', 'Chandler Briggs', 'Bolton', 'zipapivi@mailinator.com', NULL, '$2y$10$KacIsmmD2lOctU0CB1gbcu7xuPibbPh.9BbVwKma1.R1ai1xjs.H6', 'male', '2014-04-09 00:00:00', 52, 'Quisquam iusto nemo ', '507'),
(4, 'Karina', 'Dominique Calderon', 'Watkins', 'qikuhuj@mailinator.com', NULL, '$2y$10$Ge4QSyIJLnGIS6yR6iJTs.S7BdcMGtT1dqdLDs/qy4GbiOXNKjU9C', 'male', '2002-06-22 00:00:00', 68, 'Sint tenetur expedit', '654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
