-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Agu 2019 pada 08.19
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

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
-- Struktur dari tabel `data`
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
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`no`, `date`, `link_id`, `upload_by`, `send_to`, `name_doc`, `ket_doc`, `tgl_contract`, `link_con`, `status`) VALUES
(2, '2019-08-09', 'test', 'JOG.MB.ekacahyo', 'Legal', 'Coba', 'Coba', '2019-08-10', 'notset', 0),
(3, '2019-08-09', 'test', 'JOG.MB.ekacahyo', 'Legal', 'Coba', 'Coba', '2019-08-10', 'notset', 0),
(4, '2019-08-09', 'test', 'JOG.MB.ekacahyo', 'Legal', 'Coba', 'Coba', '2019-08-10', 'notset', 0),
(5, '2019-08-09', 'key%500%ekacahyo%500%3', 'JOG.MB.ekacahyo', 'Legal', 'Coba', 'Coba', '2019-08-10', 'notset', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_berkas`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_link`
--

CREATE TABLE `data_link` (
  `no` int(10) NOT NULL,
  `link_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_link`
--

INSERT INTO `data_link` (`no`, `link_id`, `link`, `date`) VALUES
(1, 'test', '../uploaddata/2019-08-10-02-57-33-bab.jpg', '2019-08-09'),
(2, 'key%500%ekacahyo%500%3', '../uploaddata/2019-08-10-02-58-28-bab.jpg', '2019-08-09'),
(3, 'key%500%ekacahyo%500%3', '../uploaddata/2019-08-10-03-13-04-bab.jpg', '2019-08-09'),
(4, 'key%500%ekacahyo%500%3', '../uploaddata/2019-08-10-03-22-46-bab.jpg', '2019-08-09'),
(5, 'key%500%ekacahyo%500%3', 'fafs', '2019-08-10'),
(6, 'key%500%ekacahyo%500%3', 'fafs', '2019-08-10'),
(7, 'key%500%ekacahyo%500%3', 'fafs', '2019-08-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_perusahaan`
--

CREATE TABLE `data_perusahaan` (
  `no` int(50) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `id_key_perusahaan` varchar(50) NOT NULL,
  `statsus` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
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
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`no`, `username`, `pass`, `ip`, `date`, `ket`, `keyuser`) VALUES
(5, 'das', 'dasd', '192.168.64.1', '2019-08-09', 1, 'Das'),
(6, 'das', 'dasd', '192.168.64.1', '2019-08-09', 1, 'Das'),
(7, 'das', 'dasd', '192.168.64.1', '2019-08-09', 1, 'Das'),
(8, 'das', 'dasd', '192.168.64.1', '2019-08-09', 1, 'Das'),
(9, 'das', 'dasd', '192.168.64.1', '2019-08-09', 1, 'Das');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kat` int(10) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kat`, `value`) VALUES
(1, 'Legal'),
(2, 'Sales');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `ket` int(11) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keterangan`
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
-- Struktur dari tabel `message`
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

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`no`, `tgl`, `upload_by`, `send_to`, `value`, `id_data`, `id_message`) VALUES
(1, '2019-08-09', 'JOG.MB.ekacahyo', 'Sales', 'Haallo World', 'key%500%ekacahyo%500%3', 0),
(2, '2019-08-10', 'JOG.MB.ekacahyo', 'Sales', 'Kurang', 'key%500%ekacahyo%500%3', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `username`, `password`, `keyuser`, `jabatan`, `last_login`, `register`, `status`, `kat`) VALUES
('Eka Cahyono', 'ekacahyo', 'test', 'JOG.MB.ekacahyo', 1, '2019-08-08', '2019-08-08', 1, 2),
('Eka Melati', 'ekamelati', 'test', 'JOG.MB.ekamelati', 1, '2019-08-08', '2019-08-08', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`),
  ADD KEY `upload_by` (`upload_by`),
  ADD KEY `send_to` (`send_to`),
  ADD KEY `tgl_cat` (`tgl_contract`);

--
-- Indeks untuk tabel `data_berkas`
--
ALTER TABLE `data_berkas`
  ADD PRIMARY KEY (`no`),
  ADD KEY `key_berkas` (`id_key_berkas`);

--
-- Indeks untuk tabel `data_link`
--
ALTER TABLE `data_link`
  ADD PRIMARY KEY (`no`),
  ADD KEY `link_id` (`link_id`);

--
-- Indeks untuk tabel `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `key_perusahaan` (`id_key_perusahaan`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`no`),
  ADD KEY `username` (`username`(100)),
  ADD KEY `keyuser` (`keyuser`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`ket`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`no`),
  ADD KEY `upload_by` (`upload_by`),
  ADD KEY `send_to` (`send_to`),
  ADD KEY `id_data` (`id_data`),
  ADD KEY `id_message` (`id_message`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `keyuser` (`keyuser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_berkas`
--
ALTER TABLE `data_berkas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_link`
--
ALTER TABLE `data_link`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
