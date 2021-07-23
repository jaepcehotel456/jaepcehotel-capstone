-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 10:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
(1, 12, 1, 'Available'),
(2, 12, 2, 'Available'),
(3, 12, 3, 'Occupied'),
(4, 12, 4, 'Occupied'),
(5, 12, 5, 'Occupied'),
(6, 28, 6, 'Occupied'),
(7, 28, 7, 'Occupied'),
(8, 28, 8, 'Available'),
(9, 28, 9, 'Available'),
(10, 28, 10, 'Available'),
(11, 30, 11, 'Occupied'),
(12, 30, 12, 'Occupied'),
(13, 30, 13, 'Occupied'),
(14, 30, 14, 'Occupied'),
(15, 30, 15, 'Occupied'),
(16, 31, 16, 'Occupied'),
(17, 12, 69, 'Occupied'),
(18, 31, 18, 'Occupied'),
(19, 31, 17, 'Occupied'),
(20, 31, 89, 'Occupied'),
(21, 31, 88, 'Occupied');

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
(3, 'PRM2938CD1', 12, 'Valid');

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
(8, 'guest', 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', '1996-06-08', '6d0617e75c6b259de08a92cdf8356560.jpeg', 'kijirodafaq1', 'Pwersangapoydj1', 'hehehe', 'Cebu', 6226, 'Philippines', '09493743836', 0, '', '', '2020-11-16', '0000-00-00'),
(10, 'staff', 'Mr.', 'Staff', 'S', 'Staff', 'staff@gmail.com', '1996-06-08', '01effbb01cb97d09203be989f05fe6b6.jpeg', 'staff', 'Pwersangapoydj1', 'casili', 'Cebu City', 6000, 'Philippines', '09493743836', 0, '', '', '2020-12-14', '0000-00-00'),
(11, 'manager', 'Mr.', 'manager', 'm', 'manager', 'manager@gmail.com', '1996-06-08', '6236e5200f771fdfde8238857a5da27a.jpeg', 'manager', 'Pwersangapoydj1', 'casili', 'Cebu City', 6000, 'Philippines', '09493743836', 0, '', '', '2020-12-14', '0000-00-00');

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
  `tid` varchar(255) NOT NULL,
  `promo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `person_id`, `room_id`, `gender`, `fname`, `midname`, `lname`, `email`, `room_no`, `transaction_type`, `extra_bed`, `status`, `payment_method`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `transaction_date`, `createdby`, `confirmation`, `tid`, `promo`) VALUES
(139, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 1, 'paid', 1, 'CheckIn', 'cash', 1, '2020-12-14', '18:20:28', '2020-12-15', '00:00:00', '2500', '2020-12-14', 'Prince Claire Joshua Kay', 'bs3ac6x3', '', 0),
(140, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 2, 'paid', 1, 'CheckIn', 'credit card', 1, '2020-12-14', '18:21:06', '2020-12-15', '00:00:00', '2500', '2020-12-14', 'Prince Claire Joshua Kay', 'y22orw2f', 'ch_1HyEAvCg5h63kqZ7a87yDADe', 0),
(141, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 3, 'paid', 1, 'CheckIn', 'cash', 1, '2020-12-14', '18:21:45', '2020-12-15', '00:00:00', '2500', '2020-12-14', 'manager', 'muodacaw', '', 0),
(142, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 4, 'paid', 1, 'CheckIn', 'credit card', 1, '2020-12-14', '18:22:20', '2020-12-15', '00:00:00', '2500', '2020-12-14', 'manager', 'irtzja35', 'ch_1HyEC7Cg5h63kqZ70MHHChFr', 0),
(143, 8, 12, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 5, 'paid', 1, 'CheckIn', 'cash', 1, '2020-12-14', '18:23:00', '2020-12-15', '00:00:00', '2500', '2020-12-14', 'Staff', '33eobaiv', '', 0),
(144, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 6, 'paid', 1, 'CheckIn', 'credit card', 1, '2020-12-14', '18:23:36', '2020-12-15', '00:00:00', '5000', '2020-12-14', 'Staff', 'ddri6w25', 'ch_1HyEDLCg5h63kqZ7eEDF0Tvz', 0),
(145, 8, 31, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 89, 'paid', 1, 'Pending', 'credit card', 7, '2020-12-22', '00:00:00', '2020-12-29', '00:00:00', '38500', '2020-12-17', 'Prince Bro', 'kjdq6vor', 'ch_1Hzc98Cg5h63kqZ7iMNiatq7', 0),
(146, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 1, 'Pending', 'none', 2, '2020-12-17', '00:00:00', '2020-12-19', '00:00:00', '9000', '2020-12-17', 'Prince Bro', 'v0z5cka8', '', 0),
(147, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 2, 'Pending', 'none', 1, '2020-12-18', '00:00:00', '2020-12-19', '00:00:00', '4500', '2020-12-17', 'Prince Bro', 'i4dqvyno', '', 0),
(148, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 1, 'Pending', 'none', 1, '2020-12-10', '00:00:00', '2020-12-11', '00:00:00', '3600', '2020-12-17', 'Prince Bro', 'sz86zbtp', '', 1),
(149, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 14, 'reserve', 1, 'Pending', 'none', 1, '2020-12-18', '00:00:00', '2020-12-19', '00:00:00', '3600', '2020-12-17', 'Prince Bro', 'sqrz5kj3', '', 1),
(150, 8, 30, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 699, 'Pending', 'none', 3, '2020-12-18', '00:00:00', '2020-12-21', '00:00:00', '10800', '2020-12-18', 'Prince Bro', 'rvt8qfne', '', 1),
(151, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 55, 'Pending', 'none', 2, '2020-12-19', '00:00:00', '2020-12-21', '00:00:00', '10000', '2020-12-18', 'Prince Bro', '4w5pdkgx', '', 0),
(152, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 44, 'Pending', 'none', 1, '2020-12-18', '00:00:00', '2020-12-19', '00:00:00', '5000', '2020-12-18', 'Prince Bro', 'ruvkhvv3', '', 0),
(153, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 1, 'Pending', 'none', 1, '2020-12-18', '00:00:00', '2020-12-19', '00:00:00', '5000', '2020-12-18', 'Prince Bro', 'q2cmya7f', '', 0),
(154, 8, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'brotha@gmail.com', 0, 'pending', 2, 'Pending', 'none', 1, '2020-12-19', '00:00:00', '2020-12-20', '00:00:00', '5000', '2020-12-18', 'Prince Bro', '2zpb802u', '', 0),
(155, 0, 28, 'Mr.', 'Prince Bro', 'B', 'Brotha', 'chels@gmail.com', 7, 'paid', 2, 'Pending', 'credit card', 2, '2020-12-22', '00:00:00', '2020-12-24', '00:00:00', '1000000', '2020-12-18', 'Prince Bro', 'b6u8u6tm', 'ch_1Hzen8Cg5h63kqZ78xxVgKT8', 0);

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
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
