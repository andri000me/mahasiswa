-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 02:08 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'wahyu pratama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `j_kel` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nip`, `nama_dosen`, `j_kel`, `alamat`, `telepon`) VALUES
(1, '11101', 'Muryan Awaludin', 'perempuan', 'Jakarta Barat', '0871237723'),
(4, '11102', 'Junaedi', 'laki-laki', 'Jakarta', '021989098'),
(12, '11109', 'Asdasd', 'laki-laki', 'asdasd', 'asdasd'),
(15, '11111212', 'Asd', 'laki-laki', 'asd', 'asd'),
(16, '11106', 'Naruto', 'laki-laki', 'Bekasi', '1237878723'),
(17, 'asds', 'Asd', 'laki-laki', 'asd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `semester` int(2) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `nip`, `semester`, `matakuliah`, `status`) VALUES
(2, '11102', 1, 'MPK-1411201', '1'),
(3, '11106', 3, 'MKK-1411204', '1'),
(4, '11109', 4, 'MKK-1411301', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `j_kel` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_siswa`, `nama_siswa`, `nis`, `tgl_lahir`, `j_kel`, `alamat`, `telepon`) VALUES
(1, 'Wahyu Pratama', '1401110087', '1996-03-01', 'laki-laki', 'Jakarta', '085674263434'),
(3, 'Rizal', '1401110089', '1995-03-01', 'laki-laki', 'RizalRizalRizal', '08156766415'),
(4, 'Nur Arif Fadlillah', '1401110086', '1997-08-02', 'laki-laki', 'Bekasi', '1898765251'),
(6, 'Nisa Ajeng', '1401110088', '1996-06-01', 'perempuan', 'Bekasi', '08569857555'),
(7, 'Agung Setiyadi', '1401110013', '1996-10-14', 'laki-laki', 'Jakarta Timur', '08578299880'),
(38, 'Aldi Lukman', '1401118989', '1994-07-16', 'laki-laki', 'Bekasi', '00812313223'),
(39, 'Asdsadd', '140111777', '0000-00-00', 'laki-laki', 'asdad', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
  `id_matkul` int(5) NOT NULL,
  `kode_matkul` varchar(50) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `sks` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_matkul`, `kode_matkul`, `matakuliah`, `sks`) VALUES
(1, 'MPK-1411201', 'pendidikan agama', 2),
(2, 'MKK-1411301', 'algoritma pemograman', 4),
(4, 'MKK-1411303', 'fisika dasar', 3),
(5, 'MKK-1411204', 'bahasa inggris 1', 2),
(7, 'MKB-1411302', 'desain grafis 1', 3),
(8, 'MKB-1411303', 'pengantar teknologi informasi', 3),
(9, 'MKK-1421205', 'bahasa inggris 2', 2),
(10, 'MKK-1421206', 'kalkulus', 3),
(11, 'MKB-1421304', 'pemrograman 1', 3),
(12, 'MKK-1421207', 'multimedia', 3),
(13, 'MKB-1421306', 'jaringan komputer', 3),
(14, 'MKB-1421307', 'desain grafis 2', 3),
(15, 'MPK-1421202', 'pancasila & kewarganegaraan', 2),
(16, 'MKB-1431209', 'arsitektur & organisasi komputer', 3),
(17, 'MKB-1431310', 'sistem operasi', 3),
(18, 'MKB-1431311', 'pemograman web 1', 3),
(19, 'MKB-1431312', 'pemograman 2', 3),
(20, 'MKB-1431313', 'sistem basis data 2', 3),
(21, 'MKK-1431308', 'struktur data', 3),
(22, 'MBB-1431201', 'interaksi manusia & komputer', 2),
(23, 'MKK-1431209', 'matematika diskrit', 2),
(24, 'MKB-1441315', 'e-commerce', 3),
(25, 'MKK-1441210', 'teknik kompilasi', 3),
(26, 'MKB-1441317', 'komunakasi data', 3),
(27, 'MKB-1441218', 'sistem informasi manajemen', 2),
(28, 'MKB-143200', 'Aku', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `semester` int(2) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `n_absen` int(10) NOT NULL,
  `n_tugas` int(10) NOT NULL,
  `n_uts` int(10) NOT NULL,
  `n_akhir` int(10) NOT NULL,
  `predikat` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nip`, `semester`, `matakuliah`, `mahasiswa`, `n_absen`, `n_tugas`, `n_uts`, `n_akhir`, `predikat`) VALUES
(1, '11101', 1, 'MBB-1431201', '1401110013', 80, 97, 21, 12, 'E'),
(2, '11102', 3, 'MBB-1431201', '1401110087', 100, 100, 100, 100, 'A'),
(3, '11109', 4, 'MKB-1411302', '1401110086', 12, 12, 12, 12, 'E'),
(4, '11102', 4, 'MKB-1411303', '1401110086', 12, 12, 12, 12, 'E'),
(5, '11106', 4, 'MKK-1411204', '1401110086', 90, 90, 90, 90, 'B'),
(6, '11102', 1, 'MPK-1411201', '1401110013', 40, 50, 50, 50, 'E'),
(8, '11102', 4, 'MPK-1411201', '1401110086', 80, 80, 80, 0, 'D'),
(9, '11102', 1, 'MKK-1421205', '1401110013', 80, 80, 80, 80, 'B'),
(10, '11106', 1, 'MKK-1411204', '1401110013', 80, 80, 80, 80, 'B'),
(11, '11102', 4, 'MPK-1411201', '1401110086', 80, 80, 80, 80, 'B'),
(12, '11106', 3, 'MKK-1411204', '1401110089', 80, 0, 80, 0, 'E'),
(13, '11106', 3, 'MKK-1411204', '1401110087', 80, 80, 80, 0, 'D'),
(14, '11106', 4, 'MKK-1411204', '1401110086', 78, 78, 78, 78, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE IF NOT EXISTS `tb_semester` (
  `id_semester` int(5) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `tahun`, `mahasiswa`) VALUES
(5, 1, '2014', '1401110013'),
(6, 2, '2014', '1401110001'),
(9, 2, '2014', '1401110027'),
(10, 3, '2016', '1401110087'),
(14, 4, '2014', '1401110086'),
(16, 2, '2014', '1401110088'),
(17, 3, '2015', '1401110089'),
(18, 2, '2015', '1401110087'),
(19, 3, '1222', '1401110086'),
(20, 2, '2015', '1401110013'),
(21, 3, '2016', '1401110013'),
(22, 2, '2015', '1401110088'),
(23, 2, '80', '1401110013'),
(24, 3, '2014', '1401110087');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `nip` (`nip`),
  ADD KEY `semester` (`semester`),
  ADD KEY `matakuliah` (`matakuliah`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `nis_2` (`nis`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nip` (`nip`),
  ADD KEY `semester` (`semester`),
  ADD KEY `matakuliah` (`matakuliah`),
  ADD KEY `matakuliah_2` (`matakuliah`),
  ADD KEY `id_mahasiswa` (`mahasiswa`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `semester` (`semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  MODIFY `id_matkul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `fk_matakuliah_jadwal` FOREIGN KEY (`matakuliah`) REFERENCES `tb_matakuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nip_jadwal` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_semester_jadwal` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `fk_mahasiswa_nilai` FOREIGN KEY (`mahasiswa`) REFERENCES `tb_mahasiswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matakuliah_nilai` FOREIGN KEY (`matakuliah`) REFERENCES `tb_matakuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nip_nilai` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_semester_nilai` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
