-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2017 at 02:24 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eLearningProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `billNo` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`) VALUES
(1, 'Bilgisayar Bilimi'),
(2, 'Matematik');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `no`, `courseId`) VALUES
(1, 'Giriş', 1, 1),
(2, 'C\'de Döngüler', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courseDetails`
--

CREATE TABLE `courseDetails` (
  `id` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `summary` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `objectives` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `courseDetails`
--

INSERT INTO `courseDetails` (`id`, `courseId`, `summary`, `objectives`) VALUES
(1, 1, 'C ye girişi dersidir.', '<li> c yi öğrenmek </li>'),
(2, 2, 'kalkülüs dersidir', 'kalkülüs öğrenmek'),
(3, 3, 'Kalkülüs 2 dersidir', 'Kalkülüs 2 öğrenmek');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instructorId` int(11) DEFAULT NULL,
  `catagoryId` int(11) DEFAULT NULL,
  `price` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `instructorId`, `catagoryId`, `price`, `createdDate`, `updatedDate`, `isActive`) VALUES
(1, 'C\'ye Giriş', 1, 1, '100', '2017-01-27 01:41:14', '2017-01-27 01:41:14', 1),
(2, 'Kalkulüs', 1, 2, '50', '2017-01-27 02:37:42', '2017-01-27 02:37:42', 1),
(3, 'Kalkulüs 2', 1, 2, '50', '2017-01-27 02:39:30', '2017-01-27 02:39:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseToUser`
--

CREATE TABLE `courseToUser` (
  `id` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdDate` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `documentTypeId` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `lessonId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `uploadedDate` datetime DEFAULT NULL,
  `explanation` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isAsset` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentTypes`
--

CREATE TABLE `documentTypes` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `documentTypes`
--

INSERT INTO `documentTypes` (`id`, `name`) VALUES
(1, '.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `educationLevels`
--

CREATE TABLE `educationLevels` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `educationLevels`
--

INSERT INTO `educationLevels` (`id`, `name`) VALUES
(1, 'Lisans'),
(2, 'Yüksek Lisans');

-- --------------------------------------------------------

--
-- Table structure for table `examProcess`
--

CREATE TABLE `examProcess` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `chapterId` int(11) DEFAULT NULL,
  `isSuccess` int(11) DEFAULT NULL,
  `Grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `questionId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `InstructorId` int(11) DEFAULT NULL,
  `chapterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examTypes`
--

CREATE TABLE `examTypes` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `IPTables`
--

CREATE TABLE `IPTables` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `IP` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `where` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessonLegends`
--

CREATE TABLE `lessonLegends` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `lessonLegends`
--

INSERT INTO `lessonLegends` (`id`, `name`) VALUES
(1, 'Başlanılmadı'),
(2, 'Devam Ediyor'),
(3, 'Tamamlandı');

-- --------------------------------------------------------

--
-- Table structure for table `lessonProgress`
--

CREATE TABLE `lessonProgress` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `lessonId` int(11) DEFAULT NULL,
  `lessonLegendId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `chapterId` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `duration` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `chapterId`, `name`, `duration`, `typeId`) VALUES
(1, 1, 'Programlama Dilleri Nedir', '30', 1),
(2, 1, 'Kurulum', '15', 1),
(4, 2, 'Merhaba Dünya', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `lessonId` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `catagoryId` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `lessonId`, `courseId`, `catagoryId`, `name`) VALUES
(1, 0, 1, 0, 'C-ye-Giris'),
(2, 0, 2, 0, 'Kalkulus'),
(3, 0, 3, 0, 'Kalkulus-2'),
(4, 0, NULL, 1, 'Bilgisayar-Bilimi'),
(5, 0, NULL, 2, 'Matematik'),
(40, 1, 1, NULL, 'Programlama-Dilleri-Nedir'),
(41, 2, 1, NULL, 'Kurulum'),
(42, 4, 1, NULL, 'Merhaba-Dunya');

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`) VALUES
(1, 'Mühendis'),
(2, 'Öğretmen');

-- --------------------------------------------------------

--
-- Table structure for table `paymentProcess`
--

CREATE TABLE `paymentProcess` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `situation` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `discussionId` int(11) DEFAULT NULL,
  `createdDate` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `updatedDate` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` varchar(2000) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `correctAnswer` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `examTypeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `stars` varchar(1) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `courseId`, `stars`) VALUES
(1, 1, '5'),
(2, 2, '2'),
(3, 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `sems`
--

CREATE TABLE `sems` (
  `id` int(11) NOT NULL,
  `personalName` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `personalSurname` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telephone` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `universityId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `lessonId` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userDetails`
--

CREATE TABLE `userDetails` (
  `userId` int(11) DEFAULT NULL,
  `age` varchar(2) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL,
  `occupationId` int(11) DEFAULT NULL,
  `educationId` int(11) DEFAULT NULL,
  `fbUserName` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twUserName` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `about` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `profileImageURL` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tcNo` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `userDetails`
--

INSERT INTO `userDetails` (`userId`, `age`, `phone`, `typeId`, `occupationId`, `educationId`, `fbUserName`, `twUserName`, `about`, `profileImageURL`, `tcNo`, `address`, `gender`) VALUES
(1, '24', NULL, 3, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `lastname` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `createdDate`, `updatedDate`) VALUES
(1, 'Sevki', 'Kocadag', 'bekirsevki', 'bekirsevki@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-26 15:09:02', '2017-01-26 15:09:02'),
(2, 'a', 'b', 'a', 'a@a.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-26 15:39:57', '2017-01-26 15:39:57'),
(3, 'b', 'b', 'b', 'b@b.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-26 15:58:13', '2017-01-26 15:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `userTypes`
--

CREATE TABLE `userTypes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `userTypes`
--

INSERT INTO `userTypes` (`id`, `name`) VALUES
(1, 'Kullanıcı'),
(2, 'Eğitmen'),
(3, 'Yönetici');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `viewerId` int(11) DEFAULT NULL,
  `documentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `courseDetails`
--
ALTER TABLE `courseDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCatagoryId_idx` (`catagoryId`),
  ADD KEY `fInstructorId_idx` (`instructorId`);

--
-- Indexes for table `courseToUser`
--
ALTER TABLE `courseToUser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fLessonId_idx` (`lessonId`),
  ADD KEY `fDocumentTypeId_idx` (`documentTypeId`),
  ADD KEY `fCourseId_doc_idx` (`courseId`);

--
-- Indexes for table `documentTypes`
--
ALTER TABLE `documentTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationLevels`
--
ALTER TABLE `educationLevels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examProcess`
--
ALTER TABLE `examProcess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ChapterId_idx` (`chapterId`),
  ADD KEY `fUserId_idx` (`userId`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fInstructorId_idx` (`questionId`),
  ADD KEY `fChapterId_idx` (`chapterId`);

--
-- Indexes for table `examTypes`
--
ALTER TABLE `examTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IPTables`
--
ALTER TABLE `IPTables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`);

--
-- Indexes for table `lessonLegends`
--
ALTER TABLE `lessonLegends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessonProgress`
--
ALTER TABLE `lessonProgress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fLessenLegendId_idx` (`lessonLegendId`),
  ADD KEY `fLessonId_idx` (`lessonId`),
  ADD KEY `fUserId_idx` (`userId`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fChapterId_idx` (`chapterId`),
  ADD KEY `fLessonTypeId_idx` (`typeId`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fL_Course` (`courseId`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentProcess`
--
ALTER TABLE `paymentProcess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCourseId_idx` (`courseId`),
  ADD KEY `fUserId_idx` (`userId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fDisscussionId_idx` (`discussionId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fExamTypeId_idx` (`examTypeId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCourseId_idx` (`courseId`);

--
-- Indexes for table `sems`
--
ALTER TABLE `sems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fUniversity_idx` (`universityId`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fLessonId_t_idx` (`lessonId`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fCity_idx` (`cityId`);

--
-- Indexes for table `userDetails`
--
ALTER TABLE `userDetails`
  ADD KEY `fOccupation_idx` (`occupationId`),
  ADD KEY `fEducationLevelId_idx` (`educationId`),
  ADD KEY `fUserId_idx` (`userId`),
  ADD KEY `fUserTypeId_idx` (`typeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userTypes`
--
ALTER TABLE `userTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fViewerId_idx` (`viewerId`),
  ADD KEY `fDocumentId_idx` (`documentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courseDetails`
--
ALTER TABLE `courseDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courseToUser`
--
ALTER TABLE `courseToUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documentTypes`
--
ALTER TABLE `documentTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `educationLevels`
--
ALTER TABLE `educationLevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `examProcess`
--
ALTER TABLE `examProcess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examTypes`
--
ALTER TABLE `examTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `IPTables`
--
ALTER TABLE `IPTables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lessonLegends`
--
ALTER TABLE `lessonLegends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lessonProgress`
--
ALTER TABLE `lessonProgress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentProcess`
--
ALTER TABLE `paymentProcess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sems`
--
ALTER TABLE `sems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userTypes`
--
ALTER TABLE `userTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fCourseId_bill` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_bill` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `fCourseId_chapters` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fCourseId_comments` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_comments` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courseDetails`
--
ALTER TABLE `courseDetails`
  ADD CONSTRAINT `fCourseId_courseDetails` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fCatagoryId_courses` FOREIGN KEY (`catagoryId`) REFERENCES `catagories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fInstructorId_courses` FOREIGN KEY (`instructorId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courseToUser`
--
ALTER TABLE `courseToUser`
  ADD CONSTRAINT `fCourseId_c2u` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_c2u` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `fCourseId_discussions` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_discussions` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fCourseId_doc` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fDocumentTypeId_doc` FOREIGN KEY (`documentTypeId`) REFERENCES `documentTypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fLessonId_doc` FOREIGN KEY (`lessonId`) REFERENCES `lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `examProcess`
--
ALTER TABLE `examProcess`
  ADD CONSTRAINT `ChapterId_examProcess` FOREIGN KEY (`chapterId`) REFERENCES `chapters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_examProcess` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `fChapterId_exams` FOREIGN KEY (`chapterId`) REFERENCES `chapters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fInstructorId_exams` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `IPTables`
--
ALTER TABLE `IPTables`
  ADD CONSTRAINT `fUserId_IP` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessonProgress`
--
ALTER TABLE `lessonProgress`
  ADD CONSTRAINT `fLessenLegendId_lessonProgress` FOREIGN KEY (`lessonLegendId`) REFERENCES `lessonLegends` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fLessonId_lessonProgress` FOREIGN KEY (`lessonId`) REFERENCES `lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_lessonProgress` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fChapterId_lessons` FOREIGN KEY (`chapterId`) REFERENCES `chapters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fLessonTypeId_lessons` FOREIGN KEY (`typeId`) REFERENCES `documentTypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paymentProcess`
--
ALTER TABLE `paymentProcess`
  ADD CONSTRAINT `fCourseId_paymentProcess` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_paymentProcess` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fDisscussionId_posts` FOREIGN KEY (`discussionId`) REFERENCES `discussions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_posts` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fExamTypeId_questions` FOREIGN KEY (`examTypeId`) REFERENCES `examTypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fCourseId_ratings` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sems`
--
ALTER TABLE `sems`
  ADD CONSTRAINT `fUniversity_sems` FOREIGN KEY (`universityId`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fLessonId_t` FOREIGN KEY (`lessonId`) REFERENCES `lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `fCity_universities` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userDetails`
--
ALTER TABLE `userDetails`
  ADD CONSTRAINT `fEducationLevelId_uD` FOREIGN KEY (`educationId`) REFERENCES `educationLevels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fOccupationId_uD` FOREIGN KEY (`occupationId`) REFERENCES `occupations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserId_uD` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fUserTypeId_uD` FOREIGN KEY (`typeId`) REFERENCES `userTypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `fDocumentId_v` FOREIGN KEY (`documentId`) REFERENCES `documents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fViewerId_v` FOREIGN KEY (`viewerId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
