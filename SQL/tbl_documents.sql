-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 08:24 PM
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
  `docVerify` enum('Verified','Unverified') NOT NULL DEFAULT 'Unverified',
  `docVerifiedBy` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`docID`, `docTitle`, `docDesc`, `docCreateDate`, `docLastChange`, `docFile`, `docType`, `docSize`, `docStatus`, `docVerify`, `docVerifiedBy`, `userID`) VALUES
(8, 'test', 'test', '0000-00-00 00:00:00', '2017-05-15 17:14:04', '', '', 0, 'Active', 'Verified', '', 1),
(9, 'yayay', 'yayayayaydaisdh', '0000-00-00 00:00:00', '2017-04-04 22:47:25', '45708-sysprglab3.doc', 'applicatio', 60, 'Draft', 'Unverified', '', 1),
(10, 'writing', 'shellnotes', '0000-00-00 00:00:00', '2017-03-12 21:36:33', '72933-writing-shell-scripts---notes.docx', 'applicatio', 20, 'Draft', 'Unverified', '', 1),
(12, 'tester', 'uyfkf kugk uygkuy g', '0000-00-00 00:00:00', '2017-04-07 21:45:43', '27674-how-secure-is-fingerprint-recognition.docx', 'applicatio', 15, 'Draft', 'Unverified', '', 1),
(13, 'free', 'free', '0000-00-00 00:00:00', '2017-03-28 19:09:50', '99874-SysPrgLab2.doc', 'applicatio', 50, 'Draft', 'Unverified', '', 1),
(15, 'sfuh', 'osidhhffoif', '0000-00-00 00:00:00', '2017-03-20 13:08:49', '58561-SysPrgLab4.doc', 'applicatio', 54, 'Draft', 'Unverified', '', 1),
(17, 'Test upload', 'This is a test upload for the document video', '0000-00-00 00:00:00', '2017-04-17 15:05:34', '50361-Testing.docx', 'applicatio', 12, 'Draft', 'Unverified', '', 1);

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
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
