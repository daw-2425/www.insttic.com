drop database insttic;


create database insttic;
use insttic;

-- ROL
create table rol(
    id_rol int PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(45) NOT NULL
);

-- EMPLEADO
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