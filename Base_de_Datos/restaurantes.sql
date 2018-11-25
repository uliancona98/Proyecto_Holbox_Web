CREATE TABLE RESTAURANTES(
id_restaurante int auto_increment primary Key,
id_usuario int not null,
nombre_restaurante varchar(255),
telefono_restaurante varchar(255),
horario_abierto time,
horario_cerrado time,
precio varchar(255),
descripcion_restaurante text,
tipo_restaurante varchar(255),
imagen_restaurante longblob,
disponibilidad boolean default true,
foreign key(id_usuario)
references USUARIOS(id_usuario)
)Engine = InnoDB;