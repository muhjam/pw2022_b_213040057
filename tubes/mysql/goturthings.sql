-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220525.c1e393abce
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2022 at 05:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goturthings`
--

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender`) VALUES
('-'),
('female'),
('male');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `jenis_produk` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`jenis_produk`) VALUES
('Baju'),
('Celana'),
('Flanel'),
('Hoodie'),
('Jaket'),
('Sepatu'),
('Sweater'),
('Topi'),
('Vest');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level`) VALUES
('admin'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `jenis_produk` char(10) NOT NULL,
  `kode_produk` char(8) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `jenis_produk`, `kode_produk`, `nama_produk`, `ukuran`, `harga`, `keterangan`, `gambar`, `warna`) VALUES
(49, 'Sweater', '2203001', 'Flece hoddie HOTPING (black)', 'EU37', 499000, 'kondisi pemakaian noramal', '62761efc8d8ec.jpeg', NULL),
(50, 'Flanel', '2203001', 'dkadkldf', 'M', 199000, 'kondisi pemakaian normal', '627767ec36089.jpg', NULL),
(51, 'Flanel', '2203001', 'Nike Air Jordan 1 Mid &#039;WhiteLightning&#039;', 'M', 49900, 'kondisi pemakaian noraml', '62778e3ecef7c.jpeg', NULL),
(53, 'Celana', '2203001', 'Nike Air Force 1 &#039;07 Full White', 'EU40', 499000, 'kondisi dalampemakaian noraml', '62777ce4b6169.jpg', NULL),
(54, 'Hoodie', '2203001', 'aaaaaaa', 'EU41', 899000, 'kondisi pemakaian noramal', '62777ea6b88de.jpg', NULL),
(55, 'Celana', '2203002', 'Nike Air Force 1 &#039;07 Full White', 'L', 199000, 'kondisi pemakaian noramal', '6277ab2d8730d.jpg', NULL),
(57, 'Flanel', '2203001', 'Flece hoddie HOTPING (black)', 'XL', 499000, 'kondisi pemakaian noraml', '627a7d3182dcb.jpg', NULL),
(58, 'Topi', '2203008', 'dkadkldf', 'M', 49900, 'kondisi dalam pemakaian noraml', '627a7d41ac005.jpg', NULL),
(59, 'Flanel', '2203002', 'Nike Air Force 1 &#039;07 Full White', 'EU37', 899000, 'kondisi pemakaian noraml', '627a7d52e6bc0.jpg', NULL),
(60, 'Sepatu', 'rwqrqwr', 'dfsdvss', 'L', 2214, 'kondisi pemakaian noramal', '628f4906a6cda.jpg', '#c1bc9a'),
(63, 'Celana', '2203001', 'Flece hoddie HOTPING (black)', 'XL', 199000, 'kondisi dalam pemakaian noraml kondisi 90%', '628f5d0ed4f36.jpg', '#3357e6');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
('ban'),
('no');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `ukuran` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`ukuran`) VALUES
('27'),
('28'),
('29'),
('30'),
('31'),
('32'),
('33'),
('34'),
('EU37'),
('EU38'),
('EU39'),
('EU40'),
('EU41'),
('EU42'),
('EU43'),
('EU44'),
('L'),
('M'),
('S'),
('UK36'),
('XL'),
('XXL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(250) DEFAULT '',
  `password` varchar(225) DEFAULT NULL,
  `foto` varchar(250) NOT NULL DEFAULT 'default.png',
  `no_telp` char(13) DEFAULT '',
  `alamat` varchar(250) DEFAULT '',
  `level` char(5) DEFAULT NULL,
  `gender` char(6) DEFAULT '-',
  `lahir` date DEFAULT current_timestamp(),
  `status` char(3) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `foto`, `no_telp`, `alamat`, `level`, `gender`, `lahir`, `status`) VALUES
(1, 'admin', 'aaaa@email.com', '$2y$10$m0g0ajHhoISUQ7CJcTgeCOQC/mSGbTSz0IpRes6WssyyCB5RSEnHO', '628f32f6cb528.png', '', '', 'admin', 'male', NULL, 'no'),
(5, 'jamjam', 'muhhjam@gmail.com', '$2y$10$f.xZnZ0NRUiyePTdAr87I.QwRXa.x0SPsHJ./vfZVD0K4Ama781ty', '629138e3067e8.jpg', '081257578571', 'Jl. Tutwuri Handayani No. 81 RT.005/RW.002 Kel. Citeureup Kec. Cimahi Utara Kota. Cimahi', 'admin', 'male', '2002-12-20', 'no'),
(10, 'udinn', 'jamjam@email.com', '$2y$10$mczzYJNnBWYRYe27qpwqy.8qP6THWmE.vfq4AxZWU8RwnaP6DYA3.', 'default.png', '081931455863', 'cucuck', 'user', 'female', NULL, 'ban'),
(19, 'adam', '', '$2y$10$R1ak5bNo85vYSOTsfxhbnOpikDUqH7idtPdPbLUXrmNQbkWGhFDhu', 'default.png', '', '', 'user', 'male', '2022-05-11', 'no'),
(20, 'akas', '', '$2y$10$wmWXWPKtNjwzzHqma5E0PevnG/nRa53ndG4H7VfNQlau1QfeYve3m', 'default.png', '', '', 'user', '-', '2022-05-25', 'no'),
(21, 'gay', '', '$2y$10$fiKSHGQ1nxS8NU3TjZlhVepDq5AcUaLNoCUyXvZddjazhUy/uHpzW', '628e666877897.jpg', '', '', 'admin', '-', '2022-05-25', 'no'),
(22, 'user', '', '$2y$10$ji/xNEgo4z.e70kX5uA2jeiNPB/Y1xIhMtRq6PCVb4CelQ8uED/.u', '62919454b4825.png', '', '', 'user', 'male', '2022-05-04', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`jenis_produk`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_produk` (`jenis_produk`),
  ADD KEY `ukuran` (`ukuran`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`ukuran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `gender` (`gender`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`jenis_produk`) REFERENCES `jenis_produk` (`jenis_produk`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`ukuran`) REFERENCES `ukuran` (`ukuran`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`level`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `gender` (`gender`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



