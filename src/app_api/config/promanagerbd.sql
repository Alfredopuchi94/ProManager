
CREATE TABLE usuario (
  user varchar(75) Primary key,
  email varchar(75) UNIQUE,
  pass varchar(32) NOT NULL,
  rango varchar(75) NOT NULL
);
	-- id int NOT NULL AUTO_INCREMENT,
 --  	nombre varchar(70) ,
 --  	email varchar(70) UNIQUE,
 --  	clave varchar(30) NOT NULL,
 --  	tipo ENUM('administrador','usuario')
 