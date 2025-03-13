Active: 1732721354416@@127.0.0.1@3306
drop database insttic;


create database insttic;
use insttic;

-- ROL primera ejecucion
create table rol(
    id_rol int PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(45) NOT NULL
);

-- EMPLEADO segunda ejecucion

create table empleado(
    id_empleado int PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre varchar(45) NOT NULL,
    apellido varchar(45) NOT NULL,
    telefono VARCHAR(45) NOT NULL,
    correo VARCHAR(45) NOT NULL,
    genero VARCHAR(45) NOT NULL,
    id_rol INT(45) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

-- PROFESOR tercera ejecucion
create table profesor(
id_profesor int PRIMARY KEY AUTO_INCREMENT,
id_empleado int NOT NULL,
FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

-- SALA cuarta ejecucion
create table sala(
id_sala int PRIMARY KEY AUTO_INCREMENT,
numero int not null,
capacidad int not null,
planta VARCHAR(50) not NULL

);

-- ESPECIALIDAD quintq ejecucion
create table especialidad(
    id_especialidad int PRIMARY key AUTO_INCREMENT,
    denominacion VARCHAR(45) NOT null,
    descripcion text NOT null
   
);

-- GENERACION sexta ejecucion
CREATE TABLE generacion (
    id_generacion INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL,     
    año_inicio year NOT NULL,         
    año_fin year NOT NULL,
    id_especialidad int not null,
	id_sala int not null,
	FOREIGN KEY (id_sala) REFERENCES sala(id_sala),
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)
);


-- ALUMNO 7 ejecucion
create table alumno(
    id_alumno int PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre VARCHAR(45)NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    contacto_emergencia VARCHAR(45) NOT NULL,
    genero VARCHAR(45) NOT NULL,
	id_rol INT(45) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
   
);



-- MATRICULA
create table matricula(
    id_matricula int PRIMARY KEY AUTO_INCREMENT ,
	fecha_matricula date not null,
	total_matricula int not null,
    total_pagada float not null,
    matricula_restante float not null,
    id_empleado int not null,
    id_alumno int not null,
    id_especialidad INT not NULL,
    id_generacion INT not NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_alumno)   REFERENCES alumno(id_alumno),
	FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad),
    FOREIGN KEY (id_generacion) REFERENCES generacion(id_generacion)
    
);

-- MATERIA

create table materia(
    id_materia int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    creditos INT NOT NULL,
    horas int NOT NULL,
    id_profesor int,
    id_especialidad int,
    FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor),
	FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)

);

-- NOTA

create table nota(
    id_nota int PRIMARY KEY AUTO_INCREMENT,
    id_alumno int NOT null,
    id_materia int not null,
    nota FLOAT NOT null,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_materia) REFERENCES materia(id_materia)
);


-- AMONESTACION
create table amonestacion(
    id_amonestacion int PRIMARY key AUTO_INCREMENT,
     motivo varchar(20) not null,
     descripcion text not null,
     fecha DATE NOT NULL,
     id_empleado int NOT null,
     id_alumno int not null,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

-- PERMISO
create table permiso(
	id_permiso int PRIMARY KEY AUTO_INCREMENT,
	motivo TEXT not null,
	fecha_entrada DATE not null,
	fecha_salida DATE not null,
	id_alumno int not null,
	estado ENUM('Pendiente','Espera','Aceptado','REGRESado') not null,
	archivo_adjuntado VARCHAR(50),
	FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

-- SALIDAS

CREATE Table salidas(
    id_salida INT PRIMARY KEY AUTO_INCREMENT ,
  id_alumno int not null,
  NUMERO_CUARTO INT(3),
  FECHAYHORA_ENTRADA DATETIME,
  FECHAYHORA_SALIDAD DATETIME,
  DESTINO VARCHAR(200),
  ESTADO ENUM('SALIDO','REGRESADO','CANCELADO'),
  FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);


-- USUARIO

create table usuario(
	cod_usuario int primary key auto_increment,
    nombre varchar(45) not null,
    passwd varchar(100) not null,
    id_alumno int default null, foreign key(id_alumno) references alumno(id_alumno),
    id_empleado int default null, foreign key(id_empleado) references empleado(id_empleado)
);

-- CATEGORIA
CREATE table categoria_noticia(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT, 
    tipo_categoria VARCHAR(200) NOT NULL
);

-- NOTICIAS
create table noticias(
    id_noticia INT PRIMARY KEY AUTO_INCREMENT, 
    imagen VARCHAR(100) NOT NULL,
    titulo VARCHAR(300) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_suceso DATE,
    id_categoria INT DEFAULT NULL, FOREIGN KEY(id_categoria) REFERENCES categoria_noticia(id_categoria)
);

CREATE table detalle(
    id_detalle INT PRIMARY KEY AUTO_INCREMENT, 
    imagen VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    tipo_categoria VARCHAR(200) NOT NULL,
    id_noticia INT DEFAULT NULL, FOREIGN KEY(id_noticia) REFERENCES categoria_noticia(id_categoria)
);


-- INSERSION DE DATOS EN LA BASE DE DATOS
use insttic;
insert into rol(rol) VALUES
("profesor"),
("jefe de disciplina"),
("Jefe financiero"),
("director"),
("seguridad");


insert into empleado(foto,nombre,apellido,telefono,correo,genero,id_rol) VALUES
("foto1.png","Fermin","Copoboru","222-234-654","fermin@gmail.com","Masculino",1),
("foto2.png","Crisologo","Ndong","222-234-876","criso@gmail.com","masculino",2),
("foto3.png","Eleuterio","Sañaba","555-234-543","eleuterio@gmail.com","Masculino",3),
("foto4.png","Sergio","Mbomio","222-098-678","sersio@gmail.com","masculino",4),
("fot05.png","Pedro","Mba","222-567-567","mba@gmail.com","masculino",5);


insert into profesor(id_empleado) VALUES
(1),(2),(3),(4),(5);

insert into sala(numero,capacidad,planta) VALUES
(202,23,"segunda planta"),
(203,36,"segunda planta"),
(204,28,"segunta planta"),
(205,19,"segunda planta");

insert into especialidad(denominacion,descripcion) VALUES
("TSDAWEB","desarrolllo de aplicaciones"),
("TSSTI", "sistema de telecomunicaciones"),
("TSASIR","administracion de sistemas"),
("TMSMIR"," sistemas micro-informaticos");


INSERT INTO generacion (nombre,año_inicio,año_fin,id_especialidad,id_sala) VALUES
("Primera generacion", 2020, 2022,1,1),
(" Segunda generacio", 2021, 2023,2,2),
("Tercera generacion", 2022, 2024,3,3),
("Cuarta generacion", 2023, 2025,4,4);

insert into alumno(foto,nombre,apellidos,fecha_nacimiento,contacto_emergencia,genero,id_rol)
VALUES
("foto1.png","Medianera ","Asangono","2001/05/02","222-234-098","femenino",1),
("foto2.png","Pascual","Nguema","2003/12/07","222-345-567","masculino",1),
("foto3.png","Jose Antonio","Ndong","23/05/1998","555-123-543","masculino",2),
("foto4.png","Maria Cristina","Sene","11/02/2002","222-098-678","femenino",2),
("foto5.png","Pedro","Mba","22/12/2001","222-567-567","masculino",3),
("foto6.png","Maria Dolores ","Mangue","22/12/2000","222-567-568","femmenino",3),
("foto7.png","Marcelo","Enzema","22/12/1998","222-967-567","masculino",4),
("foto8.png","Acasio ","Mañe","22/12/1998","222-567-067","masculino",4);


insert into matricula(fecha_matricula,total_matricula,total_pagada,matricula_restante,
id_alumno,id_empleado,id_especialidad,id_generacion) VALUES
("2024/12/12",150000,100000,50000,1,1,1,1),
("2025/03/09",200000,200000,0,2,2,2,2),
("2024/10/20",150000,130000,20000,3,3,3,3),
("2024/11/11",100000,90000,10000,4,4,4,4);

insert into materia(nombre,creditos,horas,id_profesor,id_especialidad) VALUES
-- notas de DAW
("SR",7,210,1,2),
("ASGBD",6,180,2,1),
("SI",3,90,3,3),  
("DWES",7,210,1,1),
("LMS",7,210,1,1),
("SGB",5,100,3,3),
("DWEC",6,170,3,3),
("BBDD",4,98,4,4),
("FOL",4,90,4,4),
("CTH",3,60,4,4),
("ED",7,210,1,1),
("PROGRAMACION",7,210,1,1),
("ING1",5,100,2,2),
("ING2",6,170,2,2);

insert into nota(id_alumno,id_materia,nota) VALUES
(2,2,7.5),
(2,3,6.5),
(2,4,8.5),
(2,5,9.5),
(3,6,7.5),
(3,7,6.5),
(3,8,8.5),
(3,9,9.5),
(4,6,7),
(4,7,5),
(4,8,8.6),
(4,9,4);


insert into amonestacion(motivo,descripcion,fecha,id_empleado,id_alumno)
VALUES
("Falta injustificada","no llego a clases","22/02/2024",1,1),
("falta leve","No limpio su cuarto","02/11/2024",2,2),
("falta grave","Pelea con un companero","23/11/2024",3,3),
("falta leve","Entro con retraso","12/12/2025",4,4);

insert into permiso(motivo,fecha_entrada,fecha_salida,id_alumno,estado,archivo_adjuntado)
VALUES
("visita a un familiar", "12/12/2024","10/12/2024",1,"Pendiente","visitas"),
("revision medica","02/11/2025","30/10/2025",2,"Aceptado","revision"),
("boda de un familiar","22/12/2024","20/12/2024",3,"Aceptado","boda"),
("asistir a una fiesta","24/01/2025","22/01/2025",4,"Espera","fiesta");

use insttic;
select * from alumno;

-- CONSULTAS

SELECT ALUMNO.NOMBRE,NOTA.NOTA
FROM ALUMNO ALUMNO, NOTA NOTA, MATERIA MATERIA
WHERE ALUMNO.ID_ALUMNO = NOTA.ID_NOTA;



---- consulta para mostrar los datos de la tabla

SELECT a.nombre, a.apellidos, n.nota   
FROM nota n inner join alumno a on 
n.id_alumno = a.id_alumno inner join materia m on 
n.id_materia = m.id_materia inner join especialidad e on
 m.id_especialidad = e.id_especialidad 
 where e.denominacion = 'TSDAWEB';