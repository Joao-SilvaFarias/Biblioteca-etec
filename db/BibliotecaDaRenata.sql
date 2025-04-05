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
assistente varchar(200) null
);

select * from diario;