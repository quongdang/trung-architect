-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 03:54 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trungarchitect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `category_vn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_vn`, `category_en`) VALUES
(1, 'Thư mục 1', 'category 1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `title_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `subtitle_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `subtitle_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_vn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `image`, `title_vn`, `title_en`, `subtitle_vn`, `subtitle_en`, `content_vn`, `content_en`, `category_id`, `created`) VALUES
(45, 'images/1523781470-601WestHastings_Hero-2560x1440.jpg', 'West test', '', 'test dia diem', '', '&amp;lt;p&amp;gt;abc&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(46, 'images/1523781491-601WestHastings_SecondaryHero-1000x1600.jpg', 'west has 2', '', 'test 2', '', '&amp;lt;p&amp;gt;test&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(47, 'images/1523781512-Arab-Centre_Hero-1920x1500.jpg', 'Arab centre', '', 'arab', '', '&amp;lt;p&amp;gt;test arab&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(48, 'images/1523781531-DSCF3674-edit-1920x1920.jpg', 'edit', '', 'edit', '', '&amp;lt;p&amp;gt;edit&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(49, 'images/1523781558-Greenland-Riverside-Luwan_Story2-1920x1920.jpg', 'Greenland river', '', 'river', '', '&amp;lt;p&amp;gt;river&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(50, 'images/1523781579-Greenland-Riverside-Luwan_Story3-1920x1920.jpg', 'Luwan story', '', 'luxan', '', '&amp;lt;p&amp;gt;luxan&amp;lt;/p&amp;gt;', '', 0, '0000-00-00 00:00:00'),
(51, 'images/1523781983-601WestHastings_Hero-2560x1440.jpg', 'test folder', '', 'test', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_pass`, `user_email`, `token`) VALUES
(1, 'dongle', '25251325', 'dong.lquang@gmail.com', '');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
