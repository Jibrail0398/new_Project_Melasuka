-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Nov 2023 pada 08.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melasuka-db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_users`
--

CREATE TABLE `data_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan_obat`
--

CREATE TABLE `golongan_obat` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `golongan_obat`
--

INSERT INTO `golongan_obat` (`id_golongan`, `nama_golongan_obat`) VALUES
(1, 'bebas terbatas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `nama_kategori`, `tanggal_ditambahkan`) VALUES
(1, 'Antibiotik', '2023-11-22 04:28:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `komposisi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `penyajian` varchar(50) NOT NULL,
  `cara_penyimpanan` varchar(50) NOT NULL,
  `nama_standar_mims` varchar(20) NOT NULL,
  `nomor_izin_edar` varchar(20) NOT NULL,
  `produsen` varchar(100) NOT NULL,
  `id_golongan_obat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_obat` varchar(255) NOT NULL,
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `kode_obat`, `id_kategori`, `nama_obat`, `komposisi`, `deskripsi`, `kemasan`, `dosis`, `penyajian`, `cara_penyimpanan`, `nama_standar_mims`, `nomor_izin_edar`, `produsen`, `id_golongan_obat`, `harga`, `stok`, `gambar_obat`, `tanggal_diubah`, `tanggal_ditambahkan`) VALUES
(1, 'GJ21KA', 1, 'amoksisilin', 'Vitamin B1 50mg, Vit B2 25mg, Vit B6 10 mg, Vit B12 5 mcg, Calcium Pantotenate 18,4 mg', 'asdassadsa', '1 Dos isi 10 Strip x 10 Tablet', 'anak anak 1 x sehari', 'Dapat diberikan setelah maka', 'Simpan di tempat kering', 'BECOM C TAB', 'SD081534111', 'PT SANBE FARMA', 1, 212321, 212, '/upload/obat/dssddwbdwdweffe.png', '2023-11-22 04:33:20', '2023-11-22 04:33:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `golongan_obat`
--
ALTER TABLE `golongan_obat`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`,`id_golongan_obat`),
  ADD KEY `id_golongan_obat` (`id_golongan_obat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `golongan_obat`
--
ALTER TABLE `golongan_obat`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD CONSTRAINT `data_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`),
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`id_golongan_obat`) REFERENCES `golongan_obat` (`id_golongan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
