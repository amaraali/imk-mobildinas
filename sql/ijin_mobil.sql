-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijin_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keperluan`
--

CREATE TABLE `jenis_keperluan` (
  `id` int(11) NOT NULL,
  `jenis_keperluan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_keperluan`
--

INSERT INTO `jenis_keperluan` (`id`, `jenis_keperluan`) VALUES
(1, 'Penarikan Uang (Bank)'),
(2, 'Perjalanan Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_keperluan` int(11) NOT NULL,
  `supir` varchar(100) NOT NULL,
  `durasi` int(11) DEFAULT NULL,
  `satuan_durasi` int(11) DEFAULT NULL,
  `waktu_pinjam` datetime DEFAULT NULL,
  `waktu_kembali` datetime DEFAULT NULL,
  `keperluan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_approve_rt` int(11) DEFAULT NULL,
  `is_approve_tu` int(11) DEFAULT NULL,
  `is_approve_dir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('dir','tu','rt','supir','admin') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `level`, `email`, `phone`) VALUES
(1, 'admin', '$2y$10$BGm8/s2bSJ0C.YgUIUhzuenspJsaqSPmAT8/oBOHtDqNRhc.hxtBu', 'Administrator', 'admin', 'admin', 'admin'),
(13, 'dirut', '$2y$10$zWqfW//X1OxgoCXm9ul31ep623lS/ORIoui.WnDpkrfatp7ShBJqm', 'Ghamal Febriyanto', 'dir', 'direktur@mail.com', '087865356786'),
(15, 'spr', '$2y$10$wC4LL5Ev9CkPiNCUX6FoOe08tw/WZV0kFTJV6UlScFE8A3k9Q/jCW', 'Amara Nur Ali', 'supir', 'supir@mail.com', '087824325717'),
(16, 'kurt', '$2y$10$YAZfG4JmyjoNa/6PF0SxcOweQBjdSQ0qz4y67pmC7P9KeaS1K1pJa', 'Fachrizal Zulfi Hendra', 'rt', 'kurt@mail.com', '08986534456'),
(18, 'ktu', '$2y$10$A/sASlDyH7rhfCgUKLQGb.M3QJ2Sk..WCeHGiq6lhk0szpeABq.Ay', 'Bharaka Zulfa Maraghi', 'tu', 'ktu@mail.com', '089876543213'),
(20, 'spr2', '$2y$10$ueTEg/oPfN7Z8tdl6bXCYe6VRU1hpxRtNdunMRDLYg08WNVAZT6BW', 'Muhammad Zaenal', 'supir', 'supir2@mail.com', '087812349876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_keperluan`
--
ALTER TABLE `jenis_keperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_keperluan`
--
ALTER TABLE `jenis_keperluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
