-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 04:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saranacentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimasicgl`
--

CREATE TABLE `estimasicgl` (
  `idcgl` int(11) NOT NULL,
  `tebal` float NOT NULL,
  `lebar` float NOT NULL,
  `berat` float NOT NULL,
  `panjang` float NOT NULL,
  `sumber` varchar(20) NOT NULL,
  `mpm` float DEFAULT NULL,
  `menit` float DEFAULT NULL,
  `jam` float DEFAULT NULL,
  `idspec` int(11) NOT NULL,
  `idcoat` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `berattarget` varchar(20) NOT NULL,
  `finished` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_produksi` date DEFAULT NULL,
  `tgl_selesai` date NOT NULL,
  `code_sap` varchar(30) NOT NULL,
  `selesai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimasicgl`
--

INSERT INTO `estimasicgl` (`idcgl`, `tebal`, `lebar`, `berat`, `panjang`, `sumber`, `mpm`, `menit`, `jam`, `idspec`, `idcoat`, `idorder`, `berattarget`, `finished`, `keterangan`, `tgl_produksi`, `tgl_selesai`, `code_sap`, `selesai`) VALUES
(11, 0.7, 1219, 100000, 23, 'KS - ESSAR', 34, 33, 44, 0, 1, 2, '2 - 2.2', 'crom', 'ok', '2017-08-02', '0000-00-00', '0', 0),
(13, 0.2, 940, 100000, 67760, 'KS', 70, 968, 16, 7, 5, 3, '3 - 4.3', 'crom', 'ok', '2017-09-12', '2017-09-09', '0', 1),
(14, 0.7, 1215, 350000, 52423, 'POSCO', 40, 1311, 22, 7, 5, 1, '3 - 4.5', 'crom', 'ok', '2017-09-05', '2017-09-09', '0', 1),
(15, 0.7, 1219, 350000, 52251, 'ESSAR - HYSCO', 40, 1306, 22, 7, 5, 1, '3 - 4.5', 'crom', 'ok', '2017-09-04', '0000-00-00', '0', 1),
(16, 0.2, 880, 200000, 144760, 'KS', 70, 2068, 34, 7, 5, 1, '3 - 4.3', 'crom', 'ok', '2017-09-13', '2017-09-09', '0', 1),
(17, 0.3, 914, 100000, 46458, 'ESSAR', 60, 774, 13, 7, 5, 1, '3 - 4', 'crom', 'ok', '2017-09-06', '2017-09-11', '0', 1),
(18, 0.25, 914, 250000, 139375, 'CSC - KS', 65, 2144, 36, 7, 6, 3, '3 - 4.5', 'CROM', '1-8304', '2017-09-07', '2017-09-12', '0', 1),
(19, 0.4, 1219, 400000, 104502, 'KS', 55, 1900, 32, 7, 5, 1, '2 - 2.2', 'CROM', '1-8304', '2017-09-06', '2017-09-12', '0', 1),
(22, 1, 1219, 250000, 26126, 'POSCO - KS', 30, 871, 15, 7, 9, 1, '3 - 4.8', 'CROM', '1-8315', '2017-09-12', '2017-09-11', '0', 1),
(30, 0.4, 1219, 30000, 7838, 'KS - ESSAR', 55, 143, 2, 3, 5, 4, '2 - 2.2', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(31, 0.5, 1219, 60000, 12540, 'HYSCO', 50, 251, 4, 3, 3, 4, '2 - 2.2', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(32, 1.2, 1219, 200000, 17417, 'KS_HYSCO', 25, 697, 12, 3, 3, 4, '2 - 2.2', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(33, 0.6, 1219, 100000, 17417, 'POSCO - KS', 45, 387, 6, 3, 3, 4, '2 - 2.2', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(34, 0.6, 1219, 80000, 13934, 'KS_TONYI', 45, 310, 5, 7, 3, 1, '3 - 4.8', 'CROM', '-', '2017-09-07', '2017-09-14', '011/VII/2017', 1),
(35, 0.8, 1219, 40000, 5225, 'GUJARAT', 35, 149, 2, 3, 3, 4, '2 - 2.2', 'CROM', '-', '2017-09-07', '2017-09-14', '011/VII/2017', 1),
(36, 0.7, 1219, 400000, 59716, 'ESSAR_KS', 40, 1493, 25, 7, 3, 1, '3 - 4.8', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(37, 0.65, 1219, 100000, 16077, 'BHUSAN_TONYI', 45, 357, 6, 3, 3, 1, '3 - 4.8', 'CROM', '-', '2017-07-11', '2017-09-14', '011/VII/2017', 1),
(38, 1, 1219, 40000, 4180, 'POSCO', 30, 139, 2, 3, 6, 4, '2 - 2.2', 'CROM', '-', '2017-09-07', '2017-09-14', '011/VII/2017', 1),
(39, 0.65, 1219, 65000, 10450, 'KS ', 45, 232, 4, 7, 3, 1, '3 - 4.8', 'CROM', '1-8307', '2017-09-13', '0000-00-00', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimasicgl`
--
ALTER TABLE `estimasicgl`
  ADD PRIMARY KEY (`idcgl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimasicgl`
--
ALTER TABLE `estimasicgl`
  MODIFY `idcgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
