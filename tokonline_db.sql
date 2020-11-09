-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2020 pada 15.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokonline_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamats`
--

CREATE TABLE `alamats` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `daerah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamats`
--

INSERT INTO `alamats` (`id`, `id_user`, `daerah`, `detail`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jakarta Selatan', 'Jalan Ahmad Yani', '2020-11-08 10:22:26', '2020-11-08 10:22:26'),
(2, 3, 'Jambi', 'Jalan Sutoyo', '2020-11-08 18:06:02', '2020-11-08 18:06:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah_diskon` int(11) NOT NULL,
  `kode_diskon` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_diskon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `jumlah_diskon`, `kode_diskon`, `status_diskon`, `expired`, `created_at`, `updated_at`) VALUES
(1, 10000, '1XP4NK', 'Sudah', '2020-11-28', '2020-11-08 10:51:13', '2020-11-08 11:06:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Alat Elektronik', 'alat-elektronik', '2020-11-08 10:16:56', '2020-11-08 10:16:56'),
(2, 'Alat Masak', 'alat-masak', '2020-11-08 10:17:03', '2020-11-08 10:17:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemesanan_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `sub_total` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `pemesanan_id`, `produk_id`, `sub_total`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100000, 1, '2020-11-08 10:22:48', '2020-11-08 10:22:48'),
(2, 2, 1, 100000, 2, '2020-11-08 10:59:20', '2020-11-08 10:59:29'),
(3, 4, 1, 100000, 1, '2020-11-08 11:18:52', '2020-11-08 18:04:26'),
(4, 6, 1, 100000, 2, '2020-11-08 18:18:23', '2020-11-08 18:18:53'),
(5, 7, 1, 100000, 3, '2020-11-09 04:50:53', '2020-11-09 04:54:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1020_11_08_055103_create_kategoris_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_12_03_051604_create_alamats_table', 1),
(5, '2018_12_13_1614_create_diskons_table', 1),
(6, '2019_10_24_223831_create_produks_table', 1),
(7, '2019_10_24_225239_create_pemesanans_table', 1),
(8, '2019_10_24_226231_create_keranjangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `alamat_id` int(10) UNSIGNED DEFAULT NULL,
  `diskon_id` int(10) UNSIGNED DEFAULT NULL,
  `kode_verifikasi` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pesan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_publish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `alamat_id`, `diskon_id`, `kode_verifikasi`, `total_harga`, `status`, `status_pesan`, `status_publish`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 1, 100000, 'Checkout', 'Ditolak', NULL, '2020-11-06 17:00:00', '2020-11-08 11:11:01'),
(2, 2, 1, NULL, 1, 200000, 'Checkout', 'Default', NULL, '2020-11-08 10:23:20', '2020-11-08 11:06:10'),
(3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-08 11:06:10', '2020-11-08 11:06:10'),
(4, 3, 2, NULL, 2, 100000, 'Checkout', 'Default', NULL, '2020-11-08 11:18:26', '2020-11-09 04:49:19'),
(6, 6, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-11-08 18:18:02', '2020-11-08 18:18:02'),
(7, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 04:49:20', '2020-11-09 04:49:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `gambar`, `kategori`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Panci Stainless', 'lorem ipsum dolor si amet', 'BA6dI8dj8unI.jpg', 1, 100000, 77, '2020-11-08 10:17:45', '2020-11-08 10:17:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `content` varchar(191) DEFAULT NULL,
  `pict` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `title`, `content`, `pict`, `created_at`, `updated_at`) VALUES
(1, 'Judul untuk KOnten', 'Isi konten untuk slider disini', 'slider1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `pict` varchar(18) DEFAULT NULL,
  `sebagai` varchar(25) DEFAULT NULL,
  `testi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `pict`, `sebagai`, `testi`, `created_at`, `updated_at`) VALUES
(1, 'Nama Client', 'foto.png', 'Owner CV Batang', 'Nsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna alierqua Ut enierim ad minim veniam, quis nostrud exercitation ullamco laboris nissdi ut aliquip exeriommodo consequate Duis aute irure dolor in reprehenderit in voluptate.', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `no_hp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '0123456789', 'admin@admin.com', NULL, '$2y$10$ermXpxh5dmUXVb1LvoETeuNBVhnRn1/4GMilsST2pP7shNmWrngOq', NULL, NULL, NULL),
(2, 'Members', 'Customer 1', '08151863421', 'customer@mail.com', NULL, '$2y$10$jmCBCpMqNwVMkxLFKC3yQ.0IhzrIwkbtukVRIYUi9eLobYnJ5jin.', NULL, NULL, NULL),
(3, 'Members', 'Knight', '081234561222', 'customer27@mail.com', NULL, '$2y$10$rHdaznU.z5VAjlWd7F2wPO9PAD0WQkSUbOI8YRsgb0QOo43V4y5aG', NULL, '2020-11-08 11:18:26', '2020-11-08 11:18:26'),
(6, 'Members', 'Greedy \'Mike\' Knight', '12345678', 'ksatriaknight@gmail.com', NULL, '$2y$10$68lZ6meIOb6K5Li5.Vb5se6FTHZj3lxebac32tj.MeSB23aeOwmmG', NULL, '2020-11-08 18:18:01', '2020-11-08 18:18:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamats_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diskon_kode_diskon_unique` (`kode_diskon`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_user_id_foreign` (`user_id`),
  ADD KEY `pemesanan_alamat_id_foreign` (`alamat_id`),
  ADD KEY `pemesanan_diskon_id_foreign` (`diskon_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_kategori_foreign` (`kategori`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD CONSTRAINT `alamats_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_alamat_id_foreign` FOREIGN KEY (`alamat_id`) REFERENCES `alamats` (`id`),
  ADD CONSTRAINT `pemesanan_diskon_id_foreign` FOREIGN KEY (`diskon_id`) REFERENCES `diskon` (`id`),
  ADD CONSTRAINT `pemesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_foreign` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
