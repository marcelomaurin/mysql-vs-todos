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
	res = mysql_real_connect(
				  mycon, 
				  HOST, 
				  USER,
				  PASS,
				  DATABASE,
				  0, 
				  NULL,
				  0);
	if(res != NULL)
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
   mysql_close(mycon);
   printf("Desconectado\n");
}

int insere( PESSOAS *pes){
  char sql[500];
  memset(sql,'\0',sizeof(sql));
  sprintf(sql,"insert into pessoas (nome, dtnasc, profissao, sexo) values ('%s','%s','%s','%c')", 
       pes->nome,
	   pes->dtnasc,
	   pes->profissao,
	   pes->sexo);
  printf("SQL:%s\n\n",sql);	   
  //mysql_prepare(
  res = mysql_query(mycon,sql);
  if(!res) {
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
	printf("\nDt Nascimento(yyyy-mm-dd):");
	scanf("%s",pes->dtnasc);
	printf("\nProfissao:");
	scanf("%s",pes->profissao);
	printf("\nSexo(M/F):");
	scanf("%c",&pes->sexo);	
	if((pes->sexo!='M') || (pes->sexo!='F')) { pes->sexo = 'M'; } /*Valor default*/
	printf("\n\n");
}

void Wellcome(void){
   printf("Software insPessoa\n");
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
      insere(&pessoa);
      desconecta();   
   }
}
