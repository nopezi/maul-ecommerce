-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2020 at 07:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maul_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `no_hp` int(30) NOT NULL,
  `alamat` text NOT NULL,
  `produk` varchar(100) NOT NULL,
  `warna_produk` varchar(10) NOT NULL,
  `ukuran_produk` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id`, `nama_pembeli`, `no_hp`, `alamat`, `produk`, `warna_produk`, `ukuran_produk`, `quantity`, `total_harga`, `created_at`) VALUES
(5, 'jono', 8080808, 'jogjakarta', 'Gojek Hijau', 'Hijau', 'L', 2, '280000', ''),
(6, 'jono', 8080808, 'jogjakarta', 'Gojek Hijau', 'Hijau', 'L', 2, '280000', ''),
(7, 'bambang', 8080808, 'purwokerto', 'Gojek Hijau', 'Hijau', 'L', 3, '420000', ''),
(8, 'bambang', 8080808, 'purwokerto', 'Gojek Hijau', 'Hijau', 'L', 3, '420000', ''),
(9, 'toyiib', 2147483647, 'BANG TOYIB GK PULANG2', 'Kaos Mujahidin', 'Kuning', 'M', 4, '80000', '21-06-2020 05:34'),
(10, 'tiyib', 932232, 'ALAMAT PALSU', 'Kaos Mujahidin', 'Kuning', 'M', 3, '60000', '22-06-2020 09:25');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `id_produk`, `gambar`) VALUES
(1, 3, '091a350cc19b4f0cfbea002ea1433613.png'),
(2, 1, '71c239ee5609cadcd3b0d9a1342b1725.jpg'),
(3, 3, '4e5524bd45a59c1c3e7fd53e9cacb7a6.png'),
(4, 4, '282563a0ed862d1fdd52bc96fed91616.jpeg'),
(15, 8, '1bd02664c8171f38e979253619a93dd2.jpg'),
(16, 8, 'f09c16bd6573b2c537bcc688038083da.jpg'),
(17, 9, '8b71f7cea47bf9485b8f70097dd7a188.png');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_slide`
--

CREATE TABLE `gambar_slide` (
  `id_slide` int(11) NOT NULL,
  `gambar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_slide`
--

INSERT INTO `gambar_slide` (`id_slide`, `gambar`) VALUES
(1, 'b301bfd44eb737930830af624cabf879.jpg'),
(2, 'db50e58ccdc7a6bad9f87dbe2114eb6d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  `sub_kategori` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `sub_kategori`) VALUES
(2, 'Baju', 'Kaos'),
(3, 'Jaket', 'Gojek'),
(4, 'Celana', 'Celana Panjang'),
(5, 'Gamis', 'Gamis Wanita,Gamis Pria');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` varchar(50) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `sub_kategori` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `harga_ukuran` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `sub_kategori`, `warna`, `harga`, `ukuran`, `harga_ukuran`, `keterangan`) VALUES
(1, '2', 'Kaos Hijrah', 'Kaos', NULL, 30000, 'X', '30000', NULL),
(3, '2', 'Kaos Mujahidin', 'Kaos', 'kuning', 20000, 'm', '20000', 'tes'),
(4, '3', 'Gojek Hijau', 'Gojek', 'Hijau', 150000, 'L', '140000', NULL),
(8, '4', 'Celana Panjang bahan halus', 'Celana Panjang', 'Hitam', 90000, 'L', '90000', 'asdasd'),
(9, '5', 'Gamis Wanita Baru', 'Gamis Wanita', 'Kuning,Kuning Muda', 250000, 'L,M', '255000,250000', '\r\n\r\nGamis Terbaru');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `id_produk`, `ukuran`, `harga`) VALUES
(1, 1, 'X', 30000),
(2, 3, 'M', 20000),
(3, 1, 'L', 40000),
(4, 3, 'L', 30000),
(5, 4, 'L', 140000),
(6, 8, 'L', 90000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `gambar_slide`
--
ALTER TABLE `gambar_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gambar_slide`
--
ALTER TABLE `gambar_slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
