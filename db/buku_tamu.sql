-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 03:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `img_dir` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `img_dir`) VALUES
('admin', '$2y$10$YJMlsasuDDlkgqAUS/.XdOeu/6/gPq1Z9dr1xAe.j40T8TtjfnD5S', 'Administrator', 'image/1638426625.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keperluan`
--

CREATE TABLE `tb_keperluan` (
  `keperluan_id` int(11) NOT NULL,
  `ket_keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_keperluan`
--

INSERT INTO `tb_keperluan` (`keperluan_id`, `ket_keperluan`) VALUES
(1, 'Permintaan Data'),
(2, 'Pembuatan Surat'),
(3, 'Konsultasi'),
(4, 'Rapat'),
(5, 'Penawaran'),
(6, 'Mengantar Barang/Paket'),
(7, 'Keperluan Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `nik_pegawai` int(15) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `tgl_lahir_pegawai` date NOT NULL,
  `pendidikan_pegawai` varchar(10) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `istri_pegawai` int(11) NOT NULL,
  `anak_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`pegawai_id`, `nik_pegawai`, `nama_pegawai`, `tgl_lahir_pegawai`, `pendidikan_pegawai`, `alamat_pegawai`, `istri_pegawai`, `anak_pegawai`) VALUES
(1, 2147483647, 'RIO ANDIKA', '2024-06-12', 'SMA', 'BTN LASOANI ATAS BLOK R N0.20', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `tamu_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `keperluan_id` int(11) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_tlp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `asal_tamu` varchar(256) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_keperluan`
--
ALTER TABLE `tb_keperluan`
  ADD PRIMARY KEY (`keperluan_id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`tamu_id`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `keperluan_id` (`keperluan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keperluan`
--
ALTER TABLE `tb_keperluan`
  MODIFY `keperluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `tamu_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
