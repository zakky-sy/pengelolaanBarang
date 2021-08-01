-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 11:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok`, `satuan`) VALUES
(1, '36143613', 'Keyboard', 90, 'pcs'),
(2, '15747218', 'Mouse', 71, 'pcs'),
(9, '42832987', 'Mousepad', 73, 'pcs'),
(10, '77639020', 'Headset', 72, 'pcs'),
(11, '30955632', 'Cooling Pad', 102, 'pcs'),
(12, '45611381', 'Dust Plug', 406, 'sachet'),
(13, '58314737', 'Kursi Gaming', 115, 'pcs'),
(14, '19357638', 'Monitor', 69, 'pcs'),
(15, '30058461', 'RAM', 87, 'pcs'),
(16, '55464256', 'SSD', 15, 'pcs'),
(17, '44596673', 'HDD', 87, 'pcs'),
(18, '78253647', 'Motherboard', 73, 'pcs'),
(19, '16015270', 'Prosesor', 118, 'pcs'),
(20, '49072423', 'Charger', 108, 'pcs'),
(21, '80345234', 'Kabel USB', 222, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(5, 'CST719', 'PT. Panjang Jiwo', 'panjangjiwo@gmail.com', '089786657463', 'Jl. Kalideres 79, Jakarta 34276'),
(6, 'CST104', 'CV. Gulung Tikar', 'gulungtikar@gmail.com', '089746352483', 'Perumahan Asri A/III, No. 80'),
(7, 'CST807', 'CV. Sanjaya', 'sanjaya@gmail.com', '083467122589', 'Jl. Kasih Bunda 13, Malang 61875'),
(8, 'CST472', 'PT. Karpet Ajaib', 'karpetajaib@gmail.com', '089765423612', 'Ruko Royal Mojosari Indah 12B'),
(9, 'CST693', 'CV. Micin', 'sasa@gmail.com', '08651234509', 'Perum Griya Plosok No 1000, Malang'),
(10, 'CST124', 'CV. Ruyuan malik', 'ruyuan@gmail.com', '0321476589', 'Jl. Tropodo Krian Barat No 09, Malang'),
(13, 'CST878', 'PT. Kwm official', 'kwm@gmail.com', '0895335727679', 'Perum pakuwon 12B Surabaya'),
(14, 'CST499', 'CV. Ayam lepas', 'ayamq@gmail.com', '032156743', 'Jl. Mastrip 10, Surabaya Barat'),
(15, 'CST387', 'CV. Sukawat Beringin', 'suu@gmail.com', '032167458', 'Jl. Ebor Selatan No 13, Malang '),
(16, 'CST195', 'PT. Hujan Deras', 'hujan@gmail.com', '02197685', 'Jl. Ndlosor Jum No 20, Surabaya Selatan'),
(17, 'CST358', 'PT. Motasa Indonesich', 'motasa@gmail.com', '089432167', 'Jl. Lurus Terus 12'),
(18, 'CST743', 'CV. Raja Tawon', 'tawonmawot@gmail.com', '021745691', 'Jl. Bogor Selatan, Mojosari'),
(19, 'CST745', 'CV. Putri Tawon', 'tawonngetop@gmail.com', '032184670', 'Jl. Embong Kenongo 11, Jakarta Utara'),
(20, 'CST479', 'CV. Empatide', 'ideq@gmail.com', '0432178996', 'Jl. Tidar 100, Malang'),
(21, 'CST340', 'PT. Jawa Metalindo', 'metalica@gmail.com', '032195876', 'Jl. Bungur Asih, Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `data_toko`
--

CREATE TABLE `data_toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(80) DEFAULT NULL,
  `nama_pemilik` varchar(80) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_toko`
--

INSERT INTO `data_toko` (`id`, `nama_toko`, `nama_pemilik`, `no_telepon`, `alamat`) VALUES
(1, 'Sinar Indah Komputer', 'Alfina Rosyida', '08121785571', 'Perum Pesona Griya Asri B-5');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `no_keluar` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_keluar`
--

INSERT INTO `detail_keluar` (`no_keluar`, `nama_barang`, `jumlah`, `satuan`) VALUES
('TR1625723986', 'Monitor', 3, 'pcs'),
('TR1625724009', 'Kursi Gaming', 7, 'pcs'),
('TR1625724024', 'Mouse', 11, 'pcs'),
('TR1625724024', 'Mousepad', 11, 'pcs'),
('TR1625724050', 'SSD', 20, 'pcs'),
('TR1625724050', 'HDD', 10, 'pcs'),
('TR1625724070', 'Headset', 13, 'pcs'),
('TR1625724117', 'Motherboard', 16, 'pcs'),
('TR1625724145', 'Kabel USB', 15, 'pcs'),
('TR1625724145', 'Dust Plug', 20, 'sachet'),
('TR1625724186', 'Kabel USB', 15, 'pcs'),
('TR1625724186', 'Dust Plug', 20, 'sachet'),
('TR1625724206', 'RAM', 12, 'pcs'),
('TR1625724225', 'Keyboard', 17, 'pcs'),
('TR1625724311', 'Kursi Gaming', 14, 'pcs'),
('TR1625724341', 'SSD', 20, 'pcs'),
('TR1625724367', 'Mousepad', 27, 'pcs'),
('TR1625724400', 'Cooling Pad', 39, 'pcs'),
('TR1625724423', 'SSD', 31, 'pcs'),
('TR1625724481', 'Cooling Pad', 23, 'pcs'),
('TR1625724513', 'Cooling Pad', 21, 'pcs'),
('TR1625724538', 'SSD', 19, 'pcs'),
('TR1625724558', 'SSD', 43, 'pcs'),
('TR1625724583', 'Headset', 15, 'pcs'),
('TR1625724714', 'SSD', 60, 'pcs'),
('TR1625724816', 'Prosesor', 2, 'pcs'),
('TR1625724837', 'Cooling Pad', 1, 'pcs'),
('TR1625724870', 'Headset', 5, 'pcs'),
('TR1625724899', 'Keyboard', 1, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `detail_terima`
--

CREATE TABLE `detail_terima` (
  `no_terima` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_terima`
--

INSERT INTO `detail_terima` (`no_terima`, `nama_barang`, `jumlah`, `satuan`) VALUES
('TR1625720576', 'Prosesor', 11, 'pcs'),
('TR1625720613', 'RAM', 18, 'pcs'),
('TR1625720636', 'Kabel USB', 1, 'pcs'),
('TR1625720683', 'Motherboard', 7, 'pcs'),
('TR1625720683', 'Dust Plug', 37, 'sachet'),
('TR1625720724', 'Kursi Gaming', 12, 'pcs'),
('TR1625720724', 'Monitor', 17, 'pcs'),
('TR1625720724', 'Mouse', 5, 'pcs'),
('TR1625720724', 'Headset', 6, 'pcs'),
('TR1625720871', 'RAM', 7, 'pcs'),
('TR1625720871', 'Kursi Gaming', 7, 'pcs'),
('TR1625720932', 'Monitor', 1, 'pcs'),
('TR1625720948', 'Mousepad', 8, 'pcs'),
('TR1625720973', 'RAM', 7, 'pcs'),
('TR1625721012', 'SSD', 13, 'pcs'),
('TR1625721482', 'Motherboard', 1, 'pcs'),
('TR1625721495', 'Dust Plug', 6, 'sachet'),
('TR1625721537', 'Kursi Gaming', 4, 'pcs'),
('TR1625721537', 'HDD', 7, 'pcs'),
('TR1625721603', 'SSD', 90, 'pcs'),
('TR1625721673', 'Cooling Pad', 79, 'pcs'),
('TR1625723336', 'Monitor', 59, 'pcs'),
('TR1625723336', 'Cooling Pad', 67, 'pcs'),
('TR1625723405', 'Keyboard', 83, 'pcs'),
('TR1625723445', 'Kursi Gaming', 96, 'pcs'),
('TR1625723483', 'Mouse', 56, 'pcs'),
('TR1625723483', 'Headset', 69, 'pcs'),
('TR1625723483', 'Motherboard', 46, 'pcs'),
('TR1625723546', 'Prosesor', 72, 'pcs'),
('TR1625723654', 'Mousepad', 53, 'pcs'),
('TR1625723654', 'Charger', 39, 'pcs'),
('TR1625723747', 'RAM', 27, 'pcs'),
('TR1625723840', 'Motherboard', 15, 'pcs'),
('TR1625723878', 'Dust Plug', 273, 'sachet'),
('TR1625723928', 'Kabel USB', 51, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(25) DEFAULT NULL,
  `tgl_terima` varchar(25) DEFAULT NULL,
  `jam_terima` varchar(10) DEFAULT NULL,
  `nama_supplier` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `jam_terima`, `nama_supplier`, `nama_petugas`) VALUES
(9, 'TR1625720576', '08/07/2021', '12:02:56', 'PT. Campina Ice', 'Zakky'),
(10, 'TR1625720613', '08/07/2021', '12:03:33', 'Pt. Bernard Roti', 'Zakky'),
(11, 'TR1625720636', '08/07/2021', '12:03:56', 'PT. Logitek', 'Zakky'),
(12, 'TR1625720683', '08/07/2021', '12:04:43', 'Pt. Bernard Roti', 'Zakky'),
(13, 'TR1625720724', '08/07/2021', '12:05:24', 'PT. Marlboroh', 'Zakky'),
(14, 'TR1625720871', '08/07/2021', '12:07:51', 'PT. Walang Sengit', 'Ricky'),
(15, 'TR1625720932', '08/07/2021', '12:08:52', 'PT. Sorge Melayu', 'Ricky'),
(16, 'TR1625720948', '08/07/2021', '12:09:08', 'PT. Tawon Mawot', 'Ricky'),
(17, 'TR1625720973', '08/07/2021', '12:09:33', 'CV. Winda Imoet', 'Ricky'),
(18, 'TR1625721012', '08/07/2021', '12:10:12', 'CV. Mie Ayam', 'Ricky'),
(19, 'TR1625721482', '08/07/2021', '12:18:02', 'Pt. Bernard Roti', 'Alfina'),
(20, 'TR1625721495', '08/07/2021', '12:18:15', 'PT. Marlboroh', 'Alfina'),
(21, 'TR1625721537', '08/07/2021', '12:18:57', 'PT. Sorge Melayu', 'Alfina'),
(22, 'TR1625721603', '08/07/2021', '12:20:03', 'PT. Logitek', 'Alfina'),
(23, 'TR1625721673', '08/07/2021', '12:21:13', 'PT. Endores', 'Alfina'),
(24, 'TR1625723336', '08/07/2021', '12:48:56', 'CV. Bear Brand', 'Dino'),
(25, 'TR1625723405', '08/07/2021', '12:50:05', 'PT. Pakuwon Jati', 'Dino'),
(26, 'TR1625723445', '08/07/2021', '12:50:45', 'CV. Danone', 'Dino'),
(27, 'TR1625723483', '08/07/2021', '12:51:23', 'CV. Miami', 'Dino'),
(28, 'TR1625723546', '08/07/2021', '12:52:26', 'PT. Tawon Mawot', 'Dino'),
(29, 'TR1625723654', '08/07/2021', '12:54:14', 'PT. Logitek', 'Nuzul'),
(30, 'TR1625723747', '08/07/2021', '12:55:47', 'PT. Marlboroh', 'Nuzul'),
(31, 'TR1625723840', '08/07/2021', '12:57:20', 'PT. Logitek', 'Nuzul'),
(32, 'TR1625723878', '08/07/2021', '12:57:58', 'CV. Winda Imoet', 'Nuzul'),
(33, 'TR1625723928', '08/07/2021', '12:58:48', 'CV. Terang Jaya', 'Nuzul');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(25) DEFAULT NULL,
  `tgl_keluar` varchar(25) DEFAULT NULL,
  `jam_keluar` varchar(10) DEFAULT NULL,
  `nama_customer` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `no_keluar`, `tgl_keluar`, `jam_keluar`, `nama_customer`, `nama_petugas`) VALUES
(9, 'TR1625723986', '08/07/2021', '12:59:46', 'CV. Sukawat Beringin', 'Nuzul'),
(10, 'TR1625724009', '08/07/2021', '13:00:09', 'CV. Empatide', 'Nuzul'),
(11, 'TR1625724024', '08/07/2021', '13:00:24', 'CV. Ayam lepas', 'Nuzul'),
(12, 'TR1625724050', '08/07/2021', '13:00:50', 'PT. Karpet Ajaib', 'Nuzul'),
(13, 'TR1625724070', '08/07/2021', '13:01:10', 'PT. Motasa Indonesich', 'Nuzul'),
(14, 'TR1625724117', '08/07/2021', '13:01:57', 'PT. Hujan Deras', 'Zakky'),
(15, 'TR1625724145', '08/07/2021', '13:02:25', 'CV. Raja Tawon', 'Zakky'),
(16, 'TR1625724186', '08/07/2021', '13:03:06', 'CV. Putri Tawon', 'Zakky'),
(17, 'TR1625724206', '08/07/2021', '13:03:26', 'CV. Ruyuan malik', 'Zakky'),
(18, 'TR1625724225', '08/07/2021', '13:03:45', 'CV. Micin', 'Zakky'),
(19, 'TR1625724311', '08/07/2021', '13:05:11', 'PT. Karpet Ajaib', 'Alfina'),
(20, 'TR1625724341', '08/07/2021', '13:05:41', 'PT. Panjang Jiwo', 'Alfina'),
(21, 'TR1625724367', '08/07/2021', '13:06:07', 'CV. Gulung Tikar', 'Alfina'),
(22, 'TR1625724400', '08/07/2021', '13:06:40', 'CV. Sanjaya', 'Alfina'),
(23, 'TR1625724423', '08/07/2021', '13:07:03', 'PT. Kwm official', 'Alfina'),
(24, 'TR1625724481', '08/07/2021', '13:08:01', 'PT. Jawa Metalindo', 'Dino'),
(25, 'TR1625724513', '08/07/2021', '13:08:33', 'CV. Sukawat Beringin', 'Dino'),
(26, 'TR1625724538', '08/07/2021', '13:08:58', 'PT. Karpet Ajaib', 'Dino'),
(27, 'TR1625724558', '08/07/2021', '13:09:18', 'PT. Motasa Indonesich', 'Dino'),
(28, 'TR1625724583', '08/07/2021', '13:09:43', 'CV. Ruyuan malik', 'Dino'),
(29, 'TR1625724714', '08/07/2021', '13:11:54', 'CV. Ayam lepas', 'Ricky'),
(30, 'TR1625724816', '08/07/2021', '13:13:36', 'CV. Sukawat Beringin', 'Ricky'),
(31, 'TR1625724837', '08/07/2021', '13:13:57', 'CV. Putri Tawon', 'Ricky'),
(32, 'TR1625724870', '08/07/2021', '13:14:30', 'CV. Empatide', 'Ricky'),
(33, 'TR1625724899', '08/07/2021', '13:14:59', 'PT. Karpet Ajaib', 'Ricky');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(1, 'SPL641', 'CV. Terang Jaya', 'terangjaya@gmail.com', '087814256738', 'Jl. Danau Bratan 21/A-2 Sawojajar'),
(6, 'SPL663', 'CV. Danone', 'danone@gmail.com', '0813456790', 'Jl. Bandar Lampung, Mojokerto'),
(7, 'SPL357', 'CV. Mie Ayam', 'ayame@gmail.com', '0321245678', 'Jl. Biru Panjang 13, Bandung'),
(8, 'SPL346', 'PT. Tawon Mawot', 'mawotjum@gmail.com', '0813456798', 'Jl. Deandles Borg, Bandung'),
(9, 'SPL889', 'CV. Winda Imoet', 'winda@gmail.com', '0321476589', 'Jl. Kali Mampet 12, Jakarta Selatan'),
(10, 'SPL861', 'PT. Endores', 'endore@gmail.com', '0321567890', 'Jl. Boulverd No 17, Malang'),
(11, 'SPL962', 'PT. Marlboroh', 'broh@gmail.com', '0812746589', 'Ruko Indah Royal No 23, Mojosari'),
(12, 'SPL875', 'PT. Walang Sengit', 'sengitan@gmail.com', '0885621543', 'Jl. Belok Kiri, Jember'),
(13, 'SPL212', 'PT. Pakuwon Jati', 'pring@gmail.com', '0321765234', 'Jl. Bersama Sama No 12, Surabaya Utara'),
(14, 'SPL405', 'CV. Bear Brand', 'branding@gmail.com', '013295678', 'Perum Indah, Jaya Giri'),
(15, 'SPL282', 'PT. Sorge Melayu', 'sourge@gmail.com', '084512437658', 'Jl. Sawah Timur Gg. 01, Surabaya'),
(16, 'SPL121', 'CV. Miami', 'miami@gmail.com', '03456789', 'Jl. Berisi No 12, Bogor'),
(17, 'SPL757', 'PT. Campina Ice', 'sugaring@gmail.com', '0321567890', 'Jl. Rungkut Asri 13, Mojokerto'),
(18, 'SPL729', 'PT. Logitek', 'tektek@gmail.com', '0321456987', 'Jl. Sawah Lunto, Malang'),
(19, 'SPL681', 'Pt. Bernard Roti', 'rotiku@gmail.com', '0124567659', 'Jl. Bre Guiner, Mojokerto');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode`, `nama`, `username`, `password`, `image`, `grup_id`, `tgl_dibuat`) VALUES
(2, 'PETUGAS - 27', 'Zakky', 'PTGS27', '$2y$10$mVR3MJDS6J7CEnfFiI2IJeDjXcYeT/YdgEM6RlkhzW39/a5m9vIiq', 'Soeharto1.jpg', 2, 1234567),
(4, 'PETUGAS - 48', 'Alfina', 'PTGS48', '$2y$10$QnByvDrIRwZyXWQ.4qixAuActNJEuwDBRxKj5i1NtJcmXQfe1L4FO', 'default.jpg', 2, 0),
(5, 'PETUGAS - 54', 'Ricky', 'PTGS54', '$2y$10$NliPsRB8TWkbDJr6qtIli.bzzgC22EC/NpitHWQe85AZvZ4I./6fu', 'default.jpg', 2, 0),
(6, 'PETUGAS - 14', 'Dino', 'PTGS14', '$2y$10$NJcW8jR9CRguYlyngyzH9eTDXiKxDeS0KoKy/a42oTIpY2QGAZk2C', 'default.jpg', 2, 1625404311),
(7, 'PETUGAS - 36', 'Nuzul', 'PTGS36', '$2y$10$6cdTZXkHNFy6KPGp/HWlZ.tV0KLmc9ZxD48HtVw6IeqlBnj9/rQlm', 'default.jpg', 2, 1625445694),
(10, 'PENGGUNA - 91', 'Ricky A.', 'PGN91', '$2y$10$a7GizVR26uil1DMiwHPa4uRf6PKWdMduoaA1Jgwy2QXzbIxFQMLsa', 'default.jpg', 1, 1625710334),
(11, 'PENGGUNA - 40', 'M. F. Muzakky', 'PGN40', '$2y$10$fy0rD96XssGXc7A0TUr7y.WGJeBpnAMZoyFxTQYJ7u5jrdYXNb0OK', 'Soeharto.jpg', 1, 1625720348),
(12, 'PENGGUNA - 22', 'Alfina R.', 'PGN22', '$2y$10$B75vlf0y9uQnmSd9EpwLF.CDKvH0Ela.0xU7Z0v64Foe.e5ue4hKu', 'default.jpg', 1, 1625720412),
(13, 'PENGGUNA - 30', 'Dino W. R.', 'PGN30', '$2y$10$GumjLbZcyUCVOoSlHM4CROcWMeWsvs2u31uyHoEkm56rJpqugA2uG', 'default.jpg', 1, 1625720445),
(14, 'PENGGUNA - 95', 'Nuzul A. N.', 'PGN95', '$2y$10$0mnu2LJZa.whBMVaKw31pe.Kj9VRJRo3vF/lBV83P6WOUINGGbUqS', 'default.jpg', 1, 1625720471);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `grup_id`, `menu_id`) VALUES
(4, 2, 1),
(6, 1, 2),
(7, 2, 2),
(9, 1, 3),
(16, 1, 10),
(17, 1, 1),
(18, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_grup`
--

CREATE TABLE `user_grup` (
  `id` int(11) NOT NULL,
  `grup` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_grup`
--

INSERT INTO `user_grup` (`id`, `grup`) VALUES
(1, 'Administrator'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Master'),
(2, 'Transaksi'),
(3, 'Pengaturan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `ikon` varchar(128) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `ikon`, `aktif`) VALUES
(1, 1, 'Master Barang', 'barang', 'fas fa-fw fa-box', 1),
(2, 1, 'Master Customer', 'customer', 'fas fa-fw fa-user-tie', 1),
(3, 1, 'Master Supplier', 'supplier', 'fas fa-fw fa-user-ninja', 1),
(4, 1, 'Master Petugas', 'petugas', 'fas fa-fw fa-users-cog', 1),
(5, 2, 'Transaksi Penerimaan', 'penerimaan', 'fas fa-fw fa-file-invoice-dollar', 1),
(6, 2, 'Transaksi Pengeluaran', 'pengeluaran', 'fas fa-fw fa-receipt', 1),
(7, 3, 'Profil Toko', 'toko', 'fas fa-fw fa-store', 1),
(8, 3, 'Manajemen Pengguna', 'pengguna', 'fas fa-fw fa-user-shield', 1),
(9, 3, 'Manajemen Grup', 'grup', 'fas fa-fw fa-users', 1),
(10, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-image', 1),
(28, 3, 'Manajemen Sub Menu', 'submenu', 'fas fa-fw fa-images', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_terima`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_keluar` (`no_keluar`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_grup`
--
ALTER TABLE `user_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_grup`
--
ALTER TABLE `user_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
