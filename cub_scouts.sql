-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 05:37 PM
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
(76, 'maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', 'public/assets/uploads/maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', '2025-05-13 18:47:50'),
(77, 'maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', 'public/assets/uploads/maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', '2025-05-14 09:52:20'),
(78, 'mael-balland-VDKV4Xd0nTc-unsplash.jpg', 'public/assets/uploads/mael-balland-VDKV4Xd0nTc-unsplash.jpg', '2025-05-14 09:52:29'),
(79, 'what_we_do.jpg', 'public/assets/uploads/what_we_do.jpg', '2025-05-14 09:52:37'),
(80, 'scouts_walk.jpg', 'public/assets/uploads/scouts_walk.jpg', '2025-05-14 09:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_admin_post` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `message`, `posted_by`, `timestamp`, `is_admin_post`) VALUES
(1, 'ffsfsfs', 'mickyboy', '2025-05-19 14:52:47', 1),
(2, 'Hi everyone and welcome to the cubscouts!', 'mickyboy', '2025-05-19 14:53:04', 1),
(3, 'Updates here', 'mickyboy', '2025-05-19 14:54:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` enum('admin','scout','parent') NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_type`, `first_name`, `surname`) VALUES
(64, 'mickyboy', '$2y$10$MrMzQp6x3wum9vnUWIL0W.L77mG.aR37w/KwyhBiWRN.55hU.IpXq', 'Mdougie@hotmail.co.uk', 'admin', 'Mike', 'Douglas'),
(65, 'Scout', '$2y$10$wk1e4T39KRI0oZETRUubLuqsUNzgMyZP55szq1Tn1ZT96atYDnGh.', 'aidanorourke@hotmail.co.uk', 'scout', 'Aidan', 'O\'Rourke'),
(66, 'martinboy', '$2y$10$F1TvFrWC.JmIKV1ScbNHYeQ42O4o2mjM8iwFypp2bJRMQYY3Rf3aG', 'martinorourke@gmail.com', 'parent', 'Martin', 'O\'Rourke');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
