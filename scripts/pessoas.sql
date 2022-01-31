#Cria a tabela de pessoas
#Autor: Marcelo Maurin Martins
#31/01/2022

use testedb;

create table if not exists pessoas
(
   idPessoa INT(6) unsigned auto_increment primary key,
   nome varchar(30) not null,
   dtnasc date,
   profissao varchar(20),
   sexo char(1),
   dtchg timestamp default current_timestamp on update current_timestamp,
   dtcad timestamp default current_timestamp
);
