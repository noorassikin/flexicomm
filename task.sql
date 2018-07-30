-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 10:51 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `activity`) VALUES
(10, 'nama saya assikin'),
(13, 'fadhil aizad');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user`, `message`, `date`, `project_id`) VALUES
(1, '', 'nama', '2018-07-17 04:14:54 pm', 0),
(8, '', 'dada', '2018-07-17 04:18:59 pm', 6),
(9, '', 'dadada', '2018-07-17 04:19:36 pm', 6),
(10, 'A01', 'SAA', '2018-07-17 04:20:45 pm', 6),
(11, 'A01', 'nama', '2018-07-17 04:22:10 pm', 6),
(12, 'A01', 'fafafa', '2018-07-17 04:22:36 pm', 7);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(100) NOT NULL,
  `employee_password` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_department` varchar(50) NOT NULL,
  `employee_position` varchar(100) NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `employee_phoneno` varchar(20) NOT NULL,
  `employee_address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `employee_password`, `employee_name`, `employee_department`, `employee_position`, `employee_email`, `employee_phoneno`, `employee_address`) VALUES
(1, 'A01', 'abc123', 'ijah hanisah', 'IT', 'IT Executive', 'izzah@flexcility.com', '0191234567', 'Paragon Tower'),
(2, 'A02', 'abc123', 'cikin', 'IT', 'IT Executive', 'assikin@flexcility.com', '0199448596', 'Paragon Tower'),
(3, 'A03', 'abc123', 'zila', '', '', '', '', ''),
(7, 'A', 'abc123', 'm', 'n', 'b', 'v', 'c', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Coding', '#40E0D0', '2018-06-05 00:00:00', '2018-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id` varchar(100) NOT NULL,
  `manager_password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `manager_id`, `manager_password`) VALUES
(3, '1234', 'abc123'),
(4, '9632', 'abc123'),
(6, '9510', 'abc123'),
(7, 'E01', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) NOT NULL,
  `project_description` varchar(250) NOT NULL,
  `project_date_created` date NOT NULL,
  `project_due_date` date NOT NULL,
  `project_status` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `project_date_created`, `project_due_date`, `project_status`) VALUES
(6, 'Tutor ', 'Pusat Tuisyen', '2018-07-11', '2018-07-27', ''),
(7, 'SMS', 'Stock Management', '2018-07-03', '2018-07-31', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_item` varchar(250) NOT NULL,
  `sales_company_details` varchar(250) NOT NULL,
  `sales_project_details` varchar(250) NOT NULL,
  `sales_project_value` varchar(100) NOT NULL,
  `sales_created` date NOT NULL,
  `sales_remark` varchar(250) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_item`, `sales_company_details`, `sales_project_details`, `sales_project_value`, `sales_created`, `sales_remark`, `item_id`) VALUES
(26, '', 'a', 'b', '14000', '2018-07-03', 's', 2),
(28, '', 'Alphaberry', 'WMS', '650000', '2018-07-05', '', 3),
(30, '', 'DreamEDGE', 'SMS', '50000', '2018-07-05', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE IF NOT EXISTS `sales_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`item_id`, `item`) VALUES
(1, 'Approached'),
(2, 'Appointment'),
(3, 'Quotation Sent'),
(4, 'Confirm Project');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(255) NOT NULL,
  `task_status` varchar(100) NOT NULL,
  `task_created` date NOT NULL,
  `task_due_date` date NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_comment` varchar(250) NOT NULL,
  `task_current_progress` varchar(250) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_title`, `task_status`, `task_created`, `task_due_date`, `task_description`, `task_comment`, `task_current_progress`, `project_id`, `employee_id`) VALUES
(4, 'SDD', 'In Progress', '2018-07-14', '2018-07-18', ' information', 'c', NULL, 6, 'A01'),
(7, 'SRS', 'In Progress', '2018-07-15', '2018-07-27', 'Complicated', '', NULL, 7, 'A01'),
(11, 'Documentation', 'In Progress', '2018-07-15', '2018-07-27', 'dok siap', '', NULL, 7, 'A01'),
(12, 'SDD', 'Delayed', '2018-07-15', '2018-07-11', 'lack of info', '', NULL, 6, 'A02'),
(20, 'czczcz', 'In Progress', '2018-07-17', '2018-07-27', 'dada', '', NULL, 6, 'A01'),
(28, '$task_title', 'Delayed', '2018-07-17', '0000-00-00', '$task_description', '', NULL, 0, '$employee_id');

-- --------------------------------------------------------

--
-- Table structure for table `test_work`
--

CREATE TABLE IF NOT EXISTS `test_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(200) NOT NULL,
  `sal` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test_work`
--

INSERT INTO `test_work` (`id`, `ename`, `sal`) VALUES
(1, 'tom', '100'),
(2, 'tom', '200'),
(3, 'cikin', '140'),
(5, 'cikin', '120'),
(6, 'tom', '50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
