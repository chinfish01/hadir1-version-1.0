-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hadir1`
--

-- --------------------------------------------------------

--
-- Table structure for table `hadir`
--

CREATE TABLE `hadir` (
  `bil` int(15) NOT NULL,
  `masa` time DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `nomKp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hadir`
--

INSERT INTO `hadir` (`bil`, `masa`, `tarikh`, `nomKp`) VALUES
(48, '18:22:23', '2024-05-07', '050101100123'),
(49, '18:23:51', '2024-05-07', '070723100907'),
(50, '15:38:26', '2024-05-08', '050101100123'),
(51, '15:38:40', '2024-05-08', '070723100907'),
(52, '15:39:25', '2024-05-08', '070723109007'),
(53, '17:28:22', '2024-06-06', '070723100907');

-- --------------------------------------------------------

--
-- Table structure for table `hp`
--

CREATE TABLE `hp` (
  `nomHp` varchar(14) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hp`
--

INSERT INTO `hp` (`nomHp`, `nama`) VALUES
('0123546759', 'CHIN ZHEN YUE'),
('0124456789', 'ABU '),
('0139899429', 'PENTADBIR'),
('0189190543', 'CHIN ZHEN YI'),
('0199262673', 'ANDRIE'),
('0199262676', 'ARINA'),
('0199287674', 'ALIFE');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `nomKp` varchar(12) NOT NULL,
  `jantina` varchar(11) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `aras` varchar(10) DEFAULT NULL,
  `nomHp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`nomKp`, `jantina`, `password`, `aras`, `nomHp`) VALUES
('050101100123', 'LELAKI', '100123', 'PENGGUNA', '0124456789'),
('070723100907', 'LELAKI', '100907', 'PENGGUNA', '0189190543'),
('070723109007', 'LELAKI', '109007', 'PENGGUNA', '0123546759'),
('770628043355', 'LELAKI', '043355', 'PENGGUNA', '0199287674'),
('821215043322', 'PEREMPUAN', '043322', 'PENGGUNA', '0199262673'),
('821215043324', 'PEREMPUAN', '043324', 'PENGGUNA', '0199262676'),
('888888888888', 'LELAKI', '888888', 'ADMIN', '0139899429');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hadir`
--
ALTER TABLE `hadir`
  ADD PRIMARY KEY (`bil`),
  ADD KEY `nomKp` (`nomKp`);

--
-- Indexes for table `hp`
--
ALTER TABLE `hp`
  ADD PRIMARY KEY (`nomHp`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nomKp`),
  ADD UNIQUE KEY `nomHp` (`nomHp`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hadir`
--
ALTER TABLE `hadir`
  MODIFY `bil` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hadir`
--
ALTER TABLE `hadir`
  ADD CONSTRAINT `hadir_ibfk_1` FOREIGN KEY (`nomKp`) REFERENCES `peserta` (`nomKp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`nomHp`) REFERENCES `hp` (`nomHp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
