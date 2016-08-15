-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Jul-2015 às 05:04
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `honeycomb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `ID_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `escola` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `audio` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`ID_aluno`, `nome`, `username`, `endereco`, `sexo`, `telefone`, `senha`, `escola`, `avatar`, `audio`) VALUES
(1, '', 'mari', '', '', '', '1234', '', '1.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_responsavel`
--

CREATE TABLE IF NOT EXISTS `aluno_responsavel` (
  `ID_aluno` int(11) NOT NULL,
  `ID_responsavel` int(11) NOT NULL,
  KEY `ID_aluno` (`ID_aluno`,`ID_responsavel`),
  KEY `ID_responsavel` (`ID_responsavel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(250) NOT NULL,
  `som` varchar(250) NOT NULL,
  `texto` varchar(300) NOT NULL,
  `video` varchar(250) NOT NULL,
  `libras` varchar(250) NOT NULL,
  `emoticon` varchar(250) NOT NULL,
  `mae` int(11) DEFAULT NULL,
  `aluno` int(11) NOT NULL,
  PRIMARY KEY (`ID_categoria`),
  KEY `mae` (`mae`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `imagem`, `som`, `texto`, `video`, `libras`, `emoticon`, `mae`, `aluno`) VALUES
(1, 'imagem.png', 'som.wav', 'Teste', './uploads/video.mp4', './uploads/video.mp4', './uploads/gif.gif', NULL, 1),
(2, 'Garfield_the_Cat.png', 'picapau.wav', 'Categoria DU MAL!!!!', 'DebonairGalio.mp4', 'DebonairGalio.mp4', 'rainbow.bmp', NULL, 1),
(3, 'familia.png', '', 'Familia', '', '', '', NULL, 1),
(4, 'pai.jpg', '', 'Pai', '', '', '', 3, 1),
(5, 'filho.jpg', '', 'Filho George', '', '', '', 3, 1),
(6, 'irma.jpg', '', 'Irmã do George', '', '', '', 3, 1),
(7, 'gato.jpg', '', 'Gato Real', '', '', '', 6, 1),
(8, 'odie.jpg', '', 'Cachorro do gato real =P', '', '', '', 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE IF NOT EXISTS `responsavel` (
  `ID_responsavel` int(250) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_responsavel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_responsavel`
--
ALTER TABLE `aluno_responsavel`
  ADD CONSTRAINT `aluno_responsavel_ibfk_1` FOREIGN KEY (`ID_aluno`) REFERENCES `aluno` (`ID_aluno`),
  ADD CONSTRAINT `aluno_responsavel_ibfk_2` FOREIGN KEY (`ID_responsavel`) REFERENCES `responsavel` (`ID_responsavel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
