-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 04:34 PM
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
-- Table structure for table `tbl_revisions`
--

CREATE TABLE `tbl_revisions` (
  `revID` int(11) NOT NULL,
  `revTitle` varchar(100) NOT NULL,
  `revDesc` varchar(255) NOT NULL,
  `revFile` varchar(100) NOT NULL,
  `revSize` int(11) NOT NULL,
  `revType` varchar(10) NOT NULL,
  `revStatus` enum('Active','Draft') NOT NULL DEFAULT 'Active',
  `docID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_revisions`
--

INSERT INTO `tbl_revisions` (`revID`, `revTitle`, `revDesc`, `revFile`, `revSize`, `revType`, `revStatus`, `docID`, `userID`) VALUES
(4, 'test', 'revision test', '60238-SysPrgLab4.doc', 54, 'applicatio', 'Active', 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_revisions`
--
ALTER TABLE `tbl_revisions`
  ADD PRIMARY KEY (`revID`),
  ADD UNIQUE KEY `revID` (`revID`),
  ADD KEY `docID` (`docID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_revisions`
--
ALTER TABLE `tbl_revisions`
  MODIFY `revID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
