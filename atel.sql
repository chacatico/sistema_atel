-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-09-2013 a las 05:45:58
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `atel`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `asistencias`
-- 

CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL auto_increment,
  `id_persona` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY  (`id_asistencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `asistencias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cargo_personal`
-- 

CREATE TABLE `cargo_personal` (
  `id_cargo` int(11) NOT NULL auto_increment,
  `nombre_cargo` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_cargo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `cargo_personal`
-- 

INSERT INTO `cargo_personal` VALUES (1, 'Director General');
INSERT INTO `cargo_personal` VALUES (2, 'Director de Desarrollo de Proyectos y Tecnologías de la Información');
INSERT INTO `cargo_personal` VALUES (3, 'Director de Capacitación, Asesoramiento y Consultoría');
INSERT INTO `cargo_personal` VALUES (4, 'Director Administrativo y de Finanzas');
INSERT INTO `cargo_personal` VALUES (5, 'Director de Diseño y Desarrollo Web');
INSERT INTO `cargo_personal` VALUES (6, 'Secretaria');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL auto_increment,
  `nombre_categoria` varchar(40) NOT NULL,
  `descripcion_categoria` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES (1, 'Programas', 'Software');
INSERT INTO `categorias` VALUES (2, 'Programación', 'Php óé');
INSERT INTO `categorias` VALUES (3, 'Diseño Web', 'Creación de páginas web.');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ciudades`
-- 

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL auto_increment,
  `id_estado` int(11) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `capital` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_ciudad`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=523 ;

-- 
-- Volcar la base de datos para la tabla `ciudades`
-- 

INSERT INTO `ciudades` VALUES (1, 1, 'Maroa', 0);
INSERT INTO `ciudades` VALUES (2, 1, 'Puerto Ayacucho', 1);
INSERT INTO `ciudades` VALUES (3, 1, 'San Fernando de Atabapo', 0);
INSERT INTO `ciudades` VALUES (4, 2, 'Anaco', 0);
INSERT INTO `ciudades` VALUES (5, 2, 'Aragua de Barcelona', 0);
INSERT INTO `ciudades` VALUES (6, 2, 'Barcelona', 1);
INSERT INTO `ciudades` VALUES (7, 2, 'Boca de Uchire', 0);
INSERT INTO `ciudades` VALUES (8, 2, 'Cantaura', 0);
INSERT INTO `ciudades` VALUES (9, 2, 'Clarines', 0);
INSERT INTO `ciudades` VALUES (10, 2, 'El Chaparro', 0);
INSERT INTO `ciudades` VALUES (11, 2, 'El Pao Anzoátegui', 0);
INSERT INTO `ciudades` VALUES (12, 2, 'El Tigre', 0);
INSERT INTO `ciudades` VALUES (13, 2, 'El Tigrito', 0);
INSERT INTO `ciudades` VALUES (14, 2, 'Guanape', 0);
INSERT INTO `ciudades` VALUES (15, 2, 'Guanta', 0);
INSERT INTO `ciudades` VALUES (16, 2, 'Lechería', 0);
INSERT INTO `ciudades` VALUES (17, 2, 'Onoto', 0);
INSERT INTO `ciudades` VALUES (18, 2, 'Pariaguán', 0);
INSERT INTO `ciudades` VALUES (19, 2, 'Píritu', 0);
INSERT INTO `ciudades` VALUES (20, 2, 'Puerto La Cruz', 0);
INSERT INTO `ciudades` VALUES (21, 2, 'Puerto Píritu', 0);
INSERT INTO `ciudades` VALUES (22, 2, 'Sabana de Uchire', 0);
INSERT INTO `ciudades` VALUES (23, 2, 'San Mateo Anzoátegui', 0);
INSERT INTO `ciudades` VALUES (24, 2, 'San Pablo Anzoátegui', 0);
INSERT INTO `ciudades` VALUES (25, 2, 'San Tomé', 0);
INSERT INTO `ciudades` VALUES (26, 2, 'Santa Ana de Anzoátegui', 0);
INSERT INTO `ciudades` VALUES (27, 2, 'Santa Fe Anzoátegui', 0);
INSERT INTO `ciudades` VALUES (28, 2, 'Santa Rosa', 0);
INSERT INTO `ciudades` VALUES (29, 2, 'Soledad', 0);
INSERT INTO `ciudades` VALUES (30, 2, 'Urica', 0);
INSERT INTO `ciudades` VALUES (31, 2, 'Valle de Guanape', 0);
INSERT INTO `ciudades` VALUES (43, 3, 'Achaguas', 0);
INSERT INTO `ciudades` VALUES (44, 3, 'Biruaca', 0);
INSERT INTO `ciudades` VALUES (45, 3, 'Bruzual', 0);
INSERT INTO `ciudades` VALUES (46, 3, 'El Amparo', 0);
INSERT INTO `ciudades` VALUES (47, 3, 'El Nula', 0);
INSERT INTO `ciudades` VALUES (48, 3, 'Elorza', 0);
INSERT INTO `ciudades` VALUES (49, 3, 'Guasdualito', 0);
INSERT INTO `ciudades` VALUES (50, 3, 'Mantecal', 0);
INSERT INTO `ciudades` VALUES (51, 3, 'Puerto Páez', 0);
INSERT INTO `ciudades` VALUES (52, 3, 'San Fernando de Apure', 1);
INSERT INTO `ciudades` VALUES (53, 3, 'San Juan de Payara', 0);
INSERT INTO `ciudades` VALUES (54, 4, 'Barbacoas', 0);
INSERT INTO `ciudades` VALUES (55, 4, 'Cagua', 0);
INSERT INTO `ciudades` VALUES (56, 4, 'Camatagua', 0);
INSERT INTO `ciudades` VALUES (58, 4, 'Choroní', 0);
INSERT INTO `ciudades` VALUES (59, 4, 'Colonia Tovar', 0);
INSERT INTO `ciudades` VALUES (60, 4, 'El Consejo', 0);
INSERT INTO `ciudades` VALUES (61, 4, 'La Victoria', 0);
INSERT INTO `ciudades` VALUES (62, 4, 'Las Tejerías', 0);
INSERT INTO `ciudades` VALUES (63, 4, 'Magdaleno', 0);
INSERT INTO `ciudades` VALUES (64, 4, 'Maracay', 1);
INSERT INTO `ciudades` VALUES (65, 4, 'Ocumare de La Costa', 0);
INSERT INTO `ciudades` VALUES (66, 4, 'Palo Negro', 0);
INSERT INTO `ciudades` VALUES (67, 4, 'San Casimiro', 0);
INSERT INTO `ciudades` VALUES (68, 4, 'San Mateo', 0);
INSERT INTO `ciudades` VALUES (69, 4, 'San Sebastián', 0);
INSERT INTO `ciudades` VALUES (70, 4, 'Santa Cruz de Aragua', 0);
INSERT INTO `ciudades` VALUES (71, 4, 'Tocorón', 0);
INSERT INTO `ciudades` VALUES (72, 4, 'Turmero', 0);
INSERT INTO `ciudades` VALUES (73, 4, 'Villa de Cura', 0);
INSERT INTO `ciudades` VALUES (74, 4, 'Zuata', 0);
INSERT INTO `ciudades` VALUES (75, 5, 'Barinas', 1);
INSERT INTO `ciudades` VALUES (76, 5, 'Barinitas', 0);
INSERT INTO `ciudades` VALUES (77, 5, 'Barrancas', 0);
INSERT INTO `ciudades` VALUES (78, 5, 'Calderas', 0);
INSERT INTO `ciudades` VALUES (79, 5, 'Capitanejo', 0);
INSERT INTO `ciudades` VALUES (80, 5, 'Ciudad Bolivia', 0);
INSERT INTO `ciudades` VALUES (81, 5, 'El Cantón', 0);
INSERT INTO `ciudades` VALUES (82, 5, 'Las Veguitas', 0);
INSERT INTO `ciudades` VALUES (83, 5, 'Libertad de Barinas', 0);
INSERT INTO `ciudades` VALUES (84, 5, 'Sabaneta', 0);
INSERT INTO `ciudades` VALUES (85, 5, 'Santa Bárbara de Barinas', 0);
INSERT INTO `ciudades` VALUES (86, 5, 'Socopó', 0);
INSERT INTO `ciudades` VALUES (87, 6, 'Caicara del Orinoco', 0);
INSERT INTO `ciudades` VALUES (88, 6, 'Canaima', 0);
INSERT INTO `ciudades` VALUES (89, 6, 'Ciudad Bolívar', 1);
INSERT INTO `ciudades` VALUES (90, 6, 'Ciudad Piar', 0);
INSERT INTO `ciudades` VALUES (91, 6, 'El Callao', 0);
INSERT INTO `ciudades` VALUES (92, 6, 'El Dorado', 0);
INSERT INTO `ciudades` VALUES (93, 6, 'El Manteco', 0);
INSERT INTO `ciudades` VALUES (94, 6, 'El Palmar', 0);
INSERT INTO `ciudades` VALUES (95, 6, 'El Pao', 0);
INSERT INTO `ciudades` VALUES (96, 6, 'Guasipati', 0);
INSERT INTO `ciudades` VALUES (97, 6, 'Guri', 0);
INSERT INTO `ciudades` VALUES (98, 6, 'La Paragua', 0);
INSERT INTO `ciudades` VALUES (99, 6, 'Matanzas', 0);
INSERT INTO `ciudades` VALUES (100, 6, 'Puerto Ordaz', 0);
INSERT INTO `ciudades` VALUES (101, 6, 'San Félix', 0);
INSERT INTO `ciudades` VALUES (102, 6, 'Santa Elena de Uairén', 0);
INSERT INTO `ciudades` VALUES (103, 6, 'Tumeremo', 0);
INSERT INTO `ciudades` VALUES (104, 6, 'Unare', 0);
INSERT INTO `ciudades` VALUES (105, 6, 'Upata', 0);
INSERT INTO `ciudades` VALUES (106, 7, 'Bejuma', 0);
INSERT INTO `ciudades` VALUES (107, 7, 'Belén', 0);
INSERT INTO `ciudades` VALUES (108, 7, 'Campo de Carabobo', 0);
INSERT INTO `ciudades` VALUES (109, 7, 'Canoabo', 0);
INSERT INTO `ciudades` VALUES (110, 7, 'Central Tacarigua', 0);
INSERT INTO `ciudades` VALUES (111, 7, 'Chirgua', 0);
INSERT INTO `ciudades` VALUES (112, 7, 'Ciudad Alianza', 0);
INSERT INTO `ciudades` VALUES (113, 7, 'El Palito', 0);
INSERT INTO `ciudades` VALUES (114, 7, 'Guacara', 0);
INSERT INTO `ciudades` VALUES (115, 7, 'Guigue', 0);
INSERT INTO `ciudades` VALUES (116, 7, 'Las Trincheras', 0);
INSERT INTO `ciudades` VALUES (117, 7, 'Los Guayos', 0);
INSERT INTO `ciudades` VALUES (118, 7, 'Mariara', 0);
INSERT INTO `ciudades` VALUES (119, 7, 'Miranda', 0);
INSERT INTO `ciudades` VALUES (120, 7, 'Montalbán', 0);
INSERT INTO `ciudades` VALUES (121, 7, 'Morón', 0);
INSERT INTO `ciudades` VALUES (122, 7, 'Naguanagua', 0);
INSERT INTO `ciudades` VALUES (123, 7, 'Puerto Cabello', 0);
INSERT INTO `ciudades` VALUES (124, 7, 'San Joaquín', 0);
INSERT INTO `ciudades` VALUES (125, 7, 'Tocuyito', 0);
INSERT INTO `ciudades` VALUES (126, 7, 'Urama', 0);
INSERT INTO `ciudades` VALUES (127, 7, 'Valencia', 1);
INSERT INTO `ciudades` VALUES (128, 7, 'Vigirimita', 0);
INSERT INTO `ciudades` VALUES (129, 8, 'Aguirre', 0);
INSERT INTO `ciudades` VALUES (130, 8, 'Apartaderos Cojedes', 0);
INSERT INTO `ciudades` VALUES (131, 8, 'Arismendi', 0);
INSERT INTO `ciudades` VALUES (132, 8, 'Camuriquito', 0);
INSERT INTO `ciudades` VALUES (133, 8, 'El Baúl', 0);
INSERT INTO `ciudades` VALUES (134, 8, 'El Limón', 0);
INSERT INTO `ciudades` VALUES (135, 8, 'El Pao Cojedes', 0);
INSERT INTO `ciudades` VALUES (136, 8, 'El Socorro', 0);
INSERT INTO `ciudades` VALUES (137, 8, 'La Aguadita', 0);
INSERT INTO `ciudades` VALUES (138, 8, 'Las Vegas', 0);
INSERT INTO `ciudades` VALUES (139, 8, 'Libertad de Cojedes', 0);
INSERT INTO `ciudades` VALUES (140, 8, 'Mapuey', 0);
INSERT INTO `ciudades` VALUES (141, 8, 'Piñedo', 0);
INSERT INTO `ciudades` VALUES (142, 8, 'Samancito', 0);
INSERT INTO `ciudades` VALUES (143, 8, 'San Carlos', 1);
INSERT INTO `ciudades` VALUES (144, 8, 'Sucre', 0);
INSERT INTO `ciudades` VALUES (145, 8, 'Tinaco', 0);
INSERT INTO `ciudades` VALUES (146, 8, 'Tinaquillo', 0);
INSERT INTO `ciudades` VALUES (147, 8, 'Vallecito', 0);
INSERT INTO `ciudades` VALUES (148, 9, 'Tucupita', 1);
INSERT INTO `ciudades` VALUES (149, 24, 'Caracas', 1);
INSERT INTO `ciudades` VALUES (150, 24, 'El Junquito', 0);
INSERT INTO `ciudades` VALUES (151, 10, 'Adícora', 0);
INSERT INTO `ciudades` VALUES (152, 10, 'Boca de Aroa', 0);
INSERT INTO `ciudades` VALUES (153, 10, 'Cabure', 0);
INSERT INTO `ciudades` VALUES (154, 10, 'Capadare', 0);
INSERT INTO `ciudades` VALUES (155, 10, 'Capatárida', 0);
INSERT INTO `ciudades` VALUES (156, 10, 'Chichiriviche', 0);
INSERT INTO `ciudades` VALUES (157, 10, 'Churuguara', 0);
INSERT INTO `ciudades` VALUES (158, 10, 'Coro', 1);
INSERT INTO `ciudades` VALUES (159, 10, 'Cumarebo', 0);
INSERT INTO `ciudades` VALUES (160, 10, 'Dabajuro', 0);
INSERT INTO `ciudades` VALUES (161, 10, 'Judibana', 0);
INSERT INTO `ciudades` VALUES (162, 10, 'La Cruz de Taratara', 0);
INSERT INTO `ciudades` VALUES (163, 10, 'La Vela de Coro', 0);
INSERT INTO `ciudades` VALUES (164, 10, 'Los Taques', 0);
INSERT INTO `ciudades` VALUES (165, 10, 'Maparari', 0);
INSERT INTO `ciudades` VALUES (166, 10, 'Mene de Mauroa', 0);
INSERT INTO `ciudades` VALUES (167, 10, 'Mirimire', 0);
INSERT INTO `ciudades` VALUES (168, 10, 'Pedregal', 0);
INSERT INTO `ciudades` VALUES (169, 10, 'Píritu Falcón', 0);
INSERT INTO `ciudades` VALUES (170, 10, 'Pueblo Nuevo Falcón', 0);
INSERT INTO `ciudades` VALUES (171, 10, 'Puerto Cumarebo', 0);
INSERT INTO `ciudades` VALUES (172, 10, 'Punta Cardón', 0);
INSERT INTO `ciudades` VALUES (173, 10, 'Punto Fijo', 0);
INSERT INTO `ciudades` VALUES (174, 10, 'San Juan de Los Cayos', 0);
INSERT INTO `ciudades` VALUES (175, 10, 'San Luis', 0);
INSERT INTO `ciudades` VALUES (176, 10, 'Santa Ana Falcón', 0);
INSERT INTO `ciudades` VALUES (177, 10, 'Santa Cruz De Bucaral', 0);
INSERT INTO `ciudades` VALUES (178, 10, 'Tocopero', 0);
INSERT INTO `ciudades` VALUES (179, 10, 'Tocuyo de La Costa', 0);
INSERT INTO `ciudades` VALUES (180, 10, 'Tucacas', 0);
INSERT INTO `ciudades` VALUES (181, 10, 'Yaracal', 0);
INSERT INTO `ciudades` VALUES (182, 11, 'Altagracia de Orituco', 0);
INSERT INTO `ciudades` VALUES (183, 11, 'Cabruta', 0);
INSERT INTO `ciudades` VALUES (184, 11, 'Calabozo', 0);
INSERT INTO `ciudades` VALUES (185, 11, 'Camaguán', 0);
INSERT INTO `ciudades` VALUES (196, 11, 'Chaguaramas Guárico', 0);
INSERT INTO `ciudades` VALUES (197, 11, 'El Socorro', 0);
INSERT INTO `ciudades` VALUES (198, 11, 'El Sombrero', 0);
INSERT INTO `ciudades` VALUES (199, 11, 'Las Mercedes de Los Llanos', 0);
INSERT INTO `ciudades` VALUES (200, 11, 'Lezama', 0);
INSERT INTO `ciudades` VALUES (201, 11, 'Onoto', 0);
INSERT INTO `ciudades` VALUES (202, 11, 'Ortíz', 0);
INSERT INTO `ciudades` VALUES (203, 11, 'San José de Guaribe', 0);
INSERT INTO `ciudades` VALUES (204, 11, 'San Juan de Los Morros', 1);
INSERT INTO `ciudades` VALUES (205, 11, 'San Rafael de Laya', 0);
INSERT INTO `ciudades` VALUES (206, 11, 'Santa María de Ipire', 0);
INSERT INTO `ciudades` VALUES (207, 11, 'Tucupido', 0);
INSERT INTO `ciudades` VALUES (208, 11, 'Valle de La Pascua', 0);
INSERT INTO `ciudades` VALUES (209, 11, 'Zaraza', 0);
INSERT INTO `ciudades` VALUES (210, 12, 'Aguada Grande', 0);
INSERT INTO `ciudades` VALUES (211, 12, 'Atarigua', 0);
INSERT INTO `ciudades` VALUES (212, 12, 'Barquisimeto', 1);
INSERT INTO `ciudades` VALUES (213, 12, 'Bobare', 0);
INSERT INTO `ciudades` VALUES (214, 12, 'Cabudare', 0);
INSERT INTO `ciudades` VALUES (215, 12, 'Carora', 0);
INSERT INTO `ciudades` VALUES (216, 12, 'Cubiro', 0);
INSERT INTO `ciudades` VALUES (217, 12, 'Cují', 0);
INSERT INTO `ciudades` VALUES (218, 12, 'Duaca', 0);
INSERT INTO `ciudades` VALUES (219, 12, 'El Manzano', 0);
INSERT INTO `ciudades` VALUES (220, 12, 'El Tocuyo', 0);
INSERT INTO `ciudades` VALUES (221, 12, 'Guaríco', 0);
INSERT INTO `ciudades` VALUES (222, 12, 'Humocaro Alto', 0);
INSERT INTO `ciudades` VALUES (223, 12, 'Humocaro Bajo', 0);
INSERT INTO `ciudades` VALUES (224, 12, 'La Miel', 0);
INSERT INTO `ciudades` VALUES (225, 12, 'Moroturo', 0);
INSERT INTO `ciudades` VALUES (226, 12, 'Quíbor', 0);
INSERT INTO `ciudades` VALUES (227, 12, 'Río Claro', 0);
INSERT INTO `ciudades` VALUES (228, 12, 'Sanare', 0);
INSERT INTO `ciudades` VALUES (229, 12, 'Santa Inés', 0);
INSERT INTO `ciudades` VALUES (230, 12, 'Sarare', 0);
INSERT INTO `ciudades` VALUES (231, 12, 'Siquisique', 0);
INSERT INTO `ciudades` VALUES (232, 12, 'Tintorero', 0);
INSERT INTO `ciudades` VALUES (233, 13, 'Apartaderos Mérida', 0);
INSERT INTO `ciudades` VALUES (234, 13, 'Arapuey', 0);
INSERT INTO `ciudades` VALUES (235, 13, 'Bailadores', 0);
INSERT INTO `ciudades` VALUES (236, 13, 'Caja Seca', 0);
INSERT INTO `ciudades` VALUES (237, 13, 'Canaguá', 0);
INSERT INTO `ciudades` VALUES (238, 13, 'Chachopo', 0);
INSERT INTO `ciudades` VALUES (239, 13, 'Chiguara', 0);
INSERT INTO `ciudades` VALUES (240, 13, 'Ejido', 0);
INSERT INTO `ciudades` VALUES (241, 13, 'El Vigía', 0);
INSERT INTO `ciudades` VALUES (242, 13, 'La Azulita', 0);
INSERT INTO `ciudades` VALUES (243, 13, 'La Playa', 0);
INSERT INTO `ciudades` VALUES (244, 13, 'Lagunillas Mérida', 0);
INSERT INTO `ciudades` VALUES (245, 13, 'Mérida', 1);
INSERT INTO `ciudades` VALUES (246, 13, 'Mesa de Bolívar', 0);
INSERT INTO `ciudades` VALUES (247, 13, 'Mucuchíes', 0);
INSERT INTO `ciudades` VALUES (248, 13, 'Mucujepe', 0);
INSERT INTO `ciudades` VALUES (249, 13, 'Mucuruba', 0);
INSERT INTO `ciudades` VALUES (250, 13, 'Nueva Bolivia', 0);
INSERT INTO `ciudades` VALUES (251, 13, 'Palmarito', 0);
INSERT INTO `ciudades` VALUES (252, 13, 'Pueblo Llano', 0);
INSERT INTO `ciudades` VALUES (253, 13, 'Santa Cruz de Mora', 0);
INSERT INTO `ciudades` VALUES (254, 13, 'Santa Elena de Arenales', 0);
INSERT INTO `ciudades` VALUES (255, 13, 'Santo Domingo', 0);
INSERT INTO `ciudades` VALUES (256, 13, 'Tabáy', 0);
INSERT INTO `ciudades` VALUES (257, 13, 'Timotes', 0);
INSERT INTO `ciudades` VALUES (258, 13, 'Torondoy', 0);
INSERT INTO `ciudades` VALUES (259, 13, 'Tovar', 0);
INSERT INTO `ciudades` VALUES (260, 13, 'Tucani', 0);
INSERT INTO `ciudades` VALUES (261, 13, 'Zea', 0);
INSERT INTO `ciudades` VALUES (262, 14, 'Araguita', 0);
INSERT INTO `ciudades` VALUES (263, 14, 'Carrizal', 0);
INSERT INTO `ciudades` VALUES (264, 14, 'Caucagua', 0);
INSERT INTO `ciudades` VALUES (265, 14, 'Chaguaramas Miranda', 0);
INSERT INTO `ciudades` VALUES (266, 14, 'Charallave', 0);
INSERT INTO `ciudades` VALUES (267, 14, 'Chirimena', 0);
INSERT INTO `ciudades` VALUES (268, 14, 'Chuspa', 0);
INSERT INTO `ciudades` VALUES (269, 14, 'Cúa', 0);
INSERT INTO `ciudades` VALUES (270, 14, 'Cupira', 0);
INSERT INTO `ciudades` VALUES (271, 14, 'Curiepe', 0);
INSERT INTO `ciudades` VALUES (272, 14, 'El Guapo', 0);
INSERT INTO `ciudades` VALUES (273, 14, 'El Jarillo', 0);
INSERT INTO `ciudades` VALUES (274, 14, 'Filas de Mariche', 0);
INSERT INTO `ciudades` VALUES (275, 14, 'Guarenas', 0);
INSERT INTO `ciudades` VALUES (276, 14, 'Guatire', 0);
INSERT INTO `ciudades` VALUES (277, 14, 'Higuerote', 0);
INSERT INTO `ciudades` VALUES (278, 14, 'Los Anaucos', 0);
INSERT INTO `ciudades` VALUES (279, 14, 'Los Teques', 1);
INSERT INTO `ciudades` VALUES (280, 14, 'Ocumare del Tuy', 0);
INSERT INTO `ciudades` VALUES (281, 14, 'Panaquire', 0);
INSERT INTO `ciudades` VALUES (282, 14, 'Paracotos', 0);
INSERT INTO `ciudades` VALUES (283, 14, 'Río Chico', 0);
INSERT INTO `ciudades` VALUES (284, 14, 'San Antonio de Los Altos', 0);
INSERT INTO `ciudades` VALUES (285, 14, 'San Diego de Los Altos', 0);
INSERT INTO `ciudades` VALUES (286, 14, 'San Fernando del Guapo', 0);
INSERT INTO `ciudades` VALUES (287, 14, 'San Francisco de Yare', 0);
INSERT INTO `ciudades` VALUES (288, 14, 'San José de Los Altos', 0);
INSERT INTO `ciudades` VALUES (289, 14, 'San José de Río Chico', 0);
INSERT INTO `ciudades` VALUES (290, 14, 'San Pedro de Los Altos', 0);
INSERT INTO `ciudades` VALUES (291, 14, 'Santa Lucía', 0);
INSERT INTO `ciudades` VALUES (292, 14, 'Santa Teresa', 0);
INSERT INTO `ciudades` VALUES (293, 14, 'Tacarigua de La Laguna', 0);
INSERT INTO `ciudades` VALUES (294, 14, 'Tacarigua de Mamporal', 0);
INSERT INTO `ciudades` VALUES (295, 14, 'Tácata', 0);
INSERT INTO `ciudades` VALUES (296, 14, 'Turumo', 0);
INSERT INTO `ciudades` VALUES (297, 15, 'Aguasay', 0);
INSERT INTO `ciudades` VALUES (298, 15, 'Aragua de Maturín', 0);
INSERT INTO `ciudades` VALUES (299, 15, 'Barrancas del Orinoco', 0);
INSERT INTO `ciudades` VALUES (300, 15, 'Caicara de Maturín', 0);
INSERT INTO `ciudades` VALUES (301, 15, 'Caripe', 0);
INSERT INTO `ciudades` VALUES (302, 15, 'Caripito', 0);
INSERT INTO `ciudades` VALUES (303, 15, 'Chaguaramal', 0);
INSERT INTO `ciudades` VALUES (305, 15, 'Chaguaramas Monagas', 0);
INSERT INTO `ciudades` VALUES (307, 15, 'El Furrial', 0);
INSERT INTO `ciudades` VALUES (308, 15, 'El Tejero', 0);
INSERT INTO `ciudades` VALUES (309, 15, 'Jusepín', 0);
INSERT INTO `ciudades` VALUES (310, 15, 'La Toscana', 0);
INSERT INTO `ciudades` VALUES (311, 15, 'Maturín', 1);
INSERT INTO `ciudades` VALUES (312, 15, 'Miraflores', 0);
INSERT INTO `ciudades` VALUES (313, 15, 'Punta de Mata', 0);
INSERT INTO `ciudades` VALUES (314, 15, 'Quiriquire', 0);
INSERT INTO `ciudades` VALUES (315, 15, 'San Antonio de Maturín', 0);
INSERT INTO `ciudades` VALUES (316, 15, 'San Vicente Monagas', 0);
INSERT INTO `ciudades` VALUES (317, 15, 'Santa Bárbara', 0);
INSERT INTO `ciudades` VALUES (318, 15, 'Temblador', 0);
INSERT INTO `ciudades` VALUES (319, 15, 'Teresen', 0);
INSERT INTO `ciudades` VALUES (320, 15, 'Uracoa', 0);
INSERT INTO `ciudades` VALUES (321, 16, 'Altagracia', 0);
INSERT INTO `ciudades` VALUES (322, 16, 'Boca de Pozo', 0);
INSERT INTO `ciudades` VALUES (323, 16, 'Boca de Río', 0);
INSERT INTO `ciudades` VALUES (324, 16, 'El Espinal', 0);
INSERT INTO `ciudades` VALUES (325, 16, 'El Valle del Espíritu Santo', 0);
INSERT INTO `ciudades` VALUES (326, 16, 'El Yaque', 0);
INSERT INTO `ciudades` VALUES (327, 16, 'Juangriego', 0);
INSERT INTO `ciudades` VALUES (328, 16, 'La Asunción', 1);
INSERT INTO `ciudades` VALUES (329, 16, 'La Guardia', 0);
INSERT INTO `ciudades` VALUES (330, 16, 'Pampatar', 0);
INSERT INTO `ciudades` VALUES (331, 16, 'Porlamar', 0);
INSERT INTO `ciudades` VALUES (332, 16, 'Puerto Fermín', 0);
INSERT INTO `ciudades` VALUES (333, 16, 'Punta de Piedras', 0);
INSERT INTO `ciudades` VALUES (334, 16, 'San Francisco de Macanao', 0);
INSERT INTO `ciudades` VALUES (335, 16, 'San Juan Bautista', 0);
INSERT INTO `ciudades` VALUES (336, 16, 'San Pedro de Coche', 0);
INSERT INTO `ciudades` VALUES (337, 16, 'Santa Ana de Nueva Esparta', 0);
INSERT INTO `ciudades` VALUES (338, 16, 'Villa Rosa', 0);
INSERT INTO `ciudades` VALUES (339, 17, 'Acarigua', 0);
INSERT INTO `ciudades` VALUES (340, 17, 'Agua Blanca', 0);
INSERT INTO `ciudades` VALUES (341, 17, 'Araure', 0);
INSERT INTO `ciudades` VALUES (342, 17, 'Biscucuy', 0);
INSERT INTO `ciudades` VALUES (343, 17, 'Boconoito', 0);
INSERT INTO `ciudades` VALUES (344, 17, 'Campo Elías', 0);
INSERT INTO `ciudades` VALUES (345, 17, 'Chabasquén', 0);
INSERT INTO `ciudades` VALUES (346, 17, 'Guanare', 1);
INSERT INTO `ciudades` VALUES (347, 17, 'Guanarito', 0);
INSERT INTO `ciudades` VALUES (348, 17, 'La Aparición', 0);
INSERT INTO `ciudades` VALUES (349, 17, 'La Misión', 0);
INSERT INTO `ciudades` VALUES (350, 17, 'Mesa de Cavacas', 0);
INSERT INTO `ciudades` VALUES (351, 17, 'Ospino', 0);
INSERT INTO `ciudades` VALUES (352, 17, 'Papelón', 0);
INSERT INTO `ciudades` VALUES (353, 17, 'Payara', 0);
INSERT INTO `ciudades` VALUES (354, 17, 'Pimpinela', 0);
INSERT INTO `ciudades` VALUES (355, 17, 'Píritu de Portuguesa', 0);
INSERT INTO `ciudades` VALUES (356, 17, 'San Rafael de Onoto', 0);
INSERT INTO `ciudades` VALUES (357, 17, 'Santa Rosalía', 0);
INSERT INTO `ciudades` VALUES (358, 17, 'Turén', 0);
INSERT INTO `ciudades` VALUES (359, 18, 'Altos de Sucre', 0);
INSERT INTO `ciudades` VALUES (360, 18, 'Araya', 0);
INSERT INTO `ciudades` VALUES (361, 18, 'Cariaco', 0);
INSERT INTO `ciudades` VALUES (362, 18, 'Carúpano', 0);
INSERT INTO `ciudades` VALUES (363, 18, 'Casanay', 0);
INSERT INTO `ciudades` VALUES (364, 18, 'Cumaná', 1);
INSERT INTO `ciudades` VALUES (365, 18, 'Cumanacoa', 0);
INSERT INTO `ciudades` VALUES (366, 18, 'El Morro Puerto Santo', 0);
INSERT INTO `ciudades` VALUES (367, 18, 'El Pilar', 0);
INSERT INTO `ciudades` VALUES (368, 18, 'El Poblado', 0);
INSERT INTO `ciudades` VALUES (369, 18, 'Guaca', 0);
INSERT INTO `ciudades` VALUES (370, 18, 'Guiria', 0);
INSERT INTO `ciudades` VALUES (371, 18, 'Irapa', 0);
INSERT INTO `ciudades` VALUES (372, 18, 'Manicuare', 0);
INSERT INTO `ciudades` VALUES (373, 18, 'Mariguitar', 0);
INSERT INTO `ciudades` VALUES (374, 18, 'Río Caribe', 0);
INSERT INTO `ciudades` VALUES (375, 18, 'San Antonio del Golfo', 0);
INSERT INTO `ciudades` VALUES (376, 18, 'San José de Aerocuar', 0);
INSERT INTO `ciudades` VALUES (377, 18, 'San Vicente de Sucre', 0);
INSERT INTO `ciudades` VALUES (378, 18, 'Santa Fe de Sucre', 0);
INSERT INTO `ciudades` VALUES (379, 18, 'Tunapuy', 0);
INSERT INTO `ciudades` VALUES (380, 18, 'Yaguaraparo', 0);
INSERT INTO `ciudades` VALUES (381, 18, 'Yoco', 0);
INSERT INTO `ciudades` VALUES (382, 19, 'Abejales', 0);
INSERT INTO `ciudades` VALUES (383, 19, 'Borota', 0);
INSERT INTO `ciudades` VALUES (384, 19, 'Bramon', 0);
INSERT INTO `ciudades` VALUES (385, 19, 'Capacho', 0);
INSERT INTO `ciudades` VALUES (386, 19, 'Colón', 0);
INSERT INTO `ciudades` VALUES (387, 19, 'Coloncito', 0);
INSERT INTO `ciudades` VALUES (388, 19, 'Cordero', 0);
INSERT INTO `ciudades` VALUES (389, 19, 'El Cobre', 0);
INSERT INTO `ciudades` VALUES (390, 19, 'El Pinal', 0);
INSERT INTO `ciudades` VALUES (391, 19, 'Independencia', 0);
INSERT INTO `ciudades` VALUES (392, 19, 'La Fría', 0);
INSERT INTO `ciudades` VALUES (393, 19, 'La Grita', 0);
INSERT INTO `ciudades` VALUES (394, 19, 'La Pedrera', 0);
INSERT INTO `ciudades` VALUES (395, 19, 'La Tendida', 0);
INSERT INTO `ciudades` VALUES (396, 19, 'Las Delicias', 0);
INSERT INTO `ciudades` VALUES (397, 19, 'Las Hernández', 0);
INSERT INTO `ciudades` VALUES (398, 19, 'Lobatera', 0);
INSERT INTO `ciudades` VALUES (399, 19, 'Michelena', 0);
INSERT INTO `ciudades` VALUES (400, 19, 'Palmira', 0);
INSERT INTO `ciudades` VALUES (401, 19, 'Pregonero', 0);
INSERT INTO `ciudades` VALUES (402, 19, 'Queniquea', 0);
INSERT INTO `ciudades` VALUES (403, 19, 'Rubio', 0);
INSERT INTO `ciudades` VALUES (404, 19, 'San Antonio del Tachira', 0);
INSERT INTO `ciudades` VALUES (405, 19, 'San Cristobal', 1);
INSERT INTO `ciudades` VALUES (406, 19, 'San José de Bolívar', 0);
INSERT INTO `ciudades` VALUES (407, 19, 'San Josecito', 0);
INSERT INTO `ciudades` VALUES (408, 19, 'San Pedro del Río', 0);
INSERT INTO `ciudades` VALUES (409, 19, 'Santa Ana Táchira', 0);
INSERT INTO `ciudades` VALUES (410, 19, 'Seboruco', 0);
INSERT INTO `ciudades` VALUES (411, 19, 'Táriba', 0);
INSERT INTO `ciudades` VALUES (412, 19, 'Umuquena', 0);
INSERT INTO `ciudades` VALUES (413, 19, 'Ureña', 0);
INSERT INTO `ciudades` VALUES (414, 20, 'Batatal', 0);
INSERT INTO `ciudades` VALUES (415, 20, 'Betijoque', 0);
INSERT INTO `ciudades` VALUES (416, 20, 'Boconó', 0);
INSERT INTO `ciudades` VALUES (417, 20, 'Carache', 0);
INSERT INTO `ciudades` VALUES (418, 20, 'Chejende', 0);
INSERT INTO `ciudades` VALUES (419, 20, 'Cuicas', 0);
INSERT INTO `ciudades` VALUES (420, 20, 'El Dividive', 0);
INSERT INTO `ciudades` VALUES (421, 20, 'El Jaguito', 0);
INSERT INTO `ciudades` VALUES (422, 20, 'Escuque', 0);
INSERT INTO `ciudades` VALUES (423, 20, 'Isnotú', 0);
INSERT INTO `ciudades` VALUES (424, 20, 'Jajó', 0);
INSERT INTO `ciudades` VALUES (425, 20, 'La Ceiba', 0);
INSERT INTO `ciudades` VALUES (426, 20, 'La Concepción de Trujllo', 0);
INSERT INTO `ciudades` VALUES (427, 20, 'La Mesa de Esnujaque', 0);
INSERT INTO `ciudades` VALUES (428, 20, 'La Puerta', 0);
INSERT INTO `ciudades` VALUES (429, 20, 'La Quebrada', 0);
INSERT INTO `ciudades` VALUES (430, 20, 'Mendoza Fría', 0);
INSERT INTO `ciudades` VALUES (431, 20, 'Meseta de Chimpire', 0);
INSERT INTO `ciudades` VALUES (432, 20, 'Monay', 0);
INSERT INTO `ciudades` VALUES (433, 20, 'Motatán', 0);
INSERT INTO `ciudades` VALUES (434, 20, 'Pampán', 0);
INSERT INTO `ciudades` VALUES (435, 20, 'Pampanito', 0);
INSERT INTO `ciudades` VALUES (436, 20, 'Sabana de Mendoza', 0);
INSERT INTO `ciudades` VALUES (437, 20, 'San Lázaro', 0);
INSERT INTO `ciudades` VALUES (438, 20, 'Santa Ana de Trujillo', 0);
INSERT INTO `ciudades` VALUES (439, 20, 'Tostós', 0);
INSERT INTO `ciudades` VALUES (440, 20, 'Trujillo', 1);
INSERT INTO `ciudades` VALUES (441, 20, 'Valera', 0);
INSERT INTO `ciudades` VALUES (442, 21, 'Carayaca', 0);
INSERT INTO `ciudades` VALUES (443, 21, 'Litoral', 0);
INSERT INTO `ciudades` VALUES (444, 25, 'Archipiélago Los Roques', 0);
INSERT INTO `ciudades` VALUES (445, 22, 'Aroa', 0);
INSERT INTO `ciudades` VALUES (446, 22, 'Boraure', 0);
INSERT INTO `ciudades` VALUES (447, 22, 'Campo Elías de Yaracuy', 0);
INSERT INTO `ciudades` VALUES (448, 22, 'Chivacoa', 0);
INSERT INTO `ciudades` VALUES (449, 22, 'Cocorote', 0);
INSERT INTO `ciudades` VALUES (450, 22, 'Farriar', 0);
INSERT INTO `ciudades` VALUES (451, 22, 'Guama', 0);
INSERT INTO `ciudades` VALUES (452, 22, 'Marín', 0);
INSERT INTO `ciudades` VALUES (453, 22, 'Nirgua', 0);
INSERT INTO `ciudades` VALUES (454, 22, 'Sabana de Parra', 0);
INSERT INTO `ciudades` VALUES (455, 22, 'Salom', 0);
INSERT INTO `ciudades` VALUES (456, 22, 'San Felipe', 1);
INSERT INTO `ciudades` VALUES (457, 22, 'San Pablo de Yaracuy', 0);
INSERT INTO `ciudades` VALUES (458, 22, 'Urachiche', 0);
INSERT INTO `ciudades` VALUES (459, 22, 'Yaritagua', 0);
INSERT INTO `ciudades` VALUES (460, 22, 'Yumare', 0);
INSERT INTO `ciudades` VALUES (461, 23, 'Bachaquero', 0);
INSERT INTO `ciudades` VALUES (462, 23, 'Bobures', 0);
INSERT INTO `ciudades` VALUES (463, 23, 'Cabimas', 0);
INSERT INTO `ciudades` VALUES (464, 23, 'Campo Concepción', 0);
INSERT INTO `ciudades` VALUES (465, 23, 'Campo Mara', 0);
INSERT INTO `ciudades` VALUES (466, 23, 'Campo Rojo', 0);
INSERT INTO `ciudades` VALUES (467, 23, 'Carrasquero', 0);
INSERT INTO `ciudades` VALUES (468, 23, 'Casigua', 0);
INSERT INTO `ciudades` VALUES (469, 23, 'Chiquinquirá', 0);
INSERT INTO `ciudades` VALUES (470, 23, 'Ciudad Ojeda', 0);
INSERT INTO `ciudades` VALUES (471, 23, 'El Batey', 0);
INSERT INTO `ciudades` VALUES (472, 23, 'El Carmelo', 0);
INSERT INTO `ciudades` VALUES (473, 23, 'El Chivo', 0);
INSERT INTO `ciudades` VALUES (474, 23, 'El Guayabo', 0);
INSERT INTO `ciudades` VALUES (475, 23, 'El Mene', 0);
INSERT INTO `ciudades` VALUES (476, 23, 'El Venado', 0);
INSERT INTO `ciudades` VALUES (477, 23, 'Encontrados', 0);
INSERT INTO `ciudades` VALUES (478, 23, 'Gibraltar', 0);
INSERT INTO `ciudades` VALUES (479, 23, 'Isla de Toas', 0);
INSERT INTO `ciudades` VALUES (480, 23, 'La Concepción del Zulia', 0);
INSERT INTO `ciudades` VALUES (481, 23, 'La Paz', 0);
INSERT INTO `ciudades` VALUES (482, 23, 'La Sierrita', 0);
INSERT INTO `ciudades` VALUES (483, 23, 'Lagunillas del Zulia', 0);
INSERT INTO `ciudades` VALUES (484, 23, 'Las Piedras de Perijá', 0);
INSERT INTO `ciudades` VALUES (485, 23, 'Los Cortijos', 0);
INSERT INTO `ciudades` VALUES (486, 23, 'Machiques', 0);
INSERT INTO `ciudades` VALUES (487, 23, 'Maracaibo', 1);
INSERT INTO `ciudades` VALUES (488, 23, 'Mene Grande', 0);
INSERT INTO `ciudades` VALUES (489, 23, 'Palmarejo', 0);
INSERT INTO `ciudades` VALUES (490, 23, 'Paraguaipoa', 0);
INSERT INTO `ciudades` VALUES (491, 23, 'Potrerito', 0);
INSERT INTO `ciudades` VALUES (492, 23, 'Pueblo Nuevo del Zulia', 0);
INSERT INTO `ciudades` VALUES (493, 23, 'Puertos de Altagracia', 0);
INSERT INTO `ciudades` VALUES (494, 23, 'Punta Gorda', 0);
INSERT INTO `ciudades` VALUES (495, 23, 'Sabaneta de Palma', 0);
INSERT INTO `ciudades` VALUES (496, 23, 'San Francisco', 0);
INSERT INTO `ciudades` VALUES (497, 23, 'San José de Perijá', 0);
INSERT INTO `ciudades` VALUES (498, 23, 'San Rafael del Moján', 0);
INSERT INTO `ciudades` VALUES (499, 23, 'San Timoteo', 0);
INSERT INTO `ciudades` VALUES (500, 23, 'Santa Bárbara Del Zulia', 0);
INSERT INTO `ciudades` VALUES (501, 23, 'Santa Cruz de Mara', 0);
INSERT INTO `ciudades` VALUES (502, 23, 'Santa Cruz del Zulia', 0);
INSERT INTO `ciudades` VALUES (503, 23, 'Santa Rita', 0);
INSERT INTO `ciudades` VALUES (504, 23, 'Sinamaica', 0);
INSERT INTO `ciudades` VALUES (505, 23, 'Tamare', 0);
INSERT INTO `ciudades` VALUES (506, 23, 'Tía Juana', 0);
INSERT INTO `ciudades` VALUES (507, 23, 'Villa del Rosario', 0);
INSERT INTO `ciudades` VALUES (508, 21, 'La Guaira', 1);
INSERT INTO `ciudades` VALUES (509, 21, 'Catia La Mar', 0);
INSERT INTO `ciudades` VALUES (510, 21, 'Macuto', 0);
INSERT INTO `ciudades` VALUES (511, 21, 'Naiguatá', 0);
INSERT INTO `ciudades` VALUES (512, 25, 'Archipiélago Los Monjes', 0);
INSERT INTO `ciudades` VALUES (513, 25, 'Isla La Tortuga y Cayos adyacentes', 0);
INSERT INTO `ciudades` VALUES (514, 25, 'Isla La Sola', 0);
INSERT INTO `ciudades` VALUES (515, 25, 'Islas Los Testigos', 0);
INSERT INTO `ciudades` VALUES (516, 25, 'Islas Los Frailes', 0);
INSERT INTO `ciudades` VALUES (517, 25, 'Isla La Orchila', 0);
INSERT INTO `ciudades` VALUES (518, 25, 'Archipiélago Las Aves', 0);
INSERT INTO `ciudades` VALUES (519, 25, 'Isla de Aves', 0);
INSERT INTO `ciudades` VALUES (520, 25, 'Isla La Blanquilla', 0);
INSERT INTO `ciudades` VALUES (521, 25, 'Isla de Patos', 0);
INSERT INTO `ciudades` VALUES (522, 25, 'Islas Los Hermanos', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clientes`
-- 

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL auto_increment,
  `cedula` varchar(11) NOT NULL,
  `nombreCliente` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Volcar la base de datos para la tabla `clientes`
-- 

INSERT INTO `clientes` VALUES (30, '23783744', 'Marcela', 'Concha', '98989', 'jbjb', 'jbjb');
INSERT INTO `clientes` VALUES (29, '15733167', 'Angelica', 'Torrealba', '2446637432', 'angelicamtv@yahoo.es', 'Unisol II');
INSERT INTO `clientes` VALUES (28, '233232', 'angel', 'lol', '97123', 'asjdnasd', 'skankdn');
INSERT INTO `clientes` VALUES (27, '123', 'Andres', 'pereira', '0', 'gmail', 'por ahi');
INSERT INTO `clientes` VALUES (26, '12312', 'dsada', 'sada|asdd', 'asddasd', 'dsad', 'sadasd');
INSERT INTO `clientes` VALUES (25, '24175197', 'Miguel', 'Torrealba', '4165449702', 'torrealba@gmail.com', 'zua');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contactos`
-- 

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(60) NOT NULL,
  `empresa` varchar(60) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `comentario` varchar(120) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `contactos`
-- 

INSERT INTO `contactos` VALUES (12, 'asdmksa', 'kmdskamdka', 2, 'aksmdksmd', 'daskmd', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cursos`
-- 

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL auto_increment,
  `imagen` text NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cursos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cursos1`
-- 

CREATE TABLE `cursos1` (
  `id_curso` int(11) NOT NULL auto_increment,
  `nombre` varchar(60) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `fecha_inicio` varchar(10) NOT NULL,
  `fecha_final` varchar(10) NOT NULL,
  `capacidad` varchar(20) NOT NULL,
  `profesor` varchar(60) NOT NULL,
  PRIMARY KEY  (`id_curso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `cursos1`
-- 

INSERT INTO `cursos1` VALUES (1, 'HTML', 'Básico', '8:00', '13-07-2013', '21-12-2013', '15', 'José Rengifo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_alumno`
-- 

CREATE TABLE `detalle_alumno` (
  `id_detalle` int(11) NOT NULL auto_increment,
  `id_alumno` int(3) NOT NULL,
  `id_curso` int(3) NOT NULL,
  PRIMARY KEY  (`id_detalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `detalle_alumno`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_curso`
-- 

CREATE TABLE `detalle_curso` (
  `id` int(11) NOT NULL auto_increment,
  `id_servicio` int(11) NOT NULL,
  `profesor` varchar(60) NOT NULL,
  `cantidad_de_alumno` varchar(39) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `detalle_curso`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_factura`
-- 

CREATE TABLE `detalle_factura` (
  `id_detallefactura` int(11) NOT NULL auto_increment,
  `id_factura` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad_producto` int(5) NOT NULL,
  PRIMARY KEY  (`id_detallefactura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `detalle_factura`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_personal`
-- 

CREATE TABLE `detalle_personal` (
  `id_detalle` int(11) NOT NULL auto_increment,
  `id_personal` int(3) NOT NULL,
  `id_cargo` int(2) NOT NULL,
  PRIMARY KEY  (`id_detalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `detalle_personal`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_profesor`
-- 

CREATE TABLE `detalle_profesor` (
  `id_detalle` int(11) NOT NULL auto_increment,
  `id_profesor` int(3) NOT NULL,
  `id_curso` int(3) NOT NULL,
  PRIMARY KEY  (`id_detalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `detalle_profesor`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estados`
-- 

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL auto_increment,
  `estado` varchar(250) NOT NULL,
  PRIMARY KEY  (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `estados`
-- 

INSERT INTO `estados` VALUES (1, 'Amazonas');
INSERT INTO `estados` VALUES (2, 'Anzoátegui');
INSERT INTO `estados` VALUES (3, 'Apure');
INSERT INTO `estados` VALUES (4, 'Aragua');
INSERT INTO `estados` VALUES (5, 'Barinas');
INSERT INTO `estados` VALUES (6, 'Bolívar');
INSERT INTO `estados` VALUES (7, 'Carabobo');
INSERT INTO `estados` VALUES (8, 'Cojedes');
INSERT INTO `estados` VALUES (9, 'Delta Amacuro');
INSERT INTO `estados` VALUES (10, 'Falcón');
INSERT INTO `estados` VALUES (11, 'Guárico');
INSERT INTO `estados` VALUES (12, 'Lara');
INSERT INTO `estados` VALUES (13, 'Mérida');
INSERT INTO `estados` VALUES (14, 'Miranda');
INSERT INTO `estados` VALUES (15, 'Monagas');
INSERT INTO `estados` VALUES (16, 'Nueva Esparta');
INSERT INTO `estados` VALUES (17, 'Portuguesa');
INSERT INTO `estados` VALUES (18, 'Sucre');
INSERT INTO `estados` VALUES (19, 'Táchira');
INSERT INTO `estados` VALUES (20, 'Trujillo');
INSERT INTO `estados` VALUES (21, 'Vargas');
INSERT INTO `estados` VALUES (22, 'Yaracuy');
INSERT INTO `estados` VALUES (23, 'Zulia');
INSERT INTO `estados` VALUES (24, 'Distrito Capital');
INSERT INTO `estados` VALUES (25, 'Dependencias Federales');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estados_pagos`
-- 

CREATE TABLE `estados_pagos` (
  `id_estado` int(11) NOT NULL auto_increment,
  `nombre_estado` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_estado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `estados_pagos`
-- 

INSERT INTO `estados_pagos` VALUES (1, 'Hecho');
INSERT INTO `estados_pagos` VALUES (2, 'Por Verificar');
INSERT INTO `estados_pagos` VALUES (3, 'Enviado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `facturas`
-- 

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL auto_increment,
  `id_cliente` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `monto_total` varchar(20) NOT NULL,
  `idVendedor` int(4) NOT NULL,
  `iva` int(10) NOT NULL,
  `totalIva` varchar(10) NOT NULL,
  `estadoFactura` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_factura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `facturas`
-- 

INSERT INTO `facturas` VALUES (10, 30, '2013-09-17', '', 17, 0, '', 'enProceso');
INSERT INTO `facturas` VALUES (9, 26, '2013-09-19', '', 0, 0, '', 'enProceso');
INSERT INTO `facturas` VALUES (8, 25, '2013-09-01', '', 0, 0, '', 'enProceso');
INSERT INTO `facturas` VALUES (11, 27, '2013-09-11', '', 0, 0, '', 'enProceso');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `grupos`
-- 

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL auto_increment,
  `nombre_grupo` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `grupos`
-- 

INSERT INTO `grupos` VALUES (1, 'profesores');
INSERT INTO `grupos` VALUES (2, 'alumnos');
INSERT INTO `grupos` VALUES (5, 'personal');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `grupos_usuarios`
-- 

CREATE TABLE `grupos_usuarios` (
  `idGrupo` int(11) NOT NULL auto_increment,
  `nombreGrupo` varchar(30) NOT NULL,
  PRIMARY KEY  (`idGrupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `grupos_usuarios`
-- 

INSERT INTO `grupos_usuarios` VALUES (1, 'Profesores');
INSERT INTO `grupos_usuarios` VALUES (2, 'Administrador');
INSERT INTO `grupos_usuarios` VALUES (3, 'PersonalAdmin');
INSERT INTO `grupos_usuarios` VALUES (4, 'Estudiante');
INSERT INTO `grupos_usuarios` VALUES (5, 'Profesor');
INSERT INTO `grupos_usuarios` VALUES (6, 'Proveedor');
INSERT INTO `grupos_usuarios` VALUES (7, 'clienteOcasional');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticias`
-- 

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL auto_increment,
  `titulo` varchar(50) NOT NULL,
  `noticia` text NOT NULL,
  `autor` int(2) NOT NULL,
  PRIMARY KEY  (`id_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `noticias`
-- 

INSERT INTO `noticias` VALUES (1, 'Noticia de Prueba', 'Holaaaa', 1);
INSERT INTO `noticias` VALUES (2, 'Saludo', 'hey now!', 1);
INSERT INTO `noticias` VALUES (3, 'Nuevos cupos Disponibles!', 'Un saludo de mi parte, bueno tenemos cupos disponibles para los siguientes cursos:\r\n1- Desarrollo.\r\n2- Diseño.\r\n3- askasm.\r\n4- askndkasnd', 1);
INSERT INTO `noticias` VALUES (4, 'KASI', 'SAKI', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pagos`
-- 

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL auto_increment,
  `monto` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo_servicio` int(2) NOT NULL,
  PRIMARY KEY  (`id_pago`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pagos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personas`
-- 

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nacionalidad` varchar(2) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `grupo` int(11) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `telf_trabajo` varchar(11) NOT NULL,
  `telf_personal` varchar(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` int(2) NOT NULL,
  `profesion` int(2) NOT NULL,
  PRIMARY KEY  (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `personas`
-- 

INSERT INTO `personas` VALUES (24, 'lol', 'lol', 123, 'V', '0000-00-00', 2, 'Masculino', '0000-00-00', '412', '11', 'oo', 'la victoria', 1, 2);
INSERT INTO `personas` VALUES (25, 'Miguel Angel', 'Torrealba Vargas', 12344444, '1', '0000-00-00', 2, '', '0000-00-00', '', '', 'torres@gmail.com', '', 0, 1);
INSERT INTO `personas` VALUES (5, 'Jorge', 'Celedon', 12312312, '0', '0000-00-00', 2, 'Masculino', '0000-00-00', '8098098', '79878979', 'sadasnd', 'asodknasd', 0, 0);
INSERT INTO `personas` VALUES (10, 'José', 'Rengifo', 87234634, '0', '0000-00-00', 1, 'Masculino', '0000-00-00', '244676898', '412879098', 'rengijo@gmail.com', 'la victoria', 1, 1);
INSERT INTO `personas` VALUES (21, 'Yamileth', 'Vivas', 12345690, '0', '0000-00-00', 2, 'Masculino', '0000-00-00', '76786', '8971237', 'a@gmail.com', 'LA VICTORIA', 0, 2);
INSERT INTO `personas` VALUES (17, 'Soofia', 'Mendoza', 14909987, '0', '0000-00-00', 5, 'Femenino', '0000-00-00', '4213123', '92137937', 'mendoza@gmail.com', 'kamsdkmasdk', 1, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pre_inscripcion`
-- 

CREATE TABLE `pre_inscripcion` (
  `id_preinscripcion` int(11) NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nacionalidad` varchar(2) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `profesion` int(1) NOT NULL,
  PRIMARY KEY  (`id_preinscripcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `pre_inscripcion`
-- 

INSERT INTO `pre_inscripcion` VALUES (4, 'Miguel Angel', 'Torrealba Vargas', '1', '24175197', 'miguel199322@gmail.com', 1);
INSERT INTO `pre_inscripcion` VALUES (3, 'Miguel', 'Torrealba', '1', '24175197', 'torrealba@gmail.com', 1);
INSERT INTO `pre_inscripcion` VALUES (5, 'Miguel Angel', 'Torrealba Vargas', '1', '2417519709', 'miguel199322@gmail.com', 1);
INSERT INTO `pre_inscripcion` VALUES (6, 'Miguel Angel', 'Torrealba Vargas', '1', '2417519709', 'miguel199322@gmail.com', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL auto_increment,
  `nombre_producto` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` varchar(15) NOT NULL,
  `PVP` varchar(15) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (1, 'Programa', 'producto', '12312313', 'windows', 1233, '', '5', '1');
INSERT INTO `productos` VALUES (2, 'web', 'producto', '9999', 'aplicacion', 2500, '2900', '1', '2');
INSERT INTO `productos` VALUES (3, 'web', 'aplicacion', '2500', '2900', 1, 'producto', '9999', '2');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `servicios`
-- 

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `precio` varchar(30) NOT NULL,
  `tipo` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `servicios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_de_servicio`
-- 

CREATE TABLE `tipo_de_servicio` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_serv` varchar(120) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `tipo_de_servicio`
-- 

INSERT INTO `tipo_de_servicio` VALUES (1, 'cursos');
INSERT INTO `tipo_de_servicio` VALUES (2, 'redes');
INSERT INTO `tipo_de_servicio` VALUES (3, 'servicio tecnico');
INSERT INTO `tipo_de_servicio` VALUES (4, 'desarrollo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_profesion`
-- 

CREATE TABLE `tipo_profesion` (
  `id_profesion` int(11) NOT NULL auto_increment,
  `nombre_profesion` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_profesion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tipo_profesion`
-- 

INSERT INTO `tipo_profesion` VALUES (1, 'Estudiante');
INSERT INTO `tipo_profesion` VALUES (2, 'Profesional');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nivel_usr` int(2) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'miguel', 'cf711eb013f130d7b8c87eda18c75c89', 1, '0000-00-00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ventas`
-- 

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL auto_increment,
  `tipo_servicio` int(2) NOT NULL,
  `monto` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `encargado` int(2) NOT NULL,
  `fecha_entrante` date NOT NULL,
  `fecha_saliente` date NOT NULL,
  PRIMARY KEY  (`id_ventas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `ventas`
-- 


-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `ciudades`
-- 
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
