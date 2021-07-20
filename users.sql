-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 04:51 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `srno.` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `Balance` int(10) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`srno.`, `sender`, `receiver`, `Balance`, `date_time`) VALUES
(201, 'Anushka', 'Sonal', 100, '2021-05-16 21:58:32'),
(202, 'Mahi', 'Shiny', 200, '2021-07-18 17:44:58'),
(203, 'Anushka', 'Anjali', 200, '2021-07-18 17:47:37'),
(204, 'Manasvi', 'Lavanya', 600, '2021-07-19 14:21:34'),
(205, 'Manasvi', 'Anushka', 700, '2021-07-19 15:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `name` varchar(12) NOT NULL,
  `dest` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `cid` int(3) NOT NULL,
  `cName` varchar(20) NOT NULL,
  `E-mail` varchar(20) DEFAULT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`cid`, `cName`, `E-mail`, `Balance`) VALUES
(101, 'Manasvi', 'manasvi67@gmail.com', 8700),
(102, 'Mahi', 'mahi97@gmail.com', 7800),
(103, 'Ayushi', 'ayushi2@gmail.com', 9000),
(104, 'Shiny', 'shiny7@gmail.com', 6200),
(105, 'Anushka', 'anushka9@gmail.com', 4500),
(106, 'Anjali', 'anjali21@gmail.com', 5200),
(107, 'Bhumi', 'bhumi76@gmail.com', 2000),
(108, 'Juhi', 'juhi15@gmail.com', 3000),
(109, 'Sonal', 'sonal7@gmail.com', 5000),
(110, 'Lavanya', 'lavanya45@gmail.com', 6600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`srno.`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `E-mail` (`E-mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `srno.` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
