-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.epizy.com
-- Generation Time: Jun 01, 2022 at 10:54 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31630722_goturthings`
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
  `harga` int(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `jenis_produk`, `kode_produk`, `nama_produk`, `ukuran`, `harga`, `keterangan`, `gambar`, `warna`) VALUES
(64, 'Jaket', 'KBG1', 'Jacket Flace Dord', 'XL', 499000, 'kondisi 90% pemakaian noraml, sudah dicuci sebelum dijual.', '628f9d62db1d7.jpg', '#e5e0e0'),
(65, 'Hoodie', 'KBG2', 'Flece hoddie Baby', 'M', 499000, 'Kondisi 90%, bekas dipake pacar nya justin bibir yang terkenal se rt 04. ini khusus wanita', '628f9fe8ad50c.jpg', '#eab3d0'),
(66, 'Sepatu', 'KBG3', 'Nike air force 1 (Full White)', 'EU40', 899000, 'kondisi 90% pemakaian sehari hari seperti biasanya.', '628fa1d886dac.jpeg', '#ffffff'),
(67, 'Celana', 'KBG4', 'Jeans Leviâ€™s Crome Heart', '30', 299000, 'kondisi 85% dalam pemakaian noramal', '628fa38e9066b.jpg', '#4b7caa'),
(68, 'Topi', 'KBG5', 'Hat DiSney Minnie mouse', 'M', 99000, 'kondisi 70% dalam pemakaian noramal', '628faa8318edf.jpg', '#e54343'),
(75, 'Hoodie', 'KBG6', 'Flece hoddie LA', 'L', 499000, 'kondisi 75% dalam pemakaian noramal', '62924af0c377f.jpg', '#0a27ff'),
(76, 'Jaket', 'KBG7', 'MLB varsity', 'XL', 599000, 'kondisi 75% dalam pemakaian noramal', '6292f1b03661d.jpg', '#bb1b1b'),
(79, 'Sepatu', 'KBG8', 'Nike Air Force 1 Mid Sail University Red', 'EU42', 550000, 'Kondisi 70%, pemakaian normal', '62976b807a758.jpg', '#ffffff'),
(80, 'Sepatu', 'KBG9', 'Nike Air Jordan 1 Mid Triple White', 'EU42', 650000, 'Kondisi 70%, pemakaian normal', '62976c241922d.jpg', '#ffffff'),
(81, 'Sepatu', 'KBG10', 'Nike Airmax 97 Midnight Navy', 'EU43', 500000, 'Kondisi 70%, pemakaian normal', '62976d0d110e6.jpg', '#000000');

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
(1, 'admin', 'aaaa@email.com', '$2y$10$m0g0ajHhoISUQ7CJcTgeCOQC/mSGbTSz0IpRes6WssyyCB5RSEnHO', '6292534c131c8.png', '', '', 'admin', 'male', NULL, 'no'),
(5, 'jamjam', 'muhhjam@gmail.com', '$2y$10$ChSXbbx1RDzzNHfJejwMaeSRCe8/wjnSYELg9iVJ.KM2PAn9T4noa', '6292499a9c287.jpg', '081257578571', 'Jl. Tutwuri Handayani No. 81 RT.005/RW.002 Kel. Citeureup Kec. Cimahi Utara Kota. Cimahi', 'admin', 'male', '2002-12-20', 'no'),
(25, 'user', '', '$2y$10$yH.6BIRjTGvTS7ewNwJ8fuO62ymUdg/85toa4B0LukaNuvHugkyBO', 'default.png', '', '', 'user', '-', '2022-05-26', 'no'),
(27, 'imam', '', '$2y$10$eZTgonbDYhxGPN5pX5x1aeMk5P1nxUxzGcqy7urIr0CIlzYqHQIf.', 'default.png', '', '', 'user', '-', '2022-05-27', 'no'),
(28, 'deni pajri', '', '$2y$10$Biku28We8krOjMONoYGQa./3UxwVYN2ci1P2X5OnQmHlmls4ovE6O', 'default.png', '', '', 'user', '-', '2022-05-28', 'no');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
