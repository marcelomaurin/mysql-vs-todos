<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'Off');
	/*error_reporting(E_ALL);*/
	
	include "connectdb.php";
	
	$data = json_decode(file_get_contents("php://input"));
	//echo String($data);
	if($data){
		$idpessoa = $data->idpessoa;
		$nome = $data->nome;
	} else {
		$idpessoa = $dbhandle->real_escape_string($_GET['idpessoa']);
		$nome = $dbhandle->real_escape_string($_GET['nome']);
	}
	
	
	if (!empty($idpessoa)){
		$query= "delete from pessoas where idpessoa = ". $idpessoa;		
		
	} else {
		if (!empty($nome)){
			$query= "delete from pessoas where nome = '". $nome."'";			
		}	
	}
	//echo $query;
	$dbhandle->query($query);
	
?>
 