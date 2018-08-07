-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 06:12 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `first_name` varchar(220) NOT NULL,
  `last_name` varchar(220) NOT NULL,
  `address` varchar(220) NOT NULL,
  `id` varchar(220) NOT NULL,
  `joining_year` int(220) NOT NULL,
  `designation` varchar(220) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`first_name`, `last_name`, `address`, `id`, `joining_year`, `designation`, `gender`, `password`) VALUES
('Gajanan', 'Shanbhag', 'Kumta-581343', 'SVPLIB', 2001, 'Librarian', 'M', 'svp123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_title` varchar(200) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_pages` int(10) NOT NULL,
  `book_branch` varchar(100) NOT NULL,
  `book_sem` int(2) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `description` varchar(220) NOT NULL,
  `status` varchar(200) NOT NULL,
  `state` int(100) NOT NULL,
  `dates` date NOT NULL,
  `return_date` date NOT NULL,
  `copies` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ecard`
--

CREATE TABLE IF NOT EXISTS `ecard` (
  `id` varchar(220) NOT NULL,
  `book_id` varchar(220) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `returned` date NOT NULL,
  `fine` int(220) NOT NULL,
  `state` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `first_name` varchar(220) NOT NULL,
  `last_name` varchar(220) NOT NULL,
  `address` varchar(220) NOT NULL,
  `id` varchar(220) NOT NULL,
  `branch` varchar(220) NOT NULL,
  `joining_year` int(220) NOT NULL,
  `designation` varchar(220) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `total_books` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(244) NOT NULL,
  `dob` date NOT NULL,
  `roll_number` bigint(100) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `sem` varchar(200) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `joining_year` int(5) NOT NULL,
  `total_books` int(10) unsigned NOT NULL,
  `amount` int(220) unsigned NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
