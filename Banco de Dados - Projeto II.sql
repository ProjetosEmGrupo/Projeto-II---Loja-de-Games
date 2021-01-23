CREATE DATABASE projeto2;
USE projeto2;

CREATE TABLE mensagem (
  id int(11) NOT NULL auto_increment primary key,
  mensagem varchar(200) NOT NULL,
  email varchar(50) DEFAULT NULL,
  assunto varchar(50) NOT NULL,
  nome varchar(50) DEFAULT NULL);