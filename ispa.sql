-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Sep 2024 pada 04.27
-- Versi server: 8.0.30
-- Versi PHP: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deseases`
--

CREATE TABLE `deseases` (
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_penyakit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `deseases`
--

INSERT INTO `deseases` (`kode_penyakit`, `nama_penyakit`, `detail_penyakit`, `created_at`, `updated_at`) VALUES
('P01', 'Croup', 'Croup adalah penyakit respiratorik serius pada anak-anak, umumnya menyerang usia 6 bulan hingga 3 tahun, dan jarang terjadi pada usia 3 bulan dan di atas 15 tahun. Penyebab utama croup adalah virus, dengan Human Parainfluenza Virus tipe I sebagai penyebab paling umum (75%). Virus lainnya termasuk Respiratory Syncytial Virus (RSV), metapneumovirus, virus influenza A dan B, adenovirus, dan coronavirus. Meski jarang, Mycoplasma pneumonia juga pernah ditemukan sebagai penyebab croupCroup adalah penyakit respiratorik serius pada anak-anak, umumnya menyerang usia 6 bulan hingga 3 tahun, dan jarang terjadi pada usia 3 bulan dan di atas 15 tahun. Penyebab utama croup adalah virus, dengan Human Parainfluenza Virus tipe I sebagai penyebab paling umum (75%). Virus lainnya termasuk Respiratory Syncytial Virus (RSV), metapneumovirus, virus influenza A dan B, adenovirus, dan coronavirus. Meski jarang, Mycoplasma pneumonia juga pernah ditemukan sebagai penyebab croup', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P02', 'Sinusitis Akut', 'Sinusitis akut adalah infeksi pada sinus paranasal yang berlangsung kurang dari 30 hari. Kondisi ini ditandai dengan gejala yang menetap atau memburuk dalam jangka waktu singkat. Sinusitis akut dapat menyebabkan ketidaknyamanan dan mempengaruhi kualitas hidup, namun biasanya dapat sembuh dengan pengobatan yang tepat.', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P03', 'Pertusis (Batuk Rejan)', 'Batuk rejan (pertusis) merupakan infeksi bakteri pada saluran pernapasan yang sangat menular yang disebabkan oleh Bordetella pertussis. Penyakit ini merupakan penyebab utama kesakitan dan kematian di seluruh dunia, terutama pada bayi. Bordetella parapertussis juga dapat menyebabkan penyakit yang mirip dengan pertusis, meskipun biasanya tidak seberat itu. Gejala khas pertusis meliputi serangan batuk paroksismal yang disertai dengan suara teriakan dan muntah', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P04', 'Bronchitis', 'Bronkitis merupakan salah satu alasan yang sering menyebabkan kunjungan ke dokter. Penyakit ini biasanya disebabkan oleh virus, dengan durasi sekitar 1-3 minggu, yang umumnya terjadi pada orang dewasa yang sehat dengan batuk sebagai gejala utama. Selain batuk dan produksi dahak, bronkitis akut sering kali disertai dengan gejala saluran pernapasan bagian atas', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P05', 'Pneumonia', 'Pneumonia adalah infeksi umum pada saluran pernapasan yang secara khusus mempengaruhi alveoli dan cabang-cabang bronkial terakhir di paru-paru. Infeksi ini dapat disebabkan oleh virus, bakteri, jamur, atau kombinasi dari mereka, yang mengakibatkan peradangan dan penumpukan cairan di jaringan paru-paru. Pneumonia merupakan salah satu penyebab utama tingkat keparahan dan kematian pada anak-anak di bawah usia 5 tahun secara global', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P06', 'Epiglotitis', 'Epiglotitis merupakan inflamasi pada epiglotis, struktur yang terletak di belakang lidah dan terdiri dari tulang rawan serta berbentuk seperti flap. Biasanya, kondisi ini dipicu oleh infeksi bakteri atau trauma pada tenggorokan. Epiglotis berfungsi sebagai katup yang menutup batang tenggorokan saat menelan, mencegah makanan atau cairan masuk ke saluran pernapasan. Epiglotitis merupakan kondisi darurat yang membutuhkan penanganan segera', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P07', 'Tonsilitis Akut', 'Tonsilitis adalah kondisi inflamasi pada tonsil palatina, yang merupakan bagian dari cincin Waldeyer. Penularan infeksi dapat melalui udara (airborne droplets), kontak tangan, dan juga ciuman. Tonsilitis dapat terjadi pada semua rentang usia, namun lebih sering ditemukan pada anak-anak', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P08', 'Faringitis (Radang Tenggorokan)', 'Faringitis merujuk pada infeksi atau peradangan di tenggorokan (faring), yang merupakan saluran yang menghubungkan hidung dan mulut ke paru-paru. Faringitis termasuk dalam kategori penyakit Infeksi Saluran Pernapasan Akut (ISPA), yang meliputi infeksi pada saluran pernapasan dengan durasi tidak lebih dari 14 hari. Faringitis menjadi penyebab 1-2% pasien yang mengunjungi poliklinik atau unit gawat darurat, dan diperkirakan bahwa setiap tahun terdapat 11-18 juta pasien yang mengunjungi layanan kesehatan akibat faringitis di Amerika Serikat', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P09', 'Laringitis Akut', 'Laringitis, juga dikenal sebagai peradangan pada organ laring, terjadi terutama pada pita suara. Kondisi ini ditandai dengan pembengkakan pada pita suara yang menyebabkan suara menjadi serak atau parau, sementara pembengkakan ini juga dapat mengganggu pernapasan dengan menghalangi aliran oksigen. Meskipun laringitis dapat sembuh sendiri dalam waktu 2-3 minggu, jika berlangsung lebih lama, dapat berkembang menjadi laringitis kronis. Biasanya, laringitis menyerang individu yang intens menggunakan suara mereka dalam aktivitas sehari-hari, seperti penyanyi, penyiar radio, atau MC\n', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P10', 'Asma', 'Asma adalah kondisi inflamasi kronis pada saluran napas yang melibatkan berbagai sel dan elemen di dalamnya. Inflamasi yang berkelanjutan menyebabkan peningkatan reaktivitas pada saluran napas, yang menghasilkan gejala episodik yang berulang seperti kesulitan bernapas, sensasi berat di dada, mengi, terutama terjadi pada malam hari atau siang hari', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('P11', 'Common Cold', '<p>Common cold adalah salah satu infeksi saluran pernapasan akut (ISPA) yang termasuk kategori nonspesifik atau \"flu biasa\". Penyakit ini disebabkan oleh virus dan menyerang saluran pernapasan akut, terutama hidung. Infeksi pernapasan akut yang paling banyak ditemukan adalah nasofaringitis atau common cold. Penyebabnya antara lain rhinovirus, influenza virus, adenovirus (ADV), enterovirus, dan parainfluenza viruses (PIV). Lebih dari 200 tipe rhinovirus telah ditemukan, dan infeksi ini terutama terjadi pada anak-anak di bawah usia 5 tahun.</p>', '2024-08-17 07:07:30', '2024-08-17 07:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnoses`
--

CREATE TABLE `diagnoses` (
  `diagnosis_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `kode_pengguna` bigint UNSIGNED NOT NULL,
  `alamat_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhir` double NOT NULL,
  `hasil` json NOT NULL,
  `gejala` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diagnoses`
--

INSERT INTO `diagnoses` (`diagnosis_id`, `nama_pengguna`, `age`, `kode_pengguna`, `alamat_pengguna`, `kode_penyakit`, `nilai_akhir`, `hasil`, `gejala`, `created_at`, `updated_at`) VALUES
('DGS-20240726ABC', 'rahma zahira salsabila', 3, 1, 'Kediri', 'P11', 67.8, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 24, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 43.68, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 30, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 67.80000000000001, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G21\", \"nama_gejala\": \"tidak nafsu makan sehingga memicu dehidrasi\"}]', '2024-07-26 06:18:20', '2024-07-26 06:18:20'),
('DGS-20240726BCD', 'kenzie', 4, 1, 'Kediri', 'P05', 59.4, '[{\"nilai\": 24, \"kode_penyakit\": \"P01\", \"nama_penyakit\": \"Croup\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 30, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 42, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 24, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 42, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 36.00000000000001, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G02\", \"nama_gejala\": \"suara yang serak\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G14\", \"nama_gejala\": \"batuk berlangsung selama 5 hari atau lebih\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G25\", \"nama_gejala\": \"Sesak\"}]', '2024-07-26 06:41:31', '2024-07-26 06:41:31'),
('DGS-20240726DEF', 'CEISYA LEONA SATIRA', 3, 1, 'Kediri', 'P11', 76.448, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 16.000000000000004, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 16.000000000000004, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 24, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 20, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 24, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 20, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 76.44800000000001, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:21:39', '2024-07-26 06:21:39'),
('DGS-20240726EFG', 'nadin', 3, 1, 'Kediri', 'P11', 87.28192, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 45.60000000000001, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 40, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 48, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 52, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 87.28192, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:43:53', '2024-07-26 06:43:53'),
('DGS-20240726GHI', 'najwa shakila humaira', 4, 1, 'Kediri', 'P11', 91.52128, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 20, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 20, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 91.52128, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G34\", \"nama_gejala\": \"sakit kepala\"}]', '2024-07-26 06:23:58', '2024-07-26 06:23:58'),
('DGS-20240726HIJ', 'miko', 4, 1, 'Kediri', 'P05', 68, '[{\"nilai\": 24, \"kode_penyakit\": \"P01\", \"nama_penyakit\": \"Croup\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 56.8, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 54.400000000000006, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 68, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 62, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 60, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 60, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 50, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 68, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G02\", \"nama_gejala\": \"suara yang serak\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G12\", \"nama_gejala\": \"muntah akibat rejan yang parah\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G14\", \"nama_gejala\": \"batuk berlangsung selama 5 hari atau lebih\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}]', '2024-07-26 06:52:54', '2024-07-27 04:52:54'),
('DGS-20240726JKL', 'ARSYILA', 3, 1, 'Kediri', 'P11', 98.0864, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 16.000000000000004, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 16.000000000000004, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 33.12, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 20, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 24, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 20, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 98.0864, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G21\", \"nama_gejala\": \"tidak nafsu makan sehingga memicu dehidrasi\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G34\", \"nama_gejala\": \"sakit kepala\"}]', '2024-07-26 06:27:51', '2024-07-26 06:27:51'),
('DGS-20240726MNO', 'bella', 3, 1, 'Kediri', 'P11', 95.392, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 20, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 20, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 95.392, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:29:21', '2024-07-26 06:29:21'),
('DGS-20240726PQR', 'galuh', 3, 1, 'Kediri', 'P11', 81.64992, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 24, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 30, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 81.64992, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G35\", \"nama_gejala\": \"badan terasa sakit dan tidak nyaman\"}]', '2024-07-26 06:31:13', '2024-07-26 06:31:13'),
('DGS-20240726STU', 'sachie', 3, 1, 'Kediri', 'P11', 98.1324, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 46.8, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 24, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 51, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 98.1324, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:33:02', '2024-07-26 06:33:02'),
('DGS-20240726VWX', 'fiko', 3, 1, 'Kediri', 'P11', 95.4, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 30, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 95.4, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G14\", \"nama_gejala\": \"batuk berlangsung selama 5 hari atau lebih\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:34:47', '2024-07-26 06:34:47'),
('DGS-20240726YZA', 'mecca', 4, 1, 'Kediri', 'P11', 97.696, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 52, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 40, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 60, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 50, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 60, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 60, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 60, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 97.696, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}]', '2024-07-26 06:37:36', '2024-07-26 06:37:36'),
('DGS-20240728CDE', 'hamid', 4, 1, 'Kediri', 'P11', 82, '[{\"nilai\": 66, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 40, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 72.96000000000001, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 70, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 60, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 82, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G29\", \"nama_gejala\": \"Tenggorokan Berwarna Merah\"}]', '2024-07-28 07:14:39', '2024-07-29 07:14:39'),
('DGS-20240728FGH', 'sukarman', 52, 1, 'Kediri', 'P11', 91.536, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 91.536, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G33\", \"nama_gejala\": \"bersin-bersin\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G35\", \"nama_gejala\": \"badan terasa sakit dan tidak nyaman\"}]', '2024-07-28 07:19:57', '2024-07-29 07:19:57'),
('DGS-20240728IJK', 'fathan', 12, 1, 'Kediri', 'P11', 86.2, '[{\"nilai\": 48, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 50, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 50, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 60, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 86.2, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}]', '2024-07-28 07:21:33', '2024-07-29 07:21:33'),
('DGS-20240728KLM', 'Kardi', 40, 1, 'Kediri', 'P04', 63.824, '[{\"nilai\": 63.824000000000005, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 20, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G14\", \"nama_gejala\": \"batuk berlangsung selama 5 hari atau lebih\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G15\", \"nama_gejala\": \"keluar dahak bening, kuning, hijau atau putih\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G16\", \"nama_gejala\": \"dada terasa sakit atau nyeri saat batuk\"}]', '2024-07-28 06:55:54', '2024-07-29 06:55:54'),
('DGS-20240728LMN', 'hambali', 47, 1, 'Kediri', 'P01', 92.112, '[{\"nilai\": 92.112, \"kode_penyakit\": \"P01\", \"nama_penyakit\": \"Croup\"}, {\"nilai\": 48.32000000000001, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G02\", \"nama_gejala\": \"suara yang serak\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G03\", \"nama_gejala\": \"suara batuk seperti monggong yang keras\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G04\", \"nama_gejala\": \"suara kasar bernada tinggi saat menghirup nafas\"}]', '2024-07-28 07:23:58', '2024-07-29 07:23:58'),
('DGS-20240728NOP', 'Imelda', 8, 1, 'Kediri', 'P03', 74.5856, '[{\"nilai\": 20, \"kode_penyakit\": \"P01\", \"nama_penyakit\": \"Croup\"}, {\"nilai\": 74.5856, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G01\", \"nama_gejala\": \"kesulitan bernafas\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G11\", \"nama_gejala\": \"mengeluarkan bunyi saat bernafas\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G12\", \"nama_gejala\": \"muntah akibat rejan yang parah\"}]', '2024-07-28 07:01:27', '2024-07-29 07:01:27'),
('DGS-20240728OPQ', 'febby', 5, 1, 'Kediri', 'P10', 93.504, '[{\"nilai\": 30, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 42, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 93.504, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G25\", \"nama_gejala\": \"Sesak\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G31\", \"nama_gejala\": \"Mengi, ditandai dengan suara terjepit seperti siulan ketika penderita bernapas\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G32\", \"nama_gejala\": \"Ada Riwayat Alergi\"}]', '2024-07-28 07:25:48', '2024-07-29 07:25:48'),
('DGS-20240728QRS', 'Mikyala Najwa Salsabila', 5, 1, 'Kediri', 'P02', 78.784, '[{\"nilai\": 78.784, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 20, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 54, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G05\", \"nama_gejala\": \"Bau Nafas Tidak Sedap\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G06\", \"nama_gejala\": \"Pilek Tidak Kunjung Membaik\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G07\", \"nama_gejala\": \"bernafas melalui mulut\"}]', '2024-07-28 07:04:39', '2024-07-29 07:04:39'),
('DGS-20240728TUV', 'alya', 4, 1, 'Kediri', 'P05', 92.49536, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 92.49536, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 40, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 48, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 40, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 40, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G19\", \"nama_gejala\": \"Nafas cepat\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G20\", \"nama_gejala\": \"terasa sakit pada bagian perut saat batuk\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G21\", \"nama_gejala\": \"tidak nafsu makan sehingga memicu dehidrasi\"}]', '2024-07-28 07:07:29', '2024-07-29 07:07:29'),
('DGS-20240728WXY', 'vano', 3, 1, 'Kediri', 'P07', 77.472, '[{\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 24, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 77.472, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 76.96000000000001, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 69.19999999999999, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 30, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G05\", \"nama_gejala\": \"Bau Nafas Tidak Sedap\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G26\", \"nama_gejala\": \"Nyeri Menelan\"}]', '2024-07-28 07:09:24', '2024-07-29 07:09:24'),
('DGS-20240728ZAB', 'adhanta', 4, 1, 'Kediri', 'P09', 75.36, '[{\"nilai\": 41.2, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 16.000000000000004, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 24, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 20, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 66.56, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 72.64000000000001, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 75.36, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 53.6, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G26\", \"nama_gejala\": \"Nyeri Menelan\"}]', '2024-07-28 07:11:35', '2024-07-29 07:11:35'),
('DGS-20240729ABC', 'Noor', 9, 1, 'Kediri', 'P06', 78.832, '[{\"nilai\": 56.48, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 32.00000000000001, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 78.832, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 48, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 48, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 40, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 40, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G13\", \"nama_gejala\": \"tubuh menjadi memerah dan membiru (sianosis)\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G22\", \"nama_gejala\": \"Ngiler\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G23\", \"nama_gejala\": \"Nyeri tenggorokan\"}]', '2024-07-29 07:34:33', '2024-07-29 07:34:33'),
('DGS-20240729DEF', 'ilya', 4, 1, 'Kediri', 'P04', 78.112, '[{\"nilai\": 24, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 78.11200000000001, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 53.92, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 36, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 30, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 27.999999999999996, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 30, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G15\", \"nama_gejala\": \"keluar dahak bening, kuning, hijau atau putih\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G16\", \"nama_gejala\": \"dada terasa sakit atau nyeri saat batuk\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G25\", \"nama_gejala\": \"Sesak\"}]', '2024-07-29 07:37:55', '2024-07-29 07:37:55'),
('DGS-20240729GHI', 'Nasya Safaluna', 4, 1, 'Kediri', 'P02', 93.5488, '[{\"nilai\": 93.5488, \"kode_penyakit\": \"P02\", \"nama_penyakit\": \"Sinusitis Akut\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G08\", \"nama_gejala\": \"suara terdengar sengau\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G09\", \"nama_gejala\": \"munculnya lendir berwarna kuning atau hijau dari hidung\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G10\", \"nama_gejala\": \"Nyeri Pada bagian wajah terutama ketika bertunduk\"}]', '2024-07-29 07:43:48', '2024-07-29 07:43:48'),
('DGS-20240729JKL', 'M. Alfath', 5, 1, 'Kediri', 'P03', 83.68, '[{\"nilai\": 83.67999999999999, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 20, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 27.999999999999996, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G11\", \"nama_gejala\": \"mengeluarkan bunyi saat bernafas\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G12\", \"nama_gejala\": \"muntah akibat rejan yang parah\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}]', '2024-07-29 07:45:43', '2024-07-29 07:45:43'),
('DGS-20240729MNO', 'M. Fatih Alfarizky', 4, 1, 'Kediri', 'P09', 92.8, '[{\"nilai\": 40, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 70, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 80, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 92.8, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 48, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 55.99999999999999, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G26\", \"nama_gejala\": \"Nyeri Menelan\"}, {\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G30\", \"nama_gejala\": \"Suara Serak sampai Hilang\"}]', '2024-07-29 07:46:54', '2024-07-29 07:46:54'),
('DGS-20240729UVW', 'hasby', 3, 1, 'Kediri', 'P08', 95.392, '[{\"nilai\": 39.2, \"kode_penyakit\": \"P03\", \"nama_penyakit\": \"Pertusis (Batuk Rejan)\"}, {\"nilai\": 24, \"kode_penyakit\": \"P04\", \"nama_penyakit\": \"Bronchitis\"}, {\"nilai\": 36, \"kode_penyakit\": \"P05\", \"nama_penyakit\": \"Pneumonia\"}, {\"nilai\": 30, \"kode_penyakit\": \"P06\", \"nama_penyakit\": \"Epiglotitis\"}, {\"nilai\": 71.83999999999999, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 95.392, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 75.36, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}, {\"nilai\": 24, \"kode_penyakit\": \"P10\", \"nama_penyakit\": \"Asma\"}, {\"nilai\": 49.6, \"kode_penyakit\": \"P11\", \"nama_penyakit\": \"Common Cold\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G17\", \"nama_gejala\": \"demam (suhu tubuh di atas 38 derajat Celsius)\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G18\", \"nama_gejala\": \"Batuk\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G26\", \"nama_gejala\": \"Nyeri Menelan\"}, {\"nilai_cf\": 1, \"deskripsi\": \"Sangat Sering / Selalu / Iya\", \"kode_gejala\": \"G29\", \"nama_gejala\": \"Tenggorokan Berwarna Merah\"}]', '2024-07-29 07:28:12', '2024-07-29 07:28:12'),
('DGS-20240729XYZ', 'karno', 61, 1, 'Kediri', 'P07', 87.472, '[{\"nilai\": 87.47200000000001, \"kode_penyakit\": \"P07\", \"nama_penyakit\": \"Tonsilitis Akut\"}, {\"nilai\": 48, \"kode_penyakit\": \"P08\", \"nama_penyakit\": \"Faringitis (Radang Tenggorokan)\"}, {\"nilai\": 42, \"kode_penyakit\": \"P09\", \"nama_penyakit\": \"Laringitis Akut\"}]', '[{\"nilai_cf\": 0.6, \"deskripsi\": \"Sering\", \"kode_gejala\": \"G26\", \"nama_gejala\": \"Nyeri Menelan\"}, {\"nilai_cf\": 0.8, \"deskripsi\": \"Hampir Selalu\", \"kode_gejala\": \"G27\", \"nama_gejala\": \"Ngorok Saat Tidur\"}, {\"nilai_cf\": 0.4, \"deskripsi\": \"Kadang-kadang\", \"kode_gejala\": \"G28\", \"nama_gejala\": \"Amandel Membesar\"}]', '2024-07-29 07:31:50', '2024-07-29 07:31:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indications`
--

CREATE TABLE `indications` (
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `indications`
--

INSERT INTO `indications` (`kode_gejala`, `nama_gejala`, `created_at`, `updated_at`) VALUES
('G01', 'kesulitan bernafas', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G02', 'suara yang serak', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G03', 'suara batuk seperti monggong yang keras', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G04', 'suara kasar bernada tinggi saat menghirup nafas', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G05', 'Bau Nafas Tidak Sedap', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G06', 'Pilek Tidak Kunjung Membaik', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G07', 'bernafas melalui mulut', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G08', 'suara terdengar sengau', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G09', 'munculnya lendir berwarna kuning atau hijau dari hidung', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G10', 'Nyeri Pada bagian wajah terutama ketika bertunduk', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G11', 'mengeluarkan bunyi saat bernafas', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G12', 'muntah akibat rejan yang parah', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G13', 'tubuh menjadi memerah dan membiru (sianosis)', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G14', 'batuk berlangsung selama 5 hari atau lebih', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G15', 'keluar dahak bening, kuning, hijau atau putih', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G16', 'dada terasa sakit atau nyeri saat batuk', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G17', 'demam (suhu tubuh di atas 38 derajat Celsius)', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G18', 'Batuk', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G19', 'Nafas cepat', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G20', 'terasa sakit pada bagian perut saat batuk', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G21', 'tidak nafsu makan sehingga memicu dehidrasi', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G22', 'Ngiler', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G23', 'Nyeri tenggorokan', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G24', 'Gangguan menelan', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G25', 'Sesak', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G26', 'Nyeri Menelan', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G27', 'Ngorok Saat Tidur', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G28', 'Amandel Membesar', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G29', 'Tenggorokan Berwarna Merah', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G30', 'Suara Serak sampai Hilang', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G31', 'Mengi, ditandai dengan suara terjepit seperti siulan ketika penderita bernapas', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G32', 'Ada Riwayat Alergi', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G33', 'bersin-bersin', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G34', 'sakit kepala', '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
('G35', 'badan terasa sakit dan tidak nyaman', '2024-08-17 07:07:30', '2024-08-17 07:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_12_134249_create_indications_table', 1),
(5, '2024_04_12_163641_create_deseases_table', 1),
(6, '2024_04_12_172927_create_rules_table', 1),
(7, '2024_04_18_103355_create_permission_tables', 1),
(8, '2024_04_20_034745_create_diagnoses_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-08-17 07:07:29', '2024-08-17 07:07:29'),
(2, 'user', 'web', '2024-08-17 07:07:29', '2024-08-17 07:07:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `kode_pengetahuan` bigint UNSIGNED NOT NULL,
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf_pakar` double NOT NULL,
  `mb_pakar` double NOT NULL,
  `md_pakar` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`kode_pengetahuan`, `kode_gejala`, `kode_penyakit`, `cf_pakar`, `mb_pakar`, `md_pakar`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'P01', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(2, 'G02', 'P01', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(3, 'G03', 'P01', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(4, 'G04', 'P01', 0.7, 0.8, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(5, 'G05', 'P02', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(6, 'G06', 'P02', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(7, 'G07', 'P02', 0.5, 0.5, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(8, 'G08', 'P02', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(9, 'G09', 'P02', 0.9, 0.9, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(10, 'G10', 'P02', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(11, 'G01', 'P03', 0.6, 0.7, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(12, 'G11', 'P03', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(13, 'G12', 'P03', 0.7, 0.8, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(14, 'G13', 'P03', 0.6, 0.7, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(15, 'G17', 'P03', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(16, 'G18', 'P03', 0.5, 0.5, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(17, 'G14', 'P04', 0.6, 0.7, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(18, 'G15', 'P04', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(19, 'G16', 'P04', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(20, 'G17', 'P04', 0.2, 0.3, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(21, 'G25', 'P04', 0.5, 0.5, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(22, 'G14', 'P05', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(23, 'G17', 'P05', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(24, 'G19', 'P05', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(25, 'G20', 'P05', 0.3, 0.4, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(26, 'G21', 'P05', 0.3, 0.4, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(27, 'G25', 'P05', 0.7, 0.8, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(28, 'G02', 'P06', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(29, 'G04', 'P06', 0.4, 0.5, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(30, 'G13', 'P06', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(31, 'G17', 'P06', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(32, 'G22', 'P06', 0.3, 0.4, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(33, 'G23', 'P06', 0.7, 0.8, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(34, 'G24', 'P06', 0.6, 0.7, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(35, 'G05', 'P07', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(36, 'G17', 'P07', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(37, 'G26', 'P07', 0.7, 0.7, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(38, 'G27', 'P07', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(39, 'G28', 'P07', 1, 1, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(40, 'G17', 'P08', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(41, 'G26', 'P08', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(42, 'G29', 'P08', 0.8, 0.8, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(43, 'G17', 'P09', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(44, 'G18', 'P09', 0.5, 0.6, 0.1, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(45, 'G26', 'P09', 0.7, 0.7, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(46, 'G30', 'P09', 1, 1, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(47, 'G18', 'P10', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(48, 'G25', 'P10', 0.7, 0.7, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(49, 'G31', 'P10', 0.9, 0.9, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(50, 'G32', 'P10', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(51, 'G06', 'P11', 0.9, 0.9, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(52, 'G17', 'P11', 0.5, 0.5, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(53, 'G18', 'P11', 0.7, 0.7, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(54, 'G33', 'P11', 0.9, 0.9, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(55, 'G34', 'P11', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30'),
(56, 'G35', 'P11', 0.6, 0.6, 0, '2024-08-17 07:07:30', '2024-08-17 07:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EUz3HQrlxpFQVjAcuov9eTRjTjUrjwMy1BR3srLZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkZIN3kySDNtd2I4S29sODFYRWZLajRBVlJiN2tQNk9wbGVyYVlpWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yaXdheWF0LWRpYWdub3NpcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1725164698),
('lYCFx5TEXlncQhVGoBAGQIyHqWeavl0Q5dL810LN', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV21RTHJ4MU5UU3hMNG1xRkJzTEUwNWxlSzNzSUJESVg5MGI5WU94NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1725031117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL DEFAULT '4',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 4, 'muhainun059@gmail.com', 'Kediri', '2024-08-17 07:07:29', '$2y$12$M0d6/nJbdJPX7cOGAYMOIu4PbwaGtXRI9Sues6wnTOe0x7POwsuDK', 'lV5UuclmKarp8iOfJFn5lkOVkM7UhJ5XCqiUBXueo8fEYlCqIrX6bVGluCbI', '2024-08-17 07:07:29', '2024-08-17 07:07:29'),
(2, 'user', 12, 'muhainun058@gmail.com', 'Kediri', '2024-08-17 07:07:29', '$2y$12$nIlvUmSbQiqvGFhKC/Ujr.7RhQHmGXoSns12bRlzZXpM3QCT73ALq', 'NaFdyQgNJrkSkLmOIL8wvH77j3hSt3tuJFobkhPMhZed9LXYAgnCMMxAk8rU', '2024-08-17 07:07:30', '2024-08-29 05:53:22'),
(3, 'muh ainun', 12, 'aaa@gmail.com', 'jln. diponegoro dsn. Kromasan', NULL, '$2y$12$aYI1OWo6XfoHmTCRbP2HsujOfIY8FQwQQHpHmR0z5cLDZFzQgTNpi', NULL, '2024-08-17 07:28:46', '2024-08-17 07:31:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `deseases`
--
ALTER TABLE `deseases`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indeks untuk tabel `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `diagnoses_kode_pengguna_foreign` (`kode_pengguna`),
  ADD KEY `diagnoses_kode_penyakit_foreign` (`kode_penyakit`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `indications`
--
ALTER TABLE `indications`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`kode_pengetahuan`),
  ADD KEY `rules_kode_penyakit_foreign` (`kode_penyakit`),
  ADD KEY `rules_kode_gejala_foreign` (`kode_gejala`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rules`
--
ALTER TABLE `rules`
  MODIFY `kode_pengetahuan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_kode_pengguna_foreign` FOREIGN KEY (`kode_pengguna`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `diagnoses_kode_penyakit_foreign` FOREIGN KEY (`kode_penyakit`) REFERENCES `deseases` (`kode_penyakit`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_kode_gejala_foreign` FOREIGN KEY (`kode_gejala`) REFERENCES `indications` (`kode_gejala`),
  ADD CONSTRAINT `rules_kode_penyakit_foreign` FOREIGN KEY (`kode_penyakit`) REFERENCES `deseases` (`kode_penyakit`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
