-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 10:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `sha1` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`, `lat`, `lon`, `sha1`) VALUES
(1, 'Desa Aek Batu', NULL, NULL, '947bfa459d42d0fcebf0581245dc09bd0ae71f09'),
(2, 'Desa Asam Jawa', NULL, NULL, 'e586812d341fa69548378982b0dc47e6aa1b80f9'),
(3, 'Desa Aek Raso', NULL, NULL, '6d7676b5f5c1d6340033132f253c948d3897e147'),
(4, 'Desa Rasau', NULL, NULL, '0389e92a1cd71f463d3ac233b5cd5288a0911382'),
(5, 'Desa Torganda', NULL, NULL, '6b8ae275f0a0d3313e82198575c2020ab923947e'),
(6, 'Desa Bagai', NULL, NULL, '9cfaeb63542680ace182652014660736428fdea4'),
(7, 'Desa Sei Meranti', NULL, NULL, '9368abee7593a702234acfc740c527c7ba51bebf'),
(8, 'Desa Torgamba', NULL, NULL, '04b50170e2e981362d76aa73eb60985ddad8fedf'),
(9, 'Desa Parungan', NULL, NULL, '5a47a18126cb7bbdd074a15512aabb0a34b82a22');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id` int(3) NOT NULL,
  `desa` int(2) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sha1` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id`, `desa`, `nama`, `sha1`) VALUES
(1, 1, 'Dusun Cikampak Pekan', '28e6d36109e66c76b45c416b2035fffb7898041a'),
(2, 1, 'Dusun Simpang Empat', '61e17ccf591425a67f9d5913b8d339ec9af4eeb2'),
(3, 2, 'Dusun Kampung Mangga', '9e2f7951d6015a33e541a62e24bc00e31d849674'),
(4, 1, 'Dusun Menanti', '3743c71ae7e0a3ae2c70e90066a164dc2dd797a2'),
(5, 1, 'Dusun Al-Amin Kebun Aek Batu', 'cd5c43ce07e546389bc73587fccaac5411234c12'),
(6, 2, 'Dusun Aek Batu Timur', '6fa30d07b78ac529bb7dbb08fb6eb24fd907f6a4'),
(7, 1, 'Dusun Cinta Makmur', '1ad1cca4c7dc658f2c5ea6206b87ee51118ae520'),
(8, 1, 'Dusun Cikampak Permai', '07dc134b887d987ef26032c0142d7575d7015734'),
(9, 1, 'Dusun  Cikampak Pekan', 'abfe7cc70655c208c24fa4c791efa8727c280810'),
(10, 1, 'Dusun Pinang Awan', 'bd08f98494dac6e98a0e45967d83696073c09fa3'),
(11, 1, 'Dusun Kandang Motor', '4793624180bd3310dc080a10710e61b50602e590'),
(12, 1, 'Dusun Simpang Epat', '6e2935754adf76c94e3668115a633597aa0b9db3'),
(13, 2, 'Dusun Asam Jawa', 'eb6796eb17a283e706ab46918a80adafbaf5cc13'),
(14, 1, 'Dusun Cikampak Tengah', '57ecf4cd18cca611c4f1b0adc6112c93fec8fb0e'),
(15, 2, 'Dusun Pir Bun C', '5498d14444ffadd4d031f88f106a2936028a5f78'),
(16, 3, 'Dusun Cemara', '6cd658ba0c84622b6374219a303242441b374cde'),
(17, 2, 'Dusun Teluk Pinang', '4b7f3dd799f9926382f5c096861b2d19d7b82b8e'),
(18, 1, 'Dusun Pasar XII', 'a42b76880793f724557df35fed016dd0e5baf16a'),
(19, 4, 'Dusun Lantosan', '0479dc63f0f5a76de9e0620905462fe69a77eecc'),
(20, 1, 'Dusun Al-Amin', 'b30385bb96aeb1de99e4526afc928d47dbad7618'),
(21, 5, 'Dusun Cindur', '1949700bccaed5beaff2d567746e138f8824adb3'),
(22, 2, 'Dusun Aek Batu Selatan', '90d6e58ce45fd5b407261815ce45f4cce9d7380a'),
(23, 1, 'Dusun Sumber Jo I Pasar 1A', '92ba0ad7fcac825607b33dfbf9b1a1bfb90d1ffc'),
(24, 6, 'Dusun Perumahan', '7580871dcca7c14af54cfd0456832d92fa38e7de'),
(25, 2, 'Dusun Aek Batu Utara', '339612e071d305492bfbb88adeed71f36efc71fc'),
(26, 1, 'Dusun Bakaran Batu', '764063f2898179e73fc7cbd2aa56edd8deaf6215'),
(27, 7, 'Dusun Bangun Raya Sari', 'dcc04026c535ea35055de61bd93c8f7ea17f889e'),
(28, 2, 'Dusun Milano', '15ccebe631548d513ce9b3ac833a2917b0d54a57'),
(29, 8, 'Dusun Matahari', '176bc3f00b20de307e842708003132a64e9f2b82'),
(30, 1, 'Dusun Simpang IV', '1bd95cf51bfcee5cbd7043d380f45b2e13b40d3d'),
(31, 9, 'Dusun Kampung Banten', 'fb924608b48d424b1e6d9a35f5748989d259506a');

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
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sha1` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id`, `dusun`, `nama`, `sha1`) VALUES
(1, 7, 'Jalan Umum', '4fbfba8854cf155eac512065a20564b1e12933bf'),
(2, 12, 'Jalan Batang Gogar', 'ceedf4b4fac479f053a9ef688322728c029de7a1'),
(3, 1, 'Jalan Lintas Sumatera', 'c41dbd30ad7fa0c934f8eb1c0fe186050bf351eb'),
(4, 1, 'Jalan Mulia', '4b841aef7a98ba556328a00d70be650f10616806'),
(5, 1, 'Jalan Perumahan Griya Nus III RT 5', '2e23ef143abc18a1791c2adc1b079ffa0b10fe49');

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
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan-kriminal`
--

INSERT INTO `laporan-kriminal` (`id`, `nomor_surat`, `tanggal`, `jenis`, `desa`, `dusun`, `jalan`, `tkp`, `kerugian_nominal`, `deskripsi`) VALUES
(1, 'LP/153/VIII/ 2018', '2018-08-02', 'pencurian-ringan', 1, 1, 0, 1, 216510, 'Pada hari Kamis Tgl 02 Agustus 2018 sekira pukul 21.00 wib di Pajak Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(2, 'LP/156/VIII/2018', '2018-08-09', 'pencurian-ringan', 1, 2, 0, 2, 100000, 'Pada hari Kamis Tgl 09 Agustus 2018 sekira pukul 18.30 wib di Areal Perladangan JANA SUJANA Bakran Batu Dusun Simpang Empat Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 11 (sebelas) janjang, Kerugian Rp. 100.000,- (seratus ribu rupiah)'),
(3, 'LP/157/VIII/2018', '2018-08-10', 'pencurian-ringan', 2, 3, 0, 3, 50000, 'Pada hari Jumat Tgl 10 Agustus 2018 sekira pukul 15.30 wib di  PT.Wisu Indo Jaya Blok A Tio-tio Dusun Kampung Mangga Desa Asam jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian berondolan buah sawit Kerugian Rp. 50.000,- (Lima puluh ribu rupiah)'),
(4, 'LP/158/VIII/2018', '2018-08-12', 'pencurian-ringan', 1, 1, 0, 4, 318000000, 'Pada hari Minggu Tgl 12 Agustus 2018 sekira pukul 00.15 wib di SPBU Simpang Karo Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian dengan kekerasan1 (satu) unit mobil mitsubishi Center 125 Ps No.Polisi BM 9448 PD, No.Rangka : MHMFE74PSFK147732, No.Mesin : 4D34T-158906 an.  Alimuddin dan  mengambil dompet yang berisi uang Rp. 600.000,- 1 (satu) lembar STNK Mobil Mitsubishi,Kerugian Rp. 318.000.000, (Tiga ratus delapan belas juta rupiah)'),
(5, 'LP/159/VIII/2018', '2018-08-12', 'pencurian-ringan', 2, 3, 0, 5, 1139455, 'Pada hari Minggu Tgl 12 Agustus 2018 sekira pukul 15.30 wib di Blok A Tio-tio Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah teradi tindak pidana pencurian buah sawit'),
(6, 'LP/166/VIII/2018', '2018-08-22', 'pencurian-ringan', 1, 4, 0, 6, 1457083, 'Pada hari Rabu Tgl 22 Agustus 2018 sekira pukul 17.00 wib di PT.wisu indo jaya Blok B Dusun Menanti Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 1 (satu) janjang'),
(7, 'LP/84/IV/2018', '2018-04-04', 'pencurian-ringan', 2, 5, 0, 7, 1330625, 'Pada hari Rabu Tgl 04 April 2018 sekira pukul 18.00 wib di Blok D Dusun Al-amin Kebun Aek Batu Desa Asam Jawa Ke.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(8, 'LP/88/IV/2018', '2018-04-09', 'pencurian-motor', 2, 6, 0, 8, 1579902, 'Pada hari Senin Tgl 09 April 2018 sekira pukul 12.30 wib di Musholla Dusun Aek Batu Timur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) unit sepeda motor Honda NC12A1C8FA/T No.Pol BK 4817 ZAC, No.mesin : JFC1E1237149 No.Rangka : MH1JFC115DK236059 An. Herdianto'),
(9, 'LP/208/XI/2018', '2018-01-22', 'pencurian-ringan', 1, 7, 1, 0, 570408, 'Pada hari Kamis Tgl 22 Nopember 2018 sekira pukul 21.00 wib di Jalan Umum Dusun Cinta Makmur Desa Aek Batu Kec.Torgamba, telah terjadi tindak pidana Penganiayaan'),
(10, 'LP/217/XII/2018', '2018-12-22', 'pencurian-ringan', 1, 8, 0, 9, 1398714, 'Pada hari Sabtu Tgl 22 Desember 2018 sekira pukul 10.00 wib di Kantor KSU Ria Mandiri Jaya Dusun Cikampak Permai Desa Aek Batu Kec.Torgamba Kb.Labuhanbatu Selatan, telah terjadi tindak pidana penggelapan dalam jabatan'),
(11, 'LP/26/I/2018', '2018-01-29', 'pencurian-ringan', 2, 7, 0, 10, 1589066, 'Pada hari Senin Tgl 29 Januari 2018 sekira pukul 09.40 wib di Blok B 1 Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(12, 'LP/51/II/2018', '2018-02-20', 'pencurian-ringan', 1, 9, 0, 11, 1111052, 'Pada hari Selasa Tgl 20 Februari 2018 sekira pukul 11.00 wib di Ruko Aneka Ragam Dusun  Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 212 (dua ratus dua belas) buah tabung gas elfiji 3 Kg '),
(13, 'LP/06/XII/2017', '2017-12-27', 'pencurian-ringan', 1, 1, 0, 12, 583319, 'Pada hari Rabu tgl 27 Desember 2017 sekira pukul 13.30 wib di Simpang Tugu Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tinda pidana narkotika jenis sabu'),
(14, 'LP/07/XII/2017', '2017-12-29', 'pencurian-ringan', 1, 10, 0, 13, 582568, 'Pada hari Jumat Tgl 29 Desember 2017 sekira pukul 10.48 wib di Kebun PT Wisu Indo Jaya Blok A Kampung Menanti Dusun Pinang Awan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 5 (lima) janjang buah kelapa sawit'),
(15, 'LP/134/VI/2018', '2018-06-29', 'pencurian-motor', 1, 11, 0, 14, 1584800, 'Pada hari Jumat Tgl 29 Juni 2018 sekira pukul 20.30 wib di Lorong Sidorukun Dusun Kandang Motor Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(16, 'LP/137/VII/2018', '2018-07-05', 'pencurian-ringan', 1, 12, 2, 0, 136252, 'Pada hari Kamis Tgl 05 Juli 2018 sekira pukul 15.30 wib di Jalan Batang Gogar Dusun Simpang Epat Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(17, 'LP/144/VII/2018', '2018-07-19', 'pencurian-ringan', 2, 13, 0, 15, 523387, 'Pada hari Kamis Tgl 19 Juli 2018 sekira pukul 21.30 wib di Samping Gardu Listrik Dusun Asam Jawa Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana “ Mendah hasil usaha perkebunan yang diperoleh dari hasil penjarahan atau pencurian “'),
(18, 'LP/148/VII/2018', '2018-07-22', 'pencurian-motor', 1, 1, 0, 16, 204866, 'Pada hari Minggu Tgl 22 Juli 2018 sekira pukul 10.00 wib di Budi Utama Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu selatan, telah terjadi tindak pidana penggelapan 1 (satu) unit sepeda motor Honda Beat  warna hitam No.Polisi BK 5160 YBF, No.Rangka : MH1JFS110FK172645 No.mesin : JFS1E-1170590 An. Muhammad Husni Pohan tahun 2015'),
(19, 'LP/111/V/2018', '2018-05-26', 'pencurian-ringan', 1, 1, 3, 0, 503451, 'Pada hari Sabtu Tgl 26 Mei 2018 sekira pukul 15.30 wib di Jalan Lintas Sumatera Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian dengan kekerasan'),
(20, 'LP/112/V/2018', '2018-05-26', 'pencurian-ringan', 1, 1, 0, 17, 1393334, 'Pada hari Sabtu Tgl 26 Mei 2018 sekira pukul 19.45 wib di Warnet Golden Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(21, 'LP/118/VI/2018', '2001-06-01', 'pencurian-ringan', 1, 14, 0, 18, 402032, 'Pada hari Jumat Tgl 01 Juni 20018 sekira pukul 08.00 wib di  SPBU 13214103 Dusun Cikampak Tengah Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian uang '),
(22, 'LP/129/VI/2018', '2018-06-24', 'pencurian-ringan', 2, 15, 0, 19, 1076782, 'Pada hari Minggu Tgl 24 Juni 2018 sekira pukul 01.30 wib di Ram Dusun Pir Bun C Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana narkotika jenis sabu'),
(23, 'LP/64/III/2018', '2018-03-05', 'pencurian-motor', 1, 7, 0, 20, 1133538, 'Pada hari jumat tanggal 05 maret 2018 sekira pukul 07.00 wib di Gang Pihara Dusun Cinta Makmur Desa Aek Batu Kec. Torgamba Kab. Labuhanbatu Selatan, Telah terjadi tindak pidana penggelapan 1 (satu) unit sepeda motor Yamaha dengan No Pol :BK 2173 ZAJ, No Mesin :E3R21363997, No Rangka :MH3SE8890HJ182903, Warna Hitam, Tahun 2017'),
(24, 'LP/68/III/2018', '2018-03-10', 'pencurian-ringan', 2, 7, 0, 21, 374000, 'Pada hari Sabtu Tgl 10 Maret 2018 sekira pukul 17.00 wib di PT.Wisu Indo Jaya Blok A Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit ,Kerugian Rp. 374.000,- (Tiga ratus tujuh puluh empat ribu rupiah)'),
(25, 'LP/69/III/2018', '2018-03-11', 'pencurian-ringan', 2, 7, 0, 21, 787748, 'Pada hari Minggu Tgl 11 Maret 2018 sekira pukul 13.00 wib di PT.Wisu Indo Jaya Blok A Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(26, 'LP/76/III/2018', '2018-03-18', 'pencurian-ringan', 2, 3, 0, 22, 1829253, 'Pada hari Minggu Tgl 18 Maret 2018 sekira pukul 07.00 wib di Tio-tio Blok A 48 Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi pencurian buah kelapa sawit'),
(27, 'LP/99/V/2018', '2018-05-03', 'pencurian-ringan', 3, 16, 0, 23, 522870, 'Pada hari Kamis Tgl 03 Mei 2018 sekira pukul 09.15 wib di Pasar IX Dusun Cemara Desa Aek Raso Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(28, 'LP/102/V/2018', '2018-05-06', 'pencurian-ringan', 2, 7, 0, 24, 944907, 'Pada hari Minggu Tgl 06 Mei 2018 sekira pukul 19.00 wib di PT.Wisu Indo Jaya Blok F Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondolan buah sawit'),
(29, 'LP/103/V/2018', '2018-05-14', 'pencurian-ringan', 2, 7, 0, 25, 1515760, 'Pada hari Senin Tgl 14 Mei 2018 sekira pukul 13.00 wib di PT.Wisu Indo Jaya Blok A Petak II Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit'),
(30, 'LP/ 205/XI/2018', '2018-01-06', 'pencurian-ringan', 1, 1, 4, 0, 551353, 'Pada hari Selasa Tgl 06 Nopember 2018 sekira pukul 10.00 wib di Belakang Gudang AC Jalan Mulia Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labusel, telah terjadi tindak pidana narkotika jenis sabu'),
(31, 'LP/207/XI/2018', '2018-11-13', 'pencurian-ringan', 2, 17, 0, 26, 400000000, 'Pada hari Selasa Tgl 13 November 2018 sekira pukul 14.30 wib di SPBU Dusun Teluk Pinang Desa Asam Jawa Kec.Torgamba Kab.abuhanbatu Seatan, telah terjadi tindak pidana penggelapan 1 (satu) unit mobil Dump Truck warna kuning dinding 20 No.Polisi KH 8397 KB, No.Rangka : MHMFE75PFHK003668 No.Mesin : 4D34TR56549 An. CV Muia Trans dan pemilik mobil An. HUMAR NUR SALIM, Kerugian Rp. 400.000.000,- (Empat ratus ribu rupiah)'),
(32, 'LP/183/IX/2018', '0000-00-00', 'pencurian-ringan', 1, 1, 0, 27, 1519727, 'Pada hari Selasa Tgl 25 September 218 sekira pukul 21.45 wib di Toko Mitra Ponsel Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) buah Handpone merk Oppo type F9'),
(33, 'LP/ 187/X/2018', '2018-09-29', 'pencurian-ringan', 1, 18, 0, 28, 1054539, 'Pada hari Sabtu Tgl 29 September 2018 sekira puku 15.00 wib di PT. Nagamas Agro Mulia Kebun Cikampak Dusun Pasar XII Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit sebanyak 50 ( lima puluh) janjang'),
(34, 'LP/ 188/X/2018', '2018-10-02', 'pencurian-ringan', 2, 3, 0, 5, 1860321, 'Pada hari Selasa Tgl 02 Oktober 2018 sekira pukul 17.30 wib di Blok A Tio-tio Dusun Kampung Mangga Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondoan buah kelapa sawit'),
(35, 'LP/172/IX/2018', '2018-08-31', 'pencurian-ringan', 2, 7, 0, 29, 1205784, 'Pada hari Jumat Tgl 31 Agustus 2018 sekira pukul 18.00 wib di Blok C Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian berondolan buah sawit'),
(36, 'LP/177/IX/2018', '2018-09-10', 'pencurian-ringan', 4, 19, 0, 30, 229000, 'Pada hari Senin Tgl 10 September 2018 sekira pukul 17.00 wib di Ladang Perseorangan Dusun Lantosan Desa Rasau Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit ,Kerugian Rp. 229.000,- (Dua ratus dua puluh sembilan ribu rupiah)'),
(37, 'LP/178/IX/2018', '2018-09-10', 'pencurian-ringan', 4, 19, 0, 30, 5400000, 'Pada hari Senin Tgl 10 September 2018 sekira pukul 19.00 wib di Ladang Perseorangan Dusun Lantosan Desa Rasau Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian buah kelapa sawit,Kerugian Rp. 5.400.000,- (Lima Juta empat ratus ribu rupiah)'),
(38, 'LP/ 50 / III / 2019 ', '2019-03-27', 'pencurian-ringan', 2, 20, 0, 31, 72000, 'Pada hari Rabu Tgl 27 Maret 2019 sekira pukul 14.00 wib di Blok C asam Jawa PT. Wisu Indo Jaya Dusun Al-Amin Desa Asam Jawa Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 2 (dua) goni berondolan buah kelapa sawit, Kerugian RP. 72.000,- ( tujuh puluh dua ribu rupiah)'),
(39, 'LP / 11 / I / 2019', '2019-01-22', 'pencurian-motor', 5, 21, 0, 32, 100897, 'Pada hari Selasa Tgl 22 Januari 2019 sekira pukul 07.30 Wib di Gudang Limbah PKS Cindur Torganda Dusun Cindur Desa Torganda Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) unit mesin pompa elektro motor '),
(40, 'LP/ 12 / I / 2019', '2019-01-25', 'pencurian-ringan', 5, 21, 0, 33, 1847383, 'Pada hari Jumat Tgl 25 Januari 2019 Sekira pukul 15.00 wib di Samping Tembok PKS Cindur PT. Torganda Dusun Cindur Desa Torganda Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian barang-barang berupa besi pipa dan besi plat'),
(41, 'LP/ 13 / I / 2019', '0000-00-00', 'pencurian-ringan', 2, 22, 0, 34, 1209777, 'Pada hari Sabtu Tgl 26 Januari 2019 sekira pukul 04.30 wib di Depan PMKS MAB Dusun Aek Batu Selatan Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penggelapan 15 ( lima belas) janjang buah kelapa sawit'),
(42, 'LP/ 18 / II / 2019', '2019-07-02', 'pencurian-ringan', 2, 23, 1, 0, 1526780, 'Pada hari Kamis Tgl 07 Februari 2019 sekira pukul 00.15 wib di Jalan Umum Dusun Sumber jo I Pasar 1A Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana narkotika jenis sabu'),
(43, 'LP/ 23/ II / 2019', '2019-01-11', 'pencurian-ringan', 6, 24, 0, 35, 2000000, 'Pada hari Senin Tgl 11 Januari 2019 Sekira pukul 19:30 wib Di Dusun Perumahan Desa Bangai Kec. Torgamba Kab. Labuhanbatu Selatan telah terjadi pencurian ternak kambing dengan cara mengambil kambing Kerugian Rp. 2.000.000; (Dua Juta Rupiah)'),
(44, 'LP/219/XII/2018', '2018-12-25', 'pencurian-ringan', 1, 8, 0, 36, 238746, 'Pada hari Selasa Tgl 25 Desember 2018 sekira pukul 00.45 wib di Kafe Melly Dusun Cikampak Permai Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, yelah terjadi tindak pidana secara bersama-sama melakukan penganiayaan terhadap orang atau barang atau penganiayaan'),
(45, 'LP/108 /VI/RES.1.6/ 2019', '2019-06-29', 'pencurian-ringan', 1, 1, 0, 37, 562249, 'Pada hari Sabtu Tgl 29 Juni 2019 sekira pukul 23.30 wib di Simpang Sopo Godang Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, Telah terjadi penganiayaan Secara bersama-sama'),
(46, 'LP/113/VI/RES 4,2 /2019 ', '2019-06-21', 'pencurian-ringan', 1, 1, 0, 38, 939509, 'Pada Hari Jumat Tgl 21 Juni 2019 sekira Pukul 04.30 wib di Depan Kios Pajak Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah Terjadi Tindak Pidana Pencurian Cabe'),
(47, 'LP/120/VII/RES 1.24/ 2019', '2019-07-12', 'pencurian-ringan', 2, 25, 0, 39, 979384, 'Pada hari Jumat Tgl 12 Juli 2019 sekira pukul 11.00 wib di Perumahan Dusun Aek Batu Utara Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah Terjadi tindak Pidana Pengancaman'),
(48, 'LP/121/VII/RES 1.1 /2019 ', '2019-07-14', 'pencurian-ringan', 1, 26, 0, 40, 903286, 'Pada hari Minggu Tgl 14 Juli 2019 sekira pukul 08.00 Wib di Warung Nasi Bunda Dusun Bakaran Batu Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah Terjadi Tindak Pidana Pengrusakan'),
(49, 'LP/ 89/ V /RES.4.2 / 2019 ', '2019-05-31', 'pencurian-ringan', 1, 7, 3, 0, 794016, 'Pada hari Jumat Tgl 31 Mei 2019 sekira pukul 20.00 wib di Jalan Lintas Sumatera Dusun Cinta Makmur Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana narkotika jenis ganja'),
(50, 'LP/96/VI/RES.1.8 / 2019 ', '2019-05-13', 'pencurian-motor', 1, 11, 0, 41, 1097278, 'Pada hari Senin Tgl 13 Mei 2019 sekira pukul 15.45 wib di Parkiran Masjid Dusun Kandang Motor Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 1 (satu) unit sepeda motor Supra 125no.Pol BK 2029 ZAF'),
(51, 'LP/99/VI/RES.1.6/ 2019', '2019-06-16', 'pencurian-ringan', 2, 25, 0, 42, 1800501, 'Pada hari hari Minggu Tgl 16 Juni 2019 sekira pukul 00.10 wib di Cafe Berta Dusun Aek Batu Utara Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(52, 'LP/100/VI/RES.4.2 / 2019 ', '2019-06-16', 'pencurian-ringan', 7, 27, 0, 43, 1870995, 'Pada hari Minggu Tgl 16 Juni 2019 sekira pukul 16.00 wib di Doorsmer Fajar Dusun Bangun Raya Sari Desa Sei Meranti Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Narkotika Jenis Sabu'),
(53, 'LP / 26 / II / 2019 ', '2019-02-27', 'pencurian-ringan', 1, 2, 0, 44, 514320, 'Pada hari Rabu tgl 27 Februari 2019 sekira pukul 05.00 wib di Depan Rumah Makan Sileman Dusun Simpang Empat Desa Aek Batu Kec.Torgamba Akb.Labuhanbatu Selatan, telah terjadi tindak pidana pencurian 1 (satu) buah baterai mobil Tangki Fuso'),
(54, 'LP/ 40 / III / 2019 ', '2019-03-11', 'pencurian-ringan', 1, 2, 5, 0, 1160202, 'Pada hari Senin Tgl 11 Maret 2019 sekira pukul 05.30 wib di Jalan Perumahan Griya Nus III RT 5 Dusun Simpang Empat Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah penemuan mayat'),
(55, 'LP/ 41 / III / 2019 ', '2019-03-10', 'pencurian-ringan', 2, 28, 0, 45, 533868, 'Pada hari Minggu Tgl 10 Maret 2019 sekira pukul 15.00 wib di Kebun TH Dusun Milano Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 40 (empat puluh) janjang buah kelapa sawit'),
(56, 'LP /  74 / IV / 2019', '2019-04-24', 'pencurian-motor', 1, 1, 0, 1, 1440817, 'Pada Hari Rabu Tgl 24 April 2019 sekira pukul 06.00 wib di Pajak Dusun Cikampak Pekan Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, Telah terjadi tindak pidnaa penggelapan 1 (satu) unit Sepeda Motor Honda Beat warna Hijau Putih No.Pol BM 3676 WP No.Mesin : JFD2E-2949860 No.Rangka : MH1JFD227EK954825'),
(57, 'LP/184/XI/2019', '2019-01-08', 'pencurian-ringan', 1, 10, 0, 46, 813622, 'Pada hari jumat tanggal 08 Nopember 2019 sekira pukul 21.00 wib. Di jalan umum simpang milano dusun pinang awan desa aek batu kec. Torgamba kab. Labuhanbatu selatan telah terjadi tindak pidana penganiayaan '),
(58, 'LP/147/IX/RES.4.2/2019 ', '2019-09-07', 'pencurian-ringan', 2, 20, 0, 47, 1314853, 'Pada hari Sabtu Tgl 07 September 2019 sekira pukul 14.00 wib di  PT. Wisu Indo Jaya Blo II D Dusun Al-Amin Desa Asam Jawa Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana Pencurian 2 (dua) Goni Berondolan buah kelapa sawit'),
(59, 'LP/149/IX/2019 ', '2019-09-07', 'pencurian-motor', 8, 29, 0, 48, 267945, 'Pada hari Sabtu Tgl 07 September 2019 sekra pukul 16.00 wib di Perumahan PKS Torgamba Dusun Matahari Desa Torgamba Kec. Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penggelapan 1 (satu) unit Sepeda motor Yamaha Vixion warna hitam No.Pol BM 6263 WL, No,Rangka : MH33C1205DK1940418, No.Mesin : 3C1-1190105'),
(60, 'LP/152/IX/RES.1.8/2019 ', '2019-09-22', 'pencurian-ringan', 1, 30, 0, 49, 1000463, 'Pada hari Minggu Tgl 22 September 2019 sekira pukul 20.00 wib di Depan Warung Robet Hutagaol Dusun Simpang IV Desa Aek Batu Kec.Torgamba Kab.Labuhanbatu Selatan, telah terjadi tindak pidana penganiayaan'),
(61, 'LP/12/I/RES.1.6/2020 ', '2020-01-05', 'pencurian-motor', 9, 31, 0, 50, 16000000, 'Pada Hari Minggu tgl 05 Januari 2020 , sekira pukul 21.00 wib di tempat parkir Halaman Rumah Dusun Kampung Bantan Desa Pangarungan Kec Torgamba . Telah terjadi tindak pidana pencurian 1( satu) unit Sp . Motor Yamaha Vixion Bk 2204 Yad , No Angka : MH33C1004AK403697,No Mesin :3c1,404815,  Kerugian Rp. 16.000.000,- ( Enam belas juta rupiah)'),
(62, 'LP/96/V/RES.1.8./2020 ', '2020-03-05', 'pencurian-ringan', 1, 7, 0, 51, 45000000, 'Pada har Kamis Tgl 05 Maret 2020 sekira pukul 12.30 wib di Perumahan Pulo Intan Dusun Cinta Makmur Desa Aek Batu  Kec. Torgamba Kab. Labusel, telah terjadi tindak pidana pencurian gelang emas london 40 Gram , gelang emas keroncong 5 mayam , uang tunai Rp. 2.000.000Kerugian Rp. 45.000.000,- ( Empat Puluh Lima Juta Rupiah)'),
(63, 'LP/14/I/RES.1.8./2021 ', '0000-00-00', 'pencurian-ringan', 2, 7, 0, 52, 363483, 'Pada hari Sabtu Tgl 23 Januari  2021 sekira pukul 11.30 wib di Blok A Kebun PT.Wisu Indo Jaya Dusun Cinta Makmur Desa Asam Jawa Kec.Torgamba Kab.Labuhanbtu Selatan,telah terjadi tindak pidana Pencurian 6 (enam)Tros Buah Kelapa Sawit  ');

-- --------------------------------------------------------

--
-- Table structure for table `tkp`
--

CREATE TABLE `tkp` (
  `id` int(6) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sha1` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tkp`
--

INSERT INTO `tkp` (`id`, `nama`, `sha1`) VALUES
(1, 'Pajak', 'e03732680cc323e75b48ef4ff6c29fd264149d9f'),
(2, 'Bakaran Batu', '9fe20ef173c97f4b9a5d66942b05255c44d8be51'),
(3, 'PT. Wisu Indo Jaya Blok A Tio-tio', '06f75a033456c30c5263b337047f030edb0444e7'),
(4, 'SPBU Simpang Karo', 'b1e2b2b0f71cc6fcfda4cc1ce0e77473644b77c8'),
(5, 'Blok A Tio-tio', '5642e278b2ce869184b8140643d7ecfb75cba695'),
(6, 'Blok B', '478a55888ae164e9c91b06c937dad04d368dc52c'),
(7, 'Blok D', 'b21f0cf8c9e186feb47d4c40d0ced7ebe9b5667e'),
(8, 'Musholla', '885050edc51762621765b261814a571a2f3ae940'),
(9, 'Kantor KSU Ria Mandiri Jaya', 'a1a6e1a64b7f0bf395e9f18eedfcdb16c6f26b6c'),
(10, 'Blok B 1', '6436d823f0c5d6b15d8478aba8ae3bed178f54c4'),
(11, 'Ruko Aneka Ragam', 'a9708b33380acaa352e0b49966456d0c255bf67e'),
(12, 'Simpang Tugu', 'fbcd45f235e9e589300f3fbcefeb96bf2773b81e'),
(13, 'Kebun PT Wisu Indo Jaya Blok A Kampung M', 'dec77e01e0a67978b04bcc915f482d6b55d3d207'),
(14, 'Lorong Sidorukun', '9d7b9a79faaf983d61db824648216325ad9fe6b3'),
(15, 'Samping Gardu Listrik', '2e68bdf990387a21ed073377599d5585e93c00f7'),
(16, 'Budi Utama', '92741779a4ac77da8c343ad6fdb1e199c721fcce'),
(17, 'Warnet Golden', 'b9a63a983e3c8562377bc52402b671db3da7ba7b'),
(18, 'SPBU 13214103', '200bd326ebc106b4e95548970efe1686a2e63e23'),
(19, 'RAM', '77c7960e890deddebb7ff2e55e340d2ed1708368'),
(20, 'Gang Pihara', '45921541d8a956a9c57bc0a250938087763ec685'),
(21, 'PT. Wisu Indo Jaya Blok A', '4e94919c5aecd5e3c5ce563ae1408a1232ec5217'),
(22, 'Tio-tio Blok A 48', '452d85089b2b934d5ba961e231c47161802f0dd2'),
(23, 'Pasar IX', '38e3e96a8b2426827f359e28cdce1b89c8922f9a'),
(24, 'PT. Wisu Indo Jaya Blok F', 'cd9b697e03220ded97f37739c5a616876cf07464'),
(25, 'PT. Wisu Indo Jaya Blok A Petak II', 'a521f8a846f9c7d486f7efa82cabb845086ac1bf'),
(26, 'SPBU', '7a4150e958447e607c997daea2e25078ed58411d'),
(27, 'Toko Mitra Ponsel', '3e371ce01033b8089539774601a2fcebb47145ca'),
(28, 'PT. Nagamas Agro Mulia Kebun Cikampak', '734b0f35482414c0a229097e835a0ac31dfc25a3'),
(29, 'Blok C', '005043b517781d2e1ae21cf528d596bdc04cff8d'),
(30, 'Ladang Perseorangan', 'bc0151130cefcbd2c6194f4424174ebd8f98c8af'),
(31, 'Blok C Asam Jawa PT. Wisu Indo Jaya', 'ec7af08b7ed4e994f8f6e63edb7810a0cc5e8830'),
(32, 'PKS Cindur Torganda', '4b5a682ce8b84fe4bb4f3c32348ce3ccf7242e92'),
(33, 'Samping Tembok PKS Cindur PT. Torganda', 'a60362ff52c4967bc2e978a8b3b9d8e9a418b135'),
(34, 'Depan PMKS MAB', '0ceaba1e7da82114d5358ccd2b69c1dc6a5463db'),
(35, 'Depan Alfamart', 'f502e82c25bba5a06cf68ffa87ecd02371c1a975'),
(36, 'Kafe Melly', '2ef5c9a91ce5e7bbf9ca4853ee98d750dce08af0'),
(37, 'Simpang Sopo Godang', '7ee6941e88e4d6a2aee7a8f5b096222197e1f933'),
(38, 'Depan Kios Pajak', '10fa793f0197ac257236c83822f6dc0e018fda1b'),
(39, 'Perumahan', 'ca4a23ce0e639294ed0e8f7fc1d8cab58ffb0708'),
(40, 'Warung Nasi Bunda', '613450c51ae07a90e588c6ec8b0ec5cba09b2c1d'),
(41, 'Parkiran Masjid', '7b2975247f68ba784284f4a8bec5d7794c43c112'),
(42, 'Cafe Berta', '8fca77af2ddc21f797f02a01f52efadf62265e6a'),
(43, 'Doorsmer Fajar', '3d15af1964373f53c1a380c2b1ab5e955313517c'),
(44, 'Depan Rumah Makan Sileman', '948113e5263e22ef5ca9845ebf02172758476a34'),
(45, 'Kebun TH', '92866a529c6532a1b590601f0ac782e730aafa68'),
(46, 'Simpang Milano', '7ac865f3df2607a0cb5d4e1564989694c3ae1178'),
(47, 'PT. Wisu Indo Jaya Blo II D', 'a71f7f5e26f9a28c0166f3072344d0b744433cf2'),
(48, 'Perumahan PKS Torgamba', '5b17f03ff867a86e7fa500d29981fbe3db97018e'),
(49, 'Depan Warung Robet Hutagaol', 'be76ebfef7cbce4bccd974a1a56e9ac9bcbf318d'),
(50, 'Tempat Parkir Halaman Rumah', '019625c5656a8e67764c3e5c1085a4f3120dfa68'),
(51, 'Perumahan Pulo Intan', '3faf3f46159d50e2bc3e49d0fc50aa5fc41de97e'),
(52, 'Blok A Kebun PT.Wisu Indo Jaya', 'cbfab175e2ed6645f68291396e7cb6a60123ade6');

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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `email_confirm`
--
ALTER TABLE `email_confirm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan-kriminal`
--
ALTER TABLE `laporan-kriminal`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tkp`
--
ALTER TABLE `tkp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
