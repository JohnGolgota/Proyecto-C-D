CREATE TABLE [tbl_config] (
  [id_cfg] int(11) PRIMARY KEY NOT NULL,
  [nombre_cfg] varchar(50),
  [descripcion_cfg] varchar(255),
  [color_cfg] varchar(8),
  [notificaciones_cfg] varchar(2),
  [prioridad_cfg] varchar(12),
  [fecha_even_cfg] datatime
)
GO

CREATE TABLE [tbl_eventos] (
  [id_evn] int(11) PRIMARY KEY NOT NULL,
  [fecha_evn] datatime DEFAULT (now())
)
GO

CREATE TABLE [tbl_eventos_config] (
  [id_evn] int(11),
  [id_cfg] int(11)
)
GO

CREATE TABLE [tbl_usuario] (
  [id_usr] int(11) PRIMARY KEY NOT NULL,
  [nombre_usr] varchar(30),
  [correo_usr] varchar(50),
  [contrasena_usr] varchar(15) NOT NULL,
  [eventos_evn] int(11),
  [id_mpg] int(11)
)
GO

CREATE TABLE [tbl_metodo_pago] (
  [id_mpg] int(11) PRIMARY KEY NOT NULL,
  [tipo_mpg] varchar(30),
  [numero_mpg] varchar(19),
  [fecha_caducidad_mpg] date,
  [codigo_cvv_mpg] varchar(3),
  [nombres_mpg] varchar(50),
  [apellidos_mpg] varchar(50),
  [pais_mpg] varchar(100),
  [codigo_postal_mpg] varchar(10),
  [direccion_mpg] varchar(100)
)
GO

CREATE TABLE [tbl_pagos] (
  [id_pg] int(11) PRIMARY KEY NOT NULL,
  [descripcion_pg] varchar(255),
  [cantidad_pg] float,
  [impuestos_pg] float,
  [id_mpg] int(11)
)
GO

CREATE TABLE [tbl_comunicado_user] (
  [id_rpu] int(11) PRIMARY KEY NOT NULL,
  [asunto_rpu] varchar(50),
  [descripcion_rpu] text,
  [fecha_rpu] datetime,
  [estado_rpu] varchar(10),
  [respuesta_rpu] varchar(100),
  [id_adm] int(11),
  [id_usr] int(11)
)
GO

CREATE TABLE [tbl_administrador] (
  [id_adm] int(11) PRIMARY KEY NOT NULL,
  [nombre_adm] varchar(100),
  [correo_adm] varchar(50) NOT NULL,
  [otro_contacto] varchar(150),
  [contrasena_adm] varchar(15) NOT NULL
)
GO

CREATE TABLE [tbl_comunicado_admin] (
  [id_com] int(11) PRIMARY KEY NOT NULL,
  [asunto_com] varchar(15),
  [texto_com] text,
  [visibilidad] boolean,
  [fecha_com] date,
  [prioridad_com] varchar(15),
  [id_adm] int(11)
)
GO

CREATE TABLE [tbl_desarrolladores] (
  [di_des] varchar(11) PRIMARY KEY NOT NULL,
  [tipodi_des] varchar(30) NOT NULL,
  [nombre_des] varchar(100) NOT NULL,
  [apellidos_des] varchar(100) NOT NULL,
  [horario_des] varchar(15),
  [sueldo_des] float NOT NULL,
  [id_com] int(11)
)
GO

CREATE TABLE [tbl_e_desarrolladora] (
  [id_edes] int(11),
  [nombre_edes] varchar(15),
  [di_des] varchar(11)
)
GO

CREATE TABLE [tbl_actualizaciones] (
  [version_id_act] varchar(15),
  [nombre_act] varchar(15),
  [novedades_act] varchar(140),
  [comentarios_act] varchar(140),
  [di_des] varchar(10)
)
GO

ALTER TABLE [tbl_eventos_config] ADD FOREIGN KEY ([id_evn]) REFERENCES [tbl_eventos] ([id_evn])
GO

ALTER TABLE [tbl_eventos_config] ADD FOREIGN KEY ([id_cfg]) REFERENCES [tbl_config] ([id_cfg])
GO

ALTER TABLE [tbl_eventos] ADD FOREIGN KEY ([id_evn]) REFERENCES [tbl_usuario] ([eventos_evn])
GO

ALTER TABLE [tbl_metodo_pago] ADD FOREIGN KEY ([id_mpg]) REFERENCES [tbl_usuario] ([id_mpg])
GO

ALTER TABLE [tbl_pagos] ADD FOREIGN KEY ([id_mpg]) REFERENCES [tbl_metodo_pago] ([id_mpg])
GO

ALTER TABLE [tbl_comunicado_user] ADD FOREIGN KEY ([id_adm]) REFERENCES [tbl_administrador] ([id_adm])
GO

ALTER TABLE [tbl_comunicado_user] ADD FOREIGN KEY ([id_usr]) REFERENCES [tbl_usuario] ([id_usr])
GO

ALTER TABLE [tbl_administrador] ADD FOREIGN KEY ([id_adm]) REFERENCES [tbl_comunicado_admin] ([id_adm])
GO

ALTER TABLE [tbl_comunicado_admin] ADD FOREIGN KEY ([id_com]) REFERENCES [tbl_desarrolladores] ([id_com])
GO

ALTER TABLE [tbl_desarrolladores] ADD FOREIGN KEY ([di_des]) REFERENCES [tbl_e_desarrolladora] ([di_des])
GO

ALTER TABLE [tbl_desarrolladores] ADD FOREIGN KEY ([di_des]) REFERENCES [tbl_actualizaciones] ([di_des])
GO
