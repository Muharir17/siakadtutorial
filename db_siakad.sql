-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 02:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_username` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_username`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'fadli'),
(2, 'gunanda', 'a79dc94998e50ae419669610504966ed', 'Muhammad Gunanda'),
(3, 'zain', '3ed9b95e4b6f2c345836def81e570ef1', 'Muhammad Zain');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kd_dosen` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `pendidikan` char(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `status` enum('Aktif','Keluar') NOT NULL DEFAULT 'Aktif',
  `tgl_update` datetime NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kd_dosen`, `kd_prodi`, `nidn`, `nama_dosen`, `sex`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `pendidikan`, `email`, `prodi`, `password`, `file_foto`, `tgl_insert`, `status`, `tgl_update`, `tgl_masuk`) VALUES
('SI14DS0001', '57-201', '', 'Ugih Sugiarti', 'P', 'Serang', '2014-07-01', 'Cimuncang', '08777', 'D3', '', 'Akuntansi', 'ce28eed1511f631af6b2a7bb0a85d636', '', '0000-00-00 00:00:00', 'Aktif', '0000-00-00 00:00:00', '2014-07-14'),
('SI14DS0002', '57-201', '9988', 'Deddy Rusdiansyah.M.Kom', 'L', 'Pandeglang', '1979-08-05', 'Cimuncang', '087774846856', 'S2', '', 'Teknik Informatika', 'ce28eed1511f631af6b2a7bb0a85d636', '', '0000-00-00 00:00:00', 'Aktif', '0000-00-00 00:00:00', '2014-07-14'),
('SI14DS0003', '57-201', '', 'Tolak Angin', 'L', 'Serang', '2014-07-15', 'Serang', '08777', 'S2', '', 'Sistem Informasi', 'ce28eed1511f631af6b2a7bb0a85d636', '', '2014-07-15 06:34:22', 'Aktif', '0000-00-00 00:00:00', '2014-07-15'),
('TI14DS0001', '55-201', '', 'Deddy Rusdiansyah', 'L', 'Pandeglang', '1979-08-05', 'Cimuncang', '087774846856', 'S1', 'deddy.rusdiansyah@gmail.com', 'Sistem Informasi', '827ccb0eea8a706c4c34a16891f84e7b', 'TI14DS0001.jpg', '0000-00-00 00:00:00', 'Aktif', '2014-07-14 01:37:01', '2014-07-14'),
('TI14DS0002', '55-201', '12345', 'Danish Putra Pramudia,M.Kom', 'L', 'Serang', '2013-11-30', 'Cimuncang', '08777', 'S2', '', 'Sistem Informasi', 'ce28eed1511f631af6b2a7bb0a85d636', '', '0000-00-00 00:00:00', 'Aktif', '0000-00-00 00:00:00', '2014-07-14'),
('TI14DS0003', '55-201', '', 'Mentari Aqilah Prilidianti', 'P', 'Serang', '0000-00-00', 'Cimuncang', '087774846856', 'S2', '', 'Teknik Informatika', 'ce28eed1511f631af6b2a7bb0a85d636', '', '0000-00-00 00:00:00', 'Aktif', '0000-00-00 00:00:00', '2014-07-14'),
('TI14DS0004', '55-201', '557788', 'IPhone', 'P', 'Jakarta', '2014-07-02', 'Jakarta', '08777', 'S3', '', 'Teknologi Pendidikan', 'ce28eed1511f631af6b2a7bb0a85d636', '', '2014-07-15 06:48:27', 'Aktif', '0000-00-00 00:00:00', '2014-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `th_akademik` varchar(10) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil',
  `kd_prodi` varchar(10) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `kd_dosen` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `th_akademik`, `semester`, `kd_prodi`, `kd_mk`, `kd_dosen`, `hari`, `pukul`, `ruang`, `tgl_insert`, `tgl_update`) VALUES
(1, '20141', 'ganjil', '55-201', 'TI-0001', 'TI14DS0001', 'Senin', '08.00 - 10.00', 'R01', '2014-06-21 01:01:20', '0000-00-00 00:00:00'),
(2, '20141', 'ganjil', '55-201', 'TI-0002', 'TI14DS0001', 'Senin', '10.00 - 12.00', 'R01', '2014-06-21 03:53:15', '0000-00-00 00:00:00'),
(4, '20141', 'ganjil', '55-201', 'TI-0003', 'TI14DS0002', 'Senin', '08.00 - 10.00', 'R03', '2014-06-21 04:37:50', '0000-00-00 00:00:00'),
(5, '20142', 'genap', '55-201', 'TI-0007', 'TI14DS0001', 'Senin', '08.00 - 10.00', 'R01', '2014-06-23 09:18:26', '0000-00-00 00:00:00'),
(6, '20142', 'genap', '55-201', 'TI-0008', 'TI14DS0002', 'Senin', '08.00 - 10.00', 'R02', '2014-07-13 04:29:11', '0000-00-00 00:00:00'),
(7, '20142', 'genap', '55-201', 'TI-0009', 'TI14DS0003', 'Senin', '10.00 - 12.00', 'R03', '2014-07-13 04:29:29', '0000-00-00 00:00:00'),
(8, '20142', 'genap', '57-201', 'SI-0005', 'SI14DS0001', 'Senin', '08.00 - 10.00', 'R03', '2014-07-15 07:09:36', '0000-00-00 00:00:00'),
(9, '20142', 'genap', '57-201', 'SI-0006', 'SI14DS0002', 'Senin', '10.00 - 12.00', 'R04', '2014-07-15 07:09:54', '0000-00-00 00:00:00'),
(10, '20142', 'genap', '57-201', 'SI-0007', 'SI14DS0002', 'Senin', '19.00 - 20.00', 'R03', '2014-07-15 07:10:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jam_kuliah`
--

CREATE TABLE `jam_kuliah` (
  `Kode` varchar(10) NOT NULL,
  `Jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(10) NOT NULL,
  `th_akademik` varchar(10) NOT NULL,
  `smt` smallint(6) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kd_prodi` char(10) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` smallint(6) NOT NULL,
  `kd_dosen` char(10) NOT NULL,
  `nm_dosen` varchar(100) NOT NULL,
  `ruang` char(10) NOT NULL,
  `hari` char(15) NOT NULL,
  `pukul` char(15) NOT NULL,
  `nilai_uts` varchar(5) NOT NULL,
  `nilai_uas` varchar(5) NOT NULL,
  `nilai_akhir` enum('A','B+','B','C+','C','D','E') NOT NULL,
  `acc_dosen` enum('Y','T') NOT NULL DEFAULT 'T',
  `status` enum('Baru','Remedial') NOT NULL DEFAULT 'Baru',
  `tampil` enum('Y','T') NOT NULL DEFAULT 'Y',
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `th_akademik` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kd_prodi` varchar(15) NOT NULL,
  `nama_mhs` varchar(150) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` varchar(150) NOT NULL,
  `hp_ortu` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `status` enum('Aktif','Cuti','DO','Meninggal','Lulus') NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`th_akademik`, `nim`, `kd_prodi`, `nama_mhs`, `sex`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `hp`, `email`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `hp_ortu`, `password`, `file_foto`, `status`, `tgl_insert`, `tgl_update`) VALUES
('20141', 'SI20140001', '57-201', 'Jihan Salsabila', 'P', 'Serang', '2000-05-30', 'Cimuncang', 'Kota Serang', '08777', 'salsa@yahoo.com', '', '', '', '', 'b80b67df21dfb14b81737ae3a5cec321', '', 'Aktif', '2014-07-12 11:28:57', '0000-00-00 00:00:00'),
('20141', 'SI20140002', '55-201', 'Tes', 'P', 'Tes', '2014-07-14', 'tes', 'tes', '0', 'tes@yahoo.com', '', '', '', '', 'cb31141429a2df90150ae329fe350bc1', '', 'Aktif', '2014-07-14 01:10:48', '0000-00-00 00:00:00'),
('20141', 'TI20140001', '57-201', 'Deddy Rusdiansyah', 'L', 'Pandeglang', '1979-08-05', 'Cimuncang Sidumuncul No.9', 'Serang', '087774846856', 'deddy_rusdiansyah@yahoo.com', 'Oni Sufthoni', 'Ugih Sugiarti', 'Cimuncang ', '08777', '9f7f4941587a1c4542df91ee41114eb9', 'TI20140001.jpg', 'Aktif', '2014-06-21 12:59:30', '2014-07-13 07:46:33'),
('20141', 'TI20140002', '55-201', 'Danish Putra Pramudya', 'L', 'Serang', '2007-03-22', 'Cimuncang', 'Serang', '087774846856', 'danish_pp@yahoo.com', 'Deddy Rusdiansyah,S.Kom', 'Ugih Sugiarti,A.Md', 'Cimuncang Sidomuncul', '08777', '827ccb0eea8a706c4c34a16891f84e7b', 'TI20140002.jpg', 'Lulus', '2014-06-21 11:19:39', '2014-07-13 07:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kd_mk` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` smallint(6) NOT NULL,
  `smt` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kd_mk`, `kd_prodi`, `nama_mk`, `sks`, `smt`, `semester`, `aktif`, `tgl_insert`, `tgl_update`) VALUES
('0980980980', '57-201', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('809809', '55-201', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('agan', '57-201', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('muhamad fa', '55-201', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0001', '57-201', 'Bahasa Indonesia', 3, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0001111', '57-201', 'Bahasa Indonesia', 3, '', 'Ganjil', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0002', '57-201', 'Bahasa Inggris', 3, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0003', '57-201', 'Aljabar Linear', 3, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0004', '57-201', 'Pemrograman Terstruktur', 4, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0005', '57-201', 'Pendidikan Agama', 2, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0006', '57-201', 'Algoritma dan Struktur Data', 4, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SI-0007', '57-201', 'Matematika Diskrit', 3, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TE-0001', '009', 'kolaborasi listrik dengan mesin', 2, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0001', '55-201', 'Algoritma dan Pemrograman', 3, '1', 'Ganjil', 'Ya', '2014-06-20 00:00:00', '2014-06-13 00:00:00'),
('TI-0002', '55-201', 'Bahasa Inggris', 2, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0003', '55-201', 'Aljabar Linear', 2, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0004', '55-201', 'Sistem dan Teknologi Informasi', 2, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0005', '55-201', 'Sistem Digital', 2, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0006', '55-201', 'Kalkulus 1', 3, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0007', '55-201', 'Pendidikan Agama', 3, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0008', '55-201', 'Pemrograman Dasar I', 3, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TI-0009', '55-201', 'Kalkulus II', 3, '2', 'Genap', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('tyty', '', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('vbvb', '55-201', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('wewe', '002', '', 0, '1', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('xx', '', 'xx', 8, '', 'Ganjil', 'Ya', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_mhs`
--

CREATE TABLE `mutasi_mhs` (
  `id_mutasi` int(11) NOT NULL,
  `th_akademik` varchar(10) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil',
  `tgl_mutasi` date NOT NULL,
  `nim` varchar(20) NOT NULL,
  `status` enum('Aktif','Cuti','DO','Meninggal','Lulus') NOT NULL,
  `ket` text NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi_mhs`
--

INSERT INTO `mutasi_mhs` (`id_mutasi`, `th_akademik`, `semester`, `tgl_mutasi`, `nim`, `status`, `ket`, `tgl_insert`, `tgl_update`) VALUES
(3, '20142', 'ganjil', '2014-07-12', 'TI20140002', 'Cuti', 'Cuti Kuliah', '2014-07-12 10:42:00', '0000-00-00 00:00:00'),
(4, '20141', 'ganjil', '2014-07-15', 'TI20140003', 'Cuti', 'Cuti Kuliah', '2014-07-15 10:59:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `ke` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` tinyint(4) NOT NULL,
  `status` enum('Kirim','Dibaca') NOT NULL DEFAULT 'Kirim',
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `singkat` varchar(10) NOT NULL,
  `ketua_prodi` varchar(100) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `akreditasi` varchar(2) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `prodi`, `singkat`, `ketua_prodi`, `nik`, `akreditasi`, `tgl_insert`, `tgl_update`) VALUES
('55-201', 'Teknik Infdormatika', 'TI', 'Deddy Rusdiansyah', '4846', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('57-201', 'Sistem Informasi', 'SI', 'Danish Putra Pramudia', '6856', 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('B009', 'Fakultas Teknologi Informasi', 'FTI', 'Muflih j', '977565687745', 'b', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BN', 'BN', 'BN', 'BN', 'BN', 'BN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('df', 'sff', 'sdc', 'dfe', 'fe', 'fe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('DFSD', 'DFSW', 'SFDSA', 'SFS', 'DFSD', 'S', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('Diana', 'Diana', 'Diana', 'Diana', 'Diana', 'Di', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('gfg', 'GC', 'FC', 'FC', 'F', 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('hjg', 'hgu', 'hvh', 'hvh', 'vh', 'hj', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kuliah`
--

CREATE TABLE `ruang_kuliah` (
  `Kode` varchar(10) NOT NULL,
  `Nama_ruang_kuliah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil',
  `dari` smallint(6) NOT NULL,
  `sampai` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`, `dari`, `sampai`) VALUES
('ganjil', 107, 3012),
('genap', 101, 3006);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `form` varchar(50) NOT NULL,
  `tgl_close` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `form`, `tgl_close`) VALUES
(1, 'KRS', '2014-07-01'),
(2, 'Wisuda', '2014-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `wisuda`
--

CREATE TABLE `wisuda` (
  `id_wisuda` int(11) NOT NULL,
  `th_akademik` char(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nim` varchar(15) NOT NULL,
  `judul_skripsi` text NOT NULL,
  `tgl_sidang` date NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `ipk` float NOT NULL,
  `acc_akademik` enum('Y','T') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisuda`
--

INSERT INTO `wisuda` (`id_wisuda`, `th_akademik`, `tgl_daftar`, `nim`, `judul_skripsi`, `tgl_sidang`, `tgl_insert`, `tgl_update`, `ipk`, `acc_akademik`) VALUES
(1, '20142', '2014-07-12', 'TI20140002', 'Penjadwalan Sekolah Menggunakan Algoritma Genetika Pada Sekolah TK Islam Indonesia Serang Banten', '2014-07-13', '2014-07-12 01:19:30', '2014-07-13 03:45:19', 3.75, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_username`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kd_dosen`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `Th_akademik` (`th_akademik`,`semester`,`kd_prodi`,`kd_mk`,`kd_dosen`,`hari`,`pukul`,`ruang`);

--
-- Indexes for table `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `Id_jadwal` (`id_jadwal`,`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kd_mk`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `mutasi_mhs`
--
ALTER TABLE `mutasi_mhs`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `ruang_kuliah`
--
ALTER TABLE `ruang_kuliah`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisuda`
--
ALTER TABLE `wisuda`
  ADD PRIMARY KEY (`id_wisuda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_username` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutasi_mhs`
--
ALTER TABLE `mutasi_mhs`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wisuda`
--
ALTER TABLE `wisuda`
  MODIFY `id_wisuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
