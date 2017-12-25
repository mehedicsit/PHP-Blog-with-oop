-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 12:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `catname`) VALUES
(1, 'HTML'),
(2, 'css'),
(3, 'jquery '),
(4, 'jasavscript'),
(5, 'node js'),
(6, 'sql'),
(7, 'oracle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`page_id`, `page_title`, `page_content`) VALUES
(1, 'service page', '<p>This is service page</p>'),
(2, 'a night with kam', '<p>we are doing php each other and its really very good stuff</p>'),
(3, 'our family', '<p>This is about our family&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `tags_id` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `cat_id`, `title`, `content`, `image`, `user_id`, `tags_id`, `dates`) VALUES
(55, 1, 'post for logged in user', 0x3c703e76797574667579666f6c67766668796b6479746374796472747279766669797479206b3c2f703e, 'upload/google-amp-fast-speed-travel-ss-1920.jpg', '7', '', '2017-12-25 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slogan`
--

CREATE TABLE `tbl_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `copyright` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slogan`
--

INSERT INTO `tbl_slogan` (`id`, `title`, `slogan`, `copyright`) VALUES
(1, 'Code4Webs BD', 'A Group of company by kam and raj', '@all rights reserved by code4webs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(55) NOT NULL,
  `twitter` varchar(55) NOT NULL,
  `linkedin` varchar(55) NOT NULL,
  `gplus` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `gplus`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http;//googleplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rule` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `rule`, `name`) VALUES
(6, 'dev.mehedi', 'mahedicsit@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'mehedi'),
(7, 'kamrulbro', 'kamrul@gmail.com', '7363a0d0604902af7b70b271a0b96480', 1, 'kamrul'),
(8, 'tanha', 'tanha@gmail.com', '7363a0d0604902af7b70b271a0b96480', 0, ''),
(9, 'kamrul123', 'kamrul123@test.com', 'b271927282af000781f4c05298556819', 3, ''),
(12, 'akash123', 'dev.mehedi2@test.com', '51b9a160655a085b5100096f873b319e', 3, 'akash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
