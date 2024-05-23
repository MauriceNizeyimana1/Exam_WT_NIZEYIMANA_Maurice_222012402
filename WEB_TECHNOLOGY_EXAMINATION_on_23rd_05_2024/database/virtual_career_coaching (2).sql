-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 09:42 AM
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
-- Database: `virtual_career_coaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `assessment_name` varchar(100) DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `client_id`, `assessment_name`, `date_taken`, `score`) VALUES
(1, 1, 'Teamwork Assessment', '2024-05-10', 10.00),
(2, 2, 'Leadership Skills Assessment', '2024-05-05', 88.00),
(3, 4, 'Marketing Knowledge Assessment', '2024-05-09', 30.00),
(4, 3, 'Personal Brand Audit', '2024-05-11', 55.00);

-- --------------------------------------------------------

--
-- Table structure for table `career_plans`
--

CREATE TABLE `career_plans` (
  `plan_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `plan_title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `target_job` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_plans`
--

INSERT INTO `career_plans` (`plan_id`, `client_id`, `plan_title`, `description`, `target_job`) VALUES
(1, 1, 'Team Building Plan', 'Fostering teamwork and collaboration within the department', 'Project Manager'),
(2, 2, 'Executive Coaching Plan', 'Enhancing executive presence and communication skills', 'CEO'),
(3, 3, 'Career Transition Plan', 'Transitioning from sales to marketing role', 'Marketing Managers'),
(4, 4, 'Personal Branding Plan', 'Building a strong personal brand for career advancement', 'Influencer');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`, `full_name`, `age`) VALUES
(1, 1, 'UWAMBAJIMANA Claudine', 20),
(2, 2, 'MBAHUNGIREHE Maurice', 22),
(3, 3, 'KAMUGISHA Aime', 24),
(4, 4, 'RUKUNDO Jovan', 21),
(6, 4, 'NSHUTI RUKUNDO Jimmy', 24),
(7, 5, 'NTAKIRUTIMANA Francoise', 25);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `coach_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `expertise` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`coach_id`, `user_id`, `full_name`, `expertise`) VALUES
(1, 2, 'Sarah MUKOBWAJANA', 'Personal Brandings'),
(2, 1, 'HAKORIMANA Bertin', 'Team Building'),
(3, 1, 'NIZEYIMANA Maurice', 'Leadership Development'),
(4, 2, 'IRADUKUNDA Bonheur', 'Career Coaching'),
(5, 1, 'Michael Johnson', 'Career Counseling');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `duration_weeks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `coach_id`, `duration_weeks`) VALUES
(1, 'Personal Branding Workshop', 'Workshop to build and promote personal brand', 1, 5),
(2, 'Team Leadership', 'Develop skills to lead and motivate teams effectively', 4, 2),
(3, 'Marketing Strategies', 'Learn effective marketing strategies for business growth', 2, 2),
(4, 'Effective Team Building', 'Strategies for fostering teamwork and collaboration', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `session_id`, `rating`, `comment`) VALUES
(1, 2, 3, 'very insightful!'),
(2, 3, 2, 'Good Effort'),
(3, 4, 1, 'very knowledgeable and helpful'),
(4, 1, 5, 'more interactive');

-- --------------------------------------------------------

--
-- Table structure for table `progress_tracking`
--

CREATE TABLE `progress_tracking` (
  `tracking_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `progress_percentage` decimal(5,2) DEFAULT NULL,
  `completion_status` enum('incomplete','in progress','completed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_tracking`
--

INSERT INTO `progress_tracking` (`tracking_id`, `client_id`, `course_id`, `progress_percentage`, `completion_status`) VALUES
(1, 1, 2, 88.00, 'in progress'),
(2, 2, 3, 65.00, 'completed'),
(3, 2, 1, 45.00, 'in progress'),
(4, 1, 2, 75.00, 'incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_name` varchar(100) DEFAULT NULL,
  `type` enum('article','video','document') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`, `type`, `description`, `course_id`) VALUES
(1, 'Executive Presence Workbook', 'document', 'Workbook for practicing executive presence techniques', 1),
(2, 'Team Leadership Video Series', 'article', 'Series of videos covering team leadership concepts', 2),
(3, 'Marketing Strategies eBook', 'article', 'Comprehensive guide to marketing strategies', 3),
(4, 'Team Building Activities Handbook', 'document', 'Handbook with team building activities and exercises', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `coach_id`, `client_id`, `date_time`, `duration_minutes`) VALUES
(1, 1, 2, '2024-05-10 00:00:00', 23),
(2, 4, 3, '2024-05-07 00:00:00', 10),
(3, 4, 1, '2024-05-08 00:00:00', 12),
(4, 3, 1, '2024-05-09 00:00:00', 12),
(5, 3, 1, '2024-05-21 00:00:00', 12),
(6, 3, 1, '2024-05-21 00:00:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `proficiency` enum('beginner','intermediate','advanced','expert') DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `user_id`, `skill_name`, `proficiency`, `category`) VALUES
(1, 1, 'Project Managements', 'intermediate', '3'),
(2, 2, 'Career Coaching', 'expert', '2'),
(6, 3, 'Leadership  Skills', 'advanced', '10'),
(7, 4, 'Marketing', 'beginner', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'MUCYO', 'Justin', 'Mucyo@1', 'mucyojustin@gmail.com', '0798765432', '$2y$10$okrEqC4QVkjsYicoRVaRQODhhL22bZKZ6B.Ej1lvZ5EYkXjAkaZei', '2024-05-07 11:23:09', '1', 0),
(2, 'MUKAMA', 'Danny', 'MUKAMA1', 'mukamadanny@gmaail.com', '078654321', '$2y$10$IVJD5Pd6UpD5xOLOpgsj3.TP1pQYy9t3EGrhGzQATznnOW/Lz0WP2', '2024-05-07 11:27:15', '123', 0),
(3, 'BWIZA', 'Ange', 'Ange1', 'bwizaange@gmail.com', '0788654321', '$2y$10$Ik3NXBpEdHViQf47Co8LuOF6G6fkLAc7gNOUV52rD0rzm3UHxTvh.', '2024-05-07 11:28:41', '12345', 0),
(4, 'DUSINGIZIMANA', 'Innocent', 'DUSINGIZIMANA1', 'dusingizimana@gmail.com', '0787666406', '$2y$10$rRbpk0ZikrP9ooZn4o0aFeT5QdYsmmaAdXlHpqIy0ANwgr5H6tYRS', '2024-05-07 11:30:48', '123456', 0),
(5, 'MANZI', 'Yvan', 'Yvan', 'manziyvan@gmail.com', '07888765432', '$2y$10$Xs7m9NdT5sO/XMyHpIR6BuU8M0x3vrSpe4GTwYqR.85Wi/4BOkpwK', '2024-05-21 11:18:12', '12345', 0),
(6, 'HABINEZA', 'Jean Paul', 'Jean Paul', 'habinezajeanpaul@gmail.com', '0788234156', '$2y$10$Cq42ulBkJCowYoK4w858sOdYmElAPN.NTNEHCreyfWIZ6MiSBhH8S', '2024-05-22 10:38:15', '4567', 0),
(7, 'NIYONKURU', 'Fabrice', 'Fabrice', 'niyonkurufab@gmail.com', '07234516253', '$2y$10$gv2G9lVHHfX1tJugescsKeS6sg83C03hOmvBjH/WKi3jMgo/zV8uO', '2024-05-23 06:23:03', '098744', 0),
(8, 'NIZEYIMANA', 'Maurice', 'MAURICE11', 'nizeyimanamaurice@gmail.com', '0799123454', '$2y$10$2cWNxdD5Ck5d8F6Eu58qZOKfJXBshGCMRChCFpagwe0FXbnd6BP8S', '2024-05-23 07:39:43', '54321', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `career_plans`
--
ALTER TABLE `career_plans`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `progress_tracking`
--
ALTER TABLE `progress_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `coach_id` (`coach_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `career_plans`
--
ALTER TABLE `career_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `progress_tracking`
--
ALTER TABLE `progress_tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `career_plans`
--
ALTER TABLE `career_plans`
  ADD CONSTRAINT `career_plans_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`coach_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`);

--
-- Constraints for table `progress_tracking`
--
ALTER TABLE `progress_tracking`
  ADD CONSTRAINT `progress_tracking_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `progress_tracking_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`coach_id`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
