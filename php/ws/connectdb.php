<?php
	define("HOSTNAME","127.0.0.1");
	define("USERNAME","php");
 	define("PASSWORD","123456");
	define("DATABASE","testedb");

	$dbhandle = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die("Erro ao conectar no banco de dados");

?>
