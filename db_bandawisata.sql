-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bandawisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `email`, `hashed_password`) VALUES
(4, 'admin1', 'admin1', 'admin1@gmail.com', '$2y$10$zAAf.uhguadNm4R0DiE9tOtAY1jTGBNaz5n7cFM2UnKBtnTpa4m5i');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id` int(11) NOT NULL,
  `slug_penginapan` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `created_at` text NOT NULL,
  `created_by` text NOT NULL,
  `updated_at` text NOT NULL,
  `updated_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id`, `slug_penginapan`, `nama`, `gambar`, `deskripsi`, `alamat`, `latitude`, `longitude`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'hermes-palace-hotel', 'Hermes Palace Hotel', '1720371173_213e43ae08de1b9ca711.jpg', '&lt;p&gt;...&lt;/p&gt;', 'Jl. T. Panglima Nyak Makam, Lambhuk, Kec. Ulee Kareng, Kota Banda Aceh, Aceh 23117', '5.55592704147531', '95.34372716683225', '02 July 2024, 23:30:42', 'admin1', '07 July 2024, 23:55:16', 'admin2'),
(3, 'hotel-kyriad-muraya', 'Hotel Kyriad Muraya', '1720371488_43d0fe2127d66502f670.jpg', '&lt;p&gt;...&lt;/p&gt;', 'Jl. Tgk. Moh. Daud Beureueh No.5, Laksana, Kec. Kuta Alam, Kota Banda Aceh, Aceh 23122', '5.55647735521217', '5.55647735521217', '07 July 2024, 23:58:08', 'admin1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `slug_wisata` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `created_at` text NOT NULL,
  `created_by` text NOT NULL,
  `updated_at` text NOT NULL,
  `updated_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `slug_wisata`, `nama`, `gambar`, `deskripsi`, `alamat`, `latitude`, `longitude`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'masjid-raya-baiturrahman', 'Masjid Raya Baiturrahman', '1719932154_f68dcbf1275f46ebd04a.jpg', '&lt;p&gt;Halowww &lt;strong&gt;yyyyy&lt;/strong&gt;&lt;/p&gt;', 'sdecvesd', '5.553538168311385', '95.31727728832449', '01 July 2024, 23:47:34', 'tesss', '07 July 2024, 23:08:39', 'admin2'),
(3, 'museum-tsunami', 'Museum Tsunami', '1720368649_8344ebca30d1681cf3f8.jpg', '&lt;p&gt;...&lt;/p&gt;', 'Jl. Sultan Iskandar Muda No.3, Sukaramai, Kec. Baiturrahman, Kota Banda Aceh, Aceh 23116', '5.547696876558857', '5.547696876558857', '07 July 2024, 23:10:49', 'admin1', '', ''),
(4, 'kapal-apung', 'Kapal Apung', '1720368815_95d030cef24fd0e08c88.jpg', '&lt;p&gt;...&lt;/p&gt;', 'Punge Blang Cut, Kec. Jaya Baru, Kota Banda Aceh, Aceh 23116', '5.546401812343338', '5.546401812343338', '07 July 2024, 23:13:35', 'admin1', '', ''),
(5, 'pantai-ulee-lheue', 'Pantai Ulee Lheue', '1720369392_baf4642e2ab1130e4009.jpg', '&lt;p&gt;...&lt;/p&gt;', 'H75P+W42, Ulee Lheue, Kec. Meuraxa, Kota Banda Aceh, Aceh', '5.5596199212472355', '5.5596199212472355', '07 July 2024, 23:23:12', 'admin1', '', ''),
(6, 'monumen-kapal-tsunami-lampulo', 'Monumen Kapal Tsunami Lampulo', '1720369626_a397aed04eb74066340e.jpg', '&lt;p&gt;...&lt;/p&gt;', 'H8FG+X3J, Lampulo, Kec. Kuta Alam, Kota Banda Aceh, Aceh', '5.57495727917463', '5.57495727917463', '07 July 2024, 23:27:06', 'admin1', '', ''),
(7, 'pemakaman-kerkhoff-poetjoet', 'Pemakaman Kerkhoff Poetjoet', '1720370025_bf3712f6800f76ce8fea.jpg', '&lt;p&gt;&lt;strong&gt;Kerkhof Peucut&lt;/strong&gt;&amp;nbsp;adalah kuburan serdadu&amp;nbsp;Belanda&amp;nbsp;(KNIL) yang tewas pada&amp;nbsp;Perang Aceh&amp;nbsp;dalam rentang tahun 1873 hingga 1904. Pemakaman ini merupakan pemakaman militer belanda terbesar yang berada di luar&amp;nbsp;Belanda&amp;nbsp;dengan luas mencapai 3,5 hektare.&amp;nbsp;Kompleks kuburan militer belanda semacam ini banyak tersebar di wilayah Indonesia, tetapi di Aceh merupakan salah satu komplek kuburan yang paling luas dengan jumlah korban &amp;plusmn; 2200 tentara. Kerkhof Peucut ini terletak di pusat kota&amp;nbsp;Banda Aceh, dan sekarang menjadi objek wisata menarik, khususnya bagi wisatawan mancanegara (terutama wisatawan asal Belanda).&lt;/p&gt;&lt;p&gt;Selain tentara Belanda, tentara&amp;nbsp;KNIL&amp;nbsp;dari suku Jawa, Batak, Ambon dan pribumi Aceh juga dimakamkan di Kerkhof Peucut ini termasuk juga makam putra&amp;nbsp;Sultan Iskandar Muda,&amp;nbsp;Meurah Popok&amp;nbsp;yang tewas dihukum&amp;nbsp;rajam&amp;nbsp;oleh ayahandanya karena dituduh&amp;nbsp;berzina&amp;nbsp;pada tahun 1636 berada disini.&lt;/p&gt;', 'G8W7+PQ5, Peucut, Sukaramai, Kec. Baiturrahman, Kota Banda Aceh, Aceh 23116', '5.546722519333653', '5.546722519333653', '07 July 2024, 23:33:45', 'admin1', '', ''),
(8, 'lapangan-blang-padang', 'Lapangan Blang Padang', '1720370471_e628289b235d3622d04d.jpg', '&lt;p&gt;Lapangan Blang Padang merupakan salah satu alun-alun di Banda&amp;nbsp;Aceh.&amp;nbsp;&lt;br /&gt;Lapangan yang memiliki luas hampir 6 hektar ini, disuguhkan dengan bentangan rerumputan hijau. Juga dilengkapi dengan fasilitas olahraga seperti jalur&lt;em&gt;&amp;nbsp;track jogging&lt;/em&gt;&amp;nbsp;yang mengelilingi lapangan.&lt;br /&gt;&lt;br /&gt;Pada lapangan terbuka hijau itu tidak jauh dari pusat kota Banda&amp;nbsp;Aceh. Dari titik nol pusat kota Banda&amp;nbsp;Aceh, bisa berjalan sekitar 30 meter.&lt;/p&gt;&lt;p&gt;Di lapangan Blang Padang juga terdapat replika pesawat Dakota RI-001 &amp;ldquo;SEULAWAH&amp;rdquo;&lt;/p&gt;&lt;p&gt;Disudut lapangan Blang Padang, tepatnya disamping monumen pesawat RI-OO1 terdapat tugu peringatan tsunami, tugu ini didirikan pada tahun 2008.&lt;/p&gt;&lt;p&gt;Tepat disamping joging track, kita bisa menemukan bangunan yang menyerupai perahu. Bangunan tersebut dinamakan &amp;ldquo;monument ACEH THANKS TO THE WORLD&amp;rdquo;.&lt;/p&gt;&lt;p&gt;Di setiap monumen yang menyerupai perahu tersebut masing-masing bertuliskan nama-nama negara donator bencana tsunami&amp;nbsp;&lt;a href=&quot;https://serambiwiki.tribunnews.com/tag/aceh&quot;&gt;Aceh&lt;/a&gt;.&lt;/p&gt;&lt;p&gt;Hembusan angin di daerah lapangan ini cukup kencang, sangat cocok buat kalian yang ingin merasakan angin santai sambil menikmati pandangan rumput hijau, tempat ini sangat direkomendasikan untuk bersantai, barmain maupun berolahraga.&lt;/p&gt;', 'Kp. Baru, Kec. Baiturrahman, Kota Banda Aceh, Aceh 23116', '5.54999811932514', '5.54999811932514', '07 July 2024, 23:41:11', 'admin1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
