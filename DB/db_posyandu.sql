-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 02:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_anak`
--

CREATE TABLE `t_anak` (
  `no_bpjs` varchar(50) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `jenis_kelamin` enum('','L','P') NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_anak`
--

INSERT INTO `t_anak` (`no_bpjs`, `no_kk`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tgl_lahir`) VALUES
('2312312312321', '3454353452212122', 'Nuril', 'Kilam', 'L', '2019-07-10'),
('2348238472394', '3287472387423847', 'ggigi', 'gigi', 'L', '2019-07-01'),
('2394723947329', '2374637438793839', 'Arsya', ' ', 'L', '2019-07-15'),
('2398483948394', '2343243434343343', 'Nurils', 'koko', 'P', '2017-06-07'),
('2987283748234', '2343243434343343', 'Amien', 'mien', 'P', '2018-12-11'),
('32424324243243', '3534534534534534', 'b', 'Fadly', 'L', '2019-01-19'),
('3284782347834', '3287472387423847', 'hula', 'jalu', 'L', '2019-07-10'),
('34234234234324', '3534534534534534', 'a', 'Fadly', 'P', '2018-12-24'),
('3454353453453', '4565465464564564', 'Irsan', 'Aham', 'L', '2019-01-20'),
('34792374927433', '3344874837493742', 'Gio', 'Stevani', 'P', '2019-03-15'),
('3947239847329', '3287472387423847', 'gugu', 'gugu', 'P', '2019-07-02'),
('4757485748594', '3298473847384739', 'Gio', 'M', 'L', '2019-07-08'),
('5546334251425', '2346575648448474', 'Vivin', 'Duryani', 'P', '2019-06-06'),
('6655447363526', '2346575648448474', 'Zuhri', 'Mulyani', 'L', '2019-07-03'),
('8324782374238', '3287472387423847', 'hulu', 'hulu', 'P', '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `t_cek_imunisasi`
--

CREATE TABLE `t_cek_imunisasi` (
  `no_cek_imunisasi` varchar(30) NOT NULL,
  `id_imunisasi` int(11) NOT NULL,
  `no_kunjungan` varchar(30) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `tgl_cek_imunisasi` date NOT NULL,
  `catatan` text NOT NULL,
  `kode_panitia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cek_imunisasi`
--

INSERT INTO `t_cek_imunisasi` (`no_cek_imunisasi`, `id_imunisasi`, `no_kunjungan`, `umur`, `tgl_cek_imunisasi`, `catatan`, `kode_panitia`) VALUES
('CEK_0002', 17, 'KJG_0002', '6 Bulan 3 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0004', 17, 'KJG_0004', '6 Bulan 2 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0005', 1, 'KJG_0005', '14 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0006', 17, 'KJG_0008', '6 Bulan 29 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0007', 18, 'KJG_0009', '6 Bulan 3 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0008', 18, 'KJG_0010', '6 Bulan 2 Hari ', '2019-07-22', '-', 'slipi0002'),
('CEK_0009', 4, 'KJG_0011', '14 Hari ', '2019-07-22', '-', 'slipi0002');

-- --------------------------------------------------------

--
-- Table structure for table `t_cek_pertumbuhan`
--

CREATE TABLE `t_cek_pertumbuhan` (
  `no_cek_pertumbuhan` varchar(30) NOT NULL,
  `no_kunjungan` varchar(20) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `tb` float NOT NULL,
  `bb` float NOT NULL,
  `tgl_cek_pertumbuhan` date NOT NULL,
  `hasil` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `kode_panitia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cek_pertumbuhan`
--

INSERT INTO `t_cek_pertumbuhan` (`no_cek_pertumbuhan`, `no_kunjungan`, `umur`, `tb`, `bb`, `tgl_cek_pertumbuhan`, `hasil`, `catatan`, `kode_panitia`) VALUES
('CEK_0002', 'KJG_0002', '6 Bulan 3 Hari ', 70, 5, '2019-07-22', 'Kurus', 'Silahkan Makan Yang Banyak', 'slipi0002'),
('CEK_0004', 'KJG_0004', '6 Bulan 2 Hari ', 90, 5, '2019-07-22', 'Kurus', 'Makan Yang Banyak', 'slipi0002'),
('CEK_0005', 'KJG_0005', '14 Hari ', 80, 15, '2019-07-22', 'Sangat Gemuk', 'jaga kesejatan , dan perbanyak olahraga', 'slipi0002'),
('CEK_0006', 'KJG_0006', '19 Hari ', 68, 5, '2019-07-22', 'Kurus', 'Perbanyak makan', 'slipi0002'),
('CEK_0007', 'KJG_0007', '12 Hari ', 57, 6, '2019-07-22', 'Normal', '-', 'slipi0002'),
('CEK_0008', 'KJG_0008', '6 Bulan 29 Hari ', 78, 6, '2019-07-22', 'Kurus', '', 'slipi0002'),
('CEK_0009', 'KJG_0009', '6 Bulan 3 Hari ', 67, 7, '2019-07-22', 'Normal', '-', 'slipi0002'),
('CEK_0010', 'KJG_0010', '6 Bulan 2 Hari ', 89, 7, '2019-07-22', 'Kurus', '-', 'slipi0002'),
('CEK_0011', 'KJG_0011', '14 Hari ', 67, 7, '2019-07-22', 'Normal', '89', 'slipi0002');

-- --------------------------------------------------------

--
-- Table structure for table `t_imunisasi`
--

CREATE TABLE `t_imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `nama_imunisasi` varchar(30) NOT NULL,
  `dari_usia` int(5) NOT NULL,
  `sampai_usia` int(5) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_imunisasi`
--

INSERT INTO `t_imunisasi` (`id_imunisasi`, `nama_imunisasi`, `dari_usia`, `sampai_usia`, `catatan`) VALUES
(1, 'HB', 1, 2, '   '),
(2, 'BCG', 0, 11, ''),
(3, 'POLIO', 0, 12, ''),
(4, 'DPT 1', 2, 12, ''),
(5, 'HB 1', 2, 12, ''),
(6, 'HiB 1', 2, 12, ''),
(7, 'POLIO 2', 2, 12, ''),
(8, 'DPT 2', 3, 12, ''),
(9, 'HB 2', 3, 12, ''),
(10, 'HiB 2', 3, 12, ''),
(11, 'POLIO 3', 3, 12, ''),
(12, 'DPT 3', 4, 12, ''),
(13, 'HB 3', 4, 12, ''),
(14, 'HiB 3', 4, 12, ''),
(15, 'POLIO 4', 4, 12, ''),
(16, 'IPV', 4, 12, ''),
(17, 'CAMPAK', 9, 12, ''),
(18, 'DPT LANJUTAN', 18, 24, ''),
(19, 'HB', 18, 24, ''),
(20, 'HiB LANJUTAN', 18, 24, ''),
(21, 'CAMPAK LANJUTAN', 18, 24, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal_kegiatan`
--

CREATE TABLE `t_jadwal_kegiatan` (
  `no_kegiatan` varchar(30) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` text NOT NULL,
  `kode_panitia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jadwal_kegiatan`
--

INSERT INTO `t_jadwal_kegiatan` (`no_kegiatan`, `nama_kegiatan`, `tanggal_kegiatan`, `lokasi`, `kode_panitia`) VALUES
('20190722-181', 'test', '2019-07-22', 'test', 'slipi0002'),
('20190722-196', 'Imunisasi Dan Perkembangan Balita', '2019-07-21', 'Sekretariat RT / RW', 'slipi0002'),
('20190725-64', 'Pertumbuhan dan perkembangan anak', '2019-07-25', 'Jakarta', 'slipi0002');

-- --------------------------------------------------------

--
-- Table structure for table `t_kms`
--

CREATE TABLE `t_kms` (
  `no_kms` varchar(50) NOT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `berat_badan_lahir` float NOT NULL,
  `panjang_badan_lahir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kms`
--

INSERT INTO `t_kms` (`no_kms`, `no_bpjs`, `tanggal_terdaftar`, `berat_badan_lahir`, `panjang_badan_lahir`) VALUES
('kms_0003', '32424324243243', '2019-07-06', 5.4, 4.4),
('kms_0005', '3454353453453', '2019-07-06', 3, 3),
('kms_0007', '34792374927433', '2019-07-06', 3, 3),
('kms_0008', '34234234234324', '2019-07-06', 4, 4),
('kms_0009', '2398483948394', '2019-07-11', 3.5, 50),
('kms_0010', '2987283748234', '2019-07-11', 3.4, 4.3),
('kms_0011', '2312312312321', '2019-07-11', 5, 2),
('kms_0012', '6655447363526', '2019-07-22', 5, 68),
('kms_0013', '4757485748594', '2019-07-22', 5, 46);

-- --------------------------------------------------------

--
-- Table structure for table `t_kunjungan`
--

CREATE TABLE `t_kunjungan` (
  `no_kunjungan` varchar(20) NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `no_antri` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `no_kms` varchar(30) NOT NULL,
  `status` enum('','selesai','proses','terlewat','antri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kunjungan`
--

INSERT INTO `t_kunjungan` (`no_kunjungan`, `id_kegiatan`, `no_antri`, `tanggal_kunjungan`, `no_kms`, `status`) VALUES
('KJG_0002', '20190722-196', 2, '2019-07-22', 'KMS_0003', 'selesai'),
('KJG_0004', '20190722-196', 4, '2019-07-22', 'KMS_0005', 'selesai'),
('KJG_0005', '20190722-196', 5, '2019-07-22', 'kms_0013', 'selesai'),
('KJG_0006', '20190722-196', 6, '2019-07-22', 'KMS_0012', 'selesai'),
('KJG_0007', '20190722-196', 7, '2019-07-22', 'KMS_0011', 'selesai'),
('KJG_0008', '20190722-196', 8, '2019-07-22', 'KMS_0008', 'selesai'),
('KJG_0009', '20190722-181', 9, '2019-07-22', 'KMS_0003', 'selesai'),
('KJG_0010', '20190722-181', 10, '2019-07-22', 'KMS_0005', 'selesai'),
('KJG_0011', '20190722-181', 11, '2019-07-22', 'KMS_0013', 'selesai'),
('KJG_0012', '20190725-64', 12, '2019-07-25', 'KMS_0003', 'proses'),
('KJG_0013', '20190725-64', 13, '2019-07-25', 'KMS_0005', 'proses'),
('KJG_0014', '20190725-64', 14, '2019-07-25', 'KMS_0007', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `t_panitia`
--

CREATE TABLE `t_panitia` (
  `kode_panitia` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_panitia` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_panitia`
--

INSERT INTO `t_panitia` (`kode_panitia`, `username`, `nama_panitia`, `password`, `akses`, `login_terakhir`) VALUES
('slipi0001', 'wahyu', 'Wahyu Alfarisi', 'wahyuais', 'admin', '2019-07-22 07:46:50'),
('slipi0002', 'wahyu', 'Wahyu Alfarisi', '12345678', 'kader', '2019-07-22 07:47:27'),
('slipi0003', 'ketua', 'Junior Prabowo', '12345678', 'ketua', '2019-07-22 13:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `t_warga`
--

CREATE TABLE `t_warga` (
  `no_kk` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `tanggal_terdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_warga`
--

INSERT INTO `t_warga` (`no_kk`, `email`, `nama_ayah`, `nama_ibu`, `password`, `alamat`, `no_telp`, `tanggal_terdaftar`) VALUES
('2343243434343343', 'bagio@gmail.com', 'Gio', 'Mush', '1234', 'Jakarta', '081727822827', '2019-07-11'),
('2346575648448474', 'Endah@gmail.com', 'Sugeng', 'Murni', '1234', 'Jakarta', '081317726873', '2019-07-22'),
('2374637438793839', 'devtoolind@gmail.com', 'gakuh', 'widya', 'wahyuais', 'jakarta', '08131772687', '2019-07-17'),
('3287472387423847', 'fufu@gmail.com', 'fufu', 'mumu', '1234', 'jakarta', '081317726873', '2019-07-11'),
('3298473847384739', 'wahyualfarisi30@gmail.com', 'John', 'Jennie', '12345678', 'Jakarta', '081317726873', '2019-07-22'),
('3344874837493742', 'dede@gmail.com', 'dede', 'didi', '1234', 'jakarta pusat', '081317726873', '2019-06-08'),
('3454353452212122', 'Hilam@gmail.com', 'jojo', 'kiki', '1234', 'Jakarta', '08712227276726', '2019-07-11'),
('3534534534534534', 'qwe@gmail.com', 'Fadly', 'Mumu', '1234', 'Jakarta', '081317726973', '2019-06-08'),
('4565465464564564', 'wahyu@gmail.com', 'wahyu', 'alfarisi', '1234', 'jakarta', '081317726873', '2019-06-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_anak`
--
ALTER TABLE `t_anak`
  ADD PRIMARY KEY (`no_bpjs`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `t_cek_imunisasi`
--
ALTER TABLE `t_cek_imunisasi`
  ADD PRIMARY KEY (`no_cek_imunisasi`),
  ADD KEY `kode_panitia` (`kode_panitia`),
  ADD KEY `id_imunisasi` (`id_imunisasi`),
  ADD KEY `no_kunjungan` (`no_kunjungan`);

--
-- Indexes for table `t_cek_pertumbuhan`
--
ALTER TABLE `t_cek_pertumbuhan`
  ADD PRIMARY KEY (`no_cek_pertumbuhan`),
  ADD KEY `kode_panitia` (`kode_panitia`),
  ADD KEY `no_kunjungan` (`no_kunjungan`);

--
-- Indexes for table `t_imunisasi`
--
ALTER TABLE `t_imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`),
  ADD KEY `dari usia` (`dari_usia`,`sampai_usia`);

--
-- Indexes for table `t_jadwal_kegiatan`
--
ALTER TABLE `t_jadwal_kegiatan`
  ADD PRIMARY KEY (`no_kegiatan`),
  ADD KEY `kode_panitia` (`kode_panitia`);

--
-- Indexes for table `t_kms`
--
ALTER TABLE `t_kms`
  ADD PRIMARY KEY (`no_kms`),
  ADD KEY `no_bpjs` (`no_bpjs`);

--
-- Indexes for table `t_kunjungan`
--
ALTER TABLE `t_kunjungan`
  ADD PRIMARY KEY (`no_kunjungan`),
  ADD KEY `no_kms` (`no_kms`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `t_panitia`
--
ALTER TABLE `t_panitia`
  ADD PRIMARY KEY (`kode_panitia`);

--
-- Indexes for table `t_warga`
--
ALTER TABLE `t_warga`
  ADD PRIMARY KEY (`no_kk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_imunisasi`
--
ALTER TABLE `t_imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_anak`
--
ALTER TABLE `t_anak`
  ADD CONSTRAINT `t_anak_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `t_warga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_cek_imunisasi`
--
ALTER TABLE `t_cek_imunisasi`
  ADD CONSTRAINT `t_cek_imunisasi_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `t_kunjungan` (`no_kunjungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cek_imunisasi_ibfk_2` FOREIGN KEY (`id_imunisasi`) REFERENCES `t_imunisasi` (`id_imunisasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cek_imunisasi_ibfk_3` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_cek_pertumbuhan`
--
ALTER TABLE `t_cek_pertumbuhan`
  ADD CONSTRAINT `t_cek_pertumbuhan_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `t_kunjungan` (`no_kunjungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cek_pertumbuhan_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jadwal_kegiatan`
--
ALTER TABLE `t_jadwal_kegiatan`
  ADD CONSTRAINT `t_jadwal_kegiatan_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_kms`
--
ALTER TABLE `t_kms`
  ADD CONSTRAINT `t_kms_ibfk_1` FOREIGN KEY (`no_bpjs`) REFERENCES `t_anak` (`no_bpjs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_kunjungan`
--
ALTER TABLE `t_kunjungan`
  ADD CONSTRAINT `t_kunjungan_ibfk_1` FOREIGN KEY (`no_kms`) REFERENCES `t_kms` (`no_kms`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_kunjungan_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `t_jadwal_kegiatan` (`no_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
