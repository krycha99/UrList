-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Paź 2022, 13:03
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `urlist`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(44, '2014_10_12_000000_create_users_table', 1),
(45, '2014_10_12_100000_create_password_resets_table', 1),
(46, '2019_08_19_000000_create_failed_jobs_table', 1),
(47, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(48, '2022_09_02_115213_create_movies_table', 1),
(49, '2022_09_23_134544_creates_movie_user_pivot_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episodes` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `type`, `year`, `episodes`, `categories`, `poster`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Chernobyl', 'Series', '2019', 5, 'drama', 'posters/f69RXIad4ztD9Cbeqx5NgVwCoMKQSFYFsQvsd47Y.jpg', 'After the Chernobyl nuclear power plant exploded, rescuers sacrifice their health and lives to save Europe from the consequences of the disaster.', '2022-10-12 11:15:46', '2022-10-12 11:15:46'),
(3, 'Game of Thrones', 'Series', '2011-2019', 79, 'drama, fantasy, adventure', 'posters/0SkBOGLegRxPY1bNqquliHeNpj9VESoqFZNoLSA7.jpg', 'Adaptation of the saga by George R.R. Martin. Power struggles, conspiracies and crimes are commonplace in the kingdom of Westeros.', '2022-10-12 11:18:37', '2022-10-12 11:18:37'),
(4, 'Breaking Bad', 'Series', '2008-2013', 64, 'drama, thriller', 'posters/e2FXnzl927Z0XpH2MHSI9CHe9J7tny9dtN1uoiPF.jpg', 'When a chemistry teacher learns that he has cancer, he decides to start producing methamphetamine to financially secure his family.', '2022-10-12 11:22:22', '2022-10-12 11:22:22'),
(5, 'Intouchables', 'Movie', '2011', 1, 'drama, comedy', 'posters/2AMKKPXUIohwZd5D9JT42stlnItC1ANMXa4N3MT5.jpg', 'A paralyzed millionaire hires a young suburban boy who has just released from prison.', '2022-10-12 11:24:58', '2022-10-12 11:24:58'),
(6, 'The Green Mile', 'Movie', '1999', 1, 'drama', 'posters/pm8sFRlVIWIGBXbK7uDltxQZz2gSmoFSiaP2Rf4T.jpg', 'A retired prison guard tells a friend about an extraordinary man who was sentenced to death for the murder of two 9-year-old girls.', '2022-10-12 11:26:16', '2022-10-12 11:26:16'),
(7, 'Forrest Gump', 'Movie', '1994', 1, 'drama, comedy', 'posters/Jrf1HkzbeacOqaWzIjnSYU46MA6glS9i4oasIUzc.jpg', 'The life story of Forrest, a boy with a low IQ with paralysis, who becomes a billionaire and a hero of the Vietnam War.', '2022-10-12 11:28:03', '2022-10-12 11:28:03'),
(8, 'Band of Brothers', 'Series', '2001', 10, 'drama, war', 'posters/c4fZF88Wp99R89gNKlZ3rxNy2yyKrdFMyL6tZDkS.jpg', 'The fate of the E Company, 506th Parachute Infantry Regiment, 101st Airborne Division of the US Army, told from the perspective of those who survived the Second World War.', '2022-10-12 11:30:17', '2022-10-12 11:30:17'),
(9, 'The Office', 'Series', '2005-2013', 214, 'comedy', 'posters/LEeoOcwkHBJi9Uw74QGqSRWbFaXlkelgDMN1qd8f.jpg', 'Cameras accompany employees of a branch of a company selling paper products during their daily duties.', '2022-10-12 11:31:35', '2022-10-12 11:31:35'),
(10, 'Rick and Morty', 'Series', '2013', 68, 'comedy, adventure, Sci-Fi, animation', 'posters/rSKU2sSazZl4J9Wyj55BjoQ0PDSolxSRtLChSr1W.jpg', 'Eccentric scientist Rick travels with his grandson Morty to the strangest places in the galaxy and alternative realities.', '2022-10-12 11:33:38', '2022-10-12 11:33:38'),
(11, 'Sherlock', 'Series', '2010-2017', 16, 'drama, thriller', 'posters/SIzyEQHSsFXTQYyfKa9L2cCbM4ZzULEvLGjN9grq.jpg', 'John Watson is a military doctor who recently returned from the war. When he meets the brilliant detective Sherlock Holmes, he begins to help him solve criminal riddles.', '2022-10-12 11:35:08', '2022-10-12 11:35:08'),
(12, 'Sweet Tooth', 'Series', '2021', 8, 'drama, fantasy', 'posters/Yo1PmXyKL8ToVwsZMHoDMbE1rh15inKBTnPSOuA2.jpg', 'Gus, a half-deer, half-boy, discovers that the world has been destroyed by a cataclysm. He joins a family of hybrids like him.', '2022-10-12 11:37:32', '2022-10-12 11:37:32'),
(13, 'CYBERPUNK: EDGERUNNERS', 'Series', '2022', 10, 'action, Sci-Fi, anime', 'posters/wS3WmoZiln4F0wRpydKdJheq3yj659MJA3ULrJ2z.jpg', 'In a demoralized city where cybernetic modification of the organism is the norm, a capable street boy wants to become an edgerunner, i.e. an outlawed mercenary.', '2022-10-12 11:39:15', '2022-10-12 11:39:15'),
(14, 'The Chestnut Man', 'Series', '2021', 6, 'thriller', 'posters/AaCbT4kS6WpowlaXtM1Rvyl0msxShzbnQ7KgERNO.jpg', 'A girl is found brutally murdered in a Copenhagen playground, with a chestnut man hanging over her.', '2022-10-12 11:42:04', '2022-10-12 11:42:04'),
(15, 'ARCANE', 'Series', '2021', 10, 'animation, fantasy, adventure', 'posters/q2gaZC6JPXhBFraQ0kO5nhqhgW6vrZ36GHs6cCre.jpg', 'An animated series about the origins of two iconic League of Legends heroes - and about the power that will separate them.', '2022-10-12 11:43:30', '2022-10-12 11:43:30'),
(16, 'Black Bird', 'Series', '2022', 6, 'drama, thriller', 'posters/Et4mZsrDG5vWGip4choeSi8frDC2FFGZ84slJ8U9.jpg', 'Jimmy Keene, who is just entering a ten-year sentence, receives an unusual offer - if he can get information from the suspect in Larry Hall\'s murder, he will be free. Fulfilling this mission becomes Jimmy\'s goal in life.', '2022-10-12 11:45:04', '2022-10-12 11:45:04'),
(17, 'House of the Dragon', 'Series', '2022', 11, 'drama, fantasy', 'posters/VbRndEqIWe6Sl579eN39V677rynDxrItBhq9wb65.jpg', 'The series tells the story of the Targaryen family and the events that take place 200 years before the times in \"Game of Thrones\".', '2022-10-12 11:47:18', '2022-10-12 11:47:18'),
(18, 'PEAKY BLINDERS', 'Series', '2013-2022', 37, 'thriller, drama', 'posters/1Zhs2BB54WHm065t7fe0XcvHNXqgOnKntE8m7A6s.jpg', 'Belonging to the Birmingham gangster family, Tommy Shelby tries to increase his influence by using a stolen shipment of weapons.', '2022-10-12 11:48:47', '2022-10-12 11:48:47'),
(19, 'Stranger Things', 'Series', '2016', 34, 'drama, horror, Sci-Fi', 'posters/oxsphNwIpmwDzFAehlnTM3lfzoyVOOu7keusBOH6.jpg', 'Twelve-year-old Will Byers disappears when he returns home. The disappearance of a boy is the beginning of strange and dangerous events plaguing a provincial town.', '2022-10-12 11:50:36', '2022-10-12 11:50:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movie_user`
--

CREATE TABLE `movie_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episodesWatched` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `profileImg`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TestUser', 'TestUser', 'test@test.com', 'avatars/6S7mdgwbKZjMG6w6Vna1FBr4Q2MX77CnOmrmURNZ.jpg', NULL, '$2y$10$nk9Ndk96nJZuTJbN/u9EwuQVC.h0qCDRHD/k9Nf.EbAN2SV7MgF9C', NULL, '2022-10-12 11:05:18', '2022-10-12 11:08:33');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movie_user`
--
ALTER TABLE `movie_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `movie_user`
--
ALTER TABLE `movie_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
