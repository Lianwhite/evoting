-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 11:30 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `credential` varchar(255) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `party` varchar(20) NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL,
  `election_id` int(11) DEFAULT NULL,
  `no_votes` int(50) DEFAULT '0',
  `disabled` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `passport`, `credential`, `position`, `party`, `approval`, `date`, `election_id`, `no_votes`, `disabled`) VALUES
(2, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-14_16-28-30.png', 'Chairmanship', 'APC', 1, '18/06/23', NULL, 0, 0),
(4, 19, 'uploads/1.jpg', 'uploads/UK-scholarship.png', 'Presidential', 'PDP', 1, '18/06/23', 12, 1, 0),
(6, 23, 'uploads/2.jpg', 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'Governorship', 'ANPP', 1, '18/06/23', 5, 0, 0),
(7, 24, 'uploads/3.jpg', 'uploads/St-Andrews-Photo-Sammi-McKee.jpg', 'Senatorial', 'APC', 1, '18/06/23', 6, 1, 0),
(8, 20, 'uploads/Tony-Okpanachi.jpg', 'uploads/Screenshot_from_2018-04-04_10-44-10.png', 'Presidential', 'CPC', 1, '18/06/23', 12, 1, 0),
(9, 21, 'uploads/5.jpg', 'uploads/visa_logo.jpg', 'Governorship', 'OPC', 1, '18/06/23', 5, 0, 0),
(10, 22, 'uploads/6.jpg', 'uploads/Screenshot_from_2018-06-17_12-49-40.png', 'Senatorial', 'APGA', 1, '18/06/23', 7, 0, 0),
(11, 25, 'uploads/0.jpg', 'uploads/Screenshot_from_2018-04-04_10-44-10.png', 'Presidential', 'APC', 1, '18/06/23', 12, 1, 0),
(14, 28, 'uploads/15.jpg', 'uploads/usa_scholarship.jpg', 'Senatorial', 'APC', 0, '18/06/23', 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `election_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`election_id`, `start_date`, `end_date`) VALUES
(1, '2018-06-19', '2018-06-29'),
(2, '2018-06-19', '2018-06-29'),
(3, '2018-06-19', '2018-06-29'),
(4, '2018-06-19', '2018-07-10'),
(5, '2018-06-10', '2018-07-20'),
(6, '2018-06-21', '2018-07-27'),
(7, '2018-06-20', '2018-06-27'),
(8, '2016-05-05', '2016-05-04'),
(9, '2016-05-05', '2016-05-09'),
(10, '2016-05-05', '2016-05-09'),
(11, '2018-05-05', '2018-07-09'),
(12, '2018-06-19', '2018-07-29'),
(13, '2018-06-19', '2018-07-29'),
(14, '2018-06-19', '2018-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `partyLeaders`
--

CREATE TABLE `partyLeaders` (
  `no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passport` varchar(199) DEFAULT NULL,
  `credential` varchar(199) DEFAULT NULL,
  `party` varchar(10) DEFAULT NULL,
  `approval` tinyint(1) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partyLeaders`
--

INSERT INTO `partyLeaders` (`no`, `user_id`, `passport`, `credential`, `party`, `approval`, `active`, `date`) VALUES
(1, 16, 'uploads/Screenshot from 2018-05-05 07-38-13.png', 'uploads/star empty.png', 'APC', 1, 0, '18/06/22'),
(2, 16, 'uploads/Screenshot from 2018-05-05 07-38-13.png', 'uploads/star empty.png', 'APC', 1, 0, '18/06/22'),
(3, 16, 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'uploads/star empty.png', 'APC', 0, 0, '18/06/22'),
(4, 16, 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'uploads/star_empty.png', 'APC', 1, 0, '18/06/22'),
(5, 16, 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'uploads/star_empty.png', 'APC', 0, 0, '18/06/22'),
(6, 16, 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'uploads/star_empty.png', 'APC', 1, 0, '18/06/22'),
(7, 16, 'uploads/Screenshot_from_2018-05-05_07-38-13.png', 'uploads/star_empty.png', 'APC', 1, 0, '18/06/22'),
(8, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'ANPP', 1, 0, '18/06/22'),
(9, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'ANPP', 0, 0, '18/06/22'),
(10, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'ANPP', 0, 0, '18/06/22'),
(11, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'ANPP', 1, 0, '18/06/22'),
(12, 17, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'ANPP', 1, 0, '18/06/22'),
(13, 31, 'uploads/study_in_lon.jpg', 'uploads/Screenshot_from_2018-04-15_00-29-14.png', 'UNPP', 1, 0, '18/06/29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `origin` varchar(15) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(199) NOT NULL,
  `voters_id` varchar(50) NOT NULL,
  `password` varchar(199) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `partyLeader` tinyint(1) NOT NULL DEFAULT '0',
  `conf_key` varchar(155) NOT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `origin`, `lga`, `dob`, `phone`, `email`, `voters_id`, `password`, `gender`, `address`, `status`, `partyLeader`, `conf_key`, `reg_date`) VALUES
(16, 'Okafor', 'Callistus', 'Rivers', 'Warri south', '20/05/1980', '8063483130', 'chidi@olotu.co', '89879438094894', '$2y$10$4qOHCz0/jGjYSoq9AEYqKeDx5z/eE4MxIW5Bb/ct6FDn.yFhwqj6K', 'Male', 'No 2 chukwu street', 1, 1, 'dd8ff77b79bc537f6522557f3a4d1eb3', '2018-06-21'),
(17, 'Chidi', 'Dev', 'Rivers', 'Phalga', '2018-10-01', '8063483130', 'chidi1@olotu.co', '843899785753908349', '$2y$10$mMZK0JpI8JF8u.EdFSuMnOu4vLyVDJcTaSMju7HYnF1CykB.J.ePu', 'Male', 'No 2 chukwu street', 0, 0, 'a72d3457c153d6e6acef20511aa4886a', '2018-06-21'),
(18, 'Manchide', 'Chidi', 'Rivers', 'Yenagoa', '09/05/1999', '0808838801', 'chidi2@olotu.co', '9839758654909', '$2y$10$B//zv0O5cBos1eoEMvG4r.ddaNoOMZw1x4zV9WO9yGBAV9tgaWziO', 'Male', 'No 2 chukwu street', 1, 0, '2320872c51b540f6c5696fc56c5349a7', '2018-06-21'),
(19, 'Tonye', 'Lian', 'Delta', 'Phalga', '20/05/1980', '090787684274', 'Tonye@stack.co', '9805735897853', '$2y$10$v/Fo46TZFqVgm.6lA9o4AuW8q3WHnciLjP35858ippA7ICaYNctW.', 'Female', '#3 Rumuokpurusi, Isiokpo PH', 1, 0, '5610e8dc305fd7a6af1693e5206f87a2', '2018-06-23'),
(20, 'Phil', 'Philomena', 'Cross', 'Akpabuyo', '12/01/2018', '08047867248', 'phil@dev.co', '9023908239830', '$2y$10$jYUCWAL9lh82lkCCi46bX.i.cIaYuu3Hij6kGY0DCcXORMssxiB/a', 'Male', 'No 90 Rumuokoro, PH', 1, 0, 'a5318b02352972553c5242175a5e7829', '2018-06-23'),
(21, 'Deniro', 'Boss', 'Delta', 'Phalga', '20/05/1980', '080664387682', 'deniro@olotu.co', '849849279823090', '$2y$10$ixAxgXbjFCL3dWoWr/aDyeGuErZ67MD6Al4knRy/CtN1ekEUZOwee', 'Male', 'No 3 Rukpoku, PH', 1, 0, '9f73397f8c2d7db63563ff85160ed77b', '2018-06-23'),
(22, 'Ejike', 'Marshall', 'Bayelsa', 'Warri south', '04/05/1900', '07089734793', 'mike@olotu.co', '190483908493', '$2y$10$pYvQldxNMEKQmBPXwevnFeNmeNUHw36KRRqqnOlg3cRPGlPIYTP76', 'Male', '#45 Obigbo, PH', 1, 0, '4a7efaff334127cde9d62dc2961b8975', '2018-06-23'),
(23, 'Favour', 'Hart', 'Delta', 'Uyo', '23/06/1998', '080374874849', 'hart@olotu.co', '389748749022', '$2y$10$paPYznkWS2UKz/ONMqmNl.sg3FC9n7fEImgt3kHzuEcnYwpXgOGd2', 'Male', 'No 5 Unknown street, PH', 1, 0, '5f2b978586c948f4fdaa00686a2d39c8', '2018-06-23'),
(24, 'Hoppy', 'Ken', 'Delta', 'Yenagoa', '20/05/1980', '080588798483', 'hoppyken@olotu.co', '7894783904443', '$2y$10$quGq9RYTURu36AsDW55RyuXScvmnDi4MaxL4uVLNtGRrWhX0rjsXO', 'Male', '#35 Elekaya street, PH', 1, 0, '3b1d0c05ea3da622d2f61f6904fbd323', '2018-06-23'),
(25, 'Fullstack', 'Olotu', 'Delta', 'Warri south', '07/07/2000', '070488774892', 'fullstack@olotu.co', '3298798479084', '$2y$10$ot0Z0JikWVRr8HLuNDInoOIlBi/E1UdBLTjVwNhGLtYMvxmITNj/u', 'Female', 'UST, PH', 1, 0, '99a4f4c6c58fa3beaa717f0d00e1bc12', '2018-06-23'),
(26, 'Ubuntu', 'Devlead', 'Akwa Ibom', 'Warri south', '08/01/1992', '0705948392', 'ubuntu@olotu.co', '8749837902', '$2y$10$oGfrQkTorC/3X2naHAV6Ze.OwpoX1EK4S0lYMVrR4m/Lq2EwElZKK', 'Male', 'Garrison, PH', 1, 0, '2c20d6c70cc52c4e337bc95e7f0b2388', '2018-06-23'),
(27, 'Chinedu', 'Olotu', 'Rivers', 'Yenagoa', '04/02/1880', '080276287984', 'chinedu@olotu.co', '47873290299303', '$2y$10$f5Zb4NsFlGF1TP6Sba4JZOOYgXmeo/laE/qpH1lK7pU20FJE/mOXO', 'Male', '#3 unknown street, PH', 1, 0, '46c5b6d1bf91d1802f920cc75f61e4cd', '2018-06-23'),
(28, 'Melas', 'Boss', 'Bayelsa', 'Phalga', '20/05/1960', '0809382782', 'melas@olotu.co', '8427902983982', '$2y$10$/O591qhwFjKo5n.bijOxkum6pkei8gTTor.fI7XCAWbKtWV7FlavC', 'Male', 'No 5 unknown street, PH', 0, 0, '1f814d511918b449bcded1724e50b449', '2018-06-23'),
(29, 'manchi', 'jquery', 'Bayelsa', 'Phalga', '09/12/1999', '+234807777777', 'manchidede2@gmail.com', 'voter20099', '$2y$10$5mLkShkxJ59.4rPNrIQmSOOka0uhBvc9n.7qV/nC7bvMUqy7o8yVa', 'Male', '24 jumba close', 1, 0, '1b4b7310b312e73ffff07f02bf8fc74b', '2018-06-25'),
(30, 'sexa', 'dashgsh', 'Delta', 'Warri south', '09/09/1971', '+2349023456789', 'example@example.com', '12345678', '$2y$10$s/TtUF6FZxYjtVNB5M/IK.X5rGuIVqT8nrlmRbnNSufSRE8K2mEfC', 'Male', 'hhh jhjjj jjjj jj', 1, 0, 'e7faf358b8fe834166a38d1468a80a0c', '2018-06-29'),
(31, 'Okafor', 'chidi', 'Cross', 'Yenagoa', '20/01/2003', '+2349023456789', 'example@example.co', '98429092092923', '$2y$10$QQqH.DKo.Wh2acg2IJmQse99tsj97vwJgK/mO9d3yhUsmbIh.iWqS', 'Male', 'kjklkl kklklkl klk lkkl', 1, 0, '4da4531487d9fd92647e118bbf99ed97', '2018-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`user_id`, `candidate_id`, `election_id`) VALUES
(29, 25, 4),
(29, 28, 6),
(30, 19, 4),
(16, 28, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `election_id` (`election_id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `partyLeaders`
--
ALTER TABLE `partyLeaders`
  ADD PRIMARY KEY (`no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `voters_id` (`voters_id`),
  ADD UNIQUE KEY `conf_key` (`conf_key`),
  ADD UNIQUE KEY `conf_key_2` (`conf_key`),
  ADD UNIQUE KEY `conf_key_3` (`conf_key`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `election_id` (`election_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `partyLeaders`
--
ALTER TABLE `partyLeaders`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`);

--
-- Constraints for table `partyLeaders`
--
ALTER TABLE `partyLeaders`
  ADD CONSTRAINT `partyLeaders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`user_id`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
