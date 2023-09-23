-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2023 às 06:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `movielovers`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `trailer` varchar(150) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL,
  `movies_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `image`, `token`, `bio`) VALUES
(1, 'gilvan', 'santos', 'adm@adm', '$2y$10$myGVH670L0zLar5ckXkUpuWJHvCcTLLpswNiBMjpHtXJ2O0TAslyq', 'adfd732483d672ddeaabbf988e546ea88332a9e7ba1996819f6431ec04cca11a6ff10423698c3d18ae92d4c8d3435229d169f618a4b8bfdbec068198.jpeg', '5aeeeaf7156c8549fa3a4043616992d9fc0016f169143ed5cb5c6d6e61bbb82d33597d42c5015b3c7486526e425b45aeee28', 'Apreciador de filmes'),
(2, 'Gilvan', 'Santos', 'adm1@adm', '$2y$10$BHKEGwfqyhaynQ1ULihIIOrKeTQkpF4PUiS4Vzv7H/0dXp93jdUjO', NULL, '01354cda133ec9e532030e847118200561d2592e005dfed548d4f4e6cca1a92d77c222daf6c58a8be2c96d78af3161de365d', NULL),
(3, 'Gilvan', 'Santos', 'adm2@adm', '$2y$10$LhgjZy/Y85qdbb8pN9rfz.SSIQTs4e6mhHJIAs9DlgnSxhUX.5CqO', NULL, '7016315b838a6d8d386a0168aca5f6b4498e6fa826d407929a0f41ebe7acde4a88041eb1b50d3b077807cdadc05b2edf4d8b', NULL),
(4, 'Gilvan', 'Santos', 'adm3@adm', '$2y$10$kqlXkgJBFz1Gbx/vSkQGCOFCMojvL7x7.a/bSL00FtuKQ5qgXXcRe', NULL, '6469f97502fcc1a7bcbb2b9e22bc0395ed12e7176e4bc26fa9e54b445069a4689365d7ad24471fb1d7636ed40edf394408ee', NULL),
(5, 'Gilvan', 'Santos', 'gilvanjr306@gmail.com', '$2y$10$XppbO.JlOBwNhhbeF8UMfeVjGBZMZXMHreBIxpKHlyDuixq3MAIum', NULL, '2e18b595d11e2b707620f0567daf4b8c697d330c1c79b6f2c101f55c2f3195d8fb7fda79ea059821c1d8fb1bab0c9a4e347b', NULL),
(6, 'Gilvan', 'Santos', 'gilvanjr3106@gmail.com', '$2y$10$TruPwkxSNtcZ.lI9qbxcAOnvFQlSFe1ZnN5blaLsfk6qq8sKLrn1G', NULL, 'bb91793eca5bd3eabaccb387bac20d607c0a9c836612f12216939445fe83c70a22e066ed0b596b7ef2a969abcc2ed56e9e45', NULL),
(7, 'Gilvan', 'Santos', 'gilvanjr31206@gmail.com', '$2y$10$nWx0uDwutBpexcxdifja0Og20PDnV/xnbDGCGJtPFVVd9dFqJnXTy', NULL, '2e77be96402bdb451788623807206be5ca3d4dfb101260d28e90e608101697aa01daf0fdb1f379204eceb6b01474af71280f', NULL),
(8, '123@123', 'Sabtos', '123@123', '$2y$10$OCOGrUAZDIUZqdp9HsgfKug0puyl0gv.XWaa7.ffGtZpDh9Pm5KMW', NULL, '8b2c53c5dd6af72d3036940fdeb70a9446f040a1fdc174714068f5a751f1e49cc07798bfea29ceab782b104ddf17cf8e93d4', NULL),
(9, '12121cds', 'dsfsd', 'teste@teste', '$2y$10$Nwur.28dg/FoqLn78OIrvup8tKNXbdXcwcBFjdLUr2s/2ibt1cZv6', NULL, 'afc794fc96c3f56ed61ba805a22bb0dc44d18afb98dcd95ae8900372d9ca22bd04050359d5bde6a84c0dea501af0d966238e', NULL),
(10, 'Gilvan', 'Santos', 'testeee@ads', '$2y$10$y2xQ0f6coNF7vDP30i3xO.4/fukHEsus9snNKatv28OmQEsEFW/2e', NULL, '9d92431c4762b815e280676122d9444acbc4d452ee6b8bcf16b0e0ce47edb09f89ec9ba790539eb32bf1f81f2c8d9f528242', NULL),
(11, 'Gilvan', 'Santos', 'asdas@asd', '$2y$10$EoLpxjU8UB3HPOg0zriq1Or/Fxt/0ZY3QBfAu6Tt5Vuo.GpFREO16', NULL, '5f586111942dca8673d9528b924a550c08ab048c02349fba2aa43b0e8af9010f8feb57344348ccb44a4df6fe8d6cbbe33a18', NULL),
(12, 'Gilvan', 'Santos', 'gilvanjr33306@gmail.com', '$2y$10$pYDPpqq2fDPY3rtb.tcfTOsMDaoT42LwAAvkWEvCFpzH5yGyi2YHW', NULL, '86e7d1f53ddb142d67fc38b425908b5914a7d76a8a7d0a60b878af6ec4d7440933246236eaccb5791a2bf731cdc4c7dbac05', NULL),
(13, 'Gilvan', 'Santos', 'gilvanjr30sa6@gmail.com', '$2y$10$slYBp.wxG3JhJVgjgo8MTulA3hwOTFCHId7PvSn./twNa0vUn7VXO', NULL, 'fbb1f9246d400af437cf793f723e41691c5e98818815625c3039d0803ee561c3deaaabad89ede59ee8389857902ea0cd568b', NULL),
(14, 'Gilvan', 'Santos', 'gilvanjr306dsd@gmail.com', '$2y$10$LZhAPdd.84Dz1RLSegwq8uwSDLchmg9vLI5xUxL1MrtE75IXk2sAW', NULL, '0366b0ac884080efb03703f84adaf87e1eec23e67a0986d86bd995aab3bbc3d9eebc7e865f3e5c55f7591705a675506c6eb9', NULL),
(15, 'Gilvan', 'Santos', 'gilvanjr30wew@gmail.com', '$2y$10$dzpZMtI/vxCvlje3s1VKKeFYQzGM9DBJScD1.nyGVpnknhITaRw/i', NULL, 'bfaede5b287a909ec4715946711741682718f36c6bbff35d2cc473d5d81a2ae98d9822d99c040fbeb70a835d15a7f26b13e6', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Índices de tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
