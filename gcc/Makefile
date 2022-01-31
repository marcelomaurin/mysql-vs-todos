
CC=gcc
SOURCE_INS=insPessoa.c
SOURCE_SEL=selPessoa.c
SOURCE_DEL=delPessoa.c
SOURCE_UPD=updPessoa.c

LIBS= -lmysql -lncurses
MYSQLCFLAGS= -I/usr/include/mysql -DBIG_JOINS=1 -fno-strict-aliasing -g
MYSQLLIBS= -L/usr/lib/mysql -lmysqlclient  -lpthread -lz -lm -lrt -ldl

TARGET_INS=insPessoas
TARGET_SEL=selPessoas
TARGET_DEL=delPessoas
TARGET_UPD=updPessoas


all: clean compile install

clean:
	rm *.o

compile:
	$(CC) $(SOURCE_INS) -o $(TARGET_INS) $(MYSQLCFLAGS) $(MYSQLLIBS)
	$(CC) $(SOURCE_SEL) -o $(TARGET_SEL) $(MYSQLCFLAGS) $(MYSQLLIBS)
	$(CC) $(SOURCE_DEL) -o $(TARGET_DEL) $(MYSQLCFLAGS) $(MYSQLLIBS)
	$(CC) $(SOURCE_UPD) -o $(TARGET_UPD) $(MYSQLCFLAGS) $(MYSQLLIBS)


install:
	cp $(TARGET_INS) /usr/local/bin/
	cp $(TARGET_SEL) /usr/local/bin/
	cp $(TARGET_DEL) /usr/local/bin/
	cp $(TARGET_UPD) /usr/local/bin/

