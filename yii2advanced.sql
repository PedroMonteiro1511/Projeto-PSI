-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Dez-2021 às 11:45
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('create-leilao', '24', NULL),
('delete-profile', '24', NULL),
('login-admin', '24', NULL),
('login-admin', '27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('create-leilao', 1, 'Utilizador pode criar um leilão', NULL, NULL, NULL, NULL),
('delete-profile', 1, 'Permite ao utilizador apagar um perfil', NULL, NULL, NULL, NULL),
('gestor', 1, 'Utilzadores com role Gestor', NULL, NULL, NULL, NULL),
('login-admin', 1, 'Permite a um admin fazer login no backend', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('delete-profile', 'login-admin'),
('gestor', 'login-admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leilao`
--

DROP TABLE IF EXISTS `leilao`;
CREATE TABLE IF NOT EXISTS `leilao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `datalimite` datetime NOT NULL,
  `precobase` decimal(10,0) NOT NULL,
  `aprovado` enum('S','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leilao`
--

INSERT INTO `leilao` (`id`, `idUser`, `titulo`, `descricao`, `datalimite`, `precobase`, `aprovado`) VALUES
(1, 24, 'Leilao1', 'Leilao1', '2021-11-23 13:04:05', '250', 'S'),
(2, 26, '2Leilao', '2leilao', '2021-11-24 13:04:56', '250', 'S'),
(3, 27, 'leilao3', 'leilao3', '2021-11-23 13:04:00', '450', 'N'),
(4, 27, 'leilao4', 'leilao4', '2021-11-23 13:04:00', '450', 'N'),
(5, 24, 'Leilao2', 'Leilao23', '2021-11-30 12:40:11', '567', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leilaooferta`
--

DROP TABLE IF EXISTS `leilaooferta`;
CREATE TABLE IF NOT EXISTS `leilaooferta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idleilao` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dataoferta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montante` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idleilao` (`idleilao`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leilaooferta`
--

INSERT INTO `leilaooferta` (`id`, `idleilao`, `iduser`, `dataoferta`, `montante`) VALUES
(1, 1, 24, '2021-12-07 12:22:11', '250'),
(2, 1, 24, '2021-12-09 11:28:33', '257');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1636205450),
('m130524_201442_init', 1636205520),
('m190124_110200_add_verification_token_column_to_user_table', 1636205520),
('m140506_102106_rbac_init', 1636206231),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1636206231),
('m180523_151638_rbac_updates_indexes_without_prefix', 1636206231),
('m200409_110543_rbac_update_mssql_trigger', 1636206231);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(24, 'MonteiroAdmin', 'PRDzd184_UxQCHHpXP2okv_0Ver6hXIp', '$2y$13$JJk3IDDAAfsbvZT2Bmc.1./7j3J4L41IIAQ.gxjKvotLi.kmVJBw6', NULL, 'Monteiro@gmail.com', 10, '2021-11-17 10:38:16', '2021-11-17 10:38:16', NULL),
(26, 'Monteiro2', 'l8ngJAer_fRe89itTBY_kuZ71rXfZ7SS', '$2y$13$VsIBZh9mIifQ/gy7cYijJeoTal72W4X43FVST4BgXOikMOrB1cPle', NULL, 'Monteiro2@gmail.com', 10, '2021-11-17 10:57:57', '2021-11-17 10:57:57', '0aKabNfWEVvL7WOv8qmIUhAnAgDY5Skc_1637146677'),
(27, 'MonteiroADmin2', 'H7x6EEdNSoOrrE9xoWPmW_x4VH1S1qJA', '$2y$13$0fv59F3hPBXKHwevR10Fie9gfgefW9Vi2RlrPKLteXQ2E5Z1H3N92', NULL, 'Monteiroadmin2@outlook.pt', 10, '2021-11-23 12:35:40', '2021-11-23 12:35:40', '1jzkrfPAdDMChJF2VYvQf05KZtVWFndD_1637670940');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userVenda` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `idUser`, `titulo`, `descricao`, `preco`) VALUES
(1, 26, 'Venda1', 'Descrição Venda 1', '450'),
(2, 24, 'Venda 2', 'Descrição venda 2 ', '500');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `leilao`
--
ALTER TABLE `leilao`
  ADD CONSTRAINT `userLeilao` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `leilaooferta`
--
ALTER TABLE `leilaooferta`
  ADD CONSTRAINT `leilaooferta_ibfk_1` FOREIGN KEY (`idleilao`) REFERENCES `leilao` (`id`),
  ADD CONSTRAINT `leilaooferta_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `userVenda` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
