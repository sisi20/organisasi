-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2021 pada 09.48
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `waktu`, `jenis`, `mode`, `ket`, `ruangan`, `gambar`, `id_user`, `kategori`, `link`, `date`, `gol`) VALUES
(49, '2021-12-08', 'Event', 'Online', 'knkjnlknl', '', 'bem2.jpg', 19, 'Ukmi', 'http', '2021-12-06 04:32:07', 'UKM'),
(50, '2021-12-14', 'Rapat', 'Online', 'jbnj m,', '', 'bem3.jpg', 21, 'PSM', 'kjjnkj', '2021-12-06 04:32:41', 'UKM'),
(51, '2021-12-14', 'Rapat', 'Online', 'knklnlk', '', 'penyet8.jpg', 5, 'Teknik Informatika', 'http', '2021-12-06 05:17:26', 'HIMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `file` blob NOT NULL,
  `priode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `kategori` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `id_user`, `ket`, `file`, `priode`, `status`, `kategori`, `date`, `gol`) VALUES
(21, 4, 'LPJ', 0x67616b5f6a61646933312e646f6378, 2022, 2, 'Sistem Informasi', '2021-12-06 04:20:58', ''),
(22, 19, 'Proposal', 0x67616b5f6a61646933322e646f6378, 2022, 0, 'Ukmi', '2021-12-06 04:33:11', ''),
(23, 15, 'Proposal', 0x67616b5f6a61646933332e646f6378, 34564, 0, 'Sepak Bola', '2021-12-06 04:33:32', ''),
(24, 3, 'LPJ', 0x67616b5f6a61646933342e646f6378, 2022, 1, 'Akuntansi', '2021-12-10 07:59:45', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hima`
--

CREATE TABLE `hima` (
  `id` int(11) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `akriditas` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengawas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hima`
--

INSERT INTO `hima` (`id`, `prodi`, `tahun_berdiri`, `akriditas`, `id_user`, `id_pengawas`) VALUES
(1, 'Sistem Informasi', 2006, 'A', 4, 0),
(2, 'Teknik Informatika', 0, 'A', 5, 0),
(3, 'Teknik Komputer', 0, 'A', 12, 0),
(4, 'Teknik Listtrik', 0, '', 13, 0),
(5, 'Teknik Elektronika', 0, '', 7, 0),
(6, 'Teknik Mesin', 0, '', 6, 0),
(7, 'Teknik Telekomunikasi', 0, '', 8, 0),
(8, 'Teknik Elektronika Telekomunikasi', 0, '', 10, 0),
(9, 'Teknik Mekatronika', 0, '', 9, 0),
(10, 'Akuntansi', 0, '', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE `pengawas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus_hima`
--

CREATE TABLE `pengurus_hima` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus_hima`
--

INSERT INTO `pengurus_hima` (`id`, `nama`, `nim`, `jabatan`, `gambar`, `id_user`, `prodi`) VALUES
(6, 'Reymon', '23453543', 'Gubernur', 'penyet1.jpg', 9, 'Teknik Mekatronika'),
(15, 'sisi', '1857301073', 'Gubernur', 'face2.jpg', 4, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus_ukm`
--

CREATE TABLE `pengurus_ukm` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus_ukm`
--

INSERT INTO `pengurus_ukm` (`id`, `nama`, `nim`, `jabatan`, `gambar`, `id_user`, `kategori`) VALUES
(1, 'sisi', '23453543', 'Sekre', 'IMG-20200811-WA0020-1024x768-1.jpg', 21, 'PSM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'BEM'),
(2, 'BLM'),
(3, 'Kemahasiswaan'),
(4, 'UKMI'),
(5, 'PERMADISH'),
(6, 'SEPAK BOLA'),
(7, 'BADMINTON'),
(8, 'Voly'),
(9, 'MAPALA'),
(10, 'PUTY'),
(11, 'PMK'),
(12, 'PSM'),
(13, 'SATA'),
(14, 'BASKET'),
(15, 'TI'),
(16, 'SI'),
(17, 'AKT'),
(18, 'TK'),
(19, 'TET'),
(20, 'HMM'),
(21, 'TM'),
(22, 'TL'),
(23, 'TE'),
(24, 'TT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengawas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`id`, `jenis`, `tahun_berdiri`, `profil`, `id_user`, `id_pengawas`) VALUES
(1, 'Voly', 2015, '', 14, 0),
(2, 'Basket', 0, '', 24, 0),
(3, 'Mapala', 0, '', 23, 0),
(4, 'Sata', 0, '', 17, 0),
(5, 'Badminton', 0, '', 22, 0),
(6, 'Psm', 0, '', 21, 0),
(7, 'Ukmi', 0, '', 19, 0),
(8, 'Permadis', 0, '', 18, 0),
(9, 'Pmk', 0, '', 20, 0),
(10, 'Bola', 0, '', 15, 0),
(11, 'Puty', 0, '', 16, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ket` enum('Aktif','Non Aktif') NOT NULL,
  `role` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `kategori`, `password`, `ket`, `role`, `foto`) VALUES
(1, 'BEM', 'Bem@pcr.ac.id', 'BEM', 'bem123', 'Aktif', 1, 'bem2.jpg'),
(2, 'BLM', 'blm@gamil.com', 'BLM', 'blm123', 'Aktif', 2, ''),
(3, 'Akuntansi', 'akuntansi@gmail.com', 'AKT', '12345', 'Aktif', 17, ''),
(4, 'Sistem Informasi', 'sisteminformasi@gmail.com', 'SI', 'si123', 'Aktif', 16, 'face12.jpg'),
(5, 'Teknik Informatika', 'ti@gmail.com', 'TI', 'ti123', 'Aktif', 15, ''),
(6, 'Teknik Mesin', 'hmm@gmail.com', 'HMM', 'hmm123', 'Aktif', 20, ''),
(7, 'Teknik Elekrtonika', 'te@gmail.com', 'TE', 'te123', 'Aktif', 23, ''),
(8, 'Teknik Telekomunikasi', 'tt@gmail.com', 'TT', 'tt123', 'Aktif', 24, ''),
(9, 'Teknik Mekatronika', 'tm@gmail.com', 'TM', 'tm123', 'Aktif', 21, ''),
(10, 'Teknik Elektronika Telekomunikasi', 'tet@gmail.com', 'TET', 'tet123', 'Aktif', 19, ''),
(11, 'Kemahaiswaan', 'kemahasiswaan@gmail.com', 'Kemahasiswaan', '12345', 'Aktif', 3, ''),
(12, 'Teknik Komputer', 'tk@gmail.com', 'TK', 'tk123', 'Aktif', 18, ''),
(13, 'Teknik Listrik', 'tl@gmail.com', 'TL', 'tl123', 'Aktif', 22, ''),
(14, 'Voly', 'voly@gmail.com', 'Voly', 'voly12345', 'Aktif', 8, ''),
(15, 'Bola', 'bola@gmail.com', 'SEPAK BOLA', '12345', 'Aktif', 6, ''),
(16, 'Puty', 'puty@gmail.com', 'PUTY', '12345', 'Aktif', 10, ''),
(17, 'Sata', 'Sata@gmail.com', 'SATA', '12345', 'Aktif', 13, ''),
(18, 'Permadis', 'permadis@gmail.com', 'PERMADISH', '12345', 'Aktif', 5, ''),
(19, 'Ukmi', 'ukmi@gmail.com', 'UKMI', '12345', 'Aktif', 4, ''),
(20, 'Pmk', 'pmk@gmail.com', 'PMK', '12345', 'Aktif', 11, ''),
(21, 'Psm', 'psm@gmail.com', 'PSM', '12345', 'Aktif', 12, ''),
(22, 'Badminton', 'badminton@gmail.com', 'BADMINTON', '12345', 'Aktif', 7, ''),
(23, 'Mapala', 'mapala@gmail.com', 'MAPALA', '12345', 'Aktif', 9, ''),
(24, 'Basket', 'basket@gmail.com', 'BASKET', '12345', 'Aktif', 14, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Indeks untuk tabel `hima`
--
ALTER TABLE `hima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`),
  ADD KEY `fk_pengawas_id` (`id_pengawas`);

--
-- Indeks untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengurus_hima`
--
ALTER TABLE `pengurus_hima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Indeks untuk tabel `pengurus_ukm`
--
ALTER TABLE `pengurus_ukm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`),
  ADD KEY `fk_pengawas_id` (`id_pengawas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `fk_user_role` (`role`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `hima`
--
ALTER TABLE `hima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengurus_hima`
--
ALTER TABLE `pengurus_hima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengurus_ukm`
--
ALTER TABLE `pengurus_ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
