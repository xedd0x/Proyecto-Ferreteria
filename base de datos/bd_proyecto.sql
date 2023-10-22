CREATE SCHEMA `bd_proyecto` DEFAULT CHARACTER SET utf8 ;

use bd_proyecto;




create table usuarios
(
id_usuario int primary key not null auto_increment,
nombre_usuario varchar(45) not null,
contrasena varchar(500) not null,
tipo_rol varchar(30) not null ,
descripcion varchar(45) not null

);

SELECT usuarios.id_usuario,nombre_usuario,contrasena,tipo_rol,descripcion,empleados.nombre_empleado 
FROM usuarios
INNER JOIN empleados
ON usuarios.id_usuario = empleados.id_usuario;

create table clientes
(
id_cliente int primary key not null auto_increment,
nombre_cliente varchar (45) not null,
numero_identidad  varchar(45)  not null,
genero  varchar(45) not null,
n_telefono int not null,
email varchar (50),

id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE

);

select * from usuarios;



create table empleados
(
id_empleado int primary key not null auto_increment,
nombre_empleado varchar (45) not null,
numero_identidad varchar(45) not null,
genero varchar(45) null,
n_telefono int not null,
direccion  varchar(50) not null,
email varchar (50) not null,
fecha_nacimiento date not null,
fecha_contratacion date not null,
cargo varchar (45),

id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO empleados (id_empleado, nombre_empleado,numero_identidad,genero,n_telefono,direccion,email,fecha_nacimiento,fecha_contratacion,cargo)
  VALUES (1,"josue edgardo vargas medina","0801199922951","hombre",33953285,"colonia cerro grande","josuevamedina@gmail.com","1999-10-24","2023-08-06","administrador");

SELECT nombre_usuario,contrasena,tipo_rol,descripcion,empleados.nombre_empleado 
                      FROM usuarios
                      INNER JOIN empleados
                      ON usuarios.id_empleado = empleados.id_empleado;

create table proveedores
(
id_proveedor int primary key not null auto_increment,
nombre_proveedor varchar(45) not null,
telefono int not null,
email varchar(50) not null,
direccion varchar(50)not null,
encargado varchar(50)not null,
telefono_encargado int not null,
comentarios varchar(60) 

);

create table usuarios
(
id_usuario int primary key not null auto_increment,
nombre_usuario varchar(45) not null,
contrasena varchar(500) not null,
tipo_rol varchar(30) not null ,
descripcion varchar(45) not null

);

select * from usuarios;
select * from productos_cotizados;

create table productos
(
id_producto int primary key not null auto_increment,
codigo varchar (45) not null,
nombre_producto varchar(45)not null,
precio_compra double not null,
precio_venta double not null,
descripcion varchar(45) not null,
foto varchar(45) not null,

id_proveedor int not null,
FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_proveedor)ON DELETE CASCADE ON UPDATE CASCADE
);
select productos.nombre_producto,inventario.cantidad_producto,inventario.fecha_ulti_ingreso 
from productos
inner join inventario
where inventario.id_producto=productos.id_producto AND inventario.cantidad_producto<100;

                      
create table inventario
(
id_inventario int primary key not null auto_increment,
cantidad_producto int not null,
categoria varchar (45) not null,
fecha_ulti_ingreso date not null,
cant_ulti_ingreso int not null,

id_producto int not null,
FOREIGN KEY (id_producto) REFERENCES productos(id_producto)ON DELETE CASCADE ON UPDATE CASCADE
);



create table cotizaciones
(
id_cotizacion int primary key not null auto_increment,
codigo varchar(60)not null,
estado int not null,
total double not null

);

select * from cotizaciones;

SELECT id_producto FROM productos_cotizados inner join cotizaciones where codigo='$codigocoti' and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion  ;
select * from productos_cotizados;
select * from cotizaciones;

create table productos_cotizados
(
id_producto_cotizado int primary key not null auto_increment ,

id_producto int not null ,
FOREIGN KEY (id_producto) REFERENCES productos(id_producto)ON DELETE CASCADE ON UPDATE CASCADE,

cantidad int not null,

id_cotizacion int not null,
FOREIGN KEY (id_cotizacion) REFERENCES cotizaciones(id_cotizacion)ON DELETE CASCADE ON UPDATE CASCADE

);

SELECT id_factura FROM facturas_venta  where id_cotizacion=1;
select * from facturas_venta;

select * from productos_cotizados;
select * from cotizaciones;
select productos_cotizados.id_cotizacion,productos.id_producto,productos.nombre_producto,productos_cotizados.cantidad,productos.foto,productos.precio_venta from cotizaciones inner join productos_cotizados inner join productos where cotizaciones.codigo='f8dce7d8' and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion and productos.id_producto=productos_cotizados.id_producto;
select count(*) from cotizaciones inner join productos_cotizados where cotizaciones.codigo='f8dce7d8' and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion;

create table facturas_venta
(
id_factura int primary key not null auto_increment,
fecha_factura date not null,
rtn varchar(60),
subtotal double not null,
descuento double not null,
impuesto double not null,
total double not null,

id_cotizacion int not null,
FOREIGN KEY (id_cotizacion) REFERENCES cotizaciones(id_cotizacion)ON DELETE CASCADE ON UPDATE CASCADE,

id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)ON DELETE CASCADE ON UPDATE CASCADE
);


create table metodo_pago
(
id_metodop int primary key not null auto_increment,
metodo varchar(45) not null,
cantidad double not null,

id_factura int not null,
FOREIGN KEY (id_factura) REFERENCES facturas_venta(id_factura)ON DELETE CASCADE ON UPDATE CASCADE
);

select * from metodo_pago;


create table envios
(
id_envios int primary key not null auto_increment,
fecha_pedido date not null,
direccion varchar(50) not null,
telefono int not null,
estado int not null,

id_factura int not null,
FOREIGN KEY (id_factura) REFERENCES facturas_venta(id_factura)ON DELETE CASCADE ON UPDATE CASCADE
);

SELECT  *  FROM facturas_venta ;


create table factura_envio
(
id_factura_servicio int primary key not null auto_increment,
rtn varchar(60),
subtotal double not null,
descuento double not null,
impuesto double not null,
total double not null,

id_envios int not null,
FOREIGN KEY (id_envios) REFERENCES envios(id_envios)ON DELETE CASCADE ON UPDATE CASCADE
);

create table informacion_empresa
(
id_informacion int primary key not null auto_increment,
historia varchar(1000) not null,
mensaje varchar(1000) not null

);

INSERT INTO informacion_empresa (historia, mensaje)
  VALUES ("Creado en 2022","Somos un negocio en empredimiento con la esperanza de crecer y formar una empresa grande");

create table direccion_negocios
(
id_direccion int primary key not null auto_increment,
direccion varchar(60)not null,
descripcion varchar(60) not null,
longitud varchar(50)not null,
latitud varchar(50)not null

);


create table bitacora
(
id_bitacora int primary key not null auto_increment,
accion varchar(300) not null,
fecha varchar(45) not null,
hora varchar(45) not null,


id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)ON DELETE CASCADE ON UPDATE CASCADE

);


SELECT id_factura,fecha_factura,rtn,subtotal,descuento,impuesto, facturas_venta.total,facturas_venta.id_cotizacion,clientes.nombre_cliente,cotizaciones.codigo
                        FROM facturas_venta
                        inner join usuarios
                        inner join clientes
                        inner join cotizaciones
                        where usuarios.id_usuario=facturas_venta.id_usuario and usuarios.id_usuario=clientes.id_usuario;

