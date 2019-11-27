-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 12:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informatika`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `khs`
-- (See below for the actual view)
--
CREATE TABLE `khs` (
`NIM` varchar(10)
,`Nama_MK` varchar(50)
,`Nilai_Angka` int(3)
,`Nilai_Huruf` varchar(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `Nama` char(50) DEFAULT NULL,
  `Kelas` char(5) DEFAULT NULL,
  `Alamat` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Kelas`, `Alamat`) VALUES
('L200080001', 'Ari Wibowo', 'A', 'Solo'),
('L200080080', 'Agustina Anggraini', 'B', 'Sragen'),
('L200160118', 'Just Hans', 'A', 'Kedokan,Klego,California'),
('L200160119', 'juhabach', 'A', 'springfield');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `NIM` varchar(10) NOT NULL DEFAULT '',
  `Nama_MK` varchar(50) DEFAULT NULL,
  `Nilai_Angka` int(3) DEFAULT NULL,
  `Nilai_Huruf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`NIM`, `Nama_MK`, `Nilai_Angka`, `Nilai_Huruf`) VALUES
('', NULL, NULL, NULL),
('L200080002', 'Kapita Selekta', 60, 'BC'),
('L200080010', 'Pemrogramman Web', 87, 'A'),
('L200080080', 'Pemrogramman Web', 90, 'A');

-- --------------------------------------------------------

--
-- Structure for view `khs`
--
DROP TABLE IF EXISTS `khs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `khs`  AS  select `mahasiswa`.`NIM` AS `NIM`,`nilai`.`Nama_MK` AS `Nama_MK`,`nilai`.`Nilai_Angka` AS `Nilai_Angka`,`nilai`.`Nilai_Huruf` AS `Nilai_Huruf` from (`mahasiswa` join `nilai` on((`mahasiswa`.`NIM` = `nilai`.`NIM`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
