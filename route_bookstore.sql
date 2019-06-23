-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 11:25 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `route_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_bin NOT NULL,
  `author` varchar(200) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `Cover` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category`, `title`, `author`, `price`, `Cover`) VALUES
(2, 5, 'Flower Pictures', 'Kevin R.Hammer', '60.00', '/images/BooksImages/01book.jpg'),
(3, 3, 'Learn Php from A to Z', 'William K.Arther', '40.00', '/images/BooksImages/4F7EE289-63F1-4DDB-9A11-80FF849E97A8book.jpg'),
(4, 2, 'Hello World', 'Hassan Ahmed', '15.00', '/images/BooksImages/863906EE-1AC5-4F1B-9A9A-5AC6CBD523F2book.jpg'),
(5, 2, 'English made Easy', 'Robin Williams', '20.00', '/images/BooksImages/09E15F56-A1A2-4DF9-9D1A-FC242042CA4Abook.jpg'),
(6, 2, 'A to Z', 'Ahmed Rabi', '30.00', '/images/BooksImages/94037D32-03BC-43EA-960A-E168161532DAbook.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `Category` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `Category`) VALUES
(5, 'Arts & Photography'),
(2, 'Education'),
(4, 'Health'),
(1, 'History'),
(3, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8_bin NOT NULL,
  `salt` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `email`, `mobile`, `password`, `salt`) VALUES
(1, 2, 'Ahmed', 'ahmed@gmail.com', '0122456789', '2fa235d51e0ebe5ac93eff8720a91b65915b4e7623fde019706413fcc088e03e', '0b9021'),
(14, 2, 'Ahmed', 'ahmedm12@gmail.com', '00125465879', 'ce14aebb1f5187026a4341fa820c7fcc3a409b76f517e3c67655449f9860cf98', '2899af'),
(15, 1, 'Ahmed Rabi', 'ahmedrabi100@gmail.com', '01119082271', '88085f0e6bfd3e109ac47f6eab3060045f5dd4607d49ccfc441c6975932718d2', '6ecf58');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book_category` FOREIGN KEY (`category`) REFERENCES `book_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
