-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2020 at 04:06 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `syam_covid`
--
CREATE DATABASE IF NOT EXISTS `syam_covid` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `syam_covid`;

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `idpasien` int(11) NOT NULL,
  `nrm` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nik` varchar(64) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `umur` varchar(64) DEFAULT NULL,
  `jk` varchar(64) DEFAULT NULL,
  `bangsa` varchar(64) DEFAULT NULL,
  `kab` varchar(64) DEFAULT NULL,
  `kec` varchar(64) DEFAULT NULL,
  `mrs` date NOT NULL,
  `krs` date DEFAULT NULL,
  `ketgejala` text NOT NULL,
  `ruang` varchar(64) DEFAULT NULL,
  `slug` varchar(64) DEFAULT NULL,
  `statusawal` varchar(64) DEFAULT NULL,
  `statusakhir` varchar(64) DEFAULT NULL,
  `fototherax` int(1) DEFAULT NULL,
  `rapidtes` int(1) DEFAULT NULL COMMENT '0/1 0 tidak 1 iya',
  `hasilrapid` varchar(64) DEFAULT '-',
  `swab` int(1) DEFAULT NULL COMMENT '0/1 0 tidak 1 iya',
  `serum` int(1) DEFAULT NULL COMMENT '0/1 0 tidak 1 iya',
  `sputum` int(1) DEFAULT NULL COMMENT '0/1 0 tidak 1 iya',
  `hasilswab` varchar(64) DEFAULT NULL,
  `kethasilswab` varchar(64) DEFAULT NULL,
  `statusrawat` varchar(64) DEFAULT 'RAWAT',
  `diagawal` text,
  `diagakhir` text,
  `pemakaman` varchar(1) DEFAULT '-' COMMENT '0/1 0 tidak 1 iya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`idpasien`, `nrm`, `nama`, `nik`, `ttl`, `umur`, `jk`, `bangsa`, `kab`, `kec`, `mrs`, `krs`, `ketgejala`, `ruang`, `slug`, `statusawal`, `statusakhir`, `fototherax`, `rapidtes`, `hasilrapid`, `swab`, `serum`, `sputum`, `hasilswab`, `kethasilswab`, `statusrawat`, `diagawal`, `diagakhir`, `pemakaman`) VALUES
(15, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-01', '2020-06-01', 'sadasda das das das ds', 'IGD', 'igd', 'PDP', 'PDP', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'PULANG PAKSA', 'asdas', 'dasdasdsdsd', '1'),
(16, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-02', '2020-06-02', 'Gejalanya coba coba1', 'IGD', 'igd', 'ODP', 'CONFIRM', 1, 1, 'Reaktif', 1, 1, 1, 'Positif', 'Positif', 'RAWAT', 'dasd', 'asdasdasd', '0'),
(17, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-02', '2020-06-01', 'sadasda das das das ds', 'IGD', 'irnaf', 'PDP', 'OTG', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Lainnya', '', 'RAWAT', 'asdas', 'dasdasdsdsd', '1'),
(18, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-05', '2020-06-02', 'Gejalanya coba coba1', 'IRNA F', 'irnaf', 'ODR', 'ODR', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'SEMBUH', 'dasd', 'asdasdasd', '0'),
(19, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-04', '2020-06-02', 'Gejalanya coba coba1', 'IRNA B1', 'irnab1', 'ODP', 'ODP', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'MENINGGAL', 'dasd', 'asdasdasd', '0'),
(20, '227150', 'NUNUK LESTARI AMBARWATI', '3526044401810004', '1981-01-04', '39 Thn', '1', 'Indonesia', ' BANGKALAN', ' KAMAL', '2020-06-05', NULL, '', 'IGD', 'igd', 'ODR', 'ODP', 1, 1, 'Menunggu', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-'),
(21, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-05', '2020-06-02', 'Gejalanya coba coba1', 'IRNA B BAWAH', 'irnabbawah', 'ODP', 'PDP', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'MENINGGAL', 'dasd', 'asdasdasd', '0'),
(22, '227150', 'NUNUK LESTARI AMBARWATI', '3526044401810004', '1981-01-04', '39 Thn', '1', 'Indonesia', ' BANGKALAN', ' KAMAL', '2020-06-05', NULL, '', 'IGD', 'igd', 'ODP', 'PDP', 1, 1, 'Menunggu', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-'),
(23, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-03', '2020-06-02', 'Gejalanya coba coba1', 'IRNA B1', 'irnab1', 'ODP', 'ODP', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'MENINGGAL', 'dasd', 'asdasdasd', '0'),
(25, '227147', 'MATRUJI BIN SURI', '', '1969-07-02', '50 Thn', '1', 'Indonesia', ' BANGKALAN', ' BLEGA', '2020-06-06', '2020-06-02', 'Gejalanya coba coba1', 'IRNA B1', 'irnab1', 'ODP', 'OTG', 1, 1, 'Non-Reaktif', 1, 1, 1, 'Negatif', 'Negatif', 'MENINGGAL', 'dasd', 'asdasdasd', '0'),
(26, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-15', '2020-06-15', 'asfasfasfsagsg', '', '', 'ODR', 'ODR', 1, 0, '', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-'),
(27, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-01', '2020-06-01', '', '', '', 'ODR', 'ODR', 0, 0, '', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-'),
(28, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-01', '2020-06-08', '', '', '', 'ODR', 'ODR', 0, 0, '', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-'),
(29, '227171', 'WASILAH ABDUL JALIL', '3526175204760001', '1976-04-12', '44 Thn', '1', 'Indonesia', ' KODYA JAKARTA UTARA', ' TANJUNG PERIOK', '2020-06-01', '2020-06-09', '', 'IRNA B BAWAH', 'irnabbawah', 'ODR', 'ODR', 0, 0, '', 0, 0, 0, 'Negatif', 'Negatif', 'RAWAT', NULL, NULL, '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_status`
--

CREATE TABLE `data_status` (
  `id` int(11) NOT NULL,
  `namastatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_status`
--

INSERT INTO `data_status` (`id`, `namastatus`) VALUES
(1, 'ODR'),
(2, 'ODP'),
(3, 'OTG'),
(4, 'PDP'),
(5, 'CONFIRM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ruangan` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `ruangan`, `slug`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'all', ''),
(2, 'igdadmin', '35ed2e92be8bae443047956cf14e37be', 'IGD', 'igd'),
(3, 'irnafadmin', '9d82d18ec7e88da56afd5abd44dbde38', 'IRNA F', 'irnaf'),
(4, 'irnabbawahadmin', '5a53cf635eda274b8ef42811a694a124', 'IRNA B BAWAH', 'irnabbawah'),
(5, 'irnab1admin', '534e6c52f65ed98dd83a0e7716f03b03', 'IRNA B 1', 'irnab1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `data_status`
--
ALTER TABLE `data_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_status`
--
ALTER TABLE `data_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
