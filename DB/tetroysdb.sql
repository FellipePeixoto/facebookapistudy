-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jun-2019 às 04:37
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tetroysdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `userId` varchar(150) NOT NULL,
  `nickName` varchar(50) DEFAULT NULL,
  `playerScore` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `player`
--

INSERT INTO `player` (`id_player`, `userId`, `nickName`, `playerScore`) VALUES
(8, '2251550071565102', 'Fellipe Eduardo', 6),
(9, '100900407846254', 'Linda Alcgghhhdcjfg McDonaldsen', 19),
(10, '104038977527433', 'Joe Alcgfciicbdab Greeneson', 51),
(11, '101045284498044', 'Barbara Alcggggagcchf Zamoreescu', 8),
(12, '109236573668391', 'Ava Alcgdfadgcdcb Dinglestein', 0),
(13, '113043106612997', 'Open Graph Test User', 22);

-- --------------------------------------------------------

--
-- Stand-in structure for view `player_top4`
-- (See below for the actual view)
--
CREATE TABLE `player_top4` (
`userId` varchar(150)
,`nickName` varchar(50)
,`playerScore` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `player_top4`
--
DROP TABLE IF EXISTS `player_top4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `player_top4`  AS  select `player`.`userId` AS `userId`,`player`.`nickName` AS `nickName`,`player`.`playerScore` AS `playerScore` from `player` order by `player`.`playerScore` desc limit 4 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
