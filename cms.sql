-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 04:05 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
(8, 'ASP.net'),
(11, 'HTML'),
(13, 'JAVA'),
(14, 'CSS'),
(15, 'PHP'),
(16, 'TEST'),
(17, 'Node.js'),
(18, 'dd');

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
(28, 67, 'Dhruv', 'dhruvsaaaxena.1998@gmail.com', 'Awesome Content , Thanks for the informations :) ', 'approved', '2017-10-18'),
(29, 97, 'sadad', '', 'asdadasd', 'approved', '2017-10-25'),
(30, 60, 'saddas d', '', ' asdsad asd as', 'approved', '2017-10-25'),
(31, 95, 'dhruv', '', 'bruh ', 'approved', '2017-10-31'),
(32, 102, 'zxZxz', '', 'ZxxZxxZx', 'approved', '2017-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `date`) VALUES
(2, 'dhruv', 'Hi There', '2017-12-13 05:31:33'),
(3, 'dhruv', 'Hello hi are you', '2017-12-13 05:41:33'),
(4, 'dhruv', 'Hi', '2017-12-13 05:42:41'),
(5, 'dhruv', 'Hello', '2017-12-13 05:42:58'),
(6, 'dhruv', 'Hi Palash', '2017-12-13 05:43:49'),
(7, 'dhruv', 'hi palash 2', '2017-12-13 05:44:00');

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
(4, '8lulr0jfrto1qc4d68v6ti9qqk', 1508188015),
(5, 'ob3tm0qhdshc4m7cgupuus419t', 1508155154),
(6, '2pnbdanfp034nl3rm2egp7cr29', 1508162200),
(7, 'il9a7r7fh8d2msu6vdok240ng4', 1508182368),
(8, 'kguqffteu69rgf563864ju9rg2', 1508183577),
(9, 'mcu7mgoobr5ls5mukkpqs45mnb', 1508183841),
(10, 'keu6msnp8ddgd7apfov2gpo8o4', 1508273822),
(11, 'g0tv51bebjb304thnvi4s092pm', 1508532952),
(12, 'r2dnkct69vub3c65684j83m944', 1508704126),
(13, '5t47u2tm55ukqil09d2o5o6077', 1508743027),
(14, 'uvb0n8gfnav7nlg8u73l4omp3n', 1508743270),
(15, 'ffsqr2tq07c1oqj8sns5ub94om', 1508792229),
(16, 'mes257t09fmpp6jphkd3uee1gd', 1508838067),
(17, 'dcbfltedobha1j98d9p1ej9s5i', 1508878873),
(18, 'c6smkkkv8ip2i8j43qgqqbq9m1', 1508961807),
(19, '77kc40lvgpikdpsfqfp5prb8js', 1509039368),
(20, 'oqua1d4clp10o871lhm9u8tv0q', 1509133666),
(21, 'k77j8rkv2gj0otrnslp87j9rut', 1509218665),
(22, 'ummgq8hg2oda7t9fpca3vdqetb', 1509308763),
(23, '6p2bh70e91ednv4m0cim40i5vb', 1509361123),
(24, 'do2tpoqug9039keluap7tihr5a', 1509355247),
(25, 'bvrdgedj2smvpeu1uv6jrb4rto', 1509355222),
(26, 'jveh0q9npchvr1d89ilum9juen', 1509360567),
(27, 'idi5uij28vrfajk8qn1jfpg1k6', 1509394612),
(28, '2uimlhgpvrl4opi5lkb4nii9dr', 1509477826),
(29, '54u76p2684egumg1ikqovimpc4', 1509564091),
(30, '1mnjm5r6b3s021g14fnhbb0dop', 1509616697),
(31, '98cjs7p2sbf6bcu0vo576fds77', 1509634108),
(32, '2c38lkoch2cm0hagp3pv49vc14', 1509658969),
(33, 'jhldm0kllsqjt08svj81f5deft', 1509695230),
(34, 'gcqi132sftl79hn203g8fhklsj', 1509726796),
(35, 'rvm3559ehh4ob7g0b2ltm397h7', 1509737620),
(36, '6i27s0b0eqnomj2jb5k5pt5afb', 1509868500),
(37, 'h00cjicaoup6q9ss1ji6q4picd', 1511189002),
(38, '12hj7jfun26hmc74o5cbnpk2ap', 1511709791),
(39, '3m9ktt6buumfbr4qsp9fh0gl9g', 1511763249),
(40, 'ibmhcvu38d6vnenqdgvreukeue', 1511883961),
(41, '2iuuorlqeddfuv53nh2r9q315v', 1512131039),
(42, 'l451l2bjqcini20v5arbb7b1rg', 1512236654),
(43, 'mqlg8ooft6i0k6tuu8nic3sfnv', 1512304211),
(44, 'lsk5l1rda72da6s02cbhhhnrk8', 1512362517),
(45, 'ce20pom5kkldik7va2u6iep4og', 1513139002),
(46, '30mg9ger14snkiqf50cqdlshnb', 1513156737),
(47, '8k70re4dr21k79assjqvigj1m5', 1513262770),
(48, 'bbuiho7nmbuqjp72o2ronua1ud', 1513272233),
(49, 'm2cprnvbl02ti99u69t368rjq1', 1513506055),
(50, '7s520r95cpka9b6to0qekg2t9g', 1514364507),
(51, '0177i41bh5nftn8dkd7i3289d1', 1514720057),
(52, '48lkf91tvlrgsr13u2bj8rfaa1', 1515252067);

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
(94, 11, 'Prepare Statements ', 'dhruv', '2017-10-31', 'download.png', '<p>prepare smtmts working??? let\\\'s see</p>', 'prepare stmts', 'draft', 9),
(95, 13, 'Prepare Statements 2', 'dhruv', '2017-12-02', 'javascript.png', '<p><img src=\"https://imagejournal.org/wp-content/uploads/bb-plugin/cache/23466317216_b99485ba14_o-panorama.jpg\" style=\"width: 25%; float: right;\" class=\"note-float-right\">Prepare 2Â </p><p>Let\'s try new summernote wysiwyg editorÂ </p><p>new image try too </p><p>let\'s see if this one work <b>uploaded via local file</b></p><p><b>hey there guyz wat about you </b>, how you doin.</p><p><b><br></b></p>', 'prepare stmts, prepare statement, statement, prepare', 'published', 46),
(97, 11, 'TEST POST WYSIWYG', 'dhruv', '2017-11-03', 'hui.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p><p><br></p><p><img src=\"http://www.blindtextgenerator.com/res/img/logo_blindtextgenerator.png\" style=\"width: 50%; float: none;\"></p><p><br></p><p><br></p><p><br></p><p style=\"text-align: center; \"></p>', 'html , WISIWYG', 'draft', 21),
(99, 13, 'TESTAGAIN', 'dhruv', '2017-11-03', 'TOlOWER.PNG', 'het there how are you bruh , well im good , thanks fopr asdking good goins asdasdw asdasd asdawads', 'hey there, nruh , bruh , wassup , mc , bc ', 'draft', 4),
(100, 13, 'dfsadf asd', 'dhruv', '2017-11-03', 'Capture.PNG', 'asda dsadDasdasd&nbsp; asdas&nbsp;', 'sds d', 'draft', 8),
(101, 11, 'Dhruv', 'dhruv', '2017-11-27', 'Logo.png', 'sadadadsaDasDasd ASDaSDsad ad daSD AaDaDsDAD ASGDSFGADF', 'ssdsd', 'draft', 2),
(102, 11, 'adasdadsada', 'dhruv', '2017-12-31', 'javascript.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p><p><br></p><p><br></p><p><br></p><p><br></p>', 'blind text, generator blah , blah ', 'published', 16);

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
(2, 'Content writer'),
(3, 'Subscriber'),
(4, 'block');

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
  `role` varchar(32) NOT NULL DEFAULT 'pending',
  `for_role` varchar(32) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `dateAdded`, `user_image`, `role`, `for_role`, `token`) VALUES
(25, 'dhruv', '$2y$12$kyqqa0IiaWXk.ybaOkG7LehHs6zUyfQccpedBLW2CKhqoR9ZSOVm6', 'Dhruv', 'Saxenas', 'dhruvsaaaxena.1998@gmail.com', '2017-12-03', 'photo6114123745766516718.png', 'Admin', '1', '3052e621bdbb8de8cc385570af710f1cb929e788a6ac4fcb326039756bb9195ec59564fc677e4b2d7cd3a38510549bc5ab6a705b6d49615455c08c0a');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `sub_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
