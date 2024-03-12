-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 09:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darisantri`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL DEFAULT '''ILMU KEISLAMAN'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'if', 'ilmu falak'),
(3, 'is', 'ilmu sejarah'),
(4, 'dkv', 'desain komunikasi visual'),
(5, 'kdk', 'kedokteran kodok'),
(6, 'kdh', 'kedoteran hewan'),
(7, 'tn', 'teknik nonton');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` int(11) NOT NULL,
  `telp` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kota_asal` varchar(100) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_create` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `nama`, `tgl_lahir`, `nik`, `telp`, `email`, `kota_asal`, `jurusan_id`, `date_create`, `user_create`) VALUES
(80, 'joni', '2024-03-21', 123123123, 8080809, 'joni@yahoo.com', 'lobby', 6, '0000-00-00 00:00:00', ''),
(83, 'yaqin', '2024-03-22', 43234, 98098098, 'joh@gmail', 'joger', 3, '0000-00-00 00:00:00', ''),
(91, 'ah bisa', '2024-03-30', 4325234, 235252, 'aslfhaskj@aslfka', 'hp', 5, '0000-00-00 00:00:00', ''),
(92, 'as\'ad', '0000-00-00', 0, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(93, 'jhk', '0000-00-00', 90909090, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(97, 'ada\'', '0000-00-00', 7778787, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(105, 'sssss', '0000-00-00', 222222444, 345345, 'gdfgdfg@ddf', 'asddfdfg', 1, '0000-00-00 00:00:00', ''),
(111, 'ertertret\'', '0000-00-00', 33333, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(115, 'ddddddddddd', '0000-00-00', 4444444, 34, '', '', 1, '0000-00-00 00:00:00', ''),
(116, 'gfghfghfghfgh', '0000-00-00', 55556633, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(117, 'fgh\'fghfgh', '0000-00-00', 4445666, 33, '', '', 1, '0000-00-00 00:00:00', ''),
(125, 'dsfdsf', '2024-03-13', 343432432, 2147483647, 'gdfgdfg@ddf', 'asddfdfg', 1, '0000-00-00 00:00:00', ''),
(126, 'qewewqewq', '0000-00-00', 34534543, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(127, 'asjldsklajdsa\'', '0000-00-00', 321321321, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(128, 'sjadksaldjsald\'wewqewq', '0000-00-00', 2147483647, 0, '', '', 1, '0000-00-00 00:00:00', ''),
(130, 'new coi', '2024-03-01', 65466666, 466663, 'sdfasf@sdf', 'asa', 1, '0000-00-00 00:00:00', ''),
(131, 'jahannam', '2024-03-07', 123, 123, 'as@s', 'sd', 1, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(36, 'padi', '91918ba5ede3786c089aa690d1de655a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
