-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 04:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitasehat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(4, 'admin1', '0192023a7bbd73250516f069df18b500'),
(5, 'admin2', '0192023a7bbd73250516f069df18b500'),
(6, 'hafiz', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `thumbnail`, `content`, `created_at`, `category`) VALUES
(16, 'kb', '/pbw/uploads/Screenshot (100).png', 'lorem ipsun dolor sit amet', '2024-05-28 07:00:43', 'Kehamilan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'Ahmad Fauzidan', 'zidankhainur2@gmail.com', ''),
(2, 'test', 'test@gmail.com', '$2y$10$8pcGoQbeXzcrwd7DcWpXyOeOpVStKM3TzIXDnK6Pm9K0orRsT5gme'),
(4, 'lala', 'lala@gmail.com', '$2y$10$UAEFzgYpkSwuanqQD7DVW.mCk1y92ORUTCUZar4.RIDHIzAEQkZla'),
(5, 'ucup', 'ucup@gmail.com', '$2y$10$.dDl027yUU9mBT14wvLl8eAsVdyi05HwNlOJudfzwunLxDbuMjppC'),
(6, 'Nadhif', 'nadip@gmail.com', '$2y$10$4eMbrkH1BVuQyz1.6iNKg.gUuYITyVC8suLJ7DzjnbpLh9I9K1VYm'),
(7, 'Hafiz', 'hapis@gmail.com', '$2y$10$tG6xMfxyjTbPLAK5k7Tfre30ds1rwNUKcGlXW7s40zS2sNlsBqT5K'),
(8, 'ririn', 'ririn@gmail.com', '$2y$10$nd3fMvs7YPNIkQOF4eZdDuG291n9ihUOUOO/O6ZK80UfRtJkZQcN6'),
(9, 'Zidan', 'zidan@gmail.com', '$2y$10$KLp89lm2peCsEiijCCCZDOpeE.MCAMaHL5qYB.dcLCssrR8FcD6Au'),
(10, 'Zidan Khainur', 'zeroonex01@gmail.com', ''),
(11, 'jaki', 'jaki@gmail.com', '$2y$10$P9xCoJVC7tBhnQLV1r5.wuXpllBicr1UmA5pdqEGIR21QNUHsjEY.'),
(12, 'AHMAD FAUZIDAN YAHYA KHAINUR', '2210631170054@student.unsika.ac.id', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
