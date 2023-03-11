-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2023 pada 09.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_bayar`
--

CREATE TABLE `tb_jenis_bayar` (
  `id_jenis_bayar` int(11) NOT NULL,
  `nama_jenis_bayar` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_bayar`
--

INSERT INTO `tb_jenis_bayar` (`id_jenis_bayar`, `nama_jenis_bayar`, `deleted`) VALUES
(1, 'tes update', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_laundry`
--

CREATE TABLE `tb_jenis_laundry` (
  `id_jenis_laundry` int(11) NOT NULL,
  `nama_jenis_laundry` varchar(50) NOT NULL,
  `harga_jenis_laundry` varchar(6) NOT NULL,
  `deskripsi_jenis_laundry` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_laundry`
--

INSERT INTO `tb_jenis_laundry` (`id_jenis_laundry`, `nama_jenis_laundry`, `harga_jenis_laundry`, `deskripsi_jenis_laundry`, `deleted`) VALUES
(1, 'terd wrtwew', '234242', '243242gdg sdfsgas', 1),
(2, 'Paket Cuci ', '3000', '243242gdg sdfsgas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `no_telepon_owner` varchar(13) NOT NULL,
  `email_owner` varchar(30) NOT NULL,
  `password_owner` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama_owner`, `no_telepon_owner`, `email_owner`, `password_owner`, `deleted`) VALUES
(1, 'aa', '2132', 'aa@email', '4124bc0a9335c27f086f24ba207a4912', 1),
(2, 'aang', '4322342', 'aas@email.com', 'f6370072befd38971d7b70ace0555f1a', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` text NOT NULL,
  `no_telepon_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `no_telepon_pelanggan`, `alamat_pelanggan`, `deleted`) VALUES
(1, 'tes update', 'tesupdate@email.com', 'admin', '3423432', 'teds', 0),
(2, 'tes', 'tes3@email.com', '450a6da43762cc60f1de29e40af78395', '4242', 'rwewrwrwrw erserw', 1),
(3, 'tes 2', '-', '-', '536', 'dgdf', 0),
(4, 'tes 3', '-', '-', '5363', 'dgdf', 0),
(5, 'tes 3', '-', '-', '53633', 'dgdf', 0),
(6, 'tes 32', '-', '-', '5362', 'dgdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_pembayaran` int(7) NOT NULL,
  `total_bayar` int(7) NOT NULL,
  `kembalian` int(7) NOT NULL,
  `status_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_staf`
--

CREATE TABLE `tb_staf` (
  `id_staf` int(11) NOT NULL,
  `nama_staf` varchar(50) NOT NULL,
  `no_telepon_staf` varchar(13) NOT NULL,
  `email_staf` varchar(30) NOT NULL,
  `password_staf` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_staf`
--

INSERT INTO `tb_staf` (`id_staf`, `nama_staf`, `no_telepon_staf`, `email_staf`, `password_staf`, `deleted`) VALUES
(1, 'Aang Edit', '124141232', 'aangeedit@email.com', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_jenis_laundry` int(11) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `harga_paket` int(7) NOT NULL,
  `berat_barang` int(3) NOT NULL,
  `total_harga` int(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_transaksi` varchar(25) NOT NULL,
  `status_bayar` varchar(25) NOT NULL,
  `catatan_pelanggan` text NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan`, `id_jenis_laundry`, `no_transaksi`, `harga_paket`, `berat_barang`, `total_harga`, `tgl_transaksi`, `status_transaksi`, `status_bayar`, `catatan_pelanggan`, `deleted`) VALUES
(1, 4, 2, 'TR00001', 3000, 3, 9000, '2023-03-11', 'Aktif', 'Belum Lunas', 'tydf', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis_laundry`
--
ALTER TABLE `tb_jenis_laundry`
  ADD PRIMARY KEY (`id_jenis_laundry`);

--
-- Indeks untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_staf`
--
ALTER TABLE `tb_staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_laundry`
--
ALTER TABLE `tb_jenis_laundry`
  MODIFY `id_jenis_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_staf`
--
ALTER TABLE `tb_staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
