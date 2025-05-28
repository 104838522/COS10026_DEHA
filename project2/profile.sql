-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 03:02 PM
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
-- Database: `profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference` enum('SD035','CLE56','UIX37') NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other','Prefer not to say') NOT NULL,
  `other_gender` varchar(20) DEFAULT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','SA','WA','TAS','NT','ACT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `skill1` varchar(10) DEFAULT NULL,
  `skill2` varchar(10) DEFAULT NULL,
  `skill3` varchar(10) DEFAULT NULL,
  `skill4` varchar(10) DEFAULT NULL,
  `skill5` varchar(10) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference`, `first_name`, `last_name`, `date_of_birth`, `gender`, `other_gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `other_skills`, `status`) VALUES
(2, 'CLE56', 'Bob', 'Lee', '1995-02-20', 'Male', NULL, '456 Bourke St', 'Melbourne', 'VIC', '3000', 'bob.lee@example.com', '0498765432', 'Python', 'Django', 'CSS', NULL, NULL, 'Experience in web scraping.', 'New'),
(3, 'UIX37', 'Charlie', 'Park', '1993-11-05', 'Other', 'Nonbinary', '78 Victoria Rd', 'Parramatta', 'NSW', '2150', 'charlie.park@example.com', '0422333444', 'Figma', 'UX', 'UI', NULL, NULL, 'Designed mobile apps for e-commerce.', 'Final'),
(4, 'CLE56', 'Diana', 'Choi', '2000-03-22', 'Female', NULL, '99 Rundle Mall', 'Adelaide', 'SA', '5000', 'diana.choi@example.com', '0455666777', 'C++', 'Python', 'AWS', NULL, NULL, 'Knowledge of cloud infrastructure.', 'Current'),
(6, 'UIX37', 'Fiona', 'Nguyen', '1996-05-30', 'Female', NULL, '5 Elizabeth St', 'Hobart', 'TAS', '7000', 'fiona.nguyen@example.com', '0433555777', 'UI', 'UX', 'Adobe XD', NULL, NULL, 'Freelance UI/UX designer.', 'Final'),
(7, 'CLE56', 'George', 'Tan', '1992-08-18', 'Male', NULL, '18 Queen St', 'Sydney', 'NSW', '2000', 'george.tan@example.com', '0422444666', 'Java', 'C#', 'ASP.NET', NULL, NULL, 'Worked on enterprise applications.', 'New'),
(9, 'CLE56', 'Ian', 'Smith', '1994-10-01', 'Male', NULL, '11 Collins St', 'Canberra', 'ACT', '2600', 'ian.smith@example.com', '0411223344', 'Linux', 'Bash', 'Networking', NULL, NULL, 'Sysadmin background.', 'Final'),
(10, 'UIX37', 'Jenny', 'Lim', '1990-09-12', 'Other', 'Agender', '8 High St', 'Darwin', 'NT', '0800', 'jenny.lim@example.com', '0477889900', 'HTML', 'CSS', 'JavaScript', NULL, NULL, 'Frontend developer with React.', 'Final'),
(11, 'SD035', 'Alice', 'Kim', '1998-07-15', 'Female', NULL, '123 Swanston St', 'Melbourne', 'VIC', '3000', 'alice.kim@example.com', '0412345678', 'Java', 'PHP', 'HTML', NULL, NULL, 'Familiar with Laravel and MySQL.', 'Current'),
(12, 'SD035', 'Eric', 'Jeong', '1997-12-10', 'Prefer not to say', NULL, '22 George St', 'Brisbane', 'QLD', '4000', 'eric.jeong@example.com', '0400111222', 'SQL', 'JavaScript', 'Node.js', NULL, NULL, 'Used Express and MongoDB in projects.', 'New'),
(13, 'SD035', 'Helen', 'Yoon', '1999-01-10', 'Female', NULL, '200 King St', 'Perth', 'WA', '6000', 'helen.yoon@example.com', '0466778899', 'Python', 'Flask', 'SQLAlchemy', NULL, NULL, 'Web dev with Python back-end.', 'New'),
(14, 'CLE56', 'John', 'Lee', '2022-11-05', 'Male', NULL, '12 Collins st', 'CBD', 'VIC', '3000', 'kimarre@gmail.com', '0492 666 666', 'HTML', 'SQL', NULL, NULL, NULL, 'cooking', 'New'),
(15, 'SD035', 'Daehyeon', 'Kim', '2000-04-04', 'Male', NULL, '11 Collins st', 'CBD', 'VIC', '3000', 'k@gmail.com', '0404555555', 'HTML', NULL, NULL, NULL, NULL, 'Nothing', 'New'),
(16, 'SD035', 'Andrew', 'Jeong', '2025-05-08', 'Male', NULL, '11 Collins st', 'CBD', 'VIC', '3000', 'A@gmail.com', '0434666777', 'HTML', NULL, NULL, NULL, NULL, NULL, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `detail_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_ref`, `title`, `type`, `location`, `salary_range`, `close_date`, `description`, `detail_link`) VALUES
('CLE56', 'Cloud Engineer', 'Part-time', 'Melbourne VIC', '$120,000 - $155,000', '2025-04-28', 'Looking for 1 x Cloud Engineer to join the team in designing and implementing our cloud infrastructure.', 'cloud-engineer-cle56.php'),
('SD035', 'Software Developer', 'Full-time', 'Melbourne VIC', '$100,000 - $140,000', '2025-04-23', 'Hiring 1 x Software Developer to design and build innovative gaming software.', 'software-developer-sd035.php'),
('UIX37', 'UI/UX Designer', 'Full-time', 'Melbourne VIC', '$95,000 - $110,000', '2025-04-22', 'Seeking 1 x experienced UI/UX Designer to shape the player experience for our games.', 'uiux-designer-uix37.php');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password_hash`) VALUES
(1, 'Daehyeon', '$2y$10$wwShoXo84sJHLkeV8qt6teiainqwPwOX9DgGHUyjrYyfXBSXLlunm'),
(2, 'Elana', '$2y$10$LQG76XwkwRoSjOjv8TPzBOpk5BgLK6hAKGaZPbCOKRkgNmJQgWz5W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_ref`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
