-- Active: 1738527463871@@127.0.0.1@3306@insttic
create database insttic2;

use insttic2;

create table
    rol (
        id_rol int PRIMARY KEY AUTO_INCREMENT,
        rol VARCHAR(45) NOT NULL
    );

create table
    empleado (
        id_empleado int PRIMARY KEY AUTO_INCREMENT,
        foto VARCHAR(45) NOT NULL,
        nombre varchar(45) NOT NULL,
        apellido varchar(45) NOT NULL,
        telefono VARCHAR(45) NOT NULL,
        correo VARCHAR(100) not null,
        id_rol INT (45) NOT NULL,
        FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
    );



create table
    profesor (
        id_profesor int PRIMARY KEY AUTO_INCREMENT,
        id_empleado int NOT NULL,
        FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado)
    );

create table
    sala (
        id_sala int PRIMARY KEY AUTO_INCREMENT,
        numero int not null,
        capacidad int not null,
        planta VARCHAR(50) not NULL
    );

CREATE TABLE
    generacion (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        año_inicio INT NOT NULL,
        año_fin INT NOT NULL,
        descripcion TEXT
    );

create table
    especialidad (
        id_especialidad int PRIMARY key AUTO_INCREMENT,
        denominacion VARCHAR(45) NOT null,
        descripcion text NOT null,
        id_sala int not null,
        FOREIGN KEY (id_sala) REFERENCES sala (id_sala)
    );

create table
    materia (
        id_materia int PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(45) NOT NULL,
        creditos INT NOT NULL,
        horas int NOT NULL,
        id_profesor int,
        id_especialidad int,
        FOREIGN KEY (id_profesor) REFERENCES profesor (id_profesor),
        FOREIGN KEY (id_especialidad) REFERENCES especialidad (id_especialidad)
    );

create table
    alumno (
        id_alumno int PRIMARY KEY AUTO_INCREMENT,
        foto VARCHAR(45) NOT NULL,
        nombre VARCHAR(45) NOT NULL,
        apellidos VARCHAR(45) NOT NULL,
        telefono VARCHAR(45),
        correo VARCHAR(100),
        fecha_nacimiento DATE NOT NULL,
        contacto_emergencia VARCHAR(45) NOT NULL,
        id_especialidad INT not NULL,
        id_rol INT not NULL,
        FOREIGN KEY (id_especialidad) REFERENCES especialidad (id_especialidad),
        FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
    );

ALTER TABLE alumno
ADD COLUMN id_generacion INT NOT NULL;

ALTER TABLE alumno ADD FOREIGN KEY (id_generacion) REFERENCES generacion (id);

create table
    nota (
        id_nota int PRIMARY KEY AUTO_INCREMENT,
        id_alumno int NOT null,
        id_materia int not null,
        nota FLOAT NOT null,
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno),
        FOREIGN KEY (id_materia) REFERENCES materia (id_materia)
    );

create table
    amonestacion (
        id_amonestacion int PRIMARY key AUTO_INCREMENT,
        motivo varchar(20) not null,
        descripcion text not null,
        fecha DATE NOT NULL,
        id_empleado int NOT null,
        id_alumno int not null,
        FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado),
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno)
    );

create table
    matricula (
        id_matricula int PRIMARY KEY AUTO_INCREMENT,
        id_empleado int not null,
        id_alumno int not null,
        fecha_matricula date not null,
        FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado),
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno)
    );

create table
    permiso (
        id_permiso int PRIMARY KEY AUTO_INCREMENT,
        motivo TEXT not null,
        fecha_entrada DATE not null,
        fecha_salida DATE not null,
        id_alumno int not null,
        estado ENUM ('Pendiente', 'Espera', 'Aceptado', 'REGRESado') not null,
        archivo_adjuntado VARCHAR(50),
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno)
    );

CREATE Table
    salidas (
        id_salida INT PRIMARY KEY AUTO_INCREMENT,
        id_alumno int not null,
        NUMERO_CUARTO INT (3),
        FECHAYHORA_ENTRADA DATETIME,
        FECHAYHORA_SALIDAD DATETIME,
        DESTINO VARCHAR(200),
        ESTADO ENUM ('SALIDO', 'REGRESADO', 'CANCELADO'),
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno)
    );

create table
    usuario (
        id_usuario int PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(45) NOT NULL,
        contrasena VARCHAR(45) NOT NULL,
        id_empleado int DEFAULT NULL,
        id_alumno int DEFAULT NULL,
        FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado),
        FOREIGN KEY (id_alumno) REFERENCES alumno (id_alumno)
    );

INSERT INTO
    generacion (nombre, año_inicio, año_fin, descripcion)
VALUES
    ('2021-2024', 2021, 2024, 'Generación 2021-2024'),
    ('2022-2025', 2022, 2025, 'Generación 2022-2025'),
    ('2023-2026', 2023, 2026, 'Generación 2023-2026'),
    ('2024-2027', 2024, 2027, 'Generación 2024-2027');

SELECT
    *
FROM
    rol;

INSERT INTO
    rol (id_rol, rol)
VALUES
    (1, 'Secretaria'),
    (2, 'Alumno'),
    (3, 'Profesor'),
    (4, 'Seguridad'),
    (5, 'Disciplina');

INSERT INTO
    especialidad (denominacion, descripcion, id_sala)
VALUES
    (
        'TSDAW',
        'Tecnico Superior en Desarollo de aplicaciones Web',
        1
    ),
    (
        'TELECO',
        'Tecnico Superior en Desarollo de aplicaciones Multiplataforma',
        2
    ),
    (
        'ASIR',
        'Tecnico Superior en Desarollo de aplicaciones Telemáticas',
        3
    ),
    (
        'MICRO',
        'Tecnico Superior en Desarollo de aplicaciones Informáticas',
        4
    );

INSERT INTO
    sala (capacidad, numero, planta)
VALUES
    (25, 205, 'Segunda planta');

SELECT
    *
FROM
    especialidad;

INSERT INTO
    empleado (foto, nombre, apellido, telefono, correo, id_rol)
VALUES
    (
        'foto1.jpg',
        'Divina',
        'Obono',
        '222222222',
        'divi@gmail.com',
        1
    );

INSERT INTO
    alumno (
        foto,
        nombre,
        apellidos,
        telefono,
        correo,
        fecha_nacimiento,
        contacto_emergencia,
        id_especialidad,
        id_rol,
        id_generacion
    )
VALUES
    (
        'foto1.jpg',
        'Zabulon',
        'Sima Oluy',
        '222052114',
        'zabu@gmail.com',
        '2000-02-02',
        '222222222',
        2,
        1,
        2
    );

SELECT
    *
FROM
    alumno;

INSERT INTO
    usuario (nombre, contrasena, id_empleado)
VALUES
    ('divi', '1234', 1);

INSERT INTO
    usuario (nombre, contrasena, id_alumno)
VALUES
    ('zabu', '1234', 2);

SELECT
    *
FROM
    permiso;


INSERT INTO  (  ) VALUES(
     your_values
);
