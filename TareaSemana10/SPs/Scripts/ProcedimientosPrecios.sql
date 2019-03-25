DELIMITER $$
CREATE PROCEDURE SubirPrecio10
( 
IN v_Editorial varchar(20)
) 
BEGIN 

if (Select count(precio) from books where editorial = v_Editorial > 0) THEN
	Update books SET precio = ((precio * 0.10) + precio) where editorial = v_Editorial;
end if;

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SubirPrecio
( 
IN v_Editorial varchar(20),
IN v_Aumento int
) 
BEGIN 

if (Select count(precio) from books where editorial = v_Editorial > 0) THEN
	Update books SET precio = ((precio * v_Aumento) + precio) where editorial = v_Editorial;
end if;

END $$
DELIMITER ;