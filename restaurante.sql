-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurante
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acesso` (
  `id_acesso` int NOT NULL AUTO_INCREMENT,
  `acesso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'adm'),(2,'funcionario'),(3,'cliente');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cardapio`
--

DROP TABLE IF EXISTS `cardapio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cardapio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cardapio`
--

LOCK TABLES `cardapio` WRITE;
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` VALUES (23,'Lasanha','Lasanha sanha',21.00,1,'lasanha.jpg'),(24,'Feijoada','Feijão, carne, bacon, calabresa e tudo que é de gordura',25.00,0,'feijoada-1.jpg');
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `idCarrinho` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int DEFAULT NULL,
  `idCardapio` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`idCarrinho`),
  KEY `idUsuarioCarrinho` (`idUsuario`),
  KEY `idCardapio` (`idCardapio`),
  CONSTRAINT `idCardapio` FOREIGN KEY (`idCardapio`) REFERENCES `cardapio` (`id`),
  CONSTRAINT `idUsuarioCarrinho` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `cidade` varchar(80) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario_endereco` (`idUsuario`),
  CONSTRAINT `idUsuario_endereco` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (2,2,'21042-660','Travessa São Carlos','13','casa','Rio de Janeiro','RJ','Bonsucesso'),(3,3,'26120-220','Rua dos Patriotas','310','','Belford Roxo','RJ','Heliópolis');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financeiro`
--

DROP TABLE IF EXISTS `financeiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financeiro` (
  `idFinanceiro` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int DEFAULT NULL,
  `nome` varchar(80) NOT NULL,
  `dataPagamento` date NOT NULL,
  `formaPagamento` varchar(50) NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`idFinanceiro`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financeiro`
--

LOCK TABLES `financeiro` WRITE;
/*!40000 ALTER TABLE `financeiro` DISABLE KEYS */;
INSERT INTO `financeiro` VALUES (1,NULL,'Carlos Silva','2024-05-01','Cartão de Crédito','Pago',120.5),(2,NULL,'Ana Pereira','2024-05-02','Dinheiro','Pago',85),(3,NULL,'Mariana Costa','2024-05-03','Cartão de Débito','Pago',150.75),(4,NULL,'João Souza','2024-05-04','Pix','Pago',210.4),(5,NULL,'Pedro Lima','2024-05-05','Cartão de Crédito','Pendente',95),(6,NULL,'Lucia Santos','2024-05-06','Dinheiro','Pago',50.25),(7,NULL,'Felipe Araújo','2024-05-07','Cartão de Débito','Pago',180),(8,NULL,'Beatriz Rocha','2024-05-08','Cartão de Crédito','Pago',200.3),(9,NULL,'Ricardo Almeida','2024-05-09','Pix','Pago',125.6),(10,NULL,'Juliana Fernandes','2024-05-10','Dinheiro','Pago',60),(11,NULL,'Bruno Oliveira','2024-05-11','Cartão de Débito','Pago',90.9),(12,NULL,'Gabriela Martins','2024-05-12','Cartão de Crédito','Pendente',220.8),(13,NULL,'Fernando Ribeiro','2024-05-13','Pix','Pago',75.5),(14,NULL,'Renata Carvalho','2024-05-14','Dinheiro','Pago',40.7),(15,NULL,'André Mendes','2024-05-15','Cartão de Crédito','Pago',300.2);
/*!40000 ALTER TABLE `financeiro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `idLog` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `datahora` datetime NOT NULL,
  `codigo_autenticacao` int NOT NULL,
  PRIMARY KEY (`idLog`),
  KEY `idUsuario_log` (`idUsuario`),
  CONSTRAINT `idUsuario_log` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,2,'2024-06-08 08:45:54',147996),(2,2,'2024-06-09 11:12:56',869071),(3,2,'2024-06-09 11:15:12',111235),(4,2,'2024-06-09 11:22:41',686005),(5,2,'2024-06-09 16:16:10',998310),(26,3,'2024-06-12 16:07:30',711979),(27,3,'2024-06-12 19:34:49',211489),(28,3,'2024-06-12 20:35:19',689413),(29,3,'2024-06-13 10:53:32',375776),(30,3,'2024-06-13 11:26:10',573681),(31,3,'2024-06-13 11:47:41',424030),(32,3,'2024-06-13 11:49:19',995886);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `conteudo_mensagem` text NOT NULL,
  `status` enum('pendente','visualizada') DEFAULT 'pendente',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` VALUES (1,'jorge','filho','jorgeluiz006@hotmail.com','(22) 22222-2222','dsadsadsadas','visualizada','2024-06-12 19:10:53','2024-06-13 15:34:16'),(2,'Gabrio','ADMIN MASTERTUDO','quermemandarspamnesafado@gmail.com','(21) 21212-1212','HAHAHHAHAHHAHAH muito bom gostei do atendimento divertido eu estou indo atoa hahahahahahhahahaha parabens pela comida divertida e empolgante gostei ','visualizada','2024-06-13 03:12:05','2024-06-15 17:44:07'),(3,'al','a','a@q.com','(21) 21212-1212','aaaaaaaaaaaaaaaaaaaaaaaaaa','pendente','2024-06-15 17:53:38','2024-06-15 17:53:38'),(4,'aaaa','aaaaa','quaresma@gmail.com','(12) 12121-21','qua','pendente','2024-06-15 17:54:06','2024-06-15 17:54:06'),(5,'aaaa','aaaaa','quaresma@gmail.com','(12) 12121-21','qua','pendente','2024-06-15 17:54:26','2024-06-15 17:54:26'),(6,'aaaaaa','aa','a@q.com','(21) 21212-1212','TESTATNSO SEM REDI','pendente','2024-06-15 17:56:58','2024-06-15 17:56:58'),(7,'aaaaaa','aa','a@q.com','(21) 21212-1212','TESTATNSO SEM REDI','pendente','2024-06-15 17:57:57','2024-06-15 17:57:57');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idPedidos` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `idEndereco` int NOT NULL,
  `totalProdutos` varchar(255) NOT NULL,
  `totalPreco` float NOT NULL,
  `dataPedido` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `formaPagamento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPedidos`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idEndereco` (`idEndereco`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (14,2,'Quaresma Araujo','(+55) 21 21212-1211',2,'3',67,'2024-06-15','Em preparo','pix'),(15,2,'Quaresma Araujo','(+55) 21 21212-1211',2,'2',46,'2024-06-15','Em preparo','pix');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `nomeMae` varchar(80) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(21) DEFAULT NULL,
  `celular` varchar(21) NOT NULL,
  `usuario` varchar(6) NOT NULL,
  `senha_usuario` varchar(225) NOT NULL,
  `id_acesso` int DEFAULT '3',
  `chave` varchar(225) DEFAULT NULL,
  `situacao` varchar(225) DEFAULT 'inativo',
  `codigo_autenticacao` int DEFAULT NULL,
  `data_codigo_autenticacao` datetime DEFAULT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CPF` (`CPF`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`usuario`),
  KEY `id_acesso` (`id_acesso`),
  CONSTRAINT `id_acesso` FOREIGN KEY (`id_acesso`) REFERENCES `acesso` (`id_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Quaresma Araujo','2003-11-02','masculino','Gislaine Garine','128.551.767-94','quaresma@gmail.com','(+55) 21 2121-2121','(+55) 21 21212-1211','gabrie','$2y$10$mR7ENv2DijkmIFJIx4u4v.HbuvCdqx8cs/AdrGdSTefSuLq1Jxa8m',1,'$2y$10$qDj0gKv5OnE9nwVIqAVUJO6NUsu2az7YUxAywkdj1W59W3V./.5IG','ativo',960200,'2024-06-12 20:48:17','2024-06-09 16:16:10'),(3,'jorge luiz','2001-08-22','masculino','dsahdsa dsahdsahdsah','176.855.307-67','wwwwwww@gmail.com','(+55) 33 3333-3333','(+55) 33 33333-3333','jorgez','$2y$10$px2KhPGYRt6AEvBfxGd2sepnH/aByJkew28WV135XcmlEKMWcplx6',3,'$2y$10$k.IP2VIs4LGEvWbRWM2GNOI5PTBviOPi4y57zhl8ReUN37K.KBgoK','ativo',NULL,NULL,'2024-06-13 11:49:19');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-15 22:46:12
