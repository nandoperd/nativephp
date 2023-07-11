-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2023 pada 10.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `native`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bola`
--

CREATE TABLE `bola` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `club` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `ovr` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bola`
--

INSERT INTO `bola` (`id`, `nama`, `club`, `posisi`, `ovr`, `foto`) VALUES
(4, 'Drogba', 'Chelsea', 'ST', '99', '649ff0a05f66c.png'),
(5, 'Puyol', 'Barcelona', 'CB', '88', '649ff0f24b564.png'),
(6, 'Guti H', 'Madrid', 'CM', '87', '649ff13fc67d6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(14, 'root', '$2y$10$edc7QiHybYQMv34Q15GKQeITEdH7YwnMaba4cbe6mu8wJgFd3Ezs6'),
(15, 'admin', '$2y$10$dlzL2XClqTgns7vt6x.7E.vt7Dl.MQ3pGBWt02Fmmi05Yz5Nm094u'),
(16, 'john', '$2y$10$9xUYQRRnDvAml2Rt3z94eeUM24ruZ6xkHUTXPhQhzg6GWevgSwCUu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bola`
--
ALTER TABLE `bola`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bola`
--
ALTER TABLE `bola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
