-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Agu 2020 pada 13.37
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_alternatif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode`, `nama_alternatif`) VALUES
(1, 'J1', 'MIA'),
(2, 'J2', 'IIS'),
(3, 'J3', 'Bahasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nisn`, `nama`, `tpt_lahir`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `tahun`, `status`) VALUES
('5878', 'ADZKIYAH HAIBATUL ULYA', 'Lamongan', '23-04-2004', 'Paciran Lamongan', 'Perempuan', 2019, 'Aktif'),
('5888', 'CINDI AULIA SILVIANINGSIH', 'Gresik', '28-03-2004', 'Mojopetung Dukun Gresik', 'Perempuan', 2019, 'Aktif'),
('5895', 'EKA NURIA FIRDAUSI', 'Tuban', '04-09-2003', 'Karang Semanding Tuban', 'Perempuan', 2019, 'Aktif'),
('5897', 'EPI RARA ARDIYANTI', 'Jepara', '09-05-2004', 'Gowah Blimbing Paciran Lamongan', 'Perempuan', 2019, 'Aktif'),
('5899', 'FARAH ADILAH HASAN', 'Gresik', '05-09-2003', 'Boboh Menganti Gresik', 'Perempuan', 2019, 'Aktif'),
('5905', 'HAFRIDA NAKHMAH', 'Lamongan', '01-06-2004', 'Gisik Laren Lamongan ', 'Perempuan', 2019, 'Aktif'),
('5908', 'INDAH FAJRIYAH AGUSTINA', 'Lamongan', '21-08-2004', 'Takerharjo Solokuro Lamongan', 'Perempuan', 2019, 'Aktif'),
('5911', 'ISMI NUR FAIZAH', 'Lamongan', '07-01-2004', 'Brengkok Brondong Lamongan', 'Perempuan', 2019, 'Aktif'),
('5913', 'LAILATUL FARIHAH', 'Gresik', '15-09-2003', 'Ketanen Panceng Gresik', 'Perempuan', 2019, 'Aktif'),
('5914', 'LAILATUS SHOFIYAH', 'Lamongan', '01-01-2004', 'Kranji Paciran Lamongan', 'Perempuan', 2019, 'Aktif'),
('5920', 'AAM FATHI MUFLI', 'TUBAN', '29-09-2003', 'TAMBAKBOYO TUBAN', 'Laki - Laki', 2019, 'Aktif'),
('5922', 'AHMAD FATHON FEBRIANTO', 'LAMONGAN', '14-02-2004', 'WARUKULON PUCUK LAMONGAN', 'Laki - Laki', 2019, 'Aktif'),
('5923', 'AKHMAD CHAERUL ALVI', 'Lamongan', '04-05-2003', 'Sidokumpul Blimbing Paciran', 'Laki - Laki', 2019, 'Aktif'),
('5924', 'AMIRUL HAQ AL AMIN ', 'Lamongan', '26-03-2004', 'WEDUNG SEDAYULAWAS BRONDONG LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5925', 'ANANDA HAYKAL AN NAJMY', 'BANGKALAN ', '21-03-2004', 'BANGKALAN MADURA ', 'Laki - Laki', 2019, 'Aktif'),
('5926', 'ARZAK NAZAKA ', 'Lamongan', '12-10-2003', 'KALEN KEDUNGPRING LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5928', 'DANDI GUMELAR ', 'Jakarta', '22-12-2002', 'SUSUKAN CIRALAS DKI JAKARTA', 'Laki - Laki', 2019, 'Aktif'),
('5929', 'DIMAS ALTAF AQILAH ', 'Lamongan', '28-12-2003', 'LEMBOR LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5930', 'FARREL ARIEFANDY RADHIA HAQQY ', 'Lamongan', '10-07-2004', ' TAKERHARJO SOLOKURO LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5931', 'FARUQ HIBATULLAHI AKBAR ', 'Gresik', '13-11-2003', ' LEBANISUKO WRINGINANOM GRESIK', 'Laki - Laki', 2019, 'Aktif'),
('5933', 'KHOIRUR ROZIQ ', 'Lamongan', '14-06-2004', 'WERU PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5934', 'LABIB UBAIDILLAH ', 'Tuban', '12-12-2003', 'SOCOREJO JENU TUBAN ', 'Laki - Laki', 2019, 'Aktif'),
('5935', 'M. KHAIDAR ALI WAKHID', 'Lamongan', '01-06-2004', 'GEDANGAN MADURA LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5936', 'MOHAMMAD ANNAS ADNAN ', 'Gresik', '09-09-2009', 'MOJOPETUNG DUKUN GRESIK ', 'Laki - Laki', 2019, 'Aktif'),
('5937', 'RAIHANUL MUTTAQIN', 'Bangkalan', '23-05-2003', 'BLATER KWANYAR BANGKALAN', 'Laki - Laki', 2019, 'Aktif'),
('5938', 'GERY RABBANI ', 'Lamongan', '13-03-2004', 'KELAYAR SIDOKELAR PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5939', 'MUHAMMAD ENDY WAHYU ROMADHON', 'Lamongan', '02-11-2004', 'BLIMBING PACIRAN LAMONGAN', 'Laki - Laki', 2019, 'Aktif'),
('5940', 'RIFKY ADITYA SURYANTO', 'Balikpapan', '06-08-2004', 'BATU AMPAR BALIKPAPAN KALTIM', 'Laki - Laki', 2019, 'Aktif'),
('5941', 'AGUNG PRAWIRO', 'Lamongan', '22-05-2004', 'CUMPLENG BRONDONG LAMONGAN', 'Laki - Laki', 2019, 'Aktif'),
('5942', 'MOHAMMAD KHARIS FATHONI', 'LAMONGAN', '14-09-2004', 'JUGU LAMONGAN', 'Laki - Laki', 2019, 'Aktif'),
('5949', 'NADIA SOFIE SABELLA ', 'Lamongan', '30-06-2003', 'SIDOKUMPUL BLIMBING PACIRAN LAMONGAN ', 'Perempuan', 2019, 'Aktif'),
('5950', 'NANDA RIF''ATUL AZIMAH', 'Lamongan', '06-02-2004', 'TAKERHARJO SOLOKURO LAMONGAN', 'Perempuan', 2019, 'Aktif'),
('5951', 'NAURAH DWI ANJANI ', 'LAMONGAN', '11-05-2004', 'PACIRAN LAMONGAN', 'Perempuan', 2019, 'Aktif'),
('5953', 'NAZHATUL HAYATI', 'Gresik', '23-12-2003', 'SAMBOGUNUNG DUKUN GRESIK', 'Perempuan', 2019, 'Aktif'),
('5954', 'NUR LAILATUS SA''ADAH', 'Bojonegoro', '06-10-2004', 'NGRANDU KEDUNGADEM BOJONEGORO', 'Perempuan', 2019, 'Aktif'),
('5955', 'NURUL IZZAH', 'Lamongan', '01-03-2004', 'WEDUNG SEDAYULAWAS BRONDONG LAMONGAN ', 'Perempuan', 2019, 'Aktif'),
('5956', 'NAJWA CAHYA AGUSTINA ASSHODIQI', 'GRESIK ', '12-08-2004', 'PANTENAN PANCENG GRESIK ', 'Perempuan', 2019, 'Aktif'),
('5958', 'RONIYAH PRATISTA ANDANITYA ', 'Tuban', '02-08-2003', 'BULU BANJARJO BANCAR TUBAN ', 'Perempuan', 2019, 'Aktif'),
('5962', 'AHMAL HAIKAL MUBAROK', 'Surabaya', '23-06-2004', 'PANDIGILING TENGAH SURABAYA', 'Laki - Laki', 2019, 'Aktif'),
('5964', 'RANDY DAVA FAHREZA', 'Bogor', '01-10-2004', 'BANJAR ANYAR PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5965', 'M KHAFID GHOZALI ', 'Tuban', '27-04-2004', 'BINANGUN BANCAR TUBAN ', 'Laki - Laki', 2019, 'Aktif'),
('5966', 'MUHAMMAD KHISBUL MAULANANA', 'Lamongan', '17-02-2005', 'PELANGWOT LAREN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5967', 'SYIFAUL BI''MA KHOLIS ', 'Lamongan', '30-07-2004', 'BLIMBING PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5968', 'AHMAD FALIQUL ISBAH ', 'Lamongan', '05-08-2004', 'PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5969', 'MUHAMMAD ANDI SETIAWATI', 'Lamongan', '31-01-2004', 'PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5970', 'ADIB RIZALUDDIN', 'Lamongan', '08-08-2003', 'KARANG TAWAR LAREN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5972', 'AFFAT WIRA YOGA', 'Lamongan', '03-07-2004', 'KARANG TAWAR LAREN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif'),
('5973', 'HAIKAL AZHARI FAILISSUFI', 'Gresik', '01-09-2004', ' WOTAN PANCENG GRESIK ', 'Laki - Laki', 2019, 'Aktif'),
('9561', 'SYAHRIL MUHAMMAD ABDUH', 'Lamongan', '17-04-2004', 'DENGOK KANDANG SEMANGKON PACIRAN LAMONGAN', 'Laki - Laki', 2019, 'Aktif'),
('9563', 'DIMAS ADI SURYA', 'Lamongan', '03-05-2004', 'BANJAR ANYAR PACIRAN LAMONGAN ', 'Laki - Laki', 2019, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `hasil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `nisn`, `hasil`) VALUES
(1, '5878', '\r\n                    MIA'),
(2, '5888', '\r\n                    MIA'),
(3, '5895', '\r\n                    Bahasa'),
(4, '5897', '\r\n                    MIA'),
(5, '5899', '\r\n                    IIS'),
(6, '5905', '\r\n                    MIA'),
(7, '5908', '\r\n                    MIA'),
(8, '5911', '\r\n                    MIA'),
(9, '5913', '\r\n                    IIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(11) NOT NULL,
  `id_alternatif` varchar(20) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `bobot` varchar(5) NOT NULL,
  `normalisasi_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `id_alternatif`, `nama_kriteria`, `jenis`, `bobot`, `normalisasi_bobot`) VALUES
(1, 'C1', '1', 'IPA (Test)', 'Benefit', '5', 0.3125),
(3, 'C5', '2', 'IPS (Test)', 'Benefit', '5', 0.625),
(4, 'C6', '2', 'IPS (Rapor)', 'Benefit', '3', 0.375),
(8, 'C2', '1', 'Matematika (Test)', 'Benefit', '5', 0.3125),
(12, 'C3', '1', 'IPA (Rapor)', 'Benefit', '3', 0.1875),
(13, 'C4', '1', 'Matematika (Raport)', 'Benefit', '3', 0.1875),
(15, 'C7', '3', 'B. Indonesia (Test)', 'Benefit', '5', 0.3125),
(16, 'C8', '3', 'B. Inggris (Test)', 'Benefit', '5', 0.3125),
(17, 'C9', '3', 'B. Indonesia (Rapor)', 'Benefit', '3', 0.1875),
(18, 'C10', '3', 'B. Inggris (Rapor)', 'Benefit', '3', 0.1875);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `image`, `password`, `level`, `date_created`) VALUES
(6, 'Nadhiful Qolby', 'nadhiful46@gmail.com', 'IMG_20170802_162614_HDR.jpg', '$2y$10$lFOtBD5c7q5lX8R7kFGF4.CARZusw95DrxCmLzAy7sSWVCx.9P2tS', 'Panitia', 1584936010),
(8, 'Spongebob Squarepants', 'admin@gmail.com', 'IMG_20170204_164502.jpg', '$2y$10$Q5cyVOJ8NMkdlG8y7D2gtu0x6xeVfhBl2PWNb1IfNgR9ISRXdC6MO', 'Panitia', 1584949269),
(9, 'Kepala Sekolah', 'kepala@gmail.com', 'default.jpg', '$2y$10$SCC9GT4KF87bcM0dxp5DHus2cthuzT5UBnxxpaKnOUB5EWFxVAUkS', 'Panitia', 1588395484),
(10, 'iful', 'iful@gmail.com', 'default.jpg', '$2y$10$7CxCTaw.A.xwuJWXhWMEg.zrS1Pl4PGW9TOdOI/YmUul7Fkm45EO6', 'Panitia', 1597825540),
(11, 'Nadhiful Q', 'nadhiful14@gmail.com', 'default.jpg', '$2y$10$pS6l4VOeWW66P0IxEuTaRu9uJvcraXb2judaTasMzjk/5pXkPp2PW', 'Panitia', 1598009816);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `alternatif` int(11) DEFAULT NULL,
  `kriteria` int(11) DEFAULT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nisn`, `alternatif`, `kriteria`, `nilai`) VALUES
(138, '5878', 1, 1, 70),
(139, '5878', 2, 3, 70),
(140, '5878', 2, 4, 85),
(141, '5878', 1, 8, 70),
(142, '5878', 1, 12, 89),
(143, '5878', 1, 13, 85),
(144, '5878', 3, 15, 40),
(145, '5878', 3, 16, 70),
(146, '5878', 3, 17, 85),
(147, '5878', 3, 18, 79),
(148, '5888', 1, 1, 70),
(149, '5888', 2, 3, 30),
(150, '5888', 2, 4, 86),
(151, '5888', 1, 8, 60),
(152, '5888', 1, 12, 90),
(153, '5888', 1, 13, 79),
(154, '5888', 3, 15, 10),
(155, '5888', 3, 16, 30),
(156, '5888', 3, 17, 80),
(157, '5888', 3, 18, 78),
(158, '5895', 1, 1, 30),
(159, '5895', 2, 3, 40),
(160, '5895', 2, 4, 80),
(161, '5895', 1, 8, 50),
(162, '5895', 1, 12, 87),
(163, '5895', 1, 13, 83),
(164, '5895', 3, 15, 40),
(165, '5895', 3, 16, 50),
(166, '5895', 3, 17, 82),
(167, '5895', 3, 18, 79),
(168, '5897', 1, 1, 80),
(169, '5897', 2, 3, 50),
(170, '5897', 2, 4, 92),
(171, '5897', 1, 8, 70),
(172, '5897', 1, 12, 88),
(173, '5897', 1, 13, 87),
(174, '5897', 3, 15, 60),
(175, '5897', 3, 16, 50),
(176, '5897', 3, 17, 87),
(177, '5897', 3, 18, 80),
(178, '5899', 1, 1, 70),
(179, '5899', 2, 3, 60),
(180, '5899', 2, 4, 84),
(181, '5899', 1, 8, 40),
(182, '5899', 1, 12, 91),
(183, '5899', 1, 13, 83),
(184, '5899', 3, 15, 40),
(185, '5899', 3, 16, 60),
(186, '5899', 3, 17, 83),
(187, '5899', 3, 18, 83),
(188, '5905', 1, 1, 70),
(189, '5905', 2, 3, 60),
(190, '5905', 2, 4, 88),
(191, '5905', 1, 8, 60),
(192, '5905', 1, 12, 86),
(193, '5905', 1, 13, 88),
(194, '5905', 3, 15, 30),
(195, '5905', 3, 16, 40),
(196, '5905', 3, 17, 85),
(197, '5905', 3, 18, 79),
(198, '5908', 1, 1, 60),
(199, '5908', 2, 3, 40),
(200, '5908', 2, 4, 90),
(201, '5908', 1, 8, 70),
(202, '5908', 1, 12, 80),
(203, '5908', 1, 13, 79),
(204, '5908', 3, 15, 60),
(205, '5908', 3, 16, 60),
(206, '5908', 3, 17, 80),
(207, '5908', 3, 18, 90),
(208, '5911', 1, 1, 60),
(209, '5911', 2, 3, 50),
(210, '5911', 2, 4, 81),
(211, '5911', 1, 8, 60),
(212, '5911', 1, 12, 81),
(213, '5911', 1, 13, 80),
(214, '5911', 3, 15, 40),
(215, '5911', 3, 16, 20),
(216, '5911', 3, 17, 96),
(217, '5911', 3, 18, 80),
(218, '5913', 1, 1, 60),
(219, '5913', 2, 3, 60),
(220, '5913', 2, 4, 86),
(221, '5913', 1, 8, 30),
(222, '5913', 1, 12, 88),
(223, '5913', 1, 13, 78),
(224, '5913', 3, 15, 60),
(225, '5913', 3, 16, 20),
(226, '5913', 3, 17, 90),
(227, '5913', 3, 18, 78),
(228, '5914', 1, 1, 70),
(229, '5914', 2, 3, 60),
(230, '5914', 2, 4, 82),
(231, '5914', 1, 8, 60),
(232, '5914', 1, 12, 86),
(233, '5914', 1, 13, 81),
(234, '5914', 3, 15, 50),
(235, '5914', 3, 16, 40),
(236, '5914', 3, 17, 90),
(237, '5914', 3, 18, 81),
(258, '5920', 1, 1, 30),
(259, '5920', 2, 3, 50),
(260, '5920', 2, 4, 87),
(261, '5920', 1, 8, 60),
(262, '5920', 1, 12, 80),
(263, '5920', 1, 13, 82),
(264, '5920', 3, 15, 40),
(265, '5920', 3, 16, 50),
(266, '5920', 3, 17, 84),
(267, '5920', 3, 18, 77),
(268, '5922', 1, 1, 50),
(269, '5922', 2, 3, 60),
(270, '5922', 2, 4, 85),
(271, '5922', 1, 8, 80),
(272, '5922', 1, 12, 89),
(273, '5922', 1, 13, 85),
(274, '5922', 3, 15, 50),
(275, '5922', 3, 16, 40),
(276, '5922', 3, 17, 85),
(277, '5922', 3, 18, 79),
(278, '5923', 1, 1, 40),
(279, '5923', 2, 3, 60),
(280, '5923', 2, 4, 84),
(281, '5923', 1, 8, 70),
(282, '5923', 1, 12, 90),
(283, '5923', 1, 13, 84),
(284, '5923', 3, 15, 60),
(285, '5923', 3, 16, 60),
(286, '5923', 3, 17, 90),
(287, '5923', 3, 18, 80),
(288, '5924', 1, 1, 40),
(289, '5924', 2, 3, 70),
(290, '5924', 2, 4, 90),
(291, '5924', 1, 8, 20),
(292, '5924', 1, 12, 88),
(293, '5924', 1, 13, 82),
(294, '5924', 3, 15, 30),
(295, '5924', 3, 16, 40),
(296, '5924', 3, 17, 80),
(297, '5924', 3, 18, 76),
(298, '5925', 1, 1, 40),
(299, '5925', 2, 3, 30),
(300, '5925', 2, 4, 80),
(301, '5925', 1, 8, 60),
(302, '5925', 1, 12, 86),
(303, '5925', 1, 13, 83),
(304, '5925', 3, 15, 40),
(305, '5925', 3, 16, 20),
(306, '5925', 3, 17, 83),
(307, '5925', 3, 18, 78),
(308, '5926', 1, 1, 20),
(309, '5926', 2, 3, 50),
(310, '5926', 2, 4, 82),
(311, '5926', 1, 8, 20),
(312, '5926', 1, 12, 91),
(313, '5926', 1, 13, 76),
(314, '5926', 3, 15, 30),
(315, '5926', 3, 16, 70),
(316, '5926', 3, 17, 89),
(317, '5926', 3, 18, 78),
(318, '5928', 1, 1, 70),
(319, '5928', 2, 3, 60),
(320, '5928', 2, 4, 82),
(321, '5928', 1, 8, 50),
(322, '5928', 1, 12, 88),
(323, '5928', 1, 13, 85),
(324, '5928', 3, 15, 50),
(325, '5928', 3, 16, 30),
(326, '5928', 3, 17, 85),
(327, '5928', 3, 18, 82),
(328, '5929', 1, 1, 70),
(329, '5929', 2, 3, 50),
(330, '5929', 2, 4, 93),
(331, '5929', 1, 8, 50),
(332, '5929', 1, 12, 88),
(333, '5929', 1, 13, 80),
(334, '5929', 3, 15, 30),
(335, '5929', 3, 16, 30),
(336, '5929', 3, 17, 86),
(337, '5929', 3, 18, 81),
(338, '5930', 1, 1, 40),
(339, '5930', 2, 3, 70),
(340, '5930', 2, 4, 86),
(341, '5930', 1, 8, 50),
(342, '5930', 1, 12, 90),
(343, '5930', 1, 13, 79),
(344, '5930', 3, 15, 60),
(345, '5930', 3, 16, 70),
(346, '5930', 3, 17, 80),
(347, '5930', 3, 18, 78),
(348, '5931', 1, 1, 70),
(349, '5931', 2, 3, 40),
(350, '5931', 2, 4, 86),
(351, '5931', 1, 8, 40),
(352, '5931', 1, 12, 82),
(353, '5931', 1, 13, 77),
(354, '5931', 3, 15, 20),
(355, '5931', 3, 16, 30),
(356, '5931', 3, 17, 88),
(357, '5931', 3, 18, 85),
(358, '5933', 1, 1, 40),
(359, '5933', 2, 3, 60),
(360, '5933', 2, 4, 86),
(361, '5933', 1, 8, 20),
(362, '5933', 1, 12, 86),
(363, '5933', 1, 13, 78),
(364, '5933', 3, 15, 70),
(365, '5933', 3, 16, 60),
(366, '5933', 3, 17, 90),
(367, '5933', 3, 18, 85),
(368, '5934', 1, 1, 20),
(369, '5934', 2, 3, 60),
(370, '5934', 2, 4, 91),
(371, '5934', 1, 8, 30),
(372, '5934', 1, 12, 87),
(373, '5934', 1, 13, 82),
(374, '5934', 3, 15, 20),
(375, '5934', 3, 16, 50),
(376, '5934', 3, 17, 90),
(377, '5934', 3, 18, 82),
(378, '5935', 1, 1, 40),
(379, '5935', 2, 3, 50),
(380, '5935', 2, 4, 80),
(381, '5935', 1, 8, 30),
(382, '5935', 1, 12, 87),
(383, '5935', 1, 13, 83),
(384, '5935', 3, 15, 60),
(385, '5935', 3, 16, 40),
(386, '5935', 3, 17, 82),
(387, '5935', 3, 18, 79),
(388, '5936', 1, 1, 80),
(389, '5936', 2, 3, 60),
(390, '5936', 2, 4, 78),
(391, '5936', 1, 8, 70),
(392, '5936', 1, 12, 84),
(393, '5936', 1, 13, 79),
(394, '5936', 3, 15, 30),
(395, '5936', 3, 16, 40),
(396, '5936', 3, 17, 86),
(397, '5936', 3, 18, 80),
(398, '5937', 1, 1, 40),
(399, '5937', 2, 3, 60),
(400, '5937', 2, 4, 92),
(401, '5937', 1, 8, 40),
(402, '5937', 1, 12, 88),
(403, '5937', 1, 13, 87),
(404, '5937', 3, 15, 40),
(405, '5937', 3, 16, 60),
(406, '5937', 3, 17, 87),
(407, '5937', 3, 18, 80),
(408, '5938', 1, 1, 80),
(409, '5938', 2, 3, 60),
(410, '5938', 2, 4, 79),
(411, '5938', 1, 8, 70),
(412, '5938', 1, 12, 90),
(413, '5938', 1, 13, 80),
(414, '5938', 3, 15, 40),
(415, '5938', 3, 16, 60),
(416, '5938', 3, 17, 87),
(417, '5938', 3, 18, 76),
(418, '5939', 1, 1, 40),
(419, '5939', 2, 3, 90),
(420, '5939', 2, 4, 76),
(421, '5939', 1, 8, 50),
(422, '5939', 1, 12, 80),
(423, '5939', 1, 13, 79),
(424, '5939', 3, 15, 30),
(425, '5939', 3, 16, 60),
(426, '5939', 3, 17, 84),
(427, '5939', 3, 18, 76),
(438, '5940', 1, 1, 70),
(439, '5940', 2, 3, 50),
(440, '5940', 2, 4, 82),
(441, '5940', 1, 8, 50),
(442, '5940', 1, 12, 83),
(443, '5940', 1, 13, 77),
(444, '5940', 3, 15, 30),
(445, '5940', 3, 16, 30),
(446, '5940', 3, 17, 80),
(447, '5940', 3, 18, 88),
(448, '5941', 1, 1, 10),
(449, '5941', 2, 3, 20),
(450, '5941', 2, 4, 90),
(451, '5941', 1, 8, 70),
(452, '5941', 1, 12, 89),
(453, '5941', 1, 13, 78),
(454, '5941', 3, 15, 10),
(455, '5941', 3, 16, 30),
(456, '5941', 3, 17, 84),
(457, '5941', 3, 18, 82),
(458, '5942', 1, 1, 30),
(459, '5942', 2, 3, 60),
(460, '5942', 2, 4, 95),
(461, '5942', 1, 8, 60),
(462, '5942', 1, 12, 85),
(463, '5942', 1, 13, 82),
(464, '5942', 3, 15, 40),
(465, '5942', 3, 16, 20),
(466, '5942', 3, 17, 82),
(467, '5942', 3, 18, 84),
(468, '5949', 1, 1, 70),
(469, '5949', 2, 3, 60),
(470, '5949', 2, 4, 85),
(471, '5949', 1, 8, 50),
(472, '5949', 1, 12, 84),
(473, '5949', 1, 13, 84),
(474, '5949', 3, 15, 30),
(475, '5949', 3, 16, 40),
(476, '5949', 3, 17, 83),
(477, '5949', 3, 18, 88),
(478, '5950', 1, 1, 70),
(479, '5950', 2, 3, 30),
(480, '5950', 2, 4, 88),
(481, '5950', 1, 8, 50),
(482, '5950', 1, 12, 80),
(483, '5950', 1, 13, 76),
(484, '5950', 3, 15, 40),
(485, '5950', 3, 16, 30),
(486, '5950', 3, 17, 86),
(487, '5950', 3, 18, 84),
(488, '5951', 1, 1, 80),
(489, '5951', 2, 3, 80),
(490, '5951', 2, 4, 80),
(491, '5951', 1, 8, 50),
(492, '5951', 1, 12, 80),
(493, '5951', 1, 13, 80),
(494, '5951', 3, 15, 50),
(495, '5951', 3, 16, 90),
(496, '5951', 3, 17, 89),
(497, '5951', 3, 18, 84),
(498, '5953', 1, 1, 80),
(499, '5953', 2, 3, 70),
(500, '5953', 2, 4, 86),
(501, '5953', 1, 8, 60),
(502, '5953', 1, 12, 80),
(503, '5953', 1, 13, 78),
(504, '5953', 3, 15, 50),
(505, '5953', 3, 16, 30),
(506, '5953', 3, 17, 85),
(507, '5953', 3, 18, 82),
(508, '5954', 1, 1, 70),
(509, '5954', 2, 3, 40),
(510, '5954', 2, 4, 81),
(511, '5954', 1, 8, 50),
(512, '5954', 1, 12, 82),
(513, '5954', 1, 13, 76),
(514, '5954', 3, 15, 70),
(515, '5954', 3, 16, 30),
(516, '5954', 3, 17, 93),
(517, '5954', 3, 18, 87),
(518, '5955', 1, 1, 50),
(519, '5955', 2, 3, 60),
(520, '5955', 2, 4, 80),
(521, '5955', 1, 8, 50),
(522, '5955', 1, 12, 89),
(523, '5955', 1, 13, 77),
(524, '5955', 3, 15, 60),
(525, '5955', 3, 16, 40),
(526, '5955', 3, 17, 81),
(527, '5955', 3, 18, 84),
(528, '5956', 1, 1, 80),
(529, '5956', 2, 3, 40),
(530, '5956', 2, 4, 80),
(531, '5956', 1, 8, 60),
(532, '5956', 1, 12, 89),
(533, '5956', 1, 13, 83),
(534, '5956', 3, 15, 40),
(535, '5956', 3, 16, 60),
(536, '5956', 3, 17, 89),
(537, '5956', 3, 18, 83),
(538, '5958', 1, 1, 60),
(539, '5958', 2, 3, 60),
(540, '5958', 2, 4, 80),
(541, '5958', 1, 8, 40),
(542, '5958', 1, 12, 80),
(543, '5958', 1, 13, 80),
(544, '5958', 3, 15, 40),
(545, '5958', 3, 16, 50),
(546, '5958', 3, 17, 91),
(547, '5958', 3, 18, 80),
(548, '9561', 1, 1, 70),
(549, '9561', 2, 3, 70),
(550, '9561', 2, 4, 85),
(551, '9561', 1, 8, 70),
(552, '9561', 1, 12, 89),
(553, '9561', 1, 13, 85),
(554, '9561', 3, 15, 40),
(555, '9561', 3, 16, 70),
(556, '9561', 3, 17, 85),
(557, '9561', 3, 18, 79),
(558, '5962', 1, 1, 70),
(559, '5962', 2, 3, 30),
(560, '5962', 2, 4, 86),
(561, '5962', 1, 8, 60),
(562, '5962', 1, 12, 90),
(563, '5962', 1, 13, 79),
(564, '5962', 3, 15, 10),
(565, '5962', 3, 16, 30),
(566, '5962', 3, 17, 80),
(567, '5962', 3, 18, 78),
(568, '9563', 1, 1, 30),
(569, '9563', 2, 3, 40),
(570, '9563', 2, 4, 80),
(571, '9563', 1, 8, 50),
(572, '9563', 1, 12, 87),
(573, '9563', 1, 13, 83),
(574, '9563', 3, 15, 40),
(575, '9563', 3, 16, 50),
(576, '9563', 3, 17, 82),
(577, '9563', 3, 18, 79),
(578, '5964', 1, 1, 60),
(579, '5964', 2, 3, 40),
(580, '5964', 2, 4, 78),
(581, '5964', 1, 8, 40),
(582, '5964', 1, 12, 84),
(583, '5964', 1, 13, 79),
(584, '5964', 3, 15, 20),
(585, '5964', 3, 16, 40),
(586, '5964', 3, 17, 86),
(587, '5964', 3, 18, 80),
(588, '5965', 1, 1, 80),
(589, '5965', 2, 3, 50),
(590, '5965', 2, 4, 92),
(591, '5965', 1, 8, 70),
(592, '5965', 1, 12, 88),
(593, '5965', 1, 13, 87),
(594, '5965', 3, 15, 60),
(595, '5965', 3, 16, 50),
(596, '5965', 3, 17, 87),
(597, '5965', 3, 18, 80),
(598, '5966', 1, 1, 70),
(599, '5966', 2, 3, 60),
(600, '5966', 2, 4, 88),
(601, '5966', 1, 8, 60),
(602, '5966', 1, 12, 86),
(603, '5966', 1, 13, 88),
(604, '5966', 3, 15, 30),
(605, '5966', 3, 16, 40),
(606, '5966', 3, 17, 85),
(607, '5966', 3, 18, 79),
(608, '5967', 1, 1, 60),
(609, '5967', 2, 3, 40),
(610, '5967', 2, 4, 90),
(611, '5967', 1, 8, 70),
(612, '5967', 1, 12, 80),
(613, '5967', 1, 13, 79),
(614, '5967', 3, 15, 60),
(615, '5967', 3, 16, 60),
(616, '5967', 3, 17, 80),
(617, '5967', 3, 18, 90),
(618, '5968', 1, 1, 40),
(619, '5968', 2, 3, 60),
(620, '5968', 2, 4, 82),
(621, '5968', 1, 8, 70),
(622, '5968', 1, 12, 89),
(623, '5968', 1, 13, 85),
(624, '5968', 3, 15, 50),
(625, '5968', 3, 16, 60),
(626, '5968', 3, 17, 78),
(627, '5968', 3, 18, 81),
(628, '5969', 1, 1, 60),
(629, '5969', 2, 3, 50),
(630, '5969', 2, 4, 81),
(631, '5969', 1, 8, 60),
(632, '5969', 1, 12, 81),
(633, '5969', 1, 13, 80),
(634, '5969', 3, 15, 40),
(635, '5969', 3, 16, 20),
(636, '5969', 3, 17, 96),
(637, '5969', 3, 18, 80),
(638, '5970', 1, 1, 70),
(639, '5970', 2, 3, 70),
(640, '5970', 2, 4, 85),
(641, '5970', 1, 8, 70),
(642, '5970', 1, 12, 89),
(643, '5970', 1, 13, 85),
(644, '5970', 3, 15, 40),
(645, '5970', 3, 16, 70),
(646, '5970', 3, 17, 85),
(647, '5970', 3, 18, 79),
(648, '5972', 1, 1, 70),
(649, '5972', 2, 3, 30),
(650, '5972', 2, 4, 86),
(651, '5972', 1, 8, 60),
(652, '5972', 1, 12, 90),
(653, '5972', 1, 13, 79),
(654, '5972', 3, 15, 10),
(655, '5972', 3, 16, 30),
(656, '5972', 3, 17, 80),
(657, '5972', 3, 18, 78),
(658, '5973', 1, 1, 30),
(659, '5973', 2, 3, 40),
(660, '5973', 2, 4, 80),
(661, '5973', 1, 8, 50),
(662, '5973', 1, 12, 87),
(663, '5973', 1, 13, 83),
(664, '5973', 3, 15, 40),
(665, '5973', 3, 16, 50),
(666, '5973', 3, 17, 82),
(667, '5973', 3, 18, 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_ibfk_1` (`nisn`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `db_nilai_alternatif_id_314bf825_fk_db_alternatif_id` (`alternatif`),
  ADD KEY `db_nilai_kriteria_id_9ab81359_fk_db_kriteria_id` (`kriteria`),
  ADD KEY `db_nilai_nisn_id_eb3683f4_fk` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `data_mahasiswa` (`nisn`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `db_nilai_alternatif_id_314bf825_fk_db_alternatif_id` FOREIGN KEY (`alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE,
  ADD CONSTRAINT `db_nilai_kriteria_id_9ab81359_fk_db_kriteria_id` FOREIGN KEY (`kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `db_nilai_nisn_id_eb3683f4_fk` FOREIGN KEY (`nisn`) REFERENCES `data_mahasiswa` (`nisn`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
