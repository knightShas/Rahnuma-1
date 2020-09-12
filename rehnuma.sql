-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2020 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rehnuma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(5) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `email`, `password`) VALUES
(1, 'ansh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'ram@website.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(5) NOT NULL,
  `admin_id` int(5) NOT NULL,
  `img_file` varchar(64) NOT NULL,
  `blog_title` text NOT NULL,
  `srt_dec` text NOT NULL,
  `blog` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `admin_id`, `img_file`, `blog_title`, `srt_dec`, `blog`, `date`) VALUES
(1, 2, '', 'Hole in the Wall ', 'Presenting you the unique game to showcase your talent. This looks easy but will make you bite your nails. Make shapes to pass the levels.', 'A whole new concept of game is going to be presented to all of you. You will have to make shapes to pass levels but with a slight twist. You have to make shapes in just 10 seconds and get through the running wall towards you.', '2020-09-10 21:36:25'),
(2, 1, '', 'More 4 less in 4 days', 'A company is going to start a new chain in our city with 2 outlets in the city. Anyone interested for the sales and marketing job can ping to 98XXXXXX565.', 'Start your day with an extraordinary outfit everyday. \"New Day New Style\" is what we tell our customers to incorporate in their daily life. For this our company is starting new shops in your city too. So come and enjoy \r\nbonanza sale this Durga Puja.', '2020-09-10 21:22:33'),
(3, 2, '', 'Run for Life with Bear Grylls', 'There is a campaign of 10 days in the forest for the overall development of kids as well as adults this September. The host for the campaign is none other than Bear Grylls.', 'Experience the world like never before. 10 days campaign is an opputunity you should no miss. The main attraction of the campaign is the once in a lifetime chance to meet Bear Grylls and spend time in woods with him for 10 days. Exciting, isn\'t it. Register now. ', '2020-09-10 21:31:15'),
(4, 2, '', 'lkahkeijmsd', 'lkahkei', 'lahhiwlaoiojdlknflk ildhlaskhklaefhewkfhkshkhfiuegfyegkbaknka', '2020-09-10 19:37:07'),
(6, 1, '', ',kjdaskhkhskj', ',kjdaskhkhskj', ',kizdshef hih .iaj ihdikahfk ,kh wq; owiwerhlwehl3ioweiwrgncla wiolh hufbkjabuef ', '2020-09-12 18:01:11'),
(8, 0, 'causes-2.jpg', '', '', '', '2020-09-12 22:25:12'),
(9, 1, '', 'mdnb,akj', 'mdnb,akj', 'lkshfuaihfluiheuhauhukeh', '2020-09-12 18:56:20'),
(10, 1, 'imageupload/a.jpg', 'akjdbkjdhakhk', 'akjdbkjdhakhk', 'kjsdbkjfhskulfhkubfckbckbkshdkufhekudbkbskdjbcks', '2020-09-12 19:00:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
