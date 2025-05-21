-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 07:48 AM
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
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `description`, `image_path`) VALUES
(1, 'Adventure Badge', 'Awarded for completing an outdoor adventure task such as hiking or canoeing.', 'assets/images/badges/adventure_badge.png'),
(2, 'First Aid Badge', 'Awarded for learning and demonstrating basic first aid skills.', 'assets/images/badges/first_aid_badge.png'),
(3, 'Cooking Badge', 'Awarded for preparing a meal safely and hygienically.', 'assets/images/badges/cooking_badge.png'),
(4, 'Environment Badge', 'Earned by completing activities that help the environment, like recycling or planting trees.', 'assets/images/badges/environment_badge.png'),
(5, 'Teamwork Badge', 'Awarded for showing excellent teamwork during activities.', 'assets/images/badges/teamwork_badge.png'),
(6, 'Fitness Challenge Badge', 'Earned by completing a series of physical fitness challenges.', 'assets/images/badges/fitness_badge.png'),
(7, 'Navigator Badge', 'Awarded for successfully navigating and leading in an orienteering group.', 'assets/images/badges/navigator_badge.png'),
(8, 'Water Safety Badge', 'Given after learning essential water safety and swimming skills.', 'assets/images/badges/water_badge.png'),
(9, 'Map Reading Badge', 'Earned by learning how to read maps and navigate simple routes.', 'assets/images/badges/map_reading_badge.png'),
(10, 'Camping Badge', 'Awarded after participating in a Cub Scout camping trip and helping with setup.', 'assets/images/badges/camper_badge.png'),
(11, 'Fishing Badge', 'Award to scouts that have shown excellent angling skills and have caught 5 fish or more!', 'assets/images/badges/angler_badge.png');

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
(4, 'Welcome everyone to Obanshire Cub Scouts!', 'Admin', '2025-05-20 21:15:13', 1),
(6, 'New update folk! Classes will start 5 minutes later this Monday. See you all then!', 'Admin', '2025-05-20 22:03:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_scout_links`
--

CREATE TABLE `parent_scout_links` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `scout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_scout_links`
--

INSERT INTO `parent_scout_links` (`id`, `parent_id`, `scout_id`) VALUES
(3, 77, 78),
(4, 81, 80),
(5, 77, 83);

-- --------------------------------------------------------

--
-- Table structure for table `scouts`
--

CREATE TABLE `scouts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `link_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scouts`
--

INSERT INTO `scouts` (`id`, `user_id`, `first_name`, `surname`, `link_code`) VALUES
(5, 78, 'Aidan', 'O\'Rourke', 'L1HP9NEQ'),
(6, 80, 'Danial', 'LaRusso', 'INC9EBGL'),
(8, 83, 'Caitlin', 'O\'Rourke', '6A9EIPMS');

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
(77, 'Parent', '$2y$10$oxvJuqL3HHLf6M2cEIGcrevcjZxhgndzar9PIMxicHANOlIf0kE.a', 'martin@hotmail.co.uk', 'parent', 'Martin ', 'O\'Rourke'),
(78, 'Scout', '$2y$10$0/oJ7e8WGHHMhRuf3wkiJ.LppqjGuPB3VLq34rSHlBVFgVvoyGi4e', 'aidanman@hotmail.co.uk', 'scout', 'Aidan', 'O\'Rourke'),
(79, 'Admin', '$2y$10$Kvyw/Z1jUjPLdLxVXImqsOxd675vkGquuZC7a2AyM.cMJVIedFU9m', 'mike@scouts.com', 'admin', 'Mike', 'Douglas'),
(80, 'KarateKid', '$2y$10$dLLK9br7JYGTSYVa4WNGeOwsMM5dcU3xtKyUyKwAy7CXntAviBvEW', 'danial@gmail.com', 'scout', 'Danial', 'LaRusso'),
(81, 'MiyagiSan', '$2y$10$h6YPWxiwW6Um4nE/Rw0AveXJv/JkhxVIWNzs2ZnUB3rr2ojdLOcjq', 'mrM@hotmail.jp', 'parent', 'Mr', 'Miyagi'),
(83, 'cattie', '$2y$10$HaiVgO.G.QFDSOmWBdsTGul7EQjsACYV.OWa6tgzHHDkOOb44HB0q', 'caitlin@hotmail.com', 'scout', 'Caitlin', 'O\'Rourke');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  `awarded_by` int(11) NOT NULL,
  `awarded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_id`, `awarded_by`, `awarded_at`) VALUES
(1, 78, 1, 79, '2025-05-21 00:17:08'),
(2, 78, 2, 79, '2025-05-21 00:18:52'),
(9, 78, 11, 79, '2025-05-21 00:51:48'),
(13, 78, 3, 79, '2025-05-21 01:05:18'),
(14, 78, 4, 79, '2025-05-21 01:05:22'),
(15, 78, 5, 79, '2025-05-21 01:05:26'),
(16, 78, 6, 79, '2025-05-21 01:05:32'),
(17, 78, 7, 79, '2025-05-21 01:05:38'),
(18, 78, 8, 79, '2025-05-21 01:05:42'),
(19, 78, 9, 79, '2025-05-21 01:05:46'),
(20, 78, 10, 79, '2025-05-21 01:05:52'),
(21, 83, 4, 79, '2025-05-21 06:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `parent_scout_links`
--
ALTER TABLE `parent_scout_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `scout_id` (`scout_id`);

--
-- Indexes for table `scouts`
--
ALTER TABLE `scouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_code` (`link_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `badge_id` (`badge_id`),
  ADD KEY `awarded_by` (`awarded_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parent_scout_links`
--
ALTER TABLE `parent_scout_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scouts`
--
ALTER TABLE `scouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent_scout_links`
--
ALTER TABLE `parent_scout_links`
  ADD CONSTRAINT `parent_scout_links_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `parent_scout_links_ibfk_2` FOREIGN KEY (`scout_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `scouts`
--
ALTER TABLE `scouts`
  ADD CONSTRAINT `scouts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_badges_ibfk_2` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`),
  ADD CONSTRAINT `user_badges_ibfk_3` FOREIGN KEY (`awarded_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
