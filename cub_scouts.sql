-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cub_scouts`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `image_path`, `uploaded_at`) VALUES
(63, 'profile_1.jpg', 'public/assets/uploads/profile_1.jpg', '2025-05-13 18:38:30'),
(64, 'profile_2.jpg', 'public/assets/uploads/profile_2.jpg', '2025-05-13 18:38:38'),
(65, 'profile_3.jpg', 'public/assets/uploads/profile_3.jpg', '2025-05-13 18:38:45'),
(66, 'pauline-loroy-A9U0cMNsxwY-unsplash.jpg', 'public/assets/uploads/pauline-loroy-A9U0cMNsxwY-unsplash.jpg', '2025-05-13 18:41:32'),
(67, 'maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', 'public/assets/uploads/maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', '2025-05-13 18:41:43'),
(68, 'Screenshot 2025-05-13 182858.png', 'public/assets/uploads/Screenshot 2025-05-13 182858.png', '2025-05-13 18:41:51'),
(69, 'mael-balland-VDKV4Xd0nTc-unsplash.jpg', 'public/assets/uploads/mael-balland-VDKV4Xd0nTc-unsplash.jpg', '2025-05-13 18:42:08'),
(70, 'pauline-loroy-A9U0cMNsxwY-unsplash.jpg', 'public/assets/uploads/pauline-loroy-A9U0cMNsxwY-unsplash.jpg', '2025-05-13 18:44:50'),
(71, 'profile_2.jpg', 'public/assets/uploads/profile_2.jpg', '2025-05-13 18:45:07'),
(72, 'annie-spratt-zIKZF9ef2VM-unsplash.jpg', 'public/assets/uploads/annie-spratt-zIKZF9ef2VM-unsplash.jpg', '2025-05-13 18:45:13'),
(73, 'jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', 'public/assets/uploads/jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', '2025-05-13 18:45:19'),
(74, 'profile_1.jpg', 'public/assets/uploads/profile_1.jpg', '2025-05-13 18:47:35'),
(75, 'jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', 'public/assets/uploads/jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', '2025-05-13 18:47:41'),
(76, 'maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', 'public/assets/uploads/maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', '2025-05-13 18:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` enum('admin','scout','parent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_type`) VALUES
(38, 'Admin', '$2y$10$PWcAC2HlGiee7b6Rskk4M.//YBjcUS82LlhzNtTk47DzfVwF9IYgi', 'admin@gmail.com', 'admin'),
(39, 'Parent', '$2y$10$FUSqExyHdqw5Kg2jpMhUPuzig3IimibI1CjLynydkXPFh9CkgJ4Zu', 'parent@outlook.com', 'parent'),
(40, 'scout', '$2y$10$JrOQ71FTIdec03wHM8tlz.W.rVmmNSTdjORzUCyAfr77LCCZGD9zu', 'scout@hotmail.co.uk', 'scout'),
(44, 'sdasfda', '$2y$10$QibrZK6pDBmLSuoJqN9dhOcXX.MQennIMevb3Cj9pg8j2ufpAASMS', 'dffdssdlk@dfskdf.com', 'scout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
