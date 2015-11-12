-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2015 a las 03:45:24
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
  `id_persona` int(11) NOT NULL,
  `id_correo` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `id_persona` int(11) NOT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `documento` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE IF NOT EXISTS `domicilios` (
  `id_persona` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_domicilio` int(11) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono_fijo` varchar(15) DEFAULT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidades`
--

CREATE TABLE IF NOT EXISTS `nacionalidades` (
  `id_nacionalidad` int(11) NOT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int(11) NOT NULL COMMENT 'Hace referencia al alumno',
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `alias` varchar(60) NOT NULL,
  `id_nacionalidad` int(11) DEFAULT NULL,
  `lugar_nacimiento` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `grupo_sanguineo` varchar(5) DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `estado_civil` varchar(15) DEFAULT NULL,
  `clave` tinyblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(60) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE IF NOT EXISTS `telefonos` (
  `id_persona` int(11) NOT NULL,
  `id_telefono` int(11) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

CREATE TABLE IF NOT EXISTS `tipos_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_facultad` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL,
  `usuario_estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_persona`,`id_correo`),
  ADD KEY `fk_correos_2` (`id_persona`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_documentos_1` (`id_tipo_documento`),
  ADD KEY `fk_documentos_2` (`id_persona`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id_persona`,`id_pais`,`id_departamento`,`id_ciudad`,`id_domicilio`),
  ADD KEY `fk_domicilios_1_idx` (`id_persona`),
  ADD KEY `fk_domicilios_ciudades1_idx` (`id_pais`,`id_departamento`,`id_ciudad`);

--
-- Indices de la tabla `nacionalidades`
--
ALTER TABLE `nacionalidades`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_personas_1` (`id_nacionalidad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_persona`,`id_telefono`),
  ADD KEY `fk_telefonos_2` (`id_persona`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_facultad`,`id_sede`,`id_persona`,`id_rol`),
  ADD KEY `fk_usuarios_1` (`id_persona`),
  ADD KEY `fk_usuarios_2_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `fk_correos_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_documentos_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipos_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documentos_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `fk_domicilios_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_domicilios_ciudades1` FOREIGN KEY (`id_pais`, `id_departamento`, `id_ciudad`) REFERENCES `ciudades` (`id_pais`, `id_departamento`, `id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_personas_1` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidades` (`id_nacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_telefonos_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_3` FOREIGN KEY (`id_facultad`, `id_sede`) REFERENCES `relacion_sede_carrera` (`id_facultad`, `id_sede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
