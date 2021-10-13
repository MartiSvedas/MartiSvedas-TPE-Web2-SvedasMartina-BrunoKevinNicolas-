-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-10-2021 a las 17:14:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Books`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Autores`
--

CREATE TABLE `Autores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(123) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `genero` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Autores`
--

INSERT INTO `Autores` (`id`, `nombre`, `descripcion`, `genero`) VALUES
(1, 'Stephen King', 'Richard Bachman, mejor conocido como Stephen King, es un escritor estadounidense de 74 años conocido por ser autor de novelas de terror muy populares, muchas de las cuales han llegado al cine con notable éxito.', 'Terror'),
(2, 'Edgar Allan Poe', 'Edgar Allan Poe fue un escritor, editor y crítico literario norteamericano. Poe es mejor conocido por su poesía y cuentos, en particular sus cuentos de misterio y lo macabro. Él es ampliamente considerado como una figura central del romanticismo en los Estados Unidos y la literatura estadounidense en su conjunto.', 'Terror/Gotica'),
(6, 'Brandon Sanderson', 'Escritor americano, Brandon Sanderson es conocido por sus novelas dedicadas a la literatura fantástica, género en el que ha logrado convertirse en uno de los autores de mayor éxito en las primeras décadas del siglo XXI.', 'Fantasía y Ciencia ficción.'),
(7, 'Eleanor Marie Robertson', 'Eleanor Marie Robertson es una escritora estadounidense de libros superventas, dentro del género de novela romántica y de suspense con el nombre Nora Roberts y de literatura fantástica con el nombre J. D. Robb. Fue la primera escritora incluida en el Paseo de la Fama de Escritores Románticos de Estados Unidos', 'Novela romántica y de Suspenso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Libros`
--

CREATE TABLE `Libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `sinopsis` varchar(2000) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Libros`
--

INSERT INTO `Libros` (`id`, `nombre`, `sinopsis`, `id_autor`) VALUES
(4, 'El gato negro', 'Un joven matrimonio lleva una vida hogareña, apacible con su gato llamado Pluto, hasta que el joven empieza a dejarse arrastrar por la bebida. El alcohol lo vuelve irascible y en uno de sus accesos de furia acaba con la vida del animal después de arrancarle un ojo.', 2),
(5, 'El resplandor', 'Jack Torrance se convierte en cuidador de invierno en el Hotel Overlook, en Colorado, con la esperanza de vencer su bloqueo con la escritura. Se instala allí junto con su esposa, Wendy, y su hijo, Danny, que está plagado de premoniciones psíquicas. Mientras la escritura de Jack no fluye y las visiones de Danny se vuelven más preocupantes, Jack descubre oscuros secretos del hotel y comienza a convertirse en un maníaco homicida, empeñado en aterrorizar a su familia.', 1),
(11, 'IT', 'Varios niños de una pequeña ciudad del estado de Maine se alían para combatir a una entidad diabólica que adopta la forma de un payaso y desde hace mucho tiempo emerge cada 27 años para saciarse de sangre infantil.', 1),
(13, 'El cuervo', 'El texto narra la misteriosa visita de un cuervo parlante a la casa de un amante afligido, y del lento descenso hacia la locura de este último. El amante, que a menudo se ha identificado como un estudiante,​​ llora la pérdida de su amada, Leonora.', 2),
(15, 'Carrie', 'Carrie White, una tímida adolescente críada por una fanática religosa es humillada constantemente por su compañeros de instituto. Sin embargo, Carrie no es una chica cualquiera, la joven posee poderes psíquicos que se manifiestan cuando se siente dominada por la ira. El día del baile de graduación la situación llega a hacérsele insoportable.', 1),
(17, 'El imperio final', ' Durante mil años han caído las cenizas y nada florece. Durante mil años los skaa han sido esclavizados y viven sumidos en un miedo inevitable. Durante mil años el Lord Legislador reina con un poder absoluto gracias al terror, a sus poderes e inmortalidad.', 6),
(18, 'Sangre y Hueso', 'Hace trece años, una catastrófica pandemia acabó con millones de vidas. Los supervivientes vagan por un mundo devastado, peligroso. Algunos han descubierto que tienen habilidades especiales y esto les ha convertido en presas del resto. Solo ella puede salvarlos.', 7),
(19, 'The Stand', 'En un mundo postapocalíptico, un virus letal ha sido diseñado como un arma biológica por el gobierno y, accidentalmente, es esparcido primero por América y, después, por todo el mundo, causando el fallecimiento de más del 99% de la población.', 1),
(20, 'Juramentada', ' En Juramentada, el tercer volumen del best-seller en The New York Times El archivo de las tormentas, la humanidad se enfrenta a una nueva Desolación con el regreso de los Portadores del Vacío, un enemigo cuya sed de venganza es tan grande como su número.', 6),
(21, 'Los crímenes de la calle morgue', 'Dos mujeres, una madre y una hija, son encontradas brutalmente asesinadas en su apartamento de París. Cuando la policía empieza a investigar no encuentra ninguna pista y las declaraciones de los vecinos son totalmente contradictorias.', 1),
(22, 'La obsesion', 'La infancia de Naomi Bowes terminó bruscamente la noche en que siguió a su padre hasta el bosque que bordeaba la casa familiar y descubrió el oscuro secreto que ocultaba. Mantenía cautiva a una joven. No era la primera a la que había privado de su libertad ni la primera a la que pensaba matar.', 7),
(23, 'La esperanza perfecta', 'El recién acabado Hotel Boonsboro recibe cada vez más huéspedes. Parte de su éxito se debe a su gerente, Esperanza, cuya experiencia y encanto natural hacen que los visitantes sueñen con regresar. Hace ya un año que Esperanza llegó de Georgetown y poco a poco ha ido adaptándose a la vida tranquila del hotel.', 7),
(31, 'ffffff', 'eeeeee', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `usuario`, `password`) VALUES
(7, 'hola', '$2y$10$u2URLjQdTqJYoSsMCxyMVO/69kmmtG7fBDa0l.pxPypOUQoisWhyi'),
(9, 'adios', '$2y$10$KlJE27imC4kAs/uAERLtSOgv32UXXJVcLt.8NrlYLZgEUrKXN/MAW'),
(13, 'admin', '$2y$10$8dws1geXF8e0WE2no9qxie8/tP1KYaYJQLMsTcydRQUw1xwIcJW5i'),
(18, '1234', '$2y$10$btrgk9NY4iI5S9coPnELTORYh/DTXroern9U6PzsztLcCq/667euq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Autores`
--
ALTER TABLE `Autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Libros`
--
ALTER TABLE `Libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Autores`
--
ALTER TABLE `Autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Libros`
--
ALTER TABLE `Libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Libros`
--
ALTER TABLE `Libros`
  ADD CONSTRAINT `Libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `Autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
