-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 06:53 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `no` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `link_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_by` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_to` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_doc` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_doc` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_contract` date NOT NULL,
  `link_con` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL,
  `date_confrm` date NOT NULL,
  `id_key_perusahaan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`no`, `date`, `link_id`, `upload_by`, `send_to`, `name_doc`, `ket_doc`, `tgl_contract`, `link_con`, `status`, `date_confrm`, `id_key_perusahaan`) VALUES
(1, '2019-08-14', 'key%500%JOG.MB%500%0', 'JOGMBSALES', 'Legal', 'CV. Mentari', 'test', '2019-08-16', 'notset', 2, '0000-00-00', 'VENDOR0');

-- --------------------------------------------------------

--
-- Table structure for table `data_berkas`
--

CREATE TABLE `data_berkas` (
  `no` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id_key_perusahaan` varchar(225) NOT NULL,
  `id_key_berkas` int(11) NOT NULL,
  `id_key_jenis` int(11) NOT NULL,
  `link_berkas` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_berkas`
--

INSERT INTO `data_berkas` (`no`, `date`, `id_key_perusahaan`, `id_key_berkas`, `id_key_jenis`, `link_berkas`, `status`, `expired`) VALUES
(1, '2019-08-14', 'VENDOR0', 0, 1, '../uploaddata/berkasperusahaan/2019-08-14-10-23-42-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-16'),
(2, '2019-08-14', 'VENDOR0', 0, 2, '../uploaddata/berkasperusahaan/2019-08-14-10-23-55-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '0000-00-00'),
(3, '2019-08-14', 'VENDOR0', 0, 2, '../uploaddata/berkasperusahaan/2019-08-14-10-24-11-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-17'),
(4, '2019-08-14', 'VENDOR0', 0, 3, '../uploaddata/berkasperusahaan/2019-08-14-10-24-39-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-16'),
(5, '2019-08-14', 'VENDOR0', 0, 4, '../uploaddata/berkasperusahaan/2019-08-14-10-25-01-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-16'),
(6, '2019-08-14', 'VENDOR0', 0, 5, '../uploaddata/berkasperusahaan/2019-08-14-10-25-22-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-09'),
(7, '2019-08-14', 'VENDOR0', 0, 5, '../uploaddata/berkasperusahaan/2019-08-14-10-25-50-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-17'),
(8, '2019-08-14', 'VENDOR0', 0, 6, '../uploaddata/berkasperusahaan/2019-08-14-10-26-03-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-17'),
(9, '2019-08-14', 'VENDOR0', 0, 7, '../uploaddata/berkasperusahaan/2019-08-14-10-26-16-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', 1, '2019-08-17'),
(10, '2019-08-17', 'VENDOR1', 0, 1, '../uploaddata/berkasperusahaan/2019-08-17-11-04-04-dokumen.tips_prezi-528-full-version-kuyhaapdf.pdf', 1, '0000-00-00'),
(11, '2019-08-17', 'VENDOR1', 0, 2, '../uploaddata/berkasperusahaan/2019-08-17-11-04-31-dokumen.tips_prezi-528-full-version-kuyhaapdf.pdf', 1, '2019-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `data_link`
--

CREATE TABLE `data_link` (
  `no` int(10) NOT NULL,
  `link_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `validate` date NOT NULL,
  `status` int(10) NOT NULL,
  `id` int(10) NOT NULL DEFAULT 0,
  `raw` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_link`
--

INSERT INTO `data_link` (`no`, `link_id`, `link`, `date`, `validate`, `status`, `id`, `raw`) VALUES
(1, 'key%500%JOG.MB%500%0', '../uploaddata/notadinas/2019-08-14-10-28-10-934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf', '2019-08-14', '2019-08-14', 1, 0, '934_PT. ANGKASA PURA 1_leonita_feb 2019.pdf'),
(2, 'key%500%JOG.MB%500%0', '../uploaddata/notadinas/2019-08-14-10-29-52-Program Kerja CommLeg 2018.pdf', '2019-08-14', '0000-00-00', 0, 2, 'Program Kerja CommLeg 2018.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_perusahaan`
--

CREATE TABLE `data_perusahaan` (
  `no` int(50) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `id_key_perusahaan` varchar(50) NOT NULL,
  `statsus` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_perusahaan`
--

INSERT INTO `data_perusahaan` (`no`, `nama_perusahaan`, `id_key_perusahaan`, `statsus`, `date`, `jenis`) VALUES
(1, 'CV. Mentari', 'VENDOR0', 1, '2019-08-14', 'FandB'),
(2, 'CV. mitra karya properti', 'VENDOR1', 1, '2019-08-17', 'cargo');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `no` int(11) NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `ket` int(11) NOT NULL,
  `keyuser` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`no`, `username`, `pass`, `ip`, `date`, `ket`, `keyuser`) VALUES
(1, 'ekamelati', 'test', '36.73.97.168', '2019-08-13', 8, 'JOG.MB.ekamelati'),
(2, 'ekacahyo', 'test', '36.73.97.168', '2019-08-13', 2, 'JOG.MB.ekacahyo'),
(3, 'ekacahyo', 'test', '36.73.97.168', '2019-08-13', 8, 'JOG.MB.ekacahyo'),
(4, 'ekacahyo', 'test', '36.73.97.168', '2019-08-13', 2, 'JOG.MB.ekacahyo'),
(5, 'ekacahyo', 'test', '36.73.97.168', '2019-08-13', 8, 'JOG.MB.ekacahyo'),
(6, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 2, 'JOGCLLEGAL'),
(7, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 9, 'JOGCLLEGAL'),
(8, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 8, 'JOGCLLEGAL'),
(9, 'JOG.MB', 'jogmb123', '117.102.64.98', '2019-08-14', 2, 'JOGMBSALES'),
(10, 'JOG.MB', 'jogmb123', '117.102.64.98', '2019-08-14', 8, 'JOGMBSALES'),
(11, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 2, 'JOGCLLEGAL'),
(12, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 8, 'JOGCLLEGAL'),
(13, 'JOG.MB', 'jogmb123', '117.102.64.98', '2019-08-14', 2, 'JOGMBSALES'),
(14, 'JOG.MB', 'jogmb123', '117.102.64.98', '2019-08-14', 8, 'JOGMBSALES'),
(15, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 2, 'JOGCLLEGAL'),
(16, 'ekacahyo', 'test', '36.73.97.168', '2019-08-14', 2, 'JOG.MB.ekacahyo'),
(17, 'JOG.CL', 'jogcl123', '140.213.90.142', '2019-08-14', 2, 'JOGCLLEGAL'),
(18, 'JOG.CL', 'jogcl123', '118.96.125.227', '2019-08-14', 2, 'JOGCLLEGAL'),
(19, 'JOG.CL', 'jogcl123', '118.96.125.227', '2019-08-14', 8, 'JOGCLLEGAL'),
(20, 'ekacahyo', 'test', '36.81.15.91', '2019-08-14', 2, 'JOG.MB.ekacahyo'),
(21, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 2, 'JOGCLLEGAL'),
(22, 'JOG.CL', 'jogcl123', '117.102.64.98', '2019-08-14', 8, 'JOGCLLEGAL'),
(23, 'JOG.MB', 'jogmb123', '117.102.64.98', '2019-08-14', 2, 'JOGMBSALES'),
(24, 'JOG.CL', 'jogcl123', '182.1.66.61', '2019-08-14', 2, 'JOGCLLEGAL'),
(25, 'JOG.CL', 'jogcl123', '36.81.32.76', '2019-08-14', 2, 'JOGCLLEGAL'),
(26, 'JOG.CL', 'jogcl123', '182.1.81.156', '2019-08-14', 8, 'JOGCLLEGAL'),
(27, 'JOG.MB', 'jogmb123', '114.125.94.18', '2019-08-14', 2, 'JOGMBSALES'),
(28, 'JOG.MB', 'jogmb123', '114.125.95.19', '2019-08-14', 3, 'JOGMBSALES'),
(29, 'JOG.CL', 'jogcl123', '36.81.32.76', '2019-08-14', 5, 'JOGCLLEGAL'),
(30, 'JOG.CL', 'jogcl123', '118.96.125.227', '2019-08-15', 2, 'JOGCLLEGAL'),
(31, 'JOG.CL', 'jogcl123', '118.96.125.227', '2019-08-15', 8, 'JOGCLLEGAL'),
(32, 'ekamelati', 'test', '::1', '2019-08-17', 9, 'JOG.MB.ekamelati'),
(33, 'ekacahyo', 'test', '::1', '2019-08-17', 2, 'JOG.MB.ekacahyo'),
(34, 'ekacahyo', 'test', '::1', '2019-08-18', 2, 'JOG.MB.ekacahyo');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kat` int(10) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `ket` int(11) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`ket`, `value`) VALUES
(1, 'Mencoba Masuk'),
(2, 'Masuk Portal'),
(3, 'Memasukan Nota Dinas Baru'),
(4, 'Menolak Nota Dinas'),
(5, 'Menerima Nota Dinas'),
(6, 'Merevisi Nota Dinas'),
(7, 'Menandatangani Nota Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `no` int(10) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `upload_by` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_to` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_data` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyuser` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` int(11) NOT NULL,
  `last_login` date NOT NULL DEFAULT current_timestamp(),
  `register` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `username`, `password`, `keyuser`, `jabatan`, `last_login`, `register`, `status`, `kat`) VALUES
('Eka Cahyono', 'ekacahyo', 'test', 'JOG.MB.ekacahyo', 1, '2019-08-08', '2019-08-08', 1, 2),
('Eka Melati', 'ekamelati', 'test', 'JOG.MB.ekamelati', 1, '2019-08-08', '2019-08-08', 1, 1),
('LEGAL 1', 'JOG.CL', 'jogcl123', 'JOGCLLEGAL', 1, '2019-11-11', '2019-08-12', 1, 1),
('SALES 1', 'JOG.MB', 'jogmb123', 'JOGMBSALES', 1, '2019-11-11', '2019-08-12', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`),
  ADD KEY `upload_by` (`upload_by`),
  ADD KEY `send_to` (`send_to`),
  ADD KEY `tgl_cat` (`tgl_contract`);

--
-- Indexes for table `data_berkas`
--
ALTER TABLE `data_berkas`
  ADD PRIMARY KEY (`no`),
  ADD KEY `key_berkas` (`id_key_berkas`);

--
-- Indexes for table `data_link`
--
ALTER TABLE `data_link`
  ADD PRIMARY KEY (`no`),
  ADD KEY `link_id` (`link_id`);

--
-- Indexes for table `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `key_perusahaan` (`id_key_perusahaan`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`no`),
  ADD KEY `username` (`username`(100)),
  ADD KEY `keyuser` (`keyuser`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`ket`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`no`),
  ADD KEY `upload_by` (`upload_by`),
  ADD KEY `send_to` (`send_to`),
  ADD KEY `id_data` (`id_data`),
  ADD KEY `id_message` (`id_message`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `keyuser` (`keyuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_berkas`
--
ALTER TABLE `data_berkas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_link`
--
ALTER TABLE `data_link`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
