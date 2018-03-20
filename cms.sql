-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 02:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(19, 'Demo 1'),
(20, 'Demo 2'),
(21, 'Demo 3'),
(22, 'Demo 4');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(3) NOT NULL,
  `cmt_post_id` int(3) NOT NULL,
  `cmt_author` varchar(32) NOT NULL,
  `cmt_email` varchar(64) DEFAULT NULL,
  `cmt_content` text NOT NULL,
  `cmt_status` varchar(32) NOT NULL DEFAULT 'draft',
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `session`, `time`) VALUES
(56, '8eljb97pl0gpe2hjg1u9ujpq51', 1518292394),
(57, 'eifup6bl5e7glljvned923a7hi', 1518515237),
(58, '28ojfl7grb2vsiiq9ulmav4iuv', 1518559392),
(59, 'rmdqtq03r2sssvtlh4vl2226nn', 1518601359),
(60, '8c7ma73b74lunb99iq02bm4ls4', 1518696721),
(61, 'lmmslipbmukgl2boj86pljj3nn', 1518725688),
(62, 'svlo92fiid4jvebi9o6ee6hk08', 1519207721),
(63, 'lfuo1v2cvqptj7ja9n1o2pbjpe', 1519218069),
(64, 'eajnucjvpnmrqvf80b5oo0t7j9', 1519305968),
(65, 'r7jifu9lloqg15ouuqhnhkm5jf', 1519299091),
(66, 'f2ele2g1puj1cndav5b3ognt5k', 1520018515),
(67, '5an64mhsh4ll5tff6mkejs2ce4', 1521552704);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `post_title` varchar(32) NOT NULL,
  `post_author` varchar(32) NOT NULL,
  `post_date` date NOT NULL,
  `post_img` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` text NOT NULL,
  `post_status` varchar(22) NOT NULL DEFAULT 'draft',
  `views_count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `cat_id`, `post_title`, `post_author`, `post_date`, `post_img`, `post_content`, `post_tag`, `post_status`, `views_count`) VALUES
(6, 19, 'test', 'root', '2018-03-03', 'social.png', 'ja sd;aljdlajdl adlajdajdljalskdja dklj sldjsa kdjlakj d', 'test', 'published', 4),
(7, 19, 'WHat is happening', 'root', '2018-03-03', 'Free-Portfolio-WordPress-Themes.gif', 'One day very soon wentÂ ', 'idk', 'published', 6);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(3) NOT NULL,
  `role_title` varchar(255) NOT NULL DEFAULT 'subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_title`) VALUES
(-1, 'Block'),
(1, 'Admin'),
(2, 'ContentWriter'),
(3, 'Subscriber'),
(4, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `sub_id` int(3) NOT NULL,
  `sub_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`sub_id`, `sub_email`) VALUES
(22, 'blah@blah.com'),
(21, 'dhruvsaaaxena.1998@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `dateAdded` date NOT NULL,
  `user_image` text NOT NULL,
  `role` int(32) NOT NULL DEFAULT '4',
  `for_role` int(32) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `dateAdded`, `user_image`, `role`, `for_role`, `token`) VALUES
(48, 'root', '$2y$12$.4xIyK8L9jB.Q/rFSC18R.jEAKEz7Avg2aVfvC5tj7TM.Ms8hdOrq', 'Default', 'User', 'someone@example.com', '2018-03-03', 'Web.gif', 1, NULL, NULL),
(49, 'test', '$2y$12$P5jvadQ1E.fDNynEv.qK3eaiY5jTcrhDKzn6mZXqMGYrgNzwmWJky', 'test', 'username', 'test@name.com', '2018-02-22', 'girl.png', 2, NULL, NULL),
(51, 'wew', '$2y$12$Xs09VUEfYhpxy9U8BRIwLOy6IgI8pCN9Kg529S/jHmS6zf6vhEOFO', 'Test', 'User', 'tesytesy@ts.com', '2018-02-22', 'testIamge.jpg', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sub_email` (`sub_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `sub_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
