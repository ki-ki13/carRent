-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2020 pada 04.06
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `email`, `nama`, `alamat`, `no_telp`) VALUES
(3, 'qiuqiu', '$2y$10$nKPRYa05FHrtBBoDXmjSPuz0yX984TVX9nPNCSIn54Q9GicnbMag2', 'rmph13@gmail.com', 'qiuqiu', 'qiuqiu', 918827827),
(5, 'ikik', '$2y$10$Blxj/g2NHL653QrW.AA53elwYqqMRFLXOohzwT75LjzM9lyrpjRyy', 'rizkimah125@gmail.com', 'qq', 'qq', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_scooter` int(11) NOT NULL,
  `tanggal_penyewaan` date NOT NULL,
  `waktu` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `id_pelanggan`, `id_scooter`, `tanggal_penyewaan`, `waktu`, `total_harga`) VALUES
(40, 5, 2, '2020-12-31', 2, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan_produk`
--

CREATE TABLE `penyewaan_produk` (
  `id_penyewaan_scooter` int(11) NOT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `id_scooter` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `scooter`
--

CREATE TABLE `scooter` (
  `id_scooter` int(11) NOT NULL,
  `nama_scooter` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `scooter`
--

INSERT INTO `scooter` (`id_scooter`, `nama_scooter`, `harga`, `foto`, `status`) VALUES
(1, 'scooter 1', 30000, 'scooter1.jpg', 'avalaible'),
(2, 'scooter 2', 40000, 'scooter2.jpg', 'rent'),
(3, 'scooter 3', 45000, 'scooter3.jpg', 'avalaible'),
(4, 'scooter 4', 50000, 'scooter4.jpg', 'avalaible'),
(5, 'scooter 5', 55000, 'scooter5.jpg', 'avalaible'),
(6, 'scooter 6', 60000, 'scooter6.jpg', 'avalaible'),
(7, 'scooter 7', 65000, 'scooter7.jpg', 'avalaible'),
(8, 'scooter 8', 70000, 'scooter8.jpg', 'avalaible'),
(9, 'scooter 9', 75000, 'scooter9.jpg', 'avalaible'),
(10, 'scooter 10', 80000, 'scooter10.jpg', 'avalaible');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`);

--
-- Indeks untuk tabel `penyewaan_produk`
--
ALTER TABLE `penyewaan_produk`
  ADD PRIMARY KEY (`id_penyewaan_scooter`);

--
-- Indeks untuk tabel `scooter`
--
ALTER TABLE `scooter`
  ADD PRIMARY KEY (`id_scooter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `penyewaan_produk`
--
ALTER TABLE `penyewaan_produk`
  MODIFY `id_penyewaan_scooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `scooter`
--
ALTER TABLE `scooter`
  MODIFY `id_scooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
