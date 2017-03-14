SET FOREIGN_KEY_CHECKS=0; 
-- Dump de la Base de Datos
-- Fecha: domingo 30 agosto 2015 - 10:26:21
--
-- Version: 1.1.1, del 18 de Marzo de 2005, insidephp@gmail.com
-- Soporte y Updaters: http://insidephp.sytes.net
--
-- Host: `localhost`    Database: `registro_familiar`
-- ------------------------------------------------------
-- Server version	5.6.12-log

--
-- Table structure for table `log_backups`
--

DROP TABLE IF EXISTS log_backups;
CREATE TABLE `log_backups` (
  `id_bk` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_bk` varchar(50) DEFAULT NULL,
  `fecha_bk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link_bk` varchar(50) DEFAULT NULL,
  KEY `Índice 1` (`id_bk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_backups`
--

LOCK TABLES log_backups WRITE;
INSERT INTO log_backups VALUES('1', '2015-Aug-30 09-08-06 db_sfamiliar_bk.sql.gz', '2015-08-30 09:08:06', '2015-Aug-30 09-08-06 db_sfamiliar_bk.sql.gz');
UNLOCK TABLES;


--
-- Table structure for table `sr_accesos`
--

DROP TABLE IF EXISTS sr_accesos;
CREATE TABLE `sr_accesos` (
  `id_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL DEFAULT '0',
  `id_menu` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '0',
  KEY `Índice 1` (`id_acceso`),
  KEY `FK_sr_accesos_sr_roles` (`id_rol`),
  KEY `FK_sr_accesos_sr_menu` (`id_menu`),
  CONSTRAINT `FK_sr_accesos_sr_menu` FOREIGN KEY (`id_menu`) REFERENCES `sr_menu` (`id_menu`),
  CONSTRAINT `FK_sr_accesos_sr_roles` FOREIGN KEY (`id_rol`) REFERENCES `sr_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_accesos`
--

LOCK TABLES sr_accesos WRITE;
INSERT INTO sr_accesos VALUES('1', '1', '1', '1', '1');
INSERT INTO sr_accesos VALUES('3', '1', '2', '1', '1');
INSERT INTO sr_accesos VALUES('4', '1', '3', '1', '1');
INSERT INTO sr_accesos VALUES('5', '1', '4', '1', '1');
INSERT INTO sr_accesos VALUES('6', '1', '5', '1', '1');
INSERT INTO sr_accesos VALUES('54', '1', '6', '1', '1');
INSERT INTO sr_accesos VALUES('55', '15', '1', '0', '0');
INSERT INTO sr_accesos VALUES('56', '15', '2', '0', '0');
INSERT INTO sr_accesos VALUES('57', '15', '3', '0', '0');
INSERT INTO sr_accesos VALUES('58', '15', '4', '0', '0');
INSERT INTO sr_accesos VALUES('59', '15', '5', '0', '0');
INSERT INTO sr_accesos VALUES('60', '15', '6', '0', '0');
INSERT INTO sr_accesos VALUES('61', '16', '1', '0', '0');
INSERT INTO sr_accesos VALUES('62', '16', '2', '0', '1');
INSERT INTO sr_accesos VALUES('63', '16', '3', '0', '0');
INSERT INTO sr_accesos VALUES('64', '16', '4', '0', '0');
INSERT INTO sr_accesos VALUES('65', '16', '5', '0', '0');
INSERT INTO sr_accesos VALUES('66', '16', '6', '0', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_avatar`
--

DROP TABLE IF EXISTS sr_avatar;
CREATE TABLE `sr_avatar` (
  `id_avatar` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_avatar` varchar(200) NOT NULL DEFAULT '0',
  `genero_avatar` char(50) NOT NULL DEFAULT '0',
  `usuario_avatar` varchar(50) NOT NULL DEFAULT '0',
  `usuario_id` int(11) unsigned DEFAULT NULL,
  `url_avatar` varchar(100) NOT NULL DEFAULT '0',
  `estado_avatar` int(11) NOT NULL DEFAULT '0',
  KEY `Índice 1` (`id_avatar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_avatar`
--

LOCK TABLES sr_avatar WRITE;
INSERT INTO sr_avatar VALUES('1', '0', 'm', 'personal', '1', 'avatar_rafael.png', '1');
INSERT INTO sr_avatar VALUES('2', '0', 'm', 'sistema', NULL, 'avatar1_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('3', '0', 'm', 'sistema', NULL, 'avatar2_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('4', '0', 'm', 'sistema', NULL, 'avatar4_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('5', '0', 'm', 'sistema', NULL, 'avatar6_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('6', '0', 'm', 'sistema', NULL, 'avatar7_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('7', '0', 'm', 'sistema', NULL, 'avatar11_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('8', '0', 'm', 'personal', '2', 'jose.lopez.png', '1');
INSERT INTO sr_avatar VALUES('9', '0', 'f', 'sistema', NULL, 'avatar3_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'f', 'sistema', NULL, 'avatar5_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'f', 'sistema', NULL, 'avatar8_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'f', 'sistema', NULL, 'avatar9_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'f', 'sistema', NULL, 'avatar10_big@2x.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'bitnami_logo.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'avatar-924111135a76cec9a4bfbb02d1efa0cf.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'Codeschool - jQuery The Return Flight (2013).png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'no_user_logo.png', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'no-profile.gif', '1');
INSERT INTO sr_avatar VALUES('10', '0', 'm', 'personal', '1', 'flexible-deployment-icon.png', '1');
INSERT INTO sr_avatar VALUES('11', 'nike_zoom_soldier_VII.jpg', 'm', 'personal', '1', 'nike_zoom_soldier_VII.jpg', '1');
INSERT INTO sr_avatar VALUES('12', '2007_toyota_yaris_s_virginia_beach_va_7080041433458508257.jpg', 'm', 'personal', '1', '2007_toyota_yaris_s_virginia_beach_va_7080041433458508257.jpg', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_cargos`
--

DROP TABLE IF EXISTS sr_cargos;
CREATE TABLE `sr_cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(50) NOT NULL DEFAULT '0',
  `estado_cargo` int(11) NOT NULL DEFAULT '0',
  KEY `Índice 1` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_cargos`
--

LOCK TABLES sr_cargos WRITE;
INSERT INTO sr_cargos VALUES('1', 'SuperAdministrador', '1');
INSERT INTO sr_cargos VALUES('2', 'Administrador', '1');
INSERT INTO sr_cargos VALUES('3', 'Secretaria', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_config`
--

DROP TABLE IF EXISTS sr_config;
CREATE TABLE `sr_config` (
  `id_config` int(100) NOT NULL AUTO_INCREMENT,
  `id_rol` int(100) NOT NULL DEFAULT '0',
  `pages_config` varchar(50) DEFAULT NULL,
  `url_config` varchar(250) NOT NULL DEFAULT '0',
  `accion` varchar(100) NOT NULL DEFAULT '0',
  `estado_config` int(1) NOT NULL DEFAULT '0',
  KEY `Índice 1` (`id_config`),
  KEY `FK_sr_config_sr_roles` (`id_rol`),
  CONSTRAINT `FK_sr_config_sr_roles` FOREIGN KEY (`id_rol`) REFERENCES `sr_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_config`
--

LOCK TABLES sr_config WRITE;
INSERT INTO sr_config VALUES('1', '1', 'login', 'login.php', 'checked', '0');
INSERT INTO sr_config VALUES('2', '1', 'user-lockscreen', 'user-lockscreen.php', 'checked', '0');
UNLOCK TABLES;


--
-- Table structure for table `sr_empresa`
--

DROP TABLE IF EXISTS sr_empresa;
CREATE TABLE `sr_empresa` (
  `id_empresa` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `rubro_empresa` varchar(50) DEFAULT NULL,
  `logo_empresa` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `nombre_alcalde` varchar(250) DEFAULT NULL,
  `nombre_secretario` varchar(250) DEFAULT NULL,
  `jefe_registro_familiar` varchar(250) DEFAULT NULL,
  `estado_emrpesa` int(1) DEFAULT NULL,
  KEY `Índice 1` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_empresa`
--

LOCK TABLES sr_empresa WRITE;
INSERT INTO sr_empresa VALUES('1', 'Alcaldia Municipal', 'Gobierno', 'logo_aempresa.png', 'El Salvador', 'Departamento de Santa Ana', 'Santa Rosa Guachipilin', '2486-0201', '2486-0211', '0211-021079-001-0', 'Alcalde', 'Secretario', 'Blanca Reina Marin de Serrano1', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_librerias`
--

DROP TABLE IF EXISTS sr_librerias;
CREATE TABLE `sr_librerias` (
  `id_lib` int(100) NOT NULL AUTO_INCREMENT,
  `codigo_lib` int(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `parte` varchar(50) DEFAULT NULL,
  `url_libreria` varchar(50) DEFAULT NULL,
  `descripcion_lib` varchar(50) DEFAULT NULL,
  `estado_lib` int(1) DEFAULT NULL,
  KEY `Índice 1` (`id_lib`),
  KEY `FK_sr_librerias_sr_nombre_libreria` (`codigo_lib`),
  CONSTRAINT `FK_sr_librerias_sr_nombre_libreria` FOREIGN KEY (`codigo_lib`) REFERENCES `sr_nombre_libreria` (`id_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_librerias`
--

LOCK TABLES sr_librerias WRITE;
INSERT INTO sr_librerias VALUES('1', '1', 'login', 'header', 'assets/css/style.css', 'nada', '1');
INSERT INTO sr_librerias VALUES('2', '1', 'login', 'header', 'assets/css/ui.css', 'nada', '1');
INSERT INTO sr_librerias VALUES('3', '1', 'login', 'header', 'assets/plugins/bootstrap-loading/lada.min.css', 'nada', '1');
INSERT INTO sr_librerias VALUES('4', '6', 'dashboard', 'header', 'assets/js/change_pages.js', 'nada', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_logos`
--

DROP TABLE IF EXISTS sr_logos;
CREATE TABLE `sr_logos` (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_logo` varchar(250) DEFAULT NULL,
  `pages_logo` varchar(250) DEFAULT NULL,
  `url_logo` varchar(250) DEFAULT NULL,
  `descripcion_logo` varchar(250) DEFAULT NULL,
  `estado_logo` int(1) DEFAULT NULL,
  KEY `Índice 1` (`id_logo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_logos`
--

LOCK TABLES sr_logos WRITE;
INSERT INTO sr_logos VALUES('1', 'Alcaldia', 'partida_detalle', 'assets\\images\\logo\\logo_aempresa.png', 'Logo de la alcaldia', '1');
INSERT INTO sr_logos VALUES('2', 'Escudo', 'partida_detalle', 'assets\\images\\logo\\Escudo_de_El_Salvador.png', 'Escudo de El Salvador', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_marginaciones`
--

DROP TABLE IF EXISTS sr_marginaciones;
CREATE TABLE `sr_marginaciones` (
  `id_marginacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_partida` int(11) DEFAULT NULL,
  `id_partida` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `texto_marginacion` text,
  `fecha_marginacion` date DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  KEY `Índice 1` (`id_marginacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_marginaciones`
--

LOCK TABLES sr_marginaciones WRITE;
INSERT INTO sr_marginaciones VALUES('1', '1', '8', '1', 'prueba de marginacion', '0000-00-00', '2015-07-12 23:24:39');
INSERT INTO sr_marginaciones VALUES('2', '1', '8', '1', 'marginacion demo de partida de Juan Carlos Mena mendez', '2015-07-12', '2015-07-12 23:26:46');
INSERT INTO sr_marginaciones VALUES('3', '1', '8', '1', 'otra marginacion de demostracion', '2015-07-13', '2015-07-13 12:17:26');
INSERT INTO sr_marginaciones VALUES('4', '1', '8', '2', 'desde otro usuario', '2015-07-13', '2015-07-13 13:02:49');
INSERT INTO sr_marginaciones VALUES('5', '1', '9', '1', 'Gracias', '2015-08-16', '2015-08-16 09:21:33');
INSERT INTO sr_marginaciones VALUES('6', '2', '6', '1', 'se margino muy bien', '2015-08-16', '2015-08-16 21:18:29');
INSERT INTO sr_marginaciones VALUES('7', '1', '9', '2', 'FSJFDSJDJFJSDJSFSFSFD', '2015-08-18', '2015-08-18 10:08:10');
INSERT INTO sr_marginaciones VALUES('8', '2', '8', '1', 'demo', '2015-08-23', '2015-08-23 17:38:18');
UNLOCK TABLES;


--
-- Table structure for table `sr_menu`
--

DROP TABLE IF EXISTS sr_menu;
CREATE TABLE `sr_menu` (
  `id_menu` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(50) DEFAULT NULL,
  `url_menu` varchar(200) DEFAULT NULL,
  `icon_menu` varchar(200) DEFAULT NULL,
  `class_menu` varchar(200) DEFAULT NULL,
  `id_rol_menu` int(50) DEFAULT NULL,
  `estado_menu` varchar(1) DEFAULT NULL,
  KEY `Índice 1` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_menu`
--

LOCK TABLES sr_menu WRITE;
INSERT INTO sr_menu VALUES('1', 'INICIO', 'dashboard.php', 'icon-home', 'nav-active active', '1', '1');
INSERT INTO sr_menu VALUES('2', 'PARTIDAS', 'partidas.php', 'icon-doc', NULL, '1', '1');
INSERT INTO sr_menu VALUES('3', 'ACTAS', 'actas.php', 'fa fa-book', NULL, '1', '1');
INSERT INTO sr_menu VALUES('4', 'CONFIGURACION', 'configuracion.php', 'fa fa-cogs', NULL, '1', '1');
INSERT INTO sr_menu VALUES('5', 'Backup', 'backup.php', 'fa fa-check', '', '1', '1');
INSERT INTO sr_menu VALUES('6', 'Password', 'password/password.php', 'fa fa-unlock', '', '1', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_nombre_libreria`
--

DROP TABLE IF EXISTS sr_nombre_libreria;
CREATE TABLE `sr_nombre_libreria` (
  `id_nombre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_libreria` varchar(50) NOT NULL DEFAULT '0',
  `estado_libreria` int(1) NOT NULL DEFAULT '0',
  KEY `Índice 1` (`id_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_nombre_libreria`
--

LOCK TABLES sr_nombre_libreria WRITE;
INSERT INTO sr_nombre_libreria VALUES('1', 'CSS', '1');
INSERT INTO sr_nombre_libreria VALUES('2', 'JQUERY', '1');
INSERT INTO sr_nombre_libreria VALUES('3', 'JSON', '1');
INSERT INTO sr_nombre_libreria VALUES('4', 'ANGULAR', '1');
INSERT INTO sr_nombre_libreria VALUES('5', 'HTML', '1');
INSERT INTO sr_nombre_libreria VALUES('6', 'JAVASCRIPT', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_notas_usuarios`
--

DROP TABLE IF EXISTS sr_notas_usuarios;
CREATE TABLE `sr_notas_usuarios` (
  `id_nota` int(100) NOT NULL AUTO_INCREMENT,
  `titulo_nota` varchar(50) DEFAULT NULL,
  `descripcion_nota` varchar(50) DEFAULT NULL,
  `fecha_nota` date DEFAULT NULL,
  `id_usuario` int(100) DEFAULT NULL,
  `estado_nota` int(1) DEFAULT NULL,
  KEY `Índice 1` (`id_nota`),
  KEY `FK_sr_notas_usuarios_sr_usuarios` (`id_usuario`),
  CONSTRAINT `FK_sr_notas_usuarios_sr_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `sr_usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_notas_usuarios`
--

LOCK TABLES sr_notas_usuarios WRITE;
UNLOCK TABLES;


--
-- Table structure for table `sr_pdivorcio`
--

DROP TABLE IF EXISTS sr_pdivorcio;
CREATE TABLE `sr_pdivorcio` (
  `id_partida` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_partida` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hombre` varchar(250) DEFAULT NULL,
  `mujer` varchar(250) DEFAULT NULL,
  `edad_hombre` varchar(250) DEFAULT NULL,
  `edad_mujer` varchar(250) DEFAULT NULL,
  `oficio_domicilio_hombre` varchar(250) DEFAULT NULL,
  `oficio_domicilio_mujer` varchar(250) DEFAULT NULL,
  `pagina_folio` varchar(250) DEFAULT NULL,
  `numero_pagina` varchar(250) DEFAULT NULL,
  `numero_folio` varchar(250) DEFAULT NULL,
  `anio_libro` varchar(250) DEFAULT NULL,
  `partida_numero` varchar(250) DEFAULT NULL,
  `cuerpo_partida` text,
  `fecha_creaccion` date DEFAULT NULL,
  KEY `Índice 1` (`id_partida`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_pdivorcio`
--

LOCK TABLES sr_pdivorcio WRITE;
INSERT INTO sr_pdivorcio VALUES('1', '4', '1', 'Rafael', 'Claudia', '26', '23', 'jornalero de este domicilio', 'ama de casa de este domicilio', 'pagina', '23', '', '81', '12', 'han obtenido el matrimonio absoluto. ya que los dos se alejan\n                ', '2015-07-13');
INSERT INTO sr_pdivorcio VALUES('2', '4', '1', 'Rafael2', 'Claudia', '26', '23', 'jornalero de este domicilio', 'ama de casa de este domicilio', 'pagina', '23', '', '82', '12', 'han obtenido el matrimonio absoluto. ya que los dos se alejan\n                ', '2015-06-13');
INSERT INTO sr_pdivorcio VALUES('3', '4', '1', 'Rafael3', 'Claudia4', '26', '23', 'jornalero de este domicilio', 'ama de casa de este domicilio', 'pagina', '23', '', '83', '12', 'han obtenido el matrimonio absoluto. ya que los dos se alejan\n                ', '2015-08-13');
INSERT INTO sr_pdivorcio VALUES('4', '4', '1', 'Rafael', 'Claudia', '40', '40', 'jornalero de este domicilio', 'ama de casa de este domicilio', 'folio', '', '32', '33', '33', 'aaaa\n                                                                      ', '2015-10-13');
UNLOCK TABLES;


--
-- Table structure for table `sr_pmatrimonio`
--

DROP TABLE IF EXISTS sr_pmatrimonio;
CREATE TABLE `sr_pmatrimonio` (
  `id_pmatrimonio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_esposo` varchar(100) DEFAULT NULL,
  `nombre_esposa` varchar(100) DEFAULT NULL,
  `edad_esposo` varchar(100) DEFAULT NULL,
  `edad_esposa` varchar(100) DEFAULT NULL,
  `oficio_esposo` varchar(100) DEFAULT NULL,
  `oficio_esposa` varchar(100) DEFAULT NULL,
  `nacionalidad_esposo` varchar(100) DEFAULT NULL,
  `nacionalidad_esposa` varchar(100) DEFAULT NULL,
  `origen_esposo` varchar(100) DEFAULT NULL,
  `origen_esposa` varchar(100) DEFAULT NULL,
  `estado_esposo` varchar(100) DEFAULT NULL,
  `estado_esposa` varchar(100) DEFAULT NULL,
  `dui_esposo` varchar(100) DEFAULT NULL,
  `dui_esposa` varchar(100) DEFAULT NULL,
  `padre_casado` varchar(100) DEFAULT NULL,
  `madre_casado` varchar(100) DEFAULT NULL,
  `padre_casada` varchar(100) DEFAULT NULL,
  `madre_casada` varchar(100) DEFAULT NULL,
  `nacionalidad_padres_esposo` varchar(100) DEFAULT NULL,
  `nacionalidad_padres_esposa` varchar(100) DEFAULT NULL,
  `fecha_matrimonio` varchar(100) DEFAULT NULL,
  `lugar_matrimonio` varchar(100) DEFAULT NULL,
  `nombre_representante_legal` varchar(100) DEFAULT NULL,
  `genero_representante_legal` char(1) DEFAULT NULL,
  `primer_testigo` varchar(50) DEFAULT NULL,
  `segundo_testigo` varchar(50) DEFAULT NULL,
  `pagina` varchar(50) DEFAULT NULL,
  `nfolio` varchar(50) DEFAULT NULL,
  `npagina` varchar(50) DEFAULT NULL,
  `numero_libro` varchar(50) DEFAULT NULL,
  `numero_partida` varchar(50) DEFAULT NULL,
  `descripcion_general` text,
  `id_usuario` int(10) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  KEY `Índice 1` (`id_pmatrimonio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Aqui se almacenanda la informacion de las partidas de matrimonio';

--
-- Dumping data for table `sr_pmatrimonio`
--

LOCK TABLES sr_pmatrimonio WRITE;
INSERT INTO sr_pmatrimonio VALUES('6', 'Rafael Fernando Gutierrez Tejada', 'Claudia Maribel Alfaro Quijada', 'treinta  y tres', 'veinte  y dos', 'agricultor', 'ama de casa', 'Salvadoreña', 'Salvadoreña', 'de este domicilio y origen', 'de este domicilio y origen', 'soltero', 'soltera', 'dos cuatro', 'cinco seis', 'Fernando', 'Idalia', 'Liverato', 'Rosa', 'salvadoreños', 'salvadoreños', 'once horas del dia veintidos de febrero de dos mil quince', 'en esta poblacion', 'Notario Orlando Lopez', 'm', 'Esteban', 'Carla', 'pagina', '', '20', '2015', '33', 'y los contrayentes han optado como\n              ', '1', '2015-06-16');
INSERT INTO sr_pmatrimonio VALUES('1', 'juan', 'hyan', '33', '33', 'agricultor', 'ama de casa', 'Salvadoreño', 'Salvadoreña', 'de este domicilio', 'de este domicilio', 'soltero', 'soltero', '222', '33', 'jose', ' maria', 'ramon', 'teresa', 'Salvadoreños', 'Salvadoreños', 'once horas del dos de febrero de dos mil quince', 'santa rosa', 'lic. jose', 'm', 'carmen', 'maria', 'pagina', '', '11', '22', '22', 'Y los contrayentes han optado como cccccccc\n              ', '1', '2015-06-23');
INSERT INTO sr_pmatrimonio VALUES('7', 'juan', 'hyan', '33', '33', 'agricultor', 'ama de casa', 'Salvadoreño', 'Salvadoreña', 'de este domicilio', 'de este domicilio', 'soltero', 'soltero', '222', '33', 'jose', ' maria', 'ramon', 'teresa', 'Salvadoreños', 'Salvadoreños', 'once horas del dos de febrero de dos mil quince', 'santa rosa', 'lic. jose', 'm', 'carmen', 'maria', 'pagina', '', '11', '22', '22', 'Y los contrayentes han optado como cccccccc\n              ', '1', '2015-08-23');
INSERT INTO sr_pmatrimonio VALUES('8', 'juan12', 'hyan', '33', '33', 'agricultor', 'ama de casa', 'Salvadoreño', 'Salvadoreña', 'de este domicilio', 'de este domicilio', 'soltero', 'soltero', '222', '33', 'jose', ' maria', 'ramon', 'teresa', 'Salvadoreños', 'Salvadoreños', 'once horas del dos de febrero de dos mil quince', 'santa rosa', 'lic. jose', 'm', 'carmen', 'maria', 'folio', '22', '', '22', '22', 'Y los contrayentes han optado como cccccccc\n                            ', '1', '2015-07-23');
UNLOCK TABLES;


--
-- Table structure for table `sr_pnacimiento`
--

DROP TABLE IF EXISTS sr_pnacimiento;
CREATE TABLE `sr_pnacimiento` (
  `id_pnacimiento` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL DEFAULT '0',
  `id_tipo_partida` int(100) DEFAULT '0',
  `nombre_padre` varchar(250) DEFAULT NULL,
  `nombre_madre` varchar(250) DEFAULT NULL,
  `edad_padre` varchar(250) DEFAULT NULL,
  `edad_madre` varchar(250) DEFAULT NULL,
  `oficio_padre` varchar(250) DEFAULT NULL,
  `oficio_madre` varchar(250) DEFAULT NULL,
  `nacionalidad_padre` varchar(250) DEFAULT NULL,
  `nacionalidad_madre` varchar(250) DEFAULT NULL,
  `origen_padre` varchar(250) DEFAULT NULL,
  `origen_madre` varchar(250) DEFAULT NULL,
  `domicilio_padre` varchar(250) DEFAULT NULL,
  `domicilio_madre` varchar(250) DEFAULT NULL,
  `parentesco_informante` varchar(250) DEFAULT NULL,
  `numero_identidad_informante` varchar(250) DEFAULT NULL,
  `documento_expedido_informante` varchar(250) DEFAULT NULL,
  `firma_informante` varchar(250) DEFAULT NULL,
  `nombre_testigo1` varchar(250) DEFAULT NULL,
  `nombre_testigo2` varchar(250) DEFAULT NULL,
  `dui_testigo1` varchar(250) DEFAULT NULL,
  `dui_testigo2` varchar(250) DEFAULT NULL,
  `lugar_expedicion_dui_testigo1` varchar(250) DEFAULT NULL,
  `lugar_expedicion_dui_testigo2` varchar(250) DEFAULT NULL,
  `nombre_reciennacido` varchar(250) DEFAULT NULL,
  `apellido_recienacido` varchar(250) DEFAULT NULL,
  `genero_reciennacido` varchar(250) DEFAULT NULL,
  `lugar_de_nacimiento` varchar(250) DEFAULT NULL,
  `dia_nacimiento` varchar(250) DEFAULT NULL,
  `mes_nacimiento` varchar(250) DEFAULT NULL,
  `anio_nacimiento` varchar(250) DEFAULT NULL,
  `hora_nacimiento` varchar(250) DEFAULT NULL,
  `folio_pagina` varchar(250) DEFAULT NULL,
  `numero_pagina` varchar(250) DEFAULT NULL,
  `numero_folio` varchar(250) DEFAULT NULL,
  `numero_libro` varchar(250) DEFAULT NULL,
  `numero_partida` varchar(250) DEFAULT NULL,
  `jurisdiccion` varchar(250) DEFAULT NULL,
  `fecha_emision` varchar(250) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `Índice 1` (`id_pnacimiento`),
  KEY `FK_sr_pnacimiento_sr_usuarios` (`id_usuario`),
  CONSTRAINT `FK_sr_pnacimiento_sr_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `sr_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_pnacimiento`
--

LOCK TABLES sr_pnacimiento WRITE;
INSERT INTO sr_pnacimiento VALUES('3', '1', '1', 'Rafael Fernando Tejada', 'Claudia Maribel Alfaro', '26', '23', 'Ing Sistemas', 'Lic en Ingles', 'Salvadoreño', 'Salvadoreña', 'San Rafael Chalatenango', 'San Rafael  Chalatenango', 'de este domicilio', 'de este domicilio', 'Padre', '0000001', 'Chalatenango', 'si', 'Orlando Lopez', 'Karen Quijada', '001', '002', 'Chalatenango', 'Chalatenango', 'Esteban Vladimir', 'Alvarenga Gutierrez', 'masculino', 'municipio de San Rafael', 'diez y siete', 'octubre', '2002', 'ocho y cuarenta', 'pagina', '12345', '', '22', '23', 'de esta jurisdiccion', 'veinte y cuatro de octubre de dos mil dos', '2015-08-22 22:00:00');
INSERT INTO sr_pnacimiento VALUES('4', '1', '1', 'Fernando Antonio Gutierrez Guevara', 'Rosa Idalia Tejada Deras', '34', '35', 'Jornalero', 'Maestra', 'Salvadoreño', 'Salvadoreña', 'San Rafael', 'San Rafael', 'de este domicilio', 'de este domicilio', 'Padre', '0100000024', 'Chalatenango', 'no', 'Alma Tejada', 'Hernan Lopez', '01000001', '010000002', 'Alcaldia San Salvador', 'Alcaldia San Salvador', 'Maira Guadalupe', 'Gutierrez Tejada', 'femenino', 'pueblo de San Rafael Chalatenango', 'tres', 'septiembre', '1987', 'quince horas y veintiocho minutos', 'pagina', '3355', '', '12', '0000000001', 'de esta jurisdiccion', 'veinte y cuatro de Enero de dos mil quince', '2015-05-22 22:00:00');
INSERT INTO sr_pnacimiento VALUES('5', '1', '1', 'Fernando Antonio Gutierrez Guevara', 'Rosa Idalia Tejada Deras', '30', '32', 'Jornalero', 'Maestra', 'Salvadoreño', 'Salvadoreña', 'San Rafael Chalatenango', 'San Rafael Chalatenango', 'de este domicilio', 'de este domicilio', 'Padre', '010000001', 'Santa Ana', 'si', 'Alma Tejada', 'Hernand Lopez', '0100000023', '0100000025', 'San Salvador', 'San Salvador', 'Vladimir Antonio', 'Gutierrez Tejada', 'masculino', 'departamento de Chalatenango', 'dos', 'mayo', '1986', 'una y dos minutos', 'folio', '', '00001003', '23', '0000032', 'de esta jurisdiccion', 'veinte y cuatro de Enero de dos mil quince', '2015-06-21 22:00:00');
INSERT INTO sr_pnacimiento VALUES('6', '1', '1', 'David', 'Mayra', '20', '17', 'jornalero', 'estudiante', 'Salvadoreño', 'Salvadoreña', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', '', 'masculino', '', 'diecisiete', 'Julio', '2015', '', 'pagina', '222', '', '', '', '', '', '2015-08-21 22:00:00');
INSERT INTO sr_pnacimiento VALUES('8', '1', '1', 'Carlos Ernesto Mena', 'Carmen Gutierrez', '31', '31', 'ingeniro', 'licenciada', 'Salvadoreño', 'Salvadoreña', 'Santa Tecla', 'San rafael chalatenango', 'Merliot', 'Merliot', 'Padre', '6745', 'Santa tecla', 'no', 'Ivan moran', 'Mariana mendez', '66', '66', 'Santa tecla', 'Ayutuxtepeque', 'Juan Carlos', 'Mena mendez', 'femenino', 'Santa tecla', 'dos', 'junio', '2015', 'cuatro y quince minutos', 'pagina', '4444', '', '5', '5', 'de esta jurisdiccion.', 'doce de julio de 2015', '2015-07-21 22:00:00');
INSERT INTO sr_pnacimiento VALUES('9', '1', '1', 'pedro', 'carla', '22', '22', 'doctor', 'ama de casa', 'Salvadoreño', 'Salvadoreña', 'san rafael', 'san rafael', 'de este domicilio', 'de este domicilio', 'padre', '222222', 'dui centro chalatenango', 'si', '', '', '', '', '', '', 'carmen teresa', 'deras perez', 'femenino', 'chalatenango', 'tres', 'Julio', '2015', 'once y treinta', 'pagina', '33', '', '12', '3', 'de esta jurisdiccion', 'once de julio de 2015', '2015-04-20 22:00:00');
INSERT INTO sr_pnacimiento VALUES('10', '2', '1', 'Nahum Hernandez', 'Roxana Cortez', '26', '20', 'Empleado', 'estudiante', 'Salvadoreño', 'Salvadoreña', 'santa rosa guachipilin', 'atiquizaya ahuchapan', 'de este domicilio', 'de este domicilio', 'Padre', '33534545345', 'Registro personas naturales', 'si', 'Ruben Lopez', 'Rafael', '432423424', '5765757', 'chalatenango', 'chalatenango', 'Josue Nahum', '', 'masculino', 'Metapan', 'dieciocho', 'Julio', '2013', 'once horas', 'pagina', '34535345', '', '', '67686', 'Metapan Santa Ana', 'diez - ocho', '2015-04-23 22:00:00');
INSERT INTO sr_pnacimiento VALUES('11', '2', '1', 'Nahum Hernandez', 'Roxana Cortez', '26', '20', 'Empleado', 'estudiante', 'Salvadoreño', 'Salvadoreña', 'santa rosa guachipilin', 'atiquizaya ahuchapan', 'de este domicilio', 'de este domicilio', 'Padre', '33534545345', 'Registro personas naturales', 'si', 'Ruben Lopez', 'Rafael', '432423424', '5765757', 'chalatenango', 'chalatenango', 'Josue Nahum', '', 'masculino', 'Metapan', 'dieciocho', 'Julio', '2013', 'once horas', 'pagina', '34535345', '', '', '67686', 'Metapan Santa Ana', 'diez - ocho', '2015-10-23 22:00:00');
INSERT INTO sr_pnacimiento VALUES('12', '2', '1', 'Nahum Hernandez', 'Roxana Cortez', '26', '20', 'Empleado', 'estudiante', 'Salvadoreño', 'Salvadoreña', 'santa rosa guachipilin', 'atiquizaya ahuchapan', 'de este domicilio', 'de este domicilio', 'Padre', '33534545345', 'Registro personas naturales', 'si', 'Ruben Lopez', 'Rafael', '432423424', '5765757', 'chalatenango', 'chalatenango', 'Josue Nahum', '', 'masculino', 'Metapan', 'dieciocho', 'Julio', '2013', 'once horas', 'pagina', '34535345', '', '', '67686', 'Metapan Santa Ana', 'diez - ocho', '2015-09-23 22:00:00');
UNLOCK TABLES;


--
-- Table structure for table `sr_pnacimiento_template`
--

DROP TABLE IF EXISTS sr_pnacimiento_template;
CREATE TABLE `sr_pnacimiento_template` (
  `id_pnacimiento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL DEFAULT '0',
  `item1` varchar(250) DEFAULT '0',
  KEY `Índice 1` (`id_pnacimiento`),
  KEY `FK_sr_pnacimiento_sr_tipo_partidas` (`id_tipo`),
  CONSTRAINT `FK_sr_pnacimiento_sr_tipo_partidas` FOREIGN KEY (`id_tipo`) REFERENCES `sr_tipo_partidas` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 COMMENT='Contiene toda la informacion de las partidas de nacimientos';

--
-- Dumping data for table `sr_pnacimiento_template`
--

LOCK TABLES sr_pnacimiento_template WRITE;
INSERT INTO sr_pnacimiento_template VALUES('1', '1', 'LA INFRASCRITA JEFE DEL REGISTRO DEL ESTADO FAMILIAR');
INSERT INTO sr_pnacimiento_template VALUES('3', '1', 'CERTIFICA: Que a');
INSERT INTO sr_pnacimiento_template VALUES('4', '1', 'pagina');
INSERT INTO sr_pnacimiento_template VALUES('5', '1', 'folio');
INSERT INTO sr_pnacimiento_template VALUES('6', '1', 'del libro de partidas de nacimiento que esta Alcaldia llevo en el año');
INSERT INTO sr_pnacimiento_template VALUES('7', '1', 'se encuentra la que literlamente dice:');
INSERT INTO sr_pnacimiento_template VALUES('8', '1', 'Partida Numero');
INSERT INTO sr_pnacimiento_template VALUES('9', '1', 'hembra');
INSERT INTO sr_pnacimiento_template VALUES('10', '1', 'varon');
INSERT INTO sr_pnacimiento_template VALUES('11', '1', 'nacio a las');
INSERT INTO sr_pnacimiento_template VALUES('12', '1', 'y');
INSERT INTO sr_pnacimiento_template VALUES('13', '1', 'horas con');
INSERT INTO sr_pnacimiento_template VALUES('14', '1', 'minutos');
INSERT INTO sr_pnacimiento_template VALUES('15', '1', 'del dia');
INSERT INTO sr_pnacimiento_template VALUES('16', '1', 'de');
INSERT INTO sr_pnacimiento_template VALUES('17', '1', 'en el');
INSERT INTO sr_pnacimiento_template VALUES('18', '1', 'Canton');
INSERT INTO sr_pnacimiento_template VALUES('19', '1', 'Municipio');
INSERT INTO sr_pnacimiento_template VALUES('20', '1', 'Ciudad');
INSERT INTO sr_pnacimiento_template VALUES('21', '1', 'siendo');
INSERT INTO sr_pnacimiento_template VALUES('22', '1', 'siendo hijo de');
INSERT INTO sr_pnacimiento_template VALUES('23', '1', 'siendo hija de');
INSERT INTO sr_pnacimiento_template VALUES('24', '1', 'sobrina');
INSERT INTO sr_pnacimiento_template VALUES('25', '1', 'sobrino');
INSERT INTO sr_pnacimiento_template VALUES('26', '1', 'nieto');
INSERT INTO sr_pnacimiento_template VALUES('27', '1', 'nieta');
INSERT INTO sr_pnacimiento_template VALUES('29', '1', 'años');
INSERT INTO sr_pnacimiento_template VALUES('30', '1', 'edad');
INSERT INTO sr_pnacimiento_template VALUES('31', '1', 'el segundo originario de');
INSERT INTO sr_pnacimiento_template VALUES('32', '1', 'la primera originaria de');
INSERT INTO sr_pnacimiento_template VALUES('34', '1', 'la segunda originaria de ');
INSERT INTO sr_pnacimiento_template VALUES('35', '1', 'de domicilio');
INSERT INTO sr_pnacimiento_template VALUES('37', '1', 'ambos  de Nacionalidad Salvadoreña');
INSERT INTO sr_pnacimiento_template VALUES('39', '1', 'Dio estos datos');
INSERT INTO sr_pnacimiento_template VALUES('40', '1', 'el');
INSERT INTO sr_pnacimiento_template VALUES('41', '1', 'la');
INSERT INTO sr_pnacimiento_template VALUES('42', '1', 'de la recien nacida y exhibio su documento unico de identidad personal numero');
INSERT INTO sr_pnacimiento_template VALUES('43', '1', 'de el recien nacido y exhibio su  documento unico de identidad personal numero');
INSERT INTO sr_pnacimiento_template VALUES('45', '1', 'expedido por las autoridades de');
INSERT INTO sr_pnacimiento_template VALUES('46', '1', 'Y firma juntamente con el infrascrito Alcalde y Secretario que autoriza.');
INSERT INTO sr_pnacimiento_template VALUES('47', '1', 'Y no firma por no saber pero para constancia deja impresa la huella digital de la mano derecha junto a las firmas del Infrascrito Alcalde y Secretario que autoriza.');
INSERT INTO sr_pnacimiento_template VALUES('48', '1', 'Y como testigos del nacimiento se presento');
INSERT INTO sr_pnacimiento_template VALUES('49', '1', 'presento');
INSERT INTO sr_pnacimiento_template VALUES('50', '1', 'presentaron');
INSERT INTO sr_pnacimiento_template VALUES('51', '1', 'los');
INSERT INTO sr_pnacimiento_template VALUES('52', '1', 'las');
INSERT INTO sr_pnacimiento_template VALUES('53', '1', 'testigo');
INSERT INTO sr_pnacimiento_template VALUES('54', '1', 'testigos');
INSERT INTO sr_pnacimiento_template VALUES('55', '1', 'con DUI de identidad personal numeros');
INSERT INTO sr_pnacimiento_template VALUES('56', '1', 'siguientes');
INSERT INTO sr_pnacimiento_template VALUES('57', '1', 'siguiente');
INSERT INTO sr_pnacimiento_template VALUES('58', '1', 'con DUI de identidad perosnal numero');
INSERT INTO sr_pnacimiento_template VALUES('59', '1', 'y dan fe de conocer a la señora');
INSERT INTO sr_pnacimiento_template VALUES('60', '1', 'y da fe de conocer a la señora');
INSERT INTO sr_pnacimiento_template VALUES('61', '1', 'a la');
INSERT INTO sr_pnacimiento_template VALUES('62', '1', 'que dio a luz a la niña');
INSERT INTO sr_pnacimiento_template VALUES('63', '1', 'que dio a luz a al niño');
INSERT INTO sr_pnacimiento_template VALUES('64', '1', 'al');
INSERT INTO sr_pnacimiento_template VALUES('65', '1', 'del corriente año');
INSERT INTO sr_pnacimiento_template VALUES('66', '1', 'nacionalidad');
INSERT INTO sr_pnacimiento_template VALUES('67', '1', 'Alcaldia Municipal: Santa Rosa Guachipilin');
INSERT INTO sr_pnacimiento_template VALUES('68', '1', 'y para constancia firman');
INSERT INTO sr_pnacimiento_template VALUES('69', '4', 'LA INFRASCRITA JEFE DEL REGISTRO DEL ESTADO FAMILIAR');
INSERT INTO sr_pnacimiento_template VALUES('70', '4', 'CERTIFICA: Que a');
INSERT INTO sr_pnacimiento_template VALUES('71', '4', 'del libro de partidas de divorcio que esta alcaldia llevo en el año');
INSERT INTO sr_pnacimiento_template VALUES('72', '4', 'se encuentra la que literalemente dice: Partida Numero');
INSERT INTO sr_pnacimiento_template VALUES('73', '4', 'Los señores:');
INSERT INTO sr_pnacimiento_template VALUES('74', '4', 'y');
INSERT INTO sr_pnacimiento_template VALUES('75', '4', '; el primero de');
INSERT INTO sr_pnacimiento_template VALUES('76', '4', 'años de edad');
INSERT INTO sr_pnacimiento_template VALUES('77', '4', 'y la segunda de');
INSERT INTO sr_pnacimiento_template VALUES('78', '4', 'ES CONFORME CON SU ORIGINAL;');
INSERT INTO sr_pnacimiento_template VALUES('79', '4', 'con el cual se confronto: y para los usos que convengan se extiende la presente en el Registro del Estado Familiar;');
INSERT INTO sr_pnacimiento_template VALUES('81', '2', 'CERTIFICA: Que a');
INSERT INTO sr_pnacimiento_template VALUES('80', '2', 'LA INFRASCRITA JEFE DEL REGISTRO DEL ESTADO FAMILIAR');
INSERT INTO sr_pnacimiento_template VALUES('82', '2', 'del libro de partidas de nacimiento que esta Alcaldia llevo en el año');
INSERT INTO sr_pnacimiento_template VALUES('83', '2', 'se encuentra la que literlamente dice:');
INSERT INTO sr_pnacimiento_template VALUES('84', '2', 'Partida Numero');
INSERT INTO sr_pnacimiento_template VALUES('85', '2', 'Los señores :');
INSERT INTO sr_pnacimiento_template VALUES('86', '2', 'y');
INSERT INTO sr_pnacimiento_template VALUES('87', '2', 'el primero de');
INSERT INTO sr_pnacimiento_template VALUES('88', '2', 'años de edad');
INSERT INTO sr_pnacimiento_template VALUES('89', '2', 'con su Documento Unico de Identidad numero');
INSERT INTO sr_pnacimiento_template VALUES('90', '2', 'hijo de los señores');
INSERT INTO sr_pnacimiento_template VALUES('91', '2', 'y la segunda de');
INSERT INTO sr_pnacimiento_template VALUES('92', '2', 'hija de los señores');
INSERT INTO sr_pnacimiento_template VALUES('93', '2', 'contrajeron matrimonio civil a las');
INSERT INTO sr_pnacimiento_template VALUES('94', '2', 'ante los oficios de la');
INSERT INTO sr_pnacimiento_template VALUES('95', '2', 'ante los oficios del');
INSERT INTO sr_pnacimiento_template VALUES('96', '2', 'y ante los testigos señores');
INSERT INTO sr_pnacimiento_template VALUES('97', '2', 'ES CONFORME CON SU ORIGINAL;');
INSERT INTO sr_pnacimiento_template VALUES('98', '2', 'con el cual se confronto: y para los usos que convengan se extiende la presente en el Registro del Estado Familiar;');
INSERT INTO sr_pnacimiento_template VALUES('99', '1', 'ES CONFORME CON SU ORIGINAL;');
INSERT INTO sr_pnacimiento_template VALUES('100', '1', 'con el cual se confronto: y para los usos que convengan se extiende la presente en el Registro del Estado Familiar;');
UNLOCK TABLES;


--
-- Table structure for table `sr_roles`
--

DROP TABLE IF EXISTS sr_roles;
CREATE TABLE `sr_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) DEFAULT NULL,
  `estado_rol` varchar(50) DEFAULT NULL,
  KEY `Índice 1` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_roles`
--

LOCK TABLES sr_roles WRITE;
INSERT INTO sr_roles VALUES('1', 'SuperAdministrador', '1');
INSERT INTO sr_roles VALUES('15', 'Administrador', '1');
INSERT INTO sr_roles VALUES('16', 'Secretaria', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_submenu`
--

DROP TABLE IF EXISTS sr_submenu;
CREATE TABLE `sr_submenu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_submenu` varchar(50) DEFAULT NULL,
  `url_submenu` varchar(50) DEFAULT NULL,
  `titulo_submenu` varchar(50) DEFAULT NULL,
  `id_menu` int(50) DEFAULT NULL,
  `estado_submen` int(50) DEFAULT NULL,
  KEY `Índice 1` (`id_submenu`),
  KEY `FK_sr_submenu_sr_menu` (`id_menu`),
  CONSTRAINT `FK_sr_submenu_sr_menu` FOREIGN KEY (`id_menu`) REFERENCES `sr_menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_submenu`
--

LOCK TABLES sr_submenu WRITE;
INSERT INTO sr_submenu VALUES('1', 'Nacimiento', 'p_nacimiento.php', 'Nacimiento', '2', '1');
INSERT INTO sr_submenu VALUES('2', 'Divorcio', 'p_divorcio.php', 'Partidas de Divorcio', '2', '1');
INSERT INTO sr_submenu VALUES('3', 'Defuncion', 'p_defuncion.php', 'Defuncion', '2', '1');
INSERT INTO sr_submenu VALUES('4', 'Matrimonio', 'p_matrimonio.php', 'matrimonio', '2', '1');
INSERT INTO sr_submenu VALUES('5', 'Animaciones', 'p_animaciones.php', 'Configuracion', '4', '1');
INSERT INTO sr_submenu VALUES('6', 'Informacion General', 'p_informacion.php', 'Informacion General', '4', '1');
INSERT INTO sr_submenu VALUES('7', 'Menus', 'menus.php', 'Menus', '4', '1');
INSERT INTO sr_submenu VALUES('8', 'Base de Datos', 'respaldo/respaldo.php', 'Demo', '5', '1');
INSERT INTO sr_submenu VALUES('9', 'Restaurar BK', 'restaurar/restaurar_bk.php', 'BK Files', '5', '1');
INSERT INTO sr_submenu VALUES('10', 'Avatar', 'avatar.php', 'Avatar', '4', '1');
INSERT INTO sr_submenu VALUES('11', 'Usuarios', 'p_usuarios.php', 'Usuarios', '4', '1');
INSERT INTO sr_submenu VALUES('13', 'Menus Accesos', 'p_accesos.php', 'Accesos Menus', '4', '1');
INSERT INTO sr_submenu VALUES('14', 'Password', 'password/password.php', 'Password', '6', '1');
INSERT INTO sr_submenu VALUES('15', 'Graficas', 'graficas.php', 'Graficas', '1', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_tipo_partidas`
--

DROP TABLE IF EXISTS sr_tipo_partidas;
CREATE TABLE `sr_tipo_partidas` (
  `id_tipo` int(50) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(50) DEFAULT NULL,
  `descripcion_tipo` varchar(250) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  KEY `Índice 1` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_tipo_partidas`
--

LOCK TABLES sr_tipo_partidas WRITE;
INSERT INTO sr_tipo_partidas VALUES('1', 'Partida Nacimiento', 'Tipo de partida para hacentar personas', '1');
INSERT INTO sr_tipo_partidas VALUES('2', 'Partida Matrimonio', 'Tipo de partida en la que se pcontrae matrimonio', '1');
INSERT INTO sr_tipo_partidas VALUES('3', 'Partida Defuncion', 'Tipo de partida en donde se plasma la muerte de una persona', '1');
INSERT INTO sr_tipo_partidas VALUES('4', 'Partida Divorcio', 'Tipo de disolucion de un matrimonio', '1');
UNLOCK TABLES;


--
-- Table structure for table `sr_user_update_partida`
--

DROP TABLE IF EXISTS sr_user_update_partida;
CREATE TABLE `sr_user_update_partida` (
  `id_update` int(100) NOT NULL AUTO_INCREMENT,
  `id_tipo_partida` int(100) NOT NULL DEFAULT '0',
  `id_partida` int(100) NOT NULL DEFAULT '0',
  `id_usuario` int(100) NOT NULL DEFAULT '0',
  `fecha_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `Índice 1` (`id_update`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_user_update_partida`
--

LOCK TABLES sr_user_update_partida WRITE;
INSERT INTO sr_user_update_partida VALUES('2', '1', '4', '2', '2015-07-11 21:47:16');
INSERT INTO sr_user_update_partida VALUES('3', '1', '8', '2', '2015-07-11 21:48:25');
INSERT INTO sr_user_update_partida VALUES('4', '1', '4', '1', '2015-07-11 21:49:17');
INSERT INTO sr_user_update_partida VALUES('5', '1', '9', '1', '2015-07-11 22:10:34');
INSERT INTO sr_user_update_partida VALUES('6', '1', '3', '1', '2015-07-11 22:21:36');
INSERT INTO sr_user_update_partida VALUES('7', '1', '8', '1', '2015-07-11 22:23:44');
INSERT INTO sr_user_update_partida VALUES('8', '1', '3', '1', '2015-07-11 22:27:26');
INSERT INTO sr_user_update_partida VALUES('9', '1', '8', '1', '2015-07-11 22:28:26');
INSERT INTO sr_user_update_partida VALUES('10', '1', '3', '1', '2015-07-11 22:32:22');
INSERT INTO sr_user_update_partida VALUES('11', '1', '3', '1', '2015-07-11 22:34:53');
INSERT INTO sr_user_update_partida VALUES('12', '1', '8', '1', '2015-07-12 17:14:49');
INSERT INTO sr_user_update_partida VALUES('13', '1', '8', '1', '2015-07-12 17:15:29');
UNLOCK TABLES;


--
-- Table structure for table `sr_usuarios`
--

DROP TABLE IF EXISTS sr_usuarios;
CREATE TABLE `sr_usuarios` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `primer_nombre` varchar(100) DEFAULT NULL,
  `segundo_nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `genero` char(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `dui` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_cargo` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  KEY `Índice 1` (`id_usuario`),
  KEY `FK_sr_usuarios_sr_roles` (`rol`),
  KEY `FK_sr_usuarios_sr_cargos` (`id_cargo`),
  CONSTRAINT `FK_sr_usuarios_sr_cargos` FOREIGN KEY (`id_cargo`) REFERENCES `sr_cargos` (`id_cargo`),
  CONSTRAINT `FK_sr_usuarios_sr_roles` FOREIGN KEY (`rol`) REFERENCES `sr_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_usuarios`
--

LOCK TABLES sr_usuarios WRITE;
INSERT INTO sr_usuarios VALUES('1', 'rafael', 'rafael', 'Rafael.Gutierrez', '1989-10-24', 'Rafael', 'Fernando', 'Gutierrez', 'Tejada', 'M', 'no-profile.gif', '23570058', '72616977', 'San Rafael Chalatenango', '00000-000-0', '2015-07-08 10:54:07', '2', '1', '1');
INSERT INTO sr_usuarios VALUES('2', 'jose', 'jose', 'Jose.Lopez', '2015-07-03', 'Jose', 'Ruben', 'Lopez', 'Menjivar', 'M', 'jose.lopez.png', '454545', '454545', 'Suchi', '5565', '2015-07-08 10:54:10', '3', '16', '1');
INSERT INTO sr_usuarios VALUES('3', 'david', 'tejada', 'david.tejada', '1987-10-19', 'david', 'david', 'tejada', 'tejeda', 'M', 'avatar1_big@2x.png', '2222', '5555', 'dddd', '234567', '2015-08-21 00:00:00', '2', '15', '1');
INSERT INTO sr_usuarios VALUES('4', 'carlos', 'vladimir', 'Carlos.Hidalgo', '1989-10-24', 'Carlos', 'Vladimir', 'Hidalgo', 'Duran', 'M', 'avatar7_big@2x.png', '234567', '784356', 'san rafael', '0192', '2015-08-21 00:00:00', '2', '15', '1');
UNLOCK TABLES;



 SET FOREIGN_KEY_CHECKS=1;
-- Dump de la Base de Datos Completo.