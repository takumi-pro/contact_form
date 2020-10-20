-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: mysql10069.xserver.jp
-- Generation Time: 2020 年 10 月 20 日 20:45
-- サーバのバージョン： 5.7.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xs324271_contact`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `tel`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(9, 'takumi', 'igataku.0927@gmail.com', '09029830927', 'ご感想', 'h', '2020-10-15 13:49:14', '2020-10-15 13:49:14'),
(10, 'takumi', 'igataku.0927@gmail.com', '09029830927', 'ご意見', '公開初テスト', '2020-10-15 18:56:06', '2020-10-15 18:56:06'),
(11, 'takumi', 'takumidiary.0927@gmail.com', '09029830927', 'その他', 'テストです\r\nこれはテスト\r\nテスト内容', '2020-10-15 19:25:50', '2020-10-15 19:25:50'),
(12, 'takumi', 'igataku.0927@gmail.com', '09029830927', 'ご感想', 'よかったです', '2020-10-17 19:05:01', '2020-10-17 19:05:01'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
