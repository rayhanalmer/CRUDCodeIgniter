-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 07:34 PM
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
-- Database: `if_assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `kode_departemen` varchar(50) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`kode_departemen`, `nama_departemen`) VALUES
('IF001', 'Teknik Computer-Informatika'),
('SI002', 'Sistem Informasi'),
('TE003', 'Teknik Elektro'),
('TK004', 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_departemen`
--

CREATE TABLE `inventory_departemen` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `kode_departemen` varchar(50) NOT NULL,
  `nilai_perolehan` int(20) NOT NULL,
  `kondisi_barang` varchar(10) NOT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_departemen`
--

INSERT INTO `inventory_departemen` (`kode_barang`, `nama_barang`, `merk_barang`, `jumlah_barang`, `kode_departemen`, `nilai_perolehan`, `kondisi_barang`, `catatan`) VALUES
('IF0004', 'Super PC', 'ROG', 2, 'IF001', 128000000, 'Lemot', 'perlu di upgrade'),
('SI0008', 'VGA RTX', 'NVIDIA GeForce', 3, 'SI002 ', 23700000, 'Bagus', 'perlu ditambah banyak'),
('TE0001', 'Osiloskop', 'KKmoon', 5, 'TE003', 112000, 'Bagus', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_password`, `user_created_at`) VALUES
('RF01', 'rafiadm1@its.com', 'rfadm1its', 'rfadminits', '2023-11-13 16:33:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`kode_departemen`);

--
-- Indexes for table `inventory_departemen`
--
ALTER TABLE `inventory_departemen`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_departemen` (`kode_departemen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_departemen`
--
ALTER TABLE `inventory_departemen`
  ADD CONSTRAINT `inventory_departemen_ibfk_1` FOREIGN KEY (`kode_departemen`) REFERENCES `departemen` (`kode_departemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
