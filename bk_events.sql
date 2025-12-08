-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2025 às 00:46
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
-- Banco de dados: `bk_events`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `data_evento`, `imagem`, `usuario_id`) VALUES
(23, 'Mc Ig', 'ad\r\nadsdad\r\nad\r\nasd\r\nasd\r\ndas', '2025-06-28', 'img_6845f418833ed.png', 4),
(24, 'Mc Ig', 'Participação especial de Mc Negão Original, Mc Ryan e Mc Hariel.', '2025-06-28', 'img_6845f7b1bcd5a.png', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) DEFAULT NULL CHECK (`idade` >= 0),
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `idade`, `email`, `senha`, `foto`, `data_cadastro`) VALUES
(4, 'Larrisa', 17, 'la1234@gmail.com', '$2y$10$DzvuD5lef/yetr2vO85Q/.nt0/HTeV/PppJ/Ut8ZPnFfhD/q6HUE2', 'foto2.jpg', '2025-05-25 17:29:05'),
(5, 'Bolzani', 19, 'bo1234@gmail.com', '$2y$10$rnvR8XoLLeeLuxpuADjBVONJkm5BKbj.YC4X8Ziab4n5JaoTwTOpi', 'foto3.jpg', '2025-05-28 17:28:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
