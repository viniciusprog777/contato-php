create database tecnegocios;
use tecnegocios;
create table usuarios(
	id int(11) primary key not null auto_increment,
    nome varchar(50) not null,
    email varchar(100) not null,
    telefone varchar(14) not null,
    celular varchar(14) not null,
    cidade varchar(40) not null,
    mensagem text not null,
    estado_id int, 
    constraint FK_Estados_Usuarios
    foreign key (estado_id) references estados(id)
);
create table estados(
	id int(11) primary key not null auto_increment,
    sigla varchar(2) not null,
    nome varchar(30) not null
);
