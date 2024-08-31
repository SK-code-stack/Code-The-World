-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 10:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminName` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminName`, `adminPassword`) VALUES
('salmankhan00', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `jobPosition` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `experiance` enum('Fresh','Experienced') NOT NULL,
  `lastJob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gander` enum('M','F','O') NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`jobPosition`, `firstName`, `lastName`, `degree`, `experiance`, `lastJob`, `email`, `gander`, `contact`) VALUES
('Word Press Developer', 'salman', 'khan', 'adp cs', 'Fresh', 'none', 'maan840khan@gmail.com', 'M', 2147483647),
('', 'sohaib', 'ali', 'bscs', 'Fresh', 'fresh', 'sohaib@gmail.com', 'M', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userMessage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `userName`, `userEmail`, `userMessage`, `created_at`) VALUES
(1, 'salman', 'salman@gmail.com', 'test checked', '2024-07-18 19:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category`, `img`, `title`, `description`) VALUES
(1, 'Development', 'pictures/fullstack.jpg', 'Full Stack Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel in deleniti eum itaque totam consequatur aperiam est neque nostrum quis.'),
(2, 'Development', 'pictures/front-end-developer.jpg', 'Front End Development', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n'),
(3, 'Development', 'pictures/wordpress.png', 'Web With Word press\r\n', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(4, 'Development', 'pictures/data science.webp', 'Data Science Engineering\r\n', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\n\n'),
(5, 'Development', 'pictures/software.jpg', 'Software\nDevelopment', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.'),
(6, 'Development', 'pictures/back-end-developer.jpg', 'Back-End Development', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.'),
(7, 'Languages', 'pictures/java.png', 'Java', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.'),
(8, 'Languages', 'pictures/ruby.png', 'Ruby', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.'),
(9, 'Languages', 'pictures/python.png', 'Python', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel in deleniti eum itaque totam consequatur aperiam est neque nostrum quis.'),
(10, 'Languages', 'pictures/kotlin.webp\r\n', 'Kotlin', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(11, 'Languages', 'pictures/c.jpg', 'C++', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(12, 'Languages', 'pictures/swift.jpg', 'Swift', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(13, 'Graphic Designing', 'pictures/illustrator.png', 'Illustrator', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel in deleniti eum itaque totam consequatur aperiam est neque nostrum quis.'),
(14, 'Graphic Designing', 'pictures/photoshop.jpg', 'PhotoShop', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(15, 'Graphic Designing', 'pictures/f;ash.jpg', 'Adobe Flash\r\n', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n'),
(16, 'Graphic Designing', 'pictures/corel.jpg', 'Corel Draw', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(17, 'Graphic Designing', 'pictures/fire.jpeg', 'Adobe Fire Work\r\n', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(18, 'Graphic Designing', 'pictures/c.jpg', 'C++', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(19, 'Others', 'pictures/cyber.webp', 'Cyber Security', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(20, 'Others', 'pictures/seo.jpg', 'SEO', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(21, 'Others', 'pictures/digital marketing.jpg', 'Digital Marketing', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(22, 'Others', 'pictures/vedit.jpeg', 'Video Editing', '\r\nLorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(23, 'Others', 'pictures/virtual.webp', 'Virtual Assistant', '\r\nLorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n'),
(24, 'Others', 'pictures/ai.jpg', 'Artificial Intelligence\r\n', '\r\nLorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `category`, `img`) VALUES
('j1', 'Full Stack Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel in deleniti eum itaque totam consequatur aperiam est neque nostrum quis.', 'Full Time', 'pictures/fullstack.jpg'),
('j2', 'Front End Development', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Full Time', 'pictures/front-end-developer.jpg'),
('j3', 'Word Press Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Full Time', 'pictures/wordpress.png'),
('j4', 'Data Science Engineer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Full Time', 'pictures/data science.webp'),
('j5', 'Software Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Full Time', 'pictures/software.jpg'),
('j6', 'Back-End Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Full Time', 'pictures/back-end-developer.jpg'),
('p1', 'Java Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/java.png'),
('p2', 'Ruby Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/ruby.png'),
('p3', 'Python Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/python.png'),
('p4', 'Kotlin Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/kotlin.webp'),
('p5', 'C++ Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/c.jpg'),
('p6', 'Swift Developer', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Vel In Deleniti Eum Itaque Totam Consequatur Aperiam Est Neque Nostrum Quis.', 'Part Time', 'pictures/swift.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `enrolledIn` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gander` enum('Male','Female','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`enrolledIn`, `firstname`, `lastname`, `username`, `email`, `password`, `gander`) VALUES
('Web With Word press', 'naveed', 'nawaz', 'ch naveed', 'naveed@hotmail.com', '1234', 'Male'),
('Data Science Engineering', 'alskfjsh', 'kjhjkhhkj', 'ghjhkjhjhhgjhgf', 'sasasa@gmail.com', '123321', 'Male'),
('', 'musa', 'yousaf', 'musa12', 'musa12', '1212', 'Male'),
('', 'Salman', 'Khan', 'salman12khan', 'salman@gmail.com', '1234', ''),
('', 'shabir', 'Khan', 'shabirkhan12', 'shabir@gmail.com', '21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminName`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`email`,`contact`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
