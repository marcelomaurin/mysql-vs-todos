<?php		
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'Off');
	/*error_reporting(E_ALL);*/
	
	include "connectdb.php";
	
	$data = json_decode(file_get_contents("php://input"));
	
	if($data){
		$nome = $dbhandle->real_escape_string($data->nome);
		$profissao = $dbhandle->real_escape_string($data->profissao);
		$dtnasc = $dbhandle->real_escape_string($data->dtnasc);
		$sexo = $dbhandle->real_escape_string($data->sexo);
	} else {
		$nome = $dbhandle->real_escape_string($_GET['nome']);
		$profissao = $dbhandle->real_escape_string($_GET['profissao']);
		$dtnasc = $dbhandle->real_escape_string($_GET['dtnasc']);
		$sexo = $dbhandle->real_escape_string($_GET['sexo']);
	}		
	
	$query = sprintf(
	        "INSERT into pessoas (nome, profissao,dtnasc, sexo ) values ( '%s', '%s', '%s', '%s');",
			$nome,
			$profissao,
			$dtnasc,
			$sexo);
			
	//echo ($query);
			
	$rs = $dbhandle->query($query);
	
?>
 