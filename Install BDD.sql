-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-01-2017 a las 14:53:19
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
  `use_groups` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `activities_group_id` int(11) DEFAULT NULL,
  `rubric_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `use_groups`, `created`, `modified`, `user_id`, `activities_group_id`, `rubric_id`) VALUES
(1, 'Actividad 1', 'Imprima por pantalla HOLA MUNDO', 1, '2016-08-24 23:59:11', '2016-09-09 14:01:41', 1, 1, 2),
(2, 'Actividad 2', 'Realice un programa que permita ingresar 2 números por teclado e imprima por pantalla los resultados de las 4 operaciones aritmeticas de dichos numeros.\r\nEjemplo:\r\n6 y 2\r\nSuma 8\r\nResta 4\r\nMultiplicación 12\r\nDivisión 3\r\n', 0, '2016-09-07 03:58:31', '2016-09-24 01:47:28', 1, 1, NULL),
(3, 'Rimas', 'Escribe un programa que pida dos palabras y diga si riman o no. \r\nSi coinciden las tres últimas letras tiene que decir que riman.\r\nSi coinciden sólo las dos últimas tiene que decir que riman un poco y si no, que no riman.', 1, NULL, '2016-12-30 02:45:00', 2, NULL, NULL),
(4, 'Práctica 001', 'Definir una función max() que tome como argumento dos números y devuelva el mayor de ellos. (No utilizar función max() incorporada).', 0, NULL, '2016-12-20 18:26:13', 1, NULL, NULL),
(5, 'Práctica 002', 'Definir una función max_de_tres(), que tome tres números como argumentos y devuelva el mayor de ellos.', 0, NULL, '2016-12-20 18:26:41', 1, NULL, NULL),
(6, 'Práctica 003', 'Definir una función que calcule la longitud de una lista o una cadena dada. (No utilizar la función len() incorporada en Python).', 0, '2016-09-09 18:58:03', '2016-12-20 18:27:28', 1, NULL, NULL),
(7, 'Práctica 004', 'Escribir una función que tome un carácter y devuelva True si es una vocal, de lo contrario devuelve False.', 0, '2016-12-20 14:52:37', '2016-12-20 18:27:43', 1, NULL, NULL),
(8, 'Práctica 005', 'Escribir una funcion sum() y una función multip() que sumen y multipliquen respectivamente todos los números de una lista. Por ejemplo: sum([1,2,3,4]) debería devolver 10 y multip([1,2,3,4]) debería devolver 24.', 0, '2016-12-20 14:52:51', '2016-12-20 18:28:07', 1, NULL, NULL),
(9, 'Práctica 006', 'Definir una función inversa() que calcule la inversión de una cadena. Por ejemplo la cadena "estoy probando" debería devolver la cadena "odnaborp yotse"', 0, '2016-12-20 14:53:11', '2016-12-20 18:28:22', 1, NULL, NULL),
(10, 'act4', 'act4', 0, '2016-12-20 14:53:24', '2016-12-20 14:53:24', 1, NULL, NULL),
(11, 'act5', 'act5', 0, '2016-12-20 14:53:37', '2016-12-20 14:53:37', 1, NULL, NULL),
(12, 'act6', 'act6', 0, '2016-12-20 14:53:49', '2016-12-20 14:53:49', 1, NULL, NULL),
(13, 'act7', 'act7', 0, '2016-12-20 14:54:23', '2016-12-20 14:54:23', 1, NULL, NULL),
(14, 'act8', 'act8', 0, '2016-12-20 14:54:36', '2016-12-20 14:54:36', 1, NULL, NULL),
(15, 'act9', 'act9', 0, '2016-12-20 14:54:53', '2016-12-20 14:54:53', 1, NULL, NULL),
(16, 'act10', 'act10', 0, '2016-12-20 14:55:06', '2016-12-20 14:55:06', 1, NULL, NULL),
(17, 'act11', 'act11', 0, '2016-12-20 14:55:21', '2016-12-20 14:55:21', 1, NULL, NULL),
(18, 'act12', 'act12', 0, '2016-12-20 14:55:33', '2016-12-20 14:55:33', 1, NULL, NULL),
(19, 'act13', 'act13', 0, '2016-12-20 14:55:49', '2016-12-20 14:55:49', 1, NULL, NULL),
(20, 'act14', 'act14', 0, '2016-12-20 14:56:00', '2016-12-20 14:56:00', 1, NULL, NULL),
(21, 'act15', 'act15', 0, '2016-12-20 14:56:19', '2016-12-20 14:56:19', 1, NULL, NULL),
(22, 'act16', 'act16', 0, '2016-12-20 14:56:35', '2016-12-20 14:56:35', 1, NULL, NULL);

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
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `assignments`
--

INSERT INTO `assignments` (`id`, `created`, `modified`, `user_id`, `group_id`, `role_id`) VALUES
(5, '2016-12-16', '2016-12-16', 2, 3, 2),
(6, '2016-12-20', '2016-12-20', 4, 4, 2),
(12, '2016-12-21', '2016-12-21', 5, 4, 1),
(15, '2016-12-25', '2016-12-25', 6, 5, 2),
(16, '2016-12-25', '2016-12-25', 7, 6, 1),
(17, '2016-12-25', '2016-12-25', 8, 6, 2),
(18, '2017-01-04', '2017-01-04', 1, 11, 2),
(19, '2017-01-04', '2017-01-04', 3, 11, 1),
(22, '2017-01-04', '2017-01-04', 1, 3, 2),
(23, '2017-01-04', '2017-01-04', 10, 7, 1),
(24, '2017-01-04', '2017-01-04', 11, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`, `activity_id`) VALUES
(1, 'rubrica 1', '2016-12-11', '2016-12-11', 2),
(2, 'Pareja 01', '2016-12-11', '2016-12-11', 6),
(3, 'Pareja 01', '2016-12-11', '2016-12-11', 1),
(4, 'Pareja 02', '2016-12-11', '2016-12-11', 1),
(5, 'Pareja 03', '2016-12-11', '2016-12-11', 1),
(6, 'Pareja 04', '2016-12-11', '2016-12-11', 1),
(7, 'Pareja 05', '2016-12-20', '2016-12-20', 1),
(8, 'Pareja 1', '2016-12-21', '2016-12-21', 4),
(9, 'Pareja 1', '2016-12-21', '2016-12-21', 4),
(10, 'pareja 06', '2016-12-21', '2016-12-21', 1),
(11, 'G01', '2017-01-04', '2017-01-04', 3);

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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Ejecutor'),
(2, 'Revisor');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubric_criterias`
--

INSERT INTO `rubric_criterias` (`id`, `description`, `created`, `modified`, `rubric_id`) VALUES
(1, 'Esquema de la Solución', NULL, NULL, 4),
(2, 'Cumple lo solicitado', NULL, NULL, 2),
(3, 'Lenguaje de Programación', NULL, NULL, 2),
(4, 'Orden', NULL, NULL, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubric_levels`
--

INSERT INTO `rubric_levels` (`id`, `definition`, `score`, `created`, `modified`, `rubric_criteria_id`) VALUES
(1, 'Cumple al 100% lo Solicitado', 7, '2017-01-04', '2017-01-04', 2),
(2, 'Cumple parcialmente con lo solicitado', 4, '2017-01-04', '2017-01-04', 2),
(3, 'No cumple con lo solicitado', 1, '2017-01-04', '2017-01-04', 2),
(4, 'Código se encuentra programado en Python', 7, '2017-01-04', '2017-01-04', 3),
(5, 'Código NO se encuentra programado en Python', 1, '2017-01-04', '2017-01-04', 3),
(6, 'El código se encuentra ordenado y sigue la estructura del lenguaje.', 7, '2017-01-04', '2017-01-04', 4),
(7, 'El código no sigue la estructura del lenguaje, por lo que se dificulta su comprensión. ', 1, '2017-01-04', '2017-01-04', 4);

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
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `lti_user_id`, `email`, `username`, `password`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, 'carolitamesa@gmail.com', 'admin', '$2y$10$byRt48oRdWPM9hmvexaeLeut9si1T7A6TMJizCTm.E6ZAphZkiM6C', NULL, '2016-09-06 22:42:33'),
(2, 'Carolina', 'Mesa Matus de la Parra', NULL, 'c.mesamatus@lti.cl', 'cpmm', '$2y$10$AbxigFCuWzMKpAbSXiHlBukY4Lb6a4qkTwm2yZxvhR2er9gzEKDw.', NULL, NULL),
(3, '- Admin', '-', 2, '', '2', '', NULL, NULL),
(4, 'Wilson', 'Yevenes', 6, '', '6', '', NULL, NULL),
(5, 'hito3', 'hito3', 7, '', '7', '', NULL, NULL),
(6, 'Carolina', 'Mesa', 5, '', '5', '', NULL, NULL),
(7, 'Cristian', 'Avalos', NULL, '', 'cavalos', '$2y$10$u6BzMAclRElUtnop1qGnhOUT0FolAOCKcM/3RmEc/ZufQf8k/z8iC', NULL, NULL),
(8, 'Unit', 'Test', NULL, '', 'test', '$2y$10$BbBqWoaUPTr8xiKCEHnmueuuR5Fz1ioVWXivtdFgUUU8qgNoO/luK', NULL, NULL),
(9, 'Ramón', 'Reyes', NULL, 'rr@lti.cl', 'rreyes', '$2y$10$otDwSDRsNL1/jFuTwft0TedoVZSajVpuMpQvL9CIw9xyhbieNL3fO', NULL, NULL),
(10, 'ANTONIA J.', 'ILABACA CARTAGENA', 9, '193289819@lti.cl', '$User.username', '', NULL, NULL),
(11, 'MALU S.', 'JORQUERA ORELLANA', 10, '190373193@lti.cl', '$User.username', '', NULL, NULL);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`) USING BTREE,
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indices de la tabla `o_auth_consumers`
--
ALTER TABLE `o_auth_consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `activities_groups`
--
ALTER TABLE `activities_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `o_auth_consumers`
--
ALTER TABLE `o_auth_consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rubric_criterias`
--
ALTER TABLE `rubric_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rubric_levels`
--
ALTER TABLE `rubric_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  ADD CONSTRAINT `grupos` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `grupos_actividad` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE;

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
