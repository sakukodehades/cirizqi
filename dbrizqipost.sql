-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 07:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbrizqipost`
--

-- --------------------------------------------------------

--
-- Table structure for table `mbarang`
--

CREATE TABLE IF NOT EXISTS `mbarang` (
  `noid` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `satuan` varchar(30) NOT NULL,
  PRIMARY KEY (`noid`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mbarang`
--

INSERT INTO `mbarang` (`noid`, `kode`, `nama`, `harga`, `satuan`) VALUES
(1, 'B001', 'Barang 1', 5000, 'Kg'),
(2, 'B002', 'Barang 2', 3000, 'Pack'),
(3, 'B003', 'Barang 3', 4500, 'kg'),
(4, 'B004', 'Barang 4', 2000, 'Lbr'),
(5, 'B005', 'Barang 5', 1000, 'Butir'),
(15, 'B006', 'Barang 6', 3500, 'Lbr'),
(16, 'B007', 'barang 7', 2000, 'Lbr'),
(17, 'B008', 'Barang 8', 3500, 'Butir'),
(18, 'B009', 'Barang 9', 5500, 'Pack'),
(19, 'B010', 'Barang 10', 6000, 'Kg'),
(20, 'B011', 'Barang 11', 1500, 'Lbr');

-- --------------------------------------------------------

--
-- Table structure for table `mpembelian`
--

CREATE TABLE IF NOT EXISTS `mpembelian` (
  `noid` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `idsuplier` int(5) NOT NULL,
  `totalqty` double NOT NULL,
  `totalitem` double NOT NULL,
  `total` double NOT NULL,
  `iduser` int(5) NOT NULL,
  PRIMARY KEY (`noid`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mpembelian`
--

INSERT INTO `mpembelian` (`noid`, `kode`, `tgl`, `idsuplier`, `totalqty`, `totalitem`, `total`, `iduser`) VALUES
(1, 'TPB001', '2014-04-21', 1, 16, 3, 65000, 1),
(2, 'TPB002', '2014-04-21', 2, 15, 2, 55000, 1),
(3, 'TPB004', '2014-04-23', 3, 9, 2, 39000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpembeliandetail`
--

CREATE TABLE IF NOT EXISTS `mpembeliandetail` (
  `noid` int(5) NOT NULL AUTO_INCREMENT,
  `idpembelian` int(5) NOT NULL,
  `idbrg` int(5) NOT NULL,
  `namabrg` varchar(30) NOT NULL,
  `qty` double NOT NULL,
  `harga` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`noid`),
  KEY `idpembelian` (`idpembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mpembeliandetail`
--

INSERT INTO `mpembeliandetail` (`noid`, `idpembelian`, `idbrg`, `namabrg`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 1, 'Barang 1', 1, 5000, 5000),
(2, 1, 2, 'Barang 2', 5, 3000, 15000),
(3, 1, 3, 'Barang 3', 10, 4500, 45000),
(4, 2, 1, 'Barang 2', 10, 3000, 30000),
(5, 2, 2, 'Barang 1', 5, 5000, 25000),
(6, 3, 3, 'Barang 3', 5, 4500, 22500),
(7, 3, 2, 'Barang 10', 4, 6000, 24000),
(8, 3, 19, 'Barang 2', 5, 3000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `msuplier`
--

CREATE TABLE IF NOT EXISTS `msuplier` (
  `noid` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`noid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msuplier`
--

INSERT INTO `msuplier` (`noid`, `nama`, `alamat`) VALUES
(1, 'Suplier A', 'Bandung'),
(2, 'Suplier B', 'Jakarta'),
(3, 'Suplier C', 'Surabaya'),
(4, 'Suplier D', 'Yogyakarta'),
(5, 'Suplier E', 'Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `nama`, `last_login`) VALUES
(1, 'adm', 'adm@gmail.com', 'b09c600fddc573f117449b3723f23d64', 'admin sereware', '2014-05-07 07:32:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
