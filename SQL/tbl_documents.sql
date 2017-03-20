-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 02:10 PM
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
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `docID` int(11) NOT NULL,
  `docTitle` varchar(100) NOT NULL,
  `docDesc` varchar(255) NOT NULL,
  `docCreateDate` datetime NOT NULL,
  `docLastChange` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `docFile` varchar(100) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `docSize` int(11) NOT NULL,
  `docStatus` enum('Draft','Active') NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`docID`, `docTitle`, `docDesc`, `docCreateDate`, `docLastChange`, `docFile`, `docType`, `docSize`, `docStatus`, `userID`) VALUES
(7, 'uplaod', 'uploadtest', '0000-00-00 00:00:00', '2017-03-08 17:48:40', '', '', 0, 'Active', 1),
(8, 'test', 'test', '0000-00-00 00:00:00', '2017-03-08 17:12:16', '', '', 0, 'Draft', 1),
(9, 'yayay', 'yayayayaydaisdh', '0000-00-00 00:00:00', '2017-03-12 21:34:32', '45708-sysprglab3.doc', 'applicatio', 60, 'Draft', 1),
(10, 'writing', 'shellnotes', '0000-00-00 00:00:00', '2017-03-12 21:36:33', '72933-writing-shell-scripts---notes.docx', 'applicatio', 20, 'Draft', 1),
(11, 'test', 'test', '0000-00-00 00:00:00', '2017-03-12 22:47:40', '61730-sys_prog_writeup.docx', 'applicatio', 491, 'Draft', 3),
(12, 'tester', 'uyfkf kugk uygkuy g', '0000-00-00 00:00:00', '2017-03-13 13:25:53', '27674-how-secure-is-fingerprint-recognition.docx', 'applicatio', 15, 'Draft', 1),
(13, 'free', 'free', '0000-00-00 00:00:00', '2017-03-14 23:44:33', '99874-SysPrgLab2.doc', 'applicatio', 50, 'Draft', 1),
(14, 'upppp', 'upppp', '0000-00-00 00:00:00', '2017-03-19 20:18:43', '44953-SysPrgLab4.doc', 'applicatio', 54, 'Draft', 1),
(15, 'sfuh', 'osidhhffoif', '0000-00-00 00:00:00', '2017-03-20 13:08:49', '58561-SysPrgLab4.doc', 'applicatio', 54, 'Draft', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `tbl_users_userID_fk` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD CONSTRAINT `tbl_users_userID_fk` FOREIGN KEY (`userID`) REFERENCES `tbl_users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
