create database Biblioteca_etec;

use Biblioteca_etec;

create table diario
(
id int primary key auto_increment,
_data sring not null, 
numero_visitantes int not null,
numero_livros_retirados int not null,
numero_livros_devolvidos int not null,
numero_livros_emprestimo int not null
);
