-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2016 a las 16:57:25
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pair_prog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `activities_group_id` int(11) DEFAULT NULL,
  `rubric_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `created`, `modified`, `user_id`, `activities_group_id`, `rubric_id`) VALUES
(1, 'Actividad 1', 'Imprima por pantalla HOLA MUNDO', '2016-08-24 23:59:11', '2016-09-09 14:01:41', 1, 1, 2),
(2, 'Actividad 2', 'Realice un programa que permita ingresar 2 números por teclado e imprima por pantalla los resultados de las 4 operaciones aritmeticas de dichos numeros.\r\nEjemplo:\r\n6 y 2\r\nSuma 8\r\nResta 4\r\nMultiplicación 12\r\nDivisión 3\r\n', '2016-09-07 03:58:31', '2016-09-24 01:47:28', 2, 1, NULL),
(4, 'Funciones 1', 'Definir una función max() que tome como argumento dos números y devuelva el mayor de ellos. (Es cierto que python tiene una función max() incorporada, pero hacerla nosotros mismos es un muy buen ejercicio.', '2016-09-08 14:15:25', '2016-09-08 14:15:25', 1, NULL, NULL),
(5, 'Funciones 2', 'Definir una función max_de_tres(), que tome tres números como argumentos y devuelva el mayor de ellos.', '2016-09-08 14:16:12', '2016-09-08 14:16:12', 1, NULL, NULL),
(6, 'Rimas', 'Escribe un programa que pida dos palabras y diga si riman o no. \r\nSi coinciden las tres últimas letras tiene que decir que riman.\r\nSi coinciden sólo las dos últimas tiene que decir que riman un poco y si no, que no riman.', '2016-09-09 18:58:03', '2016-09-11 01:13:22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities_groups`
--

CREATE TABLE `activities_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activities_groups`
--

INSERT INTO `activities_groups` (`id`, `name`, `created`, `modified`) VALUES
(1, '1ª Entrega', '2016-09-07', '2016-09-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `activities_group_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `assignments`
--

INSERT INTO `assignments` (`id`, `created`, `modified`, `activities_group_id`, `activity_id`, `user_id`, `assignment`) VALUES
(1, '2016-09-27', '2016-09-27', 1, 2, 4, ''),
(2, '2016-09-27', '2016-09-27', 1, 2, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `achievement` tinyint(1) NOT NULL COMMENT 'logrado o no logrado',
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `submission_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_auth_consumers`
--

CREATE TABLE `o_auth_consumers` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `secret` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `o_auth_consumers`
--

INSERT INTO `o_auth_consumers` (`id`, `key`, `secret`) VALUES
(1, 'moodle', 'unab');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrics`
--

CREATE TABLE `rubrics` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubrics`
--

INSERT INTO `rubrics` (`id`, `name`, `created`, `modified`, `user_id`) VALUES
(2, 'Pauta Evaluación 1ª Actividad', '2016-09-08', '2016-09-08', 1),
(3, 'Pauta Solemne', '2016-09-27', '2016-09-27', 1),
(4, 'PTI - Hito 1', '2016-11-26', '2016-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubric_criterias`
--

CREATE TABLE `rubric_criterias` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `rubric_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubric_criterias`
--

INSERT INTO `rubric_criterias` (`id`, `description`, `created`, `modified`, `rubric_id`) VALUES
(1, 'Esquema de la Solución', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubric_levels`
--

CREATE TABLE `rubric_levels` (
  `id` int(11) NOT NULL,
  `definition` text NOT NULL,
  `score` float NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `rubric_criteria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `submission` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_id` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `submissions`
--

INSERT INTO `submissions` (`id`, `submission`, `created`, `modified`, `user_id`, `activity_id`, `grade`) VALUES
(1, 'print "Hola Mundo"', '2016-09-07 11:45:15', '2016-09-07 12:27:46', 2, 1, NULL),
(2, 'print ''Hola Mundo''', '2016-09-08 19:13:01', '2016-09-08 19:13:01', 1, 1, NULL),
(5, 'Probando entrega', '2016-09-26 21:28:56', '2016-09-26 21:28:56', 1, 1, NULL),
(6, 'print ''Hola Mundo''', '2016-09-26 21:42:56', '2016-09-26 21:42:56', 5, 1, NULL),
(22, 'print ''hola''', '2016-09-27 02:27:55', '2016-09-27 02:27:55', 6, 1, NULL),
(23, 'otra', '2016-09-27 04:48:11', '2016-09-27 04:48:11', 5, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `lti_user_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `lti_user_id`, `email`, `username`, `password`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '', 'admin', '$2y$10$/Ft8D6sMKG0tyunqD37oXuaaQMagREL7Q79R32ZFcd3Rgo1LOkksG', NULL, '2016-09-06 22:42:33'),
(2, 'Carolina', 'Mesa', NULL, '', 'cpmm', '$2y$10$USDZKgbYTVZDNjeUUt9r5OKFOMFy7tgOOOuoERCUx9V76bsIqc1E.', NULL, NULL),
(4, 'Wilson', 'Yevenes', 6, '', '6', '', NULL, NULL),
(5, 'hito3', 'hito3', 7, '', '7', '', NULL, NULL),
(6, '- Admin', '-', 2, '', '2', '', NULL, NULL),
(7, 'Carolina', 'Mesa', 5, '', '5', '', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_group_id` (`activities_group_id`),
  ADD KEY `rubric_id` (`rubric_id`) USING BTREE;

--
-- Indices de la tabla `activities_groups`
--
ALTER TABLE `activities_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_group_id` (`activities_group_id`),
  ADD KEY `activity_id` (`activity_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `act_group` (`activities_group_id`,`activity_id`);

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_id` (`submission_id`);

--
-- Indices de la tabla `o_auth_consumers`
--
ALTER TABLE `o_auth_consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `rubric_criterias`
--
ALTER TABLE `rubric_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubric_id` (`rubric_id`);

--
-- Indices de la tabla `rubric_levels`
--
ALTER TABLE `rubric_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubric_criteria_id` (`rubric_criteria_id`);

--
-- Indices de la tabla `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lti_user_id` (`lti_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `activities_groups`
--
ALTER TABLE `activities_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `o_auth_consumers`
--
ALTER TABLE `o_auth_consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rubric_criterias`
--
ALTER TABLE `rubric_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rubric_levels`
--
ALTER TABLE `rubric_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `actividadengrupo` FOREIGN KEY (`activities_group_id`) REFERENCES `activities_groups` (`id`),
  ADD CONSTRAINT `rubricadelaactividad` FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`);

--
-- Filtros para la tabla `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `act_group` FOREIGN KEY (`activities_group_id`, `activity_id`) REFERENCES `activities` (`activities_group_id`, `id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `entrega_calificacion` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`);

--
-- Filtros para la tabla `rubrics`
--
ALTER TABLE `rubrics`
  ADD CONSTRAINT `usariocreador` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `rubric_criterias`
--
ALTER TABLE `rubric_criterias`
  ADD CONSTRAINT `rubrica` FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`);

--
-- Filtros para la tabla `rubric_levels`
--
ALTER TABLE `rubric_levels`
  ADD CONSTRAINT `criterio` FOREIGN KEY (`rubric_criteria_id`) REFERENCES `rubric_criterias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `activitiy_submission` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`);
