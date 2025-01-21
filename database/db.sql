CREATE TABLE roles (

    id_rol       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol   VARCHAR (255) NOT NULL UNIQUE KEY,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('ADMINISTRADOR','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('DIRECTOR ACADÉMICO','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('DIRECTOR ADMINISTRATIVO','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('CONTADOR','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('SECRETARIA','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('DOCENTE','2024-10-15 12:55:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES('ESTUDIANTES','2024-10-15 12:55:00','1');

CREATE TABLE usuarios (

    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id     INT (11) NOT NULL,
    email      VARCHAR (255) NOT NULL UNIQUE KEY,
    password   VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado)
VALUES('1','admin@admin.com','$2y$10$JQBO/..v78FJfqBsJ1LhYOVHdwZiZ/KF8lEG6nz8oqbmMucHftqAS','2024-11-21 4:07:20','1')

CREATE TABLE personas (

    id_persona                 INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id                 INT (255) NOT NULL,
    nombres                    VARCHAR (50) NOT NULL,
    apellidos                  VARCHAR (50) NOT NULL,
    ci                         VARCHAR (20) NOT NULL,
    fecha_nacimiento           VARCHAR (20) NOT NULL,
    profesion                  VARCHAR (50) NOT NULL,
    direccion                  VARCHAR (255) NOT NULL,
    celular                    VARCHAR (11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE administrativos (

    id_administrativo          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id                 INT (11) NOT NULL,


    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO administrativos (persona_id,fyh_creacion,estado)

CREATE TABLE docentes (

    id_docente          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id          INT (11) NOT NULL,
    especialidad        VARCHAR (255) NOT NULL,
    antiguedad          VARCHAR (255) NOT NULL,


    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE estudiantes (

    id_estudiante         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id            INT (11) NOT NULL,
    nivel_id              INT (11) NOT NULL,
    grado_id              INT (11) NOT NULL,
    sige                  VARCHAR (50) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade,
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE ppffs (

    id_ppff                 INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id           INT (11) NOT NULL,
    nombres_apellidos_ppff  VARCHAR (50) NOT NULL,
    ci_ppff                 VARCHAR (20) NOT NULL,
    celular_ppff            VARCHAR (20) NOT NULL,
    ocupacion_ppff          VARCHAR (50) NOT NULL,
    ref_nombre              VARCHAR (50) NOT NULL,
    ref_parentezco          VARCHAR (50) NOT NULL,
    ref_celular             VARCHAR (50) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE configuracion_instituciones (

    id_config_institucion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion   VARCHAR (255) NOT NULL,
    logo                 VARCHAR (255) NULL,
    direccion            VARCHAR (255) NOT NULL,
    telefono             VARCHAR (20) NULL,
    celular              VARCHAR (20) NULL,
    correo               VARCHAR (50) NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11)

)ENGINE=InnoDB;
 

CREATE TABLE gestiones (

    id_gestion           INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion              VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11)

)ENGINE=InnoDB;

CREATE TABLE niveles (

    id_nivel    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id  INT (11) NOT NULL,
    nivel       VARCHAR (255) NOT NULL,
    turno       VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE grados (

    id_grado     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id     INT (11) NOT NULL,
    curso        VARCHAR (255) NOT NULL,
    seccion      VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE materias (

    id_materia           INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia       VARCHAR (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11)

)ENGINE=InnoDB;

CREATE TABLE pagos (

    id_pago           INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id     INT (11) NOT NULL,
    mes_pagado        VARCHAR (50) NOT NULL,
    monto_pagado      VARCHAR (10) NOT NULL,
    fecha_pago        VARCHAR (20) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE asignaciones (

    id_asignacion     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id        INT (11) NOT NULL,
    nivel_id          INT (11) NOT NULL,
    grado_id          INT (11) NOT NULL,
    materia_id        INT (11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
    FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE calificaciones (

    id_calificacion   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id        INT (11) NOT NULL,
    estudiante_id     INT (11) NOT NULL,
    materia_id        INT (11) NOT NULL,
    nota1             VARCHAR (10),
    nota2             VARCHAR (10),
    nota3             VARCHAR (10),

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
    FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE kardexs (

    id_kardex         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id        INT (11) NOT NULL,
    estudiante_id     INT (11) NOT NULL,
    materia_id        INT (11) NOT NULL,

    fecha             VARCHAR (50) NOT NULL,
    observacion       VARCHAR (255) NOT NULL,
    nota              TEXT NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
    FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE permisos (

    id_permiso        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_url        VARCHAR (100) NOT NULL,
    url               TEXT NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11)

)ENGINE=InnoDB;

CREATE TABLE roles_permisos (

    id_rol_permiso    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id            INT (11) NOT NULL,
    permiso_id        INT (11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado       VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade,
    FOREIGN KEY (permiso_id) REFERENCES permisos (id_permiso) on delete no action on update cascade

)ENGINE=InnoDB;
