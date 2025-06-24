-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 02:40
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
-- Banco de dados: `system_library`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Email_Admin` varchar(100) DEFAULT NULL,
  `Password_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `Id_Book` int(11) NOT NULL,
  `Tittle_book` varchar(100) DEFAULT NULL,
  `Author_book` varchar(100) DEFAULT NULL,
  `Value_Book` decimal(10,2) DEFAULT NULL,
  `Unit_book` int(11) DEFAULT NULL,
  `image_book` varchar(100) NOT NULL DEFAULT 'nula'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`Id_Book`, `Tittle_book`, `Author_book`, `Value_Book`, `Unit_book`, `image_book`) VALUES
(1, 'Código Limpo', 'Robert Cecil Martin', 68.50, 100, 'codigolimpo.jpg'),
(2, 'Programador Pragmatico', 'Hunt e Thomas', 150.00, 90, 'programadorPragmatico.jpg'),
(4, 'Entendendo Algoritmos	', 'Aditya Bhargava	', 92.99, 50, 'algoritimos.jpg'),
(5, 'Refatoração', 'Martin Fowler	', 134.89, 28, 'refatorar.jpg'),
(6, 'Javascript Definitivo', ' David Flanagan', 190.00, 60, 'jsdefinitivo.jpg'),
(7, 'Padrões de Projeto', 'Erich Gamma et al. (Gang of Four)', 115.00, 18, 'padroesprojeto.jpg'),
(8, 'Python Fluente', 'Luciano Ramalh', 103.45, 120, 'python.jpg'),
(9, 'Code Complate', 'Steve McConnell ', 120.00, 35, 'codecomplate.jpg'),
(10, 'Você Não Sabe JS', 'Você Não Sabe JS', 62.50, 40, 'naosabejs.jpg'),
(11, 'Java: Como Programar	', 'Paul Deitel, Harvey Deitel	', 205.99, 110, 'cpjava.jpg'),
(12, 'Algoritmos: Teoria e Prática	', 'Thomas H. Cormen et al.	', 200.00, 100, 'algoritimos2.jpg'),
(13, 'The C Programming Language', 'Brian Kernighan e Dennis Ritchie', 130.00, 100, 'bibliadoC.jpg'),
(14, 'Desenvolvimento Web com ASP.NET MVC', 'Fabrício Sanchez e Márcio Fábio Althmann', 30.99, 90, 'aspnet.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `Id_client` int(11) NOT NULL,
  `Name_Client` varchar(100) DEFAULT NULL,
  `Email_Client` varchar(100) DEFAULT NULL,
  `Phone_client` varchar(15) DEFAULT NULL,
  `Cep_Client` char(8) DEFAULT NULL,
  `Home_Client` varchar(10) DEFAULT NULL,
  `Password_Client` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clients`
--

INSERT INTO `clients` (`Id_client`, `Name_Client`, `Email_Client`, `Phone_client`, `Cep_Client`, `Home_Client`, `Password_Client`) VALUES
(2, 'CARLOS OLIVEIRA BONFIM', 'carlosbonfim722@gmail.com', '11982414199', '02651-14', '106', '$2b$06$f122fe0de90a39d0de0a3uPsvVq8O8c9nGSy3zbC6NCNCPV27rjWG'),
(4, 'Sergio', 'exemplo@email.com', '1198877444', '00001-00', '10', '$2b$06$e68b1d180e970e5468b4buMMorJMrgo3z9Zs1NQncgWvnY2SS1RLa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sale`
--

CREATE TABLE `sale` (
  `Id_Sale` int(11) NOT NULL,
  `Value_sale` decimal(10,2) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`),
  ADD UNIQUE KEY `Email_Admin` (`Email_Admin`);

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Id_Book`);

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id_client`),
  ADD UNIQUE KEY `Email_Client` (`Email_Client`),
  ADD UNIQUE KEY `Phone_client` (`Phone_client`);

--
-- Índices de tabela `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Id_Sale`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `Id_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `Id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sale`
--
ALTER TABLE `sale`
  MODIFY `Id_Sale` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `books` (`Id_Book`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`Id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
