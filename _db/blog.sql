-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2018 at 03:03 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `creation_date`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(6, 2, 'Guillaume', 'Ceci est un test !', '2018-06-01 21:10:09'),
(7, 2, 'Robert', 'Ceci est un autre test !', '2018-06-01 21:10:49'),
(8, 1, 'Pépito', 'Ceci est un super test !', '2018-06-01 21:18:13'),
(9, 2, 'Pépito', 'C\'est top !', '2018-06-04 15:57:09'),
(10, 2, 'Alexandre', 'C\'est super', '2018-06-04 16:13:39'),
(11, 1, 'Pédro', 'C\'est super', '2018-06-04 17:01:29'),
(12, 1, 'Pépito', 'Youhou', '2018-06-04 17:02:26'),
(13, 2, 'Pépito', 'C\'est génial', '2018-06-04 17:06:29'),
(14, 2, 'Nicolas', 'Plop', '2018-06-05 19:54:08'),
(15, 1, 'Mario', 'It\'s me...', '2018-06-06 19:31:12'),
(16, 2, 'Cédric', 'C\'est génial', '2018-06-07 12:48:35'),
(17, 1, 'Yoshi', 'Yoshi !!!', '2018-06-07 13:39:24'),
(18, 1, 'Toad', 'Youhou !!', '2018-06-07 14:09:56'),
(19, 1, 'Alexandre', 'C\'est top !', '2018-06-07 14:17:29'),
(20, 3, 'Pépito', 'C\'est super', '2018-06-07 17:23:41'),
(21, 3, 'Alexandre', 'C\'est top !', '2018-06-07 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11'),
(3, 'Titre 1', 'Contenu 1', '2018-06-07 16:45:59'),
(4, 'Titre 2', 'Contenu 2', '2018-06-07 16:50:27'),
(5, 'Titre 3', 'Contenu 3', '2018-06-07 17:27:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
