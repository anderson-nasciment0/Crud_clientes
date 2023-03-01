-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Mar-2023 às 14:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base_container`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

CREATE TABLE `container` (
  `Id` int(20) NOT NULL,
  `Cliente` varchar(50) NOT NULL,
  `Numero_container` varchar(50) NOT NULL,
  `Tipo` enum('20','40') NOT NULL,
  `Status` enum('Cheio','Vazio') NOT NULL,
  `Categoria` enum('Importação','Exportação') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`Id`, `Cliente`, `Numero_container`, `Tipo`, `Status`, `Categoria`) VALUES
(24, 'Container', 'TEST1234567', '20', 'Cheio', 'Importação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `container_movements`
--

CREATE TABLE `container_movements` (
  `Id` int(11) NOT NULL,
  `Idcliente` int(11) DEFAULT NULL,
  `Tipo` enum('Embarque','Descarga','Gate-in','Gate-out','Reposicionamento','Pesagem','Scanner') DEFAULT NULL,
  `Inicio` varchar(30) DEFAULT NULL,
  `Fim` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `container_movements`
--

INSERT INTO `container_movements` (`Id`, `Idcliente`, `Tipo`, `Inicio`, `Fim`) VALUES
(15, 24, 'Reposicionamento', '2023-03-02', '2023-03-15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `container_movements`
--
ALTER TABLE `container_movements`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_container_movement` (`Idcliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `container_movements`
--
ALTER TABLE `container_movements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `container_movements`
--
ALTER TABLE `container_movements`
  ADD CONSTRAINT `fk_container_movement` FOREIGN KEY (`Idcliente`) REFERENCES `container` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
