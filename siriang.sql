-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 06:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siriang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan`
--

CREATE TABLE `data_pengajuan` (
  `pengajuan_id` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gu_panjar` int(1) NOT NULL,
  `panjar_id` varchar(20) NOT NULL,
  `user_id` int(3) NOT NULL,
  `bidang_id` varchar(20) NOT NULL,
  `kode_rekening` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `nominal_kotor` decimal(15,2) NOT NULL,
  `pajak` decimal(15,2) NOT NULL,
  `nominal_bersih` decimal(15,2) NOT NULL,
  `status` enum('M','N','Y') NOT NULL,
  `tanggal_status` date NOT NULL,
  `jam_status` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gu_panjar`
--

CREATE TABLE `gu_panjar` (
  `gu_panjar_id` int(1) NOT NULL,
  `gu_panjar_nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_id`
--

CREATE TABLE `kegiatan_id` (
  `kegiatan_id` varchar(20) NOT NULL,
  `bidang_id` varchar(20) NOT NULL,
  `nama_bidang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kode_rekening`
--

CREATE TABLE `kode_rekening` (
  `kode_rekening` varchar(200) NOT NULL,
  `nama_rekening` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panjar`
--

CREATE TABLE `panjar` (
  `panjar_id` varchar(20) NOT NULL,
  `tanggal_panjar` date NOT NULL,
  `jam_panjar` time NOT NULL,
  `bidang_id` varchar(20) NOT NULL,
  `kegiatan_id` varchar(20) NOT NULL,
  `nominal` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan_panjar`
--

CREATE TABLE `pelunasan_panjar` (
  `penulisan_id` varchar(50) NOT NULL,
  `panjar_id` varchar(20) NOT NULL,
  `pengajuan_id` varchar(30) NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `jam_pelunasan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_panjar`
--

CREATE TABLE `pengembalian_panjar` (
  `pengembalian_id` varchar(50) NOT NULL,
  `panjar_id` varchar(50) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `jam_pelunasan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_bidang`
--

CREATE TABLE `ref_bidang` (
  `bidang_id` varchar(20) NOT NULL,
  `nama_bidang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `bidang_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` enum('Yes','No') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gu_panjar`
--
ALTER TABLE `gu_panjar`
  ADD PRIMARY KEY (`gu_panjar_id`);

--
-- Indexes for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
