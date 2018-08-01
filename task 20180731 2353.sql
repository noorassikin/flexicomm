-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.39-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema task
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ task;
USE task;

--
-- Table structure for table `task`.`activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`activity`
--

/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`,`activity`) VALUES 
 (13,'fadhil aizad');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;


--
-- Table structure for table `task`.`admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`,`admin_password`) VALUES 
 ('admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Table structure for table `task`.`chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`chat`
--

/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;


--
-- Table structure for table `task`.`employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`employee`
--

/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`,`employee_id`,`employee_password`,`employee_name`,`employee_department`,`employee_position`,`employee_email`,`employee_phoneno`,`employee_address`) VALUES 
 (1,'A01','password','Izzahtul Hanisah binti Ahamad','IT','IT Executive','izzah@flexcility.com','0145406713','Paragon'),
 (2,'A02','abc123','Noor Assikin binti Rosdi','IT','IT Executive','assikin@flexcility.com','0199448596','Paragon Tower'),
 (18,'FS01','1234','','','','','',''),
 (20,'A04','abc123','','','','','',''),
 (21,'FS04','password','Muhammad Syafiq Asyraf Salim','IT','Developer','syafiq@flexcility.com','0191234567','Cyberia Smarthomes'),
 (22,'FS02','password','','','','','','');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


--
-- Table structure for table `task`.`events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`events`
--

/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`,`title`,`color`,`start`,`end`) VALUES 
 (1,'Coding','#40E0D0','2018-06-05 00:00:00','2018-06-07 00:00:00');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


--
-- Table structure for table `task`.`highlight`
--

DROP TABLE IF EXISTS `highlight`;
CREATE TABLE `highlight` (
  `id_highlight` int(11) NOT NULL AUTO_INCREMENT,
  `highlight_date` date NOT NULL,
  `highlight_message` varchar(250) NOT NULL,
  `highlight_status` varchar(50) NOT NULL,
  `manager_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id_highlight`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`highlight`
--

/*!40000 ALTER TABLE `highlight` DISABLE KEYS */;
INSERT INTO `highlight` (`id_highlight`,`highlight_date`,`highlight_message`,`highlight_status`,`manager_id`) VALUES 
 (1,'0000-00-00','Grit in psychology is a positive, non-cognitive trait based on an individual\'s perseverance of effort combined with the passion for a particular long-term goal or end state (a powerful motivation to achieve an objective). This perseverance of effort ','Manager','1234'),
 (3,'2018-07-30','Definition and Usage. The selected attribute is a boolean attribute. When present, it specifies that an option should be pre-selected when the page loads.','Important','1234'),
 (16,'2018-07-30','private sector','All','1234');
/*!40000 ALTER TABLE `highlight` ENABLE KEYS */;


--
-- Table structure for table `task`.`manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id` varchar(100) NOT NULL,
  `manager_password` varchar(100) NOT NULL,
  `manager_name` varchar(250) NOT NULL,
  `manager_email` varchar(50) NOT NULL,
  `manager_phoneno` varchar(15) NOT NULL,
  `manager_address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`manager`
--

/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` (`id`,`manager_id`,`manager_password`,`manager_name`,`manager_email`,`manager_phoneno`,`manager_address`) VALUES 
 (3,'1234','abc123','faiez','faiez@flexcility.com','0199448596','Kampung Bangi'),
 (7,'E01','1234','','','',''),
 (11,'DFS01','password','Zaki','zaki@flexcility.com','0121234123','Cyberjaya');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;


--
-- Table structure for table `task`.`project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) NOT NULL,
  `project_description` varchar(250) NOT NULL,
  `project_date_created` date NOT NULL,
  `project_due_date` date NOT NULL,
  `project_status` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`project`
--

/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`project_id`,`project_name`,`project_description`,`project_date_created`,`project_due_date`,`project_status`) VALUES 
 (13,'SMS','Stock management system','2018-05-01','2018-07-24','Delayed'),
 (15,'FlexiTime','Attendance System','2018-06-01','2018-09-01','Completed'),
 (19,'CMMS','Computerized Maintenance Management System','2018-07-01','2018-12-31','Completed'),
 (20,'Grab Cikgu','Tuition Center','2018-07-27','2018-08-31','In Progress'),
 (21,'project1','Version1','2018-07-27','2018-08-24','In Progress'),
 (22,'Project Two','Two times two equals to four','2018-07-31','2018-08-03','In Progress');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


--
-- Table structure for table `task`.`sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_item` varchar(250) NOT NULL,
  `sales_company_details` varchar(250) NOT NULL,
  `sales_project_details` varchar(250) NOT NULL,
  `sales_project_value` varchar(100) NOT NULL,
  `sales_created` date NOT NULL,
  `sales_remark` varchar(250) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`sales`
--

/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`sales_id`,`sales_item`,`sales_company_details`,`sales_project_details`,`sales_project_value`,`sales_created`,`sales_remark`,`item_id`) VALUES 
 (26,'','a','b','14000','2018-07-03','s',2),
 (28,'','Alphaberry','WMS','650000','2018-07-05','',3),
 (30,'','DreamEDGE','SMS','50000','2018-07-05','',1);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;


--
-- Table structure for table `task`.`sales_items`
--

DROP TABLE IF EXISTS `sales_items`;
CREATE TABLE `sales_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`sales_items`
--

/*!40000 ALTER TABLE `sales_items` DISABLE KEYS */;
INSERT INTO `sales_items` (`item_id`,`item`) VALUES 
 (1,'Approached'),
 (2,'Appointment'),
 (3,'Quotation Sent'),
 (4,'Confirm Project');
/*!40000 ALTER TABLE `sales_items` ENABLE KEYS */;


--
-- Table structure for table `task`.`task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`task`
--

/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`task_id`,`task_title`,`task_status`,`task_created`,`task_due_date`,`task_description`,`task_comment`,`task_current_progress`,`project_id`,`employee_id`) VALUES 
 (15,'Software Detail Design (SDD)','Delayed','2018-07-25','2018-07-25','ERD','Database settled',NULL,13,'A01'),
 (17,'Update system design (FLOWCHART)','In Progress','2018-07-25','2018-07-31','','',NULL,15,'A01'),
 (18,'Review & testing System Demo','Delayed','2018-07-25','2018-07-28','','',NULL,15,'A02'),
 (20,'Front-end : Sites Module','In Progress','2018-07-25','2018-08-01','Cannot create new sites','SQL solved\r\nHTML changed',NULL,19,'FS04'),
 (22,'Product Sheet','Delayed','2018-07-04','2018-07-25','','',NULL,19,'A01');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;


--
-- Table structure for table `task`.`test_work`
--

DROP TABLE IF EXISTS `test_work`;
CREATE TABLE `test_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(200) NOT NULL,
  `sal` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`.`test_work`
--

/*!40000 ALTER TABLE `test_work` DISABLE KEYS */;
INSERT INTO `test_work` (`id`,`ename`,`sal`) VALUES 
 (1,'tom','100'),
 (2,'tom','200'),
 (3,'cikin','140'),
 (5,'cikin','120'),
 (6,'tom','50');
/*!40000 ALTER TABLE `test_work` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
