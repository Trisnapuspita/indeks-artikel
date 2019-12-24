-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2019 pada 11.52
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indeks-artikel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_editions`
--

CREATE TABLE `article_editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `edition_title_id` bigint(20) UNSIGNED NOT NULL,
  `article_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` bigint(20) DEFAULT NULL,
  `column` bigint(20) DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `article_editions`
--

INSERT INTO `article_editions` (`id`, `user_id`, `edition_title_id`, `article_title`, `subject`, `writer`, `pages`, `column`, `source`, `desc`, `keyword`, `detail_img`, `updated_by`, `created_at`, `updated_at`) VALUES
(32, 1, 83, 'Mentari tenggelam', 'Fiksi', 'Trisna', 1, 1, 'www.trisna.com', NULL, 'matahari', NULL, NULL, '2019-10-11 01:21:13', '2019-10-11 01:21:13'),
(33, 1, 84, 'wwwwwwwwwww', 'aaaaaa', 'aaaaaa', 1, 1, 'aaaaaaa', 'rrrrrrr', 'dbdbd', 'rrrrrr', NULL, '2019-10-30 22:16:23', '2019-10-30 22:16:23'),
(34, 1, 83, 'Berlariiiiiinnnnn', 'aaaaaa', 'aaaaaa', 1, 1, 'aaaaaaa', 'cccccc', 'ccccc', 'cccccc', NULL, '2019-11-01 03:02:28', '2019-11-01 03:02:28'),
(35, 1, 83, 'Berlariiiiiimmmmmm', 'aaaaaa', 'aaaaaa', 1, 1, 'aaaaaaa', 'mmmmmmmm', 'mmmmmmm', 'mmmmmmm', NULL, '2019-11-01 03:19:16', '2019-11-01 03:19:16'),
(36, 1, 83, 'Mentari tenggelam nii', 'Fiksi', 'Trisna', 1, 1, 'www.trisna.com', NULL, 'matahariiiiii', NULL, NULL, '2019-11-01 03:42:54', '2019-11-01 03:42:54'),
(37, 1, 83, 'baruuu', 'Fiksi', 'Trisna', 1, 1, 'www.trisna.com', NULL, 'matahariiiiii', NULL, NULL, '2019-11-01 03:50:29', '2019-11-01 03:50:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_edition_status`
--

CREATE TABLE `article_edition_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_edition_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `article_edition_status`
--

INSERT INTO `article_edition_status` (`id`, `article_edition_id`, `status_id`, `created_at`, `updated_at`) VALUES
(17, 33, 1, NULL, NULL),
(18, 34, 3, NULL, NULL),
(19, 35, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `edition_titles`
--

CREATE TABLE `edition_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `edition_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugs` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition_no` int(11) DEFAULT NULL,
  `publish_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `edition_titles`
--

INSERT INTO `edition_titles` (`id`, `user_id`, `title_id`, `edition_code`, `edition_year`, `edition_title`, `slugs`, `volume`, `chapter`, `edition_no`, `publish_date`, `publish_month`, `publish_year`, `original_date`, `call_number`, `edition_image`, `updated_by`, `created_at`, `updated_at`) VALUES
(83, 1, 44, '2', '222', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '111111111122', NULL, NULL, NULL, '2019-10-11 01:21:13', '2019-10-11 01:21:13'),
(84, 1, 45, '222', '2002', '2', '2', '1', '2', 2, '2', '6', '2002', '11-11-2000', '555', NULL, NULL, '2019-10-30 22:16:23', '2019-10-30 22:16:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formats`
--

CREATE TABLE `formats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `formats`
--

INSERT INTO `formats` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Digital', 1, '2019-08-22 08:09:47', '2019-08-22 08:09:47'),
(2, 'Bentuk Mikro', 1, '2019-08-22 08:09:56', '2019-08-22 08:09:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_title`
--

CREATE TABLE `format_title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `format_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `format_title`
--

INSERT INTO `format_title` (`id`, `format_id`, `title_id`, `created_at`, `updated_at`) VALUES
(27, 1, 44, NULL, NULL),
(28, 2, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `languages`
--

INSERT INTO `languages` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', 1, '2019-08-22 08:09:23', '2019-08-22 08:09:23'),
(2, 'English', 1, '2019-08-22 08:09:32', '2019-08-22 08:09:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `language_title`
--

CREATE TABLE `language_title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `language_title`
--

INSERT INTO `language_title` (`id`, `title_id`, `language_id`, `created_at`, `updated_at`) VALUES
(11, 44, 1, NULL, NULL),
(12, 45, 1, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_12_024542_create_types_table', 1),
(4, '2019_08_12_024843_create_times_table', 1),
(5, '2019_08_12_024905_create_languages_table', 1),
(6, '2019_08_12_024948_create_formats_table', 1),
(7, '2019_08_13_032950_create_statuses_table', 1),
(17, '2019_08_16_035910_create_titles_table', 2),
(18, '2019_08_17_173103_title_type_table', 2),
(20, '2019_08_17_175233_format_title_table', 2),
(21, '2019_08_17_181430_time_title_table', 2),
(22, '2019_08_20_034346_create_edition_titles', 2),
(27, '2019_08_30_074615_create_article_editions_table', 3),
(34, '2019_08_30_083614_create_article_edition_status_table', 6),
(35, '2019_08_17_175148_language_title_table', 7),
(37, '2019_09_13_033453_update_titles_table', 8),
(38, '2019_09_13_084831_update_article_editions_table', 9),
(39, '2019_09_16_005650_update_types_table', 10),
(40, '2019_09_29_104151_update_title_table', 11),
(41, '2019_09_29_214359_update_edition_table', 12),
(42, '2019_10_08_041632_update_edition_table', 13),
(43, '2019_10_25_025304_update_some_tables', 14);

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
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dapat Digunakan', 1, '2019-08-22 08:12:50', '2019-08-22 08:12:50'),
(3, 'Tidak dapat digunakan', 1, '2019-09-11 00:24:54', '2019-09-11 00:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `times`
--

INSERT INTO `times` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tahunan', 1, '2019-08-22 08:08:37', '2019-08-22 08:08:37'),
(2, 'Bulanan', 1, '2019-08-22 08:08:45', '2019-08-22 08:08:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `time_title`
--

CREATE TABLE `time_title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `time_title`
--

INSERT INTO `time_title` (`id`, `title_id`, `time_id`, `created_at`, `updated_at`) VALUES
(21, 44, 1, NULL, NULL),
(22, 45, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `first_year` int(11) DEFAULT NULL,
  `featured_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `titles`
--

INSERT INTO `titles` (`id`, `user_id`, `title`, `kode`, `slug`, `city`, `publisher`, `year`, `first_year`, `featured_img`, `updated_by`, `created_at`, `updated_at`) VALUES
(44, 1, '111111', '2', '111111', NULL, NULL, NULL, NULL, 'Untitled design.jpg.png', '1', '2019-10-11 01:21:13', '2019-10-13 09:18:00'),
(45, 1, 'Waktuuuuuuuuuuuuuuuuu', '9', 'waktuuuuuuuuuuuuuuuuu', 'hjghghj', 'vvhj', 888, 211111, NULL, NULL, '2019-10-30 22:16:23', '2019-10-30 22:16:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `title_type`
--

CREATE TABLE `title_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `title_type`
--

INSERT INTO `title_type` (`id`, `title_id`, `type_id`, `created_at`, `updated_at`) VALUES
(20, 44, 1, NULL, NULL),
(21, 45, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Majalah', 1, '2019-08-22 08:08:11', '2019-10-07 04:08:38'),
(6, 'Surat Kabar', 1, '2019-10-27 18:33:18', '2019-10-27 18:33:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `longname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'trisnapspt', 'Trisna Puspita', 'trisna@trisna.com', NULL, '$2y$10$XgvP2DF8GzEFMrIsMlv3/.zy8hTVaNjdP2PWHoQW9CJnc4zcnOdm.', 'JgauoCfpD24oMdvhsLMUQiHKli2F1F62s5s5jYjrgKMikkbniuHdDtTLz1U0', '2019-08-22 08:07:50', '2019-08-22 08:07:50'),
(2, 'puti', 'Puti Andini', 'puti@puti.com', NULL, '$2y$10$KUj4LMmxORrXSB7d9/NCp.EbfHd1/hNn0X2p4DRIeFG/zdbTKCpZ.', NULL, '2019-09-05 20:05:50', '2019-09-05 20:05:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article_editions`
--
ALTER TABLE `article_editions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_editions_user_id_foreign` (`user_id`),
  ADD KEY `article_editions_edition_title_id_foreign` (`edition_title_id`);

--
-- Indeks untuk tabel `article_edition_status`
--
ALTER TABLE `article_edition_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_edition_status_article_edition_id_foreign` (`article_edition_id`),
  ADD KEY `article_edition_status_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `edition_titles`
--
ALTER TABLE `edition_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `edition_code` (`edition_code`),
  ADD KEY `edition_titles_user_id_foreign` (`user_id`),
  ADD KEY `edition_titles_title_id_foreign` (`title_id`);

--
-- Indeks untuk tabel `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formats_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `format_title`
--
ALTER TABLE `format_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `format_title_title_id_foreign` (`title_id`),
  ADD KEY `format_title_format_id_foreign` (`format_id`);

--
-- Indeks untuk tabel `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `language_title`
--
ALTER TABLE `language_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_title_title_id_foreign` (`title_id`),
  ADD KEY `language_title_language_id_foreign` (`language_id`);

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
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuses_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `times_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `time_title`
--
ALTER TABLE `time_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_title_title_id_foreign` (`title_id`),
  ADD KEY `time_title_time_id_foreign` (`time_id`);

--
-- Indeks untuk tabel `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `titles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `title_type`
--
ALTER TABLE `title_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_type_title_id_foreign` (`title_id`),
  ADD KEY `title_type_type_id_foreign` (`type_id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article_editions`
--
ALTER TABLE `article_editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `article_edition_status`
--
ALTER TABLE `article_edition_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `edition_titles`
--
ALTER TABLE `edition_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `formats`
--
ALTER TABLE `formats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `format_title`
--
ALTER TABLE `format_title`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `language_title`
--
ALTER TABLE `language_title`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `time_title`
--
ALTER TABLE `time_title`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `title_type`
--
ALTER TABLE `title_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `article_editions`
--
ALTER TABLE `article_editions`
  ADD CONSTRAINT `article_editions_edition_title_id_foreign` FOREIGN KEY (`edition_title_id`) REFERENCES `edition_titles` (`id`),
  ADD CONSTRAINT `article_editions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `article_edition_status`
--
ALTER TABLE `article_edition_status`
  ADD CONSTRAINT `article_edition_status_article_edition_id_foreign` FOREIGN KEY (`article_edition_id`) REFERENCES `article_editions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_edition_status_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Ketidakleluasaan untuk tabel `edition_titles`
--
ALTER TABLE `edition_titles`
  ADD CONSTRAINT `edition_titles_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`),
  ADD CONSTRAINT `edition_titles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `formats`
--
ALTER TABLE `formats`
  ADD CONSTRAINT `formats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `format_title`
--
ALTER TABLE `format_title`
  ADD CONSTRAINT `format_title_format_id_foreign` FOREIGN KEY (`format_id`) REFERENCES `formats` (`id`),
  ADD CONSTRAINT `format_title_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `language_title`
--
ALTER TABLE `language_title`
  ADD CONSTRAINT `language_title_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `language_title_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `time_title`
--
ALTER TABLE `time_title`
  ADD CONSTRAINT `time_title_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`),
  ADD CONSTRAINT `time_title_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `titles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `title_type`
--
ALTER TABLE `title_type`
  ADD CONSTRAINT `title_type_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `title_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Ketidakleluasaan untuk tabel `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
