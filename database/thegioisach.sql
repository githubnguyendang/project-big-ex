-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 10:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thegioisach`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 'Văn Học', 'van-hoc', 0, '2021-06-09 14:23:13', '2021-06-09 14:23:13'),
(4, 'Kinh Tế', 'kinh-te', 0, '2021-06-09 15:04:13', '2021-06-09 15:04:13'),
(5, 'Tiểu thuyết', 'tieu-thuyet', 3, '2021-06-09 16:24:31', '2021-06-09 16:24:31'),
(6, 'Quản trị - Lãnh đạo', 'quan-tri-lanh-dao', 4, '2021-06-09 16:31:18', '2021-06-09 16:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `code_sale`
--

CREATE TABLE `code_sale` (
  `code_id` int(10) UNSIGNED NOT NULL,
  `code_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `pro_image` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `pro_image`, `image`, `created_at`, `updated_at`) VALUES
(19, 2, '119061524_3094742157322054_2800480844395665804_o_1_1.jpg', '2021-06-09 14:25:59', '2021-06-09 14:25:59'),
(20, 2, 'bia1_tobinhyen_2_1_1.jpg', '2021-06-09 14:25:59', '2021-06-09 14:25:59'),
(21, 2, 'to_binh_yen_ve_hanh_phuc_tai_ban_2021_2_2021_05_14_11_20_46.jpg', '2021-06-09 14:25:59', '2021-06-09 14:25:59'),
(22, 3, 'nha-gia-kim1.jpg', '2021-06-09 14:30:54', '2021-06-09 14:30:54'),
(23, 3, 'nha-gia-kim2.jpg', '2021-06-09 14:30:54', '2021-06-09 14:30:54'),
(24, 5, 'toi-thay-hoa-vang-tren-co-xanh1.jpg', '2021-06-09 15:02:56', '2021-06-09 15:02:56'),
(25, 5, 'toi-thay-hoa-vang-tren-co-xanh2.jpg', '2021-06-09 15:02:56', '2021-06-09 15:02:56'),
(26, 5, 'toi-thay-hoa-vang-tren-co-xanh3.jpg', '2021-06-09 15:02:56', '2021-06-09 15:02:56'),
(27, 6, 'day-con-lam-giau1.jpg', '2021-06-09 15:06:10', '2021-06-09 15:06:10'),
(28, 6, 'day-con-lam-giau2.jpg', '2021-06-09 15:06:10', '2021-06-09 15:06:10'),
(29, 6, 'day-con-lam-giau3.jpg', '2021-06-09 15:06:10', '2021-06-09 15:06:10'),
(30, 6, 'day-con-lam-giau4.jpg', '2021-06-09 15:06:10', '2021-06-09 15:06:10'),
(31, 7, 'nha-lanh-dao-khong-chuc-danh1.jpg', '2021-06-09 15:12:30', '2021-06-09 15:12:30'),
(32, 7, 'nha-lanh-dao-khong-chuc-danh2.jpg', '2021-06-09 15:12:30', '2021-06-09 15:12:30'),
(33, 7, 'nha-lanh-dao-khong-chuc-danh3.jpg', '2021-06-09 15:12:30', '2021-06-09 15:12:30'),
(34, 7, 'nha-lanh-dao-khong-chuc-danh4.jpg', '2021-06-09 15:12:30', '2021-06-09 15:12:30'),
(35, 8, 'tam-ly-hoc-dau-tu-chung-khoan1.png', '2021-06-09 16:00:04', '2021-06-09 16:00:04'),
(36, 8, 'tam-ly-hoc-dau-tu-chung-khoan2.jpg', '2021-06-09 16:00:04', '2021-06-09 16:00:04'),
(37, 8, 'tam-ly-hoc-dau-tu-chung-khoan3.jpg', '2021-06-09 16:00:04', '2021-06-09 16:00:04'),
(38, 8, 'tam-ly-hoc-dau-tu-chung-khoan4.jpg', '2021-06-09 16:00:04', '2021-06-09 16:00:04'),
(39, 9, 'economix1.jpg', '2021-06-09 16:17:04', '2021-06-09 16:17:04'),
(40, 9, 'economix2.jpg', '2021-06-09 16:17:04', '2021-06-09 16:17:04'),
(41, 10, 'dau-chan-tren-cat1.jpg', '2021-06-09 16:30:01', '2021-06-09 16:30:01'),
(42, 10, 'dau-chan-tren-cat2.jpg', '2021-06-09 16:30:01', '2021-06-09 16:30:01'),
(43, 10, 'dau-chan-tren-cat3.jpg', '2021-06-09 16:30:01', '2021-06-09 16:30:01'),
(44, 11, 'nghe-thuat-lanh-dao-d-trump1.jpg', '2021-06-09 16:34:28', '2021-06-09 16:34:28'),
(45, 11, 'nghe-thuat-lanh-dao-d-trump2.jpg', '2021-06-09 16:34:28', '2021-06-09 16:34:28'),
(46, 11, 'nghe-thuat-lanh-dao-d-trump3.jpg', '2021-06-09 16:34:28', '2021-06-09 16:34:28'),
(47, 11, 'nghe-thuat-lanh-dao-d-trump4.jpg', '2021-06-09 16:34:28', '2021-06-09 16:34:28'),
(48, 11, 'nghe-thuat-lanh-dao-d-trump5.jpg', '2021-06-09 16:34:28', '2021-06-09 16:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `key_word`
--

CREATE TABLE `key_word` (
  `key_id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_word`
--

INSERT INTO `key_word` (`key_id`, `key_name`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Đắc nhân tâm', 1, '2021-06-10 09:57:37', '2021-06-10 09:57:37'),
(2, 'Văn học', 2, '2021-06-10 09:57:49', '2021-06-16 07:50:14'),
(3, 'Dấu chân trên cát', 1, '2021-06-16 07:50:31', '2021-06-16 07:50:31'),
(4, 'Nhà lãnh đạo không chức danh', 1, '2021-06-16 07:50:55', '2021-06-16 07:50:55'),
(5, 'Tôi thấy hoa vàng trên cỏ', 1, '2021-06-16 07:51:16', '2021-06-16 07:51:16');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_11_023711_create_category_table', 1),
(5, '2020_12_11_031907_create_products_table', 2),
(6, '2020_12_15_071254_create_slider_table', 3),
(7, '2020_12_17_160559_create_product_category_table', 4),
(8, '2020_12_19_124821_create_code_sale_table', 5),
(9, '2020_12_19_161409_create_order_table', 6),
(10, '2020_12_19_161512_create_order_detaii_table', 7),
(11, '2020_12_21_083240_create_post_table', 8),
(12, '2020_12_25_191858_create_key_word_table', 9),
(13, '2020_12_28_195609_create_roles_table', 10),
(14, '2020_12_28_195709_create_users_roles_table', 10),
(15, '2020_12_28_200456_create_users_roles_table', 11),
(16, '2020_12_28_202135_create_users_roles_table', 12),
(17, '2020_12_29_001855_create_permission_table', 13),
(18, '2020_12_29_002011_create_permission_role_table', 13),
(19, '2021_01_06_084628_create_image_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `name`, `email`, `phone`, `tinh`, `huyen`, `xa`, `address`, `note`, `pay`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CHau', 'abc@abc.com', '0346907243', 'YB', 'AC', 'A', 'Phố 2 TP Hà Nội', 'ABC', '2', 1, '2021-06-10 09:56:12', '2021-06-10 09:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_detail` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `product_id`, `price`, `quantity`, `order_detail`, `created_at`, `updated_at`) VALUES
(1, 2, 78000, 1, 1, '2021-06-10 09:56:12', '2021-06-10 09:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_id`, `per_name`, `display_name`) VALUES
(1, 'producter', 'Kiểm duyệt sản phẩm'),
(2, 'writer', 'Content bài viết'),
(3, 'order', 'Kiểm duyệt đơn hàng'),
(4, 'user', 'Quản lý user'),
(5, 'slider', 'Quản lý Slider'),
(6, 'keyword', 'Quản lý Keyword'),
(7, 'post', 'Quản lý bài viết');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_role_id` int(10) UNSIGNED NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `id_per` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_role_id`, `id_role`, `id_per`) VALUES
(32, 8, 1),
(33, 8, 2),
(34, 8, 3),
(35, 8, 4),
(36, 8, 5),
(37, 8, 6),
(38, 8, 7),
(41, 13, 7),
(42, 14, 1),
(43, 15, 4),
(44, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_cate` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_sdescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_sale` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `pro_done` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_cate`, `pro_name`, `pro_author`, `pro_slug`, `pro_thumbnail`, `pro_description`, `pro_sdescription`, `pro_price`, `pro_sale`, `status`, `pro_done`, `views`, `created_at`, `updated_at`) VALUES
(2, 3, 'Tô Bình Yên Vẽ Hạnh Phúc (Tái Bản 2021)', 'Kulzsc', 'to-binh-yen-ve-hanh-phuc-tai-ban-2021', 'bia1_tobinhyen_1_1_1_1.jpg', '<p>T&ocirc; B&igrave;nh Y&ecirc;n Vẽ Hạnh Ph&uacute;c</p>\r\n\r\n<p>Sau th&agrave;nh c&ocirc;ng của cuốn s&aacute;ch đầu tay &ldquo;Phải l&ograve;ng với c&ocirc; đơn&rdquo; ch&agrave;ng họa sĩ nổi tiếng v&agrave; t&agrave;i năng Kulzsc đ&atilde; trở lại với một cuốn s&aacute;ch v&ocirc; c&ugrave;ng đặc biệt mang t&ecirc;n: &quot;T&ocirc; b&igrave;nh y&ecirc;n - vẽ hạnh ph&uacute;c&rdquo; &ndash;&nbsp; sắc n&eacute;t phong c&aacute;ch c&aacute; nh&acirc;n với một ch&uacute;t &ldquo;thơ thẩn, rất hiền&rdquo;.</p>\r\n\r\n<p>Kh&ocirc;ng giống với những cuốn s&aacute;ch chỉ để đọc, &ldquo;T&ocirc; b&igrave;nh y&ecirc;n &ndash; vẽ hạnh ph&uacute;c&rdquo; &nbsp;l&agrave; một cuốn s&aacute;ch m&agrave; độc giả vừa t&igrave;m được &ldquo;Hạnh ph&uacute;c to to từ những điều nho nhỏ&rdquo; vừa được thực h&agrave;nh ngay lập tức. Một sự kết hợp mới lạ đầy th&uacute; vị giữa thể loại s&aacute;ch tản văn v&agrave; s&aacute;ch t&ocirc; m&agrave;u.</p>\r\n\r\n<p>Lật mở cuốn s&aacute;ch n&agrave;y, bạn sẽ thấy v&ocirc; v&agrave;n những điều nhỏ b&eacute; dễ thương lan t&ograve;a nguồn năng lượng t&iacute;ch cực. V&agrave; k&egrave;m theo một list những điều tuyệt vời khiến bạn kh&ocirc;ng thể bỏ lỡ:</p>\r\n\r\n<p>- Tận t&igrave;nh chỉ dẫn: 8 hướng dẫn t&ocirc; m&agrave;u đầy hứng th&uacute; từ Kulzsc<br />\r\n- Tranh vẽ đơn giản, gần gũi. N&eacute;t vẽ đ&aacute;ng y&ecirc;u, dễ thương<br />\r\n- Chủ đề xoay quanh những điều b&igrave;nh y&ecirc;n trong cuộc sống: Đọc s&aacute;ch, đi dạo, dọn dẹp nh&agrave; cửa, trồng c&acirc;y, ăn cơm mẹ nấu, nghe một bản nhạc hay, v&agrave; nghĩ về nụ cười của một ai đ&oacute;&hellip;<br />\r\n- Mỗi bức tranh lại l&agrave; những lời thủ thỉ, t&acirc;m t&igrave;nh của t&aacute;c giả. L&agrave; những điều nhắn gửi nho nhỏ mong bạn bớt đi những xao động:</p>\r\n\r\n<p>&ldquo;Em chọn hạnh ph&uacute;c<br />\r\nEm chọn b&igrave;nh y&ecirc;n<br />\r\nEm chọn b&ecirc;n cạnh<br />\r\nNhững điều an y&ecirc;n&rdquo;</p>\r\n\r\n<p>Hay đơn giản l&agrave; những gi&atilde;i b&agrave;y ngắn gọn, thay nỗi l&ograve;ng của một ai đ&oacute;: &quot;Tớ biết cậu một m&igrave;nh vẫn ổn, nhưng c&oacute; những chuyện, c&oacute; ai đ&oacute; c&ugrave;ng l&agrave;m, vẫn hơn.&quot;</p>\r\n\r\n<p><br />\r\nTh&ocirc;ng qua những h&igrave;nh vẽ đang đợi được lấp đầy bằng mu&ocirc;n v&agrave;n sắc m&agrave;u ấy, Kulzsc sẽ gi&uacute;p bạn - những người lớn c&ocirc; đơn, những ai đang cần bổ sung vitamin hạnh ph&uacute;c &ldquo;truy t&igrave;m&rdquo; những niềm vui bị bỏ qu&ecirc;n hay tuyệt chi&ecirc;u để đối ph&oacute; với stress.</p>\r\n\r\n<p>Bởi t&ocirc; m&agrave;u l&agrave; một h&igrave;nh thức chữa l&agrave;nh đơn giản m&agrave; hiệu quả, n&ecirc;n mỗi khi thấy bực dọc, ch&aacute;n nản, hay khiến m&igrave;nh bận rộn hơn h&atilde;y thử t&igrave;m tới &ldquo;T&ocirc; b&igrave;nh y&ecirc;n - &nbsp;vẽ hạnh ph&uacute;c&rdquo; c&ugrave;ng hộp m&agrave;u đ&atilde; cất l&acirc;u trong tủ v&agrave;... Sao kh&ocirc;ng thể l&agrave; một đ&aacute;m m&acirc;y m&agrave;u t&iacute;m, một m&aacute;i t&oacute;c v&agrave;ng tươi hay một nụ hoa m&agrave;u xanh biển nhỉ? Kh&ocirc;ng cần phải đắn đo đ&acirc;u, bạn cứ thoải m&aacute;i x&oacute;a đi căng thẳng, x&oacute;a đi những gam m&agrave;u u &aacute;m, tự tay m&igrave;nh điểm t&ocirc; những m&agrave;u sắc tươi s&aacute;ng lấp l&aacute;nh, đầy ắp hy vọng theo &yacute; th&iacute;ch, tận hưởng những ph&uacute;t thư gi&atilde;n thật b&igrave;nh y&ecirc;n kh&ocirc;ng muộn phiền th&ocirc;i n&agrave;o.</p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p>T&ocirc; B&igrave;nh Y&ecirc;n Vẽ Hạnh Ph&uacute;c - Sau th&agrave;nh c&ocirc;ng của cuốn s&aacute;ch đầu tay &ldquo;Phải l&ograve;ng với c&ocirc; đơn&rdquo; ch&agrave;ng họa sĩ nổi tiếng v&agrave; t&agrave;i năng Kulzsc đ&atilde; trở lại với một cuốn s&aacute;ch v&ocirc; c&ugrave;ng đặc biệt mang t&ecirc;n: &quot;T&ocirc; b&igrave;nh y&ecirc;n - vẽ hạnh ph&uacute;c&rdquo; &ndash;&nbsp; sắc n&eacute;t phong c&aacute;ch c&aacute; nh&acirc;n với một ch&uacute;t &ldquo;thơ thẩn, rất hiền&rdquo;.</p>', 78000, NULL, 0, 1, 6, '2021-06-09 14:25:59', '2021-06-16 08:00:10'),
(3, 5, 'Nhà Giả Kim (Tái Bản 2020)', 'Paulo Coelho', 'nha-gia-kim-tai-ban-2020', 'nha-gia-kim.jpg', '<p><em>Tất cả những trải nghiệm trong chuyến phi&ecirc;u du theo đuổi vận mệnh của m&igrave;nh đ&atilde; gi&uacute;p Santiago thấu hiểu được &yacute; nghĩa s&acirc;u xa nhất của hạnh ph&uacute;c, h&ograve;a hợp với vũ trụ v&agrave; con người</em>.&nbsp;</p>\r\n\r\n<p>Tiểu thuyết&nbsp;<em>Nh&agrave; giả kim&nbsp;</em>của Paulo Coelho như một c&acirc;u chuyện cổ t&iacute;ch giản dị, nh&acirc;n &aacute;i, gi&agrave;u chất thơ, thấm đẫm những minh triết huyền b&iacute; của phương Đ&ocirc;ng. Trong lần xuất bản đầu ti&ecirc;n tại Brazil v&agrave;o năm 1988, s&aacute;ch chỉ b&aacute;n được 900 bản. Nhưng, với số phận đặc biệt của cuốn s&aacute;ch d&agrave;nh cho to&agrave;n nh&acirc;n loại, vượt ra ngo&agrave;i bi&ecirc;n giới quốc gia,&nbsp;<em>Nh&agrave; giả kim&nbsp;</em>đ&atilde; l&agrave;m rung động h&agrave;ng triệu t&acirc;m hồn, trở th&agrave;nh một trong những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại, v&agrave; c&oacute; thể l&agrave;m thay đổi cuộc đời người đọc.</p>\r\n\r\n<p>&ldquo;Nhưng nh&agrave; luyện kim đan kh&ocirc;ng quan t&acirc;m mấy đến những điều ấy. &Ocirc;ng đ&atilde; từng thấy nhiều người đến rồi đi, trong khi ốc đảo v&agrave; sa mạc vẫn l&agrave; ốc đảo v&agrave; sa mạc. &Ocirc;ng đ&atilde; thấy vua ch&uacute;a v&agrave; kẻ ăn xin đi qua biển c&aacute;t n&agrave;y, c&aacute;i biển c&aacute;t thường xuy&ecirc;n thay h&igrave;nh đổi dạng v&igrave; gi&oacute; thổi nhưng vẫn m&atilde;i m&atilde;i l&agrave; biển c&aacute;t m&agrave; &ocirc;ng đ&atilde; biết từ thuở nhỏ. Tuy vậy, tự đ&aacute;y l&ograve;ng m&igrave;nh, &ocirc;ng kh&ocirc;ng thể kh&ocirc;ng cảm thấy vui trước hạnh ph&uacute;c của mỗi người lữ kh&aacute;ch, sau bao ng&agrave;y chỉ c&oacute; c&aacute;t v&agrave;ng với trời xanh nay được thấy ch&agrave; l&agrave; xanh tươi hiện ra trước mắt. &lsquo;C&oacute; thể Thượng đế tạo ra sa mạc chỉ để cho con người biết qu&yacute; trọng c&acirc;y ch&agrave; l&agrave;,&rsquo; &ocirc;ng nghĩ.&rdquo;</p>\r\n\r\n<p>- Tr&iacute;ch&nbsp;<em>Nh&agrave; giả kim</em></p>\r\n\r\n<p><strong>Nhận định</strong></p>\r\n\r\n<p>&ldquo;Sau Garcia M&aacute;rquez, đ&acirc;y l&agrave; nh&agrave; văn Mỹ Latinh được đọc nhiều nhất thế giới.&rdquo;&nbsp;<em>- The Economist</em>, London, Anh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;Santiago c&oacute; khả năng cảm nhận bằng tr&aacute;i tim như&nbsp;<em>Ho&agrave;ng tử b&eacute;</em>&nbsp;của Saint-Exup&eacute;ry.&rdquo;&nbsp;<em>- Frankfurter Allgemeine Zeitung, Đức</em></p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p>Tiểu thuyết&nbsp;<em>Nh&agrave; giả kim&nbsp;</em>của Paulo Coelho như một c&acirc;u chuyện cổ t&iacute;ch giản dị, nh&acirc;n &aacute;i, gi&agrave;u chất thơ, thấm đẫm những minh triết huyền b&iacute; của phương Đ&ocirc;ng. Trong lần xuất bản đầu ti&ecirc;n tại Brazil v&agrave;o năm 1988, s&aacute;ch chỉ b&aacute;n được 900 bản. Nhưng, với số phận đặc biệt của cuốn s&aacute;ch d&agrave;nh cho to&agrave;n nh&acirc;n loại, vượt ra ngo&agrave;i bi&ecirc;n giới quốc gia,&nbsp;<em>Nh&agrave; giả kim&nbsp;</em>đ&atilde; l&agrave;m rung động h&agrave;ng triệu t&acirc;m hồn, trở th&agrave;nh một trong những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại, v&agrave; c&oacute; thể l&agrave;m thay đổi cuộc đời người đọc.</p>', 79000, 65800, 0, 0, 4, '2021-06-09 14:30:54', '2021-06-10 04:40:45'),
(4, 3, '999 Lá Thư Gửi Cho Chính Mình - Mong Bạn Trở Thành Phiên Bản Hoàn Hảo Nhất (Tái Bản 2020)', 'Miêu Công Tử', '999-la-thu-gui-cho-chinh-minh-mong-ban-tro-thanh-phien-ban-hoan-hao-nhat-tai-ban-2020', 'image_195509_1_34373.jpg', '<p>&ldquo;999 l&aacute; thư gửi cho ch&iacute;nh m&igrave;nh&rdquo; l&agrave; một t&aacute;c phẩm đặc biệt đầy cảm hứng đến từ t&aacute;c giả văn học mạng nổi tiếng Mi&ecirc;u C&ocirc;ng Tử, mang một m&agrave;u sắc ri&ecirc;ng biệt qua những lời thư nhỏ nhắn nhủ đến người đọc về gi&aacute; trị cuộc sống, t&igrave;nh y&ecirc;u, tuổi trẻ, tương lai&hellip; v.v.. đ&atilde; l&agrave;m lay động tr&aacute;i tim của h&agrave;ng vạn độc giả trẻ. Cầm tr&ecirc;n tay cuốn s&aacute;ch &ldquo;999 l&aacute; thư gửi cho ch&iacute;nh m&igrave;nh&rdquo; &ndash; bạn sẽ hiểu rằng: tuổi trẻ của ch&uacute;ng ta d&ugrave; c&oacute; mong manh đến đ&acirc;u th&igrave; cũng sẽ th&agrave;nh c&ocirc;ng vượt qua mọi kh&oacute; khăn một c&aacute;ch mạnh mẽ ngo&agrave;i sức tưởng tượng. Một ng&agrave;y n&agrave;o đ&oacute;, bạn sẽ cảm nhận được hạnh ph&uacute;c, tự tin của ch&iacute;nh bản th&acirc;n v&agrave; học được c&aacute;ch mỉm cười trước những nỗi đau của qu&aacute; khứ. Bạn sẽ biết c&aacute;ch n&oacute;i lời cảm ơn với những ai đ&atilde; rời bỏ bạn, hiểu ra rằng họ kh&ocirc;ng phải người th&iacute;ch hợp để c&ugrave;ng đồng h&agrave;nh với bạn tr&ecirc;n đoạn đường ch&ocirc;ng gai đi tới tương lai. Đ&ocirc;i l&uacute;c bạn c&oacute; thể yếu đuối mỏi mệt rơi nước mắt, thế nhưng khi bất chợt nh&igrave;n lại, bạn sẽ thấy th&igrave; ra m&igrave;nh đ&atilde; rất mạnh mẽ, dũng cảm đi hết cả một qu&atilde;ng đường d&agrave;i.</p>\r\n\r\n<p>&ldquo;999 l&aacute; thư gửi cho ch&iacute;nh m&igrave;nh&rdquo; &ndash; Mong bạn trở th&agrave;nh phi&ecirc;n bản ho&agrave;n hảo nhất. C&aacute;i gọi l&agrave; vẻ đẹp nội t&acirc;m lu&ocirc;n lu&ocirc;n tốt hơn vẻ bề ngo&agrave;i h&agrave;o nho&aacute;ng, hy vọng bạn sẽ m&atilde;i lu&ocirc;n ki&ecirc;n cường, dũng cảm đứng ở nơi &aacute;nh s&aacute;ng chiếu rọi, sống tốt một cuộc sống m&agrave; m&igrave;nh hằng mong ước.</p>', '<p>&ldquo;999 l&aacute; thư gửi cho ch&iacute;nh m&igrave;nh&rdquo; &ndash; Mong bạn trở th&agrave;nh phi&ecirc;n bản ho&agrave;n hảo nhất. C&aacute;i gọi l&agrave; vẻ đẹp nội t&acirc;m lu&ocirc;n lu&ocirc;n tốt hơn vẻ bề ngo&agrave;i h&agrave;o nho&aacute;ng, hy vọng bạn sẽ m&atilde;i lu&ocirc;n ki&ecirc;n cường, dũng cảm đứng ở nơi &aacute;nh s&aacute;ng chiếu rọi, sống tốt một cuộc sống m&agrave; m&igrave;nh hằng mong ước.</p>', 99000, NULL, 0, 0, 1, '2021-06-09 14:56:13', '2021-06-10 03:41:18'),
(5, 3, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh (Bản In Mới - 2018)', 'Nguyễn Nhật Ánh', 'toi-thay-hoa-vang-tren-co-xanh-ban-in-moi-2018', 'toi-thay-hoa-vang-tren-co-xanh.jpg', '<p>Những c&acirc;u chuyện nhỏ xảy ra ở một ng&ocirc;i l&agrave;ng nhỏ: chuyện người, chuyện c&oacute;c, chuyện ma, chuyện c&ocirc;ng ch&uacute;a v&agrave; ho&agrave;ng tử , rồi chuyện đ&oacute;i ăn, ch&aacute;y nh&agrave;, lụt lội,... Bối cảnh l&agrave; trường học, nh&agrave; trong x&oacute;m, b&atilde;i tha ma. Dẫn chuyện l&agrave; cậu b&eacute; 15 tuổi t&ecirc;n Thiều. Thiều c&oacute; ch&uacute; ruột l&agrave; ch&uacute; Đ&agrave;n, c&oacute; bạn th&acirc;n l&agrave; c&ocirc; b&eacute; Mận. Nhưng nh&acirc;n vật đ&aacute;ng y&ecirc;u nhất lại l&agrave; Tường, em trai Thiều, một cậu b&eacute; học kh&ocirc;ng giỏi. Thiều, Tường v&agrave; những đứa trẻ sống trong c&ugrave;ng một l&agrave;ng, học c&ugrave;ng một trường, c&oacute; biết bao chuyện chung. Ch&uacute;ng n&ocirc; đ&ugrave;a, c&atilde;i cọ rồi y&ecirc;u thương nhau, c&ugrave;ng lớn l&ecirc;n theo năm th&aacute;ng, trải qua bao sự kiện biến cố của cuộc đời.<br />\r\nT&aacute;c giả vẫn giữ c&aacute;ch kể chuyện bằng ch&iacute;nh giọng trong s&aacute;ng hồn nhi&ecirc;n của trẻ con. 81 chương ngắn l&agrave; 81 c&acirc;u chuyện hấp dẫn với nhiều chi tiết th&uacute; vị, cảm động, c&oacute; những t&igrave;nh tiết bất ngờ, từ đ&oacute; lộ r&otilde; t&iacute;nh c&aacute;ch người. Cuốn s&aacute;ch, v&igrave; thế, c&oacute; sức &aacute;m ảnh.</p>', '<p>Những c&acirc;u chuyện nhỏ xảy ra ở một ng&ocirc;i l&agrave;ng nhỏ: chuyện người, chuyện c&oacute;c, chuyện ma, chuyện c&ocirc;ng ch&uacute;a v&agrave; ho&agrave;ng tử , rồi chuyện đ&oacute;i ăn, ch&aacute;y nh&agrave;, lụt lội,... Bối cảnh l&agrave; trường học, nh&agrave; trong x&oacute;m, b&atilde;i tha ma. Dẫn chuyện l&agrave; cậu b&eacute; 15 tuổi t&ecirc;n Thiều.&nbsp;</p>', 125000, 100000, 0, 0, 1, '2021-06-09 15:02:56', '2021-06-10 03:41:42'),
(6, 4, 'Dạy Con Làm Giàu - Tập 1 (Tái Bản 2018)', 'Robert T Kiyosaki', 'day-con-lam-giau-tap-1-tai-ban-2018', 'day-con-lam-giau.jpg', '<p>Người gi&agrave;u kh&ocirc;ng l&agrave;m việc v&igrave; tiền. Họ bắt tiền l&agrave;m việc cho họ. Chấp nhận thất bại l&agrave; bước đầu của th&agrave;nh c&ocirc;ng? Quyền lực của sự lựa chọn! Những b&agrave;i học kh&ocirc;ng c&oacute; trong nh&agrave; trường. H&atilde;y bắt đầu từ h&ocirc;m nay &ldquo;để kh&ocirc;ng c&oacute; tiền vẫn tạo ra tiền&rdquo;&hellip;.</p>', '<p>Người gi&agrave;u kh&ocirc;ng l&agrave;m việc v&igrave; tiền. Họ bắt tiền l&agrave;m việc cho họ. Chấp nhận thất bại l&agrave; bước đầu của th&agrave;nh c&ocirc;ng? Quyền lực của sự lựa chọn! Những b&agrave;i học kh&ocirc;ng c&oacute; trong nh&agrave; trường. H&atilde;y bắt đầu từ h&ocirc;m nay &ldquo;để kh&ocirc;ng c&oacute; tiền vẫn tạo ra tiền&rdquo;&hellip;.</p>', 65000, 55000, 0, 0, 1, '2021-06-09 15:06:10', '2021-06-10 09:59:03'),
(7, 6, 'Nhà Lãnh Đạo Không Chức Danh', 'Robin Sharma', 'nha-lanh-dao-khong-chuc-danh', 'nha-lanh-dao-khong-chuc-danh.jpg', '<p>Nh&agrave; L&atilde;nh Đạo Kh&ocirc;ng Chức Danh</p>\r\n\r\n<p>Suốt hơn 15 năm, Robin Sharma đ&atilde; thầm lặng chia sẻ với những c&ocirc;ng ty trong danh s&aacute;ch Fortune 500 v&agrave; nhiều người si&ecirc;u gi&agrave;u kh&aacute;c một c&ocirc;ng thức th&agrave;nh c&ocirc;ng đ&atilde; gi&uacute;p &ocirc;ng trở th&agrave;nh một trong những nh&agrave; cố vấn l&atilde;nh đạo được theo đuổi nhiều nhất thế giới. Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Sharma c&ocirc;ng bố c&ocirc;ng thức độc quyền n&agrave;y với bạn, để bạn c&oacute; thể đạt được những g&igrave; tốt nhất, đồng thời gi&uacute;p tổ chức của bạn c&oacute; thể c&oacute; những bước đột ph&aacute; đến một cấp độ th&agrave;nh c&ocirc;ng mới trong thời đại thi&ecirc;n biến vạn h&oacute;a như hiện nay.</p>\r\n\r\n<p>Trong cuốn s&aacute;ch&nbsp;Nh&agrave; L&atilde;nh Đạo Kh&ocirc;ng Chức Danh, bạn sẽ học được:</p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li>L&agrave;m thế n&agrave;o để l&agrave;m việc v&agrave; tạo ảnh hưởng với mọi người như một si&ecirc;u sao, bất chấp bạn đang ở vị tr&iacute; n&agrave;o</li>\r\n	<li>Một phương ph&aacute;p để nhận biết v&agrave; nắm bắt cơ hội v&agrave;o những thời điểm thay đổi</li>\r\n	<li>Những b&iacute; mật thật sự của sự đổi mới</li>\r\n	<li>Một chiến lược tức thời để x&acirc;y dựng đội nh&oacute;m tuyệt vời v&agrave; trở th&agrave;nh một nh&agrave; cung cấp ngoạn mục của kh&aacute;ch h&agrave;ng</li>\r\n	<li>Những thủ thuật cứng rắn gi&uacute;p trở n&ecirc;n mạnh mẽ cả về thể chất lẫn tinh thần để c&oacute; thể đi đầu trong lĩnh vực của bạn</li>\r\n	<li>Những phương thức thực tế để đ&aacute;nh bại sự căng thẳng, x&acirc;y dựng một &yacute; ch&iacute; bất bại, giải ph&oacute;ng năng lượng, v&agrave; c&acirc;n bằng cuộc sống c&aacute; nh&acirc;n</li>\r\n</ul>\r\n\r\n<p>Bất kể bạn l&agrave;m g&igrave; trong tổ chức v&agrave; cuộc sống hiện tại của bạn như thế n&agrave;o, một thực tế quan trọng duy nhất l&agrave; bạn c&oacute; khả năng thể hiện năng lực l&atilde;nh đạo. Cho d&ugrave; sự nghiệp hiện tại của bạn đang ở đ&acirc;u, bạn vẫn lu&ocirc;n cần phải thể hiện những khả năng tột đỉnh của m&igrave;nh. Cuốn s&aacute;ch n&agrave;y sẽ hướng dẫn bạn l&agrave;m thế n&agrave;o để khai th&aacute;c tối đa khả năng đ&oacute;, cũng như thay đổi cuộc sống v&agrave; thế giới xung quanh bạn.</p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p>Suốt hơn 15 năm, Robin Sharma đ&atilde; thầm lặng chia sẻ với những c&ocirc;ng ty trong danh s&aacute;ch Fortune 500 v&agrave; nhiều người si&ecirc;u gi&agrave;u kh&aacute;c một c&ocirc;ng thức th&agrave;nh c&ocirc;ng đ&atilde; gi&uacute;p &ocirc;ng trở th&agrave;nh một trong những nh&agrave; cố vấn l&atilde;nh đạo được theo đuổi nhiều nhất thế giới.</p>', 80000, 66000, 0, 0, 2, '2021-06-09 15:12:30', '2021-06-10 03:42:00'),
(8, 4, 'Tâm Lý Học Trong Đầu Tư Chứng Khoán', 'Mark Douglas', 'tam-ly-hoc-trong-dau-tu-chung-khoan', 'tam-ly-hoc-dau-tu-chung-khoan.jpg', '<p>L&agrave; t&aacute;c phẩm ti&ecirc;n phong trong lĩnh vực t&acirc;m l&yacute; giao dịch,&nbsp;<strong>&ldquo;T&acirc;m l&yacute; học trong đầu tư chứng kho&aacute;n&rdquo;</strong>&nbsp;l&agrave; bản hướng dẫn cặn kẽ gi&uacute;p bạn nắm bắt được c&aacute;c yếu tố cần thiết để trở th&agrave;nh một nh&agrave; giao dịch chứng kho&aacute;n hoặc hợp đồng tương lai th&agrave;nh c&ocirc;ng, từ đ&oacute; c&oacute; thể th&iacute;ch ứng hiệu quả với những đặc t&iacute;nh t&acirc;m l&yacute; bất thường của thế giới giao dịch. Ngay từ khi mới được ra mắt, cuốn s&aacute;ch đ&atilde; được xem l&agrave; t&aacute;c phẩm kinh điển m&agrave; bất cứ ai muốn th&agrave;nh c&ocirc;ng trong thị trường giao dịch đều phải đọc, v&agrave; gi&aacute; trị của n&oacute; vẫn vẹn nguy&ecirc;n cho đến ng&agrave;y nay.&rdquo;</p>\r\n\r\n<p>Cuốn s&aacute;ch tr&igrave;nh b&agrave;y về việc &aacute;p dụng t&acirc;m l&yacute; học v&agrave;o lĩnh vực đầu tư chứng kho&aacute;n, c&aacute;ch thấu hiểu v&agrave; nắm bắt t&acirc;m l&yacute; đ&aacute;m đ&ocirc;ng để từ đ&oacute; thu được lợi nhuận lớn nhất. Nội dung cơ bản gồm 4 phần.</p>\r\n\r\n<p>Phần I: giới thiệu chung, n&oacute;i về c&aacute;c đặc t&iacute;nh t&acirc;m l&yacute; cơ bản của nh&agrave; giao dịch n&oacute;i ri&ecirc;ng v&agrave; của thị trường n&oacute;i chung, cũng như t&aacute;c động của t&acirc;m l&yacute; đến quyết định đầu tư.</p>\r\n\r\n<p>Phần II: b&agrave;n về bản chất của thị trường nh&igrave;n từ g&oacute;c độ t&acirc;m l&yacute; học, bao gồm c&aacute;c l&yacute; thuyết về dự b&aacute;o biến động gi&aacute;, tiềm năng l&atilde;i lỗ cũng như c&aacute;c đặc điểm kh&aacute;c của thị trường.</p>\r\n\r\n<p>Phần III: đi s&acirc;u v&agrave;o c&aacute;c biến động t&acirc;m l&yacute; của c&aacute; nh&acirc;n nh&agrave; giao dịch, c&aacute;ch c&aacute;c th&ocirc;ng tin m&agrave; ch&uacute;ng ta tiếp nhận t&aacute;c động đến quyết định mua b&aacute;n cũng như c&aacute;ch để thay đổi v&agrave; kiểm so&aacute;t năng lượng tinh thần.</p>\r\n\r\n<p>Phần IV: l&agrave; những hướng dẫn để trở th&agrave;nh một nh&agrave; giao dịch kỷ luật, c&aacute;ch x&aacute;c định niềm tin của thị trường bằng việc quan s&aacute;t c&aacute;c biến động, từ đ&oacute; đưa ra c&aacute;c dự b&aacute;o ch&iacute;nh x&aacute;c về tương lai nhằm thu được lợi nhuận cao nhất.</p>\r\n\r\n<p><strong>Tr&iacute;ch dẫn hay trong cuốn s&aacute;ch:</strong></p>\r\n\r\n<p>L&agrave; một nh&agrave; giao dịch, bạn c&oacute; quyền trao tiền cho bản th&acirc;n hoặc đem tiền của bạn cho những nh&agrave; giao dịch kh&aacute;c. V&agrave; c&aacute;ch thức bạn chọn để thực hiện h&agrave;nh vi đ&oacute; sẽ được quyết định bởi nhiều yếu tố t&acirc;m l&yacute; - những yếu tố kh&ocirc;ng hề hoặc rất &iacute;t li&ecirc;n quan đến thị trường.</p>\r\n\r\n<p>Trước khi c&oacute; thể th&agrave;nh c&ocirc;ng trong một m&ocirc;i trường c&oacute; đặc t&iacute;nh phi cấu tr&uacute;c như m&ocirc;i trường giao dịch, người ta cần t&ocirc;i luyện được sự tự tin ở mức độ cao nhất. Với t&ocirc;i, tự tin l&agrave; việc tin tưởng v&agrave;o bản th&acirc;n v&agrave; kh&ocirc;ng hề sợ h&atilde;i: biết phải l&agrave;m g&igrave; v&agrave;o l&uacute;c n&agrave;o v&agrave; kh&ocirc;ng do dự khi bắt tay v&agrave;o việc. Việc do dự sẽ chỉ k&eacute;o theo sự nghi ngờ v&agrave; sợ h&atilde;i.</p>\r\n\r\n<p>&nbsp;Nếu thấy h&agrave;nh vi của thị trường c&oacute; vẻ b&iacute; ẩn, đ&oacute; l&agrave; do h&agrave;nh vi của ch&iacute;nh bạn b&iacute; ẩn v&agrave; kh&ocirc;ng thể kiểm so&aacute;t. Bạn sẽ kh&ocirc;ng thể ph&aacute;n đo&aacute;n ch&iacute;nh x&aacute;c diễn biến tiếp theo của thị trường khi c&ograve;n kh&ocirc;ng biết điều tiếp theo m&igrave;nh sẽ l&agrave;m, bất kể những nhận thức hay mong muốn của bản th&acirc;n.</p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p>L&agrave; t&aacute;c phẩm ti&ecirc;n phong trong lĩnh vực t&acirc;m l&yacute; giao dịch,&nbsp;<strong>&ldquo;T&acirc;m l&yacute; học trong đầu tư chứng kho&aacute;n&rdquo;</strong>&nbsp;l&agrave; bản hướng dẫn cặn kẽ gi&uacute;p bạn nắm bắt được c&aacute;c yếu tố cần thiết để trở th&agrave;nh một nh&agrave; giao dịch chứng kho&aacute;n hoặc hợp đồng tương lai th&agrave;nh c&ocirc;ng, từ đ&oacute; c&oacute; thể th&iacute;ch ứng hiệu quả với những đặc t&iacute;nh t&acirc;m l&yacute; bất thường của thế giới giao dịch. Ngay từ khi mới được ra mắt, cuốn s&aacute;ch đ&atilde; được xem l&agrave; t&aacute;c phẩm kinh điển m&agrave; bất cứ ai muốn th&agrave;nh c&ocirc;ng trong thị trường giao dịch đều phải đọc, v&agrave; gi&aacute; trị của n&oacute; vẫn vẹn nguy&ecirc;n cho đến ng&agrave;y nay.&rdquo;</p>', 189000, 154600, 0, 0, 2, '2021-06-09 16:00:04', '2021-06-10 05:22:03'),
(9, 4, 'Economix - Các Nền Kinh Tế Vận Hành (Và Không Vận Hành) Thế Nào Và Tại Sao?', 'Michael Goodwin', 'economix-cac-nen-kinh-te-van-hanh-va-khong-van-hanh-the-nao-va-tai-sao', 'economix.jpg', '<p>Nếu c&aacute;c bạn từng t&igrave;m c&aacute;ch hiểu những kh&aacute;i niệm kinh tế qua việc đọc v&ocirc; số gi&aacute;o tr&igrave;nh kinh tế học, nhưng vẫn thấy thật kh&oacute; h&igrave;nh dung được bức tranh to&agrave;n cảnh về bộ m&ocirc;n n&agrave;y, th&igrave; cuốn s&aacute;ch sẽ cung cấp cho c&aacute;c bạn một mảnh gh&eacute;p ho&agrave;n chỉnh cho những mảnh nho nhỏ m&agrave; c&aacute;c bạn đ&atilde; đọc qua.</p>\r\n\r\n<p>&nbsp;Ch&uacute;ng ta sẽ hiểu r&otilde; hơn về những kh&aacute;i niệm kinh tế cơ bản c&ugrave;ng những học thuyết kinh tế lớn c&ograve;n ảnh hưởng tới ng&agrave;y nay, qua tư tưởng của c&aacute;c nh&agrave; kinh tế học lớn như: Adam Smith, John Keynes...</p>\r\n\r\n<p>&nbsp;C&oacute; thể coi đ&acirc;y l&agrave; một cuốn sử về lịch sử kinh tế thế giới kể từ khi nền kinh tế h&agrave;ng h&oacute;a ra đời. Ch&uacute;ng ta sẽ lướt qua v&agrave;i thế kỷ với v&ocirc; số học thuyết về kinh tế học c&ugrave;ng những vụ khủng hoảng kinh tế lớn như thể đang đọc một cuốn truyện tranh, cả bi lẫn h&agrave;i, căng thẳng m&agrave; kh&ocirc;ng k&eacute;m phần sảng kho&aacute;i.</p>\r\n\r\n<p>&nbsp;&ldquo;Cuốn s&aacute;ch h&oacute;m hỉnh v&agrave; th&uacute; vị n&agrave;y động chạm đến v&ocirc; số vấn đề phức tạp &ndash; kinh tế học, lịch sử v&agrave; t&agrave;i ch&iacute;nh &ndash; v&agrave; khiến những vấn đề ấy trở n&ecirc;n dễ hiểu với cả những người dốt nhất.&rdquo;</p>\r\n\r\n<p>&ndash;&nbsp;&nbsp;<em>Miami Herald</em></p>\r\n\r\n<p><em>&nbsp;</em>&ldquo;<em>Economix</em>&nbsp;đem lại một cảm gi&aacute;c sống động về chủ đề v&ocirc; c&ugrave;ng kh&oacute; hiểu n&agrave;y m&agrave; kh&ocirc;ng phải đơn giản h&oacute;a n&oacute; hoặc khiến độc giả khiếp h&atilde;i.&rdquo;</p>\r\n\r\n<p>&ndash; MotherJones.com</p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p>Nếu c&aacute;c bạn từng t&igrave;m c&aacute;ch hiểu những kh&aacute;i niệm kinh tế qua việc đọc v&ocirc; số gi&aacute;o tr&igrave;nh kinh tế học, nhưng vẫn thấy thật kh&oacute; h&igrave;nh dung được bức tranh to&agrave;n cảnh về bộ m&ocirc;n n&agrave;y, th&igrave; cuốn s&aacute;ch sẽ cung cấp cho c&aacute;c bạn một mảnh gh&eacute;p ho&agrave;n chỉnh cho những mảnh nho nhỏ m&agrave; c&aacute;c bạn đ&atilde; đọc qua.</p>', 152000, 116000, 0, 0, 0, '2021-06-09 16:17:04', '2021-06-09 16:17:04'),
(10, 5, 'Dấu Chân Trên Cát (Tái Bản 2020)', 'Nguyên Phong', 'dau-chan-tren-cat-tai-ban-2020', 'dau-chan-tren-cat.jpg', '<p><em>&ldquo;Dấu ch&acirc;n tr&ecirc;n c&aacute;t&rdquo;</em>&nbsp;l&agrave; t&aacute;c phẩm được dịch giả Nguy&ecirc;n Phong ph&oacute;ng t&aacute;c kể về x&atilde; hội Ai Cập thế kỷ thứ XIV trước CN, qua lời k&ecirc;̉ của nh&acirc;n vật ch&iacute;nh - &nbsp;Sinuhe.</p>\r\n\r\n<p>Ng&agrave;y nay, người ta biết đến triều đại c&aacute;c vua ch&uacute;a Ai Cập thời cổ qua s&aacute;ch vở của người Hy Lạp. Sở dĩ c&aacute;c sử gia Hy Lạp biết được c&aacute;c chi tiết n&agrave;y v&igrave; họ đ&atilde; học hỏi từ người Ai Cập bị đ&agrave;y biệt xứ t&ecirc;n l&agrave; Sinuhe. Đ&acirc;y l&agrave; một nh&acirc;n vật lạ l&ugrave;ng, đ&atilde; c&oacute; c&ocirc;ng mang văn minh Ai Cập truyền v&agrave;o Hy Lạp khi quốc gia n&agrave;y c&ograve;n ở t&igrave;nh trạng k&eacute;m mở mang so với Ai Cập l&uacute;c đ&oacute;.</p>\r\n\r\n<p>C&aacute;c sử gia ng&agrave;y nay đ&atilde; đưa ra nhiều giả thuyết về nh&acirc;n vật Sinuhe n&agrave;y. C&oacute; người cho rằng &ocirc;ng l&agrave; một l&aacute;i bu&ocirc;n đến Hy Lạp lập nghiệp, nhưng l&agrave;m sao l&aacute;i bu&ocirc;n lại mở trường dạy học v&agrave; để lại nhiều t&agrave;i liệu qu&yacute; gi&aacute; như thế được? Từ ng&agrave;n xưa,&nbsp; chỉ ri&ecirc;ng giai cấp vua ch&uacute;a l&agrave; gi&aacute;o sĩ mới được hưởng quy chế gi&aacute;o dục to&agrave;n vẹn như vậy m&agrave; th&ocirc;i.</p>\r\n\r\n<p>Do đ&oacute;, một số người cho rằng &ocirc;ng thuộc giai cấp gi&aacute;o sĩ, nhưng việc một gi&aacute;o sĩ Ai Cập đến mở trường dạy học tại Hy Lạp cũng l&agrave; điều kh&oacute; chấp nhận. Mặc d&ugrave; khi đ&oacute; văn minh Hy Lạp chưa tiến bộ như Ai Cập nhưng gi&aacute;o xứ n&agrave;y ph&aacute;t triển rất mạnh, hiển nhi&ecirc;n c&aacute;c gi&aacute;o sĩ Hy Lạp kh&ocirc;ng thể chấp nhận cho một gi&aacute;o sĩ ngoại quốc đến mở trường dạy học tại th&aacute;nh địa Olympia của họ được.</p>\r\n\r\n<p>Nếu thế th&igrave; phải chăng Sinuhe thuộc giai cấp ho&agrave;ng tộc? Điều n&agrave;y x&eacute;t ra cũng kh&ocirc;ng c&oacute; l&yacute; v&igrave; một người thuộc giai cấp ho&agrave;ng tộc kh&ocirc;ng thể bị đ&agrave;y biệt xứ. Luật ph&aacute;p Ai Cập chủ trương xử tử những kẻ trong ho&agrave;ng tộc nếu họ vi phạm một tội trọng n&agrave;o đ&oacute; chứ kh&ocirc;ng c&oacute; lệ bị đ&agrave;y biệt xứ, v&igrave; c&aacute;c vua Pharaoh rất sợ những người trong bọn họ chi&ecirc;u binh m&atilde;i m&atilde; l&agrave;m phản.</p>\r\n\r\n<p>&nbsp;Việc một người Ai Cập, th&acirc;n thế mơ hồ, bị đ&agrave;y biệt xứ, đến mở trường dạy học tại Athens, trung t&acirc;m văn h&oacute;a của Hy Lạp, vẫn l&agrave; một b&iacute; mật đến nay c&aacute;c nh&agrave; khảo cổ chưa t&igrave;m ra được c&acirc;u trả lời.</p>\r\n\r\n<p>Mặc d&ugrave; l&agrave; tiểu thuyết lịch sử về x&atilde; hội Ai Cập cổ đại, song nhiều vấn đề được n&ecirc;u ra trong t&aacute;c phẩm vẫn c&oacute; &yacute; nghĩa thời sự trong thế giới ng&agrave;y nay. Đ&oacute; l&agrave; l&yacute; do khiến cho t&aacute;c phẩm kh&ocirc;ng chỉ giữ được sự cuốn h&uacute;t đối với bạn đọc Việt Nam v&agrave; rất nhiều nơi&nbsp; tr&ecirc;n thế giới trong hơn nửa thế kỷ qua.</p>\r\n\r\n<p>Bạn sẽ kh&ocirc;ng thể rời mắt khỏi những d&ograve;ng văn viết với &yacute; tứ s&acirc;u sắc của một người con xa qu&ecirc; hương: &quot;Người Ai Cập c&oacute; th&agrave;nh ngữ: &quot;Kẻ n&agrave;o đ&atilde; uống nước s&ocirc;ng Nile th&igrave; kh&ocirc;ng thể n&agrave;o uống nước ở đ&acirc;u được nữa&quot;. Quả thế tuy sống tại Hy Lạp nhưng kh&ocirc;ng bao giờ t&ocirc;i c&oacute; thể qu&ecirc;n được Ai Cập qu&ecirc; hương th&acirc;n y&ecirc;u của t&ocirc;i.</p>\r\n\r\n<p>Dường như những miền n&agrave;o x&acirc;y dựng tr&ecirc;n mặt c&aacute;t, chỉ huy ho&agrave;ng trong một thời gian rất ngắn rồi t&agrave;n lụi, nhưng mấy ai chịu để &yacute; đến điều ấy. Cũng như những vết dấu ch&acirc;n tr&ecirc;n c&aacute;t chỉ tồn tại một tho&aacute;ng gi&acirc;y rồi phai mờ, huyền thoại về một người Ai Cập qua Hy Lạp mở trường dạy học, đ&agrave;o tạo nhiều thế hệ học tr&ograve; xuất sắc chỉ c&ograve;n l&agrave; một c&acirc;u chuyện mơ hồ trong cuộc sống ồn &agrave;o, n&aacute;o nhiệt ng&agrave;y nay.</p>\r\n\r\n<p><strong><em>BOX</em></strong></p>\r\n\r\n<p>Dịch giả Nguy&ecirc;n Phong t&ecirc;n thật l&agrave; Vũ Văn Du, sinh năm 1950 tại H&agrave; Nội. &Ocirc;ng rời Việt Nam du học ở Hoa Kỳ từ năm 1968 v&agrave; tốt nghiệp cao học ở hai ng&agrave;nh Sinh vật học v&agrave; Điện to&aacute;n. Ngo&agrave;i c&ocirc;ng việc ch&iacute;nh l&agrave; một kỹ sư cao cấp tại Boeing trong hơn 20 năm, &ocirc;ng vẫn tiếp tục nghi&ecirc;n cứu trong vai tr&ograve; nh&agrave; khoa học tại Đại học Carnergie Mellon v&agrave; Đại học Seattle. &Ocirc;ng c&ograve;n giảng dạy tại một số trường đại học quốc tế tại Trung Hoa, H&agrave;n Quốc, Nhật Bản... về lĩnh vực c&ocirc;ng nghệ phần mềm.</p>\r\n\r\n<p>Song song với vai tr&ograve; một nh&agrave; khoa học, Nguy&ecirc;n Phong c&ograve;n l&agrave; dịch giả nổi tiếng của loạt s&aacute;ch về văn h&oacute;a v&agrave; t&acirc;m linh phương Đ&ocirc;ng, chuyển thể từ nhiều t&aacute;c phẩm của c&aacute;c học giả phương T&acirc;y sau qu&aacute; tr&igrave;nh t&igrave;m hiểu v&agrave; kh&aacute;m ph&aacute; c&aacute;c gi&aacute; trị tinh thần từ phương Đ&ocirc;ng. Trong số đ&oacute;, c&oacute; thể kể:&nbsp;<em>H&agrave;nh Tr&igrave;nh về phương Đ&ocirc;ng, Ngọc s&aacute;ng trong hoa sen, B&ecirc;n rặng Tuyết sơn,&nbsp; Hoa sen tr&ecirc;n tuyết, Huyền thuật v&agrave; đạo sĩ T&acirc;y Tạng, Minh Triết trong đời sống, Đường m&acirc;y qua xứ tuyết&hellip;</em></p>\r\n\r\n<p>Đam m&ecirc; thiền học, nghi&ecirc;n cứu s&acirc;u sắc c&aacute;c vấn đề t&acirc;m linh dưới g&oacute;c nh&igrave;n của khoa học, những t&aacute;c phẩm của &ocirc;ng, phần lớn l&agrave; ph&oacute;ng t&aacute;c, gi&uacute;p người đọc tiếp cận c&aacute;c t&aacute;c phẩm gốc thuận lợi hơn, l&yacute; giải được những vấn đề c&ograve;n nhiều ẩn số bằng c&aacute;i nh&igrave;n minh triết.</p>\r\n\r\n<p>R&uacute;t Gọn</p>', '<p><em>&ldquo;Dấu ch&acirc;n tr&ecirc;n c&aacute;t&rdquo;</em>&nbsp;l&agrave; t&aacute;c phẩm được dịch giả Nguy&ecirc;n Phong ph&oacute;ng t&aacute;c kể về x&atilde; hội Ai Cập thế kỷ thứ XIV trước CN, qua lời k&ecirc;̉ của nh&acirc;n vật ch&iacute;nh - &nbsp;Sinuhe.</p>', 150000, 117400, 0, 0, 0, '2021-06-09 16:30:01', '2021-06-09 16:30:01'),
(11, 6, 'D. Trump - Nghệ Thuật Đàm Phán (Tái Bản 2020)', 'Donald J Trump, Tony Schartz', 'd-trump-nghe-thuat-dam-phan-tai-ban-2020', 'nghe-thuat-lanh-dao-d-trump.jpg', '<p>Quyển s&aacute;ch cho ch&uacute;ng ta thấy c&aacute;ch Trump l&agrave;m việc mỗi ng&agrave;y - c&aacute;ch &ocirc;ng điều h&agrave;nh c&ocirc;ng việc kinh doanh v&agrave; cuộc sống - cũng như c&aacute;ch &ocirc;ng tr&ograve; chuyện với bạn b&egrave; v&agrave; gia đ&igrave;nh, l&agrave;m ăn với đối thủ, mua th&agrave;nh c&ocirc;ng những s&ograve;ng bạc h&agrave;ng đầu ở th&agrave;nh phố Atlantic, thay đổi bộ mặt của những cao ốc ở th&agrave;nh phố New York&hellip; v&agrave; x&acirc;y dựng những t&ograve;a nh&agrave; chọc trời tr&ecirc;n thế giới.</p>\r\n\r\n<p>Quyển s&aacute;ch đi s&acirc;u v&agrave;o đầu &oacute;c của một doanh nh&acirc;n xuất sắc v&agrave; kh&aacute;m ph&aacute; một c&aacute;ch khoa học chưa từng thấy về c&aacute;ch đ&agrave;m ph&aacute;n một thương vụ th&agrave;nh c&ocirc;ng. Đ&acirc;y l&agrave; một cuốn s&aacute;ch th&uacute; vị về đ&agrave;m ph&aacute;n v&agrave; kinh doanh &ndash; v&agrave; l&agrave; một cuốn s&aacute;ch n&ecirc;n đọc cho bất kỳ ai quan t&acirc;m đến đầu tư, bất động sản v&agrave; th&agrave;nh c&ocirc;ng.</p>', '<p>Quyển s&aacute;ch đi s&acirc;u v&agrave;o đầu &oacute;c của một doanh nh&acirc;n xuất sắc v&agrave; kh&aacute;m ph&aacute; một c&aacute;ch khoa học chưa từng thấy về c&aacute;ch đ&agrave;m ph&aacute;n một thương vụ th&agrave;nh c&ocirc;ng. Đ&acirc;y l&agrave; một cuốn s&aacute;ch th&uacute; vị về đ&agrave;m ph&aacute;n v&agrave; kinh doanh &ndash; v&agrave; l&agrave; một cuốn s&aacute;ch n&ecirc;n đọc cho bất kỳ ai quan t&acirc;m đến đầu tư, bất động sản v&agrave; th&agrave;nh c&ocirc;ng.</p>', 110000, 92630, 0, 0, 0, '2021-06-09 16:34:28', '2021-06-09 16:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `display_name`, `updated_at`, `created_at`) VALUES
(8, 'admin', 'Admin', '2020-12-29 16:48:41', '2020-12-28 18:33:12'),
(13, 'Wirter', 'wirter', '2021-01-04 03:40:24', '2021-01-04 03:40:24'),
(14, 'Producter', 'producter', '2021-01-04 03:40:41', '2021-01-04 03:40:41'),
(15, 'Quản lý user', 'Quản lý user', '2021-01-06 16:51:48', '2021-01-06 16:51:48'),
(16, 'product', 'Producter123', '2021-01-10 06:31:06', '2021-01-10 06:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(12, 'sl1', 'sl1.jpg', 0, '2021-01-10 06:29:21', '2021-06-09 10:48:41'),
(13, 'sd2', 'sl2.png', 0, '2021-06-10 03:44:09', '2021-06-10 03:44:09'),
(16, 'abc', 'slb2.jpg', 0, '2021-06-10 03:49:36', '2021-06-10 03:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'admin', 'admin1@gmail.com', NULL, '$2y$10$R/8sCOXyf89Ciw/LUy8onuu0b.JzfEmkSzxAXrjgcuJhPo0EPA2CO', NULL, '2020-12-29 14:38:35', '2020-12-30 09:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_role_id`, `id_role`, `id_user`) VALUES
(36, 8, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `code_sale`
--
ALTER TABLE `code_sale`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `image_pro_image_foreign` (`pro_image`);

--
-- Indexes for table `key_word`
--
ALTER TABLE `key_word`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_detail_order_detail_foreign` (`order_detail`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_role_id`),
  ADD KEY `permission_role_id_role_foreign` (`id_role`),
  ADD KEY `permission_role_id_per_foreign` (`id_per`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `products_pro_cate_foreign` (`pro_cate`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `users_roles_id_role_foreign` (`id_role`),
  ADD KEY `users_roles_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `code_sale`
--
ALTER TABLE `code_sale`
  MODIFY `code_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `key_word`
--
ALTER TABLE `key_word`
  MODIFY `key_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `permission_role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `user_role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_pro_image_foreign` FOREIGN KEY (`pro_image`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_detail_foreign` FOREIGN KEY (`order_detail`) REFERENCES `order` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_id_per_foreign` FOREIGN KEY (`id_per`) REFERENCES `permission` (`per_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_pro_cate_foreign` FOREIGN KEY (`pro_cate`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
