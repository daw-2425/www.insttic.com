-- Active: 1729109094940@@127.0.0.1@3306@insttic

drop database insttic;


create database insttic;
use insttic;

-- ROL
create table rol(
    id_rol int PRIMARY KEY,
    rol VARCHAR(45) NOT NULL
);

-- EMPLEADO
create table empleado(
    id_empleado int PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre varchar(45) NOT NULL,
    apellido varchar(45) NOT NULL,
    telefono VARCHAR(45) NOT NULL,
    correo VARCHAR(45) NOT NULL UNIQUE,
    genero VARCHAR(45) NOT NULL,
    id_rol INT(45) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

-- PROFESOR
create table profesor(
id_profesor int PRIMARY KEY AUTO_INCREMENT,
id_empleado int NOT NULL,
FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

-- SALA
create table sala(
id_sala int PRIMARY KEY AUTO_INCREMENT,
numero int not null,
capacidad int not null,
planta VARCHAR(50) not NULL

);

-- ESPECIALIDAD
create table especialidad(
    id_especialidad int PRIMARY key AUTO_INCREMENT,
    denominacion VARCHAR(45) NOT null,
    descripcion text NOT null
   
);

-- GENERACION
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

-- ALUMNO
create table alumno(
    id_alumno int PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre VARCHAR(45)NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    codigo VARCHAR(45) NOT NULL,
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
    correo varchar(45) not null UNIQUE,
    passwd varchar(100) not null,
    id_alumno int default null, foreign key(id_alumno) references alumno(id_alumno),
    id_empleado int default null, foreign key(id_empleado) references empleado(id_empleado)
);

-- CATEGORIA
CREATE table categoria_noticia(
    id_categoria INT PRIMARY KEY, 
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

SELECT * FROM alumno;

INSERT INTO especialidad ( denominacion, descripcion) VALUES 
('TSDAW', 'Tecnico Superior en Desarrollo de Aplicaciones Web'),
('TSSTI', 'Tecnico Superior en Sistemas de Telecomucion e Informaticos '),
('TSASIR', 'Tecnico Superior en Administracion de Sistemas Informaticos en Red'),
('TMSMIR', 'Tecnico Medio en Sistemas Micro-Informaticos Y Redes');

INSERT INTO generacion ( )

<<<<<<< HEAD
INSERT INTO especialidad (denominacion, descripcion) VALUES 
('TSDAW', 'Desarrollo de Aplicaciones Web'),
('TSTELECO', ' telecomunicaciones'),
('ADMIN', 'administracion'),
('MICINFO', ' micro infrmatica');

INSERT INTO generacion (nombre, año_inicio, año_fin, id_especialidad, id_sala) VALUES
('Generación 2021-2023', 2025, 2029, 1, 1),
('Generación 2023-2024', 2024, 2028, 2, 2);

INSERT INTO alumno (foto, nombre, apellidos,, codigo, fecha_nacimiento, contacto_emergencia, genero, id_rol) VALUES
('alumno1.jpg', 'Carlos', 'Ramírez','123-BA' '2000-03-01', '555112233', 'Masculino', 3),
('alumno2.jpg', 'Ana', 'Martínez', '321-AB', '2001-07-12', '555998877', 'Femenino', 3);

INSERT INTO materia (id_materia,nombre, creditos, horas, id_profesor, id_especialidad) VALUES
('DAWES', 5, 40, 1, 1),
('BBDD', 4, 36, 2, 2);

INSERT INTO nota (id_alumno, id_materia, nota) VALUES
(1, 1, 9.5),
(2, 2, 8.0);

INSERT INTO amonestacion (motivo, descripcion, fecha, id_empleado, id_alumno) VALUES
('Falta de asistencia', 'El alumno no asistió a 3 clases consecutivas', '2025-03-01', 1, 1),
('Comportamiento', 'Se detectó comportamiento inapropiado en clase', '2025-03-03', 2, 2);

INSERT INTO permiso (motivo, fecha_entrada, fecha_salida, id_alumno, estado, archivo_adjuntado) VALUES
('Enfermedad', '2025-03-01', '2025-03-03', 1, 'Pendiente', 'enfermedad.pdf'),
('Baja temporal', '2025-03-04', '2025-03-10', 2, 'Aceptado', 'baja_temporal.pdf');

INSERT INTO usuario (nombre, passwd, id_alumno, id_empleado) VALUES
('juanperez', 'password123', 1, NULL),
('maria_lopez', 'securepassword', NULL, 1);

INSERT INTO categoria_noticia (tipo_categoria) VALUES 
('Noticias académicas'),
('Eventos institucionales');

INSERT INTO noticias (imagen, titulo, descripcion, fecha_suceso, id_categoria) VALUES
('noticia1.jpg', 'Convocatoria de becas', 'Se abre la convocatoria para becas en la especialidad de informática.', '2025-03-01', 1),
('noticia2.jpg', 'Feria de empleo', 'Feria de empleo y oportunidades de prácticas profesionales.', '2025-03-05', 2);
=======
>>>>>>> 68903fa4f7ca9fa5410e420a91eb923d2a6f92b0

SELECT * FROM rol
=======
INSERT int
>>>>>>> 20f97b0ede1c09ff8aca7afae05be94c077ba9c5
