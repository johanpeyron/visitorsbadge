-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 05:31 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitorsbadge`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `errand` text NOT NULL,
  `checkin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkout` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `company`, `name`, `phone`, `errand`, `checkin`, `checkout`, `image_url`) VALUES
(6, 'Metro-Goldwyn-Mayer', 'Chico Marx', '1887-03-22-1961-10-11', 'Play the piano', '2018-08-09 19:58:58', '2018-08-14 03:27:10', 'public/images/visitor/6.jpg'),
(7, 'Metro-Goldwyn-Mayer', 'Harpo Marx', '1888-11-23-1964-09-28', 'Play the harp', '2018-08-09 19:58:58', NULL, 'public/images/visitor/7.jpg'),
(8, 'Metro-Goldwyn-Mayer', 'Groucho Marx', '1890-10-02-1977-08-19', 'Sing \"Lydia the tatooed lady\"', '2018-08-09 19:58:58', NULL, 'public/images/visitor/8.jpg'),
(9, 'United Artists', 'Charles Spencer Chaplin', '1889-04-16-1977-12-25', 'Lecture \"How I made the transition to talkies\"', '2018-08-09 19:58:58', NULL, 'public/images/visitor/9.jpg'),
(10, 'Columbia Pictures', 'Buster Keaton', '1895-10-04-1966-02-01', 'Lecture \"My father and I\"', '2018-08-09 19:58:58', NULL, 'public/images/visitor/10.jpg'),
(11, 'dictator of Tomania', 'Adenoid Hynkel', '8888', 'Lecture \"My future plans and ambitions\"', '2018-08-09 19:58:58', NULL, 'public/images/visitor/11.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
