-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2022 at 07:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrispoltracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
('D3936', 'Media'),
('D6753', 'General Affairs'),
('D6796', 'Operational'),
('D6820', 'Digital'),
('D6964', 'Research'),
('D9310', 'Creative'),
('D9610', 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tunjangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `tunjangan`) VALUES
('J2051', 'Direktur', '0'),
('J3066', 'Manager', '0'),
('J4284', 'Supervisor', '0'),
('J5826', 'Staff', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jam_masuk`
--

CREATE TABLE `jam_masuk` (
  `id` int(11) NOT NULL,
  `jam_masuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_masuk`
--

INSERT INTO `jam_masuk` (`id`, `jam_masuk`) VALUES
(1, '0800');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id_cuti` varchar(10) NOT NULL,
  `nama_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id_cuti`, `nama_cuti`) VALUES
('VC2934', 'Cuti Nikah'),
('VC3007', 'Cuti Tahunan'),
('VC3132', 'Cuti Mendadak'),
('VC6503', 'Cuti Melahirkan'),
('VC7268', 'Cuti Hamil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` text NOT NULL,
  `jammasuk` text NOT NULL,
  `jam2` text NOT NULL,
  `status` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(5) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `no_hp` text NOT NULL,
  `level` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `no_hp`, `level`, `gambar`) VALUES
('D5193', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin1', '080908090809', 'Admin', 'foto_admin/admin.jpg'),
('D9575', 'superadmin', '889a3a791b3875cfae413574b53da4bb8a90d53e', 'Superadmin', '081208120812', 'Admin', 'foto_admin/profileimg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `kode` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`kode`, `nama`, `tanggal_awal`, `tanggal_akhir`, `jumlah`, `jenis_cuti`, `ket`, `jam_masuk`, `tanggal`) VALUES
('CT2927', 'Karyawan', '2022-11-09', '2022-11-10', '2', 'Cuti Tahunan', 'tua', '08:08 am', '09-11-2022'),
('CT5306', 'Karyawan', '2022-11-10', '2022-11-11', '11', 'Cuti Tahunan', 'reuiree', '08:31 am', '09-11-2022'),
('CT7409', 'Karyawan', '2022-11-07', '2022-11-08', '2', 'Cuti Tahunan', 'reta', '09:00 am', '07-11-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `ekstensi` varchar(25) NOT NULL,
  `berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` enum('TETAP','PKWT','PKWTT') NOT NULL,
  `agama` text NOT NULL,
  `jen_kel` text NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `karkel` text NOT NULL,
  `npwp` text NOT NULL,
  `alamat` text NOT NULL,
  `domisili` text NOT NULL,
  `nohp` text NOT NULL,
  `email` text NOT NULL,
  `statusnikah` text NOT NULL,
  `kontakkeluarga` text NOT NULL,
  `jumlah_cuti` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Superuser','User') NOT NULL,
  `gambar` text NOT NULL,
  `cvkar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama`, `tanggal_masuk`, `divisi`, `jabatan`, `status`, `agama`, `jen_kel`, `tanggal_lahir`, `karkel`, `npwp`, `alamat`, `domisili`, `nohp`, `email`, `statusnikah`, `kontakkeluarga`, `jumlah_cuti`, `username`, `password`, `level`, `gambar`, `cvkar`) VALUES
('K8706', '12342313', 'Karyawan 1', '2022-10-24', 'General Affairs', 'Staff', 'TETAP', 'Islam', 'Laki - Laki', '2000-10-24', '-', '-', '-', '-', '-', '-', 'TK-0', '-', '12', 'karyawan', '87c78b8da768468c4f3826791496385536c11dad', 'User', 'foto_karyawan/profileimg.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id_ket` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `tanggal` text NOT NULL,
  `jam_masuk` text NOT NULL,
  `ket` text NOT NULL,
  `alasan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id_ket`, `nama`, `tanggal`, `jam_masuk`, `ket`, `alasan`, `status`) VALUES
('Ket9339', 'Karyawan', '07-11-2022', '08:59 am', 'Izin', 'wewro', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jam_masuk`
--
ALTER TABLE `jam_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id_ket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jam_masuk`
--
ALTER TABLE `jam_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
