
DROP database IF EXISTS identifica;
create database identifica;
use identifica;

CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT PRIMARY key ,
  
  `nome` varchar(200) NOT NULL,
  `datanasc` date NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `cpf` varchar(200) NOT NULL
) ;

INSERT INTO `alunos` (`idAluno`, `nome`, `datanasc`, `idCurso`, `idTurma`, `cpf`) VALUES
(1, 'Mateus', '2004-09-13', 3, 1, '06429652262'),
(2, 'Jordano', '2009-08-31', 4, 1, '39686052259'),
(3, 'Alcemir', '2013-05-16', 1, 3, '20522785247'),
(4, 'Marilene', '2017-09-29', 1, 4, '05686064261'),
(5, 'Maria Eduarda', '2011-08-04', 2, 5, '97570312244'),
(6, 'Grabiel', '2011-07-25', 5, 2, '47507644260');

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL primary key,
  `nome` varchar(200) NOT NULL,
  `idNivel` int(11) NOT NULL
) ;

INSERT INTO `cursos` (`idCurso`, `nome`, `idNivel`) VALUES
(1, 'Hospedagem', 2),
(2, 'Informática para Internet', 1),
(3, 'Enologia e Viticultura', 1),
(4, 'Pedagogia', 3),
(5, 'Viticultura', 4),
(6, 'Literatura', 3);

CREATE TABLE `niveis` (
  `idNivel` int(11) NOT NULL primary key,
  `nome` varchar(200) NOT NULL
) ;

INSERT INTO `niveis` (`idNivel`, `nome`) VALUES
(1, 'Tecnico_integrado'),
(2, 'Subsequente'),
(3, 'Graduação'),
(4, 'Especialização');

CREATE TABLE `turmas` (
  `idTurma` int(11) NOT NULL PRIMARY key,
  `nome` varchar(200) NOT NULL,
  `idCurso` int(11) NOT NULL
) ;

INSERT INTO `turmas` (`idTurma`, `nome`, `idCurso`) VALUES
(1, '3º INFO', 2),
(2, '2º ENO', 3),
(3, 'HOSPEDAGEM', 1),
(4, 'PEDAGOGIA', 4),
(5, '1º INFO', 2);



ALTER TABLE alunos
ADD CONSTRAINT alunos_ibfk_1 FOREIGN KEY (idCurso) REFERENCES cursos (idCurso),
ADD CONSTRAINT alunos_ibfk_2 FOREIGN KEY (idTurma) REFERENCES turmas (idTurma);

ALTER TABLE turmas
ADD CONSTRAINT turmas_ibfk_1 FOREIGN KEY (idCurso) REFERENCES cursos (idCurso);

CREATE TABLE adm (
senha varchar(10) NOT NULL,
nome varchar(255) NOT NULL,
email varchar(255) NOT NULL

) ;

INSERT INTO adm (senha, nome, email) VALUES
(123, 'salva', 'salva@gmail.com' ),
(321, 'jaques', 'jaques@gmail.com');
