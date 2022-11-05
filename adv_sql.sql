-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Out-2022 às 03:37
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `assunto` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `condicao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formulario`
--

INSERT INTO `formulario` (`id`, `nome`, `telefone`, `email`, `assunto`, `estado`, `cidade`, `mensagem`, `condicao`) VALUES
(13, 'tiago', '0000-0000', 'thiagocarvalho041@gmail.com', '1', '123', 'TERESINA', '123', 'visto'),
(14, '123', '988319883', 'cairofelipedev@gmail.com', '123', '123', 'TERESINA', '123', 'visto'),
(15, 'Tiago11', '988319883', 'thiagocarvalho041@gmail.com', 'blablablabla', 'piaui', 'teresina', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'visto'),
(16, '123', '988319883', 'cairofelipedev@gmail.com', '123', '123', 'TERESINA', '123213', 'visto'),
(17, '123', '988319883', 'cairofelipedev@gmail.com', '123', '123', 'TERESINA', '123213', NULL),
(18, 'tiago carvalho', '0000-0000', 'thiagocarvalho041@gmail.com', 'blablablabla', '123', 'TERESINA', 'aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto aqui ficará o texto ', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `data_log` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `nome`, `data_log`, `tipo`) VALUES
(0, 'tiago carvalho', '2022-10-04 01:49:03', 'login'),
(0, 'tiago carvalho', '2022-10-04 01:50:48', 'login'),
(0, 'tiago carvalho', '2022-10-04 01:53:09', 'login'),
(0, 'tiago carvalho', '2022-10-04 01:54:41', 'login'),
(0, 'tiago carvalho', '2022-10-04 01:58:40', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:00:57', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:03:00', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:03:38', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:04:28', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:07:56', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:08:03', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:09:04', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:10:37', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:11:08', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:12:50', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:13:50', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:14:33', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:14:56', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:18:40', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:18:59', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:20:00', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:20:33', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:21:10', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:21:51', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:22:08', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:22:26', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:22:34', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:22:57', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:23:27', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:23:46', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:24:26', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:24:57', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:25:10', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:25:27', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:25:46', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:26:03', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:30:30', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:37:09', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:37:57', 'login'),
(0, 'tiago carvalho', '2022-10-04 02:38:09', 'login'),
(0, 'tiago carvalho', '2022-10-04 12:58:52', 'login'),
(0, 'tiago carvalho', '2022-10-04 23:05:32', 'login');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `subtitulo` varchar(500) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL,
  `texto_1` text DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `subtitulo`, `descricao`, `link`, `texto_1`, `img`, `autor`, `data`, `tipo`) VALUES
(16, 'titulo', 'subtitulo', '', '123', '', '97899.jpg', 'tiago carvalho', '2022-10-04 17:35:34', 'artigo'),
(17, 'titulo', 'subtitulo', '', '123', '', '374088.jpg', 'tiago carvalho', '2022-10-04 17:38:15', 'artigo'),
(18, 'titulo', 'subtitulo', '', '123', '', '528397.jpg', 'tiago carvalho', '2022-10-04 17:38:22', 'artigo'),
(19, 'titulo', 'subtitulo', '', '123', '', '994228.jpg', 'tiago carvalho', '2022-10-04 17:38:28', 'artigo'),
(20, 'titulo', 'subtitulo', 'descrição', '123', '', '343750.jpg', 'tiago carvalho', '2022-10-04 17:59:59', 'noticia'),
(21, 'titulo', 'subtitulo', 'descrição', '123', '', '446981.jpg', 'tiago carvalho', '2022-10-04 18:02:22', 'noticia'),
(22, 'titulo', 'subtitulo', 'descrição', '123', '', '971230.jpg', 'tiago carvalho', '2022-10-04 18:02:28', 'noticia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `data_create` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `email`, `senha`, `tipo`, `img`, `data_create`, `status`) VALUES
(5, 'cairo felipe', 'cairo', NULL, '12345', NULL, NULL, '2022-09-27 09:18:51', NULL),
(6, 'tiago carvalho', 'tiagoADM', NULL, '12345', NULL, NULL, '2022-09-27 16:21:25', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
