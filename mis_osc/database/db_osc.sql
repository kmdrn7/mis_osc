-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2017 pada 09.40
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_osc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id` int(4) NOT NULL,
  `nrp` int(11) NOT NULL,
  `minggu_ke1` tinyint(1) DEFAULT '0',
  `minggu_ke2` tinyint(1) DEFAULT '0',
  `minggu_ke3` tinyint(1) DEFAULT '0',
  `minggu_ke4` tinyint(1) DEFAULT '0',
  `minggu_ke5` tinyint(1) DEFAULT '0',
  `minggu_ke6` tinyint(1) DEFAULT '0',
  `minggu_ke7` tinyint(1) DEFAULT '0',
  `minggu_ke8` tinyint(1) DEFAULT '0',
  `minggu_ke9` tinyint(1) DEFAULT '0',
  `minggu_ke10` tinyint(1) DEFAULT '0',
  `minggu_ke11` tinyint(1) DEFAULT '0',
  `minggu_ke12` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absensi`
--

INSERT INTO `data_absensi` (`id`, `nrp`, `minggu_ke1`, `minggu_ke2`, `minggu_ke3`, `minggu_ke4`, `minggu_ke5`, `minggu_ke6`, `minggu_ke7`, `minggu_ke8`, `minggu_ke9`, `minggu_ke10`, `minggu_ke11`, `minggu_ke12`) VALUES
(1, 2103161037, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 2103171004, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 2103171028, 1, 1, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(5, 2103171023, 1, 1, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(6, 2103171001, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(7, 2103171025, 1, 1, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(8, 2103171010, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 2103171008, 1, 1, 3, 1, 3, 0, 0, 0, 0, 0, 0, 0),
(10, 2103171007, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 2103171012, 1, 1, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0),
(12, 2103171017, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(13, 2103171016, 1, 1, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0),
(14, 2103171038, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(15, 2103171031, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(16, 2110171031, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(17, 2110171010, 1, 1, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(18, 2110171026, 1, 3, 1, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(19, 2110151002, 1, 3, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 2110151049, 1, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 2110151026, 3, 3, 1, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(22, 2103161055, 1, 1, 3, 1, 3, 0, 0, 0, 0, 0, 0, 0),
(23, 2103161053, 1, 1, 3, 1, 3, 0, 0, 0, 0, 0, 0, 0),
(24, 2103161050, 1, 3, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(25, 2103161031, 3, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(26, 2103161044, 3, 1, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(27, 2103161041, 3, 3, 1, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(28, 2103161020, 1, 1, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(29, 2110161041, 1, 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(30, 2110161042, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 2110161055, 1, 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(32, 2110161056, 3, 3, 1, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(33, 2110161020, 1, 1, 1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(34, 2110161019, 1, 1, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nrp` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nrp`, `nama`, `jenis_kelamin`, `kelas`, `angkatan`) VALUES
(2103161020, 'M Arsyad Amienullah', 'L', 'D3 IT A', 2016),
(2103161031, 'Ayu Lestari', 'P', 'D3 IT B', 2016),
(2103161037, 'Fadhil Yori Hibatullah', 'L', 'D3 IT B', 2016),
(2103161041, 'Stefanus Samuel Ryo', 'L', 'D3 IT B', 2016),
(2103161044, 'Imanuel Ronaldo', 'L', 'D3 IT B', 2016),
(2103161050, 'Okta Athour Rizqi', 'L', 'D3 IT B', 2016),
(2103161053, 'Dwi Bimantara', 'L', 'D3 IT B', 2016),
(2103161055, 'Dafid Ekhwani', 'L', 'D3 IT B', 2016),
(2103171001, 'Muhammad Taufiqurrahman', 'L', 'D3 IT A', 2017),
(2103171004, 'Anas Shofyan Martunis Fateh', 'L', 'D3 IT A', 2017),
(2103171007, 'Adhi Dwi Saputro', 'L', 'D3 IT A', 2017),
(2103171008, 'Rintan Aprilia Pratiwi', 'P', 'D3 IT A', 2017),
(2103171010, 'Annisa Restu Kartika', 'P', 'D3 IT A', 2017),
(2103171012, 'Afina Nadalia', 'P', 'D3 IT A', 2017),
(2103171016, 'Novarita Milianti Putri', 'P', 'D3 IT A', 2017),
(2103171017, 'Familano Widha Manggara P.', 'L', 'D3 IT A', 2017),
(2103171023, 'Moch. Akbar Ilham', 'L', 'D3 IT A', 2017),
(2103171025, 'Winarsih', 'P', 'D3 IT A', 2017),
(2103171028, 'Syahfiar Dhani Anggriawan', 'L', 'D3 IT A', 2017),
(2103171031, 'Afauddin Juhda Azmi', 'L', 'D3 IT B', 2017),
(2103171038, 'Rizki Dwi Lestari', 'P', 'D3 IT B', 2017),
(2110151002, 'Misbahul Ardani', 'L', 'D4 IT A', 2015),
(2110151026, 'Ahmada Yusril Kadipta', 'L', 'D4 IT A', 2015),
(2110151049, 'Ainun Abdullah', 'L', 'D4 IT B', 2015),
(2110161019, 'Fatkul Nur Koirudin', 'L', 'D4 IT A', 2016),
(2110161020, 'Muhammad Fadli Farham', 'L', 'D4 IT A', 2016),
(2110161041, 'Citra Azizah Dewi', 'P', 'D4 IT B', 2016),
(2110161042, 'Dufan Quraish Shihab', 'L', 'D4 IT B', 2016),
(2110161055, 'Ihda Rasyada', 'P', 'D4 IT B', 2016),
(2110161056, 'Ennobel Putra Indra Prakoso', 'L', 'D4 IT B', 2016),
(2110171010, 'Ahmad Jarir At Thobari', 'L', 'D4 IT A', 2017),
(2110171026, 'Astin Izzah Candrawati', 'P', 'D4 IT A', 2017),
(2110171031, 'Andika Ahmad Ramadhan', 'L', 'D4 IT B', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tambahan`
--

CREATE TABLE `data_tambahan` (
  `id_plus` int(4) NOT NULL,
  `minggu_ke` int(3) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tambahan`
--

INSERT INTO `data_tambahan` (`id_plus`, `minggu_ke`, `tanggal`) VALUES
(1, 1, '2017-09-27'),
(2, 2, '2017-10-04'),
(3, 3, '2017-10-11'),
(4, 4, '2017-10-18'),
(5, 5, '2017-10-25'),
(6, 6, '2017-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_auth_user`
--

CREATE TABLE `tbl_auth_user` (
  `user_id` varchar(10) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_level` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_auth_user`
--

INSERT INTO `tbl_auth_user` (`user_id`, `user_password`, `user_name`, `user_email`, `user_level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@root.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD PRIMARY KEY (`id`,`nrp`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `data_tambahan`
--
ALTER TABLE `data_tambahan`
  ADD PRIMARY KEY (`id_plus`);

--
-- Indexes for table `tbl_auth_user`
--
ALTER TABLE `tbl_auth_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `data_tambahan`
--
ALTER TABLE `data_tambahan`
  MODIFY `id_plus` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
