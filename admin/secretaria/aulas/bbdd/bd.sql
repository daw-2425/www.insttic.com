-- Active: 1731579376337@@127.0.0.1@3306@insttic_prueba
create database insttic;
use insttic;

create table empleado(
    id_empleado int PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre varchar(45) NOT NULL,
    apellido varchar(45) NOT NULL,
    contacto VARCHAR(45) NOT NULL,
    id_rol INT(45) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

create table profesor(
id_profesor  int PRIMARY KEY AUTO_INCREMENT,
id_empleado int NOT NULL,
FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

create table rol(
    id_rol int PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(45) NOT NULL
);

create table alumno(
    id_alumno int PRIMARY KEY AUTO_INCREMENT,
    foto2 VARCHAR(45) NOT NULL,
    nombre VARCHAR(45)NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    contacto_emergencia VARCHAR(45) NOT NULL,
    id_especialidad INT not NULL,
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)
);

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

create table nota(
    id_nota int PRIMARY KEY AUTO_INCREMENT,
    id_alumno int NOT null,
    id_materia int not null,
    nota FLOAT NOT null,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_materia) REFERENCES materia(id_materia)
);

create table especialidad(
    id_especialidad int PRIMARY key AUTO_INCREMENT,
    denominacion VARCHAR(45) NOT null,
    descripcion text NOT null,
    id_sala int not null,
FOREIGN KEY (id_sala) REFERENCES sala(id_sala)
    
   
);  



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

create table matricula(
    id_matricula int PRIMARY KEY AUTO_INCREMENT ,
    id_empleado int not null,
    id_alumno int not null,
    fecha_matricula date not null,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_alumno)   REFERENCES alumno(id_alumno)
    
);

create table sala(
id_sala int PRIMARY KEY AUTO_INCREMENT,
numero int not null,
capacidad int not null,
planta VARCHAR(50) not NULL

);

create table permiso(
id_permiso int PRIMARY KEY AUTO_INCREMENT,
motivo TEXT not null,
fecha_entrada DATE not null,
fecha_salida DATE not null,
id_alumno int not null,
estado ENUM('Pendiente','Espera','Aceptado') not null,
archivo_adjuntado VARCHAR(50),
FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

use insttic;
CREATE USER 'prueba2'@'%' IDENTIFIED BY '0000';
GRANT ALL PRIVILEGES ON insttic_prueba.materia TO 'prueba2'@'%';
flush PRIVILEGES;

select user();

