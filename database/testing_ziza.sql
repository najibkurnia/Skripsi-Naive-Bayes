-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2020 pada 07.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_ziza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

-- INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pass`) VALUES
-- ('1', 'Aziza', 'admin', 'c3284d0f94606de1fd2af172aba15bf3'),
-- ('2', 'Aziza 2', 'aziza', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_testing`
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

CREATE TABLE `data_train` (
  `no_train` int(11) NOT NULL,
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
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `data_train` (
  `id_train` int(11) NOT NULL,
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


CREATE TABLE `hasil_naive` (
  `id_hasil` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
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
  `hasil_tidak` varchar(20) NOT NULL,
  `hasil_ada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`no_testing`);

ALTER TABLE `data_train`
  ADD PRIMARY KEY (`no_train`);

ALTER TABLE `hasil_naive`
  ADD PRIMARY KEY (`id_hasil`);

ALTER TABLE `data_testing`
  MODIFY `no_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

ALTER TABLE `data_train`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `hasil_naive`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

