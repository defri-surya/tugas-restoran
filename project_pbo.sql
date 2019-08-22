-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jun 2019 pada 14.48
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_pbo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `uname`, `pass`) VALUES
(3, '', 'defri', '$2y$10$yg/YuVHSAEpV8PIONbQNR.mFspdZipceARoAhr28.Eert.dvuvQ0O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE IF NOT EXISTS `detailpenjualan` (
`iddetail` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `kodebrg` varchar(10) NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE IF NOT EXISTS `makanan` (
`id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `jenis`, `harga`, `jumlah`) VALUES
(1, 'ikan goreng', 'Makanan', 5000, 10),
(3, 'bakso', 'Makanan', 10000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE IF NOT EXISTS `minuman` (
`id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id`, `nama`, `jenis`, `harga`, `jumlah`) VALUES
(2, 'jus pepaya', 'Minuman', 10000, 10),
(3, 'es teh', 'Minuman', 3000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `total`) VALUES
('PK00001', '2019-06-28', 55000),
('PK00002', '2019-06-28', 15000),
('PK00003', '2019-06-28', 0),
('PK00004', '2019-06-28', 25000),
('PK00005', '2019-06-28', 25000),
('PK00006', '2019-06-28', 50000),
('PK00007', '2019-06-28', 30000),
('PK00008', '2019-06-28', 30000),
('PK00009', '2019-06-28', 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
 ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
