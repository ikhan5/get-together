-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2019 at 06:51 PM
-- Server version: 5.7.25
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
-- Database: `techenth_get-together`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `description`) VALUES
(1, 'Super Admin', 'Super Admin has root access. '),
(2, 'Admin', 'Admin has access to everything except managing other admins.'),
(3, 'Moderator', 'Moderator has access limited access to user contents.'),
(4, 'User', 'Any registered user of the public website.');

-- --------------------------------------------------------

--
-- Table structure for table `carpool_chats`
--

CREATE TABLE `carpool_chats` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `file_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `theme_color` varchar(50) NOT NULL,
  `has_fund_pool` tinyint(1) NOT NULL,
  `budget` int(11) NOT NULL,
  `fund_pool_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `start_time`, `end_time`, `title`, `location`, `description`, `theme_color`, `has_fund_pool`, `budget`, `fund_pool_account`) VALUES
(1, '2019-03-09', '19:00:00', '23:00:00', 'Birthday Party', 'Dundas and Bloor, Toronto', 'My son\'s birthday party.', 'blue', 0, 0, 'null'),
(2, '2019-03-23', '12:00:00', '20:00:00', 'Wedding Ceremony', 'Town Hall', 'Eric and Elena Wedding', 'Yellow', 1, 40000, 'dummy_account');

-- --------------------------------------------------------

--
-- Table structure for table `events_recipes`
--

CREATE TABLE `events_recipes` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events_users`
--

CREATE TABLE `events_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_host` tinyint(1) NOT NULL,
  `has_rsvp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_users`
--

INSERT INTO `events_users` (`id`, `user_id`, `event_id`, `is_host`, `has_rsvp`) VALUES
(1, 7, 1, 1, 1),
(2, 6, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `item` varchar(500) NOT NULL,
  `item_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `password_salt` varchar(20) NOT NULL,
  `password_hash` int(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 5, 2),
(4, 4, 2),
(5, 3, 2),
(6, 7, 4),
(7, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification_message` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_choices`
--

CREATE TABLE `poll_choices` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `choice` varchar(500) NOT NULL,
  `choice_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` int(11) NOT NULL,
  `poll_choice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_food` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_directions`
--

CREATE TABLE `recipe_directions` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `step` varchar(500) NOT NULL,
  `step_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `to_dos`
--

CREATE TABLE `to_dos` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `task` varchar(500) NOT NULL,
  `is_done` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Bibek', 'Shrestha', 'bibekmanshrestha@gmail.com'),
(2, 'Alex', 'Leroux', 'alexie.leroux613@gmail.com'),
(3, 'Maria', 'Korolenko', 'koronkomm@gmail.com'),
(4, 'Jennifer', 'Wong', 'jenniferwws2018@gmail.com'),
(5, 'Imzan', 'Khan', 'ikhan5@lakeheadu.ca'),
(6, 'Will', 'Smith', 'realwillsmith@gmail.com'),
(7, 'Scarlett', 'Johanson', 'cutescarlett@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpool_chats`
--
ALTER TABLE `carpool_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carpool_chat_event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_recipes`
--
ALTER TABLE `events_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_recipe_event_id` (`event_id`),
  ADD KEY `fk_event_recipe_recipe_id` (`recipe_id`);

--
-- Indexes for table `events_users`
--
ALTER TABLE `events_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_user_user_id` (`user_id`),
  ADD KEY `fk_event_user_event_id` (`event_id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fund_user_id` (`user_id`),
  ADD KEY `fk_fund_event_id` (`event_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ingredient_recipe_id` (`recipe_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_user_user_id` (`user_id`),
  ADD KEY `fk_role_user_role_id` (`role_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notification_user_id` (`user_id`),
  ADD KEY `fk_notification_event_id` (`event_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_photo_user_id` (`user_id`),
  ADD KEY `fk_photo_event_id` (`event_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_playlist_event_id` (`event_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poll_event_id` (`event_id`);

--
-- Indexes for table `poll_choices`
--
ALTER TABLE `poll_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poll_choice_poll_id` (`poll_id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poll_vote_poll_choice_id` (`poll_choice_id`),
  ADD KEY `fk_poll_vote_user_id` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipe_user_id` (`user_id`);

--
-- Indexes for table `recipe_directions`
--
ALTER TABLE `recipe_directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipe_direction_recipe_id` (`recipe_id`);

--
-- Indexes for table `to_dos`
--
ALTER TABLE `to_dos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_do_event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carpool_chats`
--
ALTER TABLE `carpool_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events_recipes`
--
ALTER TABLE `events_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_users`
--
ALTER TABLE `events_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_choices`
--
ALTER TABLE `poll_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_directions`
--
ALTER TABLE `recipe_directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `to_dos`
--
ALTER TABLE `to_dos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carpool_chats`
--
ALTER TABLE `carpool_chats`
  ADD CONSTRAINT `fk_carpool_chat_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `events_recipes`
--
ALTER TABLE `events_recipes`
  ADD CONSTRAINT `fk_event_recipe_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_recipe_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_users`
--
ALTER TABLE `events_users`
  ADD CONSTRAINT `fk_user_event_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_event_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `fk_fund_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fund_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_ingredient_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `fk_role_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notification_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notification_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_photo_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_photo_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `fk_playlist_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `fk_poll_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_choices`
--
ALTER TABLE `poll_choices`
  ADD CONSTRAINT `fk_poll_choice_poll_id` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD CONSTRAINT `fk_poll_vote_poll_choice_id` FOREIGN KEY (`poll_choice_id`) REFERENCES `poll_choices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poll_vote_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_recipe_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_directions`
--
ALTER TABLE `recipe_directions`
  ADD CONSTRAINT `fk_recipe_direction_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `to_dos`
--
ALTER TABLE `to_dos`
  ADD CONSTRAINT `fk_to_do_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
