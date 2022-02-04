#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <mysql.h>

#define USER "gcc"
#define HOST "localhost"
#define DATABASE "testedb"
#define PASS "123456"


#define SUCCESS 0
#define ERROR 1

MYSQL *mycon;
//char PASS[20];
int res;

int conecta(void){
	mycon = mysql_init(NULL);
				  
	res = mysql_real_connect(
				  mycon, 
				  HOST,
				  USER,
				  PASS,
				  DATABASE,
				  3306,
				  NULL,
				  0);
	if(res!=NULL)
	{
		printf("Sucesso na conexão com servidor\n");
		return SUCCESS;
	}
	else {
		printf("Falha na conexao! Erro:%s\n",mysql_error(mycon));
		return ERROR;
	}
}
  
//Estrutura de cadastro de pessoas
typedef struct PESSOAS {
  int idpessoa;
  char nome[30];
  char dtnasc[20];
  char profissao[20];
  char sexo;
} PESSOAS;



void desconecta(void){
   mysql_close(mycon);
   mysql_library_end();
   printf("Desconectado\n");
}

int Update( PESSOAS *pes){
  char sql[500];
  memset(sql,'\0',sizeof(sql));
  sprintf(sql,"update pessoas set profissao = '%s' where nome = '%s';", 
       pes->profissao,
	   pes->nome   );
  printf("SQL:%s\n\n",sql);	   
  
  //res = mysql_query(mycon,sql);
  res = mysql_real_query(mycon,sql,sizeof(sql));
  mysql_commit(mycon);
  if(!res) {
	  printf("Atualizado com sucesso!\n");
  }  else {
	  printf("Falha na Atualizacao\n");
  }
}

void captura_dados(PESSOAS *pes){
	printf("Digite as informações que deseja pesquisar\n");
	printf("==========================================\n");
	printf("\nNome:"); 
	scanf("%s",pes->nome);		
	printf("Campo que será mudado");
	printf("\nProfissao:"); 
	scanf("%s",pes->profissao);		
	printf("\n\n");
}

void Wellcome(void){
   printf("Software delPessoa\n");
   printf("Criado por Marcelo Maurin Martins\n");
   printf("Maurinsoft.com.br\n");
   //printf("Senha do banco:");
   //scanf("%s",PASS);
}

//funcao principal
void main(int argc, char *argv[]){
   Wellcome();	
   PESSOAS pessoa;
   /*Testa conexao*/
   if (conecta()==SUCCESS) {
      captura_dados(&pessoa);
      Update(&pessoa);
      desconecta();   
   }
}
