-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2022 at 11:46 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ochms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

DROP TABLE IF EXISTS `appoinment`;
CREATE TABLE IF NOT EXISTS `appoinment` (
  `pat_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `hospital_name` varchar(100) DEFAULT NULL,
  KEY `fk_app` (`pat_id`),
  KEY `fkapp1` (`doc_id`),
  KEY `fkapp2` (`hos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinment`
--

INSERT INTO `appoinment` (`pat_id`, `doc_id`, `hos_id`, `date`, `time`, `status`, `doctor_name`, `hospital_name`) VALUES
(1, 101, 1111, '2022-11-12', '11:11:00', 'pending', ' Shamila', ' Cresent Hospital'),
(1, 101, 1112, '2022-11-12', '00:11:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 103, 1112, '2022-11-12', '11:13:00', 'pending', ' Manivasaham', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital'),
(1, 101, 1112, '2022-11-12', '00:25:00', 'pending', ' Shamila', ' Selvam Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `cadmin`
--

DROP TABLE IF EXISTS `cadmin`;
CREATE TABLE IF NOT EXISTS `cadmin` (
  `id` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cadmin`
--

INSERT INTO `cadmin` (`id`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(256) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `education` varchar(256) NOT NULL,
  `specialist` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `hos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `fk_hos` (`hos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `gender`, `phno`, `email`, `education`, `specialist`, `password`, `hos_id`) VALUES
(101, 'Shamila', 'female', 9865432187, 'drshamila@gmail.com', 'MBBS.MD,DGO', 'Meternal-fetal medicine specialist', 'shamila123', 1111),
(102, 'Fahim', 'male', 9876542334, 'drfahim@gmail.com', 'MBBS,MD', 'pediatrician', 'fahim123', 1111),
(103, 'Manivasaham', 'male', 9865537692, 'drmani@gmail.com', 'MBBS,MD', 'pediatrician', 'mani123', 1112),
(104, 'Meena', 'female', 9876543218, 'drmeena@gmail.com', 'MBBS,MD,DGO', 'Meternal-fetal Medicine Specialist', 'meena123', 1112);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_id_list`
--

DROP TABLE IF EXISTS `doctor_id_list`;
CREATE TABLE IF NOT EXISTS `doctor_id_list` (
  `s.no` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  PRIMARY KEY (`s.no`),
  UNIQUE KEY `doc_id` (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_id_list`
--

INSERT INTO `doctor_id_list` (`s.no`, `doc_id`) VALUES
(38, 101),
(39, 102),
(40, 103),
(41, 104),
(42, 105),
(43, 106),
(44, 107),
(45, 108),
(46, 109);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timing`
--

DROP TABLE IF EXISTS `doctor_timing`;
CREATE TABLE IF NOT EXISTS `doctor_timing` (
  `doc_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(10) NOT NULL,
  KEY `fk_docid` (`doc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `email`, `phno`, `password`, `address`) VALUES
(1111, 'Cresent Hospital', 'cresent@gmail.com', 9637327053, 'cresent', 'Nethaji road, Melapalayam'),
(1112, 'Selvam Hospital', 'selvam@gmail.com', 8754238756, 'selvam123', 'Nethaji road, Melapalayam'),
(1116, 'Cresent Hospital', 'hoscr@gmal.com', 1234567890, 'cresent123', 'Nethaji road, Melapalayam');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_list`
--

DROP TABLE IF EXISTS `hospital_list`;
CREATE TABLE IF NOT EXISTS `hospital_list` (
  `s.no` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) NOT NULL,
  PRIMARY KEY (`s.no`),
  UNIQUE KEY `hospital_id` (`hospital_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_list`
--

INSERT INTO `hospital_list` (`s.no`, `hospital_id`) VALUES
(21, 1111),
(22, 1112),
(23, 1113),
(24, 1114),
(25, 1115),
(26, 1116);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(256) NOT NULL,
  `date_of_birth` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `date_of_birth`, `height`, `weight`, `blood_group`, `gender`, `mobile_no`, `password`) VALUES
(1, 'Raj', '2000-03-10', 140, 60, 'B+', 'male', 9023459832, 'raj1234'),
(2, 'Sam', '1998-08-10', 165, 70, 'B-', 'male', 9843783267, 'sam1234'),
(3, 'Abdullah', '2000-09-10', 170, 65, 'o+', 'male', 9034981232, 'abd1234');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `pat_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `blood_pressure` int(11) NOT NULL,
  `disease` varchar(500) NOT NULL,
  `medicine` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `patient_name` varchar(100) DEFAULT NULL,
  `hospital_name` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  KEY `fkt1` (`doc_id`),
  KEY `fkt2` (`pat_id`),
  KEY `fkt3` (`hos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`pat_id`, `doc_id`, `hos_id`, `blood_pressure`, `disease`, `medicine`, `description`, `date_time`, `patient_name`, `hospital_name`, `doctor_name`) VALUES
(1, 101, 1111, 155, 'Stomach pain', 'pandakind', 'take 1 dose after breakfast', '2022-11-11 21:29:27', 'Raj', 'Cresent Hospital', 'Shamila'),
(2, 102, 1111, 78, 'headache and body pain', 'neuropian and zeradal-p', 'take one dose of zeradal-p and 2 doses for 3 days of neuropian', '2022-11-11 21:43:01', 'Sam', 'Cresent Hospital', 'Fahim');

-- --------------------------------------------------------

--
-- Table structure for table `working_hos_doc`
--

DROP TABLE IF EXISTS `working_hos_doc`;
CREATE TABLE IF NOT EXISTS `working_hos_doc` (
  `doc_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
