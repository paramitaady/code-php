-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 01:12 PM
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
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `lembaga`, `tanggal_kegiatan`, `lokasi`) VALUES
(1, 'pengajian akbar', 'Karang Taruna', '2018-08-02', 'lapangan rejo basuki'),
(2, 'posyandu', 'Posyandu', '2019-06-24', 'balai desa'),
(3, 'rapat', 'BPK', '2019-07-01', 'kantor desa'),
(4, 'gotong royong kampung', 'Karang Taruna', '2019-06-12', 'lapangan rejo basuki'),
(5, 'Rapat Pemerintah kampung', 'BPK', '2019-09-24', 'Balai desa rejo basuki');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `lampiran`, `link`, `id_laporan`) VALUES
(25, 'CONTOH FORMAT LABEL CD TA PRODI TEKNIK INFORMATIKA_2019.pdf', '', 22),
(27, 'dash adm penduduk.png', '', 24),
(28, 'Prosedur-Pengajuan-Tutup-Teori.pdf', '', 25),
(29, 'Pengumuman tentang Tarif Kerja Praktek, Tugas Akhir dan Pendadaran 2019.pdf', '', 26),
(30, '339012.jpg', '', 27),
(31, 'Pengumuman tentang Tarif Kerja Praktek, Tugas Akhir dan Pendadaran 2019.pdf', '', 28),
(32, '2012-1-00388-IF Bab2001 (1).doc', '', 29),
(47, 'Data_Transaksi.pdf', '', 31),
(49, '1    SAMPUL.doc', '', 33),
(50, '2    PENGANTAR.doc', '', 33),
(51, '3.   LAPORAN PENYELENGGARAAN.xlsx', '', 33),
(52, '4.   DOKUMEN  RAPAT  LEMBAGA.docx', '', 33),
(53, '5.   KEGIATA GOTONG ROYONG JUM.docx', '', 33),
(54, '6.   KEGIATAN  POSYANDU.docx', '', 33),
(55, '7.   KEGIATAN TP PKK DALAM RANGKA BULAN BAKTI.docx', '', 33),
(56, '8.   GOTONG  ROYONG  RT.docx', '', 33),
(57, '9.   JUMLAH PENDUDUK BLN JUNI 2016.xlsx', '', 33),
(58, '10.  ABSENSI.docx', '', 33),
(59, 'laporan ta 15523167-dikonversi.docx', '', 34),
(60, '3.   LAPORAN PENYELENGGARAAN.xlsx', '', 34),
(61, '2012-1-00388-IF Bab2001.doc', '', 34),
(62, '2012-1-00388-IF Bab2001 (2).doc', '', 34),
(64, 'KOP SURAT KELUAR.docx', '', 26),
(65, 'KOP SURAT KELUAR.docx', '', 34),
(66, '2655372-24f0793cfb70b363fc4b8ae83c494a3530b327c5.zip', '', 34),
(67, '1    SAMPUL.doc', '', 34),
(68, 'LAPORAN  KEGIATAN  BULANAN JULI - Copy - Copy.zip', '', 35);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `status` enum('Belum Diterima','Diterima') NOT NULL,
  `link` varchar(255) NOT NULL,
  `dilihat` int(1) NOT NULL,
  `cek_admin` int(1) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `id_kegiatan` int(3) NOT NULL,
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal`, `perihal`, `lampiran`, `status`, `link`, `dilihat`, `cek_admin`, `nik`, `id_kegiatan`, `id_surat`) VALUES
(38, '2019-08-13', 'Laporan Bulan Agustus', 'laporan agustus.zip', 'Diterima', 'https://www105.zippyshare.com/v/v9iMKaxn/file.html', 1, 1, 0, 0, 0),
(39, '2019-07-31', 'Laporan Bulan Juli', 'LAPORAN  KEGIATAN  BULANAN JULI.zip', 'Diterima', 'https://www105.zippyshare.com/v/Au8l6gDQ/file.html', 1, 1, 0, 0, 0),
(40, '2019-06-30', 'Laporan Bulan Juni', 'laporan juni.rar', 'Diterima', 'https://www22.zippyshare.com/v/MtzIHxK7/file.html', 1, 1, 0, 0, 0),
(41, '2019-05-31', 'Laporan Kegiatan Bulan Mei', 'laporan bulan mei.zip', 'Diterima', 'https://www67.zippyshare.com/v/MVyQPov2/file.html', 1, 1, 0, 0, 0),
(42, '2019-04-30', 'Laporan Kegiatan Bulan April ', 'Laporan kegiatan bulan April.zip', 'Diterima', 'https://www80.zippyshare.com/v/duBjhXrw/file.html', 1, 1, 0, 0, 0),
(43, '2019-03-31', 'Laporan Kegiatan Bulan Maret', 'LAPORAN  KEGIATAN  BULANAN MARET.zip', 'Belum Diterima', 'https://www66.zippyshare.com/v/N7JW62rF/file.html', 0, 0, 0, 0, 0),
(44, '2019-11-07', 'laporan bulan mei', 'laporan bulan mei.zip', 'Belum Diterima', '', 1, 1, 0, 0, 0),
(59, '2019-11-29', 'Laporan november bulan', 'laporan bulan november.pdf', 'Belum Diterima', '', 0, 0, 0, 0, 0),
(60, '2019-12-04', 'laporan bulan november', 'laporan kegiatan bulan november.pdf', 'Belum Diterima', '', 0, 0, 0, 0, 0),
(63, '2020-02-04', 'laporan bula feb 2020', 'Petunjuk_Penggunaan_Aplikasi_Olimpus_untuk_peserta_magang_v_1_0 (1).pdf', 'Belum Diterima', '', 0, 0, 0, 0, 0);

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
(15, 'karyawan swasta'),
(19, 'buruh harian lepas'),
(20, 'buruh tani/perkebunan'),
(23, 'pembantu rumah tangga'),
(24, 'tukang cukur'),
(25, 'tukang listrik'),
(26, 'tukang batu'),
(27, 'tukang kayu'),
(34, 'mekanik'),
(38, 'paraji'),
(40, 'pendeta'),
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
  `goldar` enum('A','AB','B','O','Tidak Ada') NOT NULL,
  `id_pendidikan` int(3) NOT NULL,
  `id_pekerjaan` int(3) NOT NULL,
  `status_hub_keluarga` enum('Kepala Keluarga','Istri','Anak') NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin') NOT NULL,
  `status_kependudukan` enum('Penduduk Tetap','Penduduk Pindah','Penduduk Datang','Meninggal') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_datang` date NOT NULL,
  `tgl_pindah` date NOT NULL,
  `tgl_meninggal` date NOT NULL,
  `tgl_perubahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `posisi` enum('Admin','Kepala Desa','Petugas Kecamatan') NOT NULL,
  `no_hp` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `posisi`, `no_hp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Fryda Erwina ', 'Admin', 0),
(2, 'kades', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'Muhammad Supriadii', 'Kepala Desa', 0),
(3, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Suyanto', 'Petugas Kecamatan', 8988399722);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_surat` enum('Keterangan','Pengantar','Rekomendasi') NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `usaha` varchar(100) NOT NULL,
  `organisasi` varchar(100) NOT NULL,
  `tgl_meninggal` date NOT NULL,
  `nik` bigint(20) NOT NULL,
  `tgl_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `no`, `no_surat`, `tanggal`, `jenis_surat`, `tujuan`, `keterangan`, `perihal`, `usaha`, `organisasi`, `tgl_meninggal`, `nik`, `tgl_pindah`) VALUES
(1, 0, '141/1/Pem-K/RB/X/2019', '2019-10-01', 'Keterangan', 'polsek barong tongkok', 'keterangan berkelakukan baik', 'untuk membuat skck', '', '', '0000-00-00', 3503121005730006, '0000-00-00'),
(2, 0, '141/2/Pem-K/RB/X/2019', '2019-10-02', 'Pengantar', 'disduk capil', 'Pengantar KTP', 'untuk membuat pengantar KTP', '', '', '0000-00-00', 6407077108970002, '0000-00-00'),
(3, 0, '141/3/Pem-K/RB/X/2019', '2019-10-02', 'Pengantar', 'disduk capil', 'Pengantar KK', 'untuk membuat pengantar KK', '', '', '0000-00-00', 6407077115720002, '0000-00-00'),
(6, 0, '141/4/Pem-K/RB/X/2019', '2019-10-03', 'Keterangan', 'polsek barong tongkok', 'keterangan berkelakuan baik', '', '', '', '0000-00-00', 6743565435227, '0000-00-00'),
(7, 0, '141/7/Pem-K/RB/X/2019', '2019-10-09', 'Rekomendasi', 'pemerintahan kutai barat', 'rekomendari pencairan dana', '', '', '', '0000-00-00', 6407075312980001, '0000-00-00'),
(8, 0, '141/3/Pem-K/RB/X/2019', '2019-10-02', 'Pengantar', 'disduk capil', 'Pengantar KK', 'untuk membuat pengantar KK', '', '', '0000-00-00', 6407077115720002, '0000-00-00'),
(10, 0, '141/10/Pem-K/RB/X/2019', '2019-10-10', 'Keterangan', 'polres kutai barat', 'keterangan skck', '', '', '', '0000-00-00', 987567489, '0000-00-00'),
(11, 0, '141/11/Pem-K/RB/X/2019', '2019-10-10', 'Keterangan', 'kutai barat', 'tidak mampu', '', '', '', '0000-00-00', 987567489, '0000-00-00'),
(14, 0, '141/14/Pem-K/RB/X/2019', '2019-09-03', 'Keterangan', 'kantor desa', 'keterangan memiliki usaha', '', '', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(16, 0, '141/16/Pem-K/RB/X/2019', '2019-09-03', 'Keterangan', 'kantor desa', 'keterangan memiliki usaha', '', '', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(17, 0, '141/17/Pem-K/RB/X/2019', '2019-09-03', 'Keterangan', 'kantor desa', 'keterangan memiliki usaha', '', '', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(19, 0, '141/19/Pem-K/RB/X/2019', '2019-09-30', 'Keterangan', 'polres kutai barat', 'keterangan pembuatan skck', '', '', '', '0000-00-00', 6407074910010001, '0000-00-00'),
(20, 0, '141/20/Pem-K/RB/X/2019', '2019-10-11', 'Keterangan', 'pemerintah kutai barat', 'keterangan tidak mampu', '', '', '', '0000-00-00', 6407074812000002, '0000-00-00'),
(24, 0, '141/25/Pem-K/RB/X/2019', '2019-09-25', 'Rekomendasi', 'kantor desa rejo basuki', 'rekomendasi pencairan dana', 'membuat surat rekomendari pencairan dana', '', '', '0000-00-00', 6407070211930001, '0000-00-00'),
(25, 0, '141/25/Pem-K/RB/X/2019', '2019-09-25', 'Rekomendasi', 'kantor desa rejo basuki', 'rekomendasi pencairan dana', 'membuat surat rekomendari pencairan dana', '', '', '0000-00-00', 6407070211930001, '0000-00-00'),
(31, 0, '141/26/Pem-K/RB/X/2019', '2019-10-14', 'Pengantar', 'polres kutai barat', 'keterangan skck', 'untuk mengurus pembuatan skck', '', '', '0000-00-00', 6743565435227, '0000-00-00'),
(38, 0, '141/38/Pem-K/RB/X/2019', '2019-09-24', 'Keterangan', 'polsek barong tongkok', 'keterangan berkelakuan baik', '', '', '', '0000-00-00', 6407075312980001, '0000-00-00'),
(39, 0, '141/39/Pem-K/RB/X/2019', '2019-09-24', 'Keterangan', 'polsek barong tongkok', 'keterangan berkelakuan baik', '', '', '', '0000-00-00', 6407075312980001, '0000-00-00'),
(40, 0, '141/40/Pem-K/RB/X/2019', '2019-09-03', 'Keterangan', 'polsek barong tongkok', 'keterangan berkelakuan baik', '', '', '', '0000-00-00', 6407075312980001, '0000-00-00'),
(45, 0, '141/45/Pem-K/RB/X/2019', '2019-08-22', 'Pengantar', 'Disduk capil', 'Pengantar KTP', 'untuk memperbaharui KTP', '', '', '0000-00-00', 6407070810570001, '0000-00-00'),
(46, 0, '141/46/Pem-K/RB/X/2019', '2019-09-25', 'Pengantar', 'Disdukcapil', 'Pengantar KK', 'untuk mengurus Kartu Keluarga', '', '', '0000-00-00', 6407071802840001, '0000-00-00'),
(48, 0, '141/48/Pem-K/RB/X/2019', '2019-10-16', 'Pengantar', 'disdukcapil', 'pengantar ktp', '', '', '', '0000-00-00', 6407072010620001, '0000-00-00'),
(49, 0, '141/49/Pem-K/RB/X/2019', '2019-10-16', 'Pengantar', 'disdukcapil', 'pengantar ktp', 'untuk membuat kartu tanda penduduk', '', '', '0000-00-00', 6407072010620001, '0000-00-00'),
(50, 0, '141/50/Pem-K/RB/X/2019', '2019-09-10', 'Keterangan', 'Bank', 'Keterangan Memiliki Usaha', '', 'Warung Makan Mbak Sri', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(51, 0, '141/51/Pem-K/RB/X/2019', '2019-09-10', 'Keterangan', 'Bank', 'Keterangan Memiliki Usaha', '', 'Warung Makan Mbak Sri', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(52, 0, '141/52/Pem-K/RB/X/2019', '2019-09-10', 'Keterangan', 'Bank', 'Keterangan Memiliki Usaha', '', 'Warung Makan ', '', '0000-00-00', 6407075009800001, '0000-00-00'),
(53, 0, '141/53/Pem-K/RB/X/2019', '2019-10-03', 'Keterangan', 'bank', 'keterangan memiliki usaha', '', 'usaha peternakan ikan lele', '', '0000-00-00', 6407072010620001, '0000-00-00'),
(55, 0, '141/55/Pem-K/RB/X/2019', '2019-10-03', 'Keterangan', 'polres kutai barat', 'keterangan berkelakuan baik', '', '', '', '0000-00-00', 64070771105720003, '0000-00-00'),
(56, 0, '141/56/Pem-K/RB/X/2019', '2019-10-03', 'Keterangan', 'polres kutai barat', 'keterangan tempat tinggal', '', '', '', '0000-00-00', 64070771105720003, '0000-00-00'),
(57, 0, '141/57/Pem-K/RB/X/2019', '2019-10-02', 'Rekomendasi', 'bank', 'rekomendasi pencairan dana', '', '', 'cv mitr perkassa', '0000-00-00', 64070771105720003, '0000-00-00'),
(58, 0, '141/58/Pem-K/RB/XI/2019', '2019-11-01', 'Pengantar', 'disdukcapil', 'Pengantar KK', 'Untuk Mengurus Pembuatan KK', '', '', '0000-00-00', 3312140907900001, '0000-00-00'),
(59, 0, '141/59/Pem-K/RB/XI/2019', '2019-11-06', 'Pengantar', 'disdukcapil barong tongkok', 'pengantar pindah', 'permohonaan pindah', '', '', '0000-00-00', 64070749101100010, '0000-00-00'),
(60, 0, '141/66/Pem-K/RB/XI/2019', '2019-11-21', 'Pengantar', 'Disduk capil', 'Pengantar pindah', 'Untuk mengurus surat pindah', '', '', '0000-00-00', 1210205206800002, '0000-00-00'),
(61, 0, '141/65/Pem-K/RB/XI/2019', '2019-11-19', 'Keterangan', 'Disduk Capil', 'Keterangan Kematian', '', '', '', '0000-00-00', 1210180207940005, '0000-00-00'),
(62, 0, '141/62/Pem-K/RB/XI/2019', '2019-11-14', 'Keterangan', 'Disduk Capil', 'Keterangan Kematian', '', '', '', '2016-04-12', 6407070905610001, '0000-00-00'),
(63, 0, '141/63/Pem-K/RB/XI/2019', '2019-05-14', 'Pengantar', 'Disduk Capil', 'Pengantar pindah', 'Untuk mengurus surat pindah', '', '', '0000-00-00', 3509014503810007, '0000-00-00'),
(64, 0, '141/65/Pem-K/RB/XI/2019', '2019-11-19', 'Keterangan', 'Disduk Capil', 'Keterangan Kematian', '', '', '', '0000-00-00', 1210180207940005, '0000-00-00'),
(65, 0, '141/65/Pem-K/RB/XI/2019', '2019-11-19', 'Keterangan', 'Disduk Capil', 'Keterangan Kematian', '', '', '', '2019-11-20', 1210180207940005, '0000-00-00'),
(66, 0, '141/66/Pem-K/RB/XI/2019', '2019-11-21', 'Pengantar', 'Disduk capil', 'Pengantar pindah', 'Untuk mengurus surat pindah', '', '', '0000-00-00', 1210205206800002, '0000-00-00'),
(67, 0, '141/67/Pem-K/RB/II/2020', '2020-02-10', 'Pengantar', 'Disduk Capil', 'Pengantar KTP', 'Untuk membuat surat pengantar KTP', '', '', '0000-00-00', 1805265010040001, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nik` (`nik`,`id_kegiatan`,`id_surat`);

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
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
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
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
