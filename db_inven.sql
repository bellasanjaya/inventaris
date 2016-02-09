-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 10:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_inven`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `groupid` int(2) NOT NULL,
  `kode` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `hak_akses`, `groupid`, `kode`) VALUES
(1, 'admin', 'admin', 1, 0, 'Super Admin'),
(2, 'sps_sis', '123', 2, 1, 'SIS'),
(3, 'sps_mum', '123', 2, 2, 'MUM'),
(4, 'sps_tool', '123', 2, 3, 'TOOL'),
(5, 'sis', '123', 3, 1, 'SIS'),
(6, 'mum', '123', 3, 2, 'MUM'),
(7, 'tool', '123', 3, 3, 'TOOL');

-- --------------------------------------------------------

--
-- Table structure for table `barang1`
--

CREATE TABLE IF NOT EXISTS `barang1` (
  `id` varchar(5) NOT NULL DEFAULT '',
  `no_urut` int(5) NOT NULL,
  `inisial` varchar(2) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang1`
--

INSERT INTO `barang1` (`id`, `no_urut`, `inisial`, `nama`) VALUES
('K1', 1, 'K', 'Kursi'),
('K2', 2, 'K', 'Kipas Angin'),
('M1', 1, 'M', 'Meja'),
('M2', 2, 'M', 'Mainan'),
('P1', 1, 'P', 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `barang2`
--

CREATE TABLE IF NOT EXISTS `barang2` (
`id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `header` varchar(5) NOT NULL,
  `nama_j` varchar(25) NOT NULL,
  `createdby` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `barang2`
--

INSERT INTO `barang2` (`id`, `no_urut`, `header`, `nama_j`, `createdby`) VALUES
(1, 1, 'M1', 'Meja Kayu', 'SIS'),
(2, 2, 'M1', 'Meja  Rapat', 'SIS'),
(3, 1, 'K1', 'Kursi Lipat', 'MUM'),
(4, 2, 'K1', 'Kursi Statis', 'SIS'),
(5, 2, 'K2', 'Kipas Angin', 'SIS'),
(7, 1, 'P1', 'Printer Canon', 'MUM'),
(8, 3, 'K1', 'kursi kantin', 'SIS'),
(9, 1, 'M2', 'mainan bola', 'SIS'),
(10, 2, 'P1', 'printer hp', 'SIS');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE IF NOT EXISTS `detail_barang` (
`id` int(11) NOT NULL,
  `kode_akhir` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `no_extracom` varchar(20) NOT NULL,
  `header` varchar(5) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `namabrg` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keadaan` varchar(20) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `supplier` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `validasi` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id`, `kode_akhir`, `kode`, `no_extracom`, `header`, `no_urut`, `namabrg`, `merk`, `jumlah`, `satuan`, `keadaan`, `lokasi`, `supplier`, `harga`, `validasi`) VALUES
(3, 1, 'SIS', 'SIS-M1-1-2015-1', 'K2', 2, 'Kipas Angin', 'Hitachi', 1, 'satuan', 'Rusak', 'Gudang', 'ASD', 20000, 'Sudah'),
(4, 1, 'MUM', 'MUM-M1-1-2015-1', 'P1', 1, 'Printer Canon', 'gvergv', 1, 'satuan', 'Baik', 'hgvjh', 'hb', 1, 'Sudah'),
(5, 2, 'MUM', 'MUM-M1-1-2015-2', 'K1', 1, 'Kursi Lipat', 'Hitachi', 1, 'satuan', 'Baik', 'Gudang', 'ASD', 20000, 'Belum'),
(6, 2, 'SIS', 'SIS-M1-1-2015-2', 'K1', 1, 'Kursi Lipat', 'Hitachi', 1, 'satuan', 'Baik', 'Gudang', 'ASD', 20000, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang1`
--
ALTER TABLE `barang1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang2`
--
ALTER TABLE `barang2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `barang2`
--
ALTER TABLE `barang2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
