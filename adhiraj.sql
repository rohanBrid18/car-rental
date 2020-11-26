-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 03:57 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adhiraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE IF NOT EXISTS `admin_log` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `Reg_no` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`time`, `status`, `Reg_no`) VALUES
('2018-10-25 12:58:55', 'New Car Added', ''),
('2018-10-25 13:03:01', 'New Car Added', ''),
('2018-10-25 13:05:37', 'New Car Added', 'abc1900'),
('2018-10-25 13:09:26', 'Car Removed', 'abc1700'),
('2018-10-27 14:15:25', 'Car Removed', 'ABC257'),
('2018-11-01 08:53:46', 'Car Removed', 'abc300'),
('2018-12-17 09:04:37', 'New Car Added', 'abc2000'),
('2018-12-17 09:06:46', 'Car Removed', 'abc2000'),
('2018-12-17 09:07:24', 'New Car Added', 'abc2000'),
('2018-12-17 09:08:31', 'New Car Added', 'abc2100'),
('2018-12-17 09:09:54', 'New Car Added', 'abc2200');

-- --------------------------------------------------------

--
-- Table structure for table `book_car`
--

DROP TABLE IF EXISTS `book_car`;
CREATE TABLE IF NOT EXISTS `book_car` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `source` varchar(300) NOT NULL,
  `dest` varchar(300) NOT NULL,
  `start_time` varchar(40) NOT NULL,
  `end_time` varchar(40) NOT NULL,
  `round_trip` varchar(5) NOT NULL,
  `tot_dist` double NOT NULL,
  `tot_amt` double NOT NULL,
  `driver` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_car`
--

INSERT INTO `book_car` (`book_id`, `email`, `reg_no`, `source`, `dest`, `start_time`, `end_time`, `round_trip`, `tot_dist`, `tot_amt`, `driver`) VALUES
(56, 'bridrohan1122@gmail.com', 'abc500', 'Seawoods, Navi Mumbai, Maharashtra, India', 'Vashi, Navi Mumbai, Maharashtra, India', '09/11/2018 14:00', '09/11/2018 17:00', '1', 14, 168, '46f46e1fgr'),
(57, 'manoharsawant4944@gmail.com', 'abc700', '136, Karad - Chiplun Rd, Gandhi Nagar, Sunshine Colony, Dali Colony, Chiplun, Maharashtra 415605, India', 'Guhagar, Maharashtra, India', '10/11/2018 8:00', '10/11/2018 21:00', '1', 76, 1900, '46f46e1fgr'),
(52, 'bridrohan1122@gmail.com', 'abc400', '3, Sector 46 A, Seawoods, Navi Mumbai, Maharashtra 400706, India', 'Vashi, Navi Mumbai, Maharashtra, India', '06/11/2018 7:00', '06/11/2018 20:00', '0', 7, 84, '56ger4646'),
(58, 'bridrohan1122@gmail.com', 'abc400', 'Shop No.2,Ramtirth Aprt,Sector-44A,Seawood,Nerul(W)., Navi Mumbai, Maharashtra 400706, India', 'Plot No.24, Sector No.15, Sion - Panvel Expy, Gharkul, Sector 15, Kharghar, Navi Mumbai, Maharashtra 410210, India', '29/11/2018 11:00', '01/12/2018 15:00', '1', 14, 168, '46f46e1fgr'),
(54, 'bridrohan1122@gmail.com', 'abc1400', 'Seawoods, Navi Mumbai, Maharashtra, India', 'Panvel, Navi Mumbai, Maharashtra, India', '07/11/2018 9:00', '07/11/2018 12:00', '1', 20, 300, '46f46e1fgr'),
(55, 'bridrohan1122@gmail.com', 'abc500', 'D-8, Sector-48, Seawoods, Navi Mumbai, Maharashtra 400706, India', 'Bandra East, Mumbai, Maharashtra, India', '07/11/2018 11:00', '07/11/2018 13:00', '0', 18, 216, '46f46e1fgr'),
(63, 'bridrohan1122@gmail.com', 'abc2000', 'Mumbai, Maharashtra, India', 'Jodhpur, Rajasthan, India', '26/12/2018 11:00', '29/12/2018 16:00', '0', 797, 19425, '46g4st16sf'),
(64, 'bridrohan1122@gmail.com', 'abc700', 'D-8, Sector-48, Seawoods, Navi Mumbai, Maharashtra 400706, India', 'Sector- 5, Kalamboli, Panvel, Navi Mumbai, Maharashtra 410218, India', '13/01/2019 7:00', '17/01/2019 17:00', '1', 18, 5000, '87fsd4f5g4');

--
-- Triggers `book_car`
--
DROP TRIGGER IF EXISTS `booking_cancelled`;
DELIMITER $$
CREATE TRIGGER `booking_cancelled` AFTER DELETE ON `book_car` FOR EACH ROW BEGIN
	INSERT INTO `book_log` (book_time, status, email, reg_no) VALUES (CURRENT_TIMESTAMP, 'Booking Cancelled', old.email, old.reg_no);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `car_booked`;
DELIMITER $$
CREATE TRIGGER `car_booked` AFTER INSERT ON `book_car` FOR EACH ROW BEGIN
	INSERT INTO `book_log` (book_time, status, email, reg_no) VALUES (CURRENT_TIMESTAMP, 'Car Booked', new.email, new.reg_no);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_log`
--

DROP TABLE IF EXISTS `book_log`;
CREATE TABLE IF NOT EXISTS `book_log` (
  `book_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `reg_no` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_log`
--

INSERT INTO `book_log` (`book_time`, `status`, `email`, `reg_no`) VALUES
('2018-12-17 18:04:13', 'Car Booked', 'bridrohan1122@gmail.com', 'abc2000'),
('2018-12-17 18:08:42', 'Booking Cancelled', 'bridrohan1122@gmail.com', 'abc2100');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `name` varchar(40) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `seats` int(11) NOT NULL,
  `base_fare` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `puc_expiry` date DEFAULT NULL,
  `ins_expiry` date DEFAULT NULL,
  `permit` varchar(100) DEFAULT NULL,
  `fitness` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`name`, `reg_no`, `category`, `seats`, `base_fare`, `price`, `image`, `puc_expiry`, `ins_expiry`, `permit`, `fitness`) VALUES
('Maruti WagonR', 'abc100', 'Hatchback', 5, 1000, 12, 'wagonR.jpg', NULL, NULL, NULL, NULL),
('Hyundai Xcent', 'abc200', 'Sedan', 5, 3000, 15, 'xcent.jpg', NULL, NULL, NULL, NULL),
('Maruti Baleno', 'abc400', 'Hatchback', 5, 1000, 12, 'baleno.jpg', NULL, NULL, NULL, NULL),
('Hyundai i20', 'abc500', 'Hatchback', 5, 1000, 12, 'i20.jpg', NULL, NULL, NULL, NULL),
('TATA Indigo', 'abc600', 'Sedan', 5, 3000, 15, 'indigo.png', NULL, NULL, NULL, NULL),
('Toyota Innova', 'abc700', 'SUV', 8, 5000, 20, 'innova.jpg', NULL, NULL, NULL, NULL),
('Maruti Dzire', 'abc800', 'Sedan', 5, 3000, 15, 'Dzire.jpg', NULL, NULL, NULL, NULL),
('Maruti Celerio', 'abc1000', 'Hatchback', 5, 1000, 12, 'celerio.jpg', NULL, NULL, NULL, NULL),
('Maruti Baleno', 'abc1300', 'Hatchback', 5, 1000, 12, 'baleno.jpg', NULL, NULL, NULL, NULL),
('Hyundai Xcent', 'abc1400', 'Sedan', 5, 3000, 15, 'xcent.jpg', NULL, NULL, NULL, NULL),
('Maruti Ertiga', 'abc1500', 'SUV', 8, 5000, 20, 'ertiga.png', NULL, NULL, NULL, NULL),
('Maruti Celerio', 'abc1600', 'Hatchback', 5, 1000, 12, 'celerio.jpg', NULL, NULL, NULL, NULL),
('Toyota Innova', 'abc1800', 'SUV', 8, 5000, 20, 'innova.jpg', NULL, NULL, NULL, NULL),
('Maruti Celerio', 'abc1900', 'Hatchback', 5, 1000, 12, 'celerio.jpg', NULL, NULL, NULL, NULL),
('Traveller', 'abc2000', 'Mini Bus', 15, 7000, 25, '15.jpg', NULL, NULL, NULL, NULL),
('Traveller', 'abc2100', 'Mini Bus', 20, 10000, 30, '20.jpg', NULL, NULL, NULL, NULL),
('Bus', 'abc2200', 'Bus', 40, 15000, 40, '40.png', NULL, NULL, NULL, NULL);

--
-- Triggers `cars`
--
DROP TRIGGER IF EXISTS `add_car`;
DELIMITER $$
CREATE TRIGGER `add_car` AFTER INSERT ON `cars` FOR EACH ROW BEGIN
	INSERT INTO `admin_log` (time, status, Reg_no) VALUES (now(), 'New Car Added', NEW.reg_no);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `remove_car`;
DELIMITER $$
CREATE TRIGGER `remove_car` AFTER DELETE ON `cars` FOR EACH ROW BEGIN
	INSERT INTO `admin_log` (time, status, Reg_no) VALUES (now(), 'Car Removed', OLD.reg_no);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `name` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(80) NOT NULL,
  `license_no` varchar(20) NOT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'driver.png',
  `start_date` varchar(40) DEFAULT NULL,
  `end_date` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`license_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`name`, `phone`, `address`, `license_no`, `pan_no`, `aadhar_no`, `image`, `start_date`, `end_date`) VALUES
('abc', '2345796146', 'ncadnfkfakvndksnvekdscsfbgf', '46f46e1fgr', NULL, NULL, 'driver.png', '07/11/2018 9:00', '07/11/2018 12:00'),
('def', '3246971764', 'jiweifweicjoajvofbrojgefczivhf', '46g4st16sf', NULL, NULL, 'driver.png', NULL, NULL),
('xyz', '8976142144', 'jldfjlasjclnckdwkelfsdlvzxsqa', '87fsd4f5g4', NULL, NULL, 'driver.png', '13/01/2019 7:00', '17/01/2019 17:00'),
('mei karke aaya', '6969696969', 'mcjfejfeowjfcodcaocoorvnrofockavorberpremvpojcoewgteoj', '4ew6wer7', '', '', 'driver2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone`, `email`, `password`) VALUES
('chetan ade', '8108069055', 'chetan.ade98@gmail.com', '$2y$10$Tf8HqZsJEK5IsfwY4UAAKu2QWrqQZ2AYx.U6H8toX1aBWjoNa12ze'),
('vivek', '9876543212', 'vivekbhanu@gmail.com', '$2y$10$nftTmeFky84yPKOkk6m6q.qDCdGUTFuN0CZffSnhEOjAnwV1b4LxW'),
('Rohan Brid', '917506190431', 'bridrohan1122@gmail.com', '$2y$10$i8NAVFuaG7R/e0TkiYAHB.w9i79E4/MjfcUOAVr6g7FMGVkkokg4C'),
('Chetan Ade', '8108069055', 'chetan.ade16@siesgst.ac.in', '$2y$10$9UbLFO2Zjuh2zsgIRcZbBe4EXrU1OK7knVCmXTzNJh4blnPfOXfne'),
('Sahil Brid', '9867984158', 'sahilbridcoc1@gmail.com', '$2y$10$qOmxt0NMctoAk66HWgJaR.LrYXPDNWrDCyplUJsEXR/BKCz9mm3du'),
('jayant', '8108069055', 'saijayant98@gmail.com', '$2y$10$Znos5std6HjOKRxt7IzwVutYfZoeYyowu4TzEKoqKQAQSK6ag0EGW'),
('Rohan', '9869240334', 'rohan@gmail.com', '$2y$10$tNCf9wi6IpFjg711qcfws.biUUxWiOTudOxGPblqaXhqVKKsODWXe'),
('chinmay', '7894561230', 'chinmay.chandak16@siesgst.ac.in', '$2y$10$32mHW61aSeYahc52205Jq.FFdbk8YmqnJK46.cHQhjZRogU0oS/KW'),
('Sumant Brid', '919869240334', 'sumantbrid@gmail.com', '$2y$10$1ImyoVeY0aXi04zJAxAxyOWo7EQLi77vvYlDo/KGPLM0fmdAaCLha'),
('Rajesh M Sawant', '917219473753', 'manoharsawant4944@gmail.com', '$2y$10$6LMKTS2C2KGs8O7pxq2sfOx2N8RRREiWRIEJcVnLKmfdC.LBGzfNW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
