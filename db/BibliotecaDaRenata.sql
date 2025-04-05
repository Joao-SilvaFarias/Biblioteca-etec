CREATE DATABASE BibliotecaDaRenata;
USE BibliotecaDaRenata;

create table diario
(
id int primary key auto_increment, 
_data date not null,
qtd_emprestimos int null,
qtd_devolvidos int null, 
qtd_renovacoes int null, 
bibliotecario varchar(200) not null,
assistente varchar(200) null, 
periodo varchar(10) not null
);

create table usuario
(
id int primary key auto_increment,
nome varchar(200) not null,
email varchar(200) not null,
senha varchar(100) not null
);

select * from diario;
select * from usuario;
select * from diario where qtd_emprestimos like 5;