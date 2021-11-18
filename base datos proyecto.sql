CREATE TABLE Usuario(
idusuario int PRIMARY KEY NOT NULL auto_increment,
nombre varchar(100) NOT NULL,
documento varchar(50) NOT NULL,
correo varchar(100),
fechaNacimiento double NOT NULL,
clave varchar(50) NOT NULL
);
CREATE TABLE Administrador(
idadmin int PRIMARY KEY NOT NULL auto_increment,
nombre varchar(100) NOT NULL,
documento varchar(50) NOT NULL,
correo varchar(100),
fechaNacimiento double NOT NULL,
clave varchar(50) NOT NULL
);
CREATE TABLE Pedido(
idPedido int PRIMARY KEY NOT NULL auto_increment,
registro varchar(255) NOT NULL,
medioPago varchar(255) NOT NULL,
cantidad double NOT NULL,
fkusuario int NOT NULL,
CONSTRAINT FOREIGN KEY(fkusuario) REFERENCES Usuario(idusuario)
);
CREATE TABLE Producto(
idProducto int PRIMARY KEY NOT NULL auto_increment,
descripcion varchar(255) NOT NULL,
categoria varchar(255) NOT NULL,
precio double NOT NULL,
fkpedido int NOT NULL,
fkadmin int NOT NULL,
CONSTRAINT FOREIGN KEY(fkpedido) REFERENCES Pedido(idPedido),
CONSTRAINT FOREIGN KEY(fkadmin) REFERENCES Administrador(idadmin)
);