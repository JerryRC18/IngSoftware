create database if not exists dentista;
use dentista; 
create table if not exists usuarios(
 usu_id int auto_increment,
 usu_nombre varchar(50) not null,
 usu_correo varchar(50) not null,
 usu_telefono varchar(50),
 usu_contrasena varchar(50) not null,
 
 primary key (usu_id),
 unique key (usu_nombre),
 unique key (usu_correo),
 unique key (usu_telefono)
 
);

create table if not exists dentistas (
dent_id int auto_increment,
dent_nombre varchar(50) not null,
dent_area varchar(50) not null, 		#el área hace referencia a si es odontólogo, ortodoncista, etc.
#dent_servicio int,	
dent_consultorio int not null,

index (dent_consultorio),
index (dent_nombre),

primary key (dent_id)
);

create table if not exists servicios (
serv_id int auto_increment,
serv_nombre varchar(50) not null, #nombre del servicio: limpieza dental, blanqueamiento, caries, etc
serv_precio int not null,		#precio del servicio
serv_dentista_nombre varchar(50),

index (serv_nombre),
primary key (serv_id),
foreign key (serv_dentista_nombre)
references dentistas (dent_nombre)
on delete cascade
on update cascade


);


create table if not exists citas (
cit_id int auto_increment, 					#llave primaria e identificador de cita
cit_fecha date not null,  			#fecha de la cita que es irrepetible
cit_hora time not null,				#hora de la cita que es irrepetible
#cit_id_consultorio int not null, 		#identificador y llave foránea del consultorio de la cita

cit_id_usu int,		#identificador del contacto de la cita
#cit_dentista int,
cit_servicio varchar(50),

#index (cit_id_consultorio),
primary key (cit_id),
unique key (cit_fecha, cit_hora),	#fecha y hora irrepetibles

foreign key (cit_id_usu)	#llave foránea para ingresar a la información del usuario que agenda cita
references usuarios (usu_id)	#referencia a tabla de usuarios
on delete cascade
on update cascade,

foreign key (cit_servicio)
references servicios (serv_nombre)
on delete cascade
on update cascade

);

