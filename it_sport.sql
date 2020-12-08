-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 11:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'kelompok5', 'kel5ti', 'Kelompok 5');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `nama`, `id_produk`, `nama_produk`) VALUES
(2, 'mantap', 'meily', 1, 'Tali Skipping'),
(3, 'bagus kali barangnya', 'Brian Tarihoran', 1, 'Tali Skipping'),
(4, 'bagus', 'kelompok5', 2, 'Bola Volly VX110');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'Medan', 7000),
(2, 'Jakarta', 20000),
(3, 'Padang', 10000),
(4, 'Palembang', 12000),
(5, 'Surabaya', 20000),
(6, 'Bandung', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `nama_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(8, 'meilybenedicta2001@gmail.com', 'meily', '8cb2237d0679ca88db6464eac60da96345513964', '082272102216', 'Medan'),
(9, 'briantarihoran@gmail.com', 'Brian', '760e7dab2836853c63805033e514668301fa9c47', '082267986270', 'padang bulan'),
(10, 'anggi@gmail.com', 'Anggi', 'dcee736489f80b622a3df73d5c046d4e568a4d2b', '082167944731', 'Medan'),
(11, 'dhea@gmail.com', 'Dhea', '4ee183722ef69c50dd55dc0b1b8621e4c9c1ba2a', '083800632441', 'medan'),
(12, 'fachri@gmail.com', 'Fachri', 'aa52e93a2c4b36796f4aa58a87e60872d7d724eb', '082386942164', 'medan');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tarif` int(22) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `kota`, `tarif`, `alamat_pengiriman`, `kode_pos`) VALUES
(34, 8, 4, 13, 112000, 'Palembang', 12000, 'dsfjke', 12234),
(35, 13, 1, 13, 167000, 'Medan', 7000, 'jalan dr.mansyur', 12345),
(36, 8, 0, 13, 600000, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `subharga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(5, 34, 4, 1, 'Raket Badminton', 100000, 100000),
(6, 35, 24, 2, 'Jersey Olahraga', 80000, 160000),
(7, 36, 3, 2, 'Bola Basket Spalding', 300000, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi`, `stok_produk`) VALUES
(1, 'Tali Skipping', 30000, 50, 'skipping.jpg', '<p>Tali untuk olahraga skipping / loncat yang dilengkapi penghitung (counter) untuk mencatat banyaknya lompatan. Bagian pegangan tangan dilengkapi spons agar tangan Anda tidak lecet, sementara talinya berhiaskan aneka warna. Produk yang cocok buat Anda yang ingin berolahraga teratur dengan biaya murah.<br />\r\nWARNA = RANDOM</p>\r\n', 5),
(2, 'Bola Volly VX110', 200000, 200, 'voli.jpg', 'Bola Voly VX110\r\n<br>FIVB Specification</br>\r\n<br>Terbuat dari material PU berkualitas dan tahan lama</br>\r\n<br>Warna : Biru dan Kuning</br>\r\n<br>Panel : 8 panel</br>\r\n<br>Material : PVC Leather</br>\r\n<br>Berat : 0.5 kg</br>', 4),
(3, 'Bola Basket Spalding', 300000, 600, 'basketspalding.jpg', 'Bola Basket Spalding NBA Silver Indoor Outdoor adalah salah satu model bola basket kulit komposit yang dikeluarkan oleh Spalding untuk bermain di lapangan indoor maupun lapangan outdoor. Bahan Kulit Komposite. Cocok untuk bermain di lapangan Indoor maupun Outdoor. Size 7', 1),
(4, 'Raket Badminton', 100000, 80, 'raket2.jpg', 'Raket badminton yang ringan dapat memperkuat pukulan smash pada kok / shuttlecock, salah satu cara terbaik untuk menghemat tenaga / stamina ketika bertanding adalah menggunakan raket yang ringan namun bertenaga kuat. Anda akan mendapatkan couple racket, sehingga Anda dapat bermain dengan orang lain ketika tidak membawa raket. Dilengkapi dengan tas selempang raket yang mampu menampung 2 buah raket, sehingga Anda tidak perlu menenteng raket ketika pergi ke lapangan badminton dan mencegah net yang lecet atau tergores ketika berjalan.', 4),
(6, 'Bola Futsal Adidas Finale Sala 5X5', 250000, 200, 'futsal.jpg', '<br>Bola futsal adidas finale sala 5X5</br>\r\n<br>Warna : white and blue</br>\r\n<br>Original,money back guarantee.</br>', 4),
(14, 'Shuttlecock Mondi Coklat', 30000, 5, 'shuttlecock.png', '<br>- Isi : 12 pcs / slop</br>\r\n<br>- Speed : 78 grains</br>', 4),
(18, 'Bola Kasti', 50000, 50, 'kasti.jpg', '<p>Bola Kasti Murah Berkualitas<p>\r\n<p>- Produk asli [Original Product]<p>\r\n<p>- Kondisi Bagus [Good Condition]<p>\r\n<p>- Pantulan Baik<p>\r\n<p>- Bulu Pada Bola Dalam Kondisi Baik<p>', 5),
(19, 'Penhold', 145000, 50, 'Penhold.jpg', '<p>Warna merah</p>\r\n<p>Dijamin tahan lama</p>\r\n<p>Produk dikirimkan dari luar negeri.</p>', 5),
(20, 'Bola Pingpong', 20000, 1, 'pingpong.jpg', '<p>- Barang Import</p>\r\n<p>- 3 star</p>\r\n<p>- Original</p>\r\n<p>- Bahan ABS Plastic</p>\r\n<p>- Tidak melayang</p>\r\n<p>- Size: 40+mm Diameter, 2.8g/piece Approximately</p>', 5),
(21, 'Jersey', 150000, 30, 'jersey.jpg', '<p>Jersey Baju Kaos Munchen Away 18/19 Grade Ori Futsal</p>\r\n<p>Free Size</p>\r\n<p>Bahan serat</p>', 5),
(22, 'Sepatu Nike Air Max 270', 350000, 1000, 'sepatusport.jpg', '<p>original premium</p>\r\n<p>Made in Vietnam</p>\r\n<p>Sepatu sudah termasuk BOX</p>', 4),
(23, 'Tas Sport T-N1018', 450000, 1000, 'tas.jpg', '<p>Tas ini memiliki 1 Kompartemen utama yang sangat besar, dan dilengkapi dengan 3 kompartemen tambahan di samping dan depan tas, yang membuat anda dengan mudah menaruh berbagai perlengkapan olah raga anda seperti sepatu, baju, dan juga gadget dalam 1 wadah.</p>\r\n<p>Tas ini memiliki strap yang dapat diatur dan juga memiliki handle sehingga membuat anda semakin nyaman dalam menggunakan tas ini.</p>\r\n<p>Tas ini juga dilengkapi dengan rubber feet sehingga menjaga tas anda tidak kotor ketika diletakkan di bawah.</p>', 5),
(24, 'Jersey Olahraga', 80000, 50, 'Jersey.jpeg', '<p>Bahan Drifit<br />\r\nMempunyai sifat menyerap kringat saat beraktifitas maupun Olahraga Futsal,Sepak bola,voli,dll.<br />\r\nFree size</p>\r\n', 3),
(25, 'Barbel', 123000, 2000, 'barbel.jpeg', '<p>Didesain simple dan praktis sehingga nyaman dan mudah untuk digunakan serta tahan lama.&nbsp;<br />\r\nDumbell ini berfungsi untuk membantu olahraga Anda dalam pembentukan tubuh,<br />\r\nmeningkatkan kekuatan otot,&nbsp; serta meningkatkan keseimbangan dan kordinasi tubuh.</p>\r\n', 5),
(26, 'Kacamata Renang', 50000, 200, 'kacamata.jpeg', '<p>Kacamata ini dapat di gunakan untuk anda berenang ataupun menyelam, sehingga anda tetap dapat melihat dengan jelas walaupun berada di dalam air.<br />\r\nEarhole Cover<br />\r\nTerdapat karet pelindung telinga, yang membuat telinga Anda tidak kemasukan air, mengurangi kebisingan yang terjadi di dalam air.<br />\r\nPerfect Design</p>\r\n', 5),
(27, 'Baju Renang Dewasa', 230000, 150, 'renangdewasa.jpeg', '<p>Baju renang dewasa model diving pendek<br />\r\nCocok digunakan untuk laki-laki dan perempuan<br />\r\nTerbuat dari material spandex nylon yang elastis dan nyaman dipakai<br />\r\nDilengkapi dengan resleting pada bagian depan</p>\r\n', 6),
(28, 'Sepatu Sport Wanita', 300000, 1500, 'sepatusport.jpeg', '<p>Sepatu lari<br />\r\nDesain sporty<br />\r\nDengan bahan insole dan outsole yang nyaman<br />\r\nRingan dan empuk<br />\r\nMemudahkan Anda dalam berolahraga.</p>\r\n', 5),
(29, 'Sepatu Sport', 100000, 1000, 'sepatu.jpg', '<p>kualitas bagus</p>\r\n\r\n<p>barang impor</p>\r\n', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
