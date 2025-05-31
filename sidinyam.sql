-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2025 pada 16.19
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidinyam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('khansakhalda1604@gmail.com|127.0.0.1', 'i:1;', 1748588990),
('khansakhalda1604@gmail.com|127.0.0.1:timer', 'i:1748588990;', 1748588990);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
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
('P01', 'Demam Berdarah Dengue (DBD)', '<p>Demam Berdarah Dengue (DBD) adalah penyakit infeksi virus yang disebabkan oleh virus dengue yang masuk ke dalam tubuh manusia melalui gigitan nyamuk Aedes aegypti atau Aedes albopictus. Virus ini menyerang pembuluh darah dan sistem kekebalan tubuh, sehingga menyebabkan kebocoran pembuluh darah kapiler dan penurunan jumlah trombosit secara drastis. Proses infeksi dimulai ketika nyamuk yang telah menghisap darah seseorang yang terinfeksi virus dengue menggigit orang lain, lalu menyebarkan virus tersebut ke dalam aliran darah. Penyakit ini berkembang cepat dan dapat menyebabkan komplikasi serius seperti syok dan perdarahan internal jika tidak ditangani dengan cepat.</p>', '2025-05-21 21:42:55', '2025-05-22 01:17:58'),
('P02', 'Malaria', 'Malaria adalah penyakit menular yang disebabkan oleh parasit Plasmodium, yang ditularkan ke manusia melalui gigitan nyamuk Anopheles betina yang terinfeksi. Parasit ini masuk ke dalam aliran darah dan kemudian menyerang sel-sel hati untuk berkembang biak sebelum kembali ke aliran darah dan menginfeksi sel darah merah. Siklus infeksi ini menyebabkan gejala demam yang muncul secara berkala, bersamaan dengan menggigil, keringat berlebih, dan kelelahan. Parasit malaria merusak sel darah merah sehingga dapat menyebabkan anemia berat dan komplikasi berbahaya pada organ-organ vital.', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('P03', 'Chikungunya', 'Chikungunya merupakan penyakit virus yang ditularkan ke manusia melalui gigitan nyamuk Aedes aegypti atau Aedes albopictus yang terinfeksi virus chikungunya. Setelah virus masuk ke dalam tubuh, sistem kekebalan tubuh merespons dengan peradangan yang menyebabkan demam tinggi dan nyeri sendi parah, terutama pada tangan, kaki, dan pergelangan. Virus ini menyerang jaringan sendi dan otot sehingga menyebabkan pembengkakan dan kekakuan yang bisa berlangsung berminggu-minggu atau bahkan berbulan-bulan. Meskipun tidak menyebabkan kematian, chikungunya dapat sangat mengganggu aktivitas sehari-hari.', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('P04', 'Encephalitis', 'Encephalitis atau radang otak adalah kondisi peradangan pada jaringan otak yang disebabkan oleh infeksi virus, salah satunya adalah virus ensefalitis Jepang. Virus ini ditularkan oleh nyamuk Culex yang telah membawa virus dari hewan perantara seperti babi atau burung. Setelah masuk ke dalam tubuh manusia melalui gigitan nyamuk, virus menyebar melalui aliran darah dan menyerang sistem saraf pusat, terutama otak. Hal ini menimbulkan gejala yang sangat serius seperti kejang, kebingungan, kehilangan kesadaran, dan bahkan koma. Encephalitis merupakan kondisi yang berpotensi fatal dan memerlukan penanganan medis intensif.', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('P05', 'Zika', 'Zika adalah penyakit yang disebabkan oleh virus Zika yang ditularkan melalui gigitan nyamuk Aedes aegypti. Setelah memasuki tubuh manusia, virus ini menyebar melalui darah dan memicu respons imun yang menyebabkan demam ringan, ruam, nyeri otot, dan konjungtivitis. Zika juga memiliki kemampuan menembus sawar darah-otak dan plasenta, sehingga berisiko tinggi bagi ibu hamil karena dapat menginfeksi janin. Infeksi Zika pada kehamilan awal dapat menyebabkan mikrosefali, yaitu kelainan perkembangan otak pada bayi yang menyebabkan ukuran kepala lebih kecil dari normal.', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('P06', 'Filariasis', 'Filariasis, atau yang lebih dikenal dengan sebutan kaki gajah, merupakan penyakit parasit kronis yang disebabkan oleh cacing filaria seperti Wuchereria bancrofti. Parasit ini masuk ke dalam tubuh manusia melalui gigitan nyamuk yang membawa larva cacing tersebut. Setelah masuk ke dalam tubuh, larva berkembang dan menetap di saluran limfatik (getah bening), menyebabkan penyumbatan dan peradangan kronis. Akibatnya, bagian tubuh seperti kaki, lengan, atau alat kelamin mengalami pembengkakan ekstrem yang berlangsung lama dan bersifat progresif. Penyakit ini bersifat menahun dan dapat menyebabkan disabilitas permanen jika tidak ditangani.', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('P07', 'Demam Kuning', 'Demam Kuning adalah penyakit virus akut yang disebabkan oleh virus demam kuning dan ditularkan ke manusia melalui gigitan nyamuk Aedes aegypti yang terinfeksi. Virus ini menyerang sel-sel hati, ginjal, dan jantung, sehingga menyebabkan kerusakan organ dan gangguan fungsi sistem tubuh. Setelah infeksi, penderita akan mengalami gejala awal seperti demam, nyeri otot, dan mual, kemudian memasuki fase toksik yang lebih serius seperti penyakit kuning (ikterus), perdarahan, dan kerusakan organ. Infeksi berat dari demam kuning dapat berakibat fatal jika tidak segera mendapatkan penanganan medis.', '2025-05-21 21:42:55', '2025-05-21 21:42:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnoses`
--

CREATE TABLE `diagnoses` (
  `diagnosis_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL DEFAULT 5,
  `kode_pengguna` bigint(20) UNSIGNED NOT NULL,
  `alamat_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhir` double NOT NULL,
  `hasil` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`hasil`)),
  `gejala` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`gejala`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diagnoses`
--

INSERT INTO `diagnoses` (`diagnosis_id`, `nama_pengguna`, `age`, `kode_pengguna`, `alamat_pengguna`, `kode_penyakit`, `nilai_akhir`, `hasil`, `gejala`, `created_at`, `updated_at`) VALUES
('DGS-202505221BW', 'admin', 20, 1, 'Purwokerto', 'P02', 100, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":60},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":100},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":32.00000000000001},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":100},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":50},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":50},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":70}]', '[{\"kode_gejala\":\"G02\",\"nama_gejala\":\"Sakit kepala\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G04\",\"nama_gejala\":\"Nafsu makan menurun\",\"nilai_cf\":0,\"deskripsi\":\"Tidak Pernah Mengalami\"},{\"kode_gejala\":\"G09\",\"nama_gejala\":\"Tubuh pegal linu\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"}]', '2025-05-21 23:09:20', '2025-05-21 23:09:20'),
('DGS-20250522BTB', 'admin', 20, 1, 'Purwokerto', 'P03', 48, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":24},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":24},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":48},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":24},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":20}]', '[{\"kode_gejala\":\"G05\",\"nama_gejala\":\"Mual dan muntah\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"},{\"kode_gejala\":\"G07\",\"nama_gejala\":\"Bintik merah pada kulit\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"},{\"kode_gejala\":\"G09\",\"nama_gejala\":\"Tubuh pegal linu\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"}]', '2025-05-22 00:06:08', '2025-05-22 00:06:08'),
('DGS-20250522IAJ', 'khansa', 19, 4, 'PASIR LOR RT 003 RW 005, KARANGLEWAS', 'P01', 81.76, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":81.76},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":70},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":40},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":40},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":27.999999999999996}]', '[{\"kode_gejala\":\"G03\",\"nama_gejala\":\"Lemas dan lelah\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G06\",\"nama_gejala\":\"Tubuh merasa dingin\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"},{\"kode_gejala\":\"G07\",\"nama_gejala\":\"Bintik merah pada kulit\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G08\",\"nama_gejala\":\"Seluruh tubuh terasa sakit\",\"nilai_cf\":0,\"deskripsi\":\"Tidak Pernah Mengalami\"}]', '2025-05-22 00:53:50', '2025-05-22 00:53:50'),
('DGS-20250522NKC', 'user', 20, 2, 'Purbalingga', 'P06', 100, '[{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":0},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":40},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":24},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":50},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":100},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":90}]', '[{\"kode_gejala\":\"G13\",\"nama_gejala\":\"Otot terasa sakit dan kaku saat disentuh\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G14\",\"nama_gejala\":\"Stamina menurun\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G15\",\"nama_gejala\":\"Denyut nadi terasa lemah\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G16\",\"nama_gejala\":\"Sendi terasa nyeri terutama saat digerakkan\",\"nilai_cf\":0,\"deskripsi\":\"Tidak Pernah Mengalami\"},{\"kode_gejala\":\"G17\",\"nama_gejala\":\"Leher dan punggung terasa kaku\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"}]', '2025-05-21 22:22:25', '2025-05-21 22:22:25'),
('DGS-20250522QCU', 'user', 20, 2, 'Purbalingga', 'P02', 80, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":79.2},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":80},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":8.000000000000002},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":73.6}]', '[{\"kode_gejala\":\"G04\",\"nama_gejala\":\"Nafsu makan menurun\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G06\",\"nama_gejala\":\"Tubuh merasa dingin\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G08\",\"nama_gejala\":\"Seluruh tubuh terasa sakit\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"}]', '2025-05-21 22:21:55', '2025-05-21 22:21:55'),
('DGS-20250525C8R', 'admin', 20, 1, 'Purwokerto', 'P01', 100, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":100},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":100},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":60.8},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":100},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":100},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":83.44},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":100}]', '[{\"kode_gejala\":\"G01\",\"nama_gejala\":\"Demam\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G02\",\"nama_gejala\":\"Sakit kepala\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G03\",\"nama_gejala\":\"Lemas dan lelah\",\"nilai_cf\":0.2,\"deskripsi\":\"Tidak Yakin \\/ Tidak Tahu\"},{\"kode_gejala\":\"G04\",\"nama_gejala\":\"Nafsu makan menurun\",\"nilai_cf\":0.2,\"deskripsi\":\"Tidak Yakin \\/ Tidak Tahu\"},{\"kode_gejala\":\"G05\",\"nama_gejala\":\"Mual dan muntah\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"},{\"kode_gejala\":\"G06\",\"nama_gejala\":\"Tubuh merasa dingin\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G07\",\"nama_gejala\":\"Bintik merah pada kulit\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"}]', '2025-05-25 05:12:03', '2025-05-25 05:12:03'),
('DGS-20250525MYY', 'user', 20, 2, 'Purbalingga', 'P04', 20, '[{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":20}]', '[{\"kode_gejala\":\"G18\",\"nama_gejala\":\"Mengantuk\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G23\",\"nama_gejala\":\"jantung berdegub kencang\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"}]', '2025-05-25 05:32:55', '2025-05-25 05:32:55'),
('DGS-20250530OJ1', 'user', 20, 2, 'Purbalingga', 'P05', 99.6192, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":93.34400000000001},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":95.68},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":93.76},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":92.80000000000001},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":99.61919999999999},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":97.9056},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":88.4}]', '[{\"kode_gejala\":\"G01\",\"nama_gejala\":\"Demam\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G02\",\"nama_gejala\":\"Sakit kepala\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"},{\"kode_gejala\":\"G03\",\"nama_gejala\":\"Lemas dan lelah\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G11\",\"nama_gejala\":\"Sakit tenggorokan saat menelan\",\"nilai_cf\":0.2,\"deskripsi\":\"Tidak Yakin \\/ Tidak Tahu\"},{\"kode_gejala\":\"G14\",\"nama_gejala\":\"Stamina menurun\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G16\",\"nama_gejala\":\"Sendi terasa nyeri terutama saat digerakkan\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G20\",\"nama_gejala\":\"Mata merah\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"}]', '2025-05-30 00:18:03', '2025-05-30 00:18:03'),
('DGS-20250530ZXL', 'admin', 20, 1, 'Purwokerto', 'P05', 94, '[{\"kode_penyakit\":\"P01\",\"nama_penyakit\":\"Demam Berdarah Dengue (DBD)\",\"nilai\":81.28},{\"kode_penyakit\":\"P02\",\"nama_penyakit\":\"Malaria\",\"nilai\":80},{\"kode_penyakit\":\"P03\",\"nama_penyakit\":\"Chikungunya\",\"nilai\":32.00000000000001},{\"kode_penyakit\":\"P04\",\"nama_penyakit\":\"Encephalitis\",\"nilai\":83.808},{\"kode_penyakit\":\"P05\",\"nama_penyakit\":\"Zika\",\"nilai\":94},{\"kode_penyakit\":\"P06\",\"nama_penyakit\":\"Filariasis\",\"nilai\":40},{\"kode_penyakit\":\"P07\",\"nama_penyakit\":\"Demam Kuning\",\"nilai\":55.99999999999999}]', '[{\"kode_gejala\":\"G02\",\"nama_gejala\":\"Sakit kepala\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G07\",\"nama_gejala\":\"Bintik merah pada kulit\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"},{\"kode_gejala\":\"G08\",\"nama_gejala\":\"Seluruh tubuh terasa sakit\",\"nilai_cf\":0.4,\"deskripsi\":\"Kadang-kadang\"},{\"kode_gejala\":\"G14\",\"nama_gejala\":\"Stamina menurun\",\"nilai_cf\":0.8,\"deskripsi\":\"Hampir Selalu\"},{\"kode_gejala\":\"G18\",\"nama_gejala\":\"Mengantuk\",\"nilai_cf\":0.6,\"deskripsi\":\"Sering\"},{\"kode_gejala\":\"G19\",\"nama_gejala\":\"Mudah terangsang kejang atau kaku\",\"nilai_cf\":0.2,\"deskripsi\":\"Tidak Yakin \\/ Tidak Tahu\"},{\"kode_gejala\":\"G20\",\"nama_gejala\":\"Mata merah\",\"nilai_cf\":1,\"deskripsi\":\"Selalu \\/ Sangat Sering\"}]', '2025-05-29 23:14:46', '2025-05-29 23:14:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
('G01', 'Demam', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G02', 'Sakit kepala', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G03', 'Lemas dan lelah', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G04', 'Nafsu makan menurun', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G05', 'Mual dan muntah', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G06', 'Tubuh merasa dingin', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G07', 'Bintik merah pada kulit', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G08', 'Seluruh tubuh terasa sakit', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G09', 'Tubuh pegal linu', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G10', 'Sendi bengkak', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G11', 'Sakit tenggorokan saat menelan', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G12', 'Sakit perut', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G13', 'Otot terasa sakit dan kaku saat disentuh', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G14', 'Stamina menurun', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G15', 'Denyut nadi terasa lemah', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G16', 'Sendi terasa nyeri terutama saat digerakkan', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G17', 'Leher dan punggung terasa kaku', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G18', 'Mengantuk', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G19', 'Mudah terangsang kejang atau kaku', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G20', 'Mata merah', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G21', 'Ruam kulit', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
('G22', 'Nyeri dan pembengkakan pada area kelenjar getah bening', '2025-05-21 21:42:55', '2025-05-21 21:42:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 3);

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
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-05-21 21:42:53', '2025-05-21 21:42:53'),
(2, 'user', 'web', '2025-05-21 21:42:53', '2025-05-21 21:42:53'),
(3, 'pakar', 'web', '2025-05-21 21:42:53', '2025-05-21 21:42:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `kode_pengetahuan` bigint(20) UNSIGNED NOT NULL,
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
(1, 'G01', 'P01', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(2, 'G02', 'P01', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(3, 'G03', 'P01', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(4, 'G06', 'P01', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(5, 'G07', 'P01', 0.4, 0.4, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(6, 'G08', 'P01', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(7, 'G11', 'P01', 0, 0, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(8, 'G01', 'P02', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(9, 'G02', 'P02', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(10, 'G03', 'P02', 0.5, 0.5, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(11, 'G05', 'P02', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(12, 'G06', 'P02', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(13, 'G16', 'P02', 0.1, 0.1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(14, 'G01', 'P03', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(15, 'G04', 'P03', 0.1, 0.1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(16, 'G09', 'P03', 0.8, 0.9, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(17, 'G10', 'P03', 0, 0, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(18, 'G14', 'P03', 0.4, 0.4, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(19, 'G15', 'P03', 0, 0, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(20, 'G16', 'P03', 0.8, 0.9, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(21, 'G01', 'P04', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(22, 'G02', 'P04', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(23, 'G05', 'P04', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(24, 'G16', 'P04', 0.1, 0.1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(25, 'G17', 'P04', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(26, 'G18', 'P04', 0.2, 0.2, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(27, 'G19', 'P04', 0.4, 0.4, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(28, 'G01', 'P05', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(29, 'G02', 'P05', 0.5, 0.6, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(30, 'G03', 'P05', 0.4, 0.5, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(31, 'G12', 'P05', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(32, 'G13', 'P05', 0.5, 0.6, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(33, 'G16', 'P05', 0.6, 0.6, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(34, 'G20', 'P05', 0.9, 0.9, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(35, 'G21', 'P05', 0.6, 0.7, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(36, 'G01', 'P06', 0.7, 0.7, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(37, 'G02', 'P06', 0.5, 0.6, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(38, 'G03', 'P06', 0.4, 0.5, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(39, 'G13', 'P06', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(40, 'G16', 'P06', 0.9, 0.9, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(41, 'G21', 'P06', 0.4, 0.5, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(42, 'G22', 'P06', 0.8, 0.8, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(43, 'G01', 'P07', 1, 1, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(44, 'G02', 'P07', 0.7, 0.7, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(45, 'G04', 'P07', 0.5, 0.6, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(46, 'G05', 'P07', 0.5, 0.6, 0.1, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(47, 'G06', 'P07', 0.7, 0.7, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(48, 'G13', 'P07', 0.9, 0.9, 0, '2025-05-21 21:42:55', '2025-05-21 21:42:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dh7vuZ01BbvShRhBJ2UHGnSdar2kuHfnEoAW2jnG', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2FwTERzTXB1bVp1eDdXM1g4ZHRCVFFQdnlaM3I1SkRwQTF4SGI2WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yaXdheWF0LWRpYWdub3NpcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1748590564);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL DEFAULT 0,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `age`, `number`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 20, '085731013100', 'khansakhalda1604@gmail.com', 'Purwokerto', '2025-05-21 21:42:53', '$2y$12$.yTInl23TlCzgOUvIaWibu/daDqy4JQjgxRZy30TVp1m6TzA6./.K', '1O5PZLcvgHa4Db0LPjhw2FG81w3AFFA0qZpHkyvaL8owxDNLBPFsayL1C5Ux', '2025-05-21 21:42:54', '2025-05-21 21:42:54'),
(2, 'user', 20, '085731013101', 'khansa.khalda@mhs.unsoed.ac.id', 'Purbalingga', '2025-05-21 21:42:54', '$2y$12$tju0KaTV/8ZkiPv7aartT.nUmqSoi3HyjCJ.qoTbiXWCCNKxvJ0wi', '6eXM4BiVXFxgMONGxoyc0VGOZssndcp2oeD0amdf9Sqe9K9HwFGTeEB3CcHE', '2025-05-21 21:42:54', '2025-05-21 21:42:54'),
(3, 'pakar', 30, '081234567890', 'luvulybee@gmail.com', 'Yogyakarta', '2025-05-21 21:42:54', '$2y$12$GT8HjPVLzOILcBmsutDqmuwyOnSIKQFHJTxGhjT4Hna3bJkmoW0Gm', 'n0SeDZhcuRB8DQg8lajRENy50a2JoAC2qjhvFe2KjmD66q3tQNgSjx1EsK4p', '2025-05-21 21:42:55', '2025-05-21 21:42:55'),
(4, 'khansa', 19, '0853427272828', 'khansa@example.com', 'PASIR LOR RT 003 RW 005, KARANGLEWAS', NULL, '$2y$12$G3Nh5rm3YW.RTgSTjPYnSOiGQwj6RcJRdxhVX1GbuTffkMHL4bOSy', NULL, '2025-05-22 00:53:33', '2025-05-22 00:53:33');

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
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rules`
--
ALTER TABLE `rules`
  MODIFY `kode_pengetahuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_kode_pengguna_foreign` FOREIGN KEY (`kode_pengguna`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnoses_kode_penyakit_foreign` FOREIGN KEY (`kode_penyakit`) REFERENCES `deseases` (`kode_penyakit`) ON DELETE CASCADE;

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
