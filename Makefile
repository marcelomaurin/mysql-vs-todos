# Script de criacao do banco de dados
# Autor Marcelo Maurin Martins
# Daa: 31/01/2022
#


APP=mysql

all:  database Tabelas
database:
	$(APP)  < database.sql
Tabelas:
	$(APP) < pessoas.sql




