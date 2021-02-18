--
-- Database: `azcloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-02-14 09:35:30', '2021-02-14 09:39:10'),
(3, 1, '2021-02-14 09:38:55', '2021-02-14 09:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_translations`
--

CREATE TABLE IF NOT EXISTS `certificate_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `certificate_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `certificate_translations_certificate_id_locale_unique` (`certificate_id`,`locale`),
  KEY `certificate_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_translations`
--

INSERT INTO `certificate_translations` (`id`, `certificate_id`, `locale`, `title`, `content`) VALUES
(4, 2, 'az', 'TIER III STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ABŞ-ın Uptime Institute-u tərəfindən işlənib-hazırlanmış Tier III kateqoriyasının əsas xüsusiyyətlərinə mühəndis altsistemlərinin paralel fəaliyyəti, ehtiyat soyutma sistemi, ehtiyat enerji təminatı sistemi, ehtiyat telekommunikasiya infrastrukturu daxildir.</span></p>'),
(5, 2, 'en', 'TIER III STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ABŞ-ın Uptime Institute-u tərəfindən işlənib-hazırlanmış Tier III kateqoriyasının əsas xüsusiyyətlərinə mühəndis altsistemlərinin paralel fəaliyyəti, ehtiyat soyutma sistemi, ehtiyat enerji təminatı sistemi, ehtiyat telekommunikasiya infrastrukturu daxildir.</span></p>'),
(6, 2, 'ru', 'TIER III STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ABŞ-ın Uptime Institute-u tərəfindən işlənib-hazırlanmış Tier III kateqoriyasının əsas xüsusiyyətlərinə mühəndis altsistemlərinin paralel fəaliyyəti, ehtiyat soyutma sistemi, ehtiyat enerji təminatı sistemi, ehtiyat telekommunikasiya infrastrukturu daxildir.</span></p>'),
(7, 3, 'az', 'ISO/IEC 20000 STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ISO/IEC 20000 şirkətlərə İT idarəetməsi sahəsində mükəmməlliyi nümayiş etdirməyə və ən effektiv metodları tətbiq etməyə imkan verən standartdır.</span></p>'),
(8, 3, 'en', 'ISO/IEC 20000 STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ISO/IEC 20000 şirkətlərə İT idarəetməsi sahəsində mükəmməlliyi nümayiş etdirməyə və ən effektiv metodları tətbiq etməyə imkan verən standartdır.</span></p>'),
(9, 3, 'ru', 'ISO/IEC 20000 STANDARTI', '<p><span style=\"color:rgb(0,0,0);\">ISO/IEC 20000 şirkətlərə İT idarəetməsi sahəsində mükəmməlliyi nümayiş etdirməyə və ən effektiv metodları tətbiq etməyə imkan verən standartdır.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `data_centers`
--

CREATE TABLE IF NOT EXISTS `data_centers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_centers`
--

INSERT INTO `data_centers` (`id`, `status`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_center_translations`
--

CREATE TABLE IF NOT EXISTS `data_center_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_center_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_center_translations_data_center_id_locale_unique` (`data_center_id`,`locale`),
  KEY `data_center_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_center_translations`
--

INSERT INTO `data_center_translations` (`id`, `data_center_id`, `locale`, `title`, `description`, `content`) VALUES
(1, 1, 'az', 'Baki Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>'),
(2, 1, 'en', 'Baki Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>'),
(3, 1, 'ru', 'Baki Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>'),
(4, 2, 'az', 'Yevlax Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>'),
(5, 2, 'en', 'Yevlax Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>'),
(6, 2, 'ru', 'Yevlax Data Merkezi', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib.', '<p>“AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir. Data mərkəzimiz Almaniyanın beynəlxalq səviyyəli şirkəti tərəfindən inşa edilmiş və “Uptime Institute”unun test sınaqlarından uğurla keçərək TIER III</p><p>Beynəlxalq sertifikatına, IT xidmətlərinin göstərilməsi və idarə edilməsi üzrə ISO 20000, biznesin davamlılığı idarəetməsi üzrə ISO 22301 və informasiya təhlükəsizliyi üzrə isə ISO 27001 standartlarına layiq görülüb.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Entities\\Post\\Post', 1, 'ea8b9784-d354-46d0-b109-824c69586f50', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 1, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(2, 'App\\Entities\\Post\\Post', 1, '9019c37c-da2a-4bbc-a7f2-c6c8278f2e35', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 2, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(3, 'App\\Entities\\Post\\Post', 2, '38aff9e1-0dd4-4049-b7f7-63d88849bcf5', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 3, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(4, 'App\\Entities\\Post\\Post', 2, '94ca3c82-f80c-4fe9-8d37-52f02cdc5a28', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 4, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(5, 'App\\Entities\\Post\\Post', 3, '9108a620-0727-4312-9aea-e431e92e1bf7', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 5, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(6, 'App\\Entities\\Post\\Post', 3, 'd8801b09-816e-4c26-9348-8984ffd0270d', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 6, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(7, 'App\\Entities\\Post\\Post', 4, 'e053af73-ff47-43e8-9e0a-9b9085d555d2', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 7, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(8, 'App\\Entities\\Post\\Post', 4, '0a3a81a2-dfb9-40c4-a9a6-c5ae504a7b45', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 8, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(9, 'App\\Entities\\Post\\Post', 5, 'd67230f9-b2a1-4dc1-ade6-e7da1f2983ca', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 9, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(10, 'App\\Entities\\Post\\Post', 5, '63e24ef3-f511-41b2-9e8f-cdb74e20606b', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 10, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(11, 'App\\Entities\\Post\\Post', 6, 'a0f120f0-dedc-442b-abdb-ca3f5dcb9c27', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 11, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(12, 'App\\Entities\\Post\\Post', 6, '50b55ccb-ec49-4907-885e-2f5408a04e45', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 12, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(13, 'App\\Entities\\Post\\Post', 7, '52eed2fb-8a60-4be8-becc-fc52f8e9b989', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 13, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(14, 'App\\Entities\\Post\\Post', 7, '689fccf6-c4aa-4dd2-8c5a-d630cb5c8895', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 14, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(15, 'App\\Entities\\Post\\Post', 8, '1ab69e1a-21f3-4ec9-a757-d2cf10929166', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 15, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(16, 'App\\Entities\\Post\\Post', 8, 'ebed24c8-3475-479b-b2ef-c025d265b7e2', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 16, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(17, 'App\\Entities\\Post\\Post', 9, '5bb835d3-0396-43ab-b240-29474903ee21', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 17, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(18, 'App\\Entities\\Post\\Post', 9, '6d4a570f-e04e-400f-bc30-9edab0621e69', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 18, '2021-01-14 12:04:55', '2021-01-14 12:04:55'),
(19, 'App\\Entities\\Post\\Post', 10, '275ab18e-f9a1-43e8-98d3-31f6c6a4f4ea', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 19, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(20, 'App\\Entities\\Post\\Post', 10, 'c1335162-424b-40bb-b52d-a753119e5f65', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 20, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(21, 'App\\Entities\\Post\\Post', 11, '5cb5b83b-a0af-41d1-a84a-a9c3ff629b12', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 21, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(22, 'App\\Entities\\Post\\Post', 11, '476e05b2-789e-44fd-a375-f492b527543d', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 22, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(23, 'App\\Entities\\Post\\Post', 12, '94989073-b327-435a-91af-1ab3cabb6327', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 23, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(24, 'App\\Entities\\Post\\Post', 12, '121ee6ff-c9d5-4b7f-91d9-b6703cf0ac0e', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 24, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(25, 'App\\Entities\\Post\\Post', 13, 'a7d369c4-73da-43ec-abe4-549ae7b9e776', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 25, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(26, 'App\\Entities\\Post\\Post', 13, 'ee09bb47-b85a-4472-8f42-468d50050abb', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 26, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(27, 'App\\Entities\\Post\\Post', 14, 'b377ef09-d4fc-40aa-b133-e9ed35ba04af', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 27, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(28, 'App\\Entities\\Post\\Post', 14, 'a83c69d3-30e0-4924-b66e-e7c9a1a73156', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 28, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(29, 'App\\Entities\\Post\\Post', 15, 'f8b43b9d-f5db-43dd-a27e-9be29edbc4fd', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 29, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(30, 'App\\Entities\\Post\\Post', 15, '751041ca-28d8-4722-a721-4eb33527b18d', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 30, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(31, 'App\\Entities\\Post\\Post', 16, 'd83a3128-3f03-45f6-bd58-d7fe551503a1', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 31, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(32, 'App\\Entities\\Post\\Post', 16, 'b67f5fbd-30d7-4664-9eb9-44bdfefe8747', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 32, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(33, 'App\\Entities\\Post\\Post', 17, '20ac8ed3-335a-4914-828c-2db2afa32742', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 33, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(34, 'App\\Entities\\Post\\Post', 17, 'df6397e8-4b71-4116-9cf9-3fe2bef2715c', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 34, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(35, 'App\\Entities\\Post\\Post', 18, '905c27f9-1945-4c8c-b251-edcdeca4f8c2', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 35, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(36, 'App\\Entities\\Post\\Post', 18, '6e7fcf93-9870-4151-aade-50c6fe3d2c46', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 36, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(37, 'App\\Entities\\Post\\Post', 19, '57d40ac8-506a-455e-a6f9-b194f9c92a7a', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 37, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(38, 'App\\Entities\\Post\\Post', 19, '4bb66806-20a7-493c-bcdb-35165807180b', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 38, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(39, 'App\\Entities\\Post\\Post', 20, '6e143d51-5b95-43ae-b99d-09bd54f1a825', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 39, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(40, 'App\\Entities\\Post\\Post', 20, '532c0b92-04e3-41a9-8069-b025f94d4a50', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 40, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(41, 'App\\Entities\\Post\\Post', 21, 'bf111f6e-6656-4151-ba50-1add834facb1', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 41, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(42, 'App\\Entities\\Post\\Post', 21, 'eb5710e3-cd26-4465-9276-ca8c6fcf4095', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 42, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(43, 'App\\Entities\\Post\\Post', 22, '3994b51c-5b89-49cc-bd32-d459cc72bf68', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 43, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(44, 'App\\Entities\\Post\\Post', 22, 'c4154237-e3ff-4452-9672-3dc818bfaa1d', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 44, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(45, 'App\\Entities\\Post\\Post', 23, '359b0fea-cfbf-4ccc-b259-237fe78b993f', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 45, '2021-01-14 12:04:56', '2021-01-14 12:04:56'),
(46, 'App\\Entities\\Post\\Post', 23, '7b33a617-577f-4b22-b725-63603eb04184', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 46, '2021-01-14 12:04:56', '2021-01-14 12:04:57'),
(47, 'App\\Entities\\Post\\Post', 24, 'c87be65c-bcae-46e7-82fd-a239be69236d', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 47, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(48, 'App\\Entities\\Post\\Post', 24, 'c85bab15-a441-49ae-99f3-d7768f51cc19', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 48, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(49, 'App\\Entities\\Post\\Post', 25, 'd188d819-9b64-4ff9-83c6-d23eaa7276a9', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 49, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(50, 'App\\Entities\\Post\\Post', 25, '96e0acb9-eb8f-4ec4-ba95-f133a8ae9bb7', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 50, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(51, 'App\\Entities\\Post\\Post', 26, '844c4670-fe86-4693-9fcb-c5f7b15a2359', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 51, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(52, 'App\\Entities\\Post\\Post', 26, '40534a81-ba8b-4028-a5e6-80b7752079e4', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 52, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(53, 'App\\Entities\\Post\\Post', 27, '006b27db-8871-47bb-a6b0-8484bc6fc32b', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 53, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(54, 'App\\Entities\\Post\\Post', 27, '52910982-8981-48e8-8811-4d873aad2f29', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 54, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(55, 'App\\Entities\\Post\\Post', 28, 'f2ccd3fc-faa5-475a-8a75-1a990bf3915c', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 55, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(56, 'App\\Entities\\Post\\Post', 28, '8b4f8e75-e1a2-490f-b11a-92cc8dd904f9', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 56, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(57, 'App\\Entities\\Post\\Post', 29, 'b4f9b846-c51f-43fe-b409-b5e50bd33c98', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 57, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(58, 'App\\Entities\\Post\\Post', 29, 'f8a0c1d1-78df-40f8-99cd-653c4343a2fa', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 58, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(59, 'App\\Entities\\Post\\Post', 30, '877573e0-0435-4354-b0ca-626323dd9749', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 59, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(60, 'App\\Entities\\Post\\Post', 30, '608602fd-30ed-4743-842f-16e588ef7be7', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 60, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(61, 'App\\Entities\\Post\\Post', 31, 'b52cc18b-05c6-4213-b609-2b62c813ca78', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 61, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(62, 'App\\Entities\\Post\\Post', 31, '5698070e-6d65-43cf-b091-c4ccf71a3279', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 62, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(63, 'App\\Entities\\Post\\Post', 32, '70cafd3c-56cf-4363-8835-1616c12bd5af', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 63, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(64, 'App\\Entities\\Post\\Post', 32, 'de73b3f7-19a7-4200-bde6-37ea6ef834d7', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 64, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(65, 'App\\Entities\\Post\\Post', 33, 'a41104c8-ea5f-41e7-b2ba-2b436737a7d7', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 65, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(66, 'App\\Entities\\Post\\Post', 33, '315aa32f-7cd2-4663-b563-9f8789dd3be6', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 66, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(67, 'App\\Entities\\Post\\Post', 34, '77754d1c-9da7-4196-9425-82a5e9c5ba2a', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 67, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(68, 'App\\Entities\\Post\\Post', 34, 'c34eda18-af61-4e3c-b4d7-e942d9a641b0', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 68, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(69, 'App\\Entities\\Post\\Post', 35, '903cd181-d813-41a1-8b36-ef0a7be754d3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 69, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(70, 'App\\Entities\\Post\\Post', 35, 'c7afe15c-6853-4daf-b1bf-cb75428deff4', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 70, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(71, 'App\\Entities\\Post\\Post', 36, '277f671a-865a-4a48-a0ef-04558c3b6b16', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 71, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(72, 'App\\Entities\\Post\\Post', 36, '59343098-4d85-4eba-a009-2cd10a44638c', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 72, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(73, 'App\\Entities\\Post\\Post', 37, 'e9ce2496-9bce-4b0d-9ccc-0b9997efc7a3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 73, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(74, 'App\\Entities\\Post\\Post', 37, '0e25b5ea-3156-40d1-804c-5c20f4a4a573', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 74, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(75, 'App\\Entities\\Post\\Post', 38, '571fc351-4bab-40d7-809a-9e32c4ce39e3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 75, '2021-01-14 12:04:57', '2021-01-14 12:04:57'),
(76, 'App\\Entities\\Post\\Post', 38, '116b826f-66f3-46fb-b4ef-bb351b383ef5', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 76, '2021-01-14 12:04:57', '2021-01-14 12:04:58'),
(77, 'App\\Entities\\Post\\Post', 39, '192b9d80-cf06-4653-a3cb-ab47203e3e92', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 77, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(78, 'App\\Entities\\Post\\Post', 39, '28384c81-9787-464d-9df5-7e41f0478f1b', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 78, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(79, 'App\\Entities\\Post\\Post', 40, '623ab3bd-6255-4997-add9-5f3984d6e4af', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 79, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(80, 'App\\Entities\\Post\\Post', 40, '18f4070d-77f6-4f86-b72a-c50df3f3f9a7', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 80, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(81, 'App\\Entities\\Post\\Post', 41, '4517bd9a-d4ac-467e-830f-524001974706', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 81, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(82, 'App\\Entities\\Post\\Post', 41, '2bb86995-7741-442d-be2c-8cd05e70a2de', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 82, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(83, 'App\\Entities\\Post\\Post', 42, 'a523cb7f-d706-46ca-99b1-03f47c54821f', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 83, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(84, 'App\\Entities\\Post\\Post', 42, '87677cbe-1f50-41f7-9eff-3f4576141897', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 84, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(85, 'App\\Entities\\Post\\Post', 43, 'b4de6847-10f3-441b-9a9e-75a4e73a9dfd', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 85, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(86, 'App\\Entities\\Post\\Post', 43, 'df86dfba-cb34-441e-9f4e-988037fdf1f4', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 86, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(87, 'App\\Entities\\Post\\Post', 44, '44a7afa6-c9fb-4828-9aef-26f0a57a28ed', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 87, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(88, 'App\\Entities\\Post\\Post', 44, '6805dc17-c70a-4e21-b590-5907847de85a', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 88, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(89, 'App\\Entities\\Post\\Post', 45, '6a958601-8c69-49fe-bdea-6ddda5eb7ae0', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 89, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(90, 'App\\Entities\\Post\\Post', 45, '2813c941-20b9-4bae-9406-9aab9a6023c1', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 90, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(91, 'App\\Entities\\Post\\Post', 46, '3c4684f4-c4b6-4b7a-a1ed-58aca3d629fd', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 91, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(92, 'App\\Entities\\Post\\Post', 46, '9dbb0adc-4793-44d9-ba8c-2f69b33d795e', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 92, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(93, 'App\\Entities\\Post\\Post', 47, '46a5bdda-82e2-46b4-9b91-1f4a05a75117', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 93, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(94, 'App\\Entities\\Post\\Post', 47, 'd11f91ea-1491-40c4-8196-9b66cd0cc63b', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 94, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(95, 'App\\Entities\\Post\\Post', 48, 'c47ef9b2-124e-4cf2-8851-9032bbb7eed2', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 95, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(96, 'App\\Entities\\Post\\Post', 48, 'b32776be-5ce5-49bf-9c76-8109670d9c6b', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 96, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(97, 'App\\Entities\\Post\\Post', 49, '7a2ba886-9b92-452d-a5e0-2b2ecf8d46bf', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 97, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(98, 'App\\Entities\\Post\\Post', 49, '978fffd2-5a69-4479-9818-4fe886c41b02', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 98, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(99, 'App\\Entities\\Post\\Post', 50, '8a462af7-157e-4993-b9f8-5287c81050f9', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 99, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(100, 'App\\Entities\\Post\\Post', 50, '37caad78-752b-4e78-8b8b-bc923702cbdc', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 100, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(101, 'App\\Entities\\Post\\Post', 51, '5844032d-a56b-4e48-8e75-e04d1b45e642', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 101, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(102, 'App\\Entities\\Post\\Post', 51, '88e7ca37-36e7-40bf-92ff-931c0622c026', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 102, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(103, 'App\\Entities\\Post\\Post', 52, 'd78469ab-3b38-4ec1-8ed3-69082474f906', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 103, '2021-01-14 12:04:58', '2021-01-14 12:04:58'),
(104, 'App\\Entities\\Post\\Post', 52, '560fa8d5-5d4c-4f71-a13d-ab697d3f42f0', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 104, '2021-01-14 12:04:58', '2021-01-14 12:04:59'),
(105, 'App\\Entities\\Post\\Post', 53, 'a9e7db5e-85c7-457e-b521-b8b03299ec41', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 105, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(106, 'App\\Entities\\Post\\Post', 53, '82ebe8a2-d7ba-42eb-87e8-6c38b99abe12', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 106, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(107, 'App\\Entities\\Post\\Post', 54, '129ae660-6829-4eb7-be70-048689ef4abe', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 107, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(108, 'App\\Entities\\Post\\Post', 54, '59949751-ef79-4b68-b743-17a23ff96f18', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 108, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(109, 'App\\Entities\\Post\\Post', 55, 'f30bf63b-efc7-4e6c-89aa-074f6b1b6362', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 109, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(110, 'App\\Entities\\Post\\Post', 55, 'c0598325-b517-467e-ba5d-cc079d11bcf3', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 110, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(111, 'App\\Entities\\Post\\Post', 56, '2d6463fc-1c40-44a0-87bf-4717783c38f0', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 111, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(112, 'App\\Entities\\Post\\Post', 56, '11d4a2b8-7324-4a34-857b-e1761ec250ab', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 112, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(113, 'App\\Entities\\Post\\Post', 57, '987ec953-cdcc-42f4-8164-5e7c8e52ed1e', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 113, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(114, 'App\\Entities\\Post\\Post', 57, '450dc9b5-5d0b-4e22-9999-a4f8dad00266', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 114, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(115, 'App\\Entities\\Post\\Post', 58, '2cf0cc11-6815-4769-ad3d-252794bc86e6', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 115, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(116, 'App\\Entities\\Post\\Post', 58, '4c1fb91c-9f47-4ad4-977e-04b8fba7cef2', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 116, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(117, 'App\\Entities\\Post\\Post', 59, '9938809a-6c00-420c-8d0a-c40835f768ad', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 117, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(118, 'App\\Entities\\Post\\Post', 59, '90c3cca6-f352-4ad3-9cca-fc5e305f3038', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 118, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(119, 'App\\Entities\\Post\\Post', 60, '4f62e40e-1017-44ef-827d-286a98cfdff3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 119, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(120, 'App\\Entities\\Post\\Post', 60, 'b5a80009-d8d8-4fed-bbf8-abf9caea5e83', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 120, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(121, 'App\\Entities\\Post\\Post', 61, 'a5fb6ca8-b109-439c-b992-de079d6ee546', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 121, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(122, 'App\\Entities\\Post\\Post', 61, 'a61e8ff8-2e9a-4e08-84d6-6071948f0efb', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 122, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(123, 'App\\Entities\\Post\\Post', 62, 'c20124f9-b4aa-4942-a620-bfaba30dea28', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 123, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(124, 'App\\Entities\\Post\\Post', 62, '6754f145-1e0c-406d-8694-20964b484498', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 124, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(125, 'App\\Entities\\Post\\Post', 63, 'df118f9c-f708-4e73-85de-08ae92ca54b4', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 125, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(126, 'App\\Entities\\Post\\Post', 63, 'd61f2b6f-8d90-47bc-94c1-4dbc45a7ea92', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 126, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(127, 'App\\Entities\\Post\\Post', 64, 'd7fde190-0a94-4bfd-a644-cbcf6817cc04', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 127, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(128, 'App\\Entities\\Post\\Post', 64, 'b8f2f25c-9d22-4c78-8eaa-b8709c1f1576', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 128, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(129, 'App\\Entities\\Post\\Post', 65, '2348b6fd-7e5c-4750-9341-61b597bebd34', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 129, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(130, 'App\\Entities\\Post\\Post', 65, 'e7c769d5-f02b-4476-9c05-3441c78eca5d', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 130, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(131, 'App\\Entities\\Post\\Post', 66, 'c3d0fe06-d10e-4432-8734-fa05511a29e1', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 131, '2021-01-14 12:04:59', '2021-01-14 12:04:59'),
(132, 'App\\Entities\\Post\\Post', 66, '283b2d69-51d2-445f-93b1-925f4058aed6', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 132, '2021-01-14 12:04:59', '2021-01-14 12:05:00'),
(133, 'App\\Entities\\Post\\Post', 67, '8f0cd7f6-5602-4bdf-b571-a5d0dc06a742', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 133, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(134, 'App\\Entities\\Post\\Post', 67, '54b32765-ad62-40e5-a905-7d5f7c71f922', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 134, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(135, 'App\\Entities\\Post\\Post', 68, '807194ba-46f0-466d-9714-ed46566f3f31', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 135, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(136, 'App\\Entities\\Post\\Post', 68, 'a7530a5b-8d73-41ca-af18-4b523e30776e', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 136, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(137, 'App\\Entities\\Post\\Post', 69, '399dca17-4c6e-4cdd-88ba-4eca7490bf56', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 137, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(138, 'App\\Entities\\Post\\Post', 69, 'f2d50732-5855-4744-9f62-c0c97f8e5b09', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 138, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(139, 'App\\Entities\\Post\\Post', 70, 'e795e37d-ec9f-4cb4-91d0-1c55330014ea', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 139, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(140, 'App\\Entities\\Post\\Post', 70, '7dcfc312-3f7e-4bfc-b9ca-cdd0d25a9671', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 140, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(141, 'App\\Entities\\Post\\Post', 71, 'b4a47d2d-2a25-485f-9447-cc5059b91ec4', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 141, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(142, 'App\\Entities\\Post\\Post', 71, '73b08ee0-7ee4-442a-bacf-1f7a8c613d89', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 142, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(143, 'App\\Entities\\Post\\Post', 72, 'bdb6f1db-38ca-4cd5-a013-b591deefecd3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 143, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(144, 'App\\Entities\\Post\\Post', 72, '368fa436-8741-490e-bc46-e5dd57e47492', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 144, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(145, 'App\\Entities\\Post\\Post', 73, '07791c5d-2cc4-4e3d-8aab-0b7e7d1de9e1', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 145, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(146, 'App\\Entities\\Post\\Post', 73, 'a7b85455-c516-4640-a40f-1d5d43e812e7', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 146, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(147, 'App\\Entities\\Post\\Post', 74, 'bae2bf8e-2293-4333-8806-3bf92f227e5c', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 147, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(148, 'App\\Entities\\Post\\Post', 74, 'cf446bd9-20ee-49af-a4c0-135dfc0b5029', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 148, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(149, 'App\\Entities\\Post\\Post', 75, 'ae337ab3-4bc9-487d-b1a4-8ad787540727', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 149, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(150, 'App\\Entities\\Post\\Post', 75, 'f86381ba-08b7-4bcf-a486-511f51ee436e', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 150, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(151, 'App\\Entities\\Post\\Post', 76, '8e02b9e1-6b0a-45f1-897c-c6107028dff6', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 151, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(152, 'App\\Entities\\Post\\Post', 76, 'e2644b03-1df2-42c4-b6e0-4be467b7f926', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 152, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(153, 'App\\Entities\\Post\\Post', 77, '2c35d168-53bd-4474-97b7-4f70beb18efb', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 153, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(154, 'App\\Entities\\Post\\Post', 77, 'd5639127-fd98-4b8e-8cef-4ddb950f5a8e', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 154, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(155, 'App\\Entities\\Post\\Post', 78, '8c0e6f60-d80f-4713-8903-f8195734a346', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 155, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(156, 'App\\Entities\\Post\\Post', 78, 'fc917e13-19a6-4896-b7a2-b3af28a88308', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 156, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(157, 'App\\Entities\\Post\\Post', 79, 'ca1c257d-dd7c-457b-afdd-91994616fc14', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 157, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(158, 'App\\Entities\\Post\\Post', 79, '5b3cb8bc-ee22-4efa-a537-8d7df39d6b43', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 158, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(159, 'App\\Entities\\Post\\Post', 80, 'bbec783c-5477-47a4-95b4-c7e265d31b8d', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 159, '2021-01-14 12:05:00', '2021-01-14 12:05:00'),
(160, 'App\\Entities\\Post\\Post', 80, 'ba3d4cdd-2409-4425-bb05-96e2cbf1b566', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 160, '2021-01-14 12:05:00', '2021-01-14 12:05:01'),
(161, 'App\\Entities\\Post\\Post', 81, '5051030e-27f4-4121-8483-f5d7e6c382d7', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 161, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(162, 'App\\Entities\\Post\\Post', 81, '409ca0ba-d92c-43fa-9a11-a7d2f9784cbf', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 162, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(163, 'App\\Entities\\Post\\Post', 82, 'a120ecc8-13e5-4e34-9a99-d85b94d9b059', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 163, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(164, 'App\\Entities\\Post\\Post', 82, '08d853d2-31ee-4437-ad0f-75e20942b9a4', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 164, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(165, 'App\\Entities\\Post\\Post', 83, 'd5395ca4-01dc-4aa8-b4a3-d3d0568d29e6', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 165, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(166, 'App\\Entities\\Post\\Post', 83, '430fbd78-fcd2-410f-a0c0-d638c5226b56', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 166, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(167, 'App\\Entities\\Post\\Post', 84, 'a0107109-85c1-4939-a10e-45132ddd598b', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 167, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(168, 'App\\Entities\\Post\\Post', 84, '0739ada2-5d26-44ea-aa1b-770e02690ebf', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 168, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(169, 'App\\Entities\\Post\\Post', 85, '75c45324-959e-4f96-95d0-7a898e2b3b54', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 169, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(170, 'App\\Entities\\Post\\Post', 85, '87e07a66-2969-4965-b470-98c522956f1a', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 170, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(171, 'App\\Entities\\Post\\Post', 86, 'd1bdb3e6-72cd-4517-8d49-4869d96f9d2a', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 171, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(172, 'App\\Entities\\Post\\Post', 86, '6a8b2582-812b-435e-92b2-5103b3cd15b8', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 172, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(173, 'App\\Entities\\Post\\Post', 87, '678b6dad-35be-4518-a0a8-3f1a22bc1508', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 173, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(174, 'App\\Entities\\Post\\Post', 87, '2b2b6da4-3ccd-4b6b-84fd-0129c1d633e2', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 174, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(175, 'App\\Entities\\Post\\Post', 88, '8c86c9cc-fc0f-4ca7-bc9d-72e03b9e039d', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 175, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(176, 'App\\Entities\\Post\\Post', 88, 'edde1788-bdd6-429d-8e86-91eea56acab8', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 176, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(177, 'App\\Entities\\Post\\Post', 89, '17622901-750f-4c74-a945-faf021aeb989', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 177, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(178, 'App\\Entities\\Post\\Post', 89, '94199443-9b5c-404e-83f8-3345cfa207e0', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 178, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(179, 'App\\Entities\\Post\\Post', 90, 'c2703b58-e387-42e1-a8cb-0a1b01daeeba', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 179, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(180, 'App\\Entities\\Post\\Post', 90, '950c1f60-0131-4e37-b84e-72cd5d9be7f9', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 180, '2021-01-14 12:05:01', '2021-01-14 12:05:01'),
(197, 'App\\Entities\\Post\\Post', 99, '0e55d774-ba54-40d9-b53a-1eb6a1258bc3', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 197, '2021-01-14 12:05:02', '2021-01-14 12:05:02'),
(198, 'App\\Entities\\Post\\Post', 99, '01bfc82c-6fb9-41e6-ae15-15e12e55c291', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 198, '2021-01-14 12:05:02', '2021-01-14 12:05:02'),
(199, 'App\\Entities\\Post\\Post', 100, '27a9c602-5131-4230-9110-4313a826a50b', 'cover', 'cover', 'cover.jpg', 'image/jpeg', 'public', 'public', 78546, '[]', '[]', '[]', '[]', 199, '2021-01-14 12:05:02', '2021-01-14 12:05:02'),
(200, 'App\\Entities\\Post\\Post', 100, '19f534dd-ab9d-412c-81fa-65008e2f43e3', 'gallery', 'gallery', 'gallery.jpg', 'image/jpeg', 'public', 'public', 307809, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 200, '2021-01-14 12:05:02', '2021-01-14 12:05:02'),
(201, 'App\\Entities\\Post\\Post', 79, 'f2d7d58b-d774-48a9-9bdd-7d135f4470b6', 'gallery', 'skull', 'skull.png', 'image/png', 'public', 'public', 1023718, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 201, '2021-01-14 12:43:33', '2021-01-14 12:43:34'),
(202, 'App\\Entities\\Post\\Post', 17, 'c27a870c-8359-4b3b-ac12-c8171c5b8dcd', 'gallery', 'earth', 'earth.jpg', 'image/jpeg', 'public', 'public', 432184, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 202, '2021-01-14 12:53:27', '2021-01-14 12:53:27'),
(203, 'App\\Entities\\Post\\Post', 17, '8e93c4c2-f468-4fa8-8ede-2ec458065657', 'gallery', 'skull', 'skull.png', 'image/png', 'public', 'public', 1023718, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 203, '2021-01-14 12:53:27', '2021-01-14 12:53:27'),
(207, 'App\\Entities\\Post\\Post', 37, 'd91d4403-a772-453c-b3a8-5fbea82d020f', 'gallery', 'earth', 'earth.jpg', 'image/jpeg', 'public', 'public', 432184, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 204, '2021-01-14 13:15:33', '2021-01-14 13:15:33'),
(208, 'App\\Entities\\Post\\Post', 37, '8d9a73d0-6f94-462c-9a6b-406066919b0f', 'gallery', 'skull', 'skull.png', 'image/png', 'public', 'public', 1023718, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 205, '2021-01-14 13:15:33', '2021-01-14 13:15:33'),
(209, 'App\\Entities\\Post\\Post', 75, 'cbf1da29-e26d-40d2-af91-3c4f419d8b86', 'gallery', 'cod-ghosts', 'cod-ghosts.jpg', 'image/jpeg', 'public', 'public', 34875, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 206, '2021-01-18 10:37:21', '2021-01-18 10:37:21'),
(210, 'App\\Entities\\Post\\Post', 75, 'ce384453-96c0-4b60-9e06-f6608504abf6', 'gallery', 'earth', 'earth.jpg', 'image/jpeg', 'public', 'public', 432184, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 207, '2021-01-18 10:37:21', '2021-01-18 10:37:21'),
(211, 'App\\Entities\\Post\\Post', 75, 'bee75926-2e62-445d-876a-a971464a2fb4', 'gallery', 'oskar-woinski-test-7', 'oskar-woinski-test-7.jpg', 'image/jpeg', 'public', 'public', 1923680, '[]', '[]', '{\"gallery-thumb\": true}', '[]', 208, '2021-01-18 10:37:21', '2021-01-18 10:37:21'),
(216, 'App\\Entities\\Service\\Service', 4, '14221275-4906-4eb2-b5df-04a277570d79', 'cover', 'service-card-bg', 'service-card-bg.jpg', 'image/jpeg', 'public', 'public', 76255, '[]', '[]', '[]', '[]', 210, '2021-01-19 08:00:42', '2021-01-19 08:00:42'),
(217, 'App\\Entities\\Page\\Page', 1, '91df1956-944d-4c40-871c-5398556c6a42', 'gallery', 'about-cover', 'about-cover.jpg', 'image/jpeg', 'public', 'public', 69440, '[]', '[]', '[]', '[]', 211, '2021-02-13 11:04:25', '2021-02-13 11:04:25'),
(220, 'App\\Entities\\Page\\Page', 4, '40f472b6-fdb7-4745-a3c4-0cd243a1cd24', 'gallery', 'icon-user-white', 'icon-user-white.svg', 'image/svg', 'public', 'public', 1800, '[]', '[]', '[]', '[]', 212, '2021-02-13 12:50:38', '2021-02-13 12:50:38'),
(221, 'App\\Entities\\Page\\Page', 5, '85bffea3-2c89-427e-93c4-5c8002c62bdc', 'gallery', 'icon-lamp-white', 'icon-lamp-white.svg', 'image/svg', 'public', 'public', 1030, '[]', '[]', '[]', '[]', 213, '2021-02-13 12:53:26', '2021-02-13 12:53:26'),
(222, 'App\\Entities\\Page\\Page', 6, '4966756e-2869-4e62-b7aa-18e856053975', 'gallery', 'icon-cube-white', 'icon-cube-white.svg', 'image/svg', 'public', 'public', 1310, '[]', '[]', '[]', '[]', 214, '2021-02-13 12:54:29', '2021-02-13 12:54:29'),
(223, 'App\\Entities\\Page\\Page', 7, '610d4626-bc82-4ded-9f29-6cd869f97347', 'gallery', 'icon-shield-white', 'icon-shield-white.svg', 'image/svg', 'public', 'public', 1153, '[]', '[]', '[]', '[]', 215, '2021-02-13 12:56:40', '2021-02-13 12:56:40'),
(224, 'App\\Entities\\Page\\Page', 8, '2e626436-fbe3-4de9-9ca2-31372f21ccc6', 'gallery', 'icon-flash-white', 'icon-flash-white.svg', 'image/svg', 'public', 'public', 609, '[]', '[]', '[]', '[]', 216, '2021-02-13 12:58:15', '2021-02-13 12:58:15'),
(225, 'App\\Entities\\Page\\Page', 9, 'bf88c998-921d-4b40-b992-2507bb4bb104', 'gallery', 'icon-lock-white', 'icon-lock-white.svg', 'image/svg', 'public', 'public', 842, '[]', '[]', '[]', '[]', 217, '2021-02-13 12:59:18', '2021-02-13 12:59:18'),
(226, 'App\\Entities\\Page\\Page', 11, '06591920-3d00-41d4-baeb-7a4d11009cc6', 'gallery', 'image0', 'image0.jpg', 'image/jpeg', 'public', 'public', 101080, '[]', '[]', '[]', '[]', 218, '2021-02-13 14:26:10', '2021-02-13 14:26:10'),
(227, 'App\\Entities\\Page\\Page', 12, '3e82ecc5-dfad-4559-a066-7a52845146b3', 'gallery', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 82795, '[]', '[]', '[]', '[]', 219, '2021-02-13 14:28:24', '2021-02-13 14:28:24'),
(228, 'App\\Entities\\Page\\Page', 13, '20115057-8ca8-4b29-aedc-811f7e5b5ad1', 'gallery', 'image2', 'image2.jpg', 'image/jpeg', 'public', 'public', 67151, '[]', '[]', '[]', '[]', 220, '2021-02-13 14:30:37', '2021-02-13 14:30:37'),
(232, 'App\\Entities\\Page\\Page', 14, 'ce04a3e2-e79f-41f8-9c77-be15cc8b62f9', 'gallery', 'block-gallery', 'block-gallery.jpg', 'image/jpeg', 'public', 'public', 104954, '[]', '[]', '[]', '[]', 221, '2021-02-13 14:39:49', '2021-02-13 14:39:49'),
(233, 'App\\Entities\\Page\\Page', 14, '46743098-73ca-420b-a8c8-8808beb0e504', 'gallery', 'block-gallery', 'block-gallery.jpg', 'image/jpeg', 'public', 'public', 104954, '[]', '[]', '[]', '[]', 222, '2021-02-13 14:41:01', '2021-02-13 14:41:01'),
(235, 'App\\Entities\\DataCenter\\DataCenter', 1, '9e94e8e5-082b-4e0e-b7c7-72751a96207e', 'gallery', 'image0', 'image0.jpg', 'image/jpeg', 'public', 'public', 92873, '[]', '[]', '[]', '[]', 223, '2021-02-13 15:18:54', '2021-02-13 15:18:54'),
(236, 'App\\Entities\\DataCenter\\DataCenter', 1, 'c68a15a4-789c-4395-aef8-390f3c28e39e', 'gallery', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 76255, '[]', '[]', '[]', '[]', 224, '2021-02-13 15:18:54', '2021-02-13 15:18:54');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(237, 'App\\Entities\\DataCenter\\DataCenter', 1, '43cf443c-1e7f-4cf5-925b-675688b5c283', 'gallery', 'image2', 'image2.jpg', 'image/jpeg', 'public', 'public', 39074, '[]', '[]', '[]', '[]', 225, '2021-02-13 15:18:55', '2021-02-13 15:18:55'),
(238, 'App\\Entities\\DataCenter\\DataCenter', 1, 'b594c554-1f05-465d-a57c-7f57cc20eff5', 'gallery', 'image3', 'image3.jpg', 'image/jpeg', 'public', 'public', 74048, '[]', '[]', '[]', '[]', 226, '2021-02-13 15:18:55', '2021-02-13 15:18:55'),
(243, 'App\\Entities\\DataCenter\\DataCenter', 3, '9949a9b3-0eba-4ab8-a142-023df682dfac', 'gallery', 'image5', 'image5.jpg', 'image/jpeg', 'public', 'public', 44566, '[]', '[]', '[]', '[]', 231, '2021-02-13 15:19:46', '2021-02-13 15:19:46'),
(244, 'App\\Entities\\DataCenter\\DataCenter', 3, '54b945ac-afa0-449a-9cc2-1f33f552463a', 'gallery', 'image6', 'image6.jpg', 'image/jpeg', 'public', 'public', 54868, '[]', '[]', '[]', '[]', 232, '2021-02-13 15:19:46', '2021-02-13 15:19:46'),
(245, 'App\\Entities\\DataCenter\\DataCenter', 3, 'a2088a2f-1638-450b-9522-be1f4115d682', 'gallery', 'image7', 'image7.jpg', 'image/jpeg', 'public', 'public', 24395, '[]', '[]', '[]', '[]', 233, '2021-02-13 15:19:46', '2021-02-13 15:19:46'),
(246, 'App\\Entities\\DataCenter\\DataCenter', 3, 'c8a2a159-84c7-43fc-aa83-24dae49c311d', 'gallery', 'image8', 'image8.jpg', 'image/jpeg', 'public', 'public', 63605, '[]', '[]', '[]', '[]', 234, '2021-02-13 15:19:46', '2021-02-13 15:19:46'),
(247, 'App\\Entities\\DataCenter\\DataCenter', 4, 'b99a4ace-6ccc-4395-bd16-d4b8c47ffbd4', 'gallery', 'image5', 'image5.jpg', 'image/jpeg', 'public', 'public', 44566, '[]', '[]', '[]', '[]', 235, '2021-02-13 15:20:38', '2021-02-13 15:20:38'),
(248, 'App\\Entities\\DataCenter\\DataCenter', 4, '71339630-4900-4431-b87e-c80cdb28430e', 'gallery', 'image6', 'image6.jpg', 'image/jpeg', 'public', 'public', 54868, '[]', '[]', '[]', '[]', 236, '2021-02-13 15:20:38', '2021-02-13 15:20:38'),
(249, 'App\\Entities\\DataCenter\\DataCenter', 4, 'ce93ee75-b875-40a0-af53-7b39ee8dbfc0', 'gallery', 'image7', 'image7.jpg', 'image/jpeg', 'public', 'public', 24395, '[]', '[]', '[]', '[]', 237, '2021-02-13 15:20:38', '2021-02-13 15:20:38'),
(250, 'App\\Entities\\DataCenter\\DataCenter', 4, '455fa88b-b8c7-4a90-a953-4d849aebbf41', 'gallery', 'image8', 'image8.jpg', 'image/jpeg', 'public', 'public', 63605, '[]', '[]', '[]', '[]', 238, '2021-02-13 15:20:38', '2021-02-13 15:20:38'),
(262, 'App\\Entities\\Partner', 4, 'c83ebcf9-0d40-4c29-b0e1-62b897ffc760', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 5736, '[]', '[]', '[]', '[]', 244, '2021-02-13 16:49:45', '2021-02-13 16:49:45'),
(263, 'App\\Entities\\Partner', 1, 'f33f0238-7114-4be7-8ff2-d4ca6f48ad2c', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 5736, '[]', '[]', '[]', '[]', 245, '2021-02-13 16:59:45', '2021-02-13 16:59:45'),
(264, 'App\\Entities\\Partner', 2, 'f115a54b-cb6b-4672-903a-42918c6beb68', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 5736, '[]', '[]', '[]', '[]', 246, '2021-02-13 17:02:30', '2021-02-13 17:02:30'),
(265, 'App\\Entities\\Partner', 3, '527c8b5d-3186-4d56-99fc-41dd7b448736', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 5736, '[]', '[]', '[]', '[]', 247, '2021-02-13 17:02:49', '2021-02-13 17:02:49'),
(274, 'App\\Entities\\Certificate\\Certificate', 2, 'ced2046f-a662-4021-bf3c-c485040a2cba', 'cover', 'image0', 'image0.jpg', 'image/jpeg', 'public', 'public', 53515, '[]', '[]', '[]', '[]', 248, '2021-02-14 09:35:30', '2021-02-14 09:35:30'),
(275, 'App\\Entities\\Certificate\\Certificate', 2, 'f019d49e-8d00-4169-8134-1f6746d9194f', 'pdf', 'VagifRufullazada-CV', 'VagifRufullazada-CV.pdf', 'application/pdf', 'public', 'public', 920276, '[]', '[]', '[]', '[]', 249, '2021-02-14 09:35:30', '2021-02-14 09:35:30'),
(276, 'App\\Entities\\Certificate\\Certificate', 3, 'a431739d-0932-477b-9414-27f87ba6cf70', 'cover', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 51690, '[]', '[]', '[]', '[]', 250, '2021-02-14 09:38:55', '2021-02-14 09:38:55'),
(277, 'App\\Entities\\Certificate\\Certificate', 3, '4392bd23-f24a-4578-9d2f-ea57c4513562', 'pdf', 'VagifRufullazada-CV', 'VagifRufullazada-CV.pdf', 'application/pdf', 'public', 'public', 920276, '[]', '[]', '[]', '[]', 251, '2021-02-14 09:38:55', '2021-02-14 09:38:55'),
(278, 'App\\Entities\\Page\\Page', 17, 'c3b5202f-cc72-4859-9d35-f603e3040342', 'gallery', 'image3', 'image3.jpg', 'image/jpeg', 'public', 'public', 33213, '[]', '[]', '[]', '[]', 252, '2021-02-14 11:05:18', '2021-02-14 11:05:18'),
(282, 'App\\Entities\\Slider\\Slider', 1, '92941ce8-c8eb-4fd8-a454-03b133f1384c', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 142770, '[]', '[]', '[]', '[]', 255, '2021-02-15 13:06:18', '2021-02-15 13:06:18'),
(283, 'App\\Entities\\Slider\\Slider', 2, 'f60188f1-53b5-48a7-b616-0bf1e085bf46', 'cover', 'image0', 'image0.png', 'image/png', 'public', 'public', 142770, '[]', '[]', '[]', '[]', 256, '2021-02-15 13:15:24', '2021-02-15 13:15:24'),
(287, 'App\\Entities\\Page\\Page', 40, '17b66ad9-8f71-446b-9f95-a80e46033845', 'gallery', 'icon0', 'icon0.svg', 'image/svg', 'public', 'public', 30741, '[]', '[]', '[]', '[]', 257, '2021-02-16 07:43:31', '2021-02-16 07:43:31'),
(288, 'App\\Entities\\Page\\Page', 40, '7001bb9b-9469-4e6a-9f5b-07a2cb35d26f', 'gallery', 'icon1', 'icon1.svg', 'image/svg', 'public', 'public', 19737, '[]', '[]', '[]', '[]', 258, '2021-02-16 07:43:31', '2021-02-16 07:43:31'),
(289, 'App\\Entities\\Page\\Page', 40, '4011d920-023a-4d91-bb55-cf204dcfb5aa', 'gallery', 'icon2', 'icon2.svg', 'image/svg', 'public', 'public', 27194, '[]', '[]', '[]', '[]', 259, '2021-02-16 07:43:31', '2021-02-16 07:43:31'),
(295, 'App\\Entities\\DataCenter\\DataCenter', 2, 'a0b413c3-2196-4ad8-bee2-659cf9b2f318', 'gallery', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 76255, '[]', '[]', '[]', '[]', 260, '2021-02-16 09:00:06', '2021-02-16 09:00:06'),
(296, 'App\\Entities\\DataCenter\\DataCenter', 2, 'c6d41a8a-3747-4a9a-89e4-5161d9e649db', 'gallery', 'image2', 'image2.jpg', 'image/jpeg', 'public', 'public', 39074, '[]', '[]', '[]', '[]', 261, '2021-02-16 09:00:06', '2021-02-16 09:00:06'),
(297, 'App\\Entities\\DataCenter\\DataCenter', 2, 'a87d15fc-49d7-4494-92a3-9ce71fba60fc', 'gallery', 'image3', 'image3.jpg', 'image/jpeg', 'public', 'public', 74048, '[]', '[]', '[]', '[]', 262, '2021-02-16 09:00:06', '2021-02-16 09:00:06'),
(298, 'App\\Entities\\DataCenter\\DataCenter', 2, 'f34138c7-de6a-4cf0-8433-3203cb3f8d8a', 'gallery', 'image4', 'image4.jpg', 'image/jpeg', 'public', 'public', 93384, '[]', '[]', '[]', '[]', 263, '2021-02-16 09:00:06', '2021-02-16 09:00:06'),
(299, 'App\\Entities\\Page\\Page', 41, 'e27e90d6-1e27-4a40-a4ad-85982f637e1c', 'gallery', 'image0', 'image0.png', 'image/png', 'public', 'public', 5736, '[]', '[]', '[]', '[]', 264, '2021-02-16 10:27:46', '2021-02-16 10:27:46'),
(301, 'App\\Entities\\Page\\Page', 42, '54925ec9-815b-49a1-8a77-c4de0c5e549b', 'gallery', 'advantages', 'advantages.jpg', 'image/jpeg', 'public', 'public', 43401, '[]', '[]', '[]', '[]', 265, '2021-02-16 10:32:41', '2021-02-16 10:32:41'),
(303, 'App\\Entities\\Page\\Page', 45, '4cc2f30b-d6c0-49f3-893a-126b9cbd5057', 'gallery', 'icon-manat', 'icon-manat.svg', 'image/svg', 'public', 'public', 1200, '[]', '[]', '[]', '[]', 267, '2021-02-17 09:54:11', '2021-02-17 09:54:11'),
(304, 'App\\Entities\\Page\\Page', 44, '77bc7ba9-43b6-4d56-a0a7-f0797ddd7622', 'gallery', 'icon-shield', 'icon-shield.svg', 'image/svg', 'public', 'public', 1153, '[]', '[]', '[]', '[]', 268, '2021-02-17 09:54:27', '2021-02-17 09:54:27'),
(305, 'App\\Entities\\Page\\Page', 46, '701fccd7-5023-4c97-ad3b-66ceba0ec117', 'gallery', 'icon-like', 'icon-like.svg', 'image/svg', 'public', 'public', 2167, '[]', '[]', '[]', '[]', 269, '2021-02-17 09:56:58', '2021-02-17 09:56:58'),
(306, 'App\\Entities\\Page\\Page', 47, 'f7d18d41-94a2-44d2-86f7-1433cd5fa008', 'gallery', 'icon-star', 'icon-star.svg', 'image/svg', 'public', 'public', 963, '[]', '[]', '[]', '[]', 270, '2021-02-17 09:58:25', '2021-02-17 09:58:25'),
(307, 'App\\Entities\\Page\\Page', 50, '16495c27-1ca6-4555-bb58-b8a102847526', 'gallery', 'image0', 'image0.jpg', 'image/jpeg', 'public', 'public', 9506, '[]', '[]', '[]', '[]', 271, '2021-02-17 10:07:26', '2021-02-17 10:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_21_160604_create_posts_table', 1),
(4, '2020_12_21_160621_create_post_translations_table', 1),
(5, '2020_12_22_171730_create_tags_table', 1),
(6, '2020_12_22_171807_create_post_tag_table', 1),
(7, '2021_01_05_182517_create_media_table', 1),
(8, '2021_01_19_070620_create_services_table', 2),
(9, '2021_01_19_071325_create_service_translations_table', 2),
(12, '2021_01_19_160008_create_settings_table', 3),
(13, '2021_01_20_125213_create_newsletter_table', 4),
(19, '2021_02_13_132131_create_pages_table', 5),
(20, '2021_02_13_132427_create_page_translations_table', 5),
(21, '2021_02_13_162013_add_order_column_to_pages', 6),
(24, '2021_02_13_184747_create_data_centers_table', 7),
(25, '2021_02_13_184851_create_data_center_translations_table', 7),
(27, '2021_02_13_194340_create_partners_table', 8),
(28, '2021_02_14_124251_create_certificates_table', 9),
(29, '2021_02_14_124408_create_certificate_translations_table', 9),
(30, '2021_02_15_141632_add_meta_to_page_translations', 10),
(31, '2021_02_15_162431_add_meta_to_post_translations', 11),
(32, '2021_02_15_163745_create_slider_table', 12),
(33, '2021_02_15_163926_create_slider_translations_table', 12),
(34, '2021_02_16_144916_add_parent_id_to_pages', 13),
(39, '2021_02_18_214621_create_product_category_table', 14),
(40, '2021_02_18_214724_create_product_category_translations_table', 14),
(42, '2021_02_18_223530_create_products_table', 15),
(43, '2021_02_18_225050_create_product_flavors_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `ip`, `subscribed_at`) VALUES
(2, 'vagif@rufullazada.me', '172.18.0.1', '2021-01-20 13:04:21'),
(3, 'test@test.com', '172.18.0.1', '2021-02-13 08:30:08'),
(4, 'test@mail.com', '172.18.0.1', '2021-02-13 08:30:50'),
(5, 'asdasd@mail.com', '172.18.0.1', '2021-02-13 08:38:29'),
(6, 'asdasd2@mail.com', '172.18.0.1', '2021-02-13 08:38:33'),
(7, 'asd2asd@mail.com', '172.18.0.1', '2021-02-13 08:38:36'),
(8, 'example@example.com', '172.18.0.1', '2021-02-13 08:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `identity`, `status`, `order`) VALUES
(1, 0, 'about-intro', 1, 11),
(3, 1, 'about-our-values', 1, 12),
(4, 3, 'about-values-item-1', 1, 13),
(5, 3, 'about-values-item-2', 1, 14),
(6, 3, 'about-values-item-3', 1, 15),
(7, 3, 'about-values-item-4', 1, 16),
(8, 3, 'about-values-item-5', 1, 17),
(9, 3, 'about-values-item-6', 1, 18),
(10, 1, 'about-mission', 1, 19),
(11, 10, 'about-mission-1', 1, 20),
(12, 10, 'about-mission-2', 1, 21),
(13, 10, 'about-mission-3', 1, 22),
(14, 1, 'universal-block-1', 1, 23),
(15, 1, 'data-centers', 1, 24),
(16, 1, 'about-us-certificates', 1, 25),
(17, 18, 'partnership-what-you-get', 1, 43),
(18, 0, 'partnership', 1, 26),
(19, 43, 'advantages', 1, 28),
(20, 43, 'product-portfolio', 1, 29),
(21, 43, 'targets', 1, 30),
(23, 18, 'system-integrator', 1, 31),
(24, 23, 'system-integration-silver-partner', 1, 32),
(25, 23, 'system-integration-gold-partner', 1, 33),
(26, 23, 'system-integration-platinum-partner', 1, 34),
(27, 18, 'service-provider', 1, 35),
(28, 27, 'service-provider-silver-partner', 1, 36),
(29, 27, 'service-provider-gold-partner', 1, 37),
(30, 27, 'service-provider-platinum-partner', 1, 38),
(31, 18, 'partnership-type', 1, 39),
(32, 31, 'partnership-type-silver-partner', 1, 40),
(33, 31, 'partnership-type-gold-partner', 1, 41),
(34, 31, 'partnership-type-platinum-partner', 1, 42),
(35, 0, 'seo-text-footer', 1, 44),
(38, 0, 'homepage', 1, 1),
(39, 0, 'contact', 1, 45),
(40, 38, 'services-standarts', 1, 2),
(41, 38, 'customers-block', 1, 3),
(42, 38, 'homepage-benefits', 1, 4),
(43, 18, 'partnership-advantages', 1, 27),
(44, 42, 'homepage-advantages-secure', 1, 5),
(45, 42, 'homepage-advantages-budget', 1, 6),
(46, 42, 'homepage-advantages-reliable', 1, 7),
(47, 42, 'homepage-advantages-other', 1, 8),
(48, 38, 'homepage-exposure-server', 1, 9),
(49, 38, 'homepage-testimonials', 1, 10),
(50, 49, 'homepage-testimonials-1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE IF NOT EXISTS `page_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`),
  KEY `page_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `description`, `content`, `meta`) VALUES
(1, 1, 'az', 'Haqqımızda', 'İnfrastrukturunuza uyğunlaşan və <a href=\"#\">biznes</a> artımınıidarə etməyə imkan verən <a href=\"#\">resurs</a> elastikliyi', '<p>\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.</p>', '{\"title\":\"About page\",\"keywords\":\"cloud, about, servers\",\"description\":\"Azcloud some description\"}'),
(2, 1, 'en', 'About us', 'İnfrastrukturunuza uyğunlaşan və <a href=\"#\">biznes</a> artımınıidarə etməyə imkan verən <a href=\"#\">resurs</a> elastikliyi', '<p>\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.</p>', '{\"title\":\"About page\",\"keywords\":\"cloud, about, servers\",\"description\":\"Azcloud some description\"}'),
(3, 1, 'ru', 'О нас', 'İnfrastrukturunuza uyğunlaşan və <a href=\"#\">biznes</a> artımınıidarə etməyə imkan verən <a href=\"#\">resurs</a> elastikliyi', '<p>\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.</p>', '{\"title\":\"About page\",\"keywords\":\"cloud, about, servers\",\"description\":\"Azcloud some description\"}'),
(7, 3, 'az', 'Dəyərlərimiz', NULL, NULL, NULL),
(8, 3, 'en', 'Dəyərlərimiz', NULL, NULL, NULL),
(9, 3, 'ru', 'Dəyərlərimiz', NULL, NULL, NULL),
(10, 4, 'az', 'İnsana dəyər-Peşəkar komanda', NULL, NULL, NULL),
(11, 4, 'en', 'İnsana dəyər-Peşəkar komanda', NULL, NULL, NULL),
(12, 4, 'ru', 'İnsana dəyər-Peşəkar komanda', NULL, NULL, NULL),
(13, 5, 'az', 'Etibarlılıq', NULL, NULL, NULL),
(14, 5, 'en', 'Etibarlılıq', NULL, NULL, NULL),
(15, 5, 'ru', 'Etibarlılıq', NULL, NULL, NULL),
(16, 6, 'az', 'İnnovativlik', NULL, NULL, NULL),
(17, 6, 'en', 'İnnovativlik', NULL, NULL, NULL),
(18, 6, 'ru', 'İnnovativlik', NULL, NULL, NULL),
(19, 7, 'az', 'Çeviklik', NULL, NULL, NULL),
(20, 7, 'en', 'Çeviklik', NULL, NULL, NULL),
(21, 7, 'ru', 'Çeviklik', NULL, NULL, NULL),
(22, 8, 'az', 'Şəffaflıq', NULL, NULL, NULL),
(23, 8, 'en', 'Şəffaflıq', NULL, NULL, NULL),
(24, 8, 'ru', 'Şəffaflıq', NULL, NULL, NULL),
(25, 9, 'az', 'Məxfiliyin qorunması', NULL, NULL, NULL),
(26, 9, 'en', 'Məxfiliyin qorunması', NULL, NULL, NULL),
(27, 9, 'ru', 'Məxfiliyin qorunması', NULL, NULL, NULL),
(28, 10, 'az', 'Misiyamız', 'Misiyamız – rəqəmsal dünyada keyfiyyətə üstünlük verənlərə təhlükəsiz, etibarlı və uyğunlaşa bilən data xidmətləri təqdim etmək', '<p><span style=\"color:rgb(0,0,0);\">Baxişimiz – Müştərilərə öz əsas işlərilə məşğul olmağa imkan verən regional rəqəmsal həllər provayderi olmaq Qürur duyulacaq rəqəmsal gələcəyi birlikdə quraq</span></p>', NULL),
(29, 10, 'en', 'Misiyamız', 'Misiyamız – rəqəmsal dünyada keyfiyyətə üstünlük verənlərə təhlükəsiz, etibarlı və uyğunlaşa bilən data xidmətləri təqdim etmək', '<p><span style=\"color:rgb(0,0,0);\">Baxişimiz – Müştərilərə öz əsas işlərilə məşğul olmağa imkan verən regional rəqəmsal həllər provayderi olmaq Qürur duyulacaq rəqəmsal gələcəyi birlikdə quraq</span></p>', NULL),
(30, 10, 'ru', 'Misiyamız', 'Misiyamız – rəqəmsal dünyada keyfiyyətə üstünlük verənlərə təhlükəsiz, etibarlı və uyğunlaşa bilən data xidmətləri təqdim etmək', '<p><span style=\"color:rgb(0,0,0);\">Baxişimiz – Müştərilərə öz əsas işlərilə məşğul olmağa imkan verən regional rəqəmsal həllər provayderi olmaq Qürur duyulacaq rəqəmsal gələcəyi birlikdə quraq</span></p>', NULL),
(31, 11, 'az', 'Mission description first part', NULL, '<p>24/7</p><p>support</p>', NULL),
(32, 11, 'en', 'Mission description first part', NULL, '<p>24/7</p><p>support</p>', NULL),
(33, 11, 'ru', 'Mission description first part', NULL, '<p>24/7</p><p>support</p>', NULL),
(34, 12, 'az', 'About mission 2', NULL, '<p>Since</p><p>2016</p>', NULL),
(35, 12, 'en', 'About mission 2', NULL, NULL, NULL),
(36, 12, 'ru', 'About mission 2', NULL, NULL, NULL),
(37, 13, 'az', 'About mission 3', NULL, '<p>99,98%</p><p>reliability level</p>', NULL),
(38, 13, 'en', 'About mission 3', NULL, NULL, NULL),
(39, 13, 'ru', 'About mission 3', NULL, NULL, NULL),
(40, 14, 'az', 'Universal blok', 'https://google.com', '<p>&nbsp;Leveraging this, service providers can easily offer application developers and enterprises a wide set of capabilities to manage and control communications to and from their connected IoT</p>', NULL),
(41, 14, 'en', 'Universal block', 'https://google.com', '<p>&nbsp;Leveraging this, service providers can easily offer application developers and enterprises a wide set of capabilities to manage and control communications to and from their connected IoT</p>', NULL),
(42, 14, 'ru', 'Universal block', 'https://google.com', '<p>&nbsp;Leveraging this, service providers can easily offer application developers and enterprises a wide set of capabilities to manage and control communications to and from their connected IoT</p>', NULL),
(43, 15, 'az', 'Data mərkəzlər', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.', NULL, NULL),
(44, 15, 'en', 'Data mərkəzlər', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.', NULL, NULL),
(45, 15, 'ru', 'Data mərkəzlər', '\"AZCLOUD\" Azərbaycan və Cənubi Qafqaz regionunda TIER III, ISO 20000, ISO 22301 və ISO 27001 sertifikatlarına malik ilk data mərkəzi, 2016-cı ilin dekabr ayında “AzInTelecom” MMC tərəfindən istismara verilib. “AzInTelecom” MMC Nəqliyyat, Rabitə və Yüksək Texnologiyalar Nazirliyi (NRYTN) nəzdində fəaliyyət göstərir.Sahəsi 700 m2 –dən çox olan və tələblərinizə tam cavab verəcək sayda server dayaqlarına malik data mərkəzində verilənlərin yüksək sürətlə ötürülməsini həyata keçiririk.', NULL, NULL),
(46, 16, 'az', 'Sertifikat və Mükafatlar', NULL, NULL, NULL),
(47, 16, 'en', 'Sertifikat və Mükafatlar', NULL, NULL, NULL),
(48, 16, 'ru', 'Sertifikat və Mükafatlar', NULL, NULL, NULL),
(49, 17, 'az', 'Partnership what you get', 'Партнерство с нами позволяет освободить время и разделить риски.', NULL, NULL),
(50, 17, 'en', 'Partnership what you get', 'Партнерство с нами позволяет освободить время и разделить риски.', NULL, NULL),
(51, 17, 'ru', 'Partnership what you get', 'Партнерство с нами позволяет освободить время и разделить риски.', NULL, NULL),
(52, 18, 'az', 'Əməkdaşlıq', 'Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.', NULL, '{\"title\":\"Partnership page\",\"keywords\":\"Partnership page keywords\",\"description\":\"Partnership page description\"}'),
(53, 18, 'en', 'Əməkdaşlıq', 'Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.', NULL, '{\"title\":\"Partnership page\",\"keywords\":\"Partnership page keywords\",\"description\":\"Partnership page description\"}'),
(54, 18, 'ru', 'Əməkdaşlıq', 'Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.', NULL, '{\"title\":\"Partnership page\",\"keywords\":\"Partnership page keywords\",\"description\":\"Partnership page description\"}'),
(55, 19, 'az', 'İmkanlar', NULL, '<ul><li>Məhsulların satışı;</li><li>Qlobal alış və satış;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların satışı;</li></ul>', NULL),
(56, 19, 'en', 'İmkanlar', NULL, '<ul><li>Məhsulların satışı;</li><li>Qlobal alış və satış;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların satışı;</li></ul>', NULL),
(57, 19, 'ru', 'İmkanlar', NULL, '<ul><li>Məhsulların satışı;</li><li>Qlobal alış və satış;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların satışı;</li></ul>', NULL),
(58, 20, 'az', 'Məhsul portfelinin xarakteristikası', NULL, '<ul><li>Hesablama, Yaddaş, Şəbəkə və Yerləşdirmə (co-location) xidmətləri;</li><li>İT infrastruktur üçün vahid mənbə;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların dövrü idarəçiliyi.</li></ul>', NULL),
(59, 20, 'en', 'Məhsul portfelinin xarakteristikası', NULL, '<ul><li>Hesablama, Yaddaş, Şəbəkə və Yerləşdirmə (co-location) xidmətləri;</li><li>İT infrastruktur üçün vahid mənbə;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların dövrü idarəçiliyi.</li></ul>', NULL),
(60, 20, 'ru', 'Məhsul portfelinin xarakteristikası', NULL, '<ul><li>Hesablama, Yaddaş, Şəbəkə və Yerləşdirmə (co-location) xidmətləri;</li><li>İT infrastruktur üçün vahid mənbə;</li><li>Son istifadəçinin təsdiqi olmadan xüsusi qiymət əldə etmək imkanı.</li><li>Məhsulların dövrü idarəçiliyi.</li></ul>', NULL),
(61, 21, 'az', 'Hədəflərimiz', NULL, '<ul><li>Kiçik, orta və böyük bizneslər;</li><li>Uzunmüddətli biznes əlaqələri.</li></ul>', NULL),
(62, 21, 'en', 'Hədəflərimiz', NULL, '<ul><li>Kiçik, orta və böyük bizneslər;</li><li>Uzunmüddətli biznes əlaqələri.</li></ul>', NULL),
(63, 21, 'ru', 'Hədəflərimiz', NULL, '<ul><li>Kiçik, orta və böyük bizneslər;</li><li>Uzunmüddətli biznes əlaqələri.</li></ul>', NULL),
(67, 23, 'az', 'Sistem inteqratoru', NULL, '<p>Sistem inteqratoru (Sİ) müxtəlif vendorlardan əldə olunan avadanlıq, proqram təminatı, şəbəkə və saxlama məhsullarını birləşdirərək müştərilər üçün bütov hesablama sistemlərinin qurulmasında ixtisaslaşan fərd və ya biznesdir. Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.</p>', NULL),
(68, 23, 'en', 'Sistem inteqratoru', NULL, '<p>Sistem inteqratoru (Sİ) müxtəlif vendorlardan əldə olunan avadanlıq, proqram təminatı, şəbəkə və saxlama məhsullarını birləşdirərək müştərilər üçün bütov hesablama sistemlərinin qurulmasında ixtisaslaşan fərd və ya biznesdir. Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.</p>', NULL),
(69, 23, 'ru', 'Sistem inteqratoru', NULL, '<p>Sistem inteqratoru (Sİ) müxtəlif vendorlardan əldə olunan avadanlıq, proqram təminatı, şəbəkə və saxlama məhsullarını birləşdirərək müştərilər üçün bütov hesablama sistemlərinin qurulmasında ixtisaslaşan fərd və ya biznesdir. Birlikdə təklif etdiyimiz kompleks həllər müştərilərimizə bazarda yaranan yeni tendensiya və çağırışlara cəld reaksiya verməyə köməklik edəcək.</p>', NULL),
(70, 24, 'az', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(71, 24, 'en', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(72, 24, 'ru', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(73, 25, 'az', 'Gold partner', '10%', '<p>400-699 AZN&nbsp;</p>', NULL),
(74, 25, 'en', 'Gold partner', '10%', '<p>400-699 AZN&nbsp;</p>', NULL),
(75, 25, 'ru', 'Gold partner', '10%', '<p>400-699 AZN&nbsp;</p>', NULL),
(76, 26, 'az', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p><p>&nbsp;</p>', NULL),
(77, 26, 'en', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p><p>&nbsp;</p>', NULL),
(78, 26, 'ru', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p><p>&nbsp;</p>', NULL),
(79, 27, 'az', 'İdarə edilən Xidmət Provayderi', NULL, '<p>İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir.</p>', NULL),
(80, 27, 'en', 'İdarə edilən Xidmət Provayderi', NULL, '<p>İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir.</p>', NULL),
(81, 27, 'ru', 'İdarə edilən Xidmət Provayderi', NULL, '<p>İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir.</p>', NULL),
(82, 28, 'az', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(83, 28, 'en', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(84, 28, 'ru', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(85, 29, 'az', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(86, 29, 'en', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(87, 29, 'ru', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(88, 30, 'az', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(89, 30, 'en', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(90, 30, 'ru', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p>', NULL),
(91, 31, 'az', 'Satış dileri', NULL, '<p>Əməkdaşlıq Proqramı Satış dilerlərimizə ictimai, özəl və dövlət sektorundan olan müştərilərə etibarlı, yüksək keyfiyyətli xidmət, data təhlükəsizliyi, müasir İT göstəricilərinə malik şəbəkə və İT infrastrukturu əsasında AzInTelecom-un data mərkəzi xidmətlərini və infrastruktur həllərini əldə etməklərinə kömək etmək üçün şərait yaradır.&nbsp;</p>', NULL),
(92, 31, 'en', 'Satış dileri', NULL, '<p>Əməkdaşlıq Proqramı Satış dilerlərimizə ictimai, özəl və dövlət sektorundan olan müştərilərə etibarlı, yüksək keyfiyyətli xidmət, data təhlükəsizliyi, müasir İT göstəricilərinə malik şəbəkə və İT infrastrukturu əsasında AzInTelecom-un data mərkəzi xidmətlərini və infrastruktur həllərini əldə etməklərinə kömək etmək üçün şərait yaradır.&nbsp;</p>', NULL),
(93, 31, 'ru', 'Satış dileri', NULL, '<p>Əməkdaşlıq Proqramı Satış dilerlərimizə ictimai, özəl və dövlət sektorundan olan müştərilərə etibarlı, yüksək keyfiyyətli xidmət, data təhlükəsizliyi, müasir İT göstəricilərinə malik şəbəkə və İT infrastrukturu əsasında AzInTelecom-un data mərkəzi xidmətlərini və infrastruktur həllərini əldə etməklərinə kömək etmək üçün şərait yaradır.&nbsp;</p>', NULL),
(94, 32, 'az', 'Silver partner', '16%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(95, 32, 'en', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(96, 32, 'ru', 'Silver partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(97, 33, 'az', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(98, 33, 'en', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(99, 33, 'ru', 'Gold partner', '10%', '<p>400-699 AZN</p>', NULL),
(100, 34, 'az', 'Platinum partner', '5%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(101, 34, 'en', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(102, 34, 'ru', 'Platinum partner', '10%', '<p>399 AZN-ə qədər</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(103, 35, 'az', 'Seo text', NULL, '<p>SEO text. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>', NULL),
(104, 35, 'en', 'Seo text', NULL, '<p>SEO text. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>', NULL),
(105, 35, 'ru', 'Seo text', NULL, '<p>SEO text. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>', NULL),
(112, 38, 'az', 'Əsas səhifə', NULL, NULL, '{\"title\":\"Azcloud homepage\",\"keywords\":\"Azcloud meta keywords az\",\"description\":\"Azcloud meta description az\"}'),
(113, 38, 'en', 'Homepage', NULL, NULL, '{\"title\":\"Azcloud meta title en\",\"keywords\":\"Azcloud meta keywords en\",\"description\":\"Azcloud meta description en\"}'),
(114, 38, 'ru', 'Главная', NULL, NULL, '{\"title\":\"Azcloud meta title ru\",\"keywords\":\"Azcloud meta keywords ru\",\"description\":\"Azcloud meta description ru\"}'),
(115, 39, 'az', 'Contact', NULL, NULL, '{\"title\":\"Contact page\",\"keywords\":\"Contact page keywords\",\"description\":\"Contact page description\"}'),
(116, 39, 'en', 'Contact', NULL, NULL, '{\"title\":\"Contact page\",\"keywords\":\"Contact page keywords\",\"description\":\"Contact page description\"}'),
(117, 39, 'ru', 'Contact', NULL, NULL, '{\"title\":\"Contact page\",\"keywords\":\"Contact page keywords\",\"description\":\"Contact page description\"}'),
(118, 40, 'az', 'Standarts', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(119, 40, 'en', 'Standarts', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(120, 40, 'ru', 'Standarts', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(121, 41, 'az', 'Müştərilər', 'We\'re partners with countless major organisations around the globe', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(122, 41, 'en', 'Customers', 'We\'re partners with countless major organisations around the globe', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(123, 41, 'ru', 'Клиенты', 'We\'re partners with countless major organisations around the globe', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(124, 42, 'az', 'Üstünlüklərimiz', 'Bizim fərqləndirici cəhətimiz bazar tendensiyaları və ən müasir texnologiyalara uyğunluğumuzdur. Data mərkəzimizin əsas üstünlükləri arasında informasiya təhlükəsizliyinin təmin edilməsi, kibertəhdidlərin qarşısının alınması və data itkisi ilə bağlı risklərin minimuma endirilməsini qeyd etməliyik. Bundan başqa, təklif etdiyimiz xidmətlərə 24/7 rejimində texniki dəstək təmin edirik.', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(125, 42, 'en', 'Üstünlüklərimiz', 'Bizim fərqləndirici cəhətimiz bazar tendensiyaları və ən müasir texnologiyalara uyğunluğumuzdur. Data mərkəzimizin əsas üstünlükləri arasında informasiya təhlükəsizliyinin təmin edilməsi, kibertəhdidlərin qarşısının alınması və data itkisi ilə bağlı risklərin minimuma endirilməsini qeyd etməliyik. Bundan başqa, təklif etdiyimiz xidmətlərə 24/7 rejimində texniki dəstək təmin edirik.', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(126, 42, 'ru', 'Üstünlüklərimiz', 'Bizim fərqləndirici cəhətimiz bazar tendensiyaları və ən müasir texnologiyalara uyğunluğumuzdur. Data mərkəzimizin əsas üstünlükləri arasında informasiya təhlükəsizliyinin təmin edilməsi, kibertəhdidlərin qarşısının alınması və data itkisi ilə bağlı risklərin minimuma endirilməsini qeyd etməliyik. Bundan başqa, təklif etdiyimiz xidmətlərə 24/7 rejimində texniki dəstək təmin edirik.', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(127, 43, 'az', 'Üstünlüklər', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(128, 43, 'en', 'Advantages', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(129, 43, 'ru', 'Advantages', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(130, 44, 'az', 'TƏHLÜKƏSİZ', 'https://google.com', '<p>&nbsp;Fiziki və virtual müdafiə Yanğına qarşı mühafizə sistemi</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(131, 44, 'en', 'SECURE', 'https://google.com', '<p>&nbsp;Fiziki və virtual müdafiə Yanğına qarşı mühafizə sistemi</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(132, 44, 'ru', 'TƏHLÜKƏSİZ', 'https://google.com', '<p>&nbsp;Fiziki və virtual müdafiə Yanğına qarşı mühafizə sistemi</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(133, 45, 'az', 'SƏMƏRƏLİ', 'https://google.com', '<p>Uyğunlaşma qabiliyyəti Yenilənməyə ehtiyac olmayan Kapital xərclərinin 0%-ə endirilməsi İstismar xərclərinin 30-40% azaldılması</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(134, 45, 'en', 'SƏMƏRƏLİ', 'https://google.com', '<p>Uyğunlaşma qabiliyyəti Yenilənməyə ehtiyac olmayan Kapital xərclərinin 0%-ə endirilməsi İstismar xərclərinin 30-40% azaldılması</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(135, 45, 'ru', 'SƏMƏRƏLİ', 'https://google.com', '<p>Uyğunlaşma qabiliyyəti Yenilənməyə ehtiyac olmayan Kapital xərclərinin 0%-ə endirilməsi İstismar xərclərinin 30-40% azaldılması</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(136, 46, 'az', 'ETİBARLI', 'https://google.com', '<p>Enerji təhcizatı xüsusi soyutma sistemi qoşulma imkanı</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(137, 46, 'en', 'ETİBARLI', 'https://google.com', '<p>Enerji təhcizatı xüsusi soyutma sistemi qoşulma imkanı</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(138, 46, 'ru', 'ETİBARLI', 'https://google.com', '<p>Enerji təhcizatı xüsusi soyutma sistemi qoşulma imkanı</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(139, 47, 'az', 'DİGƏR', 'https://google.com', '<p>Daşına bilən ətraf mühitə zərərsiz</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(140, 47, 'en', 'DİGƏR', 'https://google.com', '<p>Daşına bilən ətraf mühitə zərərsiz</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(141, 47, 'ru', 'DİGƏR', 'https://google.com', '<p>Daşına bilən ətraf mühitə zərərsiz</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(142, 48, 'az', 'Exposure Server', 'Cloud Core Exposure Server…', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(143, 48, 'en', 'Exposure Server', 'Cloud Core Exposure Server…', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(144, 48, 'ru', 'Exposure Server', 'Cloud Core Exposure Server…', NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(145, 49, 'az', 'Bizim haqqımızda nə fikirləşirlər', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(146, 49, 'en', 'Bizim haqqımızda nə fikirləşirlər', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(147, 49, 'ru', 'Bizim haqqımızda nə fikirləşirlər', NULL, NULL, '{\"title\":null,\"keywords\":null,\"description\":null}'),
(148, 50, 'az', 'Əhməd Rəcəbli', 'Piere Cardin company, CEO', '<p>«İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir»</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(149, 50, 'en', 'Əhməd Rəcəbli', 'Piere Cardin company, CEO', '<p>«İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir»</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(150, 50, 'ru', 'Əhməd Rəcəbli', 'Piere Cardin company, CEO', '<p>«İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir»</p>', '{\"title\":null,\"keywords\":null,\"description\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `link`, `status`) VALUES
(1, 'Test partner', 'https://google.com', 1),
(2, 'Pioner', NULL, 1),
(3, 'Test partner2', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_author_id_foreign` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `status`, `created_at`, `updated_at`) VALUES
(99, NULL, 1, '2020-10-28 19:21:14', '2021-02-15 12:33:52'),
(100, NULL, 1, '2020-06-09 20:42:50', '2021-02-16 10:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(100, 4),
(99, 10),
(99, 11),
(99, 12);

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE IF NOT EXISTS `post_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_translations_post_id_locale_slug_unique` (`post_id`,`locale`,`slug`),
  KEY `post_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `slug`, `content`, `meta`) VALUES
(295, 99, 'az', 'Lobster; I heard him declare, \"You have baked me.az', 'nam-id-aut-doloribus-qui-similique-quisaz', '<p>The Dormouse again took a great crash, as if nothing had happened. \'How am I to do?\' said Alice. \'Well, then,\' the Cat said, waving its right paw round, \'lives a Hatter: and in another moment that it was good practice to say whether the blows hurt it or not. So she swallowed one of them bowed low. \'Would you tell me,\' said Alice, surprised at this, but at any rate: go and take it away!\' There was a little scream, half of anger, and tried to speak, but for a conversation. \'You don\'t know what \"it\" means well enough, when I got up and throw us, with the tarts, you know--\' \'What did they live on?\' said the last word with such a subject! Our family always HATED cats: nasty, low, vulgar things! Don\'t let me hear the very tones of the trees under which she had not attended to this mouse? Everything is so out-of-the-way down here, that I should think it so yet,\' said Alice; \'living at the March Hare took the watch and looked at Alice. \'It goes on, you know,\' the Hatter said, tossing his.az</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(296, 99, 'en', 'Let me think: was I the same as the whole head.en', 'officiis-sequi-non-et-corruptien', '<p>Why, I wouldn\'t be so stingy about it, you may SIT down,\' the King eagerly, and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the way I want to go and take it away!\' There was a large pigeon had flown into her head. Still she went on: \'--that begins with an important air, \'are you all ready? This is the capital of Paris, and Paris is the capital of Paris, and Paris is the capital of Paris, and Paris is the reason is--\' here the conversation dropped, and the Dormouse said--\' the Hatter hurriedly left the court, by the way, and then keep tight hold of anything, but she heard something like this:-- \'Fury said to the Classics master, though. He was an uncomfortably sharp chin. However, she got used to know. Let me see: four times five is twelve, and four times five is twelve, and four times seven is--oh dear! I wish I hadn\'t quite finished my tea when I was a long time with one finger pressed upon its forehead (the position in dancing.\' Alice said; but was.en</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(297, 99, 'ru', 'CHAPTER VI. Pig and Pepper For a minute or two.ru', 'illum-dolor-sint-placeat-ad-enim-velitru', '<p>Dormouse sulkily remarked, \'If you do. I\'ll set Dinah at you!\' There was no use in talking to him,\' the Mock Turtle recovered his voice, and, with tears running down his cheeks, he went on in a twinkling! Half-past one, time for dinner!\' (\'I only wish people knew that: then they both bowed low, and their slates and pencils had been would have this cat removed!\' The Queen had ordered. They very soon came to ME, and told me he was in the act of crawling away: besides all this, there was nothing else to do, so Alice ventured to remark. \'Tut, tut, child!\' said the Caterpillar sternly. \'Explain yourself!\' \'I can\'t go no lower,\' said the Gryphon. \'We can do without lobsters, you know. So you see, Miss, we\'re doing our best, afore she comes, to--\' At this the White Rabbit blew three blasts on the back. At last the Mouse, getting up and straightening itself out again, and the pair of white kid gloves, and she swam lazily about in the act of crawling away: besides all this, there was.ru</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(298, 100, 'az', 'Caterpillar contemptuously. \'Who are YOU?\' said.az', 'sit-corrupti-id-illum-dolorum-sintaz', '<p>I don\'t want to see that she was coming to, but it puzzled her a good deal until she made her draw back in a melancholy tone: \'it doesn\'t seem to see if he would deny it too: but the Gryphon went on. Her listeners were perfectly quiet till she fancied she heard a little startled by seeing the Cheshire Cat, she was exactly one a-piece all round. (It was this last remark, \'it\'s a vegetable. It doesn\'t look like it?\' he said, \'on and off, for days and days.\' \'But what am I to get in?\' \'There might be hungry, in which you usually see Shakespeare, in the sea. The master was an uncomfortably sharp chin. However, she soon found herself in a court of justice before, but she heard a little shaking among the leaves, which she had brought herself down to them, they were all crowded together at one end of every line: \'Speak roughly to your places!\' shouted the Gryphon, \'you first form into a tree. \'Did you speak?\' \'Not I!\' said the Eaglet. \'I don\'t know where Dinn may be,\' said the Hatter asked.az</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(299, 100, 'en', 'And will talk in contemptuous tones of her sharp.en', 'aut-velit-dolore-consequaturen', '<p>I wonder what CAN have happened to me! When I used to it!\' pleaded poor Alice in a shrill, passionate voice. \'Would YOU like cats if you want to see you again, you dear old thing!\' said the King. \'It began with the next verse,\' the Gryphon said to herself \'That\'s quite enough--I hope I shan\'t go, at any rate: go and get in at the corners: next the ten courtiers; these were ornamented all over crumbs.\' \'You\'re wrong about the twentieth time that day. \'No, no!\' said the last words out loud, and the Queen had only one who got any advantage from the roof. There were doors all round the thistle again; then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never was so large a house, that she remained the same as they used to come down the bottle, saying to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I can\'t understand it myself to begin lessons: you\'d only have to go down the chimney, and said \'That\'s very important,\'.en</p>', '{\"title\":null,\"keywords\":null,\"description\":null}'),
(300, 100, 'ru', 'I hadn\'t gone down that rabbit-hole--and.ru', 'adipisci-veniam-et-vero-necessitatibus-officia-nesciunt-repellat-assumendaru', '<p>NOT be an advantage,\' said Alice, whose thoughts were still running on the floor, and a pair of gloves and a piece of rudeness was more hopeless than ever: she sat down with wonder at the end of the Rabbit\'s little white kid gloves and a long breath, and said to a day-school, too,\' said Alice; \'you needn\'t be afraid of it. Presently the Rabbit say, \'A barrowful will do, to begin with.\' \'A barrowful will do, to begin again, it was out of sight: then it watched the White Rabbit read out, at the end of the Lobster Quadrille, that she had expected: before she gave a look askance-- Said he thanked the whiting kindly, but he could go. Alice took up the fan and gloves, and, as they would go, and making faces at him as he spoke, and added \'It isn\'t directed at all,\' said the Hatter. He came in sight of the officers: but the Dodo said, \'EVERYBODY has won, and all of them attempted to explain the mistake it had VERY long claws and a Dodo, a Lory and an old Crab took the hookah into its mouth.ru</p>', '{\"title\":null,\"keywords\":null,\"description\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACS', 'acs', 1, '2021-02-18 18:48:46', '2021-02-18 18:48:46'),
(2, 2, 'ASB', 'asb', 1, '2021-02-18 18:48:46', '2021-02-18 18:48:46'),
(3, 3, 'ALB-A', 'alb-a', 1, '2021-02-18 18:49:48', '2021-02-18 18:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_category_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'computed', '1', '2021-02-18 18:32:58', '2021-02-18 18:33:50'),
(2, 'storage', '1', '2021-02-18 18:34:15', '2021-02-18 18:34:15'),
(3, 'networking', '1', '2021-02-18 18:34:38', '2021-02-18 19:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_translations`
--

CREATE TABLE IF NOT EXISTS `product_category_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_category_translations_category_id_locale_unique` (`category_id`,`locale`),
  KEY `product_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_translations`
--

INSERT INTO `product_category_translations` (`id`, `category_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'az', 'Computed', 'Computed haqqinda qisa melumat'),
(2, 1, 'en', 'Computed', 'Computed haqqinda qisa melumat'),
(3, 1, 'ru', 'Computed', 'Computed haqqinda qisa melumat'),
(4, 2, 'az', 'Storage', 'Storage haqqinda melumat'),
(5, 2, 'en', 'Storage', 'Storage haqqinda melumat'),
(6, 2, 'ru', 'Storage', 'Storage haqqinda melumat'),
(7, 3, 'az', 'Networking', 'Networking haqqinda melumat'),
(8, 3, 'en', 'Networking', 'Networking haqqinda melumat'),
(9, 3, 'ru', 'Networking', 'Networking haqqinda melumat');

-- --------------------------------------------------------

--
-- Table structure for table `product_flavors`
--

CREATE TABLE IF NOT EXISTS `product_flavors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flavor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `disk` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `isWindowsOnly` tinyint(1) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_flavors_product_id_foreign` (`product_id`),
  KEY `product_flavors_flavor_id_index` (`flavor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_flavors`
--

INSERT INTO `product_flavors` (`id`, `product_id`, `type`, `flavor_id`, `name`, `family`, `price`, `cpu`, `ram`, `disk`, `size`, `isWindowsOnly`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'vm', 'ae9e562a-99f7-46a6-b71c-be088969d747', 'C1.2', 'C', '27.13', 1, 2, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(2, 1, 'vm', 'eb0b803a-6b7a-4147-823c-cfc6abd9845e', 'B1.2', 'B', '30.91', 1, 2, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(3, 1, 'vm', 'ce3d7388-afea-4586-a8a5-41702c50067f', 'C1.4', 'C', '40.13', 1, 4, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(4, 1, 'vm', 'e76e72e8-39da-46bf-a2c8-6e3b71bb70c9', 'B1.4', 'B', '43.91', 1, 4, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(5, 1, 'vm', '0dd6a711-bcd3-4155-9cbf-02b1c6cd6024', 'A1,2', 'A', '47.17', 1, 2, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(6, 1, 'vm', 'a13a34ea-5823-41bd-82c9-ecef08f85f1e', 'C2.4', 'C', '48.52', 2, 4, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(7, 1, 'vm', '06605de7-db8b-4e7c-b0d1-91f918dbe39e', 'C1.2', 'C', '50.58', 1, 2, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(8, 1, 'vm', '98c90f57-0cc8-4992-94a3-7b808e718fa1', 'B1.2', 'B', '54.36', 1, 2, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(9, 1, 'vm', '9f0489fb-9f23-4acb-a8a9-3dbdcdcd0844', 'B2.4', 'B', '56.08', 2, 4, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(10, 1, 'vm', '5cf8f4bd-87a0-4af6-9df5-aa09f1226202', 'A1.4', 'A', '66.19', 1, 4, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(11, 1, 'vm', '91f4b4aa-9528-4888-9272-7390b1c93bc8', 'A1.2', 'A', '70.62', 1, 2, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(12, 1, 'vm', '2056fe0d-3e64-4a8d-8b55-e30b620c5f14', 'C2.4', 'C', '71.96', 2, 4, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(13, 1, 'vm', 'd31c70ab-5316-4f54-87a4-8629dd4328ce', 'C2.8', 'C', '74.32', 2, 8, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(14, 1, 'vm', 'a840709d-28e9-4880-8259-37398ec6b0b1', 'B2.4', 'B', '79.52', 2, 4, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(15, 1, 'vm', '9ef83a97-0c22-4318-9bb2-e4d38890ba93', 'B2.8', 'B', '82.08', 2, 8, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(16, 1, 'vm', '10c33e18-e2a3-4498-a1e5-457ebe9de28e', 'A2.4', 'A', '88.6', 2, 4, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(17, 1, 'vm', '89d7a2b5-386d-438e-8eea-ba581f4d2060', 'C4.8', 'C', '91.29', 4, 8, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(18, 1, 'vm', 'e98e7ebe-da35-4a85-b7c7-28e0010c0897', 'B4.8', 'B', '106.41', 4, 8, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(19, 1, 'vm', 'f1f71a07-47e1-4494-ae3c-a206e591f131', 'A2.4', 'A', '112.05', 2, 4, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(20, 1, 'vm', '5fa09dee-4bf4-4de2-9bbe-118ce1498183', 'A2.8', 'A', '126.63', 2, 8, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(21, 1, 'vm', 'cd374bc4-d863-40d2-a23e-866b3611c662', 'C4.16', 'C', '143.3', 4, 16, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(22, 1, 'vm', 'ca795234-4ed0-4ffb-a1da-a25cc2ee217d', 'B4.16', 'B', '158.42', 4, 16, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(23, 1, 'vm', '6d05aad9-6f0b-4231-a32a-7d0d38367a20', 'A4.8', 'A', '171.46', 4, 8, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(24, 1, 'vm', '3f1352c8-450b-4f8f-864f-bdea8293eda6', 'C8.16', 'C', '176.84', 8, 16, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(25, 1, 'vm', '5b535b20-4d80-42f0-bee3-38b44f32ab95', 'B8.16', 'B', '207.08', 8, 16, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(26, 1, 'vm', '2c5aac21-141d-4f8d-85a3-8b826aae0570', 'A4.16', 'A', '247.51', 4, 16, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(27, 1, 'vm', '2182a8dd-3e7b-4115-b462-9d778dd55cbb', 'C4.32', 'C', '290.77', 4, 32, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(28, 1, 'vm', '4484aaa8-bef0-49cb-933f-127b252a41a2', 'B4.32', 'B', '305.89', 4, 32, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(29, 1, 'vm', 'b12d82b0-4304-45a9-ab50-17c52755ec2a', 'A8.16', 'A', '337.18', 8, 16, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(30, 1, 'vm', '2665b1b2-b6bc-4e85-9d0b-cdf4631451dc', 'C16.32', 'C', '347.94', 16, 32, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(31, 1, 'vm', '09c88c07-655a-4d4f-9662-fd2621828045', 'B16.32', 'B', '408.42', 16, 32, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(32, 1, 'vm', '54b6439b-efa8-4922-be05-ce0fe2d0c584', 'A4.32', 'A', '443.06', 4, 32, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(33, 1, 'vm', '1e924c31-f929-4838-b9d3-05fbea35563e', 'C16.64', 'C', '555.98', 16, 64, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(34, 1, 'vm', '431cdc4b-b419-458f-9c45-a2fdc4763669', 'C8.64', 'C', '572.35', 8, 64, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(35, 1, 'vm', 'c716dae9-485e-43f6-a610-c03a04d6bad2', 'B8.64', 'B', '602.59', 8, 64, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(36, 1, 'vm', '53097a37-e123-4d73-bcfb-1de9d84a0ef4', 'B16.64', 'B', '616.46', 16, 64, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(37, 1, 'vm', 'e204e6f1-5abd-4e60-8f6e-030dc838b77b', 'A16.32', 'A', '668.62', 16, 32, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(38, 1, 'vm', '6353ba2f-4352-4311-afae-630faef3d44e', 'C32.64', 'C', '690.14', 32, 64, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(39, 1, 'vm', '1fcb7836-849a-499f-bba4-4139f7f1cab7', 'B32.64', 'B', '811.1', 32, 64, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(40, 1, 'vm', 'f56d117b-9774-411b-9319-827b9e94348c', 'A8.64', 'A', '876.92', 8, 64, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(41, 1, 'vm', 'b4b03271-0054-44bb-93e5-cad07727f20a', 'C16.128', 'C', '972.06', 16, 128, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(42, 1, 'vm', 'f78d5b52-33b2-4b44-ba1d-91519fa4342a', 'A16.64', 'A', '972.82', 16, 64, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(43, 1, 'vm', 'cbec3aee-75c9-4f49-8d8e-8a192934ec4d', 'B16.128', 'B', '1032.54', 16, 128, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(44, 1, 'vm', 'cf780eb4-635e-445a-80b0-3b71a347fce6', 'C32.128', 'C', '1106.22', 32, 128, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(45, 1, 'vm', '8e6ab0aa-6047-4844-b0b4-e8a0b08dcd4f', 'C16.128', 'C', '1135.51', 16, 128, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(46, 1, 'vm', '79e475f8-dd98-46ad-a43d-3d570ebc6f1c', 'B16.128', 'B', '1195.99', 16, 128, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(47, 1, 'vm', '4c33adec-6328-48dd-a779-d183c8b15125', 'B32.128', 'B', '1227.18', 32, 128, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(48, 1, 'vm', 'd2080ca5-c003-424c-b2f1-8c55117f841e', 'A32.64', 'A', '1331.5', 32, 64, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(49, 1, 'vm', 'b24b061c-bc69-4dd9-b1ca-8bd2bd968316', 'A16.128', 'A', '1581.21', 16, 128, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(50, 1, 'vm', 'e369c69a-01ca-49d9-b522-194f1824a6c1', 'A16.128', 'A', '1744.66', 16, 128, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(51, 1, 'vm', '76824d8b-fc19-42a2-b725-60fc46648152', 'C32.256', 'C', '1938.38', 32, 256, 20, NULL, 0, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(52, 1, 'vm', '4536fb6f-6330-43a9-9dee-7d3062c94bf1', 'A32.128', 'A', '1939.89', 32, 128, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(53, 1, 'vm', '33f1741d-18b0-4ace-8952-85e293d59563', 'B32.256', 'B', '2059.34', 32, 256, 20, NULL, 0, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(54, 1, 'vm', 'bc6acc91-aecb-47bf-bd93-2f616bf35781', 'C32.256', 'C', '2261.83', 32, 256, 32, NULL, 1, ' General purposed virtual machines that  are optimized for compute-intensive workloads and deliver very cost-effective performance at a low price per compute ratio.', NULL, NULL),
(55, 1, 'vm', '53270f7b-dbe6-4c7f-a463-30da0a4a78a0', 'B32.256', 'B', '2382.79', 32, 256, 32, NULL, 1, 'Virtual machines that are optimized for compute-intensive workloads and deliver cost-effective high performance at a low price per compute ratio.', NULL, NULL),
(56, 1, 'vm', 'a1a6090b-8ba9-4ea2-a5ff-5c798f532072', 'A32.256', 'A', '3156.68', 32, 256, 20, NULL, 0, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(57, 1, 'vm', '1532412a-3b5f-4e13-9b74-63e9d75253f1', 'A32.256', 'A', '3480.12', 32, 256, 32, NULL, 1, 'Accelerated virtual machines that are ideal for high compute applications requiring high levels of compute performance.', NULL, NULL),
(58, 2, 'volume', '22876f4c-b1b2-42c1-9a11-efe7b40d9c24', 'T1', 'T', '7.53', NULL, NULL, NULL, 10, NULL, 'Turbo performance storages. ', NULL, NULL),
(59, 2, 'volume', '8b0eebf2-a705-4f3d-aab8-85024e67a670', 'U1 ', 'U', '2.87', NULL, NULL, NULL, 10, NULL, 'Ultra performance storages.', NULL, NULL),
(60, 2, 'volume', 'ae096562-381a-4ac0-ae9c-7e58f77d6721', 'S1', 'S', '1.8', NULL, NULL, NULL, 10, NULL, 'Standart performance storages.', NULL, NULL),
(61, 2, 'volume', 'b259d244-0655-4c9e-ad13-135258a5e740', 'v1.test', 'v', '5', NULL, NULL, NULL, 20, NULL, 'Smallest volume', NULL, NULL),
(62, 2, 'volume', '2afbec91-c865-4bce-a512-45edad8d318c', 'Test-volume', 'T', '2', NULL, NULL, NULL, 20, NULL, '', NULL, NULL),
(63, 2, 'volume', '744faa6d-4c3e-4fac-ac66-e662c33e99e1', 'T2', 'T', '22.59', NULL, NULL, NULL, 30, NULL, 'Turbo performance storages.', NULL, NULL),
(64, 2, 'volume', 'cc5bb213-c60d-45fb-a5d0-a6539f3dfd93', 'U2', 'U', '8.61', NULL, NULL, NULL, 30, NULL, 'Ultra performance storages.', NULL, NULL),
(65, 2, 'volume', 'c1f4d07a-adcc-4e59-bfa3-55f2404e6ca5', 'S2', 'S', '5.4', NULL, NULL, NULL, 30, NULL, 'Standart performance storages.', NULL, NULL),
(66, 2, 'volume', '383d3f0f-c3e3-4475-ae2c-d4872cb273b5', 'T3', 'T', '37.65', NULL, NULL, NULL, 50, NULL, 'Turbo performance storages.', NULL, NULL),
(67, 2, 'volume', '68067f34-2304-4068-9d06-89087feddcae', 'U3', 'U', '14.35', NULL, NULL, NULL, 50, NULL, 'Ultra performance storages.', NULL, NULL),
(68, 2, 'volume', 'fb2b5c98-ed0c-4772-ba00-84932fc7a03e', 'S3', 'S', '9', NULL, NULL, NULL, 50, NULL, 'Standart performance storages.', NULL, NULL),
(69, 2, 'volume', '9c03ad03-24e5-49d6-b0c5-a154e373e6f4', 'T4', 'T', '75.3', NULL, NULL, NULL, 100, NULL, 'Turbo performance storages.', NULL, NULL),
(70, 2, 'volume', '307888f8-5cb6-40c2-84ed-2b581309fc67', 'U4', 'U', '28.7', NULL, NULL, NULL, 100, NULL, 'Ultra performance storages.', NULL, NULL),
(71, 2, 'volume', '89d73257-be7e-4421-9431-1ad62143ce80', 'S4', 'S', '18', NULL, NULL, NULL, 100, NULL, 'Standart performance storages.', NULL, NULL),
(72, 2, 'volume', 'c033c48f-2625-486b-8b4b-7745ed2de437', 'T5', 'T', '150.6', NULL, NULL, NULL, 200, NULL, 'Turbo performance storages.', NULL, NULL),
(73, 2, 'volume', 'a12ac6fc-de13-42cb-80cc-fd6ad450d81e', 'U5', 'U', '57.4', NULL, NULL, NULL, 200, NULL, 'Ultra performance storages.', NULL, NULL),
(74, 2, 'volume', '5ed2e249-9595-4fcc-ab5c-2fc1d425801a', 'S5', 'S', '36', NULL, NULL, NULL, 200, NULL, 'Standart performance storages.', NULL, NULL),
(75, 2, 'volume', 'a6236755-b85c-4e40-b803-4f87f055c723', 'T6', 'T', '376.5', NULL, NULL, NULL, 500, NULL, 'Turbo performance storages.', NULL, NULL),
(76, 2, 'volume', 'fd68f3a0-b31c-4b31-b0a4-ef69238ae25e', 'U6', 'U', '143.5', NULL, NULL, NULL, 500, NULL, 'Ultra performance storages.', NULL, NULL),
(77, 2, 'volume', '18b51df2-f943-4c67-8afe-22f7305a5912', 'S6', 'S', '90', NULL, NULL, NULL, 500, NULL, 'Standart performance storages.', NULL, NULL),
(78, 2, 'volume', '9ce667d2-44a6-4123-ad33-1d1c92c45cc3', 'T7', 'T', '602.4', NULL, NULL, NULL, 800, NULL, 'Turbo performance storages.', NULL, NULL),
(79, 2, 'volume', '189f37c2-4346-4bac-99ef-ceb6ca1cb187', 'U7', 'U', '229.6', NULL, NULL, NULL, 800, NULL, 'Ultra performance storages.', NULL, NULL),
(80, 2, 'volume', '01713661-6b25-43d6-905b-985787d4fda2', 'S7', 'S', '144', NULL, NULL, NULL, 800, NULL, 'Standard performance storages.', NULL, NULL),
(81, 2, 'volume', '8dc88a2d-fde9-4b28-8601-96f72ff83455', 'T8', 'T', '771.07', NULL, NULL, NULL, 1024, NULL, 'Turbo performance storages.', NULL, NULL),
(82, 2, 'volume', '778157d6-8a04-47c9-b60a-c76050a9213b', 'U8', 'U', '293.89', NULL, NULL, NULL, 1024, NULL, 'Ultra performance storages.', NULL, NULL),
(83, 2, 'volume', 'e1a4cf62-8492-47a1-8938-405c68c59ffd', 'S8', 'S', '184.32', NULL, NULL, NULL, 1024, NULL, 'Standard performance storages.', NULL, NULL),
(84, 2, 'volume', 'aaa47089-9d8f-4633-a58d-fd7ece9462da', 'T9', 'T', '1542.14', NULL, NULL, NULL, 2048, NULL, 'Turbo performance storages.', NULL, NULL),
(85, 2, 'volume', 'db1140ff-736f-4a58-a38b-be79a903650e', 'U9', 'U', '587.78', NULL, NULL, NULL, 2048, NULL, 'Ultra performance storages.', NULL, NULL),
(86, 2, 'volume', '6d28771b-55e9-44ef-9457-20807913e138', 'S9', 'S', '368.64', NULL, NULL, NULL, 2048, NULL, 'Standard performance storages.', NULL, NULL),
(87, 2, 'volume', '4038876d-8a2c-41d4-b601-7b97a38188fc', 'T10', 'T', '2313.22', NULL, NULL, NULL, 3072, NULL, 'Turbo performance storages.', NULL, NULL),
(88, 2, 'volume', '434b4f71-699e-409e-a292-585ff5722f3c', 'U10', 'U', '881.66', NULL, NULL, NULL, 3072, NULL, 'Ultra performance storages.', NULL, NULL),
(89, 2, 'volume', 'baff0a5b-c0d1-4a35-ac37-02e6338f02cd', 'S10', 'S', '552.96', NULL, NULL, NULL, 3072, NULL, 'Standard performance storages.', NULL, NULL),
(90, 2, 'volume', 'a4973339-4621-4803-936b-c6818cb037ea', 'T11', 'T', '3084.29', NULL, NULL, NULL, 4096, NULL, 'Turbo performance storages.', NULL, NULL),
(91, 2, 'volume', '592215b9-1d63-451e-91b7-e18fedf6f5d5', 'U11', 'U', '1175.55', NULL, NULL, NULL, 4096, NULL, 'Ultra performance storages.', NULL, NULL),
(92, 2, 'volume', '7b98391d-1dbb-4bf2-93ee-60886e674767', 'S11', 'S', '737.28', NULL, NULL, NULL, 4096, NULL, 'Standard performance storages.', NULL, NULL),
(93, 2, 'volume', '9dbaca7a-cfbb-4eb8-8de9-b13df1771347', 'T12', 'T', '3855.36', NULL, NULL, NULL, 5120, NULL, 'Turbo performance storages.', NULL, NULL),
(94, 2, 'volume', 'f512e4f0-8bf3-44f0-950b-755356f9f330', 'U12', 'U', '1469.44', NULL, NULL, NULL, 5120, NULL, 'Ultra performance storages.', NULL, NULL),
(95, 2, 'volume', '4e4d53c3-6d42-4403-9d2d-c3b256eae23a', 'S12', 'S', '921.6', NULL, NULL, NULL, 5120, NULL, 'Standard performance storages.', NULL, NULL),
(96, 2, 'volume', 'e0355992-eb76-42e8-9f52-5cd974ab2ecb', 'T13', 'T', '4626.43', NULL, NULL, NULL, 6144, NULL, 'Turbo performance storages.', NULL, NULL),
(97, 2, 'volume', '75c49b83-d440-499b-b2ad-c6ff0487abb2', 'U13', 'U', '1763.33', NULL, NULL, NULL, 6144, NULL, 'Ultra performance storages.', NULL, NULL),
(98, 2, 'volume', 'a3615eb6-c1e3-461b-afc9-4b5c22e7d4cb', 'S13', 'S', '1105.92', NULL, NULL, NULL, 6144, NULL, 'Standard performance storages.', NULL, NULL),
(99, 3, 'lb', '16c7c770-4d28-4c8a-a1c1-2b72edfd4f9a', 'ALB-S', 'A', '29', NULL, NULL, NULL, NULL, NULL, 'ALB Standard is the best choice for Static websites and blogs with low to moderate traffic.', NULL, NULL),
(100, 3, 'lb', 'cb61c3ac-9b1b-4a14-b4d9-5d08c381e981', 'ALB-U', 'A', '49', NULL, NULL, NULL, NULL, NULL, 'ALB Ultra is the best choice for transaction-driven sites or services with moderate traffic.', NULL, NULL),
(101, 3, 'lb', 'fd4aaf34-e682-49e6-8f04-a038a8a69355', 'ALB-T', 'A', '95', NULL, NULL, NULL, NULL, NULL, 'ALB Turbo is the best choice for busy sites, services, or endpoints where high performance is a must.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'city_phone_number', '+994 12 200 0020'),
(2, 'mobile_phone_number', '+994 122 000 020'),
(3, 'email', 'sales@azcloud.az'),
(4, 'support_email', 'soc24@azintelecom.az'),
(5, 'address', 'Alibay Huseynzade 74, AZ1009, Baku, Azerbaijan'),
(6, 'google_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.2711005773235!2d49.83144801535468!3d40.380683779369335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307da2889a6453%3A0x2d4deb685609c5a5!2zNzQgxo9saWLJmXkgSMO8c2V5bnphZMmZLCBCYWvEsSwg0JDQt9C10YDQsdCw0LnQtNC20LDQvQ!5e0!3m2!1sru!2s!4v1607630178503!5m2!1sru!2s'),
(7, 'facebook_page_url', 'https://www.facebook.com/azcloud.az'),
(8, 'contact_email', 'soc24@azintelecom.az');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buy_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `buy_link`, `prices_link`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1, NULL, NULL),
(2, 'https://google.com', NULL, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE IF NOT EXISTS `slider_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slider_translations_slider_id_locale_unique` (`slider_id`,`locale`),
  KEY `slider_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'az', 'Bulud infrastrukturu', 'İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi'),
(2, 1, 'en', 'Cloud infrastructure', 'İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi'),
(3, 1, 'ru', 'Облачная инфраструктура', 'İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi'),
(4, 2, 'az', 'Another slider', 'Some description here'),
(5, 2, 'en', 'Another slider', 'Some description here'),
(6, 2, 'ru', 'Another slider', 'Some description here');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`),
  UNIQUE KEY `unique_tags_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`) VALUES
(4, 'testing', 'testing'),
(5, 'vagif', 'vagif'),
(10, 'test', 'test'),
(11, 'tag', 'tag'),
(12, 'this-is-new-tag', 'this-is-new-tag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AzCloud', 'root@azcloud.az', '$2y$10$S8CUUhjB5uHajgyB8a7uruy8E8vsAuV2oGigKgk3j7ka.oJuv3IPO', 1, NULL, '2021-01-14 12:04:55', '2021-01-14 12:04:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate_translations`
--
ALTER TABLE `certificate_translations`
  ADD CONSTRAINT `certificate_translations_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_center_translations`
--
ALTER TABLE `data_center_translations`
  ADD CONSTRAINT `data_center_translations_data_center_id_foreign` FOREIGN KEY (`data_center_id`) REFERENCES `data_centers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`);

--
-- Constraints for table `product_category_translations`
--
ALTER TABLE `product_category_translations`
  ADD CONSTRAINT `product_category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_flavors`
--
ALTER TABLE `product_flavors`
  ADD CONSTRAINT `product_flavors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `slider` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
