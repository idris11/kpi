-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 03:17 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahp_nilai`
--

CREATE TABLE IF NOT EXISTS `ahp_nilai` (
`id_nilai` int(11) NOT NULL,
  `jum_nilai` double NOT NULL,
  `ket_nilai` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ahp_nilai`
--

INSERT INTO `ahp_nilai` (`id_nilai`, `jum_nilai`, `ket_nilai`) VALUES
(2, 9, 'Mutlak sangat penting dari'),
(3, 8, 'Mendekati mutlak dari'),
(8, 7, 'Sangat penting dari'),
(9, 6, 'Mendekati sangat penting dari'),
(10, 5, 'Lebih penting dari'),
(11, 4, 'Mendekati lebih penting dari'),
(12, 3, 'Sedikit lebih penting dari'),
(13, 2, 'Mendekati sedikit lebih penting dari'),
(14, 1, 'Sama penting dengan'),
(15, 0.5, '1 bagi mendekati sedikit lebih penting dari'),
(16, 0.333, '1 bagi sedikit lebih penting dari'),
(17, 0.25, '1 bagi mendekati lebih penting dari'),
(18, 0.2, '1 bagi lebih penting dari'),
(19, 0.167, '1 bagi mendekati sangat penting dari'),
(20, 0.143, '1 bagi sangat penting dari'),
(21, 0.125, '1 bagi mendekati mutlak dari'),
(22, 0.1, '1 bagi mutlak sangat penting dari');

-- --------------------------------------------------------

--
-- Table structure for table `analisa_indikator`
--

CREATE TABLE IF NOT EXISTS `analisa_indikator` (
`id_analisa_indikator` int(11) NOT NULL,
  `indikator_pertama` varchar(100) NOT NULL,
  `nilai_analisa_indikator` double NOT NULL,
  `hasil_analisa_indikator` double NOT NULL,
  `indikator_kedua` varchar(100) NOT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `analisa_indikator`
--

INSERT INTO `analisa_indikator` (`id_analisa_indikator`, `indikator_pertama`, `nilai_analisa_indikator`, `hasil_analisa_indikator`, `indikator_kedua`, `id_kategori`) VALUES
(1, 'IK1', 1, 0.19357336430507, 'IK1', 'K1'),
(2, 'IK1', 3, 0.27272727272727, 'IK2', 'K1'),
(3, 'IK1', 2, 0.3000300030003, 'IK3', 'K1'),
(4, 'IK1', 3, 0.27272727272727, 'IK4', 'K1'),
(5, 'IK1', 0.333, 0.14279588336192, 'IK5', 'K1'),
(6, 'IK2', 0.333, 0.064459930313589, 'IK1', 'K1'),
(7, 'IK2', 1, 0.090909090909091, 'IK2', 'K1'),
(8, 'IK2', 0.333, 0.04995499549955, 'IK3', 'K1'),
(9, 'IK2', 1, 0.090909090909091, 'IK4', 'K1'),
(10, 'IK2', 0.333, 0.14279588336192, 'IK5', 'K1'),
(11, 'IK3', 0.5, 0.096786682152536, 'IK1', 'K1'),
(12, 'IK3', 3, 0.27272727272727, 'IK2', 'K1'),
(13, 'IK3', 1, 0.15001500150015, 'IK3', 'K1'),
(14, 'IK3', 3, 0.27272727272727, 'IK4', 'K1'),
(15, 'IK3', 0.333, 0.14279588336192, 'IK5', 'K1'),
(16, 'IK4', 0.333, 0.064459930313589, 'IK1', 'K1'),
(17, 'IK4', 1, 0.090909090909091, 'IK2', 'K1'),
(18, 'IK4', 0.333, 0.04995499549955, 'IK3', 'K1'),
(19, 'IK4', 1, 0.090909090909091, 'IK4', 'K1'),
(20, 'IK4', 0.333, 0.14279588336192, 'IK5', 'K1'),
(21, 'IK5', 3, 0.58072009291521, 'IK1', 'K1'),
(22, 'IK5', 3, 0.27272727272727, 'IK2', 'K1'),
(23, 'IK5', 3, 0.45004500450045, 'IK3', 'K1'),
(24, 'IK5', 3, 0.27272727272727, 'IK4', 'K1'),
(25, 'IK5', 1, 0.42881646655232, 'IK5', 'K1'),
(26, 'IK6', 1, 0.60024009603842, 'IK6', 'K2'),
(27, 'IK6', 3, 0.69236095084237, 'IK7', 'K2'),
(28, 'IK6', 3, 0.42857142857143, 'IK8', 'K2'),
(29, 'IK7', 0.333, 0.19987995198079, 'IK6', 'K2'),
(30, 'IK7', 1, 0.23078698361412, 'IK7', 'K2'),
(31, 'IK7', 3, 0.42857142857143, 'IK8', 'K2'),
(32, 'IK8', 0.333, 0.19987995198079, 'IK6', 'K2'),
(33, 'IK8', 0.333, 0.076852065543503, 'IK7', 'K2'),
(34, 'IK8', 1, 0.14285714285714, 'IK8', 'K2'),
(35, 'IK9', 1, 0.5, 'IK9', 'K3'),
(36, 'IK9', 1, 0.5, 'IK10', 'K3'),
(37, 'IK10', 1, 0.5, 'IK9', 'K3'),
(38, 'IK10', 1, 0.5, 'IK10', 'K3'),
(39, 'IK11', 1, 0.16666666666667, 'IK11', 'K4'),
(40, 'IK11', 0.333, 0.0999099909991, 'IK12', 'K4'),
(41, 'IK11', 1, 0.25, 'IK13', 'K4'),
(42, 'IK11', 1, 0.25, 'IK14', 'K4'),
(43, 'IK12', 3, 0.5, 'IK11', 'K4'),
(44, 'IK12', 1, 0.3000300030003, 'IK12', 'K4'),
(45, 'IK12', 1, 0.25, 'IK13', 'K4'),
(46, 'IK12', 1, 0.25, 'IK14', 'K4'),
(47, 'IK13', 1, 0.16666666666667, 'IK11', 'K4'),
(48, 'IK13', 1, 0.3000300030003, 'IK12', 'K4'),
(49, 'IK13', 1, 0.25, 'IK13', 'K4'),
(50, 'IK13', 1, 0.25, 'IK14', 'K4'),
(51, 'IK14', 1, 0.16666666666667, 'IK11', 'K4'),
(52, 'IK14', 1, 0.3000300030003, 'IK12', 'K4'),
(53, 'IK14', 1, 0.25, 'IK13', 'K4'),
(54, 'IK14', 1, 0.25, 'IK14', 'K4'),
(55, 'IK15', 1, 0.75018754688672, 'IK15', 'K5'),
(56, 'IK15', 3, 0.75, 'IK16', 'K5'),
(57, 'IK16', 0.333, 0.24981245311328, 'IK15', 'K5'),
(58, 'IK16', 1, 0.25, 'IK16', 'K5');

-- --------------------------------------------------------

--
-- Table structure for table `analisa_kategori`
--

CREATE TABLE IF NOT EXISTS `analisa_kategori` (
`id_analisa` int(11) NOT NULL,
  `kategori_pertama` varchar(50) NOT NULL,
  `nilai_analisa_kategori` double NOT NULL,
  `hasil_analisa_kategori` double NOT NULL,
  `kategori_kedua` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `analisa_kategori`
--

INSERT INTO `analisa_kategori` (`id_analisa`, `kategori_pertama`, `nilai_analisa_kategori`, `hasil_analisa_kategori`, `kategori_kedua`) VALUES
(1, 'K1', 1, 0.1, 'K1'),
(2, 'K1', 0.333, 0.13325330132053, 'K2'),
(3, 'K1', 0.5, 0.071428571428571, 'K3'),
(4, 'K1', 0.333, 0.08256880733945, 'K4'),
(5, 'K1', 1, 0.083333333333333, 'K5'),
(6, 'K2', 3, 0.3, 'K1'),
(7, 'K2', 1, 0.40016006402561, 'K2'),
(8, 'K2', 3, 0.42857142857143, 'K3'),
(9, 'K2', 2, 0.49590875278949, 'K4'),
(10, 'K2', 5, 0.41666666666667, 'K5'),
(11, 'K3', 2, 0.2, 'K1'),
(12, 'K3', 0.333, 0.13325330132053, 'K2'),
(13, 'K3', 1, 0.14285714285714, 'K3'),
(14, 'K3', 0.5, 0.12397718819737, 'K4'),
(15, 'K3', 2, 0.16666666666667, 'K5'),
(16, 'K4', 3, 0.3, 'K1'),
(17, 'K4', 0.5, 0.20008003201281, 'K2'),
(18, 'K4', 2, 0.28571428571429, 'K3'),
(19, 'K4', 1, 0.24795437639474, 'K4'),
(20, 'K4', 3, 0.25, 'K5'),
(21, 'K5', 1, 0.1, 'K1'),
(22, 'K5', 0.333, 0.13325330132053, 'K2'),
(23, 'K5', 0.5, 0.071428571428571, 'K3'),
(24, 'K5', 0.2, 0.049590875278949, 'K4'),
(25, 'K5', 1, 0.083333333333333, 'K5');

-- --------------------------------------------------------

--
-- Table structure for table `data_indikator`
--

CREATE TABLE IF NOT EXISTS `data_indikator` (
  `id_indikator` varchar(11) NOT NULL,
  `nama_indikator` varchar(200) NOT NULL,
  `jumlah_hasil_analisa_indikator` double NOT NULL,
  `nilai_eigenvector` double NOT NULL,
  `kd_jabatan` varchar(3) NOT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_indikator`
--

INSERT INTO `data_indikator` (`id_indikator`, `nama_indikator`, `jumlah_hasil_analisa_indikator`, `nilai_eigenvector`, `kd_jabatan`, `id_kategori`) VALUES
('IK1', 'Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS', 5.166, 0.236370759224366, 'J05', 'K1'),
('IK10', 'Rasio laporan persiapan kebutuhan administrasi pelantikan pejabat struktural organisasi', 2, 0.5, 'J12', 'K3'),
('IK11', 'Rasio laporan persiapan kebutuhan administrasi kegiatan bimbingan teknis penilaian angka kredit', 6, 0.1916441644164425, 'J12', 'K4'),
('IK12', 'Rasio penyiapan konsep SK pangkat dan SK peninjauan masa kerja PNS', 3.333, 0.325007500750075, 'J12', 'K4'),
('IK13', 'Rasio penyiapan kebutuhan administrasi usul peninjauan masa kerja pegawai', 4, 0.2416741674167425, 'J12', 'K4'),
('IK14', 'Rasio penyiapan pengantar usul kenaikan pangkat pegawai', 4, 0.2416741674167425, 'J12', 'K4'),
('IK15', 'Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun', 1.333, 0.7500937734433599, 'J12', 'K5'),
('IK16', 'Rasio pengusulan pegawai pensiun', 4, 0.24990622655664, 'J12', 'K5'),
('IK2', 'Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS', 11, 0.0878057981986482, 'J12', 'K1'),
('IK3', 'Rasio Jumlah CPNS yang melaksanakan sumpah PNS ', 6.666, 0.1870104224938292, 'J05', 'K1'),
('IK4', 'Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS', 11, 0.0878057981986482, 'J12', 'K1'),
('IK5', 'Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS', 2.332, 0.401007221884504, 'J05', 'K1'),
('IK6', 'Rasio tersusunnya naskah formasi PNS', 1.666, 0.5737241584840733, 'J05', 'K2'),
('IK7', 'Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala', 4.333, 0.2864127880554466, 'J05', 'K2'),
('IK8', 'Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir', 7, 0.13986305346047767, 'J12', 'K2'),
('IK9', 'Rasio tertatanya administrasi jabatan fungsional khusus pegawai', 2, 0.5, 'J12', 'K3');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE IF NOT EXISTS `indikator` (
`kd_indikator` int(11) NOT NULL,
  `id_indikator` varchar(11) NOT NULL,
  `indikator` text NOT NULL,
  `nip` varchar(25) NOT NULL,
  `realisasi_output` int(11) NOT NULL,
  `target_output` int(11) NOT NULL,
  `ket_output` enum('naskah','dokumen','orang') NOT NULL,
  `realisasi_kualitas` int(11) NOT NULL,
  `target_kualitas` int(11) NOT NULL,
  `realisasi_waktu` int(11) NOT NULL,
  `target_waktu` int(11) NOT NULL,
  `target_pencapaian` int(11) NOT NULL,
  `skor_pencapaian` int(11) NOT NULL,
  `target_akhir_pencapaian` double NOT NULL,
  `skor_akhir_pencapaian` double NOT NULL,
  `realisasi_biaya` int(20) NOT NULL,
  `target_biaya` int(20) NOT NULL,
  `kd_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`kd_indikator`, `id_indikator`, `indikator`, `nip`, `realisasi_output`, `target_output`, `ket_output`, `realisasi_kualitas`, `target_kualitas`, `realisasi_waktu`, `target_waktu`, `target_pencapaian`, `skor_pencapaian`, `target_akhir_pencapaian`, `skor_akhir_pencapaian`, `realisasi_biaya`, `target_biaya`, `kd_kategori`) VALUES
(1, 'IK1', 'Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS', '197509072000031004', 90, 100, 'orang', 80, 100, 12, 12, 76, 82, 1.690730968077, 1.8242097287146, 0, 0, ''),
(2, 'IK3', 'Rasio Jumlah CPNS yang melaksanakan sumpah PNS ', '197509072000031004', 95, 100, 'orang', 85, 100, 12, 12, 76, 85, 1.3376625505668, 1.4960699578708, 0, 0, ''),
(3, 'IK5', 'Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS', '197509072000031004', 90, 100, 'orang', 90, 100, 12, 12, 76, 85, 2.8683553358607, 3.2080289940547, 0, 0, ''),
(4, 'IK6', 'Rasio tersusunnya naskah formasi PNS', '197509072000031004', 80, 100, 'orang', 80, 100, 12, 12, 76, 79, 17.801435772947, 18.504124027142, 0, 0, ''),
(5, 'IK7', 'Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala', '197509072000031004', 90, 100, 'orang', 90, 100, 12, 12, 76, 85, 8.8867773401618, 9.9391588672862, 0, 0, ''),
(6, 'IK10', 'Rasio laporan persiapan kebutuhan administrasi pelantikan pejabat struktural organisasi', '198108212009031003', 88, 100, 'orang', 88, 100, 12, 12, 76, 84, 0, 6.4407361119504, 0, 0, ''),
(7, 'IK11', 'Rasio laporan persiapan kebutuhan administrasi kegiatan bimbingan teknis penilaian angka kredit', '198108212009031003', 90, 100, 'orang', 90, 100, 12, 12, 76, 85, 0, 5.4559319500178, 0, 0, ''),
(8, 'IK12', 'Rasio penyiapan konsep SK pangkat dan SK peninjauan masa kerja PNS', '198108212009031003', 85, 100, 'orang', 85, 100, 12, 12, 76, 82, 0, 5.2633696458995, 0, 0, ''),
(9, 'IK13', 'Rasio penyiapan kebutuhan administrasi usul peninjauan masa kerja pegawai', '198108212009031003', 86, 100, 'orang', 86, 100, 12, 12, 76, 83, 0, 5.3275570806056, 0, 0, ''),
(10, 'IK14', 'Rasio penyiapan pengantar usul kenaikan pangkat pegawai', '198108212009031003', 87, 100, 'orang', 87, 100, 12, 12, 76, 83, 0, 5.3275570806056, 0, 0, ''),
(11, 'IK15', 'Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun', '198108212009031003', 88, 100, 'orang', 88, 100, 12, 12, 76, 84, 0, 3.6758910834356, 0, 0, ''),
(12, 'IK16', 'Rasio pengusulan pegawai pensiun', '198108212009031003', 89, 100, 'orang', 89, 100, 12, 12, 76, 85, 0, 3.7196516915718, 0, 0, ''),
(13, 'IK2', 'Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS', '198108212009031003', 85, 100, 'orang', 85, 100, 12, 12, 76, 82, 0, 0.67764808065572, 0, 0, ''),
(14, 'IK4', 'Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS', '198108212009031003', 86, 100, 'orang', 86, 100, 12, 12, 76, 83, 0, 0.68591208163933, 0, 0, ''),
(15, 'IK8', 'Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir', '198108212009031003', 87, 100, 'orang', 87, 100, 12, 12, 76, 83, 0, 2.6882651160466, 0, 0, ''),
(16, 'IK9', 'Rasio tertatanya administrasi jabatan fungsional khusus pegawai', '198108212009031003', 89, 100, 'orang', 89, 100, 12, 12, 76, 85, 0, 6.5174115418545, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `kd_jabatan` varchar(3) NOT NULL DEFAULT '',
  `jabatan` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `jabatan`, `ket`) VALUES
('J01', 'Kepala Badan Kepegawaian dan Diklat', 'Badan Kepegawaian dan Diklat Kabupaten Ogan Ilir'),
('J03', 'Kepala Bidang Formasi dan Mutasi', 'Bidang Formasi dan Mutasi'),
('J05', 'Kasubbid Formasi dan Data Pegawai', 'Bidang Formasi dan Mutasi'),
('J12', 'Kasubbid Mutasi Pegawai', 'Bidang Formasi dan Mutasi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `jumlah_kategori` double NOT NULL,
  `bobot_kategori` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jumlah_kategori`, `bobot_kategori`) VALUES
('K1', 'CPNS', 10, 0.0941168026843768),
('K2', 'PNS', 2.499, 0.40826138241064003),
('K3', 'JABATAN ORGANISASI', 7, 0.153350859808342),
('K4', 'GOLONGAN & PANGKAT', 4.033, 0.256749738824368),
('K5', 'PENSIUN', 12, 0.0875212162722766);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

CREATE TABLE IF NOT EXISTS `nilai_kategori` (
`id_nilai` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id_nilai`, `nilai`, `keterangan`) VALUES
(1, 9, 'Mutlak sangat penting dari'),
(2, 8, 'Mendekati mutlak dari'),
(3, 7, 'Sangat penting dari'),
(4, 6, 'Mendekati sangat penting dari'),
(5, 5, 'Lebih penting dari'),
(6, 4, 'Mendekati lebih penting dari'),
(7, 3, 'Sedikit lebih penting dari'),
(8, 2, 'Mendekati sedikit lebih penting dari'),
(9, 1, 'Sama penting dengan'),
(10, 0.5, '1 bagi mendekati sedikit lebih penting dari'),
(11, 0.333, '1 bagi sedikit lebih penting dari'),
(12, 0.25, '1 bagi mendekati lebih penting dari'),
(13, 0.2, '1 bagi lebih penting dari'),
(14, 0.167, '1 bagi mendekati sangat penting dari'),
(15, 0.143, '1 bagi sangat penting dari'),
(16, 0.125, '1 bagi mendekati mutlak dari'),
(17, 0.1, '1 bagi mutlak sangat penting dari');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE IF NOT EXISTS `pangkat` (
  `kd_pangkat` varchar(3) NOT NULL DEFAULT '',
  `pangkatgolru` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`kd_pangkat`, `pangkatgolru`, `ket`) VALUES
('P01', 'Juru Muda / (I/b)', 'Golongan/Ruang  Ia =Pangkat Juru Muda'),
('P02', 'Juru Muda Tingkat 1 / (I/b)', 'Golongan/Ruang  Ib =\r\nPangkat Juru Muda Tingkat I'),
('P03', 'Juru / (I/c)', 'Golongan/Ruang  Ic =\r\nPangkat Juru'),
('P04', 'Juru Tingkat 1 / (I/d)', 'Golongan/Ruang  Id =\r\nPangkat Juru Tingkat 1'),
('P05', 'Pengatur Muda / (II/a)', 'Golongan/Ruang  IIa =\r\nPangkat Pengatur Muda'),
('P06', 'Pengatur Muda Tingkat 1 / (II/b)', 'Golongan/Ruang  IIb =\r\nPangkat Pengatur Muda Tingkat 1\r\n'),
('P07', 'Pengatur / (II/c)', 'Golongan/Ruang  IIc =\r\nPangkat Pengatur '),
('P08', 'Pengatur Tingkat 1 / (II/d)', 'Golongan/Ruang  IId =\r\nPangkat Pengatur Tingkat 1'),
('P09', 'Penata Muda / (III/a)', 'Golongan/Ruang  IIIa =\r\nPangkat  Penata Muda\r\n'),
('P10', 'Penata Muda Tingkat 1 / (III/b)', 'Golongan/Ruang  IIIb =\r\nPangkat  Penata Muda Tingkat 1\r\n'),
('P11', 'Penata / (III/c)', 'Golongan/Ruang IIIc = Pangkat Penata'),
('P12', 'Penata Tingkat 1 / (III/d)', 'Golongan/Ruang  IIId =\r\nPangkat  Penata Tingkat 1\r\n'),
('P13', 'Pembina / (IV/a)', 'Golongan/Ruang  IVa =\r\nPangkat  Pembina\r\n'),
('P14', 'Pembina Tingkat 1 / (IV/b)', 'Golongan/Ruang  IVb =\r\nPangkat  Pembina Tingkat 1\r\n'),
('P15', 'Pembina Utama Muda / (IV/c)', 'Golongan/Ruang  IVc =\r\nPangkat  Pembina Utama Muda\r\n'),
('P16', 'Pembina Utama Madya / (IV/d)', 'Golongan/Ruang IVd = Pangkat Pembina Utama Madya'),
('P17', 'Pembina Utama / (IV/e)', 'Golongan/Ruang  IVe =\r\nPangkat  Pembina Utama\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE IF NOT EXISTS `unitkerja` (
  `kd_unitkerja` varchar(3) NOT NULL DEFAULT '',
  `unitkerja` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`kd_unitkerja`, `unitkerja`, `ket`) VALUES
('U01', 'Badan Kepegawaian dan Diklat Kabupaten Ogan Ilir', 'tidak ada'),
('U04', 'Bidang Formasi dan Mutasi', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_pangkat` varchar(3) NOT NULL,
  `kd_jabatan` varchar(3) NOT NULL,
  `kd_unitkerja` varchar(3) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `level` enum('admin','pegawai','penilai','kaban') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama`, `kd_pangkat`, `kd_jabatan`, `kd_unitkerja`, `jk`, `tmpt_lahir`, `tgl_lahir`, `agama`, `level`, `username`, `password`) VALUES
('09121003055', 'Idris', 'P04', 'J05', 'U04', 'laki-laki', 'Palembang', '0000-00-00', 'islam', 'penilai', 'bukanadmin', '992baf4879618dbfb66e5786ebb3a923'),
('196208101997031002', 'Ir. M. Badrun Priyanto, MT', 'P13', 'J01', 'U01', 'laki-laki', 'Palembang', '2017-01-11', 'islam', 'kaban', 'kaban', '790d0d51b5a79665aa7c471193021177'),
('197509072000031004', 'Syahrurrizal, S.Kom, M.Si', 'P13', 'J05', 'U04', 'laki-laki', 'Kayu Agung', '0000-00-00', 'islam', 'pegawai', 'kasubidfor', 'dbff7a8e45ca15b43193558a4e6035f3'),
('197907271999031005', 'Muhammad Hadi Y, SE, MH', 'P12', 'J03', 'U04', 'laki-laki', 'Palembang', '0000-00-00', 'islam', 'penilai', 'kabidformut', 'f4f9198c3aac6a126b21f9246367183c'),
('198108212009031002', 'Muhammad Soip, SE, M.Si', 'P10', 'J12', 'U04', 'laki-laki', 'Palembang', '1981-08-21', 'budha', 'pegawai', 'kasubidmut', 'eff0f96b0a9510a8303291f345b59d2c'),
('198108212009031003', 'Rio Andri', 'P10', 'J12', 'U04', 'laki-laki', 'Palembang', '1981-08-21', 'budha', 'pegawai', 'kasubidmut2', '486d13ac5449fca2656acad633899bd7'),
('2147483647', 'Rio Andri', 'P05', 'J14', 'U12', 'laki-laki', 'Belinyu', '2016-11-07', 'protestan', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahp_nilai`
--
ALTER TABLE `ahp_nilai`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `analisa_indikator`
--
ALTER TABLE `analisa_indikator`
 ADD PRIMARY KEY (`id_analisa_indikator`);

--
-- Indexes for table `analisa_kategori`
--
ALTER TABLE `analisa_kategori`
 ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `data_indikator`
--
ALTER TABLE `data_indikator`
 ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
 ADD PRIMARY KEY (`kd_indikator`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
 ADD PRIMARY KEY (`kd_pangkat`);

--
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
 ADD PRIMARY KEY (`kd_unitkerja`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahp_nilai`
--
ALTER TABLE `ahp_nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `analisa_indikator`
--
ALTER TABLE `analisa_indikator`
MODIFY `id_analisa_indikator` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `analisa_kategori`
--
ALTER TABLE `analisa_kategori`
MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
MODIFY `kd_indikator` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
