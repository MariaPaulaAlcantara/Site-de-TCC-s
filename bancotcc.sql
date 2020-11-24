-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2020 às 01:01
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancotcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estrutura_escrita`
--

CREATE TABLE `estrutura_escrita` (
  `id` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `titulo` varchar(225) NOT NULL,
  `resumo` varchar(500) NOT NULL,
  `introducao` varchar(500) NOT NULL,
  `referenciaTeorica` varchar(500) NOT NULL,
  `metodologia` varchar(500) NOT NULL,
  `analise` varchar(500) NOT NULL,
  `conclusao` varchar(500) NOT NULL,
  `referenciaBiografica` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estrutura_escrita`
--

INSERT INTO `estrutura_escrita` (`id`, `matricula`, `nome`, `titulo`, `resumo`, `introducao`, `referenciaTeorica`, `metodologia`, `analise`, `conclusao`, `referenciaBiografica`) VALUES
(36, '202008113504', 'Maria Paula Santos Silva Alcântara', 'titulo teste', 'Resumo Teste', 'Introdução Teste', 'Referência teste', 'metodo teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orientacoes_cadastradas`
--

CREATE TABLE `orientacoes_cadastradas` (
  `id` int(30) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `aluno` varchar(255) NOT NULL,
  `areaTrabalho` varchar(225) NOT NULL,
  `orientadorResponsavel` varchar(255) NOT NULL,
  `orientacoes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orientacoes_cadastradas`
--

INSERT INTO `orientacoes_cadastradas` (`id`, `matricula`, `aluno`, `areaTrabalho`, `orientadorResponsavel`, `orientacoes`) VALUES
(9, 'testando', 'testando', 'testando', 'testando', 'testando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistemalogin`
--

CREATE TABLE `sistemalogin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sistemalogin`
--

INSERT INTO `sistemalogin` (`id`, `login`, `nome`, `senha`) VALUES
(1, 'admin', 'Maria Paula', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin2', 'admin2', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcadastroaluno`
--

CREATE TABLE `tbcadastroaluno` (
  `id` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcadastroaluno`
--

INSERT INTO `tbcadastroaluno` (`id`, `matricula`, `nome`, `email`, `curso`, `disciplina`) VALUES
(64, '202008113504', 'Maria Paula Santos Silva Alcântara', 'mariapaula1924@gmail.com', 'Ciências da Computação', 'Desenvolvimento Web'),
(65, '12', 'Testando', 'teste@a.com', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro_orientador`
--

CREATE TABLE `tb_cadastro_orientador` (
  `id` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `orientador` varchar(255) NOT NULL,
  `curso` varchar(225) NOT NULL,
  `titulacao` varchar(255) NOT NULL,
  `conhecimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cadastro_orientador`
--

INSERT INTO `tb_cadastro_orientador` (`id`, `matricula`, `orientador`, `curso`, `titulacao`, `conhecimento`) VALUES
(8, 'testando', 'testando', 'testando', 'Mestrado', 'testando');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estrutura_escrita`
--
ALTER TABLE `estrutura_escrita`
  ADD PRIMARY KEY (`id`,`matricula`);

--
-- Índices para tabela `orientacoes_cadastradas`
--
ALTER TABLE `orientacoes_cadastradas`
  ADD PRIMARY KEY (`id`,`matricula`);

--
-- Índices para tabela `sistemalogin`
--
ALTER TABLE `sistemalogin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbcadastroaluno`
--
ALTER TABLE `tbcadastroaluno`
  ADD PRIMARY KEY (`id`,`matricula`) USING BTREE;

--
-- Índices para tabela `tb_cadastro_orientador`
--
ALTER TABLE `tb_cadastro_orientador`
  ADD PRIMARY KEY (`id`,`matricula`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estrutura_escrita`
--
ALTER TABLE `estrutura_escrita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `orientacoes_cadastradas`
--
ALTER TABLE `orientacoes_cadastradas`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sistemalogin`
--
ALTER TABLE `sistemalogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbcadastroaluno`
--
ALTER TABLE `tbcadastroaluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `tb_cadastro_orientador`
--
ALTER TABLE `tb_cadastro_orientador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
