<?php 

require_once __DIR__ . "/../app/database/Conexao.php";

$sql = "
-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2018 às 21:40
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";


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
  `nome_canal` varchar(30) DEFAULT NULL,
  `link_canal` varchar(50) DEFAULT NULL,
  `imagem_canal` varchar(30) DEFAULT NULL,
  `avaliacao_canal` varchar(30) DEFAULT NULL,
  `atividade_canal` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `canal`
--

INSERT INTO `canal` (`id_canal`, `nome_canal`, `link_canal`, `imagem_canal`, `avaliacao_canal`, `atividade_canal`, `id_usuario`) VALUES
(1, 'Dicas de Cosmaker', 'https://www.youtube.com/user/dicasdecosmaker', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cosmaker`
--

CREATE TABLE `cosmaker` (
  `id_cos` int(11) NOT NULL,
  `nome_cos` varchar(30) DEFAULT NULL,
  `link_cos` varchar(50) DEFAULT NULL,
  `imagem_cos` varchar(30) DEFAULT NULL,
  `avaliacao_cos` varchar(30) DEFAULT NULL,
  `atividade_cos` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cosmaker`
--

INSERT INTO `cosmaker` (`id_cos`, `nome_cos`, `link_cos`, `imagem_cos`, `avaliacao_cos`, `atividade_cos`, `id_usuario`) VALUES
(1, 'Jessica Nigri', 'https://pt-br.facebook.com/OfficialJessicaNigri/', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dica`
--

CREATE TABLE `dica` (
  `id_dica` int(11) NOT NULL,
  `nome_dica` varchar(30) DEFAULT NULL,
  `descricao_dica` varchar(1000) DEFAULT NULL,
  `data_dica` date DEFAULT NULL,
  `atividade_dica` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dica`
--

INSERT INTO `dica` (`id_dica`, `nome_dica`, `descricao_dica`, `data_dica`, `atividade_dica`, `id_usuario`) VALUES
(1, 'Lavação de perucas', 'Você deve deixar sua peruca de molho no amaciante, ela ficará macia e cheirosa.', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(30) DEFAULT NULL,
  `descricao_evento` varchar(100) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `imagem_evento` varchar(30) DEFAULT NULL,
  `avaliacao_evento` varchar(30) DEFAULT NULL,
  `atividade_evento` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `descricao_evento`, `data_evento`, `hora_evento`, `imagem_evento`, `avaliacao_evento`, `atividade_evento`, `id_usuario`) VALUES
(1, 'Hanamachi', 'Poderia ser melhor.', '2018-11-10', '10:00:00', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL,
  `nome_site` varchar(30) DEFAULT NULL,
  `link_site` varchar(50) DEFAULT NULL,
  `imagem_site` varchar(30) DEFAULT NULL,
  `avaliacao_site` varchar(30) DEFAULT NULL,
  `atividade_site` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`id_site`, `nome_site`, `link_site`, `imagem_site`, `avaliacao_site`, `atividade_site`, `id_usuario`) VALUES
(1, 'Aliexpress', 'https://pt.aliexpress.com/br_home.htm', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `apelido` varchar(10) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `imagem` varchar(30) DEFAULT NULL,
  `tipo_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `apelido`, `data_nasc`, `imagem`, `tipo_user`) VALUES
(1, 'admin', 'admin@admin', 'admin', 'admin', '2018-05-09', NULL, NULL);

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
  MODIFY `id_canal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cosmaker`
--
ALTER TABLE `cosmaker`
  MODIFY `id_cos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dica`
--
ALTER TABLE `dica`
  MODIFY `id_dica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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


Conexao::getConexao().exec($sql);


