-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2020 at 09:28 AM
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
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(150) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`email`, `token`) VALUES
('gdeepak884@gmail.com', 'c616302eccad19a263ebfc76f605f4');

-- --------------------------------------------------------

--
-- Table structure for table `Transfertobank`
--

CREATE TABLE `Transfertobank` (
  `rid` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `account_no` int(13) NOT NULL,
  `ifsc` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Transfertobank`
--

INSERT INTO `Transfertobank` (`rid`, `pid`, `account_no`, `ifsc`, `name`, `amount`, `time`) VALUES
('2f3ce452306732d6987c2a008da334', 'admin', 9, '78', 'Deepak', 10, '2020-11-07'),
('3ad94180d6f97774af74c00dec1c5a', 'admin', 7, '21ce', 'Deepak', 10, '2020-11-07'),
('5697baceb1e8035e936b58e2a49f5c', 'admin', 878, '51389', '8700645197', 10, '2020-11-07'),
('652b7d836bd6894fd34c76c0882cab', 'admin', 7, '21ce', 'Deepak', 10, '2020-11-07'),
('6af6895b48f0404b4b191165f44b06', 'admin', 10, '21ce', '8700645197', 10, '2020-11-07'),
('889ad7f47d14dafa2fe28ad565f2aa', 'admin', 7, '21ce', 'Deepak', 10, '2020-11-07'),
('ba3d6151ea463ed67ee66b872984c6', 'admin', 7, '21ce', 'Deepak', 10, '2020-11-07'),
('c54ea3e5a4f4192141b75a44d9df26', 'admin', 878, '51389', '8700645197', 10, '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Number` varchar(255) DEFAULT NULL,
  `Balance` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Userid`, `Username`, `Password`, `Email`, `Number`, `Balance`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '42395189513451', 1020),
(2, 'rashi', 'rashi', 'rashi@gmail.com', '9189283990', 170),
(15, 'rashee', 'dfghljhgfghk', 'rashisrivastava755@gmail.com', NULL, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Transfertobank`
--
ALTER TABLE `Transfertobank`
  ADD UNIQUE KEY `rid` (`rid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Userid`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Number` (`Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
