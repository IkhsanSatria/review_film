-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2025 pada 03.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewfilm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorite`
--

CREATE TABLE `favorite` (
  `id_favorite` bigint(20) UNSIGNED NOT NULL,
  `id_film` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `favorite`
--

INSERT INTO `favorite` (`id_favorite`, `id_film`, `id_user`, `created_at`, `updated_at`) VALUES
(13, 24, 7, '2025-03-16 02:52:19', '2025-03-16 02:52:19'),
(14, 23, 7, '2025-03-16 02:53:42', '2025-03-16 02:53:42'),
(19, 21, 7, '2025-03-17 06:41:40', '2025-03-17 06:41:40'),
(40, 33, 8, '2025-03-19 06:54:42', '2025-03-19 06:54:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `gambar_film` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `sinopsis` text NOT NULL,
  `genre` int(10) UNSIGNED DEFAULT NULL,
  `negara` int(10) UNSIGNED DEFAULT NULL,
  `rating` decimal(5,0) DEFAULT NULL,
  `durasi` int(5) UNSIGNED DEFAULT NULL,
  `kategori_umur` enum('Anak','Dewasa','Anak dan Dewasa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tahun_rilis` year(4) NOT NULL,
  `hits` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `id_user`, `nama_film`, `trailer`, `gambar_film`, `deskripsi`, `sinopsis`, `genre`, `negara`, `rating`, `durasi`, `kategori_umur`, `created_at`, `updated_at`, `tahun_rilis`, `hits`) VALUES
(7, 1, 'Samurai Deeperfsafd', '', 'mv-item7.jpg', '<p>dsafsafasf</p>', '', 2, 4, NULL, 32, 'Dewasa', '2025-02-24 05:58:57', '2025-03-17 06:40:07', 2024, 13),
(8, 1, ' KYO Shiro miubu', '', 'mv4.jpg', '<p>fdsasafdasfsadf</p>', '', 3, 5, NULL, 32, 'Dewasa', '2025-02-24 06:00:50', '2025-03-17 06:40:19', 2024, 7),
(9, 1, 'Mencari Pendekar Sejati', '', 'mv-item8.jpg', '<p>fdsasafasfasf</p>', '', 5, 2, '5', 130, 'Anak dan Dewasa', '2025-02-24 06:03:30', '2025-03-19 01:48:04', 2025, 16),
(10, 1, 'The Walk', 'GR1EmTKAWIw', 'mv-item4.jpg', '<p>fdsasdfsaf</p>', '', 5, 5, NULL, 150, 'Dewasa', '2025-02-24 06:05:37', '2025-03-13 06:07:45', 2024, 60),
(11, 1, 'Super Hero', '', 'mv1.jpg', '<p>fdsasdfsaf</p>', '', 3, 2, NULL, 32, 'Anak', '2025-02-24 06:06:47', '2025-03-16 14:52:57', 2024, 28),
(20, 1, 'Laskar Pelangi', '8ZYOqARRTng', 'laskar-pelangi-resized-185x284.jpg', '', '<div class=\"dad65929\">\r\n<div class=\"f9bf7997 d7dc56a8 c05b5566\">\r\n<div class=\"ds-markdown ds-markdown--block\">\r\n<p><em>Laskar Pelangi</em>&nbsp;adalah film adaptasi dari novel bestseller karya Andrea Hirata. Ceritanya berlatar di Belitung pada tahun 1970-an dan mengisahkan tentang perjuangan sekelompok anak dari keluarga miskin yang bersekolah di SD Muhammadiyah, sebuah sekolah yang hampir ditutup karena kekurangan murid.</p>\r\n<p>Kisah dimulai ketika sekolah tersebut hanya memiliki 9 murid, sedangkan syarat minimal untuk tetap beroperasi adalah 10 murid. Namun, keajaiban terjadi ketika seorang anak bernama Harun mendaftar di menit terakhir, menyelamatkan sekolah dari penutupan.</p>\r\n<p>Para murid, yang dijuluki \"Laskar Pelangi\", menjalani kehidupan sekolah penuh dengan tantangan, mulai dari fasilitas yang terbatas hingga tekanan ekonomi. Namun, di bawah bimbingan guru mereka, Bu Muslimah, dan kepala sekolah, Pak Harfan, mereka belajar tentang persahabatan, kerja keras, dan mimpi.</p>\r\n<p>Tokoh utama seperti Ikal, Lintang, dan Mahar menjadi pusat cerita, masing-masing dengan keunikan dan impian mereka. Film ini menyentuh hati dengan menggambarkan bagaimana pendidikan dan semangat pantang menyerah dapat mengubah hidup seseorang, meskipun dalam kondisi serba terbatas.</p>\r\n<p><em>Laskar Pelangi</em> tidak hanya menghibur, tetapi juga menginspirasi penonton untuk menghargai arti pendidikan dan persahabatan.</p>\r\n</div>\r\n</div>\r\n</div>', 7, 1, NULL, 124, 'Anak dan Dewasa', '2025-03-01 16:03:46', '2025-03-13 04:35:25', 2008, 7),
(21, 1, 'Sekawan Limo', '3VltZGwXpCw', 'sekawan-limo-hd.jpg', '<p>asasasas</p>', '<p><em>Sekawan Limo</em> adalah film komedi horor Indonesia yang mengisahkan tentang petualangan lima sekawan yang terlibat dalam misteri mistis. Cerita dimulai ketika lima sahabat yaitu Ayu, Bima, Cinta, Dito, dan Edo. Mereka memutuskan untuk liburan ke sebuah villa tua di pedesaan. Villa tersebut ternyata memiliki sejarah kelam dan dihuni oleh makhluk halus.</p>\r\n<p>Awalnya, mereka mengabaikan cerita-cerita seram yang beredar tentang villa itu. Namun, seiring berjalannya waktu, kejadian-kejadian aneh dan menyeramkan mulai terjadi. Mereka pun terpaksa bekerja sama untuk memecahkan misteri di balik villa tersebut dan menghadapi teror yang mengancam nyawa mereka.</p>\r\n<p>Film ini menggabungkan unsur komedi dan horor, menciptakan suasana yang seru sekaligus menegangkan. Selain menampilkan adegan-adegan lucu,&nbsp;<em>Sekawan Limo</em>&nbsp;juga menyajikan pesan tentang persahabatan dan keberanian dalam menghadapi ketakutan.</p>', 4, 1, NULL, 90, 'Anak dan Dewasa', '2025-03-01 16:11:13', '2025-03-19 06:51:27', 2023, 55),
(23, 6, 'Always: Sunset on Third Street', '5gdbJwf5Aww', 'th_resized_2.jpg', '', '<p>Berlatar belakang Tokyo tahun 1958, film ini menggambarkan kehidupan sehari-hari para penghuni sebuah distrik kecil yang menghadapi tantangan ekonomi dan perubahan sosial di era pascaperang. Dengan visual yang hangat dan cerita yang menyentuh, film ini membawa penonton dalam perjalanan nostalgia yang penuh emosi.</p>', 2, 2, NULL, 128, 'Dewasa', '2025-03-07 02:46:06', '2025-03-16 15:06:54', 2005, 6),
(24, 6, 'Battle Royale', 'oKCN6hzD5J4', 'battle_royale_hd.jpg', '', '<p data-start=\"932\" data-end=\"1345\">Dalam dunia dystopian, pemerintah Jepang menetapkan program Battle Royale, di mana sekelompok siswa sekolah menengah dikirim ke pulau terpencil dan dipaksa bertarung sampai hanya satu yang tersisa. Dengan tema bertahan hidup yang brutal dan kritik sosial yang tajam, film ini menjadi salah satu film Jepang paling kontroversial dan berpengaruh.</p>', 4, 2, NULL, 114, 'Dewasa', '2025-03-07 02:49:09', '2025-03-18 03:48:32', 2005, 21),
(30, 1, 'Dilan 1990', 'nwhB2Hb7g5c', 'dilan1991_hd.jpg', '', '', 2, 1, NULL, 110, 'Dewasa', '2025-03-18 01:07:59', '2025-03-18 01:07:59', 2018, 0),
(31, 1, 'Dua Garis Biru', 'b0NS7FP1loU', 'dua_garis_biru_hd.jpg', '', '', 2, 1, NULL, 113, 'Dewasa', '2025-03-18 01:09:41', '2025-03-19 01:10:39', 2019, 1),
(32, 1, 'The Raid: Redemption', 'm6Q7KnXpNOg', 'the_raid_redemption_hd.jpg', '', '', 4, 1, NULL, 101, 'Dewasa', '2025-03-18 01:12:06', '2025-03-19 06:53:09', 2011, 16),
(33, 1, 'Yuni', '4BN63e5CnaQ', 'yuni_hd.jpg', '', '', 2, 1, NULL, 120, 'Dewasa', '2025-03-18 01:16:36', '2025-03-19 06:54:38', 2021, 14),
(34, 7, 'Spirited Away', 'ByXuk9QqQkk', 'spirited_away_hd.jpg', '', '', 5, 2, NULL, 120, 'Anak', '2025-03-18 03:25:25', '2025-03-20 01:58:23', 2001, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(10) UNSIGNED NOT NULL,
  `id_film` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(10) UNSIGNED NOT NULL,
  `nama_genre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `created_at`, `updated_at`) VALUES
(2, 'Drama', '2025-02-23 10:40:11', '2025-02-24 13:50:36'),
(3, 'Kolosal', '2025-02-23 23:05:46', '2025-02-23 23:05:46'),
(4, 'Horor', '2025-02-23 23:05:52', '2025-02-23 23:05:52'),
(5, 'Action', '2025-02-23 23:05:58', '2025-02-23 23:05:58'),
(6, 'Komedi', '2025-02-23 23:06:14', '2025-02-23 23:06:14'),
(7, 'Adventure', '2025-02-24 13:49:42', '2025-02-24 13:49:42'),
(8, 'SCi-Fi', '2025-02-24 13:50:24', '2025-02-24 13:50:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` bigint(20) UNSIGNED NOT NULL,
  `id_film` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_komentar` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_film`, `id_user`, `komentar`, `created_at`, `updated_at`, `status_komentar`) VALUES
(1, 21, 3, 'film sekawan limo, keren bangat seru...nonton sampai selesai bro', '2025-03-03 03:55:08', '2025-03-03 03:55:08', 'pending'),
(2, 21, 4, 'film yang keren, sangat menegangkan karna alur ceritanya dibuat dengan sangat epik', '2025-03-03 04:00:06', '2025-03-03 04:00:06', 'pending'),
(5, 10, 7, 'aaa', '2025-03-13 06:07:43', '2025-03-13 06:07:43', 'pending'),
(6, 21, 7, 'ijhsad\r\n', '2025-03-16 04:20:50', '2025-03-16 04:20:50', 'pending'),
(7, 33, 8, 'film nya keren\r\n', '2025-03-18 02:19:00', '2025-03-18 02:19:00', 'pending'),
(8, 32, 8, 'bagus', '2025-03-19 06:53:06', '2025-03-19 06:53:06', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id_negara` int(10) UNSIGNED NOT NULL,
  `nama_negara` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2025-02-23 10:52:56', '2025-02-23 10:52:56'),
(2, 'Jepang', '2025-02-23 10:53:02', '2025-02-23 10:53:02'),
(3, 'Korea', '2025-02-23 23:06:39', '2025-02-23 23:06:39'),
(4, 'Thailand', '2025-02-23 23:06:47', '2025-02-23 23:06:47'),
(5, 'Amerika', '2025-02-23 23:06:53', '2025-02-23 23:06:53'),
(6, 'Inggris', '2025-02-23 23:06:58', '2025-02-23 23:06:58'),
(7, 'Malaysia', '2025-02-23 23:07:04', '2025-02-23 23:07:04'),
(8, 'Perancis', '2025-02-23 23:07:11', '2025-02-23 23:07:11'),
(9, 'Italia', '2025-02-23 23:07:17', '2025-02-23 23:07:17'),
(10, 'Turki', '2025-02-23 23:07:24', '2025-02-23 23:07:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` bigint(20) UNSIGNED NOT NULL,
  `id_film` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nilai_rating` decimal(3,1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_film`, `id_user`, `nilai_rating`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '9.0', '2025-02-24 15:31:20', '2025-02-24 15:31:55'),
(2, 10, 4, '8.0', '2025-02-25 06:15:29', '2025-02-25 06:15:29'),
(3, 11, 4, '6.0', '2025-02-25 09:39:48', '2025-02-25 09:39:48'),
(4, 21, 3, '8.0', '2025-03-03 03:46:06', '2025-03-03 03:55:39'),
(5, 21, 4, '9.0', '2025-03-03 03:58:44', '2025-03-03 03:58:44'),
(7, 21, 6, '10.0', '2025-03-08 16:12:01', '2025-03-08 16:12:11'),
(13, 21, 7, '6.0', '2025-03-16 04:20:24', '2025-03-16 15:00:27'),
(14, 23, 7, '1.0', '2025-03-16 15:06:56', '2025-03-16 15:06:56'),
(15, 7, 7, '8.0', '2025-03-17 06:04:42', '2025-03-17 06:04:42'),
(16, 33, 8, '9.0', '2025-03-18 02:06:51', '2025-03-18 02:06:51'),
(17, 34, 7, '9.0', '2025-03-18 03:35:04', '2025-03-18 03:35:04'),
(18, 9, 7, '5.0', '2025-03-19 01:28:01', '2025-03-19 01:28:22'),
(19, 32, 8, '8.0', '2025-03-19 06:52:51', '2025-03-19 06:52:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(10) UNSIGNED NOT NULL,
  `tahun_rilis` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `usia` int(5) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` text DEFAULT NULL,
  `role` enum('subscriber','author','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `usia`, `email`, `password`, `profile`, `role`, `created_at`, `updated_at`, `gambar`) VALUES
(1, 'Supri Yatno', 23, 'admin@admin.com', '$2y$10$CB5JD6q17gDocOuAyaGn7OZVISjqikvkRJF1mE/OYGdsXTDo4RDX6', '<p>dflkfjlasfdlkjsaf</p>', 'admin', '2025-02-23 02:51:26', '2025-03-07 08:06:55', '1740842167_be2cfdfe8e436643b20c.jpeg'),
(2, 'Firmansyah', NULL, 'm2sc85@gmail.com', '$2y$10$KEwMCyd3uOzaZ/w1df6joOCXLmKkSDMGyCH8t5K5KhmgF4ZJIpwMG', NULL, 'subscriber', '2025-02-25 01:32:42', '2025-02-25 01:32:42', ''),
(3, 'Andi', NULL, 'andi@gmail.com', '$2y$10$iZBE6XAS8XMGM2hXwQyMbe3VXlCqtnT0BhFhwj.OBqDTcsbZ.yD56', NULL, 'subscriber', '2025-02-25 01:41:38', '2025-02-25 01:41:38', ''),
(4, 'Rini', NULL, 'msr19881985@gmail.com', '$2y$10$Go8NeLPrqzAmSQctb3gje.DHMDsjWXtjxfqlFyo1BV48FHkKtiuaK', NULL, 'subscriber', '2025-02-25 02:00:48', '2025-03-03 03:58:10', ''),
(5, 'Ukasyah', NULL, 'ukasyah@gmail.com', '$2y$10$HI8cUPDUboJaGCEaSqGHzO93Tz11Ai6MfoTdKLzM7P384EG9GBetO', NULL, 'author', '2025-02-25 02:36:53', '2025-03-02 15:16:02', ''),
(6, 'Ikhsan Satria', 21, 'ikhsansatriapratama14@gmail.com', '$2y$10$GgD6DvZsspPqjRIMvNXuIOkuEzDmaUsaBmT7fjAGzwd.QEEBsVhvq', 'programer', 'admin', '2025-03-02 14:26:53', '2025-03-16 14:03:13', '1740925667_74fcf4b3bbc95bf51003.jpg'),
(7, 'blue', 20, 'blue@gmail.com', '$2y$10$BeL2n.E/e9y0Spk/1XGoeu44PhuxlA9lv7RMdr1OHbit8JU5muIGq', 'dsafasfasfasf', 'author', '2025-03-07 16:20:07', '2025-03-19 01:12:31', '1742022782_0770f5736f424575e137.jpg'),
(8, 'white', 20, 'white@gmail.com', '$2y$10$DOepfLmGRLTGYduCH6RtWOA9XkDmW2BixOyhh1atHnDnxCyF05ni2', '', 'subscriber', '2025-03-18 00:55:23', '2025-03-18 02:19:22', '1742264362_83d1b420ee5944884af9.jpg'),
(10, 'osas', 20, 'osas@gmail.com', '$2y$10$NAWRvBwwtmllBGKoPBucouu73MOPeXRDW9o1nklaSzalWc5n6cR.2', NULL, 'admin', '2025-03-19 07:47:24', '2025-03-19 07:47:24', ''),
(11, 'yoyo', 21, 'yy@gmail.com', '$2y$10$NDoV8Jr8u7WAZ7GMiOfOburh8hrxx5Jnl3mayu0ZQH67tURY.YUOu', NULL, 'subscriber', '2025-03-19 16:41:26', '2025-03-19 16:41:26', ''),
(12, 'hai', 11, 'hai@gmail.com', '$2y$10$toZSx9s1e6I5kONwoYmiw.xK9wDahfaAw3UZUNKqchyevWgAwXm2W', NULL, 'author', '2025-03-19 16:44:06', '2025-03-19 16:44:06', ''),
(13, 'layyy', 20, 'lay@gmail.com', '$2y$10$eKxrk5IDSLf9a2MWQeyz2uRyL/BVf0hK2HvbQqvJZU0PRwswYkZzS', NULL, 'admin', '2025-03-20 01:19:31', '2025-03-20 01:19:31', ''),
(14, 'loy', 22, 'loy@gmail.com', '$2y$10$1RaXfRKfMOqOwJ5WOYvAV.nznbQ5wDHk.4ysrF/9st6SShFrVVnie', NULL, 'subscriber', '2025-03-20 01:20:06', '2025-03-20 01:20:59', ''),
(15, 'oi', 21, 'oi@gmail.com', '$2y$10$mDplAISamKjL.zPdku7mA.uX4rL6rwZvT4qJ4me24W3QoHoooXZfq', NULL, 'subscriber', '2025-03-20 01:59:33', '2025-03-20 01:59:33', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `genre` (`genre`),
  ADD KEY `negara` (`negara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_favorite` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `negara`
--
ALTER TABLE `negara`
  MODIFY `id_negara` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`id_genre`) ON DELETE SET NULL,
  ADD CONSTRAINT `film_ibfk_3` FOREIGN KEY (`negara`) REFERENCES `negara` (`id_negara`) ON DELETE SET NULL,
  ADD CONSTRAINT `film_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  ADD CONSTRAINT `gambar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
