-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-06-2017 a las 10:40:06
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
  `grade_max` float NOT NULL,
  `grade_min` float NOT NULL,
  `grade_aprobacion` float NOT NULL,
  `exigencia` float NOT NULL,
  `score_max` float NOT NULL,
  `grade_estudiantes` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `activities_group_id` int(11) DEFAULT NULL,
  `rubric_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `use_groups`, `grade_max`, `grade_min`, `grade_aprobacion`, `exigencia`, `score_max`, `grade_estudiantes`, `created`, `modified`, `user_id`, `activities_group_id`, `rubric_id`) VALUES
(1, 'Blog', 'Creación de un Blog sobre Teoría de Polinomios', 1, 2, 7, 4, 50, 20, 50, '2016-08-24 23:59:11', '2017-06-15 04:20:07', 1, 1, 2),
(3, 'Rimas', 'Escribe un programa que pida dos palabras y diga si riman o no. \r\nSi coinciden las tres últimas letras tiene que decir que riman.\r\nSi coinciden sólo las dos últimas tiene que decir que riman un poco y si no, que no riman.', 0, 0, 0, 0, 0, 0, 0, NULL, '2017-04-11 02:28:06', 2, NULL, NULL),
(4, '¿Quién vendrá a comer?', 'Estás haciendo una invitación a comer a tu casa y has pensado que quieres que coman pastel. Primero debes invitar a tus comensales, de forma interactiva. Para ello propones que el computador les pregunte el nombre y luego le das la bienvenida. ¿Te parece?\r\n\r\n¿Cuánto comerán del pastel?\r\n\r\nLuego de hacer tu invitación, 3 de tus amigos te respondieron que asistirán. El primero que respondió dijo que comerá 3 trozos de pastel, el segundo te dijo que comerá 2, y tu tercer amigo te dijo que comerá sólo uno. Sacas rápidamente las cuentas (y sabiendo que te comerás 2), sabes que deberás dividir el pastel en 8 trozos (iguales, para ser justos).No obstante, tus amigos cambian de opinión, por lo que sabes que debes repetir este cálculo varias veces...¿Cuántos trozos comerán entre todos? Haz una calculadora que te permita sacar las cuentas del total que comerán entre tú y tus amigos  =)\r\n\r\n¿Cuánto pastel han comido?\r\n\r\nSi bien dividiste tu pastel en los pedazos justos, recuerda que tú y tus amigos cambian de opinión, y probablemente ha sobrado pastel. Además, ahora ya han comido todos... recordaste que te faltó invitar al vecino!!! Para saber cuántos pedazos quedan, necesitas hacer un cálculo rápido.Te desafiamos a calcular la fracción de pastel que se han comido entre todos, y decirle a tu vecino  si queda pastel o no. Recuerda que todos los pedazos son iguales.\r\nPista -->¿Cuál será el denominador?\r\n', 1, 7, 1, 4, 60, 10, 30, '2017-05-17 19:11:09', '2017-06-07 20:24:58', 1, NULL, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `assignments`
--

INSERT INTO `assignments` (`id`, `created`, `modified`, `user_id`, `group_id`, `role_id`) VALUES
(26, '2017-05-17', '2017-05-17', 10, 12, 1),
(27, '2017-05-17', '2017-05-17', 11, 12, 2),
(28, '2017-05-17', '2017-05-17', 1, 3, 2),
(31, '2017-06-15', '2017-06-15', 7, 3, 1),
(34, '2017-06-15', '2017-06-15', 12, 14, 1),
(35, '2017-06-15', '2017-06-15', 13, 14, 2),
(36, '2017-06-15', '2017-06-15', 19, 16, 1),
(37, '2017-06-15', '2017-06-15', 21, 16, 2),
(38, '2017-06-15', '2017-06-15', 22, 17, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grades`
--

INSERT INTO `grades` (`id`, `user_id`, `submission_id`, `criteria_id`, `level_id`, `score`) VALUES
(10, 11, 2, 16, NULL, 5),
(11, 11, 2, 17, NULL, 0),
(12, 1, 2, 16, 40, 5),
(13, 1, 2, 17, 42, 5),
(31, 1, 1, 2, 1, 5),
(32, 1, 1, 3, 6, 4),
(33, 1, 1, 4, 34, 3),
(34, 1, 1, 15, 39, 1),
(35, 11, 1, 2, NULL, NULL),
(36, 11, 1, 3, NULL, NULL),
(37, 11, 1, 4, NULL, NULL),
(38, 11, 1, 15, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`, `activity_id`) VALUES
(3, 'Pareja 01', '2016-12-11', '2016-12-11', 1),
(4, 'Pareja 02', '2016-12-11', '2016-12-11', 1),
(5, 'Pareja 03', '2016-12-11', '2016-12-11', 1),
(6, 'Pareja 04', '2016-12-11', '2016-12-11', 1),
(7, 'Pareja 05', '2016-12-20', '2016-12-20', 1),
(10, 'pareja 06', '2016-12-21', '2016-12-21', 1),
(11, 'G01', '2017-01-04', '2017-01-04', 3),
(12, 'Antonia & Malu', '2017-05-17', '2017-05-17', 4),
(14, 'Pareja 2', '2017-06-07', '2017-06-07', 4),
(15, 'Pareja 07', '2017-06-15', '2017-06-15', 1),
(16, 'Pareja 3', '2017-06-15', '2017-06-15', 4),
(17, 'Pareja 4', '2017-06-15', '2017-06-15', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_auth_consumers`
--

CREATE TABLE `o_auth_consumers` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `secret` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `o_auth_consumers`
--

INSERT INTO `o_auth_consumers` (`id`, `key`, `secret`) VALUES
(1, 'moodle', 'unab'),
(3, 'aulavirtual.cl', 'aulavirtual;2017');

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
  `description` text,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubrics`
--

INSERT INTO `rubrics` (`id`, `name`, `description`, `created`, `modified`, `user_id`) VALUES
(2, 'Pauta Creación Blog', 'Pauta creada para aplicar en 1ª actividad.', '2016-09-08', '2017-04-12', 1),
(3, 'Objetivos Pedagógicos', 'Base de objetivos a lograr en una programación.', '2017-05-17', '2017-05-17', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubric_criterias`
--

INSERT INTO `rubric_criterias` (`id`, `description`, `created`, `modified`, `rubric_id`) VALUES
(2, 'Contenido', NULL, NULL, 2),
(3, 'Derechos de Autor', NULL, NULL, 2),
(4, 'Conocimientos del Material', NULL, NULL, 2),
(15, 'Precisión del Contenido.', NULL, NULL, 2),
(16, 'Resultado esperado', NULL, NULL, 3),
(17, 'Usar Variables', NULL, NULL, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubric_levels`
--

INSERT INTO `rubric_levels` (`id`, `definition`, `score`, `created`, `modified`, `rubric_criteria_id`) VALUES
(1, 'El blog tiene un propósito y un tema claros y bien planteados y son consistentes en todo el sitio. \r\n', 5, '2017-01-04', '2017-01-04', 2),
(2, 'El blog tiene un propósito y un tema claros, pero tiene uno ó dos elementos que no parecen estar relacionados. ', 4, '2017-01-04', '2017-01-04', 2),
(3, 'El propósito y el tema del blog son de alguna forma confusos o imprecisos. ', 3, '2017-01-04', '2017-01-04', 2),
(4, 'El blog carece de propósito y de tema.', 1, '2017-01-04', '2017-01-04', 2),
(5, 'Se siguen pautas de uso de la información justas con citas claras, precisas y fáciles de localizar para todo el material que fue reproducido. No se incluye material de aquellos sitios en la red que estipulan que se debe obtener permiso para usarlos a menos que éste se haya ya obtenido. ', 5, '2017-01-04', '2017-01-04', 3),
(6, 'Se siguen pautas de uso de la información justas con citas claras, precisas y fáciles de localizar para casi todo el material que fue reproducido. No se incluye material de aquellos sitios en la red que estipulan que se debe obtener permiso para usarlos a menos que éste se haya ya obtenido.', 4, '2017-01-04', '2017-01-04', 3),
(7, 'Se siguen pautas de uso de la información justas con citas claras, precisas y fáciles de localizar para la mayoría del material que fue reproducido. No se incluye material de aquellos sitios en la red que estipulan que se debe obtener permiso para usarlos a menos que éste se haya ya obtenido.', 3, '2017-01-04', '2017-01-04', 3),
(31, 'La información reproducida no está documentada apropiadamente o el material fue reproducido sin permiso de los sitios en la red que lo requerían.', 1, '2017-04-12', '2017-04-12', 3),
(32, 'El estudiante posee un entendimiento excepcional del material incluido en el blog y sabe dónde encontrar información adicional. Puede fácilmente contestar las preguntas sobre el contenido y los procedimientos usados para crear el blog.', 5, '2017-04-12', '2017-04-12', 4),
(33, 'El estudiante tiene un buen entendimiento del material incluido en el blog. Puede fácilmente contestar preguntas sobre el contenido y los procedimientos usados para crear el blog.', 4, '2017-04-12', '2017-04-12', 4),
(34, 'El estudiante tiene un entendimiento básico del material incluido en el blog. No puede fácilmente contestar la mayoría de las preguntas sobre el contenido y los procedimeintos usados para crear el blog.', 3, '2017-04-12', '2017-04-12', 4),
(35, 'El estudiante no parece haber aprendido mucho de este proyecto. No puede contestar la mayoría de las preguntas sobre el contenido y los procedimientos usados para crear el blog.', 1, '2017-04-12', '2017-04-12', 4),
(36, 'Toda la información provista por el estudiante en el blog es precisa y todos los requisitos de la asignación han sido cumplidos.', 5, '2017-04-12', '2017-04-12', 15),
(37, 'Casi toda la información provista por el estudiante en el blog es precisa y todos los requisitos de la asignación han sido cumplidos.', 4, '2017-04-12', '2017-04-12', 15),
(38, 'Casi toda la información provista por el estudiante en el blog es precisa y casi todos los requisitos han sido cumplidos.', 3, '2017-04-12', '2017-04-12', 15),
(39, 'Hay varias inexactitudes en el contenido provisto por el estudiante o muchos de los requisitos no están cumplidos.', 1, '2017-04-12', '2017-04-12', 15),
(40, 'Entrega resultados esperado. ', 5, '2017-05-17', '2017-05-17', 16),
(41, 'No entrega resultados. ', 0, '2017-05-17', '2017-05-17', 16),
(42, 'Utiliza variables. \r\n', 5, '2017-05-17', '2017-05-17', 17),
(43, 'No utiliza variables. \r\n', 0, '2017-05-17', '2017-05-17', 17);

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
  `score` float DEFAULT NULL,
  `grade` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `submissions`
--

INSERT INTO `submissions` (`id`, `submission`, `created`, `modified`, `user_id`, `activity_id`, `score`, `grade`) VALUES
(1, 'def main():\r\n    print "Convierte medidas inglesas a sistema metrico"\r\n    millas = input("Cuántas millas?: ")\r\n    pies = input("Y cuántos pies?: ")\r\n    pulgadas = input("Y cuántas pulgadas?: ")\r\n    metros = 1609.344 * millas + 0.3048 * pies + 0.0254 * pulgadas\r\n    print "La longitud es de ", metros, " metros"\r\nmain()', '2016-09-07 11:45:15', '2017-06-15 03:52:17', 10, 1, 0, 7),
(2, 'print("¿Cómo se llama?")\r\nnombre = input()\r\nprint("Me alegro de conocerle,", nombre)', '2017-05-17 23:11:19', '2017-06-15 05:34:52', 10, 4, 8.5, 5.875);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `lti_user_id`, `email`, `username`, `password`, `created`, `modified`) VALUES
(1, 'Carolina', 'Mesa', 0, 'carolitamesa@gmail.com', 'admin', '$2y$10$z9vz8lY7sQC6PS0RbJmq9eLFX/rjfVPsJAPopbEZNZlUtCw5badp6', NULL, '2016-09-06 22:42:33'),
(7, 'Cristian', 'Avalos', NULL, '', 'cavalos', '$2y$10$u6BzMAclRElUtnop1qGnhOUT0FolAOCKcM/3RmEc/ZufQf8k/z8iC', NULL, NULL),
(9, 'Ramón', 'Reyes', NULL, 'rr@lti.cl', 'rreyes', '$2y$10$otDwSDRsNL1/jFuTwft0TedoVZSajVpuMpQvL9CIw9xyhbieNL3fO', NULL, NULL),
(10, 'ANTONIA J.', 'ILABACA CARTAGENA', 9, '193289819@lti.cl', '9', '$2y$10$NtJNvIbz7GWwpwofTMDHl.3jcaDXrj7LBC2URITuJa0wnn7dDYcEe', NULL, NULL),
(11, 'MALU S.', 'JORQUERA ORELLANA', 10, '190373193@lti.cl', '10', '$2y$10$areuE5qlPUbiIyEdYxIsWu2dxTiCVIDhGRB5hFoqFUpDrYGNiGPjK', NULL, NULL),
(12, 'VCTOR A.', 'HERRERA MADRID', 8, '123@lti.cl', '8', '$2y$10$JGw9zjpKlxyJ6X1jB0AtKeoMQNjwsPEIqSmnCz4mHGBaqKe99rQK2', NULL, NULL),
(13, 'DIEGO I.', 'KNABE GAHONA', 11, '186192761@lti.cl', '11', '', NULL, NULL),
(19, 'ALBARO H.', 'URIBE ZUIGA', 25, '185522474@lti.cl', '25', '', NULL, NULL),
(20, '- Admin', '-', 2, 'admin@localhost.cm', '2', '', NULL, NULL),
(21, 'GLENDA C.', 'MALDONADO GMEZ', 12, '194704445@lti.cl', '12', '', NULL, NULL),
(22, 'TOMS A.', 'MANCILLA JAKASOVIC', 13, '185499723@lti.cl', '13', '', NULL, NULL),
(23, 'CAMILA F.', 'MELO PULGAR', 14, '189968841@lti.cl', '14', '', NULL, NULL),
(24, 'SALVADOR I.', 'MENDOZA PACHECO', 15, '194034032@lti.cl', '15', '', NULL, NULL),
(25, 'ROSA M.', 'MENESES ROJAS', 16, '180374655@lti.cl', '16', '', NULL, NULL),
(26, 'GABRIEL A.', 'MILLON CHVEZ', 17, '189179227@lti.cl', '17', '', NULL, NULL);

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
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificador` (`user_id`),
  ADD KEY `criterio` (`criteria_id`),
  ADD KEY `criteria_id` (`criteria_id`),
  ADD KEY `submission_id` (`submission_id`),
  ADD KEY `levelCriteria` (`level_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `activities_groups`
--
ALTER TABLE `activities_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `o_auth_consumers`
--
ALTER TABLE `o_auth_consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `rubric_criterias`
--
ALTER TABLE `rubric_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `rubric_levels`
--
ALTER TABLE `rubric_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
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
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `entrega` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`),
  ADD CONSTRAINT `level` FOREIGN KEY (`level_id`) REFERENCES `rubric_levels` (`id`);

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `grupos_actividad` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rubrics`
--
ALTER TABLE `rubrics`
  ADD CONSTRAINT `usariocreador` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `activitiy_submission` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION;
