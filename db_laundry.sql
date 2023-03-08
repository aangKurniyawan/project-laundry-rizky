-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 02:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tb_owner`
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
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama_owner`, `no_telepon_owner`, `email_owner`, `password_owner`, `deleted`) VALUES
(1, 'aa', '2132', 'aa@email', '4124bc0a9335c27f086f24ba207a4912', 1),
(2, 'aang', '4322342', 'aas@email.com', 'f6370072befd38971d7b70ace0555f1a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
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
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `no_telepon_pelanggan`, `alamat_pelanggan`, `deleted`) VALUES
(1, 'tes update', 'tesupdate@email.com', 'admin', '3423432', 'teds', 0),
(2, 'tes', 'tes3@email.com', '450a6da43762cc60f1de29e40af78395', '4242', 'rwewrwrwrw erserw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_staf`
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
-- Dumping data for table `tb_staf`
--

INSERT INTO `tb_staf` (`id_staf`, `nama_staf`, `no_telepon_staf`, `email_staf`, `password_staf`, `deleted`) VALUES
(1, 'Aang Edit', '124141232', 'aangeedit@email.com', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_staf`
--
ALTER TABLE `tb_staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_staf`
--
ALTER TABLE `tb_staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
