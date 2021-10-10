/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.17-MariaDB : Database - tracers
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tracers` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tracers`;

/*Table structure for table `f1` */

DROP TABLE IF EXISTS `f1`;

CREATE TABLE `f1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pt` int(11) NOT NULL DEFAULT 21019,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `f1` */

insert  into `f1`(`id`,`nim_mahasiswa`,`nama_mahasiswa`,`jenis_kelamin`,`fakultas`,`prodi`,`tahun_lulus`,`no_hp`,`kode_pt`,`email`,`created_at`,`updated_at`) values 
(1,10133088,'Fanny Yusuf','laki-laki','Ilmu Komputer','Teknik Informatika','2021','082289012006',21019,'fannyyusuf23@gmail.com','2020-12-01 03:28:09','2020-12-01 03:28:09'),
(2,10133085,'Anda','perempuan','Ilmu Komputer','Teknik Informatika','2021','082289012006',21019,'admin@gmail.com','2020-12-04 03:07:32','2020-12-04 03:07:32'),
(3,11141090,'NAZIRIN TANJUNG','LAKI-LAKI','ILMU KOMPUTER','Sistem Informasi','2017','085273733892',21121,'sfjsfbsj','2020-12-16 06:56:20','2020-12-16 06:56:20'),
(4,213,'B','perempuan','Ilmu Komputer','Teknik Informatika','2021','082289012006',21019,'andi@gmail.com','2021-01-06 23:52:36','2021-01-07 07:51:26'),
(5,161420029,'Muhammad Sendi','Laki Laki','Ilmu Komputer','Teknik Informatika','2020','081377519655',21019,'sendinoviansyah02@gmail.com','2021-03-22 05:11:53','2021-03-22 05:11:53'),
(6,161420421,'Andra','Laki Laki','Ilmu Komputer','Teknik Informatika','2020','081322336655',20191,'sendinoviansyah02@gmail.com','2021-03-22 06:37:39','2021-03-22 06:37:39');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jawaban` */

DROP TABLE IF EXISTS `jawaban`;

CREATE TABLE `jawaban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi_jawaban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jawaban` */

insert  into `jawaban`(`id`,`deskripsi_jawaban`,`id_pertanyaan`,`created_at`,`updated_at`) values 
(3,'Biaya Sendiri/Keluarga',2,'2020-11-25 08:29:22','2020-11-25 08:29:22'),
(4,'Beasiswa ADIK',2,'2020-11-25 08:31:17','2020-11-25 08:31:17'),
(5,'Beasiswa BIDIKMISI',2,'2020-11-25 08:31:47','2020-11-25 08:31:47'),
(6,'Beasiswa PPA',2,'2020-11-25 08:34:06','2020-11-25 08:34:06'),
(7,'Beasiswa AFIRMASI',2,'2020-11-25 08:34:42','2020-11-25 08:34:42'),
(8,'Beasiswa Perusahaan atau Swasta',2,'2020-11-25 08:35:14','2020-11-25 08:35:14'),
(9,'Melalui iklan di koran/majalah, brosur',9,'2020-11-25 08:39:48','2020-11-25 08:39:48'),
(10,'Lainnya, tuliskan:',2,'2020-11-26 03:23:41','2020-11-26 03:23:41'),
(11,'Ya',3,'2020-11-26 03:42:23','2020-11-26 03:42:23'),
(12,'Tidak',3,'2020-11-26 03:42:58','2020-11-26 03:42:58'),
(13,'Sangat Erat',4,'2020-11-26 03:43:29','2020-11-26 03:43:29'),
(14,'Erat',4,'2020-11-26 03:43:43','2020-11-26 03:43:43'),
(15,'Cukup Erat',4,'2020-11-26 03:43:58','2020-11-26 03:43:58'),
(16,'Kurang Erat',4,'2020-11-26 03:44:14','2020-11-26 03:44:14'),
(17,'Tidak Sama Sekali',4,'2020-11-26 03:44:30','2020-11-26 03:44:30'),
(18,'Setingkat Lebih Tinggi',5,'2020-11-26 03:44:59','2020-11-26 03:44:59'),
(19,'Tingkat yang Sama',5,'2020-11-26 03:45:13','2020-11-26 03:45:13'),
(20,'Setingkat Lebih Rendah',5,'2020-11-26 03:45:28','2020-11-26 03:45:28'),
(21,'Tidak Perlu Pendidikan Tinggi',5,'2020-11-26 03:45:52','2020-11-26 03:45:52'),
(25,'Perkuliahan',7,'2020-11-26 04:39:06','2020-11-26 04:39:06'),
(26,'Demonstrasi',7,'2020-11-26 04:40:40','2020-11-26 04:40:40'),
(27,'Partisipasi dalam proyek riset',7,'2020-11-26 04:40:55','2020-11-26 04:40:55'),
(28,'Magang',7,'2020-11-26 04:41:23','2020-11-26 04:41:23'),
(29,'Praktikum',7,'2020-11-26 04:41:39','2020-11-26 04:41:39'),
(30,'Kerja Lapangan',7,'2020-11-26 04:41:52','2020-11-26 04:41:52'),
(31,'Diskusi',7,'2020-11-26 04:42:07','2020-11-26 04:42:07'),
(35,'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',9,'2020-11-26 04:46:28','2020-11-26 04:46:28'),
(36,'Pergi ke bursa/pameran kerja',9,'2020-11-26 04:46:47','2020-11-26 04:46:47'),
(37,'Mencari lewat internet/iklan online/milis',9,'2020-11-26 04:49:48','2020-11-26 04:49:48'),
(38,'Dihubungi oleh perusahaan',9,'2020-11-26 04:50:03','2020-11-26 04:50:03'),
(39,'Menghubungi Kemenakertrans',9,'2020-11-26 04:50:16','2020-11-26 04:50:16'),
(40,'Menghubungi agen tenaga kerja komersial/swasta',9,'2020-11-26 04:50:29','2020-11-26 04:50:29'),
(41,'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',9,'2020-11-26 04:50:43','2020-11-26 04:50:43'),
(42,'Menghubungi kantor kemahasiswaan/hubungan alumni',9,'2020-11-26 04:51:04','2020-11-26 04:51:04'),
(43,'Membangun jejaring (network) sejak masih kuliah',9,'2020-11-26 04:51:19','2020-11-26 04:51:19'),
(44,'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)',9,'2020-11-26 04:51:35','2020-11-26 04:51:35'),
(45,'Membangun bisnis sendiri',9,'2020-11-26 04:52:39','2020-11-26 04:52:39'),
(46,'Melalui penempatan kerja atau magang',9,'2020-11-26 04:52:55','2020-11-26 04:52:55'),
(47,'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',9,'2020-11-26 04:53:08','2020-11-26 04:53:08'),
(48,'Lainnya:',9,'2020-11-26 04:53:21','2020-11-26 04:53:21'),
(52,'Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana',13,'2020-11-27 03:24:24','2020-11-27 03:24:24'),
(53,'Saya menikah',13,'2020-11-27 03:24:45','2020-11-27 03:24:45'),
(54,'Saya sibuk dengan keluarga dan anak-anak',13,'2020-11-27 03:25:01','2020-11-27 03:25:01'),
(55,'Saya sekarang sedang mencari pekerjaan',13,'2020-11-27 03:25:16','2020-11-27 03:25:16'),
(56,'Lainnya',13,'2020-11-27 03:25:30','2020-11-27 03:25:30'),
(57,'Tidak',14,'2020-11-27 03:31:29','2020-11-27 03:31:29'),
(58,'Tidak, tapi saya sedang menunggu hasil lamaran kerja',14,'2020-11-27 03:31:49','2020-11-27 03:31:49'),
(59,'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',14,'2020-11-27 03:32:15','2020-11-27 03:32:15'),
(60,'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',14,'2020-11-27 03:32:30','2020-11-27 03:32:30'),
(61,'Lainnya',14,'2020-11-27 03:32:53','2020-11-27 03:32:53'),
(62,'Instansi pemerintah (termasuk BUMN)',15,'2020-11-27 03:36:11','2020-11-27 03:36:11'),
(63,'Organisasi non-profit/Lembaga Swadaya Masyarakat',15,'2020-11-27 03:36:27','2020-11-27 03:36:27'),
(64,'Perusahaan swasta',15,'2020-11-27 03:36:52','2020-11-27 03:36:52'),
(65,'Wiraswasta/perusahaan sendiri',15,'2020-11-27 03:37:05','2020-11-27 03:37:05'),
(66,'Lainnya, tuliskan:',15,'2020-11-27 03:37:16','2020-11-27 03:37:16'),
(67,'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.',16,'2020-11-28 09:21:25','2020-11-28 09:21:25'),
(68,'Saya belum mendapatkan pekerjaan yang lebih sesuai.',16,'2020-11-28 09:21:40','2020-11-28 09:21:40'),
(69,'Di pekerjaan ini saya memeroleh prospek karir yang baik.',16,'2020-11-28 09:21:59','2020-11-28 09:21:59'),
(70,'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.',16,'2020-11-28 09:22:20','2020-11-28 09:22:20'),
(71,'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.',16,'2020-11-28 09:24:15','2020-11-28 09:24:15'),
(72,'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.',16,'2020-11-28 09:24:30','2020-11-28 09:24:30'),
(73,'Pekerjaan saya saat ini lebih aman/terjamin/secure',16,'2020-11-28 09:24:42','2020-11-28 09:24:42'),
(74,'Pekerjaan saya saat ini lebih menarik',16,'2020-11-28 09:25:04','2020-11-28 09:25:04'),
(75,'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.',16,'2020-11-28 09:25:18','2020-11-28 09:25:18'),
(76,'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.',16,'2020-11-28 09:25:29','2020-11-28 09:25:29'),
(77,'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.',16,'2020-11-28 09:25:45','2020-11-28 09:25:45'),
(78,'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.',16,'2020-11-28 09:26:02','2020-11-28 09:26:02'),
(79,'Lainnya:',16,'2020-11-28 09:26:16','2020-11-28 09:26:16');

/*Table structure for table `jawaban_user_details` */

DROP TABLE IF EXISTS `jawaban_user_details`;

CREATE TABLE `jawaban_user_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jawaban_user_id` int(11) NOT NULL,
  `jawaban_id` int(11) DEFAULT NULL,
  `jawaban_lain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jawaban_user_details` */

insert  into `jawaban_user_details`(`id`,`jawaban_user_id`,`jawaban_id`,`jawaban_lain`,`created_at`,`updated_at`) values 
(1,1,0,NULL,'2021-03-25 09:29:44','2021-03-25 09:29:44');

/*Table structure for table `jawaban_users` */

DROP TABLE IF EXISTS `jawaban_users`;

CREATE TABLE `jawaban_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan_ke` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jawaban_users` */

insert  into `jawaban_users`(`id`,`pertanyaan_id`,`user_id`,`ip_address`,`tindakan_ke`,`tahun`,`created_at`,`updated_at`) values 
(1,1,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(2,2,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(3,3,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(4,4,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(5,5,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(6,6,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(7,7,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(8,8,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(9,9,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(10,10,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(11,11,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(12,12,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(13,13,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(14,14,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(15,15,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(16,16,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(17,17,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(18,18,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(19,19,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(20,20,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(21,21,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(22,22,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(23,23,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44'),
(24,24,1,'::1',1,2021,'2021-03-25 09:29:44','2021-03-25 09:29:44');

/*Table structure for table `jawabans` */

DROP TABLE IF EXISTS `jawabans`;

CREATE TABLE `jawabans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi_jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jawabans` */

insert  into `jawabans`(`id`,`deskripsi_jawaban`,`pertanyaan_id`,`created_at`,`updated_at`) values 
(3,'Biaya Sendiri/Keluarga',2,'2020-11-25 08:29:22','2020-11-25 08:29:22'),
(4,'Beasiswa ADIK',2,'2020-11-25 08:31:17','2020-11-25 08:31:17'),
(5,'Beasiswa BIDIKMISI',2,'2020-11-25 08:31:47','2020-11-25 08:31:47'),
(6,'Beasiswa PPA',2,'2020-11-25 08:34:06','2020-11-25 08:34:06'),
(7,'Beasiswa AFIRMASI',2,'2020-11-25 08:34:42','2020-11-25 08:34:42'),
(8,'Beasiswa Perusahaan atau Swasta',2,'2020-11-25 08:35:14','2020-11-25 08:35:14'),
(9,'Melalui iklan di koran/majalah, brosur',9,'2020-11-25 08:39:48','2020-11-25 08:39:48'),
(10,'Lainnya, tuliskan:',2,'2020-11-26 03:23:41','2020-11-26 03:23:41'),
(11,'Ya',3,'2020-11-26 03:42:23','2020-11-26 03:42:23'),
(12,'Tidak',3,'2020-11-26 03:42:58','2020-11-26 03:42:58'),
(13,'Sangat Erat',4,'2020-11-26 03:43:29','2020-11-26 03:43:29'),
(14,'Erat',4,'2020-11-26 03:43:43','2020-11-26 03:43:43'),
(15,'Cukup Erat',4,'2020-11-26 03:43:58','2020-11-26 03:43:58'),
(16,'Kurang Erat',4,'2020-11-26 03:44:14','2020-11-26 03:44:14'),
(17,'Tidak Sama Sekali',4,'2020-11-26 03:44:30','2020-11-26 03:44:30'),
(18,'Setingkat Lebih Tinggi',5,'2020-11-26 03:44:59','2020-11-26 03:44:59'),
(19,'Tingkat yang Sama',5,'2020-11-26 03:45:13','2020-11-26 03:45:13'),
(20,'Setingkat Lebih Rendah',5,'2020-11-26 03:45:28','2020-11-26 03:45:28'),
(21,'Tidak Perlu Pendidikan Tinggi',5,'2020-11-26 03:45:52','2020-11-26 03:45:52'),
(25,'Sangat Besar',7,'2020-11-26 04:39:06','2021-03-25 02:47:48'),
(26,'Besar',7,'2020-11-26 04:40:40','2021-03-25 02:48:02'),
(27,'Cukup Besar',7,'2020-11-26 04:40:55','2021-03-25 02:48:14'),
(28,'Kurang',7,'2020-11-26 04:41:23','2021-03-25 02:48:23'),
(29,'Tidak Sama Sekali',7,'2020-11-26 04:41:39','2021-03-25 02:48:36'),
(35,'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',9,'2020-11-26 04:46:28','2020-11-26 04:46:28'),
(36,'Pergi ke bursa/pameran kerja',9,'2020-11-26 04:46:47','2020-11-26 04:46:47'),
(37,'Mencari lewat internet/iklan online/milis',9,'2020-11-26 04:49:48','2020-11-26 04:49:48'),
(38,'Dihubungi oleh perusahaan',9,'2020-11-26 04:50:03','2020-11-26 04:50:03'),
(39,'Menghubungi Kemenakertrans',9,'2020-11-26 04:50:16','2020-11-26 04:50:16'),
(40,'Menghubungi agen tenaga kerja komersial/swasta',9,'2020-11-26 04:50:29','2020-11-26 04:50:29'),
(41,'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',9,'2020-11-26 04:50:43','2020-11-26 04:50:43'),
(42,'Menghubungi kantor kemahasiswaan/hubungan alumni',9,'2020-11-26 04:51:04','2020-11-26 04:51:04'),
(43,'Membangun jejaring (network) sejak masih kuliah',9,'2020-11-26 04:51:19','2020-11-26 04:51:19'),
(44,'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)',9,'2020-11-26 04:51:35','2020-11-26 04:51:35'),
(45,'Membangun bisnis sendiri',9,'2020-11-26 04:52:39','2020-11-26 04:52:39'),
(46,'Melalui penempatan kerja atau magang',9,'2020-11-26 04:52:55','2020-11-26 04:52:55'),
(47,'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',9,'2020-11-26 04:53:08','2020-11-26 04:53:08'),
(48,'Lainnya:',9,'2020-11-26 04:53:21','2020-11-26 04:53:21'),
(52,'Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana',13,'2020-11-27 03:24:24','2020-11-27 03:24:24'),
(53,'Saya menikah',13,'2020-11-27 03:24:45','2020-11-27 03:24:45'),
(54,'Saya sibuk dengan keluarga dan anak-anak',13,'2020-11-27 03:25:01','2020-11-27 03:25:01'),
(55,'Saya sekarang sedang mencari pekerjaan',13,'2020-11-27 03:25:16','2020-11-27 03:25:16'),
(56,'Lainnya',13,'2020-11-27 03:25:30','2020-11-27 03:25:30'),
(57,'Tidak',14,'2020-11-27 03:31:29','2020-11-27 03:31:29'),
(58,'Tidak, tapi saya sedang menunggu hasil lamaran kerja',14,'2020-11-27 03:31:49','2020-11-27 03:31:49'),
(59,'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',14,'2020-11-27 03:32:15','2020-11-27 03:32:15'),
(60,'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',14,'2020-11-27 03:32:30','2020-11-27 03:32:30'),
(61,'Lainnya',14,'2020-11-27 03:32:53','2020-11-27 03:32:53'),
(62,'Instansi pemerintah (termasuk BUMN)',15,'2020-11-27 03:36:11','2020-11-27 03:36:11'),
(63,'Organisasi non-profit/Lembaga Swadaya Masyarakat',15,'2020-11-27 03:36:27','2020-11-27 03:36:27'),
(64,'Perusahaan swasta',15,'2020-11-27 03:36:52','2020-11-27 03:36:52'),
(65,'Wiraswasta/perusahaan sendiri',15,'2020-11-27 03:37:05','2020-11-27 03:37:05'),
(66,'Lainnya, tuliskan:',15,'2020-11-27 03:37:16','2020-11-27 03:37:16'),
(67,'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.',16,'2020-11-28 09:21:25','2020-11-28 09:21:25'),
(68,'Saya belum mendapatkan pekerjaan yang lebih sesuai.',16,'2020-11-28 09:21:40','2020-11-28 09:21:40'),
(69,'Di pekerjaan ini saya memeroleh prospek karir yang baik.',16,'2020-11-28 09:21:59','2020-11-28 09:21:59'),
(70,'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.',16,'2020-11-28 09:22:20','2020-11-28 09:22:20'),
(71,'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.',16,'2020-11-28 09:24:15','2020-11-28 09:24:15'),
(72,'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.',16,'2020-11-28 09:24:30','2020-11-28 09:24:30'),
(73,'Pekerjaan saya saat ini lebih aman/terjamin/secure',16,'2020-11-28 09:24:42','2020-11-28 09:24:42'),
(74,'Pekerjaan saya saat ini lebih menarik',16,'2020-11-28 09:25:04','2020-11-28 09:25:04'),
(75,'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.',16,'2020-11-28 09:25:18','2020-11-28 09:25:18'),
(76,'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.',16,'2020-11-28 09:25:29','2020-11-28 09:25:29'),
(77,'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.',16,'2020-11-28 09:25:45','2020-11-28 09:25:45'),
(78,'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.',16,'2020-11-28 09:26:02','2020-11-28 09:26:02'),
(79,'Lainnya:',16,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(80,'Pemrogroman',17,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(81,'Akuntansi',17,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(82,'AI',18,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(83,'Framework Javascript',18,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(84,'Framework PHP',18,'2020-11-28 09:26:16','2020-11-28 09:26:16'),
(85,'Sangat Besar',19,'2021-03-25 02:49:33','2021-03-25 02:49:33'),
(86,'Besar',19,'2021-03-25 02:49:51','2021-03-25 02:49:51'),
(87,'Cukup Besar',19,'2021-03-25 02:50:04','2021-03-25 02:50:04'),
(88,'Kurang',19,'2021-03-25 02:50:14','2021-03-25 02:50:14'),
(89,'Tidak Sama Sekali',19,'2021-03-25 02:50:25','2021-03-25 02:50:25'),
(90,'Sangat Besar',20,'2021-03-25 02:51:21','2021-03-25 02:51:21'),
(91,'Besar',20,'2021-03-25 02:53:14','2021-03-25 02:53:14'),
(92,'Cukup Besar',20,'2021-03-25 02:53:26','2021-03-25 02:53:26'),
(93,'Kurang',20,'2021-03-25 02:53:38','2021-03-25 02:53:38'),
(94,'Tidak Sama Sekali',20,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(95,'Sangat Besar',21,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(96,'Besar',21,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(97,'Cukup Besar',21,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(98,'Kurang',21,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(99,'Tidak Sama Sekali',21,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(100,'Sangat Besar',22,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(101,'Besar',22,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(102,'Cukup Besar',22,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(103,'Kurang',22,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(104,'Tidak Sama Sekali',22,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(105,'Sangat Besar',23,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(106,'Besar',23,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(107,'Cukup Besar',23,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(108,'Kurang',23,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(109,'Tidak Sama Sekali',23,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(110,'Sangat Besar',24,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(111,'Besar',24,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(112,'Cukup Besar',24,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(113,'Kurang',24,'2021-03-25 02:53:51','2021-03-25 02:53:51'),
(114,'Tidak Sama Sekali',24,'2021-03-25 02:53:51','2021-03-25 02:53:51');

/*Table structure for table `kuesioner_master_pertanyaans` */

DROP TABLE IF EXISTS `kuesioner_master_pertanyaans`;

CREATE TABLE `kuesioner_master_pertanyaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kuesioner_master_id` int(11) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kuesioner_master_pertanyaans` */

/*Table structure for table `kuesioner_masters` */

DROP TABLE IF EXISTS `kuesioner_masters`;

CREATE TABLE `kuesioner_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kuesioner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kuesioner_masters` */

insert  into `kuesioner_masters`(`id`,`nama_kuesioner`,`status`,`created_at`,`updated_at`) values 
(1,'Kuesioner 2021','enabled','2021-03-26 08:03:40','2021-03-26 08:03:40');

/*Table structure for table `master` */

DROP TABLE IF EXISTS `master`;

CREATE TABLE `master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_or_jawaban` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_jawaban_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `master` */

insert  into `master`(`id`,`nim_mahasiswa`,`id_pertanyaan`,`id_or_jawaban`,`sub_jawaban_us`,`created_at`,`updated_at`) values 
(328,'10133085',NULL,'9','....','2021-03-13 04:24:53','2021-03-13 04:24:53'),
(329,'10133085',NULL,'75','....','2021-03-13 04:24:53','2021-03-13 04:24:53');

/*Table structure for table `master_checks` */

DROP TABLE IF EXISTS `master_checks`;

CREATE TABLE `master_checks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_check` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `master_checks` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(3,'2020_10_03_042132_table_data',1),
(4,'2020_10_10_051707_create_table_tipe_data',1),
(10,'2014_10_12_000000_create_users_table',2),
(11,'2014_10_12_100000_create_password_resets_table',2),
(12,'2019_08_19_000000_create_failed_jobs_table',2),
(13,'2021_03_22_065305_create_roles_table',2),
(16,'2021_03_23_032334_create_pertanyaan_tipes_table',5),
(17,'2021_03_23_032503_create_tipes_table',6),
(18,'2021_03_23_034407_create_jawabans_table',7),
(19,'2021_03_23_035259_create_master_checks_table',8),
(20,'2021_03_23_040017_create_pertanyaans_table',9),
(22,'2021_03_22_083108_create_jawaban_users_table',10),
(23,'2021_03_22_083613_create_jawaban_user_details_table',11),
(24,'2021_03_25_073111_create_kuesioner_masters_table',12),
(25,'2021_03_25_073200_create_kuesioner_master_pertanyaans_table',13);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pertanyaan` */

DROP TABLE IF EXISTS `pertanyaan`;

CREATE TABLE `pertanyaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi_pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pertanyaan` */

insert  into `pertanyaan`(`id`,`deskripsi_pertanyaan`,`created_at`,`updated_at`) values 
(1,'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?','2020-11-25 07:54:08','2020-11-25 07:54:08'),
(2,'Sebutkan sumberdana dalam pembiayaan kuliah?','2020-11-25 07:54:20','2020-11-25 07:54:20'),
(3,'Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?','2020-11-25 07:54:34','2020-11-25 07:54:34'),
(4,'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?','2020-11-25 07:54:47','2020-11-25 07:54:47'),
(5,'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?','2020-11-25 07:55:00','2020-11-25 07:55:00'),
(6,'Kira-kira berapa pendapatan anda setiap bulannya?','2020-11-25 07:55:16','2020-11-25 07:55:16'),
(7,'Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?','2020-11-25 07:55:34','2020-11-25 07:55:34'),
(8,'Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan','2020-11-25 07:56:29','2020-11-25 07:56:29'),
(9,'Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu','2020-11-25 07:56:40','2020-11-25 07:56:40'),
(10,'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?','2020-11-25 07:56:54','2020-11-25 07:56:54'),
(11,'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?','2020-11-25 07:57:04','2020-11-25 07:57:04'),
(12,'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?','2020-11-25 07:57:54','2020-11-25 07:57:54'),
(13,'Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu','2020-11-25 07:58:05','2020-11-25 07:58:05'),
(14,'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17','2020-11-25 07:58:19','2020-11-25 07:58:19'),
(15,'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?','2020-11-25 07:58:29','2020-11-25 07:58:29'),
(16,'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu','2020-11-25 07:58:43','2020-11-25 07:58:43'),
(17,'Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai?','2020-11-25 07:59:28','2020-11-25 07:59:28'),
(18,'Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?','2020-11-25 07:59:39','2020-11-25 07:59:39');

/*Table structure for table `pertanyaan_tipes` */

DROP TABLE IF EXISTS `pertanyaan_tipes`;

CREATE TABLE `pertanyaan_tipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pertanyaan_tipes` */

insert  into `pertanyaan_tipes`(`id`,`pertanyaan_id`,`tipe_id`,`created_at`,`updated_at`) values 
(1,1,2,NULL,NULL),
(2,2,1,NULL,NULL),
(3,3,1,NULL,NULL),
(4,4,1,NULL,NULL),
(5,5,1,NULL,NULL),
(6,6,2,NULL,NULL),
(7,7,1,NULL,NULL),
(8,8,2,NULL,NULL),
(9,9,3,NULL,NULL),
(10,10,2,NULL,NULL),
(11,11,2,NULL,NULL),
(12,12,2,NULL,NULL),
(13,13,3,NULL,NULL),
(14,14,1,NULL,NULL),
(15,15,1,NULL,NULL),
(16,16,3,NULL,NULL),
(17,17,1,NULL,NULL),
(18,18,1,NULL,NULL),
(19,19,1,'2021-03-25 03:04:49','2021-03-25 03:04:49'),
(20,20,1,'2021-03-25 03:05:16','2021-03-25 03:05:16'),
(21,21,1,'2021-03-25 03:05:26','2021-03-25 03:05:26'),
(22,22,1,'2021-03-25 03:05:32','2021-03-25 03:05:32'),
(23,23,1,'2021-03-25 03:05:46','2021-03-25 03:05:46'),
(24,24,1,'2021-03-25 03:06:18','2021-03-25 03:06:18');

/*Table structure for table `pertanyaans` */

DROP TABLE IF EXISTS `pertanyaans`;

CREATE TABLE `pertanyaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi_pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pertanyaans` */

insert  into `pertanyaans`(`id`,`deskripsi_pertanyaan`,`status`,`created_at`,`updated_at`) values 
(1,'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?','enabled','2020-11-25 07:59:39','2021-03-25 02:32:57'),
(2,'Sebutkan sumberdana dalam pembiayaan kuliah?','enabled','2020-11-25 07:54:20','2020-11-25 07:54:20'),
(3,'Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?','enabled','2020-11-25 07:54:34','2021-03-24 09:42:27'),
(4,'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?','enabled','2020-11-25 07:54:47','2021-03-25 02:28:33'),
(5,'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?','enabled','2020-11-25 07:55:00','2021-03-25 02:33:31'),
(6,'Kira-kira berapa pendapatan anda setiap bulannya?','disabled','2020-11-25 07:55:16','2021-03-25 02:35:04'),
(7,'Menurut anda seberapa besar penekanan metode perkuliahan yang dilaksanakan di program studi anda?','enabled','2020-11-25 07:55:34','2020-11-25 07:55:34'),
(8,'Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan','enabled','2020-11-25 07:56:29','2020-11-25 07:56:29'),
(9,'Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu','enabled','2020-11-25 07:56:40','2020-11-25 07:56:40'),
(10,'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?','enabled','2020-11-25 07:56:54','2020-11-25 07:56:54'),
(11,'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?','enabled','2020-11-25 07:57:04','2020-11-25 07:57:04'),
(12,'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?','enabled','2020-11-25 07:57:54','2020-11-25 07:57:54'),
(13,'Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu','enabled','2020-11-25 07:58:05','2020-11-25 07:58:05'),
(14,'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17','enabled','2020-11-25 07:58:19','2020-11-25 07:58:19'),
(15,'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?','enabled','2020-11-25 07:58:29','2020-11-25 07:58:29'),
(16,'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu','enabled','2020-11-25 07:58:43','2020-11-25 07:58:43'),
(17,'Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai?','enabled','2020-11-25 07:59:28','2021-03-25 02:35:17'),
(18,'Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?','enabled','2020-11-25 07:59:39','2020-11-25 07:59:39'),
(19,'Menurut anda seberapa besar penekanan metode demonstrasi yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:23:38','2021-03-25 02:23:38'),
(20,'Menurut anda seberapa besar penekanan metode partisipasi dalam proyek riset yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:24:17','2021-03-25 02:24:17'),
(21,'Menurut anda seberapa besar penekanan metode magang yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:26:28','2021-03-25 02:26:28'),
(22,'Menurut anda seberapa besar penekanan metode praktikum yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:27:11','2021-03-25 02:27:11'),
(23,'Menurut anda seberapa besar penekanan metode kerja lapangan yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:27:26','2021-03-25 02:35:23'),
(24,'Menurut anda seberapa besar penekanan metode diskusi yang dilaksanakan di program studi anda?','enabled','2021-03-25 02:28:08','2021-03-25 02:28:08');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'Admin',NULL,NULL),
(2,'Alumni',NULL,NULL);

/*Table structure for table `sub_jawaban` */

DROP TABLE IF EXISTS `sub_jawaban`;

CREATE TABLE `sub_jawaban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi__jawaban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_jawaban` */

insert  into `sub_jawaban`(`id`,`deskripsi__jawaban`,`id_jawaban`,`created_at`,`updated_at`) values 
(11,'Sangat Besar',25,'2020-11-28 08:09:21','2020-11-28 08:09:21'),
(12,'Besar',25,'2020-11-28 08:12:29','2020-11-28 08:12:29'),
(13,'Cukup Besar',25,'2020-11-28 08:13:56','2020-11-28 08:13:56'),
(14,'Kurang',25,'2020-11-28 08:14:14','2020-11-28 08:14:14'),
(15,'Tidak Sama Sekali',25,'2020-11-28 08:14:33','2020-11-28 08:14:33');

/*Table structure for table `sub_pertanyaan` */

DROP TABLE IF EXISTS `sub_pertanyaan`;

CREATE TABLE `sub_pertanyaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi__pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_pertanyaan` */

insert  into `sub_pertanyaan`(`id`,`deskripsi__pertanyaan`,`id_pertanyaan`,`created_at`,`updated_at`) values 
(1,'Perkuliahan','7','2020-11-25 08:05:36','2020-11-25 08:10:20'),
(2,'Demonstrasi','7','2020-11-25 08:06:17','2020-11-25 08:07:42'),
(3,'Partisipasi dalam proyek riset','7','2020-11-25 08:06:50','2020-11-25 08:07:36'),
(4,'Magang','7','2020-11-25 08:07:25','2020-11-25 08:07:25'),
(5,'Praktikum','7','2020-11-25 08:10:53','2020-11-25 08:10:53'),
(6,'Kerja Lapangan','7','2020-11-25 08:11:13','2020-11-25 08:11:13'),
(7,'Diskusi','7','2020-11-25 08:11:31','2020-11-25 08:11:31');

/*Table structure for table `table_tipe_data` */

DROP TABLE IF EXISTS `table_tipe_data`;

CREATE TABLE `table_tipe_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desk_tipe_soal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_tipe_data` */

insert  into `table_tipe_data`(`id`,`desk_tipe_soal`,`id_pertanyaan`,`created_at`,`updated_at`) values 
(1,'Radio_Input','1','2020-11-25 08:15:45','2020-11-25 08:30:12'),
(2,'Radio_lain','2','2020-11-25 08:16:10','2020-11-25 08:16:10'),
(3,'Radio','3','2020-11-25 08:16:19','2020-11-25 08:16:19'),
(4,'Radio','4','2020-11-25 08:16:37','2020-11-25 08:16:37'),
(5,'Radio','5','2020-11-25 08:16:49','2020-11-25 08:16:49'),
(6,'Input','6','2020-11-25 08:17:19','2020-11-25 08:17:19'),
(7,'Radio_sub','7','2020-11-25 08:18:29','2020-11-28 08:04:26'),
(8,'Radio_Input','8','2020-11-25 08:19:32','2020-11-25 08:19:32'),
(9,'CheckBox','9','2020-11-25 08:19:49','2020-11-25 08:41:13'),
(10,'Input','10','2020-11-25 08:20:12','2020-11-27 09:48:12'),
(11,'Input','11','2020-11-25 08:20:32','2020-11-27 09:48:31'),
(12,'Input','12','2020-11-25 08:20:44','2020-11-27 09:48:36'),
(13,'CheckBox','13','2020-11-25 08:22:16','2020-11-25 08:22:16'),
(14,'Radio_lain','14','2020-11-25 08:22:46','2020-11-25 08:22:46'),
(15,'Radio_lain','15','2020-11-25 08:22:56','2020-11-25 08:22:56'),
(16,'CheckBox','16','2020-11-25 08:23:19','2020-11-25 08:23:19'),
(17,'Radio','17','2020-11-25 08:23:46','2020-11-25 08:23:46'),
(18,'Radio','18','2020-11-25 08:23:57','2020-11-25 08:23:57');

/*Table structure for table `tipes` */

DROP TABLE IF EXISTS `tipes`;

CREATE TABLE `tipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipes` */

insert  into `tipes`(`id`,`nama_tipe`,`created_at`,`updated_at`) values 
(1,'Radio','2021-03-23 10:36:45','2021-03-23 10:36:49'),
(2,'Input','2021-03-23 10:36:52','2021-03-23 10:36:54'),
(3,'Checkbox','2021-03-23 10:36:55','2021-03-23 10:36:57');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Sendi','sendinoviansyah02@gmail.com',NULL,'$2y$10$dzH1.zG4okWhgO.3WwQTTOBYVZcPxs3Ng/aV1yM1H32M3deb645Qq',1,NULL,'2021-03-22 07:38:25','2021-03-22 07:38:25'),
(2,'Tes','tes@gmail.com',NULL,'$2y$10$BnnmpdliA6XPJXCelQPN5.OCcl/USfBLIJ3LpuKE27AL8Ixlb7.mK',0,NULL,'2021-03-22 07:39:46','2021-03-22 07:39:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
