-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 05:39 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(3) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `lembaga` enum('BPK','Posyandu','Karang Taruna','PKK') NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `dana` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `lembaga`, `tanggal_kegiatan`, `lokasi`, `dana`) VALUES
(1, 'posyandu', 'Posyandu', '2019-06-24', 'balai desa', '500000'),
(2, 'rapat', 'BPK', '2019-07-01', 'kantor desa', '1000000'),
(3, 'gotong royong kampung', 'Karang Taruna', '2019-06-12', 'lapangan rejo basuki', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id_kk` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdd`
--

CREATE TABLE `pdd` (
  `no_nik` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(3) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `keterangan`) VALUES
(1, 'belum/tidak bekerja'),
(2, 'mengurus rumah tangga'),
(3, 'pelajar/mahasiswa'),
(4, 'pensiunan'),
(5, 'pns'),
(6, 'tni'),
(9, 'petani/pekebun'),
(10, 'peternak'),
(15, 'karyawwan swasta'),
(19, 'buruh harian lepas'),
(20, 'buruh tani/perkebunan'),
(23, 'pembantu rumah tangga'),
(24, 'tukang cukur'),
(25, 'tukang listrik'),
(26, 'tukang baru'),
(27, 'tukang kayu'),
(34, 'mekanik'),
(38, 'paraji'),
(41, 'imam masjid'),
(44, 'wartawan'),
(45, 'ustadz/mubaligh'),
(64, 'guru'),
(81, 'sopir'),
(84, 'pedagang'),
(85, 'perangkat desa'),
(86, 'kepala desa'),
(88, 'wiraswasta');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(3) NOT NULL,
  `tingkat_pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `tingkat_pendidikan`) VALUES
(1, 'tidak sekolah'),
(2, 'belum sekolah'),
(3, 'sd'),
(4, 'smp'),
(5, 'sma'),
(6, 'diploma I'),
(7, 'diploma II'),
(8, 'diploma III'),
(9, 'diploma IV'),
(10, 'strata I'),
(11, 'strata II'),
(12, 'strata III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') NOT NULL,
  `goldar` enum('A','AB','B','O') NOT NULL,
  `id_pendidikan` int(3) NOT NULL,
  `id_pekerjaan` int(3) NOT NULL,
  `status_hub_keluarga` enum('Kepala Keluarga','Istri','Anak') NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin') NOT NULL,
  `status_kependudukan` enum('Penduduk Tetap','Penduduk Tidak Tetap') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_kk`, `agama`, `goldar`, `id_pendidikan`, `id_pekerjaan`, `status_hub_keluarga`, `status_perkawinan`, `status_kependudukan`, `kewarganegaraan`, `nama_ibu`, `nama_ayah`, `alamat`) VALUES
(987567489, 'bagas', 'Laki-laki', 'tenggaron', '2019-06-11', 6407071208130004, 'Kristen', 'O', 1, 1, 'Anak', 'Belum Kawin', 'Penduduk Tetap', 'WNA', 'ani', 'budi', 'jakal'),
(12334467975, 'nurul hamidah', 'Perempuan', 'pati', '2019-07-09', 6407071208130004, 'Kristen', 'AB', 1, 1, 'Anak', 'Belum Kawin', 'Penduduk Tidak Tetap', 'WNA', 'linda', 'bagus', 'nglanjaran'),
(6743565435227, 'Handika Bintara', 'Laki-laki', 'Loa Kulu', '1996-05-27', 76542356782668, 'Katolik', 'B', 10, 5, 'Kepala Keluarga', 'Kawin', 'Penduduk Tetap', 'WNI', 'Diyah', 'Suranto', 'Jalan Nangka Rt 1'),
(441735478564788, 'Gita Nabila', 'Perempuan', 'Busur', '2002-03-12', 64070731652002, 'Kristen', 'AB', 3, 3, 'Anak', 'Belum Kawin', 'Penduduk Tetap', 'WNI', 'Harni', 'Yusuf', 'JALAN MANGGA RT 5'),
(3503121005730006, 'SUNGKOWO', 'Laki-laki', 'JEMBER', '1973-05-10', 6407071208130004, 'Islam', 'B', 1, 1, 'Kepala Keluarga', 'Kawin', 'Penduduk Tetap', 'WNI', 'SRIWIGATI', 'ASMO AJI', 'jalan semangka'),
(6407074812000002, 'SAHADATUL WIDIYANTI', 'Perempuan', 'REJO BASUKI', '2000-12-08', 6407070312090001, 'Islam', 'A', 1, 1, 'Anak', 'Belum Kawin', 'Penduduk Tetap', 'WNI', 'SRI PENGANTI', 'KASIADI', 'JALAN RAMBUTAN RT 02 REJO BASUKI'),
(6407075009800001, 'SRI PENGANTI', 'Perempuan', 'REJO BASUKI', '1980-09-10', 6407070312090001, 'Islam', 'A', 1, 1, 'Istri', 'Kawin', 'Penduduk Tetap', 'WNI', 'PAIJEM', 'SOMO', 'JALAN RAMBUTAN RT 02 REJO BASUKI'),
(6407077108970002, 'PARAMITA ADIYANTI', 'Perempuan', 'REJO BASUKI', '1997-08-31', 6407070312090001, 'Islam', 'A', 3, 3, 'Anak', 'Belum Kawin', 'Penduduk Tetap', 'WNI', 'SRI PENGANTI', 'KASIADI', 'JALAN RAMBUTAN'),
(6407077115720002, 'KASIADI', 'Laki-laki', 'JEMBER', '1972-05-11', 6407070312090001, 'Islam', 'A', 7, 5, 'Kepala Keluarga', 'Kawin', 'Penduduk Tetap', 'WNI', 'SAMIRAH', 'MOH KAMDI', 'JALAN RAMBUTAN');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `posisi` enum('Admin','Kepala Desa','Petugas Kecamatan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `posisi`) VALUES
(1, 'admin', 'admin', 'Fryda Erwing', 'Admin'),
(2, 'kades', 'kades', 'Supriadi', 'Kepala Desa'),
(3, 'petugas', 'petugas', 'Taufik hidayat', 'Petugas Kecamatan'),
(8, 'hamida', 'hamida', 'nurul hamida', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `no_surat` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_surat` enum('KETERANGAN','PENGANTAR','REKOMENDASI') NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`no_surat`, `tanggal`, `jenis_surat`, `tujuan`, `keterangan`) VALUES
(1, '2018-01-01', 'KETERANGAN', 'POLSEK BARONG TONGKOK', 'KETERANGAN BERKELAKUAN BAIK'),
(2, '2019-07-02', 'REKOMENDASI', 'KEPALA DESA REJO BASUKI', 'REKOMENDASI KENAIKAN PANGKAT'),
(3, '2019-06-07', 'PENGANTAR', 'KARANG TARUNA', 'PENGANTAR KEGIATAN PENYULUHAN'),
(4, '2019-07-02', 'PENGANTAR', 'POLSEK BARONG  TONGKOK', 'SURAT PENGANTAR PEMBUATAN SKCK'),
(5, '2019-07-14', 'PENGANTAR', 'BANK', 'KETERANGAN MEMILIKI USAHA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `pdd`
--
ALTER TABLE `pdd`
  ADD PRIMARY KEY (`no_nik`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`no_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `no_surat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
