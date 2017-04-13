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
(24, 'To Do', 'To do list for next week', '0000-00-00 00:00:00', '2017-04-11 11:43:48', '92417-one.docx', 'applicatio', 13, 'Draft', 1),
(25, 'Last weeks Figures', 'Figures for the whole company', '0000-00-00 00:00:00', '2017-04-11 11:30:53', '88517-two.docx', 'applicatio', 12, 'Active', 1),
(26, 'Project Proposal', 'Needs finishing touches added - do not submit', '0000-00-00 00:00:00', '2017-04-11 11:22:03', '50122-three.docx', 'applicatio', 12, 'Draft', 18),
(27, 'Plans for next weeks meeting', 'meeting being held next week agenda', '0000-00-00 00:00:00', '2017-04-11 11:24:13', '27112-five.docx', 'applicatio', 12, 'Draft', 18),
(28, 'Meeting notes for last week', 'Last weeks meeting notes', '0000-00-00 00:00:00', '2017-04-11 11:24:40', '53071-four.docx', 'applicatio', 12, 'Draft', 18),
(29, 'Meeting Notes', 'Meeting held two weeks ago', '0000-00-00 00:00:00', '2017-04-11 12:04:01', '95553-six.docx', 'applicatio', 12, 'Active', 1),
(30, 'Plan A', 'Plans for future development', '0000-00-00 00:00:00', '2017-04-11 11:27:18', '48545-seven.docx', 'applicatio', 12, 'Draft', 1),
(31, 'Notes from Conference Call', 'Notes taken for last weeks call - Do not delete', '0000-00-00 00:00:00', '2017-04-11 12:04:58', '46433-eight.docx', 'applicatio', 12, 'Active', 1),
(32, 'My Notes', 'Notes taken for lecture', '0000-00-00 00:00:00', '2017-04-11 11:28:59', '29617-nine.docx', 'applicatio', 13, 'Draft', 19),
(33, 'About my cat', 'All about Candy', '0000-00-00 00:00:00', '2017-04-11 11:29:22', '88571-ten.docx', 'applicatio', 13, 'Draft', 19),
(34, 'test', 'test', '0000-00-00 00:00:00', '2017-04-13 09:15:58', '91949-four.docx', 'applicatio', 12, 'Active', 1);

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
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
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
