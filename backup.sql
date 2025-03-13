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
    correo VARCHAR(100) NOT NULL UNIQUE,
    codigo VARCHAR(45) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    contacto_emergencia VARCHAR(45) NOT NULL,
    genero VARCHAR(45) NOT NULL,
	id_rol INT(45) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol) 
);
select* from alumno;

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
	estado ENUM('Pendiente','Aprobado','Denegado','Regresado') default 'Pendiente',
	archivo_adjuntado VARCHAR(50),
	FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);
drop table permiso;

DESCRIBE permiso;
insert into permiso values (null,"buckang de salida",now(),now(),6,"pendiente","doc.php");

INSERT INTO permiso(motivo,fecha_entrada,fecha_salida,estado,archivo_adjuntado ,id_alumno) VALUES("reunion familiar",now(),now(),"aprobado","doc.pdf",1)

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
-- Insertar registros en la tabla rol
INSERT INTO rol (rol) VALUES ('Administrador'), ('Profesor'), ('Alumno'), ('Secretario');

-- Insertar registros en la tabla empleado
INSERT INTO empleado (foto, nombre, apellido, telefono, correo, genero, id_rol) VALUES
('foto1.jpg', 'Juan', 'Pérez', '123456789', 'juan.perez@example.com', 'Masculino', 1),
('foto2.jpg', 'Ana', 'García', '987654321', 'ana.garcia@example.com', 'Femenino', 2),
('foto3.jpg', 'Luis', 'Martínez', '456123789', 'luis.martinez@example.com', 'Masculino', 3),
('foto4.jpg', 'María', 'Rodríguez', '789456123', 'maria.rodriguez@example.com', 'Femenino', 4);

-- Insertar registros en la tabla profesor
INSERT INTO profesor (id_empleado) VALUES (1), (2), (3), (4);

-- Insertar registros en la tabla sala
INSERT INTO sala (numero, capacidad, planta) VALUES
(101, 30, 'Primera'),
(102, 25, 'Segunda'),
(103, 20, 'Tercera'),
(104, 35, 'Cuarta');

-- Insertar registros en la tabla especialidad
INSERT INTO especialidad (denominacion, descripcion) VALUES
('Matemáticas', 'Especialidad en Matemáticas'),
('Física', 'Especialidad en Física'),
('Química', 'Especialidad en Química'),
('Biología', 'Especialidad en Biología');

-- Insertar registros en la tabla generacion
INSERT INTO generacion (nombre, año_inicio, año_fin, id_especialidad, id_sala) VALUES
('Generación 2020', 2020, 2024, 1, 1),
('Generación 2021', 2021, 2025, 2, 2),
('Generación 2022', 2022, 2026, 3, 3),
('Generación 2023', 2023, 2027, 4, 4);

-- Insertar registros en la tabla alumno
INSERT INTO alumno (foto, nombre, apellidos, fecha_nacimiento, contacto_emergencia, genero, id_rol) VALUES
('foto1.jpg', 'Carlos', 'López', '2000-01-01', '123456789', 'Masculino', 3),
('foto2.jpg', 'Lucía', 'Hernández', '2001-02-02', '987654321', 'Femenino', 3),
('foto3.jpg', 'Miguel', 'González', '2002-03-03', '456123789', 'Masculino', 3),
('foto4.jpg', 'Sofía', 'Díaz', '2003-04-04', '789456123', 'Femenino', 3);

-- Insertar registros en la tabla matricula
INSERT INTO matricula (fecha_matricula, total_matricula, total_pagada, matricula_restante, id_empleado, id_alumno, id_especialidad, id_generacion) VALUES
('2025-01-01', 1000, 500, 500, 1, 1, 1, 1),
('2025-02-01', 1000, 600, 400, 2, 2, 2, 2),
('2025-03-01', 1000, 700, 300, 3, 3, 3, 3),
('2025-04-01', 1000, 800, 200, 4, 4, 4, 4);

-- Insertar registros en la tabla materia
INSERT INTO materia (nombre, creditos, horas, id_profesor, id_especialidad) VALUES
('Álgebra', 5, 60, 1, 1),
('Física Cuántica', 4, 50, 2, 2),
('Química Orgánica', 3, 40, 3, 3),
('Biología Molecular', 6, 70, 4, 4);

-- Insertar registros en la tabla nota
INSERT INTO nota (id_alumno, id_materia, nota) VALUES
(1, 1, 8.5),
(2, 2, 9.0),
(3, 3, 7.5),
(4, 4, 8.0);

-- Insertar registros en la tabla amonestacion
INSERT INTO amonestacion (motivo, descripcion, fecha, id_empleado, id_alumno) VALUES
('Retraso', 'Llegó tarde a clase', '2025-01-01', 1, 1),
('Indisciplina', 'No siguió las normas', '2025-02-01', 2, 2),
('Falta de respeto', 'Faltó al respeto a un profesor', '2025-03-01', 3, 3),
('Ausencia', 'No asistió a clase', '2025-04-01', 4, 4);

-- Insertar registros en la tabla permiso
INSERT INTO permiso (motivo, fecha_entrada, fecha_salida, id_alumno, estado, archivo_adjuntado) VALUES
('Reunión familiar', '2025-01-01', '2025-01-02', 6, 'Aprobado', 'doc1.pdf'),
('Cita médica', '2025-02-01', '2025-02-02', 7, 'Pendiente', 'doc2.pdf'),
('Evento deportivo', '2025-03-01', '2025-03-02', 8, 'Regresado', 'doc3.pdf'),
('Vacaciones', '2025-04-01', '2025-04-02', 9, 'Aprobado', 'doc4.pdf');

insert into permiso values (null,'Vacaciones', '2025-04-01', '2025-03-15', 8, 'pendiente', 'doc4.pdf');

-- Insertar registros en la tabla salidas
INSERT INTO salidas (id_alumno, NUMERO_CUARTO, FECHAYHORA_ENTRADA, FECHAYHORA_SALIDAD, DESTINO, ESTADO) VALUES
(5, 101, '2025-01-01 08:00:00', '2025-01-01 13:00:00', 'Casa', 'SALIDO'),
(6, 102, '2025-02-01 08:00:00', '2025-02-01 18:00:00', 'Hospital', 'REGRESADO'),
(7, 103, '2025-03-01 08:00:00', '2025-03-01 18:00:00', 'Parque', 'CANCELADO'),
(8, 104, '2025-04-01 08:00:00', '2025-04-01 18:00:00', 'Centro Comercial', 'SALIDO');

-- Insertar registros en la tabla usuario
INSERT INTO usuario (nombre, passwd, id_alumno, id_empleado) VALUES
('admin', 'admin123', NULL, 1),
('profesor1', 'profesor123', NULL, 2),
('alumno1', 'alumno123', 1, NULL),
('secretario', 'secretario123', NULL, 4);

-- Insertar registros en la tabla categoria_noticia
INSERT INTO categoria_noticia (tipo_categoria) VALUES
('Deportes'),
('Cultura'),
('Tecnología'),
('Ciencia');

-- Insertar registros en la tabla noticias
INSERT INTO noticias (imagen, titulo, descripcion, fecha_suceso, id_categoria) VALUES
('imagen1.jpg', 'Noticia 1', 'Descripción de la noticia 1', '2025-01-01', 1),
('imagen2.jpg', 'Noticia 2', 'Descripción de la noticia 2', '2025-02-01', 2),
('imagen3.jpg', 'Noticia 3', 'Descripción de la noticia 3', '2025-03-01', 3),
('imagen4.jpg', 'Noticia 4', 'Descripción de la noticia 4', '2025-04-01', 4);

-- Insertar registros en la tabla detalle
INSERT INTO detalle (imagen, descripcion, tipo_categoria, id_noticia) VALUES
('detalle1.jpg', 'Detalle de la noticia 1', 'Deportes', 1),
('detalle2.jpg', 'Detalle de la noticia 2', 'Cultura', 2),
('detalle3.jpg', 'Detalle de la noticia 3', 'Tecnología', 3),
('detalle4.jpg', 'Detalle de la noticia 4', 'Ciencia', 4);

-- Insertar registros en la tabla alumno
INSERT INTO alumno (foto, nombre, apellidos, fecha_nacimiento, contacto_emergencia, genero, id_rol) VALUES
('foto1.jpg', 'Carlos', 'López', '2000-01-01', '123456789', 'Masculino', 3),
('foto2.jpg', 'Lucía', 'Hernández', '2001-02-02', '987654321', 'Femenino', 3),
('foto3.jpg', 'Miguel', 'González', '2002-03-03', '456123789', 'Masculino', 3),
('foto4.jpg', 'Sofía', 'Díaz', '2003-04-04', '789456123', 'Femenino', 3);

select * from alumno;