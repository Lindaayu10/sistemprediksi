-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 01:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(20) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `status`) VALUES
(1, '', 'admin', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email_guru` varchar(50) NOT NULL,
  `status` enum('wali kelas','guru','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `id_kriteria` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `id_kriteria` int(50) NOT NULL,
  `nilai_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prediksi`
--

CREATE TABLE `tbl_prediksi` (
  `id_prediksi` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `id_nilai` int(50) NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `hasil_prediksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(50) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  ADD PRIMARY KEY (`id_prediksi`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nama_siswa` (`id_siswa`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  MODIFY `id_prediksi` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD CONSTRAINT `tbl_mapel_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`),
  ADD CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

--
-- Constraints for table `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  ADD CONSTRAINT `tbl_prediksi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `tbl_prediksi_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `tbl_prediksi_ibfk_4` FOREIGN KEY (`id_nilai`) REFERENCES `tbl_nilai` (`id_nilai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
