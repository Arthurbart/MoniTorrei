-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/12/2024 às 20:51
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
-- Banco de dados: `monitorrei`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avisos`
--

CREATE TABLE `avisos` (
  `id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data_aviso` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avisos`
--

INSERT INTO `avisos` (`id`, `conteudo`, `data_aviso`, `usuario_id`, `monitoria_id`) VALUES
(11, 'Bom dia! A monitoria de hoje começará mais cedo, para quem precsar, as 12:00 o lab 03 já estará aberto', '2024-12-19', 1, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `tipo` text NOT NULL,
  `doc` longblob DEFAULT NULL,
  `descricao` text NOT NULL,
  `data_postagem` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `documentos`
--

INSERT INTO `documentos` (`id`, `titulo`, `tipo`, `doc`, `descricao`, `data_postagem`, `usuario_id`, `monitoria_id`) VALUES
(5, '', 'Conteúdo', 0x32365f67617365735f6964656169732e706466, 'Para os alunos de agropecuária que pediram, anexei aqui o documento descompactado da explicação de química', '2024-12-19', 1, 26),
(6, '', 'Atividade', 0x32365f6c697374615f7465726d6f2e706466, 'Aqui está os exercícios de química que pediram tmb', '2024-12-19', 1, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL,
  `estrelas` int(11) NOT NULL CHECK (`estrelas` between 1 and 5),
  `comentario` text DEFAULT NULL,
  `data_feedback` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitorias`
--

CREATE TABLE `monitorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `sala` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `curso` varchar(50) NOT NULL DEFAULT 'Todos os cursos',
  `status` varchar(10) NOT NULL DEFAULT 'ativo',
  `dias` varchar(50) NOT NULL DEFAULT 'Segundas, terças e quintas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `monitorias`
--

INSERT INTO `monitorias` (`id`, `nome`, `horario`, `sala`, `usuario_id`, `curso`, `status`, `dias`) VALUES
(26, 'Laboratório de Estudos Extraclasse', '12:20', 'Lab 03', 1, 'Todos os Cursos', 'ativo', 'Segundas, Terças e Quintas'),
(27, 'Redes de Computadores', '13:00', 'Sala G4', 5, 'Informática', 'desativado', 'Terças e Quintas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_conteudo`
--

CREATE TABLE `pedidos_conteudo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data_pedido` date NOT NULL DEFAULT curdate(),
  `status` varchar(50) NOT NULL DEFAULT 'Em aguardo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos_conteudo`
--

INSERT INTO `pedidos_conteudo` (`id`, `usuario_id`, `monitoria_id`, `conteudo`, `data_pedido`, `status`) VALUES
(36, 3, 26, 'Olá, você teria disponibilidade / conhecimento para me ajudar a descompactar alguns arquivos do sigaa? não entendi como se faz direito...', '2024-12-19', 'aceito'),
(37, 5, 26, 'oiii, eu sei que esta encima da hora mas vc poderia me ajudar com um trabalho de fisica??? preciso muito', '2024-12-19', 'negado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `presencas`
--

CREATE TABLE `presencas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL,
  `data_presenca` date NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `presencas`
--

INSERT INTO `presencas` (`id`, `usuario_id`, `monitoria_id`, `data_presenca`, `feedback`) VALUES
(1, 5, 26, '2024-12-19', 'Aluna exeemplar, utilizou bem dos recursos disponiveis.'),
(2, 4, 26, '2024-12-19', 'Apresentou desatenção e permaneceu parte do tempo em ociosidade.\r\n'),
(3, 6, 26, '2024-12-19', 'Utilizou bem do tempo da monitoria, sanou dúvidas e aparentava estar muito interessado nos estudos.'),
(4, 7, 26, '2024-12-19', 'Estudou durante o tempo presente.'),
(5, 8, 26, '2024-12-19', 'Ficou pouco tempo, não apresentou muito desempenho\r\n'),
(6, 9, 26, '2024-12-19', 'Procurou por ajuda nas dúvidas do conteúdo necessário'),
(7, 10, 26, '2024-12-19', 'Estudou a maioria do tempo, utilizou bem o tempo da monitoria'),
(8, 11, 26, '2024-12-19', 'Estudou sozinho a maior parte do tempo\r\n'),
(10, 12, 26, '2024-12-19', 'Estudava em conjunto com amiga, conversava bastante'),
(11, 13, 26, '2024-12-19', 'Apresentava disposição para estudo, porém se distraia constantemente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `cargo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `senha`, `curso`, `nome`, `matricula`, `cargo`) VALUES
(1, 'Bernardo00', 'informatica', 'Arthur Bernardo Barth', 2023319513, 3),
(2, 'teste', 'informatica', 'pepis', 0, 3),
(3, 'juver', 'informatica', 'Felipe Juver', 2023123123, 1),
(4, 'ferri', 'Alimentos', 'Ferri', 2023319700, 2),
(5, 'helena', 'Alimentos', 'Helena Tamiozzo', 2022315206, 1),
(6, '', 'agropecuaria', 'Joaquim Kunz', 2024312099, 0),
(7, '', 'agropecuaria', 'Bruno Rodrigues', 2024305700, 0),
(8, '', 'agropecuaria', 'Kauan Ferreira', 2024312992, 0),
(9, '', 'agropecuaria', 'David Brayan', 2024326227, 0),
(10, '', 'agropecuaria', 'Bento Finn', 2024313990, 0),
(11, '', 'agropecuaria', 'Andre Welter', 2024305586, 0),
(12, '', 'informatica', 'Renata Petry', 2022314488, 0),
(13, '', 'informatica', 'Maria Eduarda', 2022314441, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `monitoria_id` (`monitoria_id`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `monitoria_id` (`monitoria_id`);

--
-- Índices de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`usuario_id`),
  ADD KEY `monitoria_id` (`monitoria_id`);

--
-- Índices de tabela `monitorias`
--
ALTER TABLE `monitorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitor_id` (`usuario_id`);

--
-- Índices de tabela `pedidos_conteudo`
--
ALTER TABLE `pedidos_conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`usuario_id`),
  ADD KEY `monitoria_id` (`monitoria_id`);

--
-- Índices de tabela `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`usuario_id`),
  ADD KEY `monitoria_id` (`monitoria_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `monitorias`
--
ALTER TABLE `monitorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pedidos_conteudo`
--
ALTER TABLE `pedidos_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `presencas`
--
ALTER TABLE `presencas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avisos_ibfk_2` FOREIGN KEY (`monitoria_id`) REFERENCES `monitorias` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`monitoria_id`) REFERENCES `monitorias` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`monitoria_id`) REFERENCES `monitorias` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `monitorias`
--
ALTER TABLE `monitorias`
  ADD CONSTRAINT `monitorias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `pedidos_conteudo`
--
ALTER TABLE `pedidos_conteudo`
  ADD CONSTRAINT `pedidos_conteudo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_conteudo_ibfk_2` FOREIGN KEY (`monitoria_id`) REFERENCES `monitorias` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `presencas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presencas_ibfk_2` FOREIGN KEY (`monitoria_id`) REFERENCES `monitorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
