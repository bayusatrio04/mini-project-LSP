-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 10:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Galang Dana', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(2, 'Workshop', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(3, 'Seminar', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(4, 'Conference', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(5, 'Exhibition', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(6, 'Networking', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(7, 'Rock', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(8, 'Jazz', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(9, 'Pop', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(10, 'Classical', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57'),
(11, 'EDM', NULL, '2023-12-12 12:29:57', '2023-12-12 12:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_events` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `total_tickets` int(11) NOT NULL,
  `sold_tickets` int(11) NOT NULL DEFAULT 0,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `category_events`, `start_date`, `end_date`, `location`, `ticket_price`, `total_tickets`, `sold_tickets`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'Rock In Solo Festival 2023', 'Sejak pertama kali dihelat di tahun 2004, Rock in Solo terus berkembang menjadi salah satu festival musik keras terbesar di Indonesia yang ditunggu-tunggu penggemar musik keras dari seluruh penjuru negeri dan luar negeri.\r\n\r\nPerhelatan kesebelas akan digelar pada Minggu 10 Desember 2023 di Benteng Vastenburg Solo dengan menghadirkan beberapa band internasional dan nasional.\r\n\r\nJadilah bagian dari sejarah Rock in Solo. Karena sejarah belum selesai ditulis!\r\n\r\nSakjose!\r\n\r\nSyarat & Ketentuan\r\n\r\n1. Memiliki nomor handphone dan alamat email aktif yang dapat dihubungi.\r\n\r\n2. Pembelian tiket maksimal sejumlah 3 (tiga) tiket per transaksi.\r\n\r\n3. Tiket dapat dipindah tangankan dengan syarat dan ketentuan berlaku.\r\n\r\n4. Pengunjung dengan usia 0-12 tahun/ dibawah tinggi 110cm (Anak) tidak diwajibkan membeli tiket.\r\n\r\n5. Pembeli tiket Rock In Solo Festival akan menerima tiket elektronik melalui email.\r\n\r\nLabel\r\n\r\nrockmusic\r\nrockinsolofestival\r\nrockinsolo\r\neventmusik\r\neventsolo', '2,4,7', '2023-12-10 10:00:00', '2023-12-10 10:59:00', 'Benteng Vastenburg, Jawa Tengah', 100000, 249, 0, 'events/RgkSk28IEW35zRMXUg92CYodJFou0egt4HrGChBL.jpg', '2023-12-12 13:22:14', '2023-12-12 13:38:21'),
(3, 'KONSER KEMANUSIAAN UNTUK GAZA', 'Konser Kemanusiaan Untuk Gaza\r\n\r\nBahwa sesungguhnya Kemerdekaan itu ialah hak segala bangsa dan oleh sebab itu, maka penjajahan di atas dunia harus dihapuskan, karena tidak sesuai dengan perikemanusiaan dan perikeadilan\r\n\r\nLatar Belakang\r\n\r\nPembantaian massal secara sistematis terhadap satu suku bangsa (genosida) yang dilakukan oleh Israel hingga kini di Jalur Gaza, Palestina telah menjadi tragedi kemanusiaan teramat panjang yang sangat memilukan.\r\n\r\nDalam kurun waktu sebulan terakhir, hingga 9 November 2023, dilaporkan Kementerian Kesehatan Gaza ada 10.812 orang tewas sia-sia, yang sebagian besar korbannya adalah anak-anak, kaum perempuan, serta warga sipil tak berdaya lainnya.\r\n\r\nJumlah korban jiwa yang tewas selama setahun peperangan Rusia dengan Ukraina bahkan telah terlampaui hanya dalam sebulan saja di Jalur Gaza. Berbagai upaya diplomasi yang dilakukan via DK PBB demi mewujudkan gencatan senjata hingga kini terus menerus gagal/digagalkan menjadi kenyataan.\r\n\r\nSementara itu agresi militer Israel kian membabi buta tak terkendali menyasar pemukiman sipil, rumah sakit bahkan kamp-kamp pengungsian. Hingga hari ini, detik ini pun korban jiwa terus berjatuhan di Palestina. Lalu apakah kita hanya akan berdiam diri saja?\r\n\r\nM Bloc Foundation berkolaborasi dengan komunitas musik dari empat belas musisi/band ternama Indonesia kemudian tergerak untuk menggalang solidaritas serta dana bantuan bagi para pengungsi dan korban di Jalur Gaza, khususnya melalui medium yang ditekuni secara profesional dan digemari bersama yaitu musik.\r\n\r\nSyarat & Ketentuan\r\n\r\n1. Acara ini adalah acara donasi. Seluruh dana donasi yang terkumpul yang terkumpul 100% akan digunakan untuk donasi ke Gaza melalui Kedubes Palestina\r\n2. Setiap donasi akan mendapatkan barcode yang dapat digunakan untuk menyaksikan para penampil di hari sesuai dengan tanggal donasi yang dipilih\r\n3. Barcode yang dikirimkan dari loket.com ke email/whatsapp pembeli adalah tanggung jawab pemberi donasi. Harap menjaga dan tidak menyebarluaskan barcode yang dimiliki.\r\n4. Harap membawa kartu identitas asli dan barcode dari Loket.com pada saat memasuki venue.\r\n\r\nPenyelenggara memiliki hak untuk:\r\n1. Melarang masuk penngunjung jika barcode telah dipergunakan oleh orang lain.\r\n2. Melarang masuk pengunjung ke area venue jika barcode yang digunakan tidak valid.\r\n3. Harap mematuhi protokol keselamatan dan keamanan yang diterapkan penyelenggara di area venue\r\n4. Pihak yayasan berhak menindak tegas, dan berhak mengeluarkan penonton apabila tidak mematuhi protokol yang telah ditetapkan.\r\n5. Dilarang membawa makanan dan minuman dari luar ke dalam venue.\r\n6. Dilarang membawa dan menggunakan segala obat-obatan terlarang, narkoba, psikotropika, atau barang-barang yang mengandung zat berbahaya lainnya.\r\n7. Dilarang membawa senjata tajam/api, bahan peledak, serta benda-benda yang dilarang berdasarkan ketentuan perundangan yang berlaku ke dalam venue.\r\n8. Dilarang membawa kamera profesional ke dalam venue (mirrorless, dslr, dan sejenisnya).\r\n9. Dilarang melakukan monetasi konten pertunjukan musik ini tanpa persetujuan dari pemegang hak cipta.\r\n10. Dilarang membawa dan  merokok (termasuk vape dan rokok elektrik) ke dalam venue livehouse, silakan merokok di area outdoor M Bloc Space yang telah ditentukan.\r\n\r\nLabel\r\n\r\nmbloc\r\ndonasi\r\nkemanusiaan\r\nGaza\r\nPalestina', '1,3,4,8,9,10', '2023-11-21 19:00:00', '2023-12-13 10:00:00', 'M Bloc Live House, DKI Jakarta', 100000, 300, 0, 'events/H2dCXUQO1zprGM6RcEIjn4lEVmpbCOzeC3fEDT3k.jpg', '2023-12-12 13:25:08', '2023-12-12 13:25:08'),
(4, 'New Years Eve Party \"Back To High School\"', 'COUNTDOWN 2024\r\n\r\n31 DECEMBER 2023, LA PIAZZA\r\n\r\nNEW YEARS EVE CELEBRATION\r\n\r\nBACK TO HIGH SCHOOL\r\n\r\nPERFORMANCE BY HIVI! & PROJECT POP\r\n\r\nPERFORMANCE DJ DIONY\r\n\r\nOPEN GATE STARTS FROM 7 PM\r\n\r\nLabel\r\n\r\nmusic\r\nkonser\r\nnewyearparty\r\nhivi\r\nparty', '2,4,5,7,8,9,11', '2023-12-31 19:00:00', '2024-01-01 03:00:00', 'La Piazza Summarecon Mall Kelapa Gading', 75000, 998, 0, 'events/laKi25kIRjiM1yO4QBmXs9EHxSkEo3Oi8D7HEGhJ.jpg', '2023-12-12 13:27:31', '2023-12-12 13:44:46'),
(5, 'Didangdutin Fest', 'Didangdutin fest adalah sebuah event konser musik yang mencoba menawarkan rasa yang berbeda dari sebuah konser musik. Sengaja dirancang untuk memberikan pengalaman yang berbeda dari sebuah konser untuk memuaskan sense of art penikmat musik Indonesia, tentunya dengan line up yang keren, Band Band papan atas Indonesia.\r\n\r\nDidangdutin fest bukan acara dangdut...!\r\n\r\nLabel\r\n\r\ntiketkonserdewa\r\nkonsertifex\r\nkonserfeelkoplo\r\nkonserwali\r\nkonserdidangdutin', '7,8,9,10,11', '2023-12-13 15:35:00', '2023-12-17 23:00:00', 'Uptown Park Summarecon Mall Serpong', 169000, 172, 0, 'events/bvsveh9R4X0LOB2Z1dcgqOcPlil1TcwALg979yVw.jpg', '2023-12-12 13:34:22', '2023-12-12 13:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` bigint(20) UNSIGNED DEFAULT NULL,
  `id_category` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `id_event`, `id_category`, `created_at`, `updated_at`) VALUES
(13, 2, 2, NULL, NULL),
(14, 2, 4, NULL, NULL),
(15, 2, 7, NULL, NULL),
(16, 3, 1, NULL, NULL),
(17, 3, 3, NULL, NULL),
(18, 3, 4, NULL, NULL),
(19, 3, 8, NULL, NULL),
(20, 3, 9, NULL, NULL),
(21, 3, 10, NULL, NULL),
(22, 4, 2, NULL, NULL),
(23, 4, 4, NULL, NULL),
(24, 4, 5, NULL, NULL),
(25, 4, 7, NULL, NULL),
(26, 4, 8, NULL, NULL),
(27, 4, 9, NULL, NULL),
(28, 4, 11, NULL, NULL),
(29, 5, 7, NULL, NULL),
(30, 5, 8, NULL, NULL),
(31, 5, 9, NULL, NULL),
(32, 5, 10, NULL, NULL),
(33, 5, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_034222_create_events_table', 1),
(6, '2023_12_12_070959_kategori_migration', 1),
(7, '2023_12_12_074249_event_categories', 1),
(8, '2023_12_12_105811_transaction_migration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_transaction` int(11) DEFAULT NULL,
  `status_transaction` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) NOT NULL DEFAULT 0,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_event`, `id_user`, `qty`, `total_transaction`, `status_transaction`, `refund`, `bukti_bayar`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 1, 100000, 1, 0, 'bukti_bayar/1702413676.jfif', '2023-12-12 13:38:21', '2023-12-12 13:41:16'),
(3, 5, 4, 2, 338000, 0, 0, NULL, '2023-12-12 13:38:30', '2023-12-12 13:38:30'),
(4, 4, 5, 2, 150000, 5, 0, 'bukti_bayar/1702413962.jfif', '2023-12-12 13:44:46', '2023-12-12 13:51:56'),
(5, 5, 5, 2, 338000, 0, 0, NULL, '2023-12-12 13:45:20', '2023-12-12 13:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ages` int(11) DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `user_picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `ages`, `image_path`, `isAdmin`, `user_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin aa', 'admin@gmail.com', NULL, '$2y$12$12Wt5Im3OPOeV13PVUVLXeAWzM/aJHE/S/fR/GtemmwpT7rVsIhnu', '1', 21, NULL, 1, NULL, NULL, NULL, '2023-12-12 13:13:16'),
(4, 'aridwi 123', 'ari@gmail.com', NULL, '$2y$12$LRVxDIePGrQXgp5oetIF5O.rPW6gaeRhXrzKKa4YufmsMJUlz5l/S', '0', 27, NULL, 0, 'user_photos/1702413454.png', NULL, '2023-12-12 13:37:34', '2023-12-12 13:38:02'),
(5, 'Risa Pratiwi', 'risa@gmail.com', NULL, '$2y$12$qZFhQirQIBoZuuDOdFjrve66eEJrV6Qgs2FLEhhy6TCbgN/fuPJPG', '1', 22, NULL, 0, 'user_photos/1702413870.JPG', NULL, '2023-12-12 13:44:31', '2023-12-12 13:44:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_categories_id_event_foreign` (`id_event`),
  ADD KEY `event_categories_id_category_foreign` (`id_category`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_event_foreign` (`id_event`),
  ADD KEY `transactions_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD CONSTRAINT `event_categories_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_categories_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
