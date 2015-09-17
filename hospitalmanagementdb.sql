-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2015 at 09:23 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospitalmanagementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JobType` enum('Doctor','Nurse','ticketStaff','Staff') NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Photo` varchar(255) NOT NULL DEFAULT 'male.png',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `JobType`, `Name`, `Salary`, `Gender`, `Experience`, `Qualification`, `ContactNo`, `Timestamp`, `Photo`) VALUES
(1, 'Doctor', 'Ishan Madhusanka', 20000, 'Male', 'No prior experience', 'Doctor', '0716451456', '2015-09-09 11:06:42', 'male.png'),
(2, 'Nurse', 'Urenika Venus', 20000, 'Female', 'none', 'none', 'n/a', '2015-09-09 20:05:55', 'female.png'),
(3, 'ticketStaff', 'Mahara Nimnetha', 20000, 'Male', 'none', 'none', 'none', '2015-09-09 20:11:00', 'male.png'),
(4, 'Staff', 'Manahara Sithaga', 20000, 'Male', 'none', 'none', 'none', '2015-09-09 20:11:00', 'male.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee_staff_other`
--

CREATE TABLE IF NOT EXISTS `employee_staff_other` (
  `EmpID` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_staff_other`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee_staff_ticketing`
--

CREATE TABLE IF NOT EXISTS `employee_staff_ticketing` (
  `EmpID` int(11) NOT NULL,
  `RecordType` enum('OPD','IPD') NOT NULL,
  `RecordID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_staff_ticketing`
--


-- --------------------------------------------------------

--
-- Table structure for table `lab_equipment`
--

CREATE TABLE IF NOT EXISTS `lab_equipment` (
  `equipmentID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Availability` enum('available','outofstock') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_equipment`
--


-- --------------------------------------------------------

--
-- Table structure for table `lab_medicines`
--

CREATE TABLE IF NOT EXISTS `lab_medicines` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Availability` enum('available','outofstock') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_medicines`
--


-- --------------------------------------------------------

--
-- Table structure for table `lab_reports`
--

CREATE TABLE IF NOT EXISTS `lab_reports` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lab_reports`
--

INSERT INTO `lab_reports` (`typeId`, `Name`, `Description`) VALUES
(1, 'Blood Report', 'Report on Blood Samples'),
(2, 'ECG Report', 'ECG report for a patient');

-- --------------------------------------------------------

--
-- Table structure for table `lab_treatment`
--

CREATE TABLE IF NOT EXISTS `lab_treatment` (
  `treatmentId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`treatmentId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_treatment`
--


-- --------------------------------------------------------

--
-- Table structure for table `patient_equipments`
--

CREATE TABLE IF NOT EXISTS `patient_equipments` (
  `PatientID` int(11) NOT NULL,
  `EquitmentId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_equipments`
--


-- --------------------------------------------------------

--
-- Table structure for table `patient_labreports`
--

CREATE TABLE IF NOT EXISTS `patient_labreports` (
  `PatientID` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL AUTO_INCREMENT,
  `report_type` int(11) NOT NULL,
  `status` enum('pending','ready') NOT NULL,
  PRIMARY KEY (`serial_no`),
  UNIQUE KEY `serial_no` (`serial_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `patient_labreports`
--

INSERT INTO `patient_labreports` (`PatientID`, `serial_no`, `report_type`, `status`) VALUES
(728234892, 1, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicines`
--

CREATE TABLE IF NOT EXISTS `patient_medicines` (
  `PatientID` int(11) NOT NULL,
  `MedicineID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_medicines`
--


-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment`
--

CREATE TABLE IF NOT EXISTS `patient_treatment` (
  `PatientID` int(11) NOT NULL,
  `TreatmentID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_treatment`
--


-- --------------------------------------------------------

--
-- Table structure for table `records_ipd`
--

CREATE TABLE IF NOT EXISTS `records_ipd` (
  `RecordId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `PatientId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `Time_Admitted` datetime NOT NULL,
  `Time_Discharged` datetime DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `records_ipd`
--

INSERT INTO `records_ipd` (`RecordId`, `empId`, `PatientId`, `Name`, `Age`, `Gender`, `Photo`, `Address`, `Comments`, `Time_Admitted`, `Time_Discharged`) VALUES
(1, 1, 728234892, 'John Doe', 73, 'Male', 'patient0001.png', '60, ABC road, Kandy', 'fine', '2015-09-05 10:26:58', '2015-09-26 10:27:02'),
(2, 1, 241234234, 'Black Smith', 45, 'Male', 'patient0001.png', 'Pera Road, Amunuwa', 'critical', '2015-09-05 10:26:58', NULL),
(3, 1, 2147483647, 'Black White', 34, 'Female', 'patient0001.png', 'Pera Road, Amunuwa', 'nothing special', '2015-09-05 10:26:58', NULL),
(4, 1, 2147483647, 'John Smith', 43, 'Male', 'patient0001.png', '60, Ambagahatenna, Rakawa', 'pale white', '2015-09-05 10:26:58', NULL),
(5, 1, 982734987, 'Inpatient Admitania', 45, 'Male', 'patient0001.png', '343, Ela Lane, Ella', '--', '2015-09-05 10:26:58', NULL),
(6, 1, 0, '', 18, 'Male', 'patient0001.png', '', '', '2015-09-05 10:26:58', NULL),
(7, 1, 0, '', 0, 'Male', 'patient0001.png', '', '', '2015-09-05 10:26:58', NULL),
(8, 1, 921941633, 'Ishan Madhusanka', 23, 'Male', 'patient0001.png', '123, ABC city, BC ', 'not critical', '2015-09-05 10:26:58', NULL),
(9, 1, 12341324, 'adsf asdfadsf', 12, 'Male', '55f00316ad052.png', 'qer', ' adsfasdf ', '2015-09-05 10:26:58', NULL),
(10, 1, 921941633, 'Ishan Madhusanka', 23, 'Male', '55f003413a0df.png', 'my address', 'and the comments', '2015-09-05 10:26:58', NULL),
(11, 1, 234234, 'Diga', 23, 'Male', '55f2b7dfac532.png', 'asdf', 'no comments', '2015-09-05 10:26:58', NULL),
(12, 1, 9293487, 'Hari Diga', 23, 'Male', '55f2b8601b87c.png', 'Address', 'no comments', '2015-09-05 10:26:58', NULL),
(13, 1, 93989871, 'Asela Rukmal', 66, 'Male', '55f6ab94bfe4e.png', 'Address', 'Comments', '2015-09-05 10:26:58', NULL),
(14, 1, 93989871, 'Asela Rukmal', 66, 'Male', '55f6abd16678b.png', 'Address', 'Comments', '2015-09-05 10:26:58', NULL),
(15, 1, 93989871, 'Asela Rukmal', 66, 'Male', '55f6abe964f86.png', 'Address', 'Comments', '2015-09-05 10:26:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `records_opd`
--

CREATE TABLE IF NOT EXISTS `records_opd` (
  `RecordId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `status` enum('waiting','served') NOT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `records_opd`
--

INSERT INTO `records_opd` (`RecordId`, `empId`, `Name`, `Age`, `Gender`, `status`) VALUES
(1, 1001, 'John Doe', 24, 'Male', 'waiting'),
(2, 1001, 'Black Smith', 49, 'Male', 'waiting'),
(3, 1001, 'White Smith', 46, 'Female', 'served'),
(4, 1001, 'Black Smith', 49, 'Male', 'waiting'),
(5, 1001, 'White Smith', 46, 'Female', 'served'),
(6, 0, 'Boston', 24, 'Male', 'waiting'),
(7, 0, 'Boston', 24, 'Male', 'waiting'),
(8, 0, 'Boston', 24, 'Male', 'waiting'),
(9, 1, 'Mr. Patient', 34, 'Male', 'waiting'),
(10, 1, 'Mrs. Patient', 32, 'Female', 'waiting'),
(11, 1, 'Another Mrs. Patient', 37, 'Female', 'waiting'),
(12, 1, 'L. Eda', 60, 'Male', 'waiting'),
(13, 1, 'L. Eda', 60, 'Male', 'waiting'),
(14, 1, 'Knadk Nakti', 34, 'Male', 'waiting'),
(16, 1, 'Amal Perera', 80, 'Male', 'waiting'),
(17, 1, 'Amali Perera', 80, 'Female', 'waiting'),
(18, 1, 'Nihal Perera', 21, 'Male', 'waiting'),
(19, 1, 'Nipuni Bhagya', 72, 'Female', 'waiting'),
(20, 1, 'Test patient', 45, 'Male', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `stafftasks`
--

CREATE TABLE IF NOT EXISTS `stafftasks` (
  `TaskID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`TaskID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stafftasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE IF NOT EXISTS `ward` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` int(11) NOT NULL,
  `Doctor` int(11) NOT NULL,
  `Nurse` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ward`
--


-- --------------------------------------------------------

--
-- Table structure for table `ward_type`
--

CREATE TABLE IF NOT EXISTS `ward_type` (
  `typeId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward_type`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
