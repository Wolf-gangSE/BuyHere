-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Maio-2021 às 00:04
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_cliente` int NOT NULL AUTO_INCREMENT,
  `CEP_cliente` varchar(8) NOT NULL,
  `Telefone_cliente` varchar(10) NOT NULL,
  `DDD_cliente` varchar(2) NOT NULL,
  `Senha_cliente` varchar(80) NOT NULL,
  `Email_cliente` varchar(30) NOT NULL,
  `Nome_cliente` varchar(15) NOT NULL,
  `Sobrenome_cliente` varchar(40) NOT NULL,
  `Cidade_cliente` varchar(30) NOT NULL,
  `Bairro_cliente` varchar(30) NOT NULL,
  `Rua_cliente` varchar(30) NOT NULL,
  `Numero_cliente` int NOT NULL,
  `Complemento_cliente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_cliente`),
  UNIQUE KEY `ID_cliente` (`ID_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID_cliente`, `CEP_cliente`, `Telefone_cliente`, `DDD_cliente`, `Senha_cliente`, `Email_cliente`, `Nome_cliente`, `Sobrenome_cliente`, `Cidade_cliente`, `Bairro_cliente`, `Rua_cliente`, `Numero_cliente`, `Complemento_cliente`) VALUES
(1, '12345678', '123456789', '99', 'mypassword', 'emailcliente@email.com', 'Cliente', 'Teste', 'Minha Cidade', 'Meu Bairro', 'Minha Rua', 0, ''),
(5, '55150280', '99155-2939', '81', 'adm123', 'lucas.henriquemonteiro@upe.br', 'Lucas', 'Henrique', 'Belo Jardim', 'Centro', 'Rua exemplo', 22, 'Complemento exemplo'),
(20, '99999999', '99999-9999', '99', 'a2e63ee01401aaeca78be023dfbb8c59', 'oi@oi.com', 'oi', 'oi', '99', '99', '99', 99, '99'),
(22, '55150000', '99155-2939', '81', 'dc53fc4f621c80bdc2fa0329a6123708', 'lucas.henriquemonteiro@upe.br', 'Lucas', 'Henrique de Assis Monteiro', 'Belo Jardim', 'Centro', 'Minha rua', 99, 'Apartamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `ID_pedido` int NOT NULL AUTO_INCREMENT,
  `ID_cliente` int NOT NULL,
  `ID_produto` int NOT NULL,
  `Valor_total` float(30,2) NOT NULL,
  `Data_compra` date NOT NULL,
  `Data_entrega` date NOT NULL,
  `Quant_produto` int NOT NULL,
  PRIMARY KEY (`ID_pedido`),
  UNIQUE KEY `ID_pedido` (`ID_pedido`),
  KEY `ID_cliente` (`ID_cliente`),
  KEY `ID_produto` (`ID_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`ID_pedido`, `ID_cliente`, `ID_produto`, `Valor_total`, `Data_compra`, `Data_entrega`, `Quant_produto`) VALUES
(6, 22, 3, 3.00, '2021-01-01', '2021-01-01', 1),
(4, 22, 3, 11.00, '2021-01-01', '2021-01-01', 5),
(5, 22, 3, 11.00, '2021-01-01', '2021-01-01', 5),
(7, 22, 3, 3.00, '2021-01-01', '2021-01-01', 1),
(8, 22, 3, 3.00, '2021-01-01', '2021-01-01', 1),
(9, 22, 3, 15.00, '2021-01-01', '2021-01-01', 7),
(10, 22, 5, 1500.00, '2021-01-01', '2021-01-01', 1),
(11, 22, 5, 1500.00, '2021-01-01', '2021-01-01', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `ID_produto` int NOT NULL AUTO_INCREMENT,
  `ID_vendedor` int NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Estoque` int NOT NULL,
  `Imagem` varchar(80) NOT NULL,
  `Descricao` text NOT NULL,
  `Preco_produto` float(20,2) NOT NULL,
  `Preco_frete` float(20,2) NOT NULL,
  PRIMARY KEY (`ID_produto`),
  UNIQUE KEY `ID_produto` (`ID_produto`),
  KEY `ID_vendedor` (`ID_vendedor`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID_produto`, `ID_vendedor`, `Nome`, `Estoque`, `Imagem`, `Descricao`, `Preco_produto`, `Preco_frete`) VALUES
(2, 3, 'Certificado', 4, '_images/imagensProdutos/fita-de-premio_24908-54753.jpg', 'descrição legal...', 1000.00, 40.00),
(3, 7, 'Luva', 4, '_images/imagensProdutos/luvas.jpg', 'Par de luvas descartáveis para uso geral.\r\nFeitas de látex e super-resistentes.', 2.00, 1.00),
(5, 7, 'Bicicleta ', 3, '_images/imagensProdutos/bicicleta.jpg', 'Benefícios do uso de bicicletas:\r\n- Emissão zero de CO2\r\n- Tira você do trânsito e poupa o tempo\r\n- Reforça valores sociais, como companheirismo, respeito, tolerância e o sentimento de pertencimento ao lugar\r\n- Auxilia na perda de peso\r\n- Promove um bom estado de saúde\r\n- Silêncio no trânsito\r\n- O custo de uma boa bicicleta é dezenas de vezes menor do que um carro médio popular', 1200.00, 300.00),
(6, 7, 'Matricula', 40, '_images/imagensProdutos/Logo-curso.jpg', 'Matricule-se no curso de Engenharia de Software da UPE - Campus Garanhuns.', 10.00, 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `ID_vendedor` int NOT NULL AUTO_INCREMENT,
  `CEP_vendedor` varchar(8) NOT NULL,
  `Telefone_vendedor` varchar(10) NOT NULL,
  `DDD_vendedor` varchar(2) NOT NULL,
  `Senha_vendedor` varchar(80) NOT NULL,
  `Email_vendedor` varchar(30) NOT NULL,
  `Nome_vendedor` varchar(15) NOT NULL,
  `Sobrenome_vendedor` varchar(40) NOT NULL,
  `Cidade_vendedor` varchar(30) NOT NULL,
  `Bairro_vendedor` varchar(30) NOT NULL,
  `Rua_vendedor` varchar(30) NOT NULL,
  `Numero_vendedor` int NOT NULL,
  `Complemento_vendedor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_vendedor`),
  UNIQUE KEY `ID_vendedor` (`ID_vendedor`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`ID_vendedor`, `CEP_vendedor`, `Telefone_vendedor`, `DDD_vendedor`, `Senha_vendedor`, `Email_vendedor`, `Nome_vendedor`, `Sobrenome_vendedor`, `Cidade_vendedor`, `Bairro_vendedor`, `Rua_vendedor`, `Numero_vendedor`, `Complemento_vendedor`) VALUES
(1, '12345678', '123456789', '0', 'mypassword', 'emailvendedor@email.com', 'Vendedor', 'Teste', 'Minha Cidade', 'Meu Bairro', 'Minha Rua', 99, ''),
(7, '55150000', '99155-2939', '81', 'dc53fc4f621c80bdc2fa0329a6123708', 'lucas.henriquemonteiro@upe.br', 'Lucas', 'Henrique', 'Belo Jardim', 'Centro', 'Minha rua', 99, 'Apartamento'),
(3, '99999999', '99999-9999', '99', '698dc19d489c4e4db73e28a713eab07b', 'teste@teste.com', 'teste', 'teste', '99', '99', '99', 99, '99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
