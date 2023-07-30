-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 11:04 AM
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
-- Database: `pilkada`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(255) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `jumlah_tps` int(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama_desa`, `nama_kecamatan`, `jumlah_tps`, `created_at`) VALUES
(3, 'Suka Indah', 'Suka Karya', 18, '2023-06-24'),
(4, 'Karang Satu', 'Karang Bahagia', 20, '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id` int(255) NOT NULL,
  `id_desa` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `tps` int(255) NOT NULL,
  `jumlah_suara` int(255) NOT NULL,
  `link_foto` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id`, `id_desa`, `id_user`, `tps`, `jumlah_suara`, `link_foto`, `created_at`) VALUES
(1, 3, 3, 1, 1, 'botol.jpg', '2023-06-25'),
(2, 3, 3, 2, 12, 'botol.jpg', '2023-06-25'),
(3, 3, 3, 3, 10, 'botol.jpg', '2023-06-25'),
(4, 4, 3, 2, 100, 'botol.jpg', '2023-06-25'),
(5, 3, 3, 8, 123, 'botol.jpg', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$7cYMgt1COke8nXCjCOB6ceVCQ8j83wdeHzZbJQ0WynGsvavNpCgBm',
  `level` enum('Administrator','Petugas') NOT NULL DEFAULT 'Petugas',
  `is_first` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `level`, `is_first`, `created_at`) VALUES
(1, 'admin', 'Administrator', '$2y$10$2pPsRoeiSeISe784Z9S5Ie9eAJ53qufgKFOXSlhGVmwJP.TLymPnO', 'Administrator', 0, '2023-06-24'),
(3, 'abdul', 'Muhammad Abdul', '$2y$10$uHtEVzg0G6//DJe1kjgdOuNIIp51WHnP8kjAfur9oaVIHnOQqH/Qy', 'Petugas', 0, '2023-06-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suara`
--
ALTER TABLE `suara`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
