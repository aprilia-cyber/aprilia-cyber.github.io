-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Apr 2016 pada 05.37
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Keterangan` varchar(225) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID`, `Nama`, `Harga`, `Stok`, `Keterangan`) VALUES
(21, 'Amplop Jaya No. 90 Merah', 15000, 10, 'Dus'),
(22, 'Buku Blok Note Besar', 3000, 18, 'Buah'),
(23, 'Bolpen Cello Candy GEL', 17500, 2, 'Lusin'),
(24, 'Binder Clip No. 260', 10000, 0, 'Dus Kecil'),
(25, 'Buku Kwitansi Besar', 4000, 23, 'Buah'),
(26, 'Buku Tulis SD 48 Lbr', 21000, 14, 'Pak'),
(27, 'Cutter L-500', 8000, 0, 'Buah'),
(28, 'Daimaru Lakban Kain 1,5&#8243;X12M', 9000, 8, 'Roll'),
(29, 'Gunting Joyko 848', 8500, 13, 'Buah'),
(30, 'Kertas Bola Dunia A4 80 Gram', 31000, 5, 'Riem'),
(31, 'Kertas Bola Dunia F4 80 Gram', 35000, 5, 'Riem'),
(32, 'Penggaris Besi 30 CM', 3000, 24, 'Buah'),
(33, 'Paper clip No. 1 sedang', 12000, 5, 'Dus'),
(34, 'Map transparant Uk folio / A4', 14000, 17, 'Pak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pembelian` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `Harga_Beli` int(11) NOT NULL,
  `Harga_Jual` int(11) NOT NULL,
  `Byk_Beli` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`ID`, `ID_Pembelian`, `ID_Barang`, `Harga_Beli`, `Harga_Jual`, `Byk_Beli`) VALUES
(71, 43, 21, 13500, 15000, 10),
(72, 44, 22, 2000, 3000, 25),
(73, 45, 23, 16000, 17500, 5),
(74, 46, 24, 8200, 10000, 15),
(75, 47, 25, 3500, 4000, 25),
(76, 48, 26, 19500, 21000, 15),
(77, 49, 27, 7500, 8000, 10),
(78, 50, 28, 8500, 9000, 12),
(79, 51, 29, 7000, 8500, 15),
(80, 52, 30, 28000, 31000, 25),
(81, 53, 31, 33500, 35000, 22),
(82, 54, 32, 2500, 3000, 24),
(83, 55, 33, 10000, 12000, 12),
(84, 56, 34, 12000, 14000, 8),
(85, 57, 23, 17000, 18500, 50),
(86, 58, 34, 12500, 14000, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pemesanan` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Byk_Pesan` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`ID`, `ID_Pemesanan`, `ID_Barang`, `Harga`, `Byk_Pesan`) VALUES
(74, 149, 22, 2500, 2),
(75, 150, 21, 15000, 1),
(76, 151, 21, 15000, 1),
(77, 151, 23, 17000, 1),
(78, 152, 22, 2500, 2),
(79, 152, 24, 9000, 1),
(80, 152, 26, 21000, 1),
(81, 153, 23, 17000, 1),
(82, 153, 24, 9000, 2),
(83, 154, 27, 8000, 1),
(84, 154, 28, 9000, 1),
(85, 155, 25, 4000, 2),
(86, 155, 29, 8000, 2),
(87, 155, 30, 31000, 1),
(88, 156, 22, 2500, 3),
(89, 156, 27, 8000, 3),
(90, 156, 28, 9000, 3),
(91, 156, 31, 35000, 3),
(92, 157, 23, 17000, 1),
(93, 157, 33, 12000, 2),
(94, 157, 34, 14000, 1),
(95, 158, 30, 31000, 5),
(96, 158, 31, 35000, 5),
(97, 158, 34, 14000, 5),
(98, 159, 30, 31000, 4),
(99, 159, 31, 35000, 4),
(103, 162, 27, 8000, 6),
(104, 163, 24, 10000, 12),
(111, 168, 21, 15000, 2),
(114, 175, 30, 31000, 5),
(115, 175, 31, 35000, 5),
(119, 180, 30, 31000, 5),
(120, 180, 33, 12000, 5),
(122, 182, 23, 17500, 50),
(123, 182, 27, 8000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Telp` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID`, `Username`, `Password`, `Nama`, `Telp`) VALUES
(1, 'celinmartha22', '2203', 'Celine Martha Sari', '087856771009'),
(2, 'atmisetia', 'php', 'Atmi Setiasari', '085755284116'),
(3, 'ayu', 'ayu', 'Ayu Sri Wahyuni', '085755234234'),
(4, 'nisa', 'nisa', 'Anisa Anggraeni', '081334335336'),
(6, 'izzi', 'izzi', 'Izzi Walhaiba', '085765890098'),
(7, 'admin', 'admin', 'Admin', '087856777999'),
(8, 'vina', 'vina', 'Vina Setya Ningsih', '087856777998'),
(9, 'devi', 'devi', 'Devi Amalia', '081335445665'),
(10, 'tina', 'tina', 'Tina', '081333666555');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Telp` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`ID`, `Nama`, `Alamat`, `Telp`) VALUES
(12, 'Erika Sukmawati', 'Jl.Anggrek no.51', '081999888222'),
(13, 'Hendra Wahyudi', 'Jl.Kencana no.4', '082111444333'),
(14, 'Atika Cahyani', 'Jl.Kaliurang no.123', '087654321098'),
(15, 'Kania Dwi Prastiwi', 'Jl.Mawar no.25', '085678910111'),
(16, 'Aditya Putra', 'Jl.Angkasa no.45', '081223113443'),
(17, 'Bobby Irawan', 'Jl.Cikalang no.76', '085098890678'),
(18, 'Citra Cantika', 'Jl.Mahakam no.87', '081657765776'),
(19, 'Fandi Akhmad', 'Jl.Kencana no.9', '085456654554'),
(20, 'Merry Riana', 'Jl.Candi Panggung no.23', '081222111333'),
(21, 'Putra Pratama', 'Jl.Bondowoso no.65', '085689765345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Barang` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Tgl_Pembelian` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`ID`, `ID_Barang`, `ID_Pegawai`, `Tgl_Pembelian`) VALUES
(43, 21, 1, '2015-10-10 09:35:45'),
(44, 22, 1, '2015-10-15 08:10:17'),
(45, 23, 1, '2015-11-01 10:10:44'),
(46, 24, 1, '2015-11-22 15:25:37'),
(47, 25, 2, '2015-12-05 08:50:07'),
(48, 26, 2, '2015-12-17 13:29:34'),
(49, 27, 2, '2016-01-18 14:55:24'),
(50, 28, 2, '2016-01-24 09:16:41'),
(51, 29, 1, '2016-02-18 11:24:57'),
(52, 30, 1, '2016-02-27 09:42:29'),
(53, 31, 2, '2016-03-22 15:37:29'),
(54, 32, 2, '2016-03-27 08:48:45'),
(55, 33, 1, '2016-04-01 12:45:34'),
(56, 34, 1, '2016-04-09 08:05:31'),
(57, 23, 1, '2016-04-20 17:15:39'),
(58, 34, 1, '2016-04-20 17:16:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pegawai` int(11) NOT NULL,
  `ID_Pembeli` int(11) NOT NULL,
  `Tgl_Pesan` datetime NOT NULL,
  `Status_Kirim` int(11) DEFAULT NULL,
  `ID_Pengirim` int(11) NOT NULL,
  `Tgl_Kirim` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`ID`, `ID_Pegawai`, `ID_Pembeli`, `Tgl_Pesan`, `Status_Kirim`, `ID_Pengirim`, `Tgl_Kirim`) VALUES
(149, 2, 12, '2015-10-22 09:56:04', 1, 1, '2015-10-22 15:19:05'),
(150, 2, 13, '2015-10-25 13:24:12', 1, 1, '2015-10-26 08:04:19'),
(151, 2, 14, '2015-11-24 11:56:03', 1, 2, '2015-11-24 15:04:54'),
(152, 1, 15, '2015-12-19 10:36:53', 1, 2, '2015-12-19 15:54:43'),
(153, 1, 16, '2015-12-28 10:01:15', 1, 1, '2015-12-28 15:43:45'),
(154, 1, 12, '2016-01-29 15:13:52', 1, 1, '2016-01-30 08:12:34'),
(155, 2, 17, '2016-02-28 11:22:34', 1, 2, '2016-02-28 15:56:54'),
(156, 2, 18, '2016-03-30 14:32:49', 1, 1, '2016-03-31 09:46:54'),
(157, 1, 12, '2016-04-12 08:32:13', 1, 2, '2016-04-12 13:42:54'),
(158, 1, 20, '2016-04-19 10:34:21', 1, 1, '2016-04-28 04:35:54'),
(159, 1, 12, '2016-04-21 05:18:06', 1, 1, '2016-04-28 04:36:14'),
(162, 7, 12, '2016-04-25 03:07:26', 1, 1, '2016-04-28 04:36:24'),
(163, 7, 12, '2016-04-25 03:27:03', 1, 1, '2016-04-28 04:36:32'),
(168, 7, 12, '2016-04-25 03:32:52', 1, 1, '2016-04-28 04:36:45'),
(175, 7, 12, '2016-04-25 04:30:01', 1, 2, '2016-04-28 04:37:15'),
(180, 7, 21, '2016-04-25 04:37:05', 1, 2, '2016-04-28 04:37:25'),
(182, 7, 12, '2016-04-25 04:42:03', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pemesanan` int(11) NOT NULL,
  `ID_Pengirim` int(11) NOT NULL,
  `Tgl_Kirim` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
