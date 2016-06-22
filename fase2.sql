/* Fase 1 */

CREATE DATABASE aula;

USE aula;

CREATE TABLE IF NOT EXISTS alunos (
  id int(11) NOT NULL AUTO_INCREMENT primary key,
  nome varchar(255) NOT NULL,
  fone varchar(30),
  email varchar(255),
  idade int(3),
  sexo char(1),
  nota int(11)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Tabela de Alunos';

INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Jose', 		'(19) 3554-1234','teste1@teste.com.br',21,'M', 7);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Maria', 		'(19) 3554-1235','teste2@teste.com.br',22,'F', 8);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Pedro', 		'(19) 3554-1236','teste3@teste.com.br',23,'M', 4);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Antonio', 	'(19) 3554-1237','teste4@teste.com.br',24,'M', 10);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Marcela', 	'(19) 3554-1238','teste5@teste.com.br',31,'F', 6);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Justino', 	'(19) 3554-1239','teste6@teste.com.br',32,'M', 8);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Andressa', 	'(19) 3554-1240','teste7@teste.com.br',22,'F', 5);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Paula', 		'(19) 3554-1214','teste8@teste.com.br',23,'F', 3);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Priscila', 	'(19) 3554-1224','teste9@teste.com.br',35,'F', 5);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Mauro', 		'(19) 3554-1244','test11@teste.com.br',46,'M', 8);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Jefferson', 	'(19) 3554-1254','test21@teste.com.br',27,'M', 9);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Jamille', 	'(19) 3554-1264','test31@teste.com.br',48,'F', 4);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Jorge', 		'(19) 3554-1274','test41@teste.com.br',33,'M', 5);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Camila', 	'(19) 3554-1284','test51@teste.com.br',32,'F', 7);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Katia', 		'(19) 3554-1294','test61@teste.com.br',23,'F', 8);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Melisandra', '(19) 3554-1204','test71@teste.com.br',34,'F', 10);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Deneres', 	'(19) 3554-1134','test81@teste.com.br',45,'F', 8);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Tyrion', 	'(19) 3554-1334','test91@teste.com.br',36,'M', 10);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Joao', 		'(19) 3554-1434','tes1e1@teste.com.br',27,'M', 3);
INSERT INTO alunos (nome, fone, email, idade, sexo, nota) VALUES ('Sansa', 		'(19) 3554-1534','tes2e1@teste.com.br',38,'F', 1);