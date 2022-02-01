# Script de criacao do banco de dados
# Autor Marcelo Maurin Martins
# Daa: 31/01/2022
#


APP=mysql

all:  database permissoes Tabelas
database:
	$(APP)  < database.sql
permissoes:
	$(APP) < grants.sql
Tabelas:
	$(APP) < pessoas.sql




