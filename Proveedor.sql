create database proveedor;
use proveedor;
create table proveedores(
ID_Proveedor varchar(30) not null primary key,
empresa varchar(30) not null,
telefono varchar(30) not null,
dias_visita varchar(30) not null
);