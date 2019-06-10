-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2019 pada 09.49
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meminjam`
--

CREATE TABLE `meminjam` (
  `kode_pinjam` int(15) NOT NULL,
  `id_ruang` int(15) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meminjam`
--

INSERT INTO `meminjam` (`kode_pinjam`, `id_ruang`, `nama_peminjam`, `nama_ruang`, `nama_kegiatan`, `start_date`, `end_date`, `status`, `color`) VALUES
(1002, 101, 'Fatur', 'R. SIDANG PROF. IR. R. SOEDIRO', 'Ngaji Kuy', '2019-01-30 09:20:24', '2019-01-31 13:49:55', 'Belum Disetujui', '#FF0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(15) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL,
  `lantai` varchar(5) NOT NULL,
  `fasilitas1` varchar(255) NOT NULL,
  `fasilitas2` varchar(255) NOT NULL,
  `fasilitas3` varchar(255) NOT NULL,
  `fasilitas4` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `koor_ruang` varchar(50) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`, `gedung`, `lantai`, `fasilitas1`, `fasilitas2`, `fasilitas3`, `fasilitas4`, `status`, `koor_ruang`, `id_user`) VALUES
(101, 'R. SIDANG PROF. IR. R. SOEDIRO', 'A', '1', '', 'dapur', 'tv', 'kamar mandi dalam', 'belum', '-', 1),
(102, 'R. SIDANG UTAMA', 'A', '1', '-', '-', '-', '-', 'sudah', '-', 1),
(103, 'R. SEMINAR 1', 'A', '3', '-', '-', '-', '-', '-', '-', 1),
(104, 'R. SEMINAR 2', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(105, 'R. KULIAH 2', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(106, 'R. KULIAH 3', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(107, 'R. KULIAH 4', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(108, 'R. KULIAH 5', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(109, 'R. KULIAH 7', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(110, 'R. KULIAH 8', 'A ', '4', '-', '-', '-', '-', '-', '-', 1),
(111, 'R. KULIAH 9', 'A', '4', '-', '-', '-', '-', '-', '-', 1),
(112, 'R. SEMINAR 3', 'A', '5', '-', '-', '-', '-', '-', '-', 1),
(113, 'R. KULIAH 13', 'A', '5', '-', '-', '-', '-', '-', '-', 1),
(114, 'R. KULIAH 14', 'A', '5', '-', '-', '-', '-', '-', '-', 1),
(115, 'AULA', 'A', '6', '-', '-', '-', '-', '-', '-', 1),
(116, 'B.201 (R. KONFERENSI) ', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(117, 'B.202 (R. TRANSIT, R. RAPAT)', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(118, 'B.203 (R. UJIAN DOKTOR)', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(119, 'B.204', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(120, 'B.205 (R. DOSEN 4)', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(121, 'B.206 (R. DOSEN 3)', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(122, 'B.207 (R. DOSEN 2)', 'B', '2', '-', '-', '-', '-', '-', '-', 1),
(123, 'B.208 (R. DOSEN 1)', 'B', '2', '-', '-', '-', '-', '-', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `telepon`, `username`, `password`, `level`) VALUES
(1, 'admin1', '081390200649', 'admin1', 'admin1', 'admin'),
(2, 'admin2', '081390200888', 'admin2', 'admin2', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_admin` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `kode_pinjam` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD CONSTRAINT `meminjam_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
