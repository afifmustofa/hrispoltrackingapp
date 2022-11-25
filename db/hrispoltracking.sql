-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2022 at 10:38 AM
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

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nama`, `tanggal`, `jammasuk`, `jam2`, `status`, `image`) VALUES
('P3019', 'Karyawan 1', '2022-11-17', '14:58', '', '', ''),
('P7071', 'Karyawan 1', '15-11-2022', '09:31:18', '0931', '', ''),
('P8757', 'Karyawan 1', '16-11-2022', '04:56:36', '0456', '', '');

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
('CT9218', 'Ahmad Al Afif', '2022-11-18', '2022-11-18', '1', 'Cuti Tahunan', 'Istri Sakit', '10:35 am', '18-11-2022');

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

--
-- Dumping data for table `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `nama`, `title`, `size`, `ekstensi`, `berkas`) VALUES
('file8976', 'Ahmad Al Afif', 'Komaruddin komaruddin.pdf', '55141', 'pdf', 'file/Komaruddin komaruddin.pdf');

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
  `pendidikan` varchar(100) NOT NULL,
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
  `posisi` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama`, `tanggal_masuk`, `divisi`, `jabatan`, `status`, `agama`, `jen_kel`, `tanggal_lahir`, `pendidikan`, `karkel`, `npwp`, `alamat`, `domisili`, `nohp`, `email`, `statusnikah`, `kontakkeluarga`, `jumlah_cuti`, `username`, `password`, `level`, `gambar`, `posisi`) VALUES
('K4342', '1231', 'Ahmad Al Afif ', '2022-11-18', 'Accounting', 'Direktur', 'TETAP', 'Islam', 'Laki-Laki', '2022-11-18', 'S1', '12313', '123', 'Depok', 'Depok', '08070723424', 'afif@gmail.com', 'Menikah - Belum Punya Anak', '3224234', '12', 'afif', '8cb2237d0679ca88db6464eac60da96345513964', 'User', 'foto_karyawan/4.-Ahmad-Al-Afif-1536x1536.jpg', 'Aktif'),
('K5507', '23141144', 'Aditya Huda', '2022-11-23', 'Accounting', 'Staff', 'TETAP', 'Islam', 'Laki-Laki', '1995-11-23', 'SMA', '12124411', '1245783', 'Depok', 'Depok', '08123456789', 'adit@email.com', 'Belum Menikah', '08123456789', '12', 'adit', '8cb2237d0679ca88db6464eac60da96345513964', 'User', 'foto_karyawan/adityahuda.jpg', 'Aktif'),
('K8706', '12342313', 'Karyawan 1', '2022-10-24', 'Accounting', 'Staff', 'PKWT', 'Islam', 'Perempuan', '2000-10-24', 'D3', '-', '-', '-', '-', '-', '-', 'Belum Menikah', '-', '12', 'karyawan', '87c78b8da768468c4f3826791496385536c11dad', 'User', 'foto_karyawan/admin2.jpg', 'Aktif'),
('K9909', '5566412', 'karyawan 2', '2022-11-10', 'Accounting', 'Staff', 'TETAP', 'Islam', 'Perempuan', '1995-11-03', 'S2', '222111122111', '222111122111', 'depok', 'depok', '081300990099', 'k@email.com', 'Belum Menikah', '1', '12', 'karyawan2', '87c78b8da768468c4f3826791496385536c11dad', 'User', 'foto_karyawan/profileimg.jpg', 'Non - Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kel`
--

CREATE TABLE `tb_kel` (
  `id_karyawan` varchar(10) NOT NULL,
  `namakel` varchar(100) NOT NULL,
  `hubungan` varchar(10) NOT NULL,
  `anak1` varchar(100) NOT NULL,
  `anak2` varchar(100) NOT NULL,
  `anak3` varchar(200) NOT NULL,
  `anak4` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kel`
--

INSERT INTO `tb_kel` (`id_karyawan`, `namakel`, `hubungan`, `anak1`, `anak2`, `anak3`, `anak4`, `nohp`) VALUES
('K4342', 'Apri Yanti', 'Istri', '', '', '', '', '083131313131'),
('K5507', 'Huda', 'Istri', '', '', '', '', '123'),
('K9909', 'Mardi', 'Ayah', '-', '-', '-', '-', '087788787');

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
('Ket3707', 'Karyawan 1', '2022-11-15', '10:33', 'Izin', 'tuyuop', ''),
('Ket9339', 'Karyawan', '07-11-2022', '08:59 am', 'Izin', 'wewro', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nonaktif`
--

CREATE TABLE `tb_nonaktif` (
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
  `tgl_arsip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tb_kel`
--
ALTER TABLE `tb_kel`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indexes for table `tb_nonaktif`
--
ALTER TABLE `tb_nonaktif`
  ADD PRIMARY KEY (`id_karyawan`);

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
