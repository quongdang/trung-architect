-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2021 at 11:02 PM
-- Server version: 5.5.62-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ytcconne_TArch`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `content_en` longtext COLLATE utf16_unicode_ci,
  `content_vn` longtext COLLATE utf16_unicode_ci,
  `created` datetime DEFAULT NULL,
  `title_vn` mediumtext COLLATE utf16_unicode_ci,
  `title_en` mediumtext COLLATE utf16_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `content_en`, `content_vn`, `created`, `title_vn`, `title_en`) VALUES
(4, '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;We are a design firm based in Saigon and representative office in Sadec city, speacializing in architectural and interior design. &amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 24.0pt; mso-char-indent-count: 2.0;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;TV Architects was established in 2019 by Trung Tang and is developing to become a pretigious company.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;We have operated in Sai Gon and several places in Viet Nam regionally based architectural values and an appreciation of environment sustainable design principle.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;Moreover, created green &amp;amp;amp; natural with project is criteria.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;We are trying to build a reputation as the leading Vietnamese company in the field of sustainable design and energy efficiency.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;Ch&amp;amp;uacute;ng t&amp;amp;ocirc;i l&amp;amp;agrave; một c&amp;amp;ocirc;ng ty thiết kế c&amp;amp;oacute; trụ sở tại S&amp;amp;agrave;i G&amp;amp;ograve;n v&amp;amp;agrave; văn ph&amp;amp;ograve;ng đại diện tại th&amp;amp;agrave;nh phố Sa Đ&amp;amp;eacute;c, chuy&amp;amp;ecirc;n về thiết kế kiến tr&amp;amp;uacute;c v&amp;amp;agrave; nội thất. &amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;TV Architects được th&amp;amp;agrave;nh lập v&amp;amp;agrave;o năm 2019 bởi Trung Tăng v&amp;amp;agrave; đang ph&amp;amp;aacute;t triển trở th&amp;amp;agrave;nh một c&amp;amp;ocirc;ng ty uy t&amp;amp;iacute;n. &amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;Ch&amp;amp;uacute;ng t&amp;amp;ocirc;i đ&amp;amp;atilde; hoạt động ở S&amp;amp;agrave;i G&amp;amp;ograve;n v&amp;amp;agrave; một v&amp;amp;agrave;i tỉnh th&amp;amp;agrave;nh tại Việt Nam. Với mong muốn th&amp;amp;uacute;c đẩy c&amp;amp;aacute;c gi&amp;amp;aacute; trị kiến tr&amp;amp;uacute;c mang t&amp;amp;iacute;nh khu vực v&amp;amp;agrave; đ&amp;amp;aacute;nh gi&amp;amp;aacute; cao c&amp;amp;aacute;c nguy&amp;amp;ecirc;n tắc thiết kế bền vững với m&amp;amp;ocirc;i trường. Ngo&amp;amp;agrave;i ra, tạo n&amp;amp;ecirc;n mảng xanh v&amp;amp;agrave; đưa thi&amp;amp;ecirc;n nhi&amp;amp;ecirc;n gần gũi với c&amp;amp;ocirc;ng tr&amp;amp;igrave;nh l&amp;amp;agrave; một ti&amp;amp;ecirc;u ch&amp;amp;iacute; quan trọng. &amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot; style=&amp;quot;text-align: justify; text-justify: inter-ideograph; text-indent: 30.0pt; mso-char-indent-count: 2.5;&amp;quot;&amp;gt;&amp;lt;span lang=&amp;quot;VI&amp;quot; style=&amp;quot;font-size: 12.0pt; font-family: \'Times New Roman\',serif; mso-ansi-language: VI;&amp;quot;&amp;gt;Ch&amp;amp;uacute;ng t&amp;amp;ocirc;i đang cố gắng tạo dựng danh tiếng l&amp;amp;agrave; một c&amp;amp;ocirc;ng ty Việt Nam h&amp;amp;agrave;ng đầu trong lĩnh vực thiết kế bền vững v&amp;amp;agrave; hiệu quả năng lượng. &amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '2019-05-13 22:23:26', 'Công ty TNHH Kiến trúc - Xây Dựng - Thương mại dịch vụ Trung Vinh.', 'Trung Vinh Architects - Construction - Trading Service Company Limited.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) COLLATE utf16_unicode_ci NOT NULL,
  `admin_pass` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'dong.lquang@gmail.com', '25251325');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category_vn` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `category_en` varchar(200) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_vn`, `category_en`) VALUES
(5, 'Nhà phố', 'Townhouse'),
(6, 'Căn hộ', 'Apartment'),
(7, 'Biệt thự vườn', 'Residential'),
(8, 'Healthcare', 'Healthcare'),
(9, 'Nhà hàng', 'Restaurant'),
(10, 'Kết hợp', 'Mixing');

-- --------------------------------------------------------

--
-- Table structure for table `firebase_token`
--

CREATE TABLE `firebase_token` (
  `id` int(11) NOT NULL,
  `fcmToken` varchar(300) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grow_with_us`
--

CREATE TABLE `grow_with_us` (
  `id` int(11) NOT NULL,
  `content_en` longtext COLLATE utf16_unicode_ci,
  `content_vn` longtext COLLATE utf16_unicode_ci,
  `created` datetime DEFAULT NULL,
  `title_vn` mediumtext COLLATE utf16_unicode_ci,
  `title_en` mediumtext COLLATE utf16_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `grow_with_us`
--

INSERT INTO `grow_with_us` (`id`, `content_en`, `content_vn`, `created`, `title_vn`, `title_en`) VALUES
(2, '&amp;lt;div class=&amp;quot;what-we-offer mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;C&amp;amp;Aacute;C PH&amp;amp;Uacute;C LỢI D&amp;amp;Agrave;NH CHO BẠN&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefits&amp;quot; style=&amp;quot;box-sizing: border-box; margin-bottom: 45px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit row&amp;quot; style=&amp;quot;box-sizing: border-box; margin-left: -5px; margin-right: -5px; margin-bottom: 7px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-icon col-xs-1&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 40px; text-align: center;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-name col-xs-11&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 618.8px; padding-top: 5px;&amp;quot;&amp;gt;Cơ hội du lịch, nghỉ m&amp;amp;aacute;t, hoạt động teambuilding, văn h&amp;amp;oacute;a doanh nghiệp&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit row&amp;quot; style=&amp;quot;box-sizing: border-box; margin-left: -5px; margin-right: -5px; margin-bottom: 7px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-icon col-xs-1&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 40px; text-align: center;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-name col-xs-11&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 618.8px; padding-top: 5px;&amp;quot;&amp;gt;ăn trưa tại VP C&amp;amp;ocirc;ng ty&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;job-description mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; margin-bottom: 45px; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;M&amp;amp;Ocirc; TẢ C&amp;amp;Ocirc;NG VIỆC&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;description&amp;quot; style=&amp;quot;box-sizing: border-box; line-height: 21px;&amp;quot;&amp;gt;- Thực hiện c&amp;amp;aacute;c c&amp;amp;ocirc;ng việc về kế to&amp;amp;aacute;n x&amp;amp;acirc;y dựng&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- Theo d&amp;amp;otilde;i, kiểm so&amp;amp;aacute;t, t&amp;amp;iacute;nh thuế TNDN bất động sản, thuế TNDN, GTGT&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- R&amp;amp;agrave; so&amp;amp;aacute;t, kiểm tra c&amp;amp;aacute;c nghiệp vụ kế to&amp;amp;aacute;n ph&amp;amp;aacute;t sinh v&amp;amp;agrave;o phần mềm kế to&amp;amp;aacute;n&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- Kiểm tra c&amp;amp;ocirc;ng nợ phải thu, phải trả&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- L&amp;amp;ecirc;n được b&amp;amp;aacute;o c&amp;amp;aacute;o t&amp;amp;agrave;i ch&amp;amp;iacute;nh; Quyết to&amp;amp;aacute;nthuế với cơ quan thuế&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Chi tiết c&amp;amp;ocirc;ng việc sẽ trao đổi trong buổi phỏng vấn&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;job-requirements mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;Y&amp;amp;Ecirc;U CẦU C&amp;amp;Ocirc;NG VIỆC&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;requirements&amp;quot; style=&amp;quot;box-sizing: border-box; line-height: 21px;&amp;quot;&amp;gt;Hiểu về hồ sơ thanh to&amp;amp;aacute;n x&amp;amp;acirc;y dựng, t&amp;amp;iacute;nh gi&amp;amp;aacute; th&amp;amp;agrave;nh BĐS;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Hiểu biết chuy&amp;amp;ecirc;n s&amp;amp;acirc;u về c&amp;amp;aacute;c chuẩn mực cũng như c&amp;amp;aacute;c quy định li&amp;amp;ecirc;n quan đến b&amp;amp;aacute;o c&amp;amp;aacute;o t&amp;amp;agrave;i ch&amp;amp;iacute;nh, kế to&amp;amp;aacute;n, thuế...;&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Sử dụng th&amp;amp;agrave;nh thạo c&amp;amp;aacute;c phần mềm kế to&amp;amp;aacute;n; tin học văn ph&amp;amp;ograve;ng&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;C&amp;amp;oacute; tố chất quản l&amp;amp;yacute;, l&amp;amp;atilde;nh đạo;&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Khả năng chịu &amp;amp;aacute;p lực c&amp;amp;ocirc;ng việc tốt; L&amp;amp;agrave;m việc nh&amp;amp;oacute;m, độc lập tốt&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Cam kết ổn định&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;', '&amp;lt;div class=&amp;quot;what-we-offer mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;C&amp;amp;Aacute;C PH&amp;amp;Uacute;C LỢI D&amp;amp;Agrave;NH CHO BẠN&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefits&amp;quot; style=&amp;quot;box-sizing: border-box; margin-bottom: 45px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit row&amp;quot; style=&amp;quot;box-sizing: border-box; margin-left: -5px; margin-right: -5px; margin-bottom: 7px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-icon col-xs-1&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 40px; text-align: center;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-name col-xs-11&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 618.8px; padding-top: 5px;&amp;quot;&amp;gt;Cơ hội du lịch, nghỉ m&amp;amp;aacute;t, hoạt động teambuilding, văn h&amp;amp;oacute;a doanh nghiệp&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit row&amp;quot; style=&amp;quot;box-sizing: border-box; margin-left: -5px; margin-right: -5px; margin-bottom: 7px;&amp;quot;&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-icon col-xs-1&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 40px; text-align: center;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;benefit-name col-xs-11&amp;quot; style=&amp;quot;box-sizing: border-box; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px; float: left; width: 618.8px; padding-top: 5px;&amp;quot;&amp;gt;ăn trưa tại VP C&amp;amp;ocirc;ng ty&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;job-description mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; margin-bottom: 45px; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;M&amp;amp;Ocirc; TẢ C&amp;amp;Ocirc;NG VIỆC&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;description&amp;quot; style=&amp;quot;box-sizing: border-box; line-height: 21px;&amp;quot;&amp;gt;- Thực hiện c&amp;amp;aacute;c c&amp;amp;ocirc;ng việc về kế to&amp;amp;aacute;n x&amp;amp;acirc;y dựng&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- Theo d&amp;amp;otilde;i, kiểm so&amp;amp;aacute;t, t&amp;amp;iacute;nh thuế TNDN bất động sản, thuế TNDN, GTGT&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- R&amp;amp;agrave; so&amp;amp;aacute;t, kiểm tra c&amp;amp;aacute;c nghiệp vụ kế to&amp;amp;aacute;n ph&amp;amp;aacute;t sinh v&amp;amp;agrave;o phần mềm kế to&amp;amp;aacute;n&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- Kiểm tra c&amp;amp;ocirc;ng nợ phải thu, phải trả&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;- L&amp;amp;ecirc;n được b&amp;amp;aacute;o c&amp;amp;aacute;o t&amp;amp;agrave;i ch&amp;amp;iacute;nh; Quyết to&amp;amp;aacute;nthuế với cơ quan thuế&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Chi tiết c&amp;amp;ocirc;ng việc sẽ trao đổi trong buổi phỏng vấn&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;\r\n&amp;lt;div class=&amp;quot;job-requirements mobile-box&amp;quot; style=&amp;quot;box-sizing: border-box; color: #555555; font-family: Roboto, Arial, sans-serif; font-size: 15px;&amp;quot;&amp;gt;\r\n&amp;lt;h2 style=&amp;quot;box-sizing: border-box; font-weight: 500; line-height: 1.21; color: inherit; margin-top: 5px; margin-bottom: 17px; font-size: 21px; text-transform: uppercase;&amp;quot;&amp;gt;Y&amp;amp;Ecirc;U CẦU C&amp;amp;Ocirc;NG VIỆC&amp;lt;/h2&amp;gt;\r\n&amp;lt;div class=&amp;quot;requirements&amp;quot; style=&amp;quot;box-sizing: border-box; line-height: 21px;&amp;quot;&amp;gt;Hiểu về hồ sơ thanh to&amp;amp;aacute;n x&amp;amp;acirc;y dựng, t&amp;amp;iacute;nh gi&amp;amp;aacute; th&amp;amp;agrave;nh BĐS;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Hiểu biết chuy&amp;amp;ecirc;n s&amp;amp;acirc;u về c&amp;amp;aacute;c chuẩn mực cũng như c&amp;amp;aacute;c quy định li&amp;amp;ecirc;n quan đến b&amp;amp;aacute;o c&amp;amp;aacute;o t&amp;amp;agrave;i ch&amp;amp;iacute;nh, kế to&amp;amp;aacute;n, thuế...;&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Sử dụng th&amp;amp;agrave;nh thạo c&amp;amp;aacute;c phần mềm kế to&amp;amp;aacute;n; tin học văn ph&amp;amp;ograve;ng&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;C&amp;amp;oacute; tố chất quản l&amp;amp;yacute;, l&amp;amp;atilde;nh đạo;&amp;amp;nbsp;&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Khả năng chịu &amp;amp;aacute;p lực c&amp;amp;ocirc;ng việc tốt; L&amp;amp;agrave;m việc nh&amp;amp;oacute;m, độc lập tốt&amp;lt;br style=&amp;quot;box-sizing: border-box;&amp;quot; /&amp;gt;Cam kết ổn định&amp;lt;/div&amp;gt;\r\n&amp;lt;/div&amp;gt;', '2019-05-14 18:24:21', 'Phó Phòng Kế Toán', 'Phó Phòng Kế Toán');

-- --------------------------------------------------------

--
-- Table structure for table `office_location`
--

CREATE TABLE `office_location` (
  `id` int(11) NOT NULL,
  `content_en` longtext CHARACTER SET utf8,
  `content_vn` longtext CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  `title_vn` text COLLATE utf8_unicode_ci,
  `title_en` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_location`
--

INSERT INTO `office_location` (`id`, `content_en`, `content_vn`, `created`, `title_vn`, `title_en`) VALUES
(6, '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;18 Floor, Vincom Center Dong Khoi Tower,&amp;lt;/span&amp;gt;&amp;lt;br style=&amp;quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot; /&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;72 Le Thanh Ton Street, Ben Nghe Ward, District 1, Ho Chi Minh City,&amp;lt;/span&amp;gt;&amp;lt;br style=&amp;quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot; /&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;Vietnam.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;Tầng 18, T&amp;amp;ograve;a nh&amp;amp;agrave; Vincom Center Đồng Khởi,&amp;lt;/span&amp;gt;&amp;lt;br style=&amp;quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot; /&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;72 L&amp;amp;ecirc; Th&amp;amp;aacute;nh T&amp;amp;ocirc;n, Phường Bến Ngh&amp;amp;eacute;, Quận 1, Th&amp;amp;agrave;nh phố Hồ Ch&amp;amp;iacute; Minh,&amp;lt;/span&amp;gt;&amp;lt;br style=&amp;quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot; /&amp;gt;&amp;lt;span style=&amp;quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;&amp;quot;&amp;gt;Việt Nam.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '2020-11-07 16:08:33', 'Hồ Chí Minh, Việt Nam', 'HoChiMinh, Vietnam'),
(7, '&amp;lt;p&amp;gt;194A, Tran Phu Str, Sa Dec City, Dong Thap Province,&amp;lt;br /&amp;gt;Vietnam&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;194A, Trần Ph&amp;amp;uacute;, Tp. Sa Đ&amp;amp;eacute;c, Tỉnh Đồng Th&amp;amp;aacute;p,&amp;lt;br /&amp;gt;Việt Nam&amp;lt;/p&amp;gt;', '2020-11-07 16:09:44', 'Đồng Tháp, Việt Nam', 'Dong Thap, Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `image0` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `image1` mediumtext COLLATE utf16_unicode_ci,
  `image2` mediumtext COLLATE utf16_unicode_ci,
  `image3` mediumtext COLLATE utf16_unicode_ci,
  `title_vn` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `title_en` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `subtitle_vn` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `subtitle_en` longtext COLLATE utf16_unicode_ci NOT NULL,
  `content_vn` longtext COLLATE utf16_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf16_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `metadata_vn` longtext COLLATE utf16_unicode_ci,
  `metadata_en` longtext COLLATE utf16_unicode_ci,
  `metadata` longtext COLLATE utf16_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `image0`, `image1`, `image2`, `image3`, `title_vn`, `title_en`, `subtitle_vn`, `subtitle_en`, `content_vn`, `content_en`, `category_id`, `created`, `metadata_vn`, `metadata_en`, `metadata`) VALUES
(59, '', '', '', '', 'Kết hợp khu làm việc và nhà ở', 'Kết hợp khu làm việc và nhà ở', 'Nhà ở (Townhomes_Q12)', 'Townhomes_Q12\r\n\r\n', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14pt; line-height: 107%; font-family: Arial, sans-serif; color: #000000;&amp;quot;&amp;gt;Một kh&amp;amp;ocirc;ng gian ăn uống nhỏ với lối kiến tr&amp;amp;uacute;c đơn giản.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;font-family: Arial, sans-serif; font-size: 18.6667px;&amp;quot;&amp;gt;Một kh&amp;amp;ocirc;ng gian ăn uống nhỏ với lối kiến tr&amp;amp;uacute;c đơn giản.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', 5, '2019-05-17 09:44:58', '{&quot;location&quot;:&quot;Nguy\\u1ec5n V\\u0103n Qu\\u00e1, \\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn, Q. 12, Tp. HCM&quot;,&quot;size&quot;:&quot;600m2&quot;,&quot;client&quot;:&quot;C\\u00e1 nh\\u00e2n&quot;}', '{&quot;location&quot;:&quot;Nguyen Van Qua street, Dong Hung Thuan, Dist.12, HCMC&quot;,&quot;size&quot;:&quot;600 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2015-Q12&quot;}'),
(60, '', NULL, NULL, NULL, 'Tân cổ điển kết hợp', '#2015 - TPP', 'Nhà ở (Townhouse_TPP)', '#Client: Private\r\n#Type: Townhouse\r\n#Status: Complete design\r\n#Details: 210 Spm  area\r\n#Venue: Truong phuoc phan, binh tan , hcmc \r\n#Design: TV Architects\r\n', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Ng&amp;amp;ocirc;i nh&amp;amp;agrave; mang phong c&amp;amp;aacute;ch t&amp;amp;acirc;n cổ điển kết hợp.&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Client: Private&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Type: Townhouse&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Status: Complete design&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Details: 210 Spm &amp;lt;span style=&amp;quot;mso-spacerun: yes;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;area&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Venue: Truong phuoc phan, binh tan , hcmc&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Design: TV Architects&amp;lt;/p&amp;gt;', 5, '2021-04-11 22:48:21', '{&quot;location&quot;:&quot;Tr\\u01b0\\u01a1ng Ph\\u01b0\\u1edbc Phan, B\\u00ecnh T\\u00e2n, H\\u1ed3 Ch\\u00ed Minh&quot;,&quot;size&quot;:&quot;210 m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Truong Phuoc Phan, Binh Tan Dist., HCMC&quot;,&quot;size&quot;:&quot;210 Spm Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2015-TPP&quot;}'),
(61, '', NULL, NULL, NULL, 'Nơi đầm ấm sau ngày làm việc', 'Nơi đầm ấm sau ngày làm việc', 'Nhà ở (Townhomes_LTH)', 'Nhà ở (Townhomes_LTH)', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Client: Private&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Type: Townhouse&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Status: Complete design&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Details: 210 Spm &amp;lt;span style=&amp;quot;mso-spacerun: yes;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;area&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Venue: Truong phuoc phan, binh tan , hcmc&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Design: TV Architects&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Client: Private&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Type: Townhouse&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Status: Complete design&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Details: 210 Spm &amp;lt;span style=&amp;quot;mso-spacerun: yes;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;area&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Venue: Truong phuoc phan, binh tan , hcmc&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Design: TV Architects&amp;lt;/p&amp;gt;', 7, '2021-04-11 22:54:03', '{&quot;location&quot;:&quot;\\u0111\\u01b0\\u1eddng s\\u1ed1 5, khu trung t\\u00e2m th\\u01b0\\u01a1ng m\\u1ea1i SaDec, Tp. Sadec, \\u0110\\u1ed3ng Th\\u00e1p&quot;,&quot;size&quot;:&quot;180m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Street No. 5, Sadec, Dong Thap&quot;,&quot;size&quot;:&quot;180 Sqm Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2016-LTH&quot;}'),
(62, '', NULL, NULL, NULL, 'Căn nhà cho cặp vợ chồng trẻ', 'Căn nhà cho cặp vợ chồng trẻ', 'Nhà ở (Townhomes_HH10)', 'Nhà ở (Townhomes_HH10)', '&amp;lt;p&amp;gt;Với ti&amp;amp;ecirc;u ch&amp;amp;iacute; cải tạo to&amp;amp;agrave;n bộ căn nh&amp;amp;agrave; với phong c&amp;amp;aacute;ch tối giản, m&amp;amp;agrave;u sắc nhẹ nh&amp;amp;agrave;ng.&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Với ti&amp;amp;ecirc;u ch&amp;amp;iacute; cải tạo to&amp;amp;agrave;n bộ căn nh&amp;amp;agrave; với phong c&amp;amp;aacute;ch tối giản, m&amp;amp;agrave;u sắc nhẹ nh&amp;amp;agrave;ng.&amp;lt;/p&amp;gt;', 7, '2021-04-11 22:57:56', '{&quot;location&quot;:&quot;397\\/1 \\u0111\\u01b0\\u1eddng H\\u00f2a h\\u1ea3o, qu\\u1eadn 10, Tp. HCM.&quot;,&quot;size&quot;:&quot;170 m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;397\\/1 Hoa Hao str., District. 10, HCMC.&quot;,&quot;size&quot;:&quot;170 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2016-HH10&quot;}'),
(63, '', NULL, NULL, NULL, 'Không gian nhà hàng sushi nhỏ  trong trung tâm thương mại', 'Không gian nhà hàngsushi nhỏ  trong trung tâm thương mại', 'Sushi restaurant (restaurant_2363Brich)', 'Sushi restaurant (restaurant_2363Brich)', '&amp;lt;p&amp;gt;Một kh&amp;amp;ocirc;ng gian ăn uống nhỏ với lối kiến tr&amp;amp;uacute;c đơn giản.&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Một kh&amp;amp;ocirc;ng gian ăn uống nhỏ với lối kiến tr&amp;amp;uacute;c đơn giản.&amp;lt;/p&amp;gt;', 9, '2021-04-11 22:58:46', '{&quot;location&quot;:&quot;Brich street, California. &quot;,&quot;size&quot;:&quot;70m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Brich street, California. &quot;,&quot;size&quot;:&quot;70 Sqm Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2016-2363Brich&quot;}'),
(64, '', NULL, NULL, NULL, 'Một sự kết hợp giữa phòng khám bệnh và nơi ở', 'Một sự kết hợp giữa phòng khám bệnh và nơi ở', 'Phòng khám &amp; nhà ở(Clinic &amp; Townhomes_DTH)', 'Phòng khám &amp; nhà ở(Clinic &amp; Townhomes_LTH)', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Kết hợp giữa ph&amp;amp;ograve;ng kh&amp;amp;aacute;m bệnh nhỏ v&amp;amp;agrave; nơi ở. Tạo 1 giếng trời ph&amp;amp;iacute;a cuối c&amp;amp;ocirc;ng tr&amp;amp;igrave;nh tạo th&amp;amp;ocirc;ng tho&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Kết hợp giữa ph&amp;amp;ograve;ng kh&amp;amp;aacute;m bệnh nhỏ v&amp;amp;agrave; nơi ở. Tạo 1 giếng trời ph&amp;amp;iacute;a cuối c&amp;amp;ocirc;ng tr&amp;amp;igrave;nh tạo th&amp;amp;ocirc;ng tho&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n&amp;lt;/p&amp;gt;', 10, '2021-04-11 23:12:31', '{&quot;location&quot;:&quot;\\u0110\\u01b0\\u1eddng \\u0110inh Ti\\u00ean Ho\\u00e0ng, Tp. Sadec, \\u0110\\u1ed3ng Th\\u00e1p&quot;,&quot;size&quot;:&quot;180m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Dinh Tien Hoang str., Sadec, Dong Thap&quot;,&quot;size&quot;:&quot;180 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2017-DTH&quot;}'),
(65, '', NULL, NULL, NULL, 'Đưa thiên nhiên vào trong căn nhà phố nhỏ', 'Đưa thiên nhiên vào trong căn nhà phố nhỏ', 'Nhà phố( Townhomes_HMP)', 'Nhà phố( Townhomes_HMP)', '&amp;lt;p&amp;gt;Tạo một căn nh&amp;amp;agrave; phố nhỏ nhưng với tr&amp;amp;agrave;n ngập &amp;amp;aacute;nh s&amp;amp;aacute;ng v&amp;amp;agrave; trồng c&amp;amp;acirc;y trong nh&amp;amp;agrave; Tạo sự gần gũi với thi&amp;amp;ecirc;n nhi&amp;amp;ecirc;n, đối lưu kh&amp;amp;ocirc;ng kh&amp;amp;iacute; giữa nh&amp;amp;agrave; tạo sự kh&amp;amp;aacute;c biệt.&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Tạo một căn nh&amp;amp;agrave; phố nhỏ nhưng với tr&amp;amp;agrave;n ngập &amp;amp;aacute;nh s&amp;amp;aacute;ng v&amp;amp;agrave; trồng c&amp;amp;acirc;y trong nh&amp;amp;agrave; Tạo sự gần gũi với thi&amp;amp;ecirc;n nhi&amp;amp;ecirc;n, đối lưu kh&amp;amp;ocirc;ng kh&amp;amp;iacute; giữa nh&amp;amp;agrave; tạo sự kh&amp;amp;aacute;c biệt.&amp;lt;/p&amp;gt;', 7, '2021-04-13 17:45:47', '{&quot;location&quot;:&quot;\\u0110\\u01b0\\u1eddng Tr\\u1ea7n Ph\\u00fa, Kh\\u00f3m T\\u00e2n B\\u00ecnh, P. An H\\u00f2a, Tp. Sadec, \\u0110\\u1ed3ng Th\\u00e1p&quot;,&quot;size&quot;:&quot;150m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Tran phu, sadec, dong thap&quot;,&quot;size&quot;:&quot;150 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2017-HMP&quot;}'),
(66, '', NULL, NULL, NULL, 'Nội thất cho 1 phòng khám đa khoa quy mô nhỏ', 'Nội thất cho 1 phòng khám đa khoa quy mô nhỏ', 'Phòng khám đa khoa( Interior Clinic_LXH)', 'Phòng khám đa khoa( Interior Clinic_LXH)', '&amp;lt;p&amp;gt;Diện t&amp;amp;iacute;ch hạn hẹp trong khi đ&amp;amp;oacute; phải bố tr&amp;amp;iacute; c&amp;amp;aacute;c kh&amp;amp;ocirc;ng gian chức năng đầy đủ l&amp;amp;agrave; một th&amp;amp;aacute;ch thức.&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Diện t&amp;amp;iacute;ch hạn hẹp trong khi đ&amp;amp;oacute; phải bố tr&amp;amp;iacute; c&amp;amp;aacute;c kh&amp;amp;ocirc;ng gian chức năng đầy đủ l&amp;amp;agrave; một th&amp;amp;aacute;ch thức.&amp;lt;/p&amp;gt;', 8, '2021-04-13 17:48:06', '{&quot;location&quot;:&quot;\\u0110\\u01b0\\u1eddng Tr\\u1ea7n H\\u01b0ng \\u0110\\u1ea1o, Tp. Long Xuy\\u00ean, An Giang&quot;,&quot;size&quot;:&quot;550m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Tran Hung Dao str., Long Xuyen, An Giang&quot;,&quot;size&quot;:&quot;550 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2017-Clinic_LXH&quot;}'),
(67, '', NULL, NULL, NULL, 'Cải tạo không gian nội thất căn hộ nhỏ', 'Cải tạo không gian nội thất căn hộ nhỏ', 'Nội thất căn hộ( Interior apartment_TQI)', 'Nội thất căn hộ( Interior apartment_TQI)', '&amp;lt;p&amp;gt;Chủ đầu tư muốn cải tạo tầng 1 để ở v&amp;amp;agrave; b&amp;amp;ecirc;n dưới cho thu&amp;amp;ecirc;, nội thất nhẹ nh&amp;amp;agrave;ng đơn giản cho người cao tuổi&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Chủ đầu tư muốn cải tạo tầng 1 để ở v&amp;amp;agrave; b&amp;amp;ecirc;n dưới cho thu&amp;amp;ecirc;, nội thất nhẹ nh&amp;amp;agrave;ng đơn giản cho người cao tuổi&amp;lt;/p&amp;gt;', 5, '2021-04-19 22:09:46', '{&quot;location&quot;:&quot;\\u0110\\u01b0\\u1eddng T\\u00e2n Qu\\u00fd, Q. T\\u00e2n Ph\\u00fa, Tp. HCM&quot;,&quot;size&quot;:&quot;150m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Tan Quy str., Tan Phu Dist., HCMC&quot;,&quot;size&quot;:&quot;150 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2018-TQI&quot;}'),
(68, '', NULL, NULL, NULL, 'HƠI THỞ KIẾN TRÚC ĐỊA TRUNG HẢI TRONG KHU BIỆT THỰ VƯỜN', 'BREATHING MEDITERRANEAN STYLE IN GARDEN VILLA', 'BIỆT THỰ VƯỜN PHONG CÁCH ĐỊA TRUNG HẢI, SÔNG XOÀI BÀ RỊA_VBR', 'BIỆT THỰ VƯỜN PHONG CÁCH ĐỊA TRUNG HẢI, SÔNG XOÀI BÀ RỊA_VBR', '&amp;lt;p&amp;gt;Chủ đầu tư l&amp;amp;agrave; 1 người Mỹ gốc Việt đ&amp;amp;atilde; ở Mỹ l&amp;amp;acirc;u năm v&amp;amp;agrave; muốn x&amp;amp;acirc;y dựng ng&amp;amp;ocirc;i bi&amp;amp;ecirc;t thự nghỉ dưỡng tại v&amp;amp;ugrave;ng đồi n&amp;amp;uacute;i gần biển tại Việt Nam. Họ mong muốn 1 kiến tr&amp;amp;uacute;c nh&amp;amp;igrave;n để gợi nhớ qu&amp;amp;ecirc; hương thứ 2 l&amp;amp;agrave; nước Mỹ sau khi về Việt Nam, kiến tr&amp;amp;uacute;c Địa Trung Hải l&amp;amp;agrave; lối kiến tr&amp;amp;uacute;c họ muốn, kết hợp s&amp;amp;acirc;n vườn Việt Nam&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Chủ đầu tư l&amp;amp;agrave; 1 người Mỹ gốc Việt đ&amp;amp;atilde; ở Mỹ l&amp;amp;acirc;u năm v&amp;amp;agrave; muốn x&amp;amp;acirc;y dựng ng&amp;amp;ocirc;i bi&amp;amp;ecirc;t thự nghỉ dưỡng tại v&amp;amp;ugrave;ng đồi n&amp;amp;uacute;i gần biển tại Việt Nam. Họ mong muốn 1 kiến tr&amp;amp;uacute;c nh&amp;amp;igrave;n để gợi nhớ qu&amp;amp;ecirc; hương thứ 2 l&amp;amp;agrave; nước Mỹ sau khi về Việt Nam, kiến tr&amp;amp;uacute;c Địa Trung Hải l&amp;amp;agrave; lối kiến tr&amp;amp;uacute;c họ muốn, kết hợp s&amp;amp;acirc;n vườn Việt Nam&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:12:02', '{&quot;location&quot;:&quot;S\\u00f4ng Xo\\u00e0i, T\\u00e2n Th\\u00e0nh, Ph\\u00fa M\\u1ef9, B\\u00e0 R\\u1ecba V\\u0169ng T\\u00e0u&quot;,&quot;size&quot;:&quot;4900m2&quot;,&quot;client&quot;:&quot;C\\u00e1 nh\\u00e2n&quot;}', '{&quot;location&quot;:&quot;Song Xoai, Tan Thanh, Phu My, Ba Ria Vung Tau&quot;,&quot;size&quot;:&quot;4900 Sqm area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;INPROGRESS&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;C\\u00f4ng ty x\\u00e2y d\\u1ef1ng C\\u00e1t Xanh&quot;,&quot;projectCode&quot;:&quot;#2019-VBR&quot;}'),
(69, '', NULL, NULL, NULL, 'Kính tạo không gian rộng hơn trong kiến trúc hiện đại', 'Kính tạo không gian rộng hơn trong kiến trúc hiện đại', 'Nội thất căn hộ 2 tầng (duplex apartment)_UD1', 'Nội thất căn hộ 2 tầng (duplex apartment)_UD1', '&amp;lt;p&amp;gt;Sử dụng c&amp;amp;aacute;c mản k&amp;amp;iacute;nh nghệ thuật tạo cảm gi&amp;amp;aacute;c rộng r&amp;amp;atilde;i trong kh&amp;amp;ocirc;ng gian căn hộ hiện đại.&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Sử dụng c&amp;amp;aacute;c mản k&amp;amp;iacute;nh nghệ thuật tạo cảm gi&amp;amp;aacute;c rộng r&amp;amp;atilde;i trong kh&amp;amp;ocirc;ng gian căn hộ hiện đại.&amp;lt;/p&amp;gt;', 6, '2021-04-19 22:14:42', '{&quot;location&quot;:&quot;Qu\\u1eadn 7, HCMC&quot;,&quot;size&quot;:&quot;120m2&quot;,&quot;client&quot;:&quot;C\\u00e1 nh\\u00e2n&quot;}', '{&quot;location&quot;:&quot;District 7, HCMC&quot;,&quot;size&quot;:&quot;120 Sqm area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2019-UD1&quot;}'),
(70, '', NULL, NULL, NULL, 'KHÔNG GIAN XANH BAO QUANH BIỆT THỰ', 'GREEN SPACE AROUND VILLA', 'VILLA GARDEN_SDV', 'VILLA GARDEN_SDV', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Tọa lạc ở ngoại &amp;amp;ocirc; TP Sadec. Dự &amp;amp;aacute;n SDV l&amp;amp;agrave; một biệt thự vườn mang xu hướng cổ điển. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong thật nhiều. Đồng thời tạo được nhiều g&amp;amp;oacute;c nh&amp;amp;igrave;n từ trong ra ngo&amp;amp;agrave;i s&amp;amp;acirc;n vườn Với hồ bơi, ph&amp;amp;ograve;ng tập gym, s&amp;amp;acirc;n vườn c&amp;amp;acirc;y cảnh, tạo 1 khu biệt thự nghỉ dưỡng đẳng cấp&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Tọa lạc ở ngoại &amp;amp;ocirc; TP Sadec. Dự &amp;amp;aacute;n SDV l&amp;amp;agrave; một biệt thự vườn mang xu hướng cổ điển. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong thật nhiều. Đồng thời tạo được nhiều g&amp;amp;oacute;c nh&amp;amp;igrave;n từ trong ra ngo&amp;amp;agrave;i s&amp;amp;acirc;n vườn Với hồ bơi, ph&amp;amp;ograve;ng tập gym, s&amp;amp;acirc;n vườn c&amp;amp;acirc;y cảnh, tạo 1 khu biệt thự nghỉ dưỡng đẳng cấp&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:19:59', '{&quot;location&quot;:&quot;T\\u00e2n Ph\\u00fa \\u0110\\u00f4ng, Tp. SaDec, T\\u1ec9nh \\u0110\\u1ed3ng Th\\u00e1p&quot;,&quot;size&quot;:&quot;5300m2 \\/ 400m2 villa&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Tan Phu Dong, SaDec, Dong Thap&quot;,&quot;size&quot;:&quot;5300 Sqm(site)\\/ 400 sqm Villa Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;DESIGNED&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2019-SDV&quot;}'),
(71, '', NULL, NULL, NULL, 'Biệt thự phố hiện đại/ Modern VILLA', 'Biệt thự phố hiện đại/ Modern VILLA', 'Biệt thự phố, Phù cát, Bình Định _ PCV', 'Biệt thự phố, Phù cát, Bình Định _ PCV', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;color: #000000;&amp;quot;&amp;gt; &amp;lt;span style=&amp;quot;font-size: 14pt; line-height: 107%; font-family: Arial, sans-serif;&amp;quot;&amp;gt;Toa lạc v&amp;amp;ugrave;ng biển nắng gi&amp;amp;oacute; kh&amp;amp;ocirc; cằn . Dự &amp;amp;aacute;n PCV l&amp;amp;agrave; một biệt thự phố mang xu hướng hiện đại. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong c&amp;amp;ocirc;ng tr&amp;amp;igrave;nh&amp;lt;/span&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;font-family: Arial, sans-serif; font-size: 18.6667px;&amp;quot;&amp;gt;Toa lạc v&amp;amp;ugrave;ng biển nắng gi&amp;amp;oacute; kh&amp;amp;ocirc; cằn . Dự &amp;amp;aacute;n PCV l&amp;amp;agrave; một biệt thự phố mang xu hướng hiện đại. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong c&amp;amp;ocirc;ng tr&amp;amp;igrave;nh&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:22:28', '{&quot;location&quot;:&quot;Ph\\u00f9 C\\u00e1t, B\\u00ecnh \\u0110\\u1ecbnh&quot;,&quot;size&quot;:&quot;457,3m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Phu Cat , Binh Dinh&quot;,&quot;size&quot;:&quot;457,3 Sqm site area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2019-PCV&quot;}'),
(72, '', NULL, NULL, NULL, 'Mặt đứng công trình hướng Tây tạo điểm nhấn', 'Mặt đứng công trình hướng Tây tạo điểm nhấn', 'Nhà phố hiện đại_DHT (Modern Townhomes_DHT)', 'Nhà phố hiện đại_DHT (Modern Townhomes_DHT)', '&amp;lt;p class=&amp;quot;MsoListParagraphCxSpFirst&amp;quot; style=&amp;quot;mso-add-space: auto; text-align: justify; margin: 0in 39.35pt 8.0pt 12.7pt;&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; mso-themecolor: background1;&amp;quot;&amp;gt;Giải ph&amp;amp;aacute;p cho nh&amp;amp;agrave; phố c&amp;amp;oacute; mặt đứng hướng T&amp;amp;acirc;y. &amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; mso-themecolor: background1;&amp;quot;&amp;gt;Mảng xanh v&amp;amp;agrave; hệ lam tạo điểm nhấn , phong c&amp;amp;aacute;ch hiện đại gần gũi với thi&amp;amp;ecirc;n nhi&amp;amp;ecirc;n, xu hướng trong kiến tr&amp;amp;uacute;c bền vững&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;Solution for townhomes with a western facade. Green and louver create highlight, modern style with natural, trend in sustainable architecture.&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:24:17', '{&quot;location&quot;:&quot;Dong Hung Thuan Ward, Dist 12 , HCMC&quot;,&quot;size&quot;:&quot;220m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Dong Hung Thuan Ward, Dist 12, HCMC&quot;,&quot;size&quot;:&quot;220 Sqm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2019-DHT&quot;}'),
(73, '', NULL, NULL, NULL, 'Không gian ấm cúng cho gia đình nhỏ', 'Không gian ấm cúng cho gia đình nhỏ', 'Nhà phố hiện đại_CH8( Modern townhomes_CH8)', 'Nhà phố hiện đại_CH8( Modern townhomes_CH8)', '&amp;lt;p class=&amp;quot;MsoListParagraph&amp;quot; style=&amp;quot;mso-add-space: auto; text-align: justify; margin: 0in 39.35pt 8.0pt 12.7pt;&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14pt; line-height: 107%; font-family: Arial, sans-serif; color: #000000;&amp;quot;&amp;gt;Kh&amp;amp;ocirc;ng gian ấm c&amp;amp;uacute;ng hiện đại , nhẹ nh&amp;amp;agrave;ng cho gia d&amp;amp;igrave;nh nhỏ 4 người quay quần sau thời gian 1 ng&amp;amp;agrave;y l&amp;amp;agrave;m việc v&amp;amp;agrave; học tập&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Client: Private&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Type: Townhouse&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Status: Complete design&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Details: 170 Spm &amp;lt;span style=&amp;quot;mso-spacerun: yes;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;area&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Venue: Hung Phu, Dist 8, HCMC&amp;lt;/p&amp;gt;\r\n&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;#Design: TV Architects&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:28:24', '{&quot;location&quot;:&quot;Hung Phu, Dist 8, HCMC&quot;,&quot;size&quot;:&quot;170m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Hung Phu, Dist 8, HCMC&quot;,&quot;size&quot;:&quot;170 Spm  area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2019-CH8&quot;}'),
(74, '', NULL, NULL, NULL, 'KHÔNG GIAN XANH BAO QUANH BIỆT THỰ', 'GREEN SPACE AROUND VILLA', 'VILLA GARDEN', 'VILLA GARDEN', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Toa lạc ở ngoại &amp;amp;ocirc; TP Sadec. Dự &amp;amp;aacute;n SV2 l&amp;amp;agrave; một biệt thự vườn mang xu hướng hiện đại. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong thật nhiều. Đồng thời tạo được nhiều g&amp;amp;oacute;c nh&amp;amp;igrave;n từ trong ra ngo&amp;amp;agrave;i s&amp;amp;acirc;n vườn.&amp;amp;nbsp;&amp;lt;/p&amp;gt;', '&amp;lt;p class=&amp;quot;MsoNormal&amp;quot;&amp;gt;Toa lạc ở ngoại &amp;amp;ocirc; TP Sadec. Dự &amp;amp;aacute;n SV2 l&amp;amp;agrave; một biệt thự vườn mang xu hướng hiện đại. Dự &amp;amp;aacute;n mang lại cho chủ đầu tư một diện mạo mới trong khu vực. C&amp;amp;ocirc;ng tr&amp;amp;igrave;nh ch&amp;amp;uacute; trọng tạo &amp;amp;aacute;nh s&amp;amp;aacute;ng tự nhi&amp;amp;ecirc;n v&amp;amp;agrave;o b&amp;amp;ecirc;n trong thật nhiều. Đồng thời tạo được nhiều g&amp;amp;oacute;c nh&amp;amp;igrave;n từ trong ra ngo&amp;amp;agrave;i s&amp;amp;acirc;n vườn.&amp;amp;nbsp;&amp;lt;/p&amp;gt;', 7, '2021-04-19 22:37:10', '{&quot;location&quot;:&quot;Th\\u00e0nh Ph\\u1ed1 Sa \\u0110\\u00e9c, \\u0110\\u1ed3ng Th\\u00e1p&quot;,&quot;size&quot;:&quot;5300m2 \\/ 400m2 villa&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;Tan Phu Dong, SaDec City, Dong Thap&quot;,&quot;size&quot;:&quot;5300 Sqm(site)\\/ 400 sqm Villa Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;DESIGNED&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2020-SV2&quot;}'),
(75, '', NULL, NULL, NULL, 'TẠO SỰ TỐI GIẢN HIỆN ĐẠI ', 'TẠO SỰ TỐI GIẢN HIỆN ĐẠI ', 'DONG LE ‘HOUSE, TOWNHOMES_DLH', 'DONG LE ‘HOUSE, TOWNHOMES_DLH', '&amp;lt;p class=&amp;quot;MsoListParagraph&amp;quot; style=&amp;quot;mso-add-space: auto; text-align: justify; margin: 0in 39.35pt 8.0pt 12.7pt;&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; mso-themecolor: background1;&amp;quot;&amp;gt;TẠO SỰ TỐI GIẢN CẦN THIẾT , VỚI 1 PHONG C&amp;amp;Aacute;CH HIỆN ĐẠI, C&amp;amp;Ugrave;NG M&amp;amp;Agrave;U SẮC TẠO SỰ THANH LỊCH TRONG NG&amp;amp;Ocirc;I NH&amp;amp;Agrave;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;font-size: 14pt; line-height: 107%; font-family: Arial, sans-serif; color: #000000;&amp;quot;&amp;gt;CREATING TO Necessary Simplicity, WITH MODERN STYLE, AND COLORS creates elegance in the house.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', 7, '2021-05-19 22:01:12', '{&quot;location&quot;:&quot;T\\u00c2N TH\\u1edaI H\\u00d2A, T\\u00c2N PH\\u00da, HCM&quot;,&quot;size&quot;:&quot;220m2&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;location&quot;:&quot;T\\u00c2N TH\\u1edaI H\\u00d2A, T\\u00c2N PH\\u00da, HCM&quot;,&quot;size&quot;:&quot;220 Sqm Area&quot;,&quot;client&quot;:&quot;Private&quot;}', '{&quot;status&quot;:&quot;BUILT&quot;,&quot;design&quot;:&quot;TV Architects&quot;,&quot;collaboration&quot;:&quot;&quot;,&quot;projectCode&quot;:&quot;#2020-DLH&quot;}');

-- --------------------------------------------------------

--
-- Table structure for table `project_image`
--

CREATE TABLE `project_image` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image_link` mediumtext COLLATE utf16_unicode_ci,
  `description_vn` longtext COLLATE utf16_unicode_ci,
  `description_en` longtext COLLATE utf16_unicode_ci,
  `display` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `project_image`
--

INSERT INTO `project_image` (`id`, `project_id`, `image_link`, `description_vn`, `description_en`, `display`) VALUES
(101, 70, '../images/1621522271-VILLA01.jpg', '', '', 1),
(95, 70, '../images/1621522271-VILLA02_day.jpg', '', '', 1),
(96, 70, '../images/1618845598-Bedroom02_view02.jpg', '', '', 1),
(97, 70, '../images/1618845598-Bedroom02_view03.jpg', '', '', 1),
(98, 70, '../images/1618845598-Bedroom03_view01.jpg', '', '', 1),
(99, 70, '../images/1618845598-Bedroom03_view03.jpg', '', '', 1),
(100, 70, '../images/1618845598-Gym-Bidaview01.jpg', '', '', 1),
(47, 64, '../images/1618157551-ok-man.jpg', '', '', 1),
(48, 64, '../images/1618157551-reception-02.jpg', '', '', 1),
(49, 64, '../images/1618157551-KITCHEN-01.jpg', '', '', 1),
(66, 67, '../images/1621528038-ALTAR02.jpg', '', '', 1),
(67, 67, '../images/1618844985-MB03.jpg', '', '', 1),
(68, 67, '../images/1618844985-v2.jpg', '', '', 1),
(69, 68, '../images/1621523195-POOL-VIEW-bbq.jpg', '', '', 1),
(70, 68, '../images/1621523195-POOL-VIEW.jpg', '', '', 1),
(71, 68, '../images/1621523195-BBQ.jpg', '', '', 1),
(72, 68, '../images/1621523196-bird view.jpg', '', '', 1),
(73, 68, '../images/1621523196-Fence-View-02.jpg', '', '', 1),
(74, 68, '../images/1621523196-FRONT-VIEW.jpg', '', '', 1),
(75, 68, '../images/1621523196-LEFT-FRONT-VIEW.jpg', '', '', 1),
(76, 69, '../images/1618845282-DUP-01.jpg', '', '', 1),
(77, 69, '../images/1618845282-DUP-05.jpg', '', '', 1),
(78, 69, '../images/1618845282-IMG_1570236942477_1570246457155.jpg', '', '', 1),
(79, 69, '../images/1618845282-IMG_1570236942508_1570246456855.jpg', '', '', 1),
(80, 69, '../images/1618845282-IMG_1570236942711_1570246456946.jpg', '', '', 1),
(81, 69, '../images/1618845282-IMG_1570236942934_1570246456739.jpg', '', '', 1),
(82, 69, '../images/1618845282-NGU-BB-01.jpg', '', '', 1),
(83, 69, '../images/1618845282-NGU-BB-03.jpg', '', '', 1),
(84, 69, '../images/1618845282-NGU-CG-02.jpg', '', '', 1),
(85, 69, '../images/1618845282-NGU-OB-02.jpg', '', '', 1),
(86, 69, '../images/1618845282-NGU-OB-03.jpg', '', '', 1),
(87, 70, '../images/1618845598-VILLA01.jpg', '', '', 1),
(88, 70, '../images/1618845598-VILLA01_day.jpg', '', '', 1),
(89, 70, '../images/1618845598-VILLA02.jpg', '', '', 1),
(90, 70, '../images/1618845598-VILLA02_day.jpg', '', '', 1),
(91, 70, '../images/1618845598-FRONT-VILLA.jpg', '', '', 1),
(92, 70, '../images/1618845598-FRONT-VILLA_day.jpg', '', '', 1),
(93, 70, '../images/1618845598-GARAGE.jpg', '', '', 1),
(94, 70, '../images/1618845598-GYM-ENTERTAIMENT.jpg', '', '', 1),
(65, 67, '../images/1618844985-MB01.jpg', '', '', 1),
(50, 59, '../images/1618310584-view2.jpg', '', '', 1),
(51, 59, '../images/1618310584-view2.jpg', '', '', 1),
(52, 63, '../images/1618158507-birch.jpg', '', '', 1),
(53, 65, '../images/1621528305-02.jpg', '', '', 1),
(54, 65, '../images/1621528305-c.jpg', '', '', 1),
(55, 65, '../images/1618310747-DINING RM 01.jpg', '', '', 1),
(56, 65, '../images/1618310747-DINING-RM-02.jpg', '', '', 1),
(57, 65, '../images/1618310747-LIV-RM-02.jpg', '', '', 1),
(58, 66, '../images/1621528090-level1-02.jpg', '', '', 1),
(59, 66, '../images/1621528090-level1-03.jpg', '', '', 1),
(60, 66, '../images/1618314630-level2-01.jpg', '', '', 1),
(61, 66, '../images/1618314630-level3-01.jpg', '', '', 1),
(62, 66, '../images/1618314630-level3-02.jpg', '', '', 1),
(63, 66, '../images/1618314630-level3-04.jpg', '', '', 1),
(64, 67, '../images/1618844985-ALTAR02.jpg', '', '', 1),
(45, 64, '../images/1618157551-OFFICE-ROOM-01.jpg', '', '', 1),
(46, 64, '../images/1618157551-OFFICE-ROOM-02.jpg', '', '', 1),
(23, 60, '../images/1621393451-view1.jpg', '', '', 1),
(24, 60, '../images/1621393451-view2.jpg', '', '', 1),
(25, 61, '../images/1618158752-06-repair.jpg', 'Phối cảnh chính diện', 'Front 3D', 1),
(26, 61, '../images/1618158752-view2-repair.jpg', 'Phối cảnh chính diện', 'Front 3D', 1),
(27, 61, '../images/1618158752-01-LIVING-RM01.jpg', 'Phối cảnh phòng khách', '', 1),
(28, 61, '../images/1618158752-03-KITCHEN.jpg', 'Phối cảnh phòng bếp', '', 1),
(29, 61, '../images/1618158752-06-BATH-RM-MB-01.jpg', 'Phòng tắm #1', '', 1),
(30, 61, '../images/1618158752-07-BED-RM02.jpg', 'Phòng ngủ #1', '', 1),
(31, 61, '../images/1618158752-08-BED-RM-01.jpg', 'Phòng ngủ #1', '', 1),
(32, 61, '../images/1618158752-09-ALTAR-01.jpg', 'Phòng thờ #1', '', 1),
(33, 61, '../images/1618158752-11-BATH-RM-MB-01.jpg', 'Phòng tắm #2', '', 1),
(34, 61, '../images/1618158752-11-BATH-RM-MB-02.jpg', 'Phòng tắm #3', '', 1),
(35, 62, '../images/1621528636-1-phong khach_edited.jpg', 'Phòng ăn', '', 1),
(36, 62, '../images/1621528753-MASTER-VIEW01.JPG', 'Phòng ngủ master', '', 1),
(37, 62, '../images/1621528753-MASTER-VIEW02.JPG', 'Phòng ngủ master', '', 1),
(38, 62, '../images/1621528753-2- phong bep.jpg', 'Phòng bếp', '', 1),
(39, 62, '../images/1621528753-3- phong an.jpg', 'Bếp', '', 1),
(40, 62, '../images/1621528753-bep hoa hao.jpg', 'Phòng khách', '', 1),
(41, 62, '../images/1621528753-bep.jpg', 'Master view #1', '', 1),
(42, 62, '../images/1618156676-MASTER-VIEW02.JPG', 'Master view #2', '', 1),
(102, 70, '../images/1618845598-Gym-Bidaview04.jpg', '', '', 1),
(103, 70, '../images/1618845598-KITCHEN01.jpg', '', '', 1),
(104, 70, '../images/1618845598-KITCHEN02.jpg', '', '', 1),
(105, 70, '../images/1618845599-KITCHEN03.jpg', '', '', 1),
(106, 70, '../images/1618845599-Livingroom_view01.jpg', '', '', 1),
(107, 70, '../images/1618845641-Livingroom_view02.jpg', '', '', 1),
(108, 70, '../images/1618845641-Livingroom_view03.jpg', '', '', 1),
(109, 70, '../images/1618845641-RumpusRoom.jpg', '', '', 1),
(110, 71, '../images/1621443102-ENS1.jpg', '', '', 1),
(111, 71, '../images/1621443103-ENS2.jpg', '', '', 1),
(112, 71, '../images/1621443103-ENS3.jpg', '', '', 1),
(113, 71, '../images/1621443103-ENS4.jpg', '', '', 1),
(114, 72, '../images/1621442857-VIEW01.jpg', '', '', 1),
(115, 72, '../images/1621442857-VIEW02 (2).jpg', '', '', 1),
(116, 72, '../images/1621442857-View02.JPG', '', '', 1),
(117, 72, '../images/1621442857-View03.JPG', '', '', 1),
(118, 73, '../images/1618846104-BEDRM1-02.jpg', '', '', 1),
(119, 73, '../images/1618846104-view-1.jpg', '', '', 1),
(120, 73, '../images/1618846104-view-3.jpg', '', '', 1),
(121, 73, '../images/1618846104-view-4.jpg', '', '', 1),
(122, 73, '../images/1618846104-view-6.jpg', '', '', 1),
(123, 74, '../images/1618847525-1.jpg', '', '', 1),
(125, 74, '../images/1618847525-2.jpg', '', '', 1),
(124, 74, '../images/1618847525-20200724_MAS 02.jpg', '', '', 1),
(126, 74, '../images/1618847525-3.jpg', '', '', 1),
(127, 74, '../images/1618847525-4.jpg', '', '', 1),
(128, 74, '../images/1618847525-5.jpg', '', '', 1),
(129, 74, '../images/1618847525-6.jpg', '', '', 1),
(130, 74, '../images/1618847525-7.jpg', '', '', 1),
(131, 74, '../images/1618847525-20200724_MAS 01.jpg', '', '', 1),
(132, 74, '../images/1618847525-20200724_MAS 03.jpg', '', '', 1),
(133, 74, '../images/1618847525-20200724_MAS 04.jpg', '', '', 1),
(134, 74, '../images/1618847525-20200724_PK  01.jpg', '', '', 1),
(135, 74, '../images/1618847525-20200724_PK  02.jpg', '', '', 1),
(136, 74, '../images/1618847525-20200724_PN  01.jpg', '', '', 1),
(137, 74, '../images/1618847525-20200724_PN  02.jpg', '', '', 1),
(138, 74, '../images/1618847525-20200724_PN  03.jpg', '', '', 1),
(139, 74, '../images/1618847525-20200724_PN  04.jpg', '', '', 1),
(140, 74, '../images/1618847525-BEDROOM3-01.jpg', '', '', 1),
(141, 74, '../images/1618847525-BEDROOM3-02.jpg', '', '', 1),
(142, 74, '../images/1618847525-BEDROOM3-03.jpg', '', '', 1),
(143, 74, '../images/1618847595-BEDROOM3-03.jpg', '', '', 1),
(144, 74, '../images/1618847595-BEDROOM3-05.jpg', '', '', 1),
(145, 74, '../images/1621395826-BEP 01.jpg', '', '', 1),
(146, 74, '../images/1621395826-BEP 02.jpg', '', '', 1),
(147, 74, '../images/1621395826-BEP 03.jpg', '', '', 1),
(148, 74, '../images/1621395826-BEP 04.jpg', '', '', 1),
(149, 74, '../images/1621395826-BEDROOM3-05.jpg', '', '', 1),
(150, 74, '../images/1621395826-ENS01.jpg', '', '', 1),
(151, 74, '../images/1621395827-ENS02.jpg', '', '', 1),
(152, 74, '../images/1621395827-EN03.jpg', '', '', 1),
(153, 74, '../images/1621395827-karaoke01.jpg', '', '', 1),
(154, 74, '../images/1621395827-karaoke02.jpg', '', '', 1),
(155, 74, '../images/1621395827-Living Rm03.jpg', '', '', 1),
(156, 74, '../images/1618847658-PK 03.jpg', '', '', 1),
(157, 75, '../images/1621436706-NG 01.jpg', '', '', 1),
(158, 75, '../images/1621436706-NG 02.jpg', '', '', 1),
(159, 75, '../images/1621436706-NG 03.jpg', '', '', 1),
(160, 75, '../images/1621440926-BABY 01.jpg', '', '', 1),
(161, 75, '../images/1621440926-BABY 02.jpg', '', '', 1),
(162, 75, '../images/1621440927-BABY 03.jpg', '', '', 1),
(163, 75, '../images/1621441174-BED01-01.jpg', '', '', 1),
(164, 75, '../images/1621441175-BED01-02.jpg', '', '', 1),
(165, 75, '../images/1621441175-BED01-03.jpg', '', '', 1),
(166, 75, '../images/1621441175-BED02-01.jpg', '', '', 1),
(167, 75, '../images/1621441175-BED02-02.jpg', '', '', 1),
(168, 75, '../images/1621441175-BED02-03.jpg', '', '', 1),
(169, 75, '../images/1621441175-BED02-04.jpg', '', '', 1),
(170, 75, '../images/1621441176-KIT01.jpg', '', '', 1),
(171, 75, '../images/1621442693-KIT02.jpg', '', '', 1),
(172, 75, '../images/1621442694-KIT03.jpg', '', '', 1),
(173, 75, '../images/1621442694-KIT04.jpg', '', '', 1),
(174, 75, '../images/1621442694-LR01.jpg', '', '', 1),
(175, 72, '../images/1621442857-View04.JPG', '', '', 1),
(176, 75, '../images/1621442954-LR02.jpg', '', '', 1),
(177, 75, '../images/1621442954-LR03.jpg', '', '', 1),
(178, 75, '../images/1621442954-LR04.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf16_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `token`) VALUES
(2, 'dongle', '', '$2y$10$uiQNYEZzgmd4wr5T6EnEx.CbbxPDoLV.krdKuzJRMWgRH6P6hLQ6S', 'dong.lquang@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firebase_token`
--
ALTER TABLE `firebase_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grow_with_us`
--
ALTER TABLE `grow_with_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_location`
--
ALTER TABLE `office_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_image`
--
ALTER TABLE `project_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `firebase_token`
--
ALTER TABLE `firebase_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grow_with_us`
--
ALTER TABLE `grow_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_location`
--
ALTER TABLE `office_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `project_image`
--
ALTER TABLE `project_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
