-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 05:42 PM
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
(109, 'annie-spratt-zIKZF9ef2VM-unsplash.jpg', 'public/assets/uploads/annie-spratt-zIKZF9ef2VM-unsplash.jpg', '2025-05-26 06:30:38'),
(110, 'jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', 'public/assets/uploads/jorgen-larsen-wG1jeM4jPuM-unsplash.jpg', '2025-05-26 06:30:43'),
(111, 'mael-balland-VDKV4Xd0nTc-unsplash.jpg', 'public/assets/uploads/mael-balland-VDKV4Xd0nTc-unsplash.jpg', '2025-05-26 06:30:48'),
(112, 'pauline-loroy-A9U0cMNsxwY-unsplash.jpg', 'public/assets/uploads/pauline-loroy-A9U0cMNsxwY-unsplash.jpg', '2025-05-26 06:30:54'),
(113, 'maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', 'public/assets/uploads/maks_gnatovskyi01-ETT2xLg7zBY-unsplash.jpg', '2025-05-26 06:31:01'),
(114, 'what_we_do.jpg', 'public/assets/uploads/what_we_do.jpg', '2025-05-26 06:31:09'),
(116, 'scouts_walk.jpg', 'public/assets/uploads/scouts_walk.jpg', '2025-05-26 06:31:52'),
(117, 'atomic-pile-maneuver.jpg', 'public/assets/uploads/atomic-pile-maneuver.jpg', '2025-05-26 08:12:23'),
(122, 'cub-scout-play-games-in-outdoor.jpg', 'public/assets/uploads/cub-scout-play-games-in-outdoor.jpg', '2025-05-26 15:32:39'),
(123, 'cub-scout-spud-games.jpg', 'public/assets/uploads/cub-scout-spud-games.jpg', '2025-05-26 15:34:25'),
(124, 'Young-Scouts-Create-An-Evening-Of-Festive-Fun-And-Games-For-Care-Home-Residents-.jpg', 'public/assets/uploads/Young-Scouts-Create-An-Evening-Of-Festive-Fun-And-Games-For-Care-Home-Residents-.jpg', '2025-05-26 15:37:28');

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
(6, 'New update folk! Classes will start 5 minutes later this Monday. See you all then!', 'Admin', '2025-05-20 22:03:28', 1),
(7, 'Hi everyone! Just a quick update from your Scout Leader.\r\n\r\nMike.', 'Admin', '2025-05-23 13:16:46', 1),
(8, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Admin', '2025-05-23 13:59:48', 1),
(9, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Admin', '2025-05-23 14:00:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_details`
--

CREATE TABLE `parent_details` (
  `parent_id` int(11) NOT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `training_completed` tinyint(1) DEFAULT NULL,
  `training_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_details`
--

INSERT INTO `parent_details` (`parent_id`, `availability`, `training_completed`, `training_date`) VALUES
(90, 'I can volunteer most days as I am retired now.', 1, '1992-06-06');

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
(8, 90, 89);

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
(11, 89, 'Aidan', 'O\'Rourke', 'YKA8SF6R');

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
(79, 'Admin', '$2y$10$Kvyw/Z1jUjPLdLxVXImqsOxd675vkGquuZC7a2AyM.cMJVIedFU9m', 'mike@scouts.com', 'admin', 'Mike', 'Douglas'),
(89, 'scout', '$2y$10$h8SoBk4/JhusGDNSF/HiHOZIw763YLB7331SZoafe4YyRoKvcnUwq', 'aidanorourke@hotmail.co.uk', 'scout', 'Aidan', 'O\'Rourke'),
(90, 'parent', '$2y$10$dwv5wFIP4RTkSK.dqrzhn.W4M8ZGUDdKbXC0urOF/eGF00HlMWy46', 'martin@gmail.com', 'parent', 'Martin', 'O\'Rourke');

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
(39, 89, 11, 79, '2025-05-25 04:15:22'),
(40, 89, 3, 79, '2025-05-25 04:15:29'),
(41, 89, 7, 79, '2025-05-25 04:15:35'),
(42, 89, 9, 79, '2025-05-25 04:15:40'),
(43, 89, 6, 79, '2025-05-25 04:15:45');

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
-- Indexes for table `parent_details`
--
ALTER TABLE `parent_details`
  ADD PRIMARY KEY (`parent_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parent_scout_links`
--
ALTER TABLE `parent_scout_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scouts`
--
ALTER TABLE `scouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent_details`
--
ALTER TABLE `parent_details`
  ADD CONSTRAINT `parent_details_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

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
