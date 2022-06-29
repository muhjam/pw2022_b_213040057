-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 04:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

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
('Rompi'),
('Sepatu'),
('Sweater'),
('Topi');

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
  `harga` int(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `jenis_produk`, `kode_produk`, `nama_produk`, `ukuran`, `harga`, `keterangan`, `gambar`, `warna`) VALUES
(64, 'Jaket', 'KBG1', 'Jacket Flace Dord', 'XL', 499000, 'kondisi 90% pemakaian noraml, sudah dicuci sebelum dijual.', '629ee46a3d1cc6297755722989.jpg', '#e5e0e0'),
(65, 'Hoodie', 'KBG2', 'Flece hoddie Baby', 'M', 499000, 'Kondisi 90%, bekas dipake pacar nya justin bibir yang terkenal se rt 04. ini khusus wanita', '629ee448cbc0962977519ef41b.jpg', '#eab3d0'),
(66, 'Sepatu', 'KBG3', 'Nike air force 1 (Full White)', 'EU39', 899000, 'kondisi 90% pemakaian sehari hari seperti biasanya.', '629ee432d2cdb48783731_f1d57525-9f99-497e-85d2-0824677e962b_750_750.jpeg', '#ffffff'),
(67, 'Celana', 'KBG4', 'Jeans Leviâ€™s Crome Heart', '30', 299000, 'kondisi 85% dalam pemakaian noramal', '629ee36b8a4ef629774ea7a02d.jpg', '#4b7caa'),
(68, 'Topi', 'KBG5', 'Hat DiSney Minnie mouse', 'M', 99000, 'kondisi 70% dalam pemakaian noramal', '629ee358b124c629774844eb7f.jpg', '#e54343'),
(75, 'Hoodie', 'KBG6', 'Flece hoddie LA', 'L', 499000, 'kondisi 75% dalam pemakaian noramal', '629ee348a7b4c629774780cbc5.jpg', '#0a27ff'),
(76, 'Jaket', 'KBG7', 'MLB varsity', 'XL', 599000, 'kondisi 75% dalam pemakaian noramal', '629ee331d512f6297746aef496.jpg', '#bb1b1b'),
(79, 'Sepatu', 'KBG8', 'Nike Air Force 1 Mid Sail University Red', 'EU42', 550000, 'Kondisi 70%, pemakaian normal', '629ee328174426297745a1dba9.jpg', '#ffffff'),
(80, 'Sepatu', 'KBG9', 'Nike Air Jordan 1 Mid Triple White', 'EU42', 650000, 'Kondisi 70%, pemakaian normal', '629ee315f15bb6297744ba0e05.jpg', '#ffffff'),
(81, 'Sepatu', 'KBG10', 'Nike Airmax 97 Midnight Navy', 'EU42', 500000, 'Kondisi 70%, pemakaian normal', '629ee306c5944629b9b7d6bfffsama.PNG', '#000000');

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
('non'),
('on');

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
('EU36'),
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
('XL'),
('XXL');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_jenis_produk`
--

CREATE TABLE `ukuran_jenis_produk` (
  `ukuran` char(5) DEFAULT NULL,
  `jenis_produk` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_jenis_produk`
--

INSERT INTO `ukuran_jenis_produk` (`ukuran`, `jenis_produk`) VALUES
('L', 'Baju'),
('M', 'Baju'),
('S', 'Baju'),
('XL', 'Baju'),
('XXL', 'Baju'),
('L', 'Flanel'),
('M', 'Flanel'),
('S', 'Flanel'),
('XL', 'Flanel'),
('XXL', 'Flanel'),
('L', 'Hoodie'),
('M', 'Hoodie'),
('S', 'Hoodie'),
('XL', 'Hoodie'),
('XXL', 'Hoodie'),
('L', 'Jaket'),
('M', 'Jaket'),
('S', 'Jaket'),
('XL', 'Jaket'),
('XXL', 'Jaket'),
('L', 'Sweater'),
('M', 'Sweater'),
('S', 'Sweater'),
('XL', 'Sweater'),
('XXL', 'Sweater'),
('L', 'Topi'),
('M', 'Topi'),
('S', 'Topi'),
('XL', 'Topi'),
('XXL', 'Topi'),
('L', 'Rompi'),
('M', 'Rompi'),
('S', 'Rompi'),
('XL', 'Rompi'),
('XXL', 'Rompi'),
('27', 'Celana'),
('28', 'Celana'),
('29', 'Celana'),
('30', 'Celana'),
('31', 'Celana'),
('32', 'Celana'),
('33', 'Celana'),
('34', 'Celana'),
('EU36', 'Sepatu'),
('EU37', 'Sepatu'),
('EU38', 'Sepatu'),
('EU39', 'Sepatu'),
('EU40', 'Sepatu'),
('EU41', 'Sepatu'),
('EU42', 'Sepatu'),
('EU43', 'Sepatu'),
('EU44', 'Sepatu');

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
  `status` char(3) DEFAULT 'non',
  `kode_aktifasi` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `foto`, `no_telp`, `alamat`, `level`, `gender`, `lahir`, `status`, `kode_aktifasi`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$F/yIrOMw8aQ4Uh0ksOqtU.HyuPey291bchPDwN4ZI5gQIQ4Xd7KN6', 'default.png', '', '', 'admin', '-', '2022-06-29', 'on', ''),
(63, 'Admin GoturthinQs', 'GoturthinQs@gmail.com', '$2y$10$19QiA9B0A8hX/pBkKuDsIe6bmmZYc22dQcnngWOihMrQ9tEPshuaK', '62aade75835bcicon.png', '', '', 'admin', '-', '2022-06-16', 'on', '78080d'),
(66, 'Muhamad Jamaludin Padmawinata', 'muhhjam@gmail.com', '$2y$10$19QiA9B0A8hX/pBkKuDsIe6bmmZYc22dQcnngWOihMrQ9tEPshuaK', 'default.png', '', '', 'user', '-', '2022-06-16', 'on', 'a93354');

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
-- Indexes for table `ukuran_jenis_produk`
--
ALTER TABLE `ukuran_jenis_produk`
  ADD KEY `ukuran` (`ukuran`),
  ADD KEY `jenis_produk` (`jenis_produk`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
-- Constraints for table `ukuran_jenis_produk`
--
ALTER TABLE `ukuran_jenis_produk`
  ADD CONSTRAINT `ukuran_jenis_produk_ibfk_1` FOREIGN KEY (`ukuran`) REFERENCES `ukuran` (`ukuran`),
  ADD CONSTRAINT `ukuran_jenis_produk_ibfk_2` FOREIGN KEY (`jenis_produk`) REFERENCES `jenis_produk` (`jenis_produk`) ON UPDATE CASCADE;

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
