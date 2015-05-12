-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 12:54 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `titulacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0' COMMENT '0 siginifica tipo de usuario alumno',
  `numero_cuenta` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela un usuario alumno';

-- --------------------------------------------------------

--
-- Table structure for table `asignar`
--

CREATE TABLE IF NOT EXISTS `asignar` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno al que le fue asignado el sinodal',
  `id_sinodal` int(11) NOT NULL COMMENT 'id del sinodal asignado al alumno',
  `voto` tinyint(1) DEFAULT NULL COMMENT '0 - sin votar, 1 - no aprobado, 2 - aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='sinodales asignados a una tesis y su voto';

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una carrera que cursa un alumno';

-- --------------------------------------------------------

--
-- Table structure for table `cursar`
--

CREATE TABLE IF NOT EXISTS `cursar` (
  `id_alumno` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt`
--

CREATE TABLE IF NOT EXISTS `dt` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '2' COMMENT '2 siginifica tipo de usuario DT',
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela un usuario DT';

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno de este examen',
  `id_edificio` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id del edificio del lugar',
  `id_aula` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id del aula del lugar',
  `fecha` date NOT NULL,
  `resultado` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'resultado del examen',
  `mensaje` text COLLATE utf8_spanish_ci COMMENT 'mensaje acerca del resultado, útil si no fue aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `edificio` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `aula` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `fecha` date NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `tipo_destinatario` int(11) NOT NULL,
  `id_remitente` int(11) NOT NULL,
  `tipo_remitente` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT 'revisada o no',
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL COMMENT 'tipo de notificacion dependiendo de la estapa del proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una notificación';

-- --------------------------------------------------------

--
-- Table structure for table `ntt`
--

CREATE TABLE IF NOT EXISTS `ntt` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno de esta notificacion de terminación de tesis',
  `motivo` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'motivo del alumno para decir que ya terminó',
  `fecha_aprobacion` date NOT NULL,
  `mensaje_desaprobacion` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'mensaje de la STC para no aprobar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una notificación de terminación de tesis';

-- --------------------------------------------------------

--
-- Table structure for table `sinodal`
--

CREATE TABLE IF NOT EXISTS `sinodal` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '3' COMMENT '3 significa tipo de usuario ',
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solicitar`
--

CREATE TABLE IF NOT EXISTS `solicitar` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno que solicita el sinodal',
  `id_sinodal` int(11) NOT NULL COMMENT 'id del sinodal solicitado por el alumno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una solicitud de un alumno de un sinodal';

-- --------------------------------------------------------

--
-- Table structure for table `sro`
--

CREATE TABLE IF NOT EXISTS `sro` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno de este registro de opción',
  `objetivo` text COLLATE utf8_spanish_ci NOT NULL,
  `resumen` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` blob NOT NULL COMMENT 'de anteproyecto',
  `fecha_aprobacion` date NOT NULL,
  `mensaje_desaprobacion` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'mensaje de la STC para no aprobar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una (solicitud de) registro de opción';

-- --------------------------------------------------------

--
-- Table structure for table `stc`
--

CREATE TABLE IF NOT EXISTS `stc` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1' COMMENT '1 significa tipo de usuario stc',
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela un usuario stc';

-- --------------------------------------------------------

--
-- Table structure for table `tesis`
--

CREATE TABLE IF NOT EXISTS `tesis` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno de esta tesis',
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='modela una tesis';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`numero_cuenta`);

--
-- Indexes for table `asignar`
--
ALTER TABLE `asignar`
  ADD PRIMARY KEY (`id_alumno`,`id_sinodal`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`) COMMENT 'identificador de carrera', ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `cursar`
--
ALTER TABLE `cursar`
  ADD PRIMARY KEY (`id_alumno`,`id_carrera`);

--
-- Indexes for table `dt`
--
ALTER TABLE `dt`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`correo`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indexes for table `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`edificio`,`aula`);

--
-- Indexes for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`fecha`,`id_destinatario`,`id_remitente`);

--
-- Indexes for table `ntt`
--
ALTER TABLE `ntt`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indexes for table `sinodal`
--
ALTER TABLE `sinodal`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`correo`);

--
-- Indexes for table `solicitar`
--
ALTER TABLE `solicitar`
  ADD PRIMARY KEY (`id_alumno`,`id_sinodal`);

--
-- Indexes for table `sro`
--
ALTER TABLE `sro`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indexes for table `stc`
--
ALTER TABLE `stc`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`correo`);

--
-- Indexes for table `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id_alumno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt`
--
ALTER TABLE `dt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sinodal`
--
ALTER TABLE `sinodal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stc`
--
ALTER TABLE `stc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
