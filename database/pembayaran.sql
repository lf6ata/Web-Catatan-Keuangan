-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2017 at 03:47 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` varchar(10) NOT NULL,
  `identitas_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `identitas_name`) VALUES
('1', 'Operating Expense Record');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `kategori_name` varchar(50) NOT NULL,
  `tipe` int(3) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_name`, `tipe`) VALUES
('K-00000', 'Ongkos Transportasi Barang', 1),
('K-00001', 'Pemasukkan Dari Donatur', 2),
('K-00002', 'Pembayaran Listrik & Air', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `username` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hp` int(12) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('N','Y') DEFAULT 'N',
  `foto` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'admin',
  `tanggal` varchar(10) NOT NULL,
  `status` enum('N','Y') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=374 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama_lengkap`, `hp`, `email`, `blokir`, `foto`, `level`, `tanggal`, `status`) VALUES
(347, '21232f297a57a5a743894a0e4a801fc3', 'Sigit Dwi Prasetyo', 818956973, 'admin', 'Y', '31565.jpg', 'admin', '', 'N'),
(372, '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 818956973, 'admin@app.com', 'N', '28userAvatar-Large.png', 'admin', '2017-05-31', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `operasi`
--

CREATE TABLE IF NOT EXISTS `operasi` (
  `id_operasi` int(2) NOT NULL AUTO_INCREMENT,
  `nama_operasi` varchar(15) NOT NULL,
  `remark` varchar(5) NOT NULL,
  PRIMARY KEY (`id_operasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `operasi`
--

INSERT INTO `operasi` (`id_operasi`, `nama_operasi`, `remark`) VALUES
(1, 'Pengurangan', '-'),
(2, 'Penambahan', '+');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `pemasukan` int(10) NOT NULL,
  `pengeluaran` int(10) NOT NULL,
  `remark` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kategori`, `pemasukan`, `pengeluaran`, `remark`, `username`, `tanggal`) VALUES
('T-00000', 'K-00001', 2200000, 0, '-', '347', '2017-05-31'),
('T-00001', 'K-00000', 0, 400000, '-', '347', '2017-05-31'),
('T-00002', 'K-00002', 0, 200000, '-', '347', '2017-05-31'),
('T-00003', 'K-00001', 200000, 0, '-', '372', '2017-05-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
