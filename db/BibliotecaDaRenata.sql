CREATE DATABASE BibliotecaDaRenata;
USE BibliotecaDaRenata;

CREATE TABLE Livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    codigo_identificacao VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE Emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    livro_id INT,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE GENERATED ALWAYS AS (DATE_ADD(data_emprestimo, INTERVAL 7 DAY)) STORED,
    horario ENUM('Manhã', 'Tarde', 'Noite') NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
    FOREIGN KEY (livro_id) REFERENCES Livros(id)
);

select * from emprestimos;
