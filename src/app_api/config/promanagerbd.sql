CREATE TABLE usuario (
  nom_usuario varchar(70) Primary key,
  clave varchar(30) NOT NULL,
  tipo ENUM('x-small', 'small', 'medium', 'large', 'x-large')
); 