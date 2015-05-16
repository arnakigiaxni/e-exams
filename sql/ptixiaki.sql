-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Μάη 2015 στις 17:10:37
-- Έκδοση διακομιστή: 5.6.24
-- Έκδοση PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `ptixiaki`
--
CREATE DATABASE IF NOT EXISTS `ptixiaki` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ptixiaki`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `arithm_apotel`
--

CREATE TABLE IF NOT EXISTS `arithm_apotel` (
  `id` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `arithm_apotel_results`
--

CREATE TABLE IF NOT EXISTS `arithm_apotel_results` (
  `id` int(11) NOT NULL,
  `aem` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `given_answer` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `succeeded_or_failed` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pollaplis`
--

CREATE TABLE IF NOT EXISTS `pollaplis` (
  `id` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pollaplis_results`
--

CREATE TABLE IF NOT EXISTS `pollaplis_results` (
  `id` int(11) NOT NULL,
  `aem` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `given_answer` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `succeeded_or_failed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sosto_lathos`
--

CREATE TABLE IF NOT EXISTS `sosto_lathos` (
  `id` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sosto_lathos_results`
--

CREATE TABLE IF NOT EXISTS `sosto_lathos_results` (
  `id` int(11) NOT NULL,
  `aem` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `given_answer` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `succeeded_or_failed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `lesson` int(11) NOT NULL,
  `teams` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `teams`
--

INSERT INTO `teams` (`lesson`, `teams`) VALUES
(1, 2),
(2, 4),
(3, 2),
(4, 4);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `vathmologies`
--

CREATE TABLE IF NOT EXISTS `vathmologies` (
  `id` int(11) NOT NULL,
  `aem` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `grade` float NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `xronos`
--

CREATE TABLE IF NOT EXISTS `xronos` (
  `lesson` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `xronos`
--

INSERT INTO `xronos` (`lesson`, `time`) VALUES
(1, 11),
(2, 5),
(3, 11),
(4, 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `arithm_apotel`
--
ALTER TABLE `arithm_apotel`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `arithm_apotel_results`
--
ALTER TABLE `arithm_apotel_results`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `pollaplis`
--
ALTER TABLE `pollaplis`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `pollaplis_results`
--
ALTER TABLE `pollaplis_results`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `sosto_lathos`
--
ALTER TABLE `sosto_lathos`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `sosto_lathos_results`
--
ALTER TABLE `sosto_lathos_results`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `vathmologies`
--
ALTER TABLE `vathmologies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `arithm_apotel`
--
ALTER TABLE `arithm_apotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `arithm_apotel_results`
--
ALTER TABLE `arithm_apotel_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `pollaplis`
--
ALTER TABLE `pollaplis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `pollaplis_results`
--
ALTER TABLE `pollaplis_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `sosto_lathos`
--
ALTER TABLE `sosto_lathos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `sosto_lathos_results`
--
ALTER TABLE `sosto_lathos_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `vathmologies`
--
ALTER TABLE `vathmologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
