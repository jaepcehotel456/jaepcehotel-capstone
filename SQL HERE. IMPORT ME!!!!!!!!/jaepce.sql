-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 10:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaepce`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_rooms`
--

CREATE TABLE `available_rooms` (
  `avail_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `availability` enum('Available','Unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_rooms`
--

INSERT INTO `available_rooms` (`avail_id`, `room_id`, `room_number`, `availability`) VALUES
(1, 12, 201, 'Available'),
(2, 12, 202, 'Available'),
(3, 12, 203, 'Available'),
(4, 12, 204, 'Available'),
(5, 12, 205, 'Available'),
(6, 28, 305, 'Available'),
(7, 28, 304, 'Available'),
(8, 28, 303, 'Available'),
(9, 28, 302, 'Available'),
(10, 28, 301, 'Available'),
(11, 30, 405, 'Available'),
(12, 30, 404, 'Available'),
(13, 30, 403, 'Available'),
(14, 30, 402, 'Available'),
(15, 30, 401, 'Available'),
(16, 31, 501, 'Available'),
(17, 12, 206, 'Available'),
(18, 31, 502, 'Available'),
(19, 31, 503, 'Available'),
(20, 31, 504, 'Available'),
(21, 31, 505, 'Available'),
(22, 32, 601, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `discount` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `discount`, `status`) VALUES
(1, 'PRBQMT4QAB', 20, 'Valid'),
(2, 'PRJNWFB93T', 25, 'Valid'),
(3, 'PRM2938CD1', 12, 'Valid'),
(4, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `person_type` enum('guest','staff','manager','admin') NOT NULL,
  `gender` varchar(211) NOT NULL,
  `fname` varchar(211) NOT NULL,
  `midname` varchar(1) NOT NULL,
  `lname` varchar(211) NOT NULL,
  `email` varchar(211) NOT NULL,
  `birthdate` date NOT NULL,
  `person_photo` text NOT NULL,
  `username` varchar(211) NOT NULL,
  `password` varchar(211) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `address` varchar(211) NOT NULL,
  `city` varchar(211) NOT NULL,
  `postcode` int(11) NOT NULL,
  `country` varchar(211) NOT NULL,
  `contactnumber` varchar(211) NOT NULL,
  `islocked` tinyint(1) NOT NULL,
  `createdby` varchar(211) NOT NULL,
  `modifiedby` varchar(211) NOT NULL,
  `createddate` date NOT NULL,
  `modifieddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `person_type`, `gender`, `fname`, `midname`, `lname`, `email`, `birthdate`, `person_photo`, `username`, `password`, `address`, `city`, `postcode`, `country`, `contactnumber`, `islocked`, `createdby`, `modifiedby`, `createddate`, `modifieddate`) VALUES
(7, 'admin', 'Mr.', 'admin', 'A', 'admin', 'admin@gmail.com', '1996-06-08', '6b80401b0f6e757e73f9c509457e10cb.jpeg', 'admin', 'adminJAEPCE1234', 'cebu', 'Cebu', 6226, 'Philippines', '09493743836', 0, '', '', '2020-10-26', '2020-11-10'),
(8, 'guest', 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', '1996-06-08', '6d0617e75c6b259de08a92cdf8356560.jpeg', 'kijirodafaq1', 'Pwersangapoydj1', 'cebu', 'Cebu', 6226, 'Philippines', '09493743836', 0, '', '', '2020-11-16', '0000-00-00'),
(10, 'staff', 'Mr.', 'Staff', 'S', 'Staff', 'staff@gmail.com', '1996-06-08', '01effbb01cb97d09203be989f05fe6b6.jpeg', 'staff', 'staffJAEPCE1234', 'cebu', 'Cebu City', 6000, 'Philippines', '09493743836', 0, '', '', '2020-12-14', '0000-00-00'),
(11, 'manager', 'Mr.', 'manager', 'm', 'manager', 'manager@gmail.com', '1996-06-08', '6236e5200f771fdfde8238857a5da27a.jpeg', 'manager', 'managerJAEPCE1234', 'cebu', 'Cebu City', 6000, 'Philippines', '09493743836', 0, '', '', '2020-12-14', '0000-00-00'),
(12, 'guest', 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', '1996-06-08', 'f3585b5672840b264936fa89536e7ee1.jpeg', 'customer1234', 'Customer1234', 'cebu', 'cebu', 6226, 'Philippines', '09959165233', 0, '', '', '2021-02-22', '2021-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_status` enum('Available','Occupied','Reserved') NOT NULL,
  `room_name` varchar(211) NOT NULL,
  `number_beds` varchar(211) NOT NULL,
  `bed_size` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `floor_number` varchar(211) NOT NULL,
  `details` text NOT NULL,
  `services1` varchar(255) NOT NULL,
  `services2` varchar(255) NOT NULL,
  `services3` varchar(255) NOT NULL,
  `services4` varchar(255) NOT NULL,
  `services5` varchar(255) NOT NULL,
  `room_price` int(11) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `modifiedby` varchar(211) NOT NULL,
  `createddate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `room_islocked` tinyint(1) NOT NULL,
  `room_photo` text NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_status`, `room_name`, `number_beds`, `bed_size`, `capacity`, `floor_number`, `details`, `services1`, `services2`, `services3`, `services4`, `services5`, `room_price`, `createdby`, `modifiedby`, `createddate`, `modifieddate`, `room_islocked`, `room_photo`, `person_id`) VALUES
(12, 'Available', 'Special Room', '3', 'King size', '4', '2nd ', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', 'free wifi', 'free breakfast', 'free dinner', 'TV', 'free checks', 2500, '', '', '2020-10-22', '2020-10-22', 0, 'Discover-the-Ultimate-Master-Bedroom-Styles-and-Inspirations-6_1.jpg', 0),
(28, 'Available', 'Deluxe Room', '4', 'King size', '4', '3rd ', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '213321', '213213', '213123', '213231', '', 5000, 'chill', 'chill', '2020-10-23', '2020-10-23', 0, 'abbot-ave-unit-h-christopher-lee-foto-img_1131a6990e8f8fcb_14-3211-1-404364d.jpg', 1),
(30, 'Available', 'Suite Room', '2', 'Queen Size', '3', '4th', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '231321ssd', 'adaxzcxz', 'sadaczx', 'adsadsada', 'zcxzczxz', 4500, '', '', '0000-00-00', '0000-00-00', 0, 'photo-1560185893-a55cbc8c57e8.jpg', 0),
(31, 'Available', 'Special Room x44', '1', 'King Size', '2', '5th', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '1', '2', '3', '4', '5', 5500, 'Prince Claire Joshua Kay', 'Prince Claire Joshua Kay', '2020-11-16', '2020-11-16', 0, '4edefb1217c4d7c9ff66ba3ab7accff8.jpeg', 7),
(32, 'Available', 'Deluxe Three Bed Room', '2', 'King', '4', '6th', 'asd', 'Free breakfast', 'TV', 'Wifi', 'Pool', 'Gym', 500000, 'Prince Claire Joshua Kay', 'Prince Claire Joshua Kay', '2021-05-10', '2021-05-10', 1, '0515f56af5f55b3ff1495226d1e2e47b.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `midname` varchar(1) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_no` int(11) NOT NULL,
  `transaction_type` enum('reserve','paid','pending') NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `status` enum('Pending','CheckIn','CheckOut') NOT NULL,
  `payment_method` enum('none','cash','credit card') NOT NULL,
  `days` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(211) NOT NULL,
  `transaction_date` date NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `confirmation` varchar(25) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `promo` tinyint(4) NOT NULL,
  `coupon` varchar(20) NOT NULL,
  `update_status` int(11) NOT NULL,
  `notif_status` int(11) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `person_id`, `room_id`, `gender`, `fname`, `midname`, `lname`, `email`, `room_no`, `transaction_type`, `extra_bed`, `status`, `payment_method`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `transaction_date`, `createdby`, `confirmation`, `tid`, `promo`, `coupon`, `update_status`, `notif_status`, `contact_no`) VALUES
(168, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 6, 'paid', 2, 'CheckOut', 'cash', 3, '2021-01-22', '10:04:42', '2021-01-25', '00:00:00', '15000', '2021-01-21', 'Prince Claire Joshua Kay', '8uhie3rk', '', 0, '0', 1, 1, '0'),
(169, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 16, 'paid', 2, 'CheckOut', 'cash', 2, '2021-02-11', '16:17:16', '2021-02-13', '00:00:00', '11000', '2021-02-10', 'Prince Claire Joshua Kay', 'odicyez7', '', 0, '0', 1, 1, '0'),
(170, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 18, 'paid', 2, 'CheckOut', 'cash', 4, '2021-02-11', '16:19:35', '2020-02-15', '00:00:00', '22000', '2021-02-10', 'Staff', 'qmoofmr4', '', 0, '0', 1, 1, '0'),
(171, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 1, 'paid', 6, 'CheckOut', 'credit card', 2, '2021-02-13', '16:21:02', '2021-04-15', '00:00:00', '5000', '2021-02-10', 'Staff', 'micdtjfb', 'ch_1IJDwYCg5h63kqZ7Uk8kMn6i', 0, '0', 1, 1, '0'),
(172, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 12, 'reserve', 2, 'CheckOut', 'none', 1, '2021-02-17', '00:00:00', '2021-02-18', '00:00:00', '4500', '2021-02-17', 'Prince Bro', 'tfs4n0p7', '', 0, '0', 1, 1, '0'),
(174, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 12, 'paid', 2, 'CheckOut', 'cash', 1, '2021-03-23', '11:40:04', '2021-03-24', '00:00:00', '4500', '2021-02-22', 'Prince Claire Joshua Kay', 'z48tfa0n', '', 0, '0', 1, 1, '0'),
(175, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 18, 'paid', 0, 'CheckOut', 'none', 2, '2021-02-23', '00:00:00', '2021-02-25', '00:00:00', '11000', '2021-02-22', 'Customer', 'j3ms5vxn', '', 0, '0', 1, 0, '0'),
(176, 12, 12, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 1, 'paid', 1, 'CheckOut', 'none', 2, '2021-02-25', '00:00:00', '2021-02-27', '00:00:00', '4400', '2021-02-22', 'Customer', 'xd6kpcz0', '', 1, '0', 1, 0, '0'),
(177, 12, 28, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 6, 'paid', 1, 'CheckOut', 'credit card', 2, '2021-02-24', '00:00:00', '2021-02-26', '00:00:00', '10000', '2021-02-23', 'Customer', '4mk5cqij', 'ch_1INrV2Cg5h63kqZ770VJMoND', 0, '0', 1, 0, '0'),
(178, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 11, 'paid', 1, 'CheckOut', 'credit card', 2, '2021-02-25', '00:00:00', '2021-02-27', '00:00:00', '9000', '2021-02-23', 'Customer', 'iyq4hxf8', 'ch_1INt6qCg5h63kqZ7ugMTfEiX', 0, '0', 1, 0, '0'),
(179, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 18, 'paid', 1, 'CheckOut', 'credit card', 3, '2021-02-24', '00:00:00', '2021-02-27', '00:00:00', '16500', '2021-02-23', 'Customer', 'i3njoehi', 'ch_1INtVvCg5h63kqZ7hVS3pVQq', 0, '0', 1, 0, '0'),
(180, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 17, 'paid', 1, 'CheckOut', 'credit card', 4, '2021-02-24', '00:00:00', '2021-02-28', '00:00:00', '22000', '2021-02-23', 'Customer', 'vuwby8w2', 'ch_1INtZ5Cg5h63kqZ7g1axUIpL', 0, '0', 1, 0, '0'),
(185, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 16, 'paid', 0, 'Pending', 'credit card', 1, '2021-04-20', '00:00:00', '2021-04-21', '00:00:00', '5500', '2021-04-20', 'Customer', 'yr8txsqp', 'ch_1IiGuFCg5h63kqZ7GO1XpxPJ', 0, '0', 1, 0, '0'),
(186, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 18, 'paid', 0, 'CheckOut', 'cash', 1, '2021-04-21', '18:42:07', '2021-04-22', '00:00:00', '5500', '2021-04-21', 'Staff', 'i3w3m466', '', 0, '0', 1, 0, '0'),
(187, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 17, 'paid', 0, 'Pending', 'credit card', 1, '2021-04-21', '00:00:00', '2021-04-22', '00:00:00', '5500', '2021-04-21', 'Customer', 'rky5vyqz', 'ch_1IihTICg5h63kqZ75KpnHWPY', 0, '0', 1, 0, '0'),
(188, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 89, 'paid', 0, 'Pending', 'credit card', 1, '2021-04-22', '00:00:00', '2021-04-23', '00:00:00', '5500', '2021-04-21', 'Customer', 'r22nbo6f', 'ch_1IihV4Cg5h63kqZ7qxdyr0JE', 0, '0', 1, 0, '0'),
(189, 12, 31, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 88, 'paid', 0, 'Pending', 'credit card', 1, '2021-04-21', '00:00:00', '2021-04-22', '00:00:00', '5500', '2021-04-21', 'Customer', '8a5t6h0u', 'ch_1IihY8Cg5h63kqZ7YP4Edyb6', 0, '0', 1, 0, '0'),
(192, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 11, 'paid', 0, 'Pending', 'credit card', 1, '2021-04-27', '00:00:00', '2021-04-28', '00:00:00', '4500', '2021-04-26', 'Customer', 'uq0jc2zb', 'ch_1IkPvPI4w4xy133h8N0ZykkE', 0, '0', 1, 0, '0'),
(193, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 12, 'paid', 0, 'CheckOut', 'cash', 1, '2021-04-29', '00:00:00', '2021-04-30', '00:00:00', '3600', '2021-04-26', 'Customer', 'aqduri8s', 'ch_1IkTjxI4w4xy133h2TFmTZzg', 0, '0', 1, 0, '0'),
(196, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 13, 'paid', 0, 'CheckOut', 'cash', 1, '2021-05-01', '00:00:00', '2021-05-02', '00:00:00', '3600', '2021-05-01', 'Customer', 'bp43ha4g', 'ch_1ImDfcI4w4xy133hBpjmytZ6', 1, '0', 1, 0, '0'),
(197, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 14, 'paid', 0, 'CheckOut', 'credit card', 9, '2021-05-06', '00:00:00', '2021-05-15', '00:00:00', '32400', '2021-05-01', 'Customer', 'av6etadk', 'ch_1ImDs6I4w4xy133hgLi4gVSu', 1, '0', 1, 0, '0'),
(198, 12, 30, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 15, 'paid', 1, 'CheckOut', 'credit card', 1, '2021-05-01', '00:00:00', '2021-05-02', '00:00:00', '3600', '2021-05-01', 'Customer', '3i6c7025', 'ch_1ImF3FI4w4xy133hNv37uXH9', 1, 'PRBQMT4QAB', 1, 0, '0'),
(199, 12, 32, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 2, 'paid', 0, 'CheckOut', 'credit card', 1, '2021-05-12', '00:00:00', '2021-05-13', '00:00:00', '400000', '2021-05-11', 'Customer', '266ike5s', 'ch_1IpygyI4w4xy133hVGqqMp0g', 1, 'PRBQMT4QAB', 1, 0, '0'),
(208, 12, 12, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 1, 'paid', 0, 'CheckOut', 'none', 1, '2021-05-18', '00:00:00', '2021-05-19', '00:00:00', '2500', '2021-05-17', 'Customer', 'w4mkk880', '', 0, '', 1, 0, '0'),
(217, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 16, 'paid', 0, 'CheckOut', 'cash', 5, '2021-05-25', '05:05:45', '2021-05-20', '00:00:00', '27500', '2021-05-17', 'Prince Claire Joshua Kay', 'fxqozib0', '', 0, '', 1, 0, '0'),
(218, 8, 32, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 2, 'paid', 0, 'CheckOut', 'credit card', 1, '2021-05-18', '05:38:35', '2021-05-19', '00:00:00', '500000', '2021-05-17', 'Prince Claire Joshua Kay', 'kbwk586w', '', 0, '', 1, 0, '0'),
(220, 12, 12, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 1, 'paid', 1, 'CheckOut', 'none', 1, '2021-05-19', '00:00:00', '2021-05-20', '00:00:00', '2500', '2021-05-18', 'Customer', 'b7mdxmy3', '', 0, '', 1, 0, '0'),
(221, 0, 12, 'Mr.', 'Paolo', 'B', 'Galo', 'rpgalo55@gmail.com', 1, 'paid', 0, 'CheckOut', 'cash', 1, '2021-05-19', '00:00:00', '2021-05-20', '00:00:00', '2500', '2021-05-18', 'Customer-w', '2tvy3i2p', '', 0, '', 1, 0, '2147483647'),
(225, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 16, 'paid', 0, 'CheckOut', 'cash', 1, '2021-05-22', '05:48:37', '2021-05-23', '00:00:00', '5500', '2021-05-18', 'Staff', 'th66hr3j', '', 0, '', 1, 0, ''),
(226, 12, 28, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 6, 'paid', 0, 'CheckOut', 'cash', 1, '2021-05-19', '05:49:31', '2021-05-20', '00:00:00', '5000', '2021-05-18', 'Staff', 'thn73ppw', '', 0, '', 1, 0, ''),
(227, 12, 28, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 6, 'paid', 0, 'CheckOut', 'cash', 1, '2021-05-19', '05:50:26', '2021-05-20', '00:00:00', '5000', '2021-05-18', 'Staff', 'vak2ynq7', '', 0, '', 1, 0, ''),
(279, 0, 12, 'Mr.', 'Paolo', 'B', 'Galo', 'rpgalo55@gmail.com', 206, 'paid', 0, 'CheckIn', 'cash', 1, '2021-05-27', '00:00:00', '2021-05-28', '00:00:00', '2500', '2021-05-26', 'Customer-w', 'qvq5fkxi', '', 0, '', 1, 0, '09499972290'),
(288, 0, 12, 'Mr.', 'Paolo', 'B', 'Galo', 'rpgalo55@gmail.com', 206, 'pending', 0, 'Pending', 'none', 1, '2021-06-20', '00:00:00', '2021-06-21', '00:00:00', '2500', '2021-06-19', 'Customer-w', '52sc0zr6', '', 0, '', 0, 0, '09499972290'),
(290, 0, 12, 'Mr.', 'Paolo', 'B', 'Galo', 'rpgalo55@gmail.com', 205, 'pending', 0, 'Pending', 'none', 1, '2021-06-20', '00:00:00', '2021-06-21', '00:00:00', '2500', '2021-06-19', 'Customer-w', '8rsm64py', '', 0, '', 0, 0, '09499972290'),
(291, 12, 12, 'Mr.', 'Customer', 'C', 'Customer', 'customer@gmail.com', 204, 'paid', 0, 'Pending', 'credit card', 1, '2021-06-20', '00:00:00', '2021-06-21', '00:00:00', '2500', '2021-06-19', 'Customer', '506onhnz', '', 0, '', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_rooms`
--
ALTER TABLE `available_rooms`
  ADD PRIMARY KEY (`avail_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_rooms`
--
ALTER TABLE `available_rooms`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
