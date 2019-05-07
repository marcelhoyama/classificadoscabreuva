-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para classificadoscabreuva
CREATE DATABASE IF NOT EXISTS `classificadoscabreuva` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `classificadoscabreuva`;

-- Copiando estrutura para tabela classificadoscabreuva.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionarios_id_funcionarios` int(10) unsigned NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cpf` bigint(11) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`),
  KEY `clientes_FKIndex1` (`funcionarios_id_funcionarios`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`funcionarios_id_funcionarios`) REFERENCES `funcionarios` (`id_funcionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.clientes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_clientes`, `funcionarios_id_funcionarios`, `nome`, `telefone`, `endereco`, `email`, `cpf`, `situacao`) VALUES
	(1, 1, 'bigcenter', '(77) 77777-7777', NULL, '', 71863, NULL),
	(2, 1, 'cris', '(88)88888-8888', NULL, 'cris@cris.com.br', 2147483647, NULL),
	(3, 1, 'kiiu', '(88) 88888-8888', NULL, '', 99999, NULL),
	(4, 1, 'cris', '(88)88888-8888', NULL, 'cris@cris.com.br', 2147483647, NULL),
	(5, 1, 'cris', '(88)88888-8888', NULL, 'cris@cris.com.br', 2147483647, NULL),
	(6, 1, 'rrrrrrrr', '(44) 43434-3434', NULL, '', 54334, NULL),
	(7, 1, 'vfvfvfvfvfvfvf', '(99) 99999-0000', NULL, '', 11222, NULL),
	(8, 1, 'cris', '(88)88888-8888', NULL, 'cris@cris.com.br', 10987654311, NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mensagem` text,
  `data_2` date DEFAULT NULL,
  PRIMARY KEY (`id_comentarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.curtidas
CREATE TABLE IF NOT EXISTS `curtidas` (
  `id_curtidas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qtd` int(10) unsigned DEFAULT NULL,
  `data_2` date DEFAULT NULL,
  PRIMARY KEY (`id_curtidas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.curtidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `curtidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `curtidas` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_eventos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loja_id_loja` int(10) unsigned NOT NULL,
  `dia` date DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_terminio` datetime DEFAULT NULL,
  `chamada` text,
  `descricao` text,
  PRIMARY KEY (`id_eventos`),
  KEY `eventos_FKIndex1` (`loja_id_loja`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.eventos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `senha` varchar(36) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `ip` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_funcionarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.funcionarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` (`id_funcionarios`, `nome`, `telefone`, `endereco`, `senha`, `email`, `ip`) VALUES
	(1, 'marcel', NULL, NULL, 'acb0341a397e933de70e8e71b9ee22df', 'marecrisbr@gmail.com', '::1');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.loja
CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clientes_id_clientes` int(10) unsigned NOT NULL,
  `funcionarios_id_funcionarios` int(10) unsigned NOT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `razao_social` varchar(300) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone1` varchar(15) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `descricao` text,
  `chamada` text,
  `url_imagem_principal` varchar(100) DEFAULT NULL,
  `palavra_chave1` varchar(50) DEFAULT NULL,
  `palavra_chave2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_loja`),
  KEY `loja_FKIndex1` (`funcionarios_id_funcionarios`),
  KEY `loja_FKIndex2` (`clientes_id_clientes`),
  CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`funcionarios_id_funcionarios`) REFERENCES `funcionarios` (`id_funcionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `loja_ibfk_2` FOREIGN KEY (`clientes_id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.loja: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.palavras_buscadas
CREATE TABLE IF NOT EXISTS `palavras_buscadas` (
  `id_palavras_buscadas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loja_id_loja` int(10) unsigned NOT NULL,
  `palavra` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_palavras_buscadas`),
  KEY `palavras_buscadas_FKIndex1` (`loja_id_loja`),
  CONSTRAINT `palavras_buscadas_ibfk_1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.palavras_buscadas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `palavras_buscadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `palavras_buscadas` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.palavras_buscadas_has_qtd_palavras
CREATE TABLE IF NOT EXISTS `palavras_buscadas_has_qtd_palavras` (
  `palavras_buscadas_id_palavras_buscadas` int(10) unsigned NOT NULL,
  `qtd_palavras_id_qtd_palavras` int(10) unsigned NOT NULL,
  PRIMARY KEY (`palavras_buscadas_id_palavras_buscadas`,`qtd_palavras_id_qtd_palavras`),
  KEY `palavras_buscadas_has_qtd_palavras_FKIndex1` (`palavras_buscadas_id_palavras_buscadas`),
  KEY `palavras_buscadas_has_qtd_palavras_FKIndex2` (`qtd_palavras_id_qtd_palavras`),
  CONSTRAINT `palavras_buscadas_has_qtd_palavras_ibfk_1` FOREIGN KEY (`palavras_buscadas_id_palavras_buscadas`) REFERENCES `palavras_buscadas` (`id_palavras_buscadas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `palavras_buscadas_has_qtd_palavras_ibfk_2` FOREIGN KEY (`qtd_palavras_id_qtd_palavras`) REFERENCES `qtd_palavras` (`id_qtd_palavras`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.palavras_buscadas_has_qtd_palavras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `palavras_buscadas_has_qtd_palavras` DISABLE KEYS */;
/*!40000 ALTER TABLE `palavras_buscadas_has_qtd_palavras` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.promocoes
CREATE TABLE IF NOT EXISTS `promocoes` (
  `id_promocoes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loja_id_loja` int(10) unsigned NOT NULL,
  `dia` date DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_terminio` datetime DEFAULT NULL,
  `chamada` text,
  `descricao` text,
  PRIMARY KEY (`id_promocoes`),
  KEY `promocoes_FKIndex1` (`loja_id_loja`),
  CONSTRAINT `promocoes_ibfk_1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.promocoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `promocoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocoes` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.qtd_palavras
CREATE TABLE IF NOT EXISTS `qtd_palavras` (
  `id_qtd_palavras` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qtd` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_qtd_palavras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.qtd_palavras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `qtd_palavras` DISABLE KEYS */;
/*!40000 ALTER TABLE `qtd_palavras` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.recomendacoes
CREATE TABLE IF NOT EXISTS `recomendacoes` (
  `id_recomendacoes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuarios_id_usuarios` int(10) unsigned NOT NULL,
  `loja_id_loja` int(10) unsigned NOT NULL,
  `mensagem` text,
  `data_2` datetime DEFAULT NULL,
  PRIMARY KEY (`id_recomendacoes`),
  KEY `recomendacoes_FKIndex1` (`loja_id_loja`),
  KEY `recomendacoes_FKIndex2` (`usuarios_id_usuarios`),
  CONSTRAINT `recomendacoes_ibfk_1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recomendacoes_ibfk_2` FOREIGN KEY (`usuarios_id_usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.recomendacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recomendacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `recomendacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.url_imagens
CREATE TABLE IF NOT EXISTS `url_imagens` (
  `id_url_imagens` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loja_id_loja` int(10) unsigned NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_url_imagens`),
  KEY `url_imagens_FKIndex1` (`loja_id_loja`),
  CONSTRAINT `url_imagens_ibfk_1` FOREIGN KEY (`loja_id_loja`) REFERENCES `loja` (`id_loja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.url_imagens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `url_imagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `url_imagens` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `data_2` datetime DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.usuarios_has_comentarios
CREATE TABLE IF NOT EXISTS `usuarios_has_comentarios` (
  `usuarios_id_usuarios` int(10) unsigned NOT NULL,
  `comentarios_id_comentarios` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuarios_id_usuarios`,`comentarios_id_comentarios`),
  KEY `usuarios_has_comentarios_FKIndex1` (`usuarios_id_usuarios`),
  KEY `usuarios_has_comentarios_FKIndex2` (`comentarios_id_comentarios`),
  CONSTRAINT `usuarios_has_comentarios_ibfk_1` FOREIGN KEY (`usuarios_id_usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_has_comentarios_ibfk_2` FOREIGN KEY (`comentarios_id_comentarios`) REFERENCES `comentarios` (`id_comentarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.usuarios_has_comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_has_comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_has_comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela classificadoscabreuva.usuarios_has_curtidas
CREATE TABLE IF NOT EXISTS `usuarios_has_curtidas` (
  `usuarios_id_usuarios` int(10) unsigned NOT NULL,
  `curtidas_id_curtidas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuarios_id_usuarios`,`curtidas_id_curtidas`),
  KEY `usuarios_has_curtidas_FKIndex1` (`usuarios_id_usuarios`),
  KEY `usuarios_has_curtidas_FKIndex2` (`curtidas_id_curtidas`),
  CONSTRAINT `usuarios_has_curtidas_ibfk_1` FOREIGN KEY (`usuarios_id_usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_has_curtidas_ibfk_2` FOREIGN KEY (`curtidas_id_curtidas`) REFERENCES `curtidas` (`id_curtidas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela classificadoscabreuva.usuarios_has_curtidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_has_curtidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_has_curtidas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
