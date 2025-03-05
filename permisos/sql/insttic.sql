CREATE DATABASE insttic;

DROP DATABASE IF EXISTS insttic;

USE insttic;

CREATE TABLE rol (
    id_rol INT PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(45) NOT NULL
);

CREATE TABLE empleado (
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    contacto VARCHAR(45) NOT NULL,
    id_rol INT NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

CREATE TABLE profesor (
    id_profesor INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE especialidad (
    id_especialidad INT PRIMARY KEY AUTO_INCREMENT,
    denominacion VARCHAR(45) NOT NULL,
    descripcion TEXT NOT NULL,
    id_sala INT NOT NULL,
    FOREIGN KEY (id_sala) REFERENCES sala(id_sala)
);

CREATE TABLE alumno (
    id_alumno INT PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(45) NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    contacto_emergencia VARCHAR(45) NOT NULL,
    id_especialidad INT NOT NULL,
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)
);

-- Crear tabla materia
CREATE TABLE materia (
    id_materia INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    creditos INT NOT NULL,
    horas INT NOT NULL,
    id_profesor INT,
    id_especialidad INT,
    FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor),
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)
);

CREATE TABLE nota (
    id_nota INT PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT NOT NULL,
    id_materia INT NOT NULL,
    nota FLOAT NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_materia) REFERENCES materia(id_materia)
);

CREATE TABLE amonestacion (
    id_amonestacion INT PRIMARY KEY AUTO_INCREMENT,
    motivo VARCHAR(20) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha DATE NOT NULL,
    id_empleado INT NOT NULL,
    id_alumno INT NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

CREATE TABLE matricula (
    id_matricula INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_alumno INT NOT NULL,
    fecha_matricula DATE NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

CREATE TABLE sala (
    id_sala INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    capacidad INT NOT NULL,
    planta VARCHAR(50) NOT NULL
);

CREATE TABLE permiso (
    id_permiso INT PRIMARY KEY AUTO_INCREMENT,
    motivo TEXT NOT NULL,
    fecha_entrada DATE NOT NULL,
    fecha_salida DATE NOT NULL,
    id_alumno INT NOT NULL,
    estado ENUM('pendiente', 'aceptado', 'denegado', 'regresado') DEFAULT 'pendiente',
    archivo_adjuntado VARCHAR(50),
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

ALTER TABLE PERMISO ADD COLUMN foto VARCHAR(45) NOT NULL;

CREATE TABLE SALIDAS(
    ID_SALIDA INT PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT NOT NULL,
    FECHAYHORA_ENTRADA DATETIME NOT NULL,
    FECHAYHORA_SALIDA DATETIME   NOT NULL,
    NUMERO_CUARTO INT (3),
    DESTINO VARCHAR (200)NOT NULL,
    estado ENUM ("salido, regresado,cancelado"),
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

describe permiso;

INSERT INTO rol (rol) VALUES
('Administrador'), 
('Profesor'), 
('Alumno'), 
('Secretario');

INSERT INTO empleado (foto, nombre, apellido, contacto, id_rol) VALUES
('empleado1.jpg', 'Juan', 'Mba', '123456789', 1),
('empleado2.jpg', 'María', 'Nchama', '987654321', 2),
('empleado3.jpg', 'Carlos', 'Micha', '456789123', 3),
('empleado4.jpg', 'Laura', 'Oyana', '234567890', 4);


INSERT INTO profesor (id_empleado) VALUES
(2), (3), (4);


INSERT INTO sala (numero, capacidad, planta) VALUES
(201, 30, 'Segunda planta'),
(202, 25, 'Segunda planta'),
(203, 40, 'Segunda planta'),
(204, 50, 'Segunda planta'),
(205, 20, 'Segunda planta');



INSERT INTO especialidad (denominacion, descripcion, id_sala) VALUES
('TSSTI', 'Sistemas de telecomunicaciones e informaticos', 1),
('TSASIR', 'Administracion de sistema informaticos en red', 2),
('TMSMIR', 'Sistemas micro informaticos y redes', 3),
('TSDAW', 'Desarrollo de aplicaciones web', 4);


INSERT INTO alumno (foto, nombre, apellidos, fecha_nacimiento, contacto_emergencia, id_especialidad) VALUES
('alumno1.jpg', 'Manuel', 'Esono', '2005-06-15', '555-1234', 1),
('alumno2.jpg', 'Ana', 'Trini', '2006-03-22', '555-5678', 4),
('alumno3.jpg', 'Carlos', 'Yekue', '2004-12-03', '555-8910', 1),
('alumno4.jpg', 'Julia', 'Oyana', '2005-07-25', '555-1111', 2),
('alumno5.jpg', 'Nolasco', 'Micha', '2006-02-19', '555-2222', 4),
('alumno6.jpg', 'Arsenio', 'Perez', '2005-09-30', '555-3333', 4),
('alumno7.jpg', 'Teresa', 'Avomo', '2006-01-14', '555-4444', 3),
('alumno8.jpg', 'Guillero', 'Nsue', '2004-11-27', '555-5555', 3),
('alumno9.jpg', 'Santiago', 'Ivina', '2005-03-08', '555-6666', 2),
('alumno10.jpg', 'Felipe', 'Nsue', '2006-05-12', '555-7777', 2),
('alumno11.jpg', 'Raul', 'Zacarias', '2005-08-21', '555-8888', 3),
('alumno12.jpg', 'Yolanda', 'Nchama', '2004-10-16', '555-9999', 4),
('alumno13.jpg', 'David', 'Ona', '2005-04-05', '555-0000', 3),
('alumno14.jpg', 'Medianera', 'Asangono', '2006-06-29', '555-1212', 4);

INSERT INTO materia (nombre, creditos, horas, id_profesor, id_especialidad) VALUES
('Matemáticas I', 5, 40, 2, 1),
('Programación I', 6, 60, 3, 2),
('Circuitos I', 4, 40, 4, 3),
('Química I', 5, 45, 5, 4),
('Biología I', 4, 40, 6, 5),
('Física I', 6, 60, 7, 6),
('Historia I', 4, 40, 8, 7),
('Geografía I', 5, 45, 9, 8),
('Economía I', 4, 40, 10, 9),
('Psicología I', 5, 45, 11, 10),
('Filosofía I', 4, 40, 12, 11),
('Educación Física I', 3, 30, 13, 12),
('Arte I', 4, 40, 14, 13),
('Cálculo I', 5, 45, 1, 14);

INSERT INTO permiso (motivo, fecha_entrada, fecha_salida, id_alumno, estado, archivo_adjuntado, foto) VALUES
('Asunto familiar', '2025-01-20', '2025-01-22', 1, 'pendiente', 'permiso1.pdf', 'alumno1.jpg'),
('Cita médica', '2025-01-25', '2025-01-25', 2, 'pendiente', 'permiso2.pdf', 'alumno2.jpg'),
('Viaje de estudios', '2025-02-01', '2025-02-05', 3, 'aceptado', 'permiso3.pdf', 'alumno3.jpg'),
('Problemas personales', '2025-01-18', '2025-01-19', 4, 'denegado', 'permiso4.pdf', 'alumno4.jpg'),
('Evento deportivo', '2025-03-10', '2025-03-12', 5, 'regresado', 'permiso5.pdf', 'alumno5.jpg'),
('Competencia académica', '2025-04-01', '2025-04-03', 6, 'pendiente', 'permiso6.pdf', 'alumno6.jpg'),
('Consulta médica', '2025-02-15', '2025-02-15', 7, 'aceptado', 'permiso7.pdf', 'alumno7.jpg'),
('Día personal', '2025-03-01', '2025-03-01', 8, 'denegado', 'permiso8.pdf', 'alumno8.jpg'),
('Taller extracurricular', '2025-04-20', '2025-04-21', 9, 'pendiente', 'permiso9.pdf', 'alumno9.jpg'),
('Viaje familiar', '2025-05-10', '2025-05-15', 10, 'aceptado', 'permiso10.pdf', 'alumno10.jpg'),
('Evento cultural', '2025-06-05', '2025-06-06', 11, 'regresado', 'permiso11.pdf', 'alumno11.jpg'),
('Prácticas profesionales', '2025-07-01', '2025-07-15', 12, 'pendiente', 'permiso12.pdf', 'alumno12.jpg'),
('Examen médico', '2025-08-10', '2025-08-11', 13, 'aceptado', 'permiso13.pdf', 'alumno13.jpg'),
('Asistencia a congreso', '2025-09-01', '2025-09-03', 14, 'denegado', 'permiso14.pdf', 'alumno14.jpg');


