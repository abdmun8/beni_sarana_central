-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jun 2017 pada 06.40
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saranacentral`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `username`, `password`, `Bagian`) VALUES
(1, 'muhammad lala', 'karawang', 'admin', 'bcc5a4a17e88b5a31d0450dd994cf677', 'produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `idbahan` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tebal` float NOT NULL,
  `berat` varchar(255) NOT NULL,
  `panjang` int(11) NOT NULL,
  `idspec` int(11) NOT NULL,
  `idsumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`idbahan`, `lebar`, `tebal`, `berat`, `panjang`, `idspec`, `idsumber`) VALUES
(1, 1219, 0.75, '10', 1393, 7, 5),
(2, 1219, 0.65, '50', 8039, 7, 5),
(4, 32243, 2341, '4222', 332, 7, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `idbahanbaku` int(11) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `stocklapangan` float NOT NULL,
  `stockgudang` float NOT NULL,
  `stock` float NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahanbaku`
--

INSERT INTO `bahanbaku` (`idbahanbaku`, `spesifikasi`, `stocklapangan`, `stockgudang`, `stock`, `keterangan`) VALUES
(1, 'Jumbo Ingot', 45, 45, 90, 'pas'),
(2, 'Alumunium Murni', 20, 20, 40, 'pas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coat`
--

CREATE TABLE `coat` (
  `idcoat` int(11) NOT NULL,
  `namacoat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coat`
--

INSERT INTO `coat` (`idcoat`, `namacoat`) VALUES
(3, 'Z22'),
(5, 'Z18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `namacolor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `color`
--

INSERT INTO `color` (`idcolor`, `namacolor`) VALUES
(1, 'MERAH MARJAN'),
(2, 'MERAH RUBI'),
(3, 'BIRU SAFIR'),
(4, 'HIJAU NURI'),
(5, 'PUTIH KALIMAYA'),
(6, 'HIJAU BACAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `namacustomer` varchar(255) NOT NULL,
  `alamatcustomer` varchar(255) NOT NULL,
  `telpcustomer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `estimasiccl`
--

CREATE TABLE `estimasiccl` (
  `idccl` int(11) NOT NULL,
  `tebal` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `idspec` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `mill` int(11) NOT NULL,
  `idcoat` int(11) NOT NULL,
  `rencana_produksi` date NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `estimasicgl`
--

CREATE TABLE `estimasicgl` (
  `idcgl` int(11) NOT NULL,
  `tebal` float NOT NULL,
  `lebar` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `idsumber` int(11) NOT NULL,
  `mpm` int(11) DEFAULT NULL,
  `menit` int(11) DEFAULT NULL,
  `jam` int(11) DEFAULT NULL,
  `idspec` int(11) NOT NULL,
  `idcoat` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `berattarget` float NOT NULL,
  `idfinished` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date DEFAULT NULL,
  `selesai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `estimasicgl`
--

INSERT INTO `estimasicgl` (`idcgl`, `tebal`, `lebar`, `berat`, `panjang`, `idsumber`, `mpm`, `menit`, `jam`, `idspec`, `idcoat`, `idorder`, `berattarget`, `idfinished`, `keterangan`, `tgl`, `selesai`) VALUES
(1, 0.75, 1219, 10, 1393, 5, 0, 0, 0, 7, 3, 1, 43445, 2, 'ini saja', '2017-06-02', 1),
(2, 0.75, 1219, 10, 1393, 5, 0, 0, 0, 7, 3, 1, 43445, 2, 'apa saja', '2017-05-30', 1),
(3, 2, 2, 2, 2, 5, 2, 1, 1, 7, 5, 1, 22, 2, '2', '2017-05-24', 0),
(4, 2, 2, 22, 45, 5, 2, 1, 1, 7, 5, 1, 45, 2, '55', '2017-06-14', 0),
(5, 2343, 345, 345342, 445, 5, 0, 0, 0, 7, 5, 1, 345, 2, 'vvr', '2017-06-26', 0),
(6, 12233, 2222, 222, 21, 5, 22, 0, 0, 7, 5, 1, 223, 2, 'fgbd', '2017-06-26', 0),
(7, 345, 433, 455, 334, 5, 46, 23, 11, 7, 5, 1, 43, 2, 'gdd', '2017-06-04', 0),
(8, 2, 2, 222222222, 2, 5, 7077, 118, 2, 7, 5, 1, 23, 2, 'fd', '2017-06-26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `estimasicsl`
--

CREATE TABLE `estimasicsl` (
  `idcsl` int(11) NOT NULL,
  `tebal` float NOT NULL,
  `lebar` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `idsumber` int(11) NOT NULL,
  `mpm` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `idspec` int(11) NOT NULL,
  `idcoat` int(11) NOT NULL,
  `berattarget` float NOT NULL,
  `idorder` int(11) NOT NULL,
  `idfinished` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `finished`
--

CREATE TABLE `finished` (
  `idfinished` int(11) NOT NULL,
  `namafinished` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `finished`
--

INSERT INTO `finished` (`idfinished`, `namafinished`) VALUES
(2, 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `idorder` int(11) NOT NULL,
  `namaorder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`idorder`, `namaorder`) VALUES
(1, 'DECKING'),
(3, 'KABEL'),
(4, 'DUCTING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spec`
--

CREATE TABLE `spec` (
  `idspec` int(11) NOT NULL,
  `namaspec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spec`
--

INSERT INTO `spec` (`idspec`, `namaspec`) VALUES
(3, 'SGCC'),
(4, 'HARD'),
(5, 'SPCC-1B'),
(6, 'SPCC-1D'),
(7, 'G-550');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `idsumber` int(11) NOT NULL,
  `namasumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`idsumber`, `namasumber`) VALUES
(1, 'KS (Krakatau steel)'),
(2, 'GUNUNG RAJA PAKSI'),
(3, 'HYSCO'),
(4, 'POSCO'),
(5, 'ESSAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`idbahan`);

--
-- Indexes for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`idbahanbaku`);

--
-- Indexes for table `coat`
--
ALTER TABLE `coat`
  ADD PRIMARY KEY (`idcoat`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `estimasiccl`
--
ALTER TABLE `estimasiccl`
  ADD PRIMARY KEY (`idccl`);

--
-- Indexes for table `estimasicgl`
--
ALTER TABLE `estimasicgl`
  ADD PRIMARY KEY (`idcgl`);

--
-- Indexes for table `estimasicsl`
--
ALTER TABLE `estimasicsl`
  ADD PRIMARY KEY (`idcsl`);

--
-- Indexes for table `finished`
--
ALTER TABLE `finished`
  ADD PRIMARY KEY (`idfinished`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`idspec`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`idsumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `idbahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `idbahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coat`
--
ALTER TABLE `coat`
  MODIFY `idcoat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estimasiccl`
--
ALTER TABLE `estimasiccl`
  MODIFY `idccl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estimasicgl`
--
ALTER TABLE `estimasicgl`
  MODIFY `idcgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `estimasicsl`
--
ALTER TABLE `estimasicsl`
  MODIFY `idcsl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finished`
--
ALTER TABLE `finished`
  MODIFY `idfinished` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spec`
--
ALTER TABLE `spec`
  MODIFY `idspec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `idsumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
