-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 09:14 AM
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
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_description`
--

CREATE TABLE `job_description` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `ref_id` varchar(20) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `required_skills` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_description`
--

INSERT INTO `job_description` (`id`, `title`, `ref_id`, `position`, `location`, `salary_range`, `date`, `required_skills`, `description`) VALUES
(1, 'Software Developer', 'SD035', 'Full-time Position', 'Melbourne, VIC', '$100,000-$140,000', '2025-04-23', 'Bachelor\'s degree in Computer Science or related field, 3+ years experience in C++, Strong problem-solving and analytical skills, Experience in Unreal Engine or Unity, Proficiency in version control systems (Git)', 'Design and implement scalable software solutions. Write clean, maintainable, and well-documented code. Participate in code reviews and maintain coding standards. Collaborate with UX designers and product managers. Optimise applications for maximum performance, and participate in agile development processes.'),
(2, 'Cloud Engineer', 'CLE56', 'Part-time Position', 'Melbourne, VIC', '$120,000-$155,000', '2025-04-28', 'Bachelor\'s degree in IT or related field, 3+ years experience with AWS or Azure, Strong problem-solving and analytical skills, PAWS Certified Solutions Architect Certification', 'Design and implement cloud-based solutions. Manage server scalability and reliability. Monitor system performance and security. Integrate cloud services and dev teams.'),
(3, 'UI/UX Designer', 'UIX37', 'Full-time Position', 'Melbourne, VIC', '$95,000-$110,000', '2025-04-22', 'Bachelor\'s degree in Design or related fields, 2+ years experience in UI/UX design, Proficiency in Adobe Suite and Figma', 'Design game interfaces and menus. Develop wireframes and prototypes. Conduct user testing and iterate designs. Collaborate with software developers and product managers.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_description`
--
ALTER TABLE `job_description`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_description`
--
ALTER TABLE `job_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
