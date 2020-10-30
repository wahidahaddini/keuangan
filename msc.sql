-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2019 at 08:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msc`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_kbm` int(5) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `keterangan` enum('Hadir','Tanpa Keterangan','Ijin','Sakit') NOT NULL,
  `waktu_absen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `spp` int(11) NOT NULL,
  `cicilan` int(11) NOT NULL,
  `pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`spp`, `cicilan`, `pendaftaran`) VALUES
(100000, 50000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pendaftaran`
--

CREATE TABLE `biaya_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `invoice` varchar(6) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_pendaftaran`
--

INSERT INTO `biaya_pendaftaran` (`id_pendaftaran`, `invoice`, `kode_siswa`, `nominal`, `tgl_bayar`) VALUES
(4, '090720', 'MSC001', 1000000, '2019-07-09'),
(5, '090720', 'MSC002', 1000000, '2019-07-09'),
(6, '090720', 'MSC003', 1000000, '2019-07-09'),
(7, '090720', 'MSC004', 1000000, '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_spp`
--

CREATE TABLE `detail_pembayaran_spp` (
  `id_detail` int(11) NOT NULL,
  `id_pembayaran_spp` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran_spp`
--

INSERT INTO `detail_pembayaran_spp` (`id_detail`, `id_pembayaran_spp`, `bulan`, `tahun`) VALUES
(17, 12, 1, 2019),
(18, 12, 2, 2019),
(19, 12, 3, 2019),
(20, 12, 4, 2019),
(21, 13, 1, 2019),
(22, 13, 2, 2019),
(23, 14, 1, 2019),
(24, 14, 2, 2019),
(25, 14, 3, 2019),
(26, 14, 4, 2019),
(27, 14, 5, 2019),
(28, 15, 1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `group_siswa`
--

CREATE TABLE `group_siswa` (
  `kode_group` varchar(6) NOT NULL,
  `nama_group` varchar(20) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_siswa`
--

INSERT INTO `group_siswa` (`kode_group`, `nama_group`, `kode_tentor`) VALUES
('GP001', 'Mars', 'TR001'),
('GP002', 'Bumi', 'TR002'),
('GP003', 'Venus', 'TR003');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `minggu_ke` int(1) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_mapel_tentor` int(5) NOT NULL,
  `hari` varchar(8) NOT NULL,
  `hari_ke` int(1) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_slesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `minggu_ke`, `kode_group`, `id_mapel_tentor`, `hari`, `hari_ke`, `jam_mulai`, `jam_slesai`) VALUES
(11, 1, 'GP001', 24, 'Selasa', 2, '00:33:00', '02:33:00'),
(12, 1, 'GP001', 25, 'Selasa', 2, '01:34:00', '03:34:00'),
(13, 1, 'GP002', 26, 'Selasa', 2, '00:34:00', '02:35:00'),
(14, 1, 'GP002', 27, 'Selasa', 2, '01:35:00', '03:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(2) NOT NULL,
  `nama_jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(7, 'SD'),
(8, 'SMP'),
(9, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kbm`
--

INSERT INTO `kbm` (`id_kbm`, `id_jadwal`, `tanggal`, `pengumuman`) VALUES
(10, 12, '2019-07-09', 'Belajar Kosakata'),
(11, 11, '2019-07-09', ''),
(12, 13, '2019-07-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_kbm`
--

CREATE TABLE `lampiran_kbm` (
  `id_lampiran` int(8) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `id_kbm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran_kbm`
--

INSERT INTO `lampiran_kbm` (`id_lampiran`, `lampiran`, `caption`, `id_kbm`) VALUES
(2, 'BKPM_WEB FrameWork_CI_Khafid.pdf', 'WEB', 10),
(3, 'Adi Cahya Wiratmaya.docx', 'Belajar Kosakata', 10);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `tipe` enum('Spp','Cicilan','Pendaftaran','Gaji') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `id_parent`, `tipe`, `tanggal`, `nominal`) VALUES
(25, 19, 'Pendaftaran', '2019-07-09', 1000000),
(26, 20, 'Pendaftaran', '2019-07-09', 1000000),
(27, 21, 'Pendaftaran', '2019-07-09', 1000000),
(28, 22, 'Pendaftaran', '2019-07-09', 1000000),
(29, 3, 'Cicilan', '2019-07-09', 200000),
(30, 4, 'Cicilan', '2019-07-09', 1000000),
(31, 5, 'Cicilan', '2019-07-09', 500000),
(32, 12, 'Spp', '2019-07-09', 400000),
(33, 13, 'Spp', '2019-07-09', 200000),
(34, 14, 'Spp', '2019-07-09', 500000),
(35, 15, 'Spp', '2019-07-09', 100000),
(36, 3, 'Gaji', '2019-07-09', 1000000),
(37, 4, 'Gaji', '2019-07-09', 1000000),
(38, 5, 'Gaji', '2019-07-09', 1000000),
(39, 6, 'Gaji', '2019-07-09', 1000000),
(40, 7, 'Gaji', '2019-07-09', 1000000),
(41, 8, 'Gaji', '2019-07-09', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `id_jenjang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mata_pelajaran`, `id_jenjang`) VALUES
(14, 'Matematika-SD', 7),
(15, 'Bahasa Indonesia-SD', 7),
(16, 'Bahasa Inggris - SD', 7),
(17, 'Bahasa Inggris - SMA', 9),
(18, 'Matematika-SMP', 8),
(19, 'Bahasa Indonesia-SMP', 8),
(20, 'Bahasa Inggris - SMP', 8);

-- --------------------------------------------------------

--
-- Table structure for table `mapel_tentor`
--

CREATE TABLE `mapel_tentor` (
  `id_mapel_tentor` int(5) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_tentor`
--

INSERT INTO `mapel_tentor` (`id_mapel_tentor`, `id_mapel`, `kode_tentor`) VALUES
(24, 14, 'TR001'),
(25, 15, 'TR001'),
(26, 19, 'TR002'),
(27, 20, 'TR002'),
(28, 15, 'TR003'),
(29, 18, 'TR003'),
(30, 19, 'TR003');

-- --------------------------------------------------------

--
-- Table structure for table `msg_req_perubahan_jadwal`
--

CREATE TABLE `msg_req_perubahan_jadwal` (
  `id_msg` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id_nilai_mapel` int(6) NOT NULL,
  `id_nilai` int(6) DEFAULT NULL,
  `id_mapel` int(3) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_mapel`
--

INSERT INTO `nilai_mapel` (`id_nilai_mapel`, `id_nilai`, `id_mapel`, `nilai`, `catatan`) VALUES
(20, 8, 14, 90, 'Bagus'),
(21, 9, 19, 100, 'Sempurna'),
(22, 9, 20, 80, 'Belajar Lebih Giat'),
(23, 10, 19, 80, 'Belajar Lebih Giat'),
(24, 10, 20, 90, 'Bagus'),
(25, 11, 14, 90, 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `sikap` double NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL,
  `tanggal_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai`, `kode_siswa`, `sikap`, `bulan`, `tahun`, `kode_tentor`, `tanggal_penilaian`) VALUES
(8, 'MSC001', 95, 1, 2019, '1', '2019-07-09'),
(9, 'MSC004', 95, 1, 2019, '1', '2019-07-09'),
(10, 'MSC002', 95, 1, 2019, '1', '2019-07-09'),
(11, 'MSC001', 85, 2, 2019, '1', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `kode_siswa`, `pesan`, `tanggal`) VALUES
(7, 'MSC002', 'Pembayaran Cicilan Berhasil', '2019-07-09 00:00:00'),
(8, 'MSC003', 'Pembayaran Cicilan Berhasil', '2019-07-09 00:00:00'),
(9, 'MSC004', 'Pembayaran Cicilan Berhasil', '2019-07-09 00:00:00'),
(10, 'MSC001', 'Pembayaran SPP Berhasil', '2019-07-09 00:00:00'),
(11, 'MSC002', 'Pembayaran SPP Berhasil', '2019-07-09 00:00:00'),
(12, 'MSC003', 'Pembayaran SPP Berhasil', '2019-07-09 00:00:00'),
(13, 'MSC004', 'Pembayaran SPP Berhasil', '2019-07-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(3) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `nama_ortu`, `no_hp`, `foto`, `username`, `password`) VALUES
(19, 'Atuna Atun', '089787876765', 'default_ortu.png', '', ''),
(20, 'Manis Sinta Asuna', '098747213789', 'default_ortu.png', '', ''),
(21, 'Sucipto', '087213211743', 'default_ortu.png', '', ''),
(22, 'Abdul Qodir Jaelani', '098777666567', 'default_ortu.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_cicilan`
--

CREATE TABLE `pembayaran_cicilan` (
  `id_pembayaran_cicilan` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `tahun` int(4) NOT NULL,
  `cicilan_ke` int(1) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_cicilan`
--

INSERT INTO `pembayaran_cicilan` (`id_pembayaran_cicilan`, `kode_siswa`, `tahun`, `cicilan_ke`, `nominal`, `tanggal_bayar`) VALUES
(3, 'MSC002', 2019, 1, 200000, '2019-07-09'),
(4, 'MSC003', 2019, 1, 1000000, '2019-07-09'),
(5, 'MSC004', 2019, 1, 500000, '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_gaji`
--

CREATE TABLE `pembayaran_gaji` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_gaji`
--

INSERT INTO `pembayaran_gaji` (`id_pembayaran`, `kode_tentor`, `bulan`, `tahun`, `nominal`, `tanggal_bayar`) VALUES
(3, 'TR001', 1, 2019, 1000000, '2019-07-09'),
(4, 'TR001', 2, 2019, 1000000, '2019-07-09'),
(5, 'TR001', 3, 2019, 1000000, '2019-07-09'),
(6, 'TR002', 1, 2019, 1000000, '2019-07-09'),
(7, 'TR003', 1, 2019, 1000000, '2019-07-09'),
(8, 'TR003', 2, 2019, 1000000, '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id_pembayaran_spp` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id_pembayaran_spp`, `kode_siswa`, `nominal`, `tanggal_bayar`) VALUES
(12, 'MSC001', 100000, '2019-07-09'),
(13, 'MSC002', 100000, '2019-07-09'),
(14, 'MSC003', 100000, '2019-07-09'),
(15, 'MSC004', 100000, '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `req_perubahan_jadwal`
--

CREATE TABLE `req_perubahan_jadwal` (
  `id_req` int(11) NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `ke_hari` varchar(8) NOT NULL,
  `ke_minggu` int(1) NOT NULL,
  `ke_jam` time NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak','Berakhir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas` int(2) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_ortu` int(3) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `cicilan` int(11) NOT NULL,
  `awal_spp` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `kode_siswa`, `nama_siswa`, `kelas`, `tgl_lahir`, `jk`, `alamat`, `foto`, `no_hp`, `kode_group`, `id_ortu`, `tgl_daftar`, `cicilan`, `awal_spp`) VALUES
(19, 'MSC001', 'Indri Nurhamida', 3, '1998-02-13', 'Perempuan', 'Situbondo', 'default_siswa.png', '082133768768', 'GP001', 19, '1987-02-13', 0, '100000'),
(20, 'MSC002', 'Wahidah Addini', 4, '1999-12-09', 'Perempuan', 'Situbondo', 'default_siswa.png', '087987888744', 'GP002', 20, '1986-12-13', 2000000, '100000'),
(21, 'MSC003', 'David Setya Ainur Hakiki R', 3, '1999-12-01', 'Laki Laki', 'Bondowoso', 'default_siswa.png', '098767656555', 'GP003', 21, '1988-02-13', 2000000, '100000'),
(22, 'MSC004', 'Risqi Chandra Kurniawan', 7, '1995-12-03', 'Laki Laki', 'Banyuwangi', 'default_siswa.png', '098213747666', 'GP002', 22, '1976-02-13', 2000000, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `kode_tentor` varchar(6) NOT NULL,
  `nama_tentor` varchar(30) NOT NULL,
  `jk` enum('Laki Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `gaji` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`kode_tentor`, `nama_tentor`, `jk`, `alamat`, `no_hp`, `pendidikan_terakhir`, `gaji`, `foto`) VALUES
('TR001', 'Muhammad Fathan Ridlo', 'Laki Laki', 'Maesan', '081216938489', 'S1', 1000000, ''),
('TR002', 'Muhammad Thoriq Firdaus', 'Laki Laki', 'Maesan', '081897657878', 'S1', 1000000, ''),
('TR003', 'Muhammad Atta Tsalitsa', 'Laki Laki', 'Maaesan', '082123678747', 'S2', 1000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Tentor','Siswa','Orang Tua','Owner') NOT NULL,
  `id_child` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_pengguna`, `hak_akses`, `id_child`) VALUES
(11, 'admin', 'admin', 'Admin', 'Admin', '1'),
(12, 'owner', 'owner', 'Owner', 'Owner', '1'),
(19, 'TR001', 'muhammadfathanridlo', 'Muhammad Fathan Ridlo', 'Tentor', 'TR001'),
(20, 'TR002', 'muhammadthoriqfirdaus', 'Muhammad Thoriq Firdaus', 'Tentor', 'TR002'),
(21, 'TR003', 'muhammadattatsalitsa', 'Muhammad Atta Tsalitsa', 'Tentor', 'TR003'),
(22, 'msc001', '$2y$10$EVLR42GGi2THu09dGQxJ1.Pu11uZEQ9xpFD5S9dApiyaH/vfVl3dC', 'Indri Nurhamida', 'Siswa', 'MSC001'),
(23, 'atuna_atun', '$2y$10$SU2ftyKAKMW/jFbCfd0tQOi5BE6whsJ8Tf410zuaQOnw.slHrUSbC', 'Atuna Atun', 'Orang Tua', '19'),
(24, 'msc002', '$2y$10$3I4CR/lpRaOLg9uFLwX/ieGqPDvuRTYu3q5n07pOjaOeAX8xUjNMC', 'Wahidah Addini', 'Siswa', 'MSC002'),
(25, 'manis_sinta_asuna', '$2y$10$R6AYTdLTIgnOUQuX1SHzgOypdnfNNnQMCk31QnK5aXDLBo1RlzX8G', 'Manis Sinta Asuna', 'Orang Tua', '20'),
(26, 'msc003', '$2y$10$v87b5BXrBiidIjwpX4Lu2e0VqA9TeDjvKvjIQTVtdwm1iTAn50QTa', 'David Setya Ainur Hakiki R', 'Siswa', 'MSC003'),
(27, 'sucipto', '$2y$10$6cgusuTA65Vp.Iqt/4BfSuF9nIcOSfX.P7qdP5SQ6Tzemo37blM2O', 'Sucipto', 'Orang Tua', '21'),
(28, 'msc004', '$2y$10$JTKr7fiIRBlp1YdoTtFtVesC4dUt2Y8EHs5pkvg1Gvuh6fL9WLXq2', 'Risqi Chandra Kurniawan', 'Siswa', 'MSC004'),
(29, 'abdul_qodir_jaelani', '$2y$10$zlAQ6dKwJgL2caYQshEzGecK.Le6NwFutZ2n58kJro.fhSb4DljB.', 'Abdul Qodir Jaelani', 'Orang Tua', '22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `detail_pembayaran_spp`
--
ALTER TABLE `detail_pembayaran_spp`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `group_siswa`
--
ALTER TABLE `group_siswa`
  ADD PRIMARY KEY (`kode_group`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id_kbm`);

--
-- Indexes for table `lampiran_kbm`
--
ALTER TABLE `lampiran_kbm`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mapel_tentor`
--
ALTER TABLE `mapel_tentor`
  ADD PRIMARY KEY (`id_mapel_tentor`);

--
-- Indexes for table `msg_req_perubahan_jadwal`
--
ALTER TABLE `msg_req_perubahan_jadwal`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id_nilai_mapel`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `pembayaran_cicilan`
--
ALTER TABLE `pembayaran_cicilan`
  ADD PRIMARY KEY (`id_pembayaran_cicilan`);

--
-- Indexes for table `pembayaran_gaji`
--
ALTER TABLE `pembayaran_gaji`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id_pembayaran_spp`);

--
-- Indexes for table `req_perubahan_jadwal`
--
ALTER TABLE `req_perubahan_jadwal`
  ADD PRIMARY KEY (`id_req`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `kode_siswa` (`kode_siswa`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`kode_tentor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_pembayaran_spp`
--
ALTER TABLE `detail_pembayaran_spp`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lampiran_kbm`
--
ALTER TABLE `lampiran_kbm`
  MODIFY `id_lampiran` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mapel_tentor`
--
ALTER TABLE `mapel_tentor`
  MODIFY `id_mapel_tentor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `msg_req_perubahan_jadwal`
--
ALTER TABLE `msg_req_perubahan_jadwal`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id_nilai_mapel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_cicilan`
--
ALTER TABLE `pembayaran_cicilan`
  MODIFY `id_pembayaran_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran_gaji`
--
ALTER TABLE `pembayaran_gaji`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id_pembayaran_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `req_perubahan_jadwal`
--
ALTER TABLE `req_perubahan_jadwal`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
