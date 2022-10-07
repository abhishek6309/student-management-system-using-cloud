-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 07:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'Aeiou@123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_short_name` varchar(250) NOT NULL,
  `course_full_name` varchar(250) NOT NULL,
  `course_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_short_name`, `course_full_name`, `course_date`) VALUES
(56, 'B. Tech', 'Bachelor of Technology', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `enrollmentNumber` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `year` varchar(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `SSCPercentage` int(100) NOT NULL,
  `HSCPercentage` int(100) NOT NULL,
  `DiplomaPercentage` int(100) NOT NULL,
  `Semester1SGPA` int(10) NOT NULL,
  `Semester2SGPA` int(10) NOT NULL,
  `Semester3SGPA` int(10) NOT NULL,
  `Semester4SGPA` int(10) NOT NULL,
  `Semester5SGPA` int(10) NOT NULL,
  `Semester6SGPA` int(10) NOT NULL,
  `Semester7SGPA` int(10) NOT NULL,
  `Semester8SGPA` int(10) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_contact` varchar(100) NOT NULL,
  `f_email` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_contact` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `internship_company` varchar(100) NOT NULL,
  `internship_role` varchar(100) DEFAULT NULL,
  `internship_from` date DEFAULT NULL,
  `internship_to` date DEFAULT NULL,
  `internship_company1` varchar(100) NOT NULL,
  `internship_role1` varchar(100) NOT NULL,
  `internship_from1` date DEFAULT NULL,
  `internship_to1` date DEFAULT NULL,
  `internship_company2` varchar(100) NOT NULL,
  `internship_role2` varchar(100) NOT NULL,
  `internship_from2` date DEFAULT NULL,
  `internship_to2` date DEFAULT NULL,
  `achievement` varchar(255) NOT NULL,
  `achievement_desc` varchar(255) NOT NULL,
  `achievement1` varchar(255) NOT NULL,
  `achievement_desc1` varchar(255) NOT NULL,
  `achievement2` varchar(255) NOT NULL,
  `achievement_desc2` varchar(255) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `rollno`, `enrollmentNumber`, `course`, `specialization`, `year`, `name`, `gender`, `dob`, `contact`, `email`, `password`, `address`, `city`, `state`, `zipcode`, `image`, `SSCPercentage`, `HSCPercentage`, `DiplomaPercentage`, `Semester1SGPA`, `Semester2SGPA`, `Semester3SGPA`, `Semester4SGPA`, `Semester5SGPA`, `Semester6SGPA`, `Semester7SGPA`, `Semester8SGPA`, `f_name`, `f_contact`, `f_email`, `m_name`, `m_contact`, `m_email`, `internship_company`, `internship_role`, `internship_from`, `internship_to`, `internship_company1`, `internship_role1`, `internship_from1`, `internship_to1`, `internship_company2`, `internship_role2`, `internship_from2`, `internship_to2`, `achievement`, `achievement_desc`, `achievement1`, `achievement_desc1`, `achievement2`, `achievement_desc2`, `step`) VALUES
(1, '2203531', 'MITU20BTCSD013', 'B. Tech', 'Network Security', 'Second Year', 'Niranjan Fartare', 'Male', '1999-01-19', '9075427622', 'niranjanfartare0@gmail.com', '12345678', '101, Devrach Apartment, Loni Kalbhor', 'Pune', 'Maharashtra', 412201, '', 81, 0, 71, 0, 0, 7, 7, 7, 0, 0, 0, 'Appasaheb Fartare', '9890123970', 'rajenterprises39@gmail.com', 'Meera Fartare', '9960447433', '', 'Google', 'Web Developer', '2022-01-01', '2022-04-01', 'Microsoft', 'Database Manager', '2022-05-01', '2022-08-01', 'Oracle', 'DevOps', '2022-01-01', '2022-05-01', 'Learnt Linux', 'In Summer 2022 i started learning Linux.', 'Certification', 'Completed Cisco ITN Certification', 'AWS Certification', 'Completed AWS Associate Engineer certification.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `contact`, `gender`, `position`, `password`, `address`, `image`) VALUES
(14, 'Test Teacher', 'test@gmail.com', '7878787878', 'Male', 'Head Teacher', '12345678', '', ''),
(1, 'Niranjan', 'admin@gmail.com', '9075427622', 'Male', 'Head Teacher', 'Aeiou@123', 'Pune', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
