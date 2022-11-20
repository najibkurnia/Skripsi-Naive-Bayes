-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 07:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pass`) VALUES
('1', 'admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `no_testing` int(11) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tipe_nyeri` varchar(20) NOT NULL,
  `tekanan_darah` varchar(20) NOT NULL,
  `kolesterol` varchar(20) NOT NULL,
  `gula_darah` varchar(20) NOT NULL,
  `elektro` varchar(20) NOT NULL,
  `detak_jantung` varchar(20) NOT NULL,
  `angina` varchar(20) NOT NULL,
  `oldpeak` varchar(20) NOT NULL,
  `segmen` varchar(20) NOT NULL,
  `pembulu_darah` varchar(20) NOT NULL,
  `thalassemia` varchar(20) NOT NULL,
  `ket_act` varchar(20) NOT NULL,
  `ket_prediksi` varchar(20) DEFAULT NULL,
  `bobot` varchar(20) NOT NULL,
  `CM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_train`
--

CREATE TABLE `data_train` (
  `id_train` int(11) NOT NULL,
  `no_train` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `disiplin` varchar(20) NOT NULL,
  `teamwork` varchar(20) NOT NULL,
  `leadership` varchar(20) NOT NULL,
  `kepatuhan` varchar(20) NOT NULL,
  `kejujuran` varchar(20) NOT NULL,
  `inisiatif` varchar(20) NOT NULL,
  `hasil_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_train`
--

INSERT INTO `data_train` (`id_train`, `no_train`, `nama`, `pendidikan_terakhir`, `disiplin`, `teamwork`, `leadership`, `kepatuhan`, `kejujuran`, `inisiatif`, `hasil_status`) VALUES
(1, 0, 'Muhammda Khudori', 'SMA', '51-79', '>=80', '51-79', '>=80', '51-79', '>=80', 'Normal'),
(2, 0, 'Wahyu', 'S1', '51-79', '51-79', '51-79', '51-79', '51-79', '51-79', 'Normal'),
(3, 0, 'Soni', 'SMP', '<=50', '<=50', '<=50', '<=50', '<=50', '<=50', 'Kurang'),
(4, 0, 'Fuad', 'SMA', '>=80', '>=80', '>=80', '>=80', '>=80', '>=80', 'Baik'),
(5, 0, 'Muhammda Rhoma', 'SMA', '51-79', '51-79', '51-79', '51-79', '51-79', '51-79', 'Normal'),
(6, 0, 'Akbar', 'SMA', '51-79', '51-79', '51-79', '>=80', '51-79', '51-79', 'Normal'),
(7, 0, 'Suryono', 'SMP', '>=80', '>=80', '>=80', '>=80', '>=80', '>=80', 'Baik'),
(8, 0, 'Muhammad Kholil', 'S1', '>=80', '51-79', '51-79', '51-79', '>=80', '51-79', 'Normal'),
(9, 0, 'Muhammad Arif', 'SMA', '>=80', '>=80', '>=80', '51-79', '51-79', '51-79', 'Baik'),
(10, 0, 'Vandema', 'SMA', '<=50', '<=50', '51-79', '<=50', '51-79', '<=50', 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_naive`
--

CREATE TABLE `hasil_naive` (
  `id_hasil` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `disiplin` varchar(20) NOT NULL,
  `teamwork` varchar(20) NOT NULL,
  `leadership` varchar(20) NOT NULL,
  `kepatuhan` varchar(20) NOT NULL,
  `kejujuran` varchar(20) NOT NULL,
  `inisiatif` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `hasil_baik` varchar(20) NOT NULL,
  `hasil_normal` varchar(20) NOT NULL,
  `hasil_kurang` varchar(20) NOT NULL,
  `pembulu_darah` varchar(20) NOT NULL,
  `thalassemia` varchar(20) NOT NULL,
  `hasil_tidak` varchar(20) NOT NULL,
  `hasil_ada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_naive`
--

INSERT INTO `hasil_naive` (`id_hasil`, `pendidikan_terakhir`, `disiplin`, `teamwork`, `leadership`, `kepatuhan`, `kejujuran`, `inisiatif`, `status`, `nama`, `hasil_baik`, `hasil_normal`, `hasil_kurang`, `pembulu_darah`, `thalassemia`, `hasil_tidak`, `hasil_ada`) VALUES
(6, 'SMP', '>=80', '<=50', '<=50', '<=50', '>=80', '51-79', '', 'qwerty', '0', '0', '0', '', '', '', ''),
(7, 'SMP', '>=80', '<=50', '<=50', '<=50', '>=80', '51-79', '', 'qwerty', '0', '0', '0', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`no_testing`);

--
-- Indexes for table `data_train`
--
ALTER TABLE `data_train`
  ADD PRIMARY KEY (`id_train`);

--
-- Indexes for table `hasil_naive`
--
ALTER TABLE `hasil_naive`
  ADD PRIMARY KEY (`id_hasil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `no_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `data_train`
--
ALTER TABLE `data_train`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil_naive`
--
ALTER TABLE `hasil_naive`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
