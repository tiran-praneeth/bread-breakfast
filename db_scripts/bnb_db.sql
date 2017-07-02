-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 09:03 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lodging`
--

CREATE TABLE `lodging` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodging`
--

INSERT INTO `lodging` (`id`, `name`, `price`, `description`, `location`, `image_url`, `user_id`, `created_date`) VALUES
(1, 'Ella Gold', 1000, 'Some Description', 'Colombo', 'assets/img/lodgings/gbdnbgdn.jpg', 1, '2017-05-20 07:20:23'),
(2, 'Ella Silver', 1500, 'Test', 'Colombo', 'assets/img/lodgings/brunch.jpg', 2, '2017-05-20 09:06:41'),
(3, 'Moon Beach Resort', 2500, 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Colombo', 'assets/img/lodgings/RanveliBeachResort_MountLavinia_SriLanka_SH0134_18483.jpg', 2, '2017-05-20 09:41:24'),
(4, 'Shannara Resort', 2700, 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry. ', 'Colombo', 'assets/img/lodgings/H0134_18476.jpg', 2, '2017-05-20 09:44:17'),
(5, 'Show By \'O\'', 5000, 'Some Description', 'Kandy', 'assets/img/lodgings/bed-breakfast-software.jpg', 2, '2017-05-20 10:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `type`, `gender`, `address`, `password`, `district`, `created_date`) VALUES
(1, 'Anjalika', 'anji@gmail.com', '0771234567', 'RENTER', 'MALE', '123, Colombo, Sri Lanka.', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 04:01:31'),
(2, 'Sam', 'sam@gmail.com', '0778899456', 'RENTER', 'MALE', '12A, Colombo 07', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 04:08:20'),
(3, 'Vam', 'vam@gmail.com', '0112556489', 'TOURIST', 'MALE', 'Colombo 08', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 05:30:42'),
(4, 'Kane', 'kane@gmail.com', '0754512369', 'RENTER', 'MALE', 'Colombo 04', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 05:32:01'),
(5, 'Tim', 'tim@gmail.com', '0112356445', 'TOURIST', 'MALE', 'Colombo 03', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 05:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lodging`
--
ALTER TABLE `lodging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lodging`
--
ALTER TABLE `lodging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
