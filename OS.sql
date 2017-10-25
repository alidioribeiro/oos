-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema oos
--

CREATE DATABASE IF NOT EXISTS oos;
USE oos;

--
-- Definition of table `oos`.`os`
--

DROP TABLE IF EXISTS `oos`.`os`;
CREATE TABLE  `oos`.`os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analista` varchar(50) NOT NULL DEFAULT '',
  `reponsavel` varchar(50) NOT NULL DEFAULT '',
  `empresa` varchar(50) NOT NULL DEFAULT '',
  `data` date NOT NULL,
  `entrada` varchar(5) NOT NULL,
  `saida` varchar(5) NOT NULL,
  `desconto` varchar(5) NOT NULL,
  `descricao` text,
  `EXCLUIR` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oos`.`os`
--

/*!40000 ALTER TABLE `os` DISABLE KEYS */;
LOCK TABLES `os` WRITE;
INSERT INTO `oos`.`os` VALUES  (1,'Cayo C‚sar','Alidio Ribeiro','springer','2011-09-09','09:30','15:30','','IMPLANTA€ÇO E TREINAMENTO DO REGISTRO DE VERIFICA€ÇO DIµRIA.','*'),
 (2,'SALOMAO','MARION','lanaplast','2011-09-09','9:30','17:00','','ATIVIDADES DE INTEGRACAO E VERIFICACAO CONTABIL.',''),
 (3,'SALOMÇO','MARION','lanaplast','2011-09-10','9:40','12:00','','AJUSTE DE LANCAMENTOS PADRÇO MODULO FINANCEIRO',''),
 (4,'ALIDIO','MARION','lanaplast','2011-09-10','9:30','12:00','','ajustes em lancamentos padroes do modulo financeiro : Aplicacao , RA , PA , Transf.',''),
 (9,'Cayo César','Francisco Junior','amazon','2011-09-12','09:45','12:00','00:15','Avaliação de dados do contrato com mão de obra.',''),
 (11,'SALOMAO MARIANO','MARION','lanaplast','2011-09-13','09:20','17:00','01:30','Acerto das contabilizações das RA, PA e aplicações para a contabilidade, explicação do procedimento para a integração do ponto eletronico para a Sra. Carmen DP.',''),
 (12,'ALIDIO','JUNIOR','amazon','2011-09-14','09:30','12:00','','Reuniao e mapeamento , de atividades para acerto de processos do contrato de locacao.',''),
 (13,'Cayo César','Alidio Ribeiro','springer','2011-09-12','14:00','18:00','','Testes e novas funcionalidades na Verificação Diária.',''),
 (15,'SALOMAO MARIANO','Francisco Jr.','amazon','2011-09-14','09:30','12:00','','Parametrização do CNAB Banco Itau, feito a geração do arquivo de transmissão. Aguardando validação do banco Itau.',''),
 (16,'SALOMÃO MARIANO','ALIDIO','springer','2011-09-14','14:30','17:00','','Acerto do cadastro de produtos (NCM) e cadastro de clientes(cod, municio, endereço e pais), para a geração do arquivo sped fiscal.',''),
 (17,'Cayo César','Francisco Junior','amazon','2011-09-14','15:00','18:00','','Modificações no contrato. (nome,cnpj,assinatura e formatação). Itens 11 e 12 da lista de pendências.',''),
 (18,'SALOMAO','ALIDIO','springer','2011-09-15','14:00','17:30','','Analise do arquivo EFD Mes 08, correcao de dados , validacoes.',''),
 (19,'Cayo César','Francisco Junior','amazon','2011-09-16','10:00','14:00','','Inclusão do ANEXO 1 no Contrato com mão-de-obra. Outras modificações.',''),
 (20,'SALOMÃO MARIANO','MARION','lanaplast','2011-09-19','11:30','16:30','','Acerto de notas fiscais e cadastro de produtos para a geração do Esped Fiscal mês 08/2011.',''),
 (21,'Cayo César','Alidio Ribeiro','springer','2011-09-16','14:00','18:00','','Ajuste de Gráfico de Faturamento Cliente 2011.',''),
 (23,'Cayo César','Francisco Junior','amazon','2011-09-08','09:15','15:15','','Implantação do Contrato com Mão de Obra.',''),
 (24,'Cayo César','Alidio Ribeiro','springer','2011-09-09','09:30','15:30','','Implantação e treinamento do registro de verificação diária.',''),
 (25,'Márcio Macedo','teste','lanaplast','2011-09-20','','','','teste','*'),
 (26,'Alidio Ribeiro','Junior','amazon','2011-09-21','16:00','17:00','','Reuniao com o Sr. Jeferson , para acerto de processos.\r\n\r\nNAO FATURAR.',''),
 (27,'Márcio Macedo','Alidio','springer','2011-09-08','08:30','17:00','02:00','*Preparacao do arquivo de geracao da in86 e teste na nova base ano 2007\r\n',''),
 (28,'Márcio Macedo','Alidio','springer','2011-09-12','08:30','17:00','04:00','*Preparacao do arquivo de geracao da in86 e teste na base velha ano 2003\r\n',''),
 (29,'Márcio Macedo','Alidio','springer','2011-09-13','09:00','17:30','03:00','*Geracao do arquivo in86 mês: 02,03 de 2003\r\n',''),
 (30,'Márcio Macedo','Alidio','springer','2011-09-14','14:00','17:00','','geracao do arquivo in86 mês: 04,05 de 2003\r\n',''),
 (31,'Márcio Macedo','Alidio','springer','2011-09-15','09:45','12:00','','*Geracao do arquivo in86 mês: 06,07,08 de 2003\r\n',''),
 (32,'Márcio Macedo','Alidio','springer','2011-09-16','15:15','18:00','','*Geracao do arquivo in86 mês: 09,10,11 de 2003\r\n',''),
 (33,'Márcio Macedo','Alidio','springer','2011-09-19','08:15','17:00','','*Geracao do arquivo in86 mês: 12 de 2003 e 01, 02 de 2004\r\n',''),
 (34,'Márcio Macedo','Alidio','springer','2011-09-20','13:30','18:00','','*Geracao do arquivo in86 mês: 03, 04, 05 de 2004\r\n',''),
 (35,'Márcio Macedo','Alidio','springer','2011-09-21','08:30','17:00','','*Geracao do arquivo in86 mês: 06,07,08 de 2004\r\n',''),
 (36,'Márcio Macedo','Alidio','springer','2011-09-22','08:30','17:00','','*Geracao do arquivo in86 mês: 09,10,11,12 de 2004\r\n',''),
 (37,'Cayo César','Alidio Ribeiro','springer','2011-09-19','13:30','17:30','','Correções no sistema de verificação diária, referente a entrada de dados no sistema.',''),
 (38,'Márcio Macedo','Alidio','springer','2011-09-23','08:15','12:00','','Geracao do arquivo in86 mês: 01,02 de 2005\r\n','*'),
 (39,'Márcio Macedo','Alidio','springer','2011-09-26','09:00','17:00','03:30','geracao do arquivo in86 mês: 03,04 de 2005\r\n','*'),
 (40,'Márcio Macedo','Junior','amazon','2011-09-01','14:00','18:00','','Foi realizado a conclusão do desenvolvimento da rotina de envio de email automático quando houver um contrato vencido.\r\nAutomatizada a rotina para alterar o status do contrato para vencido e liberação do produto para locação, mudando seu status para liberado.\r\nInicio do desenvolvimento da Rotina para controlar essa automatização(JOB).\r\n',''),
 (41,'Márcio Macedo','Junior','amazon','2011-09-02','13:30','18:00','','Realizada a conclusão da rotina para controlar a automatização do encerramento do contrato. Foram realizados teste de processamento da rotina: Encerramento automático do contrato vencido, Mudança do Status do produto para locação para Liberado e disparo do e-mail para os envolvido.',''),
 (42,'Márcio Macedo','Junior','amazon','2011-09-16','09:45','14:00','','5) Retornar o campo(Valor) de Diária, Quinzenal e Mensal para o tela de contrato.\r\n6) Corrigir a sequência do item na inserção.\r\n7) Numeração do contrato deverá ser automático.\r\nTeste geral dos itens realizados.\r\n',''),
 (43,'Márcio Macedo','Junior','amazon','2011-09-15','14:00','17:00','','1) Na tela de produto para locação, mostrar o campo se produto esta disponível ou não, em manutenção e criar uma consulta padrão.\r\n2) Na tela de contrato não habilitar campos: Tipo, Unidade e Quantidade.\r\n4) Validar numero de serie na digitação do item do contrato.\r\n',''),
 (44,'Márcio Macedo','Junior','amazon','2011-09-23','13:50','18:00','','Atividades realizadas da Lista de Melhorias levantada pelo Sr. Junior:\r\n8)* Geração do titulo no contas a receber automático, conforme forma de pagamento selecionada no cadastro de contrato.\r\n* Gerada a serie “LOC” para identificar títulos de Locação no financeiro.\r\nOBS: Cliente tem que rever o cadastro de natureza, pois poderá ter problemas futuros.\r\n\"R$\"  =\"MV_NATDINH\",  \"CH\"  =\"MV_NATCHEQ\", \"VA\" = \"MV_NATVALE\"\r\n\"DP\" = \"MV_NATDEPO\", \"BO,NP,EP,DC,CT,FI\"= \"MV_NATFIN\", \"CC\"  = \"MV_NATCART\",\r\n\"CD\"= \"MV_NATTEF\", \"CO\"=\"MV_NATCONV\"\r\nOutras naturezas = \"MV_NATOUTR\"\r\n',''),
 (45,'Cayo César','Alidio Ribeiro','springer','2011-09-23','09:00','18:00','01:00','Instalação e Configuração do Servidor Web de Relatórios.',''),
 (46,'Cayo César','Alidio','springer','2011-09-27','09:30','16:30','01:00','Manutenção do Sistema de Verificação Diária. (Implementação de novas funcionalidades, mudança das rotinas de recebimento de dados).',''),
 (47,'Márcio Macedo','Alidio','springer','2011-09-23','08:15','12:00','','geracao do arquivo in86 mês: 01,02,03,04,05 de 2005\r\n',''),
 (48,'Márcio Macedo','Alidio','springer','2011-09-26','09:00','17:00','03:30','geracao do arquivo in86 mês: 06,07,08,09,10,11,12 de 2005\r\n',''),
 (49,'Márcio Macedo','Alidio','springer','2011-09-27','09:00','17:00','01:00','geracao do arquivo in86 mês: 01,02,03,04,05,06,07 de 2006\r\n',''),
 (50,'Márcio Macedo','Alidio','springer','2011-09-27','22:00','02:00','','geracao do arquivo in86 mês: 08,09,10,11,12 de 2006\r\n',''),
 (51,'Márcio Macedo','Junior','amazon','2011-09-28','14:30','15:30','','* Foi realizado o levantamento dos motivos que impede  o cliente de utilizar a rotina de geração de contrato. \r\n* Foi identificado que o cliente não esta usando a rotina devido ao layout de impressão do mesmo não esta conforme solicitado.\r\nOBS: Esse motivo não impede que o cliente realize o input dos dados no sistema, por se tratar somente de ajuste de impressão.',''),
 (52,'Márcio Macedo','Alidio','springer','2011-09-28','09:00','12:00','','Geracao do arquivo in86 mês: 05, 06,  de 2008\r\n',''),
 (53,'Márcio Macedo','Alidio','springer','2011-09-29','09:00','17:00','01:00','* Analise do relatório FORNECEDORES E MATERIAIS APROVADOS. Foi identificado o campo de A5_APROVAD que controla se o fornecedor encontra-se ativo ou não. Campo deverá ser preenchido com S para que o mesmo aparece no relatório.\r\n* Inicio do desenvolvimento do relatório de AVALIAÇÃO DE FORNECEDORES, criada a query(filtro) que será utilizado utilizada no relatório. Gerado um arquivo em Excel do período de 08/2011 para validação do Filtro. Após a validação do mesmo será dada continuidade do desenvolvimento.',''),
 (54,'Cayo César','Francisco Junior','amazon','2011-09-29','14:00','16:30','','Acrescimo de campo UNIDADE(referente as tabelas de preço \"diária\",\"quinzenal\" e \"mensal\") no contrato de serviços. UPDATE da tabela de contratos(SZ4030), para preencher com \"1\"(diária) o campo Z4_FORMAPG, para evitar erros futuros quanto a impressão de contratos feitos antes da criação das tabelas de preços. Acrescimo de campo TOTAL para efeito de visualização da parte do cliente, do valor total dos itens alocados. Ajuste no valor por extenso. As alterações foram realizadas nos contratos com e sem mão de obra. obs.: testadas e aprovadas pela sra. Gel e o sr. Jeferson.',''),
 (55,'Salomao Mariano','Francisco Jr.','amazon','2011-10-03','','','','',''),
 (56,'Salomao Mariano','Francisco Jr.','amazon','2011-10-03','13:30','15:30','','Alteração do lay out arquivo, cnab itau alteração do campo carteira para 109, verificação da camissão de vendedores verifcamos que nao ta gravando os % de comissão na tebela sd2, d2_comis1 e d2_comis2 cerretamente, verificação para geração do arquivo IDE.',''),
 (57,'Cayo César','Marion','lanaplast','2011-10-03','09:00','17:00','01:00','Alteração no cadastro de entrada de funcionários na portaria, para evitar conflito de matriculas duplicadas no banco. Implementação do memorando para cliente. Criação e implementação da Carta de Cobrança para envio de clientes inadimplentes. Avaliado pela Sra. Marion e a Sra. Erika.',''),
 (58,'Cayo César','Marion','lanaplast','2011-10-04','09:30','12:00','','Criação de campo \"PORTO\" no cadastro de pedidos de vendas, para utilização do memorando relacionado a clientes no interior do estado. Implementação do \"Relatório de Cobrança\" por cliente relacionado ao representante.','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `os` ENABLE KEYS */;


--
-- Definition of table `oos`.`tecnicos`
--

DROP TABLE IF EXISTS `oos`.`tecnicos`;
CREATE TABLE  `oos`.`tecnicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `nome_completo` varchar(70) COLLATE utf8_bin NOT NULL DEFAULT '',
  `funcao` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `admissao` date NOT NULL,
  `contato1` varchar(10) COLLATE utf8_bin NOT NULL,
  `contato2` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `EXCLUIR` char(1) COLLATE utf8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `oos`.`tecnicos`
--

/*!40000 ALTER TABLE `tecnicos` DISABLE KEYS */;
LOCK TABLES `tecnicos` WRITE;
INSERT INTO `oos`.`tecnicos` VALUES  (4,0x4DC3A17263696F204D616365646F,0x4DC3A17263696F204A6F73C3A920536F757A61204D616365646F,0x616E616C69737461,'2011-08-03',0x39323932333335383539,'',0x6D617263696F406F72626974616C736F6C75636F65732E636F6D2E6272,''),
 (5,0x416C6964696F205269626569726F,0x416C6964696F2053696C7661205269626569726F,0x636F6E73756C746F72,'2010-08-28',0x39323831323832393238,0x39323831343837313331,0x616C6964696F2E7269626569726F406F72626974616C736F6C75636F65732E636F6D2E6272,''),
 (6,0x4361796F2043C3A9736172,0x4361796F2043C3A973617220417261C3BA6A6F2064612053696C7661,0x646573656E766F6C7665646F72,'2011-05-08',0x39323932393931383031,0x39323832333636393931,0x6361796F2E6365736172406F72626974616C736F6C75636F65732E636F6D2E6272,''),
 (7,0x53616C6F6D616F204D617269616E6F,'',0x636F6E73756C746F72,'0000-00-00','','','','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tecnicos` ENABLE KEYS */;


--
-- Definition of table `oos`.`usuarios`
--

DROP TABLE IF EXISTS `oos`.`usuarios`;
CREATE TABLE  `oos`.`usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `login` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `setor` varchar(20) NOT NULL DEFAULT '',
  `senha` varchar(255) NOT NULL DEFAULT '',
  `adm` varchar(10) NOT NULL DEFAULT 'N',
  `cliente` varchar(8) NOT NULL DEFAULT '',
  `EXCLUIR` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oos`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
LOCK TABLES `usuarios` WRITE;
INSERT INTO `oos`.`usuarios` VALUES  (6,'administrador','administrador','','','37409d7de1b83667bc5a273641a095d4','S','',''),
 (7,'Alidio Ribeiro','alidio.ribeiro','alidio.ribeiro@orbitalsolucoes.com.br','','e10adc3949ba59abbe56e057f20f883e','N','',''),
 (8,'Marcio Macedo','marcio.macedo','marcio@orbitalsolucoes.com.br','','664d08dc05b10f8d267f704a0616767e','N','',''),
 (9,'Salomao Mariano','salomao.mariano','salomao.mariano@orbitalsolucoes.com.br','','e10adc3949ba59abbe56e057f20f883e','N','',''),
 (10,'Cayo César','cayo.cesar','cayo.cesar@orbitalsolucoes.com.br','','d9a85d7800779d365864b3d64faf3fec','N','',''),
 (11,'salo','salo','','','25b1902406e1629d19f07bba8b2f0cf0','N','','*');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
