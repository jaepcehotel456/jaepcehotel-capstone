-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 11:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `availability` enum('Available','Occupied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_rooms`
--

INSERT INTO `available_rooms` (`avail_id`, `room_id`, `room_number`, `availability`) VALUES
(1, 12, 1, 'Occupied'),
(2, 12, 2, 'Occupied'),
(3, 12, 3, 'Occupied'),
(4, 12, 4, 'Available'),
(5, 12, 5, 'Available'),
(6, 28, 6, 'Occupied'),
(7, 28, 7, 'Available'),
(8, 28, 8, 'Available'),
(9, 28, 9, 'Available'),
(10, 28, 10, 'Available'),
(11, 30, 11, 'Occupied'),
(12, 30, 12, 'Occupied'),
(13, 30, 13, 'Available'),
(14, 30, 14, 'Available'),
(15, 30, 15, 'Available'),
(16, 31, 16, 'Occupied'),
(17, 12, 69, 'Available'),
(18, 31, 18, 'Occupied'),
(19, 31, 17, 'Occupied'),
(20, 31, 89, 'Occupied'),
(21, 31, 88, 'Occupied');

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
(7, 'admin', 'Mr.', 'Prince Claire Joshua Kay', 'C', 'Caino', 'classicjosh37@gmail.com', '1996-06-08', '6b80401b0f6e757e73f9c509457e10cb.jpeg', 'kijirodafaq', 'Pwersangapoydj1', 'Consolacion', 'Cebu', 6226, 'Philippines', '09493743836', 0, '', '', '2020-10-26', '2020-11-10'),
(8, 'guest', 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', '1996-06-08', '6d0617e75c6b259de08a92cdf8356560.jpeg', 'kijirodafaq1', 'Pwersangapoydj1', 'hehehe', 'Cebu', 6226, 'Philippines', '09493743836', 0, '', '', '2020-11-16', '0000-00-00');

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
(12, 'Available', 'Special Room', '3', 'King size', '4', '4th floor', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', 'free wifi', 'free breakfast', 'free condom', 'TV', 'free checks', 2500, '', '', '2020-10-22', '2020-10-22', 0, 'Discover-the-Ultimate-Master-Bedroom-Styles-and-Inspirations-6_1.jpg', 0),
(28, 'Available', 'Deluxe Room', '4', 'King size', '4', '4th floor', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '213321', '213213', '213123', '213231', '', 5000, 'chill', 'chill', '2020-10-23', '2020-10-23', 0, 'abbot-ave-unit-h-christopher-lee-foto-img_1131a6990e8f8fcb_14-3211-1-404364d.jpg', 1),
(30, 'Available', 'Suite Room', '2', 'Queen Size', '3', '1', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '231321ssd', 'adaxzcxz', 'sadaczx', 'adsadsada', 'zcxzczxz', 4500, '', '', '0000-00-00', '0000-00-00', 0, 'photo-1560185893-a55cbc8c57e8.jpg', 0),
(31, 'Available', 'Special Room x44', '1', 'King Size', '2', '1', 'Motorhome or Trailer that is the question for you. Here are some of the\r\n                                advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth\r\n                                wheeler? The advantages and disadvantages of both are studied so that you can make your\r\n                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an\r\n                                achievement of a lifetime. It can be similar to sojourning with your residence as you\r\n                                search the various sites of our great land, America.', '1', '2', '3', '4', '5', 5500, 'Prince Claire Joshua Kay', 'Prince Claire Joshua Kay', '2020-11-16', '2020-11-16', 0, '4edefb1217c4d7c9ff66ba3ab7accff8.jpeg', 7);

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
  `tid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `person_id`, `room_id`, `gender`, `fname`, `midname`, `lname`, `email`, `room_no`, `transaction_type`, `extra_bed`, `status`, `payment_method`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `transaction_date`, `createdby`, `confirmation`, `tid`) VALUES
(111, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 16, 'paid', 11, 'Pending', 'credit card', 3, '2020-12-18', '00:00:00', '2020-12-21', '00:00:00', '16500', '2020-12-10', 'Prince Bro', '25hkgv03', 'ch_1HwjeOCg5h63kqZ7TKScyLTM'),
(112, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 18, 'paid', 0, 'CheckIn', 'cash', 2, '2020-12-10', '15:39:35', '2020-12-12', '00:00:00', '11000', '2020-12-10', 'Prince Claire Joshua Kay', 'x03pqfir', ''),
(113, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 17, 'reserve', 69, 'Pending', 'none', 3, '2020-12-16', '00:00:00', '2020-12-19', '00:00:00', '16500', '2020-12-10', 'Prince Bro', 'kbmzvh3v', ''),
(114, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 89, 'paid', 22, 'CheckIn', 'cash', 5, '2020-12-10', '16:31:51', '2020-12-15', '00:00:00', '27500', '2020-12-10', 'Prince Claire Joshua Kay', '0jyoyzen', ''),
(115, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 6, 'paid', 11, 'CheckIn', 'cash', 3, '2020-12-10', '16:33:50', '2020-12-13', '00:00:00', '15000', '2020-12-10', 'Prince Claire Joshua Kay', 's23ommpb', ''),
(116, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 1, 'paid', 33, 'CheckIn', 'cash', 7, '2020-12-10', '16:37:49', '2020-12-17', '00:00:00', '17500', '2020-12-10', 'Prince Claire Joshua Kay', 'ycskyyjq', ''),
(117, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 11, 'paid', 99, 'CheckIn', 'cash', 8, '2020-12-10', '16:44:28', '2020-12-18', '00:00:00', '36000', '2020-12-10', 'Prince Claire Joshua Kay', 'm5m0crhk', ''),
(118, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 12, 'paid', 54, 'CheckIn', 'credit card', 7, '2020-12-10', '16:52:44', '2020-12-17', '00:00:00', '31500', '2020-12-10', 'Prince Claire Joshua Kay', 'ti434nvo', ''),
(119, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 88, 'paid', 99, 'CheckIn', 'cash', 7, '2020-12-10', '17:03:21', '2020-12-17', '00:00:00', '38500', '2020-12-10', 'Prince Claire Joshua Kay', '5ka383ni', ''),
(120, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 2, 'paid', 77, 'CheckIn', 'cash', 8, '2020-12-10', '17:04:12', '2020-12-18', '00:00:00', '20000', '2020-12-10', 'Prince Claire Joshua Kay', 'nd6qaeo7', ''),
(122, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 3, 'paid', 99, 'CheckIn', 'credit card', 7, '2020-12-10', '17:56:47', '2020-12-17', '00:00:00', '1750000', '2020-12-10', 'Prince Claire Joshua Kay', 'tut5gbu4', 'ch_1HwltCCg5h63kqZ7c22GC26T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_rooms`
--
ALTER TABLE `available_rooms`
  ADD PRIMARY KEY (`avail_id`);

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
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
