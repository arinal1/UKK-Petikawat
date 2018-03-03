-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 10:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petikawat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandara`
--

CREATE TABLE `bandara` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandara`
--

INSERT INTO `bandara` (`id`, `kode`, `nama`, `kota`) VALUES
(1, 'CGK', 'Bandar Udara Soekarno-Hatta', 'Banten'),
(2, 'HLP', 'Bandar Udara Halim Perdanakusuma', 'Jakarta'),
(3, 'BDO', 'Bandar Udara Husein Sastranegara', 'Bandung'),
(4, 'SOC', 'Bandar Udara Adisumarmo', 'Solo'),
(5, 'JOG', 'Bandar Udara Adi Sucipto', 'Yogyakarta'),
(6, 'SRG', 'Bandar Udara Achmad Yani', 'Semarang'),
(7, 'SUB', 'Bandar Udara Juanda', 'Surabaya'),
(8, 'DPS', 'Bandar Udara Ngurah Rai', 'Denpasar'),
(9, 'BTJ', 'Bandar Udara Sultan Iskandar Muda', 'Banda Aceh'),
(10, 'MES', 'Bandar Udara Polonia', 'Medan'),
(11, 'TNJ', 'Bandar Udara Internasional Raja Haji Fisabilillah', 'Tanjung Pinang'),
(12, 'PKU', 'Bandar Udara Sultan Syarif Kasim II', 'Pekanbaru'),
(13, 'PDG', 'Bandar Udara Minangkabau', 'Padang'),
(14, 'PLM', 'Sultan Mahmud Badaruddin II', 'Palembang'),
(15, 'BTH', 'Bandar Udara Hang Nadim', 'Batam'),
(16, 'MDC', 'Bandar Udara Sam Ratulangi', 'Manado'),
(17, 'PLW', 'Bandar Udara Mutiara', 'Palu'),
(18, 'UPG', 'Bandar Udara Sultan Hasanuddin', 'Makassar'),
(19, 'BPN', 'Bandar Udara Sepingan', 'Balikpapan'),
(20, 'PNK', 'Bandar Udara Supadio', 'Pontianak'),
(21, 'PKY', 'Bandar Udara Tjilik Riwut', 'Palangka Raya'),
(22, 'BDJ', 'Bandar Udara Syamsuddin Noor', 'Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(8) NOT NULL,
  `status` int(1) NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id`, `kode`, `nama`, `alamat`, `telepon`, `id_rute`, `tanggal`, `harga`, `status`, `bukti`) VALUES
(1, 'APL103S001', 'Joni Dighed', 'Purwokerto', '06987', 1, '2018-02-01', 69, 2, 'da85c9c82e4a0a6e3ce3a97b7d994037.png'),
(2, 'APL103S002', 'Alan Pejalan', 'Tegal', '09876', 1, '2018-02-01', 0, 2, ''),
(3, 'APL103S003', 'Ice Juice', 'Banjarnegara', '019293', 1, '2018-02-01', 0, 1, ''),
(4, 'APL103S004', 'Harley', 'Mobile Legend', '019283', 1, '2018-02-01', 0, 1, '5add5fcf68d699ed9b58b4e72ddbea08.jpg'),
(5, 'APL103S005', 'Baginda Yorn', 'Moba AOV', '091230', 1, '2018-02-01', 0, 3, ''),
(6, 'Nfr2HY5JM', 'arinal', 'jepara', '0822', 1, '2018-02-01', 2400000, 0, ''),
(7, 'gnmvqbexG', 'ia', 'ea', 'ai', 1, '2018-02-01', 2400000, 0, ''),
(8, 'Yzi8k7LDU', 's', '1231e', '123', 6, '2018-02-28', 100000, 0, ''),
(9, 'JDvU5PgIf', 'vv', 'vv', 'vv', 1, '2018-02-01', 400000, 0, ''),
(10, 'g6CYKXyqf', 'qwe', 'qwe', 'ewq', 4, '2018-02-28', 80000, 0, ''),
(11, '9j4WLy7qC', 'cxz', 'cxzczxc', 'zxc', 4, '2018-02-28', 160000, 1, '43c4e3fee06750a6d488f4734933139a.jpg'),
(12, 'W07HoDt1B', 'tes', '1232123', '123321', 4, '2018-03-01', 80000, 0, ''),
(13, '2BcXkp86N', 'ss', '11', 'dd', 5, '2018-03-01', 100000, 0, ''),
(14, 'Y4iTSXjtx', 'qwe', '1', 'e', 5, '2018-03-01', 100000, 0, ''),
(15, 'LqRFk0Dat', 'asd', 'asd', 'dsa', 6, '2018-03-01', 100000, 0, ''),
(16, 'lLMDn9hWG', 's1', 'asdasd', '123', 4, '2018-03-01', 480000, 3, '073d74ad8eceab8604e5c006bf6a26b6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `no_kursi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `no_identitas`, `id_pemesan`, `no_kursi`) VALUES
(1, 'Joni Dighed', '123612341346', 1, '12'),
(2, 'Alan Pejalan', '1235456352', 2, '14'),
(3, 'Ice Juice', '1246343254', 3, '11'),
(4, 'Harley', '123u2343', 4, '13'),
(5, 'Baginda Yorn', '12874235246', 5, '24'),
(15, 'aku', 'tampan', 6, '21'),
(16, 'kamu', 'cantik', 6, '22'),
(17, 'kita', 'lopelope', 6, '23'),
(18, 'dia', 'perusak', 6, '31'),
(19, 'mereka', 'iri', 6, '32'),
(20, 'bodo', 'amat', 6, '33'),
(21, 'o', 'o', 7, '325'),
(22, 'i', 'i', 7, '41'),
(23, 'u', 'u', 7, '42'),
(24, 'a', 'a', 7, '43'),
(25, 'e', 'e', 7, '424'),
(26, 'ou', 'ou', 7, '425'),
(27, 's', '2', 8, '310'),
(28, 'vv', 'vv', 9, '324'),
(29, 'qwe', 'ewq', 10, '115'),
(30, 'cc', 'xx', 11, '215'),
(31, 'zz', 'xx', 11, '315'),
(32, 'tes', 'ssss', 12, '315'),
(33, 'dd', 'aa', 13, '11'),
(34, 's', 'd', 14, '420'),
(35, 'asd', 'ddsa', 15, '422'),
(36, 's', 's', 16, '113'),
(37, 'a', 'a', 16, '114'),
(38, 'd', 'd', 16, '115'),
(39, 'w', 'w', 16, '214'),
(40, 'q', 'q', 16, '215'),
(41, 'e', 'e', 16, '415');

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`id`, `nama`, `jumlah_kursi`, `deskripsi`) VALUES
(1, 'Garuda Indonesia', 100, ''),
(2, 'Citilink Airlines', 150, ''),
(3, 'Air Asia', 50, ''),
(4, 'Merpati Nusantara', 60, ''),
(5, 'Lion Air', 80, ''),
(6, 'Batik Air', 90, ''),
(7, 'Wings Air', 70, ' deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `asal_bandara` int(11) NOT NULL,
  `tujuan_bandara` int(11) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_sampai` time NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `id_pesawat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `asal_bandara`, `tujuan_bandara`, `jam_berangkat`, `jam_sampai`, `harga`, `id_pesawat`) VALUES
(1, 1, 2, '07:00:00', '10:00:00', '400000', 1),
(2, 1, 2, '07:00:00', '10:00:00', '50000', 2),
(3, 1, 2, '10:00:00', '13:00:00', '60000', 3),
(4, 6, 5, '07:00:00', '08:00:00', '80000', 4),
(5, 1, 3, '00:00:00', '14:10:00', '100000', 5),
(6, 4, 2, '07:00:00', '11:00:00', '100000', 6),
(7, 15, 3, '09:00:00', '13:00:00', '120000', 7),
(9, 1, 3, '10:20:00', '14:10:00', '123000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `level`, `foto`) VALUES
(2, 'admin', 'YWRtaW4=', 'Muhammad Arinal Rido', 1, '7e304cacc61c25550b528ae1b55da55b.JPG'),
(3, 'Arinal', 'MTIz', 'Rinaaaaaal', 0, '60261729484205ee85545a67bfda0e27.png'),
(4, 'acer', '2mr7Qpk43KKk6AbvVtUCnk/p3UuLNI5vrLcdtqrhvNe0XyvnNYiR/XnIjQaxuRB+P9vpbeqFW5EiLi4v/jyR9A==', 'Amat Cepat Rusak', 0, ''),
(5, 'tes', '2YQ8+MnLiGFqpgTH6ml6QrWoIMT2/gzXiEpOnkfkKbd4TutNKdXfDcTYZt08TKA//l7cR8X367NTcELXAtoqvw==', 'uji coba', 0, 'IMG_0760.JPG'),
(7, 'w', 'eFOLcoO0OsUpTMi6avCR4NxL4QTiVWin2IhID4kKXh6Le1v956mvAG2gy7Zkh3f6oOAztwx3+VeqrkuXNqjXxw==', 'q', 0, '51c407b990b67f94135b273fd141ef6d.JPG'),
(9, 'ewh', 'fo+DV3aAHHJc+3lAqCJEda/QwCdV3o0pX6IEstmPUbsT+E8cHiK8FwzNsc/5nyHF7qgPvMizk5Z6xrTABgL7EQ==', 'ay', 0, 'f0acca4c81b150dc0a45f75e9e832f3b.png'),
(10, 'username', 'Z0mAA1NLmcFUyCk27lWM0JSXyRWEAUWqPAhyrxN8mbGJWDIfIK1reCxUk8agCduKZ/4tiuYYk1cH/Vnjs23FtQ==', 'Nameee', 1, '5a0813f4e051507ae88fc39637e7fed8.jpg'),
(11, 'Aku', '550399b49a1a246bdbea28a4c7528b5c', 'aaakkkuuuu', 1, '7719a87a7eeabbf35882e4f0d3d0e72c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asal_bandara` (`asal_bandara`),
  ADD KEY `tujuan_bandara` (`tujuan_bandara`),
  ADD KEY `id_pesawat` (`id_pesawat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandara`
--
ALTER TABLE `bandara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD CONSTRAINT `pemesan_ibfk_1` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pemesan`) REFERENCES `pemesan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`asal_bandara`) REFERENCES `bandara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`tujuan_bandara`) REFERENCES `bandara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_ibfk_3` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
