-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11 Okt 2018 pada 00.46
-- Versi Server: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undtes2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ajar_dosen_lb`
--

CREATE TABLE `tbl_ajar_dosen_lb` (
  `id_ajar_dosen_lb` int(11) NOT NULL,
  `id_dosen_lb` int(11) DEFAULT NULL,
  `id_kls_siakad` int(11) DEFAULT NULL,
  `sks_subst_tot` varchar(11) DEFAULT NULL,
  `sks_tm_subst` varchar(11) DEFAULT NULL,
  `sks_prak_subst` varchar(11) DEFAULT NULL,
  `sks_prak_lap_subst` varchar(11) DEFAULT NULL,
  `sks_sim_subst` varchar(11) DEFAULT NULL,
  `jml_tm_renc` varchar(11) DEFAULT NULL,
  `jml_tm_real` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen_lb`
--

CREATE TABLE `tbl_dosen_lb` (
  `id_dosen_lb` int(11) NOT NULL,
  `nm_dsn_lb` varchar(114) DEFAULT NULL,
  `nik_dsn_lb` varchar(114) DEFAULT NULL,
  `noreg_dsn_lb` varchar(20) DEFAULT NULL,
  `alamat_lb` varchar(114) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `jk_dsn_lb` varchar(10) DEFAULT NULL,
  `email_dsn_lb` varchar(114) DEFAULT NULL,
  `no_hp_dsn_lb` varchar(25) DEFAULT NULL,
  `tmpt_lhr_dsn_lb` varchar(20) DEFAULT NULL,
  `tgl_lhr_dsn_lb` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_dosen_lb`
--

INSERT INTO `tbl_dosen_lb` (`id_dosen_lb`, `nm_dsn_lb`, `nik_dsn_lb`, `noreg_dsn_lb`, `alamat_lb`, `id_agama`, `jk_dsn_lb`, `email_dsn_lb`, `no_hp_dsn_lb`, `tmpt_lhr_dsn_lb`, `tgl_lhr_dsn_lb`) VALUES
(1, 'Reza Rafiq MZ', NULL, '00000001', 'Jalan Sultan Hasanuddin No 26 bauabu, Sulawesi Tenggara', 1, 'l', 'rezarafiqmz@gmail.com', '082395606666', 'Baubau', '1993-12-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen_lb_pt`
--

CREATE TABLE `tbl_dosen_lb_pt` (
  `id_dosen_lb_pt` int(11) NOT NULL,
  `id_dosen_lb` int(11) NOT NULL,
  `id_sms` varchar(114) NOT NULL,
  `no_srt_tgs` varchar(11) DEFAULT NULL,
  `tgl_srt_tgs` varchar(11) DEFAULT NULL,
  `tmt_srt_tgs` varchar(11) DEFAULT NULL,
  `id_thn_ajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_dosen_lb_pt`
--

INSERT INTO `tbl_dosen_lb_pt` (`id_dosen_lb_pt`, `id_dosen_lb`, `id_sms`, `no_srt_tgs`, `tgl_srt_tgs`, `tmt_srt_tgs`, `id_thn_ajaran`) VALUES
(1, 1, '3ed4f133-036b-4b31-bb78-5bcb672824a3', '1231241541', '2018-01-12', '2018-06-12', 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ajar_dosen_lb`
--
ALTER TABLE `tbl_ajar_dosen_lb`
  ADD PRIMARY KEY (`id_ajar_dosen_lb`);

--
-- Indexes for table `tbl_dosen_lb`
--
ALTER TABLE `tbl_dosen_lb`
  ADD PRIMARY KEY (`id_dosen_lb`);

--
-- Indexes for table `tbl_dosen_lb_pt`
--
ALTER TABLE `tbl_dosen_lb_pt`
  ADD PRIMARY KEY (`id_dosen_lb_pt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ajar_dosen_lb`
--
ALTER TABLE `tbl_ajar_dosen_lb`
  MODIFY `id_ajar_dosen_lb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dosen_lb`
--
ALTER TABLE `tbl_dosen_lb`
  MODIFY `id_dosen_lb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dosen_lb_pt`
--
ALTER TABLE `tbl_dosen_lb_pt`
  MODIFY `id_dosen_lb_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
