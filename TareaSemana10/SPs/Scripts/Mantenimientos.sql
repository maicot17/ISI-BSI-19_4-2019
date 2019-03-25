DELIMITER $$
CREATE PROCEDURE InsertarLibro
( 
IN v_Titulo varchar(40), 
IN v_Autor varchar(30), 
IN v_Editorial varchar(20), 
IN v_Precio int
) 
BEGIN 

INSERT INTO books (titulo, autor, editorial, precio) 
VALUES (v_Titulo,v_Autor,v_Descripcion, v_Editorial, v_Precio); 

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE UpdateLibro
( 
IN v_ID int,
IN v_Titulo varchar(40), 
IN v_Autor varchar(30), 
IN v_Editorial varchar(20), 
IN v_Precio int
) 
BEGIN 

IF(SELECT Count(*) FROM books WHERE ID = v_ID >= 1) THEN
	UPDATE books SET titulo=v_Titulo, editorial=v_Editorial, autor=v_Autor, precio=v_Precio WHERE ID = v_ID;
END IF;

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE BuscarLibroID
( 
IN v_ID integer
) 
BEGIN 

Select * FROM books where ID = v_ID;

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE EliminaLibro
( 
IN v_ID integer
) 
BEGIN 

DELETE FROM books WHERE ID = v_ID;

END $$
DELIMITER ;