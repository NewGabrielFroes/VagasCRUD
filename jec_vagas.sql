-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2022 às 19:38
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jec_vagas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `cep` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `name`, `email`, `cpf`, `cep`) VALUES
(47, 'Raul Pires Calebe', 'caleberaul@gmail.com.br', '897.543.678-90', 65098),
(50, 'Pedro Augusto', 'fflavia@eternalam.com.br', '888.888.888-88', 123456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cnpj` varchar(60) NOT NULL,
  `telefone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`, `email`, `cnpj`, `telefone`) VALUES
(2, 'Brisanet', 'contato@brisanet.com.br', '04.601.397/0001-28', '(88) 98126-7517'),
(3, 'Casa Do Pão De Queijo', 'contato@casadopaodequeijo.com.br', '61.851.929/0006-23', '(12) 3555-5235');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL,
  `vaga_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id`, `candidato_id`, `vaga_id`, `empresa_id`) VALUES
(20, 47, 6, 3),
(23, 50, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id_vaga` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`id_vaga`, `titulo`, `descricao`, `data`, `empresa_id`) VALUES
(5, 'Auxiliar de Almoxarifado', 'atribuições: receber, conferir e armazenar produtos, realizar lançamento de movimentação de entrada e saída', '2022-01-28', 2),
(6, 'Atendente De Loja', 'Elaborar e auxiliar na produção de lanches e ou similares de acordo com os padrões da marca.', '2022-01-26', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro1` (`candidato_id`),
  ADD KEY `registro2` (`empresa_id`),
  ADD KEY `registro3` (`vaga_id`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `vaga1` (`empresa_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro1` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id_candidato`),
  ADD CONSTRAINT `registro2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `registro3` FOREIGN KEY (`vaga_id`) REFERENCES `vaga` (`id_vaga`);

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
