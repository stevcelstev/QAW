-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 19, 2022 la 09:08 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `qaw`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `category_tag`
--

CREATE TABLE `category_tag` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `question_report`
--

CREATE TABLE `question_report` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `question_tag`
--

CREATE TABLE `question_tag` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_badge`
--

CREATE TABLE `user_badge` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_comment`
--

CREATE TABLE `user_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `category_tag`
--
ALTER TABLE `category_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexuri pentru tabele `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexuri pentru tabele `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `question_report`
--
ALTER TABLE `question_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexuri pentru tabele `question_tag`
--
ALTER TABLE `question_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexuri pentru tabele `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user_badge`
--
ALTER TABLE `user_badge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `badge_id` (`badge_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `category_tag`
--
ALTER TABLE `category_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `question_report`
--
ALTER TABLE `question_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `question_tag`
--
ALTER TABLE `question_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user_badge`
--
ALTER TABLE `user_badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `category_tag`
--
ALTER TABLE `category_tag`
  ADD CONSTRAINT `category_tag_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Constrângeri pentru tabele `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Constrângeri pentru tabele `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constrângeri pentru tabele `question_report`
--
ALTER TABLE `question_report`
  ADD CONSTRAINT `question_report_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`),
  ADD CONSTRAINT `question_report_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Constrângeri pentru tabele `question_tag`
--
ALTER TABLE `question_tag`
  ADD CONSTRAINT `question_tag_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `question_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Constrângeri pentru tabele `user_badge`
--
ALTER TABLE `user_badge`
  ADD CONSTRAINT `user_badge_ibfk_1` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id`),
  ADD CONSTRAINT `user_badge_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constrângeri pentru tabele `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constrângeri pentru tabele `user_comment`
--
ALTER TABLE `user_comment`
  ADD CONSTRAINT `user_comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `user_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
