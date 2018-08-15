-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Ago-2018 às 02:27
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosplay`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `canal`
--

CREATE TABLE `canal` (
  `id_canal` int(11) NOT NULL,
  `nome_canal` varchar(30) NOT NULL,
  `link_canal` varchar(50) NOT NULL,
  `descricao_canal` varchar(500) NOT NULL,
  `imagem_canal` varchar(50) DEFAULT NULL,
  `avaliacao_canal` varchar(30) DEFAULT NULL,
  `atividade_canal` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `canal`
--

INSERT INTO `canal` (`id_canal`, `nome_canal`, `link_canal`, `descricao_canal`, `imagem_canal`, `avaliacao_canal`, `atividade_canal`, `id_usuario`) VALUES
(1, 'Dicas de Cosmaker', 'https://www.youtube.com/user/dicasdecosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(2, 'Box Box', 'https://www.youtube.com/channel/UCsY94ljKzTlXNueC2', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(3, 'Cosplay Anime', 'https://www.youtube.com/channel/UCDJHa-77_OkRo9uJH', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(4, 'Sakura Prongs', 'https://www.youtube.com/channel/UCnAHT0I49Bk9QGkJO', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(5, 'Lariih Mendes', 'https://www.youtube.com/user/LariihMendesz', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(6, 'DIY Talitah Sampaio', 'https://www.youtube.com/user/NuaseCruas', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(7, 'H-Sama Zuchelli', 'https://www.youtube.com/user/HSAMABLOG', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cosmaker`
--

CREATE TABLE `cosmaker` (
  `id_cos` int(11) NOT NULL,
  `nome_cos` varchar(30) NOT NULL,
  `link_cos` varchar(50) NOT NULL,
  `funcao_cos` varchar(25) NOT NULL,
  `descricao_cos` varchar(700) NOT NULL,
  `imagem_cos` varchar(50) DEFAULT NULL,
  `avaliacao_cos` varchar(30) DEFAULT NULL,
  `atividade_cos` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cosmaker`
--

INSERT INTO `cosmaker` (`id_cos`, `nome_cos`, `link_cos`, `funcao_cos`, `descricao_cos`, `imagem_cos`, `avaliacao_cos`, `atividade_cos`, `id_usuario`) VALUES
(1, 'Jessica Nigri', 'https://pt-br.facebook.com/OfficialJessicaNigri/', 'Cosmaker', 'Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet cons', '', '', 1, NULL),
(2, 'Loki Cosmaker', 'https://www.facebook.com/LokiCosmaker/', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(3, 'Kamui Cosplay', 'https://www.facebook.com/KamuiCos/', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(4, 'Cosplay Mag', 'https://www.facebook.com/cosplaymag/?ref=br_rs', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(5, 'Tine Marie Riis', 'https://www.facebook.com/CosplayerTineMarieRiis/?r', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(6, 'WindoftheStars Cosplay', 'https://www.facebook.com/WindofthestarsCosplay/?re', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(7, 'Tasha Cosplay', 'https://www.facebook.com/TashaCosplay/?ref=br_rs', 'Cosmaker', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dica`
--

CREATE TABLE `dica` (
  `id_dica` int(11) NOT NULL,
  `nome_dica` varchar(30) NOT NULL,
  `descricao_dica` varchar(1000) NOT NULL,
  `data_dica` date DEFAULT NULL,
  `atividade_dica` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dica`
--

INSERT INTO `dica` (`id_dica`, `nome_dica`, `descricao_dica`, `data_dica`, `atividade_dica`, `id_usuario`) VALUES
(1, 'LavaÃ§Ã£o de perucas', 'VocÃª deve deixar sua peruca de molho no amaciante, ela ficarÃ¡ macia e cheirosa.', '0000-00-00', 1, NULL),
(3, 'Espuma expansiva e massa acrÃ­', ' Lembre-se de passar fita na espuma expansiva apÃ³s seca antes de passar a massa, se nÃ£o ficarÃ¡ pesado o objeto.', '0000-00-00', 1, NULL),
(4, 'Como melhorar o EVA', ' VocÃª pode colocar uma fonte de calor prÃ³ximo ao EVA para dar formas a ele.', '0000-00-00', 1, NULL),
(6, 'Teste', 'Teste teste teste teste', '0000-00-00', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(30) NOT NULL,
  `link_evento` varchar(50) NOT NULL,
  `descricao_evento` varchar(500) NOT NULL,
  `data_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `local_evento` varchar(45) NOT NULL,
  `imagem_evento` varchar(50) DEFAULT NULL,
  `avaliacao_evento` varchar(30) DEFAULT NULL,
  `atividade_evento` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `link_evento`, `descricao_evento`, `data_evento`, `hora_evento`, `local_evento`, `imagem_evento`, `avaliacao_evento`, `atividade_evento`, `id_usuario`) VALUES
(1, 'Hanamachi', '', 'Poderia ser melhor.', '2018-11-10', '10:00:00', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(2, 'Anime Expo', '', 'Lorem ipsum dolor sit amet consectetur', '2019-02-02', '01:03:00', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(3, 'Comic Con', '', 'Lorem ipsum dolor sit amet consectetur', '2020-02-02', '21:58:00', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(4, 'Anime Friends', '', 'Lorem ipsum dolor sit amet consectetur', '2020-04-03', '02:04:00', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(5, 'AniVentura', '', 'Lorem ipsum dolor sit amet consectetur', '2020-02-03', '21:57:00', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL,
  `nome_site` varchar(30) NOT NULL,
  `link_site` varchar(50) NOT NULL,
  `descricao_site` varchar(500) NOT NULL,
  `imagem_site` varchar(50) DEFAULT NULL,
  `avaliacao_site` varchar(30) DEFAULT NULL,
  `atividade_site` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`id_site`, `nome_site`, `link_site`, `descricao_site`, `imagem_site`, `avaliacao_site`, `atividade_site`, `id_usuario`) VALUES
(1, 'Aliexpress', 'https://pt.aliexpress.com/', 'lorem ipsum dolor sit amet consectetur', '', NULL, 1, NULL),
(2, 'Wish', 'https://www.wish.com/', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(3, 'ebay', 'https://www.ebay.com/', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL),
(4, 'Mercado Livre', 'https://www.mercadolivre.com.br/', 'Lorem ipsum dolor sit amet consectetur', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `apelido` varchar(10) NOT NULL,
  `data_nasc` date NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `tipo_user` varchar(2) DEFAULT NULL,
  `atividade` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `apelido`, `data_nasc`, `imagem`, `tipo_user`, `atividade`) VALUES
(1, 'admin', 'admin@admin', 'admin', 'admin', '2018-05-09', NULL, '1', 1),
(2, 'Teste', 'teste@teste', 'teste', 'Teste', '2018-01-01', '', '0', 1),
(3, 'Rodolfo Oliveira', 'rodolfo@rodolfo', '1234', 'Rodo', '2012-01-02', '', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`id_canal`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `cosmaker`
--
ALTER TABLE `cosmaker`
  ADD PRIMARY KEY (`id_cos`),
  ADD UNIQUE KEY `id_cos_UNIQUE` (`id_cos`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `dica`
--
ALTER TABLE `dica`
  ADD PRIMARY KEY (`id_dica`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id_site`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canal`
--
ALTER TABLE `canal`
  MODIFY `id_canal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cosmaker`
--
ALTER TABLE `cosmaker`
  MODIFY `id_cos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dica`
--
ALTER TABLE `dica`
  MODIFY `id_dica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `canal`
--
ALTER TABLE `canal`
  ADD CONSTRAINT `canal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `cosmaker`
--
ALTER TABLE `cosmaker`
  ADD CONSTRAINT `cosmaker_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `dica`
--
ALTER TABLE `dica`
  ADD CONSTRAINT `dica_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
