#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <mysql.h>

#define USER "root"
#define HOST "127.0.0.1"
#define DATABASE "testedb"
#define PASS "226468"

#define SUCCESS 0
#define ERROR 1

MYSQL mycon;
int res;

int conecta(void){
	mysql_init(&mycon);
	/*
	mysql_real_connect(MYSQL *mysql,
                   const char *host,
                   const char *user,
                   const char *passwd,
                   const char *db,
                   unsigned int port,
                   const char *unix_socket,
                   unsigned long client_flag)
				  */
	if((res = mysql_real_connect(
				  &mycon, 
				  HOST, 
				  USER,
				  PASS,
				  DATABASE,
				  0, 
				  NULL,
				  0)==SUCCESS))
	{
		printf("Sucesso na conexão com servidor\n");
		return SUCCESS;
	}
	else {
		printf("Falha na conexao!\n");
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
   mysql_close(&mycon);
   printf("Desconectado\n");
}

int insere( PESSOAS *pes){
  char sql[500];
  memset(sql,'\0',sizeof(sql));
  sprintf(sql,"insert into pessoas (nome, dtnasc, profissao, sexo) values ('%s','%s','%s','%c');", 
       pes->nome,
	   pes->dtnasc,
	   pes->profissao,
	   pes->sexo);
  res = mysql_query(&mycon,sql);
  if(res=SUCCESS) {
	  printf("Registrado com sucesso!\n");
  }  else {
	  printf("Falha na inclusão\n");
  }
}

void captura_dados(PESSOAS *pes){
	printf("Digite as informações que deseja registrar\n");
	printf("==========================================\n");
	printf("\nNome:");
	scanf("%s",pes->nome);
	printf("\nDt Nascimento:");
	scanf("%s",pes->dtnasc);
	printf("\nProfissao:");
	scanf("%s",pes->profissao);
	printf("\nSexo(M/F):");
	scanf("%c",&pes->sexo);	
	printf("\n\n");
}

void Wellcome(void){
   printf("Software insPessoa\n");
   printf("Criado por Marcelo Maurin Martins\n");
   printf("Maurinsoft.com.br\n");
}

//funcao principal
void main(int argc, char *argv[]){
   Wellcome();	
   PESSOAS pessoa;
   /*Testa conexao*/
   if (conecta()==SUCCESS) {
      captura_dados(&pessoa);
      insere(&pessoa);
      desconecta();   
   }
}
