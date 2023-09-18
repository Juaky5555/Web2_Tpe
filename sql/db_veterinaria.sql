-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2023 a las 18:20:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Perros', 'Mamífero doméstico de la familia de los cánidos, de tamaño, forma y pelaje muy diversos, según las razas, que tiene olfato muy fino y es inteligente y muy leal a su dueño. La inteligencia canina se refiere a la habilidad de un perro de procesar la información que recibe a través de sus sentidos para aprender, adaptarse y resolver problemas.\r\n'),
(2, 'Gatos', 'Posee un pelaje suave y lanoso con una apariencia brillante, mantenida con una constante limpieza con la lengua. Su cuerpo es flexible, ligero, musculoso y compacto. Las patas delanteras tienen cinco dígitos y las traseras cuatro. Las garras son retráctiles, largas, afiladas, muy curvadas y comprimidas lateralmente.'),
(3, 'Roedores', 'La mayoría de los roedores tienen patas cortas, son cuadrúpedos (se mueven a cuatro patas) y son relativamente pequeños. Su característica común principal son los dos incisivos, de gran tamaño y crecimiento continuo, situados en el maxilar inferior y superior, y que solo están cubiertos de esmalte en la parte frontal.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individuo`
--

CREATE TABLE `individuo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `raza` varchar(25) NOT NULL,
  `edad` int(11) NOT NULL,
  `color` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `fk_id_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `individuo`
--

INSERT INTO `individuo` (`id`, `nombre`, `raza`, `edad`, `color`, `descripcion`, `fk_id_especie`) VALUES
(2, 'Chicho', 'Bobtail', 8, 'Blanco y Gris', 'Los bobtails, tan alegres y extrovertidos, son un compañero muy popular para las familias. Suelen ser de naturaleza adorable, aunque pueden ponerse nerviosos cuando juegan, por lo que deberás tener cuidado cuando haya niños pequeños cerca. Se unirán a cualquier actividad con mucho entusiasmo.', 1),
(3, 'Flopi', 'Akita', 5, 'Marron', 'Flopi es dócil, activa e independiente. Su cualidad más admirable es la lealtad, se siente muy apegada a su dueño y es desconfiada con los extraños, actitud que le hace ser muy buena guardiana.', 1),
(4, 'Taiga', 'Bengali', 2, 'Marron y Negro', 'Taiga muestra seguridad y confianza en sí misma y, además, es cariñosa. Es muy juguetona por naturaleza y rebosa energía. Es lista y parece que mira todo lo que la rodea, incluido al perro de la familia.', 2),
(5, 'Tanque', 'Maine coon', 5, 'Gris', 'Tanque es muy amigable y sociable. En caso de ser el único gato de la casa, ve a requerir mucha atención humana. Además, es  muy charlatan, es decir, sus arrullos y maullidos te acompañarán durante todo el día. Es muy afable y tolerante con otros animales y con los niños.', 2),
(6, 'Pelusa', 'Cobaya peruana', 1, 'Crema', 'Pelusa se caracteriza por su personalidad cariñosa y dócil. Tiene un marcado instinto de exploración, ya que es muy curioso y atento.', 3),
(7, 'Chanchi', 'Cobaya skinny', 1, 'Marron', 'El comportamiento de Chanchi es dócil y noble en general, cuando se sienten muy a gusto y felices te lo hará saber, pero cuando no también, esto es debido a que tiene un sistema de comunicación bastante amplio, lo que nos permite saber su estado de ánimo.', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `individuo`
--
ALTER TABLE `individuo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_especie` (`fk_id_especie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `individuo`
--
ALTER TABLE `individuo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `individuo`
--
ALTER TABLE `individuo`
  ADD CONSTRAINT `fk_id_especie` FOREIGN KEY (`fk_id_especie`) REFERENCES `especie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
