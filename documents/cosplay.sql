-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2018 às 05:47
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
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL,
  `nome_site` varchar(50) NOT NULL,
  `link_site` varchar(100) NOT NULL,
  `descricao_site` varchar(500) NOT NULL,
  `imagem_site` varchar(100) NOT NULL,
  `atividade_site` tinyint(1) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`id_site`, `nome_site`, `link_site`, `descricao_site`, `imagem_site`, `atividade_site`, `id_usuario`) VALUES
(1, 'Aliexpress', 'https://pt.aliexpress.com/', 'Ã‰ um site de varejo on-line fundado em 2010 e baseado em e-commerce na internet. Aqui vocÃª pode encontrar suas peÃ§as para cosplay por preÃ§os muito acessÃ­veis.\r\n', '29112018053353ali.png', 1, 5),
(2, 'Wish', 'https://www.wish.com/', 'A loja possui a Wish Outlet, que vende produtos com marcas de overstocked abaixo do preÃ§o de varejo sugerido pelo fabricante e tambÃ©m possui o Wish Express, que envia rapidamente.', '29112018053519wish.jpg', 1, 6),
(3, 'Mercado Livre', 'https://www.mercadolivre.com.br/', 'Ã‰ uma empresa que oferece soluÃ§Ãµes de comÃ©rcio para que pessoas e empresas possam comprar, vender, pagar, anunciar e enviar produtos por meio da internet.', '29112018053558mercado-livre.jpg', 1, 6),
(4, 'Milanoo', 'https://www.milanoo.com/', 'Ã‰ uma das empresa lÃ­deres no segmento online varejista. Sendo especializada na venda de vestuÃ¡rio feminino, masculino, festa, cosplay, fantasias e dentre outros produtos.', '29112018053643milanoo.png', 1, 7),
(5, 'Nipon Cosplay', 'https://www.niponcosplay.com.br/', 'Nipon Cosplay Ã© um site destinado especialmente para venda de produtos Cosmakers. Nele vocÃª encontra  perucas, armas, roupas e acessÃ³rios diversos. ', '29112018053717nipon.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id_site`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
