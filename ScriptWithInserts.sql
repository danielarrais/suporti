-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: suporti
-- ------------------------------------------------------
-- Server version	5.7.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avaliacao` int(11) NOT NULL,
  `detalhes` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chamados`
--

DROP TABLE IF EXISTS `chamados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chamados` (
  `id_chamado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `horario_abertura` datetime NOT NULL,
  `horario_fechamento` datetime DEFAULT NULL,
  `motivo_rejeicao` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_avaliacao` int(10) unsigned DEFAULT NULL,
  `id_categoria` int(10) unsigned DEFAULT NULL,
  `id_status` int(10) unsigned NOT NULL DEFAULT '1',
  `id_usuario` int(10) unsigned NOT NULL,
  `id_atendente` int(10) unsigned DEFAULT NULL,
  `id_nivel_urgencia` int(10) unsigned NOT NULL,
  `id_print` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_chamado`),
  KEY `chamados_id_print_foreign` (`id_print`),
  KEY `chamados_id_avaliacao_foreign` (`id_avaliacao`),
  KEY `chamados_id_categoria_foreign` (`id_categoria`),
  KEY `chamados_id_status_foreign` (`id_status`),
  KEY `chamados_id_usuario_foreign` (`id_usuario`),
  KEY `chamados_id_atendente_foreign` (`id_atendente`),
  KEY `chamados_id_nivel_urgencia_foreign` (`id_nivel_urgencia`),
  CONSTRAINT `chamados_id_atendente_foreign` FOREIGN KEY (`id_atendente`) REFERENCES `users` (`id`),
  CONSTRAINT `chamados_id_avaliacao_foreign` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacoes` (`id_avaliacao`),
  CONSTRAINT `chamados_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `chamados_id_nivel_urgencia_foreign` FOREIGN KEY (`id_nivel_urgencia`) REFERENCES `nivel_urgencia` (`id_nivel_urgencia`),
  CONSTRAINT `chamados_id_print_foreign` FOREIGN KEY (`id_print`) REFERENCES `prints` (`id_print`),
  CONSTRAINT `chamados_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status_atendimento` (`id_status`),
  CONSTRAINT `chamados_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamados`
--

LOCK TABLES `chamados` WRITE;
/*!40000 ALTER TABLE `chamados` DISABLE KEYS */;
/*!40000 ALTER TABLE `chamados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcao` (
  `id_funcao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao`
--

LOCK TABLES `funcao` WRITE;
/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` VALUES (1,'Presidente'),(2,'Secretario'),(3,'Coordenador'),(4,'Diretor'),(6,'Suporte');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_03_19_123911_create_categorias_table',1),(2,'2018_03_19_124209_create_status_atendimento_table',1),(3,'2018_03_19_124328_create_status_avaliacoes_table',1),(4,'2018_03_19_124638_create_nivel_urgencia_table',1),(5,'2018_03_19_124809_create_funcao_table',1),(6,'2018_03_19_124905_create_niveis_table',1),(7,'2018_03_19_125007_create_setores_table',1),(8,'2018_03_19_130400_create_prints_table',1),(9,'2018_03_19_132349_create_users_table',1),(10,'2018_03_19_132802_create_password_resets_table',1),(11,'2018_03_19_135407_create_chamados_resets_table',1),(12,'2018_04_01_223006_add_campo_ativo_table',1),(13,'2018_04_02_025949_add_campo_trocar_senha_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveis` (
  `id_nivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (1,'MASTER'),(2,'SUPORTE'),(3,'USER');
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_urgencia`
--

DROP TABLE IF EXISTS `nivel_urgencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_urgencia` (
  `id_nivel_urgencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urgencia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nivel_urgencia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_urgencia`
--

LOCK TABLES `nivel_urgencia` WRITE;
/*!40000 ALTER TABLE `nivel_urgencia` DISABLE KEYS */;
INSERT INTO `nivel_urgencia` VALUES (1,'Urgente'),(2,'Menos Urgente'),(3,'Nada Urgente');
/*!40000 ALTER TABLE `nivel_urgencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prints`
--

DROP TABLE IF EXISTS `prints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prints` (
  `id_print` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_print`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prints`
--

LOCK TABLES `prints` WRITE;
/*!40000 ALTER TABLE `prints` DISABLE KEYS */;
/*!40000 ALTER TABLE `prints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setores`
--

DROP TABLE IF EXISTS `setores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setores` (
  `id_setor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setores`
--

LOCK TABLES `setores` WRITE;
/*!40000 ALTER TABLE `setores` DISABLE KEYS */;
INSERT INTO `setores` VALUES (1,'Informática'),(2,'Recursos humanos'),(3,'Arquivo'),(4,'Recepção');
/*!40000 ALTER TABLE `setores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_atendimento`
--

DROP TABLE IF EXISTS `status_atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_atendimento` (
  `id_status` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_atendimento`
--

LOCK TABLES `status_atendimento` WRITE;
/*!40000 ALTER TABLE `status_atendimento` DISABLE KEYS */;
INSERT INTO `status_atendimento` VALUES (1,'Não atendido'),(2,'Em atendimento'),(3,'Finalizado'),(4,'Rejeitado');
/*!40000 ALTER TABLE `status_atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_funcao` int(10) unsigned NOT NULL,
  `id_setor` int(10) unsigned NOT NULL,
  `id_nivel` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `trocar_senha` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_funcao_foreign` (`id_funcao`),
  KEY `users_id_setor_foreign` (`id_setor`),
  KEY `users_id_nivel_foreign` (`id_nivel`),
  CONSTRAINT `users_id_funcao_foreign` FOREIGN KEY (`id_funcao`) REFERENCES `funcao` (`id_funcao`),
  CONSTRAINT `users_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id_nivel`),
  CONSTRAINT `users_id_setor_foreign` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Daniel','Arrais','da@gmail.com','$2y$10$SmGP.lK1xKneeCcV9ZTUVexbZ8hb8DOgLgxEuiCEC6M2Jj5kjMesq',1,1,1,'CPU4emFCrnK87MEqcRY5mhp5wEyTjzVFcQqMAVACuYqEdShllDpe3sTTLAx1',NULL,'2018-04-03 04:33:41',1,1),(3,'Samuel','Costa','sa@gmail.com','$2y$10$WpLM37h0dQPUBG9d1YXaS./h37EcNTtyPHQnn3Di8SjkqqexdOVE.',1,1,3,'LIXtl01azGXOJUz9lY3d6eB8AKjSdyuKXBa4MeYpKrCC4zFkOhxyKhlK2vbO',NULL,'2018-04-03 03:33:43',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-02 22:54:57
