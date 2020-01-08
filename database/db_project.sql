-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 05:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL,
  `role` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`, `email`, `last_login`, `role`, `status`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', '2018-07-10 00:00:00', 'admin', 1),
(5, 'satish', 'satish12', 'satish123', 'satish.acharya2256@gmail.com', '0000-00-00 00:00:00', 'admin', 1),
(6, 'Lokendra', 'lokendra22', 'lokendra123', 'lokendra@gmail.com', '0000-00-00 00:00:00', 'Admin', 1),
(7, 'satish', 'satish123', 'satish321', 'satish.acharya2256@gmail.com', '0000-00-00 00:00:00', 'Admin', 1),
(11, 'satish Acharya', 'satish22', '948425aa3407a45c286531158d9e95d2', 'satish.acharya2256@gmail.com', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attandance`
--

CREATE TABLE `tbl_attandance` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `Adate` date NOT NULL,
  `status` enum('p','a') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_attandance`
--

INSERT INTO `tbl_attandance` (`id`, `member_id`, `Adate`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(9, 6, '2018-08-23', 'p', '', '0000-00-00', '', '0000-00-00'),
(10, 0, '0000-00-00', '', '', '0000-00-00', '', '0000-00-00'),
(11, 7, '2018-08-02', 'p', '', '0000-00-00', '', '0000-00-00'),
(14, 15, '2018-08-02', 'p', '', '0000-00-00', '', '0000-00-00'),
(16, 2, '2018-08-04', 'p', '', '0000-00-00', '', '0000-00-00'),
(18, 9, '2018-12-11', 'p', '', '0000-00-00', '', '0000-00-00'),
(19, 17, '2019-05-04', 'p', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `phone`, `message`, `status`) VALUES
(1, 'Satish', 'satish2256@gmail.com', 984475802, 'i want to join this gym.', '1'),
(3, 'Lokendra', 'lokendra@lokendra.com', 984475632, 'i want to join this gym', '1'),
(4, 'satish', 'acharya.satish20@gmail.com', 2147483647, 'tygjhfjy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shift` enum('m','e') NOT NULL,
  `package` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`, `shift`, `package`, `address`, `dob`, `phone`, `email`, `image`, `gender`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'Satish111', 'e', 'hcfg', 'kapan', '2018-07-12', 984582658, 'ram@gmail.com', '5b633256be5a7_Gym-Status-and-Gym-Quotes.jpg', 'm', 1, 'admin', '2018-07-19', '', '0000-00-00'),
(6, 'lokendre', 'm', 'hbbhdv', 'kailali', '2018-07-04', 985264725, 'lokendra@lokendra.com', '5b517a79dfaf5_f.png', 'm', 0, 'admin', '2018-07-20', '', '0000-00-00'),
(7, 'Satish Acharya', 'm', '6 month ', 'kapan', '2018-08-01', 984475803, 'satish.acharya2256@gmail.com', '5b61187bbd875_header2.jpg', 'm', 1, 'admin', '2018-08-01', '', '0000-00-00'),
(9, 'manisha', 'm', '3month', 'kailali', '2018-08-02', 9824358625, 'manisha@gmail.com', '5b62804001a6a_header.jpg', 'f', 1, 'admin', '2018-08-02', '', '0000-00-00'),
(15, 'Satish', 'm', '3 months', 'kathmandu', '2018-08-09', 984475802, 'ad@satish.com', '5b63c54d2cc5c_b_2.png', 'm', 1, 'admin', '2018-08-03', '', '0000-00-00'),
(16, 'dipesh', 'm', '3month', 'kapan', '1998-03-27', 984475632, 'dipesh@dipesh.com', '5b63dae979bd3_f.png', 'm', 1, 'admin', '2018-08-03', '', '0000-00-00'),
(17, 'Hari', 'm', '2month', 'Maitidevi', '2019-05-15', 984702368, 'Hari225@gmail.com', '5ccbc758e5237_3.png', 'm', 0, 'admin', '2019-05-03', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `name`, `title`, `price`, `description`, `image`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(4, 'Gold package', 'gold', 20000, 'hjvgghvhgvg', '5b608774e4deb_f.png', '1', 'admin', '2018-07-29', 'admin', '2018-07-31'),
(5, '6month', '6month package', 20000, 'hysdfbbgumdgbxf', '5b6328518c8d0_fit.jpg', '1', 'admin', '2018-08-01', 'admin', '2018-08-02'),
(6, 'golden package', 'golden package', 20000, 'skvhbjbfvs', '5b63d918272ec_2018-04-10.png', '1', 'admin', '2018-08-03', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regstration`
--

CREATE TABLE `tbl_regstration` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_regstration`
--

INSERT INTO `tbl_regstration` (`id`, `username`, `firstname`, `lastname`, `password`, `confirm_password`, `email`, `gender`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'boyapple', 'Apple', 'Boy', '5ad1528cd9757c462521c6184f9abf36', 'appleboy', 'admin@admin.com', 'M', '1', '', '0000-00-00', '', '0000-00-00'),
(4, 'ram', 'ram', 'Boy', 'ram123', 'ram123', 'rambhdr@gmail.com', 'M', '1', '', '0000-00-00', '', '0000-00-00'),
(13, 'kapchaki', 'kapchaki', 'dograj', 'kapchaki', 'kapchaki', 'kapchaki@kapchaki.com', 'M', '1', '', '2018-07-24', '', '0000-00-00'),
(17, 'susmita', 'Susmita', 'Acharya', '0a0e16c9e5b29d35905b71d81638b516', 'susmita123', 'susmita@susmita', 'F', '1', '', '0000-00-00', '', '0000-00-00'),
(21, 'subash', 'subash', 'kaflea', '051f6a1206f0ea642259e2be23db14b7', 'subash123', 'subash@subash.com', 'M', '1', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `id` int(11) NOT NULL,
  `from_time` date NOT NULL,
  `to_time` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `shift` enum('m','e') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`id`, `from_time`, `to_time`, `description`, `status`, `shift`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, '2018-02-02', '2019-03-25', 'gvchvdhgchsdc', '1', 'm', 'admin', '2018-07-31', 'admin', '2018-07-31'),
(3, '2015-05-12', '2018-05-12', 'wq tdssrhydfgs', '1', 'm', 'admin', '2018-08-01', '', '0000-00-00'),
(5, '2018-08-01', '2018-09-01', 'hsjghcwjhdcvjshvdcygjd', '', 'm', 'admin', '2018-08-02', 'admin', '2018-08-02'),
(7, '2018-08-04', '2019-09-04', 'hbjsvgshdc', '1', 'm', 'admin', '2018-08-04', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE `tbl_trainer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shift` enum('m','e') NOT NULL,
  `package` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`id`, `name`, `shift`, `package`, `address`, `dob`, `phone`, `email`, `image`, `gender`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(4, 'Satish Acharya', 'e', 'nghgddgf', 'butwal', '2018-07-01', 127, 'satish.acharya2256@gmail.com', '5b54a65012a68_f.png', 'm', '0', 'admin', '2018-07-22', '', '0000-00-00'),
(5, 'utsal adhakari', 'm', 'dfghdhfd', 'kapsn', '2018-07-04', 127, 'utsal225@gmail.com', '5b54a6aacd8b8_63.png', 'm', '1', 'admin', '2018-07-22', '', '0000-00-00'),
(6, 'ram', 'm', '6 month ', 'lamjung', '2018-08-01', 127, 'rambhdr@gmail.com', '5b63dc36132b7_b.png', 'm', '1', 'admin', '2018-08-01', '', '0000-00-00'),
(9, 'Satish', 'm', '3month', 'kapan', '2018-08-31', 127, 'satish@satish.com', '5b63353ed8fb9_55.png', 'm', '1', 'admin', '2018-08-02', '', '0000-00-00'),
(10, 'admintest', 'm', '3month', 'kathmandu', '2018-08-31', 127, 'admin@admin.com', '5b63c6410e42f_f.png', 'm', '1', 'admin', '2018-08-03', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_attandance`
--
ALTER TABLE `tbl_attandance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membername` (`member_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_regstration`
--
ALTER TABLE `tbl_regstration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_attandance`
--
ALTER TABLE `tbl_attandance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_regstration`
--
ALTER TABLE `tbl_regstration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
