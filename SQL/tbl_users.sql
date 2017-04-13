-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 08:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshburst`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userFirstName` varchar(100) NOT NULL,
  `userSurname` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `userRole` enum('Admin','Doc_Creator','Distributee') NOT NULL DEFAULT 'Doc_Creator'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userFirstName`, `userSurname`, `userEmail`, `userPass`, `userStatus`, `userRole`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '66827b01f019fbd4d61f7431dd84260dcfa58b71', 'Y', 'Admin'),
(18, 'heathz', 'Heather', 'Reid', 'heathz@gmail.com', 'd53652de63b26f2b99abfc5699fac10f3f95e1f7', 'Y', 'Doc_Creator'),
(19, 'jhall', 'James', 'Hall', 'james@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Y', 'Doc_Creator'),
(20, 'jackmcivor96', 'Jack', 'McIvor', 'jack96@yahoo.com', '596727c8a0ea4db3ba2ceceedccbacd3d7b371b8', 'Y', 'Doc_Creator'),
(21, 'chrissy', 'Christopher', 'Campbell', 'chris@sky.com', '711c73f64afdce07b7e38039a96d2224209e9a6c', 'N', 'Doc_Creator'),
(22, 'plafferty', 'Patrick', 'Lafferty', 'patrick@hotmail.com', 'cbb7353e6d953ef360baf960c122346276c6e320', 'N', 'Doc_Creator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
