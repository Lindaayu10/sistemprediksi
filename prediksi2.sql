-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2021 pada 03.45
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat_admin` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akurasi`
--

CREATE TABLE `akurasi` (
  `id_akurasi` int(11) NOT NULL,
  `akurasi_training` double DEFAULT NULL,
  `akurasi_testing` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akurasi`
--

INSERT INTO `akurasi` (`id_akurasi`, `akurasi_training`, `akurasi_testing`) VALUES
(4, NULL, 0.98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasiswa`
--

CREATE TABLE `datasiswa` (
  `id_datasiswa` int(200) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datasiswa`
--

INSERT INTO `datasiswa` (`id_datasiswa`, `nisn`, `nama_siswa`, `ttl`, `jenkel`, `agama`, `alamat`) VALUES
(1, 89553716, 'Muhamad Rizki Julianto', 'Purworejo, 28-07-2008', 'L', 'Islam', 'Desa Turus, Kecamatan Kemiri, Kab. Purworejo'),
(2, 95240547, 'Asti Wulan Dari', 'Purworejo, 11-07-2009', 'P', 'Islam', 'Desa Dilem, Kecamatan. Kemiri, Kab. Purworejo'),
(3, 91974846, 'Safitri Nuraini', 'Purworejo, 20-06-2009', 'P', 'Islam', 'Desa Turus, Kecamatan Kemiri, Kab. Purworejo'),
(4, 102760510, 'Abikara Surya A A', 'Purworejo, 05-06-2010', 'L', 'Islam', 'Desa Dilem, Kecamatan. Kemiri, Kab. Purworejo'),
(5, 92683633, 'Aca Indah Safira', 'Purworejo, 16-08-2010', 'P', 'Islam', 'Desa Dilem, Kecamatan. Kemiri, Kab. Purworejo'),
(6, 95905167, 'Afifah Khoirunnisa', 'Purworejo, 26-09-2009', 'P', 'Islam', 'Desa Dilem, Kecamatan. Kemiri, Kab. Purworejo'),
(7, 109312221, 'Aira Cahyani', 'Jakarta, 02-02-2010', 'P', 'Islam', 'Desa Dilem, Kecamatan. Kemiri, Kab. Purworejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datatesting`
--

CREATE TABLE `datatesting` (
  `id_datatesting` int(200) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `pengetahuan` double NOT NULL,
  `ketrampilan` double NOT NULL,
  `spiritual` varchar(20) NOT NULL,
  `sosial` varchar(20) NOT NULL,
  `predikat_asli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datatesting`
--

INSERT INTO `datatesting` (`id_datatesting`, `nama_siswa`, `jenkel`, `pengetahuan`, `ketrampilan`, `spiritual`, `sosial`, `predikat_asli`) VALUES
(1, 'Muhamad Rizki Julianto', 'L', 73, 78, 'B', 'B', 'BAIK'),
(2, 'Asti Wulan Dari', 'P', 82, 84, 'A', 'B', 'SANGAT BAIK'),
(3, 'Safitri Nuraini', 'P', 76, 81, 'B', 'B', 'BAIK'),
(4, 'Abikara Surya  A A', 'L', 76, 79, 'B', 'B', 'BAIK'),
(5, 'Aca Indah Safira', 'P', 82, 85, 'A', 'B', 'SANGAT BAIK'),
(6, 'Afifah Khoirunnisa', 'P', 82, 84, 'B', 'B', 'SANGAT BAIK'),
(7, 'Aira Cahyani', 'P', 73, 78, 'B', 'B', 'BAIK'),
(8, 'Alfiatul Azahra', 'P', 76, 79, 'B', 'B', 'BAIK'),
(9, 'Alma Prihanti', 'P', 85, 85, 'B', 'B', 'SANGAT BAIK'),
(10, 'Ana Wahidatul Latifah', 'P', 84, 85, 'B', 'B', 'SANGAT BAIK'),
(11, 'Andrean Syarif H', 'L', 76, 81, 'B', 'B', 'BAIK'),
(12, 'Ayu Elsa Apriliya', 'P', 76, 80, 'B', 'B', 'BAIK'),
(13, 'Didik Usmayadi', 'L', 77, 80, 'B', 'B', 'BAIK'),
(14, 'Fadhil Na\'Im Aimandanu.', 'L', 82, 84, 'B', 'B', 'SANGAT BAIK'),
(15, 'Faisal Arief Ramdhani', 'L', 75, 78, 'B', 'B', 'BAIK'),
(16, 'Hilwa Khasanah', 'P', 83, 86, 'B', 'B', 'SANGAT BAIK'),
(17, 'Javalin Puspa Elvaretta', 'P', 81, 82, 'B', 'B', 'SANGAT BAIK'),
(18, 'Khairun Nisa', 'P', 80, 83, 'B', 'B', 'SANGAT BAIK'),
(19, 'Luluk Miftahul Jannah', 'P', 80, 84, 'B', 'B', 'SANGAT BAIK'),
(20, 'Muhamad Haikal Fikri', 'L', 82, 83, 'B', 'B', 'SANGAT BAIK'),
(21, 'Muhammad Irham Maulana', 'L', 75, 79, 'B', 'B', 'BAIK'),
(22, 'Nurizqy Uun Pratama', 'L', 75, 78, 'B', 'B', 'BAIK'),
(23, 'Riska Dwi Kurniyawati', 'P', 78, 83, 'B', 'B', 'SANGAT BAIK'),
(24, 'Zahra Azzahwa Asyifa', 'P', 76, 82, 'B', 'B', 'BAIK'),
(25, 'Siti Fatimah', 'P', 76, 77, 'B', 'B', 'BAIK'),
(26, 'Aura Niezzaluna', 'P', 77, 80, 'B', 'B', 'BAIK'),
(27, 'Mutholif Nandha H', 'L', 75, 76, 'B', 'B', 'BAIK'),
(28, 'Ahmad Maulana', 'L', 79, 79, 'B', 'B', 'BAIK'),
(29, 'Dafin Sebastian', 'L', 76, 79, 'B', 'B', 'BAIK'),
(30, 'Adam Hamdani', 'L', 76, 77, 'B', 'B', 'BAIK'),
(31, 'Aldan Prayoga', 'L', 77, 80, 'B', 'B', 'BAIK'),
(32, 'Ana Rahmawati', 'P', 81, 80, 'B', 'B', 'SANGAT BAIK'),
(33, 'Ilham Nur Hidayat', 'L', 91, 90, 'B', 'B', 'SANGAT BAIK'),
(34, 'M.Farhan Aridho', 'L', 74, 76, 'B', 'B', 'BAIK'),
(35, 'M.Mutawaqil A', 'L', 88, 89, 'B', 'B', 'SANGAT BAIK'),
(36, 'M.Wildan Alfan Kusna', 'L', 76, 76, 'B', 'B', 'BAIK'),
(37, 'Nafisatul Fuadah', 'P', 87, 88, 'B', 'B', 'SANGAT BAIK'),
(38, 'Najiatun Nangimah', 'P', 80, 81, 'B', 'B', 'SANGAT BAIK'),
(39, 'Nana Tia Yana', 'P', 77, 80, 'B', 'B', 'BAIK'),
(40, 'Rendi Setiawan', 'L', 75, 78, 'B', 'B', 'BAIK'),
(41, 'Rizki Andika', 'L', 76, 77, 'B', 'B', 'BAIK'),
(42, 'Roif Ramdani Avansyah', 'L', 80, 80, 'B', 'B', 'BAIK'),
(43, 'Safri Diantoro', 'L', 80, 81, 'B', 'B', 'BAIK'),
(44, 'Sherly Ramadhani', 'P', 83, 80, 'B', 'B', 'SANGAT BAIK'),
(45, 'Singgi Yuliati', 'P', 81, 83, 'B', 'B', 'SANGAT BAIK'),
(46, 'Habib Mustofah', 'L', 75, 77, 'B', 'B', 'BAIK'),
(47, 'Gama Rizqi Agustya Ambari', 'L', 75, 77, 'B', 'B', 'BAIK'),
(48, 'Heva Sahra Revana', 'P', 78, 80, 'B', 'B', 'BAIK'),
(49, 'Mukhamad Yasin', 'L', 77, 79, 'B', 'B', 'BAIK'),
(50, 'Abdul Ghani Akmal', 'L', 76, 80, 'B', 'B', 'BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datatrining`
--

CREATE TABLE `datatrining` (
  `id_datatrining` int(200) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `pengetahuan` double NOT NULL,
  `ketrampilan` double NOT NULL,
  `spiritual` varchar(20) NOT NULL,
  `sosial` varchar(20) NOT NULL,
  `predikat_asli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datatrining`
--

INSERT INTO `datatrining` (`id_datatrining`, `nama_siswa`, `jenkel`, `pengetahuan`, `ketrampilan`, `spiritual`, `sosial`, `predikat_asli`) VALUES
(85, 'Muhamad Rizki Julianto', 'L', 73.076796454574, 78.286772486772, 'B', 'B', 'BAIK'),
(86, 'Asti Wulan Dari', 'P', 81.906378600823, 83.625793650794, 'A', 'B', 'SANGAT BAIK'),
(87, 'Safitri Nuraini', 'P', 75.509654954099, 80.720899470899, 'B', 'B', 'BAIK'),
(88, 'Abikara Surya  A A', 'L', 75.725253244698, 79.065608465608, 'B', 'B', 'BAIK'),
(89, 'Aca Indah Safira', 'P', 82.261791706236, 84.971560846561, 'A', 'B', 'SANGAT BAIK'),
(90, 'Afifah Khoirunnisa', 'P', 81.998773345996, 84.253835978836, 'B', 'B', 'SANGAT BAIK'),
(91, 'Aira Cahyani', 'P', 72.546866096866, 78.309656084656, 'B', 'B', 'BAIK'),
(92, 'Alfiatul Azahra', 'P', 75.79757439063, 79.362301587302, 'B', 'B', 'BAIK'),
(93, 'Alma Prihanti', 'P', 84.882553814498, 85.103042328042, 'B', 'B', 'SANGAT BAIK'),
(94, 'Ana Wahidatul Latifah', 'P', 84.435474042418, 85.306216931217, 'B', 'B', 'SANGAT BAIK'),
(95, 'Andrean Syarif H', 'L', 75.668629313074, 80.592063492063, 'B', 'B', 'BAIK'),
(96, 'Ayu Elsa Apriliya', 'P', 75.589399335233, 79.697486772487, 'B', 'B', 'BAIK'),
(97, 'Didik Usmayadi', 'L', 77.407249129471, 80.251984126984, 'B', 'B', 'BAIK'),
(98, 'Fadhil Na\'Im Aimandanu.', 'L', 81.978735359291, 83.506878306878, 'B', 'B', 'SANGAT BAIK'),
(99, 'Faisal Arief Ramdhani', 'L', 74.502018043685, 78.190343915344, 'B', 'B', 'BAIK'),
(100, 'Hilwa Khasanah', 'P', 83.252603672048, 86.063888888889, 'B', 'B', 'SANGAT BAIK'),
(101, 'Javalin Puspa Elvaretta', 'P', 81.477156536879, 82.086111111111, 'B', 'B', 'SANGAT BAIK'),
(102, 'Khairun Nisa', 'P', 80.336886672998, 82.684656084656, 'B', 'B', 'SANGAT BAIK'),
(103, 'Luluk Miftahul Jannah', 'P', 80.167074232352, 84.193650793651, 'B', 'B', 'SANGAT BAIK'),
(104, 'Muhamad Haikal Fikri', 'L', 82.33091563786, 83.462037037037, 'B', 'B', 'SANGAT BAIK'),
(105, 'Muhammad Irham Maulana', 'L', 74.556984013928, 78.680687830688, 'B', 'B', 'BAIK'),
(106, 'Nurizqy Uun Pratama', 'L', 75.419432573599, 78.23082010582, 'B', 'B', 'BAIK'),
(107, 'Riska Dwi Kurniyawati', 'P', 77.838319088319, 82.510846560847, 'B', 'B', 'SANGAT BAIK'),
(108, 'Zahra Azzahwa Asyifa', 'P', 76.261431623932, 81.826455026455, 'B', 'B', 'BAIK'),
(109, 'Siti Fatimah', 'P', 75.727546296296, 77.07037037037, 'B', 'B', 'BAIK'),
(110, 'Aura Niezzaluna', 'P', 77.428189300412, 79.690740740741, 'B', 'B', 'BAIK'),
(111, 'Mutholif Nandha H', 'L', 74.611291152263, 75.997222222222, 'B', 'B', 'BAIK'),
(112, 'Ahmad Maulana', 'L', 78.934387860082, 79.255555555556, 'B', 'B', 'BAIK'),
(113, 'Dafin Sebastian', 'L', 76.307227366255, 79.14537037037, 'B', 'B', 'BAIK'),
(114, 'Adam Hamdani', 'L', 75.509979423868, 77.075, 'B', 'B', 'BAIK'),
(115, 'Aldan Prayoga', 'L', 77.17633744856, 79.578703703704, 'B', 'B', 'BAIK'),
(116, 'Ana Rahmawati', 'P', 80.865200617284, 80.409259259259, 'B', 'B', 'SANGAT BAIK'),
(117, 'Ilham Nur Hidayat', 'L', 90.741563786008, 90.192592592593, 'B', 'B', 'SANGAT BAIK'),
(118, 'M.Farhan Aridho', 'L', 74.067978395062, 76.441666666667, 'B', 'B', 'BAIK'),
(119, 'M.Mutawaqil A', 'L', 88.179861111111, 88.697222222222, 'B', 'B', 'SANGAT BAIK'),
(120, 'M.Wildan Alfan Kusna', 'L', 75.602880658436, 75.780555555556, 'B', 'B', 'BAIK'),
(121, 'Nafisatul Fuadah', 'P', 86.971887860082, 88.043518518519, 'B', 'B', 'SANGAT BAIK'),
(122, 'Najiatun Nangimah', 'P', 79.815329218107, 80.847222222222, 'B', 'B', 'SANGAT BAIK'),
(123, 'Nana Tia Yana', 'P', 76.87962962963, 79.577777777778, 'B', 'B', 'BAIK'),
(124, 'Rendi Setiawan', 'L', 75.325437242798, 78.173148148148, 'B', 'B', 'BAIK'),
(125, 'Rizki Andika', 'L', 75.559130658436, 76.992592592593, 'B', 'B', 'BAIK'),
(126, 'Roif Ramdani Avansyah', 'L', 79.655118312757, 79.955555555556, 'B', 'B', 'BAIK'),
(127, 'Safri Diantoro', 'L', 79.965689300412, 80.627777777778, 'B', 'B', 'BAIK'),
(128, 'Sherly Ramadhani', 'P', 82.525385802469, 80.460185185185, 'B', 'B', 'SANGAT BAIK'),
(129, 'Singgi Yuliati', 'P', 80.817026748971, 83.082407407407, 'B', 'B', 'SANGAT BAIK'),
(130, 'Habib Mustofah', 'L', 74.666666666667, 77.111111111111, 'B', 'B', 'BAIK'),
(131, 'Gama Rizqi Agustya Ambari', 'L', 74.666666666667, 77.333333333333, 'B', 'B', 'BAIK'),
(132, 'Heva Sahra Revana', 'P', 77.888888888889, 80.333333333333, 'B', 'B', 'BAIK'),
(133, 'Mukhamad Yasin', 'L', 76.888888888889, 79, 'B', 'B', 'BAIK'),
(134, 'Abdul Ghani Akmal', 'L', 76.444444444444, 79.888888888889, 'B', 'B', 'BAIK'),
(135, 'Adi Pritama Marvelion', 'L', 76.222222222222, 78.222222222222, 'B', 'B', 'BAIK'),
(136, 'Ahmad Nur Fuad Dimyati', 'L', 78.555555555556, 79.888888888889, 'B', 'B', 'BAIK'),
(137, 'Aji Abu Sahal Rizki', 'L', 82.777777777778, 83.777777777778, 'A', 'B', 'SANGAT BAIK'),
(138, 'Ayu  Zhazhalina Bilkis', 'P', 81.111111111111, 81.555555555556, 'B', 'B', 'SANGAT BAIK'),
(139, 'Chalimatus Sa\'Diyah', 'P', 82.111111111111, 82.666666666667, 'B', 'B', 'SANGAT BAIK'),
(140, 'Chysca Mutti Indriani', 'P', 77, 78.777777777778, 'B', 'B', 'BAIK'),
(141, 'Desi Rahma Wulandari', 'P', 74, 77.333333333333, 'B', 'B', 'BAIK'),
(142, 'Faizzatuz Zahro', 'P', 75.333333333333, 78.666666666667, 'B', 'B', 'BAIK'),
(143, 'Faizul Huda', 'L', 76.333333333333, 79.222222222222, 'B', 'B', 'BAIK'),
(144, 'Fattah Sapto Nugroho', 'L', 73.666666666667, 76, 'B', 'B', 'BAIK'),
(145, 'Fitrotul Khasanah', 'P', 74.777777777778, 77.555555555556, 'B', 'B', 'BAIK'),
(146, 'Hasan Al Syahbani', 'L', 82.555555555556, 83.444444444444, 'B', 'B', 'SANGAT BAIK'),
(147, 'Hildan Ahmad Rafif', 'L', 86.222222222222, 85.444444444444, 'B', 'B', 'SANGAT BAIK'),
(148, 'Husein El Syahbani', 'L', 82.222222222222, 83.333333333333, 'B', 'B', 'SANGAT BAIK'),
(149, 'Ilham Baidililah', 'L', 74.111111111111, 76.555555555556, 'B', 'B', 'BAIK'),
(150, 'Muhammad Faza Khabib', 'L', 84.111111111111, 79, 'B', 'B', 'SANGAT BAIK'),
(151, 'Hamdani Rifa\'i', 'L', 75, 77.111111111111, 'B', 'B', 'BAIK'),
(152, 'Imam Mustaqim Arrifai', 'L', 81.888888888889, 82.666666666667, 'B', 'B', 'SANGAT BAIK'),
(153, 'Indra Saputra', 'L', 77.777777777778, 80, 'B', 'B', 'BAIK'),
(154, 'Linggafasa Nirwan Firdaus', 'L', 94.666666666667, 92.777777777778, 'B', 'B', 'SANGAT BAIK'),
(155, 'Minnurunadifah ', 'P', 74.777777777778, 77.555555555556, 'B', 'B', 'BAIK'),
(156, 'Mirah Karunia', 'P', 81.111111111111, 82.333333333333, 'B', 'B', 'SANGAT BAIK'),
(157, 'Mohamad Fahri Aditya', 'L', 83.111111111111, 85.666666666667, 'B', 'B', 'SANGAT BAIK'),
(158, 'Muhammad Fajar', 'L', 82.888888888889, 84.333333333333, 'B', 'B', 'SANGAT BAIK'),
(159, 'Nabila Rahmat', 'P', 79.777777777778, 81.555555555556, 'B', 'B', 'SANGAT BAIK'),
(160, 'Panti Andromeda Malindo', 'P', 86.111111111111, 88, 'B', 'B', 'SANGAT BAIK'),
(161, 'Pujo Bangkit Sanjaya', 'L', 80, 81.666666666667, 'B', 'B', 'SANGAT BAIK'),
(162, 'Ranu Fikra Hasballah', 'L', 82.888888888889, 84.222222222222, 'B', 'B', 'SANGAT BAIK'),
(163, 'Resty Endah Maulida', 'P', 85.555555555556, 87.555555555556, 'B', 'B', 'SANGAT BAIK'),
(164, 'Sovi Haniah', 'P', 89.444444444444, 89.333333333333, 'B', 'B', 'SANGAT BAIK'),
(165, 'Susilo Pambudi', 'L', 77.777777777778, 79.666666666667, 'B', 'B', 'BAIK'),
(166, 'Syaifur Rohman', 'L', 75, 77.222222222222, 'B', 'B', 'BAIK'),
(167, 'Vahidhatul Husna ', 'P', 78, 79.333333333333, 'B', 'B', 'BAIK'),
(168, 'Zidan Afrianto Romadon', 'L', 75.666666666667, 77.111111111111, 'B', 'B', 'BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dentitas_gauss`
--

CREATE TABLE `dentitas_gauss` (
  `id_gauss` int(11) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `pengetahuan` int(11) NOT NULL,
  `pengetahuan_sb` double NOT NULL,
  `pengetahuan_b` double NOT NULL,
  `ketrampilan` int(11) NOT NULL,
  `ketrampilan_sb` double NOT NULL,
  `ketrampilan_b` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dentitas_gauss`
--

INSERT INTO `dentitas_gauss` (`id_gauss`, `nama_siswa`, `pengetahuan`, `pengetahuan_sb`, `pengetahuan_b`, `ketrampilan`, `ketrampilan_sb`, `ketrampilan_b`) VALUES
(252, NULL, 73, 0.021, 0.141, 78, 0.075, 0.318),
(253, NULL, 82, 0.209, 0.009, 84, 0.231, 0.01),
(254, NULL, 76, 0.067, 0.313, 81, 0.17, 0.167),
(255, NULL, 76, 0.067, 0.313, 79, 0.104, 0.325),
(256, NULL, 82, 0.209, 0.009, 85, 0.229, 0.003),
(257, NULL, 82, 0.209, 0.009, 84, 0.231, 0.01),
(258, NULL, 73, 0.021, 0.141, 78, 0.075, 0.318),
(259, NULL, 76, 0.067, 0.313, 79, 0.104, 0.325),
(260, NULL, 85, 0.204, 0, 85, 0.229, 0.003),
(261, NULL, 84, 0.215, 0.001, 85, 0.229, 0.003),
(262, NULL, 76, 0.067, 0.313, 81, 0.17, 0.167),
(263, NULL, 76, 0.067, 0.313, 80, 0.137, 0.262),
(264, NULL, 77, 0.091, 0.279, 80, 0.137, 0.262),
(265, NULL, 82, 0.209, 0.009, 84, 0.231, 0.01),
(266, NULL, 75, 0.048, 0.29, 78, 0.075, 0.318),
(267, NULL, 83, 0.217, 0.003, 86, 0.214, 0),
(268, NULL, 81, 0.193, 0.026, 82, 0.199, 0.084),
(269, NULL, 80, 0.171, 0.063, 83, 0.221, 0.033),
(270, NULL, 80, 0.171, 0.063, 84, 0.231, 0.01),
(271, NULL, 82, 0.209, 0.009, 83, 0.221, 0.033),
(272, NULL, 75, 0.048, 0.29, 79, 0.104, 0.325),
(273, NULL, 75, 0.048, 0.29, 78, 0.075, 0.318),
(274, NULL, 78, 0.117, 0.206, 83, 0.221, 0.033),
(275, NULL, 76, 0.067, 0.313, 82, 0.199, 0.084),
(276, NULL, 76, 0.067, 0.313, 77, 0.051, 0.244),
(277, NULL, 77, 0.091, 0.279, 80, 0.137, 0.262),
(278, NULL, 75, 0.048, 0.29, 76, 0.032, 0.148),
(279, NULL, 79, 0.145, 0.126, 79, 0.104, 0.325),
(280, NULL, 76, 0.067, 0.313, 79, 0.104, 0.325),
(281, NULL, 76, 0.067, 0.313, 77, 0.051, 0.244),
(282, NULL, 77, 0.091, 0.279, 80, 0.137, 0.262),
(283, NULL, 81, 0.193, 0.026, 80, 0.137, 0.262),
(284, NULL, 91, 0.059, 0, 90, 0.092, 0),
(285, NULL, 74, 0.032, 0.222, 76, 0.032, 0.148),
(286, NULL, 88, 0.134, 0, 89, 0.123, 0),
(287, NULL, 76, 0.067, 0.313, 76, 0.032, 0.148),
(288, NULL, 87, 0.161, 0, 88, 0.157, 0),
(289, NULL, 80, 0.171, 0.063, 81, 0.17, 0.167),
(290, NULL, 77, 0.091, 0.279, 80, 0.137, 0.262),
(291, NULL, 75, 0.048, 0.29, 78, 0.075, 0.318),
(292, NULL, 76, 0.067, 0.313, 77, 0.051, 0.244),
(293, NULL, 80, 0.171, 0.063, 80, 0.137, 0.262),
(294, NULL, 80, 0.171, 0.063, 81, 0.17, 0.167),
(295, NULL, 83, 0.217, 0.003, 80, 0.137, 0.262),
(296, NULL, 81, 0.193, 0.026, 83, 0.221, 0.033),
(297, NULL, 75, 0.048, 0.29, 77, 0.051, 0.244),
(298, NULL, 75, 0.048, 0.29, 77, 0.051, 0.244),
(299, NULL, 78, 0.117, 0.206, 80, 0.137, 0.262),
(300, NULL, 77, 0.091, 0.279, 79, 0.104, 0.325),
(301, NULL, 76, 0.067, 0.313, 80, 0.137, 0.262);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email_guru` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `pengetahuan` int(10) NOT NULL,
  `ketrampilan` int(10) NOT NULL,
  `spiritual` varchar(10) NOT NULL,
  `sosial` varchar(10) NOT NULL,
  `predikat_asli` varchar(20) NOT NULL,
  `predikat_hasil` varchar(20) NOT NULL,
  `nilai_sangatbaik` double NOT NULL,
  `nilai_baik` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `nama_siswa`, `jenkel`, `pengetahuan`, `ketrampilan`, `spiritual`, `sosial`, `predikat_asli`, `predikat_hasil`, `nilai_sangatbaik`, `nilai_baik`) VALUES
(201, 'Muhamad Rizki Julianto', 'L', 73, 78, 'B', 'B', 'BAIK', 'BAIK', 0.000261, 0.017074),
(202, 'Asti Wulan Dari', 'P', 82, 84, 'A', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.001003, 0),
(203, 'Safitri Nuraini', 'P', 76, 81, 'B', 'B', 'BAIK', 'BAIK', 0.00272, 0.009367),
(204, 'Abikara Surya  A A', 'L', 76, 79, 'B', 'B', 'BAIK', 'BAIK', 0.001156, 0.038737),
(205, 'Aca Indah Safira', 'P', 82, 85, 'A', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.000994, 0),
(206, 'Afifah Khoirunnisa', 'P', 82, 84, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.011531, 0.000016),
(207, 'Aira Cahyani', 'P', 73, 78, 'B', 'B', 'BAIK', 'BAIK', 0.000376, 0.008035),
(208, 'Alfiatul Azahra', 'P', 76, 79, 'B', 'B', 'BAIK', 'BAIK', 0.001664, 0.018229),
(209, 'Alma Prihanti', 'P', 85, 85, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.011157, 0),
(210, 'Ana Wahidatul Latifah', 'P', 84, 85, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.011759, 0.000001),
(211, 'Andrean Syarif H', 'L', 76, 81, 'B', 'B', 'BAIK', 'BAIK', 0.00189, 0.019905),
(212, 'Ayu Elsa Apriliya', 'P', 76, 80, 'B', 'B', 'BAIK', 'BAIK', 0.002192, 0.014695),
(213, 'Didik Usmayadi', 'L', 77, 80, 'B', 'B', 'BAIK', 'BAIK', 0.002069, 0.027836),
(214, 'Fadhil Na\'Im Aimandanu.', 'L', 82, 84, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.008013, 0.000034),
(215, 'Faisal Arief Ramdhani', 'L', 75, 78, 'B', 'B', 'BAIK', 'BAIK', 0.000597, 0.035117),
(216, 'Hilwa Khasanah', 'P', 83, 86, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.011091, 0),
(217, 'Javalin Puspa Elvaretta', 'P', 81, 82, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.009173, 0.000391),
(218, 'Khairun Nisa', 'P', 80, 83, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.009026, 0.000373),
(219, 'Luluk Miftahul Jannah', 'P', 80, 84, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.009434, 0.000113),
(220, 'Muhamad Haikal Fikri', 'L', 82, 83, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.007666, 0.000113),
(221, 'Muhammad Irham Maulana', 'L', 75, 79, 'B', 'B', 'BAIK', 'BAIK', 0.000829, 0.03589),
(222, 'Nurizqy Uun Pratama', 'L', 75, 78, 'B', 'B', 'BAIK', 'BAIK', 0.000597, 0.035117),
(223, 'Riska Dwi Kurniyawati', 'P', 78, 83, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.006175, 0.001218),
(224, 'Zahra Azzahwa Asyifa', 'P', 76, 82, 'B', 'B', 'BAIK', 'BAIK', 0.003184, 0.004712),
(225, 'Siti Fatimah', 'P', 76, 77, 'B', 'B', 'BAIK', 'BAIK', 0.000816, 0.013686),
(226, 'Aura Niezzaluna', 'P', 77, 80, 'B', 'B', 'BAIK', 'BAIK', 0.002978, 0.013099),
(227, 'Mutholif Nandha H', 'L', 75, 76, 'B', 'B', 'BAIK', 'BAIK', 0.000255, 0.016344),
(228, 'Ahmad Maulana', 'L', 79, 79, 'B', 'B', 'BAIK', 'BAIK', 0.002503, 0.015594),
(229, 'Dafin Sebastian', 'L', 76, 79, 'B', 'B', 'BAIK', 'BAIK', 0.001156, 0.038737),
(230, 'Adam Hamdani', 'L', 76, 77, 'B', 'B', 'BAIK', 'BAIK', 0.000567, 0.029082),
(231, 'Aldan Prayoga', 'L', 77, 80, 'B', 'B', 'BAIK', 'BAIK', 0.002069, 0.027836),
(232, 'Ana Rahmawati', 'P', 81, 80, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.006315, 0.001221),
(233, 'Ilham Nur Hidayat', 'L', 91, 90, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.000901, 0),
(234, 'M.Farhan Aridho', 'L', 74, 76, 'B', 'B', 'BAIK', 'BAIK', 0.00017, 0.012512),
(235, 'M.Mutawaqil A', 'L', 88, 89, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.002735, 0),
(236, 'M.Wildan Alfan Kusna', 'L', 76, 76, 'B', 'B', 'BAIK', 'BAIK', 0.000356, 0.01764),
(237, 'Nafisatul Fuadah', 'P', 87, 88, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.006037, 0),
(238, 'Najiatun Nangimah', 'P', 80, 81, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.006943, 0.001885),
(239, 'Nana Tia Yana', 'P', 77, 80, 'B', 'B', 'BAIK', 'BAIK', 0.002978, 0.013099),
(240, 'Rendi Setiawan', 'L', 75, 78, 'B', 'B', 'BAIK', 'BAIK', 0.000597, 0.035117),
(241, 'Rizki Andika', 'L', 76, 77, 'B', 'B', 'BAIK', 'BAIK', 0.000567, 0.029082),
(242, 'Roif Ramdani Avansyah', 'L', 80, 80, 'B', 'B', 'BAIK', 'BAIK', 0.003888, 0.006285),
(243, 'Safri Diantoro', 'L', 80, 81, 'B', 'B', 'BAIK', 'SANGAT BAIK', 0.004825, 0.004006),
(244, 'Sherly Ramadhani', 'P', 83, 80, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.0071, 0.000141),
(245, 'Singgi Yuliati', 'P', 81, 83, 'B', 'B', 'SANGAT BAIK', 'SANGAT BAIK', 0.010187, 0.000154),
(246, 'Habib Mustofah', 'L', 75, 77, 'B', 'B', 'BAIK', 'BAIK', 0.000406, 0.026945),
(247, 'Gama Rizqi Agustya Ambari', 'L', 75, 77, 'B', 'B', 'BAIK', 'BAIK', 0.000406, 0.026945),
(248, 'Heva Sahra Revana', 'P', 78, 80, 'B', 'B', 'BAIK', 'BAIK', 0.003828, 0.009672),
(249, 'Mukhamad Yasin', 'L', 77, 79, 'B', 'B', 'BAIK', 'BAIK', 0.001571, 0.034529),
(250, 'Abdul Ghani Akmal', 'L', 76, 80, 'B', 'B', 'BAIK', 'BAIK', 0.001523, 0.031228);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(20) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
(1, 'KI.1', 'Spiritual'),
(2, 'KI.2', 'Sosial'),
(3, 'KI.3', 'Pengetahuan'),
(4, 'KI.4', 'Ketrampilan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `probabilitas_kelas_sb` double DEFAULT NULL,
  `probabilitas_kelas_b` double DEFAULT NULL,
  `jenkel_lsb` double DEFAULT NULL,
  `jenkel_lb` double DEFAULT NULL,
  `jenkel_psb` double DEFAULT NULL,
  `jenkel_pb` double DEFAULT NULL,
  `mean_pengetahuan_sb` double DEFAULT NULL,
  `mean_pengetahuan_b` double DEFAULT NULL,
  `mean_keterampilan_sb` double DEFAULT NULL,
  `mean_keterampilan_b` double DEFAULT NULL,
  `stdev_pengetahuan_sb` double DEFAULT NULL,
  `stdev_pengetahuan_b` double DEFAULT NULL,
  `stdev_keterampilan_sb` double DEFAULT NULL,
  `stdev_keterampilan_b` double DEFAULT NULL,
  `spiritual_asb` double DEFAULT NULL,
  `spiritual_ab` double DEFAULT NULL,
  `spiritual_bsb` double DEFAULT NULL,
  `spiritual_bb` double DEFAULT NULL,
  `sosial_asb` double DEFAULT NULL,
  `sosial_ab` double DEFAULT NULL,
  `sosial_bsb` double DEFAULT NULL,
  `sosial_bb` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uji_akurasi`
--

CREATE TABLE `uji_akurasi` (
  `id_uji` int(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `pengetahuan` int(20) NOT NULL,
  `ketrampilan` int(20) NOT NULL,
  `spiritual` varchar(20) NOT NULL,
  `sosial` varchar(20) NOT NULL,
  `predikat_asli` varchar(20) NOT NULL,
  `predikat_hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uji_akurasi`
--

INSERT INTO `uji_akurasi` (`id_uji`, `nama_siswa`, `jenkel`, `pengetahuan`, `ketrampilan`, `spiritual`, `sosial`, `predikat_asli`, `predikat_hasil`) VALUES
(1, 'Safitri Nuraini', 'P', 76, 81, 'B', 'B', 'BAIK', ''),
(2, 'Abikara Surya  A A', 'L', 76, 79, 'B', 'B', 'BAIK', ''),
(3, 'Aca Indah Safira', 'P', 82, 85, 'A', 'B', 'SANGAT BAIK', ''),
(4, 'Muhamad Rizki Julianto', 'L', 73, 78, 'B', 'B', 'SANGAT BAIK', ''),
(5, 'Asti Wulan Dari', 'P', 82, 84, 'A', 'B', 'SANGAT BAIK', ''),
(6, 'Safitri Nuraini', 'P', 76, 81, 'B', 'B', 'BAIK', ''),
(7, 'Abikara Surya  A A', 'L', 76, 79, 'B', 'B', 'BAIK', ''),
(8, 'Aca Indah Safira', 'P', 82, 85, 'A', 'B', 'SANGAT BAIK', ''),
(9, 'Afifah Khoirunnisa', 'P', 82, 84, 'B', 'B', 'SANGAT BAIK', ''),
(10, 'Aira Cahyani', 'P', 73, 78, 'B', 'B', 'BAIK', ''),
(11, 'Alfiatul Azahra', 'P', 76, 79, 'B', 'B', 'BAIK', ''),
(12, 'Alma Prihanti', 'P', 85, 85, 'B', 'B', 'SANGAT BAIK', ''),
(13, 'Ana Wahidatul Latifah', 'P', 84, 85, 'B', 'B', 'SANGAT BAIK', ''),
(14, 'Andrean Syarif H', 'L', 76, 81, 'B', 'B', 'BAIK', ''),
(15, 'Ayu Elsa Apriliya', 'P', 76, 80, 'B', 'B', 'BAIK', ''),
(16, 'Didik Usmayadi', 'L', 77, 80, 'B', 'B', 'BAIK', ''),
(17, 'Fadhil Na\'Im Aimandanu.', 'L', 82, 84, 'B', 'B', 'SANGAT BAIK', ''),
(18, 'Faisal Arief Ramdhani', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(19, 'Hilwa Khasanah', 'P', 83, 86, 'B', 'B', 'SANGAT BAIK', ''),
(20, 'Javalin Puspa Elvaretta', 'P', 81, 82, 'B', 'B', 'SANGAT BAIK', ''),
(21, 'Khairun Nisa', 'P', 80, 83, 'B', 'B', 'SANGAT BAIK', ''),
(22, 'Luluk Miftahul Jannah', 'P', 80, 84, 'B', 'B', 'SANGAT BAIK', ''),
(23, 'Muhamad Haikal Fikri', 'L', 82, 83, 'B', 'B', 'SANGAT BAIK', ''),
(24, 'Muhammad Irham Maulana', 'L', 75, 79, 'B', 'B', 'BAIK', ''),
(25, 'Nurizqy Uun Pratama', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(26, 'Riska Dwi Kurniyawati', 'P', 78, 83, 'B', 'B', 'SANGAT BAIK', ''),
(27, 'Zahra Azzahwa Asyifa', 'P', 76, 82, 'B', 'B', 'BAIK', ''),
(28, 'Siti Fatimah', 'P', 76, 77, 'B', 'B', 'BAIK', ''),
(29, 'Aura Niezzaluna', 'P', 77, 80, 'B', 'B', 'BAIK', ''),
(30, 'Mutholif Nandha H', 'L', 75, 76, 'B', 'B', 'BAIK', ''),
(31, 'Ahmad Maulana', 'L', 79, 79, 'B', 'B', 'BAIK', ''),
(32, 'Dafin Sebastian', 'L', 76, 79, 'B', 'B', 'BAIK', ''),
(33, 'Adam Hamdani', 'L', 76, 77, 'B', 'B', 'BAIK', ''),
(34, 'Aldan Prayoga', 'L', 77, 80, 'B', 'B', 'BAIK', ''),
(35, 'Ana Rahmawati', 'P', 81, 80, 'B', 'B', 'SANGAT BAIK', ''),
(36, 'Ilham Nur Hidayat', 'L', 91, 90, 'B', 'B', 'SANGAT BAIK', ''),
(37, 'M.Farhan Aridho', 'L', 74, 76, 'B', 'B', 'BAIK', ''),
(38, 'M.Mutawaqil A', 'L', 88, 89, 'B', 'B', 'SANGAT BAIK', ''),
(39, 'M.Wildan Alfan Kusna', 'L', 76, 76, 'B', 'B', 'BAIK', ''),
(40, 'Nafisatul Fuadah', 'P', 87, 88, 'B', 'B', 'SANGAT BAIK', ''),
(41, 'Najiatun Nangimah', 'P', 80, 81, 'B', 'B', 'SANGAT BAIK', ''),
(42, 'Nana Tia Yana', 'P', 77, 80, 'B', 'B', 'BAIK', ''),
(43, 'Rendi Setiawan', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(44, 'Rizki Andika', 'L', 76, 77, 'B', 'B', 'BAIK', ''),
(45, 'Roif Ramdani Avansyah', 'L', 80, 80, 'B', 'B', 'BAIK', ''),
(46, 'Safri Diantoro', 'L', 80, 81, 'B', 'B', 'BAIK', ''),
(47, 'Sherly Ramadhani', 'P', 83, 80, 'B', 'B', 'SANGAT BAIK', ''),
(48, 'Singgi Yuliati', 'P', 81, 83, 'B', 'B', 'SANGAT BAIK', ''),
(49, 'Habib Mustofah', 'L', 75, 77, 'B', 'B', 'BAIK', ''),
(50, 'Gama Rizqi Agustya Ambari', 'L', 75, 77, 'B', 'B', 'BAIK', ''),
(51, 'Heva Sahra Revana', 'P', 78, 80, 'B', 'B', 'BAIK', ''),
(52, 'Mukhamad Yasin', 'L', 77, 79, 'B', 'B', 'BAIK', ''),
(53, 'Abdul Ghani Akmal', 'L', 76, 80, 'B', 'B', 'BAIK', ''),
(54, 'Muhamad Rizki Julianto', 'L', 73, 78, 'B', 'B', 'SANGAT BAIK', ''),
(55, 'Asti Wulan Dari', 'P', 82, 84, 'A', 'B', 'SANGAT BAIK', ''),
(56, 'Safitri Nuraini', 'P', 76, 81, 'B', 'B', 'BAIK', ''),
(57, 'Abikara Surya  A A', 'L', 76, 79, 'B', 'B', 'BAIK', ''),
(58, 'Aca Indah Safira', 'P', 82, 85, 'A', 'B', 'SANGAT BAIK', ''),
(59, 'Afifah Khoirunnisa', 'P', 82, 84, 'B', 'B', 'SANGAT BAIK', ''),
(60, 'Aira Cahyani', 'P', 73, 78, 'B', 'B', 'BAIK', ''),
(61, 'Alfiatul Azahra', 'P', 76, 79, 'B', 'B', 'BAIK', ''),
(62, 'Alma Prihanti', 'P', 85, 85, 'B', 'B', 'SANGAT BAIK', ''),
(63, 'Ana Wahidatul Latifah', 'P', 84, 85, 'B', 'B', 'SANGAT BAIK', ''),
(64, 'Andrean Syarif H', 'L', 76, 81, 'B', 'B', 'BAIK', ''),
(65, 'Ayu Elsa Apriliya', 'P', 76, 80, 'B', 'B', 'BAIK', ''),
(66, 'Didik Usmayadi', 'L', 77, 80, 'B', 'B', 'BAIK', ''),
(67, 'Fadhil Na\'Im Aimandanu.', 'L', 82, 84, 'B', 'B', 'SANGAT BAIK', ''),
(68, 'Faisal Arief Ramdhani', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(69, 'Hilwa Khasanah', 'P', 83, 86, 'B', 'B', 'SANGAT BAIK', ''),
(70, 'Javalin Puspa Elvaretta', 'P', 81, 82, 'B', 'B', 'SANGAT BAIK', ''),
(71, 'Khairun Nisa', 'P', 80, 83, 'B', 'B', 'SANGAT BAIK', ''),
(72, 'Luluk Miftahul Jannah', 'P', 80, 84, 'B', 'B', 'SANGAT BAIK', ''),
(73, 'Muhamad Haikal Fikri', 'L', 82, 83, 'B', 'B', 'SANGAT BAIK', ''),
(74, 'Muhammad Irham Maulana', 'L', 75, 79, 'B', 'B', 'BAIK', ''),
(75, 'Nurizqy Uun Pratama', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(76, 'Riska Dwi Kurniyawati', 'P', 78, 83, 'B', 'B', 'SANGAT BAIK', ''),
(77, 'Zahra Azzahwa Asyifa', 'P', 76, 82, 'B', 'B', 'BAIK', ''),
(78, 'Siti Fatimah', 'P', 76, 77, 'B', 'B', 'BAIK', ''),
(79, 'Aura Niezzaluna', 'P', 77, 80, 'B', 'B', 'BAIK', ''),
(80, 'Mutholif Nandha H', 'L', 75, 76, 'B', 'B', 'BAIK', ''),
(81, 'Ahmad Maulana', 'L', 79, 79, 'B', 'B', 'BAIK', ''),
(82, 'Dafin Sebastian', 'L', 76, 79, 'B', 'B', 'BAIK', ''),
(83, 'Adam Hamdani', 'L', 76, 77, 'B', 'B', 'BAIK', ''),
(84, 'Aldan Prayoga', 'L', 77, 80, 'B', 'B', 'BAIK', ''),
(85, 'Ana Rahmawati', 'P', 81, 80, 'B', 'B', 'SANGAT BAIK', ''),
(86, 'Ilham Nur Hidayat', 'L', 91, 90, 'B', 'B', 'SANGAT BAIK', ''),
(87, 'M.Farhan Aridho', 'L', 74, 76, 'B', 'B', 'BAIK', ''),
(88, 'M.Mutawaqil A', 'L', 88, 89, 'B', 'B', 'SANGAT BAIK', ''),
(89, 'M.Wildan Alfan Kusna', 'L', 76, 76, 'B', 'B', 'BAIK', ''),
(90, 'Nafisatul Fuadah', 'P', 87, 88, 'B', 'B', 'SANGAT BAIK', ''),
(91, 'Najiatun Nangimah', 'P', 80, 81, 'B', 'B', 'SANGAT BAIK', ''),
(92, 'Nana Tia Yana', 'P', 77, 80, 'B', 'B', 'BAIK', ''),
(93, 'Rendi Setiawan', 'L', 75, 78, 'B', 'B', 'BAIK', ''),
(94, 'Rizki Andika', 'L', 76, 77, 'B', 'B', 'BAIK', ''),
(95, 'Roif Ramdani Avansyah', 'L', 80, 80, 'B', 'B', 'BAIK', ''),
(96, 'Safri Diantoro', 'L', 80, 81, 'B', 'B', 'BAIK', ''),
(97, 'Sherly Ramadhani', 'P', 83, 80, 'B', 'B', 'SANGAT BAIK', ''),
(98, 'Singgi Yuliati', 'P', 81, 83, 'B', 'B', 'SANGAT BAIK', ''),
(99, 'Habib Mustofah', 'L', 75, 77, 'B', 'B', 'BAIK', ''),
(100, 'Gama Rizqi Agustya Ambari', 'L', 75, 77, 'B', 'B', 'BAIK', ''),
(101, 'Heva Sahra Revana', 'P', 78, 80, 'B', 'B', 'BAIK', ''),
(102, 'Mukhamad Yasin', 'L', 77, 79, 'B', 'B', 'BAIK', ''),
(103, 'Abdul Ghani Akmal', 'L', 76, 80, 'B', 'B', 'BAIK', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('admin','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Linda Ayuningtyas', 'linda', 'eaf450085c15c3b880c66d0b78f2c041', 'admin'),
(2, 'guru', 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `akurasi`
--
ALTER TABLE `akurasi`
  ADD PRIMARY KEY (`id_akurasi`);

--
-- Indeks untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`id_datasiswa`);

--
-- Indeks untuk tabel `datatesting`
--
ALTER TABLE `datatesting`
  ADD PRIMARY KEY (`id_datatesting`);

--
-- Indeks untuk tabel `datatrining`
--
ALTER TABLE `datatrining`
  ADD PRIMARY KEY (`id_datatrining`);

--
-- Indeks untuk tabel `dentitas_gauss`
--
ALTER TABLE `dentitas_gauss`
  ADD PRIMARY KEY (`id_gauss`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indeks untuk tabel `uji_akurasi`
--
ALTER TABLE `uji_akurasi`
  ADD PRIMARY KEY (`id_uji`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `akurasi`
--
ALTER TABLE `akurasi`
  MODIFY `id_akurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  MODIFY `id_datasiswa` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `datatesting`
--
ALTER TABLE `datatesting`
  MODIFY `id_datatesting` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `datatrining`
--
ALTER TABLE `datatrining`
  MODIFY `id_datatrining` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `dentitas_gauss`
--
ALTER TABLE `dentitas_gauss`
  MODIFY `id_gauss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uji_akurasi`
--
ALTER TABLE `uji_akurasi`
  MODIFY `id_uji` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
