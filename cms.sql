-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 06:40 PM
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
(19, 'CSS'),
(22, 'HTML'),
(20, 'JAVA'),
(24, 'New Category'),
(21, 'PHP');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmt_id`, `cmt_post_id`, `cmt_author`, `cmt_email`, `cmt_content`, `cmt_status`, `cmt_date`) VALUES
(2, 7, 'Test Data', 'testEmail@gmail.com', 'Very Helpfull', 'approved', '2018-05-05');

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
(74, '8vbqnttfjn8a4v490unu893bee', 1525711257);

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
(7, 19, 'WHat is happening', 'root', '2018-05-04', 'Free-Portfolio-WordPress-Themes.gif', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pretium odio id lectus lacinia semper. Sed posuere varius sapien vitae bibendum. In bibendum ipsum ac nunc viverra, nec pharetra odio posuere. Etiam ullamcorper ullamcorper libero, in dictum dui laoreet vel. Donec ultrices o', 'idk, wtf', 'draft', 15),
(9, 20, 'Learn PHP ', 'root', '2018-05-05', 'pgp.jpg', '<p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed neque neque. Fusce congue egestas molestie. Suspendisse quis condimentum sapien. Duis eget pellentesque elit. Morbi metus turpis, convallis varius nunc vel, consectetur sodales nisi. Donec gravida, dolor imperdiet tincidunt tincidunt, orci arcu accumsan est, sit amet euismod erat tellus ac metus. Nulla massa mauris, scelerisque eget ullamcorper vitae, tempus id quam. Mauris et dolor sit amet nisi varius pulvinar. Nam malesuada turpis vel ligula facilisis, sed suscipit felis rhoncus. Nulla accumsan sapien euismod fermentum iaculis. Nulla dignissim eros urna, eget efficitur sapien sagittis a. Mauris posuere facilisis quam, vitae venenatis augue facilisis vel.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\"><br></p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\"><span style=\\\"color: rgb(74, 123, 140);\\\">Curabitur pellentesque elit sed magna pharetra, eu vestibulum nisi aliquet. Fusce sit amet ex sed nibh sodales ultricies. Quisque id urna mauris. Sed id neque sed massa vehicula sagittis a ac nisi. Sed lobortis rutrum arcu, sed ullamcorper lectus dictum vitae. Pellentesque in cursus elit. Cras eleifend lectus vel laoreet tristique. Nunc felis sem, tempus vitae pharetra sit amet, convallis nec dolor. Nullam a blandit turpis, nec vehicula eros. Sed libero libero, posuere vel suscipit eu, porta vulputate purus. Duis eleifend eu lectus ac pellentesque.</span></p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\"><br></p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Sed fringilla hendrerit mauris, eu porta lectus rutrum eget. Vestibulum vitae auctor quam. Vivamus eget facilisis nulla. Nam maximus lectus id libero sodales, bibendum gravida libero vestibulum. Nulla eu convallis tortor. Donec eget luctus ligula, non scelerisque velit. Maecenas nec tincidunt dui. Proin bibendum sollicitudin nisl facilisis lacinia. Phasellus mattis facilisis ullamcorper.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Etiam id nunc mattis, aliquet diam eu, condimentum lorem. Cras et viverra justo. Phasellus molestie quam metus, sit amet aliquet massa aliquet non. Sed a fringilla sapien. Donec hendrerit, ligula id elementum auctor, leo felis sagittis enim, sed imperdiet odio quam in tellus. Duis a nunc metus. Donec placerat convallis eros, at pharetra eros vehicula nec. Mauris non justo laoreet, fermentum magna dictum, tempus lacus. In vitae feugiat quam, ut tincidunt elit. Aliquam ornare augue consectetur suscipit porta. Suspendisse ullamcorper erat mi, dapibus accumsan nulla rhoncus in.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Nulla convallis, mauris blandit iaculis molestie, tortor erat sollicitudin lorem, sit amet venenatis leo est id sapien. Donec eros mi, pellentesque a turpis eu, varius volutpat purus.&nbsp;</p>', 'PHP 7', 'draft', 2),
(10, 22, 'Learn Java', 'root', '2018-05-05', 'java.png', '<p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed neque neque. Fusce congue egestas molestie. Suspendisse quis condimentum sapien. Duis eget pellentesque elit. Morbi metus turpis, convallis varius nunc vel, consectetur sodales nisi. Donec gravida, dolor imperdiet tincidunt tincidunt, orci arcu accumsan est, sit amet euismod erat tellus ac metus. Nulla massa mauris, scelerisque eget ullamcorper vitae, tempus id quam. Mauris et dolor sit amet nisi varius pulvinar. Nam malesuada turpis vel ligula facilisis, sed suscipit felis rhoncus. Nulla accumsan sapien euismod fermentum iaculis. Nulla dignissim eros urna, eget efficitur sapien sagittis a. Mauris posuere facilisis quam, vitae venenatis augue facilisis vel.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Curabitur pellentesque elit sed magna pharetra, eu vestibulum nisi aliquet. Fusce sit amet ex sed nibh sodales ultricies. Quisque id urna mauris. Sed id neque sed massa vehicula sagittis a <span style=\\\"color: rgb(107, 165, 74);\\\">ac nisi. Sed lobortis rutru</span>m arcu, sed ullamcorper lectus dictum vitae. Pellentesque in cursus elit. Cras eleifend lectus vel laoreet tristique. Nunc felis sem, tempus vitae pharetra sit amet, convallis nec dolor. Nullam a blandit turpis, nec vehicula eros. Sed libero libero, posuere vel suscipit eu, porta vulputate purus. Duis eleifend eu lectus ac pellentesque.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">Sed fringilla hendrerit mauris, eu porta lectus rutrum eget. Vestibulum vitae auctor quam. Vivamus eget facilisis nulla. Nam maximus lectus id libero sodales, bibendum gravida libero vestibulum. Nulla eu convallis tortor. Donec eget luctus ligula, non scelerisque velit. Maecenas nec tincidunt dui. Proin bibendum sollicitudin nisl facilisis lacinia. Phasellus mattis facilisis ullamcorper.</span></p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Etiam id nunc mattis, aliquet di<span style=\\\"background-color: rgb(115, 24, 66);\\\">am eu, condimentum lorem. Cras et viverra justo. Phasellus molestie quam metus, sit amet aliquet massa aliquet non. Sed a fringilla sapien. Donec hendrerit, ligula id elementum auctor, leo felis sagittis enim, sed imperdiet odio quam in tellus. Duis a nunc metus. Donec placerat convallis eros, at pharetra eros vehicula nec. Mauris non justo laoreet, </span>fermentum magna dictum, tempus lacus. In vitae feugiat quam, ut tincidunt elit. Aliquam ornare augue consectetur suscipit porta. Suspendisse ullamcorper erat mi, dapibus accumsan nulla rhoncus in.</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\">Nulla convallis, mauris blandit iaculis molestie, tortor erat sollicitudin lorem, sit amet venenatis leo est id sapien. Donec eros mi, pellentesque a turpis eu, varius volutpat purus.&nbsp;</p><p style=\\\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\\\"><br></p>', 'JAVA', 'published', 2),
(11, 19, 'Test Post ', 'root', '2018-05-06', 'Free-Portfolio-WordPress-Themes.gif', '<h2>This is a test post with dummy data for the system testing</h2><p><br></p><h4>Some of lorem ipsum dummy data :&nbsp;</h4><p><span style=\"\\&quot;font-family:\" \"open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\\\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim vitae metus eget facilisis. Pellentesque molestie volutpat velit, vel ornare magna placerat in. Duis at enim ornare, finibus orci ac, mollis mi. Donec quis molestie tortor,<span style=\"\\&quot;color:\" rgb(107,=\"\" 173,=\"\" 222);\\\"=\"\"> bibendum feugiat </span>dolor. Suspendisse lacinia mattis metus. Sed vel arcu urna. Integer in nibh pharetra, egestas quam non, placerat lacus.</span></p><pre>&nbsp; &nbsp; function escape($string){<br>&nbsp; &nbsp; &nbsp; &nbsp; global $connect;<br>&nbsp; &nbsp; &nbsp; &nbsp; return mysqli_real_escape_string($connect,trim($string));<br>&nbsp; &nbsp; }<br>&nbsp; &nbsp; function redirect($location){<br>&nbsp; &nbsp; &nbsp; &nbsp; header(\"Location:$location\");<br>&nbsp; &nbsp; }<br>&nbsp; &nbsp; function notAllowed($regex,$location){<br>&nbsp; &nbsp; &nbsp; &nbsp; $dir = __DIR__;<br>&nbsp; &nbsp; &nbsp; &nbsp; $pattern = $regex;<br>&nbsp; &nbsp; &nbsp; &nbsp; if(preg_match($pattern,$dir)){<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; redirect($location);<br>&nbsp; &nbsp; &nbsp; &nbsp; }<br>&nbsp; &nbsp; }</pre><p><span \"open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\\\"=\"\"></span></p><pre><br></pre><p></p>', 'TEST TAGS, system testing, unit testing, white-box testing, test', 'published', 5);

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
(1, 'Admin'),
(-1, 'Block'),
(2, 'ContentWriter'),
(4, 'Pending'),
(3, 'Subscriber');

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
(48, 'root', '$2y$12$PM7Agy5M/iN3mlGpU3rQ5uLVttGIIHpBbVTyUaigCziEN2dpgBhVK', 'Default', 'User', 'someone@example.com', '2018-05-07', 'our-services.png', 1, NULL, '1d4dbde5c6874682a5a55f3879a424fdf8e4945765a4a38eacf82ad738ac416795c7e4132e5a04e27810926a399f261c10eda6f304cc56abd3eb8458'),
(53, 'SE123', '$2y$12$pJFzRFzw67eR5A1ZKrtDCeJv2O24uETKSJilbWbFyapvC76ty7Jgy', 'Someone', 'Example', 'someoneExample@cc.com', '2018-05-07', 'boy.png', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

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
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_title` (`role_title`);

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
