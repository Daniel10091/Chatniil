-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2022 às 02:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chatniil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg_image` varchar(255) NOT NULL,
  `msg_text` varchar(1000) NOT NULL,
  `msg_hour` varchar(255) NOT NULL,
  `msg_dateD` varchar(255) NOT NULL,
  `msg_dateM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `name`, `username`, `email`, `picture`, `password`, `status`) VALUES
(1, 1293498777, 'Chatniil', 'chatniil_admin', 'chatniil9@gmail.com', '1660177883unicornio.jpg', 'f227fe6f8204e1f01cb67269d9fc710d', 'Offline now'),
(2, 1144631122, 'Daniel Aguiar', 'daniel_10091', 'daniel@gmail.com', '1660177949astronaut-alone-in-neon-city-4k-ul-1920x1080.jpg', 'f227fe6f8204e1f01cb67269d9fc710d', 'Offline now'),
(3, 257744512, 'Amy Schneider', 'amy', 'amy@gmail.com', '1660178001girl_creating_asmr___by_ggaburi73_deggcwj-fullview.jpg', 'f227fe6f8204e1f01cb67269d9fc710d', 'Offline now'),
(4, 794674339, 'Rosetta Patton', 'rosetta_pat', 'rosetta@gmail.com', '1660178147neon-glasses-girl-wearing-hoodie-3x-1920x1080.jpg', 'f227fe6f8204e1f01cb67269d9fc710d', 'Offline now');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
