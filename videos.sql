-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2015 at 07:09 AM
-- Server version: 5.5.46-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pomfe_webm`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `file`, `name`) VALUES
(1, 'AMS.webm', '1'),
(2, 'AnatoToKoibito.webm', '2'),
(3, 'Anime-KirinoMosaic.webm', '3'),
(4, 'Anime-Mirror.webm', '4'),
(5, 'Anime-Azuki.webm', '5'),
(6, 'Anime-HealthyFood.webm', '6'),
(7, 'AnimeAndSiblings.webm', '7'),
(8, 'AnimeBase.webm', '8'),
(9, 'AnimeDance.webm', '9'),
(10, 'AnimeDance2.webm', '10'),
(11, 'AnimeDance3.webm', '11'),
(12, 'AnimeMix.webm', '12'),
(13, 'AnimeRage.webm', '13'),
(14, 'AnimeRandom2.webm', '14'),
(15, 'AnimeRandomIntro.webm', '15'),
(16, 'AnimeRip.webm', '16'),
(17, 'AnimeSkrillex.webm', '17'),
(18, 'CandyShop.webm', '18'),
(19, 'CatAndCar.webm', '19'),
(20, 'DonaldTrucks.webm', '20'),
(21, 'DonaldTrucks.webm', '21'),
(22, 'DonaldTrumpBing.webm', '22'),
(23, 'DuckS3RL.webm', '23'),
(24, 'Hentai.webm', '24'),
(25, 'KantaiCollection.webm', '25'),
(26, 'LuckyStarRandom.webm', '26'),
(27, 'RingRing.webm', '27'),
(28, 'VottonLooksForMemes.webm', '28'),
(29, 'WindowsShutdown.webm', '29'),
(30, 'YumeNikki.webm', '30'),
(31, 'YuruYuri-Random.webm', '31'),
(32, 'YuruYuriSmoke.webm', '32'),
(33, 'YuruYuriSong.webm', '33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
