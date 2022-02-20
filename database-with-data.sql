-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2022 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemetaan-kriminal-kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(2) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(1, 'Desa Aek Batu'),
(2, 'Desa Asam Jawa'),
(3, 'Desa Rasau'),
(4, 'Desa Torganda'),
(5, 'Desa Bagai');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id` int(3) NOT NULL,
  `desa` int(2) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id`, `desa`, `nama`) VALUES
(1, 1, 'Dusun Simpang Empat'),
(2, 1, 'Dusun Kampung Mangga'),
(3, 1, 'Dusun Cikampak Pekan'),
(4, 1, 'Dusun Menanti'),
(5, 2, 'Dusun Al-amin Kebun '),
(6, 2, 'Dusun Aek Batu Timur'),
(7, 2, 'Dusun Cinta Makmur'),
(8, 1, 'Dusun  Cikampak Peka'),
(9, 1, 'Dusun Pinang Awan'),
(10, 2, 'Dusun Asam Jawa'),
(11, 1, 'Dusun Pasar Xii'),
(12, 1, 'Dusun Lantosan'),
(13, 2, 'Dusun Al-amin'),
(14, 1, 'Dusun Cindur'),
(15, 1, 'Dusun Perumahan'),
(16, 1, 'Dusun Kandang Motor'),
(17, 2, 'Dusun Milano'),
(18, 2, 'Dusun Al Amin'),
(19, 1, 'Dusun Simpang 4');

-- --------------------------------------------------------

--
-- Table structure for table `email_confirm`
--

CREATE TABLE `email_confirm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_uid` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_code` int(6) NOT NULL,
  `expire_date` datetime NOT NULL,
  `status` enum('unconfirmed','confirmed') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id` int(3) NOT NULL,
  `dusun` int(3) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id`, `dusun`, `nama`) VALUES
(1, 3, 'Jalan Lintassumatera');

-- --------------------------------------------------------

--
-- Table structure for table `laporan-kriminal`
--

CREATE TABLE `laporan-kriminal` (
  `id` int(4) NOT NULL,
  `nomor_surat` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('pencurian-motor','pencurian-ringan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` int(2) NOT NULL,
  `dusun` int(2) NOT NULL,
  `jalan` int(3) NOT NULL DEFAULT 0,
  `tkp` int(3) DEFAULT 0,
  `kerugian_nominal` int(2) NOT NULL,
  `deskripsi` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan-kriminal`
--

INSERT INTO `laporan-kriminal` (`id`, `nomor_surat`, `tanggal`, `jenis`, `desa`, `dusun`, `jalan`, `tkp`, `kerugian_nominal`, `deskripsi`) VALUES
(1, 'LP/156/VIII/2018', '2018-08-09', 'pencurian-ringan', 1, 1, 0, 1, 100000, 'Pada hari Kamis Tgl 09 Agustus 2018 sekira pukul 18.30 wib di Areal Perladangan JANA SUJANA Bakran Batu Dusun Simpang Empat Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 11 (sebelas) j'),
(2, 'LP/157/VIII/2018', '2018-08-10', 'pencurian-ringan', 1, 1, 0, 1, 50000, 'Pada hari Jumat Tgl 10 Agustus 2018 sekira pukul 15.30 wib di  PT.Wisu Indo Jaya Blok A Tio-tio Dusun Kampung Mangga Desa Asam jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian berondolan buah sawit Kerugian Rp. 50.000,- (Lim'),
(3, 'LP/158/VIII/2018', '2018-08-12', 'pencurian-ringan', 1, 1, 0, 1, 600000, 'Pada hari Minggu Tgl 12 Agustus 2018 sekira pukul 00.15 wib di SPBU Simpang Karo Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian dengan kekerasan1 (satu) unit mobil mitsubishi Center 125 Ps No.'),
(4, 'LP/159/VIII/2018', '2018-08-12', 'pencurian-ringan', 2, 2, 0, 1, 600000, 'Pada hari Minggu Tgl 12 Agustus 2018 sekira pukul 15.30 wib di Blok A Tio-tio Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian buah sawit'),
(5, 'LP/166/VIII/2018', '2018-08-22', 'pencurian-ringan', 1, 1, 0, 1, 600000, 'Pada hari Rabu Tgl 22 Agustus 2018 sekira pukul 17.00 wib di PT.wisu indo jaya Blok B Dusun Menanti Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 1 (satu) janjang'),
(6, 'LP/84/IV/2018', '2018-04-04', 'pencurian-ringan', 2, 1, 0, 1, 600000, 'Pada hari Rabu Tgl 04 April 2018 sekira pukul 18.00 wib di Blok D Dusun Al-amin Kebun Aek Batu Desa Asam Jawa Ke.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(7, 'LP/88/IV/2018', '2018-04-09', 'pencurian-motor', 2, 1, 0, 1, 600000, 'Pada hari Senin Tgl 09 April 2018 sekira pukul 12.30 wib di Musholla Dusun Aek Batu Timur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) unit sepeda motor Honda NC12A1C8FA/T No.Pol BK 4817 ZAC, No.mesin'),
(8, 'LP/26/I/2018', '2018-01-29', 'pencurian-ringan', 2, 1, 0, 1, 600000, 'Pada hari Senin Tgl 29 Januari 2018 sekira pukul 09.40 wib di Blok B 1 Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(9, 'LP/51/II/2018', '2018-02-20', 'pencurian-ringan', 1, 1, 0, 1, 600000, 'Pada hari Selasa Tgl 20 Februari 2018 sekira pukul 11.00 wib di Ruko Aneka Ragam Dusun  Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 212 (dua ratus dua belas) buah tabung gas elfiji 3 Kg '),
(10, 'LP/07/XII/2017', '2017-12-29', 'pencurian-ringan', 1, 1, 0, 1, 600000, 'Pada hari Jumat Tgl 29 Desember 2017 sekira pukul 10.48 wib di Kebun PT Wisu Indo Jaya Blok A Kampung Menanti Dusun Pinang Awan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 5 (lima) janjang buah kelapa sawit'),
(11, 'LP/144/VII/2018', '2018-07-19', 'pencurian-ringan', 2, 1, 0, 1, 600000, 'Pada hari Kamis Tgl 19 Juli 2018 sekira pukul 21.30 wib di Samping Gardu Listrik Dusun Asam Jawa Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana “ Mendah hasil usaha perkebunan yang diperoleh dari hasil penjarahan atau p'),
(12, 'LP/111/V/2018', '2018-05-26', 'pencurian-ringan', 1, 3, 1, 1, 600000, 'Pada hari Sabtu Tgl 26 Mei 2018 sekira pukul 15.30 wib di Jalan LintasSumatera Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian dengan kekerasan'),
(13, 'LP/68/III/2018', '2018-03-10', 'pencurian-ringan', 2, 7, 1, 1, 374000, 'Pada hari Sabtu Tgl 10 Maret 2018 sekira pukul 17.00 wib di PT.Wisu Indo Jaya Blok A Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit ,Kerugian Rp. 374.000,- (Tiga ratus tujuh '),
(14, 'LP/69/III/2018', '2018-03-11', 'pencurian-ringan', 2, 7, 1, 1, 374000, 'Pada hari Minggu Tgl 11 Maret 2018 sekira pukul 13.00 wib di PT.Wisu Indo Jaya Blok A Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(15, 'LP/76/III/2018', '2018-03-18', 'pencurian-ringan', 2, 2, 1, 1, 374000, 'Pada hari Minggu Tgl 18 Maret 2018 sekira pukul 07.00 wib di Tio-tio Blok A 48 Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi pencurian buah kelapa sawit'),
(16, 'LP/102/V/2018', '2018-05-06', 'pencurian-ringan', 2, 7, 1, 1, 374000, 'Pada hari Minggu Tgl 06 Mei 2018 sekira pukul 19.00 wib di PT.Wisu Indo Jaya Blok F Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondolan buah sawit'),
(17, 'LP/103/V/2018', '2018-05-14', 'pencurian-ringan', 2, 7, 1, 1, 374000, 'Pada hari Senin Tgl 14 Mei 2018 sekira pukul 13.00 wib di PT.Wisu Indo Jaya Blok A Petak II Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(18, 'LP/ 182/IX/2018', '2018-05-14', 'pencurian-ringan', 1, 3, 1, 1, 374000, 'Pada hari Selasa Tgl 25 September 218 sekira pukul 21.45 wib di Toko Mitra Ponsel Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) buah Handpone merk Oppo type F9'),
(19, 'LP/ 186/X/2018', '2018-09-29', 'pencurian-ringan', 1, 1, 1, 1, 374000, 'Pada hari Sabtu Tgl 29 September 2018 sekira puku 15.00 wib di PT. Nagamas Agro Mulia Kebun Cikampak Dusun Pasar XII Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 50 ( lima puluh) janj'),
(20, 'LP/ 187/X/2018', '2018-10-02', 'pencurian-ringan', 2, 2, 1, 4, 374000, 'Pada hari Selasa Tgl 02 Oktober 2018 sekira pukul 17.30 wib di Blok A Tio-tio Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondoan buah kelapa sawit'),
(21, 'LP/ 188/X/2018', '2018-10-02', 'pencurian-ringan', 2, 2, 1, 4, 374000, 'Pada hari Selasa Tg 02 oktober 2018 sekira pukul 11.00 wib di Blok A Tio-tio Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Seatan, telah terjadi tindak pidana pencurian berondolan buah sawit'),
(22, 'LP/171/VIII/2018', '2018-08-31', 'pencurian-ringan', 2, 7, 1, 1, 374000, 'Pada hari Jumat Tgl 31 Agustus 2018 sekira pukul 18.00 wib di Blok C Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondolan buah sawit'),
(23, 'LP/176/IX/2018', '2018-09-10', 'pencurian-ringan', 1, 1, 1, 1, 229000, 'Pada hari Senin Tgl 10 September 2018 sekira pukul 17.00 wib di Ladang Perseorangan Dusun Lantosan Desa Rasau Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit ,Kerugian Rp. 229.000,- (Dua ratus dua puluh sembi'),
(24, 'LP/177/IX/2018', '2018-09-10', 'pencurian-ringan', 3, 12, 1, 21, 5400000, 'Pada hari Senin Tgl 10 September 2018 sekira pukul 19.00 wib di Ladang Perseorangan Dusun Lantosan Desa Rasau Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit,Kerugian Rp. 5.400.000,- (Lima Juta empat ratus ri'),
(25, 'LP/ 50 / III / 2019 ', '2019-03-27', 'pencurian-ringan', 2, 1, 1, 1, 72000, 'Pada hari Rabu Tgl 27 Maret 2019 sekira pukul 14.00 wib di Blok C asam Jawa PT. Wisu Indo Jaya Dusun Al-Amin Desa Asam Jawa Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 2 (dua) goni berondolan buah kelapa sawit, Kerugian RP'),
(26, 'LP / 11 / I / 2019', '2019-01-22', 'pencurian-motor', 1, 1, 1, 1, 72000, 'Pada hari Selasa Tgl 22 Januari 2019 sekira pukul 07.30 Wib di Gudang Limbah PKS Cindur Torganda Dusun Cindur Desa Torganda Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) unit mesin pompa elektro motor '),
(27, 'LP/ 12 / I / 2019', '2019-01-25', 'pencurian-ringan', 4, 14, 1, 1, 72000, 'Pada hari Jumat Tgl 25 Januari 2019 Sekira pukul 15.00 wib di Samping Tembok PKS Cindur PT. Torganda Dusun Cindur Desa Torganda Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian barang-barang berupa besi pipa dan besi plat'),
(28, 'LP/ 23/ II / 2019', '2019-01-11', 'pencurian-ringan', 1, 1, 1, 1, 2000000, 'Pada hari Senin Tgl 11 Januari 2019 Sekira pukul 19:30 wib Di Dusun Perumahan Desa Bangai Kec. Torgamba Kab. Labuhanbatu Selatan telah terjadi pencurian ternak kambing dengan cara mengambil kambing Kerugian Rp. 2.000.000; (Dua Juta Rupiah)'),
(29, 'LP/113/VI/RES 4,2 /2019 ', '2019-06-21', 'pencurian-ringan', 1, 3, 1, 1, 2000000, 'Pada Hari Jumat Tgl 21 Juni 2019 sekira Pukul 04.30 wib di Depan Kios Pajak Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah Terjadi Tindak Pidana Pencurian Cabe'),
(30, 'LP/96/VI/RES.1.8 / 2019 ', '2019-05-13', 'pencurian-motor', 1, 1, 1, 1, 2000000, 'Pada hari Senin Tgl 13 Mei 2019 sekira pukul 15.45 wib di Parkiran Masjid Dusun Kandang Motor Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 1 (satu) unit sepeda motor Supra 125no.Pol BK 2029 ZAF'),
(31, 'LP / 26 / II / 2019 ', '2019-02-27', 'pencurian-ringan', 1, 1, 1, 1, 2000000, 'Pada hari Rabu tgl 27 Februari 2019 sekira pukul 05.00 wib di Depan Rumah Makan Sileman Dusun Simpang Empat Desa Aek Batu Kec.Torgamba Akb.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) buah baterai mobil Tangki Fuso'),
(32, 'LP/ 41 / III / 2019 ', '2019-03-10', 'pencurian-ringan', 2, 1, 1, 1, 2000000, 'Pada hari Minggu Tgl 10 Maret 2019 sekira pukul 15.00 wib di Kebun TH Dusun Milano Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 40 (empat puluh) janjang buah kelapa sawit'),
(33, 'LP/146/IX/RES.1.8/2019 ', '2019-09-07', 'pencurian-ringan', 2, 1, 1, 1, 2000000, 'Pada hari Sabtu Tgl 07 September 2019 sekira pukul 14.00 wib di  PT. Wisu Indo Jaya Blo II D Dusun Al Amin Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 2 (dua) Goni Berondolan buah kelapa sawit'),
(34, 'LP/18/I/RES.1.8./2021 ', '2019-09-07', 'pencurian-ringan', 2, 7, 1, 1, 2000000, 'Pada hari Sabtu Tgl 23 Januari  2021 sekira pukul 11.30 wib di Blok A Kebun PT.Wisu Indo Jaya Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbtu Selatan,telah terjadi tindak pidana Pencurian 6 (enam)Tros Buah Kelapa Sawit  '),
(35, 'LP/43/II/RES.1.8./2021', '2021-02-24', 'pencurian-ringan', 1, 1, 1, 1, 2000000, 'Pada hari Rabu Tgl 24 Februari 2021 sekira pukul 07.30 wib di Jl Mutiara Kantor KUA Cikampak Dusun Simpang 4 Desa Aek Batu Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 2 (dua) buah Laptop Merk Tosiba Intel Core I3 No. 5C104');

-- --------------------------------------------------------

--
-- Table structure for table `tkp`
--

CREATE TABLE `tkp` (
  `id` int(6) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tkp`
--

INSERT INTO `tkp` (`id`, `nama`) VALUES
(1, 'Bakaran Batu'),
(2, 'Pt.wisu Indo Jaya Bl'),
(3, 'Spbu Simpang Karo'),
(4, 'Blok A Tio-tio'),
(5, 'Blok B'),
(6, 'Blok D'),
(7, 'Musholla'),
(8, 'Blok B 1'),
(9, 'Ruko Aneka Ragam'),
(10, 'Kebun Pt Wisu Indo J'),
(11, 'Samping Gardu Listri'),
(12, 'Samping Gardu Listri'),
(13, 'Pt.wisu Indo Jaya Bl'),
(14, 'Pt.wisu Indo Jaya Bl'),
(15, 'Tio-tio Blok A 48'),
(16, 'Pt.wisu Indo Jaya Bl'),
(17, 'Pt.wisu Indo Jaya Bl'),
(18, 'Toko Mitra Ponsel'),
(19, 'Pt. Nagamas Agro Mul'),
(20, 'Blok C'),
(21, 'Ladang Perseorangan'),
(22, 'Blok C Asam Jawa Pt.'),
(23, 'Pks Cindur Torganda'),
(24, 'Samping Tembok Pks C'),
(25, 'Di'),
(26, 'Depan Kios Pajak'),
(27, 'Parkiran Masjid'),
(28, 'Depan Rumah Makan Si'),
(29, 'Kebun Th'),
(30, 'Pt. Wisu Indo Jaya B'),
(31, 'Blok A Kebun Pt.wisu'),
(32, 'Jl Mutiara Kantor Ku');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) UNSIGNED NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `username`, `password`, `full_name`, `photo`) VALUES
(1, 'admin', 'agungmasda29@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_confirm`
--
ALTER TABLE `email_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan-kriminal`
--
ALTER TABLE `laporan-kriminal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tkp`
--
ALTER TABLE `tkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `email_confirm`
--
ALTER TABLE `email_confirm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan-kriminal`
--
ALTER TABLE `laporan-kriminal`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tkp`
--
ALTER TABLE `tkp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
