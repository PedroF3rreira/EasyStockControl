-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Fev-2022 às 21:41
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entries`
--

CREATE TABLE `entries` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `entry` int(11) NOT NULL,
  `date_entry` date DEFAULT NULL,
  `time_entry` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entries`
--

INSERT INTO `entries` (`id`, `id_user`, `id_product`, `qty`, `entry`, `date_entry`, `time_entry`) VALUES
(1, 1, 18, 20, 10, '2022-01-27', '19:06:38'),
(2, 1, 7, 90, 20, '2022-01-27', '21:46:58'),
(3, 1, 17, 10, 20, '2022-01-27', '21:51:00'),
(4, 1, 18, 30, 10, '2022-01-27', '21:51:16'),
(5, 1, 7, 110, 12, '2022-01-27', '21:51:49'),
(6, 1, 18, 20, 20, '2022-01-27', '22:05:42'),
(7, 1, 18, 0, 20, '2022-01-27', '22:08:26'),
(8, 1, 18, 8, 10, '2022-01-28', '15:31:20'),
(9, 1, 18, 18, 20, '2022-01-26', '15:31:34'),
(10, 1, 39, 10, 10, '2022-01-28', '21:01:45'),
(11, 1, 18, 30, 10, '2022-01-31', '22:07:26'),
(12, 1, 18, 30, 10, '2022-02-01', '14:43:06'),
(13, 1, 7, 22, 2, '2022-02-01', '14:46:19'),
(14, 1, 39, 10, 20, '2022-02-01', '20:39:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outputs`
--

CREATE TABLE `outputs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `output` int(11) NOT NULL,
  `date_output` date DEFAULT NULL,
  `time_output` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `outputs`
--

INSERT INTO `outputs` (`id`, `id_user`, `id_product`, `qty`, `output`, `date_output`, `time_output`) VALUES
(1, 1, 18, 10, 2, '2022-01-28', '13:04:23'),
(2, 1, 7, 122, 100, '2022-01-28', '13:05:29'),
(3, 1, 18, 38, 2, '2022-01-28', '20:56:00'),
(4, 1, 39, 20, 10, '2022-01-31', '13:09:19'),
(5, 1, 18, 36, 6, '2022-01-31', '22:07:14'),
(6, 1, 18, 40, 10, '2022-02-01', '14:35:49'),
(7, 1, 7, 24, 4, '2022-02-01', '14:46:31'),
(8, 1, 39, 30, 12, '2022-02-01', '20:40:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `small_desc` varchar(100) NOT NULL,
  `long_desc` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `id_provider` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_min` int(11) NOT NULL,
  `included_at` datetime DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `small_desc`, `long_desc`, `price`, `id_provider`, `id_user`, `qty`, `qty_min`, `included_at`, `url_image`) VALUES
(6, 'aa', 'a', 1, 1, 1, 1, 14, '2022-01-22 14:39:23', 'degault.jpg'),
(7, 'controle remoto universal alterado', 'um controle de qualidade e durabilidade comprovada', 85.9, 1, 1, 20, 10, '2022-01-22 14:40:39', 'default.jpg'),
(8, 'ferro solda 40w', 'um ferro de solda com selo do iso901 com todo segurança e de fácil utilização.', 46, 1, 1, 20, 10, '2022-01-22 14:43:56', 'default.jpg'),
(9, 'maquina de cortar cabelo', '', 200, 1, 1, 20, 10, '2022-01-22 14:58:28', 'default.jpg'),
(10, 'maquina de cortar cabelo', '', 200, 1, 1, 20, 10, '2022-01-22 14:59:22', 'default.jpg'),
(11, 'controle remoto universal 2em 1', '', 98, 1, 1, 10, 10, '2022-01-22 14:59:43', 'default.jpg'),
(12, 'caderno capa dura', '', 18.9, 1, 1, 10, 10, '2022-01-22 15:01:34', 'default.jpg'),
(13, 'martelo 25cm', '', 35.95, 1, 1, 10, 10, '2022-01-22 15:02:19', 'default.jpg'),
(14, 'fone de ouvido pt', '', 19.9, 1, 1, 10, 10, '2022-01-22 15:15:10', 'default.jpg'),
(15, 'fone de ouvido rosa', '', 19.9, 1, 1, 20, 20, '2022-01-22 15:18:22', 'default.jpg'),
(16, 'fone de ouvido azul', '', 19.9, 1, 1, 20, 20, '2022-01-22 11:20:45', 'default.jpg'),
(17, 'Tinta hidrafort 5 LT br neve', '', 12.9, 1, 1, 30, 10, '2022-01-22 11:29:51', 'default.jpg'),
(18, 'Tinta hidrafort 5 LT br neve alterado', 'tinta de alta qualidade com um acabamento', 20.89, 2, 1, 40, 20, '2022-01-22 11:33:00', 'default.jpg'),
(21, 'Tinta hidrafort 5 LT azul', '', 1.55, 2, 1, 10, 10, '2022-01-22 12:03:00', 'default.jpg'),
(22, 'Tinta hidrafort 5 LT azul', '', 1.55, 2, 1, 10, 10, '2022-01-22 12:03:29', 'default.jpg'),
(23, 'Tinta hidrafort 5 LT verde limao', 'tinta popular', 19.9, 2, 1, 20, 10, '2022-01-24 11:08:40', 'default.jpg'),
(24, 'Tinta hidrafort 5 LT azul safira', 'qualquer observação', 19.9, 2, 1, 20, 10, '2022-01-24 11:14:26', 'default.jpg'),
(25, 'Tinta hidrafort 5 LT br neve', 'aaa', 1, 1, 1, 10, 10, '2022-01-24 16:15:51', 'default.jpg'),
(26, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:19:21', 'default.jpg'),
(27, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:19:31', 'default.jpg'),
(28, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:19:32', 'default.jpg'),
(29, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:19:53', 'default.jpg'),
(30, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:20:10', 'default.jpg'),
(31, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 210, 10, '2022-01-24 16:21:04', 'default.jpg'),
(32, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 1, 10, '2022-01-24 16:27:09', 'default.jpg'),
(33, 'Tinta hidrafort 5 LT br neve', '', 10, 1, 1, 10, 10, '2022-01-24 16:27:38', 'default.jpg'),
(34, 'Tinta hidrafort 5 LT br neve', '', 19, 1, 1, 10, 10, '2022-01-24 16:31:12', 'default.jpg'),
(35, 'Tinta hidrafort 5 LT br neve', '', 10, 2, 1, 10, 10, '2022-01-25 08:34:43', 'default.jpg'),
(36, 'caixa d&#39;água de 1000lt', 'caixa muito resistente e flexível', 399.85, 3, 1, 60, 10, '2022-01-25 17:52:56', 'default.jpg'),
(37, 'onibus de brinquedo', '', 25, 2, 1, 10, 10, '2022-01-25 11:46:25', 'default.jpg'),
(38, 'BOLA INFLÁVEL VERMELHA', '', 5.99, 4, 1, 60, 10, '2022-01-27 10:41:32', 'default.jpg'),
(39, 'carro mão metalosa', '', 18.9, 11, 1, 18, 10, '2022-01-28 17:01:22', 'default.jpg'),
(40, 'carro de mão pop metalosa', '', 199.8, 11, 1, 10, 5, '2022-02-01 16:39:01', 'default.jpg'),
(41, 'Tinta hidrafor floreta', '', 19.8, 2, 1, 20, 10, '2022-02-03 16:15:34', 'default.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `providers`
--

INSERT INTO `providers` (`id`, `name`, `type`, `cnpj`, `cpf`, `address`, `phone`, `email`, `id_user`) VALUES
(1, 'multilaser', 0, '12454789658', '12536789', 'aaa', '888888', 'aaa', 1),
(2, 'hidrafort', 0, '', '', '', '81985598744', '', 1),
(3, 'fortlev', 1, '22.514.533/6661-66', '117.366.674', 'rua 8 de maio 177', '(81)98559-80', 'fortlev-1955@outlook.com', 1),
(4, 'Elias José', 1, '22.514.533/6661-66', '117.366.674', '', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(5, 'Elias José', 1, '', '117.366.674', 'rua 8 de maio 177', '(81)98559-82', 'elias-edu19@outlook.com', 1),
(6, 'Elias José', 1, '', '117.366.674', 'rua 8 de maio 177', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(7, 'Elias José', 1, '', '117.366.674', 'rua 8 de maio 177', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(8, 'Elias José', 0, '', '117.366.674', 'rua 8 de maio 177', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(9, 'Elias José', 0, NULL, '117.366.674', 'rua 8 de maio 177', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(10, 'Epson', 1, '22.514.533/6661-66', '117.366.674', 'rua 8 de maio 177', '(81)98559-80', 'epson@hotmail.com', 1),
(11, 'metalosa', 0, NULL, '115.588.776', 'rua 8 de maio 177', '(81)98559-82', 'metalosa@gmail.com', 1),
(12, 'Elias José', 1, '22.514.533/6661-66', '117.366.674', '', '(81)98559-82', 'pedro-edu19@outlook.com', 1),
(13, 'teste', 0, NULL, '117.366.674', '', '(81)98559-82', 'tes@gmail.com', 1),
(14, 'teste', 0, NULL, '117.366.674-59', '', '(81)98559-82', 'elias-edu19@outlook.com', 1),
(15, 'Elias José', 0, NULL, '117.366.674-59', '', '(81)98559-82', 'pedro-edu19@outlook.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `type`) VALUES
(1, 'Pedro Daniel', 'pedro-edu19@outlook.com', '$2y$10$q6cUeIXpqMHV5MgtHtBAr.YH9Eh4eXqsAuuocdUZcou7VBhejpEBy', 'ca10677e3998c2b8a473f995a9a61d9b', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_entry` (`id_user`),
  ADD KEY `fk_product_entry` (`id_product`);

--
-- Índices para tabela `outputs`
--
ALTER TABLE `outputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_exit` (`id_user`),
  ADD KEY `fk_product_exit` (`id_product`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provider_product` (`id_provider`),
  ADD KEY `fk_user_product` (`id_user`);

--
-- Índices para tabela `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_provider` (`id_user`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `fk_product_entry` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_entry` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `outputs`
--
ALTER TABLE `outputs`
  ADD CONSTRAINT `fk_product_exit` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_exit` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_provider_product` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `fk_user_product` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `fk_user_provider` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
