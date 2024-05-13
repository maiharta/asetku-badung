-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 06:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asetku`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataaset`
--

CREATE TABLE `dataaset` (
  `id_aset` int(11) NOT NULL,
  `namaAset` varchar(255) NOT NULL,
  `totalBarang` varchar(30) NOT NULL,
  `lokasiAset` varchar(255) NOT NULL,
  `jenisAset` varchar(255) NOT NULL,
  `tipeAset` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggalPembelian` varchar(50) NOT NULL,
  `garansi` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataaset`
--

INSERT INTO `dataaset` (`id_aset`, `namaAset`, `totalBarang`, `lokasiAset`, `jenisAset`, `tipeAset`, `supplier`, `harga`, `tanggalPembelian`, `garansi`, `deskripsi`, `gambar`) VALUES
(3, 'testing', '2', 'ruang 2', 'meja', 'komputer', 'saya', '2000000', '2024-05-07', '12 bulan', 'barang baru', '');

-- --------------------------------------------------------

--
-- Table structure for table `datamt`
--

CREATE TABLE `datamt` (
  `id_mt` int(11) NOT NULL,
  `namaAset` varchar(255) NOT NULL,
  `biayaMt` varchar(70) NOT NULL,
  `tanggalMulai` varchar(50) NOT NULL,
  `tanggalSelesai` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datamt`
--

INSERT INTO `datamt` (`id_mt`, `namaAset`, `biayaMt`, `tanggalMulai`, `tanggalSelesai`, `keterangan`, `status`) VALUES
(2, 'testing', '200000000', '2024-05-07', '2024-05-09', 'rusak', 'perbaikan'),
(3, 'testing', '250000000', '2024-05-11', '2024-05-25', 'beres', 'perbaikan selesai');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `id_akun` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masteradmin`
--

INSERT INTO `masteradmin` (`id_akun`, `name`, `email`, `username`, `password`) VALUES
(233, 'zxcvb', 'admin@gmail.com', 'admin', 'asdfg'),
(234, 'gungde321', 'admin321@gmail.com', 'admin321', 'admin321'),
(237, 'gungde234', 'admin@gmail.com', 'nohaha', 'admin'),
(238, 'zxcvb', 'zxcvb@gmail.com', 'zxcvb', 'sssssss'),
(239, 'zxcvb', 'zxcvb@gmail.com', 'zxcvb', 'sssssss'),
(240, 'gungde11111333333456', 'adminssssssss2314@gmail.com', '123321', '31231'),
(242, 'poiuy', 'admin1@gmail.com', 'qwert', 'qwettt'),
(243, 'qqwwweeee', 'admin@gmail.com', 'admin', 'sssssss'),
(244, 'gungde1234567', 'admin567@gmail.com', 'admin777', 'admin777'),
(245, 'gungde12345', 'admin@gmail.com', 'mnbv', 'asdfg'),
(247, 'gungdeEdit', 'zxcvb@gmail.com', 'admin', 'ddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `masterjenisaset`
--

CREATE TABLE `masterjenisaset` (
  `id_jenisAset` int(11) NOT NULL,
  `namaJenisAset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterjenisaset`
--

INSERT INTO `masterjenisaset` (`id_jenisAset`, `namaJenisAset`) VALUES
(2, 'meja'),
(3, 'komputer'),
(4, 'kursi'),
(5, 'monitor'),
(7, 'kursi');

-- --------------------------------------------------------

--
-- Table structure for table `masterlokasi`
--

CREATE TABLE `masterlokasi` (
  `id_lokasi` int(11) NOT NULL,
  `namaLokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterlokasi`
--

INSERT INTO `masterlokasi` (`id_lokasi`, `namaLokasi`) VALUES
(2, 'ruang 2'),
(3, 'ruang baru'),
(4, 'ruang 12');

-- --------------------------------------------------------

--
-- Table structure for table `mastertipeaset`
--

CREATE TABLE `mastertipeaset` (
  `id_tipeAset` int(11) NOT NULL,
  `namaTipeAset` varchar(255) NOT NULL,
  `jenisAset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mastertipeaset`
--

INSERT INTO `mastertipeaset` (`id_tipeAset`, `namaTipeAset`, `jenisAset`) VALUES
(3, 'komputer', 'komputer'),
(4, 'meja', 'meja'),
(5, 'kursi', 'kursi'),
(6, 'monitor1', 'komputer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataaset`
--
ALTER TABLE `dataaset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `datamt`
--
ALTER TABLE `datamt`
  ADD PRIMARY KEY (`id_mt`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `masterjenisaset`
--
ALTER TABLE `masterjenisaset`
  ADD PRIMARY KEY (`id_jenisAset`);

--
-- Indexes for table `masterlokasi`
--
ALTER TABLE `masterlokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `mastertipeaset`
--
ALTER TABLE `mastertipeaset`
  ADD PRIMARY KEY (`id_tipeAset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataaset`
--
ALTER TABLE `dataaset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datamt`
--
ALTER TABLE `datamt`
  MODIFY `id_mt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `masterjenisaset`
--
ALTER TABLE `masterjenisaset`
  MODIFY `id_jenisAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masterlokasi`
--
ALTER TABLE `masterlokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mastertipeaset`
--
ALTER TABLE `mastertipeaset`
  MODIFY `id_tipeAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
