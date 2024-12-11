-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/12/2024 às 12:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `officematch`
--
CREATE DATABASE IF NOT EXISTS `officematch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `officematch`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `descricao`, `imagem`) VALUES
(4, 'Steve Jobs', 'Fundador e Diretor da Apple Inc.', 'public/funcionariosFotos/steveJobsjpg.jpg'),
(5, 'Mark Zuckerberg', 'Fundador e Diretor da Meta Inc.', 'public/funcionariosFotos/mark.jpg'),
(6, 'Bill Gates', 'Fundador e Diretor da Microsoft Inc.', 'public/funcionariosFotos/billGates.jpg'),
(7, 'Steve Wozniak', 'Co-Fundador e Funcionario da Apple Inc.', 'public/funcionariosFotos/steveWozniak.jpg'),
(8, 'Jeff Bezos', 'Fundador e Diretor da Amazon Inc.', 'public/funcionariosFotos/jeffBezos.png'),
(9, 'Elon Musk', 'Fundador da Tesla Inc e SpaceX Inc.', 'public/funcionariosFotos/elonMusk.jpg'),
(11, 'Neymar', 'Lindo perfeito jogador caro dono de um aviao', 'public/funcionariosFotos/ney.jpg'),
(12, 'Will Smith', 'Cara brabo dos files que é funcionario de hollywoo', 'uploads/imagens/1733915368_willBrabo.jpeg'),
(13, 'Messi', 'Melhor jogador do mundo, funcionário Inter Miami', 'uploads/imagens/1733915831_melhorDoMundo.jpeg'),
(14, 'Faustão', 'Ex-funcionário da rede Band e Globo', 'uploads/imagens/1733915933_faustao.jpeg'),
(15, 'Marcelo Lima Calixto', 'Diretor do IFRS Campus Feliz', 'uploads/imagens/1733916014_Marcelao.jpg'),
(16, 'Vinicius Hartmann Ferreira', 'Melhor Professor do IFRS Campus Feliz - Programaçã', 'uploads/imagens/1733916098_ViniciusFerreira.png'),
(17, 'ChatGPT', 'Melhor funcionario de todos os tempos, onipresente', 'uploads/imagens/1733916164_chat.png'),
(18, 'Cleonei Cenci', 'Professor de Filosofia no IFRS Campus Feliz', 'uploads/imagens/1733916271_cleclei.jpg'),
(19, 'Kaua da Cruz Klassmann', 'Desenvolvedor do sistema operacional klsOs', 'uploads/imagens/1733916470_klassmann.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `senha`, `email`) VALUES
(10, 'admin', 'admin123', 'admin@admin'),
(15, 'Gustavo', '123123', 'gustavo@aluno.feliz.ifrs.edu.br');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
