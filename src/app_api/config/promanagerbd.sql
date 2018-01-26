CREATE TABLE usuarios (
	id int NOT NULL AUTO_INCREMENT,
  	nombre varchar(70) ,
  	email varchar(70) UNIQUE,
  	clave varchar(30) NOT NULL,
  	tipo ENUM('administrador','usuario')
); 