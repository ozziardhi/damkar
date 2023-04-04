-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 06:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `kd_aset` varchar(45) DEFAULT NULL,
  `serial_number` varchar(45) DEFAULT NULL,
  `nama_aset` varchar(100) DEFAULT NULL,
  `id_kategoriaset` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `harga_beli` varchar(45) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `kondisi` enum('baik','rusak','disposal') DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `kd_aset`, `serial_number`, `nama_aset`, `id_kategoriaset`, `id_cabang`, `satuan`, `harga_beli`, `tgl_masuk`, `latitude`, `longitude`, `kondisi`, `id_departement`, `foto`) VALUES
(1, '01', '111', 'mobil', 1, 2, '5', '2000000000', '2020-11-30', -6.1803, 106.975, 'baik', 1, 'bungaretouching.jpeg'),
(2, '02', '123', 'hidrant', 3, 6, '1', '3000000000', '2020-11-27', -6.36934, 106.919, 'baik', 5, ''),
(3, '03', '0001', 'komputer', 2, 1, '2', '75000000', '2020-12-01', -6.4, 106.981, 'baik', 1, 'mobilretouching.jpg'),
(4, '04', '555', 'apar', 4, 1, '5', '550000', '2020-12-06', -6.23339, 106.981, 'baik', 6, 'elmo.jpg'),
(5, '05', '8889999', 'selang air', 4, 3, '7', '250000', '2020-11-04', -6.21503, 107.026, 'baik', 3, 'mobilsplicing.JPG'),
(6, '06', '999999', 'atk', 2, 1, '3', '50000', '2020-12-01', -6.23339, 106.981, 'baik', 1, 'mobilobjek.JPG'),
(7, '07', '777', 'meja', 2, 2, '9', '250000', '2020-12-24', -6.1803, 106.975, 'disposal', 1, 'mobil.jpg'),
(8, '08', '8888', 'kursi', 2, 2, 'pcs', '100000', '2021-01-14', -6.18139, 106.974, 'baik', 4, 'kursi1.JPG'),
(9, '02', '1231', 'Hydrant01', 3, 6, 'pcs', '1000000000', '2021-01-16', -6.26869, 106.972, 'baik', 7, 'hydrant1.JPG'),
(10, '02', '1232', 'Hydrant02', 3, 1, 'pcs', '1000000000', '2021-01-01', -6.23136, 106.983, 'baik', 7, 'hydrant2.JPG'),
(11, '02', '1233', 'Hydrant03', 3, 3, 'pcs', '1000000000', '2020-12-30', -6.21374, 107.009, 'baik', 5, 'hydrant1.JPG'),
(12, '08', '8881', 'kursi kantor', 2, 6, 'pcs', '550000', '2021-01-01', -6.18139, 106.974, 'baik', 8, 'kursi3.JPG'),
(13, '08', '8882', 'kursi kantor', 2, 1, 'pcs', '550000', '2021-01-07', -6.22627, 106.981, 'baik', 1, 'kursi3.JPG'),
(14, '01', '112', 'mobil pemadam kebakaran', 1, 6, 'pcs', '3000000000', '0000-00-00', -6.22729, 106.979, 'baik', 5, '3.JPG'),
(15, '01', '113', 'mobil pemadam kebakaran', 1, 6, 'pcs', '3000000000', '2020-12-27', -6.18139, 106.974, 'baik', 6, '5.JPG'),
(16, '02', '1234', 'Hydrant04', 3, 4, 'pcs', '1000000000', '2020-12-27', -6.28325, 106.989, 'baik', 6, 'hydrant1.JPG'),
(17, '02', '1235', 'Hydrant05', 3, 6, 'pcs', '1000000000', '2021-01-06', -6.27548, 106.913, 'baik', 5, 'hydrant2.JPG'),
(18, '02', '1236', 'Hydrant06', 3, 6, 'pcs', '1000000000', '2021-01-11', -6.30096, 106.972, 'baik', 6, 'hydrant1.JPG'),
(19, '01', '114', 'mobil pemadam kebakaran', 1, 5, 'pcs', '3000000000', '2021-01-10', -6.30102, 106.972, 'baik', 6, '2.JPG'),
(20, '01', '115', 'mobil pemadam kebakaran', 1, 3, 'pcs', '3000000000', '2021-01-21', -6.17423, 107.011, 'baik', 7, '6.JPG'),
(21, '04', '551', 'apar', 4, 5, 'pcs', '75000000', '2021-01-03', -6.18139, 106.974, 'baik', 7, 'apar1.JPG'),
(22, '04', '552', 'apar', 4, 2, 'pcs', '75000000', '2021-01-04', -6.17366, 107.013, 'baik', 6, 'apar2.JPG'),
(23, '04', '553', 'apar', 4, 1, 'pcs', '75000000', '2021-01-11', -6.23675, 106.983, 'baik', 6, 'apar3.JPG'),
(24, '04', '554', 'apar', 4, 4, 'pcs', '75000000', '2021-01-03', -6.29621, 106.97, 'baik', 6, 'apar4.JPG'),
(25, '02', '1236', 'Hydrant07', 3, 1, 'pcs', '75000000', '2021-01-05', -6.24197, 107.001, 'baik', 5, 'hydrant1.JPG'),
(26, '03', '0002', 'komputer', 2, 2, 'pcs', '1000000000', '2021-01-07', -6.18152, 106.974, 'baik', 3, 'komp1.JPG'),
(27, '03', '0003', 'komputer', 2, 6, 'pcs', '1000000000', '2020-12-29', -6.37001, 106.919, 'baik', 3, 'komp3.JPG'),
(28, '06', '991', 'atk', 2, 6, 'pcs', '250000', '2020-12-27', -6.36995, 106.919, 'baik', 4, 'atk1.JPG'),
(29, '06', '992', 'atk', 2, 4, 'pcs', '250000', '2020-12-29', -6.29332, 106.988, 'baik', 8, 'atk2.JPG'),
(30, '02', '1237', 'Hydrant07', 3, 2, 'pcs', '75000000', '2021-01-05', -6.22419, 106.98, 'baik', 6, 'hydrant1.JPG'),
(31, '01', '116', 'mobil pemadam kebakaran', 1, 1, 'pcs', '3000000000', '2021-01-22', -6.18139, 106.983, 'baik', 4, '4ferrari458.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `kd_cabang` varchar(45) DEFAULT NULL,
  `nama_cabang` varchar(45) DEFAULT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `kd_cabang`, `nama_cabang`, `latitude`, `longitude`, `alamat`) VALUES
(1, 'Mako1', 'Markas Komando ', -6.2346, 106.982, 'Jalan Komodo Raya No. 1 Kranji Bekasi Barat, RT.006/RW.004, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17135'),
(2, 'DPK2', 'Dinas Pemadam Kebakaran Medan Satria', -6.17948, 106.974, 'Jl. Harapan Indah No.9, RT.004/RW.030, Medan Satria, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132'),
(3, 'DPK3', 'Pos Sektor Damkar Wisma Asri', -6.21539, 107.026, 'Jl. Taman Wisma Asri, RT.001/RW.013, Tlk. Pucung, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17121'),
(4, 'DPK4', 'Disdamkar Kota Bekasi Sektor Rawa Lumbu', -6.2932, 106.988, 'Jl. Bulak Permai, RT.010/RW.002, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bks, Jawa Barat 17116'),
(5, 'DPK5', 'Unit Pemadam Kebakaran Sektor Mustika Jaya', -6.28529, 107.027, 'Jl. Mutiara Gading Timur No.2, RT.016/RW.003, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158'),
(6, 'DPK6', 'Disdamkar Sektor Jatisampurna', -6.36938, 106.919, 'Jl. Kranggan Permai, RT.016/RW.015, Jatisampurna, Kec. Jatisampurna, Kota Bks, Jawa Barat 17433');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `keterangan`, `gambar`, `tgl_posting`) VALUES
(7, '1', '1', '1', '1.jpg', '2017-04-23'),
(8, '2', '2', '2', '2.jpg', '2017-04-23'),
(9, '3', '3', '3', 'banner_pelatihan.png', '2017-04-23'),
(10, '2', '2', '2', 'Koala.jpg', '2017-09-04'),
(15, '2', '2', '2', '', '2018-05-23'),
(16, '11', '11', '11', 'apk3.png', '2018-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaset`
--

CREATE TABLE `kategoriaset` (
  `id_kategoriaset` int(11) NOT NULL,
  `kd_kategoriaset` varchar(15) DEFAULT NULL,
  `nama_kategoriaset` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriaset`
--

INSERT INTO `kategoriaset` (`id_kategoriaset`, `kd_kategoriaset`, `nama_kategoriaset`) VALUES
(1, '01', 'Kendaraan'),
(2, '02', 'Alat Kantor'),
(3, '03', 'Hidrant'),
(4, '04', 'Alat Pemadam Kebakaran');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id_masterbarang` int(11) NOT NULL,
  `kd_aset` varchar(20) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `id_kategoriaset` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tahun_beli` varchar(11) NOT NULL,
  `harga_beli` varchar(11) NOT NULL,
  `tahun_jual` varchar(11) NOT NULL,
  `harga_jual` varchar(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id_masterbarang`, `kd_aset`, `nama_aset`, `id_kategoriaset`, `satuan`, `tahun_beli`, `harga_beli`, `tahun_jual`, `harga_jual`, `foto`) VALUES
(1, '01', 'Mobil Pemadam', 1, 'pcs', '2010', '70000000', '2015', '30000000', ''),
(2, '02', 'Hydrant', 3, 'pcs', '2000', '500000', '2002', '600000', ''),
(5, '03', 'Komputer', 2, 'pcs', '2002', '5000000', '2005', '2000000', ''),
(6, '04', 'Apar', 4, 'pcs', '2000', '200000', '2005', '300000', ''),
(7, '05', 'Selang air', 4, 'pcs', '2000', '100000', '2001', '50000', ''),
(8, '06', 'ATK', 2, 'pcs', '2010', '500000', '0', '0', ''),
(9, '07', 'Meja', 2, 'pcs', '2011', '3000000', '2012', '2000000', ''),
(10, '08', 'Kursi', 2, 'pcs', '2011', '3000000', '2012', '2000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `menuutama`
--

CREATE TABLE `menuutama` (
  `id_main` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `lokasi` enum('Admin','Public') NOT NULL,
  `hakakses` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `urutan` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuutama`
--

INSERT INTO `menuutama` (`id_main`, `nama_menu`, `link`, `aktif`, `lokasi`, `hakakses`, `icon`, `urutan`) VALUES
(2, 'Manajemen Aplikasi', '#', 'Y', 'Admin', 'admin', 'fa fa-info-circle', 1),
(28, 'Master', '#', 'Y', 'Admin', 'admin', 'fa fa-windows', 1),
(41, 'Toko', '#', 'Y', 'Admin', 'admin', 'fa fa-archive', 5),
(42, 'Produk', '#', 'Y', 'Admin', 'admin', 'fa fa-suitcase', 6),
(44, 'Aset', '#', 'Y', 'Admin', 'admin', 'fa fa-bars', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_sub` int(5) NOT NULL,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(3) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminsubmenu` enum('Y','N') NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `id_submain`, `aktif`, `adminsubmenu`, `urutan`) VALUES
(9, 'Menu Utama', '?module=menuutama', 2, 0, 'Y', 'N', 0),
(10, 'Sub-Menu', '?module=submenu', 2, 0, 'Y', 'N', 0),
(54, 'Dosen', '?module=dosen', 28, 0, 'Y', 'Y', 0),
(55, 'Header', '?module=header', 28, 0, 'Y', 'Y', 0),
(70, '2', '2', 0, 0, 'Y', 'Y', 0),
(69, '2', '2', 0, 0, 'Y', 'Y', 0),
(77, 'Ordering', '?module=ordering', 0, 0, 'Y', 'Y', 0),
(72, 'Kategori', '?module=kategori', 41, 0, 'Y', 'Y', 0),
(73, 'Master Produk', '?module=produk', 41, 0, 'Y', 'Y', 0),
(74, 'Pelanggan', '?module=pelanggan', 41, 0, 'Y', 'Y', 0),
(75, 'Penjualan', '?module=penjualan', 41, 0, 'Y', 'Y', 0),
(76, 'Penjualan Detail', '?module=penjualandetail', 41, 0, 'Y', 'Y', 0),
(78, 'Good Receive', '?module=goodreceive', 0, 0, 'Y', 'Y', 0),
(79, 'Ordering', '?module=ordering', 42, 0, 'Y', 'Y', 0),
(80, 'Good Receive', '?module=goodreceive', 42, 0, 'Y', 'Y', 0),
(81, 'Kegiatan', '?module=magang', 43, 0, 'Y', 'Y', 0),
(82, 'Kelompok', '?module=kelompok', 43, 0, 'Y', 'Y', 0),
(83, 'Kelompok Detail', '?module=kelompokdetail', 43, 0, 'Y', 'Y', 0),
(84, 'Divisi', '?module=divisi', 43, 0, 'Y', 'Y', 0),
(85, 'anggota', '?module=anggota', 43, 0, 'Y', 'Y', 0),
(86, 'Indonesia', '?module=indonesia', 43, 0, 'Y', 'Y', 0),
(87, 'Departement', '?module=departement', 44, 0, 'Y', 'Y', 0),
(88, 'Lokasi', '?module=lokasi', 44, 0, 'Y', 'Y', 0),
(89, 'Supplier', '?module=supplier', 44, 0, 'Y', 'Y', 0),
(90, 'Pegawai', '?module=pegawai', 44, 0, 'Y', 'Y', 0),
(91, 'Kategori Aset', '?module=kategoriaset', 44, 0, 'Y', 'Y', 0),
(92, 'Peminjaman Detail', '?module=peminjamandetail', 44, 0, 'Y', 'Y', 0),
(93, 'Peminjaman', '?module=peminjaman', 44, 0, 'Y', 'Y', 0),
(94, 'Aset', '?module=aset', 44, 0, 'Y', 'Y', 0),
(95, 'Pengadaan', '?module=pengadaan', 44, 0, 'Y', 'Y', 0),
(96, 'Pengadaan Detail', '?module=pengadaandetail', 44, 0, 'Y', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `foto_user` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `foto_user`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'info@sentrabisnisnu.com', '08238923848', 'admin', 'N', 'bunga.jpeg', 'o87r20ks3ponqp8htkj4v598i4'),
(2, 'indah', 'f3385c508ce54d577fd205a1b2ecdfb7', 'Indah Pratiwi', 'computerz.engineerz@gmail.com', '089667791613', 'user', 'N', 'avatar3.png', 'eicja86h9ru7sg7rkji3u7s7tb'),
(3, 'desiana', '6d4f1a4c0871175cc72c8b7e66388ea1', 'desiana rizal', 'rizaldesiana@gmail.com', '978965', 'user', 'N', '', 'jd97j7q08n4p7a462f2624aa35'),
(4, 'susu', '57ee1345597f3bb1d50054c299cca0f7', 'Cika Yulia', 'susu@gmail.com', '2351616', 'petugas', 'N', 'elmo.jpg', '7jbf0rqk67qha41mosria14al0'),
(6, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'dewi ayu', 'dewi@gmail.com', '2351616', 'kepala', 'N', '5.JPG', 'o5v03skgu46bq5o4ola3bvhu20'),
(14, 'aku', '89ccfac87d8d06db06bf3211cb2d69ed', 'aku', 'aku@gmail.com', '0856', 'petugas', 'N', '20anaivanovic.jpg', 'cdf68vlorjfqlctsfgnhacr5av'),
(8, 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abc', 'abc@gmail.com', '9999999', 'user', 'N', '5.JPG', 'cf6jh05vpva9sivc1bk5npgtn5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `kategoriaset`
--
ALTER TABLE `kategoriaset`
  ADD PRIMARY KEY (`id_kategoriaset`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id_masterbarang`);

--
-- Indexes for table `menuutama`
--
ALTER TABLE `menuutama`
  ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategoriaset`
--
ALTER TABLE `kategoriaset`
  MODIFY `id_kategoriaset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id_masterbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menuutama`
--
ALTER TABLE `menuutama`
  MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
