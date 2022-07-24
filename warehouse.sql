-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 08:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(4, 3, '2022-03-01 11:49:44', 'logistik', 50),
(9, 6, '2022-03-09 04:18:22', 'iksan', 100),
(10, 7, '2022-03-09 04:18:48', 'iksan juga', 100),
(11, 6, '2022-03-10 02:17:00', 'tile', 150),
(12, 8, '2022-03-18 07:06:12', 'iksan', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `keluardus`
--

CREATE TABLE `keluardus` (
  `idkeluardus` int(11) NOT NULL,
  `idnamadus` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'lepoy@gmail.com', '1234567'),
(2, 'lepoylagiaja@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(13, 3, '2022-03-02 03:10:00', 'gudang', 100),
(19, 6, '2022-03-09 04:19:09', 'gudang', 200),
(20, 7, '2022-03-09 04:19:27', 'gudang juga', 150),
(21, 6, '2022-03-10 02:16:32', 'ambon', 200);

-- --------------------------------------------------------

--
-- Table structure for table `masukdus`
--

CREATE TABLE `masukdus` (
  `idmasukdus` int(11) NOT NULL,
  `idnamadus` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `image`) VALUES
(6, 'Body Scrub', '3 karton', 250, '466ee9ae5fc85c63053d97ce53610845.png'),
(7, 'Facemist', '2 karton', 150, 'd95d449a6f5f4b8c509b2d9c66b7f883.png'),
(8, 'Strawberry Facemask 25gr', '2 karton', 500, '34e9b3fc6f9e23430bbc71394340f783.png'),
(12, 'Strawberry Facemask 65gr', '2 karton', 200, '5f4a165f293bce4ced91c127d4387134.png'),
(13, 'Coffe Facemask 25gr', '2 karton', 200, '92c340559bee806c19d06a814b11106e.png'),
(14, 'Coffe Facemask 65gr', '2 karton', 200, '3f94be6f31690a436b0c0f7526410a44.png'),
(15, 'Lemon Facemask 25gr', '2 karton', 200, '694f9979edcf9f614ee52a1936005f5d.png'),
(16, 'Lemon Facemask 65gr', '2 karton', 200, '4aa029b0470b86c0c2ae6a15d40e6f1f.png'),
(17, 'Coklat Facemask 25gr', '2 karton', 200, 'ece5013d1da8564099ee954f07429a9b.png'),
(18, 'Coklat Facemask 65gr', '2 karton', 200, '1a987b18ce540c58c82b57caac9bcacf.png'),
(19, 'Greentea Facemask 25gr', '2 karton', 200, '7295ba3611f9e788886810796eb377a9.png'),
(20, 'Greentea Facemask 25gr', '2 karton', 200, '603b00797a134d93739459fc44dd3844.png'),
(21, 'Milk Facemask 25gr', '2 karton', 200, 'bb13d9ffbf83faa466eea5f913b9daea.png'),
(22, 'Milk Facemask 65gr', '2 karton', 200, '6d8e98b99bbb5aaf51d4bc6e42a0882b.png');

-- --------------------------------------------------------

--
-- Table structure for table `stockdus`
--

CREATE TABLE `stockdus` (
  `iddus` int(11) NOT NULL,
  `namadus` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockdus`
--

INSERT INTO `stockdus` (`iddus`, `namadus`, `deskripsi`, `stock`) VALUES
(1, 'dus pink', '2 pack', 100),
(2, 'dus kuning', '2 pack', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `keluardus`
--
ALTER TABLE `keluardus`
  ADD PRIMARY KEY (`idkeluardus`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `masukdus`
--
ALTER TABLE `masukdus`
  ADD PRIMARY KEY (`idmasukdus`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `stockdus`
--
ALTER TABLE `stockdus`
  ADD PRIMARY KEY (`iddus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keluardus`
--
ALTER TABLE `keluardus`
  MODIFY `idkeluardus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `masukdus`
--
ALTER TABLE `masukdus`
  MODIFY `idmasukdus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stockdus`
--
ALTER TABLE `stockdus`
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
