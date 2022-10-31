CREATE DATABASE carpe_diem; USE carpe_diem;
CREATE TABLE tbl_usuario (
    id_usr int(11) NOT NULL AUTO_INCREMENT UNIQUE,
    nombre_usr varchar(30) NOT NULL,
    correo_usr varchar(50) NOT NULL UNIQUE,
    contrasena_usr varchar(255) NOT NULL,
    PRIMARY KEY (id_usr)
);
CREATE TABLE tbl_administrador(
    id_adm int(11) NOT NULL AUTO_INCREMENT,
    nombre_adm varchar(100) NOT NULL,
    correo_adm varchar(50) NOT NULL,
    contacto_ext_adm varchar(150),
    contrasena_adm varchar(255) NOT NULL,
    PRIMARY KEY (id_adm)
);
CREATE TABLE tbl_eventos (
    id_evn int(11) NOT NULL AUTO_INCREMENT,
    nombre_evn varchar(50) NOT NULL,
    descripcion_evn varchar(255),
    color_evn varchar(8),
    desde_evn datetime NOT NULL,
    hasta_evn datetime NOT NULL,
    hora_inicio_evn varchar(10) NOT NULL,
    hora_final_evn varchar(10) NOT NULL,
    fecha_evn datetime DEFAULT current_timestamp(),
    id_usr int(11) NOT NULL,
    PRIMARY KEY (id_evn),
    FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr)
);
CREATE TABLE tbl_comunicado_user(
    id_rpu int(11) NOT NULL AUTO_INCREMENT,
    asunto_rpu varchar(50) NOT NULL,
    descripcion_rpu text NOT NULL,
    fecha_rpu datetime NOT NULL,
    estado_rpu varchar(10) NOT NULL,
    respuesta_rpu varchar(100),
    id_adm int(11),
    id_usr int(11) NOT NULL,
    PRIMARY KEY (id_rpu),
    FOREIGN KEY (id_adm) REFERENCES tbl_administrador(id_adm),
    FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr)
);
CREATE TABLE tbl_metodo_pago(
    id_mpg int(11) NOT NULL AUTO_INCREMENT,
    tipo_mpg varchar(30) NOT NULL,
    numero_mpg varchar(19) NOT NULL,
    fecha_caducidad_mpg date NOT NULL,
    codigo_cvv_mpg varchar(3) NOT NULL,
    nombres_mpg varchar(30) NOT NULL,
    apellidos_mpg varchar(50) NOT NULL,
    pais_mpg varchar(100) NOT NULL,
    codigo_postal_mpg varchar(10) NOT NULL,
    direccion_mpg varchar(100) NOT NULL,
    id_usr int(11) NOT NULL,
    PRIMARY KEY (id_mpg),
    FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr)
);
CREATE TABLE tbl_pagos(
    id_pg int(11) NOT NULL AUTO_INCREMENT,
    descripcion_pg varchar(255),
    cantidad_pg float NOT NULL,
    impuestos_pg float NOT NULL,
    id_mpg int(11) NOT NULL,
    PRIMARY KEY (id_pg),
    FOREIGN KEY (id_mpg) REFERENCES tbl_metodo_pago(id_mpg)
);
CREATE TABLE tbl_pomodoro(
    id_pmd int(11) NOT NULL AUTO_INCREMENT,
    fecha_hora_pmd datetime,
    nombre_pmd varchar(30) NOT NULL,
    actividad_pmd varchar(8),
    pausa_corta_pmd varchar(8) NOT NULL,
    pausa_larga_pmd varchar(8) NOT NULL,
    id_usr int(11) NOT NULL,
    PRIMARY KEY (id_pmd),
    FOREIGN KEY (id_usr) REFERENCES tbl_usuario (id_usr)
);
CREATE TABLE tbl_Recordatorios(
    id_rec int(11) AUTO_INCREMENT,
    Nombre_rec varchar(75),
    Color_rec varchar(8),
    Fecha_rec TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Notificacion_rec DATETIME,
    id_usr int(11),
    PRIMARY KEY(id_rec),
    FOREIGN KEY(id_usr) REFERENCES tbl_usuario(id_usr)
);
DELIMITER $$
CREATE PROCEDURE `SetUser_usr` (IN `pnombre_usr` VARCHAR(30), `pcorreo_usr` VARCHAR(50), `pcontrasena_usr` VARCHAR(255))   BEGIN
    INSERT INTO tbl_usuario (nombre_usr,correo_usr,contrasena_usr) VALUES (pnombre_usr,pcorreo_usr,pcontrasena_usr);
END$$
CREATE PROCEDURE `ReadEmail_usr` (IN `pcorreo_usr` VARCHAR(50))   BEGIN
    SELECT correo_usr FROM tbl_usuario WHERE correo_usr = pcorreo_usr;
END$$
CREATE PROCEDURE `GetDataName_usr` (IN `pnombre_usr` VARCHAR(30))   BEGIN
    SELECT * FROM tbl_usuario WHERE nombre_usr = pnombre_usr;
END$$
CREATE PROCEDURE `Delete_usr` (IN `pid_usr` INT(11))   BEGIN
    DELETE FROM tbl_usuario WHERE id_usr = pid_usr;
END$$
CREATE PROCEDURE `GetDataId_usr` (IN `pid_usr` INT(11))   BEGIN
    SELECT * FROM tbl_usuario WHERE id_usr = pid_usr;
END$$
CREATE PROCEDURE `Update_usr` (IN `pnombre_usr` VARCHAR(30),`pcorreo_usr` VARCHAR(50),`pid_usr` INT(11))   BEGIN
    UPDATE tbl_usuario SET nombre_usr = pnombre_usr, correo_usr = pcorreo_usr WHERE id_usr = pid_usr;
END$$
CREATE PROCEDURE `UpdatePass_usr` (IN `pcontrasena_usr` VARCHAR(255),`pid_usr` INT(11))   BEGIN
    UPDATE tbl_usuario SET contrasena_usr = pcontrasena_usr WHERE id_usr = pid_usr;
END$$
CREATE PROCEDURE `GetTasksForId` (IN `pid_usr` INT(11))
BEGIN
    SELECT * FROM tbl_Recordatorios WHERE id_usr = pid_usr ORDER BY id_rec DESC;
END$$
CREATE PROCEDURE `AddTask` (IN `pnombre_rec` VARCHAR(75), `pcolor_rec` VARCHAR(8), `pnotificacion_rec` DATETIME, `pid_usr` INT(11))
BEGIN
    INSERT INTO tbl_Recordatorios (Nombre_rec, Color_rec, Notificacion_rec, id_usr) VALUES(pnombre_rec, pcolor_rec, pnotificacion_rec, pid_usr);
END$$
CREATE PROCEDURE `DeleteTask` (IN `pid_rec` INT(11))
BEGIN
    DELETE FROM tbl_Recordatorios WHERE id_rec = pid_rec;
END $$
CREATE PROCEDURE `GetTask` (IN `pid_rec` INT(11))
BEGIN
    SELECT * FROM tbl_Recordatorios WHERE id_rec = pid_rec;
END $$
CREATE PROCEDURE `UpdateTask` (IN `pnombre_rec` VARCHAR(75), `pcolor_rec` VARCHAR(8), `pnotificacion_rec` DATETIME, `pid_rec` INT(11))
BEGIN
    UPDATE tbl_Recordatorios SET Nombre_rec = pnombre_rec, Color_rec = pcolor_rec, Notificacion_rec = pnotificacion_rec WHERE id_rec = pid_rec;
END $$
DELIMITER ;
