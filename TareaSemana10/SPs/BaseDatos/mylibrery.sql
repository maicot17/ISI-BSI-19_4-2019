-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2018 a las 00:37:28
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mylibrery`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarLibroID` (IN `v_ID` INTEGER)  BEGIN 

Select * FROM books where ID = v_ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaLibro` (IN `v_ID` INTEGER)  BEGIN 

DELETE FROM books WHERE ID = v_ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarLibro` (IN `v_Titulo` VARCHAR(40), IN `v_Autor` VARCHAR(30), IN `v_Editorial` VARCHAR(20), IN `v_Precio` DECIMAL)  BEGIN 

INSERT INTO books (titulo, autor, editorial, precio) 
VALUES (v_Titulo,v_Autor, v_Editorial, ROUND(v_Precio,2)); 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SubirPrecio` (IN `v_Editorial` VARCHAR(20), IN `v_Aumento` DECIMAL)  BEGIN 

if (Select count(precio) from books where editorial = v_Editorial > 0) THEN
	Update books SET precio = ROUND(((precio * 0.05) + precio), 2) where editorial = v_Editorial;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SubirPrecio10` (IN `v_Editorial` VARCHAR(20))  BEGIN 

if (Select count(precio) from books where editorial = v_Editorial > 0) THEN
	Update books SET precio = ((precio * 0.10) + precio) where editorial = v_Editorial;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateLibro` (IN `v_ID` INT, IN `v_Titulo` VARCHAR(40), IN `v_Autor` VARCHAR(30), IN `v_Editorial` VARCHAR(20), IN `v_Precio` DECIMAL)  BEGIN 

IF(SELECT Count(*) FROM books WHERE ID = v_ID >= 1) THEN
	UPDATE books SET titulo=v_Titulo, editorial=v_Editorial, autor=v_Autor, precio=ROUND(v_Precio,2) WHERE ID = v_ID;
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `autor` varchar(30) DEFAULT NULL,
  `editorial` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`ID`, `titulo`, `autor`, `editorial`, `precio`) VALUES
(0000000001, 'El Codigo Da Vinci', 'Dan Brown', 'Oceano', '12000.00'),
(0000000002, 'Inferno', 'Dan Brown', 'Oceano', '11025.00'),
(0000000004, 'Angeles y Demonios', 'Dan Brown', 'Oceano', '12000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
