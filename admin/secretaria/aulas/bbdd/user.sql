use insttic_prueba;

CREATE USER 'prueba'@'%' IDENTIFIED BY '0000';
GRANT ALL PRIVILEGES ON insttic_prueba.profesor TO 'prueba'@'%';
FLUSH PRIVILEGES;


REPAIR TABLE insttic_prueba.materia; b  