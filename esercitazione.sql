-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 01:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esercitazione`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `url` varchar(255) NOT NULL,
  `since` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `username`, `url`, `since`) VALUES
(5, 'prova2', 'https://tse2.mm.bing.net/th?id=OIP.Z0ESbbllbUWrTxcEfiz0qQHaHa', '2022-05-28 22:28:31'),
(6, 'prova2', 'https://tse4.mm.bing.net/th?id=OIP.fWErzWmVzSW64PN_UoGCXgHaJF', '2022-05-28 22:28:32'),
(7, 'prova2', 'https://tse1.mm.bing.net/th?id=OIP.VIHoNlxPTkXfW2i6DgfIbwHaF7', '2022-05-28 22:28:33'),
(8, 'prova2', 'https://tse3.mm.bing.net/th?id=OIP.8h3FKUS1farNs-FLEYMgCQHaE8', '2022-05-28 22:28:34'),
(60, 'prova', 'https://tse3.mm.bing.net/th?id=OIP.goegMDVwEd-bANzfo611GQHaJC', '2022-05-29 10:26:37'),
(61, 'prova', 'https://tse4.mm.bing.net/th?id=OIP.OdUmE7Djx0GK_tIHjvGESAHaE8', '2022-05-29 10:26:38'),
(63, 'prova', 'https://tse3.mm.bing.net/th?id=OIP.o4MNTCxaSng3WVBpnr1Y9AHaHa', '2022-05-29 10:30:34'),
(64, 'prova', 'https://tse1.mm.bing.net/th?id=OIP.7G72jpHcTX5TPagxdlntgAHaEw', '2022-05-29 10:30:35'),
(65, 'prova', 'https://tse2.mm.bing.net/th?id=OIP.4HXT_JBzn7GlW_cOgWZo2AHaFg', '2022-05-29 10:30:36'),
(66, 'prova', 'https://tse3.mm.bing.net/th?id=OIP.TZ-_rl3ybawpTfhwf2A6MAHaE8', '2022-05-29 10:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `mittente` varchar(16) NOT NULL,
  `destinatario` varchar(16) NOT NULL,
  `since` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `mittente`, `destinatario`, `since`) VALUES
(1, 'prova2', 'prova', '2022-05-29 10:14:48'),
(2, 'prova3', 'prova', '2022-05-29 10:18:54'),
(3, 'prova4', 'prova', '2022-05-29 10:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `since` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `pic`, `since`) VALUES
(1, 'prova', '$2y$10$2MlCYU6oVjGhHOnZk8eYYuZz749.FjqLvHIzNEh4yrwQB1rBzBGb6', NULL, '2022-05-28 22:28:08'),
(2, 'prova2', '$2y$10$1xYQKHK3kIW7nS/G1Oy5IOkhvh23t6NTAJqJcnltGPWmcKsELeL0q', NULL, '2022-05-28 22:28:25'),
(5, 'prova3', '$2y$10$oXYgUFKdNZKBO18Mn08mf.COU3ON0JkeAUZDoRu67flspnRD8XAI6', NULL, '2022-05-29 10:18:43'),
(6, 'prova4', '$2y$10$ip6hYyRLeqRYHtsWjGgRUetW3A7QNk2DdpILAxLc//JD.7Xao0S4m', NULL, '2022-05-29 10:20:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
