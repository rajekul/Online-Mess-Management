-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 11:34 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `action` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `type`, `action`, `day`) VALUES
(1, 'meal', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bazar`
--

CREATE TABLE `bazar` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `userid` varchar(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `userid` varchar(20) NOT NULL,
  `breakfast` int(11) NOT NULL,
  `lunch` int(11) NOT NULL,
  `dinner` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealcheck`
--

CREATE TABLE `mealcheck` (
  `id` int(11) NOT NULL,
  `breakfast` varchar(20) NOT NULL,
  `lunch` varchar(20) NOT NULL,
  `dinner` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealcheck`
--

INSERT INTO `mealcheck` (`id`, `breakfast`, `lunch`, `dinner`) VALUES
(1, 'uncheck', 'uncheck', 'uncheck');

-- --------------------------------------------------------

--
-- Table structure for table `memberinfo`
--

CREATE TABLE `memberinfo` (
  `id` varchar(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profession` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberinfo`
--

INSERT INTO `memberinfo` (`id`, `name`, `phone`, `email`, `gender`, `profession`, `nid`, `address`, `photo`) VALUES
('Admin', 'Admin', '', '', '', '', '', '', ''),
('10145', 'abc', '01762506794', 'abc@gmail.com', 'male', 'Student', '', 'dhaka', '10145.PNG');

--
-- Triggers `memberinfo`
--
DELIMITER $$
CREATE TRIGGER `in_user` AFTER INSERT ON `memberinfo` FOR EACH ROW begin INSERT INTO user VALUES ('10145','abcA123','user');end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `messinfo`
--

CREATE TABLE `messinfo` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `house` varchar(20) NOT NULL,
  `road` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messinfo`
--

INSERT INTO `messinfo` (`id`, `title`, `house`, `road`, `area`, `city`) VALUES
(1, 'MessName/Title', '00', '00', 'Area', 'City');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `userid` varchar(20) NOT NULL,
  `amountReceive` int(11) NOT NULL,
  `amountReturn` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `paymethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`serial`, `date`, `userid`, `amountReceive`, `amountReturn`, `month`, `paymethod`) VALUES
(1, '2018-05-13', '10145', 5000, 0, '', '2018-05'),
(2, '2018-05-13', '10145', 5000, 0, '2018-05', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `unit`) VALUES
(1, 'Rice', 'kg'),
(2, 'Oil', 'liter'),
(3, 'onion', 'kg'),
(4, 'Potato', 'kg'),
(5, 'Peas(dal)', 'kg'),
(6, 'Beef', 'kg'),
(7, 'Chicken', 'kg'),
(8, 'Fish', 'kg'),
(9, 'Egg', 'piece'),
(10, 'vegitable', 'other'),
(11, 'salt', 'kg'),
(12, 'Spice(masla)', 'other'),
(13, 'Mutton', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`) VALUES
('Admin', 'admin', 'admin'),
('10145', 'abcA123', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bazar`
--
ALTER TABLE `bazar`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `mealcheck`
--
ALTER TABLE `mealcheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberinfo`
--
ALTER TABLE `memberinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messinfo`
--
ALTER TABLE `messinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bazar`
--
ALTER TABLE `bazar`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mealcheck`
--
ALTER TABLE `mealcheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
